<?php
include_once('crudWali.php');
$id_wali = $_GET['id_wali'];
	$hasil = hapusWali($id_wali);
		header("Location: wali_tampil.php?hapus=".$hasil);
?>