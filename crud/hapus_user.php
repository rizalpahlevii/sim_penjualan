<?php 
	
	session_start();
	if(!isset($_SESSION["login"])){
		header("Location: ../login.php");
		exit;
	}
	
	include "../system/proses.php";
	$idu = $_GET['idu'];
	$hapus = $db->delete("petugas","id_petugas='$idu'");
	if( $hapus ){
		echo "<script>alert('Data Berhasil Dihapus')</script>";
		echo "<script>document.location.href='../index.php?p=user'</script>";
	}else{
		echo "<script>alert('Data Gagal Dihapus')</script>";
		echo "<script>document.location.href='../index.php?p=user'</script>";
	}
 ?>