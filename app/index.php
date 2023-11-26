<?php
	session_start();

	// Generar token CSRF y guardarlo en la sesión
	if (!isset($_SESSION['csrf_token'])) {
	    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Denda</title>	<!- Izenburuan "Denda" ipini !>
		<link rel="stylesheet" href="css/index.css">	<!- index.css erabiltzea diseinua egiteko !>
	</head>
	<body>
	    	<div class="container">
			<div class="comment">ONGI ETORRI DENDARA!!!!</div>
			<img class="image" src="irudiak/login.png" width="200" height="150">
			<form method="post" action="pasahitzaKonprobatu.php">	<!- SARTU botoia klikatzerakoan, pasahitzaKonprobatu.php-ra joateko !>
		    		<table>
		        		<tr>
		            			<td>NAN:</td>		<!- NAN laukia ipintzea !>
		            			<td><input type="text" name="NAN" id="NAN"></td>
		        		</tr>
		        		<tr>
		            			<td>GAKOA:</td>		<!- GAKOA laukia ipintzea !>
		            			<td><input type="password" name="gakoa" id="gakoa"></td>
		        		</tr>
		        		<tr>
		            			<td><input type="submit" name="sartu" value="Sartu" class="button"></td>		<!- SARTU botoia ipintza !>
		            			<td><a href="erabiltzaileBerriaGordeHtml.php"><input type="button" name="erregistratu" value="Erregistratu" class="button"></a></td>		<!- ERREGISTRATU botoia ipintza,klikatzerakoan erabiltzaileBerriaGorde.html-ra joan !>
		        		</tr>
		    		</table>
		    		 <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
			</form>
	    	</div>
	</body>
</html>
