<?php  
//koneksi ke database
require 'functions.php';

//apakah button submit sudah pernah ditekan atau belum
if(isset($_POST["submit"]) ){

	//cek apakah data berhasil ditambahkan atau tidak
	if (insertdata($_POST) > 0){//cara baca : jika data yang didalam form diambil oleh $_POST yang ditangkap oleh variabel $player(tambahdata2.php) mengembalikan nilai lebih besar dari 0 (atau berhasil masuk didalam database) maka laikukan sesuatu 
		echo "<script>
		 		alert ('data berhasil ditambahkan!');
		 		document.location.href = 'data.php';
			</script>";
} else {
		echo "<script>
		 		alert ('data gagal ditambahkan!');
		 		document.location.href = 'data.php';
			</script>";
	}
}
?>




<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Player</title>
</head>
<body>
	<h2>Insert data pemain cadangan FC</h2>

	<form action="" method="post">  
		<ul>
			<li>
				<label for="photo">Photo : </label>
				<input type="text" name="photo" id="photo" required> <!-- required berfungsi jika form kosong maka tidak bisa disubmit. required merupakan prototype html5-->
			</li>

			<li>
				<label for="name">Name : </label>
				<input type="text" name="name" id="name" required>
			</li>	

			<li>
				<label for="backnumber">Backnumber : </label>
				<input type="text" name="backnumber" id="backnumber" required>
			</li>	

			<li>
				<label for="age">Age : </label>
				<input type="text" name="age" id="age" required>
			</li>

			<li>
				<label for="position">Position : </label>
				<input type="text" name="position" id="position" required>
			</li>	

			<li>
				<label for="state">State : </label>
				<input type="text" name="state" id="state" required>
			</li>	

			
			<li>
				<button type="submit" name="submit">Submit</button>
			</li>			
		</ul>
	</form>
</body>
</html>