<?php
	session_start();
	$hostname = "db";
	$username = "ISSKS";
	$password = "LANA2";
	$db = "database";
	
	$izenAbizenak = $_POST['izenAbizenak'];  //Bidali dioten "izenAbizenak" aldagaia, aldagai batean gorde
	$nan = $_POST['nan'];  //Bidali dioten "nan" aldagaia, aldagai batean gorde
	$telefonoa = $_POST['telefonoa'];  //Bidali dioten "telefonoa" aldagaia, aldagai batean gorde
	$email = $_POST['email'];  //Bidali dioten "email" aldagaia, aldagai batean gorde
	$jaiotzeData = $_POST['jaiotzeData'];  //Bidali dioten "jaiotzeData" aldagaia, aldagai batean gorde
	$lehenNan = $_SESSION['NAN'];  //Bidali dioten "NAN" aldagaia, aldagai batean gorde
	  
	$conn = mysqli_connect($hostname, $username, $password, $db);  //Datu basearekin konektatu
	if ($conn->connect_error) {  //Konexioa ondo egin den konprobatu
	    	die("Database connection failed: " . $conn->connect_error);
	}
	$query1 = mysqli_query($conn, "UPDATE ERABILTZAILEA 
		                      SET IzenAbizenak = '$izenAbizenak',
		                          NAN = '$nan',
		                          Telefonoa = '$telefonoa',
		                          JaiotzeData = '$jaiotzeData',
		                          Email = '$email'
		                      WHERE NAN = '$lehenNan'")
	  	or die (mysqli_error($conn));  //Saiatu datu basean "lehenNAN" oinarri bezala erabiliz,erabiltzailearen atributuak eguneratzea


	mysqli_close($conn);  //Datu basearekin konexioa itxi eta irten
	header("Location: index.html");  //index.html-ra joan
	exit;
?>
