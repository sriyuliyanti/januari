<!doctype html>
<?php
include_once('../cekadmin.php');
?>
<html>
    <head>
        <title>Form Input Data User</title>
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap.css"/>
    </head> 
    <body>
        <nav class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#" style="color: white;" align="center"><b>Form Input Data User</b></a>
        </div>
        <p class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px;">
        <a class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px" href="../halaman_admin.php">Dasboard</a>   

        </p>
      </div>
        </nav>


<div class="container">
<form class="form-horizontal" method="post" action="user_simpan.php">
	  
	  <div class="form-group">
        <label class="control-label col-sm-3" for="username">NAMA USER:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" type="" name="nm_user" maxlength="40" required/>
        </div>
      </div>
	  
      <div class="form-group">
        <label class="control-label col-sm-3" for="username">USERNAME:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" type="" name="username" maxlength="9" required/>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3" for="password">PASSWORD:</label>
        <div class="col-sm-6">
          <input type="password" class="form-control" type="" name="password" maxlength="9" required/>
        </div>
      </div>
		
	  <div class="form-group">
        <label class="control-label col-sm-3" for="password">ULANGI PASSWORD:</label>
        <div class="col-sm-6">
          <input type="password" class="form-control" name="ulangpassword" maxlength="9" required/>
        </div>
      </div>
	
		
	<div class="form-group">
      <label class="control-label col-sm-3" for="dosen">Level User:</label>
       <div class="col-sm-6">
	<select class="form-control" name="level" required>
		<option value="">Select</option>
		<option value="1">Admin</option>
		<option value="2">Kaprodi</option>
		<option value="3">Dosen Wali</option>
		<option value="4">Mahasiswa</option>
	</select>
		</div>
    </div>
      <label class="control-label col-sm-5" ></label>
      <button type="submit" class="btn btn-success">Simpan</button>
      <button type="reset" class="btn btn-danger" >Reset</button>
      <input type ="hidden" name="id_user" />
</form>
</div>

