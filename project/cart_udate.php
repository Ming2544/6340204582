<?php
session_start();

// ตรวจสอบว่ามีการส่งข้อมูลมาหรือไม่
if (isset($_POST['p_id']) && isset($_POST['p_qty'])) {
    $product_id = $_POST['p_id'];
    $quantity = $_POST['p_qty'];

    // ตรวจสอบว่ามีสินค้าในตะกร้าหรือไม่
    if (isset($_SESSION['cart'][$product_id])) {
        // ปรับปรุงจำนวนสินค้า
        if ($quantity > 0) {
            $_SESSION['cart'][$product_id]['p_qty'] = $quantity;
        } else {
            // ถ้าจำนวนเป็น 0 ให้ลบสินค้าออกจากตะกร้า
            unset($_SESSION['cart'][$product_id]);
        }
    }
}

// เปลี่ยนเส้นทางกลับไปยังหน้าตะกร้าสินค้า
header("Location: cart.php");