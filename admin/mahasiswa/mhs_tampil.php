<!doctype html>
<html>
    <head>
        <title>Daftar Mahasiswa</title>
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap.css"/>
    </head> 
    <body>
        <nav class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#" style="color: white;" align="center"><b>Daftar Mahasiswa</b></a>
        </div>
        <p class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px;">
        <a class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px" href="../halaman_admin.php">Dasboard</a>   

        </p>
      </div>
    </nav>
        <div class="container">
<?php
if(array_key_exists('hapus', $_GET))
$hapus = $_GET['hapus'];
else
$hapus = 1;

?>

<div id='content' >
  <h2 align = 'center'>Daftar Mahasiswa</h2>
  <?php
    if($hapus ==0)
      echo "<span style ='color :red'>gagal hapus data hotel</span>";
      
  ?>
              <table id="mahasiswa" class="table table-striped table-bordered" >
                <thead>
                    <tr>
                        <th width="10%">NOMOR</th>
                        <th width="15%">NIM</th>
                        <th width="15%">NAMA DOSEN</th>
                        <th width="15%">NAMA MAHASISWA</th>
                        <th width="15%">TAHUN MASUK</th>
                        <th width="5%">STATUS</th>
                        <th width="20%">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    //Data mentah yang ditampilkan ke tabel    
					require_once '../../koneksi.php';
                    $conn = koneksi();                   
                    $sql ="select mahasiswa.* , wali.* from mahasiswa inner join wali on mahasiswa.id_wali = wali.id_wali";
                    
					$hasil = mysqli_query($conn, $sql);
					if(mysqli_num_rows($hasil) > 0){
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
                            <a button type="button" class="btn btn-warning" href="mhs_update.php?nim=<?php echo  $r['nim']; ?>">Update</a>  
                            <a button type="button" class="btn btn-danger" href="mhs_hapus.php?nim=<?php echo  $r['nim']; ?>" >Delete</a>
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
        
        <script src="../../assets/js/jquery-1.11.0.js"></script>
        <script src="../../assets/js/bootstrap.min.js"></script>
        <script src="../../assets/datatables/jquery.dataTables.js"></script>
        <script src="../../assets/datatables/dataTables.bootstrap.js"></script>
        <script type="text/javascript">
            $(function() {
                $("#mahasiswa").dataTable();
            });
        </script>
    </body>
</html>
