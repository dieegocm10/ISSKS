<?php
  	$izenAbizenak = $_POST['izenAbizenak'];
  	$nan = $_POST['nan'];
  	$telefonoa = $_POST['telefonoa'];
  	$email = $_POST['email'];
  	$jaiotzeData = $_POST['jaiotzeData'];
  	$gakoa = $_POST['gakoa'];
  
  	$hostname = "db";
  	$username = "admin";
  	$password = "test";
  	$db = "database";

  	$conn = mysqli_connect($hostname, $username, $password, $db);
  	if ($conn->connect_error) {
    		die("Database connection failed: " . $conn->connect_error);
  	}

  	$query = mysqli_query($conn, "INSERT INTO ERABILTZAILEA VALUES ('$izenAbizenak', '$nan', '$gakoa', '$telefonoa', '$jaiotzeData', '$email')")//no coge la jaotze data
    	or die (mysqli_error($conn));
    	
    	mysqli_close($conn);

	// Redirige antes de enviar la alerta
	header("Location: erabiltzaileBerriaGorde.html");
	

// Esta alerta se mostrará después de la redirección
	echo "<html>
<head>
    <title>Mi Página</title>
</head>
<body>
    <script>
        alert('kdwf');
    </script>
</body>
</html>";
exit;
?>
