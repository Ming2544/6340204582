<?php
  $q = (isset($_GET['q']) ? $_GET['q'] : '');
  include("backend/con_db.php");
  if($q==''){
  $sql = "SELECT * FROM tbl_product as p
          INNER JOIN tbl_type as t ON p.type_id=t.type_id
          ORDER BY p.p_id DESC"; // เรียกข้อมูลมาแสดงทั้งหมด
  }else if($q!=''){
    $sql = "SELECT * FROM tbl_product as p
    INNER JOIN tbl_type as t ON p.type_id=t.type_id
    WHERE p.p_name like '%$q%'  
    ORDER BY p.p_id DESC"; // เรียกข้อมูลมาแสดงทั้งหมด
  }
  $member_id = isset($_SESSION['member_id'])?$_SESSION['member_id']:"";
  $result = mysqli_query($conn, $sql);
  while ($row_prd = mysqli_fetch_array($result)) {
?>
<div class="col-md-3 menu-wrapper mb-3" align="center">
    <div class="card border-Light mb-1" style="width: 15rem;">
        <br>
        <img class="card-img-top">
        <a href=""> <?php echo "<img src='backend/p_img/".$row_prd['p_img']."' width='200' height='200'>"; ?></a>
        <div class="card-body">
            <a href="prd.php?id=<?php echo $row_prd[0]; ?>"><b> <?php echo $row_prd["p_name"]; ?></b> </a>
            <br>
            ราคา <font color=""> <?php echo $row_prd["p_price"]; ?></font> บาท
            <br>
            คงเหลือ <?php echo $row_prd["p_qty"]; ?> <?php echo $row_prd["p_unit"]; ?>
            <br>

            <form action="add_to_cart.php" method="POST">
    <input type="hidden" name="p_id" value="<?php echo $row_prd['p_id']; ?>">
    <input type="hidden" name="p_name" value="<?php echo $row_prd['p_name']; ?>">
    <input type="hidden" name="p_price" value="<?php echo $row_prd['p_price']; ?>">
    <input type="hidden" name="p_qty" value="1"> 

    <?php if ($row_prd['p_qty'] > 0): // ตรวจสอบว่าสินค้ามีในสต็อกหรือไม่ ?>
        <?php if ($member_id != ''): // ตรวจสอบว่าผู้ใช้ล็อกอินแล้วหรือไม่ ?>
            <button type="submit" class="btn btn-success btn-sm">เพิ่มลงตะกร้า</button>
        <?php endif; ?>
    <?php else: ?>
        <button type="button" class="btn btn-secondary btn-sm" disabled>สินค้าหมด</button>
    <?php endif; ?>
</form>


            <br>
            <button type="button" class="btn btn-info btn-sm">
                <a href="prd.php?id=<?php echo $row_prd[0]; ?>" style="color:aliceblue">รายละเอียด</a>
            </button>
        </div>
        <br>
    </div>
</div>
<?php } ?>
