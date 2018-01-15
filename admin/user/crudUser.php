<?php
require_once '../../koneksi.php';

// jika berhasil, hasil array dr baris-baris data
// dan setiap baris data berupa array dari nama-nama field
// jika tidak ada, hasil berupa nilai null

function bacaUser($sql){
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
	$data[$i]['id_user']= $baris['id_user'];
	$data[$i]['nm_user']= $baris['nm_user'];
	$data[$i]['username'] = $baris['username'];
	$data[$i]['password'] = $baris['password'];
	$data[$i]['level'] = $baris['level'];


	$i++;
  }
  mysqli_close($koneksi);
  return $data;
}


// menambahkan data ke tabel user

function tambahUser($id_user, $nm_user, $username, $password, $level){
  $koneksi = koneksi();
  $sql = "insert into user values('$id_user', '$nm_user', '$username', '$password', '$level')";
  $hasil = 0;
  if(mysqli_query($koneksi, $sql))
    $hasil = 1;
  mysqli_close($koneksi);
  return $hasil;
}


// menghapus 1 record berdasar field kunci nim
function hapusUser($id_user){
  $koneksi = koneksi();
  $sql = "delete from user where id_user='$id_user'";
  if (!mysqli_query($koneksi, $sql)){ 
    return 0;
	//die('Error: ' . mysqli_error($koneksi));
  }
  //$hasil = mysqli_affected_rows($koneksi);
  mysqli_close($koneksi);
  return 1; 	
}

// mencari data berdasar id user
// jika ada, hasil array dengan indeks berupa nama field
// jika tidak ada hasil berupa nilai null

function cariUser($id_user){
  $koneksi = koneksi();
  $sql = "select * from user where id_user='$id_user'";
  $hasil = mysqli_query($koneksi, $sql);
  if(mysqli_num_rows($hasil)>0){
    $baris=mysqli_fetch_assoc($hasil);
  
  $data['id_user']= $baris['id_user'];
  $data['nm_user']= $baris['nm_user'];
	$data['username'] = $baris['username'];
	$data['password'] = $baris['password'];
	$data['level'] = $baris['level'];
   
	mysqli_close($koneksi);
	  return $data;
	}else {
  mysqli_close($koneksi);
    return null;
  }		
  
} 


// mengubah (update) record berdasar id user
// dimasukkan dalam parameter fungsi
function ubahUser($id_user, $nm_user, $username, $password, $level){
  $koneksi = koneksi();
  $sql = "UPDATE user
			SET nm_user = '$nm_user',
			username ='$username',
			password = '$password' , 
			level = '$level'
			WHERE id_user='$id_user'";

   
if (mysqli_query($koneksi, $sql)) {
$hasil = true;
} else {
$hasil = "Error mengubah record: " . mysqli_error($koneksi);
}
mysqli_close($koneksi);
return $hasil;
}

?>