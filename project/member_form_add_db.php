<?php
include("backend/con_db.php");  // Include the database connection file
session_start();
// Check user permission


// Get and sanitize input from the form
$m_user = mysqli_real_escape_string($conn, $_REQUEST["m_user"]);
$m_pass = mysqli_real_escape_string($conn, $_REQUEST["m_pass"]);
$m_name = mysqli_real_escape_string($conn, $_REQUEST["m_name"]);
$m_email = mysqli_real_escape_string($conn, $_REQUEST["m_email"]);
$m_tel = mysqli_real_escape_string($conn, $_REQUEST["m_tel"]);
$m_address = mysqli_real_escape_string($conn, $_REQUEST["m_address"]);
$birth_date = mysqli_real_escape_string($conn, $_REQUEST["birth_date"]);
$m_gender = mysqli_real_escape_string($conn, $_REQUEST["m_gender"]);

// Insert data into the database
$sql = "INSERT INTO tbl_member (m_user, m_pass, m_name, m_email, m_tel, m_address, birth_date,m_gender)
        VALUES ('$m_user', '$m_pass', '$m_name', '$m_email', '$m_tel', '$m_address', '$birth_date','$m_gender')"; 

$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));


// Close database connection
mysqli_close($conn);

// Notify user of result
if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('สมัครสมาชิกเรียบร้อย');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error back to register again');";
    echo "</script>";
}
?>
