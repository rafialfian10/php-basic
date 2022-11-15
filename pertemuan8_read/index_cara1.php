<?php 

//
 $conn = mysqli_connect("localhost", "root", "", "players");//disini mysqli_connect diberi variabel baru dengan nama bebas.

//ambil data dari tabel pemaincadanganfc / query data pemaincadanganfc dengan mysqli_query, didalam kurung parameternya ada 2.
 $result = mysqli_query($conn, "SELECT * FROM pemaincadanganfc");// disini mysqli_query diberi variabel baru dengan nama bebas.

//Setelah itu ambil data (fetch) pemaincadanganfc dari object result, ada 4 cara:
 	//1. mysqli_fetch_row = mengembalikan array numerik.
 	//2. mysqli_fetch_assoc = mengembalikan array associative.
 	//1. mysqli_fetch_row = mengembalikan array keduanya.
 	//1. mysqli_fetch_row = mengembalikan array objek.

// while ($player = mysqli_fetch_assoc($result) ){ 
// var_dump($player);
// } 
//cara baca : selama masih ada elemen-nya (di $result) maka lakukan sesuatu yaitu dengan AMBIL menggunakan mysqli_fecth-assoc_
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
	<?php while($player = mysqli_fetch_assoc($result)) : ?> <!-- selama masih ada elemen didalam $result maka ambil dengan mysqli_fetch_assoc -->
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
	<?php endwhile; ?>
	
	</table>
</body>
</html>