<?php
//Pembuatan Tabel Cara 1 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Latihan 1 Cara 1</title>
	<style> .warnakolom1 {background-color: silver} </style>
	<style> .warnakolom2 {background-color: orange }</style>
</head>
<body>

<table border="1" cellpadding="30" cellspacing="3"> 
	<?php
		for($i = 1; $i <= 5; $i++){ // i adalah baris
			if ($i % 2 == 1) {
				echo "<tr class = warnakolom1>";
			}else { echo "<tr class= warnakolom2>";}
				for ($j = 1; $j <= 10; $j++){
					echo "<td>$i, $j";
					echo "</td>";
				}
			echo "</tr>";
		
		} 
	?>
</table>

</body>
</html>
<br><br><br>


<?php
//Pembuatan Tabel Cara 2 : Gaya Templating  
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Latihan 1 cara 2</title>
		<style> .warna-baris {background-color: red} </style>
</head>
<body>

	<table border="1" cellpadding="30" cellspacing="3">
		<?php
			for ($i = 1; $i <= 7; $i++) : ?>
				<?php if ($i % 2 == 1) : ?> <!-- jika nilai i modulus 2 sisa 1, maka angka/baris ganjil akan diberi warna -->
					<tr class="warna-baris">
				<?php else : ?> <tr> <!-- tapi jika selain ganjil atau genap maka tidak diberi warna -->		
				<?php endif; ?>
					
					<?php for ($j = 1; $j <= 10; $j++) : ?> 
						<td>
							<?php echo "$i, $j"; ?>
						</td>
					<?php endfor; ?>
				</tr>
			<?php endfor; ?> 
	</table>

</body>
</html>







<br>
<br>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Latihan 1 cara 2</title>
		<style> .warna-baris2 {background-color: aqua} </style>
</head>
<body>

	<table border="1" cellpadding="30" cellspacing="3">
		<?php
			for ($b = 1; $b <= 5; $b++) : ?>
				<?php if ($b % 2 == 1) : ?>
			<tr class="warna-baris2">
					<?php else : ?> <tr>
				<?php endif ; ?>  
				
					<?php for ($k = 1; $k <= 10; $k++) : ?> 
						<td>
							<?php echo "$b, $k"; ?>
						</td>
					<?php endfor; ?>
			</tr>
		<?php endfor; ?> 
	</table>

</body>
</html>