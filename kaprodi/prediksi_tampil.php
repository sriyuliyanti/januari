<?php
include_once 'header_prodi.php';
?>
<div class="container" style="margin-top:40px">

<div id='content' >
  <h2 align = 'center'>Daftar Hasil Perkiraan Studi</h2>
              <table id="mahasiswa" class="table table-striped table-bordered" >
                <thead>
                    <tr>
                        <th width="10%">NOMOR</th>
                        <th width="15%">NIM</th>
                        <th width="15%">NAMA MAHASISWA</th>
                        <th width="15%">HASIL PREDIKSI</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php

                    //Data mentah yang ditampilkan ke tabel    
					require_once '../koneksi.php';
                    $conn = koneksi();                   
                    $sql ="SELECT * FROM prediksi inner join mahasiswa on mahasiswa.nim = prediksi.nim
                    WHERE mahasiswa.status ='BL' ";
                    
					$hasil = mysqli_query($conn, $sql);
					if(mysqli_num_rows($hasil) > 0){
					$no = 1;
						while ($r = mysqli_fetch_array($hasil)) {
                                     
                    ?>

                    <tr align='left'>
                        <td><?php echo  $no;?></td>
                        <td><?php echo  $r['nim']; ?></td>
                        <td><?php echo  $r['nama_mhs']; ?></td>
                                              
                        <?php if($r['hasil_prediksi'] == 'LC') {
									$pred = 'Lulus Cepat'; }
									else if ($r['hasil_prediksi'] == 'LT' ){
									$pred = 'Lulus Tepat waktu'; }
										else {
										$pred ='Belum Terlambat';
										}
									?>
                        <td><?php echo  $pred; ?></td>
                        
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
