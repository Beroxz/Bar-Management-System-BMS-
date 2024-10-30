<?php 
include('../condb.php');


if (isset($_POST['type']) && $_POST['type']=="add") {

    $type_name = mysqli_real_escape_string($condb,$_POST["type_name"]);
     
    $sql = "INSERT INTO tbl_type
    (
    type_name
    )
    VALUES
    (
    '$type_name'
    )";
  
    $result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error($condb). "<br>$sql");
  
  
    if($result){
    echo "<script type='text/javascript'>";
    echo "window.location = 'type_product.php?type_add=type_add'; ";
    echo "</script>";
    }else{
    echo "<script type='text/javascript'>";
    echo "window.location = 'type_product.php?type_add_error=type_add_error'; ";
    echo "</script>";
    }

} elseif (isset($_POST['type']) && $_POST['type']=="edit") {

  $type_id = mysqli_real_escape_string($condb,$_POST["type_id"]);
	
	$type_name = mysqli_real_escape_string($condb,$_POST["type_name"]);
	

	$sql = "UPDATE tbl_type SET 
	
	type_name='$type_name'
	
	WHERE type_id=$type_id" ;

	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error($condb). "<br>$sql");
	mysqli_close($condb);
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "window.location = 'type_product_edit.php?type_id=$type_id&&type_product_edit=type_product_edit'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'type_product_edit.php?type_id=$type_id&&type_product_edit_error=type_product_edit_error'; ";
	echo "</script>";
	}

}elseif (isset($_GET['type']) && $_GET['type']=="del"){	

  $type_id  = mysqli_real_escape_string($condb,$_GET["type_id"]);
	$sql_del = "DELETE FROM tbl_type WHERE type_id = $type_id";
	$result_del = mysqli_query($condb, $sql_del) or die ("Error in query: $sql_del ". mysqli_error());	
	mysqli_close($condb);
  
  echo "<script type ='text/javascript'>";
  echo "window.location = 'type_product.php?type_del=type_del';";
  echo "</script>";


}else{

  echo "<script type ='text/javascript'>";
  echo "window.location = 'type_product.php?type_no=type_no';";
  echo "</script>";

}

?>