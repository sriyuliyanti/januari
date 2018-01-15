<?php
include('crudWali.php');
$update = $_POST['update'];
if($update 		== 'update'){
   $id_wali 	= $_POST['id_wali'];
   $nama_wali 	= $_POST['nama_wali'];
	
	
	// lakukan validasi disini
	$data_oke = "YA";
	$pesan = "Masih Ada Kesalahan\\n\\n";
	if (strlen(trim($id_wali)) == 0){
		$data_oke = "TIDAK";
		$pesan .="id wali Harus Diisi\\n";
	}
	if (strlen(trim($nama_wali))==0){
		$data_oke = "TIDAK";
		$pesan .= "nama wali Harus Diisi \\n";
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
	
	$hasil = ubahWali($id_wali, $nama_wali);
	header("Location: wali_tampil.php");

}
?>