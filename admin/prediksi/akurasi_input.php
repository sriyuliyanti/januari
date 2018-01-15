<!doctype html>
<html>
  <head>
    <title>AKURASI TAMBAH</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap.css"/>
  </head>
  <body>
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#" style="color: white;" align="center"><b>Form Input Data Pengujian Akurasi</b></a>
        </div>
        <p class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px;">
          <a class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px" href="../halaman_admin.php">Dasboard</a>
        </p>
      </div>
    </nav>
    <div class="container">
      <form class="form-horizontal">
        
        <div id="simpan"></div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="th_masuk">Tahun Masuk  Akurasi</label>
          <div class="col-sm-6">
            <select class="form-control" id="thnmsk" name="thnmsk">
              <?php
              include_once "../../koneksi.php";
              $koneksi=koneksi();
              $datatesting=mysqli_query($koneksi,"SELECT distinct th_masuk FROM Mahasiswa  WHERE status IN('LL','LT','LC') ORDER BY th_masuk asc;");
              while ($data=mysqli_fetch_assoc($datatesting))
              echo "
              <option value=".$data['th_masuk'].">".$data['th_masuk']."</option>
              ";
              ?>
            </select>
          </div>
        </div>
        <div id="mhs"></div> <!--munculkan HASIL QUERY TAHUN -->
        
        <div class="form-group">
          <label for="sel1" class="control-label col-sm-3">Nilai K:</label>
          <div class="col-sm-6">
            <select class="form-control" id="sel1" name="nilaik">
              <option value="5"></option>
              <option value="10">10</option>
              <option value="15">15</option>
              <option value="17">17</option>
              <option value="20">20</option>
              <option value="25">25</option>
              <option value="30">30</option>
              <option value="33">33</option>
              <option value="35">35</option>
              <option value="40">40</option>


              
            </select>
          </div>
        </div>
        <center><button id="hitung" type="button" class="btn btn-primary">HITUNG</button></center>
      </div>
      
      <!--munculkan hasil -->
      <div id="hasil"></div>
      
      
      <!-- /.container -->
      <!-- Bootstrap core JavaScript -->
      <script src="../../assets/js/jquery-1.12.3.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function () {
    
    $("#hitung").click(function () {
    var nim = $('select[name=nim]').val();
    var nilaik = $('select[name=nilaik]').val();
    var status = $('input[name=history]').val();
    if (nim=='' || nim==null){
    $('#simpan').html('Pilih Tahun Masuk');
    }
    else{
    
    $.ajax({
    type: "POST",
    url: "akurasi_proses.php",
    data: 'nim=' + nim + '&nilaik=' + nilaik+'&history='+status,
    success: function (respons) {
    $('#hasil').html(respons);
    }
    });
    }
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