<?php
session_start(); // เริ่มต้น session

// ตรวจสอบว่ามีข้อมูล POST หรือไม่
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // ดึงข้อมูลจากฟอร์ม
    $product_id = $_POST['p_id'];
    $product_name = $_POST['p_name'];
    $product_price = $_POST['p_price'];
    $product_qty = $_POST['p_qty'];

    // ตรวจสอบว่าตะกร้ายังไม่มีการตั้งค่า
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = []; // สร้างตะกร้าใหม่
    }

    // ตรวจสอบว่าผลิตภัณฑ์มีอยู่ในตะกร้าหรือไม่
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['product_id'] == $product_id) {
            $item['product_qty'] += $product_qty; // เพิ่มจำนวนสินค้า
            $found = true;
            break;
        }
    }
    //$_SESSION['cart'][$product_id] ['product_qty'] += $product_qty;

    // ถ้าสินค้าไม่อยู่ในตะกร้า ให้เพิ่มสินค้าใหม่
    if (!$found) {
        $_SESSION['cart'][$product_id] = [
            'p_id' => $product_id,
            'p_name' => $product_name,
            'p_price' => $product_price,
            'p_qty' => $product_qty,
        ];
    }

    // เปลี่ยนเส้นทางกลับไปยังหน้าสินค้า
    header('Location: index.php');
    exit();
}
?>