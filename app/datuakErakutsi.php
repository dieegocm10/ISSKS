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
              <th>Editatu</th>
            </tr>
          </thead>
          <tbody>";

  while ($row = mysqli_fetch_array($query)) {
  	$a=$row['Marka'];
  	$b=$row['Prezioa'];
    echo "<tr>
            <td>{$a}</td>
            <td>{$b}</td>
          <td><a href='autoarenDatuakEditatu.php'><input type='button' name='sartu' value='Editatu'></a></td>
          </tr>";
  }

  echo "</tbody></table></div>";

  mysqli_close($conn);
?>
