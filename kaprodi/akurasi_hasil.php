 <?php
 include_once "../koneksi.php";
 include_once "../cekadmin.php";
 $koneksi=koneksi();
   $nim=$_GET["nim"];
   $datatesting1=mysqli_query($koneksi,"SELECT status FROM Mahasiswa WHERE nim=$nim ORDER BY nim;");
    $history=mysqli_fetch_assoc($datatesting1);


?>



    <!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Form Prediksi</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body>

    <div class="container-">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header"></h1>
          <div class="row justify-content-md-center">
<?php
               echo "
    <div class='col-md-6 col-md-offset-3 well'>
    <table class='table table-bordered'>
    <thead class='thead-light'>
      <tr>
        <th>NIM</th>
        <th>Nilai K</th>
        <th>Hasil</th>
        <th>History</th>
      </tr>
    </thead>
    <tbody>";
    
     $rangking3=mysqli_query($koneksi,"SELECT * FROM prediksi WHERE nim=$nim") or die(mysqli_errno($koneksi));
    $data=1;
    while($datarangking3=mysqli_fetch_assoc($rangking3)){
        echo "<tr>";
        echo "<td>".$datarangking3['nim']."</td>
            <td>".$datarangking3['nilaiK']."</td>
            <td>".$datarangking3['hasil']."</td>
            <td>".$datarangking3['history']."</td>";
        echo "</tr>";
        $data+=1;
    };
    echo " </tbody></table>
    </div>";

     echo "
    <div class='col-md-6 col-md-offset-3 well'>
    <table class='table table-bordered'>
    <thead class='thead-light'>
      <tr>
        <th>NIM</th>
        <th>History Lulus</th>
        <th>Akurasi (%)</th>
      </tr>
    </thead>
    <tbody>";
     $rangking1=mysqli_query($koneksi,"SELECT count(akurasi) nilai FROM prediksi WHERE akurasi=1") or die(mysqli_errno($koneksi));
     $rangking2=mysqli_query($koneksi,"SELECT count(akurasi) nilai FROM prediksi") or die(mysqli_errno($koneksi));

    $datarangking1=mysqli_fetch_assoc($rangking1);
    $datarangking2=mysqli_fetch_assoc($rangking2);
    if ($datarangking1['nilai']<>0 && $datarangking2['nilai']<>0){
    $hasil=($datarangking1['nilai']/$datarangking2['nilai'])*100;
        echo "<tr>";
        echo "<td>".$nim."</td>
            <td>".$history['status']."</td>
            <td>".round($hasil,2)."</td>";

        echo "</tr>";
    }
    else {
         echo "<tr>";
        echo "<td>".$nim."</td>
            <td>".$history['status']."</td>
            <td>0</td>";

        echo "</tr>";
    }

    echo " </tbody></table>
    </div>";
    mysqli_close($koneksi);
    ?>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <script src="../assets/js/jquery-1.12.3.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
 
  </body>

</html>
