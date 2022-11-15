<?php  

	$conn = mysqli_connect("localhost", "root", "", "pemaincadanganfc");

?>

<?php  

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while($player = mysqli_fetch_assoc($result)){
		$rows[] = $player;
	}
	return $rows;
}
?>


<?php  
function register($data){
	global $conn;

	$username = htmlspecialchars(strtolower(stripcslashes($_POST["username"])));
	$email = htmlspecialchars($_POST["email"]);
	$password = mysqli_real_escape_string($conn, $_POST["password"]);
	$kpassword = mysqli_real_escape_string($conn, $_POST["kpassword"]);

		$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email' ");
		if(mysqli_fetch_assoc($result)){
		echo"<script>
				alert('Username / Email sudah terdaftar!');
				document.location.href= 'register.php';
			</script> ";
			return false;
		}

		if($password !== $kpassword){
			echo"<script>
				alert('Konfirmasi password tidak sesuai!');
				document.location.href= 'register.php';
			</script> ";
			return false;
		}
		$password = password_hash($password, PASSWORD_DEFAULT);

		$query = "INSERT INTO users VALUES ('', '$username', '$email', '$password') ";
		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
	} 
?>

<?php  

function delete($id){
	global $conn;

	
	mysqli_query($conn, "DELETE FROM players WHERE id = $id");

	return mysqli_affected_rows($conn);
}
?>

<?php  

function insert($data){

	global $conn;

	$name = htmlspecialchars($data["name"]);
	$backnumber = htmlspecialchars($data["backnumber"]);
	$age = htmlspecialchars($data["age"]);
	$position = htmlspecialchars($data["position"]);
	$state = htmlspecialchars($data["state"]);

	$photo = upload();
	if($photo === false){
		return false;
	
	}

	$query = "INSERT INTO players VALUES('', '$name', '$backnumber', '$age', '$position', '$state', '$photo') ";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
?>


<?php  

	function upload(){

		global $conn;

		$namaFile = $_FILES['photo']['name'];
		$ekstensiFile = $_FILES['photo']['type'];
		$ukuranFile = $_FILES['photo']['size'];
		$tmpName = $_FILES['photo']['tmp_name'];
		$error = $_FILES['photo']['error'];


		if($error == 4){
			echo "<script>
					alert('Upload gambar terlebih dahulu!');
					document.location.href = 'index.php';
				</script>";
			return false;
		}

		if($ukuranFile > 1000000){
			echo "<script>
					alert('Ukuran gambar terlalu besar!');
					document.location.href = 'index.php';
				</script>";
			return false;
		}

		$ekstensiFileValid = ['jpg', 'jpeg', 'png'];
		$ekstensiFile = explode('.', $namaFile);
		$ekstensiFile = strtolower(end($ekstensiFile));

		if(!in_array($ekstensiFile, $ekstensiFileValid) ){
			echo "<script>
					alert('Upload file gambar!');
					document.location.href = 'index.php';
				</script>";
			return false;
		}

		$ekstensiFileBaru = uniqid();
		$ekstensiFileBaru .= '.';
		$ekstensiFileBaru .= $ekstensiFile;

		move_uploaded_file($tmpName, 'img/' . $ekstensiFileBaru);
		return $ekstensiFileBaru;
	}
?>


<?php  

function edit($data){

	global $conn;

	$id = $data["id"];
	$name = htmlspecialchars($data["name"]);
	$backnumber = htmlspecialchars($data["backnumber"]);
	$age = htmlspecialchars($data["age"]);
	$position = htmlspecialchars($data["position"]);
	$state = htmlspecialchars($data["state"]);
	$photoLama = htmlspecialchars($data["photolama"]);

	$error = $_FILES['photo']['error'];

	if($error === 4){
		$photo = $photoLama;
	} else {
		$photo = upload();
	}

	$query = "UPDATE players SET name = '$name', backnumber = '$backnumber', age = '$age', position = '$position', state = '$state', photo = '$photo' WHERE id = '$id' ";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
?>

<?php 
	function search($keyword){
		global $conn;

		$query = "SELECT * FROM players WHERE name LiKE '%$keyword%' OR position LIKE '%$keyword%' ";
		return query($query);
	}
?>