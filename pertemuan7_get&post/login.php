<?php  
	if (isset($_POST["submit"]) ){ //cek apakah button submit sudah ditekan atau belum
	if($_POST["username"] == "Rafi" && $_POST ["email"] == "a710170021@student.ums.ac.id" && $_POST["password"] == "a710170021"){//cek username, email dan password, disini kita akan setting datanya sekalian
		header("Location: dataplayers.php");//jika benar, maka redirect ke halaman lain, yaitu (dataplayers.php)
		exit;
	} else {//jika salah, maka tampilkan pesan kesalahan. disini kita harus membuat variabel baru dengan nilai "true"
	$error = true;
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<style>
		.posisi-warna {
			color: black;
			background-color: orange;
			text-align: center;
		}
	</style>
</head>
<body>
	
	<h1 class="posisi-warna">LOGIN PEMAIN CADANGAN FC</h1>
	<h2>Selamat Datang Sedulur Pemain Cadangan FC!</h2>

	<?php if(isset($error)) : ?>
		<p style="color: red; font-style: italic;"> username / email / password salah!</p>
	<?php endif; ?>

<ul>
	<form action="" method="post">
		<li>
			<label for="username">username : </label>
			<input type="username" name="username" id="username">
		</li>
		<li>
			<label for="email">email : </label>
			<input type="email" name="email" id="email">
		</li>
		<li>
			<label for="password">password : </label>
			<input type="password" name="password" id="password">
		</li>
			<button type="submit" name="submit">Login</button>
	</form>
</ul>

</body>
</html>

