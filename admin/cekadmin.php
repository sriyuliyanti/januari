<?php
session_start();

//cek apakah user sudah login
if(!isset($_SESSION['username'])){
	echo "anda belum login";
    header('Location:../index.php');
}


?>