<?php
$menu = "list_tables"
?>

<?php include("header.php"); ?>

<?php
$query_table = "SELECT * FROM tbl_table" or die
("Error : ".mysqlierror($query_table));
$rs_table = mysqli_query($condb, $query_table);
//echo ($query_level);//test query
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>จัดการข้อมูลโต๊ะ</h1>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="card card-gray">
      <div class="card-header ">
        <h3 class="card-title">ข้อมูลโต๊ะ</h3>
        <div align="right">
         
          <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> เพิ่มโต๊ะ</button>
          
        </div>
      </div>
      <br>
      <div class="card-body">
        <div class="row">
          <div class="col-md-8">
            <table id="example1" class="table table-bordered  table-hover table-striped">
              <thead>
                <tr class="danger">
                  <th width="5%"><center>No.</center></th>
                  <th width="30%">Name</th>
                  <th width="10%">Status</th>
                  <th width="10%">edit</th>
                  <th width="10%">del</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php foreach ($rs_table as $row_table) { ?>
                <tr>
                  <td><?php echo $row_table['table_id']; ?></td>
                  <td><?php echo $row_table['table_name']; ?></td>
                  <td><?php echo $row_table['table_status']; ?></td>
                  <td><a href="table_edit.php?table_id=<?php echo $row_table['table_id']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> edit</a></td>
                  <td><a href="table_db.php?table_id=<?php echo $row_table['table_id']; ?>&&table=del" class="del-btn btn btn-danger" onclick="return confirm('ต้องการลบข้อมูลนี้ใช่หรือไม่')"><i class="fas fas fa-trash"></i> del</a></td>
                  
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
      <form action="table_db.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="table" value="add">
        <div class="modal-content">
          <div class="modal-header bg-dark">
            <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล สมาชิก</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">ชื่อโต๊ะ </label>
                <div class="col-sm-10">
                  <input type="text" name="table_name" class="form-control" id="table_name" placeholder="" value="<?php echo $row['table_name'];?>">
                </div>
            </div>
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
});
</script>

</body>
</html>