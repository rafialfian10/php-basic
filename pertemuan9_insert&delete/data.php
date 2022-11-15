<?php  
require 'functions.php';

$players = query("SELECT * FROM players");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cara mengambil data dari database</title>
</head>
<body>
	<h1 style="text-align: center;">Selamat Datang, Administator!</h1>

	<h2><a style="color: red; font-size: 18px;" href="tambahdatacara2.php">Tambah Data Pemain Cadangan FC</a> </h2>
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>Id</th>
			<th>Update Data</th>
			<th>Photo</th>
			<th>Name</th>
			<th>Backnumber</th>
			<th>Age</th>
			<th>Position</th>
			<th>State</th>
		</tr>

	<?php $id = 1; ?>
	<?php foreach($players as $player) : ?>
		<tr>
			<th><?php echo $id; ?></th>
			<th>
				<a href="">Change</a> | 
				<a href="hapus.php?id=<?php echo $player["id"]; ?>" onclick="return confirm('Are you sure?');">Delete</a>
			</th>
			<th><img src="img/<?php echo $player["photo"]; ?>" width="50"></th>
			<th><?php echo $player["name"]; ?></th>
			<th><?php echo $player["backnumber"]; ?></th>
			<th><?php echo $player["age"]; ?></th>
			<th><?php echo $player["position"]; ?></th>
			<th><?php echo $player["state"]; ?></th>
		</tr>
	<?php $id++; ?>
	<?php endforeach; ?>
	</table>
	<br><br>
	<script>
		<a href="login.php"><button>Logout</button></a>
	</script>
</body>
</html>