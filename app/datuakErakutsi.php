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
    or die(mysqli_error($conn));
?>

<!DOCTYPE html>
<html>

<head>
    <title>Zure Flota</title>
    <style>
        body {
            background-color: #BAE1E0;
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 100%;
            padding: 20px;
        }

        .comment {
            background-color: #4285f4;
            color: #fff;
            padding: 10px;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .image {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .data-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .button {
            background-color: #4285f4;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            margin-top: 20px;
            text-decoration: none;
        }
    </style>
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
					    echo "<tr>
					    <td>{$a}</td>
					    <td>{$b}</td>
					    <td><a href=\"autoarenDatuakEditatu.php?parametro1={$a}&parametro2={$b}\"><input type=\"button\" name=\"sartu\" value=\"Editatu\" class=\"button\"></a></td>
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
mysqli_close($conn);
?>

