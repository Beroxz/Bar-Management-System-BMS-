<?php $menu ="index"; ?>

<?php
//เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
require_once '../condb.php';
//query
$query = "SELECT * FROM tbl_table ORDER BY id ASC";
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
                      if($row['table_status']==0){ //ว่าง
                        echo '<div class="col-2 col-md-2 col-sm-2" style="margin: 5px;">';
                        echo '<button style="padding: 1.5rem 3rem" type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" >'.$row['table_name'].'</button></div>';
                        }else{ //ถูกจอง
                        echo '<div class="col-2 col-md-2 col-sm-2" style="margin: 5px;">';
                        echo '<button style="padding: 1.5rem 3rem" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_c">'.$row['table_name'].'</button></div>';
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
  
  <!-- end form new customer -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <form action="member_db.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="member" value="add">
        <div class="modal-content">
          <div class="modal-header bg-dark">
            <h5 class="modal-title" id="exampleModalLabel">เปิดโต๊ะ รับลูกค้าใหม่</h5>
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
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> ยืนยัน</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- end form new customer -->

<!-- form confirm booking -->
<div class="modal fade" id="exampleModal_c" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <form action="member_db.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="member" value="add">
        <div class="modal-content">
          <div class="modal-header bg-dark">
            <h5 class="modal-title" id="exampleModalLabel">สั่งอาหาร | ยกเลิกการจอง</h5>
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
              <input type="text" name="name" class="form-control" id="mem_username" disabled placeholder="ชื่อลูกค้า" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">เบอร์โทร </label>
            <div class="col-sm-10">
              <input type="text" name="tel" class="form-control" id="mem_password" disabled placeholder="เบอร์ติดต่อ" value="" required minlength="10" maxlength="10">
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
          <button type="submit" class="btn btn-danger"> ยกเลิกการจอง</button>
          <button type="submit" class="btn btn-success"> สั่งอาหาร</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- end form confirm booking -->
  

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