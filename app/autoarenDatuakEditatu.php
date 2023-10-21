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
		</head>
		
		<body>
			<div align="center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
			<img src="irudiak/5.jpeg" width="300" height="250">

			<form  method="post" onsubmit="return autoaAldatu()"><table>
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
					<td><input type="text" name="matrikula" value="'; echo $Matrikula; echo'"></td>
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
					<td><p align="right"><input type="submit" formaction="autoaAldatu.php?lehenMatrikula=';echo $Matrikula;echo'" id="gorde"name="gorde" value="Gorde"></p></td>
					<td><p align="left"><input type="button" id="ezabatu" name="ezabatu" value="Autoa ezabatu" onclick="confirmEzabatu()" /></p></td>
				</tr>
			</table></div>
			
			<script>
				document.addEventListener("DOMContentLoaded", function() {
					var gordeBtn = document.getElementById("gorde");
					var garbiBtn = document.getElementById("garbitu");
					
					var marka = document.getElementsByName("marka")[0].value;
					var prezioa = document.getElementsByName("prezioa")[0].value;
					var matrikula = document.getElementsByName("matrikula")[0].value;
					var karburanteMota = document.getElementsByName("karburanteMota")[0].value;
					var modeloa = document.getElementsByName("modeloa")[0].value;
					
					//BOTOI GORDE
					gordeBtn.addEventListener("click", function() {
						if(datuakKonprobatu()){
						    autoaAldatu()
						}
						else{
						    return false;
						}
					});
					//BOTOI EZABATU
					garbiBtn.addEventListener("click", function() {
						if(datuakKonprobatu()){
						    autoaEzabatu()
						}
						else{
						    return false;
						}
					});
				});
			
				function datuakKonprobatu(){
					
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
					}
					else{
						var patroia = /^\d{4} [A-Z]{3}$/;
						if (!patroia.test(matriKula)) {
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
					
					
				function autoaAldatu(){
					//DATUAK BIDALI
					var datuak = {
						  marka: marka,
						  prezioa: prezioa,
						  matrikula: matrikula,
						  karburanteMota: karburanteMota,
						  modeloa: modeloa
					};
					var conf = {
						  method: "POST",
						  body: JSON.stringify(datuak), 
						  headers: {
						    	"Content-Type": "application/json"
						  }
					};

					fetch("autoaAldatu.php", conf)
				}
				
				function autoaEzabatu(){
					//DATUAK BIDALI
					var datuak = {
						  lehenMarka:$LehenMarka,
						  lehenPrezioa:$LehenPrezioa
					};
					var conf = {
						  method: "POST",
						  body: JSON.stringify(datuak), 
						  headers: {
						    	"Content-Type": "application/json"
						  }
					};

					fetch("autoaEzabatu.php", conf)
				}
			</script>
		</body>
	</html>';
?>

