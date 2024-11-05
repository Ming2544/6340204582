<?php
session_start();
include("con_db.php");

// ตรวจสอบว่าผู้ดูแลระบบล็อกอินหรือไม่
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // ถ้ายังไม่ได้ล็อกอิน ให้ไปที่หน้าเข้าสู่ระบบ
    exit();
}

// ดึงข้อมูลการชำระเงินทั้งหมดที่ยังไม่ยืนยัน
$sql_payments = "SELECT tbl_sales.*,tbl_member.m_name FROM tbl_sales 
left join tbl_member on tbl_sales.member_id = tbl_member.member_id
";
$result_payments = mysqli_query($conn, $sql_payments);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ยืนยันการชำระเงิน (ระบบหลังบ้าน)</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-4">รายการชำระเงินที่รอการยืนยัน</h2>

    <!-- แสดงรายการการชำระเงินทั้งหมด -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>เลขที่สั่งซื้อ</th>
                <th>ชื่อผู้ซื้อ</th>
                <th>สลิปการชำระเงิน</th>
                <th>ยอดชำระ</th>
                <th>สถานะ</th>
                <th>การจัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row_payment = mysqli_fetch_assoc($result_payments)): ?>
                <tr>
                    <td><?php echo $row_payment['sale_id']; ?></td>
                    <td><?php echo $row_payment['m_name']; ?></td>
                    <td>
                        <a href="../uploads/slips/<?php echo $row_payment['slip']; ?>" target="_blank">
                            <img src="../uploads/slips/<?php echo $row_payment['slip']; ?>" alt="สลิปการชำระเงิน" style="width:100px;height:auto;">
                        </a>
                    </td>
                    <td><?php echo number_format($row_payment['total_price'], 2); ?> บาท</td>
                    <td>
                        <?php if ($row_payment['status'] == 'pending'): ?>
                            <span class="badge badge-warning">รอการยืนยัน</span>
                        <?php elseif ($row_payment['status'] == 'confirmed'): ?>
                            <span class="badge badge-success">ยืนยันแล้ว</span>
                        <?php else: ?>
                            <span class="badge badge-danger">ถูกปฏิเสธ</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <form action="confirm_payment.php" method="POST">
                            <input type="hidden" name="sale_id" value="<?php echo $row_payment['sale_id']; ?>">
                            <input type="hidden" name="member_id" value="<?php echo $row_payment['member_id']; ?>">
                            <button type="submit" name="confirm" class="btn btn-success btn-sm">ยืนยัน</button>
                            <button type="submit" name="reject" class="btn btn-danger btn-sm">ปฏิเสธ</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
