<?php  

require 'functions.php';


if(isset($_POST["insert"]) ){
if(insert($_POST) > 0){
	echo "<script>
			alert('Data berhasil ditambahkan!');
			document.location.href = 'index.php';
		</script>";
}else{
	echo "<script>
			alert('Data gagal ditambahkan!');
			document.location.href = 'index.php';
		</script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>insert data</title>
</head>
<h1>INSERT DATA</h1>
<body>
 	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="name">Name : </label>
				<input type="text" name="name" id="name">
			</li>

			<li>
				<label for="backnumber">Backnumber : </label>
				<input type="text" name="backnumber" id="backnumber">
			</li>

			<li>
				<label for="age">Age : </label>
				<input type="tex" name="age" id="age">
			</li>

			<li>
				<label for="position">Position : </label>
				<input type="text" name="position" id="position">
			</li>

			<li>
				<label for="state">State : </label>
				<input type="text" name="state" id="state">
			</li>

			<li>
				<label for="photo">Photo : </label>
				<input type="file" name="photo" id="photo">
			</li>

			<li>
				<button type="submit" name="insert">Insert Data</button>
			</li>
		</ul>
	</form>
</body>
</html>