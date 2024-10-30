<?php $menu = "index"; ?>

<?php
//เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
require_once '../condb.php';
//query
$query = "SELECT * FROM tbl_table ORDER BY table_id ASC";
$result = mysqli_query($condb, $query);
?>

<?php include("header.php"); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>ระบบแคชเชียร์ : กรุณาเลือกโต๊ะก่อนบันทึกรายการอาหาร</h1>
    <br>
    <h4><i class="fa fa-circle" aria-hidden="true" style="color:green"></i> = ว่าง, <i class="fa fa-circle" aria-hidden="true" style="color: #f39c12"></i> = มีลูกค้า, <i class="fa fa-circle" aria-hidden="true" style="color: #6666ff"></i> = จอง</h4></span>
  </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
  <div class="card card-gray">
    <div class="card-header ">
      <h3 class="card-title">แสดงรายการโต๊ะ</h3>
      <div align="right">

      </div>
    </div>
    <br>
    <div class="card-body">
      <div class="row">

        <div class="col-md-12">
          <div class="box">
            <div class="row">
              <div class="col-sm-12">
                <div class="box-body">
                  <div class="row" style="margin-bottom: 20px;">
                    <?php foreach ($result as  $row) {
                      $cartCheck  = $condb->query("SELECT * FROM tbl_cart WHERE table_id = " . $row["table_id"]);
                      if ($cartCheck->num_rows >= 1) { // มีลูกค้า
                        echo '<div class="col-2 col-md-2 col-sm-2" style="margin: 5px;">';
                        echo '<a href="new_table_sale.php?id=' . $row["table_id"] . '&act=booking" class="btn btn-warning" style="padding: 1.5rem 3rem">' . $row['table_name'] . '</a></div>';
                      } else if ($row['table_status'] == 0) { //ว่าง
                        echo '<div class="col-2 col-md-2 col-sm-2" style="margin: 5px;">';
                        echo '<a href="new_table_sale.php?id=' . $row["table_id"] . '" class="btn btn-success" style="padding: 1.5rem 3rem">' . $row['table_name'] . '</a></div>';
                      } else { //ถูกจอง
                        echo '<div class="col-2 col-md-2 col-sm-2" style="margin: 5px;">';
                        echo '<a href="confirm_table_sale.php?id=' . $row["table_id"] . '&act=booking" class="btn btn-primary" style="padding: 1.5rem 3rem">' . $row['table_name'] . '</a></div>';
                      }
                    } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

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