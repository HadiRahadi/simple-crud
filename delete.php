<?php 
	// call file koneksi 
	include('config.php');

	// menyimpan data id ke dalam variabel
	$nik = $_GET['nik'];

	// query delete
	$query = "DELETE FROM tb_karyawan WHERE nik = '$nik'";

	$res = mysqli_query($con, $query); // eksekusi ke database->tb_karyawan

	
	// checking eksekusi jika sudah sesuai
	if ($res) {
		echo '<script type="text/javascript">'; 
		echo 'alert("NIK : '.$nik.' \nBerhasil dihapus!");';
		echo 'window.location.href = "index.php";'; // jika berhasil maka dia akan redirect ke halaman index
		echo '</script>';
	}else{
		echo "<script>alert('Gagal dihapus!')</script>"; // jika kondisi tidak terpenuhi !
	}