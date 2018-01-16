<?php
include_once "header_mhs.php";
?>
<div class="container" style="margin-top:40px">


<script type="text/javascript">
function cek(form){
var lama = form.p_lama.value;
var baru = form.p_baru.value;
var lagi = form.p_lagi.value;
if(lama==""){
alert('mohon isi password lama!');
return false;
}
if(baru==""){
alert('mohon isi password baru!');
return false;
}
if(lagi==""){
alert('ulangi ketik password baru!');
return false;
}
if(baru!=lagi){
alert('Password baru tidak cocok,\nCek ulang password baru Anda!');
return false;
}
return true;
}
</script>



<h2 align = 'center'>UBAH PASSWORD</h2>

<form class="form-horizontal" method="post" action="simpan_pass.php" onsubmit="return cek(this)">   
    
    <div class="form-group">
        <label class="control-label col-sm-3" for="p_lama">PASSWORD LAMA:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" type="" name="p_lama" maxlength="20" required/>
        </div>
      </div>
    
      <div class="form-group">
        <label class="control-label col-sm-3" for="p_baru">PASSWORD BARU:</label>
        <div class="col-sm-6">
          <input type="password" class="form-control"  name="p_baru" maxlength="20" required/>
        </div>
      </div>
     
    <div class="form-group">
        <label class="control-label col-sm-3" for="p_ulang">ULANG PASSWORD:</label>
        <div class="col-sm-6">
          <input type="password" class="form-control"  name="p_ulang" maxlength="20" required/>
        </div>
      </div>

    <label class="control-label col-sm-5" ></label>
      <button type="submit" class="btn btn-success">Simpan</button>
      <button type="reset" class="btn btn-danger" >Reset</button>


</form>

</div>