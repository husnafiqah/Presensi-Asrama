-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2023 at 10:07 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asrama`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `notelpon` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pass` varchar(25) NOT NULL,
  `gedung` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `jurusan`, `email`, `notelpon`, `pass`, `gedung`) VALUES
('2111522030', 'Husna Afiqah Yossyafra', 'Sistem Informasi', 'husnaafiqahy@gmail.com', '081268115919', '123', 'Gedung A'),
('2111522033', 'Husna', 'Sistem Informasi', '2111522030_husna@student.unand.ac.id', '08121221', '123', 'Gedung C');

-- --------------------------------------------------------

--
-- Table structure for table `pembina`
--

CREATE TABLE `pembina` (
  `idpembina` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `notelpon` varchar(15) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembina`
--

INSERT INTO `pembina` (`idpembina`, `email`, `nama`, `notelpon`, `password`) VALUES
('1', 'admin@gmail.com', 'admin', '0898887656', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `idabsensi` int NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `nim` varchar(10) NOT NULL,
  `statuskehadiran` varchar(10) NOT NULL,
  `statuspersetujuan` varchar(20) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `jenispresensi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`idabsensi`, `tanggal`, `waktu`, `nim`, `statuskehadiran`, `statuspersetujuan`, `file_name`, `jenispresensi`) VALUES
(17, '2022-12-12', '12:12:00', '2111522030', 'hadir', 'Disetujui', 'close 3.png', 'Presensi Pagi'),
(18, '2023-03-03', '12:12:00', '2111522030', 'hadir', 'Tidak Disetujui', 'arrow.png', 'Presensi Pagi'),
(19, '2023-12-14', '07:12:00', '2111522033', 'izin', '', 'arrow.png', 'Presensi Malam'),
(20, '2023-01-01', '12:50:00', '2111522030', 'hadir', 'Disetujui', 'close 3.png', 'Presensi Pagi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `pembina`
--
ALTER TABLE `pembina`
  ADD PRIMARY KEY (`idpembina`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`idabsensi`),
  ADD KEY `nim` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `idabsensi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `presensi_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
