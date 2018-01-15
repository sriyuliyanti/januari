<?php
include_once('crudMahasiswa.php');
$nim = $_GET['nim'];
	$hasil = hapusMahasiswa($nim);
		header("Location: mhs_tampil.php?hapus=".$hasil);
?>