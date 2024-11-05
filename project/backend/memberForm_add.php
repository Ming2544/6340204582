
<?php include('h.php'); ?>
<form name="register" action="member_form_add_db.php" method="POST" class="form-horizontal">
    <div class="form-group">
        <div class="col-sm-5" align="left">
            <input name="m_user" type="text" required class="form-control" id="m_user" placeholder="Username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2" />
        </div>
    </div> 
    <div class="form-group">
        <div class="col-sm-5" align="left">
            <input name="m_pass" type="password" required class="form-control" id="m_pass" placeholder="Password" pattern="^[a-zA-Z0-9]+$" minlength="2" />
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-5" align="left">
            <input name="m_name" type="text" required class="form-control" id="m_name" placeholder="ชื่อ-สกุล" />
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-5" align="left">
            <input name="m_email" type="email" class="form-control" id="m_email" placeholder="อีเมล์ name@hotmail.com"/>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-5" align="left">
            <input name="m_tel" type="text" class="form-control" id="m_tel" placeholder="เบอร์โทร ตัวเลขเท่านั้น" />
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-5" align="left">
            <textarea name="m_address" class="form-control" id="m_address" required placeholder="ที่อยู่"></textarea> 
        </div>
    </div>
    
    <div class="form-group">
            <div class="col-sm-3" align=""> เพศ </div>
            <div class="col-sm-17" align="left">
                <select name="m_gender" class="form-control" required>
                    <option value="">-- กรุณาเลือกเพศ --</option>
                    <option value="male">ชาย</option>
                    <option value="female">หญิง</option>
                    <option value="other">อื่นๆ</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-4" align=""> วันเกิด </div>
            <div class="col-sm-17" align="left">
                <input name="birth_date" type="date" required class="form-control" />
            </div>
        </div>

    <div class="form-group">
        <div class="col-sm-5" align="right">
            <button type="submit" class="btn btn-success" id="btn"><span class="glyphicon glyphicon-ok"></span> เพิ่มสมาชิก</button>
        </div>     
    </div>
</form>
