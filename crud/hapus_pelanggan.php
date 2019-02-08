<?php
	
	
	session_start();
	if(!isset($_SESSION["login"])){
		header("Location: ../login.php");
		exit;
	}
	 
	include "../system/proses.php";
	$idp = $_GET['idp'];
	$hapus = $db->delete("pelanggan","id_pelanggan='$idp'");
	if( $hapus ){
		echo "<script>alert('Data Berhasil Dihapus')</script>";
		echo "<script>document.location.href='../index.php?p=pelanggan'</script>";
	}else{
		echo "<script>alert('Data Gagal Dihapus')</script>";
		echo "<script>document.location.href='../index.php?p=pelanggan'</script>";
	}
 ?>