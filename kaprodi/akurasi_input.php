<?php
include_once "../cekadmin.php";
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
           <div class="col-md-4 col-md-offset-4 well">
              <div id="simpan"></div>
              <center><h3 class="page-header">PERKIRAAN HASIL STUDI </h3></center>
              <div class="form-group">
                <label for="nim">Tahun Masuk  Akurasi</label>
                <select class="form-control" id="thnmsk" name="thnmsk">
                <?php
                    include_once "../koneksi.php";
                        $koneksi=koneksi();
                    $datatesting=mysqli_query($koneksi,"SELECT distinct th_masuk FROM Mahasiswa  WHERE status IN('LL','LT','LC') ORDER BY th_masuk DESC;");
                    while ($data=mysqli_fetch_assoc($datatesting))
                    echo "
                        <option value=".$data['th_masuk'].">".$data['th_masuk']."</option>
                    ";

                ?>
               </select>
              </div>
              <div id="mhs"></div>
              
              <div class="form-group">
                <label for="sel1">Nilai K:</label>
                <select class="form-control" id="sel1" name="nilaik">
                  <option value="5">5</option>
                  <option value="15">15</option>
                  <option value="20">20</option>
                  <option value="25">25</option>
                  <option value="40">40</option>
                </select>
              </div>
                
                <center><button id="hitung" type="button" class="btn btn-primary">HITUNG</button></center>
            </div>
            <!--munculkan hasil -->
            <div id="hasil">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <script src="../assets/js/jquery-1.12.3.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function () {
          $("#hitung").click(function () {
            var nim = $('select[name=nim]').val();
            var nilaik = $('select[name=nilaik]').val();
            var status = $('input[name=history]').val();
            $.ajax({
              type: "POST",
              url: "akurasi_proses.php",
              data: 'nim=' + nim + '&nilaik=' + nilaik+'&history='+status,
              success: function (respons) {
                $('#hasil').html(respons);
              }
            });
          });

           $("#thnmsk").change(function () {
            var thnmsk = $('select[name=thnmsk]').val();
            $.ajax({
              type: "POST",
              url: "akurasi_mhs.php",
              data: 'thnmsk='+thnmsk,
              success: function (respons) {
                $('#mhs').html(respons);
              }
            });
          });
        
      });
       
    </script>
  </body>

</html>
