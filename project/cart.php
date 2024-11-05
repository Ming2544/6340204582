<?php
session_start();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ตะกร้าสินค้า</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-4">ตะกร้าสินค้า</h2>
    <?php if (empty($_SESSION['cart'])): ?>
        <p>ตะกร้าของคุณว่างเปล่า</p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <!-- <th>รูปสินค้า</th> -->
                    <th>ชื่อสินค้า</th>
                    <th>ราคา</th>
                    <th>จำนวน</th>
                    <th>รวม</th>
                    <th>ลบ</th> <!-- Added column for delete button -->
                </tr>
            </thead>
            <tbody>
                <?php            
                $total = 0;
                foreach ($_SESSION['cart'] as $item):
                    $total += $item['p_price'] * $item['p_qty'];
                ?>
                    <tr>
                        <td><?php echo $item['p_name']; ?></td>
                        <td><?php echo $item['p_price']; ?> บาท</td>
                        <td>
                            <form action="cart_update.php" method="POST">
                                <input type="hidden" name="p_id" value="<?php echo $item['p_id']; ?>">
                                <input type="number" name="p_qty" value="<?php echo $item['p_qty']; ?>" min="1" style="width: 60px;" onchange="this.form.submit()">
                            </form>
                        </td>
                        <td><?php echo $item['p_price'] * $item['p_qty']; ?> บาท</td>
                        <td><a href="cart_del.php?remove=<?php echo $item['p_id']; ?>" class="btn btn-danger">ลบ</a></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="4" class="text-right"><strong>ราคารวมทั้งหมด:</strong></td>
                    <td><?php echo $total; ?> บาท</td>
                </tr>
            </tbody>
        </table>
        <a href="checkout.php" class="btn btn-success">สั่งซื้อ</a>
    <?php endif; ?>
</div>
</body>
</html>

