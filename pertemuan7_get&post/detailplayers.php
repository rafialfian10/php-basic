<?php  
if (!isset($_GET["photo"]) || !isset($_GET["name"]) || !isset($_GET["backnumber"]) || !isset($_GET["age"]) || !isset($_GET["position"]) || !isset($_GET["state"]))
{
	header ("Location: dataplayers.php");	
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>List Detail Player Pemain Cadangan FC</title>
</head>
<body>
	<ul>
		<li><img src="foto/<?php echo $_GET["photo"]; ?> "></li>
		<li>Name : <?php echo $_GET["name"]; ?></li>
		<li>Back Number : <?php echo $_GET["backnumber"]; ?></li>
		<li>Age : <?php echo $_GET["age"]; ?></li>
		<li>Position : <?php echo $_GET["position"]; ?></li>
		<li>State : <?php echo $_GET["state"]; ?></li>
	</ul>
</body>
</html>
<a href="dataplayers.php">Kembali ke halaman sebelumnya</a>