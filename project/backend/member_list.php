<?php
include('h.php');
//1. เชื่อมต่อ database:
include('con_db.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้านี้

//2. query ข้อมูลจากตาราง tbl_member:
$query = "SELECT * FROM tbl_member ORDER BY member_id ASC" or die("Error:" . mysqli_error($conn));

//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result
$result = mysqli_query($conn, $query);

//4. แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล
echo '<table id="member" class="table table-bordered table-striped">';
//หัวข้อตาราง
echo "
<thead>
<th>id</th>
<th>m_user</th>
<th>m_pass</th>
<th>m_name</th>
<th>m_email</th>
<th>m_address</th>
<th>m_tel</th>  
<th>edit</th>
<th>delete</th>                 
</thead>
<tbody>"; 

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";  // เพิ่ม <tr> ที่นี่เพื่อให้ข้อมูลถูกต้อง
    echo "<td>" . $row["member_id"] .  "</td>";
    echo "<td>" . $row["m_user"] .  "</td>";
    echo "<td>" . $row["m_pass"] .  "</td>";
    echo "<td>" . $row["m_name"] .  "</td>";
    echo "<td>" . $row["m_email"] .  "</td>";
    echo "<td>" . $row["m_address"] .  "</td>";
    echo "<td>" . $row["m_tel"] .  "</td>";  // แสดงหมายเลขโทรศัพท์
    
    //แก้ไขข้อมูล
    echo "<td><a href='member.php?act=edit&ID={$row['member_id']}' class='btn btn-warning btn-xs'>แก้ไข</a></td>";
    
    //ลบข้อมูล
    echo "<td><a href='member_del.php?ID={$row['member_id']}' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td>";
    echo "</tr>";
}
echo "</tbody>"; // ปิด <tbody>
echo "</table>";

//5. close connection
mysqli_close($conn);
?>
