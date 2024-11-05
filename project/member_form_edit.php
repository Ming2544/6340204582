<?php
include("backend/con_db.php");
session_start();
$member_id = $_SESSION["member_id"];

// ดึงข้อมูลสมาชิก
$sql = "SELECT * FROM tbl_member WHERE member_id='$member_id'";
$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));
$row = mysqli_fetch_array($result);
extract($row);
?>
<?php include('h.php'); ?>

<!-- เริ่มฟอร์ม -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center mb-4">แก้ไขข้อมูลสมาชิก</h2>
            <form name="register" action="member_form_edit_db.php" method="POST" class="form-horizontal border p-4 rounded shadow">
                <input type="hidden" name="member_id" value="<?php echo htmlspecialchars($member_id); ?>">
                
                <div class="form-group">
                    <label for="m_user">Username</label>
                    <input name="m_user" type="text" required class="form-control" id="m_user" value="<?php echo $m_user; ?>" placeholder="Username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2" />
                </div> 
                
                <div class="form-group">
        
                    <label for="m_pass">Password</label>
                    <input name="m_pass" type="password" required class="form-control" id="m_pass" value="<?php echo $m_pass; ?>" placeholder="Password" pattern="^[a-zA-Z0-9]+$" minlength="2" />
                </div>
                
                <div class="form-group">
                    <label for="m_name">ชื่อ-สกุล</label>
                    <input name="m_name" type="text" required class="form-control" id="m_name" value="<?php echo $m_name; ?>" placeholder="ชื่อ-สกุล" />
                </div>
                
                <div class="form-group">
                    <label for="m_email">อีเมล์</label>
                    <input name="m_email" type="email" class="form-control" id="m_email" value="<?php echo $m_email; ?>" placeholder="name@hotmail.com"/>
                </div>
                
                <div class="form-group">
                    <label for="m_tel">เบอร์โทร</label>
                    <input name="m_tel" type="text" class="form-control" id="m_tel" value="<?php echo $m_tel; ?>" placeholder="เบอร์โทร ตัวเลขเท่านั้น" />
                </div>
                
                <div class="form-group">
                    <label for="m_address">ที่อยู่</label>
                    <textarea name="m_address" class="form-control" id="m_address" required><?php echo $m_address; ?></textarea> 
                </div>
                
                <div class="form-group">
                    <label for="m_gender">เพศ</label>
                    <select name="m_gender" class="form-control" id="m_gender" required>
                        <option value="">-- กรุณาเลือกเพศ --</option>
                        <option value="male" <?php if($m_gender == 'male') echo 'selected'; ?>>ชาย</option>
                        <option value="female" <?php if($m_gender == 'female') echo 'selected'; ?>>หญิง</option>
                        <option value="other" <?php if($m_gender == 'other') echo 'selected'; ?>>อื่นๆ</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="birth_date">วันเกิด</label>
                    <input name="birth_date" type="date" class="form-control" id="birth_date" value="<?php echo $birth_date; ?>" required />
                </div>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success">แก้ไข</button>
                    <a href="index.php" class="btn btn-danger">ยกเลิก</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
