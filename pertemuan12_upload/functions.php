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

	$name = htmlspecialchars($data["name"]);
	$backnumber = htmlspecialchars($data["backnumber"]);
	$age = htmlspecialchars($data["age"]);
	$position = htmlspecialchars($data["position"]);
	$state = htmlspecialchars($data["state"]);
	//htmlspecialchars berfungsi untuk mengolah data yang dimasukan user. Jika user memasukkan script ke dalam form terutama script yang dimasukkan para hacker
	//alasan kenapa $_POST["data"] disimpan kedalam variabel adalah untuk mempermudah penulisan didala insert into values karena akan kebanyakan tanda kutip.

 	//upload gambar. jika berhasil akan diisi dengan nama gambar hasil dari fungsi upload
	$photo = upload();//fungsi upload jika berhasil akan mengirimkan gambar diupload dan akan mengirimkan nama gambar ke variabel.
	if ($photo === false){// jika yang dikirimkan fungsi upload gagal maka tidak ada nama yang dikirimkan maka fungsi insert data tidak akan dijalankan. Jadi INSERT TO tidak akan dijalankan dan fungsi insert(data.php) akan menghasilkan nilai -1 atau false. bisa juga if($photo)
		return false;
	}
	

	$query = "INSERT INTO players VALUES ('', '$name', '$backnumber', '$age', '$position', '$state', '$photo')";
	mysqli_query($conn, $query); //setelah query dijalankan, maka kita harus bisa membuat function insertdata ini mengembalikan angka, angka didapat dari mysqli_affected_rows (intinya selain function ini dijalankan, apakah dia akan me return apakah berhasil atau tidak)

	return mysqli_affected_rows($conn); //hasilnya jika data berhasil masuk +1 dan jika data gagal masuk maka -1
}
?>


<?php  
//FUNGSI UPLOAD GAMBAR
function upload() {

	//Tangkap data dari dari form file(insert.php)
	$namaFile = $_FILES['photo']['name'];//photo didapat dari name (input form user)
	$ukuranFile = $_FILES['photo']['size'];
	$tmpName = $_FILES['photo']['tmp_name'];
	$error = $_FILES['photo']['error'];

	//Cek apakah ada yang diupload atau tidak
	if($error === 4){ // jika $error adalah 4(tidak ada gambar yang diupload), maka error
		echo "<script>
				alert('Upload gambar terlebih dahulu slur!');
				document.location.href = 'insert.php';
			</script>";
		return false; //fungsi bernilai false /berhenti
	}

	//Cek ukuran gambar
	if($ukuranFile > 2000000){ //jika ukuran gambar melebihi 2MB, maka upload gagal
		echo "<script>
				alert('Ukuran gambar terlalu besar slur!');
				document.location.href = 'insert.php';
			</script>";
		return false;  //fungsi bernilai false / berhenti
	}



	//Cek apakah yang diupload itu gambar atau bukan berdasarkan ekstensi
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png']; //ekstensi gambar yang hanya boleh diupload.

	$ekstensiGambar = explode('.', $namaFile); //fungsi explode berfungsi memecah sebuah string menjadi array. Misal jika user mengupload file rafi.jpg maka akan dipecah menjadi ['rafi', 'jpg']. memecahnya dengan menggunakan delimiter yang disi titik.
	
	$ekstensiGambar = strtolower(end($ekstensiGambar)); // Pada hasil explode yang dibutuhkan adalah $namaFile (ekstensi) jadi harus diambil yang terakhir. misal rafi.jpg maka yang harus diambil adalah jpg-nya saja (yang paling akhir). Oleh karena itu (end) berfungsi untuk mengambil array yang paling akhir agar jika misal ada user yang mengupload file dengan nama rafi.alfian.jpg, yang tetap diambil adalah yang paling akhir. Dan untuk mengubah ekstensi nama file diubah menjadi huruf kecil maka dapat dengan menggunakan strtolower. Misal user mengupload file dengan nama JPG/PNG maka akan diubah menjadi huruf kecil semua

	if(!in_array($ekstensiGambar, $ekstensiGambarValid)) { //cara baca:jika ekstensi gambar tidak ada yang valid berdasarkan uraian diatas maka lakukan sesuatu.
		echo "<script>
				alert('Yang diupload bukan gambar slur!');
				document.location.href = 'insert.php';
			</script>";
		return false; //fungsi bernilai false / berhenti
	} // fungsi in_array (needle, haystack) untuk mengecek apakah ada string didalam sebuah array diatas. needle (jarum) adalah $ekstensiGambar sedangkan haystack (jerami) adalah $ekstensiGambarValid.
	

	// //Setelah lolos cek 3 hal, setelah itu gambar siap diupload
		// move_uploaded_file($tmpName, 'img/' . $namaFile);//move_uploaded_file(filename, destination) berfungsi untuk mengupload file jika sudah lolos pengecean diatas filename diisi dengan $tmpName dan destination diisi dengan folder tempat tujuannya dan digabung dengan $namaFile (ekstensi file) dengan titik (jangan lupa).

	// return $namaFile; //return disini berfungsi untuk mengirimkan namafile ke function upload() didalam function insert sehingga 	isi dari $photo adalah nama file sehingga dapat dimasukkan ke dalam INSERT TO. 

//------------------------------------------------------------------------------------------------------------------------------------
	//Setelah lolos cek 3 hal, setelah itu gambar siap diupload (MODIFIKASI SEDIKIT)
	//tapi sebelum itu harus generate gambar baru alasannya jika ada user yang berbeda tetapi mengupload file dengan nama file yang sama maka generate berfungsi utuk mengubah secara otomatis (random) nama file agar nama file yang masuk kedalam database berbeda. (jika sama maka nama file beru akan menimpa nama file lama dan berakibat gambar lama berubah menjadi gambar baru secara otomatis).

	$namaFileBaru = uniqid(); //berfungsi untuk membangkitkan string random yang nantinya akan dijadikan nama file yang diupload, tapi ini hanya stringnya saja dan belum ada ekstensi filenya, jadi setelah itu disambungkan ke ekstensi file-nya.
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
	//jika misal user mengupload file dengan nama rafi.jpg maka nama file akan dirandom misal menjadi wfh834uy8nfru.jpg

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);// jadi $namaFile (lama) diubah menjadi $namaFileBaru (baru).

	return $namaFileBaru; 
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
	$name = htmlspecialchars($data["name"]);
	$backnumber = htmlspecialchars($data["backnumber"]);
	$age = htmlspecialchars($data["age"]);
	$position = htmlspecialchars($data["position"]);
	$state = htmlspecialchars($data["state"]);
	$photoLama = htmlspecialchars($data["photoLama"]);

	//tangkap file
	$error = $_FILES['photo']['error'];

	//Cek apakah user upload gambar baru atau tidak
	if($error === 4){ //cara baca: jika tidak ada yang diupload maka $photo(gambar) diisi dengan $photoLama(gambar lama). misal jika user hanya edit selain gambar. bernilai 4 = tidak ada file yang diupload, jika 0 = ada file yang diupload.
		$photo = $photoLama;
	} else { // jika selainnya maka $photo akan disi dengan upload()(gambar baru)/ jalankan fungsi upload
		$photo = upload();
	}
	
	
	

	//data dari field/kolom sedangkan $data adalah data yang ditangkap dalam form/data yang baru
	$query = "UPDATE players SET  	
		name = '$name', 
		backnumber = '$backnumber', 
		age = '$age', 
		position = '$position', 
		state = '$state',
		photo = '$photo'
		WHERE id = $id"; // karena belum mempunyai $id maka buat dulu $id diform(edit.php) 
		//cara baca: update players set data dengan data yang baru

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
	}
?>



<?php
//FUNGSI SEARCHING  
function search($keyword){
	global $conn;
 
	$query = "SELECT * FROM players WHERE name LIKE '%$keyword%' OR backnumber LIKE '%$keyword%' OR position LIKE '%$keyword%' "; ////Penting : $keyword bertipe string
	// jika (=) berarti keywordnya harus sama persis dengan databasenya, jika (LIKE) berarti keywordnya tidak perlu sama persis tapi perlu ditambahkan tanda % (Wilcut) pada $keyword-nya. Jika lebih dari satu data maka sambung dengan OR 

	return query($query); //function query menghasilkan associative dan dikembalikan dalam bentuk array associative dan akan dimasukkan kedalam $players(data.php). Jadi isi $playersnya akan di isi dengan data yang user ketikkan (data.php).
}
?>


