<!doctype html>
<html>
    <head>
        <title>Detail Dosen Wali</title>
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
        <a class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px" href="halaman_admin.php">Dasboard</a>   

        </p>
      </div>
    </nav>


<?php
$id_wali = $_GET['id_wali'];
echo $id_wali;
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
                    $sql  ="select * from wali where id_wali = '$id_wali'";
                    
					$h = mysqli_query($conn, $sql);
				        while ($r = mysqli_fetch_array($h)) {
                                     
                    ?>
				<table>
                    <tr align='left'>
						<th width="20%">NIP</th>
							<td width="20%"><?php echo  $r['id_wali']; ?></td></tr>
					<tr>
						<th width="20%">NAMA DOSEN </th>
							<td width="20%"><?php echo  $r['nama_wali']; ?></td></tr>
					
					
                    <?php
                    }
                    ?>
				</table>
				<br/>
              <table id="wali" class="table table-striped table-bordered" >
				<a button type="button" class="btn btn-info" href="user_tambah.php?id_wali=<?php echo  $id_wali; ?>" align='right'>Tambah User</a>
				<thead>
				
                    <tr> <th width="10%">NOMOR</th>    
					     <th width="10%">NIP DOSEN</th>
						 <th width="10%">NAMA DOSEN</th>
							  
                    </tr>
                </thead>
                <tbody>
                    <?php

                    //Data mentah yang ditampilkan ke tabel    
					require_once '../../koneksi.php';
										
                    $conn = koneksi();                   
                    $sql1  ="select * from USER where id_user = '$id_wali'";
                    
					$hasil = mysqli_query($conn, $sql1);
					if(mysqli_num_rows($hasil) > 0){
					$no = 1;
						while ($r = mysqli_fetch_array($hasil)) {
                                     
                    ?>

                    <tr align='left'>
                        <td><?php echo  $no;?></td>
                        
                        <td><?php echo  $r['id_user']; ?></td>
                        <td><?php echo  $r['nm_user']; ?></td>
                        <td><?php echo  $r['password']; ?></td>
                        
                        <td>                            
                            <a href="user_update.php?id_user=<?php echo $r['id_user']; ?>">UPDATE</a> 
                            
                        </td>
                    </tr>
                    <?php
                    $no++;
                    }
					}
					else{ // if there is no matching rows do following
						?>
						<td>                            
                            <a href="../user/user_tambah.php?id_user=<?php echo $id_wali; ?>">TAMBAHKAN</a> 
                            
                        </td>
					<?php
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
