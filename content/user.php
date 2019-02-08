<?php 
	include "system/proses.php";
 ?>
<div class="judul-content">
	<h1>User</h1>
</div>
<div class="isi-content">
	<a href="index.php?p=f_user" class="link-tambah-barang">Tambah</a>
		<div class="judul-home">
			
			<div class="divtabel">
			<table class="tabel98">
				<tr>
					<th>ID Petugas</th>
					<th>Username</th>
					<th>Password</th>
					<th>level</th>
					<th>Action</th>
				</tr>
				<?php 
					$qw=$db->get("*","petugas","ORDER BY id_petugas ASC");
					foreach($qw as $tamp_user) :
				 ?>
				<tr>
					<td><?= $tamp_user['id_petugas']; ?></td>
					<td><?= $tamp_user['username'] ?></td>
					<td><?= $tamp_user['password']; ?></td>
					<td><?= $tamp_user['level']; ?></td>
					<td>
						<a href="crud/hapus_user.php?idu=<?= $tamp_user['id_petugas']; ?>" class="btn btn-merah" onclick="return confirm('Yakin Ingin Menghapus ?')"><i class="fa fa-trash-alt"></i> Hapus</a>
						<a href="index.php?p=f_user&id_user=<?= $tamp_user['id_petugas']; ?>" class="btn btn-kuning"><i class="fa fa-user-edit"></i> Edit</a>
					</td>

				</tr>
				<?php 
					endforeach;
				 ?>
			</table>
			</div>
		</div>
</div>