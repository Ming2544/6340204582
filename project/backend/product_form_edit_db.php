<?php
include('con_db.php');  // เชื่อมต่อฐานข้อมูล

// รับค่าจากฟอร์ม
$p_id = $_POST['p_id'];
$p_name = $_POST['p_name'];
$p_price = $_POST['p_price'];
$p_detail = $_POST['p_detail'];
$type_id = $_POST['type_id'];

// ตรวจสอบการอัพโหลดรูปภาพใหม่หรือไม่
if (isset($_FILES['p_img']['name']) && $_FILES['p_img']['name'] != '') {
    // สุ่มชื่อไฟล์ใหม่
    $numrand = (mt_rand());
    $date1 = date("Ymd_His");
    $type = strrchr($_FILES['p_img']['name'], ".");
    $newname = 'p_img' . $numrand . $date1 . $type;

    // ที่เก็บไฟล์
    $path = "p_img/";
    $path_copy = $path . $newname;

    // ย้ายไฟล์ไปยังโฟลเดอร์เก็บรูป
    move_uploaded_file($_FILES['p_img']['tmp_name'], $path_copy);

    // ลบรูปเก่าที่มีอยู่
    if (file_exists("p_img/" . $_POST['img2'])) {
        unlink("p_img/" . $_POST['img2']);
    }

    // อัพเดตรูปใหม่ในฐานข้อมูล
    $sql = "UPDATE tbl_product
            SET p_name = '$p_name',
                p_price = '$p_price',
                p_detail = '$p_detail',
                type_id = '$type_id',
                p_img = '$newname'
            WHERE p_id = '$p_id'";
} else {
    // กรณีไม่ได้อัพโหลดรูปใหม่
    $sql = "UPDATE tbl_product
            SET p_name = '$p_name',
                p_price = '$p_price',
                p_detail = '$p_detail',
                type_id = '$type_id'
            WHERE p_id = '$p_id'";
}

// ดำเนินการอัปเดตข้อมูล
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('แก้ไขข้อมูลสำเร็จ');";
    echo "window.location = 'product.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('เกิดข้อผิดพลาดในการแก้ไขข้อมูล');";
    echo "</script>";
}

mysqli_close($conn);
?>
