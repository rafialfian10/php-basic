<?php  

session_start();
	
require 'functions.php';

	if(isset($_COOKIE["id"]) && isset($_COOKIE["username"]) ){
		$id = $_COOKIE["id"];
		$username = $_COOKIE["username"];

		$result = mysqli_query($conn, "SELECT username FROM users WHERE id = '$id' ");
		$rows = mysqli_fetch_assoc($result);

		if($username === hash("sha256", $rows["username"]) ){
			$_SESSION["signin"] = true;
		}
	}

	if(isset($_SESSION["signin"])){
		header("Location: login.php");
		exit;
	}

	if(isset($_POST["signin"]) ){

		$username = $_POST["username"];
		$email = $_POST["email"];
		$password = $_POST["password"];

		$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email' ");

		if(mysqli_num_rows($result) === 1){


			$rows = mysqli_fetch_assoc($result);
				if(password_verify($password, $rows["password"])){

					$_SESSION['signin'] = true;

					if(isset($_POST["remember"]) ){

						setcookie('id', $rows['id'], time() + 60);
						setcookie('username', hash('sha256', $rows["username"]), time() + 60);

					}

					echo "<script>
							alert('Login berhasil!');
							document.location.href = 'index.php';
						</script>";
			}
		}
			$error = true;
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body>
	<h1>HALAMAN LOGIN</h1>

	<?php if(isset($error)) : ?>
		<p>Username / Email / Password salah!</p>
	<?php endif; ?>

	<form action="" method="post">
		<ul>
			<li>
				<label for="username">Username : </label>
				<input type="text" name="username" id="username">
			</li>

			<li>
				<label for="email">Email : </label>
				<input type="email" name="email" id="email">
			</li>

			<li>
				<label for="password">Password : </label>
				<input type="password" name="password" id="password">
			</li>

			<li>
				<input type="checkbox" name="remember" id="remember">	
				<label for="remember">Remember me</label>
			</li>

			<li>
				<button type="submit" name="signin">Sign In</button>
			</li>
		</ul>
	</form>
</body>
</html>