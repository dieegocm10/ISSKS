<?php
	session_start();
	$hostname = "db";
	$username = "admin";
	$password = "test";
	$db = "database";
	
	$NAN = $_SESSION['NAN'];  //Bidali dioten "NAN" aldagaia, aldagai batean gorde

	$conn = mysqli_connect($hostname, $username, $password, $db);  //Datu basearekin konektatu
	if ($conn->connect_error) {  //Konexioa ondo egin den konprobatu
    		die("Database connection failed: " . $conn->connect_error);
	}


	$query1 = mysqli_query($conn, "SELECT * FROM ERABILTZAILEA WHERE NAN = '$NAN'")
    		or die(mysqli_error($conn));	//Saiatu erabiltzailearen informazio guztia lortzea, NAN aldagaia oinarri bezala erabilita

	$row = mysqli_fetch_array($query1);

	mysqli_close($conn);  //Datu basearekin konexioa itxi

	$izenAbizenak = $row["IzenAbizenak"];  //Aurkitu duen "IzenAbizenak", aldagai batean gorde
	$nan = $row["NAN"];	//Aurkitu duen "NAN", aldagai batean gorde
	$tlf = $row["Telefonoa"];	//Aurkitu duen "Telefonoa", aldagai batean gorde
	$jaiotzeData = $row["JaiotzeData"];	//Aurkitu duen "JaiotzeData", aldagai batean gorde
	$email = $row["Email"];	//Aurkitu duen "Email", aldagai batean gorde
	$gakoa = $row["Gakoa"];	//Aurkitu duen "Gakoa", aldagai batean gorde
	$lehenNan = $nan;  //Bidali dioten "NAN" aldagaia, aldagai batean gorde
  
	echo '<html>
		<head>
			<script>
				var lehenNan = "';echo $lehenNan; echo '";

				function confirmEzabatu() {
				    var confirmacion = confirm("Erabiltzailea ezabatu nahi duzu?");

				    if (confirmacion) {
					window.location.href = "erabiltzaileaEzabatu.php?lehenNan=" + lehenNan;
				    }
				}

			</script>
			<title>Denda</title>	<!- Izenburuan "Denda" ipini !>
			<link rel="stylesheet" href="css/datuakEditatu.css">	<!- datuakEditatu.css erabiltzea diseinua egiteko !>
		</head>
		
		<body>
			<td><a href="index.html"><input type="button" name="HOME" value="HOME" class="button"></a></td>		<!- HOME botoia ipintzea, klikatzerakoan index.html-ra joan !>
			<td><a href="menu.php"><input type="button" name="MENU" value="MENU" class="button"></a></td>	<!- MENU botoia ipintzea, klikatzerakoan menu-ra joan !>
			<div align="center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
			<div class="container">
				<div class="comment">Zure erabiltzailearen datuak aldatu ahal dituzu, NAN izan ezik, edo erabiltzailea ezabatu:</div>
        			<img class="image" src="irudiak/editar.png" width"600" height"400">
        		
				<div class="data-container">
					<form  method="post" onsubmit="return erabiltzaileaAldatu()">
						<table>
							<tr>
								<td>IZEN ABIZENAK:</td>		<!- IZEN ABIZENAK laukia ipintzea !>
								<td><input type="text" name="izenAbizenak" id="izenAbizenak" value="';echo $izenAbizenak;echo'"></td>
							</tr>
							<tr>
								<td>NAN:</td>		<!- NAN laukia ipintzea !>
			    					<td><input type="text" name="nan" id="nan" value="';echo $nan;echo'" readonly></td>
							</tr>
							<tr>
							<tr>
								<td>TELEFONOA:</td>		<!- TELEFONOA laukia ipintzea !>
								<td><input type="number" name="telefonoa" value="'; echo $tlf;echo'"></td>
							</tr>
							<tr>
								<td>JAIOTZE DATA:</td>		<!- JAIOTZE DATA laukia ipintzea !>
								<td><input type="date" name="jaiotzeData" value="'; echo $jaiotzeData;echo'"></td>
							</tr>
							<tr>
								<td>EMAIL:</td>		<!- EMAIL laukia ipintzea !>
								<td><input type="text" name="email" value="'; echo $email;echo'"></td>
							</tr>
							<tr>
								<td>GAKOA:</td>		<!- GAKOA laukia ipintzea !>
								<td><input type="text" name="gakoa" value="';echo $gakoa; echo'"></td>
							</tr>
							<tr>
								<td><p align="right"><input type="submit" formaction="erabiltzaileaAldatu.php?lehenNan=<?php echo $lehenNan; ?>" id="gorde" name="gorde" value="GORDE" class="button"></p></td>		<!- GORDE botoia ipintzea, klikatzerakoan erabiltzaileaAldatu.php-ra joan !>
								<td><p align="left"><input type="button" id="ezabatu" name="ezabatu" value="ERABILTZAILEA EZABATU" onclick="confirmEzabatu()" class="button"></p></td>	<!- EZABATU botoia ipintzea !>

							</tr>
						</table>
					</form>
				</div>
			</div></div>
			<script src="js/datuakEditatu.js"></script>	<!- datuakEditatu.js erabiltzea !>
		
		</body>
	</html>';
?>
