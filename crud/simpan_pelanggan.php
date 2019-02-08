<?php
	
	
	session_start();
	if(!isset($_SESSION["login"])){
		header("Location: ../login.php");
		exit;
	}


include "../system/proses.php";

	if( isset($_POST['simpan_pelanggan']) ){
		$simpan=$db->insert("pelanggan","'$_POST[id_pelanggan]',
									'$_POST[nama_pelanggan]',
									'$_POST[alamat]',
									'$_POST[no_telp]',
									'$_POST[email]'");
		if( $simpan ){
			echo "<script>alert('Data Berhasil Disimpan')</script>";
			echo "<script>document.location.href='../index.php?p=pelanggan'</script>";
		}else{
			echo "<script>alert('Data Gagal Disimpan')</script>";
			echo "<script>document.location.href='../index.php?p=pelanggan'</script>";
		}
		
	}else{
		$edit=$db->update("pelanggan","id_pelanggan='$_POST[id_pelanggan]',
									nama='$_POST[nama_pelanggan]',
									alamat='$_POST[alamat]',
									no_telp='$_POST[no_telp]',
									email='$_POST[email]'",
									"id_pelanggan = '$_POST[id_pelanggan]'");

		if( $edit ){
			echo "<script>alert('Data Berhasil Diupdate')</script>";
			echo "<script>document.location.href='../index.php?p=pelanggan'</script>";
		}else{
			echo "<script>alert('Data Gagal Diupdate')</script>";
			echo "<script>document.location.href='../index.php?p=pelanggan'</script>";
		}
	}

 ?>
 