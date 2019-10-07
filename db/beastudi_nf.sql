-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2019 at 11:45 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beastudi_nf`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `semester` varchar(30) NOT NULL,
  `angkatan` varchar(30) NOT NULL,
  `program_studi` varchar(50) NOT NULL,
  `peminatan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `gender`, `semester`, `angkatan`, `program_studi`, `peminatan`) VALUES
(1, 'Rian Hidayat', 'Laki-laki', '4 (Genap)', '2016', 'Teknik Informatika', 'Seni Dan Olahraga'),
(7, 'Zulkifli Jufri', 'Laki-laki', 'Ganjil', '2016', 'Informatika', 'Seni'),
(8, 'Ummi Kalsum', 'Perempuan', 'Ganjil', '2016', 'Sistem Informasi', 'Memasak'),
(9, 'Muhammad Fakhri', 'Perempuan', 'Ganjil', '2017', 'Informatika', 'Olahraga'),
(10, 'Wiwi Ariyanti', 'Perempuan', 'Ganjil', '2018', 'Sistem Informasi', 'Wirausaha'),
(11, 'Yunita Arief', 'Perempuan', 'Ganjil', '2018', 'Sistem Informasi', 'Spiritual');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
