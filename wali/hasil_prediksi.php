<?php
include_once 'header_wali.php';
?>
<div class="container">
  <h2 align = 'center'>HASIL PREDIKSI MAHASISWA BIMBINGAN</h2>
<div id='content' >
  <h2 align = 'center'>HASIL PREDIKSI MAHASISWA BIMBINGAN</h2>
 <table id="wali" class="table table-striped table-bordered" >
                <thead>
                    <tr>
                        <th width="5%">NOMOR</th>
						<th width="10%">NIM</th>
                        <th width="10%">NAMA MAHASISWA</th>
                        <th width="10%">NILAI K</th>
						<th width="15%">HASIL PREDIKSI</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
					
					$dosen = $_SESSION['username'];
                    require_once '../koneksi.php';
                    $conn = koneksi();                   
                    $sql ="select mahasiswa.* , wali.* , prediksi.* from mahasiswa 
							inner join wali on mahasiswa.id_wali = wali.id_wali
							inner join prediksi on prediksi.nim = mahasiswa.nim
							where status LIKE '%BL' AND wali.id_wali = '$dosen'";
                    
					$hasil = mysqli_query($conn, $sql);
					$no = 1;
                    while ($r = mysqli_fetch_array($hasil)) {
                                     
                    ?>                 
                    
				<tr align='left'>
                        <td><?php echo  $no;?></td>
                        <td><?php echo  $r['nim']; ?></td>
                        <td><?php echo  $r['nama_mhs']; ?></td>
                        <td><?php echo  $r['nilaiK']; ?></td>
                        
                        <td><?php echo  $r['hasil_prediksi']; ?></td>
                        
                        
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