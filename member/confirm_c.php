
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

<script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
    $('#blah').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
    }
  }
</script>

<?php
$act = mysqli_real_escape_string($condb, $_GET['act']);
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

error_reporting(error_reporting() & ~E_NOTICE);
session_start();
$mem_id = $_SESSION['mem_id'];
$mem_address = $_SESSION['mem_address'];
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>รายการสินค้าที่สั่งซื้อทั้งหมด</h1>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">


  <div class="card card-gray">
    <div class="card-header ">
      
      <div align="right">

        <button type="button" class="btn btn-primary" onclick="window.location='cart.php?table_id=<?php echo $table_id; ?>';"><i class="fa fa-plus"></i> เพิ่มรายการสินค้า</button>
        <button type="button" class="btn btn-danger" onclick="window.location='cart.php?<?php echo 'table_id=' . $table_id ?>&act=cancel';"><i class="fa fa-trash"></i> ยกเลิกออเดอร์</button>

      </div>
    </div>
    <br>

    <div class="card-body">

      <div class="col-md-12">

        <div class="container">
          <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
              <form id="frmcart" name="frmcart" method="post" action="saveorder_c.php">
                <?php if ($_id != '') { ?>

                  <h4>ยืนยันรายการสั่งซื้อ<br>
                    ผู้ซื้อ : <?php echo $row_member['mem_name']; ?> <br />Address : <?php echo $row_member['mem_address']; ?>
                  </h4>
                <?php } ?>
                <h4>รายการสั่งซื้อโต๊ะ <?php echo $table_data["table_name"]; ?></h4>
                <table border="0" align="center" class="table table-hover table-bordered table-striped">

                  <tr>
                    <td width="5%" align="center">ลำดัยสินค้า</td>
                    <td width="10%" align="center">img</td>
                    <td width="40%" align="center">สินค้า</td>
                    <td width="10%" align="center">ราคา</td>
                    <td width="10%" align="center">จำนวน</td>
                    <td width="15%" align="center">รวม(บาท)</td>

                  </tr>
                  <?php

                  $total = 0;
                  $i = 0;
                  $query = $condb->query("SELECT * FROM tbl_cart_item WHERE table_id = $table_id");
                  if ($query->num_rows >= 1) {
                    while ($cart_item = $query->fetch_assoc()) {
                      $qty = $cart_item["qty"];
                      $p_id = $cart_item["product_id"];
                      $productQuery = $condb->query("SELECT * FROM tbl_product where p_id=" . $p_id);
                      $product = $productQuery->fetch_assoc();
                      $sum = $product['p_price'] * $qty; //เอาราคาสินค้ามา * จำนวนในตระกร้า
                      $total += $sum; //ราคารวม ทั้ง ตระกร้า
                      echo "<tr>";
                      echo "<td>" . $i += 1 . "</td>";
                      echo "<td>" . "<img src='../p_img/" . $product['p_img'] . "' width='100%'>" . "</td>";
                      echo "<td>"

                        . $product["p_name"]
                        . "<br>"
                        . "สต๊อก "
                        . $product['p_qty']
                        . " รายการ"

                        . "</td>";
                      echo "<td align='right'>" . number_format($product["p_price"], 2) . "</td>";
                      echo "<td align='right'>";



                      $pqty = $product['p_qty']; //ประกาศตัวแปรจำนวนสินค้าใน stock
                      echo "<input type='number' name='amount[$p_id]' value='$qty' size='2'class='form-control' min='0'max='$pqty' readonly /></td>";


                      echo "<td align='right'>" . number_format($sum, 2) . "</td>";
                      //remove product

                    }
                    echo "<tr>";

                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td  align='center'><b>ราคารวม</b></td>";
                    echo "<td align='right'colspan='2'>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";

                    echo "</tr>";
                  }
                  ?>

                </table>

                <?php if ($mem_id != '') { ?>

                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ยอดเงินที่ต้องชำระ</label>
                    <div class="col-sm-5">
                      <input type="text" name="pay_amount" readonly class="form-control" id="" value="<?php echo ($total); ?>" placeholder="">
                    </div>
                  </div>


                  <input type="hidden" min="<?php echo $total; ?>" name="pay_amount2" required id="" placeholder="" value="<?php echo $total; ?>">

                  <input type="hidden" name="table_id" value="<?php echo $table_id; ?>">

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-5">
                      <div class="row">

                        <div class="col-6">
                          <button type="button" class="btn  btn-primary btn-block " onclick="window.location='confirm_c.php?<?php echo 'table_id=' . $table_id ?>&act=cash';">เงินสด</button>
                        </div>

                        <div class="col-6">
                          <button type="button" class="btn btn-success btn-block " onclick="window.location='confirm_c_prompt.php?<?php echo 'table_id=' . $table_id ?>&total=<?php echo ($total); ?>&act=promptpay';">QrCode-PromptPay</button>
                        </div>

                      </div>

                    </div>

                    <input type="hidden" name="mem_id" value="<?php echo $mem_id; ?>">

                  <?php } else { ?>
                    <a href="#" target="" class="btn btn-success" onclick="window.print()"></a>
                  <?php } ?>

                </div>
                
                
                <?php if($act=='cash'){ ?>
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">รับเงินมา (บาท)</label>
                      <div class="col-sm-5">
                        <input type="number" min="<?php echo $total; ?>" name="pay_amount2" required class="form-control" id="" 
                        placeholder="">
                      </div>
                      <div class="col-sm-5">
                      <div class="row">

                        <div class="col-3">
                          <button type="submit" class="btn btn-secondary btn-block ">Cash</button>
                        </div>

                      </div>

                    </div>
                      
                  </div>
                <?php } ?>

 
                <?php if($act=='promptpay'){ ?>
                  <div class="form-group row">
                    <div class="col-sm-4 ">
                          <?php include('../PromptPay-QR/promptPay.php'); ?>
                        </div>
                    <div class="col-sm-8 ">
                    <br>
                      <label class="col-sm-5 col-form-label">ชื่อธนาคาร : รัชพล กิตติธรรม</label><br>
                      <label class="col-sm-5 col-form-label">เลข PromptPay : 0944465110</label><br>
                      <!-- <form action=".php" method="POST" enctype="multipart/form-data">
                        <div class="col-sm-6">
                        <label for="" class="col-sm-ค col-form-label">หลักฐานการชำระเงิน</label><br>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="mem_img" name="mem_img" onchange="readURL(this);" >
                            <label class="custom-file-label" for="file">Choose file</label>
                          </div>
                          <br><br>
                          <img id="blah" src="#" alt="" width="300" />
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">ยืนยัน</button>
                      </form> -->
                      <br>
                      <button type="submit" class="btn btn-secondary">ยืนยันการทำรายการ</button>
                    </div>
                <?php } ?>
                  
              </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  <div class="card-footer"></div>

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