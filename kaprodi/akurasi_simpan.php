<?php
include_once "../koneksi.php";
include_once "../cekadmin.php";
    $nim=$_POST["nim"];
    $hasil=$_POST['hasil'];
    $nilaik=$_POST['nilaik'];
    $history=$_POST['history'];
    $koneksi=koneksi();
    $akurasi=0;
    if ($hasil==$history){
        $akurasi=1;
    }
	$cek=mysqli_query($koneksi,"SELECT nim FROM prediksi WHERE nim='".$nim."' AND nilaik=".$nilaik."");
	if (mysqli_num_rows($cek)<>0){
		$simpan=mysqli_query($koneksi,"UPDATE prediksi set hasil='".$hasil."' WHERE nim='".$nim."' AND nilaik=".$nilaik."");
	}
	else{
    	$simpan=mysqli_query($koneksi,"INSERT INTO prediksi (nim, nilaik,hasil,history,akurasi) VALUES ('".$nim."',".$nilaik.",'".$hasil."','".$history."',$akurasi)");
	}
echo mysqli_error($koneksi);
		if($simpan){
			echo "berhasil";
			
		}
		else{
			echo "<div class='alert alert-danger' role='alert'>GAGAL SIMPAN DATA</div>";
		}
?>