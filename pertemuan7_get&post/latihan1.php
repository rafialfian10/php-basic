<?php  

//Variable Scope / Lingkup Variabel
$x = 20;

function tampilX() {
	global $x;//solusi untuk mengatasi hal tersebut adalah dengan menggunakan global
	echo $x ;
	
}// hasilnya akan error, itu karena lingkup variabel $x yang ada didalam function itu berbeda dengan lingkup yang ada diluar function, meskipun nama variabel sama namun 2 variabel berbeda. Variabel didalam function itu hanya berlaku didalam function tersebut.
tampilX();

?>

<?php  
$mahasiswa = [
	["nama" => "Rafi Alfian", "nim" => "A710170021", "prodi" => "Pendidikan Teknik Informatika", "email" => "Email", "nilai" => "80,90,100"],
	["nama" => "Rezqy Ade Candra", "nim" => "A710170039", "prodi" => "Pendidikan Teknik Informatika", "email" => "Email", "nilai" =>"70,90,100"],
	["nama" => "Dawam Mahfudz", "nim" => "A710170043", "prodi" => "Pendidikan Teknik Informatika", "email" => "Email", "nilai" =>"60,90,100"]
];
?>


<!DOCTYPE html>
<html>
<head>
	<title>GET</title>
</head>
<body>
	<ul>
	<?php foreach ($mahasiswa as $mhs) : ?>
		<a href="latihan2.php?nama=<?php echo $mhs["nama"];?>&nim=<?php echo $mhs["nim"];?>&prodi=<?php echo $mhs["prodi"];?>&email=<?php echo $mhs["email"];?>&nilai=<?php echo $mhs["nilai"]; ?> "><li><?php echo $mhs["nama"]; ?></li></a>
	<?php endforeach; ?>
	</ul>
</body>
</html>