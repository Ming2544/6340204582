<?php
include('con_db.php');  //ไฟล์เชื่อมต่อกับ database
$p_id = $_GET["ID"];

// query ข้อมูลจากตารางสินค้า
$sql = "SELECT p.*, t.type_name
        FROM tbl_product as p
        INNER JOIN tbl_type as t ON p.type_id = t.type_id
        WHERE p.p_id = '$p_id'
        ORDER BY p.type_id ASC";
$result2 = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));
$row = mysqli_fetch_array($result2);
extract($row);

// query ข้อมูลประเภทสินค้า
$query = "SELECT * FROM tbl_type ORDER BY type_id ASC" or die("Error:" . mysqli_error($conn));
$result = mysqli_query($conn, $query);
?>

<div class="container">
  <div class="row">
    <form name="addproduct" action="product_form_edit_db.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
      <div class="form-group">
        <div class="col-sm-9">
          <p>ชื่อสินค้า</p>
          <input type="text" name="p_name" class="form-control" required placeholder="ชื่อสินค้า" value="<?php echo htmlspecialchars($p_name); ?>">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-6">
          <p>ประเภทสินค้า</p>
          <select name="type_id" class="form-control" required>
            <option value="<?php echo $row["type_id"]; ?>">
              <?php echo $row["type_name"]; ?>
            </option>
            <?php foreach ($result as $results) { ?>
            <option value="<?php echo $results["type_id"]; ?>">
              <?php echo $results["type_name"]; ?>
            </option>
            <?php } ?>
          </select>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-6">
          <p>ราคา (บาท)</p>
          <input type="number" name="p_price" class="form-control" required placeholder="ราคา" min="1" value="<?php echo $p_price; ?>">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <p>รายละเอียดสินค้า</p>
          <textarea name="p_detail" rows="5" cols="60"><?php echo htmlspecialchars($p_detail); ?></textarea>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <p>ภาพสินค้า</p>
          <img src="p_img/<?php echo $row['p_img']; ?>" width="100px"><br><br>
          <input type="file" name="p_img" id="p_img" class="form-control" />
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <input type="hidden" name="p_id" value="<?php echo $p_id; ?>" />
          <input type="hidden" name="img2" value="<?php echo $p_img; ?>" />
          <button type="submit" class="btn btn-success" name="btnadd">บันทึก</button>
        </div>
      </div>
    </form>
  </div>
</div>
