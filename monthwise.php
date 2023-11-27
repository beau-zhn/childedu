<?php
require("dbconfig.php");
include_once 'dbconnect.php';
require_once("dbcontroller.php");
 //$con = mysqli_connect('hostname','username','password','database');
?>
<!DOCTYPE HTML>
<html>
<head>
 <meta charset="utf-8">
 <title>
 Charts
 </title>
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {
 var data = google.visualization.arrayToDataTable([

 ['Date', 'Sales'],
 <?php 
 $query = "SELECT EXTRACT(MONTH FROM o.date) as odate,sum(o.total) as amount FROM orders o where (o.date >= NOW() - INTERVAL 12 MONTH) group by odate order by odate";

//$query = "SELECT EXTRACT(MONTH FROM o.dt_created) as odate,sum(o.amount) as amount FROM tbl_order o where (o.dt_created >= NOW() - INTERVAL 12 MONTH) group by odate order by odate";

 $exec = mysqli_query($con,$query);
 while($row = mysqli_fetch_array($exec)){
$month = $row['odate'];
$datev = DateTime::createFromFormat('!m',$month);
$namew = $datev->format('F');

 echo "['".$namew."',".$row['amount']."],";
 }
 ?>
 
 ]);

var options = {'title':'Sales',
                     'width':600,
                     'height':700};
 var chart = new google.visualization.ColumnChart(document.getElementById("columnchart"));
 chart.draw(data, options);
 }
 </script>
</head>
<body>
  <a href="adminorders.php" class="btnAddAction"   > << back</a>
 <div id="columnchart" style="width: 900px; height: 500px;">
 </div>
</body>
</html>