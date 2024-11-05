<?php 
require_once('backend/con_db.php');
session_start();
$query_typeprd = "SELECT * FROM tbl_type ORDER BY type_id ASC";
$typeprd = mysqli_query($conn, $query_typeprd) or die ("Error in query: $query_typeprd " . mysqli_error($conn));
$row_typeprd = mysqli_fetch_assoc($typeprd);
$member_id = isset($_SESSION['member_id']) ? $_SESSION['member_id'] : "";
$m_name = isset($_SESSION['m_name']) ? $_SESSION['m_name'] : '';
$totalRows_typeprd = mysqli_num_rows($typeprd);
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <nav class="navbar navbar-expand-lg navbar-info bg-warning">
        <a class="navbar-brand btn btn-Light" href="index.php" role="button">หน้าหลัก</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle btn btn-Light" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ประเภทสินค้า
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php do { ?>
                  <a class="dropdown-item" href="index.php?act=showbytype&type_id=<?php echo $row_typeprd['type_id']; ?>">
                    <?php echo $row_typeprd['type_name']; ?>
                  </a>
                <?php } while ($row_typeprd = mysqli_fetch_assoc($typeprd)); ?>
              </div>
            </li>

            <?php if ($member_id == '') { ?>
              <li class="nav-item">
                <a class="nav-link btn btn-Light" href="index.php?act=add" role="button">สมัครสมาชิก</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-Light" href="login.php" role="button">เข้าสู่ระบบ</a>
              </li>
            <?php } else { ?>
              <li class="nav-item">
                <a class="nav-link btn btn-Light" href="cart.php" role="button">ตะกร้าสินค้า</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-Light" href="logout.php" role="button" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่ ?')">ออกจากระบบ</a>
              </li>
            <?php } ?>

            <li class="nav-item">
              <a class="nav-link btn btn-Light" href="logniadmin.php" role="button">admin</a>
            </li>
          </ul>

          <form class="form-inline my-2 my-lg-0" name="qp" action="index.php" method="GET">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" name="q">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </div>
  </div>
</div>
