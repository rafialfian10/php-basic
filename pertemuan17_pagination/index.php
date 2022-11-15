<?php 

session_start();

if(!isset($_SESSION["login"])){ // jika $_SESSION login belum diset/dibuat dari halaman login, maka pindah paksa user ke login.php
 	header("Location: login.php");
	exit;
}

require 'functions.php';

//Pagination atau Pengaturan halaman
//konfurasi. atur jumlah halaman = total data / data perhalaman 

//Cara 1: menghitung jumlah data mysqli_num_rows
// $result = mysqli_query ($conn, "SELECT * FROM players");
// $JumlahData = mysqli_num_rows($result);
// var_dump($JumlahData);

//Cara 2: menghitung jumlah data dengan count(), karena function query mengambalikan array associative
$jumlahDataPerHalaman = 5;
$JumlahData = count(query("SELECT * FROM players")); // jumlah seluruh data pada database = 17 data
$jumlahHalaman = ceil($JumlahData / $jumlahDataPerHalaman); //hasil dari 17 / 5 = 3.4. halaman tidak mungkin bernilai angka koma, sehingga harus dibulatkan. ada beberapa cara:
//1. round() : membulatkan bilangan pecahan ke desimal terdekat.
//2. floor() : membulatkan bilangan pecahan ke desimal terbawah.
//3. ceil() : membulatkan bilangan pecahan ke desimal teratas.

// $halamanAktif digunakan untuk menentukan saat ini sedang di halaman berapa, halamanAaktif diisi dengan data yang ditangkap di URL yang ditulis dengan ?halaman=1 dst..
//cara 1 : metode if else
	// if(isset($_GET["halaman"]) ){ 
	// 	$halamanAktif = $_GET["halaman"];
	// }else {
	// 	$halamanAktif = 1; }
//cara baca: jika halaman URL diset/ada isinya/ada yang menulis di URl, maka $halamaanAktif diambil dari URL, jika tidak maka $halamanAktif akan menampilkan halaman 1.

//cara 2 dengan metode ternary
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
//cara baca: kondisi jika halamanAktif bernilai = true(?) maka akan disi dengan $_GET["halaman"] (diambil dari URL), tapi jika bernilai false(:) maka tampilkan halaman ke 1.

//Formula untuk menghitung awal data pada tiap-tiap halaman
$dataAwal = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;


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

<!-- Form keyword pencarian -->
	<form action="" method="post">
		<input type="text" name="keyword" placeholder="masukan keyword pencarian..." size="30" autofocus="" autocomplete="off">
		<button type="submit" name="search">Search</button>
	</form>

	<?php if(isset($error)) : ?>
		<p style="font-weight: bold; font-style: italic; font-size: 15px; ">Maaf pencarian tidak ditemukan!</p>
	<?php endif; ?> <br><br>


<!-- 	Navigasi halaman -->
	
	<!-- Jumlah maksimal angka halaman/ link yang ditampilkan -->
	<?php
		$jumlahLink = 3;
		// if($halamanAktif > $jumlahLink){
		// 	$startNumber = $halamanAktif - $jumlahLink;
		// }else {
		// 	$startNumber = 1;
		// }

		// if($halamanAktif < ($jumlahHalaman - $jumlahLink)){
		// 	$endNumber = $halamanAktif + $jumlahLink;
		// } else {
		// 	$endNumber = $jumlahHalaman;
		// }

		// Operator Ternary
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
	<?php endif; ?>




			<?php $id = 1 + $dataAwal; ?>
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
	<a href="logout.php" onclick ="return confirm('Are you sure?')"><button>Logout</button></a>
</body>
</html>

