<?php  

//Koneksi ke Database
$conn = mysqli_connect("localhost", "root", "", "pemaincadanganfc");


//Function Query /ambil data
Function query($query){
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
//FUNGSI INSERT / MASUKAN DATA
Function insert($data){//nama variabel bebas. function insert data akan menerima input data $_POST (insert.php). Lalu variabel $data akan menangkap data berupa argumen dari insert.php
	global $conn;

	$photo = htmlspecialchars($data["photo"]);
	$name = htmlspecialchars($data["name"]);
	$backnumber = htmlspecialchars($data["backnumber"]);
	$age = htmlspecialchars($data["age"]);
	$position = htmlspecialchars($data["position"]);
	$state = htmlspecialchars($data["state"]);
	//htmlspecialchars berfungsi untuk mengolah data yang dimasukan user. Jika user memasukkan script ke dalam form terutama script yang dimasukkan para hacker
	//alasan kenapa $_POST["data"] disimpan kedalam variabel adalah untuk mempermudah penulisan didala insert into values karena akan kebanyakan tanda kutip.

	$query = "INSERT INTO players VALUES ('', '$photo', '$name', '$backnumber', '$age', '$position', '$state')";
	mysqli_query($conn, $query); //setelah query dijalankan, maka kita harus bisa membuat function insertdata ini mengembalikan angka, angka didapat dari mysqli_affected_rows (intinya selain function ini dijalankan, apakah dia akan me return apakah berhasil atau tidak)

	return mysqli_affected_rows($conn); //hasilnya jika data berhasil masuk +1 dan jika data gagal masuk maka -1
}
?>



<?php  
//FUNGSI DELETE
Function delete($id){
	global $conn;

	mysqli_query($conn, "DELETE FROM players WHERE id = $id");

	return mysqli_affected_rows($conn);
}
?>



<?php  
//FUNGSI EDIT DATA
	Function edit($data){
	global $conn;

	$id = $data["id"];
	$photo = htmlspecialchars($data["photo"]);
	$name = htmlspecialchars($data["name"]);
	$backnumber = htmlspecialchars($data["backnumber"]);
	$age = htmlspecialchars($data["age"]);
	$position = htmlspecialchars($data["position"]);
	$state = htmlspecialchars($data["state"]);

	//data dari field/kolom sedangkan $data adalah data yang ditangkap dalam form/data yang baru
	$query = "UPDATE players SET 
		photo = '$photo', 	
		name = '$name', 
		backnumber = '$backnumber', 
		age = '$age', 
		position = '$position', 
		state = '$state'
		WHERE id = $id"; // karena belum mempunyai $id maka buat dulu $id diform(edit.php) 
		//cara baca: update players set data dengan data yang baru

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
	}
?>



