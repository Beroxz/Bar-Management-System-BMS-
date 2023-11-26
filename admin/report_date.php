<?php $menu ="report"; ?>

<?php include("header.php"); ?>

<?php

$query = "SELECT SUM(pay_amount) AS totol,
DATE_FORMAT(order_date, '%d-%M-%Y') AS o_dttm
FROM tbl_order WHERE order_status IN (2,4)
GROUP BY DATE_FORMAT(order_date, '%Y-%m-%d')
ORDER BY DATE_FORMAT(order_date, '%Y-%m-%d') DESC
"
or die
("Error : ".mysqlierror($query));
$rs_query = mysqli_query($condb, $query);
?>

<!-- CDN เชื่อมต่อ chart -->
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>
      <span class="hidden-xs">รายงาน | Dashboard </span>
  </h1>
    
    </div>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="card card-gray">
      <div class="card-header ">
        <h3 class="card-title">Report</h3>
        <div align="right">
          
        </div>
      </div>
      <br>
      <div class="card-body">
        <div class="row">
          
          <div class="col-md-12">
            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            
          <table class="table" id="datatable" >
              <thead>
                <tr>
                  
                  <th>เดือน</th>
                  <th>จำนวนยอดขาย</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php
                foreach($rs_query as $rs_order){
                echo"<tr>";
                  echo "<td>".$rs_order['o_dttm']."</td>";
                  echo "<td>".$rs_order['totol']."</td>"; 

                echo"</tr>";
                }
                ?>
                
              </tbody>
            </table>
            
          </div>
          
        </div>
        
      </div>
    </div>
    <div class="card-footer">
      
    </div>
    
  </div>
  
</section>
<!-- /.content -->

<script>

$(function () {

$('#container').highcharts({
data: {
table: 'datatable',
},
credits: {
text: 'barcodeE4.com',

},
chart: {
type: 'line', 
},
title: {
text: 'สรุปยอดขายรายวัน',
style: {

}
},
plotOptions: {
series: {
colorByPoint: true, 

borderWidth: 2,
dataLabels: {
enabled: true,

style: {

},
}
}
},

xAxis: {
//gridLineWidth: 1,
labels: {
style: {

font: '11px Trebuchet MS, Verdana, sans-serif'
}
},
title: {
text: 'เดือน',
style: {

fontWeight: 'bold',
fontSize: '12px',
fontFamily: 'Trebuchet MS, Verdana, sans-serif'
}
}
},
yAxis: {
labels: {
style: {

font: '11px Trebuchet MS, Verdana, sans-serif'
}
},
allowDecimals: false,
title: {
text: 'ยอดขาย',
style: {


}

}
},
legend: {
itemStyle: {

fontWeight: 'bold'
}
},


tooltip: {
formatter: function () {
return '<b>' + this.series.name + '</b><br/>' +
this.point.y + ' ' + this.point.name.toLowerCase();
}
}
});
});

</script>

<?php include('footer2.php'); ?>
<script>
$(function () {
$(".datatable").DataTable();
});
</script>

</body>
</html>