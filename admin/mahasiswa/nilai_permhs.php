<!doctype html>
<html>
    <head>
        <title>Daftar Nilai Mahasiswa</title>
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap.css"/>
    </head> 
    <body>
        <nav class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#" style="color: white;" align="center"><b>Daftar Nilai per Mahasiswa</b></a>
        </div>
        <p class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px;">
        <a class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px" onload='history.back()'>Kembali</a>   
        <a class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px" href="mhs_tampil.php">Dasboard</a>   


        </p>
      </div>
    </nav>


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
					require_once '../../koneksi.php';
										
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
				<a button type="button" class="btn btn-info" href="nilai_tambah.php?nim=<?php echo  $nim; ?>" align='right'>Tambah Nilai</a>
				<thead>
				
                    <tr>	  <th width="10%">NOMOR</th>
						      
							  <th width="10%">SEMESTER</th>
							  <th width="10%">SKS</th>
							  <th width="10%">IPS</th>
							  <th width="15%">AKSI</th>
                    </tr>
                </thead>
                <tbody>
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
                        
                        <td>  
							
                            <a button type="button" class="btn btn-warning" href="nilai_update.php?id_nilai=<?php echo $r['id_nilai']; ?>">Update</a> 
                            <a button type="button" class="btn btn-danger" href="nilai_hapus.php?id_nilai=<?php echo  $r['id_nilai']; ?>" >Delete</a>
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
           <center> <a button type="button" class="btn btn-primary" href="cetak_nilaipermhs.php?nim=<?php echo $nim ?>" target="blank" >Cetak</a></center>
        </div>
        
        <script src="../../assets/js/jquery-1.11.0.js"></script>
        <script src="../../assets/js/bootstrap.min.js"></script>
        <script src="../../assets/datatables/jquery.dataTables.js"></script>
        <script src="../../assets/datatables/dataTables.bootstrap.js"></script>
        
    </body>
</html>
