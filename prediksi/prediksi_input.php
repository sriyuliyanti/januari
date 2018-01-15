<?php
//$nim=$_GET['nim'];
$nim  = '165610122';
session_start() ;
if ($_SESSION['level'] == 2) {
	include '../prodi/header_prodi.php';
	}
if ($_SESSION['level'] == 3) {
	include '../wali/header_prodi.php';
	}
if ($_SESSION['level'] == 4) {
	include '../mhs/header_mhs.php';
	}
else {
echo "xxx";
}


?>
<form class="form-horizontal">
              
              <h3 align="center"> Perkiraan Masa Studi</h3>
              <div class="form-group">
                <label for="nim" class="control-label col-sm-3" >NIM  </label>
                <div class="col-sm-6">
                <input type="text" value ="<?php echo $nim ?> "class="form-control" id="nim" name="nim" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="nim" class="control-label col-sm-3" for="sel1">Nilai K:</label>
                <div class="col-sm-6">
                <select class="form-control" id="sel1" name="nilaik">
                  <option value="5">5</option>
                  <option value="15">15</option>
                  <option value="20">20</option>
				  <option value="20">25</option>
				  <option value="20">30</option>                  
                </select>
              </div>
            </div>
                <center><button id="hitung" type="button" class="btn btn-primary">HITUNG</button></center>
            </div>
            <!--munculkan hasil -->
            <div id="hasil">
            </div>
         <!-- .container -->

    <!-- Bootstrap core JavaScript -->
    <script src="../assets/js/jquery-1.12.3.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function () {
          $("#hitung").click(function () {
            var nim = $('input[name=nim]').val();
            var nilaik = $('select[name=nilaik]').val();
            $.ajax({
              type: "POST",
              url: "prediksi_proses.php",
              data: 'nim=' + nim + '&nilaik=' + nilaik,
              success: function (respons) {
                $('#hasil').html(respons);
              }
            });
          });
        
      });              
    </script>  

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