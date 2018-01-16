<!doctype html>
<?php
include_once('../cekadmin.php');
?>
<html>
    <head>
        <title>Form Update Data Mahasiswaa</title>
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap.css"/>
    </head> 
    <body>
        <nav class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#" style="color: white;" align="center"><b>Form Update Data Mahasiswa</b></a>
        </div>
        <p class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px;">
        <a class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px" href="mhs_tampil.php">Kembali</a>   

        </p>
      </div>
        </nav>

<?php
include ('crudMahasiswa.php');
$nim = $_GET['nim'];
$data = cariMahasiswa($nim);
$nama 	= $data['nama_mhs'];
$tahun 	= $data['th_masuk'];
$status  = $data['status'];
?>

<div class="container">   
    <form class="form-horizontal" method="post" action="proses_updatemhs.php">         
     <div class="form-group">
        <label class="control-label col-sm-3" for="nim">NIM:</label>
        <div class="col-sm-6">
          <input  class="form-control" type="text" name="nim" maxlength="9" value='<?php echo $data['nim']; ?>' readonly/>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3" for="nama_wali">NAMA DOSEN WALI:</label>
        <div class="col-sm-6">
                <select name='id_wali' required class="form-control">
                <?php
						require_once("../../koneksi.php");
						$conn = koneksi();
						$sql  = "select * from wali";
						$result = mysqli_query($conn, $sql);
						if (!$result) die("Gagal Query hotel".mysqli_error($conn));
						// sampe sini berarti berhasil query
						while($dt = mysqli_fetch_array($result)){
						   echo "<option value='{$dt['id_wali']}'>{$dt['nama_wali']}</option>";
						   if ($dt['id_wali'] == $dt['id_wali']) 
								 echo "selected = 'selected' </option>";
                                      
						}
													
				?>
                </select>
                    
		</div>
      </div>
	  
      <div class="form-group">
        <label class="control-label col-sm-3" for="nama_mhs">NAMA MAHASISWA:</label>
        <div class="col-sm-6">
          <input  class="form-control" type="text" name="nama_mhs" maxlength="40" value='<?php echo $nama; ?> ' required/>
        </div>
	
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3" for="th_masuk">TAHUN:</label>
        <div class="col-sm-6">
          <input  class="form-control" type="text" value='<?php echo $tahun; ?>' readonly/>
          
        </div>
      </div>


<div class="form-group">
    <label class="control-label col-sm-3" for="status">STATUS:</label>
      <div class="col-sm-6">
        <select class="form-control" name="status" required>
            <option <?php echo $data['status'] == "LC" ? 'selected="selected"': '';?> value="LC">LULUS CEPAT</option>
            <option <?php echo $data['status'] == "LT" ? 'selected="selected"': '';?> value="LT">LULUS TEPAT</option>
            <option <?php echo $data['status'] == "LL" ? 'selected="selected"': '';?> value="LL">LULUS LAMBAT</option>
            <option <?php echo $data['status'] == "BL" ? 'selected="selected"': '';?> value="BL">BELUM LULUS</option>
          </select>
      </div>
    </div>

        
                       
      <label class="control-label col-sm-5" ></label>
      <button type="submit" name ="update" class="btn btn-success">Update</button>
      <button type="reset" class="btn btn-danger" >Reset</button>
      
    </form>  
  </div>


  </body>
</html>
