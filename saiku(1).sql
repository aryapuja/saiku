-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2019 at 08:28 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saiku`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `nama_act` varchar(100) NOT NULL,
  `date_plan` datetime NOT NULL,
  `date_actual` datetime NOT NULL,
  `nama_dvs` varchar(100) NOT NULL,
  `nor` varchar(10) NOT NULL,
  `no` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `nama_act`, `date_plan`, `date_actual`, `nama_dvs`, `nor`, `no`) VALUES
(1, 'DE', '2019-06-25 00:00:00', '2019-06-26 00:00:00', 'de', 'PDN19N', '2130'),
(2, 'logisstik', '2019-06-26 00:00:00', '2019-06-27 00:00:00', 'ppc', 'PDN19N', '2130'),
(3, 'Bismillah :D', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'nys', 'PDN19N', '2130'),
(4, 'Persiapan', '2019-06-25 00:00:00', '2019-06-24 00:00:00', 'pp', 'PDN19N', '2130'),
(5, 'Cek quality', '2019-06-21 00:00:00', '2019-06-23 00:00:00', 'qp', 'PDN19N', '2130'),
(6, 'Bismillah :D', '2019-06-24 00:00:00', '2019-06-23 00:00:00', 'prod', 'PDN19N', '0010'),
(7, 'dssds', '2019-06-25 00:00:00', '2019-06-10 00:00:00', 'pp', 'RZN21', '0010'),
(8, 'qq', '2019-06-25 00:00:00', '2019-06-18 00:00:00', 'de', 'RZN21', '0010'),
(9, 'Persiapan', '2019-06-10 00:00:00', '2019-06-05 00:00:00', 'nys', 'RJVC3', '0202'),
(10, 'Fi Mesin', '2019-06-11 00:00:00', '2019-06-09 00:00:00', 'eng', 'JCZM19', '0222'),
(11, '13', '2019-06-10 00:00:00', '2019-06-03 00:00:00', 'prod', 'RJ451', '0050'),
(12, ':D', '2019-06-10 00:00:00', '2019-06-03 00:00:00', 'ppc', 'RJCZM19', '3210'),
(13, 'dssds', '2019-06-18 00:00:00', '2019-06-16 00:00:00', 'pp', 'RJCZM19', '0020'),
(14, 'bbb', '2019-06-26 00:00:00', '2019-06-26 00:00:00', 'de', 'JCZM19', '0020');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `kode_dvs` int(11) NOT NULL,
  `nama_dvs` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`kode_dvs`, `nama_dvs`) VALUES
(1, 'de'),
(5, 'eng'),
(6, 'nys'),
(2, 'pp'),
(8, 'ppc'),
(7, 'prod'),
(4, 'qmp'),
(3, 'qp');

-- --------------------------------------------------------

--
-- Table structure for table `nor`
--

CREATE TABLE `nor` (
  `id` int(11) NOT NULL,
  `nor` varchar(10) NOT NULL,
  `no` varchar(11) NOT NULL,
  `item_changes` text NOT NULL,
  `line` varchar(10) NOT NULL,
  `date_plan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nor`
--

INSERT INTO `nor` (`id`, `nor`, `no`, `item_changes`, `line`, `date_plan`) VALUES
(1, 'PDN19N', '2130', 'Change dim, change cot length, change packing, change outer covering (spiral ? VS)', '1A', '2019-06-26 00:00:00'),
(2, 'PDN19N', '2130', 'change tape, type, add detail dwg, change of wire size, add note', '1B', '2019-06-26 00:00:00'),
(7, 'RJVC3', '0212', 'Bismillah :D', '10A', '2019-06-25 00:00:00'),
(10, 'RJ451', '0202', 'Dummy 1', '2C', '2019-06-27 00:00:00'),
(11, 'RJ451', '0221', 'Dummy 2', '1A', '2019-06-27 00:00:00'),
(12, 'RJ431', '0222', 'Dummy 3', '3A', '2019-06-27 00:00:00'),
(13, 'JCZM19', '0019', 'Dummy 4', '2A', '2019-06-28 00:00:00'),
(14, 'JCZM19', '0020', 'Dummy 5', '4B', '2019-06-28 00:00:00'),
(15, 'RJCZM19', '0223', 'Dummy 6', '12A', '2019-06-28 00:00:00'),
(16, 'RJCZM19', '2049', 'Dummy 6', '20A', '2019-06-28 00:00:00'),
(17, 'RZN21', '0010', 'Dummy 7', '3A', '2019-06-29 00:00:00'),
(18, 'RZN21', '0020', 'Dummy 8', '2A', '2019-06-29 00:00:00'),
(19, 'RZN21', '3210', 'Dummy 9', '4B', '2019-06-29 00:00:00'),
(20, 'RZN21', '0040', 'Dummy 10', '12A', '2019-06-29 00:00:00'),
(21, 'RZN21', '0050', 'Dummy 11', '20A', '2019-06-29 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(199) NOT NULL,
  `level` varchar(199) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'ppc1', 'ppc1', 'admin'),
(2, 'ppc2', 'ppc2', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nama_dvs` (`nama_dvs`),
  ADD KEY `fk_nor` (`nor`),
  ADD KEY `fk_no` (`no`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`kode_dvs`),
  ADD KEY `nama_dvs` (`nama_dvs`);

--
-- Indexes for table `nor`
--
ALTER TABLE `nor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nor` (`nor`),
  ADD KEY `no` (`no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `kode_dvs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nor`
--
ALTER TABLE `nor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `fk_nama_dvs` FOREIGN KEY (`nama_dvs`) REFERENCES `divisi` (`nama_dvs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_no` FOREIGN KEY (`no`) REFERENCES `nor` (`no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nor` FOREIGN KEY (`nor`) REFERENCES `nor` (`nor`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
