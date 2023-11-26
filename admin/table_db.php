<?php 
include('../condb.php');


if (isset($_POST['table']) && $_POST['table']=="add") {

    $table_name = mysqli_real_escape_string($condb,$_POST["table_name"]);
  
  
  
    $check = "
    SELECT table_name 
    FROM tbl_table  
    WHERE table_name = '$table_name'
    ";
      $result1 = mysqli_query($condb, $check) or die(mysqli_error());
      $num=mysqli_num_rows($result1);
  
      if($num > 0)
      {
        echo "<script>";
        
        echo "window.location = 'list_table.php?table_error=table_error'; ";
        echo "</script>";
      }else{
  
      
    $sql = "INSERT INTO tbl_table
    ( 
    table_name
    )
    VALUES
    (
    '$table_name'
    )";
  
    $result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error($condb). "<br>$sql");
  
    }
  
    if($result){
    echo "<script type='text/javascript'>";
    echo "window.location = 'list_tables.php?table_add=table_add'; ";
    echo "</script>";
    }else{
    echo "<script type='text/javascript'>";
    echo "window.location = 'list_tables.php?table_add_error=table_add_error'; ";
    echo "</script>";
    }

} elseif (isset($_POST['table']) && $_POST['table']=="edit") {

  $table_id = mysqli_real_escape_string($condb,$_POST["table_id"]);
	
	$table_name = mysqli_real_escape_string($condb,$_POST["table_name"]);

  $table_status = mysqli_real_escape_string($condb,$_POST["table_status"]);


	$sql = "UPDATE tbl_table SET 
	
	table_name='$table_name',
  table_status='$table_status'
	
	WHERE table_id=$table_id" ;

	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error($condb). "<br>$sql");
	mysqli_close($condb);
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "window.location = 'table_edit.php?table_id=$table_id&&table_edit=table_edit'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'table_edit.php?table_id=$table_id&&table_edit_error=table_edit_error'; ";
	echo "</script>";
	}

}elseif (isset($_GET['table']) && $_GET['table']=="del"){	

  $table_id  = mysqli_real_escape_string($condb,$_GET["table_id"]);
	$sql_del = "DELETE FROM tbl_table WHERE table_id = $table_id";
	$result_del = mysqli_query($condb, $sql_del) or die ("Error in query: $sql_del ". mysqli_error());	
	mysqli_close($condb);
  
  echo "<script type ='text/javascript'>";
  echo "window.location = 'list_tables.php?table_del=table_del';";
  echo "</script>";


}else{

  echo "<script type ='text/javascript'>";
  echo "window.location = 'list_tables.php?table_no=table_no';";
  echo "</script>";

}

?>