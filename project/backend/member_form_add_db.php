<?php
include('con_db.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้านี้

// รับค่าจากฟอร์มและป้องกัน SQL Injection
$m_user = mysqli_real_escape_string($conn, $_REQUEST["m_user"]);
$m_pass = mysqli_real_escape_string($conn, $_REQUEST["m_pass"]);
$m_name = mysqli_real_escape_string($conn, $_REQUEST["m_name"]);
$m_email = mysqli_real_escape_string($conn, $_REQUEST["m_email"]);
$m_tel = mysqli_real_escape_string($conn, $_REQUEST["m_tel"]);
$m_address = mysqli_real_escape_string($conn, $_REQUEST["m_address"]);
$m_gender = mysqli_real_escape_string($conn, $_REQUEST["m_gender"]);
$birth_date = mysqli_real_escape_string($conn, $_REQUEST["birth_date"]);

// เพิ่มข้อมูลลงในฐานข้อมูล
$sql = "INSERT INTO tbl_member(m_user, m_pass, m_name, m_email, m_tel, m_address, m_gender, birth_date)
        VALUES('$m_user', '$m_pass', '$m_name', '$m_email', '$m_tel', '$m_address', '$m_gender', '$birth_date')";

$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($conn));

// ปิดการเชื่อมต่อ database
mysqli_close($conn);

// แจ้งผลการบันทึก
if($result){
    echo "<script type='text/javascript'>";
    echo "alert('เพิ่มข้อมูลเรียบร้อย');";
    echo "window.location = 'member.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error back to register again');";
    echo "</script>";
}
?>