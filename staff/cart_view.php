

<?php include("header.php"); ?>

<?php

 	error_reporting( error_reporting() & ~E_NOTICE );
	session_start();
	$mem_id=$_SESSION['mem_id'];
	$mem_address=$_SESSION['mem_address'];
  $t_name = mysqli_real_escape_string($condb,$_GET['t_name']);
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
              <h3 class="card-title">ยืนยันการสั่งซื้อ</h3>
              <div align="right">
          
                <button type="button" class="btn btn-primary" onclick="window.location='cart.php';"><i class="fa fa-plus"></i> เพิ่มรายการสินค้า</button>
          
              </div>
            </div>
            <br>



              <div class="card-body">

                <div class="col-md-12">

                	<div class="container">
<div class="row">
<div class="col-12 col-sm-12 col-md-12">
<form id="frmcart" name="frmcart" method="post" action="saveorder_c.php">

<h4>รายการสั่งซื้อโต๊ะ <?php echo $t_name;?></h4>

  <table border="0" align="center" class="table table-hover table-bordered table-striped">
    
    <tr>
      <td width="5%" align="center">ลำดับสินค้า</td>
      <td width="10%" align="center">img</td>
      <td width="40%" align="center">สินค้า</td>
      <td width="10%" align="center">ราคา</td>
      <td width="10%" align="center">จำนวน</td>
      <td width="15%" align="center">รวม(บาท)</td>
     
    </tr>
<?php

$total=0;
if(!empty($_SESSION['cart']))
{
	
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql = "SELECT * FROM tbl_product where p_id=$p_id";
		$query = mysqli_query($condb, $sql);
		$row = mysqli_fetch_array($query);
		$sum = $row['p_price'] * $qty;//เอาราคาสินค้ามา * จำนวนในตระกร้า
		$total += $sum; //ราคารวม ทั้ง ตระกร้า
		echo "<tr>";
		echo "<td>" . $i+=1 . "</td>";
		echo "<td>"."<img src='../p_img/".$row['p_img']."' width='100%'>"."</td>";
		echo "<td>" 

		. $row["p_name"] 
		."<br>"
		."สต๊อก "
		.$row['p_qty']
		." รายการ"

		. "</td>";
		echo "<td align='right'>" .number_format($row["p_price"],2) . "</td>";
		echo "<td align='right'>"; 



		$pqty = $row['p_qty'];//ประกาศตัวแปรจำนวนสินค้าใน stock
		echo "<input type='number' name='amount[$p_id]' value='$qty' size='2'class='form-control' min='0'max='$pqty' readonly /></td>";


		echo "<td align='right'>".number_format($sum,2)."</td>";
		//remove product
	
	}
	echo "<tr>";
	
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
  	echo "<td  align='center'><b>ราคารวม</b></td>";
  	echo "<td align='right'colspan='2'>"."<b>".number_format($total,2)."</b>"."</td>";
  	
	echo "</tr>";
}
?>

</table>

<?php if ($mem_id != ''){?>

<div class="form-group row">
 <label for="" class="col-sm-2 col-form-label">รวมทั้งสิ้น (บาท)</label>
    <div class="col-sm-5">
    <input type="text" name="pay_amount" readonly class="form-control" id="" 
    value="<?php echo ($total); ?>" placeholder="">
    </div>
</div>

<div class="form-group row">
 <label for="" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-5">
    <input type="hidden" name="mem_id" value="<?php echo $mem_id;?>">

	<button type="submit" class="btn  btn-primary btn-block" >บันทึกออเดอร์</button>
</div>
	

<?php }else{?>
	<a href="#" target="" class="btn btn-success" onclick="window.print()">Print</a>

<?php }?>
<input type="hidden" name="t_name" value="<?php echo $_GET['t_name'];?>">

</form>
		</div>
	</div>
</div>

              	</div>
              
              </div>

        
		<div class="card-footer">
             
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