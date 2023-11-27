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
		<title>Products</title>
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
			<div class="banner">
				<div class="container">
					<!-- heading -->
					<h2>I'm Banner Heading for This Page</h2>
					<!-- paragraph -->
					<p>It is our belief that in order to be most efficient it requires adaptive technology and software our customers can focus on their core business.</p>
				</div>
			</div>
			<!-- banner end -->
			
	
			
			<!-- events -->
			<div class="products" id="products">
				<div class="container">
					<div class="default-heading">
						<!-- heading -->
						<h2>Your shopping cart</h2>
<ul>

</ul>
						
				    </div>
				</div>
			</div>
			<!-- events end -->
	
				<!-- blog -->
			<div class="blog" id="blog">
				<div class="container">
					<div class="default-heading">
						<!-- heading -->
						<h2>Recommended Products</h2>
<?php
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
echo "<p><strong>OUR PRICE: KZT ". sprintf('%.2f', $prodrow['price']) . "</strong>";

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
                   </div> 
				</div>
			</div>
			<!-- blog end -->
	
	
			
			<!-- blog -->
			<div class="blog" id="blog">
				<div class="container">
					<div class="default-heading">
						<!-- heading -->
						<h1>COURSES</h1>
						

				</div>
			</div>
			<!-- blog end -->
			
			<!-- subscribe -->
			<div class="subscribe" id="subscribe">
				<div class="container">
					<!-- subscribe content -->
					<div class="sub-content">
						<h3>Education for your kids</h3>
					
					</div>
				</div>
			</div>
			<!-- subscribe end -->
			
		
			
			<!-- footer -->
			<footer>
				<div class="container">
					<p><a href="#">Home</a> | <a href="#work">works</a> | <a href="#team">Team</a> | <a href="#contact">Contact</a></p>
					<div class="social">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-dribbble"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
						<a href="#"><i class="fa fa-google-plus"></i></a>
					</div>
					<!-- copy right -->
					<!-- This theme comes under Creative Commons Attribution 4.0 Unported. So don't remove below link back -->
					<p class="copy-right">Copyright &copy; 2014 <a href="#">Your Site</a> | Designed By : <a href="http://www.indioweb.in/portfolio">IndioWeb</a>, All rights reserved. </p>
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