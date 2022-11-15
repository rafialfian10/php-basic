<?php  
$angka1 = ["start", 1,2,3,4,5,6,7,8,9,10, "end"];
$angka2 = ["count()", 1,2,3,4,5,6, "auto"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Membuat kotak persegi dengan perulangan</title>
	<style>.kotak-persegi{
		height: 50px;
		width: 50px;
		background-color: aqua;
		text-align: center;
		line-height: 50px;
		margin: 3px;
		float: left;
		}
		.clear{ clear : both; }
	</style>
</head>

<body>

	<!-- FOR -->
	<?php for($i = 0; $i < 12; $i++) : ?> <!-- variabel dapat dideklarasikan dengan bebas, dan nilai 12 harus mengikuti jumlah dari array dan dimulai dari angka 0 karena index[] itu selalu diawali dari 0 -->
		<div class= "kotak-persegi"> <?php echo $angka1[$i]; ?> </div>
	<?php endfor; ?>

<div class="clear"></div>


	<?php for($i = 0; $i < count($angka2); $i++) : ?> <!-- count() berfungsi untuk menghitung jumlah elemen pada array secara otomatis  -->
		<div class= "kotak-persegi"> <?php echo $angka2[$i]; ?> </div>
	<?php endfor; ?>

	<div class="clear"></div>


	<!-- FOREACH -->
	<?php foreach ($angka1 as $ang1) : ?> <!-- Cara baca: untuk setiap elemen yang ada didalam array angka1. ketika dilakukan perulangan pada tiap-tiap elemen pada array-nya(angka1), maka harus kita simpan pada suatu variabel, baru akan ditampilkan. Oleh karena itu kita harus membuat variabel baru setelah "as". Nama variabel bebas -->
		<div class="kotak-persegi"> <?php echo $ang1; ?> </div> <!-- yang akan digunakan loopingnya berarti variabel baru $ang1, ditutup dengan ;(titik koma) -->
		<?php endforeach; ?>

</body>
</html>