<?php 

session_start();
$SESSION = [];
session_unset();
session_destroy();


setcookie('id', '', time()-3600);
setcookie('username', '', time()-3600);

echo "<script>
		alert('Anda yakin?');
		document.location.href = 'login.php';
	</script>";



?>