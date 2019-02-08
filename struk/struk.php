<?php 
	include '../system/proses.php';
	$qwe1 = $db->get("transaksi.tanggal, transaksi.id_transaksi, petugas.username, petugas.level","transaksi","INNER JOIN petugas on petugas.id_petugas = transaksi.id_petugas WHERE transaksi.id_transaksi='$_GET[idt]'");

	$qwe2 = $db->get("pelanggan.nama","transaksi","INNER JOIN pelanggan on pelanggan.id_pelanggan=transaksi.id_pelanggan WHERE transaksi.id_transaksi='$_GET[idt]'");


	$qwe3 = $db->get("barang.nama_brg, barang.harga, detail_transaksi.jumlah_beli, detail_transaksi.subtotal","detail_transaksi","INNER JOIN barang on barang.id_brg = detail_transaksi.id_brg WHERE detail_transaksi.id_transaksi='$_GET[idt]'");

	$qwe4 = $db->get("*","transaksi","WHERE id_transaksi='$_GET[idt]'");

	$tamp = $qwe1->fetch();
	$tamp2 = $qwe2->fetch();
	$tamp4 = $qwe4->fetch();



 ?>
<!DOCTYPE html>
<html>
<head>
	<title>STRUK</title>
	<style type="text/css">
	
	.kotak-struk{
		float: left;
		width: 380px;
		height: auto;
		margin-left: -25px;
		margin-top: -15px;
		font-size: 15px;
		font-family: Courier New;
	}
	.kotak-struk .head p {
		text-align: center;
		font-size: 17px;
	}
	.kotak-struk .logo{
		font-weight: bold;
	}
	.kotak-struk .logo,.almt,.notelp{
		font-family: 'tahoma';
		line-height: 15px;
	}
	.kotak-struk .tabel1{
		margin: 0px 30px;
	}
	.kotak-struk .tabel1 tr td{
		font-family: 'tahoma';
		line-height: 25px;
	}
	.kotak-struk .tabel2{
		margin: 0px 30px;
	}
	.kotak-struk .tabel2 tr td{
		font-family: 'tahoma';
		line-height: 25px;
	}
	.kotak-struk .tabel3{
		float: right;
		margin: 0px 30px;
	}
	.kotak-struk .tabel3 tr td{
		text-align: right;
		font-family: 'tahoma';
		line-height: 25px;
	}
	.kotak-struk .tabel4{
		float: right;
		margin: 0px 30px;
	}
	.kotak-struk .tabel4 tr td{
		text-align: right;
		font-family: 'tahoma';
	}
	.kotak-struk .foot{
		float: left;
		text-align: center;
		line-height: 10px;
		margin: 0px 40px;
		margin-top: 10px;
		font-family: 'tahoma';
	}


</style>
</head>
<body>
	<div class="kotak-struk">
		<div class="head">
			
			<p class="logo">TOKO RIZAL</p>
			<p class="almt">Jl. Raya Mojo - Cluwak No 21A</p>
			<p class="notelp">081327551680</p>
		</div>
	<div class="isi">
		<table class="tabel1">
			<tr>
				<td>Tanggal</td>
				<td>:</td>
				<td><?php echo $tamp['tanggal']; ?></td>
			</tr>
			<tr>
				<td>Transaksi</td>
				<td>:</td>
				<td><?php echo $tamp['id_transaksi']; ?></td>
			</tr>
			<tr>
				<td>Operator</td>
				<td>:</td>
				<td><?php echo $tamp['username']; ?>(<?php echo $tamp['level']; ?>)</td>
			</tr>
			
			<tr>
				<td>Pelanggan</td>
				<td>:</td>
				<td><?php echo $tamp2['nama'] ?></td>
			</tr>
			<tr>
				<td colspan="4">=============================</td>
			</tr>
		</table>
		<table class="tabel2">
			<?php 
				foreach($qwe3 as $tmp3) {
			 ?>
			 <tr>
			 	<td><?php echo $tmp3['nama_brg'] ?></td>
			 	<td><?php echo $tmp3['harga'] ?></td>
			 	<td><?php echo $tmp3['jumlah_beli'] ?></td>
			 	<td><?php echo $tmp3['subtotal']; ?></td>
			 </tr>
			<?php } ?>
				
		
			<tr>
				<td colspan="4">=============================</td>
			</tr>
		</table>
		<table class="tabel3">
			<tr>
				<td>Total</td>
				<td>:</td>
				<td><?php echo $tamp4['total']; ?></td>
			</tr>
			<tr>
				<td>Diskon</td>
				<td>:</td>
				<td><?php echo $tamp4['diskon'] ?></td>
			</tr>
			<tr>
				<td style="font-weight: bold;"> Grand Total</td>
				<td>:</td>
				<td><?php echo $tamp4['total']-$tamp4['diskon']; ?></td>
			</tr>
			<tr>
				<td>Tunai</td>
				<td>:</td>
				<td><?php echo $tamp4['bayar']; ?></td>
			</tr>
			<tr>
				<td colspan="4">======================</td>
			</tr>
		</table>
		<table class="tabel4">
			<tr>
				<td>Kembali</td>
				<td>:</td>
				<td><?php echo $tamp4['bayar']-$tamp4['total']; ?></td>
			</tr>
		</table>
		<div class="foot">
			<p> Terimakasih Atas Kunjungan Anda</p>
			<p> Semoga Anda Puas Dengan Layanan Anda</p>
			<p>-----------------------------</p>
			<p>Pembeli Adalah Raja</p>
		</div>
	</div>
</div>

</body>
</html>
<script type="text/javascript">
	window.print();
</script>