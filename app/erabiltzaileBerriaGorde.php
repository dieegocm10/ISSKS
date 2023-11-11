<?php
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
	$username = "admin";
	$password = "test";
	$db = "database";

	$conn = new mysqli($hostname, $username, $password, $db);
	$conn->set_charset("utf8mb4");
	
	if ($conn->connect_error) {
		die("Error de conexión a la base de datos.");
	}

	mysqli_set_charset($conn, "utf8mb4");

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
	header("Location: index.html");
	exit;
?>
