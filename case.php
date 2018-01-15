<?php //DISINI UNTUK SET HALAMAN PHP
		$page = (isset($_GET['page']))? $_GET['page'] : "main";
		switch ($page) {
		
		
			
			
			case 'halaman_admin' : include "admin/halaman_admin.php"; break;
			case 'wali_tampil' : include "admin/wali/wali_tampil.php"; break;
			case 'wali_tambah' : include "admin/wali/wali_tambah.php"; break;
			
			case 'mhs_tambah' : include "admin/mahasiswa/mhs_tambah.php"; break;
			case 'mhs_tampil' : include "admin/mahasiswa/mhs_tampil.php"; break;
			case 'nilai_tampil' : include "admin/mahasiswa/nilai_tampil.php"; break;
			case 'nilaimhs_tampil' : include "admin/mahasiswa/nilaimhs_tampil.php"; break;
			
			
			case 'daftar_prediksi' : include "admin/prediksi/daftar_prediksi.php"; break;
			case 'data_training' : include "admin/prediksi/data_training.php"; break;
			case 'data_testing' : include "admin/prediksi/data_testing.php"; break;
			case 'akurasi' : include "admin/prediksi/akurasi.php"; break;
			
			case 'user_tampil' : include "admin/user/user_tampil.php"; break;
			case 'user_tambah' : include "admin/user/user_tambah.php"; break;
						
			case 'user_tambah' : include "admin/user/user_tambah.php"; break;
			case 'halaman_prodi' : include "kaprodi/halaman_prodi.php"; break;
			case 'halaman_wali' : include "wali/halaman_wali.php"; break;
			case 'halaman_mhs' : include "mahasiswa/halaman_mhs.php"; break;
			
			case 'update_pass' : include "update_pass.php"; break;
			
			//default : include 'login.php';
			
			
				
		}
		?>