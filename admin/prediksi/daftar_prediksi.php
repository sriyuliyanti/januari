<!doctype html>
<html>
    <head>
        <title>Daftar Hasil Perkiraan Studi</title>
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap.css"/>
    </head> 
    <body>
        <nav class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid">
        
        <p class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px;">
        <a class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px" href="../halaman_admin.php">KEMBALI</a>   

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
  <h2 align = 'center'>Daftar Hasil Perkiraan Studi</h2>
  <?php
    if($hapus ==0)
      echo "<span style ='color :red'>gagal hapus data </span>";
      
  ?>
              <table id="mahasiswa" class="table table-striped table-bordered" >
                <thead>
                    <tr>
                        <th width="10%">NOMOR</th>
                        <th width="10%">NIM</th>
                        <th width="10%">NILAI K</th>
                        <th width="15%">STATUS LULUS</th>
                        <th width="15%">HASIL PREDIKSI</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php

                    //Data mentah yang ditampilkan ke tabel    
					require_once '../../koneksi.php';
                    $conn = koneksi();                   
                    $sql ="SELECT * FROM prediksi p inner join mahasiswa m on  p.nim = m.nim where status = 'BL'";
                    
					$hasil = mysqli_query($conn, $sql);
					if(mysqli_num_rows($hasil) > 0){
					$no = 1;
						while ($r = mysqli_fetch_array($hasil)) {
                                     
                    ?>

                    <tr align='left'>
                        <td><?php echo  $no;?></td>
                        <td><?php echo  $r['nim']; ?></td>
                        <td><?php echo  $r['nilaiK']; ?></td>
                                              
                        <?php if($r['hasil_prediksi'] == 'LC') {$pred = 'Lulus Cepat'; }
							  else if ($r['hasil_prediksi'] == 'LT' ){$pred = 'Lulus Tepat waktu'; }
							  else {	$pred ='Lulus Terlambat';}

                              if($r['status'] == 'LC') {
                                    $status = 'Lulus Cepat'; }
                                    else if ($r['status'] == 'LT' ){
                                    $status = 'Lulus Tepat waktu'; }
                                        else {
                                        $status ='Belum Lulus';
                                        }
									?>
                        <td><?php echo  $status; ?></td>
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
  

<center><a button type="button" class="btn btn-primary" href="cetak_prediksi.php" >Cetak</a></center>

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
