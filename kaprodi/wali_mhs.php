<?php
include_once 'header_prodi.php';
?>
<?php
if(array_key_exists('hapus', $_GET))
$hapus = $_GET['hapus'];
else
$hapus = 1;
$id_wali = $_GET['id_wali'];

?>

<div class="container" style="margin-top:40px">
<div id='content' >
  <h2 align = 'center'>Daftar Mahasiswa bimbingan</h2>
  <?php
    if($hapus ==0)
      echo "<span style ='color :red'>gagal hapus data hotel</span>";
      
  ?>

              

              <table id="mahasiswa" class="table table-striped table-bordered" >
                <thead>
                    <tr>
                        <th width="10%">NOMOR</th>
                        <th width="15%">NIM</th>
                        <th width="15%">NAMA MAHASISWA</th>
						<th width="15%">DOSEN</th>
                        <th width="10%">TAHUN MASUK</th>
                        <th width="15%">STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    //Data mentah yang ditampilkan ke tabel    
					require_once '../koneksi.php';
                    $conn = koneksi();                   
                    $sql ="select mahasiswa.*, wali.nama_wali from mahasiswa inner join wali
							on mahasiswa.id_wali = wali.id_wali 
							where wali.id_wali = '$id_wali' ORDER BY mahasiswa.th_masuk DESC,mahasiswa.nama_mhs asc";
                    
					$hasil = mysqli_query($conn, $sql);
					$no = 1;
                    while ($r = mysqli_fetch_array($hasil)) {
                                     
                    ?>

                    <tr align='left'>
                        <td><?php echo  $no;?></td>
                        <td><?php echo  $r['nim']; ?></td>
                        <td><?php echo  $r['nama_mhs']; ?></td>
						<td><?php echo  $r['nama_wali']; ?></td>
                        <td><?php echo  $r['th_masuk']; ?></td>
                         <?php if($r['status'] == 'LC') {
									$status = 'Lulus Cepat'; }
									else if ($r['status'] == 'LT' ){
									$status = 'Lulus Tepat waktu'; }
										else if ($r['status'] == 'LL' ){
										$status = 'Lulus Terlambat'; }
										else {
										$status ='Belum Lulus';
										}
									?>
                        <td><?php echo  $status; ?></td>
                    </tr>
                    <?php
                    $no++;
                    }
                    ?>
                </tbody>
            </table>  
        </div>
        
        <script src="../assets/js/jquery-1.11.0.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/datatables/jquery.dataTables.js"></script>
        <script src="../assets/datatables/dataTables.bootstrap.js"></script>
        <script type="text/javascript">
            $(function() {
                $("#mahasiswa").dataTable();
            });
        </script>
    </body>
</html>
