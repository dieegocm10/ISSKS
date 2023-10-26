<?php
$NAN = $_GET['parametro1'];  //Bidali dioten "parametro1" aldagaia, aldagai batean gorde
$gakoa = $_GET['parametro2'];  //Bidali dioten "parametro2" aldagaia, aldagai batean gorde
?>


<!DOCTYPE html>
<html>
<head>
    <title>Denda</title>	<!- Izenburuan "Denda" ipini !>
    <link rel="stylesheet" href="css/autoaSartu.css">	<!- autoaSartu.css erabiltzea diseinua egiteko !>
</head>

<body>
	<td><a href="index.html"><input type="button" name="HOME" value="HOME" class="button"></a></td>		<!- HOME botoia ipintzea, klikatzerakoan index.html-ra joan !>
	<td><a href="menu.php"><input type="button" name="MENU" value="MENU" class="button"></a></td>	<!- MENU botoia ipintzea, klikatzerakoan menu.php-ra joan !>
	<div align="center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
    <div class="container">
        <div class="comment">Autoaren ezaugarri guztiak zure gustura bete:</div>
        <img class="image" src="irudiak/1.jpeg" alt="Autoaren irudia">
        <div class="data-container">
            <form method="post" action="autoaGorde.php" onsubmit="return autoaGorde()">		<!- GORDE botoiari klikatzerakoan autoaGorde.php-ra joan !>
                <table>
                    <tr>
                        <td>MARKA:</td>		<!- MARKA laukia ipintzea !>
                        <td><input type="text" name="marka" placeholder="Adb: Citroen, Cupra, Audi..."></td>
                    </tr>
                    <tr>
                        <td>PREZIOA:</td>	<!- PREZIOA laukia ipintzea !>
                        <td><input type="number" name="prezioa" placeholder="Eguneko prezioa eurotan"></td>
                    </tr>
                    <tr>
                        <td>MATRIKULA:</td>	<!- MATRIKULA laukia ipintzea !>
                        <td><input type="text" name="matrikula" placeholder="Adb: 1234 ABC"></td>
                    </tr>
                    <tr>
                        <td>KARBURANTE MOTA:</td>	<!- KARBURANTE MOTA laukia ipintzea !>
                        <td><input type="text" name="karburanteMota" placeholder="Adb: Gasolina, Diesel..."></td>
                    </tr>
                    <tr>
                        <td>MODELOA:</td>	<!- MODELOA laukia ipintzea !>
                        <td><input type="text" name="modeloa" placeholder="Adb: C4 cactus, Audi A4..."></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="button-container" style="text-align: center;">
                            <input type="submit" id="gorde" name="gorde" class="button" value="Gorde">		<!- GORDE botoia ipintzea !>
                            <input type="button" id="garbitu" name="garbitu" class="button" value="Garbitu">		<!- GARBITU botoia ipintzea !>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div></div>
	<script src="js/autoaSartu.js"></script>	<!- autoaSArtu.js erabiltzea !>

	</body>
</html>
