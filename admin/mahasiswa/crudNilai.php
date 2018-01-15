<?php
require_once '../../koneksi.php';
// jika berhasil, hasil array dr baris-baris data
// dan setiap baris data berupa array dari nama-nama field
// jika tidak ada, hasil berupa nilai null
function bacaNilai($sql){
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
  $data[$i]['id_nilai']   = $baris['id_nilai'];
  $data[$i]['nim']        = $baris['nim'];
  $data[$i]['semester']   = $baris['semester'];
  $data[$i]['sks']        = $baris['sks'];
  $data[$i]['ips']        = $baris['ips'];

  
  $i++;
}
mysqli_close($koneksi);
return $data;
}
// menambahkan data ke tabel wali
function tambahNilai($id_nilai, $nim, $semester, $ips){
$koneksi = koneksi();
$sql = "insert into nilai_semester values('$id_nilai', '$nim', '$semester','$sks', '$ips')";
$hasil = 0;
if(mysqli_query($koneksi, $sql))
$hasil = 1;
mysqli_close($koneksi);
return $hasil;
}


// menghapus 1 record berdasar field kunci nim
function hapusNilai($id_nilai){
$koneksi = koneksi();
$sql = "delete from nilai_semester where id_nilai='$id_nilai'";
if (!mysqli_query($koneksi, $sql)){
return 0;
  //die('Error: ' . mysqli_error($koneksi));
}
//$hasil = mysqli_affected_rows($koneksi);
mysqli_close($koneksi);
  return 1;
}


function cariNilai($id_nilai){
$koneksi = koneksi();
$sql="select * from nilai_semester where id_nilai ='$id_nilai'";
$hasil = mysqli_query($koneksi, $sql);
if(mysqli_num_rows($hasil)>0){
$baris=mysqli_fetch_assoc($hasil);
    $data['id_nilai']   = $baris['id_nilai'];
    $data['nim']        = $baris['nim'];
    $data['semester']   = $baris['semester'];
    $data['sks']        = $baris['sks'];
    $data['ips']        = $baris['ips'];
mysqli_close($koneksi);
  return $data;
}else{
  mysqli_close($koneksi);
  return null;
}
}

function ubahNilai($id_nilai, $nim, $semester, $sks, $ips ){
$koneksi = koneksi();
$sql = "UPDATE nilai_semester
      SET semester  ='$semester' , 
          sks       ='$sks', 
          ips       = '$ips'

      WHERE id_nilai='$id_nilai'";

 if (mysqli_query($koneksi, $sql)) {
    $hasil = true;
  } else {
    $hasil = "Error mengubah record: " . mysqli_error($koneksi);
  }
  mysqli_close($koneksi);
  return $hasil;
}

?>