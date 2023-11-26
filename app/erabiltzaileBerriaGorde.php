<?php
	session_start();
	if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
		$izenAbizenak = isset($_POST['izenAbizenak']) ? $_POST['izenAbizenak'] : ''; //se comprueba si esta vacio
		$nan = isset($_POST['nan']) ? $_POST['nan'] : '';
		$telefonoa = isset($_POST['telefonoa']) ? $_POST['telefonoa'] : '';
		$email = isset($_POST['email']) ? $_POST['email'] : '';
		$jaiotzeData = isset($_POST['jaiotzeData']) ? $_POST['jaiotzeData'] : '';
		$gakoa = isset($_POST['gakoa']) ? $_POST['gakoa'] : '';

		if(empty($izenAbizenak) || empty($nan) || empty($telefonoa) || empty($email) || empty($jaiotzeData) || empty($gakoa)) {
			die("Error: Todos los campos deben ser completados.");
		}
		
		//preparar la gakoa para almacenar de forma segura
		$gatza = bin2hex(random_bytes(16)); // Generar una sal aleatoria	
		$passwordWithSalt = $gakoa . $gatza; // Concatenar la contraseña con la sal
		$hashedPassword = password_hash($passwordWithSalt, PASSWORD_BCRYPT); // Aplicar la función de hash usando Bcrypt

		$hostname = "db";
		$username = "ISSKS";
		$password = "LANA2";
		$db = "database";

		$conn = new mysqli($hostname, $username, $password, $db);
		$conn->set_charset("utf8mb4");
		
		if ($conn->connect_error) {
			die("Error de conexión a la base de datos.");
		}

		mysqli_set_charset($conn, "utf8mb4");
		//poner try catch
		$sql = "INSERT INTO ERABILTZAILEA VALUES (?,?,?,?,?,?,?)"; 
		$stmt = $conn->prepare($sql); //se prepara la consulta parametrizada

		if ($stmt) {
			$stmt->bind_param("ssssiss", $izenAbizenak, $nan, $hashedPassword, $gatza, $telefonoa, $jaiotzeData, $email); // se introducen los parametros en la consulta
		    	if ($stmt->execute()) {
				$stmt->close();
		    	}else {
				die("Error en la ejecución de la consulta." . $conn->error);
		    	}
		}else {
		    	die("Error en la preparación de la consulta.");
		}

		$conn->close();
		header("Location: index.php");
		exit;
	} else {
	    registrarIntentoIncorrecto("CSRF");
	}
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
		        .hidden {
			    display: none;
			}
		    </style>
		</head>
		<body>
		    <div align="center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
		        <p>ERROR</p>
		        <img class="image" src="irudiak/error.png" width="200" height="150">
		        <p>Erroreren bat gertatu da, 5 segundu itxaron berriro saiatzeko</p>
		        <div id="buttonWrapper" class="hidden"> <!-- Añadir un contenedor para el botón -->
                   		<a href="erabiltzaileBerriaGordeHtml.php"><input type="button" name="Saiatu Berriro" value="Saiatu Berriro" class="button"></a>
                	</div>
            	</div>
		    <script>
                	setTimeout(function() {
                   	 document.getElementById("buttonWrapper").classList.remove("hidden"); // Mostrar el botón después de 5 segundos
                	}, 5000); // 5000 milisegundos = 5 segundos
           	 </script>
		</body>
	    </html>';
	    exit;
	}
	function registrarIntentoIncorrecto($usuario) {
    		$archivoLog = 'WebSistema.log';
		$archivo = fopen($archivoLog, 'a');
		$fechaHora = date('Y-m-d H:i:s');
		$ip = ($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 0;
		$mensajeLog = "[ERROR] $fechaHora --> IP : $ip - NAN : $usuario erabiliz web sisteman sartzeko saiakera bat egon da" . PHP_EOL; 
		fwrite($archivo, $mensajeLog);
		fclose($archivo);
		showError();
	}
?>
