<?php 

if (isset($_POST["submit"]) ){

	if($_POST["username"] == "rafi" && $_POST["email"] == "a710170021@student.ums.ac.id" && $_POST["password"] == "a710170021"){
		echo "
			<script>
			alert('Login berhasil!');
			document.location.href = 'data.php';
			</script>
		";
	} else {
		$error = true;
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style>
		h1 {
			font-family: georgia;
			text-align: center;
			color: black;
			background-color: red;
		}

		p {
			color: red;
			font-style: italic;
			font-weight: bold;
			font-size: 18px;
		}
	</style>
</head>
<body>
	<h1>LOGIN PEMAINCADANGAN FC</h1>

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

			<button type="submit" name="submit">Login</button>
		</ul>
	</form>
</body>
</html>