<?php

  $hostname = "db";
  $username = "admin";
  $password = "test";
  $db = "database";

  $conn = mysqli_connect($hostname, $username, $password, $db);
  if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
  }

  $query = mysqli_query($conn, "SELECT * FROM AUTOA")
    or die (mysqli_error($conn));

  echo '<div align="center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">';
  
  echo "<table border = '1'>
          <thead>
            <tr>
              <th>Marka</th>
              <th>Prezioa</th>
              <th>Matrikula</th>
              <th>KarburanteMota</th>
              <th>Modeloa</th>
            </tr>
          </thead>
          <tbody>";

  while ($row = mysqli_fetch_array($query)) {
    echo "<tr>
            <td>{$row['Marka']}</td>
            <td>{$row['Prezioa']}</td>
            <td>{$row['Matrikula']}</td>
            <td>{$row['KarburanteMota']}</td>
            <td>{$row['Modeloa']}</td>
          </tr>";
  }

  echo "</tbody></table></div>";

  mysqli_close($conn);
?>
