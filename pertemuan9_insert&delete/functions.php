<?php  
//KONEKSI KE DATABASE
$conn = mysqli_connect("localhost", "root", "", "pemaincadanganfc");

//FUNGSI SELECT * FROM DATA
function query($query){
	global $conn;

	$result = mysqli_query($conn, $query);
	$array = [];
	while ($player = mysqli_fetch_assoc($result)) {
		$array[] = $player;
	}
	return $array;

}

//FUNGSI INSERT INTO DATA VALUES
function insertdata($player){//nama variabel bebas. function insert data akan menerima input data $_POST (tambahdata2.php). Lalu variabel $player akan menangkap data berupa argumen dari tambahdata2.php
	global $conn;

	$photo = htmlspecialchars($player["photo"]);//htmlspecialchars berfungsi untuk mengolah data yang dimasukan user. Jika user memasukkan script ke dalam form terutama script yang dimasukkan para hacker
	$name = htmlspecialchars($player["name"]);
	$backnumber = htmlspecialchars($player["backnumber"]);
	$age = htmlspecialchars($player["age"]);
	$position = htmlspecialchars($player["position"]);
	$state = htmlspecialchars($player["state"]);


	$query = "INSERT INTO players VALUES ('', '$photo', '$name', '$backnumber', '$age', '$position', '$state')";
	mysqli_query($conn, $query);//setelah query dijalankan, maka kita harus bisa membuat function insertdata ini mengembalikan angka, angka didapat dari mysqli_affected_rows (intinya selain function ini dijalankan, apakah dia akan me return apakah berhasil atau tidak)

	return mysqli_affected_rows($conn);//hasilnya jika data berhasil masuk +1 dan jika data gagal masuk maka -1
}

//FUNGSI DELETE FROM DATA
	function delete($id) {
		global $conn;

		mysqli_query($conn, "DELETE FROM players WHERE id = $id");
		return mysqli_affected_rows($conn);
	}

?>