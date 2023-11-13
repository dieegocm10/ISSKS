<?php

header("X-Frame-Options: DENY");
ini_set('session.cookie_httponly', 1); // Configurar la sesión con la bandera HttpOnly

session_start();

$hostname = "db";
$username = "ISSKS";
$password = "LANA2";
$db = "database";

$NAN = $_POST['NAN'];
$gakoa = $_POST['gakoa'];

$conn = mysqli_connect($hostname, $username, $password, $db);
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$sql = "SELECT HashedPassword, Gatza FROM ERABILTZAILEA WHERE NAN = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}

$stmt->bind_param("s", $NAN);
$stmt->execute();

$result = $stmt->get_result();
if (!$result) {
    die("Error executing query: " . $stmt->error);
}

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $storedPassword = $row['HashedPassword'];
    $salt = $row['Gatza'];

    $passwordWithSalt = $gakoa . $salt;

    if (password_verify($passwordWithSalt, $storedPassword)) {
        $_SESSION['NAN'] = $NAN;
        header("Location: menu.php");
        exit();
    } else {
        showError("NAN edo pasahitza txarto sartu dituzu!!");
    }
} else {
    showError("NAN edo pasahitza txarto sartu dituzu!!");
}

$stmt->close();
mysqli_close($conn);

function showError($errorMessage) {
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
                <p>' . $errorMessage . '</p>
                <td><a href="index.html"><input type="button" name="Saiatu Berriro" value="Saiatu Berriro" class="button"></a></td>    
            </div>
        </body>
    </html>';
    exit;
}
?>



