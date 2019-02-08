<?php 
	include "../system/proses.php";
	$query = $db->get("*","barang","WHERE id_brg = '$_POST[id_barang]'");
	$tampil = $query->fetch();
	$hasilnya = array('id_barang'=>$tampil['id_brg'],
					'nama_barang'=>$tampil['nama_brg'],
					'harga'=>$tampil['harga']);
	echo json_encode($hasilnya);
 ?>