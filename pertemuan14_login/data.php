<?php  

require 'functions.php';

$players = query("SELECT * FROM players");// baris berikut adalah data dari seluruh player dan ini akan muncul pertama kali

//jika tombol search ditekan maka data $players(semua data player) akan ditimpa sesuai dengan pencariannya 
if (isset($_POST["search"]) ){//cara baca : jika button search ditekan maka data $players(seluruh player) akan diganti/ditimpa dengan function search, dan function search akan mendapatkan apapun yang diketikkan oleh usernya.
	if ($players = search($_POST["keyword"])){
} else {
	$error = true;
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Data Pemain Cadangan FC</title>
	<style>
		td {
			text-align: center;
		}
		h2 {
			font-family: georgia;
			text-align: center;
			color: black;
			background-color: red;
		}
		.h2{
			font-family: georgia;
			color: black;
			font-size: 15px;
		}
		
	</style>
</head>
<body>
	<h2 style="background-color: red;">Selamat Datang</h2>
		<a class="h2" href="insert.php">Tambah sedulur Pemain Cadangan FC</a><br>
		<table border="1" cellpadding="10" cellspacing="0">
			<br>
			<tr>
				<th>Id</th>
				<th>Action</th>
				<th>Photo</th>
				<th>Name</th>
				<th>Backnumber</th>
				<th>Age</th>
				<th>Position</th>
				<th>State</th>
			</tr>

			<form action="" method="post">
				<input type="text" name="keyword" placeholder="masukan keyword pencarian..." size="30" autofocus="" autocomplete="off">
				<button type="submit" name="search">Search</button>
			</form>

			<?php if(isset($error)) : ?>
				<p style="font-weight: bold; font-style: italic; font-size: 15px; ">Maaf pencarian tidak ditemukan!</p>
			<?php endif; ?>
			<br><br>

			<?php $id = 1; ?>
			<?php foreach ($players as $player) : ?>
			<tr>
				<td><?php echo $id; ?></td>
				<td>
					<a href="edit.php?id=<?php echo $player["id"]; ?>" onclick ="return confirm ('Are you sure?');">Edit</a> /
					<a href="delete.php?id=<?php echo $player["id"]; ?>" onclick ="return confirm('Are you sure?');">Delete</a>
				</td>
				<td><img src="img/<?php echo $player["photo"]; ?>" width="40px;"></td>
				<td><?php echo $player["name"]; ?></td>
				<td><?php echo $player["backnumber"]; ?></td>
				<td><?php echo $player["age"]; ?></td>
				<td><?php echo $player["position"]; ?></td>
				<td><?php echo $player["state"]; ?></td>
			</tr>
		<?php $id++; ?>
		<?php endforeach; ?>
		</table>

	<br><br>
	<a href="login.php" onclick ="return confirm('Are you sure?')"><button>Logout</button></a>
</body>
</html>