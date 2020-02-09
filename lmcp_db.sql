-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2019 at 01:49 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lmcp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `lmcp_daftar_desain`
--

CREATE TABLE `lmcp_daftar_desain` (
  `id_daftar_cetak` int(10) NOT NULL,
  `kode_pemesanan` varchar(20) NOT NULL,
  `kode_jenis_cetakan` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lmcp_gaji_karyawan`
--

CREATE TABLE `lmcp_gaji_karyawan` (
  `id_gaji_karyawan` int(5) NOT NULL,
  `id_karyawan` int(5) NOT NULL,
  `tanggal` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmcp_gaji_karyawan`
--

INSERT INTO `lmcp_gaji_karyawan` (`id_gaji_karyawan`, `id_karyawan`, `tanggal`) VALUES
(14, 4, 'January 2019'),
(15, 4, 'February 2019'),
(16, 4, 'March 2019'),
(17, 4, 'April 2019'),
(18, 4, 'May 2019');

-- --------------------------------------------------------

--
-- Table structure for table `lmcp_jenis_desain`
--

CREATE TABLE `lmcp_jenis_desain` (
  `kode_jenis_cetakan` int(5) NOT NULL,
  `id_jenis_satuan` int(10) NOT NULL,
  `nama_cetakan` varchar(100) NOT NULL,
  `harga` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmcp_jenis_desain`
--

INSERT INTO `lmcp_jenis_desain` (`kode_jenis_cetakan`, `id_jenis_satuan`, `nama_cetakan`, `harga`) VALUES
(6, 3, 'Paket Bronze - Desain Logo', 75000),
(7, 3, 'Paket Silver - Desain Logo', 150000),
(8, 3, 'Paket Gold - Desain Logo', 200000),
(9, 3, 'Paket Bronze - Desain Kartu Nama', 50000),
(10, 3, 'Paket Silver - Desain Kartu Nama', 100000),
(11, 3, 'Paket Gold - Desain Kartu Nama', 125000),
(12, 3, 'Paket Bronze - Desain Produk', 125000),
(13, 3, 'Paket Silver - Desain Produk', 200000),
(14, 3, 'Paket Gold - Desain Produk', 300000),
(15, 3, 'Paket Bronze - Desain Sertifikat', 50000),
(16, 3, 'Paket Silver - Desain Sertifikat', 100000),
(17, 3, 'Paket Gold - Desain Sertifikat', 175000),
(18, 3, 'Paket Bronze - Desain Banner', 75000),
(19, 3, 'Paket Silver - Desain Banner', 150000),
(20, 3, 'Paket Gold - Desain Banner', 200000),
(21, 3, 'Paket Bronze - Desain Brosur/Flyer', 75000),
(22, 3, 'Paket Silver - Desain Brosur/Flyer', 150000),
(23, 3, 'Paket Gold - Desain Brosur/Flyer', 200000),
(24, 3, 'Paket Bronze - Desain Poster', 75000),
(25, 3, 'Paket Silver - Desain Poster', 150000),
(26, 3, 'Paket Gold - Desain Poster', 200000),
(28, 3, 'Paket Bronze - Desain Kartu Undangan', 100000),
(29, 3, 'Paket Silver - Desain Kartu Undangan', 200000),
(30, 3, 'Paket Gold - Desain Kartu Undangan', 275000),
(31, 3, 'Paket Bronze - Desain Kalender', 100000),
(32, 3, 'Paket Silver - Desain Kalender', 200000),
(33, 3, 'Paket Gold - Desain Kalender', 250000),
(34, 5, 'Paket Bronze - Desain Company Profile Video', 300000),
(35, 5, 'Paket Silver - Desain Company Profile Video', 400000),
(36, 5, 'Paket Gold - Desain Company Profile Video', 500000),
(37, 5, 'Paket Bronze - Desain Vlog Video', 300000),
(38, 5, 'Paket Silver - Desain Vlog Video', 400000),
(39, 5, 'Paket Gold - Desain Vlog Video', 500000),
(40, 5, 'Paket Bronze - Desain Motion Graphic', 300000),
(41, 5, 'Paket Silver - Desain Motion Graphic', 400000),
(42, 5, 'Paket Gold - Desain Motion Graphic', 500000),
(43, 6, 'Paket Bronze - Desain Website', 450000),
(44, 6, 'Paket Silver - Desain Website', 550000),
(45, 6, 'Paket Gold - Desain Website', 850000);

-- --------------------------------------------------------

--
-- Table structure for table `lmcp_jenis_satuan`
--

CREATE TABLE `lmcp_jenis_satuan` (
  `id_jenis_satuan` int(10) NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmcp_jenis_satuan`
--

INSERT INTO `lmcp_jenis_satuan` (`id_jenis_satuan`, `satuan`) VALUES
(3, 'ai/psd'),
(5, 'mp4'),
(6, 'Website');

-- --------------------------------------------------------

--
-- Table structure for table `lmcp_karyawan`
--

CREATE TABLE `lmcp_karyawan` (
  `id_karyawan` int(5) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `gaji_pokok` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmcp_karyawan`
--

INSERT INTO `lmcp_karyawan` (`id_karyawan`, `nama_karyawan`, `alamat`, `gaji_pokok`) VALUES
(4, 'Abdul Arrasyid', 'Jakarta', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `lmcp_kwitansi`
--

CREATE TABLE `lmcp_kwitansi` (
  `kode_kwitansi` varchar(20) NOT NULL,
  `kode_nota` varchar(20) NOT NULL,
  `tgl_bayar` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lmcp_pelanggan`
--

CREATE TABLE `lmcp_pelanggan` (
  `kode_pelanggan` int(5) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmcp_pelanggan`
--

INSERT INTO `lmcp_pelanggan` (`kode_pelanggan`, `nama_pelanggan`, `jenis`, `alamat_pelanggan`) VALUES
(36, 'Elvania IJ', 'Umum', 'Karawang'),
(37, 'KP2M UIN SGD Bandung', 'Umum', 'Bandung'),
(38, 'BUMN Event', 'Umum', 'Karawang'),
(39, 'HIMAPI UNISBA', 'Umum', 'Bandung'),
(40, 'Aan Rohanah', 'Umum', 'Karawang'),
(41, 'FOSIL 2018', 'Umum', 'Karawang'),
(42, 'HMJ SPI UIN SGD', 'Umum', 'Bandung'),
(43, 'Historis Cathering', 'Umum', 'Bandung'),
(44, 'Moba Cathering', 'Umum', 'Bandung'),
(45, 'Gilva Selvia', 'Umum', 'Bandung'),
(46, 'JP Project', 'Umum', 'Bandung'),
(47, 'LKBB Citarik', 'Umum', 'Bekasi'),
(48, 'RF Keripik Pangsit', 'Perusahaan', 'Tasikmalaya'),
(49, 'SPI UIN SGD', 'Umum', 'Bandung'),
(50, 'SPI 6-B UIN SGD Bandung', 'Umum', 'Bandung'),
(51, 'PT. Otscon Safety Indonesia', 'Perusahaan', 'Karawang'),
(52, 'Milokepalbhe', 'Perusahaan', 'Karawang'),
(53, 'Pempek Trijaya', 'Perusahaan', 'Purwakarta'),
(54, 'RED Cigor', 'Perusahaan', 'Tasikmalaya'),
(55, 'Rizky Cell', 'Perusahaan', 'Tasikmalaya'),
(56, 'Batagor Plankton', 'Perusahaan', 'Tasikmalaya');

-- --------------------------------------------------------

--
-- Table structure for table `lmcp_pembayaran`
--

CREATE TABLE `lmcp_pembayaran` (
  `kode_pembayaran` varchar(30) NOT NULL,
  `kode_pemesanan` varchar(30) NOT NULL,
  `tgl_bayar` varchar(40) NOT NULL,
  `bayar` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmcp_pembayaran`
--

INSERT INTO `lmcp_pembayaran` (`kode_pembayaran`, `kode_pemesanan`, `tgl_bayar`, `bayar`) VALUES
('PM00000001', 'PS00000004', '21 March 2019', 300000),
('PM00000002', 'PS00000002', '21 September 2018', 500000),
('PM00000004', 'PS00000001', '26 May 2019', 300000),
('PM00000005', 'PS00000005', '21 December 2018', 125000),
('PM00000006', 'PS00000006', '02 January 2019', 75000),
('PM00000007', 'PS00000007', '16 September 2018', 75000),
('PM00000008', 'PS00000008', '14 July 2018', 150000),
('PM00000009', 'PS00000009', '17 July 2018', 75000),
('PM00000010', 'PS00000010', '17 July 2018', 75000),
('PM00000011', 'PS00000011', '02 February 2019', 75000),
('PM00000012', 'PS00000013', '03 March 2019', 300000),
('PM00000013', 'PS00000014', '28 November 2018', 75000),
('PM00000014', 'PS00000015', '31 August 2018', 1000000),
('PM00000015', 'PS00000016', '01 May 2019', 75000),
('PM00000016', 'PS00000021', '08 May 2019', 75000),
('PM00000017', 'PS00000022', '11 May 2019', 50000),
('PM00000018', 'PS00000023', '27 November 2018', 100000),
('PM00000019', 'PS00000018', '14 May 2019', 50000),
('PM00000020', 'PS00000003', '18 May 2019', 25000),
('PM00000021', 'PS00000020', '19 May 2019', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `lmcp_pemesanan`
--

CREATE TABLE `lmcp_pemesanan` (
  `kode_pemesanan` varchar(20) NOT NULL,
  `tgl_pesan` varchar(30) NOT NULL,
  `tgl_selesai` varchar(30) NOT NULL,
  `kode_pelanggan` int(5) NOT NULL,
  `jumlah_harga` int(20) NOT NULL,
  `uang_muka` int(20) NOT NULL,
  `status_pembayaran` varchar(50) NOT NULL DEFAULT 'Belum Lunas'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmcp_pemesanan`
--

INSERT INTO `lmcp_pemesanan` (`kode_pemesanan`, `tgl_pesan`, `tgl_selesai`, `kode_pelanggan`, `jumlah_harga`, `uang_muka`, `status_pembayaran`) VALUES
('PS00000004', '18 March 2019', '21 March 2019', 38, 300000, 300000, 'Lunas'),
('PS00000003', '15 May 2019', '18 May 2019', 56, 75000, 50000, 'Lunas'),
('PS00000002', '21 September 2018', '24 September 2018', 37, 500000, 500000, 'Lunas'),
('PS00000001', '14 April 2019', '26 April 2019', 36, 300000, 300000, 'Lunas'),
('PS00000005', '21 December 2018', '24 December 2018', 39, 125000, 125000, 'Lunas'),
('PS00000006', '02 January 2019', '05 January 2019', 40, 75000, 75000, 'Lunas'),
('PS00000007', '16 September 2018', '19 September 2018', 41, 75000, 75000, 'Lunas'),
('PS00000008', '14 July 2018', '17 July 2018', 42, 150000, 150000, 'Lunas'),
('PS00000009', '17 July 2018', '20 July 2018', 43, 75000, 75000, 'Lunas'),
('PS00000010', '17 July 2018', '20 July 2018', 44, 75000, 75000, 'Lunas'),
('PS00000011', '02 February 2019', '06 February 2019', 45, 75000, 75000, 'Lunas'),
('PS00000013', '03 March 2019', '06 March 2019', 46, 300000, 300000, 'Lunas'),
('PS00000014', '28 November 2018', '01 December 2018', 47, 75000, 75000, 'Lunas'),
('PS00000015', '21 August 2018', '30 August 2018', 51, 850000, 850000, 'Lunas'),
('PS00000016', '01 May 2019', '04 May 2019', 50, 75000, 75000, 'Lunas'),
('PS00000017', '14 May 2019', '17 May 2019', 52, 75000, 25000, 'Belum Lunas'),
('PS00000018', '13 May 2019', '16 May 2019', 50, 75000, 25000, 'Lunas'),
('PS00000019', '15 May 2019', '18 May 2019', 42, 150000, 50000, 'Belum Lunas'),
('PS00000020', '16 May 2019', '19 May 2019', 53, 75000, 25000, 'Lunas'),
('PS00000021', '08 May 2019', '11 May 2019', 54, 75000, 75000, 'Lunas'),
('PS00000022', '11 May 2019', '14 May 2019', 55, 50000, 50000, 'Lunas'),
('PS00000023', '27 November 2018', '30 November 2018', 45, 100000, 100000, 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `lmcp_pemesanan_detail`
--

CREATE TABLE `lmcp_pemesanan_detail` (
  `id_pemesanan_detail` int(10) NOT NULL,
  `kode_pemesanan` varchar(30) NOT NULL,
  `kode_jenis_cetakan` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmcp_pemesanan_detail`
--

INSERT INTO `lmcp_pemesanan_detail` (`id_pemesanan_detail`, `kode_pemesanan`, `kode_jenis_cetakan`, `jumlah`) VALUES
(67, 'PS00000001', 40, 1),
(71, 'PS00000003', 24, 1),
(77, 'PS00000006', 6, 1),
(79, 'PS00000007', 6, 1),
(81, 'PS00000008', 18, 2),
(83, 'PS00000009', 24, 1),
(85, 'PS00000010', 24, 1),
(86, 'PS00000011', 24, 1),
(88, 'PS00000013', 37, 1),
(90, 'PS00000014', 6, 1),
(92, 'PS00000015', 45, 1),
(94, 'PS00000016', 18, 1),
(96, 'PS00000017', 24, 1),
(98, 'PS00000018', 24, 1),
(100, 'PS00000019', 15, 3),
(102, 'PS00000020', 6, 1),
(104, 'PS00000021', 6, 1),
(106, 'PS00000022', 9, 1),
(108, 'PS00000023', 15, 2),
(110, 'PS00000004', 37, 1),
(111, 'PS00000002', 12, 4),
(112, 'PS00000005', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lmcp_sessions`
--

CREATE TABLE `lmcp_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmcp_sessions`
--

INSERT INTO `lmcp_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('d1fd29e047536cb7d17f4d3bcc37d1e3', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', 1558654823, '');

-- --------------------------------------------------------

--
-- Table structure for table `lmcp_setting`
--

CREATE TABLE `lmcp_setting` (
  `id_setting` int(10) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content_setting` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmcp_setting`
--

INSERT INTO `lmcp_setting` (`id_setting`, `tipe`, `title`, `content_setting`) VALUES
(1, 'site_title', 'Nama Situs', 'LM Creative Project System'),
(2, 'site_quotes', 'Quotes Situs', 'Your satisfaction is our responsibility'),
(3, 'site_footer', 'Teks Footer', 'LM Creative Poject - 2019 <br>LMCP System'),
(4, 'key_login', 'Hash Key MD5', 'AppPercetakan32'),
(5, 'site_theme', 'Theme Folder', 'flat-dot'),
(6, 'site_limit_small', 'Limit Data Small', '5'),
(7, 'site_limit_medium', 'Limit Data Medium', '10');

-- --------------------------------------------------------

--
-- Table structure for table `lmcp_user`
--

CREATE TABLE `lmcp_user` (
  `kode_user` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL,
  `nama_user` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmcp_user`
--

INSERT INTO `lmcp_user` (`kode_user`, `username`, `password`, `level`, `nama_user`) VALUES
(1, 'admin', '4c47281cf940a96b55dc2323d237f190', 'admin', 'Abdul Latif Munjiat'),
(4, 'kasir', 'f2f9e8daebf8c0ebceef0050fe6c2423', 'kasir', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lmcp_daftar_desain`
--
ALTER TABLE `lmcp_daftar_desain`
  ADD PRIMARY KEY (`id_daftar_cetak`);

--
-- Indexes for table `lmcp_gaji_karyawan`
--
ALTER TABLE `lmcp_gaji_karyawan`
  ADD PRIMARY KEY (`id_gaji_karyawan`);

--
-- Indexes for table `lmcp_jenis_desain`
--
ALTER TABLE `lmcp_jenis_desain`
  ADD PRIMARY KEY (`kode_jenis_cetakan`);

--
-- Indexes for table `lmcp_jenis_satuan`
--
ALTER TABLE `lmcp_jenis_satuan`
  ADD PRIMARY KEY (`id_jenis_satuan`);

--
-- Indexes for table `lmcp_karyawan`
--
ALTER TABLE `lmcp_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `lmcp_kwitansi`
--
ALTER TABLE `lmcp_kwitansi`
  ADD PRIMARY KEY (`kode_kwitansi`);

--
-- Indexes for table `lmcp_pelanggan`
--
ALTER TABLE `lmcp_pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`);

--
-- Indexes for table `lmcp_pembayaran`
--
ALTER TABLE `lmcp_pembayaran`
  ADD PRIMARY KEY (`kode_pembayaran`);

--
-- Indexes for table `lmcp_pemesanan`
--
ALTER TABLE `lmcp_pemesanan`
  ADD PRIMARY KEY (`kode_pemesanan`);

--
-- Indexes for table `lmcp_pemesanan_detail`
--
ALTER TABLE `lmcp_pemesanan_detail`
  ADD PRIMARY KEY (`id_pemesanan_detail`);

--
-- Indexes for table `lmcp_sessions`
--
ALTER TABLE `lmcp_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `lmcp_setting`
--
ALTER TABLE `lmcp_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `lmcp_user`
--
ALTER TABLE `lmcp_user`
  ADD PRIMARY KEY (`kode_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lmcp_daftar_desain`
--
ALTER TABLE `lmcp_daftar_desain`
  MODIFY `id_daftar_cetak` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lmcp_gaji_karyawan`
--
ALTER TABLE `lmcp_gaji_karyawan`
  MODIFY `id_gaji_karyawan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `lmcp_jenis_desain`
--
ALTER TABLE `lmcp_jenis_desain`
  MODIFY `kode_jenis_cetakan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `lmcp_jenis_satuan`
--
ALTER TABLE `lmcp_jenis_satuan`
  MODIFY `id_jenis_satuan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `lmcp_karyawan`
--
ALTER TABLE `lmcp_karyawan`
  MODIFY `id_karyawan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lmcp_pelanggan`
--
ALTER TABLE `lmcp_pelanggan`
  MODIFY `kode_pelanggan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `lmcp_pemesanan_detail`
--
ALTER TABLE `lmcp_pemesanan_detail`
  MODIFY `id_pemesanan_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `lmcp_setting`
--
ALTER TABLE `lmcp_setting`
  MODIFY `id_setting` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `lmcp_user`
--
ALTER TABLE `lmcp_user`
  MODIFY `kode_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
