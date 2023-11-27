<?php
session_start();
require("config.php");
$statussql = "SELECT status FROM orders WHERE id = " .$_SESSION['SESS_ORDERNUM'];
$statusres = mysql_query($statussql);
$statusrow = mysql_fetch_assoc($statusres);
$status = $statusrow['status'];
if($status == 1) {
header("Location: " . $config_basedir . "checkout-pay.php");
}
if($status >= 2) {
header("Location: " . $config_basedir);
}

if(isset($_POST['submit']))
{
if(isset($_SESSION['SESS_LOGGEDIN']))
{
if($_POST['addselecBox'] == 2)
{
if(empty($_POST['fornameBox']) ||
empty($_POST['surnameBox']) ||
empty($_POST['housestreetBox']) ||
empty($_POST['EducationPlaceBox']) ||
empty($_POST['parentnameBox']) ||
empty($_POST['ageBox']) ||
empty($_POST['phoneBox']) ||
empty($_POST['emailBox']))
{
header("Location: " . $basedir . "checkoutaddress.php?error=1");
exit;
}

$addsql = "INSERT INTO delivery_addresses(forname, surname, housestreet, EducationPlace, parentname, age, phone, email)VALUES('" . strip_tags(addslashes( $_POST['fornameBox'])) . "', '" . strip_tags(addslashes( $_POST['surnameBox'])) . "', '" . strip_tags(addslashes( $_POST['housestreetBox'])) . "', '" . strip_tags(addslashes( $_POST['EducationPlaceBox'])) . "', '" . strip_tags(addslashes( $_POST['parentnameBox'])) . "', '" . strip_tags(addslashes( $_POST['ageBox'])) . "', '" . strip_tags(addslashes(
$_POST['phoneBox'])) . "', '" . strip_tags(addslashes($_POST['emailBox'])) . "')";
mysql_query($addsql);
$setaddsql = "UPDATE orders SET delivery_add_id = " . mysql_insert_id() . ", status = 1 WHERE id = " . $_SESSION['SESS_ORDERNUM'];
mysql_query($setaddsql);
header("Location: " . $config_basedir . "checkout-pay.php");
}
else
{
$custsql = "UPDATE orders SET delivery_add_id = 0, status = 1 WHERE id = " . $_SESSION['SESS_ORDERNUM'];
mysql_query($custsql);
header("Location: " . $config_basedir . "checkout-pay.php");
}
}
else
{
if(empty($_POST['fornameBox']) ||
empty($_POST['surnameBox']) ||
empty($_POST['housestreetBox']) ||
empty($_POST['EducationPlaceBox']) ||
empty($_POST['parentnameBox']) ||
empty($_POST['ageBox']) ||
empty($_POST['phoneBox']) ||
empty($_POST['emailBox']))
{
header("Location: " . "checkout-address.php?error=1");
exit;
}
$addsql = "INSERT INTO delivery_addresses(forname, surname, housestreet, EducationPlace, parentname, age, phone, email) VALUES('" . $_POST['fornameBox'] . "', '" . $_POST['surnameBox'] . "', '" . $_POST['housestreetBox'] . "', '" . $_POST['EducationPlaceBox'] . "', '" . $_POST['parentnameBox'] . "', '" . $_POST['ageBox'] . "', '" . $_POST['phoneBox'] . "', '" . $_POST['emailBox'] . "')";
mysql_query($addsql);
$setaddsql = "UPDATE orders SET delivery_add_id = " . mysql_insert_id() . ", status = 1 WHERE session = '" . session_id() . "'";
mysql_query($setaddsql);
header("Location: " . $config_basedir . "checkout-pay.php");
}
}

else
{

require("header.php");
echo "<h1>Add a delivery address</h1>";
if(isset($_GET['error']) == TRUE) {
echo "<strong>Please fill in the missing
information from the form</strong>";
}
echo "<form action='".$_SERVER['SCRIPT_NAME'] . "' method='POST'>";
if(isset($_SESSION['SESS_LOGGEDIN']))
{
?>
<input type="radio" name="addselecBox"
value="1" checked>Use the address from my
account</input><br>
<input type="radio" name="addselecBox"
value="2">Use the address below:</input>
<?php
}
?>
<table>
<tr>
<td>First Name</td>
<td><input type="text" name="fornameBox" required></td>
</tr>
<tr>
<td>Last Name</td>
<td><input type="text" name="surnameBox" required></td>
</tr>
<tr>
<td>House Number, Street</td>
<td><input type="text" name="housestreetBox" required></td>
</tr>
<tr>
<td>Education place name</td>
<td><input type="text" name="EducationPlaceBox" required></td>
</tr>
<tr>
<td>Parent name</td>
<td><input type="text" name="parentnameBox" required></td>
</tr>
<tr>
<td>Age</td>
<td><input type="number" name="ageBox" min="0" max="120" required></td>
</tr>
<tr>
<td>Phone</td>
<td><input type="tel" name="phoneBox" pattern= [8]{1}-[7]{1}[0-9]{2}-[0-9]{3}-[0-9]{2}-[0-9]{2} placeholder="8-707-777-77-77" required></td>
</tr>
<tr>
<td>Email</td>
<td><input type="email" name="emailBox" required></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="submit" value="Add Address (press only once)"></td>
</tr>
</table>
</form>
<?php
}
require("footer.php");
?>