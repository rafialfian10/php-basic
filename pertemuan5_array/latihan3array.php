<?php  
$mahasiswa = ["Rafi Alfian", "A710170021", "Pendidikan Teknik Informatika", "a710170021@student.ums.ac.id", "08979638899"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Cara Menampilkan Daftar Mahasiswa</title>
	<style> .warna-teks{ color: red }
			.clear {clear: both}
	</style>


</head>
<body>
		<!-- Cara Manual -->
<h1>Daftar Mahasiswa</h1>
	<ul>
		<h4 class="warna-teks">Cara Manual</h4><!-- menampilkan data mahasiswa dalam bentuk list -->
		<li>Rafi Alfian</li>	
		<li>A710170021</li>
		<li>Pendidikan Teknik Informatika</li>
		<li>a710170021@student.ums.ac.id</li>
		<li>08979638899</li>		
	</ul>

<div class="clear"></div>

	<ul><!-- menampilkan data mahasiswa dalam bentuk list -->
		<h4 class="warna-teks">Cara memanggil elemen-nya satu per satu</h4>
		<li><?php echo $mahasiswa[4] ?></li>	
		<li><?php echo $mahasiswa[3] ?></li>
		<li><?php echo $mahasiswa[2] ?></li>
		<li><?php echo $mahasiswa[1] ?></li>
		<li><?php echo $mahasiswa[0] ?></li>	
	</ul>

<div class="clear"></div>
	
	<ul>
		<h4 class="warna-teks">Cara Perulangan</h4>
		<?php foreach ($mahasiswa as $mhs) : ?>
			<li>
				<?php echo $mhs; ?>
			</li>
		<?php endforeach; ?>
	</ul>

</body>
</html>

<div class="clear"></div>

<?php  
$mahasiswa2 = [
	["Rafi Alfian", "A710170021", "Pendidikan Teknik Informatika", "a710170021@student.ums.ac.id", "08979638899"], ["Ervin Alvianto", "A510170007", "PGSD", "a510170007@student.ums.ac.id", "08579638899"], ["A810170001", "Ali Imron", "Teknik Indsutri", "a810170001@student.ums.ac.id", "08179638899"],
];		//Array multidimensi atau array didalam array
		//Cara memanggil array multidimensi
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Latihan Membuat Array Multidimensi (Array Di Di Dalam Array)</title>
</head>
<body>
	<h4 class="warna-teks"> Array Mutidimensi (Array Di Dalam Array)</h4>
			<?php foreach ($mahasiswa2 as $mhs2) : ?>
		<ul>
				<li>Nama  : <?php echo $mhs2 [0]; ?> </li>
				<li>NIM   : <?php echo $mhs2 [1]; ?> </li>
				<li>Prodi : <?php echo $mhs2 [2]; ?> </li>
				<li>Email : <?php echo $mhs2 [3]; ?> </li>
				<li>No.HP : <?php echo $mhs2 [4]; ?> </li>
		</ul>
	<?php endforeach; ?>
</body>
</html>
<!-- Penting! :Array diatas merupakan array multidimensi numerik(array yang indeksnya angka) jadi urutan didalam array harus benar. Contoh Seperti pada list array ketiga pada elemen nama dan nim terbalik jadi hasilnya akan terbalik, untuk menghindari kesalahan tersebut, maka akan digunakan array associative(dimana indeksnya bukan lagi "angka" tapi "string" yang dibuat sendiri untuk mengasosiakan ke nilai yang ada didalam array)  -->
