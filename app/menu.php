<?php

	$izenAbizenak = $_GET['parametro1'];
	$gakoa = $_GET['parametro2'];

  
	echo'
		<html>
			<head>
				<title>MENU</title>
			</head>
			
			<body>
				<div align="center"style="position: absolute; top: 40%; left: 50%; transform: translate(-50%, -50%);">
				<img src="irudiak/4.jpg" width="200" height="150"></div>
				<div align="center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
				<table>
					<tr>
						<td><a href="autoaSartu.html"><input type="button" name="sartu" value="AUTOA SARTU"></a></td>
						<td><a href="datuakEditatu.php?parametro1=';echo $izenAbizenak;echo'&parametro2=';echo $gakoa;echo'"><input type="button" name="sartuu" value="DATUAK EDITATU"></a></td>
						<td><a href="datuakErakutsi.php"><input type="button" name="erregistratu" value="AUTOAK"></a></td>
					</tr>
				</table></div>
			</body>
		</html>';
?>
