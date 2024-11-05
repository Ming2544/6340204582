<?php
include('h.php');
include("backend/con_db.php");
?>
<!DOCTYPE html>
<head>
  <?php include('boot4.php'); ?>
  <style>
    .menu {
      margin-top: 10px;
      background-color: #f8f9fa;
      padding: 15px;
      border-radius: 5px;
    }
    .product-content {
      display: flex;
      flex-wrap: wrap;
      justify-content: center; /* จัดให้อยู่กลาง */
    }
  </style>
</head>
<body>
<?php
  include('banner.php');
  include('navbar.php');
?>
  <div class="container-fluid">
    <div class="row">
      <?php if ($member_id != '') { ?>
        <div class="col-md-3 ">
        สวัสดีคุณ <?php echo ($m_name); ?>
            <?php include('menu.php'); ?> 
          
        </div>
      <?php } ?>

      <!-- คอลัมน์สำหรับสินค้าที่อยู่ตรงกลาง -->
      <div class="col-md-<?php echo ($member_id != '') ? '7' : '12'; ?> d-flex justify-content-center">
        <div class="row product-content">
          <?php
          $act = (isset($_GET['act']) ? $_GET['act'] : '');
          $q = (isset($_GET['q']) ? $_GET['q'] : '');
          if ($act == 'showbytype') {
            include('list_prd_by_type.php');
          } else if ($q != '') {
            include("show_product.php");
          } else if ($act == 'add') {
            include("member_form_add.php");
          } else {
            include('show_product.php');
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
        // เมื่อพิมพ์ข้อความในช่องค้นหา
        $('#search_query').on('keyup', function() {
            var query = $(this).val();
            if (query.length > 2) { // ค้นหาหลังจากพิมพ์ 3 ตัวอักษรขึ้นไป
                $.ajax({
                    url: 'search_backend.php',
                    method: 'POST',
                    data: {query: query},
                    success: function(data) {
                        $('#result').html(data);
                    }
                });
            } else {
                $('#result').html('');
            }
        });
    });
  </script>
</body>
</html>
