<?php
  $hostname = "db";
  $username = "admin";
  $password = "test";
  $db = "database";


  $Matrikula = $_GET['lehenMatrikula'];  //Bidali dioten "lehenMatrikula" aldagaia, aldagai batean gorde
  
  $conn = mysqli_connect($hostname, $username, $password, $db);  //Datu basearekin konektatu
  if ($conn->connect_error) {  //Konexioa ondo egin den konprobatu
    die("Database connection failed: " . $conn->connect_error);
  }
  $query1 = mysqli_query($conn, "DELETE FROM AUTOA
                              WHERE Matrikula = '$Matrikula'")
  	or die (mysqli_error($conn));  //Saiatu datu basean "Matrikula" oinarri bezala erabiliz, autoaren ezabatzen

  header("Location: datuakErakutsi.php");  //datakErakutsi.php-ra joan

  mysqli_close($conn);  //Datu basearekin konexioa itxi eta irten
  exit;
?>
