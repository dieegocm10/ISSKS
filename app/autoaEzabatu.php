<?php
$hostname = "db";
  $username = "admin";
  $password = "test";
  $db = "database";


  $marka = $_POST['lehenMarka'];
  $prezioa = $_POST['lehenprezioa'];
  
  $conn = mysqli_connect($hostname, $username, $password, $db);
  if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
  }
  $query1 = mysqli_query($conn, "DELETE FROM AUTOA
                              WHERE Marka = '$marka' AND Prezioa = '$prezioa'")
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
