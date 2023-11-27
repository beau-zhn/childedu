<?php
require("config.php");
session_start();
require("functions.php");
require("header.php");
echo "<h1>Your shopping cart</h1>";
showcart();
if(isset($_SESSION['SESS_ORDERNUM'])) {
	$sess_ordernum=$_SESSION['SESS_ORDERNUM'];
$sql = "SELECT * FROM orderitems WHERE order_id =$sess_ordernum";
$result = mysql_query($sql) or die(mysql_error());
$numrows = mysql_num_rows($result);
if($numrows >= 1) {
echo "<h2><a href='checkout-address.php'>Go to the checkout</a></h2>";
}
}
?>

<?Php
$prodcatsql1 = "SELECT * FROM orders WHERE customer_id = " . @$_SESSION['SESS_USERID'] . ";";
$prodcatres1 = mysql_query($prodcatsql1);
@$numrows1 = mysql_num_rows($prodcatres1);
if($numrows1 == 0)
{

}
else
{
	?>
	
	<h1> Recommended Products </h1> 
	<?Php
	require("config.php");
	$sql1 = "SELECT * FROM orders WHERE customer_id = " . @$_SESSION['SESS_USERID'] . ";";
$res1 = mysql_query($sql1);
while($rows1 = mysql_fetch_array($res1)) {
$sql2 = "SELECT DISTINCT product_id FROM orderitems WHERE order_id =".$rows1['id'].";";
$res2 = mysql_query($sql2);
$rows12 = mysql_fetch_array($res2);
$abc[]= $rows12['product_id'];
$result1 = implode(',',array_unique(explode(',', $rows12['product_id'])));;
}


	$nums_list2 = explode(',',$result1);
	foreach ($nums_list2 as $value)
	{
	$prodcatsql2 = "SELECT * FROM products WHERE id = " . $value . ";";
$prodcatres2 = mysql_query($prodcatsql2);
echo "<table cellpadding='10'>";
while($prodrow = mysql_fetch_assoc($prodcatres2))
{
		echo "<form action='' method='POST'>";
echo "<tr>";
if(empty($prodrow['image'])) {
echo "<td><img
src='./productimages/dummy.jpg' alt='". $prodrow['name'] . "'></td>";
}
else {
echo "<td><img src='./productimages/" . $prodrow['image']. "' alt='". $prodrow['name'] . "'></td>";
}
echo "<td>";
echo "<h2>" . $prodrow['name'] . "</h2>";
echo "<p>" . $prodrow['description'];
echo "<p><strong>OUR PRICE: &pound;". sprintf('%.2f', $prodrow['price']) . "</strong>";

echo "<td><input type='hidden' name='id' value='" . $prodrow['id'] . "'></td>";
echo "</tr>";
echo "<tr>";
echo "<td>Select Quantity <select name='amountBox'>";
for($i=1;$i<=100;$i++)
{
echo "<option>" . $i . "</option>";
}
echo "</select></td>";
echo "<td><input type='submit' name='submit' value='WANT THIS COURSE'></td>";
echo "</td>";
echo "</tr>";
echo "</form>";
}
}
echo "</table>";
}
$prodcatsql = "SELECT * FROM products WHERE cat_id = " . $_GET['id'] . ";";
$prodcatres = mysql_query($prodcatsql);
$numrows = mysql_num_rows($prodcatres);
if($numrows == 0)
{
echo "<h1>No products</h1>";
echo "There are no products in this category.";
}
else
{
?>


	<h1>Products </h1> 
<?Php
echo "<table cellpadding='10'>";
while($prodrow = mysql_fetch_assoc($prodcatres))
{
		echo "<form action='' method='POST'>";
echo "<tr>";
if(empty($prodrow['image'])) {
echo "<td><img
src='./productimages/dummy.jpg' alt='". $prodrow['name'] . "'></td>";
}
else {
echo "<td><img src='./productimages/" . $prodrow['image']. "' alt='". $prodrow['name'] . "'></td>";
}
echo "<td>";
echo "<h2>" . $prodrow['name'] . "</h2>";
echo "<p>" . $prodrow['description'];
echo "<p><strong>OUR PRICE: KZT;". sprintf('%.2f', $prodrow['price']) . "</strong>";

echo "<td><input type='hidden' name='id' value='" . $prodrow['id'] . "'></td>";
echo "</tr>";
echo "<tr>";
echo "<td>Select Quantity <select name='amountBox'>";
for($i=1;$i<=100;$i++)
{
echo "<option>" . $i . "</option>";
}
echo "</select></td>";
echo "<td><input type='submit' name='submit' value='WANT THIS COURSE'></td>";
echo "</td>";
echo "</tr>";
echo "</form>";
}
echo "</table>";

}
if(isset($_POST['submit']))
{
if(isset($_SESSION['SESS_ORDERNUM']))
{
	$id=$_POST['id'];
 $itemsql = "INSERT INTO orderitems(order_id,product_id, quantity) VALUES(". $_SESSION['SESS_ORDERNUM'] . ", ". $id . ", ". $_POST['amountBox'] . ")";
mysql_query($itemsql) or die(mysql_error());
}
else
{
if(isset($_SESSION['SESS_LOGGEDIN']))
{
$sql = "INSERT INTO orders(customer_id,registered, date) VALUES(". $_SESSION['SESS_USERID'] . ", 1, NOW())";
mysql_query($sql) or die(mysql_error());
$_SESSION['SESS_ORDERNUM'] = mysql_insert_id();
$itemsql = "INSERT INTO orderitems(order_id, product_id, quantity) VALUES(". $_SESSION['SESS_ORDERNUM']. ", " . $id . ", ". $_POST['amountBox'] . ")";
mysql_query($itemsql) or die(mysql_error());
}
else
{
 $sql = "INSERT INTO orders(registered,date, session) VALUES(". "0, NOW(), '" . session_id() . "')";
mysql_query($sql) or die(mysql_error());
$_SESSION['SESS_ORDERNUM'] = mysql_insert_id();
$itemsql = "INSERT INTO orderitems(order_id, product_id, quantity) VALUES(". $_SESSION['SESS_ORDERNUM'] . ", " . $id . ", ". $_POST['amountBox'] . ")";
mysql_query($itemsql) or die(mysql_error());
}
}
$totalprice = $prodrow['price'] * $_POST['amountBox'] ;
$updsql = "UPDATE orders SET total = total + ". $totalprice . " WHERE id = ". $_SESSION['SESS_ORDERNUM'] . ";";
mysql_query($updsql) or die(mysql_error());
?>
<script>

</script>
<?php
		?>
                <script>
				window.location.href='products.php?id=<?Php echo $_GET['id']; ?>';
				</script>
                <?php
exit;

}
require("footer.php");

?>
