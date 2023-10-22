(function(){
    'use strict';
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
})();
