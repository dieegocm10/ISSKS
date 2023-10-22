<?php

	$hostname = "db";
	$username = "admin";
	$password = "test";
	$db = "database";

	$conn = mysqli_connect($hostname, $username, $password, $db);
	if ($conn->connect_error) {
    		die("Database connection failed: " . $conn->connect_error);
	}

	$a = $_GET['parametro1'];
	$b = $_GET['parametro2'];
	$NAN = $_GET['parametro3']; 
	$gakoa = $_GET['parametro4'];  

	$query1 = mysqli_query($conn, "SELECT * FROM AUTOA WHERE Marka = '$a' AND Prezioa = '$b'")
    		or die(mysqli_error($conn));

	$row = mysqli_fetch_array($query1);

	mysqli_close($conn);

	$Marka = $row["Marka"];
	$Prezioa = $row["Prezioa"];
	$Matrikula = $row["Matrikula"];
	$KarburanteMota = $row["KarburanteMota"];
	$Modeloa = $row["Modeloa"];
  
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
			<title>Denda</title>
			<link rel="stylesheet" href="css/autoarenDatuakEditatu.css">
		</head>
		
		<body>
			<td><a href="index.html"><input type="button" name="HOME" value="HOME" class="button"></a></td>
			<td><a href="menu.php?parametro1=<?= $NAN ?>&parametro2=<?= $gakoa ?>"><input type="button" name="MENU" value="MENU" class="button"></a></td>
			<td><a href="datuakErakutsi.php?parametro1=<?= $NAN ?>&parametro2=<?= $gakoa ?>"><input type="button" name="FLOTA" value="FLOTA" class="button"></a></td>
			<div align="center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
			<div class="container">
				<div class="comment">Autoaren datuak aldatu ahal dituzu, matrikula izan ezik, edo autoa ezabatu:</div>
      				<img src="irudiak/5.jpeg" width="300" height="250">
				<div class="data-container">

					<form  method="post" onsubmit="return autoaAldatu()">
						<table>
							<tr>
								<td>MARKA:</td>
								<td><input type="text" name="marka" value="';echo $Marka;echo'"></td>
							</tr>
							<tr>
								<td>PREZIOA:</td>
								<td><input type="number" name="prezioa" value="';echo $Prezioa;  echo'"></td>
							</tr>
							<tr>
								<td>MATRIKULA:</td>
								<td><input type="text" name="matrikula" value="'; echo $Matrikula; echo'" readonly></td>
							</tr>
							<tr>
								<td>KARBURANTE MOTA:</td>
								<td><input type="text" name="karburanteMota" value="';echo $KarburanteMota;  echo'"></td>
							</tr>
							<tr>
								<td>MODELOA:</td>
								<td><input type="text" name="modeloa" value="'; echo $Modeloa;  echo'"></td>
							</tr>
							<tr>
								<td><p align="right"><input type="submit" formaction="autoaAldatu.php?lehenMatrikula=';echo $Matrikula;echo'" id="gorde"name="gorde" value="Gorde" class="button"></p></td>
								<td><p align="left"><input type="button" id="ezabatu" name="ezabatu" value="Autoa ezabatu" class="button" onclick="confirmEzabatu()" /></p></td>
							</tr>
						</table>
					</form>
				</div>
			</div></div>
			<script src="js/autoarenDatuakEditatu.js"></script>
		</body>
	</html>';
?>

