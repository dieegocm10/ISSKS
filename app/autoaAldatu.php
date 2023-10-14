<?php
$hostname = "db";
  $username = "admin";
  $password = "test";
  $db = "database";


  $marka = $_POST['marka'];
  $prezioa = $_POST['prezioa'];
  $matrikula = $_POST['matrikula'];
  $karburanteMota = $_POST['karburanteMota'];
  $modeloa = $_POST['modeloa'];
  $lehenMarka = $_POST['lehenMarka'];
  $lehenPrezioa = $_POST['lehenPrezioa'];
  
  $conn = mysqli_connect($hostname, $username, $password, $db);
  if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
  }
  $query1 = mysqli_query($conn, "UPDATE AUTOA 
                              SET Marka = '$marka',
                                  Prezioa = '$prezioa',
                                  Matrikula = '$matrikula',
                                  KarburanteMota = '$karburanteMota',
                                  Modeloa = '$modeloa'
                              WHERE Marka = '$lehenMarka' AND Prezioa = '$lehenPrezioa'")
  	or die (mysqli_error($conn));


  if (mysqli_num_rows($query1) == 0) {
    echo "Zerbait txarto egin da";
  }
  else{
    header("Location: menu.html");
  }
  mysqli_close($conn);
  exit;
?>
