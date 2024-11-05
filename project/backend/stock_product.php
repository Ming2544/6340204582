<?php
include('h.php'); // รวมไฟล์หัว
include('con_db.php'); // รวมไฟล์เชื่อมต่อกับ database

// ตรวจสอบว่าผู้ใช้ล็อกอินหรือไม่
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// ถ้ามีการส่งข้อมูลมา
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $stock_change = $_POST['stock_change']; // จำนวนที่จะเพิ่มหรือตัด
    $operation_type = $_POST['operation_type']; // ชนิดของการดำเนินการ (เพิ่มหรือลด)

    // เช็คจำนวนในฐานข้อมูลก่อนทำการลดสต็อก
    if ($operation_type === 'subtract') {
        // ตรวจสอบสต็อกปัจจุบัน
        $check_stock_query = "SELECT p_qty FROM tbl_product WHERE p_id = '$product_id'";
        $check_result = mysqli_query($conn, $check_stock_query);
        $product = mysqli_fetch_assoc($check_result);

        // ตรวจสอบว่าสต็อกเพียงพอหรือไม่
        if ($product['p_qty'] < $stock_change) {
            echo "<script>alert('ไม่สามารถตัดสต็อกได้ เนื่องจากสต็อกไม่เพียงพอ');</script>";
        } else {
            // ตัดสต็อก
            $update_query = "UPDATE tbl_product SET p_qty = p_qty - '$stock_change' WHERE p_id = '$product_id'";
            mysqli_query($conn, $update_query);
            echo "<script>alert('ตัดสต็อกสำเร็จ');</script>";
        }
    } elseif ($operation_type === 'add') {
        // เพิ่มสต็อก
        $update_query = "UPDATE tbl_product SET p_qty = p_qty + '$stock_change' WHERE p_id = '$product_id'";
        mysqli_query($conn, $update_query);
        echo "<script>alert('เพิ่มสต็อกสำเร็จ');</script>";
    }
}

// ดึงข้อมูลสินค้าทั้งหมด
$query = "SELECT * FROM tbl_product";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>การจัดการสต็อกสินค้า</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>จัดการสต็อกสินค้า</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="product_id">เลือกสินค้า</label>
            <select name="product_id" id="product_id" class="form-control" required>
                <option value="">-- กรุณาเลือกสินค้า --</option>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <option value="<?php echo $row['p_id']; ?>"><?php echo $row['p_name']; ?> (คงเหลือ: <?php echo $row['p_qty']; ?>)</option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="stock_change">จำนวน</label>
            <input type="number" name="stock_change" id="stock_change" class="form-control" required>
        </div>
        <div class="form-group">
            <label>ประเภทการดำเนินการ</label><br>
            <input type="radio" name="operation_type" value="add" checked> เพิ่มสต็อก
            <input type="radio" name="operation_type" value="subtract"> ตัดสต็อก
        </div>
        <button type="submit" class="btn btn-primary">ดำเนินการ</button>
    </form>

    <h3 class="mt-4">สินค้าทั้งหมด</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>รูปภาพ</th>
                <th>ชื่อสินค้า</th>
                <th>จำนวนคงเหลือ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // reset result pointer and fetch again for display
            mysqli_data_seek($result, 0);
            while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><img src="p_img/<?php echo $row['p_img']; ?>" alt="<?php echo $row['p_name']; ?>" width="100"></td>
                    <td><?php echo $row['p_name']; ?></td>
                    <td><?php echo $row['p_qty']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>

<?php
// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($conn);
?>
