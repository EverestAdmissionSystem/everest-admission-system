<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome to Everest Schools</title>
<!-- <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css"> -->
<link rel="stylesheet" href="bootstrap-4.5.0-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="registration.css">
</head>
<body style="background-color: #fff;">

<nav class="navbar navbar-expand-lg navbar-light py-3" style="background-color: #fff;">
<a class="navbar-brand text-success font-weight-bold" href="registration.php">Everest Admission System</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
	<ul class="navbar-nav mr-auto">
	</ul>
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link font-weight-bold text-secondary" href="login.php">Sign In</a>
		</li>
	</ul>
</div>
</nav>

<?php
require('db.php');
if (isset($_REQUEST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($con,$username); 
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into users (username, password, email, trn_date, form, examination)
		VALUES ('$username', '$password', '$email', '$trn_date', 0, 0)";
        $result = mysqli_query($con,$query);
        if($result){
			echo "	
				<div class='info-card mb-5'>
					<div class='pt-5'>
						<h3>You are registered successfully.</h3>
						<br/>Click here to <a href='login.php'>Login</a>
					</div>
				</div>";
        }else{
			die(mysqli_error($con));
		}
    }else{
?>

<div class="container mw-100 px-5" id="element-with-background-image">
	<div class="row">
		<div class="col d-flex align-items-center">
			<div>
				<h1 class="hero hero-header">Study in Tanzania's top school</h1>
				<h2 class="hero hero-subheader">Whatever your goal — we'll get you there</h2>
			</div>
		</div>
		<div class="col w-25 mx-auto shadow p-3 bg-white rounded">
			<p class="text-center font-weight-normal register-banner">Create Your Account Today!</p>
			<form class="login" action="registration.php" method="post">
				<div class="form-group px-3">
					<label for="username">Username</label>
					<div class="input-group input-group-lg">
						<input type="text" class="form-control" style="background-color: #FFF;" name="username" id="username">
					</div>
				</div>
				<div class="form-group px-3">
					<label for="email">Email address</label>
					<div class="input-group input-group-lg">
						<input type="email" class="form-control" id="email" name="email" style="background-color: #FFF;" aria-describedby="emailHelp">
					</div>
				</div>
				<div class="form-group px-3">
					<label for="password">Password</label>
					<div class="input-group input-group-lg mb-4">
						<input type="password" class="form-control" style="background-color: #FFF;" name="password" id="password">
					</div>
				</div>
				<div class="px-3 pb-4">
					<button type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="Login">
						Create Account
						<svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-caret-right-fill" fill="#fff" xmlns="http://www.w3.org/2000/svg">
							<path d="M12.14 8.753l-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
						</svg>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php } ?>

<footer class="sticky-bottom footer">
	<p class="text-muted font-weight-lighter text-center py-3 mb-0"><small>&copy; 2020 Everest Schools, Inc.</small></p>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
</body>
</html>