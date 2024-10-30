<?php $menu ="index"; ?>

<?php
//เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
require_once '../condb.php';
//query
$query = "SELECT * FROM tbl_table WHERE table_id = $_GET[id]";
$result = mysqli_query($condb, $query);
$row = mysqli_fetch_array($result);
?>

<?php include("header.php"); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
   
</section>
  <!-- Main content -->
  <section class="content">
    <div class="card card-gray">
      <div class="card-header ">
        <h5 class="modal-title" id="exampleModalLabel">เปิดโต๊ะ รับลูกค้าใหม่</h5>
      </div>
      <br>
      <div class="card-body">
          
          <div class="modal-dialog modal-lg" role="document">
            <form action="cart.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="member" value="add">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">โต๊ะ </label>
                    <div class="col-sm-10">
                      <input type="text" name="table" class="form-control" id="table_name" placeholder="" disabled value="<?php echo $row['table_name'];?>">
                    </div>
                  </div>
                  
                  
                </span>
                
              </div>
              <div class="modal-footer">
                <a href="index.php" type="button" class="btn btn-secondary" >ปิด</a>
                <button type="submit" class="btn btn-success"></i>สั่งอาหาร</button>
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