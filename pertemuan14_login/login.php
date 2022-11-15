<?php 

require 'functions.php';

if(isset($_POST["login"]) ){

	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' && email = '$email' ");	

	//Cek Username apakah ada username dan email didalam database yang sama dengan username dan email dengan yang diinput saat login.

	if (mysqli_num_rows($result) === 1) { //ini berfungsi untuk menghitung baris yang dkembaikan $result(SELECT). cara baca: cek apakah ada baris yang dikembalikan dari query $result, jika hasilnya === 1 berarti ada yang dikembalikan, jika === 0 berarti tidak ada. Jika ada maka dilanjutkan dengan cek password.

		//Cek Password apakah ada password di dalam database yang sama dengan password dengan yang diinput saat login 
		$rows = mysqli_fetch_assoc($result);//cek password berdasarkan data $username didalam $result(SELECT * FROM), jadi didalam $rows sudah ada id, username, email dan password yang sudah diacak. lalu lanjut mengggunakan password_verify(password, hash).
		if (password_verify($password, $rows["password"]) ){//caraa baca: kalau password input dan database sama/berhasil di verify, maka perbolehkan user masuk kedalam sistem.
			echo "<script>
					alert('Login berhasil slur!');
					document.location.href = 'data.php';
				</script>";
		}

	}// function ini berfungsi untuk mengecek string apakah sama dengan hash-nya (password yang diacak). parameternya ada 2 yaitu $password(input dari form dan password yang ada didalam database berdasarkan $result). 
	$error = true;
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style>
		h2 {
			font-family: georgia;
			text-align: center;
			color: black;
			background-color: red;
		}

		p {
			font-family: georgia;
			color: red;
			font-style: italic;
			font-size: 15px;
		}
	</style>
</head>
<body>
	<h2>LOGIN PEMAIN CADANGAN FC</h2>

		<?php if (isset($error)) : ?>
			<p>username / email / password salah!</p>
		<?php endif; ?>

	<form action="" method="post">
		<ul>
			<li>
				<label for="username">Username : </label>
				<input type="text" name="username" id="username" required="">
			</li>

			<li>
				<label for="email">Email : </label>
				<input type="text" name="email" id="email" required="">
			</li>

			<li>
				<label for="password">Password : </label>
				<input type="password" name="password" id="password" required="">
			</li>

			<button type="submit" name="login">Sign In</button>
		</ul>
	</form>
</body>
</html>