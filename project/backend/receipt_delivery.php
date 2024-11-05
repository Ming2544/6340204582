<?php
session_start();
include("con_db.php");

// ตรวจสอบว่าผู้ดูแลระบบล็อกอินหรือไม่
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // ถ้ายังไม่ได้ล็อกอิน ให้ไปที่หน้าเข้าสู่ระบบ
    exit();
}

// รับ sale_id จาก URL
$sale_id = $_GET['sale_id'];

// ดึงข้อมูลการชำระเงินที่ได้รับการยืนยัน
$sql_receipt = "SELECT tbl_sales.*, tbl_member.m_name FROM tbl_sales 
LEFT JOIN tbl_member ON tbl_sales.member_id = tbl_member.member_id
WHERE sale_id = '$sale_id'";
$result_receipt = mysqli_query($conn, $sql_receipt);
$row_receipt = mysqli_fetch_assoc($result_receipt);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ใบเสร็จการชำระเงิน</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-4">ใบเสร็จการชำระเงิน</h2>
    <p>ชื่อผู้ซื้อ: <?php echo htmlspecialchars($row_receipt['m_name']); ?></p>
    <p>ยอดชำระ: <?php echo number_format($row_receipt['total_price'], 2); ?> บาท</p>
    <p>สถานะ: <?php echo htmlspecialchars($row_receipt['status']); ?></p>
    <p>สลิปการชำระเงิน: <a href="../uploads/slips/<?php echo htmlspecialchars($row_receipt['slip']); ?>" target="_blank">ดูสลิป</a></p>
</div>
</body>
</html>
