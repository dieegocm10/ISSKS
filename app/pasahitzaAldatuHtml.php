<?php
	if (isset($_SESSION['NAN'])) {
		$NAN = $_SESSION['NAN'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	  	<title>Denda</title>
	    	<link rel="stylesheet" href="css/datuakEditatu.css">
	</head>

	<body>
    		<a href="index.html"><input type="button" name="HOME" value="HOME" class="button"></a>	
		<a href="menu.php"><input type="button" name="MENU" value="MENU" class="button"></a>	
		<a href="datuakEditatu.php"><input type="button" name="DATUAK" value="DATUAK" class="button"></a>
		<div align="center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
			<div class="container">
				<div class="comment">Zure erabiltzailearen gakoa aldatu ahal duzu:</div>
        			<img class="image" src="irudiak/editar.png" width"600" height"400">
			    	<div class="data-container">
					<form method="post" onsubmit="return datuakKonprobatu()">
				    		<table>
				    			<tr>
							        <td>GAKO BERRIA:</td>
							        <td><input type="text" name="gakoa" value=""></td>
							</tr>
							<tr>
							        <td><p align="right"><input type="submit" formaction="pasahitzaAldatu.php" id="gorde" name="gorde" value="GORDE" class="button"></p></td>
							</tr>
				    		</table>
					</form>
				</div>
			</div>
		</div>
		<script>
			function datuakKonprobatu() { //Datuak ondo ipini diren konprobatzeko:
			    	var gakoa = document.getElementsByName("gakoa")[0].value; //Gakoaren balioa aldagai batean gorde	
			    	if (gakoa == "") { //Konprobatu gakoa hutsik badago
					alert("GAKOA ez da jarri"); //Hutsik badago alerta eman eta false bueltatu
					return false;
			    	}
			    	else{	//Konprbatu gakoa formatua egokia dela
					var regex = /^(?=.*[A-Z])(?=.*\d)(?=.*[a-z])[[a-zA-Z0-9.-]{6,}$/;
					if(!regex.test(gakoa)){
						alert("GAKOA ahula da, letra larriak, xeheak, zenbakiak eta gutxienez 6 karakterezko luzeera eduki behar du");
						return false;	//Egokia ez bada alerta eman eta false bueltatu
					}
				}
			}
		</script>
	</body>

</html>
<?php
	} else {
		echo "404";
	}
?>

