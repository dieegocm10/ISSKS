<?php
	session_start();
  $hostname = "db";
  $username = "admin";
  $password = "test";
  $db = "database";

  $lehenNan = $_SESSION['NAN'];
  
  
  $conn = mysqli_connect($hostname, $username, $password, $db);
  if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
  }
  $query1 = mysqli_query($conn, "DELETE FROM ERABILTZAILEA
                              WHERE NAN = '$lehenNan'")
  	or die (mysqli_error($conn));



    header("Location: index.html");
  
  mysqli_close($conn);
  exit;
?>
