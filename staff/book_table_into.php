<?php $menu ="table"; ?>

<?php
  //เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
  require_once '../condb.php';
  //query
  $table_id = $_GET['id'];
  $query = "SELECT * FROM tbl_table WHERE table_id = $table_id"  or die("Error : ".mysqlierror($query_product));
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
      <form action="save_booking.php" method="post">

        <div class="form-group row">
          <label class="col-sm-2 ">เลขโต๊ะ</label>
          <div class="col-sm-10">
            <input type="text" name="table_name" class="form-control" disabled value="<?php echo $row_table['table_name'];?>">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 ">ชื่อลูกค้า/ผู้จอง</label>
          <div class="col-sm-10">
            <input type="text" name="booking_name" class="form-control" required placeholder="ชื่อผู้จอง" minlength="5">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 ">จำนวนลูกค้า (คน)</label>
          <div class="col-sm-10">
            <input type="number" name="person" class="form-control" required placeholder="" value="2" min="1" max="5">
          </div>
        </div>
        
        <div class="form-group row">
          <label class="col-sm-2 ">วันที่</label>
          <div class="col-sm-10">
            <input type="date" name="booking_date" class="form-control" required value="<?php echo date('Y-m-d');?>" min="<?php echo date('Y-m-d');?>" max="<?php echo date('Y-m-d');?>">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 ">เวลา</label>
            <div class="col-sm-10">
              <input type="time" name="booking_time" class="form-control" required placeholder="เวลา">
            </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 ">เบอร์โทร</label>
          <div class="col-sm-10">
            <input type="text" name="booking_phone" id="booking_phone" class="form-control" required placeholder="เบอร์โทร" minlength="10" maxlength="10">
          </div>
        </div>

        <div class="modal-footer">
            <input type="hidden" name="table_id" value="<?php echo $_GET['id'];?>">
            <a href="book_table.php" class="btn btn-secondary">ปิด</a>
          <button type="submit" class="btn btn-success">บันทึกการจอง</button>
          <br>
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
  vscode-file://vscode-app/c:/Users/kitti/AppData/Local/Programs/Microsoft%20VS%20Code/resources/app/out/vs/code/electron-sandbox/workbench/workbench.html //   "autoWidth": false,
    // http://fordev22.com/
    // });
    });
  </script>

  <script>
    var input = document.getElementById("booking_phone");
    input.onkeydown = function(e) {
        if (48 > e.which || e.which > 57) {
            if ( e.key.length === 1 ) e.preventDefault();
        }
    };
  </script>
  
</body>
</html>
<!-- http://fordev22.com/ -->