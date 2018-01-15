<?php
include('../../koneksi.php');
$conn = koneksi();

$id_user 	= $_POST['id_user'];
$nm_user 	= $_POST['nm_user'];
$username 	= $_POST['username'];
$password 	= $_POST['password'];
$ulangpassword 	= $_POST['ulangpassword'];
$level 		= $_POST['level'];


// lakukan validasi disini
	$data_oke = "YA";
	$pesan = "Masih Ada Kesalahan\\n\\n";
	
	$cekuser = mysqli_query($conn, "SELECT * FROM user where username = '$username'");
	$a= mysqli_fetch_assoc($cekuser);
		$uname = $a['username'];

		if($username == $uname){
		$data_oke = "TIDAK";
		$pesan .="DATA USER SUDAH ADA\\n";
	}

	if($level == '2'){
		$cekwali = mysqli_query($conn, "SELECT * FROM user where level = '$level'");
		$b= mysqli_fetch_assoc($cekprodi);
		if($b['level'] == 0){
			
		$data_oke = "TIDAK";
		$pesan .="DATA KAPRODI SUDAH ADA\\n";
	}}
	
	
	if($level == '3'){
		$cekwali = mysqli_query($conn, "SELECT * FROM WALI where id_wali = '$username'");
		$c= mysqli_fetch_assoc($cekwali);
		if($c['id_wali'] <> $username){
			
		$data_oke = "TIDAK";
		$pesan .="GUNAKAN ID DOSEN  SEBAGAI USERNAMEE\\n";
	}}
	
	if($level == '4'){
		$cekmhs = mysqli_query($conn, "SELECT * FROM MAHASISWA where nim = '$username'");
		$d= mysqli_fetch_assoc($cekmhs);
		
		if($d['nim'] <> $username){	
		$data_oke = "TIDAK";
		$pesan .="GUNAKAN NIM  SEBAGAI USERNAME\\n";
	}}

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
$hasil = mysqli_query($conn, "INSERT INTO user(nm_user, username,password,level) values ('$nm_user', '$username', '$password', '$level')");
if($hasil > 0) {
	echo "<div class='alert alert-danger' role='alert'>BERHSIL SIMPAN DATA</div>";
	header("Location: user_tampil.php");
	}
else {
	echo 'gagal tambah data user' . mysqli_error($conn);
}
?>