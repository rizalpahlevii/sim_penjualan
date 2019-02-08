<?php
	
	
	session_start();
	if(!isset($_SESSION["login"])){
		header("Location: ../login.php");
		exit;
	}

include "../system/proses.php";

	if( isset($_POST['simpan_jenis']) ){
		$simpan=$db->insert("jenis","'$_POST[id_jenis]',
									'$_POST[nama_jenis]'");
		if( $simpan ){
			echo "<script>alert('Data Berhasil Disimpan')</script>";
			echo "<script>document.location.href='../index.php?p=jenis_barang'</script>";
		}else{
			echo "<script>alert('Data Gagal Disimpan')</script>";
			echo "<script>document.location.href='../index.php?p=jenis_barang'</script>";
		}
	}else{
		$edit=$db->update("jenis","id_jenis='$_POST[id_jenis]',
									nama_jenis='$_POST[nama_jenis]'","id_jenis = '$_POST[id_jenis]'");

		if( $edit ){
			echo "<script>alert('Data Berhasil Diupdate')</script>";
			echo "<script>document.location.href='../index.php?p=jenis_barang'</script>";
		}else{
			echo "<script>alert('Data Gagal Diupdate')</script>";
			echo "<script>document.location.href='../index.php?p=jenis_barang'</script>";
		}
	}

 ?>