<?php
include ('crudNilai.php');

$id_nilai = $_GET['id_nilai'];
$data = cariNilai($id_nilai);
?>

<!doctype html>
<html>
    <head>
        <title>Form Update Nilai Mahasiswa</title>
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap.css"/>
    </head> 
    <body>
        <nav class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#" style="color: white;" align="center"><b>Form Update Nilai Mahasiswa</b></a>
        </div>
        <p class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px;">
        <a class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px" href="../halaman_admin.php">KEMBALI</a>   

        </p>
      </div>
        </nav>


<div class="container">
<form class="form-horizontal" method="post" action="proses_updatenilai.php">

<input type='hidden' name='id_nilai' value='<?php echo $data['id_nilai'];?>'/>

	 <div class="form-group">
        <label class="control-label col-sm-3" for="nim">NIM:</label>
        <div class="col-sm-6">
          <input  class="form-control" type="text" name="nim" maxlength="9" value='<?php echo $data['nim'];?>' readonly/>
        </div>
      </div>

 <div class="form-group">
        <label class="control-label col-sm-3" for="semester">SEMESTER:</label>
        <div class="col-sm-6">
        <select class="form-control" name="semester" required>
        <option value="1"  <?php if($data['semester'] == '1'){ echo 'selected'; } ?> >1</option>
        <option value="2"  <?php if($data['semester'] == '2'){ echo 'selected'; } ?> >2</option>
        <option value="3"  <?php if($data['semester'] == '3'){ echo 'selected'; } ?> >3</option>
        <option value="4"  <?php if($data['semester'] == '4'){ echo 'selected'; } ?> >4</option>
        </select>
  		</div>
  </div>

<div class="form-group">
        <label class="control-label col-sm-3" for="sks">SKS:</label>
        <div class="col-sm-6">
          <input  class="form-control" type="text" name="sks" maxlength="9" value='<?php echo $data['sks'];?>' required/>
        </div>
      </div>

<div class="form-group">
        <label class="control-label col-sm-3" for="ips">IPS:</label>
        <div class="col-sm-6">
          <input  class="form-control" type="text" name="ips" maxlength="9" value='<?php echo $data['ips'];?>' required/>
        </div>
      </div>

	  <label class="control-label col-sm-5" ></label>
      <button type="submit" name ='update' class="btn btn-success" value="update">Update</button>
      <button type="reset"  name ='reset' class="btn btn-danger" >Reset</button>
      <button type="button" class="btn btn-warning" onclick='history.back()'>Kembali</button>

</form>
</div>

  </body>
</html>