<?php
	session_start();
	if (isset($_SESSION['NAN'])) {
	
		$gakoa = isset($_POST['gakoa']) ? $_POST['gakoa'] : '';  //Bidali dioten "gakoa" aldagaia, aldagai batean gorde
		if(empty($gakoa)) {
			die("Error: Todos los campos deben ser completados.");
		}
		
		//preparar la gakoa para almacenar de forma segura
		$gatza = bin2hex(random_bytes(16)); // Generar una sal aleatoria	
		$passwordWithSalt = $gakoa . $gatza; // Concatenar la contraseña con la sal
		$hashedPassword = password_hash($passwordWithSalt, PASSWORD_BCRYPT); // Aplicar la función de hash usando Bcrypt
		
		$lehenNan = $_SESSION['NAN'];  //Bidali dioten "NAN" aldagaia, aldagai batean gorde

		$hostname = "db";
		$username = "ISSKS";
		$password = "LANA2";
		$db = "database";
		
		$conn = new mysqli($hostname, $username, $password, $db);
		$conn->set_charset("utf8mb4");
		
		if ($conn->connect_error) {
			die("Error de conexión a la base de datos.");
		}	
		
		$query2 = mysqli_query($conn,"UPDATE ERABILTZAILEA 
				              SET HashedPassword = '$hashedPassword',
				              Gatza = '$gatza'
				              WHERE NAN = '$lehenNan'")
		  	or die (mysqli_error($conn));  //Saiatu datu basean "lehenNAN" oinarri bezala erabiliz,erabiltzailearen atributuak eguneratzea


		mysqli_close($conn);  //Datu basearekin konexioa itxi eta irten
		header("Location: index.html");  //index.html-ra joan
		exit;
	} else {
		echo('<img class="image" id="404" src="irudiak/404.jpg" width="100%" height="100%" style="margin: 0 auto;">');
	}
?>
