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
echo "<h3>Add your personal information</h3>";
if(isset($_GET['error']) == TRUE) {
echo "<strong>Please fill in the missing
information from the form</strong>";
}
echo "<form action='".$_SERVER['SCRIPT_NAME'] . "' method='POST'>";
if(isset($_SESSION['SESS_LOGGEDIN']))
{
?>



<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Child Edu - Login</title>
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
							<a class="navbar-brand" href="<?php echo $config_basedir; ?>"><img class="img-responsive" src="img/logo.png" alt="Logo" /></a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
							<li><a href="<?php echo $config_basedir; ?>">Home</a></li>
								<li><a href="login.php">Login</a></li>
								<li><a href="register.php">Register</a></li>
								<li><a href="adminlogin.php">Admin Login</a></li>
								<li><a href="<?php echo $config_basedir;?>showcart.php">View basket</a></li>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</header>





	<!-- banner --> 
	<div class="banner">
				<div class="container">
					<!-- form content / login area -->
					<div class="login-area">
						<!-- heading -->
	<h3>Adding personal information</h3>
	
	
<input type="radio" name="addselecBox"
value="1" checked>Use the address from my
account</input><br>
<input type="radio" name="addselecBox"
value="2">Use the address below:</input>
<?php
}
?>
<form action="<?php $_SERVER['SCRIPT_NAME']; ?>" method="POST">

							    



	<form role="form" id="login-form">
							<div class="form-group">
								<input type="text" name="fornameBox" class="form-control" id="exampleInputUser1" required placeholder="First Name(child)">
							</div>
							<div class="form-group">
								<input type="text" name="surnameBox" class="form-control" id="exampleInputPassword1" required placeholder="Last Name(child)">
							</div>
						<div class="form-group">
								<input type="text" name="housestreetBox" class="form-control" id="exampleInputUser1" required placeholder="House Number, Street">
							</div><div class="form-group">
								<input type="text" name="EducationPlaceBox" class="form-control" id="exampleInputUser1" required placeholder="Education place name">
							</div><div class="form-group">
								<input type="text" name="parentnameBox" class="form-control" id="exampleInputUser1" required placeholder="Parent name">
							</div><div class="form-group">
								<input type="number" name="ageBox" min="0" max="120" class="form-control" id="exampleInputUser1" required placeholder="Age">
							</div><div class="form-group">
								<input type="tel" name="phoneBox" class="form-control" id="exampleInputUser1" required pattern= [8]{1}-[7]{1}[0-9]{2}-[0-9]{3}-[0-9]{2}-[0-9]{2} placeholder="8-707-777-77-77">
							</div><div class="form-group">
								<input type="email" name="userBox"name="emailBox" class="form-control" id="exampleInputUser1" required placeholder="Email">
							</div>
								<button type="submit" name="submit" >Add Address (press only once)</button>
						
						</form>



</form>

</form>
<?php
}

?>
	</form>
					</div>
				</div>
			</div>
			<!-- banner end -->
			
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

		</div>
		
		
		<!-- Javascript files -->
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap JS -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Respond JS for IE8 -->
		<script src="js/respond.min.js"></script>
		<!-- HTML5 Support for IE -->
		<script src="js/html5shiv.js"></script>
		<!-- Custom JS -->
		<script src="js/custom.js"></script>
	</body>	
</html>