<?php
$hostname = "db";
  $username = "admin";
  $password = "test";
  $db = "database";


  $izenAbizenak = $_POST['izenAbizenak'];
  $gakoa = $_POST['gakoa'];
  
  
  $conn = mysqli_connect($hostname, $username, $password, $db);
  if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
  }
  $query1 = mysqli_query($conn, "SELECT * FROM ERABILTZAILEA WHERE IzenAbizenak = '$izenAbizenak' AND Gakoa = '$gakoa'")
  or die (mysqli_error($conn));


  if (mysqli_num_rows($query1) == 0) {
    echo "La consulta no encontró ningún registro.";
  } else {
    // Procesar los resultados aquí
    while ($row = mysqli_fetch_array($query1)) {
        // Realizar acciones con los resultados
    }
  }
  mysqli_close($conn);
?>
