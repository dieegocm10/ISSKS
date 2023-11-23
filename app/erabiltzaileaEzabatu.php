<?php
	session_start();
	if (isset($_SESSION['NAN'])) {
		$hostname = "db";
		$username = "ISSKS";
		$password = "LANA2";
		$db = "database";

		$lehenNan = $_SESSION['NAN'];	//Bidali dioten "NAN" aldagaia, aldagai batean gorde
		  
		$conn = mysqli_connect($hostname, $username, $password, $db);  //Datu basearekin konektatu
		if ($conn->connect_error) {  //Konexioa ondo egin den konprobatu
		    	die("Database connection failed: " . $conn->connect_error);
		}
		$query1 = mysqli_query($conn, "DELETE FROM ERABILTZAILEA
				              WHERE NAN = '$lehenNan'")
		  	or die (mysqli_error($conn));  //Saiatu datu basean "lehenNAN" oinarri bezala erabiliz, erabiltzailea ezabatzen

		header("Location: index.html");  //index.html-ra joan  
		mysqli_close($conn);  //Datu basearekin konexioa itxi eta irten
		exit;
	} else {
		echo "404";
	}
?>
