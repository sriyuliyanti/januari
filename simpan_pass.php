<?php
include_once "koneksi.php";
$conn = koneksi();

$lama = $_POST['p_lama'];
$baru = $_POST['p_baru'];

$query = mysqli_fetch_array(mysqli_query($conn, "SELECT password FROM user WHERE id_user = '$_SESSION[username]'"));
if($query['password']==$lama){
$sql = mysqli_query($conn, "UPDATE password SET password='$baru' WHERE id_user = '$_SESSION[username]'");
echo "<script>alert('Password sudah diganti ^_^ ')</script>";
}else{
echo "<script>alert('Password lama tidak sesuai!')</script>";
}
?>
<script>document.location.href="index.php"</script>