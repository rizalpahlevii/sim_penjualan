<?php
	
	session_start();
	error_reporting(0);

	if(!isset($_SESSION["login"])){
		header("Location: login.php");
		exit;
	}
	$level = $_SESSION['level'];

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>SIM Penjualan</title>
	<!-- Style -->
	<link rel="stylesheet" type="text/css" href="assets/css/custom.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.min.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

</head>
<body>
	<div class="header">

		<div class="judul">
			<h1>SIM Penjualan</h1>
		</div>

	</div>
	<div class="sidebar">

		<div class="menu">
			
			<ul>
				<?php 
				if($_SESSION['level']=="admin"){
					$home="";
					$user="";
					$barang="";
					$pelanggan="";
					$jenis="";
					$transaksi="";
					$laporan="hidden";
					$gp="hidden";
					$lpr="hidden";
				}elseif($_SESSION['level']=="kasir"){
					$home="";
					$user="hidden";
					$barang="hidden";
					$pelanggan="hidden";
					$jenis="hidden";
					$transaksi="";
					$laporan="hidden";
					$gp="";
					$lpr="hidden";
				}else{
					$home="";
					$user="hidden";
					$barang="hidden";
					$pelanggan="hidden";
					$jenis="hidden";
					$transaksi="hidden";
					$laporan="";
					$gp="hidden";
				}


				 ?>
				<li <?php echo $home; ?>><a href="index.php?p=home"><i class="fas fa-tachometer-alt"></i> Beranda</a></li>

				<li <?php echo $user; ?>><a href="index.php?p=user"><i class="fa fa-user"></i> User</a></li>

				<li <?php echo $barang; ?>><a href="index.php?p=barang"><i class="fa fa-shopping-cart"></i> Barang</a></li>

				<li <?php echo $pelanggan; ?>><a href="index.php?p=pelanggan"><i class="fa fa-user-friends"></i> Pelanggan</a></li>

				<li <?php echo $jenis; ?>><a href="index.php?p=jenis_barang"><i class="fa fa-tags"></i> Jenis Barang</a></li>

				<li <?php echo $transaksi; ?>><a href="index.php?p=transaksi"><i class="fas fa-table"></i> Transaksi</a></li>

				<li <?php echo $gp; ?>><a href="index.php?p=ganti_password"><i class="fas fa-user-lock"></i> Ganti Password</a></li>

				
				<li <?php echo $laporan; ?> id="lpr"><a href="#"><i class="fas fa-print"></i> Laporan</a></li>


				<li <?php echo $lpr; ?> id="lpr1" style="background-color: #2c3b41;"><a href="index.php?p=laporan_pertanggal" style="margin-left: 10px;">Per Tanggal</a></li>

				<li <?php echo $lpr; ?> id="lpr2" style="background-color: #2c3b41;"><a href="index.php?p=laporan_perbulan" style="margin-left: 10px;">Per Bulan</a></li>

				<li <?php echo $lpr; ?> id="lpr3" style="background-color: #2c3b41;"><a href="index.php?p=laporan_pertahun" style="margin-left: 10px;">Per Tahun</a></li>


				<li <?php echo $home; ?>><a href="logout.php" onclick="return confirm('Yakin Ingin Logout ?')"><i class="fa fa-sign-out-alt"></i> Logout</a></li>

			</ul>
		</div>
	</div>
	<div class="content">
		<?php
			if ( empty($_GET['p']) ){
				echo "<script>document.location.href='index.php?p=home'</script>";
			}else{
				$p=$_GET['p'];
				include "content/$p.php";
			}
		 ?>
	</div>
	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/js/transaksi.js"></script>
</body>
</html>
