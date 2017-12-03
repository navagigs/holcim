-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2017 at 12:35 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_holcim`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(5) NOT NULL,
  `admin_nama` varchar(50) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_level` enum('1','2') NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_password`, `admin_username`, `admin_email`, `admin_level`) VALUES
(1, 'Holcim Administrator', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'sertifikasi@holcim.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `departemen_id` int(11) NOT NULL,
  `departemen_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`departemen_id`, `departemen_nama`) VALUES
(1, 'Aplikasi'),
(2, 'Akuntansi');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `karyawan_nip` varchar(50) NOT NULL,
  `karyawan_nama` varchar(100) NOT NULL,
  `karyawan_email` varchar(100) NOT NULL,
  `karyawan_tlp` varchar(20) NOT NULL,
  `departemen_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`karyawan_nip`, `karyawan_nama`, `karyawan_email`, `karyawan_tlp`, `departemen_id`) VALUES
('114409111', 'Nava Gia Ginasta', 'navagiaginasta@gmail.com', '087820033395', 2),
('1144096', 'Nava Gia Ginasta1', 'navagiaginasta@gmail.com1', '0878200333951', 2);

-- --------------------------------------------------------

--
-- Table structure for table `penerima_sertifikasi`
--

CREATE TABLE `penerima_sertifikasi` (
  `penerima_id` int(11) NOT NULL,
  `penerima_nama` varchar(100) NOT NULL,
  `penerima_tgl` date NOT NULL,
  `penerima_keterangan` text NOT NULL,
  `subarea_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerima_sertifikasi`
--

INSERT INTO `penerima_sertifikasi` (`penerima_id`, `penerima_nama`, `penerima_tgl`, `penerima_keterangan`, `subarea_id`) VALUES
(1, 'NAVA', '2017-10-10', 'Ket', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sertifikasi`
--

CREATE TABLE `sertifikasi` (
  `sertifikasi_id` int(11) NOT NULL,
  `karyawan_nip` varchar(50) NOT NULL,
  `sertifikasi_nama` varchar(100) NOT NULL,
  `sertifikasi_tgl` date NOT NULL,
  `sertifikasi_noreg` varchar(50) NOT NULL,
  `sertifikasi_tglpelaksanaan` date NOT NULL,
  `sertifikasi_provider` varchar(100) NOT NULL,
  `sertifikasi_status` enum('BARU','PERPANJANGAN') NOT NULL DEFAULT 'BARU',
  `sertifikasi_tglberlaku` date NOT NULL,
  `sertifikasi_masaberlaku` varchar(100) NOT NULL,
  `sertifikasi_keterangan` text NOT NULL,
  `penerima_id` int(11) NOT NULL,
  `departemen_id` int(11) NOT NULL,
  `subarea_id` int(11) NOT NULL,
  `tahun_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sertifikasi`
--

INSERT INTO `sertifikasi` (`sertifikasi_id`, `karyawan_nip`, `sertifikasi_nama`, `sertifikasi_tgl`, `sertifikasi_noreg`, `sertifikasi_tglpelaksanaan`, `sertifikasi_provider`, `sertifikasi_status`, `sertifikasi_tglberlaku`, `sertifikasi_masaberlaku`, `sertifikasi_keterangan`, `penerima_id`, `departemen_id`, `subarea_id`, `tahun_id`) VALUES
(2, '1144096', 'Web developers', '2017-10-12', 'SERT/123/12P2', '2017-10-13', 'Telkom', 'PERPANJANGAN', '2022-10-12', '2020-10-12', '-', 1, 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subarea`
--

CREATE TABLE `subarea` (
  `subarea_id` int(11) NOT NULL,
  `subarea_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subarea`
--

INSERT INTO `subarea` (`subarea_id`, `subarea_nama`) VALUES
(3, 'Bandung'),
(4, 'Cianjur');

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE `tahun` (
  `tahun_id` int(11) NOT NULL,
  `tahun_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun`
--

INSERT INTO `tahun` (`tahun_id`, `tahun_nama`) VALUES
(1, '2012');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`departemen_id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`karyawan_nip`);

--
-- Indexes for table `penerima_sertifikasi`
--
ALTER TABLE `penerima_sertifikasi`
  ADD PRIMARY KEY (`penerima_id`);

--
-- Indexes for table `sertifikasi`
--
ALTER TABLE `sertifikasi`
  ADD PRIMARY KEY (`sertifikasi_id`);

--
-- Indexes for table `subarea`
--
ALTER TABLE `subarea`
  ADD PRIMARY KEY (`subarea_id`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`tahun_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `departemen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `penerima_sertifikasi`
--
ALTER TABLE `penerima_sertifikasi`
  MODIFY `penerima_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sertifikasi`
--
ALTER TABLE `sertifikasi`
  MODIFY `sertifikasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `subarea`
--
ALTER TABLE `subarea`
  MODIFY `subarea_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `tahun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
