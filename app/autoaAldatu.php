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
  $lehenMatrikula = $_GET['lehenMatrikula'];
  
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
                              WHERE Matrikula = '$lehenMatrikula'")
  	or die (mysqli_error($conn));

   header("Location: datuakErakutsi.php");


  mysqli_close($conn);
  exit;
?>
