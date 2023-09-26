# ISSKS  
AURKEZPENA:  
Lan hau web sistema bat sortzean datza, horretarako Ubuntu sistema eragilea erabiliz, hainbat baliabide erabiliko ditugu, hala nola, JavaScript, HTML, CSS eta PHP. Gainera, datu base bat sortuko dugu MariaDB modeloa erabiliz, eta bertan MySQL hizkuntza erabiliko dugu.  
Gure lana garatzeko Docker biltegia erabiliko dugu, autoen alokairua kudeatzeko web sistema bat izango dena.   
Web sistema honetan sartzeko, erabiltzaile eta pasahitza batekin saioa hasiko dugu. Erabiltzaile horrek zenbait datu pertsonal bete beharko ditu, hala nola, izen-abizenak, NAN zenbakia, jaiotzea data, emaila eta telefono pertsonala. Hauek guztiak era egoki batean idatziko dira, bestela errore mezua agertuko da.  
Behin barruan, autoaren kudeaketa egiteko 5 atributu egongo dira: kotxearen matrikula, alokairuaren prezioa eguneko, kotxearen marka, kotxearen modeloa eta kotxeak erabiltzen duen karburante mota.  
PARTAIDEAK:  
Lan honetan 5 partaide izango gara: Urko Aranda, Jon Izaguirre, Maria Briones, Ander de la Peña eta Diego Corral.     

TALDEKIDEAK:
* Urko Aranda
* Jon Izaguirre
* Maria Briones
* Ander de la Peña
* Diego Corral

INSTRUKZIOAK:
Sortutako Web Sistema ikusi ahal izateko hurrengo komandoa jarraitu behar dituzu:

1. Docker instalatzeko:
```
	$ sudo apt install docker
	$ sudo apt install docker-compose
```
2. Biltegiko irudia sortzeko:

	$ docker buid -t="web" .
	
3. Zure biltegia hasteko:

	$ docker-compose up -d
	
Aurreko pausuak jarraituta, web-ara sartzeko http://localhost:81 eta datu basearekin konektatzeko http://localhost:8890 bilatu beharko dituzu nabigatzailean

4. Amaitzeko, biltegia gelditzeko:

	$ docker-compose stop
	
