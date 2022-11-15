<?php 

require '../functions.php'; //keluaran dulu halaman functions.php dengan ../

$keyword = $_GET['keyword']; // ditangkap dari ajax
$query =  "SELECT * FROM players WHERE name LIKE '%$keyword%' OR backnumber LIKE '%$keyword%' OR age LIKE '%$keyword%' OR position LIKE '%$keyword%' OR state LIKE '%$keyword%' ";
if ($players = query($query)){ // query sudah berisi seluruh data players, dan dapat dicari dengan keyword tertentu
} else {
	$error = true;
}
?>

<?php if(isset($error)) : ?>
	<p style="font-weight: bold; font-style: italic; font-size: 15px; ">Maaf, data tidak ditemukan slur!</p>
<?php endif; ?>

<?php
	$jumlahDataPerHalaman = 5;
	$JumlahData = count(query("SELECT * FROM players")); 
	$jumlahHalaman = ceil($JumlahData / $jumlahDataPerHalaman); 
	$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
	$dataAwal = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
?>

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

			<?php $id = 1 + $dataAwal; ?>
			<?php foreach ($players as $player) : ?>
			<tr>
				<td><?php echo $id; ?></td>
				<td>
					<a href="edit.php?id=<?php echo $player["id"]; ?>" onclick ="return confirm ('Are you sure?');">Edit</a> /
					<a href="delete.php?id=<?php echo $player["id"]; ?>" onclick ="return confirm('Are you sure?');">Delete</a>
				</td>
				<td><img src="img/<?php echo $player["photo"]; ?>" width="50px;"></td>
				<td><?php echo $player["name"]; ?></td>
				<td><?php echo $player["backnumber"]; ?></td>
				<td><?php echo $player["age"]; ?></td>
				<td><?php echo $player["position"]; ?></td>
				<td><?php echo $player["state"]; ?></td>
			</tr>
		<?php $id++; ?>
		<?php endforeach; ?>
		</table> 

