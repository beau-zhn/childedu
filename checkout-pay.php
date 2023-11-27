<?php
session_start();
require("config.php");
require("functions.php");
if(isset($_POST['cashsubmit']))
{
$upsql = "UPDATE orders SET status = 2, payment_type = 3 WHERE id = " . $_SESSION['SESS_ORDERNUM'];
$upres = mysql_query($upsql);
$itemssql = "SELECT total FROM orders WHERE id = " . $_SESSION['SESS_ORDERNUM'];
$itemsres = mysql_query($itemssql);
$row = mysql_fetch_assoc($itemsres);

if($_SESSION['SESS_LOGGEDIN'])
{
unset($_SESSION['SESS_ORDERNUM']);
}
else
{
session_register("SESS_CHANGEID");
$_SESSION['SESS_CHANGEID'] = 1;
}
header("Location: " . $config_basedir);
}
else if(isset($_POST['paypalsubmit']))
{
$upsql = "UPDATE orders SET status = 2, payment_type = 1 WHERE id = " . $_SESSION['SESS_ORDERNUM'];
$upres = mysql_query($upsql);
$itemssql = "SELECT total FROM orders WHERE id = " . $_SESSION['SESS_ORDERNUM'];
$itemsres = mysql_query($itemssql);
$row = mysql_fetch_assoc($itemsres);

if($_SESSION['SESS_LOGGEDIN'])
{
unset($_SESSION['SESS_ORDERNUM']);
}
else
{
session_register("SESS_CHANGEID");
$_SESSION['SESS_CHANGEID'] = 1;
}
header("Location: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=you%40youraddress.com&item_name=". urlencode($config_sitename)
. "+Order&item_number=PROD" . $row['id']."&amount=" . urlencode(sprintf('%.2f',$row['total'])) . "&no_note=1&currency_code=USD&lc=US&submit.x=41&submit.y=15");
}
else if(isset($_POST['chequesubmit']))
{
$upsql = "UPDATE orders SET status = 2,payment_type = 2 WHERE id = ". $_SESSION['SESS_ORDERNUM'];
$upres = mysql_query($upsql);

if($_SESSION['SESS_LOGGEDIN'])
{
unset($_SESSION['SESS_ORDERNUM']);
}
else
{
session_register("SESS_CHANGEID");
$_SESSION['SESS_CHANGEID'] = 1;
}
require("header.php");
?>


<h1>Paying by cheque</h1>
Please make your cheque payable to
<strong><?php echo $config_sitename; ?></strong>.
<p>
Send the cheque to:
<p>
<?php echo $config_sitename; ?><br>
Admin Faz<br>




<?php
}
else
{
require("header.php");
echo "<h1>Payment</h1>";
showcart();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Paying</title>
		<!-- Description, Keywords and Author -->
		<meta name="description" content="Your description">
		<meta name="keywords" content="Your,Keywords">
		<meta name="author" content="ResponsiveWebInc">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Styles -->
		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Font awesome CSS -->
		<link href="css/font-awesome.min.css" rel="stylesheet">		
		<!-- Custom CSS -->
		<link href="css/style.css" rel="stylesheet">
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="#">
	</head>
	
	<body>
	
		<div class="wrapper">
		
			<!-- header -->
			<header>
				<!-- navigation -->
				<nav class="navbar navbar-default" role="navigation">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="#"><img class="img-responsive" src="img/logo.png" alt="Logo" /></a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
							    <li><a href="<?php echo $config_basedir; ?>">Home</a></li>
								<li><a href="login.php">Login</a></li>
								<li><a href="register.php">Register</a></li>
								<li><a href="adminlogin.php">Admin Login</a></li>
								<li><a href="<?php echo $config_basedir;?>showcart.php">View basket</a></li>
							
								
								
							<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">COURSES <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="products.php?id=1">Courses for 2-4 years</a></li>
										<li><a href="products.php?id=2">Courses for 5-7 years</a></li>
										<li><a href="products.php?id=3">Courses for 8-10 years</a></li>
										<li><a href="products.php?id=4">Courses for 11-13 years</a></li>
									</ul>
								</li>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>

			</header>



<h2>Select a payment method</h2>
<form action='checkout-pay.php' method='POST'>
<table cellspacing=10>
<tr>
<td><h3>Cash on Delivery</h3></td>
<td>
Use this option to place order now
</td>
<td><input type="submit" name="cashsubmit" value="Cash on Delivery"></td>
</tr>
<tr>
<td><h3>PayPal</h3></td>
<td>
This site uses PayPal to accept
Switch/Visa/Mastercard cards. No PayPal account
is required - you simply fill in your credit
card details
and the correct payment will be taken from your account.
</td>
<td><input type="submit" name="paypalsubmit" value="Pay with PayPal"></td>
</tr>
<tr>
<td><h3>Cheque</h3></td>
<td>
If you would like to pay by cheque, you can post the cheque for the final amount to the office.
</td>
<td><input type="submit" name="chequesubmit" value="Pay by cheque"></td>
</tr>
</table>
</form>
<?php
}

?>



	<!-- footer -->
			<footer class="ffoot">
				<div class="container">
					<p><a href="<?php echo $config_basedir; ?>">Home</a> | <a href="#blog">works</a> | <a href="#team">Team</a> | <a href="#contact">Contact</a></p>
					<div class="social">
						<a href=" https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
						<a href="https://twitter.com/?lang=en"><i class="fa fa-twitter"></i></a>
						<a href="https://www.instagram.com/?hl=en"><i class="fa fa-dribbble"></i></a>
						<a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a>
						<a href="https://mail.google.com/"><i class="fa fa-google-plus"></i></a>
					</div>
					<!-- copy right -->
				
					<p class="copy-right">Copyright &copy; 2021 <a href="<?php echo $config_basedir; ?>" >Your Site</a> |  All rights reserved. </p>
				</div>
			</footer>
</html>


