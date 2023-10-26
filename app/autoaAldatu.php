<?php
  $hostname = "db";
  $username = "admin";
  $password = "test";
  $db = "database";


  $marka = $_POST['marka'];  //Bidali dioten "marka" aldagaia, aldagai batean gorde
  $prezioa = $_POST['prezioa'];  //Bidali dioten "prezioa" aldagaia, aldagai batean gorde
  $matrikula = $_POST['matrikula'];  //Bidali dioten "matrikula" aldagaia, aldagai batean gorde
  $karburanteMota = $_POST['karburanteMota'];  //Bidali dioten "karburanteMota" aldagaia, aldagai batean gorde
  $modeloa = $_POST['modeloa'];  //Bidali dioten "modeloa" aldagaia, aldagai batean gorde
  $lehenMatrikula = $_GET['lehenMatrikula'];  //Bidali dioten "lehenMatrikula" aldagaia, aldagai batean gorde
  
  $conn = mysqli_connect($hostname, $username, $password, $db);  //Datu basearekin konektatu
  if ($conn->connect_error) {  //Konexioa ondo egin den konprobatu
    die("Database connection failed: " . $conn->connect_error);
  }
  $query1 = mysqli_query($conn, "UPDATE AUTOA   
                              SET Marka = '$marka',
                                  Prezioa = '$prezioa',
                                  Matrikula = '$matrikula',
                                  KarburanteMota = '$karburanteMota',
                                  Modeloa = '$modeloa'
                              WHERE Matrikula = '$lehenMatrikula'")
  	or die (mysqli_error($conn));  //Saiatu datu basean "lehenMatrikula" oinarri bezala erabiliz, autoaren atributuak eguneratzea

   header("Location: datuakErakutsi.php");  //datakErakutsi.php-ra joan


  mysqli_close($conn);  //Datu basearekin konexioa itxi eta irten
  exit;
?>
