<?php  
	
	session_start();

	if(!isset($_SESSION["signin"])){
		header("Location: login.php");
		exit;
	}
	require 'functions.php';


//pagination
	$JumlahDataPerHalaman = 4;
	$jumlahData = count(query("SELECT * FROM players"));
	$jumlahHalaman = ceil($jumlahData/$JumlahDataPerHalaman);
	$halamanAktif = isset($_GET["halaman"]) ? $_GET["halaman"] : 1;
	$dataAwal = ($JumlahDataPerHalaman * $halamanAktif) - $JumlahDataPerHalaman;
	$linkHalaman = 2;

	if($halamanAktif > $linkHalaman){
		$startNumber = $halamanAktif - $linkHalaman;
	} else {
		$startNumber = 1;
	}

	if($halamanAktif < ($jumlahHalaman - $linkHalaman)){
		$endNumber = $halamanAktif + $linkHalaman;
	} else {
		$endNumber = $jumlahHalaman;
	}

	$players = query("SELECT * FROM players LIMIT $dataAwal, $JumlahDataPerHalaman");

//Keyword Pencarian
	if(isset($_POST["cari"]) ){
		if($players = search($_POST["keyword"])){
	} else {
		$error = true;
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>index</title>
	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/script.js"></script>

	<style>
		.loading{
			width: 50px;
			position: absolute;
			top: 95px;
			left: 280px;
			z-index: -1;
			display: none;
		}
	</style>
</head>
<body>
<h1>SELAMAT DATANG PEMAIN CADANGAN FC</h1>

<a href="insert.php">Insert Data Pemain Cadangan FC</a>

<?php if(isset($error)) : ?>
	<p>Maaf, data tidak ditemukan!</p>
<?php endif; ?>

<form action="" method="post">
	<input type="text" name="keyword" placeholder="Masukan keyword pencarian..." size="35" autocomplete="off" autofocus="" id="keyword">
	<img src="img/loader.gif" class="loading">
	<button type="submit" name="cari" id="cari">Search</button>
</form>


<!-- Navigasi Pagination -->

<?php if($halamanAktif > 1) : ?>
	<a href="?halaman=<?php echo $halamanAktif - 1 ?>"><button>&laquo</button></a>
<?php endif ; ?>

<?php for($i = $startNumber; $i <= $endNumber; $i++ ) : ?>
	<?php if($i == $halamanAktif) : ?>
		<a href="?halaman=<?php echo $i; ?>"><button style="background-color: grey; font-weight: bold;"><?php echo $i; ?></button></a>
	<?php else : ?>
		<a href="?halaman=<?php echo $i; ?>"><button><?php echo $i; ?></button></a>
	<?php endif ; ?>
<?php endfor; ?>

<?php if($halamanAktif < $jumlahHalaman) : ?>
	<a href="?halaman=<?php echo $halamanAktif + 1 ?>"><button>&raquo</button></a>
<?php endif ; ?>
<div id="container">
<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<th>Id</th>
		<th>Action</th>
		<th>Photo</th>
		<th>Nama</th>
		<th>Backnumber</th>
		<th>Age</th>
		<th>Position</th>
		<th>state</th>
	</tr>
<?php $i = 1 + $dataAwal; ?>
<?php foreach($players as $player) : ?>
	<tr>
		<td><?php echo $i; ?></td>
		<td>
			<a href="edit.php?id=<?php echo $player["id"]; ?>" onclick="return confirm('Anda yakin?')">Edit</a> / 
			<a href="delete.php?id=<?php echo $player["id"]; ?>" onclick="return confirm('Anda yakin?')">Delete</a>
		</td>
		<td><img src="img/<?php echo $player["photo"] ?>" width="50"></td>
		<td><?php echo $player["name"]; ?></td>
		<td><?php echo $player["backnumber"]; ?></td>
		<td><?php echo $player["age"]; ?></td>
		<td><?php echo $player["position"]; ?></td>
		<td><?php echo $player["state"]; ?></td>
	</tr>
<?php $i++; ?>
<?php endforeach ; ?>
</table>
</div>
<a href="logout.php"><button> Log out </button></a>
</body>
</html>