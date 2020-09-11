<?php 
	$serverName = "localhost";
	$userName = "root";
	$serverPassword = "";
	$dbName = "school";

	$conn = new mysqli($serverName, $userName, $serverPassword, $dbName) 
	or die ("Connection failed: ".mysqli_error($conn));
?>