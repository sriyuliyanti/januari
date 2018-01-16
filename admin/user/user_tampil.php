<!doctype html>
<?php
include_once('../cekadmin.php');
?>
<html>
    <head>
        <title>Daftar User</title>
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap.css"/>
    </head> 
    <body>
        <nav class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#" style="color: white;" align="center"><b>Daftar User</b></a>
        </div>
        <p class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px;">
        <a class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px" href="../halaman_admin.php">Dasboard</a>   

        </p>
      </div>
    </nav>
        <div class="container">
            <table id="user" class="table table-striped table-bordered" >
                <thead>
                    <tr>
                        <th width="10%">NOMOR</th>
                        <th width="15%">ID USER</th>
						<th width="15%">NAMA USER</th>
                        <th width="15%">USERNAME</th>
                        <th width="15%">PASSWORD</th>
                        <th width="15%">LEVEL</th>
                        <th width="15%">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    //Data mentah yang ditampilkan ke tabel    
                    require_once '../../koneksi.php';
                    $conn = koneksi();                   
                    $sql ="select * from user order by id_user desc";
                    
					$hasil = mysqli_query($conn, $sql);
					$no = 1;
                    while ($r = mysqli_fetch_array($hasil)) {
					?>
                    <tr align='left'>
                        <td><?php echo  $no;?></td>
						<td><?php echo  $r['id_user']; ?></td>
						<td><?php echo  $r['nm_user']; ?></td>
                        <td><?php echo  $r['username']; ?></td>
                        <td><?php echo  $r['password']; ?></td>
                        <td><?php echo  $r['level']; ?></td>
                        <td>
                            <a button type="button" class="btn btn-primary" href="user_update.php?id_user=<?php echo  $r['id_user']; ?>">Update</a>  
                            <a button type="button" class="btn btn-danger" href="user_hapus.php?id_user=<?php echo  $r['id_user']  ; ?> " >Delete</a>
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
                $("#user").dataTable();
            });
        </script>
    </body>
</html>
