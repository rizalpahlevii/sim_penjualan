<?php 
	include "../system/proses.php";
	$idp = $_POST['idplgnn'];
	$ip = null;
	if(empty($idp)){
		$ip = "Non Pelanggan";
	}else{
		$ip = $idp;
	}
	
	if(isset($_POST['simpan'])){
		$simpan=$db->insert("transaksi","'$_POST[id_transaksi]',
									'$ip',
									'$_POST[tanggal]',
									'$_POST[id_user]',
									'$_POST[totalbayar]',
									'$_POST[diskon]',
									'$_POST[bayar]'");
		if($simpan){
			echo "<script>alert('Transaksi Berhasil')</script>";
			echo "<script>window.open('../struk/struk.php?idt=$_POST[id_transaksi]')</script>";
			echo "<script>document.location.href='../index.php?p=transaksi'</script>";
			

		}else{
			echo "<script>alert('Transaksi Gagal')</script>";
			echo "<script>document.location.href='../index.php?p=transaksi'</script>";
		}
	}
 ?>