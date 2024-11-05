<?php
session_start();
include("backend/con_db.php");

// ตรวจสอบว่าผู้ใช้ล็อกอินอยู่หรือไม่
if (!isset($_SESSION['member_id'])) {
    header("Location: login.php"); // ถ้าผู้ใช้ยังไม่ได้ล็อกอิน ให้ไปที่หน้าเข้าสู่ระบบ
    exit();
}

$member_id = $_SESSION['member_id'];
$sql = "SELECT MAX(order_id) AS max_order_id FROM tbl_sales WHERE member_id = '$member_id'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $order_id = $row['max_order_id']+1; // เก็บค่าของ max(order_id)
    
}

// ดึงข้อมูลผู้ใช้จากฐานข้อมูล
$sql_user = "SELECT * FROM tbl_member WHERE member_id = '$member_id'";
$result_user = mysqli_query($conn, $sql_user);
$member_data = mysqli_fetch_assoc($result_user);

$sql_bank = "SELECT * FROM tbl_bank ORDER BY b_id ASC";
$result_bank = mysqli_query($conn, $sql_bank);

// ตรวจสอบว่ามีสินค้าในตะกร้าหรือไม่
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: cart.php"); // ถ้าไม่มีสินค้าในตะกร้าให้ไปยังหน้าตะกร้า
    exit();
}

// หากผู้ใช้ส่งข้อมูลการชำระเงิน
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // รับข้อมูลจากฟอร์ม
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    // จัดการไฟล์สลิปธนาคาร
    if (isset($_FILES['slip']) && $_FILES['slip']['error'] === UPLOAD_ERR_OK) {
        $slip_file_name = $_FILES['slip']['name'];
        $slip_file_tmp = $_FILES['slip']['tmp_name'];
        $slip_file_type = $_FILES['slip']['type'];
        $slip_file_ext = pathinfo($slip_file_name, PATHINFO_EXTENSION);

        // ตั้งชื่อไฟล์ใหม่ให้ไม่ซ้ำกัน
        $new_slip_name = uniqid() . "." . $slip_file_ext;
        $upload_dir = 'uploads/slips/';
        $upload_path = $upload_dir . $new_slip_name;

        // ตรวจสอบว่าโฟลเดอร์อัปโหลดมีอยู่หรือไม่ ถ้าไม่มีก็สร้าง
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // ย้ายไฟล์ไปยังโฟลเดอร์ที่กำหนด
        if (move_uploaded_file($slip_file_tmp, $upload_path)) {
            // คำนวณราคารวมจากสินค้าทั้งหมดในตะกร้า
            $total_price = 0;
            foreach ($_SESSION['cart'] as $item) {
                $total_price += $item['p_qty'] * $item['p_price']; // คำนวณราคารวม
            }

            // อัปโหลดไฟล์สลิปสำเร็จ
            echo "อัปโหลดสลิปธนาคารสำเร็จ!";

            // บันทึกข้อมูลการชำระเงินในฐานข้อมูล
            foreach ($_SESSION['cart'] as $product_id => $item) {
                $quantity = $item['p_qty'];
                $product_id = $item['p_id'];

                // เพิ่มการบันทึกข้อมูลผู้ซื้อ (member_id), ราคารวม (total_price), และสถานะการชำระเงิน (payment_status)
                $sql = "INSERT INTO tbl_sales (member_id, product_id, quantity, total_price, slip, order_id, status) 
                        VALUES ('$member_id', '$product_id', '$quantity', '$total_price', '$new_slip_name','$order_id', 'pending')";
                mysqli_query($conn, $sql);
            }

            // เคลียร์ตะกร้าสินค้า
            unset($_SESSION['cart']);

            // แสดงข้อความยืนยัน
            echo "<script>alert('ชำระเงินเรียบร้อยแล้ว!'); window.location.href = 'index.php';</script>";
        } else {
            // อัปโหลดไฟล์ไม่สำเร็จ
            echo "เกิดข้อผิดพลาดในการอัปโหลดไฟล์";
        }
    } else {
        echo "โปรดอัปโหลดไฟล์สลิปธนาคาร";
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>หน้าชำระสินค้า</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-4">ชำระสินค้า</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">ชื่อ-นามสกุล:</label>
            <input type="text" class="form-control" name="name" value="<?php echo $member_data['m_name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="address">ที่อยู่:</label>
            <textarea class="form-control" name="address" required><?php echo $member_data['m_address']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="phone">หมายเลขโทรศัพท์:</label>
            <input type="text" class="form-control" name="phone" value="<?php echo $member_data['m_tel']; ?>" required>
        </div>
        <div class="form-group">
            <label for="bank">ชำระเงินผ่านธนาคาร:</label>
            <div>
                <?php while ($row_bank = mysqli_fetch_assoc($result_bank)): ?>
                    <div class="bank-details mb-3" style="border: 1px solid #ddd; padding: 10px;">
                        <strong><?php echo $row_bank['b_name']; ?></strong> <br>
                        ชื่อบัญชี: <?php echo $row_bank['b_owner']; ?> <br>
                        เลขบัญชี: <?php echo $row_bank['b_number']; ?> <br>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="form-group">
            <label for="slip">แนบสลิปธนาคาร:</label>
            <input type="file" class="form-control" name="slip" required>
        </div>
        <button type="submit" class="btn btn-success">ยืนยันการชำระเงิน</button>
    </form>
</div>
</body>
</html>
