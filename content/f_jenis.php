<?php 
include "system/proses.php";
error_reporting(0);
// Mencari ID Otomatis
	
		if(empty($_GET['id_jenis'])){
			$connect = mysqli_connect("localhost", "root", "", "db_penjualan");
			$query = "SELECT max(id_jenis) as maxKode FROM jenis";
			$hasil = mysqli_query($connect, $query);
			$data = mysqli_fetch_array($hasil);
			$kodebarang = $data['maxKode'];
			$nourut = (int) substr($kodebarang, 2, 2);
			$nourut++;
			$char = "0";
			$kodebarang = $char . sprintf("%02s", $nourut);
			$sub='simpan_jenis';
		}else{
			$kodebarang = $_GET['id_jenis'];
			$sub='edit_jenis';
		}
	$qr = $db->get("*","jenis","WHERE id_jenis='$_GET[id_jenis]'");
	$row=$qr->fetch();

 ?>



<div class="judul-content">
	<h1>Input Jenis Barang</h1>
</div>
<div class="isi-content">
	<form action="crud/simpan_jenis_barang.php" method="POST">
		<table>
			<tr>
				<td><label for="id_brg">ID Jenis</label></td>
			</tr>
			<tr>
				<td><input type="text" name="id_jenis" class="text disable" autocomplete="off" id="id_brg" value="<?= $kodebarang; ?>" readonly></td>
			</tr>


			<tr>
				<td><label for="nama_brg">Nama Jenis</label></td>
			</tr>
			<tr>
				<td><input type="text" name="nama_jenis" class="text" autocomplete="off" required="" id="nama_brg" value="<?= $row['nama_jenis']; ?>"></td>
			</tr>




			

			<tr>
				<td><input type="submit" name="<?= $sub; ?>" value="Simpan" class="simpan"></td>
			</tr>


		</table>
	</form>
</div>
<script type="text/javascript" src="../assets/js/validasi.js"></script>