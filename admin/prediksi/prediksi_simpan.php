<?php
include_once "../../koneksi.php";

    $nim=$_POST["nim"];
    $hasil=$_POST['hasil'];
	$nilaik=$_POST['nilaik'];
    $koneksi=koneksi();
	$cek=mysqli_query($koneksi,"SELECT nim FROM PREDIKSI WHERE nim='".$nim."' AND nilaik=".$nilaik."");
	if (mysqli_num_rows($cek)<>0){
		$simpan=mysqli_query($koneksi,"UPDATE PREDIKSI set hasil='".$hasil."' WHERE nim='".$nim."' AND nilaik=".$nilaik."");
	}
	else{
    	$simpan=mysqli_query($koneksi,"INSERT INTO PREDIKSI (nim, nilaik, hasil) VALUES ('".$nim."','".$nilaik."','".$hasil."')");
	}
		if($simpan){
			echo "<div class='alert alert-success' role='alert'>DATA BERHASIL DISIMPAN</div>";
			
		}
		else{
			echo "<div class='alert alert-danger' role='alert'>GAGAL SIMPAN DATA</div>";
		}
?>