<?php
	session_start();
	$hostname = "db";
	$username = "ISSKS";
	$password = "LANA2";
	$db = "database";
	
	$gakoa = $_POST['Gakoa'];  //Bidali dioten "gakoa" aldagaia, aldagai batean gorde
	$lehenNan = $_SESSION['NAN'];  //Bidali dioten "NAN" aldagaia, aldagai batean gorde
	  
	$conn = mysqli_connect($hostname, $username, $password, $db);  //Datu basearekin konektatu
	if ($conn->connect_error) {  //Konexioa ondo egin den konprobatu
	    	die("Database connection failed: " . $conn->connect_error);
	}
	$query1 = mysqli_query($conn, "SELECT Gatza FROM ERABILTZAILEA WHERE NAN = 'lehenNan'")
		or die (mysqli_error($conn));
		
		
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();
	$salt = $row['Gatza'];
	$passwordWithSalt = $gakoa . $salt; // Concatenar la contraseña con la sal
	$hashedPassword = password_hash($passwordWithSalt, PASSWORD_BCRYPT); // Aplicar la función de hash usando Bcrypt
	
	
	$query2 = mysqli_query($conn,"UPDATE ERABILTZAILEA 
		                      SET HashedPassword = '$hashedPassword'
		                      WHERE NAN = '$lehenNan'")
	  	or die (mysqli_error($conn));  //Saiatu datu basean "lehenNAN" oinarri bezala erabiliz,erabiltzailearen atributuak eguneratzea



	header("Location: index.html");  //index.html-ra joan
	  
	mysqli_close($conn);  //Datu basearekin konexioa itxi eta irten
	exit;
?>
