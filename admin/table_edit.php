<?php 
$menu = "list_tables"
?>
<?php include("header.php"); ?>

<?php 

$table_id = $_GET['table_id'];

$query_table = "SELECT * FROM tbl_table WHERE table_id = $table_id"  
or die("Error : ".mysqlierror($query_table));
$rs_table = mysqli_query($condb, $query_table);
$row=mysqli_fetch_array($rs_table);
//echo $row['table_name'];
//echo ($query_table);//test query




?>


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h1>Table</h1>
      </div><!-- /.container-fluid -->
    </section>



    <!-- Main content -->
    <section class="content">

    <div class="card card-gray">
            <div class="card-header ">
              <h3 class="card-title">แก้ไขข้อมูลโต๊ะ</h3>
              
            </div>
            <br>
            <div class="card-body">

              <div class="row">
                 
                 <div class="col-md-8">
                   <form action="table_db.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="table" value="edit">
                    <input type="hidden" name="table_id" value="<?php echo $row['table_id'];?>">
                    
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ชื่อโต๊ะ </label>
                    <div class="col-sm-10">
                      <input type="text" name="table_name" class="form-control" id="table_name" placeholder="" value="<?php echo $row['table_name'];?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">สถานะ </label>
                    <div class="col-sm-10">
                      <input type="text" name="table_status" class="form-control" id="table_status" placeholder="" value="<?php echo $row['table_status'];?>">
                    </div>
                  </div>

                  <button type="submit" class="btn btn-danger btn-block">Update</button>


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