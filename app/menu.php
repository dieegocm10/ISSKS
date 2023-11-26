<?php
	session_start();
	if (isset($_SESSION['NAN'])) {
		$NAN = $_SESSION['NAN'];
?>
		<!DOCTYPE html>
		<html>
			<head>
			    	<title>MENU</title>		<!-- Izenburuan "MENU" ipini -->
			    	<link rel="stylesheet" href="css/menu.css">
			</head>
			<body>
				<a href="index.php"><input type="button" name="HOME" value="HOME" class="button"></a>		<!-- HOME botoia ipintzea, klikatzerakoan index.html-ra joan -->
			    	<div class="container">
					<div class="comment">Hauetako bat hautatu:</div>
					<img class="image" src="irudiak/4.jpg" width="400" height="350" alt="Imagen de muestra">
					<div class="button-container">
						<a class="button" href="autoaSartu.php">AUTOA SARTU</a>		<!-- AUTOA SARTU botoia ipintzea, klikatzerakoan autoaSartu.php-ra joan -->
						<a class="button" href="datuakEditatu.php">DATUAK EDITATU</a>		<!-- DATUAK EDITATU botoia ipintzea, klikatzerakoan datuakEditatu.php-ra joan -->
						<a class="button" href="datuakErakutsi.php">AUTOAK</a>		<!-- AUTOAK botoia ipintzea, klikatzerakoan datuakErakutsi.php-ra joan -->
					</div>
			    	</div>
			</body>
		</html>
<?php
	} else {
		echo('<img class="image" id="404" src="irudiak/404.jpg" width="100%" height="100%" style="margin: 0 auto;">');
	}
?>

