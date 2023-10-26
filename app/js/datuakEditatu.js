(function(){
    'use strict';
    document.addEventListener("DOMContentLoaded", function() {
					var gordeBtn = document.getElementById("gorde");	//"Gorde" botoia aldagai batean gorde
					
					var izenAbizenak = document.getElementsByName("izenAbizenak")[0].value;	//Izen Abizenaren balioa aldagai batean gorde	
					var nan = document.getElementsByName("nan")[0].value;	//NAN balioa aldagai batean gorde	
					var telefonoa = document.getElementsByName("telefonoa")[0].value;	//Telefono balioa aldagai batean gorde	
					var jaiotzeData = document.getElementsByName("jaiotzeData")[0].value;	//Jaiotze dataren balioa aldagai batean gorde	
					var email = document.getElementsByName("email")[0].value;	//Email-aren balioa aldagai batean gorde	
					var gakoa = document.getElementsByName("gakoa")[0].value;	//Gakoaren balioa aldagai batean gorde	
					
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
				

				function datuakKonprobatu(){	//Datuak ondo ipini diren konprobatzeko:
					if (izenAbizenak == "") {	//Konprobatu IzenAbizenak hutsik badago
						alert("IZEN ABIZENAK ez dira jarri");
					  	return false;	//Hutsik badago alerta eman eta false bueltatu
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
					if (jaiotzeData == "") {	//Konprobatu jaiotzedata hutsik badago
						alert("JAIOTZE DATA ez da jarri");
					  	return false;	//Hutsik badago alerta eman eta false bueltatu
					}
					if (email == "") {	//Konprobatu email hutsik badago
						alert("EMAIL ez da jarri");
					  	return false;	//Hutsik badago alerta eman eta false bueltatu
					}
					else{	//Konprbatu email-aren formatua egokia dela
						var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
						if(!regex.test(email)){
							alert("EMAIL txarto jarri da");
							return false;	//Egokia ez bada alerta eman eta false bueltatu
						}
					}
					if (gakoa == "") {	//Konprobatu gakoa hutsik badago
						alert("GAKOA ez da jarri");	//Hutsik badago alerta eman eta false bueltatu
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
