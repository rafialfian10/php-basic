<?php  

require 'functions.php';

$id = $_GET["id"];
$players = query("SELECT * FROM players WHERE id = $id")[0];



if(isset($_POST["edit"]) ){
if(edit($_POST) > 0){
	echo "<script>
			alert('Data berhasil diubah!');
			document.location.href = 'index.php';
		</script>";
}else{
	echo "<script>
			alert('Data gagal diubah!');
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
<h1>EDIT DATA</h1>
<body>
 	<form action="" method="post" enctype="multipart/form-data">
		<ul>
				<input type="hidden" name="id" value="<?php echo $players["id"] ?>">
				<input type="hidden" name="photolama" value="<?php echo $players["photo"] ?>">
		
			<li>
				<label for="name">Name : </label>
				<input type="text" name="name" id="name" value="<?php echo $players["name"] ?>">
			</li>

			<li>
				<label for="backnumber">Backnumber : </label>
				<input type="text" name="backnumber" id="backnumber" value="<?php echo $players["backnumber"] ?>">
			</li>

			<li>
				<label for="age">Age : </label>
				<input type="tex" name="age" id="age" value="<?php echo $players["age"] ?>">
			</li>

			<li>
				<label for="position">Position : </label>
				<input type="text" name="position" id="position" value="<?php echo $players["position"] ?>">
			</li>

			<li>
				<label for="state">State : </label>
				<input type="text" name="state" id="state" value="<?php echo $players["state"] ?>">
			</li>

			<li>
				<img src="img/<?php echo $players["photo"]; ?>" width="50"><br>
				<label for="photo">Photo : </label>
				<input type="file" name="photo" id="photo" value="<?php echo $players["photo"] ?>">
			</li>

			<li>
				<button type="submit" name="edit">Edit Data</button>
			</li>
		</ul>
	</form>
</body>
</html>