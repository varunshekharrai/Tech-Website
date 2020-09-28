<?php
session_start();
unset($_SESSION["bid"]);
if(isset($_SESSION["uid"])){
 header("location:index.php");
}
?>
<?php
include ('db.php');
if(isset($_POST["signupsubmit"])){
		$newUser="INSERT INTO `login`(`name`, `phone`, `email`, `password`) VALUES ('$_POST[name]','$_POST[phone]','$_POST[email]','$_POST[password]')";
		if(mysqli_query($con,$newUser))
		{
			header("location:login.php");
		}
		else
		{
			echo "<script type='text/javascript'> alert('".mysqli_error($con)."')</script>";
		}
}
else if(isset($_POST["loginsubmit"])){
	$check="SELECT * FROM login WHERE email = '$_POST[emaillog]' AND password = '$_POST[passwordlog]'";
	$rs = mysqli_query($con,$check);
	if(mysqli_num_rows($rs) > 0){
		while($row = mysqli_fetch_assoc($rs)){
			$_SESSION["uid"] = $row["uid"];
			$_SESSION["name"] = $row["name"];
			if(isset($_SESSION["uid"])){
			 header("location:index.php");
			}
		}
	}
	else{
		echo "<script type='text/javascript'> alert('Wrong Credentials')</script>";
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
						<li><a href="services.php">Services</a></li>
						<li><a href="#" class="waves-effect waves-light btn blue darken-2">LOGin</a></li>
					</ul>
				</div>
			</nav>
			<ul class="sidenav" id="mobile-demo">
				<li><a href="index.php">Home</a></li>
				<li><a href="blog.php">Blog</a></li>
				<li><a href="services.php">Services</a></li>
				<li><a href="#" class="waves-effect waves-light btn blue darken-2">LOGin</a></li>
			</ul>
		</section>

		<section class="log">
			<div class="container row center">
				<div class="col l6 push-l3 s12">
					<div class="card">
						<div class="card-tabs">
							<ul class="tabs tabs-fixed-width  blue lighten-5">
								<li class="tab"><a class="active" href="#login">LOGIN</a></li>
								<li class="tab"><a href="#signup">SIGN UP</a></li>
							</ul>
						</div>
						<div class="card-content white-text">
							<div id="login">
								<div class="row">
									<form id="loin" class="col s12" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
										<div class="row">
											<div class="input-field col s12">
												<i class="material-icons prefix" style="color: black;">email</i>
												<input id="email" type="email" name="emaillog" class="validate">
												<label for="email">Email</label>
												<span class="helper-text" data-error="wrong" data-success="right">Email should be of the form example@xyz.com</span>
											</div>
											<div class="input-field col s12">
												<i class="material-icons prefix" style="color: black;">security</i>
												<input id="email" type="password" name="passwordlog" class="validate">
												<label for="email">Password</label>
											</div>
											<div class="col s12">
												<input type="submit" id="signBtn" name="loginsubmit" class="waves-effect waves-light btn" value="LogIn">
											</div>
										</div>
									</form>
								</div>
							</div>
							<div id="signup">
								<div class="row">
									<form class="col s12" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
										<div class="row">
											<div class="input-field col s6">
												<i class="material-icons prefix" style="color: black;">account_circle</i>
												<input id="icon_prefix" name="name" type="text" class="validate">
												<label for="icon_prefix">Name</label>
											</div>
											<div class="input-field col s6">
												<i class="material-icons prefix" style="color: black;">phone</i>
												<input id="icon_telephone" name="phone" type="tel" class="validate">
												<label for="icon_telephone">Telephone</label>
											</div>
											<div class="input-field col s12">
												<i class="material-icons prefix" style="color: black;">email</i>
												<input id="email" name="email" type="email" class="validate">
												<label for="email">Email</label>
												<span class="helper-text" data-error="wrong" data-success="right">Email should be of the form example@xyz.com</span>
											</div>
											<div class="input-field col s12">
												<i class="material-icons prefix" style="color: black;">security</i>
												<input id="password" name="password" type="password" class="validate">
												<label for="email">Password</label>
											</div>
											<div class="col s12">
												<input type="submit" id="signBtn" name="signupsubmit" class="waves-effect waves-light btn" value="Sign Up">
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
