<?php
//เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
require_once 'condb.php';

//print_r($_POST);

if (isset($_POST['table_id']) && isset($_POST['booking_name']) && isset($_POST['booking_date'])) {
	
//ประกาศตัวแปรรับค่าจากฟอร์ม

$booking_name = $_POST['booking_name'];
$person = $_POST['person'];
$booking_date = $_POST['booking_date'];
$booking_time = $_POST['booking_time'];
$booking_phone = $_POST['booking_phone'];
$table_id = $_POST['table_id'];
$dateCreate = date('Y-m-d H:i:s'); //วันที่บันทึก

//insert booking
mysqli_query($condb, "BEGIN");
$sqlInsertBooking	= "INSERT INTO  tbl_booking values(null, '$table_id', '$booking_name', '$person', '$booking_date', '$booking_time', '$booking_phone', '$dateCreate')";
$rsInsertBooking	= mysqli_query($condb, $sqlInsertBooking);
 
//การใช้ Transection ประกอบด้วย  BEGIN COMMIT ROLLBACK 

//update table status
$sqlUpdate ="UPDATE tbl_table SET table_status=1 WHERE table_id = $table_id"; //1=จอง
$rsUpdate = mysqli_query($condb, $sqlUpdate);


if($rsInsertBooking && $rsUpdate){ //ตรรวจสอบถ้า 2 ตัวแปรทำงานได้ถูกต้องจะทำการบันทึก แต่ถ้าเกิดข้อผิดพลาดจะ Rollback คือไม่บันทึกข้อมูลใดๆ
		mysqli_query($condb, "COMMIT");
		echo 'บันทึกข้อมูลการจองเรียบร้อยแล้ว <a href="book.php"> กลับหน้าหลัก </a>';
	}else{
		mysqli_query($condb, "ROLLBACK");  
		$msg = 'บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ  <a href="book.php"> กลับหน้าหลัก </a>';	
	}
} //iset 
else{
	header("Location: book.php");	
}

?>