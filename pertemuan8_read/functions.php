<?php  
 $conn = mysqli_connect("localhost", "root", "", "players");

function query($query){ //buat function query agar nanti function dapat dipanggil pada halaman index_cara2.php. dan $query berfungsi untuk menangkap "argumen/parameter string" yang dikirim dari index_cara2.php.
	global $conn;// globals digunakan untuk memanggil variabel yang mengacu pada $conn diatas (bukan membuat variabel baru).
	$result = mysqli_query($conn, $query);//parameter ada 2 yaitu "$conn" dan "string query" yang isinya parameter (SELECT * FROM pemaincadanganfc). lalu jadikan variabel baru "nama variabel bebas($result)"" $result diibaratkan sebagai lemari.
	$wadah = [];// setelah itu kita buat supaya proses pengambilan data dari $result bisa dilakukan difunction ini. pertama buat variabel baru(nama bebas) $wadah, setelah itu ambil data-nya dengan menggunakan looping
	while($player = mysqli_fetch_assoc($result) ){//cara baca : ambil data dari $result(ibaratnya lemari). $player(ibarat baju) adalah data yang diambil dari setiap looping-nya
		$wadah[] = $player;//cara baca: menambahkan elemen baru diakhir tiap array,(ibarat kita mengambil baju/data/$player) lalu simpan (diarray/kotak/$wadah)
	}
	return $wadah; //cara baca: mengembalikan kotak/wadahnya. ($wadah itu sudah dalam bentuk array associative)
	//lalu function tersebut dapat ditampung dan dipanggil pada halaman index_cara2.php dengan membuat variabel baru nama bebas($players)
}
?>