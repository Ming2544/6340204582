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
      <div class="col-md-6">
        <a href="type.php?act=add" class="btn btn-info btn-sm">เพิ่ม</a>
        <p></p>
        <?php
        $act = isset($_GET['act']) ? $_GET['act'] : '';
        if ($act == 'add') {
          include('type_form_add.php');
        } elseif ($act == 'edit') {
           include('type_form_edit.php');
        } else {
          include('type_list.php');
        }
        ?>
      </div>
    </div>
  </div>
  <script>
  DataTable.types().forEach(type => {
  DataTable.type(type, 'detect', () => false);
});
    let table = new DataTable('#typetable', {
    // config options...
});
  </script>
</body>
</html>