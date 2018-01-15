<html>
    <head>
        <title>Tambah Dosen Wali</title>
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap.css"/>
    </head> 
    <body>
        <nav class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#" style="color: white;" align="center"><b>Form Tambah Data Dosen Wali</b></a>
        </div>
        <p class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px;">
        <a class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px" href="../halaman_admin.php">Dasboard</a>   

        </p>
      </div>
        </nav>

<div class="container">   
    <form class="form-horizontal" method="post" action="wali_simpan.php">
    
      <div class="form-group">
        <label class="control-label col-sm-3" for="id_wali">NIP:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" type="text" name="id_wali" maxlength="15" required/>
        </div>
      </div>

	  <div class="form-group">
        <label class="control-label col-sm-3" for="nama_wali">NAMA DOSEN:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" type="text" name="nama_wali" maxlength="40" required/>
        </div>
      </div>
	  
	  <div class="form-group">
        <label class="control-label col-sm-3" for="username">NAMA USER:</label>
        <div class="col-sm-6">
		  <input class="form-control" type="hidden" name="id_user" maxlength="11" />
          <input type="text" class="form-control" name="nm_user" maxlength="40" required/>
        </div>
      </div>
	  
      <div class="form-group">
        <label class="control-label col-sm-3" for="username">USERNAME:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" type="" name="username" maxlength="15" required/>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3" for="password">PASSWORD:</label>
        <div class="col-sm-6">
          <input type="password" class="form-control" name="password" maxlength="9" required/>
        </div>
      </div>
		
	  <div class="form-group">
        <label class="control-label col-sm-3" for="password">ULANGI PASSWORD:</label>
        <div class="col-sm-6">
          <input type="password" class="form-control" name="ulangpassword" maxlength="9" required/>
        </div>
      </div>
	
      <label class="control-label col-sm-5" ></label>
      <button type="submit" class="btn btn-success" value="simpan" name="simpan">Simpan</button>
      <button type="reset" class="btn btn-danger" >Reset</button>
  </div>
  </body>
</html>