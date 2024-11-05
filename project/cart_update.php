<?php
session_start();

// ตรวจสอบว่ามีการส่งค่า `p_id` และ `p_qty` มาหรือไม่
if (isset($_POST['p_id']) && isset($_POST['p_qty'])) {
    $p_id = $_POST['p_id'];
    $p_qty = intval($_POST['p_qty']); // แปลงเป็นจำนวนเต็ม
    // ตรวจสอบว่าจำนวนสินค้ามากกว่า 0 หรือไม่
    if ($p_qty > 0) {
        // ถ้ามีสินค้าในตะกร้าแล้วและสินค้าที่ส่งมาตรงกับสินค้าในตะกร้า
        if (isset($_SESSION['cart'][$p_id])) {
            // อัปเดตจำนวนสินค้าในตะกร้า
            $_SESSION['cart'][$p_id]['p_qty'] = $p_qty;
        }
    } else {
        // ถ้าจำนวนสินค้าเป็น 0 หรือน้อยกว่า ลบสินค้าชิ้นนั้นออกจากตะกร้า
        unset($_SESSION['cart'][$p_id]);
    }
}

// เมื่ออัปเดตเสร็จ กลับไปที่หน้าตะกร้าสินค้า
header('Location: cart.php');
exit();
