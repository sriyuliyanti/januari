<div class="form-group">
    <label for="nim">Data Testing Akurasi</label>
    <select class="form-control" id="nim" name="nim">
<?php
include_once "../koneksi.php";
include_once "../cekadmin.php";
    $koneksi=koneksi();
     $thnmsk=$_POST['thnmsk'];
$datatesting=mysqli_query($koneksi,"SELECT nim,nama_mhs,status FROM Mahasiswa WHERE th_masuk=$thnmsk ORDER BY nim;");

while ($data=mysqli_fetch_assoc($datatesting)){
echo "
    <option value='".$data['nim']."'>".$data['nim']." - ".$data['nama_mhs']." | ".$data['status']."</option>

";

}
?>    
    </select>
</div> 
    