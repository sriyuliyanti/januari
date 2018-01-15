<?php include_once '../../cekadmin.php' ?>
<?php


$id_wali=$_GET['id_wali'];
include "../../koneksi.php";
$conn = koneksi();

 $sql1 = "select * from wali where id_wali = '$id_wali'";	


$hasil = mysqli_query($conn, $sql1);
if (!$hasil)  die("Gagal query..".mysqli_error($conn));
$data = mysqli_fetch_array($hasil);
$id_wali = $data['id_wali'];
$nama_wali = $data['nama_wali'];

?>

<!doctype html>
<html>
    <head>
        <title>UPDATE DOSEN WALI</title>
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap.css"/>
    </head> 
    <body>
        <nav class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#" style="color: white;" align="center"><b>Form Update Data wali</b></a>
        </div>
        <p class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px;">
        <a class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px" href="../halaman_admin.php">KEMBALI</a>   

        </p>
      </div>
        </nav>


<div class="container">
<form class="form-horizontal" method="post" action="proses_update.php">

	  <div class="form-group">
        <label class="control-label col-sm-3" for="id_wali">ID Wali:</label>
        <div class="col-sm-6">
          <input  class="form-control" type="text" name="id_wali" maxlength="15" value='<?php echo $data['id_wali'];?>' readonly/>
        </div>
      </div>

	   <div class="form-group">
        <label class="control-label col-sm-3" for="nama_wali">Nama Wali:</label>
        <div class="col-sm-6">
          <input  class="form-control" type="text" name="nama_wali" maxlength="40" value='<?php echo $data['nama_wali']; ?>'  required/>
        </div>
      </div>
	  
	  <input type='hidden' name='id_user' value='<?php echo $dt['id_user'];?>' /> 

	  <label class="control-label col-sm-5" ></label>
      <button type="submit" name ='update' value="update" class="btn btn-success">Update</button>
      <button type="reset"  name ='reset' class="btn btn-danger" value="reset">Reset</button>
      <button type="button" class="btn btn-warning" onclick='history.back()'>Kembali</button>	

</form>
</div>

  </body>
</html>