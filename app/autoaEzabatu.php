<?php
  $hostname = "db";
  $username = "admin";
  $password = "test";
  $db = "database";


  $Matrikula = $_GET['lehenMatrikula'];
  
  $conn = mysqli_connect($hostname, $username, $password, $db);
  if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
  }
  $query1 = mysqli_query($conn, "DELETE FROM AUTOA
                              WHERE Matrikula = '$Matrikula'")
  	or die (mysqli_error($conn));

  header("Location: datuakErakutsi.php");

  mysqli_close($conn);
  exit;
?>
