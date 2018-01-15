<?php
include_once "../koneksi.php";
session_start() ;

    $nim=$_POST["nim"];
    $hasil=$_POST['hasil'];
	$nilaik=$_POST['nilaik'];
    $koneksi=koneksi();
	$cek=mysqli_query($koneksi,"SELECT nim FROM PREDIKSI WHERE nim=".$nim." AND nilaik=".$nilaik."");
	if (mysqli_num_rows($cek)<>0){
		$simpan=mysqli_query($koneksi,"UPDATE PREDIKSI set hasil_prediksi='".$hasil."' WHERE nim=".$nim." AND nilaik=".$nilaik."");
	}
	else{
    	$simpan=mysqli_query($koneksi,"INSERT INTO PREDIKSI (nim, nilaik, hasil_prediksi) VALUES (".$nim.",'".$nilaik."','".$hasil."')");
	}
		if($simpan){
			echo "data berhasil disimpan";
			
			if ($_SESSION['level'] == 2) {
				header("Location: ../kaprodi/prediksi_hasil.php");
				}
			if ($_SESSION['level'] == 3) {
			header("Location: ../wali/prediksi_hasil.php");
				}
			if ($_SESSION['level'] == 4) {
			header("Location: ../mhs/prediksi_hasil.php");
				}
			
		}
		else{
			echo "<div class='alert alert-danger' role='alert'>GAGAL SIMPAN DATA</div>";
		}
?>