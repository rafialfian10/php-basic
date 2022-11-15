<?php

session_start();

if(!isset($_SESSION["login"])){ // jika $_SESSION login belum diset/dibuat dari halaman login, maka pindah paksa user ke login.php
 	header("Location: login.php");
	exit;
}

require 'functions.php';

//tangkap id yang dikirim dari URL pada halaman data.php lalu jadikan variabel
$id = $_GET["id"];

//ambil data players berdasarkan id
$player = query("SELECT * FROM players WHERE id = $id")[0];//gunakan function query dari functions.php dan masukkan kesalam variabel karena function sudah dalam bentuk array associative.

// var_dump($player[0]["name"]); (penting: didalam variabel array associative masih terbungkus array numerik). [0] bisa dipindah ke function query alasannya adalah ketika query dipanggil begitu dimasukkan kedalam array $baris (functions.php), yang diambil akan langsung ke index 0 atau elemen pertama.

//cek apakah button submit sudah ditekan atau belum maka ambil semua data baru, masukkan kedalam $_POST lalu kirim ke function edit($_POST yang dikirim adalah data didalam form)
if(isset($_POST["submit"]) ){

	//cek apakah data berhasil diubah atau tidak
	if(edit($_POST) > 0 ){
	echo "<script>
			alert('Data berhasil diubah slur!');
			document.location.href = 'index.php';
		</script>";
} else {
	echo "<script>
			alert('Data gagal diubah slur!');
			document.location.href = 'index.php';
		</script>";
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
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
	<h2>UPDATE DATA PEMAIN CADANGAN FC </h2>
	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<input type="hidden" name="id" value="<?php echo $player["id"]; ?>">
			<input type="hidden" name="photoLama" value="<?php echo $player["photo"]; ?>">
			
			<li>
				<label for="name">Name : </label>
				<input type="text" name="name" id="name" required value="<?php echo $player["name"]; ?>">
			</li>

			<li>
				<label for="backnumber">Backnumber : </label>
				<input type="text" name="backnumber" id="backnumber" required value="<?php echo $player["backnumber"]; ?>">
			</li>

			<li>
				<label for="age">Age : </label>
				<input type="text" name="age" id="age" required value="<?php echo $player["age"]; ?>">
			</li>

			<li>
				<label for="position">Position : </label>
				<input type="text" name="position" id="position" required value="<?php echo $player["position"]; ?>">
			</li>

			<li>
				<label for="state">State : </label>
				<input type="text" name="state" id="state" required value="<?php echo $player["state"]; ?>">
			</li>

			<li>
				<label for="photo">Photo : </label> <br>
				<img src="img/<?php echo $player["photo"]?>"width="40" ><br>
				<input type="file" name="photo" id="photo" value="<?php $players["photo"] ?>">
			</li>

			<li>
				<button onclick="return confirm('Are you sure?')" type="submit" name="submit">Edit Data</button>
			</li>
		</ul>
	</form>
	<a href="index.php">Back</a>
</body>
</html>

