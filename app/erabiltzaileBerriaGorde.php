<?php
  	$izenAbizenak = $_POST['izenAbizenak'];  //Bidali dioten "izenAbizenak" aldagaia, aldagai batean gorde
  	$nan = $_POST['nan'];  //Bidali dioten "nan" aldagaia, aldagai batean gorde
  	$telefonoa = $_POST['telefonoa'];  //Bidali dioten "telefonoa" aldagaia, aldagai batean gorde
  	$email = $_POST['email'];  //Bidali dioten "email" aldagaia, aldagai batean gorde
  	$jaiotzeData = $_POST['jaiotzeData'];  //Bidali dioten "jaiotzeData" aldagaia, aldagai batean gorde
  	$gakoa = $_POST['gakoa'];  //Bidali dioten "gakoa" aldagaia, aldagai batean gorde

  	$hostname = "db";
  	$username = "admin";
  	$password = "test";
  	$db = "database";

  	$conn = mysqli_connect($hostname, $username, $password, $db);  //Datu basearekin konektatu
  	if ($conn->connect_error) {  //Konexioa ondo egin den konprobatu
    		die("Database connection failed: " . $conn->connect_error);
  	}
  	mysqli_set_charset($conn, "utf8mb4");
  	
  	$sql="INSERT INTO ERABILTZAILEA VALUES (?,?,?,?,?,?)";
	$stmt=$conn->prepare($sql);
	if($stmt){
		$stmt->bind_param("sssiss",$izenAbizenak, $nan,$gakoa,$telefonoa,$jaiotzeData,$email);
		$stmt->execute();
		
		$result = $stmt->get_result();
		
		$stmt->close();
	}
    	
    	mysqli_close($conn);	//Datu basearekin konexioa itxi 

	header("Location: index.html");	//index.html-ra joan
	
	exit;
?>
