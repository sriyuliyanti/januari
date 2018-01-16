<?php
include_once('../cekadmin.php');
?>

<!doctype html>
<html>
    <head>
        <title>Daftar Wali</title>
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap.css"/>
    </head> 
    <body>
        <nav class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#" style="color: white;" align="center"><b>Daftar Wali</b></a>
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

 <table id="wali" class="table table-striped table-bordered" >
                <thead>
                    <tr>
                        <th width="5%">NOMOR</th>
                        <th width="10%">NIP DOSEN WALI</th>
                        <th width="15%">NAMA DOSEN WALI</th>
                        <th width="5%">AKSI</th>
                 
                    </tr>
                </thead>
                <tbody>
                    <?php

                    //Data mentah yang ditampilkan ke tabel    
                    require_once '../../koneksi.php';
                    include('crudWali.php');
                              $conn = koneksi();                   
                              $sql ="select * from wali order by id_wali desc";
                              
                    $hasil = mysqli_query($conn, $sql);
                    $no = 1;
                              while ($r = mysqli_fetch_array($hasil)) {
                                     
                    ?>

                    <tr align='left'>
                        <td><?php echo  $no;?></td>
                        <td><?php echo  $r['id_wali']; ?></td>
                        <td><?php echo  $r['nama_wali']; ?></td>
                        <td>
                          <a button type="button" class="btn btn-primary" href="wali_update.php?id_wali=<?php echo  $r['id_wali']; ?>">Update</a> 
                          <a button type="button" class="btn btn-danger" href="wali_hapus.php?id_wali=<?php echo  $r['id_wali']; ?>" >Delete</a>
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
                $("#wali").dataTable();
            });
        </script>
    </body>
</html>