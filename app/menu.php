<?php
session_start();
$NAN = $_SESSION['NAN'];;  //Bidali dioten "NAN" aldagaia, aldagai batean gorde
?>

<!DOCTYPE html>
<html>
<head>
    <title>MENU</title>		<!- Izenburuan "MENU" ipini !>
    <link rel="stylesheet" href="css/menu.css">
</head>
<body>
	<td><a href="index.html"><input type="button" name="HOME" value="HOME" class="button"></a></td>		<!- HOME botoia ipintzea, klikatzerakoan index.html-ra joan !>
    <div class="container">
        <div class="comment">Hauetako bat hautatu:</div>
        <img class="image" src="irudiak/4.jpg" width="400" height="350" alt="Imagen de muestra">
        <div class="button-container">
            <a class="button" href="autoaSartu.php">AUTOA SARTU</a>		<!- AUTOA SARTU botoia ipintzea, klikatzerakoan autoaSartu.php-ra joan !>
            <a class="button" href="datuakEditatu.php">DATUAK EDITATU</a>		<!- DATUAK EDITATU botoia ipintzea, klikatzerakoan datuakEditatu.php-ra joan !>
            <a class="button" href="datuakErakutsi.php">AUTOAK</a>		<!- AUTOAK botoia ipintzea, klikatzerakoan datuakErakutsi.php-ra joan !>
        </div>
    </div>
</body>
</html>


