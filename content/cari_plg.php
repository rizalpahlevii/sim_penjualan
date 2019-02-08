<?php 
	include "../system/proses.php";
	$query = $db->get("*","pelanggan","WHERE id_pelanggan = '$_POST[id_pelanggan]'");
	$tampil = $query->fetch();
	$hasilnya = array('id_pelanggan'=>$tampil['id_pelanggan'],
					'nama_pelanggan'=>$tampil['nama']);
	echo json_encode($hasilnya);
 ?>