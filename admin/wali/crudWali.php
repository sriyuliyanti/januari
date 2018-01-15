<?php
require_once '../../koneksi.php';

// jika berhasil, hasil array dr baris-baris data
// dan setiap baris data berupa array dari nama-nama field
// jika tidak ada, hasil berupa nilai null

function bacaWali($sql){
  $data = array();
  $koneksi = koneksi();
  $hasil = mysqli_query($koneksi, $sql);
  // jika tidak ada record, hasil berupa null
  if (mysqli_num_rows($hasil) == 0) {
	mysqli_close($koneksi);
	return null;  
  }
  $i=0;
  while($baris = mysqli_fetch_assoc($hasil)){
	$data[$i]['id_wali']   = $baris['id_wali'];
	$data[$i]['nama_wali'] = $baris['nama_wali'];
	
	$i++;
  }
  mysqli_close($koneksi);
  return $data;
}


// menambahkan data ke tabel wali

function tambahWali($id_wali, $nama_wali){
  $koneksi = koneksi();
  $sql = "insert into wali values('$id_wali', '$nama_wali')";
  $hasil = 0;
  if(mysqli_query($koneksi, $sql))
    $hasil = 1;
  mysqli_close($koneksi);
  return $hasil;
}


// menghapus 1 record berdasar field kunci nim
function hapusWali($id_wali){
  $koneksi = koneksi();
  $sql = "delete from wali where id_wali='$id_wali'";
  if (!mysqli_query($koneksi, $sql)){ 
    return 0;
	//die('Error: ' . mysqli_error($koneksi));
  }
  //$hasil = mysqli_affected_rows($koneksi);
  mysqli_close($koneksi);
  return 1; 	
}

function cariWali($id_wali){
  $koneksi = koneksi();
 $sql="select * from wali where id_wali ='$id_wali'";

  $hasil = mysqli_query($koneksi, $sql);
  if(mysqli_num_rows($hasil)>0){
   $baris=mysqli_fetch_assoc($hasil);
		$data['id_wali']= $baris['id_wali'];
		$data['nama_wali']= $baris['nama_wali'];

       mysqli_close($koneksi);
	  return $data;
  }else{
	  mysqli_close($koneksi);
	  return null;
  }
}

function ubahWali($id_wali, $nama_wali){
  $koneksi = koneksi();
  $sql = "UPDATE wali
			SET nama_wali ='$nama_wali'	WHERE id_wali='$id_wali'";

  if (mysqli_query($koneksi, $sql)) {
    $hasil = true;
  } else {
    $hasil = "Error mengubah record: " . mysqli_error($koneksi);
  }
  mysqli_close($koneksi);
  return $hasil;
}

?>