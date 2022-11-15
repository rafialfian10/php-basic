
<?php
// PERTEMUAN 2 - PHP DASAR
	// Sintaks PHP

/*														Standar Output
  1. echo, print (untuk mencetak output dari string)
     contoh : echo "RAFI ALFIAN"; atau print "RAFI ALFIAN";
              echo 12345; (angka tidak perlu tanda kutip)
  2. print_r (khusus untuk mencetak output dari array, string juga bisa)
     contoh : print_r ("RAFI ALFIAN");
  3. var_dump (untuk melihat isi atau informasi dari variabel-variabel seperti tipe data, ukuran, dll)
     contoh : var_dump ("RAFI ALFIAN");
 */


 
/* 				Penulisan Sintaks PHP

	1. PHP didalam HTML, contoh pada baris ke 31
	2. HTML didalam PHP, contoh pada baris ke 33
	*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Saya sedang belajar PHP</title>
</head>
<body>
	<h1>Halo, selamat datang <?php echo "RAFI ALFIAN (PHP didalam HTML)"; ?> </h1>
	<?php
			echo "<h1>Halo, selamat datang RAFI ALFIAN (HTML didalam PHP)</h1>"
	?>
	<p> <?php print "Hari ini adalah pertemuan ke-2 latihan PHP dasar"; ?></p>
</body>
</html>


<?php 
/*												Variabel dan Tipe Data
	1. Variabel
	Didalam PHP variabel dilambangkan $. Contoh pada baris 45 penulisan variabel dan baris 53 sebagai pemanggil variabel. (penulisan variabel tidak boleh diawali angka, tapi boleh mengandung angka)  
*/
	$nama = "Rafi Alfian";
?>

<!DOCTYPE html>
<head>
	<title> Bab Variabel</title>
</head>
<body>
	<h2>Hallo, wellcome <?php echo $nama; ?></h2>
	<p> (Rafi Alfian diatas adalah nama variabel yang dipanggil dengan menggunakan "echo") </p>
	<h2> <?php echo "Konnichiwa, renshuu no PHP ni youkoso $nama"; ?></h2>
	<p> (Rafi Alfian diatas adalah nama variabel didalam string yang dipanggil dengan menggunakan "echo"). Pemanggilan variabel didalam string itu dapat dinamakan konsep interpolasi</p>
</body>
</html>	

<?php
	// 													Operator
	// 1. Aritmatika, contoh operatornya yaitu +, -, *, /, %(modulus atau sisa bagi)
	// $x = 10;
	// $y = 20;
	// $z = 50;
	// echo $x * $y / $z;
	// hasilnya adalah 4

	// 2.Penggabungan String / Concatention / Concat, contoh operatornya . (operatornya hanya . jika javascript operatornya +)
	// $nama_depan = "Rafi";
	// $nama_belakang = "Alfian";

	// echo $nama_depan . " " . $nama_belakang; 
	// " " berfungsi menambahkan spasi
	// hasilnya adalah Rafi Alfian

	// 3.Assigment (operator penugasan), contoh operatornya yaitu =, +=, -=, *=, /=, %=, .=

	// $x = 5;
	// $x = 10;
	// echo $x;
	// hasilnya adalah 10 (karena angka 5 ditimpa dengan angka 10 karena nama variabel sama)

	// $x = 5;
	// $x += 10;
	// echo $x;
	// hasilnya adalah 15

	// $x = 5;
	// $x -= 10;
	// echo $x;
	// hasilnya adalah -5

	// $nama = "Rafi";
	// $nama .= " ";
	// $nama .= "Alfian";
	// echo $nama;
	// hasilnya adalah Rafi Alfian

	// 4.Perbandingan, operatornya yaitu <, >, <=, >=, ==, != contoh:
	   // var_dump(10 != 5);
	   // hasilnya adalah bool(true)

	   // var_dump(10 < 5);
	   // hasilnya adalah bool(false)

	   // var_dump(10 == 10);
	   // hasilnya adalah bool(true)

	   // var_dump(10 == 5);
	   // hasilnya adalah bool(false)

 	   // var_dump(10 == "10");
	   // hasilnya adalah bool(true) karena operator perbandingan tidak mengecek tipe data tapi hanya mengecek nilainya saja

	// 5.Identitas, operatornya yaitu ===, !== (operator identitas untuk mengecek tipe data dan nilainya) contoh:
		// var_dump(10 === "10");
		//hasilnya adalah bool(false) meskipun nilainya sama tapi tipe datanya berbeda

	// 6.Logika, operatornya yaitu &&, ||(or), !(not) contoh:
		// $x = 30;
		// var_dump($x < 50 && $x % 2 == 0); 
		//hasilnya adalah bool(true)
		//(dibaca variabel x lebih kecil dari 50 dan variabel x modulus 2 atau dibagi 2 sama dengan 0 atau 30 dibagi 2 berarti sisa 0)
		//jika menggunakan operator &&(dan) maka semua kondisi harus bernilai benar, seperti contoh diatas, terdapat dua kondisi, jika satu kondisi benar dan satu kondisi lainnya salah, maka hasilnya adalah bool(false)
		

		// $x = 15;
		// var_dump($x < 50 && $x % 2 == 0); 
		//hasilnya adalah bool(false) karena 15 dibagi 2 masih sisa 1
		//(dibaca variabel x lebih kecil dari 50 dan variabel x modulus 2 atau dibagi 2 sama dengan 0 atau 15 dibagi 2 berarti sisa 1) 

		// $x = 30;
		// var_dump($x < 50 || $x % 2 === 0); 
		//hasilnya adalah bool(true)
		//(dibaca variabel x lebih kecil dari 50 dan variabel x modulus 2 atau dibagi 2 sama dengan 0 atau 30 dibagi 2 berarti sisa 0)
		//jika menggunakan operator ||(or) maka tidak semua kondisi harus bernilai benar, seperti contoh diatas, terdapat dua kondisi, jika satu kondisi benar dan satu kondisi lainnya salah, maka hasilnya adalah tetap bool(true)
		

?>




	

