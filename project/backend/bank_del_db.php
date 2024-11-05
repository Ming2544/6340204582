<?php
//1. เชื่อมต่อ database: 
include('con_db.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้านี้
if($_SESSION['m_level']!='admin'){
	Header("Location: bank.php");
//รับค่า member_id จาก URL
$b_id = $_REQUEST["ID"];

//ลบข้อมูลออกจาก database ตาม member_id ที่ส่งมา
$sql = "DELETE FROM tbl_bank WHERE b_id='$b_id' ";
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($conn));

//ตรวจสอบผลลัพธ์การลบข้อมูล
if ($result) {
    echo "<script type='text/javascript'>";
    echo "window.location = 'member.php'; "; // กลับไปที่หน้า member.php
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error: Unable to delete. Please try again.');"; // แสดงข้อผิดพลาดเมื่อไม่สามารถลบข้อมูลได้
    echo "</script>";
}

//ปิดการเชื่อมต่อฐานข้อมูล
}
?>