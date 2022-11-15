<?php  

require 'functions.php';

if(isset($_POST["signup"]) ){
	if(register($_POST) > 0){
		echo"<script>
				alert('Data berhasil ditambahkan!');
				document.location.href= 'login.php';
			</script> ";
	} else {
		echo"<script>
				alert('Data gagal ditambahkan!');
				document.location.href= 'register.php';
			</script> ";
	}
}


?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
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
				<label for="kpassword">Konfirmasi Password : </label>
				<input type="password" name="kpassword" id="kpassword">
			</li>

			<li>
				<button type="submit" name="signup">Sign Up</button>
			</li>
		</ul>
	</form>
</body>
</html>