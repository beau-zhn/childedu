<?php
session_start();
require("config.php");
require("functions.php");
if(!isset($_SESSION['SESS_ADMINLOGGEDIN'])) {
header("Location: " . $config_basedir);
}


if(isset($_GET['func']) == TRUE) {

$funcsql = "UPDATE orders SET status = 10 WHERE id = " . $_GET['id'];
mysql_query($funcsql);
header("Location: " . $config_basedir . "adminorders.php");
}
else {
require("adminheader.php"); 
echo "<h1>Admin Dashboard Options:</h1></br>";
echo "<td><h3><a href='daywisecahrt.php'>1.show Daily Sales figures </a></h3></td></br>";
echo "<td><h3><a href='monthwise.php'>2. Show Month Wise Sales Figures </a></h3></td></br>";
echo "<td><h3><a href='addcategory.php'>3. Add new Category </a></h3></td></br>";
echo "<td><h3><a href='addproduct.php'>4. Add new Products </a></h3></td></br>";
echo "<h1>Outstanding orders:</h1></br>";

$orderssql = "SELECT * FROM orders WHERE status = 2";
$ordersres = mysql_query($orderssql);
$numrows = mysql_num_rows($ordersres);
if($numrows == 0)
{
echo "<h2><strong>No orders at Present </strong></h2>";
}
else
{
echo "<table cellspacing=10>";
while($row = mysql_fetch_assoc($ordersres))
{
echo "<tr>";
echo "<td>[<a href='adminorderdetails.php?id=" . $row['id']. "'>View</a>]</td>";
echo "<td>". date("D jS F Y g.iA", strtotime($row['date'])). "</td>";
echo "<td>";
if($row['registered'] == 1)
{
echo "Registered Customer";
}
else
{
echo "Non-Registered Customer";
}
echo "</td>";
echo "<td>&pound;" . sprintf('%.2f',
$row['total']) . "</td>";
echo "<td>";
if($row['payment_type'] == 1)
{
echo "PayPal";
}
else
{
echo "Cheque";
}
echo "</td>";
echo "<td><a href='adminorders.php?func=conf&id=" . $row['id']. "'>Confirm Payment</a></td>";
echo "</tr>";
}
echo "</table>";
}


}

require("footer.php");
?>
