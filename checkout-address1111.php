

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
		<title>Bloger</title>
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
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="#products">Product categories</a></li>
										<li><a href="#blog">New Blogs</a></li>
										<li><a href="#subscribe">Subscribe</a></li>
										<li><a href="#team">Executive Team</a></li>
										<li><a href="#">One more separated link</a></li>
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
					<!-- form content / login area -->
					<div class="login-area">
						<!-- heading -->
	<h3>Customer Login</h3>
Please enter your username and password to log into this website. If you do not have an account, <a href="register.php" style="color:white;"> Register  here</a>.
<p>
<?php
if(isset($_GET['error'])) {
echo "<strong>Incorrect username/password</strong>";
}
?>

<form action="<?php $_SERVER['SCRIPT_NAME']; ?>" method="POST">

							    



	<form role="form" id="login-form">
							<div class="form-group">
								<input type="textbox" name="userBox" class="form-control" id="exampleInputUser1" required placeholder="Username">
							</div>
							<div class="form-group">
								<input type="password" name="passBox" class="form-control" id="exampleInputPassword1"minlength="8" required placeholder="Password">
							</div>
							<div class="checkbox form-group">
								<label>
									<input type="checkbox"> Remember me
								</label>
							</div>
							<button type="submit" name="submit" >Login</button>
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
			
			<!-- after banner -->
			<div class="after-banner">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-4">
							<!-- after banner item -->
							<div class="ab-item">
								<!-- heading -->
								<h3>Focus on Systems</h3>
								<!-- paragraph -->
								<p>While our prices are competitive, it's the value that's unmatched.</p>
								<br>
								<a href="#">Read More</a>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<!-- after banner item -->
							<div class="ab-item">
								<!-- heading -->
								<h3>Plan of Action</h3>
								<!-- paragraph -->
								<p>While our prices are competitive, it's the value that's unmatched.</p>
								<br>
								<a href="#">Read More</a>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<!-- after banner item -->
							<div class="ab-item">
								<!-- heading -->
								<h3>Quality Compliance</h3>
								<!-- paragraph -->
								<p>While our prices are competitive, it's the value that's unmatched.</p>
								<br>
								<a href="#">Read More</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- after banner end-->
			
			<!-- events -->
			<div class="products" id="products">
				<div class="container">
					<div class="default-heading">
						<!-- heading -->
						<h1>Product Categories</h1>
<ul>
<?php
$catsql = "SELECT * FROM categories;";
$catres = mysql_query($catsql);
while($catrow = mysql_fetch_assoc($catres))
{
echo "<li><a href='" . $config_basedir. "products.php?id=" . $catrow['id'] . "'>". $catrow['name'] . "</a></li>";
}
?>
</ul>
						
					</div>
					<div class="row">
						<div class="col-md-4 col-sm-4">
							<!-- event item -->
							<div class="event-item">
								<!-- image -->
								<img class="img-responsive" src="img/event/1.jpg" alt="Events" />
								<!-- heading -->
								<h4><a href="#">Rihanna, Eminem on stage</a></h4>
								<!-- sub text -->
								<span class="sub-text">Integrating technology and software solutions.</span>
								<!-- paragraph -->
								<p>It is our belief that in order to be most efficient it requires adaptive technology and software solutions.</p>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<!-- event item -->
							<div class="event-item">
								<!-- image -->
								<img class="img-responsive" src="img/event/2.jpg" alt="Events" />
								<!-- heading -->
								<h4><a href="#">Dr. Dre on stage live</a></h4>
								<!-- sub text -->
								<span class="sub-text">Integrating technology and software solutions.</span>
								<!-- paragraph -->
								<p>It is our belief that in order to be most efficient it requires adaptive technology and software solutions.</p>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<!-- event item -->
							<div class="event-item">
								<!-- image -->
								<img class="img-responsive" src="img/event/3.jpg" alt="Events" />
								<!-- heading -->
								<h4><a href="#">Macaroons live Party</a></h4>
								<!-- sub text -->
								<span class="sub-text">Integrating technology and software solutions.</span>
								<!-- paragraph -->
								<p>It is our belief that in order to be most efficient it requires adaptive technology and software solutions.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- events end -->
			
			<!-- blog -->
			<div class="blog" id="blog">
				<div class="container">
					<div class="default-heading">
						<!-- heading -->
						<h2>Latest Blogs</h2>
					</div>
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<!-- blog entry -->
							<div class="entry">
								<!-- blog entry image -->
								<img class="img-responsive" src="img/blog/1.jpg" alt="Blog" />
								<!-- heading / blog post title -->
								<h3><a href="#">Communicating with you every step of the way</a></h3>
								<!-- blog information -->
								<span class="meta">
									July 02, 2014 | Tag: Technology | By: David John
								</span>
								<!-- paragraph -->
								<p>We combine continuing education and constant monitoring us with your project details if you are interested to ge of industry trends and innovations to provide the right IT solution at the right time. Contact us with your project details if you are interested to get our Web Solution or Software Development Services.</p>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<!-- blog entry -->
							<div class="entry">
								<!-- blog entry image -->
								<img class="img-responsive" src="img/blog/2.jpg" alt="Blog" />
								<!-- heading / blog post title -->
								<h3><a href="#">Communicating with you every step of the way</a></h3>
								<!-- blog information -->
								<span class="meta">
									July 02, 2014 | Tag: Technology | By: David John
								</span>
								<!-- paragraph -->
								<p>We combine continuing education and constant monitoring us with your project details if you are interested to ge of industry trends and innovations to provide the right IT solution at the right time. Contact us with your project details if you are interested to get our Web Solution or Software Development Services.</p>
							</div>
						</div>
					</div>
					<div class="text-center">
						<a href="#" class="btn btn-default">See More</a>
					</div>
				</div>
			</div>
			<!-- blog end -->
			
			<!-- subscribe -->
			<div class="subscribe" id="subscribe">
				<div class="container">
					<!-- subscribe content -->
					<div class="sub-content">
						<h3>Subscribe Here for Updates</h3>
						<form role="form">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Email...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button">Subscribe</button>
									</span>
							</div><!-- /input-group -->
						</form>
					</div>
				</div>
			</div>
			<!-- subscribe end -->
			
			<!-- team -->
			<div class="team" id="team">
				<div class="container">
					<div class="default-heading">
						<!-- heading -->
						<h2>Executing Team</h2>
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-3">
							<!-- team member -->
							<div class="member">
								<!-- images -->
								<img class="img-responsive" src="img/team/1.jpg" alt="Team Member" />
								<!-- heading -->
								<h3>Adam Miser</h3>
								<!-- designation -->
								<span class="dig">CEO</span>
								<!-- email -->
								<a href="#">executive.member@bloger.com</a>
							</div>
						</div>
						<div class="col-md-3 col-sm-3">
							<!-- team member -->
							<div class="member">
								<!-- images -->
								<img class="img-responsive" src="img/team/2.jpg" alt="Team Member" />
								<!-- heading -->
								<h3>Adam Miser</h3>
								<!-- designation -->
								<span class="dig">CEO</span>
								<!-- email -->
								<a href="#">executive.member@bloger.com</a>
							</div>
						</div>
						<div class="col-md-3 col-sm-3">
							<!-- team member -->
							<div class="member">
								<!-- images -->
								<img class="img-responsive" src="img/team/1.jpg" alt="Team Member" />
								<!-- heading -->
								<h3>Adam Miser</h3>
								<!-- designation -->
								<span class="dig">CEO</span>
								<!-- email -->
								<a href="#">executive.member@bloger.com</a>
							</div>
						</div>
						<div class="col-md-3 col-sm-3">
							<!-- team member -->
							<div class="member">
								<!-- images -->
								<img class="img-responsive" src="img/team/2.jpg" alt="Team Member" />
								<!-- heading -->
								<h3>Adam Miser</h3>
								<!-- designation -->
								<span class="dig">CEO</span>
								<!-- email -->
								<a href="#">executive.member@bloger.com</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- team end -->
			
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