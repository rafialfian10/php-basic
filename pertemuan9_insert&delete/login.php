<?php  
if(isset($_POST["submit"])){

	if($_POST["username"] =="rafi" && $_POST["email"] == "a710170021@student.ums.ac.id" && $_POST["password"] == "a710170021"){

		header("Location: data.php");
		exit;
	} else {
		$error = true;
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<style>
		h1 {
			text-align: center;
			background-color: red;
			font-family: Georgia;
			font-size: 40px;
		}
		li{
			line-height: 23px;
		}
		label {
			font-weight: bold;
		}
	</style>
</head>
<body>
	<h1>LOGIN PEMAIN CADANGAN FC</h1>

	<form action="" method="post">
		<ul>
		<?php if(isset($error)) : ?>
			<p style="color: red; font-style: italic; font-weight: bold;"> username / email /password salah!</p>
		<?php endif; ?>
		</ul>

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

			<button type="submit" name="submit"> Login </button>
		</ul>
	</form>
</body>
</html>