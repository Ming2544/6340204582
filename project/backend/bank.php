<!DOCTYPE html>
<html>
<head>
  <?php
   include('h.php'); 
   error_reporting(error_reporting() & ~E_NOTICE);
   ?> 
</head>
<body>
  <div class="container">
    <?php include('navbar.php'); ?>
    <p></p>
    <div class="row">
      <div class="col-md-3">
      สวัสดี คุณ <?php echo $a_name; ?> 
        <?php include('menu_left.php'); ?>
      </div>
      <div class="col-md-9">
        <a href="bank.php?act=add" class="btn btn-info btn-sm">เพิ่มธนาคาร</a>
        <p></p>
        <?php
        $act = isset($_GET['act']) ? $_GET['act'] : '';
        if ($act == 'add') {
          include('bankForm_add.php');
        } elseif ($act == 'edit') {
           include('bank_form_edit.php');
        } else {
          include('bank_list.php');
        }
        ?>
      </div>
    </div>
  </div>
  <script>
  DataTable.types().forEach(type => {
  DataTable.type(type, 'detect', () => false);
});
    let bank = new DataTable('#banktable', {
    // config options...
});
  </script>
</body>
</html>