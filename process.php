<?php 
	session_start();	
	require_once('config.php');

	$pupil_firstName = "";
	$pupil_lastName = "";
	$pupil_age = "";
	$pupil_contact = "";
	$pupil_email = "";
	$pupil_password = "";

	if(isset($_POST['btnSignup'])){
		$pupil_firstName = $_POST['pupil_firstName'];
		$pupil_lastName = $_POST['pupil_lastName'];
		$pupil_age = $_POST['pupil_age'];
		$pupil_contact = $_POST['pupil_contact'];
		$pupil_email = $_POST['pupil_email'];
		$pupil_password = $_POST['pupil_password'];

		$insertQuery = "INSERT INTO pupils(pupil_firstName, pupil_lastName, pupil_age, pupil_contact, pupil_email, pupil_password) VALUES('$pupil_firstName','$pupil_lastName','$pupil_age',            '$pupil_contact','$pupil_email','$pupil_password')";
		$conn->query($insertQuery) or die ($conn->error);

		$retrieveQuery = "SELECT * FROM pupils WHERE pupil_firstName = '$pupil_firstName'" 
						or die("Error ".$conn->error);
		$result = $conn->query($retrieveQuery);
		$row = $result->fetch_array();

		if($row['pupil_firstName'] == $pupil_firstName) {
			$_SESSION['user_pupil'] = $pupil_firstName;		
		}

		header("location: index.php");
	}

	if(isset($_POST['btnLogin'])){
		$pupil_email = $_POST['pupil_email'];
		$pupil_password = $_POST['pupil_password'];

		$retrieveQuery = "SELECT * FROM pupils WHERE pupil_email = '$pupil_email' AND pupil_password = 
						'$pupil_password' " or die("Error ".$conn->error);
		$result = $conn->query($retrieveQuery);
		$row = $result->fetch_array();
		if($row['pupil_email'] == $pupil_email && $row['pupil_password'] == $pupil_password){
			$_SESSION['user_pupil'] = $row['pupil_firstName'];		
			header("location: index.php");
		}else{
			header("location: login.php");
		}
		
	}
?>