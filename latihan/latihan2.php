<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<h3>Selamat datang <?php echo "Rafi Alfian (PHP didalam HTML)";  ?></h3>
	<?php echo "<h3>Rafi Alfian (HTML didalam PHP)</h3>"; ?>

	<p>Hari ini kita belajar tentang PHP <?php echo "tanggal 3 April 2022"; ?></p>
</body>
</html>


<?php  
//Operator
//Aritmatika +, -, *, /, %

// $x = 10;
// $y = 20;
// $z = 30;
// echo $x + $z / $y;

//Penggabungan String .

// $nama_depan = "Rafi";
// $nama_belakang = "Alfian";
// $nama_tengah = "Bin";
// echo $nama_depan . " " . $nama_tengah . " " . $nama_belakang;


//Assighment (operator penugasan) =, +=, -=, *=, /=, %=, .=
// $nama = "Rafi";
// $nama .= " ";
// $nama .= "Bin";
// $nama .= " ";
// $nama .= "Alfian";
// echo $nama;

// Perbandingan <, >, <=, >=, !=, ==
// $x = 50;
// var_dump($x >= 100);


//Identitas ===, !==
// var_dump(100 !== "100");
// echo "<br>";
// var_dump(100 === "100");

//Logika &&, ||, !
// $x = 10;
// var_dump($x < 100 && $x % 3 === 1);
?>

<?php  
//for
// for ($i = 10; $i > 5; $i--){
// 	echo "<br>selamat datang rafi alfian";
// }

//While
// $i = 1;
// while($i <= 10){
// 	echo "<br>selamat datang rafi alfian";
// 	$i++;
// }

//do.. while
// $i = 0;
// do {echo "<br>Selamat datang rafi alfian";
// 	$i++;}
// while ($i < 10);
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>TABEL</title>
	<style> .warna-baris1 {background-color: silver} </style>
	<style> .warna-baris2 {background-color: aqua; } </style>
</head>
<body>
	<h2>latihan membuat dan memberi warna pada tabel</h2>
<table border="1" cellpadding="20" cellspacing="1">
	<?php  
		for ($b = 1; $b <= 10 ; $b++) {
			if ($b % 2 == 0){
			echo "<tr class= warna-baris1>";}
			else{
					echo "<tr class= warna-baris2>";
				}
				for ($k = 1; $k <= 5; $k++){
					echo "<td class = warna-baris2> $b, $k</td>";
				}
			echo "</tr>";
		}
	?>
	
</table>
</body>
</html>


<?php  
echo "<br><br>";
echo date ("l, d M Y");


echo "<br><br>";
echo date ("l, d M Y", time()+ 60 * 60 * 24 * 100);

echo "<br><br>";
echo date ("l,", mktime(0,0,0,8,24,1996));

echo "<br><br>";
echo date ("l", strtotime("24 aug 1996"));
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style> .warnabaris1 {background-color: pink </style>
	<style> .warnabaris2 {background-color: orange </style>
</head>
<body>
	<table border="1", cellpadding="20", cellspacing="1">
		<?php   for ($b =1; $b <=7; $b++) : ?>
			<?php if($b % 2 == 1) : ?>
				<?php echo "<tr class= warnabaris1>" ?>
			<?php endif; ?>
				<?php for ($k = 1; $k <= 10; $k++) : ?>
					<?php if ($k % 2 == 0) : ?>
							<?php  echo " <td class =warnabaris2></td>"  ?>
							<?php else : ?> <td>
					<?php endif; ?>
				<?php endfor; ?>
			</tr>
		<?php endfor; ?>
	</table>
</body>
</html>



