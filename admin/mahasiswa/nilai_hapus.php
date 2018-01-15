<?php
include_once('crudNilai.php');
$id_nilai = $_GET['id_nilai'];
	$hasil = hapusNilai($id_nilai);
		header("Location: nilai_tampil.php?hapus=".$hasil);
?>