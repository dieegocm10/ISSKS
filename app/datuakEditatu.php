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

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<script>
			var lehenNan = "<?php echo $lehenNan; ?>";
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
    		<a href="index.php"><input type="button" name="HOME" value="HOME" class="button"></a>	
		<a href="menu.php"><input type="button" name="MENU" value="MENU" class="button"></a>	
		<div align="center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
			<div class="container">
				<div class="comment">Zure erabiltzailearen datuak aldatu ahal dituzu, NAN izan ezik, edo erabiltzailea ezabatu:</div>
        			<img class="image" src="irudiak/editar.png" width"600" height"400">
			    	<div class="data-container">
					<form method="post" onsubmit="return datuakKonprobatu()">
				    		<table>
							<tr>
								<td>IZEN ABIZENAK:</td>
							    	<td><input type="text" name="izenAbizenak" id="izenAbizenak" value="<?php echo $izenAbizenak; ?>"></td>
							</tr>
							<tr>
								 <td>NAN:</td>
								 <td><input type="text" name="nan" id="nan" value="<?php echo $nan; ?>" readonly></td>
							</tr>
							<tr>
								<td>TELEFONOA:</td>
							        <td><input type="number" name="telefonoa" value="<?php echo $tlf; ?>"></td>
							</tr>
							<tr>
							        <td>JAIOTZE DATA:</td>
							        <td><input type="date" name="jaiotzeData" value="<?php echo $jaiotzeData; ?>"></td>
							</tr>
							<tr>
							        <td>EMAIL:</td>
							        <td><input type="text" name="email" value="<?php echo $email; ?>"></td>
							</tr>
							<td>GAKOA:</td>		
								<td><input type="text" name="gakoa" value="<?php echo $gakoa; ?>"></td>
							</tr>
							<tr>
								<td><p align="right"><input type="submit" formaction="erabiltzaileaAldatu.php?lehenNan=<?php echo $lehenNan; ?>" id="gorde" name="gorde" value="GORDE" class="button"></p></td>	
								<td><p align="left"><input type="button" id="ezabatu" name="ezabatu" value="ERABILTZAILEA EZABATU" onclick="confirmEzabatu()" class="button"></p></td>	
							</tr>
				    		</table>
					</form>
				</div>
			</div>
		</div>
		<script>
			function datuakKonprobatu() { //Datuak ondo ipini diren konprobatzeko:
				var izenAbizenak = document.getElementsByName("izenAbizenak")[0].value; //Izen Abizenaren balioa aldagai batean gorde	
			    	var nan = document.getElementsByName("nan")[0].value; //NAN balioa aldagai batean gorde	
			    	var telefonoa = document.getElementsByName("telefonoa")[0].value; //Telefono balioa aldagai batean gorde	
			    	var jaiotzeData = document.getElementsByName("jaiotzeData")[0].value; //Jaiotze dataren balioa aldagai batean gorde	
			    	var email = document.getElementsByName("email")[0].value; //Email-aren balioa aldagai batean gorde
			    	var gakoa = document.getElementsByName("gakoa")[0].value;	//Gakoaren balioa aldagai batean gorde			
			    	if (izenAbizenak == "") { //Konprobatu IzenAbizenak hutsik badago
					alert("IZEN ABIZENAK ez dira jarri");
					return false; //Hutsik badago alerta eman eta false bueltatu
			    	}
			    	if (telefonoa == "") { //Konprobatu telefonoa hutsik badago
					alert("TELEFONOA ez da jarri");
					return false; //Hutsik badago alerta eman eta false bueltatu
			    	} else { //Konprbatu telefonoaren formatua egokia dela
					if (telefonoa.length != 9) {
				    		alert("TELEFONOAK 9 zenbaki izan behar ditu");
				    		return false; //Egokia ez bada alerta eman eta false bueltatu
					}
			    	}
			    	if (jaiotzeData == "") { //Konprobatu jaiotzedata hutsik badago
					alert("JAIOTZE DATA ez da jarri");
					return false; //Hutsik badago alerta eman eta false bueltatu
			    	}
			    	if (email == "") { //Konprobatu email hutsik badago
					alert("EMAIL ez da jarri");
					return false; //Hutsik badago alerta eman eta false bueltatu
			    	} else { //Konprbatu email-aren formatua egokia dela
					var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
					if (!regex.test(email)) {
				    		alert("EMAIL txarto jarri da");
				    		return false; //Egokia ez bada alerta eman eta false bueltatu
					}
			    	}
			    	if (gakoa == "") {	//Konprobatu gakoa hutsik badago
						alert("GAKOA ez da jarri");	//Hutsik badago alerta eman eta false bueltatu
					  	return false;
				}
			}
		</script>
	</body>

</html>

