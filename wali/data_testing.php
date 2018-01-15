<?php
include_once 'header_wali.php';
?>
<div class="container" style="margin-top:40px">
  <h2 align = 'center'>Data Testing</h2>

 <table id="wali" class="table table-striped table-bordered" >
                <thead>
                    <tr>
                        <th width="5%">NOMOR</th>
						<th width="10%">NIM</th>
						<th width="15%">NAMA DOSEN WALI</th>
                        <th width="15%">NAMA MAHASISWA</th>
                        <th width="15%">TAHUN MASUK</th>
						<th width="15%">STATUS KELULUSAN</th>
                        <th width="15%">AKSI</th>
                 
                    </tr>
                </thead>
                <tbody>
                    <?php
					
					$dosen = $_SESSION['username'];
                    require_once '../koneksi.php';
                    $conn = koneksi();                   
                    $sql ="select mahasiswa.* , wali.* , nilai_semester.* from mahasiswa 
							inner join wali on mahasiswa.id_wali = wali.id_wali 
							inner join nilai_semester on mahasiswa.nim = nilai_semester.nim
							where status LIKE '%BL' AND wali.id_wali = '$dosen' group by mahasiswa.nim ";
                    
					$hasil = mysqli_query($conn, $sql);
					$no = 1;
                    while ($r = mysqli_fetch_array($hasil)) {
                                     
                    ?>                 
                    
				<tr align='left'>
                        <td><?php echo  $no;?></td>
                        <td><?php echo  $r['nim']; ?></td>
                        <td><?php echo  $r['nama_wali']; ?></td>
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
                            <a button type="button" class="btn btn-warning" href="prediksi_input.php?nim=<?php echo  $r['nim']; ?>">Prediksi</a>  
                            
                        </td>
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
                $("#wali").dataTable();
            });
        </script>
    </body>
</html>