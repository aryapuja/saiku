-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2019 at 08:51 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

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
  `ak_plan_imp` datetime NOT NULL,
  `ak_act_imp` datetime DEFAULT NULL,
  `nama_dvs` varchar(100) NOT NULL,
  `status` enum('not updated','verified','waiting') NOT NULL,
  `nor` varchar(10) NOT NULL,
  `no` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `nama_act`, `ak_plan_imp`, `ak_act_imp`, `nama_dvs`, `status`, `nor`, `no`) VALUES
(30, 'yudha ganteng', '2019-07-18 00:00:00', '2019-07-24 00:00:00', 'de', 'verified', 'yudha-yu', '123'),
(31, 'yudha ganteng', '2019-07-18 00:00:00', '2019-07-19 00:00:00', 'de', 'verified', 'yudha-yu', '123'),
(35, 'yudha ganteng', '2019-07-22 00:00:00', '2019-07-30 00:00:00', 'de', 'verified', 'yy', '1');

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
-- Table structure for table `mactivity`
--

CREATE TABLE `mactivity` (
  `id` int(11) NOT NULL,
  `namaActivity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mactivity`
--

INSERT INTO `mactivity` (`id`, `namaActivity`) VALUES
(2, 'lalala'),
(3, 'yudha ganteng');

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
  `line2` varchar(10) DEFAULT NULL,
  `line3` varchar(10) DEFAULT NULL,
  `line4` varchar(10) DEFAULT NULL,
  `line5` varchar(10) DEFAULT NULL,
  `nor_plan_imp` datetime NOT NULL,
  `nor_act_imp` datetime NOT NULL,
  `status` enum('Close','Open','On Progress') NOT NULL DEFAULT 'Close'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nor`
--

INSERT INTO `nor` (`id`, `nor`, `no`, `item_changes`, `line`, `line2`, `line3`, `line4`, `line5`, `nor_plan_imp`, `nor_act_imp`, `status`) VALUES
(61, 'yudha-yu', '123', 'lala', '1A', '1B', NULL, NULL, NULL, '2019-07-18 00:00:00', '2019-07-24 00:00:00', 'Close'),
(63, 'yy', '1', 'tes', '1A', '1B', NULL, NULL, NULL, '2019-07-22 00:00:00', '2019-07-30 00:00:00', 'Close');

--
-- Triggers `nor`
--
DELIMITER $$
CREATE TRIGGER `delete activity` AFTER DELETE ON `nor` FOR EACH ROW delete from activity where activity.nor=old.nor AND activity.no=old.no
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(199) NOT NULL,
  `section` varchar(199) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `status` enum('off','on','waiting') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `password`, `section`, `nik`, `jabatan`, `status`) VALUES
(1, 'ppc1', 'ppc1', 'ppc', '1', '', 'on'),
(2, 'ppc2', 'ppc2', 'ppc', '2', '', 'on'),
(3, 'de', 'de', 'de', '3', '', 'on'),
(4, 'pp', 'pp', 'pp', '4', '', 'on'),
(5, 'qp', 'qp', 'qp', '5', '', 'on'),
(7, 'eng', 'eng', 'eng', '7', '', 'waiting'),
(8, 'nys', 'nys', 'nys', '8', '', 'waiting'),
(10, 'yudha', '1234', 'ppc', '1234', 'manager', 'on'),
(11, 'arya p', '1212', 'ppc', '12123', 'spv', 'on');

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
-- Indexes for table `mactivity`
--
ALTER TABLE `mactivity`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `fk_section` (`section`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `kode_dvs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mactivity`
--
ALTER TABLE `mactivity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nor`
--
ALTER TABLE `nor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_section` FOREIGN KEY (`section`) REFERENCES `divisi` (`nama_dvs`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
