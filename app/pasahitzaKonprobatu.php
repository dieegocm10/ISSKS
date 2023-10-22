<?php
$hostname = "db";
$username = "admin";
$password = "test";
$db = "database";

$NAN = $_POST['NAN'];
$gakoa = $_POST['gakoa'];

$conn = mysqli_connect($hostname, $username, $password, $db);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
$query1 = mysqli_query($conn, "SELECT * FROM ERABILTZAILEA WHERE NAN = '$NAN' AND Gakoa = '$gakoa'")
    or die (mysqli_error($conn));

if (mysqli_num_rows($query1) == 0) {
    echo '<html>
            <head>
                <title>Mezua</title>
                <style>
                    body {
                        background-color: #F17865;
                    }
                    .message {
                        font-size: 40px;
                    }
                </style>
            </head>
            <body>
                <div align="center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                    <p>ERROR</p>
                    <img class="image" src="irudiak/error.png" width="200" height="150">
                    <p>NAN edo pasahitza txarto sartu dituzu!!</p>
                    <td><a href="index.html"><input type="button" name="Saiatu Berriro" value="Saiatu Berriro" class="button"></a></td>
                </div>
            </body>
        </html>';
} else {
    header("Location: menu.php?parametro1=$NAN&parametro2=$gakoa");
}

mysqli_close($conn);
exit;
?>

