<?php
	
	session_start();
	if(!isset($_SESSION["login"])){
		header("Location: ../login.php");
		exit;
	}

include "../system/proses.php";
	$idb = $_GET['idb'];
	$hapus = $db->delete("barang","id_brg='$idb'");
	if( $hapus ){
		echo "<script>alert('Data Berhasil Dihapus')</script>";
		echo "<script>document.location.href='../index.php?p=barang'</script>";
	}else{
		echo "<script>alert('Data Gagal Dihapus')</script>";
		echo "<script>document.location.href='../index.php?p=barang'</script>";
	}
	
 ?>