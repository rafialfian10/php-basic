<?php  

session_start();

if(!isset($_SESSION["login"])){ // jika $_SESSION login belum diset/dibuat dari halaman login, maka pindah paksa user ke login.php
 	header("Location: login.php");
	exit;
}

require 'functions.php';

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST['submit']) ){

if (insert($_POST) > 0){ //cara baca : jika data yang didalam form diambil oleh $_POST yang ditangkap oleh variabel $data(funtions.php) mengembalikan nilai lebih besar dari 0 (atau berhasil masuk didalam database) maka lakukan sesuatu 
	echo "<script>
			alert('Data berhasil ditambahkan slur!');
			document.location.href = 'index.php';
		</script>";
} else {
	echo "<script>
			alert('Data gagal ditambahkan slur!');
			document.location.href = 'index.php';
		</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Insert Data</title>
	<style>
		h2 {
			font-family: georgia;
			text-align: center;
			color: black;
			background-color: red;
		}
	</style>
</head>
<body>
	<h2>INSERT DATA PEMAIN CADANGAN FC </h2>
	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="name">Name : </label>
				<input type="text" name="name" id="name" required="">
			</li>

			<li>
				<label for="backnumber">Backnumber : </label>
				<input type="text" name="backnumber" id="backnumber" required="">
			</li>

			<li>
				<label for="age">Age : </label>
				<input type="text" name="age" id="age" required="">
			</li>

			<li>
				<label for="position">Position : </label>
				<input type="text" name="position" id="position" required="">
			</li>

			<li>
				<label for="state">State : </label>
				<input type="text" name="state" id="state" required="">
			</li>

			<li>
				<label for="photo">Photo : </label>
				<input type="file" name="photo" id="photo">
			</li>

			<button type="submit" name="submit">Submit</button>
		</ul>
	</form>
	<a href="data.php"><p>Back</p></a>

</body>
</html>