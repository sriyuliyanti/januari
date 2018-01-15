<?php
include_once 'header_prodi.php';
$nim=$_GET['nim'];
?>
<div class="container" style="margin-top:40px">
<form class="form-horizontal">
              <div id="simpan"></div>
              <h3 align="center"> Perkiraan Masa Studi</h3>
              <div class="form-group">
                <label for="nim" class="control-label col-sm-3" >NIM  </label>
                <div class="col-sm-6">
                <input type="text" value ="<?php echo $nim ?>" class="form-control" id="nim" name="nim" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="nim" class="control-label col-sm-3" for="sel1">Tetangga Terdekat:</label>
                <div class="col-sm-6">
                <select class="form-control" id="sel1" name="nilaik">
                  <option value="20">20</option>
                  <option value="25">25</option>
                  <option value="30">30</option>
                  
                </select>
              </div>
            </div>
                <center><button id="hitung" type="button" class="btn btn-primary">HITUNG</button></center>
            </div>
            <!--munculkan hasil -->
            <div id="hasil">
            </div>
         

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