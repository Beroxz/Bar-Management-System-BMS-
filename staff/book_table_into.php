<?php $menu ="index"; ?>

<?php
//เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
require_once '../condb.php';
//query
$table_id = $_GET['id'];
$query = "SELECT * FROM tbl_booking WHERE table_id = $table_id
"  or die("Error : ".mysqlierror($query_product));
$result = mysqli_query($condb, $query);
$row = mysqli_fetch_array($result);
?>

<?php 
  $query = "SELECT * FROM tbl_table WHERE table_id = $table_id";
  $result = mysqli_query($condb, $query);
  $row_table = mysqli_fetch_array($result);
?>

<?php include("header.php"); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
   
</section>
  <!-- Main content -->
  <section class="content">
    <div class="card card-gray">
      <div class="card-header ">
        <h5 class="modal-title" id="exampleModalLabel">จองโต๊ะ</h5>
      </div>
      <br>
      <div class="card-body">
          
      <div class="modal-dialog modal-lg" role="document">
      <form action="member_db.php" method="POST" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-body">
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">โต๊ะ </label>
              <div class="col-sm-10">
                <input type="text" name="table" class="form-control" id="table_name" placeholder="" disabled value="<?php echo $row_table['table_name'];?>">
              </div>
            </div>            
          </span>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">ชื่อลูกค้า </label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control" id="booking_name"  placeholder="ชื่อลูกค้า" value="<?php echo $row['booking_name'];?>">
            </div>
          </div>
          <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">จำนวนลูกค้า (คน) </label>
              <div class="col-sm-10">
                <input type="number" name="no" class="form-control" id="number" placeholder="" value="2" min='0'>
              </div>
            </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">เบอร์โทร </label>
            <div class="col-sm-10">
              <input type="text" name="tel" class="form-control" id="booking_phone"  placeholder="เบอร์โทร" value="<?php echo $row['booking_phone'];?>" required minlength="10" maxlength="10">
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">วันที่จอง </label>
            <div class="col-sm-10">
              <input type="date" name="date" class="form-control" id="booking_date" required value="<?php echo date('Y-m-d');?>" min="<?php echo date('Y-m-d');?>" max="<?php echo date('Y-m-d');?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">เข้ารับโต๊ะเวลา </label>
            <div class="col-sm-10">
              <input type="text" name="date" class="form-control" id="booking_time" disabled required value="20:00">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a href="book_table.php" class="btn btn-secondary">ปิด</a>
          <button type="submit" class="btn btn-primary"> ยืนยัน</button>
        </div>
      </div>
    </form>
  </div>

      </div>
      <div class="card-footer">
        
      </div>
      
    </div>
    
    
  </section>
  <!-- /.content -->
  
  
  <?php include('footer.php'); ?>
  <script>
  $(function () {
  $(".datatable").DataTable();
  // $('#example2').DataTable({
  //   "paging": true,
  //   "lengthChange": false,
  //   "searching": false,
  //   "ordering": true,
  //   "info": true,
  //   "autoWidth": false,
  // http://fordev22.com/
  // });
  });
  </script>
  
</body>
</html>
<!-- http://fordev22.com/ -->