<?php
$NAN = $_GET['parametro1'];
$gakoa = $_GET['parametro2'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>MENU</title>
    <link rel="stylesheet" href="css/menu.css">
</head>
<body>
	<td><a href="index.html"><input type="button" name="HOME" value="HOME" class="button"></a></td>
    <div class="container">
        <div class="comment">Hauetako bat hautatu:</div>
        <img class="image" src="irudiak/4.jpg" width="400" height="350" alt="Imagen de muestra">
        <div class="button-container">
            <a class="button" href="autoaSartu.php?parametro1=<?= $NAN ?>&parametro2=<?= $gakoa ?>">AUTOA SARTU</a>
            <a class="button" href="datuakEditatu.php?parametro1=<?= $NAN ?>&parametro2=<?= $gakoa ?>">DATUAK EDITATU</a>
            <a class="button" href="datuakErakutsi.php?parametro1=<?= $NAN ?>&parametro2=<?= $gakoa ?>">AUTOAK</a>
        </div>
    </div>
</body>
</html>


