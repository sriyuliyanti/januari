<?php
include('crudUser.php');
$update = $_POST['update'];
if($update == 'update'){
	$id_user 	= $_POST['id_user'];
	$nm_user 	= $_POST['nm_user'];
	$username 	= $_POST['username'];
	$password 	= $_POST['password'];
	$ulangpassword 	= $_POST['ulangpassword'];
	$level 		= $_POST['level'];
	
	echo $id_user;
	// lakukan validasi disini
	$data_oke = "YA";
	$pesan = "Masih Ada Kesalahan\\n\\n";
	if (strlen(trim($username)) == 0){
		$data_oke = "TIDAK";
		$pesan .="username Harus Diisi\\n";
	}
	if (strlen(trim($nm_user)) == 0){
		$data_oke = "TIDAK";
		$pesan .="nama user Harus Diisi\\n";
	}
	if (strlen(trim($password))==0){
		$data_oke = "TIDAK";
		$pesan .= "password Harus Diisi \\n";
	}
	if (strlen(trim($ulangpassword))==0){
		$data_oke = "TIDAK";
		$pesan .= "ulangi password \\n";
	}
		if (strlen(trim($ulangpassword))==0){
		$data_oke = "TIDAK";
		$pesan .= "password Harus Diisi \\n";
	}
	if (strlen(trim($level))==0){
		$data_oke = "TIDAK";
		$pesan .= "level Harus Diisi \\n";
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

$hasil = ubahUser($id_user, $nm_user, $username, $password, $level);
header("Location: user_tampil.php");

}
?>