<?php 
	include_once('process.php');
	if(!isset($_SESSION['user_admin'])){
		header('location: login_a.php');
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
<body>
	
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  	<!-- Brand/logo -->
	  <a class="navbar-brand" href="#">
	    <img src="images/prof_pic_4.png" class="d-inline" style="width:40px;">
	    <p class="d-inline"><?php if(isset($_SESSION['user_admin'])){ echo $_SESSION['user_admin'];} ?></p>
	  </a>
	  
	  <!-- Links -->
	  <ul class="navbar-nav">
	    <li class="nav-item">
	      <a class="nav-link" href="index_a.php">Home</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" href="pupil.php">Pupils</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" href="teacher.php">Teachers</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" href="logout_a.php">Logout</a>
	    </li>
	  </ul>
	</nav>

	<div class="container">
		<h3>Landing Page Admin</h3>
	</div>
</body>
</html>