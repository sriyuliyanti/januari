<!doctype html>
<html>
    <head>
        <title>Daftar Nilai</title>
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap.css"/>
    </head> 
    <body>
        <nav class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#" style="color: white;" align="center"><b>Daftar Nilai</b></a>
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
  <?php
    if($hapus ==0)
      echo "<span style ='color :red'>gagal hapus data hotel</span>";
      
  ?>
              <table id="nilai" class="table table-striped table-bordered" >
                <thead>
                    <tr>
                        <th width="10%">NOMOR</th>
                        
                        <th width="15%">NIM</th>
                        <th width="15%">SEMESTER</th>
                        <th width="15%">SKS</th>
                        <th width="15%">IPS</th>
                        <th width="15%">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    //Data mentah yang ditampilkan ke tabel    
          require_once '../../koneksi.php';
                    $conn = koneksi();                   
                    $sql ="select * from nilai_semester order by id_nilai desc";
                    
          $hasil = mysqli_query($conn, $sql);
          $no = 1;
                    while ($r = mysqli_fetch_array($hasil)) {
                                     
                    ?>

                    <tr align='left'>
                        <td><?php echo  $no;?></td>
                        
                        <td><?php echo  $r['nim']; ?></td>
                        <td><?php echo  $r['semester']; ?></td>
                        <td><?php echo  $r['sks']; ?></td>
                        <td><?php echo  $r['ips']; ?></td>
                        <td>
                         <a button type="button" class="btn btn-primary" value="update" href="nilai_update.php?id_nilai=<?php echo  $r['id_nilai']; ?>">Update</a> 
                          <a button type="button" class="btn btn-danger" href="nilai_hapus.php?id_nilai=<?php echo  $r['id_nilai']; ?>" >Delete</a>
                        </td>
                    </tr>
                    <?php
                    $no++;
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
                $("#nilai").dataTable();
            });
        </script>
    </body>
</html>
