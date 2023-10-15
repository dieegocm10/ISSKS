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
  echo '<img src="irudiak/2.jpg" width="950" height="250">';
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
            <td>{$b}</td>"; echo'
          <td><a href="autoarenDatuakEditatu.php?parametro1=';?><?php echo $a; ?><?php echo'&parametro2=';?><?php echo $b; ?><?php echo'"><input type="button" name="sartu" value="Editatu"></a></td>
          </tr>';
  }

  echo "</tbody></table>";
  echo '<img src="irudiak/3.jfif" width="950" height="250"></div>';

  mysqli_close($conn);
?>
