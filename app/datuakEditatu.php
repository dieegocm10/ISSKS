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

	$query1 = mysqli_query($conn, "SELECT * FROM ERABILTZAILEA WHERE IzenAbizenak = '$a' AND Gakoa = '$b'")
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
			<title>Denda</title>
		</head>
		
		<body>
			
			<div align="center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
			

			<form  method="post" onsubmit="return erabiltzaileaAldatu()"><table>
				<tr>
					<td>IZEN ABIZENAK:</td>
					<td><input type="text" name="izenAbizenak" id="izenAbizenak" value="';echo $izenAbizenak;echo'"></td>
				</tr>
				<tr>
					<td>NAN:</td>
					<td><input type="text" name="nan" value="'; echo $nan;echo'"></td>
				</tr>
				<tr>
					<td>TELEFONOA:</td>
					<td><input type="number" name="telefonoa" value="'; echo $tlf;echo'"></td>
				</tr>
				<tr>
					<td>JAIOTZE DATA:</td>
					<td><input type="date" name="jaiotze data" value="'; echo $jaiotzeData;echo'"></td>
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
					<td><p align="right"><input type="submit" formaction="erabiltzaileaAldatu.php?lehenNan=';echo $lehenNan; echo '" id="gorde"name="gorde" value="Gorde"></p></td>
					<td><p align="left"><input type="submit" formaction="erabiltzaileaEzabatu.php?lehenNan=';echo $lehenNan; echo '" id="garbitu"name="ezabatu" value="Erabiltzailea ezabatu"></p></td>
				</tr>
			</table></div>
			<script>
				document.addEventListener("DOMContentLoaded", function() {
					var gordeBtn = document.getElementById("gorde");
					
					var izenAbizenak = document.getElementsByName("izenAbizenak")[0].value;
					var nan = document.getElementsByName("nan")[0].value;
					var telefonoa = document.getElementsByName("telefonoa")[0].value;
					var jaiotzeData = document.getElementsByName("jaiotze data")[0].value;
					var email = document.getElementsByName("email")[0].value;
					var gakoa = document.getElementsByName("gakoa")[0].value;
					
					//BOTOI GORDE
					gordeBtn.addEventListener("click", function() {
						if(datuakKonprobatu()){
						    erabiltzaileaAldatu()
						}
						else{
						    return false;
						}
					});
				});
				
				function datuakKonprobatu(){
					if (izenAbizenak == "") {
						alert("IZEN ABIZENAK ez dira jarri");
					  	return false;
					}
					
					if (nan == "") {
						alert("NAN ez da jarri");
					  	return false;
					}
					else{
						if (nan.length !== 9) {
							alert("NAN txarto jarri da");
							return false;
						}
						else{
							var zenbakiak = parseInt(nan.substring(0, 8));
							 var letra = nan.charAt(8);
							 var hondarra = parseInt(zenbakiak) % 23;
							 var letrak = "TRWAGMYFPDXBNJZSQVHLCKE";
							 var kalkulatutakoLetra = letrak.charAt(hondarra);
							 if (kalkulatutakoLetra != letra) {
							 	alert("NAN txarto jarri da");
							 	return false;
							 }	 
	  					}
					}
					if (telefonoa == "") {
						alert("TELEFONOA ez da jarri");
					  	return false;
					}
					else{
						if(document.getElementsByName("telefonoa")[0].value.length != 9){
							alert("TELEFONOAK 9 zenbaki izan behar ditu");
							return false;
						}
					}
					if (jaiotzeData == "") {
						alert("JAIOTZE DATA ez da jarri");
					  	return false;
					}
					if (email == "") {
						alert("EMAIL ez da jarri");
					  	return false;
					}
					else{
						var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
						if(!regex.test(email)){
							alert("EMAIL txarto jarri da");
							return false;
						}
					}
					if (gakoa == "") {
						alert("GAKOA ez da jarri");
					  	return false;
					}
				}
				function erabiltzaileaAldatu(){
					//DATUAK BIDALI
					var datuak = {
						  izenAbizenak: izenAbizenak,
						  nan: nan,
						  telefonoa: telefonoa,
						  email: email,
						  jaiotzeData: jaiotzeData,
						  gakoa: gakoa
					};
					var conf = {
						  method: "POST",
						  body: JSON.stringify(datuak), 
						  headers: {
						    	"Content-Type": "application/json"
						  }
					};

					fetch("erabiltzaileaAldatu.php", conf)
				}
				
				
			</script>
		</body>
	</html>';
?>
