<?php 
// Mencari ID Otomatis
	include "system/proses.php";
	error_reporting(0);
	if( empty($_GET['id_pelanggan']) ){
		$connect = mysqli_connect("localhost", "root", "", "db_penjualan");
		$query = "SELECT max(id_pelanggan) as maxKode FROM pelanggan";
		$hasil = mysqli_query($connect, $query);
		$data = mysqli_fetch_array($hasil);
		$kodebarang = $data['maxKode'];
		$nourut = (int) substr($kodebarang, 3, 3);
		$nourut++;
		$char = "P";
		$kodebarang = $char . sprintf("%03s", $nourut);
		$sub = 'simpan_pelanggan';
	}else{
		$kodebarang = $_GET['id_pelanggan'];
		$sub = 'edit_pelanggan';
	}
	$qr = $db->get("*","pelanggan","WHERE id_pelanggan='$_GET[id_pelanggan]'");
	$row=$qr->fetch();
 ?>



<div class="judul-content">
	<h1>Input Pelanggan</h1>
</div>
<div class="isi-content">
	<form action="crud/simpan_pelanggan.php" method="POST">
		<table>
			<tr>
				<td><label for="id_pelanggan">ID Pelanggan</label></td>
			</tr>
			<tr>
				<td><input type="text" name="id_pelanggan" class="text disable" autocomplete="off" id="di_pelanggan" value="<?php echo $kodebarang; ?>" readonly></td>
			</tr>


			<tr>
				<td><label for="nama_pelanggan">Nama Pelanggan</label></td>
			</tr>
			<tr>
				<td><input type="text" name="nama_pelanggan" class="text" autocomplete="off" required="" id="nama_pelanggan" value="<?= $row['nama']; ?>"></td>
			</tr>


			<tr>
				<td><label for="alamat">Alamat</label></td>
			</tr>
			<tr>
				<td><input type="text" name="alamat" class="text" autocomplete="off" required="" id="alamat" value="<?= $row['alamat']; ?>"></td>
			</tr>

			<tr>
				<td><label for="no_telp">No.Telp</label></td>
			</tr>
			<tr>
				<td><input type="text" name="no_telp" class="text" autocomplete="off" required="" id="no_telp" value="<?= $row['no_telp']; ?>"></td>
			</tr>
			<tr>
				<td><label for="email">E-Mail</label></td>
			</tr>
			<tr>
				<td><input type="email" name="email" class="text" autocomplete="off" required="" id="email" value="<?= $row['email']; ?>"></td>
			</tr>



			

			<tr>
				<td><input type="submit" name="<?= $sub; ?>" value="Simpan" class="simpan"></td>
			</tr>


		</table>
	</form>
</div>