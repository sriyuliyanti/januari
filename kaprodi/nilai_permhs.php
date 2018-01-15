<?php
include_once 'header_prodi.php';
?>
<div class="container" style="margin-top:40px">
<div id='content' >
  <br/>
  <h2 align = 'center'>Nilai Per Mahasiswa</h2><br/>

<?php
$nim = $_GET['nim'];

if(array_key_exists('hapus', $_GET))
$hapus = $_GET['hapus'];
else
$hapus = 1;

?>
<div class="container">

    <?php
    if($hapus ==0)
      echo "<span style ='color :red'>gagal hapus data nilai mahasiswa</span>";
    ?>
	<tbody>
                    <?php

                    //Data mentah yang ditampilkan ke tabel    
					require_once '../koneksi.php';
										
                    $conn = koneksi();                   
                    $sql  ="select mahasiswa.*, wali.nama_wali 
							from mahasiswa inner join wali 
								on wali.id_wali = mahasiswa.id_wali 
								where nim = '$nim'";
                    
					$h = mysqli_query($conn, $sql);
					             while ($r = mysqli_fetch_array($h)) {
                                     
                    ?>
				<table>
                    <tr align='left'>
						<th width="20%">NIM</th>
							<td width="20%"><?php echo  $r['nim']; ?></td></tr>
					<tr>
						<th width="20%">NAMA MAHASISWA</th>
							<td width="20%"><?php echo  $r['nama_mhs']; ?></td></tr>
					<tr>
						<th width="20%">DOSEN WALI</th>
							<td width="20%"><?php echo  $r['nama_wali']; ?></td></tr>
					<tr>
						<th width="20%">TAHUN ANGKATAN</th>
							<td width="20%"><?php echo  $r['th_masuk']; ?></td></tr>
                    <?php
                    }
                    ?>
				</table>
				<br/>
              <table id="mahasiswa" class="table table-striped table-bordered" >
				
				<thead>
				
                    <tr>	  <th width="10%">NOMOR</th>
						      
							  <th width="10%">SEMESTER</th>
							  <th width="10%">SKS</th>
							  <th width="10%">IPS</th>
				
                    </tr>
                </thead>
                <tbody>
                    <?php

                    //Data mentah yang ditampilkan ke tabel    
					require_once '../koneksi.php';
										
                    $conn = koneksi();                   
                    $sql  ="select * from nilai_semester where nim = '$nim' order by semester";
                    
					$hasil = mysqli_query($conn, $sql);
					if(mysqli_num_rows($hasil) > 0){
					$no = 1;
						while ($r = mysqli_fetch_array($hasil)) {
                                     
                    ?>

                    <tr align='left'>
                        <td><?php echo  $no;?></td>
                        
                        <td><?php echo  $r['semester']; ?></td>
                        <td><?php echo  $r['sks']; ?></td>
                        <td><?php echo  $r['ips']; ?></td>
                    </tr>
                    <?php
                    $no++;
                    }
                    ?>
                </tbody>
				<?php
					
					}else{ // if there is no matching rows do following
						echo "hasil tidak ada";
					}
					?>
            </table>  
        </div>
        
        <script src="../assets/js/jquery-1.11.0.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/datatables/jquery.dataTables.js"></script>
        <script src="../assets/datatables/dataTables.bootstrap.js"></script>
        
    </body>
</html>
