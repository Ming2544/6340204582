<div class="col-md-16">
    <form name="register" action="member_form_add_db.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-15" align="left">
                <h4> สมัครสมาชิก </h4>
                <hr>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-1" align=""> Username </div>
            &nbsp;&nbsp;&nbsp;<font color="red">** หมายเหตุ: กรุณากรอกชื่อผู้ใช้ ** </font>
            <div class="col-sm-17" align="left">
                <input name="m_user" type="text" required class="form-control" />
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-3" align=""> Password </div>
            &nbsp;&nbsp;&nbsp;<font color="red">** หมายเหตุ: กรุณากำหนดรหัส ** </font>
            <div class="col-sm-17" align="left">
                <input name="m_pass" type="password" required class="form-control" id="m_pass" />
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-6" align=""> ชื่อ-สกุล </div>
            &nbsp;&nbsp;&nbsp;<font color="red">** หมายเหตุ: กรุณากรอกชื่อจริง ** </font>
            <div class="col-sm-17" align="left">
                <input name="m_name" type="text" required class="form-control" id="m_name" placeholder="ชื่อ-นามสกุล" />
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-3" align=""> อีเมล  </div>
            &nbsp;&nbsp;&nbsp;<font color="red">** หมายเหตุ: กรุณากรอกอีเมลจริง ** </font>
            <div class="col-sm-17" align="left">
                <input name="m_email" type="email" class="form-control" id="m_email" required placeholder="name@hotmail.com" />
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-6 align=""> เบอร์โทรศัพท์  </div>
            &nbsp;&nbsp;&nbsp;<font color="red">** หมายเหตุ: กรุณากรอกเบอร์โทรจริง ** </font>
            <div class="col-sm-17" align="left">
                <input name="m_tel" type="text" class="form-control" id="m_tel" required placeholder="ตัวเลขเท่านั้น" maxlength="10" pattern="^[0-9]+$" title="ตัวเลขเท่านั้น" />
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-3" align=""> ที่อยู่ </div>
            &nbsp;&nbsp;&nbsp;<font color="red">** หมายเหตุ: กรุณากรอกที่อยู่จริง ** </font>
            <div class="col-sm-17" align="left">
                <textarea name="m_address" class="form-control" id="m_address" required></textarea>
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
            <div class="col-sm-3"></div>
            <div class="col-sm-17" align="right">
                <button type="submit" class="btn btn-success" id="btn"><span class="glyphicon glyphicon-saved"></span> สมัครสมาชิก  
                </button> 
                <a href="index.php" type="button" class="btn btn-danger" id="btn"><span class="glyphicon glyphicon-saved"></span> ยกเลิก</a>
            </div>
        </div>
    </form>
</div>
