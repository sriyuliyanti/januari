<?php
include('crudNilai.php');
$id_nilai 	= $_POST['id_nilai'];
$nim 		= $_POST['nim'];
$semester 	= $_POST['semester'];
$sks 		= $_POST['sks'];
$ips 		= $_POST['ips'];


$hasil = tambahNilai($id_nilai, $nim, $semester, $sks, $ips);
if($hasil > 0)
	header("Location: nilai_permhs.php?nim=$nim");
else {
	echo 'gagal tambah data';
}
?>