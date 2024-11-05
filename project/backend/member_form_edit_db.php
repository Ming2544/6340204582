<?php
include('con_db.php');  // ไฟล์เชื่อมต่อกับฐานข้อมูล

// รับค่าจากฟอร์มและป้องกัน SQL Injection
$member_id = mysqli_real_escape_string($conn, $_POST["member_id"]);
$m_user = mysqli_real_escape_string($conn, $_POST["m_user"]);
$m_pass = mysqli_real_escape_string($conn, $_POST["m_pass"]);
$m_name = mysqli_real_escape_string($conn, $_POST["m_name"]);
$m_email = mysqli_real_escape_string($conn, $_POST["m_email"]);
$m_tel = mysqli_real_escape_string($conn, $_POST["m_tel"]);
$m_address = mysqli_real_escape_string($conn, $_POST["m_address"]);
$m_address = mysqli_real_escape_string($conn, $_POST["m_gender"]);
$birth_date = mysqli_real_escape_string($conn, $_POST["birth_date"]);

// ทำการปรับปรุงข้อมูลในฐานข้อมูล
$sql = "UPDATE tbl_member SET  
        m_user='$m_user', 
        m_pass='$m_pass', 
        m_name='$m_name',
        m_email='$m_email',
        m_tel='$m_tel', 
        m_address='$m_address',
        m_gender='$m_gender',
        birth_date= '$birth_date'
        WHERE member_id='$member_id'";

$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($conn));

// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($conn);

// แจ้งผลการอัปเดต
if($result){
    echo "<script type='text/javascript'>";
    echo "alert('Update');";
    echo "window.location = 'member.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error back to Update again');";
    echo "</script>";
}
?>
