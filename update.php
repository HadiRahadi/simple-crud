<?php 
	include('config.php');

	// deklarasi data ke dalam variable
	$nik = $_POST['nik'];
	$nama = $_POST['nama'];
	$jabatan = $_POST['jabatan'];
	$alamat = $_POST['alamat'];
	$telepon = $_POST['telepon'];

	// query untuk UPDATE data buku
	$query = "UPDATE tb_karyawan SET nik='$nik', nama='$nama', jabatan='$jabatan', alamat='$alamat', telepon='$telepon' 
		WHERE nik='$nik'";

	// eksekusi query
	$res = mysqli_query($con, $query);
	if($res)
	{ 
		echo '<script type="text/javascript">'; 
		echo 'alert("NIK : '.$nik.' \nBerhasil diubah!");'; 
		echo 'window.location.href = "index.php";'; // halaman yang dituju, jika data yang diinput sesuai dan berhasil
		echo '</script>';
	 }
	 else
	 { 
	 	echo "<script>alert('Gagal Diubah')</script>";
	 }
?>