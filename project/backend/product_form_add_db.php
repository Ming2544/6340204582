<meta charset="UTF-8">
<?php
include('con_db.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้านี้

date_default_timezone_set('Asia/Bangkok');

// สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
$date1 = date("Ymd_His");
// สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
$numrand = (mt_rand());

// รับค่าไฟล์จากฟอร์ม
$p_name = $_POST['p_name'];
$type_id = $_POST['type_id'];
$p_detail = $_POST['p_detail'];
$p_price = $_POST['p_price']; 
$p_img = (isset($_POST['p_img']) ? $_POST['p_img'] : '');

// img
$upload = $_FILES['p_img'];
if ($upload <> '') {

    // โฟลเดอร์ที่เก็บไฟล์
    $path = "p_img/";
    // ตัวชื่อกับนามสกุลภาพออกจากกัน
    $type = strrchr($_FILES['p_img']['name'], ".");
    // ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
    $newname = 'p_img' . $numrand . $date1 . $type;
    $path_copy = $path . $newname;
    $path_link = "p_img/" . $newname;
    // คัดลอกไฟล์ไปยังโฟลเดอร์
    move_uploaded_file($_FILES['p_img']['tmp_name'], $path_copy);
}

// เพิ่มไฟล์เข้าไปในตาราง tbl_product
$sql = "INSERT INTO tbl_product
        (
        p_name,
        type_id,
        p_detail,
        p_price,  
        p_img
        )
        VALUES
        (
        '$p_name',
        '$type_id',
        '$p_detail',
        '$p_price',  
        '$newname')";

$result = mysqli_query($conn, $sql);// or die ("Error in query: $sql " . mysqli_error());

mysqli_close($conn);

// javascript แสดงการ upload file
if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('Add Succesfuly');";
    echo "window.location = 'product.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error back to upload again');";
    echo "window.location = 'product.php'; ";
    echo "</script>";
}
?>
