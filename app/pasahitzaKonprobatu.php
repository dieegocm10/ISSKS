<?php
    session_start();
    $hostname = "db";
    $username = "admin";
    $password = "test";
    $db = "database";

    $NAN = $_POST['NAN'];
    $gakoa = $_POST['gakoa'];

    $conn = mysqli_connect($hostname, $username, $password, $db);
    if ($conn->connect_error) {
        die("Database connection failed");
    }

    $sql = "SELECT HashedPassword, Gatza FROM ERABILTZAILEA WHERE NAN = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $NAN);
        $stmt->execute();

        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $storedPassword = $row['HashedPassword'];
            $salt = $row['Gatza'];
	    echo $salt;
	    echo "             ";
	    echo $storedPassword;
	    
	    $passwordWithSalt = $gakoa . $salt; // Concatenar la contraseña con la sal
	    $hashedPassword = password_hash($passwordWithSalt, PASSWORD_BCRYPT); // Aplicar la función de hash usando Bcrypt
		echo "hashed: ";	
		echo $hashedPassword;
		
            if ($hashedPasswordInput === $storedPassword) {
                $_SESSION['NAN'] = $NAN;
                header("Location: menu.php");
            } else {
               // showError();
            }
        } else {
            //showError();
        }

        $stmt->close();
    } else {
        //showError();
    }

    mysqli_close($conn);
    exit;

    function showError() {
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
        exit;
    }
?>

