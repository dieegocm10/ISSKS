<?php
	session_start();
	if (isset($_SESSION['NAN'])) {
		$hostname = "db";
		$username = "ISSKS";
		$password = "LANA2";
		$db = "database";

		$conn = mysqli_connect($hostname, $username, $password, $db);

		if ($conn->connect_error) {
		    die("Database connection failed: " . $conn->connect_error);
		}

		$a = $_GET['parametro1'];

		$query1 = mysqli_query($conn, "SELECT * FROM AUTOA WHERE Matrikula = '$a'")
		    or die(mysqli_error($conn));

		$row = mysqli_fetch_array($query1);

		mysqli_close($conn);

		$Marka = $row["Marka"];
		$Prezioa = $row["Prezioa"];
		$Matrikula = $row["Matrikula"];
		$KarburanteMota = $row["KarburanteMota"];
		$Modeloa = $row["Modeloa"];
?>

<!DOCTYPE html>
<html>
	<head>
	    	<script>
			var lehenMatrikula = "<?php echo $Matrikula; ?>";

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
		<a href="index.php"><input type="button" name="HOME" value="HOME" class="button"></a>
		<a href="menu.php"><input type="button" name="MENU" value="MENU" class="button"></a>
		<a href="datuakErakutsi.php"><input type="button" name="FLOTA" value="FLOTA" class="button"></a>
	    	<div align="center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
			<div class="container">
		    	<div class="comment">Autoaren datuak aldatu ahal dituzu, matrikula izan ezik, edo autoa ezabatu:</div>
		    	<img src="irudiak/5.jpeg" width="300" height="250">
		    	<div class="data-container">
		        	<form method="post" action="autoaAldatu.php?lehenMatrikula=<?php echo $Matrikula; ?>" onsubmit="return datuakKonprobatu()">
		            		<table>
		                		<tr>
						    	<td>MARKA:</td>
						    	<td><input type="text" name="marka" value="<?php echo $Marka; ?>"></td>
						</tr>
						<tr>
							    <td>PREZIOA:</td>
							    <td><input type="number" name="prezioa" value="<?php echo $Prezioa; ?>"></td>
						</tr>
						<tr>
							    <td>MATRIKULA:</td>
							    <td><input type="text" name="matrikula" value="<?php echo $Matrikula; ?>" readonly></td>
						</tr>
						<tr>
							    <td>KARBURANTE MOTA:</td>
							    <td><input type="text" name="karburanteMota" value="<?php echo $KarburanteMota; ?>"></td>
						</tr>
						<tr>
							    <td>MODELOA:</td>
							    <td><input type="text" name="modeloa" value="<?php echo $Modeloa; ?>"></td>
						</tr>
						<tr>
							    <td><p align="right"><input type="submit" id="gorde" name="gorde" value="Gorde" class="button"></p></td>
							    <td><p align="left"><input type="button" id="ezabatu" name="ezabatu" value="Autoa ezabatu" class="button" onclick="confirmEzabatu()" /></p></td>
						</tr>
		            		</table>
		        	</form>
		    	</div>
		</div>
	    </div>

	    <script>
		function datuakKonprobatu() {
		    var marka = document.getElementsByName("marka")[0].value;
		    var prezioa = document.getElementsByName("prezioa")[0].value;
		    var matrikula = document.getElementsByName("matrikula")[0].value;
		    var karburanteMota = document.getElementsByName("karburanteMota")[0].value;
		    var modeloa = document.getElementsByName("modeloa")[0].value;

		    if (marka == "") {
		        alert("MARKA ez da jarri");
		        return false;
		    }

		    if (prezioa == "") {
		        alert("PREZIOA ez da jarri");
		        return false;
		    }

		    if (matrikula == "") {
		        alert("MATRIKULA ez da jarri");
		        return false;
		    } else {
		        var patroia = /^\d{4} [A-Z]{3}$/;
		        if (!patroia.test(matrikula)) {
		            alert("MATRIKULA 1234 ABC formatua izan behar du");
		            return false;
		        }
		    }

		    if (karburanteMota == "") {
		        alert("KARBURANTE MOTA ez da jarri");
		        return false;
		    }

		    if (modeloa == "") {
		        alert("MODELOA ez da jarri");
		        return false;
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
