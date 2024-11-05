<?php
session_start();
echo '<meta charset="utf-8">';
include('con_db.php');
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
//exit();
if($_SESSION['m_level']!='admin'){
	Header("Location: index.php");
}
	$b_name = mysqli_real_escape_string($conn,$_POST["b_name"]);
	$b_type = mysqli_real_escape_string($conn,$_POST["b_type"]);
	$b_number = mysqli_real_escape_string($conn,$_POST["b_number"]);
	$b_owner = mysqli_real_escape_string($conn,$_POST["b_owner"]);
	$bn_name = mysqli_real_escape_string($conn,$_POST["bn_name"]);
 
	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$upload=$_FILES['b_logo']['name'];
	if($upload !='') { 
		$path="b_logo";
		$type = strrchr($_FILES['b_logo']['name'],".");
		$newname =$numrand.$date1.$type;
		$path_copy=$path.$newname;
		$path_link="b_logo".$newname;
		move_uploaded_file($_FILES['b_logo']['tmp_name'],$path_copy);  
	}
 
	$sql = "INSERT INTO tbl_bank
	(
	b_name,
	b_type,
	b_number,
	b_owner,
	bn_name,
	b_logo
	)
	VALUES
	(
	'$b_name',
	'$b_type',
	'$b_number',
	'$b_owner',
	'$bn_name',
	'$newname'
	)";
 
	$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($conn));
	mysqli_close($conn);
 
	if($result){
	echo '<script>';
    echo "window.location='bank.php?do=success';";
    echo '</script>';
	}else{
	echo '<script>';
    echo "window.location='bank.php?act=add&do=f';";
    echo '</script>';
}
?>