<?php
$menu = "type"
?>

<?php include("header.php"); ?>

<?php
$query_type = "SELECT * FROM tbl_type" or die
("Error : ".mysqlierror($query_typeber));
$rs_type = mysqli_query($condb, $query_type);
//echo ($query_level);//test query
?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">

</script>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>จัดการประเภทสินค้า</h1>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="card card-gray">
      <div class="card-header ">
        <h3 class="card-title">ประเภทสินค้า</h3>
        <div align="right">
         
          <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> เพิ่มประเภทสินค้า</button>
          
        </div>
      </div>
      <br>
      <div class="card-body">
        <div class="row">
          
          <div class="col-md-6">
            <table id="example1" class="table table-bordered  table-hover table-striped">
              <thead>
                <tr class="danger">
                  <th width="8%"><center>No.</center></th>
                  <th width="40%">Type Product</th>
                  <th width="20%">edit</th>
                  <th width="20%">del</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php foreach ($rs_type as $row_type) { ?>
                
                
                <tr>
                  <td><?php echo @$l+=1; ?></td>
                  <td><?php echo $row_type['type_name']; ?></td>
                  <td>
                    <p style="margin-bottom: 10px;">
                      <a href="type_product_edit.php?type_id=<?php echo $row_type['type_id']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> edit</a>
                    </p>
                    
                  </td>
                  <td><a href="type_db.php?type_id=<?php echo $row_type['type_id']; ?>&&type=del" class="del-btn btn btn-danger" onclick="return confirm('ต้องการลบข้อมูลนี้ใช่หรือไม่')"><i class="fas fas fa-trash"></i> del</a></td>
                  
                </tr>
                <?php }?>
              </tbody>
            </table>
            
            
            
          </div>
          
        </div>
      </div>
      <div class="card-footer">
        
      </div>
      
    </div>
    
    
    
    
</section>
  <!-- /.content -->

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <form action="type_db.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="type" value="add">
        <div class="modal-content">
          <div class="modal-header bg-dark">
            <h5 class="modal-title" id="exampleModalLabel">เพิ่มประเภทสินค้า</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">ประเภทสินค้า</label>
              <div class="col-sm-10">
                <input type="text" name="type_name" class="form-control" id="type_name" placeholder="" value="">
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