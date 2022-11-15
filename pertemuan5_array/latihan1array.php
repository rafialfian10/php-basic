<?php 
		//ARRAY
		//Sebuah variabel yang bisa memiliki banyak nilai. nilai pada array boleh memiliki tipe data yang berbeda contoh: [12345, "Tulisan", true]. Cara membuat  array ada 2 cara, yaitu:
		//1. Cara lama:
 $hari = array("Senin", "Selasa", "Rabu", "Kamis", "Jum'at");//setiap elemen pada array pasti memiliki index, dan pasti dimulai dari angka 0. Elemen array pertama diatas adalah index[0] dengan nilai valuenya adalah senin, index[1] valuenya selasa, dst

 		//2. Cara baru:
 $bulan = ["Januari", "Februari", "Maret", "April", "Mei"];

 		//Cara menampilkan array ada 2 yaitu dengan var_dump(); dan print_r();
var_dump($hari);
echo "<br><br>";

print_r($bulan);
echo "<br><br>";

		//Cara menampilkan 1 elemen pada array. dapat dengan echo.
echo $bulan[4];
echo "<br><br>";

		//Menambahkan elemen baru pada array yang telah dibuat
print_r($hari);//menampilkan array lama
echo "<br";
$hari[] = "Sabtu"; // menambahkan 2 elemen pada array lama
$hari[] = "Minggu";
echo "<br>";
echo "<br>";
print_r($hari);//menampilkan array yang baru

echo "<br>";
echo "<br>";
 ?>



