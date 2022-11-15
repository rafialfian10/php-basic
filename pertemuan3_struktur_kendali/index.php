<?php  
//Control Flow / Struktur Kendali. Alur pembacaan program. normalnya pembacaan program dibaca dari atas ke bawah, kiri ke kanan, tapi dengan menggunakan control flow kita dapat mengatur sendiri alur pembacaan program
	// 1.Pengulangan, contoh: for, while, do.. while, foreach(pengulangan khusus array)
	// 2.Pengkodisian, contoh: if.. else, if.. else if.. else, ternary(untuk menggantikan sintaks if dan else yang sederhana), switch

// FOR (artinya cek dulu kondisinya, selama bernilai true, baru jalankan outputnya)
for($i = 0; $i < 5; $i++)
{
	echo "Hello World! (FOR++)<br><br> ";
}

for($i = 10; $i > 5; $i--)
{
	echo "Hello World! (FOR--)<br><br> ";
}
// kurung kurawal berfungsi untuk menandai bagian mana yang akan dilakukan pengulangan
//for terdapat 3 kondisi. pertama inisialisasi untuk menentukan variabel awal pengulangan. Kedua kondisi terminasi, untuk memberhentikan pengulangan. Ketiga, increment/decrement untuk pengulangan bisa maju atau mundur

//WHILE (artinya cek dulu kondisinya, selama bernilai true, baru jalankan outputnya)
$i = 0; //jika while nilai awal boleh diluar while
while ($i < 5)
{
	echo "Hello World! (WHILE) <br><br>"; 
	$i++; // jika while, increment/decrement diakhir while
}

//DO.. WHILE (artinya lakukan hal ini selama kondisinya bernilai true)
$i = 0;
do {
	echo "Hello World! (DO.. WHILE++) <br><br>"; //ketika kondisinya bernilai false maka outputnya akan dijalankan dahulu satu kali karena do akan mengecek dahulu sebelum while (kesimpulannya do.. while minimal dikerjakan satu kali jika bernilai false sedangkan while tidak akan dikerjakan jika bernilai false )
	$i++; 
}while($i < 5);


$x = 10;
do {
	echo "Hello World (DO.. WHILE--) <br><br>";
	$x++;
}while($x < 5); //hasilnya Hello World! akan dieksekusi satu kali karena bernilai false
?>



<?php
//IF ELSE & IF ELSE IF ELSE
$i = 10;
if($i < 10) { // mengecek apakah konsinya bernilai true atau false
	echo "Benar";
}elseif ($i == 10){ //else if digunakan untuk menyisipkan kondisi baru diantara dua kondisi (true dan false)
	echo "Bingo";
}
else{ //jika bernilai selain true maka akan menjalankan baris 50
	echo "Salah";
}
?>
