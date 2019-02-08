<?php 
	include 'system/proses.php';
 ?>
<div class="judul-content">
	<h1>Laporan Per Bulan</h1>
</div>
<div class="isi-content">
	
	<div class="judul-home">
		<div class="divtabel">
			<form action="index.php?p=laporan_pertahun" method="POST">
				<table>
					<tr>
						<td><center><label>Bulan</label></center></td>
						
						<td><center><label>Tahun</label></center></td>
					</tr>
					<tr>
						
						<td>
							<select name="tahun" id="tahun" class="text" style="width: 200px;">
								<?php 
									$qr = $db->get("tanggal","transaksi"," GROUP BY DATE_FORMAT(tanggal, '%Y')");
									while($d=$qr->fetch()) :
										$data = explode('-', $d['tanggal']);
										$tahun = $data[0];
								 ?>
								<option value="<?php echo $tahun; ?>"><?php echo $tahun; ?></option>
							<?php endwhile; ?>
							</select>
						</td>
						<td>
							<input type="submit" name="carilb" class="inputbutton success" value="Cari" >
						</td>
						<?php 
							$bulan = $_POST['bulan'];
							$tahun = $_POST['tahun'];
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
						if(isset($_POST['carilb'])){
							$qw = $db->get("transaksi.id_transaksi, transaksi.tanggal, petugas.username, transaksi.total, transaksi.diskon","transaksi","INNER JOIN petugas on transaksi.id_petugas=petugas.id_petugas WHERE year(transaksi.tanggal)='$tahun'");
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
		
		tahun = $('#tahun').val();

		window.open("content/print_pertahun.php?tahun="+tahun);
	}
</script>
