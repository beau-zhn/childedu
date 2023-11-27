<?php

require("config.php");
require("functions.php");


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
		<title>Child Edu | Additional info</title>
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
								<li><a href="additionalinfo.php">Additional info</a></li>
							
								
								
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="#products">All products</a></li>
										<li><a href="#categories">Why us?</a></li>
										<li><a href="#blog">New Blogs</a></li>
										<li><a href="#team">Our Team</a></li>
									</ul>
								</li>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>

			</header>
			
		<?php	require("header.php"); ?>
			
			<!-- banner -->
			<div class="banner">
				<div class="container">
					<!-- heading -->
					<h2>Here you can find some more info about us.</h2>
					<!-- paragraph -->
					<p>Child Development Center | modern preschool education</p>
				</div>
			</div>
			<!-- banner end -->
			
			
			<!-- products -->
			<div class="products" id="products">
				<div class="container">
					<div class="default-heading">
						<!-- heading -->
						<h1>Here are all products</h1>
					<ul> <p><button onclick="sortTable()"class="registerbtn" >For convenience, you can click this <b>button</b> </button></p>
<table id="myTable">
  <tr>
    <th>Name</th>
    <th>Price KZT</th>
  </tr>
  <tr>
    <td>Fundamentals of academic <p>figure</td>
    <td>30 000</td>
  </tr>
  <tr>
    <td>Construct 3 Programming</td>
    <td>45 000</td>
  </tr>
  <tr>
    <td>Fundamentals of Computer <p>Literacy</td>
    <td>10 000</td>
  </tr>
  <tr>
    <td>Boost your english</td>
    <td>15 000</td>
  </tr>
  <tr>
    <td>English from A to Z</td>
    <td>15 000</td>
  </tr>
   <tr>
    <td>Reading training</td>
    <td>7 000</td>
  </tr>
   <tr>
    <td>Speech development</td>
    <td>4 000</td>
  </tr> <tr>
    <td>Maths</td>
    <td>5 500</td>
  </tr>
  
</table>
  </div>
</div>
     
<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}
</script>
  <script>
function sortTable() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  while (switching) {
    switching = false;
    rows = table.rows;
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
           
             /* Get the two elements you want to compare,
      one from current row and one from the next: */

      x = rows[i].getElementsByTagName("TD")[0];
      y = rows[i + 1].getElementsByTagName("TD")[0];
             // Check if the two rows should switch place:
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        shouldSwitch = true;
                 // If so, mark as a switch and break the loop:
        break;
      }
    }
    if (shouldSwitch) {    /* If a switch has been marked, make the switch
      and mark that a switch has been done: */

      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
</script>  </ul>
					
					</div>
					
				</div>
			</div>
			<!-- events end -->
			
			
			
						<!-- events -->
			<div class="products" id="categories">
				<div class="container">
					<div class="default-heading">
						<!-- heading -->
						<h1>Why Us? | Categories
						</h1>
<ul> <h4> <a>

<?php
$achive = array (
  array("2-4 years",3,3),
  array("5-7 years",1,2),
  array("8-10 years",2,2),
  array("11-13 years",2,3)
);
  
echo $achive[0][0].": We provide: ".$achive[0][1]." courses, Number of hours: ".$achive[0][2].".<br>";
echo $achive[1][0].": We provide: ".$achive[1][1]."courses, Number of hours: ".$achive[1][2].".<br>";
echo $achive[2][0].": We provide: ".$achive[2][1]."courses, Number of hours: ".$achive[2][2].".<br>";
echo $achive[3][0].": We provide: ".$achive[3][1]."courses, Number of hours: ".$achive[3][2].".<br>";
?>
</ul> </a></h4>

						
					</div>
					<div class="row">
						<div class="col-md-4 col-sm-4">
							<!-- event item -->
							<div class="event-item">
								<!-- image -->
								<img class="img-responsive" src="img/event/about-1.jpg" alt="Events" />
								<!-- heading -->
								<h4><a>A systematic approach to the development of a child's intelligence:</a></h4>
								<!-- sub text -->
								<span class="sub-text">All tasks are grouped from simple to difficult; classes on different topics complement each other.</span>
							
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<!-- event item -->
							<div class="event-item">
								<!-- image -->
								<img class="img-responsive" src="img/event/about-2.jpg" alt="Events" />
								<!-- heading -->
								<h4><a>An individual approach to each child:</a></h4>
								<!-- sub text -->
								<span class="sub-text">The individual pace in mastering tasks - you can return to each task an unlimited number of times - as much as the child will need to work out and fully master the material.</span>
								
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<!-- event item -->
							<div class="event-item">
								<!-- image -->
								<img class="img-responsive" src="img/event/about-3.jpg" alt="Events" />
								<!-- heading -->
								<h4><a>Multilevel system</a></h4>
								<!-- sub text -->
								<span class="sub-text">The multilevel help system in case of an incorrect answer allows the child to complete tasks that are difficult for him at the moment if he is independently completed but is quite accessible after a small hint or explanation.</span>
								
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
								<img class="img-responsive" src="img/blog/article-1.jpg" alt="Blog" />
								<!-- heading / blog post title -->
								<h3><a href="#">How to Love Math: Tips for Parents</a></h3>
								<!-- blog information -->
								<span class="meta">
									September 02, 2021 | Tag: Math | By: Kanat Alesov
								</span>
								<!-- paragraph -->
								<p>Problems with math are not uncommon for schoolchildren. Parents often justify this by the lack of a mathematical mindset: "He is a humanist, what can I do?" But this position only leads to problems between the child and exact science. Psychologists point out that one of the reasons for the dislike for mathematics is psychological. Perhaps once you yourself told the child that he would not succeed, or he hesitated at the blackboard, and his classmates laughed at him, the teacher responded unsuccessfully. There can be many reasons for self-doubt. But the task of the parents is to convince the child every day that he will succeed.</p>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<!-- blog entry -->
							<div class="entry">
								<!-- blog entry image -->
								<img class="img-responsive" src="img/blog/article-2.jpg" alt="Blog" />
								<!-- heading / blog post title -->
								<h3><a href="#">What if the child does not want to go to school?</a></h3>
								<!-- blog information -->
								<span class="meta">
									November 02, 2021 | Tag: School | By: Karina Marim
								</span>
								<!-- paragraph -->
								<p>Some react to this as if it were just nonsense, while others see global problems. At the same time, the truth is somewhere in between. If a child is offended by a classmate, this is not always bullying, but if a student cries every morning, does not sleep well, bites his nails and eats little, this is a silent cry for help. Child psychologists identify 4 main reasons for not wanting to attend school:
  1. Conflicts - we will not call it bullying, but children come to school and often face conflict situations, with new rules of life. For them, this is a significant load on the psyche, and if we add to this the load from the school curriculum, we get a small person with big problems.
    2. Loss of motivation - this leads to an unwillingness to study and attend school because the child does not understand: why?
    3. Regime - with the wrong regimen, the child gets tired quickly and almost always feels tired or lacks sleep.
    4. Adaptation - this item is relevant for first graders. School adaptation can last up to 6 months.</p>
							</div>
						</div>
					</div>
					<div class="text-center">
						<a href="" class="btn btn-default">See More</a>
					</div>
				</div>
			</div>
			<!-- blog end -->
			
			<!-- subscribe -->
			<div class="subscribe" id="subscribe">
				<div class="container">
					<!-- subscribe content -->
					<div class="sub-content" id="contact">
						<h3>We are located in Kazakhstan, Kokshetau Contact: 8-707-777-77-77 <br>Subscribe Here for Updates</h3></br>
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
						<h2>Our Team</h2>
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-3">
							<!-- team member -->
							<div class="member">
								<!-- images -->
								<img class="img-responsive" src="img/team/member-1.jpg" alt="Team Member" />
								<!-- heading -->
								<h3>Dastan Esengulov</h3>
								<!-- designation -->
								<span class="dig"> Founder | Math teacher</span>
								<!-- email -->
								<a href="">dastan.member@childedu.com</a>
							</div>
						</div>
						<div class="col-md-3 col-sm-3">
							<!-- team member -->
							<div class="member">
								<!-- images -->
								<img class="img-responsive" src="img/team/member-2.jpg" alt="Team Member" />
								<!-- heading -->
								<h3>Samal Esengulova</h3>
								<!-- designation -->
								<span class="dig"> Co-founder | Kazakh teacher</span>
								<!-- email -->
								<a href="">samal.member@childedu.com</a>
							</div>
						</div>
						<div class="col-md-3 col-sm-3">
							<!-- team member -->
							<div class="member">
								<!-- images -->
								<img class="img-responsive" src="img/team/member-3.jpg" alt="Team Member" />
								<!-- heading -->
								<h3>Kanat Alesov</h3>
								<!-- designation -->
								<span class="dig">Math and Programming teacher</span>
								<!-- email -->
								<a href="">kanat.member@childedu.com</a>
							</div>
						</div>
						<div class="col-md-3 col-sm-3">
							<!-- team member -->
							<div class="member">
								<!-- images -->
								<img class="img-responsive" src="img/team/member-4.jpg" alt="Team Member" />
								<!-- heading -->
								<h3>Karina Marim</h3>
								<!-- designation -->
								<span class="dig">English teacher</span>
								<!-- email -->
								<a href="">karina.member@childedu.com</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- team end -->
			
			<!-- footer -->
			<footer>
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