<?php
	session_start();
	if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $sessionLifetime)) {
	    // La sesión ha expirado, destruirla y redirigir al usuario al inicio de sesión
	    session_unset();
	    session_destroy();
	    header("Location: index.php");
	}
	$_SESSION['last_activity'] = time(); 	// Actualizar el tiempo de actividad de la sesión
	if (isset($_SESSION['NAN'])) {
?>


<!DOCTYPE html>
<html>
	<head>
	    <title>Denda</title>	<!- Izenburuan "Denda" ipini !>
	    <link rel="stylesheet" href="css/autoaSartu.css">	<!- autoaSartu.css erabiltzea diseinua egiteko !>
	</head>

	<body>
		<a href="index.php"><input type="button" name="HOME" value="HOME" class="button"></a>		<!- HOME botoia ipintzea, klikatzerakoan index.html-ra joan !>
		<a href="menu.php"><input type="button" name="MENU" value="MENU" class="button"></a>	<!- MENU botoia ipintzea, klikatzerakoan menu.php-ra joan !>
		<div align="center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
	    		<div class="container">
				<div class="comment">Autoaren ezaugarri guztiak zure gustura bete:</div>
				<img class="image" src="irudiak/1.jpeg" alt="Autoaren irudia">
				<div class="data-container">
				    <form method="post" action="autoaGorde.php" onsubmit="return autoaGorde()">		<!- GORDE botoiari klikatzerakoan autoaGorde.php-ra joan !>
					<table>
					    <tr>
						<td>MARKA:</td>		<!- MARKA laukia ipintzea !>
						<td><input type="text" name="marka" placeholder="Adb: Citroen, Cupra, Audi..."></td>
					    </tr>
					    <tr>
						<td>PREZIOA:</td>	<!- PREZIOA laukia ipintzea !>
						<td><input type="number" name="prezioa" placeholder="Eguneko prezioa eurotan"></td>
					    </tr>
					    <tr>
						<td>MATRIKULA:</td>	<!- MATRIKULA laukia ipintzea !>
						<td><input type="text" name="matrikula" placeholder="Adb: 1234 ABC"></td>
					    </tr>
					    <tr>
						<td>KARBURANTE MOTA:</td>	<!- KARBURANTE MOTA laukia ipintzea !>
						<td><input type="text" name="karburanteMota" placeholder="Adb: Gasolina, Diesel..."></td>
					    </tr>
					    <tr>
						<td>MODELOA:</td>	<!- MODELOA laukia ipintzea !>
						<td><input type="text" name="modeloa" placeholder="Adb: C4 cactus, Audi A4..."></td>
					    </tr>
					    <tr>
						<td colspan="2" class="button-container" style="text-align: center;">
						    <input type="submit" id="gorde" name="gorde" class="button" value="Gorde">		<!- GORDE botoia ipintzea !>
						    <input type="button" id="garbitu" name="garbitu" class="button" value="Garbitu">		<!- GARBITU botoia ipintzea !>
						</td>
					   </tr>
					</table>
				    </form>
				</div>
	    		</div>
	    	</div>
		<script>
			document.addEventListener("DOMContentLoaded", function() {
				var garbiBtn = document.getElementById("garbitu");	//"Garbitu" botoia aldagai batean gorde
				//BOTOI GARBITU
				garbiBtn.addEventListener("click", function() {
					var elementua = document.querySelectorAll("input[type=text], input[type=number], input[type=date], input[type=email]");
					elementua.forEach(function(campo) {
					    campo.value = "";});	//"Garbitu" botoian klikatzerakoan, lauki guztiak hustu
					});
				});
					
			function autoaGorde(){	//"Gorde" botoian klikatzerakoan: 
				var marka = document.getElementsByName("marka")[0].value;	//Markaren balioa aldagai batean gorde	
				var prezioa = document.getElementsByName("prezioa")[0].value;	//Prezioaren balioa aldagai batean gorde
				var matrikula = document.getElementsByName("matrikula")[0].value;	//Matrikularen balioa aldagai batean gorde
				var karburanteMota = document.getElementsByName("karburanteMota")[0].value;	//Karburante motaren balioa aldagai batean gorde
				var modeloa = document.getElementsByName("modeloa")[0].value;	//Modeloaren balioa aldagai batean gorde
				if (marka == "") {	//Konprobatu marka hutsik badago
					alert("MARKA ez da jarri");
				  	return false;	//Hutsik badago alerta eman eta false bueltatu
				}
				if (prezioa == "") {	//Konprobatu prezioa hutsik badago
					alert("PREZIOA ez da jarri");
				  	return false;	//Hutsik badago alerta eman eta false bueltatu
				}
				if (matrikula == "") {	//Konprobatu matrikula hutsik badago
					alert("MATRIKULA ez da jarri");
				  	return false;	//Hutsik badago alerta eman eta false bueltatu
				}
				else{	//Konprobatu matrikularen formatoa egokia dela
					var patroia = /^\d{4} [A-Z]{3}$/;
				    	if (!patroia.test(matrikula)) {
						alert("MATRIKULA 1234 ABC formatua izan behar du");
						return false;	//Egokia ez bada alerta eman eta false bueltatu
				    	}
				}
				if (karburanteMota == "") {	//Konprobatu Karburante mota hutsik badago
					alert("KARBURANTE MOTA ez da jarri");
				  	return false;	//Hutsik badago alerta eman eta false bueltatu
				}
				if (modeloa == "") {	//Konprobatu modeloa hutsik badago
					alert("MODELOA ez da jarri");
				  	return false;	//Hutsik badago alerta eman eta false bueltatu
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
