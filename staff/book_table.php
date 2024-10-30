<?php $menu ="table"; ?>

<?php
require_once '../condb.php';
//query
$query = "SELECT * FROM tbl_table ORDER BY table_id ASC";
$result = mysqli_query($condb, $query);
$row = mysqli_fetch_array($result);
?>

<?php include("header.php"); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <h1>ระบบแคชเชียร์ : จองโต๊ะล่วงหน้า *จองวันต่อวัน</h1>
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
                  <!-- booking.php?id='.$row["id"].'&act=booking   ของจองโต๊ะ -->
                    <?php foreach ($result as  $row) {
                      $cartCheck  = $condb->query("SELECT * FROM tbl_cart WHERE table_id = " . $row["table_id"]);
                      if ($cartCheck->num_rows >= 1) { // มีลูกค้า
                        echo '<div class="col-2 col-md-2 col-sm-2" style="margin: 5px;">';
                        echo '<a href="new_table_sale.php?id=' . $row["table_id"] . '&act=booking" class="btn btn-warning disabled" style="padding: 1.5rem 3rem">' . $row['table_name'] . '</a></div>';
                      } else if ($row['table_status'] == 0) { //ว่าง
                        echo '<div class="col-2 col-md-2 col-sm-2" style="margin: 5px;">';
                        echo '<a href="book_table_into.php?id=' . $row["table_id"] . '&act=booking" class="btn btn-success" style="padding: 1.5rem 3rem">' . $row['table_name'] . '</a></div>';
                      } else { //ถูกจอง
                        echo '<div class="col-2 col-md-2 col-sm-2" style="margin: 5px;">';
                        echo '<a href="" class="btn btn-primary disabled" style="padding: 1.5rem 3rem">' . $row['table_name'] . '</a></div>';
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
  
  <!-- form book -->
  <div class="modal fade" id="exampleModal_b" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <form action="member_db.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="member" value="add">
        <div class="modal-content">
          <div class="modal-header bg-dark">
            <h5 class="modal-title" id="exampleModalLabel">จองโต๊ะล่วงหน้า</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">โต๊ะ </label>
              <div class="col-sm-10">
                <input type="number" name="table" class="form-control" id="mem_name" placeholder="" disabled value="<?php echo $row['table_name'];?>">
              </div>
            </div>
            
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">จำนวนลูกค้า (คน) </label>
              <div class="col-sm-10">
                <input type="number" name="no" class="form-control" id="mem_name" placeholder="" value="2">
              </div>
            </div>
            
          </span>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">ชื่อลูกค้า </label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control" id="mem_username" placeholder="ชื่อลูกค้า" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">เบอร์โทร </label>
            <div class="col-sm-10">
              <input type="text" name="tel" class="form-control" id="mem_password" placeholder="เบอร์ติดต่อ" value="" required minlength="10" maxlength="10">
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">วันที่ </label>
            <div class="col-sm-10">
              <input type="date" name="date" class="form-control" id="mem_password" required value="<?php echo date('Y-m-d');?>" min="<?php echo date('Y-m-d');?>" max="<?php echo date('Y-m-d');?>">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
          <button type="submit" class="btn btn-primary"> ยืนยัน</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- end form book -->

  
  <?php include('footer.php'); ?>
  <script>
  $(function () {
  $(".datatable").DataTable();
  });
  </script>
  
</body>
</html>