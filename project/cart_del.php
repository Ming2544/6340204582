<?php
session_start();


if (isset($_GET['remove'])) {
    $product_id = $_GET['remove'];
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['p_id'] == $product_id) {
            unset($_SESSION['cart'][$key]); // ลบสินค้าออกจากตะกร้า
            break;
        }
    }
    // เปลี่ยนเส้นทางกลับไปยังหน้าตะกร้า
    header('Location: cart.php');
    exit();
}
?>