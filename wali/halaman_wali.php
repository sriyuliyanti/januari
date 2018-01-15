<!DOCTYPE html>
<?php
	include_once('header_wali.php');
?>		
<div class="container" style="margin-top:40px">
</br/>
  <h1> Selamat Datang Di Halaman Utama Dosen Wali</h1>

 		<img style='height: 200px; margin-top: -1px' src='../assets/img/icon/wali.png' class='img-circle'>
</div>				

</body>
</html>
<script>
$(document).ready(function(){
$(".dropdown").hover(            
function() {
$('.dropdown-menu', this).stop( true, true ).slideDown("fast");
$(this).toggleClass('open');        
},
function() {
$('.dropdown-menu', this).stop( true, true ).slideUp("fast");
$(this).toggleClass('open');       
}
);
});
</script>