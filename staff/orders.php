<?php $menu = "orders"; ?>

<?php include("header.php"); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>ออเดอร์ปัจจุบัน</h1>
  </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
  <div class="card card-gray">
    <div class="card-header ">
      <h3 class="card-title">ลำดับออเดอร์</h3>
      <div align="right">

      </div>
    </div>
    <br>
    <div class="card-body">
      <div class="row">

        <div class="col-md-12">
          <?php

          $query_my_order = "SELECT * FROM tbl_cart ORDER BY id  ASC"
            or die("Error : " . mysqlierror($query_my_order));
          $rs_my_order = mysqli_query($condb, $query_my_order);
          //echo ($query_my_order);//test query

          $i = 0;

          ?>

          <table id="example1" class="table table-bordered  table-hover table-striped">
            <thead>
              <tr class="danger">
                <th width="7%">
                  <center>No.</center>
                </th>
                <th width="20%">โต๊ะ</th>
                <th width="20%">จำนวนคน</th>
                <th width="10%">Date & Time</th>
                <th width="10%"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($rs_my_order as $rs_order) {
                $tableQuery =  $condb->query("SELECT * FROM tbl_table WHERE table_id = " . $rs_order["table_id"]);
                $table_data = $tableQuery->fetch_assoc();
                $i = $i + 1;
              ?>


                <tr>

                  <td><?php echo $i; ?></td>
                  <td><?php echo $table_data["table_name"]; ?>

                  </td>

                  <td>
                    <?php echo $rs_order["person"]; ?>
                  </td>

                  <td><?php echo date('d/m/y H:i:s', strtotime($rs_order['date'])); ?></td>

                  <td>
                    <a href="confirm_c.php?table_id=<?php echo $rs_order["table_id"]; ?>" class="btn btn-primary btn-xs">จัดการออเดอร์</a>
                  </td>

                </tr>

              <?php } ?>
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


<?php include('footer.php'); ?>
<script>
  $(function() {
    $(".datatable").DataTable();
  });
</script>

</body>

</html>