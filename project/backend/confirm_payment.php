<?php
session_start();
include("con_db.php");

// ตรวจสอบว่าผู้ดูแลระบบล็อกอินหรือไม่
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // ถ้ายังไม่ได้ล็อกอิน ให้ไปที่หน้าเข้าสู่ระบบ
    exit();
}

// ตรวจสอบการส่งข้อมูล
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['confirm'])) {
        $sale_id = $_POST['sale_id'];
        $member_id = $_POST['member_id'];

        $sql = "SELECT MAX(order_id) AS max_order_id FROM tbl_sales WHERE member_id = '$member_id'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $max_order_id = $row['max_order_id']; // เก็บค่าของ max(order_id)
    
    echo "รหัสการสั่งซื้อสูงสุดของผู้ใช้งานนี้คือ: " . $max_order_id;
} else {
    echo "เกิดข้อผิดพลาดในการดึงข้อมูล: " . mysqli_error($conn);
}


        // อัปเดตสถานะการชำระเงินเป็น 'confirmed'
        $sql_update = "UPDATE tbl_sales SET status = 'confirmed', order_id = ' $max_order_id' WHERE sale_id = '$sale_id'";
        if (mysqli_query($conn, $sql_update)) {
            // เปลี่ยนเส้นทางไปยังหน้าใบเสร็จหลังจากยืนยัน
            header("Location: receipt_delivery.php?sale_id=$sale_id");
            exit();
        } else {
            echo "เกิดข้อผิดพลาดในการยืนยันการชำระเงิน: " . mysqli_error($conn);
        }
    } elseif (isset($_POST['reject'])) {
        $sale_id = $_POST['sale_id'];

        // อัปเดตสถานะการชำระเงินเป็น 'rejected'
        $sql_update = "UPDATE tbl_sales SET status = 'rejected' WHERE sale_id = '$sale_id'";
        mysqli_query($conn, $sql_update);

        // กลับไปยังหน้าก่อนหน้านี้
        header("Location: payment_confirmation.php");
        exit();
    }
}
?>
