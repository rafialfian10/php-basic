<?php  
//cek apakah tidak ada data di $_GET
if (!isset($_GET["nama"]) ||// cara baca: jika $-GET nama belum dibuat maka pindahkan paksa user dari halaman 2 ke halaman 1. Isset berfungsi untuk mengecek apakah sebuah variabel sudah pernah dibuat atau belum
	!isset($_GET["nim"]) ||
	!isset($_GET["prodi"]) ||
	!isset($_GET["email"]) ||
	!isset($_GET["nilai"]))
{
	//redirect berfungsi untuk memindahkan paksa user dari halaman satu kehalaman lain, tujuannya agar sistem tidak bisa dimasuki orang lain (hackers)
	header("Location: latihan1.php");
	exit;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Informasi Detail Mahasiswa</title>
</head>
<body>
	
</body>
</html>