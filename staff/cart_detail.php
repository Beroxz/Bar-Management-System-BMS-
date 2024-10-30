<?php include("header.php"); ?>
<?php
          $order_id = mysqli_real_escape_string($condb,$_GET['order_id']);
          $table_name = mysqli_real_escape_string($condb,$_GET['t_name']);
          //echo $order_id;
		      $sqlpay = "SELECT d.* , p.* ,
            m.mem_name,o.order_date,o.order_status,o.pay_amount2
            FROM tbl_order_detail AS d
            INNER JOIN tbl_product AS p ON d.p_id=p.p_id
            INNER JOIN tbl_order AS o ON d.order_id=o.order_id
            INNER JOIN tbl_member as m ON o.mem_id=m.mem_id
            WHERE d.order_id=$order_id";

            $querypay = mysqli_query($condb, $sqlpay) 
            or die("Error : ".mysqli_error($sqlpay));

            $rowmember=mysqli_fetch_array($querypay);
            $st=$rowmember['order_status'];

    ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>รายงานการสั่งซื้อ</h1>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="card card-gray">
      <div class="card-header ">
        <div  align="right">
            <button type="button" class="btn btn-primary" onclick="window.location='cart_more.php?t_name=<?php echo $table_name; ?>&oid=<?php echo $order_id; ?>&act=add-more-product';"><i class="fa fa-plus"></i> เพิ่มรายการสินค้า</button>
            <button type="button" class="btn btn-danger" onclick="window.location='#'"><i class="fa fa-trash"></i> ยกเลิกออเดอร์</button>
          </div>
      </div>
      <br>
      <div class="card-body">
        <div class="row">
          
          <div class="col-md-12">

          


    <center>
      <h4>รายการสั่งซื้อ ร้าน BarCode <br>
        เลขที่บิล : <?php echo $order_id; ?> </br>
        รายการโต๊ะ : <?php echo $table_name; ?></br>
        เวลา : <?php echo date('d/m/y h:m:s',strtotime($rowmember['order_date'])); ?> </br>  
        ผู้ทำรายการ : <?php echo $rowmember['mem_name']; ?> <br/>
        สถานะ : <?php include('mystatus.php');?>
      </h4>
    </center>

      <table border="0" align="center" class="table table-hover table-bordered table-striped">
        
        <tr>
      <td width="5%" align="center">ลำดับสินค้า</td>
          <td width="10%" align="center">img</td>
          <td width="35%" align="center">สินค้า</td>
          <td width="10%" align="center">ราคา/หน่วย</td>
          <td width="10%" align="center">จำนวน</td>
          <td width="15%" align="center">รวม(บาท)</td>
        
        </tr>
    <?php
        
            $total=0;

      
      foreach($querypay as $rspay)
      {
        
        
        $total += $rspay['total']; //ราคารวม ทั้ง ตระกร้า
        echo "<tr>";
        echo "<td>" . @$i+=1 . "</td>";
        echo "<td>"."<img src='../p_img/".$rspay['p_img']."' width='100%'>"."</td>";
        echo "<td>" . $rspay["p_name"] . "</td>";
        echo "<td align='right'>" .number_format($rspay["p_price"],2) . "</td>";
        echo "<td align='right'>"; 



        
        echo "<input type='number' name='p_c_qty' value='$rspay[p_c_qty]' size='2'class='form-control' disabled/></td>";


        echo "<td align='right'>".number_format($rspay['total'],2)."</td>";
      
      
      }
      include('convertnumtothai.php');
      ?>

      <tr>
      
      <td></td>
      
        <td  align='right' colspan="4">
          <b>ราคารวม 
            <!-- ( <?php echo Convert($total);?> ) -->

          </b>

          <br>


        </td>


        <td align='right'colspan='2'>


          <b><?php echo number_format($total,2);?> Baht</b>

          



        </td>
        
      </tr>


      

      

    </table>
    <br>

    <a href="#" target="" class="btn btn-success" onclick="window.print()">Print</a>
      
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
<!-- http://fordev22.com/ -->