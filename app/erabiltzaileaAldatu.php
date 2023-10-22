<?php
	session_start();
  $hostname = "db";
  $username = "admin";
  $password = "test";
  $db = "database";


  $izenAbizenak = $_POST['izenAbizenak'];
  $nan = $_POST['nan'];
  $telefonoa = $_POST['telefonoa'];
  $email = $_POST['email'];
  $jaiotzeData = $_POST['jaiotzeData'];
  $gakoa = $_POST['gakoa'];
  $lehenNan = $_SESSION['NAN'];
  
  $conn = mysqli_connect($hostname, $username, $password, $db);
  if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
  }
  $query1 = mysqli_query($conn, "UPDATE ERABILTZAILEA 
                              SET IzenAbizenak = '$izenAbizenak',
                                  NAN = '$nan',
                                  Gakoa = '$gakoa',
                                  Telefonoa = '$telefonoa',
                                  JaiotzeData = '$jaiotzeData',
                                  Email = '$email'
                              WHERE NAN = '$lehenNan'")
  	or die (mysqli_error($conn));



    header("Location: index.html");
  
  mysqli_close($conn);
  exit;
?>
