<!doctype html>
<html>
    <head>
        <title> Tambah Data Nilai Mahasiswa</title>
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap.css"/>
    </head> 
    <body>
        <nav class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#" style="color: white;" align="center"><b> Tambah Data Nilai Mahasiswa</b></a>
        </div>
        <p class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px;">
        <a class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px" onclick='history.back()'>KEMBALI</a>   

        </p>
      </div>
        </nav>

<?php
include ('crudMahasiswa.php');
include ('crudNilai.php');

$nim = $_GET['nim'];
$data = cariMahasiswa($nim);
?>
<div class="container">
    <form  class="form-horizontal" method="post" action="nilai_tambah.php"> 
    
      <div class="form-group">
        <label class="control-label col-sm-3" for="nim">NIM:</label>
        <div class="col-sm-6">
          <input  class="form-control" type="text" name="nim" maxlength="9" value='<?php echo $data['nim']; ?>'/>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3" for="th_masuk">SEMESTER:</label>
        <div class="col-sm-6">
           <select class="form-control" name="th_masuk" required>
            <option value="">Select</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
           </select>
        </div>
     </div>

      <div class="form-group">
        <label class="control-label col-sm-3" for="sks">SKS:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" type="" name="sks" maxlength="3" required/>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3" for="ips">IPS:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" type="" name="ips" maxlength="4" required/>
        </div>
      </div>
      <label class="control-label col-sm-5" ></label>
      <button type="submit" class="btn btn-success">Simpan</button>
      <button type="reset" class="btn btn-danger" >Reset</button>
      
    </form>  
  </div>


  </body>
</html>