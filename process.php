<?php 
	session_start();	
	require_once('config.php');

	$id = 0;
	$pupil_firstName = "";
	$pupil_lastName = "";
	$pupil_age = "";
	$pupil_contact = "";

	$teacher_firstName = "";
	$teacher_lastName = "";
	$teacher_age = "";
	$teacher_contact = "";

	//pupil
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

	//teacher
	if(isset($_POST['btnSignup_t'])){
		$teacher_firstName = $_POST['teacher_firstName'];
		$teacher_lastName = $_POST['teacher_lastName'];
		$teacher_age = $_POST['teacher_age'];
		$teacher_contact = $_POST['teacher_contact'];
		$teacher_email = $_POST['teacher_email'];
		$teacher_password = $_POST['teacher_password'];

		$insertData = "INSERT INTO teacher(teacher_firstName, teacher_lastName, teacher_age, teacher_contact, teacher_email, teacher_password) VALUES('$teacher_firstName', '$teacher_lastName','$teacher_age',
			'$teacher_contact','$teacher_email','$teacher_password')";
		$conn->query($insertData) or die ("Error ".$conn->error);

		$getData = "SELECT * FROM teacher WHERE teacher_firstName = '$teacher_firstName'";
		$output = $conn->query($getData) or die("Error ".$conn->error);
		$row = $output->fetch_array();
		$_SESSION['user_teacher'] = $row['teacher_firstName'];

		header("location: index_t.php");
	}

	if(isset($_POST['btnLogin_t'])){
		$teacher_email = $_POST['teacher_email'];
		$teacher_password = $_POST['teacher_password'];

		$getData = "SELECT * FROM teacher WHERE teacher_email = '$teacher_email' AND teacher_password =       '$teacher_password'";
		$result = $conn->query($getData);
		$row = $result->fetch_array();
		if($row['teacher_email'] == $teacher_email && $row['teacher_password'] == $teacher_password){
			$_SESSION['user_teacher'] = $row['teacher_firstName'];
			header('location: index_t.php');
		}else{
			header('location: login_t.php');
		}
	}

	//admin
	if(isset($_POST['btnSignup_a'])){
		$admin_firstName = $_POST['admin_firstName'];
		$admin_lastName = $_POST['admin_lastName'];
		$admin_email = $_POST['admin_email'];
		$admin_password = $_POST['admin_password'];

		$insertQuery = "INSERT INTO admin(admin_firstName, admin_lastName, admin_email, admin_password) VALUES('$admin_firstName', '$admin_lastName', '$admin_email', '$admin_password')";
		$conn->query($insertQuery) or die("Error ".$conn->error);

		$retrieveQuery = "SELECT * FROM admin WHERE admin_firstName = '$admin_firstName' ";
		$result = $conn->query($retrieveQuery) or die("Error ".$conn->error);
		$row = $result->fetch_array();
		if($row['admin_firstName'] == $admin_firstName){
			$_SESSION['user_admin'] = $row['admin_firstName'];
		}

		header("location: index_a.php");
	}

	if(isset($_POST['btnLogin_a'])){
		$admin_email = $_POST['admin_email'];
		$admin_password = $_POST['admin_password'];

		$retrieveQuery = "SELECT * FROM admin WHERE admin_email = '$admin_email' AND admin_password =        '$admin_password'";
		$result = $conn->query($retrieveQuery);
		$row = $result->fetch_array();
		if($row['admin_email'] == $admin_email && $row['admin_password'] == $admin_password){
			$_SESSION['user_admin'] = $row['admin_firstName'];
			header("location: index_a.php");
		}else{
			header("location: login_a.php");
		}
	}

	if(isset($_GET['delete_id_p'])){
		$id = $_GET['delete_id_p'];
		$deleteQuery = "DELETE FROM pupils WHERE pupil_id = '$id'";
		$conn->query($deleteQuery) or die("Error ".$conn->error);
		header("location: pupil.php");
		$_SESSION['msg'] = "User deleted";
		$_SESSION['msg_type'] = "danger";
	}

	if(isset($_GET['edit_id_p'])){
		$id = $_GET['edit_id_p']; //pupil id
		$getQuery = "SELECT * FROM pupils WHERE pupil_id = '$id'";
		$result = $conn->query($getQuery) or die("Error ".$conn->error);
		if(count($result) > 0){
			$row = $result->fetch_assoc();
			$pupil_firstName = $row['pupil_firstName'];
			$pupil_lastName = $row['pupil_lastName'];
			$pupil_age = $row['pupil_age'];
			$pupil_contact = $row['pupil_contact'];
		}
	}

	if(isset($_POST['btnUpdate_p'])){
		$update_id_p = $_POST['update_id_p'];
		$pupil_firstName = $_POST['pupil_firstName'];
		$pupil_lastName = $_POST['pupil_lastName'];
		$pupil_age = $_POST['pupil_age'];
		$pupil_contact = $_POST['pupil_contact'];

		$updateQuery = "UPDATE pupils SET pupil_firstName = '$pupil_firstName', pupil_lastName =             '$pupil_lastName', pupil_age = '$pupil_age', pupil_contact = '$pupil_contact' WHERE pupil_id = 
			'$update_id_p'";
		$conn->query($updateQuery) or die("Error sa update ".$conn->error);

		$_SESSION['msg'] = "Update success";
		$_SESSION['msg_type'] = "success";

		header("location: pupil.php");

	}

	if(isset($_GET['delete_id_t'])){
		$id = $_GET['delete_id_t'];
		$deleteQuery = "DELETE FROM teacher WHERE teacher_id = '$id'";
		$conn->query($deleteQuery) or die("Error ".$conn->error);
		header("location: teacher.php");
		$_SESSION['msg'] = "User deleted";
		$_SESSION['msg_type'] = "danger";
	}

	if(isset($_GET['edit_id_t'])){
		$id = $_GET['edit_id_t']; //teacher id
		$getQuery = "SELECT * FROM teacher WHERE teacher_id = '$id'";
		$result = $conn->query($getQuery) or die("Error ".$conn->error);
		if(count($result) > 0){
			$row = $result->fetch_assoc();
			$teacher_firstName = $row['teacher_firstName'];
			$teacher_lastName = $row['teacher_lastName'];
			$teacher_age = $row['teacher_age'];
			$teacher_contact = $row['teacher_contact'];
		}
	}

	if(isset($_POST['btnUpdate_t'])){
		$update_id_t = $_POST['update_id_t'];
		$teacher_firstName = $_POST['teacher_firstName'];
		$teacher_lastName = $_POST['teacher_lastName'];
		$teacher_age = $_POST['teacher_age'];
		$teacher_contact = $_POST['teacher_contact'];

		$updateQuery = "UPDATE teacher SET teacher_firstName = '$teacher_firstName', teacher_lastName =      '$teacher_lastName', teacher_age = '$teacher_age', teacher_contact = '$teacher_contact' WHERE teacher_id = '$update_id_t'";
		$conn->query($updateQuery) or die("Error sa update ".$conn->error);

		$_SESSION['msg'] = "Update success";
		$_SESSION['msg_type'] = "success";

		header("location: teacher.php");

	}
?>