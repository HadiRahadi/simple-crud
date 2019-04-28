<?php
	include('config.php');

	$option = ""; // untuk menampung jabatan

	// mengambil data nik dari table tb_karyawan
	if (isset($_GET['nik'])) {
		$nik = $_GET['nik']; // ditampung divariabel

		// query untuk menampilkan semua data dari -> tb_karyawan
		$query = mysqli_query($con, "SELECT * FROM tb_karyawan WHERE nik = $nik");
		$row = mysqli_fetch_array($query); // dicacah 
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
	<!-- Form Update Karyawan -->
	<h2 class="header">Update Data Karyawan</h2>
		<form method="POST" action="update.php">
			<!-- memanggil variabel $row dimasing-masing inputan yang berisikan perintah seleksi 
				untuk ditampilkan didalam inputan
			-->
			<div class="form-group">
				<label>NIK</label>
				<input type="text" class="form-control" name="nik" value="<?= $row['nik']; ?>" autocomplete="off" readonly/>
			</div>
			<div class="form-group">
				<label>Nama Karyawan</label>
				<input type="text" class="form-control" name="nama" value="<?= $row['nama']; ?>" autocomplete="off" />
			</div>
			<div class="form-group">
				<label>Jabatan</label>
				<input type="text" class="form-control" name="jabatan" value="<?= $row['jabatan']; ?>">
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea name="alamat" class="form-control"><?= $row['alamat']; ?></textarea>
			</div>
			<div class="form-group">
				<label>No. Telepon</label>
				<input type="text" class="form-control" name="telepon" value="<?= $row['telepon'];?>" autocomplete="off" />
			</div>
				<input type="submit" class="btn btn-success" name="simpan" value="Simpan" />
		</form>
</body>
</html>