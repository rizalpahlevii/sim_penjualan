<?php 

	include "system/proses.php";
	error_reporting(0);
	if (empty($_GET['id_barang'])){
		$connect = mysqli_connect("localhost", "root", "", "db_penjualan");
		$query = "SELECT max(id_brg) as maxKode FROM barang";
		$hasil = mysqli_query($connect, $query);
		$data = mysqli_fetch_array($hasil);
		$kodebarang = $data['maxKode'];
		$nourut = (int) substr($kodebarang, 3, 3);
		$nourut++;
		$char = "BR";
		$kodebarang = $char . sprintf("%03s", $nourut);
		$sub='simpan';
	}else{
		$kodebarang = $_GET['id_barang'];
		$sub='edit';
	}
	$qr = $db->get("*","barang","WHERE id_brg='$_GET[id_barang]'");
	$tampilnya=$qr->fetch();

	

 ?>



<div class="judul-content">
	<h1>Input Barang</h1>
</div>
<div class="isi-content">
	<form action="crud/simpan_barang.php" method="POST">
		<table>
			<tr>
				<td><label for="id_brg">ID Barang</label></td>
			</tr>
			<tr>
				<td><input type="text" name="id_brg" class="text disable" onkeyup="return validhuruf(this)" autocomplete="off" id="id_brg" value="<?php echo $kodebarang; ?>" readonly></td>
			</tr>


			<tr>
				<td><label for="nama_brg">Nama Barang</label></td>
			</tr>
			<tr>
				<td><input type="text" name="nama_brg" class="text" autocomplete="off" required="" id="nama_brg" value="<?php echo $tampilnya['nama_brg']; ?>" onkeypress="return huruf(event)"></td>
			</tr>




			<tr>
				<td><label for="jns">Jenis Barang</label></td>
			</tr>
			<tr>
				<td>
					<select name="id_jenis" class="text" id="jns">
						<option value="" disabled selected>Pilih Jenis Barang</option>
						<?php 
							$qw=$db->get("*","jenis","ORDER BY id_jenis ASC");
							foreach( $qw as $tampil_opt ){
						 ?>
						<option <?php if($tampilnya['id_jenis_brg']==$tampil_opt['id_jenis']){echo "selected";}?> value="<?php echo $tampil_opt['id_jenis']; ?>"><?= $tampil_opt['nama_jenis']; ?></option>
						<?php 
							}
						 ?>
					</select>
				</td>
			</tr>
			




			<tr>
				<td><label for="hrg">Harga Barang</label></td>
			</tr>
			<tr>
				<td><input type="text" name="harga" class="text" autocomplete="off" required="" id="hrg" value="<?php echo $tampilnya['harga']; ?>" onkeypress="return wajibAngka(event)"></td>
			</tr>


			<tr>
				<td><label for="stok">Stok Barang</label></td>
			</tr>
			<tr>
				<td><input type="text" name="stok" class="text" autocomplete="off" required="" id="stok" value="<?php echo $tampilnya['stok']; ?>"></td>
			</tr>

			<tr>
				<td><label for="exp">Tgl. Expired</label></td>
			</tr>
			<tr>
				<td><input type="date" name="expired" class="text" required="" id="exp" value="<?php echo $tampilnya['expired']; ?>"></td>
			</tr>


			<tr>
				<td><input type="submit" name="<?php echo $sub; ?>" value="Simpan" class="simpan" required=""></td>
			</tr>


		</table>
	</form>
</div>


