<?php
include("con_db.php");
session_start();

// รับค่าจากฟอร์มวันที่
$start_date = isset($_POST['start_date']) ? $_POST['start_date'] : '';
$end_date = isset($_POST['end_date']) ? $_POST['end_date'] : '';

// สร้างเงื่อนไขการกรองข้อมูลตามวันที่
$date_condition = "";
if ($start_date && $end_date) {
    $date_condition = "WHERE DATE(s.sale_date) BETWEEN '$start_date' AND '$end_date'";
}

// ดึงข้อมูลการขาย
$sql = "SELECT s.sale_id, p.p_name, s.quantity, s.sale_date, p.p_price
        FROM tbl_sales AS s 
        INNER JOIN tbl_product AS p ON s.product_id = p.p_id 
        $date_condition
        ORDER BY s.sale_date DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ประวัติการสั่งซื้อ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-4">ประวัติการสั่งซื้อ</h2>

    <!-- ฟอร์มสำหรับเลือกช่วงวันที่ -->
    <form method="POST" action="">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="start_date">วันที่เริ่มต้น</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo $start_date; ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="end_date">วันที่สิ้นสุด</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo $end_date; ?>">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">ค้นหา</button>
    </form>

    <!-- ตารางแสดงข้อมูลการสั่งซื้อ -->
    <table class="table mt-4">
        <thead>
            <tr>
                <th>รหัสการขาย</th>
                <th>ชื่อสินค้า</th>
                <th>จำนวน</th>
                <th>วันที่ขาย</th>
                <th>รวมราคา (บาท)</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['sale_id']; ?></td>
                    <td><?php echo $row['p_name']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo date('Y-m-d H:i:s', strtotime($row['sale_date'])); ?></td>
                    <td><?php echo $row['p_price'] * $row['quantity']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>