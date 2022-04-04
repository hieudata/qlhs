<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "qlhs";
	
	$conn = new mysqli($host, $user, $pass, $db);
	$conn->set_charset("utf8");
	if($conn->connect_error){
		echo "Seems like you have not configured the database. Failed To Connect to database:" . $conn->connect_error;
	}
?>