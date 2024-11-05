<?php
      include('h.php');
                //1. เชื่อมต่อ database:
                include('con_db.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง tb_admin:
                $query = "SELECT * FROM tbl_admin ORDER BY a_id ASC" or die("Error:".mysqli_error($conn));
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($conn,$query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                echo ' <table id="admin" class="table table-bordered table-striped">';
                  //หัวข้อตาราง 
                    echo "
                      <thead bgcolor ='#29eec8'>
                      <th>id</td>
                      <th>a_user</th>
                      <th>a_pass</th>
                      <th>a_name</th>
                      <th>edit</th>
                      <th>delete</th>
                    </thead>";
                
                  while($row = mysqli_fetch_array($result)) {
                  echo "<tbody>";
                    echo "<td>" .$row["a_id"] .  "</td> ";
                    echo "<td>" .$row["a_user"] .  "</td> ";
                    echo "<td>" .$row["a_pass"] .  "</td> ";
                    echo "<td>" .$row["a_name"] .  "</td> ";
                    //แก้ไขข้อมูล
                    echo "<td><a href='admin.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a></td> ";
                    
                    //ลบข้อมูล
                    echo "<td><a href='admin_del.php?ID=$row[0]' onclick=\"return confirm('Do you want to dele
                    te this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
                  echo "</tr>";
                  }
                echo "</table>";
                //5. close connection
                mysqli_close($conn);
                ?> 