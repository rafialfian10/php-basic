<?php 

session_start();
$_SESSION = [];
session_unset();// untuk tindakan pencegahan, karena terdapat beberapa kasus session yang tidak hilang, dan $_SESSION diisi dengan array kosong

session_destroy();

 header("Location: login.php");
exit;

 ?>