<?php
	
	session_start();
	if(!isset($_SESSION["login"])){
		header("Location: ../login.php");
		exit;
	}
	 
	include "../system/proses.php";
	$idj = $_GET['idj'];
	$hapus = $db->delete("jenis","id_jenis=$idj");
	if( $hapus ){
		echo "<script>alert('Data Berhasil Dihapus')</script>";
		echo "<script>document.location.href='../index.php?p=jenis_barang'</script>";
	}else{
		echo "<script>alert('Data Gagal Dihapus')</script>";
		echo "<script>document.location.href='../index.php?p=jenis_barang'</script>";
	}
	
 ?>