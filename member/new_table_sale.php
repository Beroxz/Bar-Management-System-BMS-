<?php $menu = "index"; ?>

<?php
//เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
require_once '../condb.php';
//query
$query = "SELECT * FROM tbl_table WHERE table_id = $_GET[id]";
$result = mysqli_query($condb, $query);
$row = mysqli_fetch_array($result);
?>
<?php include("header.php"); ?>

<script>
  function redirectPath(path) {
    let pathname = window.location.pathname;
    let parts = pathname.split('/');
    parts = parts.slice(1);
    let desiredPath = '/' + parts.slice(0, 2).join('/');
    window.location.href = desiredPath + "/" + path;
  }
</script>
<?php
$table_id = $_GET["id"];
$query = $condb->query("SELECT * FROM tbl_cart WHERE table_id = " . $table_id);
if ($query->num_rows >= 1) {
?>
  <script>
    redirectPath("cart.php?table_id=<?php echo $table_id; ?>")
  </script>
<?php
  die();
}
if (isset($_POST["submit"])) {
  $person = $_POST["person"];
  $condb->query("INSERT INTO tbl_cart (table_id, person) VALUES ($table_id, $person)");
  $sql_conf = "UPDATE tbl_table SET table_status = 2 WHERE table_id=$table_id";
	$result_conf = mysqli_query($condb, $sql_conf) or die ("Error in query: $sql_conf ". mysqli_error());
?>
  <script>
    redirectPath("cart.php?table_id=<?php echo $table_id; ?>")
  </script>
<?php
  die();
}
?>

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
        <form method="POST">
          <input type="hidden" name="member" value="add">
          <div class="modal-content">
            <div class="modal-body">
              <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">โต๊ะ </label>
                <div class="col-sm-10">
                  <input type="text" name="table_id" class="form-control" id="table_name" placeholder="" disabled value="<?php echo $row['table_name']; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">จำนวนลูกค้า (คน) </label>
                <div class="col-sm-10">
                  <input type="number" name="person" class="form-control" id="mem_name" placeholder="" value="2" min='1' max='5'>
                </div>
              </div>
              </span>
            </div>
            <div class="modal-footer">  
              <input type="submit" class="btn btn-success" name="submit" value="สั่งอาหาร"></input>
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
  $(function() {
    $(".datatable").DataTable();
  });
</script>

</body>

</html>