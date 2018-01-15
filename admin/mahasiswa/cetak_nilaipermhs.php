<!doctype html>
<html>
    <head>
        <title>Daftar Nilai Mahasiswa</title>
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap.css"/>
    </head> 
    <body onload='window.print()'>


<?php
$nim = $_GET['nim'];
?>
<div class="container">
    <tbody><?php
                    //Data mentah yang ditampilkan ke tabel    
					require_once '../../koneksi.php';									
                    $conn = koneksi();                   
                    $sql  ="select mahasiswa.*, wali.nama_wali 
							from mahasiswa inner join wali 
								on wali.id_wali = mahasiswa.id_wali 
								where nim = '$nim'";
                    
					$h = mysqli_query($conn, $sql);
                    while ($r = mysqli_fetch_array($h)) {
                    ?>
           
                <center><h2>Transkrip Nilai</h2></center>
                <br/><br/>
				<table>
                    <tr align='left'>
						<th width="10%">NIM</th>
							<td width="20%"><?php echo  $r['nim']; ?></td></tr>
					<tr>
						<th width="20%">NAMA MAHASISWA</th>
							<td width="20%"><?php echo  $r['nama_mhs']; ?></td></tr>
					<tr>
						<th width="20%">DOSEN WALI</th>
							<td width="20%"><?php echo  $r['nama_wali']; ?></td></tr>
					<tr>
						<th width="10%">TAHUN ANGKATAN</th>
							<td width="20%"><?php echo  $r['th_masuk']; ?></td></tr>
                    <?php
                    }
                    ?>
				</table>

                <br/>
              <table id="mahasiswa" class="table table-striped table-bordered" >
				<thead>
                    <tr><th width="10%">NOMOR</th>		      
						<th width="10%">SEMESTER</th>
						<th width="10%">SKS</th>
						<th width="10%">IPS</th>
                    </tr>
                </thead>
    
    <?php

                    //Data mentah yang ditampilkan ke tabel    
					require_once '../../koneksi.php';
										
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
                        </td>
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


            <?php
                $q1  ="select count(semester) nilai1 from nilai_semester where nim = '$nim'";
                $q2  ="select sum(sks) nilai2 from nilai_semester where nim = '$nim'";
                
                
                $h1 = mysqli_query($conn, $q1);
                $h2 = mysqli_query($conn, $q2);

                $r1 = mysqli_fetch_assoc($h1);
                $r2 = mysqli_fetch_assoc($h2);
                                     
            ?>
                <table>
                    <tr align='left'>
                        <th width="10%">TOTAL SEMESTER</th>
                            <td width="20%"><?php echo  $r1['nilai1']; ?></td></tr>
                    <tr>
                        <th width="20%">TOTAL SKS</th>
                            <td width="20%"><?php echo  $r2['nilai2']; ?></td></tr>
            </table> 
        </div>
  
    <tbody>    
        
        <script src="../../assets/js/jquery-1.11.0.js"></script>
        <script src="../../assets/js/bootstrap.min.js"></script>
        <script src="../../assets/datatables/jquery.dataTables.js"></script>
        <script src="../../assets/datatables/dataTables.bootstrap.js"></script>
        
    </body>
</html>
