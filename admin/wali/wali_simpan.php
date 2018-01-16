<?php
include('../../koneksi.php');
$conn = koneksi();

$id_wali 	= $_POST['id_wali'];
$nama_wali 	= $_POST['nama_wali'];

//$id_user 	= $_POST['id_user'];
$nm_user 	= $_POST['nm_user'];
$username 	= $_POST['username'];
$password 	= $_POST['password'];
$ulangpassword 	= $_POST['ulangpassword'];

$proses 	= $_POST['simpan'];
// lakukan validasi disini
	$data_oke = "YA";
	$pesan = "Masih Ada Kesalahan\\n\\n";

	if (strlen(trim($id_wali))==0){
		$data_oke = "TIDAK";
		$pesan .="id wali Harus Diisi\\n";
	}
	if (strlen(trim($nama_wali))==0){
		$data_oke = "TIDAK";
		$pesan .= "nama wali Harus Diisi \\n";
	}

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
		$pesan .= "Username Harus Diisi \\n";
	}
	
	if( $password != $ulangpassword ){ 
		$data_oke = "TIDAK";
		$pesan .= "password tidak sama \\n";
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
if ($proses == "simpan"){
$sql1 = "insert into wali values('$id_wali', '$nama_wali')";
$sql2 = "insert into user(nm_user, username, password, level) values('$nm_user', '$username', '$password', 3)";
}

$hasil1 = mysqli_query($conn, $sql1);
if ($hasil1 > 0){
echo 'data Dosen berhasil disimpan';
	header("Location: wali_tampil.php");
}
else {
echo "Gagal Simpan, Silahkan Diulangi !<br/>".mysqli_error($conn);
echo "<input type=\"button\" value=\"Kembali\" onClick=\"self.history.back()\">";
exit;
}

$hasil2 = mysqli_query($conn, $sql2);
if ($hasil2 > 0){
echo 'data User Dosen berhasil disimpan';
	//header("Location: wali_tampil.php");
}
else {
echo "Gagal Simpan, Silahkan Diulangi !<br/>".mysqli_error($conn);
echo "<input type=\"button\" value=\"Kembali\" onClick=\"self.history.back()\">";
exit;
}

?>