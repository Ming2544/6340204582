<?php
session_start();

// ตรวจสอบว่ามีสินค้าในตะกร้าหรือไม่
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    echo "<h2>ตะกร้าสินค้า</h2>";
    echo "<table class='table'>";
    echo "<tr><th>ชื่อสินค้า</th><th>ราคา</th><th>จำนวน</th><th>รวม</th></tr>";
    $total = 0;

    foreach ($_SESSION['cart'] as $item) {
        $subtotal = $item['p_price'] * $item['p_qty'];
        $total += $subtotal;
        echo "<tr>
                <td>{$item['p_name']}</td>
                <td>{$item['p_price']}</td>
                <td>{$item['p_qty']}</td>
                <td>{$subtotal}</td>
              </tr>";
    }

    echo "<tr><td colspan='3'>รวมทั้งหมด</td><td>{$total}</td></tr>";
    echo "</table>";
} else {
    echo "<h2>ตะกร้าว่างเปล่า</h2>";
}
?>