<?php

    error_reporting( error_reporting() & ~E_NOTICE );
	session_start();
	
	
	$p_id = mysqli_real_escape_string($condb,$_GET['p_id']);
	$actdd = mysqli_real_escape_string($condb,'add'); 
	$act = mysqli_real_escape_string($condb,$_GET['act']);

	if($actdd=='add' && !empty($p_id))//เช็คว่า $act=='add' และ p_id ไม่ใช่ค้าว่างให้ทำเงื่อนไข
	{
		if(isset($_SESSION['cart'][$p_id]))//ถ้าเจอ p_id ในตระกร้า 
		{
			$_SESSION['cart'][$p_id]++;//ให้เพิ่มทีละ 1 
		}
		else//ถ้าไม่เจอให้สินค้าที่ส่งมานั้น  
		{
			$_SESSION['cart'][$p_id]=1;//ให้สินค้านั้นเท่ากับๅ
		}
	}



	if($act=='remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['cart'][$p_id]);
	}

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $p_id=>$amount)
		{
			$_SESSION['cart'][$p_id]=$amount;
		}
	}

	
	if($act=='cancel')  //ยกเลิกออเดอร์
	{
		unset($_SESSION['cart']);
	}

?>

<form id="frmcart" name="frmcart" method="post" action="?b_id=<?php echo $b_id;?>=1&act=update">
	<h4>รายการสั่งซื้อหน้าร้าน</h4>
	<br>
  <table border="0" align="center" class="table table-hover table-bordered table-striped">
    
    <tr>
      <td width="1%" >#</td>
      
      <td width="20%" >สินค้า</td>
      <td width="3%" >ราคา</td>
      <td width="15%" >จำนวน</td>
      <td width="3%" >รวม(บาท)</td>
      <td width="3%" >ลบ</td>
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
		echo "<td>" . $ii+=1 . "</td>";
		
		echo "<td>" . $row["p_name"] . "</td>";
		echo "<td align='right'>" .number_format($row["p_price"],2) . "</td>";
		echo "<td align='right'>"; 



		$pqty = $row['p_qty'];//ประกาศตัวแปรจำนวนสินค้าใน stock
		echo "<input type='number' name='amount[$p_id]' value='$qty' size='2'class='form-control' min='0'max='$pqty'/>";


		echo "<td align='right'>".number_format($sum,2)."</td>";

		//remove product
		echo "<td align='center'><a href='list_l.php?p_id=$p_id&act=remove' class='btn btn-danger btn-xs'>ลบ</a></td>";
        echo "</tr>";


	}
	echo "<tr>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
	
  	echo "<td bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
  	echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
  	echo "<td align='left' bgcolor='#CEE7FF'></td>";
	echo "</tr>";
}
?>

</table>
<p align="right">
<!-- <a href="list_l.php" class="btn btn-info">กลับหน้ารายการสินค้า</a> -->


<!-- <a href="#" target="" class="btn btn-success" onclick="window.print()">Print</a> -->

	<input type="button" name="btcancel" id="buttonu" value="ยกเลิกออเดอร์" class="btn btn-danger" onclick="window.location='list_l.php?act=cancel';" />
	<input type="submit" name="buttonu" id="buttonu" value="อัพเดตรายการ" class="btn btn-warning" />
    <?php if($act=='update'){ ?>
		<input type="button" name="Submit2" value="สั่งซื้อ" onclick="window.location='confirm_a.php'" class="btn btn-primary" />	
	<?php } ?>

	<input type="hidden" name="t_id" value="<?php echo $t_id;?>">
	<input type="hidden" name="b_id" value="<?php echo $b_id;?>">
		



</p>
</form>