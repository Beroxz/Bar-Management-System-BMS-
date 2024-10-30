<?php
include("../condb.php");
//error_reporting( error_reporting() & ~E_NOTICE );
session_start();

$mem_id = $_SESSION['mem_id'];
if (@$_SESSION['mem_id'] == '') {

	session_destroy();

	echo '<script>';
	echo "alert('ไม่สำเร็จ');";
	echo "window.location='index.php';";
	echo '</script>';
}
?>

<!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
<?php
$table_id = $_REQUEST["table_id"];
$mem_id = $_REQUEST["mem_id"];
$receive_name = 'ลูกค้านั่งโต๊ะ';


$order_status = 2;

$b_name = 'ชำระ PromptPay';

$pay_amount = $_REQUEST["pay_amount"]; //ยอดเงินรวม
$pay_amount2 = $_REQUEST["pay_amount"]; //ยอดเงินที่ต้องจ่าย

$order_date = Date("Y-m-d G:i:s");





//บันทึกการสั่งซื้อลงใน order
mysqli_query($condb, "BEGIN");
$sql1	= "INSERT INTO tbl_order 
	VALUES
	(null, 
	'$mem_id',
	'$receive_name',
	
	 
	'$order_status', 
	
	'$b_name', 
	
	 
	'$pay_amount', 
	'$pay_amount2',
	
	'$order_date'
	)";
$query1	= mysqli_query($condb, $sql1)
	or die("Error : " . mysqlierror($sql1));


//ฟังก์ชั่น MAX() จะคืนค่าที่มากที่สุดในคอลัมน์ที่ระบุ ออกมา หรือจะพูดง่ายๆก็ว่า ใช้สำหรับหาค่าที่มากที่สุด นั่นเอง.
$sql2 = "SELECT MAX(order_id) as order_id 
	FROM tbl_order 
	WHERE mem_id='$mem_id'";
$query2	= mysqli_query($condb, $sql2) or die("Error : " . mysqlierror($sql2));
$row = mysqli_fetch_array($query2);
$order_id = $row["order_id"];

// echo "order_id" . " = " . $row["order_id"];
// exit();

$query = $condb->query("SELECT * FROM tbl_cart_item WHERE table_id = $table_id");
while ($cart_item = $query->fetch_assoc()) {
	//query3 เพื่อให้รู้ว่า ใน ตระกร้าสินค้า มีการสั่งซื้อสินค้าอะไรบ้าง เพื่อให้เอาราคาสินค้าต่อหน่วย มาคูณกับ จำนวนสั่งซื้อทั้งหมดและเก็บลงตาราง order_detail
	$qty = $cart_item["qty"];
	$p_id = $cart_item["product_id"];
	$productQuery = $condb->query("SELECT * FROM tbl_product where p_id=" . $p_id);
	$count = mysqli_num_rows($productQuery); //นับว่ามีการqueryได้ไหม
	$product = $productQuery->fetch_assoc();
	/*
	$sql3	= "SELECT * FROM tbl_product WHERE p_id=$p_id";
	$query3	= mysqli_query($condb, $sql3) or die("Error : " . mysqlierror($sql3));
	$row3	= mysqli_fetch_array($query3);
	*/
	$total	= $product['p_price'] * $qty;



	$sql4	= "INSERT INTO tbl_order_detail 
				   VALUES (null,
				   '$order_id', 
				   '$p_id', 
				   '$qty', 
				   '$total'
				   )";
	$query4	= mysqli_query($condb, $sql4) or die("Error : " . mysqlierror($sql4));

	// echo $sql4;

	//ตัดสต๊อก
	for ($i = 0; $i < $count; $i++) {
		$have =  $product['p_qty'];

		$stc = $have - $qty;

		$sql5 = "UPDATE tbl_product SET  
		     p_qty=$stc
		     WHERE  p_id=$p_id ";
		$query5 = mysqli_query($condb, $sql5) or die("Error : " . mysqlierror($sql5));


		// echo "ยอดคงเหลือ" . $stc;
		// echo "<hr>";
	}

	/*   stock  */
}

//ถ้าทำงานครบตามเงื่อนไข
if ($query1 && $query4) {
	$condb->query("DELETE FROM tbl_cart_item WHERE table_id=$table_id");
	$condb->query("DELETE FROM tbl_cart WHERE table_id=$table_id");
	$condb->query("DELETE FROM tbl_booking WHERE table_id=$table_id");
	$condb->query("UPDATE tbl_table SET table_status=0 WHERE table_id=$table_id");

	mysqli_query($condb, "COMMIT"); //จะ COMMIT บันทึกสำเร็จคือบันทึก sql1 กับ sql4 แล้ว
	$msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
} else {
	mysqli_query($condb, "ROLLBACK");
	//$msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";	
}

?>

<script type="text/javascript">
	//alert("<?php echo $msg; ?>");
	// window.location ='index.php?save_ok=save_ok';
	window.location = 'bill_order.php?order_id=<?php echo $order_id; ?>&act=view&&save_ok=save_ok';
</script>