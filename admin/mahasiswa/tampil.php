<?php
include_once "../../cekadmin.php";
if(array_key_exists('hapus', $_GET))
$hapus = $_GET['hapus'];
else
$hapus = 1;

include('crudMahasiswa.php');
$sql="select mahasiswa.* , wali.* 
          from mahasiswa inner join wali on mahasiswa.id_wali = wali.id_wali";
$data = bacaMahasiswa($sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar MahasiwaP</title>
    <!-- Load File bootstrap.min.css yang ada difolder css -->
    <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .align-middle{
      vertical-align: middle !important;
    }
    </style>
  </head>
  <body>
    <!-- Membuat Menu Header / Navbar -->
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#" style="color: white;"><b>Daftar User</b></a>
        </div>
        <p class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px;">
          FOLLOW US ON  

        </p>
      </div>
    </nav>
    
    <div style="padding: 0 15px;">
      <div class="container table-responsive">
        <table id="example" class="table table-striped table-bordered">
          <tr>
            <th class="text-center">NO</th>
            <th>NIM</th>
            <th>NAMA DOSES</th>
            <th>NAMA MAHASISWA</th>
            <th>TAHUN MASUK</th>
            <th>STATUS</th>
            <th colspan="3">OPSI</th>
          </tr>
          <?php
          // Include / load file koneksi.php
          include "../connect.php";
          
          // Cek apakah terdapat data page pada URL
          $page = (isset($_GET['page']))? $_GET['page'] : 1;
          
          $limit = 2; // Jumlah data per halamannya
          
          // Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
          $limit_start = ($page - 1) * $limit;
          
          // Buat query untuk menampilkan data siswa sesuai limit yang ditentukan
          $sql = $pdo->prepare("select mahasiswa.* , wali.* 
          from mahasiswa inner join wali on mahasiswa.id_wali = wali.id_wali LIMIT ".$limit_start.",".$limit);
          $sql->execute(); // Eksekusi querynya
          
          $no = $limit_start + 1; // Untuk penomoran tabel
          while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
          ?>
            <tr>
              <td class="align-middle text-center"><?php echo $no; ?></td>
              <td class="align-middle"><?php echo $data['nim']; ?></td>
              <td class="align-middle"><?php echo $data['nama_wali']; ?></td>
              <td class="align-middle"><?php echo $data['nama_mhs']; ?></td>
              <td class="align-middle"><?php echo $data['th_masuk']; ?></td>
              <td class="align-middle"><?php echo $data['status']; ?></td>
            </tr>
          <?php
            $no++; // Tambah 1 setiap kali looping
          }
          ?>
        </table>
      </div>
      
  <script src="../../assets/js/jquery-1.12.3.min.js"></script>
  <script src="../../assets/js/jquery.dataTables.min.js"></script>
  <script src="../../assets/js/dataTables.bootstrap.min.js"></script>
      <!--
      -- Buat Paginationnya
      -- Dengan bootstrap, kita jadi dimudahkan untuk membuat tombol-tombol pagination dengan design yang bagus tentunya
      -->
      <ul class="pagination">
        <!-- LINK FIRST AND PREV -->
        <?php
        if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
        ?>
          <li class="disabled"><a href="#">First</a></li>
          <li class="disabled"><a href="#">&laquo;</a></li>
        <?php
        }else{ // Jika page bukan page ke 1
          $link_prev = ($page > 1)? $page - 1 : 1;
        ?>
          <li><a href="tampil.php?page=1">First</a></li>
          <li><a href="tampil.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
        <?php
        }
        ?>
        
        <!-- LINK NUMBER -->
        <?php
        // Buat query untuk menghitung semua jumlah data
        $sql2 = $pdo->prepare("SELECT COUNT(*) AS jumlah FROM mahasiswa");
        $sql2->execute(); // Eksekusi querynya
        $get_jumlah = $sql2->fetch();
        
        $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
        $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
        $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
        $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
        
        for($i = $start_number; $i <= $end_number; $i++){
          $link_active = ($page == $i)? ' class="active"' : '';
        ?>
          <li<?php echo $link_active; ?>><a href="tampil.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php
        }
        ?>
        
        <!-- LINK NEXT AND LAST -->
        <?php
        // Jika page sama dengan jumlah page, maka disable link NEXT nya
        // Artinya page tersebut adalah page terakhir 
        if($page == $jumlah_page){ // Jika page terakhir
        ?>
          <li class="disabled"><a href="#">&raquo;</a></li>
          <li class="disabled"><a href="#">Last</a></li>
        <?php
        }else{ // Jika Bukan page terakhir
          $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
        ?>
          <li><a href="tampil.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
          <li><a href="tampil.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
        <?php
        }
        ?>
      </ul>
    </div>
  </body>
</html>