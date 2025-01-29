<?php
include "../system/proses.php";

$simpan = $db->insert("detail_transaksi", "
												'',
												'$_POST[id_transaksi]',
												'$_POST[id_barang]',
												'$_POST[jumlah_beli]',
												'$_POST[total]'");
if ($simpan) {
    echo "Berhasil Disimpan";
} else {
    echo "Gagal";
}

?>