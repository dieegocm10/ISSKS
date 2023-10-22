(function(){
    'use strict';
    document.addEventListener("DOMContentLoaded", function() {
				var gordeBtn = document.getElementById("gorde");
				var garbiBtn = document.getElementById("garbitu");
				//BOTOI GORDE
				gordeBtn.addEventListener("click", function() {
					autoaGorde()
				});
				//BOTOI GARBITU
				garbiBtn.addEventListener("click", function() {
					var elementua = document.querySelectorAll("input[type=text], input[type=number], input[type=date], input[type=email]");
					elementua.forEach(function(campo) {
					    campo.value = "";});
				});
			});
			
			function autoaGorde(){
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

				//DATUAK BIDALI
				var datuak = {
					  marka: marka,
					  prezioa: prezioa,
					  matrikula: matriula,
					  karburanteMota: karburanteMota,
					  modeloa: modeloa,
				};
				var conf = {
					  method: 'POST',
					  body: JSON.stringify(datuak), 
					  headers: {
					    	'Content-Type': 'application/json'
					  }
				};

				fetch('autoaGoorde.php', conf)
			}
})();
