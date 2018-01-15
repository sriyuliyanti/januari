<?php
include_once 'header_wali.php';
?>
<div class="container">
  <h2 align = 'center'>Daftar Mahasiswa Bimbingan</h2>
<div id='content' >
  <h2 align = 'center'>Daftar Mahasiswa Bimbingan</h2>
           <table id="mahasiswa" class="table table-striped table-bordered" >
                <thead>
                    <tr>
                        <th width="7%">NOMOR</th>
                        <th width="10%">NIM</th>
                        <th width="20%">NAMA MAHASISWA</th>
                        <th width="10%">TAHUN MASUK</th>
                        <th width="15%">STATUS LULUS</th>
                        <th width="10%">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					$dosen = $_SESSION['username'];
					
                    //Data mentah yang ditampilkan ke tabel    
					require_once '../koneksi.php';
                    $conn = koneksi();                   
                    $sql ="select mahasiswa.* , wali.* from mahasiswa 
							inner join wali on mahasiswa.id_wali = wali.id_wali
							where mahasiswa.id_wali = '$dosen'";
                    
					$hasil = mysqli_query($conn, $sql);
					if(mysqli_num_rows($hasil) > 0){
					$no = 1;
						while ($r = mysqli_fetch_array($hasil)) {
                                     
                    ?>

                    <tr align='left'>
                        <td><?php echo  $no;?></td>
                        <td><?php echo  $r['nim']; ?></td>
      
                        <td><?php echo  $r['nama_mhs']; ?></td>
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
                        <td>
                            <a button type="button" class="btn btn-primary" href="nilai_permhs.php?nim=<?php echo  $r['nim']; ?>">Detail  </a>
                            
                            
                        </td>
                    </tr>
                    <?php
                    $no++;
                    }
					}
					else{ // if there is no matching rows do following
						echo "hasil tidak ada";
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
