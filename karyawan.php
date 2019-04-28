<!DOCTYPE html>
<html>
<head>
	<title>Perusahaan</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<style type="text/css">
		span.error {
			color: red;
		}
	</style>

</head>
<body>
	<?php
	include('config.php');
	// msg_error
	$errNIK = "";
	$errNama = "";
	$errJabatan = ""; 
	$errAlamat = ""; 
	$errTelepon = "";
	
	// mengarah kepada button 'simpan'
	if (isset($_POST['simpan'])) {
		
		// deklarasi variabel
		$nik 		= $_POST['nik'];
		$nama 		= $_POST['nama'];
		$jabatan	= $_POST['jabatan'];
		$alamat		= $_POST['alamat'];
		$telepon	= $_POST['telepon'];

		// validasi nik
		if (empty($_POST['nik'])) {
			$errNIK = "Tolong diisi !";
		}else{
			$nik = testcase($_POST['nik']);
			if (!preg_match("/^[0-9]*$/", $nik)) {
				$errNIK = "Hanya Berlaku Angka !";
			}
		}

		// Validasi nama karyawan
		if (empty($_POST['nama'])) {
			$errNama = "Tolong diisi !";
		}else{
			$nama = testcase($_POST['nama']);
			if (!preg_match("/^[a-zA-Z]*$/", $nama)) {
				$errNama = "Hanya Berlaku Huruf !";
			}
		}

		// Validasi Jabatan
		if (($_POST['jabatan'])) {
			$errJabatan = "Tolong dipilih !";
		}else{
			$jabatan = testcase($_POST['jabatan']);	
		}

		// Validasi untuk alamat
		if (empty($_POST['alamat'])) {
			$errAlamat = "Tolong Alamat diisi !";
		}else{
			$alamat = testcase($_POST['alamat']);
			if (!preg_match("/^[a-zA-Z0-9]*$/", $alamat)) {
				$errAlamat = "Hanya Berlaku Huruf dan Angka !";
			}
		}

		// Validasi No. Telp
		if (empty($_POST['telepon'])) {
			$errTelepon = "Tolong No. Telepon diisi !";
		}else{
			$telepon = testcase($_POST['telepon']);
			if (!preg_match("/^[0-9]*$/", $telepon)) {
				$errTelepon = "Hanya Berlaku Huruf dan Angka !";
			}
		}

		// Query Insert
		$query = "INSERT INTO tb_karyawan (nik, nama, jabatan, alamat, telepon) VALUES ('".$nik."','".$nama."','".$jabatan."','".$alamat."','".$telepon."')";

		// validasi semua elemen
		if (!empty($nik) && !empty($nama) && !empty($jabatan) && !empty($alamat) && !empty($telepon)) {

		$res = mysqli_query($con, $query);
			if ($res) {
				echo '<script type="text/javascript">'; 
				echo 'alert("Data Berhasil di Input !");'; 
				echo 'window.location.href = "index.php";'; // halaman yang dituju, jika data yang diinput sesuai dan berhasil
				echo '</script>';
			}else {
				echo "Error Description : ". mysqli_error($con); // muncul pesan error jika terjadi kesalahan dengan menggunakan mysqli_error();
			}
				ob_end_flush();
		}
	}
	?>
	<h2 class="header">Input Data Karyawan</h2>
		<form method="POST">
			<div class="form-group">
				<label>NIK</label>
				<input type="text" class="form-control" name="nik" placeholder="Masukkan NIK" autocomplete="off" />
				<span class="error">* <?php echo $errNIK; ?></span>
			</div>
			<div class="form-group">
				<label>Nama Karyawan</label>
				<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap" autocomplete="off" />
				<span class="error">* <?php echo $errNama; ?></span>
			</div>
			<div class="form-group">
				<label>Jabatan</label>
				<select name="jabatan" class="form-control">
					<option>- Pilih Jabatan -</option>
					<option value="Sekretaris">Sekretaris</option>
					<option value="Bendahara">Bendahara</option>
					<option value="Humas">Humas</option>
					<option value="Anggota">Anggota</option>
					<option value="Teknisi">Teknisi</option>
					<option value="Office Boy">Office Boy</option>
				</select>
				<span class="error">* <?php echo $errJabatan; ?></span>
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea name="alamat" class="form-control"></textarea>
				<span class="error">* <?php echo $errAlamat; ?></span>
			</div>
			<div class="form-group">
				<label>No. Telepon</label>
				<input type="text" class="form-control" name="telepon" autocomplete="off" />
				<span class="error">* <?php echo $errTelepon; ?></span>
			</div>
				<input type="submit" class="btn btn-success" name="simpan" value="Simpan" />
		</form>
</body>
</html>