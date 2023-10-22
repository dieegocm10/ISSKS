<?php

	$hostname = "db";
	$username = "admin";
	$password = "test";
	$db = "database";
	
	$NAN = $_GET['parametro1'];
	$gakoa = $_GET['parametro2']; 

	$conn = mysqli_connect($hostname, $username, $password, $db);
	if ($conn->connect_error) {
    		die("Database connection failed: " . $conn->connect_error);
	}


	$query1 = mysqli_query($conn, "SELECT * FROM ERABILTZAILEA WHERE NAN = '$NAN' AND Gakoa = '$gakoa'")
    		or die(mysqli_error($conn));

	$row = mysqli_fetch_array($query1);

	mysqli_close($conn);

	$izenAbizenak = $row["IzenAbizenak"];
	$nan = $row["NAN"];
	$tlf = $row["Telefonoa"];
	$jaiotzeData = $row["JaiotzeData"];
	$email = $row["Email"];
	$gakoa = $row["Gakoa"];
	$lehenNan = $nan;
  
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
			<title>Denda</title>
			<link rel="stylesheet" href="css/datuakEditatu.css">
		</head>
		
		<body>
			<td><a href="index.html"><input type="button" name="HOME" value="HOME" class="button"></a></td>
			<td><a href="menu.php?parametro1=';echo $NAN ;echo '&parametro2=';echo $gakoa ;echo '"><input type="button" name="MENU" value="MENU" class="button"></a></td>
			<div align="center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
			<div class="container">
				<div class="comment">Zure erabiltzailearen datuak aldatu ahal dituzu, NAN izan ezik, edo erabiltzailea ezabatu:</div>
        			<img class="image" src="irudiak/editar.png" width"600" height"400">
        		
				<div class="data-container">
					<form  method="post" onsubmit="return erabiltzaileaAldatu()">
						<table>
							<tr>
								<td>IZEN ABIZENAK:</td>
								<td><input type="text" name="izenAbizenak" id="izenAbizenak" value="';echo $izenAbizenak;echo'"></td>
							</tr>
							<tr>
								<td>NAN:</td>
			    					<td><input type="text" name="nan" id="nan" value="';echo $nan;echo'" readonly></td>
							</tr>
							<tr>
							<tr>
								<td>TELEFONOA:</td>
								<td><input type="number" name="telefonoa" value="'; echo $tlf;echo'"></td>
							</tr>
							<tr>
								<td>JAIOTZE DATA:</td>
								<td><input type="date" name="jaiotzeData" value="'; echo $jaiotzeData;echo'"></td>
							</tr>
							<tr>
								<td>EMAIL:</td>
								<td><input type="text" name="email" value="'; echo $email;echo'"></td>
							</tr>
							<tr>
								<td>GAKOA:</td>
								<td><input type="text" name="gakoa" value="';echo $gakoa; echo'"></td>
							</tr>
							<tr>
								<td><p align="right"><input type="submit" formaction="erabiltzaileaAldatu.php?lehenNan=<?php echo $lehenNan; ?>" id="gorde" name="gorde" value="GORDE" class="button"></p></td>
								<td><p align="left"><input type="button" id="ezabatu" name="ezabatu" value="ERABILTZAILEA EZABATU" onclick="confirmEzabatu()" class="button"></p></td>

							</tr>
						</table>
					</form>
				</div>
			</div></div>
			<script src="js/datuakEditatu.js"></script>
		
		</body>
	</html>';
?>
