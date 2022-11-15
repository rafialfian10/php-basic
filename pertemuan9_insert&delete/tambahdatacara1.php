<?php  
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "pemaincadanganfc");

//apakah button submit sudah pernah ditekan atau belum
if(isset($_POST["submit"]) ){

//ambil data dari tiap-tiap elemen dalam form dan simpan kedalam setiap variabel
	$photo = $_POST["photo"];
	$name = $_POST["name"];
	$backnumber = $_POST["backnumber"];
	$age = $_POST["age"];
	$position = $_POST["position"];
	$state = $_POST["state"];
	

//query insert data
	$query = "INSERT INTO players VALUES ('', '$photo', '$name', '$backnumber', '$age', '$position', '$state')";//alasan kenapa $_POST["data"] disimpan kedalam variabel adalah untuk mempermudah penulisan didala insert into values karena akan kebanyakan tanda kutip.

	mysqli_query($conn, $query);//fungsi insert into values disimpan kedalam variabel $query didalam kurung agar praktis

//cek apakah data berhasil ditambahkan atau tidak
	// var_dump(mysqli_affected_rows($conn));

	if (mysqli_affected_rows($conn) > 0) {//cara baca: jika fungsi dari mysqli_affected_rows dari $conn (koneksi) itu lebih besar dari 0 atau tidak, jaka berhasil maka lakukan sesuatu (jika +1 itu data berhasil ditambahkan, tapi jika -1 data gagal ditambahkan)
		echo "Data berhasil ditambahkan!";
	} else {
		echo "Data gagal ditambahkan!";
		echo "<br>";
		echo mysqli_error($conn);
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
				<input type="text" name="photo" id="photo">
			</li>

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
				<input type="text" name="age" id="age">
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
				<button type="submit" name="submit">Submit</button>
			</li>			
		</ul>
	</form>
</body>
</html>