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
		<link rel="stylesheet" href="css/erabiltzaileBerriaGorde.css">	<!- erabiltzaileBerriaGorde.css erabiltzea diseinua egiteko !>
	</head>
	
	<body>
		
		<td><a href="index.php"><input type="button" name="HOME" value="HOME" class="button" align="center"></a></td>		<!- HOME botoia ipintzea, klikatzerakoan index.html-ra joan !>
		<div align="center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
			<img src="irudiak/ESTE.gif" width="450" height="250">
			<form  method="POST" action="erabiltzaileBerriaGorde.php" onsubmit="return erabiltzaileaGorde()" accept-charset="UTF-8">		<!- erabiltzaileBerriaGorde.php-rq joan !>
				<table>
					<tr>
						<td>IZEN ABIZENAK:</td>	<!-Zure izen-abizen sartzeko tokia!>
						<td><input type="text" name="izenAbizenak" id="izenAbizenak"></td>
					</tr>
					<tr>
						<td>NAN:</td>	<!-Zure NAN sartzeko tokia!>
						<td><input type="text" name="nan"  placeholder="11111111Z" ></td>
					</tr>
					<tr>
						<td>TELEFONOA:</td>	<!-Zure telefonoa sartzeko tokia!>
						<td><input type="number" name="telefonoa"  placeholder="666666666" ></td>
					</tr>
					<tr>
						<td>JAIOTZE DATA:</td>	<!-Zure jaiotze data sartzeko tokia!>
						<td><input type="date" name="jaiotzeData" placeholder="ee/hh/uuuu" ></td>
					</tr>
					<tr>
						<td>EMAIL:</td>	<!-Zure email sartzeko tokia!>
						<td><input type="text" name="email" placeholder="adibidea@zerbitzaria.extentsioa"></td>
					</tr>
					<tr>
						<td>GAKOA:</td>	<!-Zure gako sartzeko tokia!>
						<td><input type="text" name="gakoa" ></td>
					</tr>
					<tr>
						<td><p align="right"><input type="submit" id="gorde"name="gorde" value="GORDE" class="button"></p></td>		<!- GORDE botoia ipintzea !>
						<td><p align="left"><input type="button" id="garbitu"name="garbitu" value="GARBITU" class="button"></p></td>	<!- GARBITU botoia ipintzea !>
					</tr>
				</table>
				<input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
			</form>
		</div>
		<script>
			document.addEventListener("DOMContentLoaded", function() {
				var garbiBtn = document.getElementById("garbitu");
				//BOTOI GARBITU
				garbiBtn.addEventListener("click", function() {
					var elementua = document.querySelectorAll("input[type=text], input[type=number], input[type=date], input[type=email]");
					elementua.forEach(function(campo) {
					    campo.value = "";});
				});
			});
			
			function erabiltzaileaGorde(){
				var izenAbizenak = document.getElementsByName("izenAbizenak")[0].value;	//izenAbizenak balioa aldagai batean gorde	
				var nan = document.getElementsByName("nan")[0].value;	//NAN balioa aldagai batean gorde	
				var telefonoa = document.getElementsByName("telefonoa")[0].value;	//telefono balioa aldagai batean gorde	
				var jaiotzeData = document.getElementsByName("jaiotzeData")[0].value;	//jaiotzeData balioa aldagai batean gorde	
				var email = document.getElementsByName("email")[0].value;	//email balioa aldagai batean gorde	
				var gakoa = document.getElementsByName("gakoa")[0].value;	//gakoa balioa aldagai batean gorde	

				if (izenAbizenak == "") {	//Konprobatu IzenAbizenak hutsik badago
					alert("IZEN ABIZENAK ez dira jarri");
				  	return false;	//Hutsik badago alerta eman eta false bueltatu
				}
				else{
					var regex = /^[\p{L}\s]+$/u;
					if(!regex.test(izenAbizenak)){
						 alert("Izen Abizenetan bakarrik letrak jarri ahal dira");
						 return false;
					}
				}
				if (nan == "") {	//Konprobatu nan hutsik badago
					alert("NAN ez da jarri");
				  	return false;	//Hutsik badago alerta eman eta false bueltatu
				}
				else{	//Konprbatu NAN formatua egokia dela
					if (nan.length !== 9) {
						alert("NAN txarto jarri da");
						return false;	//Egokia ez bada alerta eman eta false bueltatu
					}
					else{
						var zenbakiak = parseInt(nan.substring(0, 8));
						 var letra = nan.charAt(8);
						 var hondarra = parseInt(zenbakiak) % 23;
						 var letrak = "TRWAGMYFPDXBNJZSQVHLCKE";
						 var kalkulatutakoLetra = letrak.charAt(hondarra);
						 if (kalkulatutakoLetra != letra) {
						 	alert("NAN txarto jarri da");
						 	return false;	//Egokia ez bada alerta eman eta false bueltatu
						 }	 
  					}
				}
				if (telefonoa == "") {	//Konprobatu telefonoa hutsik badago
					alert("TELEFONOA ez da jarri");
				  	return false;	//Hutsik badago alerta eman eta false bueltatu
				}
				else{	//Konprbatu telefonoaren formatua egokia dela
					if(document.getElementsByName("telefonoa")[0].value.length != 9){
						alert("TELEFONOAK 9 zenbaki izan behar ditu");
						return false;	//Egokia ez bada alerta eman eta false bueltatu
					}
				}
				if (jaiotzeData == "") {	//Konprobatu jaiotzeData hutsik badago
					alert("JAIOTZE DATA ez da jarri");
				  	return false;
				}
				if (email == "") {	//Konprobatu email hutsik badago
					alert("EMAIL ez da jarri");
				  	return false;	//Hutsik badago alerta eman eta false bueltatu
				}
				else{	//Konprbatu email formatua egokia dela
					var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
					if(!regex.test(email)){
						alert("EMAIL txarto jarri da");
						return false;	//Egokia ez bada alerta eman eta false bueltatu
					}
				}
				if (gakoa == "") {	//Konprobatu gakoa hutsik badago
					alert("GAKOA ez da jarri");
				  	return false;	//Hutsik badago alerta eman eta false bueltatu
				}
				else{	//Konprbatu gakoa formatua egokia dela
					var regex = /^(?=.*[A-Z])(?=.*\d)(?=.*[a-z])[[a-zA-Z0-9.-]{6,}$/;
					if(!regex.test(gakoa)){
						alert("GAKOA ahula da, letra larriak, xeheak, zenbakiak eta gutxienez 6 karakterezko luzeera eduki behar du");
						return false;	//Egokia ez bada alerta eman eta false bueltatu
					}
				}
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
					  method: 'POST',
					  body: JSON.stringify(datuak), 
					  headers: {
					    	'Content-Type': 'application/json'
					  }
				};

				fetch('erabiltzaileBerriaGorde.php', conf);	//erabiltzaileBerriaGorde.php-ra datuak bidali
			}
		</script>

	</body>
</html>
