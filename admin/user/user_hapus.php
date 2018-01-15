<?php
include_once('crudUser.php');
$id_user = $_GET['id_user'];
	$hasil = hapusUser($id_user);
		header("Location: user_tampil.php?hapus=".$hasil);
?>