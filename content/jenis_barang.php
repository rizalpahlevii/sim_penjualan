<?php 
	include "system/proses.php";

 ?>


<div class="judul-content">
	<h1>Jenis Barang</h1>
</div>
<div class="isi-content">
	<a href="index.php?p=f_jenis" class="link-tambah-barang">Tambah</a>
	<div class="judul-home">
		<div class="divtabel">
		<table class="tabel98">
			<tr>
				<th>ID Jenis</th>
				<th>Nama Jenis</th>
				<th>Action</th>
			</tr>
			<?php 
				$qw=$db->get("*","jenis","ORDER BY id_jenis ASC");
				foreach( $qw as $tamp_jenis){

			 ?>
			<tr>
				<td><?= $tamp_jenis['id_jenis']; ?></td>
				<td><?= $tamp_jenis['nama_jenis']; ?></td>
				<td>
					<a href="crud/hapus_jenis.php?idj=<?= $tamp_jenis['id_jenis']; ?>" class="btn btn-merah" onclick="return confirm('Yakin Ingin Menghapus Data ?');"><i class="fa fa-trash-alt"></i> Hapus</a>


					<a href="index.php?p=f_jenis&id_jenis=<?php echo $tamp_jenis['id_jenis']; ?>" class="btn btn-kuning"><i class="fa fa-pen"></i> Edit</a>
				</td>
				
			</tr>
			<?php 
				}
			 ?>
		</table>
		</div>
	</div>
</div>