<?php $menu = "bill_order"; ?>

<?php include("header.php"); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>รายงานการสั่งซื้อ</h1>
  </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
  <div class="card card-gray">
    <div class="card-header ">
      <h3 class="card-title">ลำดับการสั่งซื้อ</h3>
      <div align="right">
        
      </div>
    </div>
    <br>
    <div class="card-body">
      <div class="row">

        <div class="col-md-12">

          <?php
          $act = (isset($_GET['act']) ? $_GET['act'] : '');
          if ($act == 'view') {
            include('order_detail.php');
          } else {
            include('list_order.php');
          }
          ?>

        </div>

      </div>
    </div>
    <div class="card-footer">

    </div>

  </div>




</section>
<!-- /.content -->


<?php include('footer.php'); ?>
<script>
  $(function() {
    $(".datatable").DataTable();
  });
</script>

</body>

</html>