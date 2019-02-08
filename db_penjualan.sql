-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2019 at 07:32 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_brg` varchar(10) NOT NULL,
  `nama_brg` varchar(150) DEFAULT NULL,
  `harga` int(50) DEFAULT NULL,
  `stok` int(50) DEFAULT NULL,
  `expired` date DEFAULT NULL,
  `id_jenis_brg` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_brg`, `nama_brg`, `harga`, `stok`, `expired`, `id_jenis_brg`) VALUES
('BR001', 'Indomie', 2000, 300, '2019-11-22', '003'),
('BR002', 'Kopi', 3000, 90, '2018-10-05', '004'),
('BR003', 'Berass', 15000, 1000, '2023-05-17', '001'),
('BR004', 'Susu', 2000, 10000, '2018-11-02', '004'),
('BR005', 'Aqua', 5000, 1000, '2018-11-01', '004'),
('BR007', 'Pel', 100000, 10, '2018-12-29', '005');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(8) NOT NULL,
  `id_transaksi` varchar(8) NOT NULL,
  `id_brg` varchar(8) NOT NULL,
  `jumlah_beli` int(10) NOT NULL,
  `subtotal` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` varchar(8) NOT NULL,
  `nama_jenis` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
('001', 'Sembako'),
('002', 'Peralatan Rumah'),
('003', 'Makanan'),
('004', 'Minuman'),
('005', 'Rumah Tangga');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(35) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_telp`, `email`) VALUES
('P001', 'RizalPahlevi', 'Mojo Lembah', '081327551680', 'rizalpahlevi_37@hotmail.com'),
('P002', 'Rizal', 'Mojo', '09786', 'jhjgghfhsd'),
('P003', 'Ardhi', 'Kaligarang', '083345435', 'ardhi@gmail.com'),
('P004', 'Asrof', 'Sirahan', '093423', 'Asrof@gmail.com'),
('P005', 'Fildan', 'Damarwulan', '093242342', 'Fildan@gmail.com'),
('P006', 'Aik', 'UjungWatu', '092378234', 'Bagas@gmail.com'),
('P007', 'Paijan', 'Pejeng', '08989888111', 'Paijan00@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` varchar(7) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `level`) VALUES
('U01', 'admin', 'admin', 'admin'),
('U02', 'manager', 'manager', 'manager'),
('U03', 'kasir', 'kasir', 'kasir'),
('U04', 'Rizal', 'Pahlevi', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(8) NOT NULL,
  `id_pelanggan` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `id_petugas` varchar(8) NOT NULL,
  `total` int(12) NOT NULL,
  `diskon` int(12) NOT NULL,
  `bayar` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
