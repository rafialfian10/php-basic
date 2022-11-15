<?php  
	//User-defined Function (fungsi yang dibuat sendiri)
	Function salam($salam ="Cok", $waktu = "Selamat datang", $jurusan = "Pendidikan Teknik Informatika"){
		return " $salam $waktu $jurusan";
	}
		
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Latihan Function</title>
</head>
<body>
	<h2><?php echo salam("Hallo", "Selamat pagi", "PGSD"); ?></h2>
</body>
</html>


<?php  



function salam2($salam = "Hallo!", $waktu ="Selamat Datang", $nama = "Administrator"){
	return "$salam $waktu $nama";
}
 echo salam2();
echo "<br>";
echo "<br>";
?>

<?php 
function mahasiswa($waktu, $nama1, $nama, $nim, $jurusan, $email){
	return "Selamat $waktu! $nama1 <br>nama : $nama <br>NIM : $nim <br>Prodi : $jurusan <br>E-mail : $email";
}

echo mahasiswa("Pagi", "Admin", "Rafi", "A71070021", "Pendidikan Teknik Informatika", "a710170021@student.ums.ac.id")
 
 

 ?>