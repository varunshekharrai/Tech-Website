<?php
session_start();
if(!isset($_SESSION["uid"])){
 header("location:login.php");
}
?>
<?php
include ('db.php');
if(isset($_POST["newblogBtn"])){
		$newBlog="INSERT INTO `blog`(`uid`, `topic`, `content`) VALUES ('".$_SESSION["uid"]."','$_POST[topic]','$_POST[content]')";
		if(mysqli_query($con,$newBlog))
		{
			header("location:blog.php");
		}
		else
		{
			echo "<script type='text/javascript'> alert('".mysqli_error($con)."')</script>";
		}
}
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
						<li class="active"><a href="blog.php">Blog</a></li>
						<li><a href="services.php">Services</a></li>
						<?php
							if(!isset($_SESSION["uid"]))
							echo '<li><a href="login.php" class="waves-effect waves-light btn blue darken-2">LOGIN</a></li>';
							else
							echo '<li><a href="#" disabled="disabled">'.$_SESSION["name"].'</a></li><li><a href="logout.php" class="waves-effect waves-light btn blue darken-2">LOGOUT</a></li>';
						?>
					</ul>
				</div>
			</nav>
			<ul class="sidenav" id="mobile-demo">
				<li><a href="index.php">Home</a></li>
				<li class="active"><a href="blog.php">Blog</a></li>
				<li><a href="services.php">Services</a></li>
				<?php
					if(!isset($_SESSION["uid"]))
					echo '<li><a href="login.php" class="waves-effect waves-light btn blue darken-2">LOGIN</a></li>';
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
							<h1 class="header">Create a new Blog</h1>
						</div>
					</li>
				</ul>
			</div>
		</section>


		<section class="newblogsection">
			<div class="container row center">
				<div class="col l6 push-l3 s12">
					<div class="card">
						<div class="card-content white-text">
							<div id="blog">
								<div class="row">
									<form id="newblog" class="col s12" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
										<div class="row">
											<div class="input-field col s12">
												<i class="material-icons prefix" style="color: black;">closed_caption</i>
												<input id="input_text" type="text" name="topic">
												<label for="input_text">Topic</label>
											</div>
											<div class="input-field col s12">
												<i class="material-icons prefix" style="color: black;">forum</i>
												<textarea id="textarea2" class="materialize-textarea" name="content"></textarea>
												<label for="textarea2">Content</label>
											</div>
											<div class="col s12">
												<input type="submit" id="signBtn" name="newblogBtn" class="waves-effect waves-light btn" value="Create">
											</div>
										</div>
									</form>
								</div>
							</div>
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
