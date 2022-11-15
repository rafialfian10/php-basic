<?php  

session_start();

if(!isset($_SESSION["login"])){ // jika $_SESSION login belum diset/dibuat dari halaman login, maka pindah paksa user ke login.php
 	header("Location: login.php");
	exit;
}

require 'functions.php';

$id = $_GET["id"];

if (delete($id) > 0){//cara baca: jika function bernilai +1 atau berhasil maka ada baris($id) yang terpengaruhi / hilang jika -1 maka baris tidak ada yang hilang
	echo "<script>
			alert('Data berhasil dihapus!');
			document.location.href = 'index.php';
		</script>";
} else {
	echo "<script>
			alert('Data gagal dihapus!');
			document.location.href = 'index.php';
		</script>";
}
?>