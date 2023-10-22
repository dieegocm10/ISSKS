<?php
$NAN = $_GET['parametro1'];
$gakoa = $_GET['parametro2'];
?>


<!DOCTYPE html>
<html>
<head>
    <title>Denda</title>
    <link rel="stylesheet" href="css/autoaSartu.css">
</head>

<body>
	<td><a href="index.html"><input type="button" name="HOME" value="HOME" class="button"></a></td>
	<td><a href="menu.php?parametro1=<?= $NAN ?>&parametro2=<?= $gakoa ?>"><input type="button" name="MENU" value="MENU" class="button"></a></td>
	<div align="center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
    <div class="container">
        <div class="comment">Autoaren ezaugarri guztiak zure gustura bete:</div>
        <img class="image" src="irudiak/1.jpeg" alt="Autoaren irudia">
        <div class="data-container">
            <form method="post" action="autoaGorde.php" onsubmit="return autoaGorde()">
                <table>
                    <tr>
                        <td>MARKA:</td>
                        <td><input type="text" name="marka" placeholder="Adb: Citroen, Cupra, Audi..."></td>
                    </tr>
                    <tr>
                        <td>PREZIOA:</td>
                        <td><input type="number" name="prezioa" placeholder="Eguneko prezioa eurotan"></td>
                    </tr>
                    <tr>
                        <td>MATRIKULA:</td>
                        <td><input type="text" name="matrikula" placeholder="Adb: 1234 ABC"></td>
                    </tr>
                    <tr>
                        <td>KARBURANTE MOTA:</td>
                        <td><input type="text" name="karburanteMota" placeholder="Adb: Gasolina, Diesel..."></td>
                    </tr>
                    <tr>
                        <td>MODELOA:</td>
                        <td><input type="text" name="modeloa" placeholder="Adb: C4 cactus, Audi A4..."></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="button-container" style="text-align: center;">
                            <input type="submit" id="gorde" name="gorde" class="button" value="Gorde">
                            <input type="button" id="garbitu" name="garbitu" class="button" value="Garbitu">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div></div>
	<script src="js/autoaSartu.js"></script>

	</body>
</html>
