<?php
  	$marka = $_POST['marka'];  //Bidali dioten "marka" aldagaia, aldagai batean gorde
  	$prezioa = $_POST['prezioa'];  //Bidali dioten "prezioa" aldagaia, aldagai batean gorde
  	$matrikula = $_POST['matrikula'];  //Bidali dioten "matrikula" aldagaia, aldagai batean gorde
  	$karburanteMota = $_POST['karburanteMota'];  //Bidali dioten "karburanteMota" aldagaia, aldagai batean gorde
  	$modeloa = $_POST['modeloa'];  //Bidali dioten "modeloa" aldagaia, aldagai batean gorde

  	$hostname = "db";
  	$username = "ISSKS";
	$password = "LANA2";
  	$db = "database";

  	$conn = mysqli_connect($hostname, $username, $password, $db);  //Datu basearekin konektatu
  	if ($conn->connect_error) {  //Konexioa ondo egin den konprobatu
    		die("Database connection failed: " . $conn->connect_error);
  	}

  	$query = mysqli_query($conn, "INSERT INTO AUTOA VALUES ('$marka', '$prezioa', '$matrikula', '$karburanteMota', '$modeloa')")
    	or die (mysqli_error($conn));  //Saiatu datu basean auto berri bat sartzea
    	
    	header("Location: datuakErakutsi.php");  //datakErakutsi.php-ra joan
?>
