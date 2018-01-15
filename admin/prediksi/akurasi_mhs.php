<div class="form-group">
    <label class="control-label col-sm-3" for="nim">Data Testing Akurasi</label>
 <div class="col-sm-6">
    <select class="form-control" id="nim" name="nim">
<?php
include_once "../../koneksi.php";
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
</div>
    