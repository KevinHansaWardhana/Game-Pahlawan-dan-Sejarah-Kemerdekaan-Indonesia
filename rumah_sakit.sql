-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2021 at 07:10 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumah_sakit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '1234'),
('uas', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(45) NOT NULL,
  `alamat_dokter` varchar(45) NOT NULL,
  `jenkel` varchar(45) NOT NULL,
  `agama` varchar(45) NOT NULL,
  `no_telp` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `alamat_dokter`, `jenkel`, `agama`, `no_telp`) VALUES
(1, 'kevin hansa ', 'sukoharjo city ', 'Pilih Jenis Kelamin', 'Islam  ', '084555555555 '),
(2, 'hansa', 'surakarta', 'Laki-laki', 'Kristen', '085643532324'),
(3, 'aji', 'sukoharjo', 'Laki-laki', 'Katolik', '08821742174'),
(4, 'dika', 'wonogiri', 'Laki-laki', 'Islam', '082137123445'),
(5, 'dias', 'kudus', 'Laki-laki', 'Islam', '087443254237'),
(6, 'aku budi', 'solo baru', 'Laki-Laki', 'Islam ', '0899999991');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `kode_kamar` int(11) NOT NULL,
  `jenis_kamar` varchar(256) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`kode_kamar`, `jenis_kamar`, `status`) VALUES
(999, 'kamar VVIP', 'Kosong'),
(1110, 'kamar kelas 1', 'Kosong'),
(1111, 'kamar VVIP', 'Ditempati'),
(1210, 'kamar kelas 1', 'Kosong'),
(1310, 'kamar kelas 1', 'Kosong'),
(1410, 'kamar kelas 1', 'Ditempati'),
(1510, 'kamar kelas 1', 'Kosong');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `kode_obat` int(11) NOT NULL,
  `nama_obat` varchar(45) NOT NULL,
  `jenis_obat` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kode_obat`, `nama_obat`, `jenis_obat`) VALUES
(31110, 'SIMVASTATIN', 'Sirup'),
(31111, 'POLYSILANE', 'Kapsul'),
(31112, 'BODREXIN', 'Pil'),
(31120, 'ATORVASTATIN', 'Tablet');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) DEFAULT NULL,
  `kode_obat` int(11) DEFAULT NULL,
  `nama_pasien` varchar(45) DEFAULT NULL,
  `alamat_pasien` varchar(45) DEFAULT NULL,
  `jenkel_pasien` varchar(45) DEFAULT NULL,
  `tgl_lahir_pasien` date DEFAULT NULL,
  `agama_pasien` varchar(45) DEFAULT NULL,
  `no_telp_pasien` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `id_dokter`, `kode_obat`, `nama_pasien`, `alamat_pasien`, `jenkel_pasien`, `tgl_lahir_pasien`, `agama_pasien`, `no_telp_pasien`) VALUES
(1111, 6, 31111, 'susi', 'jakarta', 'Perempuan', '1999-04-05', 'Islam', '08564714212'),
(1112, 5, 31120, 'farez', 'sukoharjo', 'Laki-Laki', '2001-05-02', 'Kristen', '08999999999'),
(1113, 4, 31112, 'yuni', 'soba', 'Laki-Laki', '2000-05-04', 'Islam', '08222222222'),
(1114, 5, 31120, 'coba 2', 'wonogiri', 'Perempuan', '2000-05-04', 'Islam ktp', '08564714212');

-- --------------------------------------------------------

--
-- Table structure for table `perawat`
--

CREATE TABLE `perawat` (
  `id_perawat` int(11) NOT NULL,
  `nama_perawat` varchar(256) NOT NULL,
  `alamat_perawat` varchar(256) NOT NULL,
  `jenkel` varchar(45) NOT NULL,
  `agama` varchar(45) NOT NULL,
  `no_telp` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perawat`
--

INSERT INTO `perawat` (`id_perawat`, `nama_perawat`, `alamat_perawat`, `jenkel`, `agama`, `no_telp`) VALUES
(1, 'nino', 'boyolali', 'Laki-Laki', 'Islam', '085647321033'),
(2, 'andika', 'wonogiri', 'Laki-Laki', 'Islam ', '084444444444 '),
(122225, 'yuli', 'sukoharjo', 'Perempuan', 'Islam', '085647453410'),
(122226, 'dewi', 'sukoharjo', 'Perempuan', 'Kristen', '085643533144'),
(122227, 'devina putri', 'solo', 'Perempuan', 'Islam', '081111111'),
(122228, 'nunung widiawati', 'kudus', 'Perempuan', 'kristen', '08333333333');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`kode_kamar`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD KEY `pasien_ibfk_1` (`id_dokter`),
  ADD KEY `kode_obat` (`kode_obat`);

--
-- Indexes for table `perawat`
--
ALTER TABLE `perawat`
  ADD PRIMARY KEY (`id_perawat`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pasien_ibfk_2` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
