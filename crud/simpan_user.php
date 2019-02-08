<?php 
	
	
	session_start();
	if(!isset($_SESSION["login"])){
		header("Location: ../login.php");
		exit;
	}

	include "../system/proses.php";
	if (isset($_POST['simpan_user'])){
		$simpan = $db->insert("petugas","'$_POST[id_user]',
										'$_POST[username]',
										'$_POST[password]',
										'$_POST[level]'");
		if ($simpan){
			echo "<script>alert('Data Berhasil Disimpan')</script>";
			echo "<script>document.location.href='../index.php?p=user'</script>";
		}else{
			echo "<script>alert('Data Gagal Disimpan')</script>";
			echo "<script>document.location.href='../index.php?p=user'</script>";
		}
	}else{
		$edit=$db->update("petugas","id_petugas='$_POST[id_user]',
									username='$_POST[username]',password='$_POST[password]',level='$_POST[level]'","id_petugas = '$_POST[id_user]'");

		if( $edit ){
			echo "<script>alert('Data Berhasil Diupdate')</script>";
			echo "<script>document.location.href='../index.php?p=user'</script>";
		}else{
			echo "<script>alert('Data Gagal Diupdate')</script>";
			echo "<script>document.location.href='../index.php?p=user'</script>";
		}
	}
 ?>