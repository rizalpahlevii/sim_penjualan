<?php 
	include "../system/proses.php";
		// $connect = mysqli_connect("localhost", "root", "", "penjualan2");
		// $query = "SELECT max(id_transaksi) as maxKode FROM transaksi";
		// $hasil = mysqli_query($connect, $query);
		// $data = mysqli_fetch_array($hasil);
		// $kodebarang = $data['maxKode'];
		// $nourut = (int) substr($kodebarang, 3, 3);
		// $nourut++;
		// $char = "TR";
		// $nomax = $char . sprintf("%03s", $nourut);
	$id = $_GET['idt'];
 ?>
<table class="tabel98">
			<tr>
				<th>No</th>
				<th>ID Transaksi</th>
				<th>Nama Barang</th>
				<th>Harga</th>
				<th>Jumlah Beli</th>
				<th>Total</th>
				<th>Action</th>
			</tr>
			<?php 
				$qw = $db->get("detail_transaksi.id_transaksi, detail_transaksi.id_detail_transaksi,barang.nama_brg, barang.harga, detail_transaksi.jumlah_beli, detail_transaksi.subtotal","detail_transaksi","INNER JOIN barang on detail_transaksi.id_brg = barang.id_brg WHERE detail_transaksi.id_transaksi = '$id' order by detail_transaksi.id_detail_transaksi ASC");
				$no = 1;
				$tot = 0;
				foreach($qw as $tamp){
					$tot = $tot+$tamp['subtotal'];
			 ?>
				
			<tr>
				<td><?= $no; ?></td>
				<td><?= $tamp['id_transaksi']; ?></td>
				<td><?= $tamp['nama_brg']; ?></td>
				<td><?= $tamp['harga']; ?></td>
				<td><?= $tamp['jumlah_beli']; ?></td>
				<td><?= $tamp['subtotal']; ?></td>
				<td>
					<a href="#" onclick="hapus_detail(<?= $tamp['id_detail_transaksi']; ?>)" class="btn btn-merah">Hapus</a>
				</td>
			</tr>
			<?php
		 		$no++;

				}
			?>
			
		</table>

	<script type="text/javascript">
		$('#subtotal').val("<?php echo $tot; ?>");

		// Mencari Diskon
		pl = $('#kategori').val();
		st = $('#subtotal').val();
		k = $('#diskon').val();
		if(pl=="Pelanggan"){
			hsl = st*0.05;
			$('#diskon').val(hsl);
		}else{
			$('#diskon').val(0);
		}
		// Mencari Total bayar
		sttl = $('#subtotal').val();
		dk = $('#diskon').val();
		result = sttl-dk;
		$('#totalbayar').val(result);

	</script>
		