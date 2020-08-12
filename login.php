<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Everest | Sign In</title>
<link rel="stylesheet" href="bootstrap-4.5.0-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="navbar-dark.css">
<link rel="stylesheet" href="login.css">
</head>
<body style="background-color: #EDEFF0;">

<nav class="navbar navbar-expand-lg navbar-dark py-3" style="background-color: #3e474f;">
<a class="navbar-brand border-right pr-5 text-success font-weight-bold" href="registration.php">Everest Admission System</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
	<ul class="navbar-nav mr-auto">
		<li class="nav-item mr-3">
			<a class="nav-link font-weight-bold" href="news.php">News</a>
		</li>
		<li class="nav-item mr-3">
			<a class="nav-link font-weight-bold" href="about.php">About</a>
		</li>
		<li class="nav-item mr-3">
			<a class="nav-link font-weight-bold" href="contact.php">Contact</a>
		</li>
	</ul>
	<ul class="navbar-nav">
		<li class="nav-item active mr-3">
			<a class="nav-link font-weight-bold" href="login.php">Sign In<span class="sr-only">(current)</span></a>
		</li>
		<li class="nav-item">
			<a class="nav-link text-success register font-weight-bold" href="registration.php">Register</a>
		</li>
	</ul>
</div>
</nav>


<?php
require('db.php');
session_start();
if (isset($_POST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
		$query = "SELECT * FROM `users` WHERE username='$username'
and password='".($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
		if($rows==1){
		$_SESSION['username'] = $username;
		$_SESSION['id'] = $user_id;
		header("Location: index.php");
		}else{
			echo "
			<div class='info-card'>
				<div class='pt-5'>
					<h3>Username/password is incorrect.</h3>
					<br/>Click here to <a href='login.php'>Login</a>
				</div>
			</div>
				";
		}
	}else{
?>
<div class="container pt-5">
	<div class="w-50 mx-auto shadow-sm p-3 mb-5 bg-white rounded">
		<form action="" method="post" name="login">
			<div class="form-group input-group input-group-lg">
				<input type="text" class="form-control border-0" style="background-color: #EDEFF0;" placeholder="Username" name="username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
			</div>
			<div class="form-group input-group input-group-lg">
				<input type="password" class="form-control border-0" style="background-color: #EDEFF0;" placeholder="Password" name="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
			</div>
			<div class="d-flex justify-content-between">
				<button type="submit" class="btn btn-success mb-2" name="submit" value="Login">Sign in</button>
				<p class="login-lost text-secondary">New Here? <a href="registration.php" class="text-secondary">Register</a></p>
			</div>
		</form>
	</div>

	<?php } ?>
	<footer class="fixed-bottom border-top">
		<p class="text-muted font-weight-lighter text-center py-3 mb-0"><small>&copy; 2020 Everest Schools, Inc.</small></p>
	</footer>
</div>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
</body>
</html>