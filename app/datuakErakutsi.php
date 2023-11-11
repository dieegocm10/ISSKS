<?php
	$hostname = "db";
	$username = "ISSKS";
	$password = "LANA2";
	$db = "database";

	$NAN = $_GET['parametro1'];	//Bidali dioten "parametro1" aldagaia, aldagai batean gorde
	$gakoa = $_GET['parametro2'];	//Bidali dioten "parametro2" aldagaia, aldagai batean gorde

	$conn = mysqli_connect($hostname, $username, $password, $db);  //Datu basearekin konektatu
	if ($conn->connect_error) {  //Konexioa ondo egin den konprobatu
	    	die("Database connection failed: " . $conn->connect_error);
	}

	$query = mysqli_query($conn, "SELECT * FROM AUTOA")
	    	or die(mysqli_error($conn));	//Saiatu auto guztien informazio guztia lortzea
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Zure Flota</title> 
	    	<link rel="stylesheet" href="css/datuakErakutsi.css">	
	</head>
	<body>
		<td><a href="index.html"><input type="button" name="HOME" value="HOME" class="button"></a></td>
		<td><a href="menu.php"><input type="button" name="MENU" value="MENU" class="button"></a></td>	
		<div align="center" style="position: absolute; top: 60%; left: 50%; transform: translate(-50%, -50%);">
		    	<div class="container">
				<div class="comment">Flota:</div>
				<img class="image" src="irudiak/2.jpg" width="950" height="250">
				<div class="data-container">
					<table border="1">
					    <thead>
						<tr>
						    <th>Marka</th>
						    <th>Prezioa</th>
						    <th>Editatu</th>
						</tr>
					    </thead>
					    <tbody>

						<?php
						while ($row = mysqli_fetch_array($query)) {
						    $a = $row['Marka'];
						    $b = $row['Prezioa'];
						    $matrikula = $row['Matrikula'];
						    echo "<tr>
						    <td>{$a}</td>
						    <td>{$b}</td>
						    <td><a href=\"autoarenDatuakEditatu.php?parametro1={$matrikula}\"><input type=\"button\" name=\"sartu\" value=\"Editatu\" class=\"button\"></a></td>
						    </tr>";	
						}
						?>
					    </tbody>
					</table>
				</div>
				<img class="image" src="irudiak/3.jfif" width="950" height="250">
	    		</div>
	    	</div>
	</body>
</html>

<?php
mysqli_close($conn);	//Konexioa itxi
?>
