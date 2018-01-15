<!doctype html>
<html>
    <head>
        <title>Daftar Hasil Perkiraan Studi</title>
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap.css"/>
    </head> 
    <body onload='window.print()'>
    </nav>
        <div class="container">

<div id='content' >
  <h2 align = 'center'>Daftar Hasil Perkiraan Studi</h2>
      
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
                              else {    $pred ='Lulus Terlambat';}

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

    </body>
</html>
