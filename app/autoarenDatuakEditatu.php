<?php

	$hostname = "db";
	$username = "admin";
	$password = "test";
	$db = "database";

	$conn = mysqli_connect($hostname, $username, $password, $db);  //Datu basearekin konektatu
	if ($conn->connect_error) {  //Konexioa ondo egin den konprobatu
    		die("Database connection failed: " . $conn->connect_error);
	}

	$a = $_GET['parametro1'];  //Bidali dioten "parametro1" aldagaia, aldagai batean gorde
	$b = $_GET['parametro2'];  //Bidali dioten "parametro2" aldagaia, aldagai batean gorde
	$NAN = $_GET['parametro3'];   //Bidali dioten "parametro3" aldagaia, aldagai batean gorde
	$gakoa = $_GET['parametro4'];    //Bidali dioten "parametro4" aldagaia, aldagai batean gorde

	$query1 = mysqli_query($conn, "SELECT * FROM AUTOA WHERE Marka = '$a' AND Prezioa = '$b'")
    		or die(mysqli_error($conn));	//Saiatu autoaren informazio guztia lortzea, a eta b aldagaiak oinarri bezala erabilita

	$row = mysqli_fetch_array($query1);

	mysqli_close($conn);  //Datu basearekin konexioa itxi

	$Marka = $row["Marka"];	//Aurkitu duen "Marka", aldagai batean gorde
	$Prezioa = $row["Prezioa"];	//Aurkitu duen "Prezioa", aldagai batean gorde
	$Matrikula = $row["Matrikula"];	//Aurkitu duen "Matrikula", aldagai batean gorde
	$KarburanteMota = $row["KarburanteMota"];	//Aurkitu duen "KarburanteMota", aldagai batean gorde
	$Modeloa = $row["Modeloa"];	//Aurkitu duen "Modeloa", aldagai batean gorde
  
	echo '<html>
		<head>
			<script>
				var lehenMatrikula = "';echo $Matrikula; echo '";

				function confirmEzabatu() {
				    var confirmacion = confirm("Autoa ezabatu nahi duzu?");

				    if (confirmacion) {
					window.location.href = "autoaEzabatu.php?lehenMatrikula=" + lehenMatrikula;
				    }
				}

			</script>
			<title>Denda</title>	<!- Izenburuan "Denda" ipini !>
			<link rel="stylesheet" href="css/autoarenDatuakEditatu.css">	<!- autoarenDatuakEditatu.css erabiltzea diseinua egiteko !>
		</head>
		
		<body>
			<td><a href="index.html"><input type="button" name="HOME" value="HOME" class="button"></a></td>		<!- HOME botoia ipintzea, klikatzerakoan index.html-ra joan !>
			<td><a href="menu.php?parametro1=<?= $NAN ?>&parametro2=<?= $gakoa ?>"><input type="button" name="MENU" value="MENU" class="button"></a></td>	<!- MENU botoia ipintzea, klikatzerakoan menu-ra joan !>
			<td><a href="datuakErakutsi.php?parametro1=<?= $NAN ?>&parametro2=<?= $gakoa ?>"><input type="button" name="FLOTA" value="FLOTA" class="button"></a></td>	<!- FLOTA botoia ipintzea, klikatzerakoan datuakErakutsi.php-ra joan !>
			<div align="center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
			<div class="container">
				<div class="comment">Autoaren datuak aldatu ahal dituzu, matrikula izan ezik, edo autoa ezabatu:</div>
      				<img src="irudiak/5.jpeg" width="300" height="250">
				<div class="data-container">

					<form  method="post" onsubmit="return autoaAldatu()">
						<table>
							<tr>
								<td>MARKA:</td>		<!- MARKA laukia ipintzea !>
								<td><input type="text" name="marka" value="';echo $Marka;echo'"></td>
							</tr>
							<tr>
								<td>PREZIOA:</td>	<!- PREZIOA laukia ipintzea !>
								<td><input type="number" name="prezioa" value="';echo $Prezioa;  echo'"></td>
							</tr>
							<tr>
								<td>MATRIKULA:</td>	<!- MATRIKULA laukia ipintzea !>
								<td><input type="text" name="matrikula" value="'; echo $Matrikula; echo'" readonly></td>
							</tr>
							<tr>
								<td>KARBURANTE MOTA:</td>	<!- KARBURANTEA laukia ipintzea !>
								<td><input type="text" name="karburanteMota" value="';echo $KarburanteMota;  echo'"></td>
							</tr>
							<tr>
								<td>MODELOA:</td>	<!- MODELOA laukia ipintzea !>
								<td><input type="text" name="modeloa" value="'; echo $Modeloa;  echo'"></td>
							</tr>
							<tr>
								<td><p align="right"><input type="submit" formaction="autoaAldatu.php?lehenMatrikula=';echo $Matrikula;echo'" id="gorde"name="gorde" value="Gorde" class="button"></p></td>	<!- GORDE botoia ipintzea, klikatzerakoan autoaAldatu.php-ra joan !>
								<td><p align="left"><input type="button" id="ezabatu" name="ezabatu" value="Autoa ezabatu" class="button" onclick="confirmEzabatu()" /></p></td>	<!- EZABATU botoia ipintzea !>
							</tr>
						</table>
					</form>
				</div>
			</div></div>
			<script src="js/autoarenDatuakEditatu.js"></script>	<!- autoarenDatuakEditatu.js erabiltzea !>
		</body>
	</html>';
?>

