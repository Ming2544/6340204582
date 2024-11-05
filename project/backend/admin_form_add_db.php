<?php
include('con_db.php'); // นำเข้าไฟล์เชื่อมต่อฐานข้อมูล

$a_user = $_POST['a_user'];
$a_pass = $_POST['a_pass'];
$a_name = $_POST['a_name'];

$check = "
	SELECT  a_name 
	FROM tbl_admin 
	WHERE a_name = '$a_name' 
	";
    $result1 = mysqli_query($conn, $check) or die(mysqli_error($conn));
    $num=mysqli_num_rows($result1);
 
    if($num > 0)
    {
    echo "<script>";
    echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
    echo "window.history.back();";
    echo "</script>";
    }else{

// สร้างคำสั่ง SQL
$sql = "INSERT INTO tbl_admin (a_user, a_pass, a_name) 
        VALUES ('$a_user', '$a_pass', '$a_name')";

// รันคำสั่ง SQL
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($conn));

// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($conn);}

// แสดงผลลัพธ์
if ($result) {
    echo "<script>";
    echo "alert('เพิ่มข้อมูลสำเร็จ');";
    echo "window.location ='admin.php'; ";
    echo "</script>";
} else {
    echo "<script>";
    echo "alert('ERROR! การเพิ่มข้อมูลล้มเหลว');";
    echo "window.location ='admin.php'; ";
    echo "</script>";
}
?>