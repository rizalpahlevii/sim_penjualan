<!DOCTYPE html>
<html>
<head>
	<title>Laporan Per Bulan</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/custom.css">
</head>
<body style="background-color: #fff;">
	<div class="judul-content">
	<h1 style="text-align: center; font-family: segoe ui; margin-top: 15px;">Laporan Per Bulan</h1>
</div>
<div class="isi-content">
	<?php 
		$bulan =  $_GET['bulan'];
		$tahun =  $_GET['tahun'];
	 ?>
	<div class="judul-home">
		<div class="divtabel">
			
				<table class="tabel98">
					<tr>
						<th>ID Transaksi</th>
						<th>Tanggal</th>
						<th>Nama User</th>
						<th>Total</th>
						<th>Diskon</th>
						<th>Total Bayar</th>
						
					</tr>
					<?php 
						include '../system/proses.php';

						
							$qw = $db->get("transaksi.id_transaksi, transaksi.tanggal, petugas.username, transaksi.total, transaksi.diskon","transaksi","INNER JOIN petugas on transaksi.id_petugas=petugas.id_petugas WHERE month(transaksi.tanggal) = '$bulan' AND year(transaksi.tanggal)='$tahun'");
						
						foreach($qw as $tampil){
							$totbay = $tampil['total']-$tampil['diskon'];
					 ?>
					<tr>
						<td><?php echo $tampil['id_transaksi']; ?></td>
						<td><?php echo $tampil['tanggal']; ?></td>	
						<td><?php echo $tampil['username']; ?></td>
						<td><?php echo $tampil['total']; ?></td>
						<td><?php echo $tampil['diskon']; ?></td>
						<td><?php echo $totbay; ?></td>
						
					</tr>
					<?php 
						}
					 ?>
					
				</table>
			
		</div>
	</div>
</div>
</body>
</html>
<script type="text/javascript">
	window.print();
</script>