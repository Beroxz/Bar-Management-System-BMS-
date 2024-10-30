
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
$table_id = $_GET["table_id"];
$query = $condb->query("SELECT * FROM tbl_cart WHERE table_id = " . $table_id);
if ($query->num_rows == 0) {
?>
  <script>
    alert("โปรดเลือกโต๊ะก่อน!")
    redirectPath("index.php")
  </script>
<?php
  die();
}

$query = "SELECT * FROM tbl_table WHERE table_id = $table_id";
$result = $condb->query($query);
$table_data = $result->fetch_assoc();
?>

<?php
$query_product = " SELECT * FROM tbl_product " or die("Error : " . mysqlierror($query_product));
$rs_product = mysqli_query($condb, $query_product);
?>

<?php
$query = mysqli_query($condb, "SELECT COUNT(p_id) FROM `tbl_product`");
$row = mysqli_fetch_row($query);
$rows = $row[0];
$page_rows = 6;  //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า  ตย. 5 record / หน้า 
$last = ceil($rows / $page_rows);

if ($last < 1) {
  $last = 1;
}
$pagenum = 1;
if (isset($_GET['pn'])) {
  $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}
if ($pagenum < 1) {
  $pagenum = 1;
} else if ($pagenum > $last) {
  $pagenum = $last;
}
$limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;
$nquery = mysqli_query($condb, "SELECT * from  tbl_product ORDER BY p_id DESC $limit");

$paginationCtrls = '';
if ($last != 1) {
  if ($pagenum > 1) {
    $previous = $pagenum - 1;
    $paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?table_id=' . $table_id . '&pn=' . $previous . '" class="btn btn-info">Previous</a> &nbsp; ';


    for ($i = $pagenum - 4; $i < $pagenum; $i++) {
      if ($i > 0) {
        $paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?table_id=' . $table_id . '&pn=' . $i . '" class="btn btn-primary">' . $i . '</a> &nbsp; ';
      }
    }
  }

  $paginationCtrls .= '<a href=""class="btn btn-danger">' . $pagenum . '</a> &nbsp; ';

  for ($i = $pagenum + 1; $i <= $last; $i++) {
    $paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?table_id=' . $table_id . '&pn=' . $i . '" class="btn btn-primary">' . $i . '</a> &nbsp; ';
    if ($i >= $pagenum + 4) {
      break;
    }
  }

  if ($pagenum != $last) {
    $next = $pagenum + 1;
    $paginationCtrls .= ' &nbsp;<a href="' . $_SERVER['PHP_SELF'] . '?table_id=' . $table_id . '&pn=' . $next . '" class="btn btn-info">Next</a> ';
  }
}

?>


<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>ระบบแคชเชียร์ : ขายสินค้า</h1>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="card card-gray">
    <div class="card-header ">
    <h3 class="card-title">สินค้า IN STOCK</h3>
      <div align="right">

      </div>
    </div>
    <br>
    <div class="card-body">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-7">
            <?php if ($row > 0) { ?>
              <div class="row">
                <?php while ($rs_prd = mysqli_fetch_array($nquery)) { ?>
                  <div class="col-md-4">
                    <div class="card" style="">
                      <img width="100%" src="../p_img/<?php echo $rs_prd['p_img']; ?>" class="card-img-top" alt="<?php echo $rs_prd['p_name']; ?>" title="<?php echo $rs_prd['p_name']; ?>">
                      <div class="card-body">
                        <h5 class="card-title"><?php echo $rs_prd['p_name']; ?></h5>
                        <p class="card-text"><?php echo number_format($rs_prd['p_price'], 2); ?> Baht</p>

                        <?php if ($rs_prd['p_qty'] > 0) { ?>
                          <center>
                            <br>
                            <a href="cart.php?table_id=<?php echo $table_id ?>&p_id=<?php echo $rs_prd['p_id']; ?>&act=add" class="btn btn-success" target=""><i class="fa fa-shopping-cart"></i> หยิบลงตระกร้า</a>
                          </center>
                        <?php } else { ?>
                          <button class="btn btn-danger" disabled> สินค้าหมด !</button>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                <?php } ?>

              </div>

            <?php } else { ?>
            <?php } ?>
          </div>
          <div class="col-md-5">
            <?php include('cart_a_c.php'); ?>
          </div>
        </div>
      </div>
    </div>

    <div class="card-footer">
      <center>
        <div id="pagination_controls">

          <?php echo $paginationCtrls; ?>

        </div>
      </center>
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