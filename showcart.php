<?php

require("config.php");
require("functions.php");
require("header.php");

?>
<?php
session_start();
if(isset($_SESSION['SESS_CHANGEID']) == TRUE)
{
session_unset();
session_regenerate_id();
}

?>







<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Showcart</title>
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
			
			<!-- banner -->
			
			
			
			
		
			
			<!-- after banner -->
			<div class="after-banner">
				<div class="container">
				    
				    
				    
				    		<?php 
				echo "<h1>Chosen lessons</h1>";
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
				    
				    
				    
				    
				    
				    
				    
				    
				    
					
					</div>
				</div>
			</div>
			<!-- after banner end-->
			
		
			
	
			
		
		
			
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