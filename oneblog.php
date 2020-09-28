<?php
session_start();
if(!isset($_SESSION["uid"])){
 header("location:login.php");
}
?>
<?php
include ('db.php');
if(isset($_POST["commentSubmit"])){
		$newComm="INSERT INTO `comment`(`bid`, `uid`, `comm`) VALUES ('".$_SESSION["bid"]."','".$_SESSION["uid"]."','$_POST[commenttext]')";
		echo $newComm;
		if(mysqli_query($con,$newComm))
		{
			header("location:oneblog.php?bid=".$_SESSION["bid"]."");
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
							echo '<li><a href="login.php" class="waves-effect waves-light btn blue darken-2">LOGin</a></li>';
							else
							echo '<li><a href="#" disabled="disabled">'.$_SESSION["name"].'</a><li><a href="logout.php" class="waves-effect waves-light btn blue darken-2">LOGOUT</a></li>';
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
					echo '<li><a href="login.php" class="waves-effect waves-light btn blue darken-2">LOGin</a></li>';
					else
					echo '<li><a href="#" disabled="disabled">'.$_SESSION["name"].'</a><li><a href="logout.php" class="waves-effect waves-light btn blue darken-2">LOGOUT</a></li>';
				?>
			</ul>
		</section>

		<section class="slide">
			<div class="slider">
				<ul class="slides">
					<li>
						<img src="images/setup1.jpeg" alt="setup">
						<div class="caption center-align white-text">
							<h1 class="header">Blog</h1>
						</div>
					</li>
				</ul>
			</div>
		</section>

		<section class="oneblog">
			<div class="container row">
				<?php
					$blog="SELECT * FROM blog WHERE bid = ".$_GET["bid"]."";
					$_SESSION["bid"]=$_GET["bid"];
					$rs = mysqli_query($con,$blog);
					while($row = mysqli_fetch_assoc($rs)){
						$user = "SELECT name FROM login WHERE uid = ".$row["uid"]."";
						$res = mysqli_query($con,$user);
							while($rowuid = mysqli_fetch_assoc($res)){
								echo "<div class='col s12'>
												<div class='card blue lighten-4'>
													<div class='card-content white-text'>
														<span class='card-title grey-text text-darken-3'>".$row["topic"]."</span>
														<p class='grey-text text-darken-3'>".$row["content"]."</p>
													</div>
													<div class='card-action'>
														<span>Author: ".$rowuid["name"]."</span>
													</div></div>";
								$comment = "SELECT * FROM comment WHERE bid = ".$row["bid"]."";
								$rescom = mysqli_query($con,$comment);
								$flag = 0;
								while($rowcom = mysqli_fetch_assoc($rescom)){
									if($flag==0){
									echo "<div class=''>
										<span><h5 class='header'>Comments:</h5></span>
									</div>";
									$flag++;
									}
									$comuser = "SELECT name FROM login WHERE uid = ".$rowcom["uid"]."";
									$rescomuser = mysqli_query($con,$comuser);
									while($rowcomuser = mysqli_fetch_assoc($rescomuser)){
										echo "<div class='card-action card white z-depth-0'>
														<span>".$rowcomuser["name"].":<br><span>".$rowcom["comm"]."</span></div><hr>";
									}
								}
								echo "</div>";
							}
					}
				?>
				<form id="commentid" class="col s12" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<div class="row">
						<div class='input-field col s12'>
							<i class='material-icons prefix' style='color: black;'>comment</i>
							<textarea id='textarea2' class='materialize-textarea' name='commenttext'></textarea>
							<label for='textarea2'>New Comment</label>
						</div>
						<div class="col s12">
							<input type="submit" id="commentBtn" name="commentSubmit" class="waves-effect waves-light btn" value="Post Comment">
						</div>
					</div>
				</form>
				<a class="col l2 push-l10 s12 waves-effect waves-light btn" href="blog.php">Go Back</a>
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
