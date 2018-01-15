<?php
include_once('../../koneksi.php');
$conn = koneksi();
		$nim 		= $_POST['nim'];
		$id_wali 	= $_POST['id_wali'];
		$nama_mhs 	= $_POST['nama_mhs'];
		$th 		=  substr($nim,0,2);
		$th_masuk	= "20" . $th;
		$status		= $_POST['status'];
	
$hasil = mysqli_query($conn, "UPDATE mahasiswa SET id_wali = '$id_wali' ,
						nama_mhs ='$nama_mhs',
						th_masuk = '$th_masuk',
						status   = '$status'
						WHERE nim = '$nim'"  );
if($hasil > 0) {
	echo "<div class='alert alert-success' role='alert'>BERHSIL UPDATE DATA</div>";
	header("Location: mhs_tampil.php");
	}
else {echo 'gagal update data Mahasiswa' . mysqli_error($conn); }

?>