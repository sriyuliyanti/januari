<!doctype html>
<html>
    <head>
        <title>Daftar Hasil Prediksi</title>
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap.css"/>
    </head> 
    <body>
        <nav class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          
        </div>
        <p class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px;">
        <a class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px" href="../halaman_admin.php">KEMBALI</a>   

        </p>
      </div>
    </nav>

<div class="container" style="margin-top:40px">

  <div id='content' >
  <br/>
  <h2 align = 'center'>Data Testing</h2><br/>
 <table id="wali" class="table table-striped table-bordered" >
                <thead>
                    <tr>
                        <th width="5%">NOMOR</th>
						<th width="10%">NIM</th>
						<th width="15%">NAMA DOSEN WALI</th>
                        <th width="15%">NAMA MAHASISWA</th>
                        <th width="15%">TAHUN MASUK</th>
						<th width="15%">STATUS KELULUSAN</th>
                        <th width="5%">AKSI</th>
                 
                    </tr>
                </thead>
                <tbody>
                    <?php

                    require_once '../../koneksi.php';
                    $conn = koneksi();                   
                    $sql ="select mahasiswa.* , wali.* , nilai_semester.* from mahasiswa 
							inner join wali on mahasiswa.id_wali = wali.id_wali 
							inner join nilai_semester on mahasiswa.nim = nilai_semester.nim
							where status LIKE '%BL' group by mahasiswa.nim";
                    
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
                            <a button type="button" class="btn btn-primary" href="../mahasiswa/nilai_permhs.php?nim=<?php echo  $r['nim']; ?>">Detail  </a>
                            
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