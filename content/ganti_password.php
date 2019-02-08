<?php 
	$id_petugas = $_SESSION['login_id'];
	$username = $_SESSION['username'];
?>
<div class="judul-content">
	<h1>Ganti Password</h1>
</div>
<div class="isi-content">
	<form action="crud/ganti_pass.php" method="POST">
		<table>
			<tr>
				<td><label for="id_petugas">ID Petugas</label></td>
			</tr>
			<tr>
				<td><input type="text" name="id_user" class="text disable" autocomplete="off" id="id_petugas" value="<?php echo $id_petugas; ?>" readonly></td>
			</tr>


			<tr>
				<td><label for="username">Username</label></td>
			</tr>
			<tr>
				<td><input type="text" name="username" class="text disable" autocomplete="off" required="" id="username" value="<?php echo $username; ?>" readonly></td>
			</tr>


			<tr>
				<td><label for="old">Password Lama</label></td>
			</tr>
			<tr>
				<td><input type="password" name="password_old" class="text" autocomplete="off" required="" id="old"></td>
			</tr>

			<tr>
				<td><label for="new">Password Baru</label></td>
			</tr>
			<tr>
				<td><input type="password" name="password_new" class="text" autocomplete="off" required="" id="new"></td>
			</tr>

			<tr>
				<td><label for="conf">Konfirmasi Password</label></td>
			</tr>
			<tr>
				<td><input type="password" name="password_conf" class="text" autocomplete="off" required="" id="conf"></td>
			</tr>

			



			

			<tr>
				<td><input type="submit" name="submit" value="Simpan" class="simpan"></td>
			</tr>


		</table>
	</form>
</div>