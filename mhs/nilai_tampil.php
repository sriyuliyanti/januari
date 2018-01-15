<?php
include_once "header_mhs.php";
?>

<div class="container" style="margin-top:40px">
<h2 align = 'center'>DAFTAR NILAI</h2>
	<tbody>
                    <?php

                    //Data mentah yang ditampilkan ke tabel    
					require_once '../koneksi.php';
										
                    $conn = koneksi(); 
					$username = $_SESSION['username'];
                    $sql  ="select wali.*, mahasiswa.* , nilai_semester.*
							from wali inner join mahasiswa on wali.id_wali = mahasiswa.id_wali 
									  inner join nilai_semester on mahasiswa.nim = nilai_semester.nim
								where nilai_semester.nim = '$username'";
                    
					$h = mysqli_query($conn, $sql);
					 $r = mysqli_fetch_array($h) 
                                     
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
                    $sql  ="select * from nilai_semester where nim = '$username' order by semester";
                    
					$hasil = mysqli_query($conn, $sql);
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
            </table>  
        </div>
        
        