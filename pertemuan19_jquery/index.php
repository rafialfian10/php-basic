<?php 

session_start();

if(!isset($_SESSION["login"])){ // jika $_SESSION login belum diset/dibuat dari halaman login, maka pindah paksa user ke login.php
 	header("Location: login.php");
	exit;
}

require 'functions.php';

//Pagination atau Pengaturan halaman
//konfurasi. atur jumlah halaman = total data / data perhalaman 

$jumlahDataPerHalaman = 5;
$JumlahData = count(query("SELECT * FROM players")); 
$jumlahHalaman = ceil($JumlahData / $jumlahDataPerHalaman); 
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$dataAwal = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
?>

<?php
$players = query("SELECT * FROM players LIMIT $dataAwal, $jumlahDataPerHalaman");// baris berikut adalah data dari seluruh player dan ini akan muncul pertama kali

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
		<script src="js/jquery-3.6.0.min.js"></script> <!-- jika menggunakan jquery, maka scriptnya disimpan diatas (Note: sebelum script yang dibuat), script dibawah akan dieksekusi terlebih dahulu sebelum halaman ini di load--> 
		<script src="js/script_jquery.js"></script>
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
		.navigasi {
			font-weight: bold;
			color: white;
			background-color: black;
			font-size: 17px;
		}
		button {
			background-color: #c7c7c7;
		}
		.loading{
			width: 60px;
			position: absolute;
			top: 122px;
			left: 240px;
			z-index: -1; /*posisi dibelakang*/
			display: none;/*untuk menghilangkan gambar, karena gambar hanya akn muncul saat user mengetikkan keyword pencarian*/
		}
	</style>
</head>
<body>

	<h2 style="background-color: red;">Selamat Datang</h2>
	<a class="h2" href="insert.php">Tambah sedulur Pemain Cadangan FC</a><br><br>

<!-- 	Navigasi halaman -->
	<!-- Jumlah maksimal angka halaman/ link yang ditampilkan -->
	<?php
		$jumlahLink = 3;
		$startNumber = $halamanAktif > $jumlahLink ? $halamanAktif - $jumlahLink : $startNumber = 1;
		$endNumber = $halamanAktif < ($jumlahHalaman - $jumlahLink) ? $halamanAktif + $jumlahLink : $endNumber = $jumlahHalaman;
		// Pada bagian for dibawah diganti dengan $tartNumber dan $endNumber
	?>

	<!-- anak panah -->
	<?php if($halamanAktif > 1) : ?>
		<a href="?halaman=<?php echo $halamanAktif - 1 ?>"><button> &laquo </button> </a>
	<?php endif; ?>

	<!-- navigasi angka -->
	<?php for($i = $startNumber; $i <= $endNumber; $i++) : ?>
		<?php if($i == $halamanAktif) : ?><!-- jika $i diisi halaman aktif maka font akan menjadi bold -->
			<a href="?halaman=<?php echo $i;?>" ><button class="navigasi"> <?php echo $i; ?>  </button></a><!-- href diisi data halaman yang dikirimikan. -->
		<?php else : ?><!-- jika selainnya maka font biasa -->
			<a href="?halaman=<?php echo $i; ?>"><button> <?php echo $i; ?></button> </a> 
		<?php endif; ?>
	<?php endfor ; ?>

	<?php if($halamanAktif < $jumlahHalaman) : ?>
		<a href="?halaman=<?php echo $halamanAktif + 1 ?>"><button> &raquo </button> </a> 
	<?php endif; 
?>

	<!-- Form keyword pencarian -->
	<form action="" method="post">
		<input type="text" name="keyword" placeholder="masukan keyword pencarian..." size="30" autofocus="" autocomplete="off" id="keyword">
		<button type="submit" name="search" id="search">Search</button>
		<img src="img/loader.gif" class="loading"> <!-- gambar loading -->
	</form>
	<!-- Pesan error -->
	<?php if(isset($error)) : ?>
		<p style="font-weight: bold; font-style: italic; font-size: 15px; ">Maaf, data tidak ditemukan slur!</p>
	<?php endif; ?>

	<!-- Query tabel -->
	<div id="container"> <!-- fungsi div untuk membungkus tabel dan beri id karena akan dipanggil di script.js -->
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
	</div>  
	<br><br>
	
	<a href="logout.php" onclick ="return confirm('Are you sure?')"><button>Logout</button></a>
	
</body>
</html>

