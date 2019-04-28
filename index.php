<?php 
	// koneksi
	include('config.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- library css datatables -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" /> 
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
<h1 style="margin-top: 30px;" align="center">SI Perusahaan</h1>
	<p align="center">
		<a class="btn btn-primary" href="karyawan.php" target="_self">Tambah Data Karyawan</a>
	</p>
	<center>
	<form class="form-horizontal" role="search" method="POST"> 
		<div class="col-md-2 col-xs-12"> 	
			<input type="text" name="cari" class="form-control" placeholder="Cari ID/Nama" />
		</div> 
		<div class="col-md-4"> 
			<button class="btn btn-primary" type="submit" name="submit-cari-akun">Cari</button> 
		</div>
	</form>
	</center>
	
	<?php
		// dia menunjuk untuk form pencarian
		if (!empty($_REQUEST['cari'])) {
			// berdasarkan ID atau Nama Karyawan yang berada di tb_karyawan
			$nik = $_REQUEST['cari']; // untuk ID
			$nama = $_REQUEST['cari']; // untuk Nama

			// query untuk menampilkan data berdasarkan ID dan Nama yang diinputkan
			$sql = "SELECT * FROM tb_karyawan WHERE nik LIKE '%".$nik."%' OR nama LIKE '%".$nama."%'"; 
			$r_query = mysqli_query($con, $sql); // eksekusi
				// perulangan untuk memfetch data menjadi array dan ditampilkan
				while ($row = mysqli_fetch_array($r_query)){  
					echo "<h2> Data Karyawan</h2>
							<table id='example' align='center' width='100%' class='display'>
								<thead>
									<tr>
										<th>NIK</th>
										<th>Nama Karyawan</th>
										<th>Jabatan</th>
										<th>Alamat</th>
										<th>Telepon</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>$row[nik]</td>
										<td>$row[nama]</td>
										<td>$row[jabatan]</td>
										<td>$row[alamat]</td>
										<td>$row[telepon]</td>			
										<td>
										<a class='btn btn-warning' href='edit.php?nik=<?php $row[nik]?>'>Edit</a> 
										<a class='btn btn-danger' href='delete.php?nik=<?php $row[nik] ?'>Delete</td>
									</tr>
								</tbody>
								</table>"; ?>
				<?php
			}

			} 
			else {
				$nik = "";
		?>
	</form>


	<h2>Data Karyawan</h2>	
	<?php
		// query SELECT for displaying list of karyawan berdasarkan Nama->ASCENDING
		$query = "SELECT * FROM tb_karyawan";
		$result = mysqli_query($con, $query);
	?>
	
	<a class="btn btn-success" href="mpdf.php">Cetak PDF</a>
	<table id="example" align="center" width="100%" class="display">
		<thead>
			<tr>
				<th>NIK</th>
				<th>Nama Karyawan</th>
				<th>Jabatan</th>
				<th>Alamat</th>
				<th>Telepon</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<?php
			while ($tampil = mysqli_fetch_array($result)) {
				echo "<tr>
						<td>$tampil[nik]</td>
						<td>$tampil[nama]</td>
						<td>$tampil[jabatan]</td>
						<td>$tampil[alamat]</td>
						<td>$tampil[telepon]</td>			
						<td><a class='btn btn-warning' href='edit.php?nik=$tampil[nik]'>Edit</a> 
						<a class='btn btn-danger' href='delete.php?nik=$tampil[nik]'>Delete</td>
					</tr>";
			}
		}
		?>
	</table>

<!-- Link .js -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script>	
    $(document).ready(function(){
        $('#example').DataTable();
    });
</script>