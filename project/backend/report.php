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

// ดึงข้อมูลการขายและยอดขายรวมตามวันที่เลือก
$sql = "SELECT DATE(s.sale_date) as sale_date, SUM(s.quantity * p.p_price) as total_sales
        FROM tbl_sales AS s 
        INNER JOIN tbl_product AS p ON s.product_id = p.p_id 
        $date_condition
        GROUP BY DATE(s.sale_date)
        ORDER BY sale_date DESC";
$result = mysqli_query($conn, $sql);

// เก็บข้อมูลวันที่และยอดขายใน array
$sale_dates = [];
$total_sales = [];

while ($row = mysqli_fetch_assoc($result)) {
    $sale_dates[] = $row['sale_date'];  // เก็บวันที่ขาย
    $total_sales[] = $row['total_sales'];  // เก็บยอดขายรวมของวันนั้น
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>รายงานการขาย</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- เพิ่ม Chart.js -->
</head>
<body>
<div class="container">
    <h2 class="mt-4">รายงานการขาย</h2>

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

    <!-- ตารางแสดงข้อมูลการขาย -->
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

    <!-- กราฟแสดงยอดขายรายวัน -->
    <h3 class="mt-5">กราฟยอดขายตามวันเดือนปี</h3>
    <canvas id="salesChart"></canvas> <!-- canvas สำหรับกราฟ -->

    <script>
        // สร้างกราฟแท่งโดยใช้ Chart.js
        const ctx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($sale_dates); ?>, // วันที่ขาย
                datasets: [{
                    label: 'ยอดขาย (บาท)',
                    data: <?php echo json_encode($total_sales); ?>, // ยอดขายต่อวัน
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</div>
</body>
</html>