<?php 

require 'functions.php';

session_start();//jalankan dulu session(wajib)

//Cek cookie
if(isset($_COOKIE['id']) && isset($_COOKIE['username']) ){ // cara baca: apakah $_COOKIE id dan username ada/tidak, jika ada maka akan dicek. selanjutnya cari data players berdasarkan id dengan query supaya dapat username-nya, lalu username-nya akan dibandingkan dengan $username dibawah, jika sama maka berarti cookie-nya valid dan boleh masuk, jika tida valid berarti gagal masuk.
	$id = $_COOKIE['id'];
	$username = $_COOKIE['username'];

	//Ambil username berdasarkan id 
	$result = mysqli_query($conn, "SELECT username FROM users WHERE id = '$id' ");
	$rows = mysqli_fetch_assoc($result);// jadi $rows hanya berisi username saja


	//Cek cookie dan username
	if($username === hash('sha256', $rows['username']) ){
		$_SESSION['login'] = true;
		//cara baca: jika $username(username yang sudah di hash/acak) sama dengan hash $rows['username'] (username baru yang acak berdasarkan username dari $result), jika hasilnya sama maka, $_SESSION bernilai true dan masuk ke index.php
	}
}

if(isset($_SESSION["login"])){ // jika $_SESSION login sudah diset/dibuat dari halaman login, maka pindah paksa user ke index.php
 	header("Location: index.php");
	exit;
}



if(isset($_POST["login"]) ){

	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' && email = '$email' ");

	//Cek Username apakah ada username dan email didalam database yang sama dengan username dan email dengan yang diinput saat login.
	if (mysqli_num_rows($result) === 1) { //ini berfungsi untuk menghitung baris yang dkembaikan $result(SELECT). 
	//cara baca: cek apakah ada baris yang dikembalikan dari query $result, jika hasilnya === 1 berarti ada yang dikembalikan, jika === 0 berarti tidak ada. Jika ada maka dilanjutkan dengan cek password.

		//Cek Password apakah ada password di dalam database yang sama dengan password dengan yang diinput saat login 
		$rows = mysqli_fetch_assoc($result); //cek password berdasarkan data $username didalam $result(SELECT * FROM), jadi didalam $rows sudah ada id, username, email dan password yang sudah diacak. lalu lanjut mengggunakan password_verify(password, hash).
		if (password_verify($password, $rows["password"]) ){//cara baca: kalau password input dan database sama/berhasil di verify, maka perbolehkan user masuk kedalam sistem.

			//Set Session
			$_SESSION["login"] = true;//buat variabel session key-nya login dan value-nya = true.

			//Cek rermember me
			if(isset($_POST["remember"]) ){ //tangkap data dari form
				//Set cookie
				setcookie('id', $rows['id'], time() + 60 );//ambil data users(id dan username) dari $rows. $rows menyimpan data user yang login, baiknya key-nya diubah namanya, jangan  id dan username.
				setcookie('username', hash('sha256', $rows['username']), time() + 60 ); //lakukan fungsi hash pada username agar string username diacak, kunjungi php.net hash, disana ada banyak algoritma. dan sha256 adalah salah satunya. 
			}
			echo "<script>
					alert('Login berhasil slur!');
					document.location.href = 'index.php';
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

			<li>
				<input type="checkbox" name="remember" id="remember">
				<label for="remember">Remember me </label>
				
			</li>

			<li>
				<button type="submit" name="login">Sign In</button>
			</li>

		</ul>
	</form>
</body>
</html>

