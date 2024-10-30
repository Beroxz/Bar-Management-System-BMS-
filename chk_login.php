<?php 
session_start();
        if(isset($_POST['mem_username'])){
        //connection
                  include("condb.php");
        //รับค่า user & mem_password       
                  $mem_username = mysqli_real_escape_string($condb,$_POST['mem_username']);
                  $mem_password = mysqli_real_escape_string($condb,sha1($_POST['mem_password']));
                  $chk = trim($mem_username) OR trim($mem_password);
                  if($chk==''){
                      echo '<script>';
                        echo "alert(\" username หรือ  mem_password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                      echo '</script>';
                    }//close if chk trim
                    else{
                    //query 
                              $sql="SELECT * FROM tbl_member 
                              WHERE mem_username='".$mem_username."' 
                              AND mem_password='".$mem_password."' ";
                              $result = mysqli_query($condb,$sql);
                              //echo mysqli_num_rows($result);
                              //exit;
                              if(mysqli_num_rows($result)==1){
                                  $row = mysqli_fetch_array($result);
                                  $_SESSION["mem_id"] = $row["mem_id"];
                                  $_SESSION["mem_name"] = $row["mem_name"];
                                  $_SESSION["mem_level"] = $row["mem_level"];
                                  $_SESSION["mem_img"] = $row["mem_img"];
                                  $_SESSION["mem_address"] = $row["mem_address"];
                                  $table = substr($row["mem_name"],2);
                                  
                                  if($_SESSION["mem_level"]=="1"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin.php
                                  
                                    Header("Location: admin/");

                                  }
                                  elseif($_SESSION["mem_level"]=="2"){  

                                    Header("Location: staff/");
                                  }
                                  elseif($_SESSION["mem_level"]=="3"){  

                                    Header("Location: member/new_table_sale.php?id=$table");
                                  }
                              }else{
                                echo "<script>";
                                    echo "alert(\" user หรือ  mem_password ไม่ถูกต้อง\");"; 
                                    echo "window.history.back()";
                                echo "</script>";
                              }
                    }
        }else{
             Header("Location: login.php"); //user & mem_password incorrect back to login again
        }
?>