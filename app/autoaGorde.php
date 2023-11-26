<?php
	session_start();
	if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $_SESSION['lifeTime'])) {
	    // La sesión ha expirado, destruirla y redirigir al usuario al inicio de sesión
	    session_unset();
	    session_destroy();
	    header("Location: index.php");
	}
	$_SESSION['last_activity'] = time(); 	// Actualizar el tiempo de actividad de la sesión
	if (isset($_SESSION['NAN'])) {
	  	$marka = $_POST['marka'];
	  	$prezioa = $_POST['prezioa'];
	  	$matrikula = $_POST['matrikula'];
	  	$karburanteMota = $_POST['karburanteMota'];
	  	$modeloa = $_POST['modeloa'];

	  	$hostname = "db";
	  	$username = "ISSKS";
		$password = "LANA2";
	  	$db = "database";

	  	$conn = new mysqli($hostname, $username, $password, $db);  //Datu basearekin konektatu
	  	if ($conn->connect_error) {  //Konexioa ondo egin den konprobatu
	    		die("Database connection failed: " . $conn->connect_error);
	  	}

	  	// Utilizar una consulta preparada
	  	$query = $conn->prepare("INSERT INTO AUTOA VALUES (?, ?, ?, ?, ?)");
		
		// Vincular parámetros
	  	$query->bind_param("sssss", $marka, $prezioa, $matrikula, $karburanteMota, $modeloa);

		// Ejecutar la consulta
	  	$result = $query->execute();

		// Comprobar si la consulta se ejecutó con éxito
	  	if ($result) {
	    	header("Location: datuakErakutsi.php");
	  	} else {
	    	echo "Error en la ejecución de la consulta: " . $conn->error;
	  	}

		// Cerrar la conexión
	  	$query->close();
	  	$conn->close();
	} else {
		echo('<img class="image" id="404" src="irudiak/404.jpg" width="100%" height="100%" style="margin: 0 auto;">');
	}
?>
