<?php 

require 'functions.php'; //require berfungsi untuk menghubungkan file yang terpisah dengan mengambil data dari function.php
 
$players = query("SELECT * FROM pemaincadanganfc");//karena array sudah dalam benrtuk associative maka dapat ditampung dengan membuat variabel baru nama bebas
?>

<!DOCTYPE html>
<html>
<head>
	<title>MYSQL</title>
	<style>
		td {text-align: center;
			font-family: arial;
			font-size: 15px;
		}
	</style>
</head>
<body>
	<table border="1" cellpadding="8" cellspacing="0">
		<tr>
			<th>Id</th>
			<th>Update</th>
			<th>Photo</th>
			<th>Name</th>
			<th>Backnumber</th>
			<th>Age</th>
			<th>Position</th>
			<th>State</th>
		</tr>

		
	<?php $id = 1; ?>
	<?php foreach($players as $player) : ?> <!-- selama masih ada elemen didalam $result maka ambil dengan mysqli_fetch_assoc -->
		<tr>
			<td><?php echo $id; ?></td>
			<td>
				<a href="">Change</a> |
				<a href="">Delete</a>
			</td>
			<td><img src="img/<?php echo $player["photo"]; ?>"></td>
			<td><?php echo $player["name"]; ?></td>
			<td><?php echo $player["backnumber"]; ?></td>
			<td><?php echo $player["age"]; ?></td>
			<td><?php echo $player["position"]; ?></td>
			<td><?php echo $player["state"]; ?></td>
		</tr>
	<?php $id++; ?>
	<?php endforeach; ?>
	</table>
</body>
</html>