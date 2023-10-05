# Alokairu Docker
Lan hau web sistema bat sortzean datza, horretarako Ubuntu sistema eragilea erabiliz, hainbat baliabide erabiliko ditugu, hala nola, JavaScript, HTML, CSS eta PHP 7.2 Docker Compose-an. Gainera, datu base bat sortuko dugu MariaDB(MySQL) erabiliz.  

Docker biltegia erabiliko dugu gure lana garatzeko, autoen alokairua kudeatzeko web-sistema bat izango da. 

Web Sistema honetan sartzeko, erabiltzaile batekin saio hasiko dugu. Erabiltzaile horrek zenbait datu pertsonal bete beharko ditu, hala nola, izen osoa, NAN zenbakia, jaiotzea data edo telefono pertsonala.  
Behin barruan, autoaren kudeaketa egiteko 5 atributu egongo dira, kotxearen matrikula, alokairuaren prezioa eguneko, kotxearen marka, kotxearen modeloa eta kotxeak erabiltzen duen karburante mota.  

## Taldekideak
-  Urko Aranda
-  Jon Izaguirre
-  Maria Briones
-  Ander de la Peña
-  Diego Corral.  

## Instrukzioak
Sortutako Web Sistema ikusi ahal izateko hurrengo komandoak jarraitu behar dituzu.

Docker istalatzeko:
```
$ sudo apt install docker
$ sudo apt install docker-compose
```

Biltegiko irudia sortzeko:
```
$ docker buid -t="web" .
```

Zure biltegia hasteko:
```
$ docker-compose up -d
```

Aurreko pausuak jarraituta, web-ara sartzeko http://localhost:81 eta datu basearekin konektatzeko http://localhost:8890 bilatu beharko dituzu nabigatzailean

Amaitzeko, biltegia gelditzeko:
```
$ docker-compose down
```

Eta biltegia ezabatzeko:
```
$ docker-compose stop
```

## Datuen formatoa

Web Sistemara sartzeko erabiltzaile bat erabili beharko da eta erabiltzaile horrek atributu batzuk dauzka, hurrengoak dira atributu horien formatoa:
-  Izen abizenak textua soilik.
-  NAN 11111111Z formatua soilik onartuko du eta letra zenbakiei dagokiola ziurtatuko da (Algoritmo bat dago hori konprobatzeko).
-  Telefonoa 9 zenbaki soilik.
-  Jaiotze data datak uuuu-hh-ee formatuan soilik (Adib. 26/08/2021).
-  Email email egokiak soilik (adibidea@zerbitzaria.extentsioa).

Autoen atributuen formatoa hurrengoa izango da:
-  Marka testua soilik.
-  Prezioa zenbaki osoak soilik.
-  Matrikula testua solik.
-  Karburante mota testua soilik.
-  Modeloa testua soilik.
