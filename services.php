<?php
session_start();
unset($_SESSION["bid"]);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Tech Website</title>
		<!-- icons -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
		<!-- Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
		<!-- Custom CSS -->
		<link rel="stylesheet" href="css/style.css">
		<style media="screen">
			.indicators{
				display: none;
			}
		</style>
	</head>

	<body>

		<section class="navbar">
			<nav class="nav-fixed">
				<div class="nav-wrapper light-blue lighten-2">
					<a href="index.php" class="brand-logo" style="font-family: 'Dancing Script', cursive; cursive; font-size: 40px;">Tech Website</a>
					<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
					<ul id="nav-mobile" class="right hide-on-med-and-down">
						<li><a href="index.php">Home</a></li>
						<li><a href="blog.php">Blog</a></li>
						<li class="active"><a href="#">Services</a></li>
						<?php
							if(!isset($_SESSION["uid"]))
							echo '<li><a href="login.php" class="waves-effect waves-light btn blue darken-2">LOGin</a></li>';
							else
							echo '<li><a href="#" disabled="disabled">'.$_SESSION["name"].'</a></li><li><a href="logout.php" class="waves-effect waves-light btn blue darken-2">LOGOUT</a></li>';
						?>
					</ul>
				</div>
			</nav>
			<ul class="sidenav" id="mobile-demo">
				<li><a href="index.php">Home</a></li>
				<li><a href="blog.php">Blog</a></li>
				<li class="active"><a href="#">Services</a></li>
				<?php
					if(!isset($_SESSION["uid"]))
					echo '<li><a href="login.php" class="waves-effect waves-light btn blue darken-2">LOGin</a></li>';
					else
					echo '<li><a href="#" disabled="disabled">'.$_SESSION["name"].'</a></li><li><a href="logout.php" class="waves-effect waves-light btn blue darken-2">LOGOUT</a></li>';
				?>
			</ul>
		</section>

		<section class="slide">
			<div class="slider">
				<ul class="slides">
					<li>
						<img src="images/setup1.jpeg" alt="setup">
						<div class="caption center-align white-text">
							<h1 class="header">Services</h1>
						</div>
					</li>
				</ul>
			</div>
		</section>

		<section class="services">
			<div class="container row">
				<div class="col s12 l4 center">
					<div class="card">
						<div class="card-image waves-effect waves-block waves-light">
							<img class="activator service-card" src="images/iphone2.jpeg">
						</div>
						<div class="card-content">
							<span class="card-title activator grey-text text-darken-4">Tech Website<i class="material-icons right">phone_android</i></span>
						</div>
						<div class="card-reveal">
							<span class="card-title grey-text text-darken-4">Tech Website<i class="material-icons right">close</i></span>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>
					</div>
				</div>
				<div class="col s12 l4 center">
					<div class="card">
						<div class="card-image waves-effect waves-block waves-light">
							<img class="activator service-card" src="images/iphone.jpeg">
						</div>
						<div class="card-content">
							<span class="card-title activator grey-text text-darken-4">Tech Website<i class="material-icons right">phone_iphone</i></span>
						</div>
						<div class="card-reveal">
							<span class="card-title grey-text text-darken-4">Tech Website<i class="material-icons right">close</i></span>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>
					</div>
				</div>
				<div class="col s12 l4 center">
					<div class="card">
						<div class="card-image waves-effect waves-block waves-light">
							<img class="activator service-card" src="images/headphone.jpeg">
						</div>
						<div class="card-content">
							<span class="card-title activator grey-text text-darken-4">Tech Website<i class="material-icons right">audiotrack</i></span>
						</div>
						<div class="card-reveal">
							<span class="card-title grey-text text-darken-4">Tech Website<i class="material-icons right">close</i></span>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="footer">
			<footer class="footer-one">
				<div class="container">
					<div class="row">
						<div class="col l6 s12">
							<h4 class="header white-text">Contact Us</h4>
							<p class="white-text">
								XYZ 123, Varanasi, India
							</p>
							<p class="white-text">
								+91-1234567890
							</p>
						</div>
						<div class="col l6 s12">
							<h4 class="header white-text">Social Media</h4>
							<ul>
								<li>
									<a href="#" class="white-text">Facebook</a>
								</li>
								<li>
									<a href="#" class="white-text">Instagram</a>
								</li>
								<li>
									<a href="#" class="white-text">Twitter</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="row footer-two">
						<div class="col l6 s12">
							<p class="white-text">&copy; Tech Website</p>
						</div>
						<div class="col l6 s12">
							<p class="white-text">Designed by Varun Shekhar Rai</p>
						</div>
					</div>
				</div>
			</footer>
		</section>

	</body>

	<!-- Jquery -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<!-- Materialize JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<!-- Custom JavaScript -->
	<script type="text/javascript" src="js/init.js"></script>
</html>
