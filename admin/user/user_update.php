<?php
include ('crudUser.php');

$id_user = $_GET['id_user'];
$data = cariUser($id_user);
?>

<!doctype html>
<html>
    <head>
        <title>Form Update Data User</title>
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap.css"/>
    </head> 
    <body>
        <nav class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#" style="color: white;" align="center"><b>Form Update Data user</b></a>
        </div>
        <p class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px;">
        <a class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px" href="../halaman_admin.php">KEMBALI</a>   

        </p>
      </div>
        </nav>


<div class="container">

<form class="form-horizontal" method="post" action="proses_update.php">

<input type='hidden' name='id_user' value='<?php echo $data['id_user'];?>' /> 

<div class="form-group">
        <label class="control-label col-sm-3" for="username">NAMA USER:</label>
        <div class="col-sm-6">
          <input  class="form-control" type="text" name="nm_user" maxlength="40" value='<?php echo $data['nm_user'];?>'>
        </div>
      </div>
	  
<div class="form-group">
        <label class="control-label col-sm-3" for="username">USERNAME:</label>
        <div class="col-sm-6">
          <input  class="form-control" type="text" name="username" maxlength="9" value='<?php echo $data['username'];?>'>
        </div>
      </div>

<div class="form-group">
        <label class="control-label col-sm-3" for="password">PASSWORD:</label>
        <div class="col-sm-6">
          <input  class="form-control" type="password" name="password" maxlength="9" value='<?php echo $data['password'];?>'>
        </div>
      </div>
	 
	  <div class="form-group">
        <label class="control-label col-sm-3" for="password">ULANGI PASSWORD:</label>
        <div class="col-sm-6">
          <input type="password" class="form-control" name="ulangpassword" maxlength="9" required/>
        </div>
      </div>

<div class="form-group">
        <label class="control-label col-sm-3" for="lever">LEVEL:</label>
        <div class="col-sm-6">
        <select class="form-control"  name="level" required>
		<option value="">Select</option>
		<option value="1"  <?php if($data['level'] == '1'){ echo 'selected'; } ?>>Admin</option>
		<option value="2"  <?php if($data['level'] == '2'){ echo 'selected'; } ?>>Prodi</option>
		<option value="3"  <?php if($data['level'] == '3'){ echo 'selected'; } ?>>Dosen Wali</option>
		<option value="4"  <?php if($data['level'] == '4'){ echo 'selected'; } ?>>Mahasiswa</option>
	</select>
	</div>
  </div>


	  <label class="control-label col-sm-5" ></label>
      <button type="submit" name ='update' value="update" class="btn btn-success">Update</button>
      <button type="reset"  name ='reset' class="btn btn-danger" >Reset</button>
      
</form>
</div>

  </body>
</html>