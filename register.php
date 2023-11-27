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

?>



<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Child EDU - Registration</title>
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
								<li><a href="<?php echo $config_basedir;?>showcart.php">View basket</a></li>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</header>
			
			<!-- banner -->
			<div class="banner">
				<div class="container">
					<!-- form content / register area -->
					<div class="register-area">
						<!-- heading -->
						<h3>Sign Up, For An Account</h3>
						
						
						
						
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

<div class="form-group">
<input type="textbox" name="userBox" required class="form-control" id="exampleInputEmail1" placeholder="Enter Username">
</div>
<div class="form-group">
<input type="password" name="passBox" minlength="8" required class="form-control" id="exampleInputPassword1" placeholder="Password">
</div>
<div class="checkbox form-group">
<label>
<input type="checkbox"> I agree with all terms and conditions.
</label>
</div>
<button type="submit" submit class="btn btn-default">SignUp</button>&nbsp;


</form>
<?php
}
require("footer.php");
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