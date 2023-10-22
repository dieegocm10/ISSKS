<?php

	$hostname = "db";
	$username = "admin";
	$password = "test";
	$db = "database";
	
	$NAN = $_GET['parametro1'];
	$gakoa = $_GET['parametro2']; 

	$conn = mysqli_connect($hostname, $username, $password, $db);
	if ($conn->connect_error) {
    		die("Database connection failed: " . $conn->connect_error);
	}


	$query1 = mysqli_query($conn, "SELECT * FROM ERABILTZAILEA WHERE NAN = '$NAN' AND Gakoa = '$gakoa'")
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
			<script>
				var lehenNan = "';echo $lehenNan; echo '";

				function confirmEzabatu() {
				    var confirmacion = confirm("Erabiltzailea ezabatu nahi duzu?");

				    if (confirmacion) {
					window.location.href = "erabiltzaileaEzabatu.php?lehenNan=" + lehenNan;
				    }
				}

			</script>
			<title>Denda</title>
			<style>
				 body {
				    background-color: #BAE1E0; 
				    font-family: Arial, sans-serif;
				    text-align: center;
				    margin: 0;
				    padding: 0;
				}
				.container {
				    display: flex;
				    flex-direction: column;
				    align-items: center;
				    max-width: 100%;
				    padding: 20px;
				}
				.comment {
				    background-color: #4285f4;
				    color: #fff;
				    padding: 10px;
				    font-size: 24px;
				    margin-bottom: 20px;
				}
				.image {
				    max-width: 100%;
				    height: auto;
				    margin-bottom: 20px;
				}
				.data-container {
				    background-color: #fff;
				    padding: 20px;
				    border-radius: 5px;
				    box-shadow: 0 0 10px;
				}
				.button-container {
				    display: flex;
				    justify-content: space-between;
				    margin-top: 20px; 
				}
				.button {
            			    background-color: #4285f4;
            			    color: #fff;
            			    padding: 10px 20px;
            		            border: none;
            			    border-radius: 5px;
            			    margin-top: 20px;
            			    text-decoration: none;
        			}
			</style>
		</head>
		
		<body>
			<td><a href="index.html"><input type="button" name="HOME" value="HOME" class="button"></a></td>
			<td><a href="menu.php?parametro1=<?= $NAN ?>&parametro2=<?= $gakoa ?>"><input type="button" name="MENU" value="MENU" class="button"></a></td>
			<div align="center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
			<div class="container">
				<div class="comment">Zure erabiltzailearen datuak aldatu ahal dituzu, NAN izan ezik, edo erabiltzailea ezabatu:</div>
        			<img class="image" src="irudiak/editar.png" width"600" height"400">
        		
				<div class="data-container">
					<form  method="post" onsubmit="return erabiltzaileaAldatu()">
						<table>
							<tr>
								<td>IZEN ABIZENAK:</td>
								<td><input type="text" name="izenAbizenak" id="izenAbizenak" value="';echo $izenAbizenak;echo'"></td>
							</tr>
							<tr>
								<td>NAN:</td>
			    					<td><input type="text" name="nan" id="nan" value="';echo $nan;echo'" readonly></td>
							</tr>
							<tr>
							<tr>
								<td>TELEFONOA:</td>
								<td><input type="number" name="telefonoa" value="'; echo $tlf;echo'"></td>
							</tr>
							<tr>
								<td>JAIOTZE DATA:</td>
								<td><input type="date" name="jaiotzeData" value="'; echo $jaiotzeData;echo'"></td>
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
								<td><p align="right"><input type="submit" formaction="erabiltzaileaAldatu.php?lehenNan=<?php echo $lehenNan; ?>" id="gorde" name="gorde" value="GORDE" class="button"></p></td>
								<td><p align="left"><input type="button" id="ezabatu" name="ezabatu" value="ERABILTZAILEA EZABATU" onclick="confirmEzabatu()" class="button"></p></td>

							</tr>
						</table>
					</form>
				</div>
			</div></div>
			<script>
				document.addEventListener("DOMContentLoaded", function() {
					var gordeBtn = document.getElementById("gorde");
					
					var izenAbizenak = document.getElementsByName("izenAbizenak")[0].value;
					var nan = document.getElementsByName("nan")[0].value;
					var telefonoa = document.getElementsByName("telefonoa")[0].value;
					var jaiotzeData = document.getElementsByName("jaiotzeData")[0].value;
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
