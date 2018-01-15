<?php
    include_once "../../koneksi.php";

    $nim=$_POST["nim"];
    $nilaik=$_POST["nilaik"];
    $koneksi=koneksi();
    //proses hitungan mengolah rumus prediksi

     //totalmahasiswa yang training
    $querymahasiswalulus=mysqli_query($koneksi,"SELECT nim FROM Mahasiswa WHERE status IN('LL','LT','LC')  ORDER BY nim;");
    $totalmahasiswalulus=mysqli_num_rows($querymahasiswalulus);

    
    //jumlah semester yang akan diuji misal:4
    $jumlahsemester=mysqli_query($koneksi,"SELECT MAX(semester) as jumsemester FROM nilai_semester WHERE nim=".$nim."");
    $jumsemester=mysqli_fetch_assoc($jumlahsemester);

     //diambil setiap nim mahasiswa training
      $dataarray=array();
          while  ($getnimmahasiswa=mysqli_fetch_assoc($querymahasiswalulus)){
            $dataarray[]=$getnimmahasiswa['nim'];
          }
    $loop=1;
    for ($minout=1;$minout<=$totalmahasiswalulus;$minout++){
           $rumus=NULL;
           $rumuspangkat=NULL;
        for($minin=1;$minin<=$jumsemester['jumsemester'];$minin++){
            //mencari IPS setiap semester training
            $ipstraining=mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT IPS FROM nilai_semester WHERE semester=".$minin." AND nim=".$dataarray[$minout-1].";"));
            //mencari IPS setiap semester testing
            $ipstesting=mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT IPS FROM nilai_semester WHERE semester=".$minin." AND nim=".$nim.";"));

            //rumus untuk perpangkatan setiap sks
            $rumus=POW(($ipstesting['IPS']-$ipstraining['IPS']),2);
            $rumuspangkat=$rumus+$rumuspangkat;    
        };

        //mencari total sks setiap semester mahasiswa training
        $totalskstraining=mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT SUM(SKS) sks FROM Nilai_Semester WHERE nim=".$dataarray[$minout-1].";"));
        //mencari total sks setiap semester mahasiswa testing
        $totalskstesting=mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT SUM(SKS) sks FROM Nilai_Semester WHERE nim=".$nim.";"));

        $rumus=NULL;
        //rumus untuk perpangkatan sks+ips
        $rumus=SQRT($rumuspangkat+POW($totalskstesting['sks']-$totalskstraning['sks'],2));

        //mendapatkan nama mahasiswa dan Status lulus*/
        $nama_mhs=mysqli_fetch_assoc(mysqli_query($koneksi," SELECT nama_mhs FROM Mahasiswa WHERE nim=".$dataarray[$minout-1].";"));
        $status_lulus=mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT Status FROM Mahasiswa WHERE nim=".$dataarray[$minout-1].";"));

    mysqli_query($koneksi,"CREATE TEMPORARY TABLE RangkingSementara(Rangking INT AUTO_INCREMENT primary key
		,Nama varchar(255)
		,Jarak Decimal(10,4)
        ,Status_Lulus varchar(255));");
    mysqli_query($koneksi,"	CREATE TEMPORARY TABLE Kesimpulan(Status_Lulus varchar(255),Nilai INT);");
        //rumus akar diambil dari rumus lainnya
        mysqli_query($koneksi,"INSERT INTO RangkingSementara (Nama,Jarak,Status_Lulus)
        VALUES ('".$nama_mhs['nama_mhs']."',".$rumus.",'".$status_lulus['Status']."'); ");
        $loop+=1;
    };
   
    $LT1=mysqli_query($koneksi,"SELECT A.Status_Lulus,COUNT(A.Nilai) Nilai 
    FROM (SELECT Status_lulus,Status_lulus Nilai FROM RangkingSementara ORDER BY Jarak ASC LIMIT ".$nilaik." )A   WHERE A.Status_Lulus='LT'
    GROUP BY Status_Lulus");
    echo mysqli_error($koneksi);
    $LL1=mysqli_query($koneksi,"SELECT A.Status_Lulus,COUNT(A.Nilai) Nilai 
    FROM (SELECT Status_lulus,Status_lulus Nilai FROM RangkingSementara ORDER BY Jarak ASC LIMIT ".$nilaik." )A  WHERE A.Status_Lulus='LL'
    GROUP BY Status_Lulus");
    
    $LC1=mysqli_query($koneksi,"SELECT A.Status_Lulus,COUNT(A.Nilai) Nilai 
    FROM (SELECT Status_lulus,Status_lulus Nilai FROM RangkingSementara ORDER BY Jarak ASC LIMIT ".$nilaik." )A  WHERE A.Status_Lulus='LC'
    GROUP BY Status_Lulus");
    
    if (mysqli_num_rows($LT1)!=0){
    while ($LT=mysqli_fetch_assoc($LT1)){
        mysqli_query($koneksi,"INSERT INTO Kesimpulan (Status_Lulus,Nilai) VALUES ('".$LT['Status_Lulus']."',".$LT['Nilai'].")");
        }
    }
    if (mysqli_num_rows($LL1)!=0){
    while ($LL=mysqli_fetch_assoc($LL1)){
        mysqli_query($koneksi,"INSERT INTO Kesimpulan (Status_Lulus,Nilai) VALUES ('".$LL['Status_Lulus']."',".$LL['Nilai'].")");
    }}
    if (mysqli_num_rows($LC1)!=0){
   while ($LC=mysqli_fetch_assoc($LC1)){
    mysqli_query($koneksi,"INSERT INTO Kesimpulan (Status_Lulus,Nilai) VALUES ('".$LC['Status_Lulus']."',".$LC['Nilai'].")");
   }}


	$namatraining=mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT nama_mhs FROM Mahasiswa WHERE nim=".$nim.";"));
    $kesimpulan=mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT max(Nilai) max FROM Kesimpulan"));
    $kesimpulan=mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT Status_Lulus FROM Kesimpulan WHERE Nilai=".$kesimpulan['max'].";"));
    if(!$kesimpulan){
        mysqli_errno($koneksi);
    }
    echo "<div class='col-md-6 col-md-offset-3 well'>
     <table class='table'>
    <thead class='thead-light'>
      <tr>
        <th>NIM</th>
        <th>Nama Mahasiswa</th>
		<th>Nilai K</th>
        <th>KESIMPULAN</th>
      </tr>
    </thead>
    <tbody>
    <tr>
    ";
    echo "<td><span id='nim_hasil'>".$nim."</span></td>
    <td><span id='nama_hasil'>".$namatraining['nama_mhs']."</span></td>
	<td>".$nilaik."</td>
    <td>";
    if ($kesimpulan["Status_Lulus"]=='LC'){
    echo 'LULUS CEPAT';
        echo "<span class='invisible' id='hasil_data'>LC</span>";
    }
    IF($kesimpulan["Status_Lulus"]=='LT'){
    echo 'LULUS TEPAT';
    echo "<span class='invisible' id='hasil_data'>LT</span>";}
    IF($kesimpulan["Status_Lulus"]=='LL'){
    echo 'LULUS LAMBAT';
    echo "<span class='invisible' id='hasil_data'>LL</span>";
}
    echo " </tr></tbody></table>
     <center><button id='sim' type='button' class='btn btn-primary'>SIMPAN</button></center>
    </div>
    <br/>
     
    ";
	
	echo "
    <div class='col-md-6 col-md-offset-3 well'>
    <table class='table table-bordered'>
    <thead class='thead-light'>
      <tr>
        <th>Rangking</th>
        <th>Nama Mahasiswa</th>
        <th>Nilai jarak</th>
        <th>Status Lulus</th>
      </tr>
    </thead>
    <tbody>";
     $rangking=mysqli_query($koneksi,"SELECT Nama,Jarak,Status_Lulus FROM RangkingSementara ORDER BY Jarak ASC LIMIT ".$nilaik.";") or die(mysqli_errno($koneksi));
    $data=1;
    while($datarangking=mysqli_fetch_assoc($rangking)){
        echo "<tr>";
        echo "<td>".$data."</td>
            <td>".$datarangking['Nama']."</td>
            <td>".$datarangking['Jarak']."</td>
            <td>".$datarangking['Status_Lulus']."</td>";
        echo "</tr>";
        $data+=1;
    };
    echo " </tbody></table>
    </div>";
    mysqli_close($koneksi);
?>

<script>

      $("#sim").click(function () {
              var nim = $('#nim_hasil').text();
              var nama = $('#nama_hasil').text();
              var hasil=$('#hasil_data').text() ;
              var history=$('#history').text() ;
			  var nilaik=<?php echo $nilaik; ?> ;
            $.ajax({
              type: "POST",
              url: "prediksi_simpan.php",
              data: 'nim=' + nim + '&nama=' + nama +'&nilaik='+nilaik +'&hasil='+ hasil ,
              success: function (respons) {
                $('#simpan').html(respons);
                $('html, body').animate({
        scrollTop: $("#hasil").offset().top
    }, 1000);
              }

             });
           });
        
</script>
