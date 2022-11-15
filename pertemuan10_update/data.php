<?php  

require 'functions.php';

$players = query("SELECT * FROM players");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Data Pemain Cadangan FC</title>
	<style>
		td {
			text-align: center;
		}
		
	</style>
</head>
<body>
	<h2 style="background-color: red;">Selamat Datang Rafi!</h2>
		<a style="font-size: 18px; color: black; line-height: 50px; " href="insert.php">Insert data Pemain Cadangan Fc</a>
		<table border="1" cellpadding="10" cellspacing="0">
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

			<?php $id = 1; ?>
			<?php foreach ($players as $player) : ?>
			<tr>
				<td><?php echo $id; ?></td>
				<td>
					<a href="edit.php?id=<?php echo $player["id"]; ?>" onclick ="return confirm ('Are you sure?');">Edit</a> /
					<a href="delete.php?id=<?php echo $player["id"]; ?>" onclick ="return confirm('Are you sure?');">Delete</a>
				</td>
				<td><img src="foto/<?php echo $player["photo"]; ?>" width="40px;"></td>
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
	<button><a href="login.php" onclick ="return confirm('Are you sure?')">Logout</a></button>
</body>
</html>