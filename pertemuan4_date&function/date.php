
<?php  

	//Fungsi Date / Time
		// 1. time ()
		// 2. date ()
		// 3. mktime () / maketime
		// 4. strtotime () / string to time

	//1. Date, untuk menampilkan tanggal dengan format tertentu, contoh:
	echo date ("l, d - M - Y");
	echo "<br><br>";


	// 2. Time, UNIX Timestamp / EPOCH time. maksudnya awal mula waktu di dunia IT sejak 1 januari 1970 sampai saat ini (waktu yang telah disepakati oleh untuk komputer) contoh:
	echo time ();
	echo "<br></br>";
	echo date("l, d - M -Y", time()+ 60 * 60 * 24 * 365); //gabungkan dua fungsi date dan time. echo date, tampilkan hari (l), sebagai parameter pertama, ditambah parameter kedua time (dari waktu saat ini) + operator menandakan hari, tanggal - bulan - tahun dari 365 hari kedepan. + artinya kedepan, apabila - artinya kebelakang.
	echo "<br></br>";

	//mktime (untuk membuat detik sendiri dari 1 januari 1970 sampai detik yang kita inginkan).
	//parameter mktime ada 6, yaitu (0, 0, 0, 0, 0, 0) urutannya yaitu (jam, menit, detik, bulan, tanggal, tahun). contoh cara untuk mengetahui hari ulang tahun seseorang.
	echo date ("l", mktime(0, 0, 0, 8, 24, 1996));//artinya detik yang telah berlalu dari 1 januari 1970 sampai 24 agustus 1996, agar dapat mengetahui detik tersebut hari apa, maka gunakan fungtion date dengan parameter (l).
	echo "<br></br>";


	//strtotime (string to time), jika mktime yang dimasukkan angka, maka strtotime yang dimasukkan format tanggal, contoh:
	echo date ("l", strtotime("24 aug 1996"));
	echo "<br>";

	date_default_timezone_set ("Asia/jakarta");
echo "<br>";
echo "Tanggal dan Waktu sekarang : " . date ("l, d-M-Y H:i:s", strtotime("now"));
echo"<br>";
echo "Akhir februari 2030 : " . date("l, d-m-Y", strtotime("last day of february 2030") );
echo"<br>";
echo "Kamis Depan : " . date("l, d-m-Y", strtotime("next thursday") );
echo"<br>";
echo "Batas Deadline : ". date("l, d-m-Y H:i:s", strtotime(" 3 days 23:59") );
echo"<br>";
echo "24 jam terakhir : ". date("l, d-m-Y H:i:s", strtotime("- 24 hours") );

	//STRING
	//Fungtion yang berhubungan dengan string yang sering dipakai 
	//1. strlen() atau string lenght berfungsi untuk menghitung panjang dari sebuah string /lenght
	//2. strcmp() atau string compare berfungsi untuk membandingkan 2 buah string
	//3. explode() berfungsi untuk memecah sebuah string menjadi array misalnya nama file.ekstensi lalu dipecah file dan ekstensi
	//4. htmlspecialchars fungtion khusus untuk menjaga website kita dari hackers


	// UTILITY(Fungsi Bantu)
	//var_dump() berfungsi untukmencetak isi dari suatu variabel
	//isset() berfungsi untuk mengecek apakah sebuah variabel sudah pernah dibuat atau belum (nilainya sebuah boolean)
	//empty() berfungsi untuk mengecek apakah sebuah variabel kosong atau tidak
	//die() berfungsi untuk memberhentikan program, ketika pada baris ada die(maka  program akan berhenti)
	//sleep() berfungsi untuk memberhentikan sementara pada program

	?>