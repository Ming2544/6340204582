<?php
include("backend/con_db.php");
session_start();

// Query รวมข้อมูลใบเสร็จที่มี order_id ซ้ำกัน
$sql = "SELECT 
            p.order_id,
            t.p_name,
            t.p_price,
            p.quantity,
            (t.p_price * p.quantity) AS subtotal,
            p.sale_date,
            p.member_id,
            p.status
        FROM 
            tbl_sales AS p
        INNER JOIN 
            tbl_product AS t ON p.product_id = t.p_id
        ORDER BY 
            p.order_id ASC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ใบเสร็จรวมการสั่งซื้อ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>ใบเสร็จรวมการสั่งซื้อ</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>เลขที่ใบเสร็จ</th>
                    <th>รายการสินค้า</th>
                    <th>ราคา (บาท)</th>
                    <th>จำนวน</th>
                    <th>ยอดรวมต่อรายการ</th>
                    <th>วันที่สั่งซื้อ</th>
                
                </tr>
            </thead>
            <tbody>
                <?php 
                $previous_order_id = null;
                $total_amount = 0;
                while ($row = mysqli_fetch_assoc($result)): 
                    // ถ้า order_id ใหม่เริ่มใบเสร็จใหม่
                    if ($row['order_id'] != $previous_order_id) {
                        // แสดงยอดรวมของ order_id ก่อนหน้านี้
                        if ($previous_order_id !== null) {
                            echo "<tr><td colspan='8' class='text-right'><strong>ยอดรวมใบเสร็จ: " . number_format($total_amount, 2) . " บาท</strong></td></tr>";
                        }
                        $total_amount = 0; // รีเซ็ตยอดรวม
                    }

                    $total_amount += $row['subtotal'];
                ?>
                    <tr>
                        <!-- แสดง order_id เฉพาะแถวแรกของใบเสร็จนั้น -->
                        <td><?php echo ($row['order_id'] != $previous_order_id) ? $row['order_id'] : ''; ?></td>
                        <td><?php echo $row['p_name']; ?></td>
                        <td><?php echo number_format($row['p_price'], 2); ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo number_format($row['subtotal'], 2); ?> บาท</td>
                        <td><?php echo ($row['order_id'] != $previous_order_id) ? $row['sale_date'] : ''; ?></td>
                    </tr>
                <?php 
                    $previous_order_id = $row['order_id']; // บันทึกค่า order_id ปัจจุบัน
                endwhile; 
                // แสดงยอดรวมของ order_id สุดท้าย
                echo "<tr><td colspan='8' class='text-right'><strong>ยอดรวมใบเสร็จ: " . number_format($total_amount, 2) . " บาท</strong></td></tr>";
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
