<?php
	session_start();
	if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $_SESSION['lifeTime'])) {
	    // La sesión ha expirado, destruirla y redirigir al usuario al inicio de sesión
	    session_unset();
	    session_destroy();
	    header("Location: index.php");
	}
	$_SESSION['last_activity'] = time(); 	// Actualizar el tiempo de actividad de la sesión
	if (isset($_SESSION['NAN'])) {
		$hostname = "db";
		$username = "ISSKS";
		$password = "LANA2";
		$db = "database";

		$NAN = $_SESSION['NAN'];

		$conn = mysqli_connect($hostname, $username, $password, $db);

		if ($conn->connect_error) {
		    die("Database connection failed: " . $conn->connect_error);
		}

		$query1 = mysqli_query($conn, "SELECT * FROM ERABILTZAILEA WHERE NAN = '$NAN'")
		    or die(mysqli_error($conn));

		$row = mysqli_fetch_array($query1);

		mysqli_close($conn);

		$izenAbizenak = $row["IzenAbizenak"];
		$nan = $row["NAN"];
		$tlf = $row["Telefonoa"];
		$jaiotzeData = $row["JaiotzeData"];
		$email = $row["Email"];
		$lehenNan = $nan;
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
							<tr>
							        <td><p align="right"><input type="submit" formaction="erabiltzaileaAldatu.php?lehenNan=<?php echo $lehenNan; ?>" id="gorde" name="gorde" value="GORDE" class="button"></p></td>
							        <td><p align="center"><input type="button" id="ezabatu" name="ezabatu" value="ERABILTZAILEA EZABATU" onclick="confirmEzabatu()" class="button"></p></td>
							        <td><p align="left"><a href="pasahitzaAldatuHtml.php"><input type="button" name="pasahitzaAldatu" value="PASAHITZA ALDATU" class="button"></a></p></td>
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
			}
		</script>
	</body>

</html>
<?php
	} else {
		echo('<img class="image" id="404" src="irudiak/404.jpg" width="100%" height="100%" style="margin: 0 auto;">');
	}
?>
