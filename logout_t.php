<?php 
	session_start();
	unset($_SESSION['user_teacher']);
	session_destroy();
	header('location: login_t.php');
?>