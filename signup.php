<?php 
	session_start();
	if(isset($_SESSION['user_pupil'])){
		header('location: index.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>School Manager</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
</head>
<body background="images/bg_1.jpg">
	<nav class="navbar navbar-light">
		<div class="row">	
			<a class="nav-link text-white" href="login_t.php">Teacher</a>
  			<a class="nav-link text-white " href="login.php">Pupil</a>
  		</div>
	</nav>
	<div class="container" style="width: 50%; margin-top: 5%;">
	<h1 class="text-white">Pupil</h1>
	<form action="process.php" method="post" class="was-validated">
		<div class="form-group">
			<input type="text" class="form-control" name="pupil_firstName" placeholder="Enter first name"
			autocomplete="off" required>
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="pupil_lastName" placeholder="Enter last name" 
			autocomplete="off" required>
		</div>
		<div class="form-group">
			<input type="number" class="form-control" name="pupil_age" placeholder="Enter age" 
			autocomplete="off" required>
		</div>
		<div class="form-group">
			<input type="number" class="form-control" name="pupil_contact" placeholder="Enter contact number" 
			autocomplete="off" required>
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="pupil_email" placeholder="Enter email" 
			autocomplete="off" required>
		</div>
		<div class="form-group">
			<input type="password" class="form-control" name="pupil_password" placeholder="Enter password" 
			autocomplete="off" required>
		</div>
		
		<input type="submit" name="btnSignup" class="btn btn-primary float-right" value="Sign Up"></input>
		<a href="login.php" class="text-white">Already have an accout?</a>
		<!-- GUMANA KA GITITITITI -->
	</form>
	</div>
</body>
</html>