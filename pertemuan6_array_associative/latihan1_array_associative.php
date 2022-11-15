<?php  
//Daftar Pemain Cadangan FC
$players = [ 
	[
		"name" => "Rafi Alfian", 
		"age" => "24", 
		"number" => "18",
		"position" => "Defender",
		"photo" => "images.jpg"//harus nama file dan ekstensinya
		
	],
	[
		"name" => "Ervin Alfianto", 
		"age" => "26", 
		"number" => "5", 
		"position" => "Defender",
		"photo" => "images.jpg"
	],
	[
		"name" => "Ali Imron", 
		"age" => "25", 
		"number" => "7", 
		"position" =>"Winger", 
		"photo" => "images.jpg"
	],
	[
		"name" => "Mahadir As-salam", 
		"age" => "24", 
		"number" => "10", 
		"position" => "Winger", 
		"photo" => "images.jpg"
	],
	[
		"name" => "Chanif Nur Hidayat", 
		"age" => "29", 
		"number" => "10", 
		"position" => "Winger", 
		"photo" => "images.jpg"
	],
	[
		"name" => "Muhammad Ilham", 
		"age" => "26", 
		"number" => "1", 
		"position" => "Goal Keeper", 
		"photo" => "images.jpg"
	]
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DAFTAR PEMAIN CADANGAN FC</title>
	<style>
		.posisi {
			color: red;
			text-align: center
		}
	</style>

</head>
<body>
		<h1 class="posisi">PEMAIN CADANGAN FC</h1>
		<?php foreach ($players as $player) : ?>	
			<ul>
				<li> Foto : <img src="img/<?php echo $player["photo"];  ?>"> </li>
				<li> Name : <?php echo $player ["name"]; ?> </li>
				<li> Age  : <?php echo $player ["age"]; ?> </li>
				<li> Number : <?php echo $player ["number"]; ?> </li>
				<li> Position :<?php echo $player ["position"]; ?> </li>
			</ul><!-- Menampilkan array multidimensi dengan memanggil indeks 1 per 1 -->		
		<?php endforeach ; ?>
</body>
</html>




<!DOCTYPE html>
<html>
<head>
	<title>Latihan Membuat Kotak Pada Array</title>
	<style> 
		.kotak{
			height: 50px;
			width: 50px;
			background-color: salmon;
			text-align: center; /*posisi tengah horizontal pada tulisan*/
			margin: 5px; /*garis untuk memisah*/
			line-height: 50px; 
			float: left;/* agar posisi objeknya menjadi dari kiri ke kanan */
			transition: 1s; /*untuk memberi animasi*/
		} 
		.kotak:hover{
			transform: rotate(360deg);
			border-radius: 50%; /*merubah bentuk menjadi lingkaran*/
		} 
		.clear{clear: both}
	</style>
</head>
<body>
<?php $kotak = [[1, 2, 3], [4, 5, 6], [7, 8, 9]]; 
?>
<?php foreach ($kotak as $x) : ?>
		<?php foreach ($x as $y) : ?> <!-- menampilkan array didalam array. $kotak adalah array terluar, Sx adalah array yang berisi masing-masing 3 elemen, jadi untuk merepresentasikan setiap elemen pada array maka dibutuhkan variabel baru yaitu $y -->
		<div class="kotak"> <?php echo $y; ?></div>
	<?php endforeach; ?>
	<div class="clear"></div>  <!-- div untuk membersihkan float agar tampilan kebawah -->
<?php endforeach; ?>	
</body>
</html>


<?php 
$mahasiswa = [
	["nama" => "Rafi Alfian", "nim" => "A710170021", "prodi" => "Pendidikan Teknik Informatika", "email" => "Email", "nilai" => ["80,90,100"]],
	["nama" => "Rezqy Ade Candra", "nim" => "A710170039", "prodi" => "Pendidikan Teknik Informatika", "email" => "Email", "nilai" =>["70,90,100"]],
	["nama" => "Dawam Mahfudz", "nim" => "A710170043", "prodi" => "Pendidikan Teknik Informatika", "email" => "Email", "nilai" =>["60,90,100"]]
];





 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
	<?php foreach ($mahasiswa as $mhs1) : ?>
		<ul>
			<li> Nama : <?php echo $mhs1["nama"]; ?> </li>
			<li> NIM : <?php echo $mhs1["nim"]; ?> </li>
			<li> Prodi : <?php echo $mhs1["prodi"]; ?> </li>
			<li> Email : <?php echo $mhs1["email"]; ?> </li>
			<li> Nilai : <?php echo $mhs2["nilai"]; ?> </li>
		</ul>
	<?php endforeach; ?>
</body>
</html> 





