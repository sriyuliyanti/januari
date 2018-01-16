<?php
include('../../koneksi.php');
$conn = koneksi();
	$nim 		= $_POST['nim'];
	$id_nilai 	= $_POST['id_nilai'];
	$semester 	= $_POST['semester'];
	$sks	 	= $_POST['sks'];
	$ips		= $_POST['ips'];
	
		// lakukan validasi disini
	$data_oke = "YA";
	$pesan = "Masih Ada Kesalahan\\n\\n";
	if (strlen(trim($id_nilai)) == 0){
		$data_oke = "TIDAK";
		$pesan .="id nilai Harus Diisi\\n";
	}
	if (strlen(trim($semester))==0){
		$data_oke = "TIDAK";
		$pesan .= "semester Harus Diisi \\n";
	}
		if (strlen(trim($sks))==0){
		$data_oke = "TIDAK";
		$pesan .= "sks Harus Diisi \\n";
	}
		if (strlen(trim($ips))==0){
		$data_oke = "TIDAK";
		$pesan .= "ips Harus Diisi \\n";
	}
	
	
	// dicek apakah data yang diisikan OKE atau TIDAK
	if ($data_oke == "TIDAK") {
		// berarti ada kesalahan
		echo "<script>
			alert('$pesan');
			self.history.back();
			</script>";
		exit;	// program berhenti
	}

$hasil =mysqli_query($conn, "UPDATE nilai_semester
		  SET semester  ='$semester' , 
          sks       ='$sks', 
          ips       = '$ips'
		  WHERE id_nilai='$id_nilai'");
		  
if($hasil > 0) {
	echo "<div class='alert alert-success' role='alert'>BERHSIL UPDATE DATA</div>";
	header("Location: nilai_permhs.php?nim=$nim");
	}
else {echo 'gagal update data Nilai Mahasiswa' . mysqli_error($conn); }



?>