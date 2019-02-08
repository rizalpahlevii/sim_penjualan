<div class="judul-content">
	<h1>Laporan Per Tanggal</h1>
</div>
<div class="isi-content">
	
	<div class="judul-home">
		<div class="divtabel">
			<form action="index.php?p=laporan_pertanggal" method="POST">
				<table>
					<tr>
						<td><label>Dari</label></td>
						<td></td>
						<td><label>Sampai</label></td>
					</tr>
					<tr>
						<td>
							<input type="date" name="tgl_awal" class="text" id="tgl_awal" style="width: 200px;" value="<?php echo $_POST['tgl_awal']; ?>">
						</td>
						<td>s/d</td>
						<td>
							<input type="date" name="tgl_akhir" class="text" id="tgl_akhir" style="width: 200px;" value="<?php echo $_POST['tgl_akhir']; ?>">
						</td>
						<td>
							<input type="submit" name="cari" class="inputbutton success" value="Cari" >
						</td>
						<?php 
							$tgla = $_POST['tgl_awal'];
							$tglk = $_POST['tgl_akhir'];
						 ?>
						<td>
							<input type="button" name="cari" class="inputbutton danger" value="Cetak" onclick="cetak()">
							
						</td>
					</tr>
				</table>
			</form>
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
						include 'system/proses.php';

						if(isset($_POST['cari'])){
							$tgl_awal = $_POST['tgl_awal'];
							$tgl_akhir = $_POST['tgl_akhir'];
							$qw = $db->get("transaksi.id_transaksi, transaksi.tanggal, petugas.username, transaksi.total, transaksi.diskon","transaksi","INNER JOIN petugas on transaksi.id_petugas=petugas.id_petugas WHERE transaksi.tanggal >= '$tgl_awal' AND transaksi.tanggal <= '$tgl_akhir'");
						}else{


							$qw = $db->get("transaksi.id_transaksi, transaksi.tanggal, petugas.username, transaksi.total, transaksi.diskon","transaksi","INNER JOIN petugas on transaksi.id_petugas=petugas.id_petugas");

						}
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
<script type="text/javascript">
	function cetak(){
		tl = $('#tgl_awal').val();
		tg = $('#tgl_akhir').val();

		window.open("content/print_pertanggal.php?tgl_awal="+tl+"&"+"tgl_akhir="+tg);
	}
</script>