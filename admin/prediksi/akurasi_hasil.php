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
                <div class="navbar-header">
                    <a class="navbar-brand" href="#" style="color: white;" align="center"><b>AKURASI </b></a>
                </div>
                <p class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px;">
                    <a class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px" href="../halaman_admin.php">Dasboard</a>
                </p>
            </div>
        </nav>
        <div class="container">


<?php
 include_once "../../koneksi.php";
 $conn=koneksi();
   $nim=$_GET["nim"];
   $datatesting1=mysqli_query($conn,"SELECT status FROM Mahasiswa WHERE nim=$nim ORDER BY nim;");
    $history=mysqli_fetch_assoc($datatesting1);


echo "
    <a button type='button' class='btn btn-info' href='akurasi_input.php' align='right'>Tambah </a>
    <h5><b>HASIL PENGUJIAN</b><h5/>
    <table class='table table-striped table-bordered' >
    <thead>
      <tr>
        <th>NIM</th>
        <th>Nilai K</th>
        <th>Hasil</th>
        <th>History</th>
    
      </tr>
    </thead>
    <tbody>";
    
    $rangking3=mysqli_query($conn,"SELECT * FROM prediksi WHERE nim=$nim") or die(mysqli_errno($conn));
    $data=1;
    while($datarangking3=mysqli_fetch_assoc($rangking3)){
        echo "<tr>";
        echo "<td>".$datarangking3['nim']."</td>
            <td>".$datarangking3['nilaiK']."</td>
            <td>".$datarangking3['hasil_prediksi']."</td>
            <td>".$history['status']."</td>";
        echo "</tr>";
        $data+=1;
    };
    

    echo " </tbody></table>";
    
    ?>
    <!--
    <h5><b>AKURASI PENGUJIAN</b><h5/>
    <table class="table table-striped table-bordered" >
                <thead>
                    <tr>
                        <th width="15%">TOTAL PENGUJIAN</th>
                        <th width="15%">DATA COCOK</th>
                        <th width="15%">DATA TIDAK COCOK</th>
                        <th width="10%">NILAI K</th>
                        <th width="15%">AKURASI (%)</th>
                        
                    </tr>
                </thead>
                <tbody>
            
            <?php
            /*
                    $k      =mysqli_query($conn,"SELECT nilaik from prediksi WHERE nim = '$nim'") or die(mysqli_errno($conn));
                    $nil=mysqli_fetch_assoc($k);
                    $nilaik = $nil['nilaik'];
                
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
                        <td><?php echo  $datarangking1['nilai']; ?></td>
                        <td><?php echo  $nilaik ?></td>
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

                    
            if($datarangking3['hasil_prediksi'] == "LC") {$hasil_prediksi = "Lulus Cepat"; }
                else if ($datarangking3['hasil_prediksi'] == "LT" ){$hasil_prediksi = "Lulus Tepat waktu"; }
                else { $hasil_prediksi= "Lulus Terlambat"; }
                                        
            <td>".$hasil_prediksi."</td>
                if($history['status']=='LT'){$s = 'lulus tepat';}
                    else if($history['status']=='LC'){$s = 'lulus CEPAT';}
                    else {$s='lulus terlambat';}

            <td>".$s."</td>";

            */
                    ?>
                </tbody>
            </table>




          
    </div>
-->
    <!-- /.container -->

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
