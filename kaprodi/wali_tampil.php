<?php
include_once 'header_prodi.php';
?>
<div class="container" style="margin-top:40px">
<div id='content' >
  <br/>
  <h2 align = 'center'>Daftar Dosen Wali</h2><br/>

<?php
if(array_key_exists('hapus', $_GET))
$hapus = $_GET['hapus'];
else
$hapus = 1;
?>

 <table id="wali" class="table table-striped table-bordered" >
                <thead>
                    <tr>
                        <th width="10%">NOMOR</th>
                        <th width="15%">ID WALI</th>
                        <th width="15%">NAMA WALI</th>
                        <th width="15%">AKSI</th>
                 
                    </tr>
                </thead>
                <tbody>
                    <?php

                    //Data mentah yang ditampilkan ke tabel    
                    require_once '../koneksi.php';
                    
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
                          <a button type="button" class="btn btn-primary" href="wali_mhs.php?id_wali=<?php echo  $r['id_wali']; ?>">Mhs Bimbingan</a> 
                          
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