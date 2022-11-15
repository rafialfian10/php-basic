<?php  
$players = [
	["photo"=>"images", "name"=>"Irvan", "backnumber"=>"18", "age"=>"25 years old", "position"=>"GK", "state"=>"Indonesia"],
	["photo"=>"images", "name"=>"Takhul", "backnumber"=>"1", "age"=>"26 years old", "position"=>"GK", "state"=>"Indonesia"],
	["photo"=>"images", "name"=>"Muhammad Ilham", "backnumber"=>"99", "age"=>"25 years old", "position"=>"GK", "state"=>"Indonesia"],
	["photo"=>"images", "name"=>"Rafi Alfian", "backnumber"=>"18", "age"=>"25 years old", "position"=>"DF", "state"=>"Indonesia"],
	["photo"=>"images", "name"=>"Ervin Alfianto", "backnumber"=>"5", "age"=>"26 years old", "position"=>"DF", "state"=>"Indonesia"],
	["photo"=>"images", "name"=>"Jauhari Misbah", "backnumber"=>"3", "age"=>"26 years old", "position"=>"DF", "state"=>"Indonesia"],
	["photo"=>"images", "name"=>"Mas'ud", "backnumber"=>"54", "age"=>"25 years old", "position"=>"DF", "state"=>"Indonesia"],
	["photo"=>"images", "name"=>"Ali Imron", "backnumber"=>"9", "age"=>"25 years old", "position"=>"MF", "state"=>"Indonesia"],
	["photo"=>"images", "name"=>"Dayu Prastowo Aji", "backnumber"=>"5", "age"=>"25 years old", "position"=>"MF", "state"=>"Indonesia"],
	["photo"=>"images", "name"=>"Feri Johan", "backnumber"=>"13", "age"=>"25 years old", "position"=>"MF", "state"=>"Indonesia"],
	["photo"=>"images", "name"=>"Chanief Nor Hidayat", "backnumber"=>"46", "age"=>"29 years old", "position"=>"FW", "state"=>"Indonesia"],
	["photo"=>"images", "name"=>"Mahadir As-Salam", "backnumber"=>"7", "age"=>"25 years old", "position"=>"FW", "state"=>"Indonesia"],
	["photo"=>"images", "name"=>"Saiful anwar", "backnumber"=>"21", "age"=>"28 years old", "position"=>"FW", "state"=>"Indonesia"],
	
];
?>




<!DOCTYPE html>
<html>
<head>
	<title>Daftar Pemain Cadangan FC</title>
	<style>
		.teks {
			text-align: center;
			background-color: orange;
			color: black;

		}
	</style>
</head>
<body>
	<h2>Selamat Datang, Rafi!</h2><!-- jika data yang dikirim dari halaman login.php menggunakan $_POST maka disini harus ditangkap dengan $_POST. Apabila dikirim dengan $_GET maka harus ditangkap dengan $GET. Pada halaman ini nama admin sesudah selamat datang akan otomatis diganti dengan data yang ditangkap dengan $_POST  -->
	<h1 class="teks">PEMAIN CADANGAN FC</h1>
	<ul>
		<?php foreach ($players as $player) : ?>
			<li> 
				<a href="detailplayers.php?photo=<?php echo $player["photo"];?>&name=<?php echo $player["name"];?>&backnumber=<?php echo $player["backnumber"];?>&age=<?php echo $player["age"];?>&position=<?php echo $player["position"];?>&state=<?php echo $player["state"]; ?> "><?php echo $player["name"]; ?> </a>
			</li>
		<?php endforeach; ?>
	</ul>
	<a href="login.php"><button>Logout</button></a>
</body>
</html>


