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
	      <a class="nav-link" href="#">Pupil</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" href="#">Teachers</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" href="logout_a.php">Logout</a>
	    </li>
	  </ul>
	</nav>

	

	<div class="container" style="width: 60%; margin-top: 30px;">
		<?php if(isset($_SESSION['msg'])): ?>
		<div class="bg-<?php echo $_SESSION['msg_type'];?>">
			<h1 class="text-white" ><?php echo $_SESSION['msg']; ?> <h1>

		</div>
		<?php unset($_SESSION['msg']); endif ?>
		<form action="process.php" method="post" class="was-validated">
			<input type="hidden" name="update_id_p" value="<?php echo $id; ?>">
		  <div class="form-group">
		    <label for="email">First Name:</label>
		    <input type="text" class="form-control" name = "pupil_firstName" value = "<?php               echo $pupil_firstName; ?>" autocomplete = "off" required>
		  </div>
		  <div class="form-group">
		    <label for="pwd">Last Name:</label>
		    <input type="text" class="form-control" name = "pupil_lastName" value = "<?php                 echo $pupil_lastName; ?>" autocomplete = "off" required>
		  </div>
		  <div class="form-group">
		    <label for="pwd">Age:</label>
		    <input type="text" class="form-control" name = "pupil_age" value = "<?php echo $pupil_age; ?>"    autocomplete = "off" required>
		  </div>
		  <div class="form-group">
		    <label for="pwd">Contact:</label>
		    <input type="text" class="form-control" name = "pupil_contact" value ="<?php echo $pupil_contact; ?>" autocomplete = "off" required>
		  </div>
		  
		  <div class="form-group d-flex justify-content-end">
		  	<input type="submit" class="btn btn-success" name="btnUpdate_p" value="Update"></input>
		  </div>
		  
		</form>
	</div>
	<div class="container" style="width: 60%;">
		<table class="table table-hover">
			<thead class="thead-dark">
				<tr>
					<th>ID</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Contact</th>
					<th>Process</th>
				</tr>
			</thead>
			<?php 
				$showData = "SELECT * FROM pupils" or die("Error ".$conn->error);
				$outcome = $conn->query($showData);
				while($row = $outcome->fetch_assoc()):
			?>
			<tr>
				<td><?php echo $row['pupil_id']; ?></td>
				<td><?php echo $row['pupil_firstName']; ?></td>
				<td><?php echo $row['pupil_lastName']; ?></td>
				<td><?php echo $row['pupil_contact']; ?></td>
				<td>
					<a href="pupil.php?edit_id_p=<?php echo $row['pupil_id']; ?>" class="btn btn-info">Edit</a>
					<a href="process.php?delete_id_p=<?php echo $row['pupil_id']; ?>" class="btn btn-danger">Delete</a>
				</td>
			</tr>
			<?php endwhile ?>
		</table>
	</div>
</body>
</html>