<?php
session_start();
$er = 0;
require("config.php");
if(isset($_SESSION['SESS_LOGGEDIN'])) {
header("Location: " . $config_basedir);
}

if(isset($_POST['submit']))
{
$loginsql1 = "SELECT * FROM logins order by customer_id desc";
$loginres1 = mysql_query($loginsql1);
$row = mysql_fetch_assoc($loginres1);
$c =$row['customer_id']+1;
$sql = "INSERT INTO logins(username,password,customer_id) VALUES('".$_POST['userBox']."','".sha1($_POST['passBox'])."','$c')";
$res = mysql_query($sql);

$cid = mysql_insert_id();

$loginsql = "SELECT * FROM logins WHERE id='$c_id'";
$loginres = mysql_query($loginsql);
$numrows = mysql_num_rows($loginres);
if($numrows == 1)
{
$loginrow = mysql_fetch_assoc($loginres);

$_SESSION['SESS_LOGGEDIN'] = 1;
$_SESSION['SESS_USERNAME'] = $loginrow['username'];
$_SESSION['SESS_USERID'] = $loginrow['id'];
$ordersql = "SELECT id FROM orders WHERE customer_id = " . $_SESSION['SESS_USERID'] . " AND status < 2";
$orderres = mysql_query($ordersql);
$orderrow = mysql_fetch_assoc($orderres);
$_SESSION['SESS_ORDERNUM'] = $orderrow['id'];
$er = 2;
header("Location: " . $config_basedir);
}
else
{
header("Location: http://" .$_SERVER['HTTP_HOST']. $_SERVER['SCRIPT_NAME'] . "?error=1");
}
}

else
{
require("header.php");
?>
<h1>Customer Registration</h1>

<p>
<?php
if(isset($_GET['error'])) {
echo "<strong>Registered Successfully...Please login now </strong>";
} else if($er == '2'){
echo "<strong> Registered Successfully</strong>";
}
?>

<form action="<?php $_SERVER['SCRIPT_NAME']; ?>" method="POST">
<table>
<tr>
<td>New Username</td>
<td><input type="textbox" name="userBox" required>
</tr>
<tr>
<td>Set Password</td>
<td><input type="password" name="passBox" minlength="8" required>
</tr>
<tr>
<td></td>
<td><input type="submit" name="submit" value="Log in">
</tr>
</table>
</form>
<?php
}
require("footer.php");
?>
