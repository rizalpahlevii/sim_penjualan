<?php 
	$conn = mysqli_connect("localhost","root","","penjualan2");
	$qr = mysqli_query($conn,"SELECT tanggal FROM transaksi LIMIT 1");
	while ($t = mysqli_fetch_array($qr)) {
		$data = explode('-', $t['tanggal']);
		$tahun = $data[0];
		 echo "<option value='$tahun'>$tahun</option>";
	}


 ?>