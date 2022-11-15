<?php

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
			alert('Data berhasil diubah!');
			document.location.href = 'data.php';
		</script>";
} else {
	echo "<script>
			alert('Data gagal diubah!');
			document.location.href = 'data.php';
		</script>";
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		h1 {
			background-color: red;
			text-align: center;
		}
		h3 {
			line-height: 5px;
		}
	</style>
</head>
<body>
	<h1>Update Data Pemain Cadangan FC</h1>
	<h3>Update data</h3>
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
				<img src="img/<?php echo $player["photo"]?> " width="40" ><br>
				<input type="file" name="photo" id="photo">
			</li>

			<li>
				<button onclick="return confirm('Are you sure?')" type="submit" name="submit">Submit</button>
			</li>
		</ul>
	</form>
	<a href="data.php">Back</a>
</body>
</html>

