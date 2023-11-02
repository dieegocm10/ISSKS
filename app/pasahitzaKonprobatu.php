<?php
	session_start();
	$hostname = "db";
	$username = "admin";
	$password = "test";
	$db = "database";

	$NAN = $_POST['NAN'];  //Bidali dioten "NAN" aldagaia, aldagai batean gorde
	$gakoa = $_POST['gakoa'];  //Bidali dioten "gakoa" aldagaia, aldagai batean gorde

	$conn = mysqli_connect($hostname, $username, $password, $db);  //Datu basearekin konektatu
	if ($conn->connect_error) {  //Konexioa ondo egin den konprobatu
	    die("Database connection failed: " . $conn->connect_error);
	}

	$sql="SELECT * FROM ERABILTZAILEA WHERE NAN = ? AND Gakoa = ?";
	$stmt=$conn->prepare($sql);
	if($stmt){
		$stmt->bind_param("ss",$NAN, $gakoa);
		$stmt->execute();
		
		$result = $stmt->get_result();
		
		$num_rows = $result->num_rows;
		
		if ($num_rows == 0) {
		    echo '<html>
			    <head>
				<title>Mezua</title>
				<style>
				    body {
				        background-color: #F17865;
				    }
				    .message {
				        font-size: 40px;
				    }
				</style>
			    </head>
			    <body>
				<div align="center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
				    <p>ERROR</p>
				    <img class="image" src="irudiak/error.png" width="200" height="150">
				    <p>NAN edo pasahitza txarto sartu dituzu!!</p>
				    <td><a href="index.html"><input type="button" name="Saiatu Berriro" value="Saiatu Berriro" class="button"></a></td>	
				</div>
			    </body>
			</html>';
		} else {
			$_SESSION['NAN'] = $NAN;
		    	header("Location: menu.php");	//menu.php-ra joan
		}
		$stmt->close();
	}


	mysqli_close($conn);	//Konexioa itxi eta irten
	exit;
?>

