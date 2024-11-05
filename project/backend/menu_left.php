<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เมนูผู้ดูแลระบบ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <div class="list-group mt-5">
    <!-- <//a href="admin.php" class="list-group-item list-group-item-action">จัดการผู้ดูแลระบบ<//a> -->
    <a href="index.php" class="list-group-item list-group-item-action">หน้าแรก</a>
    <a href="member.php" class="list-group-item list-group-item-action">จัดการสมาชิก</a>
        <a href="type.php" class="list-group-item list-group-item-action">จัดการประเภทสินค้า</a>
        <a href="bank.php" class="list-group-item list-group-item-action">จัดการธนาคาร</a>
        <a href="product.php" class="list-group-item list-group-item-action ">จัดการสินค้า</a>
        <a href="report.php" class="list-group-item list-group-item-action ">เรียกดูรายงาน</a>
        <a href="paymemt.php" class="list-group-item list-group-item-action ">จัดการการชำระเงิน</a>
        <a href="stock_product.php" class="list-group-item list-group-item-action ">จัดการจำนวนสินค้า</a>
        <a href="order_status.php" class="list-group-item list-group-item-action ">สถานสินค้า</a>
        <a href="../logout.php" class="list-group-item list-group-item-action" onclick="return confirm('คุณแน่ใจหรือไม่?')">ออกจากระบบ</a>
    </div>
</div>

</body>
</html>
