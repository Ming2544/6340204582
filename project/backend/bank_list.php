<?php 
include('h.php');

if (@$_GET['do'] == 'success') {
    echo '<script type="text/javascript">
          swal("", "ทำรายการสำเร็จ !!", "success");
          </script>';
    echo '<meta http-equiv="refresh" content="1;url=bank.php" />';
} else if (@$_GET['do'] == 'finish') {
    echo '<script type="text/javascript">
          swal("", "แก้ไขสำเร็จ !!", "success");
          </script>';
    echo '<meta http-equiv="refresh" content="1;url=bank.php" />';
} else if (@$_GET['do'] == 'wrong') {
    echo '<script type="text/javascript">
          swal("", "รหัสผ่านใหม่ไม่ตรงกัน !!", "warning");
          </script>';
    echo '<meta http-equiv="refresh" content="1;url=bank.php" />';
} else if (@$_GET['do'] == 'error') {
    echo '<script type="text/javascript">
          swal("", "ผิดพลาด !!", "error");
          </script>';
    echo '<meta http-equiv="refresh" content="1;url=bank.php" />';
}

$query = "SELECT * FROM tbl_bank ORDER BY b_id DESC" or die("Error:" . mysqli_error($conn));
$result = mysqli_query($conn, $query);

echo '<table id="banktable" class="table table-bordered table-striped">';
echo "<thead>";
echo "
      <tr>
      <th width='5%'>ID</th>
      <th width='15%' class='hidden-xs'>ชื่อธนาคาร</th>
      <th width='15%'>เลขบัญชี</th>
      <th width='20%'>ประเภท/สาขา</th>
      <th width='15%'>ชื่อ-นามสุกล</th>
      <th width='7%'>จัดการ</th>
      </tr>";
echo "</thead>";
echo "<tbody>";
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row["b_id"] . "</td>";
    // echo "<td class='hidden-xs'><img src='./b_logo/" . $row['b_logo'] . "' width='50%'></td>";
    echo "<td class='hidden-xs'>" . $row["b_name"] . "</td>";
    echo "<td>" . $row["b_number"] . "</td>";
    echo "<td>" . $row["b_type"] . "/สาขา " . $row["bn_name"] . "</td>";
    echo "<td>" . $row["b_owner"] . "</td>";
    echo "<td class='text-center'>  <!-- Center-align the button container -->
            <a href='bank.php?act=edit&ID={$row['b_id']}' class='btn btn-warning btn-xs'>
                <i class='fas fa-edit' style='font-size: 14px;'></i> <!-- Adjust icon size -->
            </a>
            
            <a href='bank_del_db.php?ID={$row['b_id']}' onclick=\"return confirm('ยันยันการลบ')\" class='btn btn-danger btn-xs'>
                <i class='fas fa-trash' style='font-size: 14px;'></i> <!-- Adjust icon size -->
            </a>
          </td>";
    echo "</tr>"; // Close the row after each entry
}
echo "</tbody>"; // Close the tbody
echo "</table>";
mysqli_close($conn);
?>
