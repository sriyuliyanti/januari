<!doctype html>
<?php
include_once('../cekadmin.php');
?>

<html>
    <head>
        <title>Input Mahasiswa</title>
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap.css"/>
    </head> 
    <body>
        <nav class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#" style="color: white;" align="center"><b>Form Input Data Mahasiswa</b></a>
        </div>
        <p class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px;">
        <a class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px" href="../halaman_admin.php">Dasboard</a>   

        </p>
      </div>
        </nav>


<div class="container">   
    <form class="form-horizontal" method="post" action="mhs_simpan.php">
    
      <div class="form-group">
        <label class="control-label col-sm-3" for="nim">NIM:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" type="" name="nim" maxlength="9" required/>
        </div>
      </div>
   
      <div class="form-group">
        <label class="control-label col-sm-3" for="dosen">Dosen Wali:</label>
        <div class="col-sm-6">
        <select class="form-control" name='id_wali' required>
            <?php
            include_once("../wali/crudWali.php");
            $sql= "select * from wali";
            $data = bacaWali($sql);
            // sampe sini berarti berhasil query
            foreach($data as $wali){
            $id_wali    = $wali['id_wali'];
            $nama_wali  = $wali['nama_wali'];
            echo "<option value=$id_wali>$nama_wali</option>";
            }
            ?>
          </select>
        </div>
    </div>
        <div class="form-group">
        <label class="control-label col-sm-3" for="nama_mhs">Nama Mahasiswa:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" type="" name="nama_mhs" maxlength="40" required/>
        </div>
      </div>


      <div class="form-group">
        <label class="control-label col-sm-3" for="dosen">Status Kelulusan:</label>
        <div class="col-sm-6">
           <select class="form-control" name="status" required>
              <option value="">Select</option>
              <option value="LC">LULUS CEPAT</option>
              <option value="LT">LULUS TEPAT</option>
              <option value="LL">LULUS LAMBAT</option>
              <option value="BL">BELUM LULUS</option>
            </select>
        </div>
     </div>
     <label class="control-label col-sm-5" ></label>
      <button type="submit" class="btn btn-success">Simpan</button>
      <button type="reset" class="btn btn-danger" >Reset</button>
    </form>  
  </div>


  </body>
</html>