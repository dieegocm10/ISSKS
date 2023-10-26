(function(){
    'use strict';
    document.addEventListener("DOMContentLoaded", function() {
					var gordeBtn = document.getElementById("gorde");	//"Gorde" botoia aldagai batean gorde
					var garbiBtn = document.getElementById("garbitu");	//"Garbitu" botoia aldagai batean gorde
					
					var marka = document.getElementsByName("marka")[0].value;	//Markaren balioa aldagai batean gorde
					var prezioa = document.getElementsByName("prezioa")[0].value;	//Prezioaren balioa aldagai batean gorde
					var matrikula = document.getElementsByName("matrikula")[0].value;	//Matrikularen balioa aldagai batean gorde
					var karburanteMota = document.getElementsByName("karburanteMota")[0].value;	//Karburante motaren balioa aldagai batean gorde
					var modeloa = document.getElementsByName("modeloa")[0].value;	//Modeloaren balioa aldagai batean gorde
					
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
			
				function datuakKonprobatu(){	//Datuak ondo ipini diren konprobatzeko:
					
					if (marka == "") {	//Konprobatu marka hutsik badago
						alert("MARKA ez da jarri");
					  	return false;	//Hutsik badago alerta eman eta false bueltatu
					}

					if (prezioa == "") {	//Konprobatu prezioa hutsik badago
						alert("PREZIOA ez da jarri");
					  	return false;	//Hutsik badago alerta eman eta false bueltatu
					}

					if (matrikula == "") {	//Konprobatu matrikula hutsik badago
						alert("MATRIKULA ez da jarri");
					  	return false;	//Hutsik badago alerta eman eta false bueltatu
					}
					else{	//Konprobatu matrikularen formatoa egokia dela
						var patroia = /^\d{4} [A-Z]{3}$/;
						if (!patroia.test(matriKula)) {
				        		alert("MATRIKULA 1234 ABC formatua izan behar du");
				        		return false;	//Egokia ez bada alerta eman eta false bueltatu
				    		}
					}
					if (karburanteMota == "") {	//Konprobatu Karburante mota hutsik badago
						alert("KARBURANTE MOTA ez da jarri");
					  	return false;	//Hutsik badago alerta eman eta false bueltatu
					}
					if (modeloa == "") {	//Konprobatu modeloa hutsik badago
						alert("MODELOA ez da jarri");
					  	return false;	//Hutsik badago alerta eman eta false bueltatu
					}
				}
					
					
				function autoaAldatu(){		//"Gorde" botoia klikatzerakoan eta datuak konprobatu ondoren:
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
				
				function autoaEzabatu(){	//"Ezabatu" botoia klikatzerakoan eta datuak konprobatu ondoren:
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
})();
