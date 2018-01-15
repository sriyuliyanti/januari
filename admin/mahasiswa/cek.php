<?php
include_once "../../cekadmin.php";
if(array_key_exists('hapus', $_GET))
$hapus = $_GET['hapus'];
else
$hapus = 1;

include('crudMahasiswa.php');
$sql="select mahasiswa.* , wali.* 
          from mahasiswa inner join wali on mahasiswa.id_wali = wali.id_wali";
$data = bacaMahasiswa($sql);
?>

<div id='content' >
  <h2 align = 'center'>Daftar User</h2>
  <?php
    if($hapus ==0)
      echo "<span style ='color :red'>gagal hapus data hotel</span>";
      
  ?>
  <table border="1" align ='center'>
    <tr>
      <th>NIM</th>
      <th>DOSEN WALI </th>
      <th>NAMA</th>
      <th>TAHUN MASUK</th>
      <th>STATUS </th>
      <th colspan='2'>Proses</th>
    </tr>
    
    <?php
    foreach($data as $mhs){
    $nim          = $mhs['nim'];
    $id_wali      = $mhs['id_wali'];
    $nama_wali    = $mhs['nama_wali'];
    $nama_mhs     = $mhs['nama_mhs'];
    $th_masuk     = $mhs['th_masuk'];
    $status       = $mhs['status'];
    
    echo "
        <tr>
          <td>$nim</td>
          <td>$nama_wali</td>
          <td>$nama_mhs</td>
          <td>$th_masuk</td>
          <td>$status</td>
          
          <td><a href='nilai_tambah.php?nim=$nim' class='upnilai'>update nilai</a></td>
      <td><a href='mhs_update.php?nim=$nim' class='update'>update</a></td>
          <td><a href='mhs_hapus.php?nim=$nim' class='hapus' onClick='return confirm(\"Yakin Akan Menghapus $nama_mhs ? \")'>Hapus</a></td>
          
        </tr>
    ";
    }
    ?>
  </table>
</div>