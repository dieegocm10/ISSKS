<?php
  	$marka = $_POST['marka'];
  	$prezioa = $_POST['prezioa'];
  	$matrikula = $_POST['matrikula'];
  	$karburanteMota = $_POST['karburanteMota'];
  	$modeloa = $_POST['modeloa'];

  	$hostname = "db";
  	$username = "admin";
  	$password = "test";
  	$db = "database";

  	$conn = mysqli_connect($hostname, $username, $password, $db);
  	if ($conn->connect_error) {
    		die("Database connection failed: " . $conn->connect_error);
  	}

  	$query = mysqli_query($conn, "INSERT INTO AUTOA VALUES ('$marka', '$prezioa', '$matrikula', '$karburanteMota', '$modeloa')")
    	or die (mysqli_error($conn));
?>
