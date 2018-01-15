<?php
$error=''; 
require_once "koneksi.php";
$conn = koneksi();

if(isset($_POST['submit']))
{               
    $username   = $_POST['username'];
//	$nm_user    = $_POST['nm_user'];
    $password   = $_POST['password'];
    $level      = $_POST['level'];
              
    $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    if(mysqli_num_rows($query) == 0)
    {
        $error = "Username or Password is invalid";
    }
    else
    {
        $row = mysqli_fetch_assoc($query);
        $_SESSION['username']=$row['username'];
		$_SESSION['nm_user']=$row['nm_user'];
        $_SESSION['level'] = $row['level'];
        
        if($row['level'] == "1" && $level=="1")
        {  
            ?>
				<ul class="nav navbar-nav navbar-right">
				<li></i></li>
				
				<li><a href="include.php?case=halaman_admin">Dasboard</a></li>
				
				
				<li class="c2 dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">Dosen Wali<span class="caret"></span></a>
				<ul class="dropdown-menu">
				<li><a href="include.php?case=wali_tampil">Daftar Dosen Wali</a></li>
				<li><a href="include.php?case=wali_tambah">Tambah Dosen Wali</a></li>
				</ul>
				</li>
				<li class="c2 dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">Mahasiswa<span class="caret"></span></a>
				<ul class="dropdown-menu">
				<li><a href="include.php?case=mhs_tampil">Daftar Mahasiswa</a></li>
				<li><a href="include.php?case=mhs_tambah">Input Mahasiswa</a></li>
				</ul>
				</li>
				<li class="c2 dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">Nilai<span class="caret"></span></a>
				<ul class="dropdown-menu">
				<li><a href="include.php?case=nilai_tampil">Daftar Nilai</a></li>
				</ul>
				</li>
				<li class="c2 dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">Prediksi<span class="caret"></span></a>
				<ul class="dropdown-menu">
				<li><a href="include.php?case=daftar_prediksi">Daftar Prediksi</a></li>
				<li><a href="include.php?case=data_training">Data Training</a></li>
				<li><a href="include.php?case=data_testing">Data Testing</a></li>
				<li><a href="include.php?case=akurasi">Akurasi</a></li>
				</ul>
				</li>
				<li class="c2 dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">User<span class="caret"></span></a>
				<ul class="dropdown-menu">
				<li><a href="include.php?case=user_tampil">Daftar User</a></li>
				<li><a href="include.php?case=user_tambah">Tambah User</a></li>
				</ul>
				</li>
				
				<li><a href="include.php?case=update_pass">Ubah Password</a></li>
                <li><a href="include.php?case=logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
			
			
			<?php
        }
        else if($row['level'] =="2" && $level=="2")
        {
		?>
			<ul class="nav navbar-nav navbar-right">
				<li></i></li>
				<li class="c2 dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">Dosen Wali<span class="caret"></span></a>
				<ul class="dropdown-menu">
				<li><a href="include.php?case=wali_tampil">Daftar Dosen Wali</a></li>
				
				</ul>
				</li>
				<li class="c2 dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">Mahasiswa<span class="caret"></span></a>
				<ul class="dropdown-menu">
				<li><a href="include.php?case=mhs_tampil">Daftar Mahasiswa</a></li>
				</ul>
				</li>
				<li class="c2 dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">Nilai<span class="caret"></span></a>
				<ul class="dropdown-menu">
				<li><a href="include.php?case=nilai_tampil">Daftar Nilai</a></li>
				</ul>
				</li>
				<li class="c2 dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">Prediksi<span class="caret"></span></a>
				<ul class="dropdown-menu">
				<li><a href="include.php?case=daftar_prediksi">Daftar Prediksi</a></li>
				<li><a href="include.php?case=prediksi_input">Prediksi Input</a></li>
				<li><a href="include.php?case=data_training">Data Training</a></li>
				<li><a href="include.php?case=data_testing">Data Testing</a></li>
				<li><a href="include.php?case=akurasi">Akurasi</a></li>
				</ul>
				</li>
				
                <li><a href="include.php?case=logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
         
        <?php 
		}
        else if($row['level'] =="3" && $level=="3")
        {
         ?>
		 
			<div class="navbar-collapse collaps" id="bs-example-navbar-collapse-1">
        	
            <ul class="nav navbar-nav navbar-right">
				<li><a href="include.php?case=halaman_wali">Dasboard</a></li>
				<li><a href="include.php?case=update_pass">Ubah Password</a></li>
				
				<li class="c2 dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">Mahasiswa<span class="caret"></span></a>
				<ul class="dropdown-menu">
				<li><a href="include.php?case=mhs_bimbingan">Mahasiswa Bimbingan</a></li>
				</ul>
				</li>
			
				<li class="c2 dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">Prediksi<span class="caret"></span></a>
				<ul class="dropdown-menu">
				<li><a href="data_training.php">Data Training</a></li>
				<li><a href="data_testing.php">Data Testing</a></li>
				<li><a href="hasil_prediksi.php">Hasil Prediksi</a></li>
				</ul>
				</li>
                <li><a href="../logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
        </div>
        <?php
		}
		else if($row['level'] == "4" && $level=="4")
        {
		?>
			<div class="navbar-collapse collaps" id="bs-example-navbar-collapse-1">
        	
            <ul class="nav navbar-nav navbar-right">
				<li><a href="include.php?case=halaman_mhs">Dasboard</a></li>
				<li><a href="include.php?case=nilai_tampil">Daftar Nilai</a></li>
				<li><a href="include.php?case=update_pass">Ubah Password</a></li>
		        <li><a href="include.php?case=logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
        </div>

		<?php
    }
		
        else
        {
            $error = "Failed Login";
        }
    }
}
?>
		
