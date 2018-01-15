<?php
session_start();

//cek apakah user sudah login
if(!isset($_SESSION['username'])){
    header('Location:index.php');
}


?>