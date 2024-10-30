<?php

error_reporting(error_reporting() & ~E_NOTICE);
session_start();


$p_id = mysqli_real_escape_string($condb, $_GET['p_id']);
$actdd = mysqli_real_escape_string($condb, 'add');
$act = mysqli_real_escape_string($condb, $_GET['act']);

if ($actdd == 'add' && !empty($p_id)) //เช็คว่า $act=='add' และ p_id ไม่ใช่ค้าว่างให้ทำเงื่อนไข
{
	$productCheck = $condb->query("SELECT * FROM tbl_cart_item WHERE table_id=$table_id AND product_id= $p_id");
	if ($productCheck->num_rows == 0) {
		$condb->query("INSERT INTO tbl_cart_item (table_id, product_id, qty) VALUES ($table_id, $p_id, 1)");
	} else {
		$condb->query("UPDATE tbl_cart_item SET qty = qty + 1 WHERE table_id=$table_id AND product_id= $p_id");
	}
}



if ($act == 'remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
{
	$condb->query("DELETE FROM tbl_cart_item WHERE table_id=$table_id AND product_id= $p_id");
}


if ($act == 'update') {
	$amount_array = $_POST['amount'];
	foreach ($amount_array as $p_id => $amount) {
		$condb->query("UPDATE tbl_cart_item SET qty = " . $amount . " WHERE table_id=$table_id AND product_id= $p_id");
		//$_SESSION['cart'][$p_id] = $amount;
	}
}


if ($act == 'cancel')  //ยกเลิกออเดอร์
{
	$condb->query("DELETE FROM tbl_cart_item WHERE table_id=$table_id");
	$condb->query("DELETE FROM tbl_cart WHERE table_id=$table_id");
	$sql_cancel = "UPDATE tbl_table SET table_status = 0 WHERE table_id=$table_id";
	$result_cancel = mysqli_query($condb, $sql_cancel) or die ("Error in query: $sql_cancel ". mysqli_error());
?>
	<script>
		redirectPath("index.php")
	</script>
<?php
}

?>

<form id="frmcart" name="frmcart" method="post" action="?table_id=<?php echo $table_id; ?>&b_id=<?php echo $b_id; ?>=1&act=update">
	<h4>รายการสั่งซื้อโต๊ะ <?php echo $table_data["table_name"]; ?></h4>
	<br>
	<table border="0" align="center" class="table table-hover table-bordered table-striped">

		<tr>
			<td width="1%">#</td>

			<td width="20%">สินค้า</td>
			<td width="3%">ราคา</td>
			<td width="15%">จำนวน</td>
			<td width="3%">รวม(บาท)</td>
			<td width="3%">ลบ</td>
		</tr>
		<?php

		$total = 0;
		$ii = 0;
		$query = $condb->query("SELECT * FROM tbl_cart_item WHERE table_id = $table_id");
		if ($query->num_rows >= 1) {
			while ($cart_item = $query->fetch_assoc()) {
				$p_id = $cart_item["product_id"];
				$productQuery = $condb->query("SELECT * FROM tbl_product where p_id=" . $p_id);
				$product = $productQuery->fetch_assoc();
				$qty = $cart_item["qty"];
				$sum = $product['p_price'] * $qty; //เอาราคาสินค้ามา * จำนวนในตระกร้า
				$total += $sum; //ราคารวม ทั้ง ตระกร้า
				echo "<tr>";
				echo "<td>" . $ii += 1 . "</td>";

				echo "<td>" . $product["p_name"]. "</td>";
				echo "<td align='right'>" . number_format($product["p_price"], 2) . "</td>";
				echo "<td align='right'>";



				$pqty = $product['qty']; //ประกาศตัวแปรจำนวนสินค้าใน stock
				echo "<input type='number' name='amount[$p_id]' value='$qty' size='2'class='form-control' min='0'max='$pqty'/>";


				echo "<td align='right'>" . number_format($sum, 2) . "</td>";

				//remove product
				echo "<td align='center'><a href='cart.php?table_id=$table_id&p_id=$p_id&act=remove' class='btn btn-danger btn-xs'>ลบ</a></td>";
				echo "</tr>";
			}
			echo "<tr>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";

			echo "<td bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
			echo "<td align='right' bgcolor='#CEE7FF'>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";
			echo "<td align='left' bgcolor='#CEE7FF'></td>";
			echo "</tr>";
		}
		?>

	</table>
	<p align="right">
		<!-- <a href="cart.php" class="btn btn-info">กลับหน้ารายการสินค้า</a> -->


		<!-- <a href="#" target="" class="btn btn-success" onclick="window.print()">Print</a> -->

		<input type="button" name="btcancel" id="buttonu" value="ยกเลิกออเดอร์" class="btn btn-danger" onclick="window.location='cart.php?<?php echo 'table_id=' . $table_id ?>&act=cancel';" />
		<input type="submit" name="buttonu" id="buttonu" value="อัพเดตรายการ" class="btn btn-warning" />
		<?php if($act=='update'){ ?>
			<input type="button" name="Submit2" value="สั่งซื้อ" onclick="window.location='confirm_c.php?table_id=<?php echo $table_id; ?>';" class="btn btn-primary" />
		<?php } ?>
		
		<input type="hidden" name="table_id" value="<?php echo $table_id; ?>">
		<input type="hidden" name="t_id" value="<?php echo $t_id; ?>">
		<input type="hidden" name="b_id" value="<?php echo $b_id; ?>">




	</p>
</form>