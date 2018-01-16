<?php
$error=''; 

require_once "koneksi.php";
$conn = koneksi();

if(isset($_POST['submit']))
{               
    $username   = $_POST['username'];
//	$nm_user    = $_POST['nm_user'];
    $password   = $_POST['password'];
              
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
        
        if($row['level'] == "1")
        {  
            header("Location: admin/halaman_admin.php");
        }
        else if($row['level'] =="2" )
        {
            header("Location: kaprodi/halaman_prodi.php");
        }
        else if($row['level'] =="3")
        {
            
            header("Location: wali/halaman_wali.php");
        }
		else if($row['level'] == "4")
        {
            
            header("Location: mhs/halaman_mhs.php");
        }
        else
        {
            $error = "Gagal Login";
        }
    }
}           
?>