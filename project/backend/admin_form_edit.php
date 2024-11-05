<?php
//1. เชื่อมต่อ database:
include('con_db.php');  // ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้านี้

$a_id = $_REQUEST["ID"];

//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM tbl_admin WHERE a_id='$a_id'";
$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));
$row = mysqli_fetch_array($result);
extract($row);
?>
<?php include('h.php'); ?>
<form name="admin" action="admin_form_edit_db.php" method="POST" id="admin" class="form-horizontal">
    <input type="hidden" name="a_id" value="<?php echo htmlspecialchars($a_id); ?>">
    
    <div class="form-group">
        <div class="col-sm-6" align="left">
            <input name="a_user" type="text" required class="form-control" id="a_user" value="<?php echo htmlspecialchars($a_user); ?>" placeholder="username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2" />
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-6" align="left">
            <input name="a_pass" type="password" required class="form-control" id="a_pass" value="<?php echo htmlspecialchars($a_pass); ?>" placeholder="password" pattern="^[a-zA-Z0-9]+$" minlength="2" />
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-6" align="left">
            <input name="a_name" type="text" required class="form-control" id="a_name" value="<?php echo htmlspecialchars($a_name); ?>" placeholder="ชื่อ-สกุล" />
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-3"> </div>
        <div class="col-sm-5" align="right">
            <button type="submit" class="btn btn-success" id="btn">
                <span class="glyphicon glyphicon-saved"></span> บันทึก
            </button>
        </div> 
    </div>
</form>