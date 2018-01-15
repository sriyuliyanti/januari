<!doctype html>
<html>
    <head>
        <title>AKURASI</title>
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap.css"/>
    </head>
    <body>
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="container-fluid">
                <p class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px;">
                    <a class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px" href="../halaman_admin.php">Dasboard</a>
                </p>
            </div>
        </nav>
        <div class="container">
        <center><h3><b> AKURASI  HASIL PENGUJIAN </b></h3></center>            
            <!-- Awal Form search-->
            <br/><form name="form" action="#" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="nilaik">Nilai Kedekatan:</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="nilaik" name="nilaik">
                        <option >--Select--</option>
                          <?php
                          include_once "../../koneksi.php";
                          $koneksi=koneksi();
                          $nilaik=mysqli_query($koneksi,"SELECT distinct nilaiK FROM prediksi ORDER BY nilaiK asc;");
                          while ($data=mysqli_fetch_assoc($nilaik))
                          echo "

                          <option value=".$data['nilaiK'].">".$data['nilaiK']."</option>
                          ";
                          ?>
                        </select>
                        <br/>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">TAMPIL</button>
            </form>
            <!-- Akhir Form search-->
            <?php
            if(array_key_exists('nilaik',$_POST)){
            $nilaik = $_POST['nilaik'];
            if(array_key_exists('hapus', $_GET))
            $hapus = $_GET['hapus'];
            else
            $hapus = 1;
            ?>
            <?php
            if($hapus ==0)
            echo "<span style ='color :red'>gagal hapus data</span>";
            
            ?>
            <br/>
            <table id="" class="table table-striped table-bordered" >
                <thead>
                    <tr>
                        <th width="15%">TOTAL PENGUJIAN</th>
                        <th width="10%">NILAI K</th>
                        <th width="15%">DATA COCOK</th>
                        <th width="15%">DATA TIDAK COCOK</th>
                        <th width="15%">AKURASI (%)</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //Data mentah yang ditampilkan ke tabel
                    require_once '../../koneksi.php';
                    $conn = koneksi();
                    
                    $rangking2  =mysqli_query($conn,"SELECT COUNT(id_prediksi) nilai
                                                    FROM mahasiswa
                                                    inner join prediksi on mahasiswa.nim = prediksi.nim
                                                    where
                                                    mahasiswa.status <> 'BL' and nilaik= $nilaik") or die(mysqli_errno($conn));
                    
                    $rangking1  =mysqli_query($conn,"SELECT count(id_prediksi) nilai
                                                    FROM mahasiswa
                                                    inner join prediksi on mahasiswa.nim = prediksi.nim 
                                                    AND mahasiswa.status = prediksi.hasil_prediksi
                                                    where mahasiswa.status <> 'BL'  AND nilaik = '$nilaik'") or die(mysqli_errno($conn));
                    
                    $error      =mysqli_query($conn,"SELECT count(id_prediksi) nilai
                                                    FROM mahasiswa
                                                    inner join prediksi on mahasiswa.nim = prediksi.nim
                                                    AND mahasiswa.status <> prediksi.hasil_prediksi
                                                    where mahasiswa.status <> 'BL'  AND nilaik = '$nilaik'") or die(mysqli_errno($conn));
                    
                    $datarangking1=mysqli_fetch_assoc($rangking1);
                    $datarangking2=mysqli_fetch_assoc($rangking2);
                    $stderror=mysqli_fetch_assoc($error);
                    
                    if ($datarangking1['nilai']<>0 && $datarangking2['nilai']<>0){
                    $hasil=($datarangking1['nilai']/$datarangking2['nilai'])*100;
                    $salah=($stderror['nilai']/$datarangking2['nilai'])*100;
                    
                    ?>
                    <tr align='left'>
                        <td><?php echo  $datarangking2['nilai']; ?></td>
                        <td><?php echo  $nilaik ?></td>
                        <td><?php echo  $datarangking1['nilai']; ?></td>
                        <td><?php echo  $stderror['nilai']; ?></td>
                        <td><?php echo  round($hasil,2); ?></td>
                    </tr>
                    <?php
                    }
                    else {
                    echo "<tr>";
                        echo "<td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>";
                    echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            
            <h3> DAFTAR  HASIL PENGUJIAN </h3>
            <table id="" class="table table-striped table-bordered" >
                <thead>
                    <tr>
                        <th width="5%">NOMOR</th>
                        <th width="10%">NIM</th>
                        <th width="25%">NAMA</th>
                        <th width="10%">NILAI K</th>
                        <th width="10%">HASIL PREDIKSI</th>
                        <th width="10%">HISTORY</th>
                        <th width="10%">AKURASI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //Data mentah yang ditampilkan ke tabel
                    
                    $dtuji  =mysqli_query($conn,"SELECT *
                                        FROM mahasiswa
                                        inner join prediksi on mahasiswa.nim = prediksi.nim
                                        where
                                        mahasiswa.status <> 'BL' and nilaik= '$nilaik' 
                                        ORDER BY prediksi.nim ASC") or die(mysqli_errno($conn));
                    
                    $no = 1;
                    while ($r= mysqli_fetch_array($dtuji)) {
                    
                    ?>
                    <tr align='left'>
                        <td><?php echo  $no;?></td>                        
                        <td><?php echo  $r['nim']; ?></td>
                        <td><?php echo  $r['nama_mhs']; ?></td>
                        <td><?php echo  $nilaik; ?></td>
                        <?php

                         if($r['status'] == 'LC') {$status = 'Lulus Cepat'; }
                            else if ($r['status'] == 'LT' ){$status = 'Lulus Tepat waktu'; }
                            else{$status = 'Lulus Terlambat'; }
                            
                         

                         if($r['hasil_prediksi'] == 'LC') {$hasil_prediksi = 'Lulus Cepat'; }
                            else if ($r['hasil_prediksi'] == 'LT' ){$hasil_prediksi = 'Lulus Tepat waktu'; }
                            else {$hasil_prediksi = 'Lulus Terlambat'; }
                        

                        if($status == $hasil_prediksi){ $akurat = 'Cocok';}
                         else {$akurat = 'Tidak Cocok';}

                         ?>
                                                    
                        <td><?php echo $hasil_prediksi  ;?></td>
                        <td><?php echo  $status; ?></td>
                        <td><?php echo  $akurat; ?></td>                        
                                                  
                    </tr>
                    <?php
                    $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
        }
        ?>
        
        <script src="../../assets/js/jquery-1.11.0.js"></script>
        <script src="../../assets/js/bootstrap.min.js"></script>
        <script src="../../assets/datatables/jquery.dataTables.js"></script>
        <script src="../../assets/datatables/dataTables.bootstrap.js"></script>
        <script type="text/javascript">
        $(function() {
        $("#prediksi").dataTable();
        });
        </script>
    </body>
</html>