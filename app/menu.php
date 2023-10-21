<?php
$izenAbizenak = $_GET['parametro1'];
$gakoa = $_GET['parametro2'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>MENU</title>
    <style>
        body {
            background-color: #BAE1E0; 
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .image {
            margin-bottom: 20px;
        }
        .comment {
            background-color: #4285f4; 
            color: #fff; 
            padding: 10px;
            font-size: 24px;
            position: relative;
            top: -50px; 
        }
        .button-container {
            display: flex;
            justify-content: center;
        }
        .button {
            background-color: #4285f4; 
            color: #fff; 
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            margin: 0 10px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="comment">Hauetako bat hautatu:</div>
        <img class="image" src="irudiak/4.jpg" width="400" height="350" alt="Imagen de muestra">
        <div class="button-container">
            <a class="button" href="autoaSartu.html">AUTOA SARTU</a>
            <a class="button" href="datuakEditatu.php?parametro1=<?= $izenAbizenak ?>&parametro2=<?= $gakoa ?>">DATUAK EDITATU</a>
            <a class="button" href="datuakErakutsi.php">AUTOAK</a>
        </div>
    </div>
</body>
</html>


