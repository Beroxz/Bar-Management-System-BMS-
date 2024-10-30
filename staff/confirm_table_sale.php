<?php $menu ="index"; ?>

<?php
//เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
require_once '../condb.php';
//query
$table_id = $_GET['id'];
$query = "SELECT * FROM tbl_booking WHERE table_id = $table_id
"  or die("Error : ".mysqlierror($query));
$result = mysqli_query($condb, $query);
$row = mysqli_fetch_array($result);
?>

<?php 
  $query = "SELECT * FROM tbl_table WHERE table_id = $table_id";
  $result = mysqli_query($condb, $query);
  $row_table = mysqli_fetch_array($result);
?>

<?php
	
	$act = mysqli_real_escape_string($condb,$_GET['act']);
	
	if (isset($_GET['id']) && $_GET['id']=='cancel'){ 

	$query = "DELETE FROM tbl_booking WHERE table_id=$table_id";

  echo "<script type='text/javascript'>";
	echo "window.location = 'index.php?product_del=product_del'; ";
	echo "</script>";
  }

?>

<?php include("header.php"); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
   
</section>
  <!-- Main content -->
  <section class="content">
    <div class="card card-gray">
      <div class="card-header ">
        <h5 class="modal-title" id="exampleModalLabel">สั่งอาหาร | ยกเลิกการจอง</h5>
      </div>
      <br>
      <div class="card-body">
          
      <div class="modal-dialog modal-lg" role="document">
      <form action="list_l.php" method="POST" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-body">
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">โต๊ะ </label>
              <div class="col-sm-10">
                <input type="text" name="table" class="form-control" id="table_name" placeholder="" disabled value="<?php echo $row_table['table_name'];?>">
              </div>
            </div>
            
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">จำนวนลูกค้า (คน) </label>
              <div class="col-sm-10">
                <input type="number" name="no" class="form-control" id="number" placeholder="" min='0' value="<?php echo $row['person'];?>">
              </div>
            </div>
            
          </span>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">ชื่อลูกค้า </label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control" id="booking_name" disabled placeholder="" value="<?php echo $row['booking_name'];?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">เบอร์โทร </label>
            <div class="col-sm-10">
              <input type="text" name="tel" class="form-control" id="booking_phone" disabled placeholder="" value="<?php echo $row['booking_phone'];?>" required minlength="10" maxlength="10">
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">วัน/เวลาจอง </label>
            <div class="col-sm-10">
              <input type="text" name="date" class="form-control" id="booking_date" required value="<?php echo $row['dateCreate'];?>">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a href="index.php" class="btn btn-secondary">ปิด</a>
          <input type="button" name="btcancel" id="buttonu" value="ยกเลิกการจอง" class="btn btn-danger" onclick="window.location='?table_id=<?php echo $row['table_id']; ?>&table=cancel';" />
          <button type="submit" class="btn btn-success"> สั่งอาหาร</button>
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