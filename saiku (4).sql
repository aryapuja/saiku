-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2019 at 03:02 AM
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
(1522, 'Folow up NOR ke customer', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'de', 'not updated', 'JCM19', '0605'),
(1523, 'Release DCIL', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'de', 'not updated', 'JCM19', '0605'),
(1524, 'Release original drawing', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'de', 'not updated', 'JCM19', '0605'),
(1525, 'Release original circuit list', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'de', 'not updated', 'JCM19', '0605'),
(1526, 'Release original kakouzu', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'de', 'not updated', 'JCM19', '0605'),
(1527, 'Upload EPL di AS400 + Release oracle address', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'de', 'not updated', 'JCM19', '0605'),
(1528, 'Release part list matrix', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'de', 'not updated', 'JCM19', '0605'),
(1529, 'Release TSQ', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'de', 'not updated', 'JCM19', '0605'),
(1530, 'Release nameplate matrik', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'de', 'not updated', 'JCM19', '0605'),
(1531, 'Release commonize circuit', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'de', 'not updated', 'JCM19', '0605'),
(1532, 'Release commonize tube', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'de', 'not updated', 'JCM19', '0605'),
(1533, 'Release PA drawing & matrik', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'de', 'not updated', 'JCM19', '0605'),
(1534, 'Approval nameplate', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'de', 'not updated', 'JCM19', '0605'),
(1535, 'Release Engineering Drawing', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'de', 'not updated', 'JCM19', '0605'),
(1536, 'Release circuit list', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'de', 'not updated', 'JCM19', '0605'),
(1537, 'Release form obsolete', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'de', 'not updated', 'JCM19', '0605'),
(1538, 'Scrab document obsolete', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'de', 'not updated', 'JCM19', '0605'),
(1539, 'Release time study F/A KE PRODUKSI (Housing, Setting, Taping, SP, MSP, Offline)', '2019-07-26 00:00:00', '2019-07-29 00:00:00', 'pp', 'waiting', 'JCM19', '0605'),
(1540, 'Release drawing (Sakehame, Atohame, Plug)', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCM19', '0605'),
(1541, 'WO input matrik (Housing, SP, MSP, Offline, Central Plug)', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCM19', '0605'),
(1542, 'WO cek matrik (SP, Offline)', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCM19', '0605'),
(1543, 'Cek matrik (housing, Msp, Central Plug)', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCM19', '0605'),
(1544, 'WO  REVISI DRAFT SAO', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCM19', '0605'),
(1545, 'WO REPAIR SAO', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCM19', '0605'),
(1546, 'RELEASE WASURENBO', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCM19', '0605'),
(1547, 'WO ANALISA SIZE BOX', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCM19', '0605'),
(1548, 'WO ID BOX MATERIAL', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCM19', '0605'),
(1549, 'REPLACE ID & BOX MATERIAL', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCM19', '0605'),
(1550, 'RELEASE ADRESSING CCT', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCM19', '0605'),
(1551, 'REPLACE & TEMPEL ID CCT', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCM19', '0605'),
(1552, 'REPLACE & TEMPEL ID SAO SUB ASSY', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCM19', '0605'),
(1553, 'RELEASE MATRIKS VARIAN BONDER', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCM19', '0605'),
(1554, 'UPDATE NO MATERIAL JIG DWG', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCM19', '0605'),
(1555, 'UPDATE NO PROGRAM DI SP', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCM19', '0605'),
(1556, 'UPDATE NO PROGRAM DI OFFLINE', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCM19', '0605'),
(1557, 'Release dan Sosialisasi Henkaten', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCM19', '0605'),
(1558, 'WO ENG. PACKET/ ENG. ORI JAPAN', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCM19', '0605'),
(1559, 'Supply W/H buzzer ke produksi', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qmp', 'not updated', 'JCM19', '0605'),
(1560, 'Trial program EC-1,2 + AB', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qmp', 'not updated', 'JCM19', '0605'),
(1561, 'Validasi program area Inspeksi', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qmp', 'not updated', 'JCM19', '0605'),
(1562, 'Trial program SP1+SP2+AB', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qmp', 'not updated', 'JCM19', '0605'),
(1563, 'Cek New Part Equipment', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qmp', 'not updated', 'JCM19', '0605'),
(1564, 'Check dimensi / jig drawing', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qmp', 'not updated', 'JCM19', '0605'),
(1565, 'Update revision record all JB', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qmp', 'not updated', 'JCM19', '0605'),
(1566, 'Up date JB Justment', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qmp', 'not updated', 'JCM19', '0605'),
(1567, 'Validasi mesin fuse', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qmp', 'not updated', 'JCM19', '0605'),
(1568, 'IPI  check/TR check', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qmp', 'not updated', 'JCM19', '0605'),
(1569, 'Release Symbol Nameplate (untuk approval NP)', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qmp', 'not updated', 'JCM19', '0605'),
(1570, 'Pengembalian form dan dokumen obsolete', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qmp', 'not updated', 'JCM19', '0605'),
(1571, 'Trial program SP1+SP2', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qmp', 'not updated', 'JCM19', '0605'),
(1572, 'WO Ori drawing ke DE', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qp', 'not updated', 'JCM19', '0605'),
(1573, 'Compare drawaing', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qp', 'not updated', 'JCM19', '0605'),
(1574, 'Trial metode baru area inspeksi', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qp', 'not updated', 'JCM19', '0605'),
(1575, 'Change SWCT/Time Study', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qp', 'not updated', 'JCM19', '0605'),
(1576, 'Revisi matrik inspection area (MSP / Fuse EC/ Dim Check / Siage/ Visual / Double check)', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qp', 'not updated', 'JCM19', '0605'),
(1577, 'Revisi Important point / inspection point', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qp', 'not updated', 'JCM19', '0605'),
(1578, 'Update visual matting', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qp', 'not updated', 'JCM19', '0605'),
(1579, 'Update harness sample', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qp', 'not updated', 'JCM19', '0605'),
(1580, 'Update sample wire / terminal PA', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qp', 'not updated', 'JCM19', '0605'),
(1581, 'WO input matrik inspection area ke FAE ', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qp', 'not updated', 'JCM19', '0605'),
(1582, 'WO input patern fuse ke FAE', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qp', 'not updated', 'JCM19', '0605'),
(1583, 'WO analisa size box ke NYS', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qp', 'not updated', 'JCM19', '0605'),
(1584, 'WO ID dan box Material ke NYS', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qp', 'not updated', 'JCM19', '0605'),
(1585, 'WO cek matrik ke QMP', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qp', 'not updated', 'JCM19', '0605'),
(1586, 'WO validasi hasil input patern fuse ke QMP', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qp', 'not updated', 'JCM19', '0605'),
(1587, 'Sosialisasi henkaten', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qp', 'not updated', 'JCM19', '0605'),
(1588, 'Release henkaten', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qp', 'not updated', 'JCM19', '0605'),
(1589, 'Release SWCT /Time Study', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qp', 'not updated', 'JCM19', '0605'),
(1590, 'Replace ID material pada box / ID dikasihkan ke WHS', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'qp', 'not updated', 'JCM19', '0605'),
(1591, '(fa) check stock part / order part', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'engineering', 'not updated', 'JCM19', '0605'),
(1592, '(fa) check new equipment / order new equipment', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'engineering', 'not updated', 'JCM19', '0605'),
(1593, '(fa) repair box sakihame / repair meja insert plug', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'engineering', 'not updated', 'JCM19', '0605'),
(1594, '(fa) repair housing / mapping duct', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'engineering', 'not updated', 'JCM19', '0605'),
(1595, '(fa) repair navigasi', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'engineering', 'not updated', 'JCM19', '0605'),
(1596, '(fa) repair meja MSU', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'engineering', 'not updated', 'JCM19', '0605'),
(1597, '(fa) input matrik (Housing, Msp, Plug, SP, Offline, DIM/VIS)', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'engineering', 'not updated', 'JCM19', '0605'),
(1598, '(fa) share henkaten jig', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'engineering', 'not updated', 'JCM19', '0605'),
(1599, '(fa) repair jig drawing / repair jig ( SP/JIG/OFFLINE)', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'engineering', 'not updated', 'JCM19', '0605'),
(1600, '(fa) Release draft SAO ke PP', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'engineering', 'not updated', 'JCM19', '0605'),
(1601, '(fa) repair ID papan sao/add papan sao', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'engineering', 'not updated', 'JCM19', '0605'),
(1602, '(fa) kirim data matrik separator ke NYS', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'engineering', 'not updated', 'JCM19', '0605'),
(1603, '(fa) Repair/penambahan no material ', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'engineering', 'not updated', 'JCM19', '0605'),
(1604, '(fa) repair ec/chg cf/add cf', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'engineering', 'not updated', 'JCM19', '0605'),
(1605, '(fa) input/chg program ec , chg ec dwg', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'engineering', 'not updated', 'JCM19', '0605'),
(1606, '(fa) add program CB EC/DIM/VIS', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCM19', '0605'),
(1607, '(fa) Implementasi D/C & cek item perubahan', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCM19', '0605'),
(1608, '(fa) karantina old part + cct', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCM19', '0605'),
(1609, '(fa) Pengembalian material', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCM19', '0605'),
(1610, '(fa) scrab old part dan circuit', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCM19', '0605'),
(1611, '(fa) trial metode baru bersama QC & PP', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCM19', '0605'),
(1612, '(fa) Supply material', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCM19', '0605'),
(1613, '(fa) cutting tube', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCM19', '0605'),
(1614, '(fa) check stock cct/material', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCM19', '0605'),
(1615, '(fa) buat stock SP1 + A/B', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCM19', '0605'),
(1616, '(fa) buat stock sub assy', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCM19', '0605'),
(1617, '(fa) Repair WH buzzer', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCM19', '0605'),
(1618, '(fa) Ganti N/P pada W/H buzzer', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCM19', '0605'),
(1619, '(fa) Kirim hasil tial analisa material tube ke NYS', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCM19', '0605'),
(1620, '(fa) Pengembalian box material ke NYS', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCM19', '0605'),
(1621, '(fa) Pengembalian ID sample N/P BO ke NYS', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCM19', '0605'),
(1622, '(fa) Pengembalian withdrawal', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCM19', '0605'),
(1623, '(fa) Pengembalian form dan dokumen obsolete', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCM19', '0605'),
(1624, '(fa) Mengosongkan wip housing', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCM19', '0605'),
(1625, '(fa) Mengosongkan wip Setting', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCM19', '0605'),
(1626, '(fa) Mengosongkan wip Taping', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCM19', '0605'),
(1627, '(fa) Mengosongkan wip inspeksi', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCM19', '0605'),
(1628, '(fa) Karantina dan pengembalian sisa label', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCM19', '0605'),
(1629, '(fa) Karantina dan pengembalian sisa np', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCM19', '0605'),
(1630, '(fa) Karantina dan pengembalian sisa cik', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCM19', '0605'),
(1631, '(pa) cutting circuit', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCM19', '0605'),
(1632, '(pa) Supply circuit', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCM19', '0605'),
(1633, '(pa) Pengembalian box material ke NYS', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCM19', '0605'),
(1634, '(pa) Pengembalian kanban cutting', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCM19', '0605'),
(1635, '(pa) Pengembalian kanban drawing', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCM19', '0605'),
(1636, '(pa) Release machine loading shield', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCM19', '0605'),
(1637, '(pa) Release machine loading cct', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCM19', '0605'),
(1638, '(pa) Release machine loading AB', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCM19', '0605'),
(1639, '(pa) Release machine loading tube', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCM19', '0605'),
(1640, '(pa) Replace/release kanban cct', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCM19', '0605'),
(1641, '(pa) Replace/release kanban material PA', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCM19', '0605'),
(1642, '(pa) WO kode RFID kanban', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCM19', '0605'),
(1643, '(pa) Update database e-kanban', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCM19', '0605'),
(1644, '(pa) Update patch bonder', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCM19', '0605'),
(1645, '(pa) Release list cct delete', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCM19', '0605'),
(1646, '(fa) Kirim analisa size box ke WHS / CTB', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCM19', '0605'),
(1647, '(fa) Release analisa type box ke PP dan QP,QMP', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCM19', '0605'),
(1648, '(fa) Release box material ke PP dan QP,QMP', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCM19', '0605'),
(1649, '(fa) Release ID material ke PP dan QP, QMP', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCM19', '0605'),
(1650, '(fa) Change identitas part store', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCM19', '0605'),
(1651, '(fa) Release / Replace CIK', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCM19', '0605'),
(1652, '(fa) Release kanban WU / BT', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCM19', '0605'),
(1653, '(fa) Replace / Release ID Sample Nameplate FA / PA', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCM19', '0605'),
(1654, '(pp pa) Release dan sosialisai henkaten', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCM19', '0605'),
(1655, '(pp pa) WO input matrik', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCM19', '0605'),
(1656, '(pp pa) WO bonding std', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCM19', '0605'),
(1657, '(pp pa) Release addresing cct', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCM19', '0605'),
(1658, '(pp pa) Replace dan tempel id sao', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCM19', '0605'),
(1659, '(pp pa) Cek matrik', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCM19', '0605'),
(1660, '(pp pa) WO equipment', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCM19', '0605'),
(1661, '(pp pa) Release mapping flow PA dwg', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCM19', '0605'),
(1662, '(pp pa) Release matrik maooing flow', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCM19', '0605'),
(1663, '(pp pa) Addresing acc', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCM19', '0605'),
(1664, '(pp pa) WO input matrik', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCM19', '0605'),
(1665, '(pp pa) WO box', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCM19', '0605'),
(1666, 'Check status old part', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'ic', 'not updated', 'JCM19', '0605'),
(1667, 'Claimkan dead stock ke customer', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'ic', 'not updated', 'JCM19', '0605'),
(1668, 'Release schedule stop order old part', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'ic', 'not updated', 'JCM19', '0605'),
(1669, 'Check status new part', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'ic', 'not updated', 'JCM19', '0605'),
(1670, 'Order new part, request ETA SAI :', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'ic', 'not updated', 'JCM19', '0605'),
(1671, 'Material free SoC', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'ic', 'not updated', 'JCM19', '0605'),
(1672, 'List Material CSS', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'ic', 'not updated', 'JCM19', '0605'),
(1673, 'Informasi usage per day to WHS', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'ic', 'not updated', 'JCM19', '0605'),
(1674, 'Check actual stock old part yang mengalami D/C', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'whs', 'not updated', 'JCM19', '0605'),
(1675, 'Identifikasi new part', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'whs', 'not updated', 'JCM19', '0605'),
(1676, 'Supply new part ', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'whs', 'not updated', 'JCM19', '0605'),
(1677, 'Replace ID Material (R/C)', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'whs', 'not updated', 'JCM19', '0605'),
(1678, 'Kirim hasil analisa size box ke NYS', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'whs', 'not updated', 'JCM19', '0605'),
(1679, 'Supply material common ke line : ………………', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'whs', 'not updated', 'JCM19', '0605'),
(1680, 'Request SO ke PLB', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'whs', 'not updated', 'JCM19', '0605'),
(1681, '(pa) check applikator', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'engineering', 'not updated', 'JCM19', '0605'),
(1682, '(pa) pembuatan crimping standart dan bonder standart', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'engineering', 'not updated', 'JCM19', '0605'),
(1683, '(pa) setting machine loading', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'engineering', 'not updated', 'JCM19', '0605'),
(1684, '(pa) Pengembalian form dan dokumen obsolete', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'engineering', 'not updated', 'JCM19', '0605'),
(1685, '(pa) Input kode RFID ke Karakuri', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'engineering', 'not updated', 'JCM19', '0605'),
(1686, '(pa) Release mapping applikator', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'engineering', 'not updated', 'JCM19', '0605'),
(1687, '(pa) order new equipment, request ETA SAI :', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'engineering', 'not updated', 'JCM19', '0605'),
(1688, 'Isi no box/ polytainer pada kartu imp dc', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'exim', 'not updated', 'JCM19', '0605'),
(1689, 'Release Harness Price', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'fa', 'not updated', 'JCM19', '0605'),
(1690, 'Release UMH', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'fa', 'not updated', 'JCM19', '0605'),
(1691, 'Request Price dan UMH ke FA', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCM19', '0605'),
(1692, 'Update assy code di assy plan', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCM19', '0605'),
(1693, 'Update suffix level di heikinka, assy plan, dan SPP', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCM19', '0605'),
(1694, 'Update component packing di oracle', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCM19', '0605'),
(1695, 'Release analisa S/R max loading per shift', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCM19', '0605'),
(1696, 'Release Countdown assy ', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCM19', '0605'),
(1697, '(nameplate) Print sample label', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCM19', '0605'),
(1698, '(nameplate) Pembuatan approval nameplate', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCM19', '0605'),
(1699, '(nameplate) Print sample name plate to DE+QA+kantong name plate', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCM19', '0605'),
(1700, '(nameplate) Print name plate baru', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCM19', '0605'),
(1701, '(nameplate) Scrap name plate', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCM19', '0605'),
(1702, '(D/C) Distribusi DCIL', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCM19', '0605'),
(1703, '(D/C) Request NOR official ke Cust', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCM19', '0605'),
(1704, '(D/C) Prepare NOR, checksheet dan kartu implementasi DC', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCM19', '0605'),
(1705, '(D/C) Check list implementasi', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCM19', '0605'),
(1706, '(D/C) Release form obsolete (COPY NOR)', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCM19', '0605'),
(1707, '(D/C) Scrab (COPY NOR)', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCM19', '0605'),
(1708, '(D/C) Kirim GJN ke customer', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCM19', '0605'),
(1709, '(D/C) Konfirmasi ke Cust. Plan SAI implementasi NOR (jika tidak sesuai requirement Cust.) - Format G', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCM19', '0605'),
(1710, '(D/C) Supply heikinka, nameplate, CIK dan Label', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCM19', '0605'),
(1711, '(D/C) Update D/C Matrik', '2019-07-26 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCM19', '0605');

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
(5, 'engineering'),
(10, 'exim'),
(9, 'fa'),
(12, 'ic'),
(6, 'nys'),
(2, 'pp'),
(8, 'ppc'),
(7, 'prod'),
(4, 'qmp'),
(3, 'qp'),
(11, 'whs');

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
(4, 'Folow up NOR ke customer'),
(5, 'Release DCIL'),
(6, 'Release original drawing'),
(7, 'Release original circuit list'),
(8, 'Release original kakouzu'),
(9, 'Upload EPL di AS400 + Release oracle address'),
(10, 'Release part list matrix'),
(11, 'Release TSQ'),
(12, 'Release nameplate matrik'),
(13, 'Release commonize circuit'),
(14, 'Release commonize tube'),
(15, 'Release PA drawing & matrik'),
(16, 'Approval nameplate'),
(17, 'Release Engineering Drawing'),
(18, 'Release circuit list'),
(19, 'Release form obsolete'),
(20, 'Scrab document obsolete'),
(21, 'Release time study F/A KE PRODUKSI (Housing, Setting, Taping, SP, MSP, Offline)'),
(22, 'Release drawing (Sakehame, Atohame, Plug)'),
(23, 'WO input matrik (Housing, SP, MSP, Offline, Central Plug)'),
(24, 'WO cek matrik (SP, Offline)'),
(25, 'Cek matrik (housing, Msp, Central Plug)'),
(26, 'WO  REVISI DRAFT SAO'),
(27, 'WO REPAIR SAO'),
(28, 'RELEASE WASURENBO'),
(29, 'WO ANALISA SIZE BOX'),
(30, 'WO ID BOX MATERIAL'),
(31, 'REPLACE ID & BOX MATERIAL'),
(32, 'RELEASE ADRESSING CCT'),
(33, 'REPLACE & TEMPEL ID CCT'),
(34, 'REPLACE & TEMPEL ID SAO SUB ASSY'),
(35, 'RELEASE MATRIKS VARIAN BONDER'),
(36, 'UPDATE NO MATERIAL JIG DWG'),
(37, 'UPDATE NO PROGRAM DI SP'),
(38, 'UPDATE NO PROGRAM DI OFFLINE'),
(39, 'Release dan Sosialisasi Henkaten'),
(40, 'WO ENG. PACKET/ ENG. ORI JAPAN'),
(41, 'Supply W/H buzzer ke produksi'),
(42, 'Trial program EC-1,2 + AB'),
(43, 'Validasi program area Inspeksi'),
(44, 'Trial program SP1+SP2+AB'),
(45, 'Cek New Part Equipment'),
(46, 'Check dimensi / jig drawing'),
(47, 'Update revision record all JB'),
(48, 'Up date JB Justment'),
(49, 'Validasi mesin fuse'),
(50, 'IPI  check/TR check'),
(51, 'Release Symbol Nameplate (untuk approval NP)'),
(52, 'Pengembalian form dan dokumen obsolete'),
(53, 'Trial program SP1+SP2'),
(54, 'WO Ori drawing ke DE'),
(55, 'Compare drawaing'),
(56, 'Trial metode baru area inspeksi'),
(57, 'Change SWCT/Time Study'),
(58, 'Revisi matrik inspection area (MSP / Fuse EC/ Dim Check / Siage/ Visual / Double check)'),
(59, 'Revisi Important point / inspection point'),
(60, 'Update visual matting'),
(61, 'Update harness sample'),
(62, 'Update sample wire / terminal PA'),
(63, 'WO input matrik inspection area ke FAE '),
(64, 'WO input patern fuse ke FAE'),
(65, 'WO analisa size box ke NYS'),
(66, 'WO ID dan box Material ke NYS'),
(67, 'WO cek matrik ke QMP'),
(68, 'WO validasi hasil input patern fuse ke QMP'),
(69, 'Sosialisasi henkaten'),
(70, 'Release henkaten'),
(71, 'Release SWCT /Time Study'),
(72, 'Replace ID material pada box / ID dikasihkan ke WHS'),
(73, '(fa) check stock part / order part'),
(74, '(fa) check new equipment / order new equipment'),
(75, '(fa) repair box sakihame / repair meja insert plug'),
(76, '(fa) repair housing / mapping duct'),
(77, '(fa) repair navigasi'),
(78, '(fa) repair meja MSU'),
(79, '(fa) input matrik (Housing, Msp, Plug, SP, Offline, DIM/VIS)'),
(80, '(fa) share henkaten jig'),
(81, '(fa) repair jig drawing / repair jig ( SP/JIG/OFFLINE)'),
(82, '(fa) Release draft SAO ke PP'),
(83, '(fa) repair ID papan sao/add papan sao'),
(84, '(fa) kirim data matrik separator ke NYS'),
(85, '(fa) Repair/penambahan no material '),
(86, '(fa) repair ec/chg cf/add cf'),
(87, '(fa) input/chg program ec , chg ec dwg'),
(88, '(fa) add program CB EC/DIM/VIS'),
(89, '(fa) Implementasi D/C & cek item perubahan'),
(90, '(fa) karantina old part + cct'),
(91, '(fa) Pengembalian material'),
(92, '(fa) scrab old part dan circuit'),
(93, '(fa) trial metode baru bersama QC & PP'),
(94, '(fa) Supply material'),
(95, '(fa) cutting tube'),
(96, '(fa) check stock cct/material'),
(97, '(fa) buat stock SP1 + A/B'),
(98, '(fa) buat stock sub assy'),
(99, '(fa) Repair WH buzzer'),
(100, '(fa) Ganti N/P pada W/H buzzer'),
(101, '(fa) Kirim hasil tial analisa material tube ke NYS'),
(102, '(fa) Pengembalian box material ke NYS'),
(103, '(fa) Pengembalian ID sample N/P BO ke NYS'),
(104, '(fa) Pengembalian withdrawal'),
(105, '(fa) Pengembalian form dan dokumen obsolete'),
(106, '(fa) Mengosongkan wip housing'),
(107, '(fa) Mengosongkan wip Setting'),
(108, '(fa) Mengosongkan wip Taping'),
(109, '(fa) Mengosongkan wip inspeksi'),
(110, '(fa) Karantina dan pengembalian sisa label'),
(111, '(fa) Karantina dan pengembalian sisa np'),
(112, '(fa) Karantina dan pengembalian sisa cik'),
(113, '(pa) cutting circuit'),
(114, '(pa) Supply circuit'),
(115, '(pa) Pengembalian box material ke NYS'),
(116, '(pa) Pengembalian kanban cutting'),
(117, '(pa) Pengembalian kanban drawing'),
(118, '(pa) Release machine loading shield'),
(119, '(pa) Release machine loading cct'),
(120, '(pa) Release machine loading AB'),
(121, '(pa) Release machine loading tube'),
(122, '(pa) Replace/release kanban cct'),
(123, '(pa) Replace/release kanban material PA'),
(124, '(pa) WO kode RFID kanban'),
(125, '(pa) Update database e-kanban'),
(126, '(pa) Update patch bonder'),
(127, '(pa) Release list cct delete'),
(128, '(fa) Kirim analisa size box ke WHS / CTB'),
(129, '(fa) Release analisa type box ke PP dan QP,QMP'),
(130, '(fa) Release box material ke PP dan QP,QMP'),
(131, '(fa) Release ID material ke PP dan QP, QMP'),
(132, '(fa) Change identitas part store'),
(133, '(fa) Release / Replace CIK'),
(134, '(fa) Release kanban WU / BT'),
(135, '(fa) Replace / Release ID Sample Nameplate FA / PA'),
(136, '(pp pa) Release dan sosialisai henkaten'),
(137, '(pp pa) WO input matrik'),
(138, '(pp pa) WO bonding std'),
(139, '(pp pa) Release addresing cct'),
(140, '(pp pa) Replace dan tempel id sao'),
(141, '(pp pa) Cek matrik'),
(142, '(pp pa) WO equipment'),
(143, '(pp pa) Release mapping flow PA dwg'),
(144, '(pp pa) Release matrik maooing flow'),
(145, '(pp pa) Addresing acc'),
(146, '(pp pa) WO input matrik'),
(147, '(pp pa) WO box'),
(148, 'Check status old part'),
(149, 'Claimkan dead stock ke customer'),
(150, 'Release schedule stop order old part'),
(151, 'Check status new part'),
(152, 'Order new part, request ETA SAI :'),
(153, 'Material free SoC'),
(154, 'List Material CSS'),
(155, 'Informasi usage per day to WHS'),
(156, 'Check actual stock old part yang mengalami D/C'),
(157, 'Identifikasi new part'),
(158, 'Supply new part '),
(159, 'Replace ID Material (R/C)'),
(160, 'Kirim hasil analisa size box ke NYS'),
(161, 'Supply material common ke line : ??????'),
(162, 'Request SO ke PLB'),
(163, '(pa) check applikator'),
(164, '(pa) pembuatan crimping standart dan bonder standart'),
(165, '(pa) setting machine loading'),
(166, '(pa) Pengembalian form dan dokumen obsolete'),
(167, '(pa) Input kode RFID ke Karakuri'),
(168, '(pa) Release mapping applikator'),
(169, '(pa) order new equipment, request ETA SAI :'),
(170, 'Isi no box/ polytainer pada kartu imp dc'),
(171, 'Release Harness Price'),
(172, 'Release UMH'),
(173, 'Request Price dan UMH ke FA'),
(174, 'Update assy code di assy plan'),
(175, 'Update suffix level di heikinka, assy plan, dan SPP'),
(176, 'Update component packing di oracle'),
(177, 'Release analisa S/R max loading per shift'),
(178, 'Release Countdown assy '),
(179, '(nameplate) Print sample label'),
(180, '(nameplate) Pembuatan approval nameplate'),
(181, '(nameplate) Print sample name plate to DE+QA+kantong name plate'),
(182, '(nameplate) Print name plate baru'),
(183, '(nameplate) Scrap name plate'),
(184, '(D/C) Distribusi DCIL'),
(185, '(D/C) Request NOR official ke Cust'),
(186, '(D/C) Prepare NOR, checksheet dan kartu implementasi DC'),
(187, '(D/C) Check list implementasi'),
(188, '(D/C) Release form obsolete (COPY NOR)'),
(189, '(D/C) Scrab (COPY NOR)'),
(190, '(D/C) Kirim GJN ke customer'),
(191, '(D/C) Konfirmasi ke Cust. Plan SAI implementasi NOR (jika tidak sesuai requirement Cust.) - Format GJN'),
(192, '(D/C) Supply heikinka, nameplate, CIK dan Label'),
(193, '(D/C) Update D/C Matrik');

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
(71, 'JCM19', '0605', 'changes item', '1A', '3A', NULL, NULL, NULL, '2019-07-29 00:00:00', '0000-00-00 00:00:00', 'On Progress');

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
(1, 'ppc1', 'ppc1', 'ppc', 'ppc1', '', 'on'),
(2, 'ppc2', 'ppc2', 'ppc', 'ppc2', '', 'on'),
(3, 'de', 'de', 'de', 'de', '', 'on'),
(4, 'pp', 'pp', 'pp', 'pp', '', 'on'),
(5, 'qp', 'qp', 'qp', 'qp', '', 'on'),
(8, 'nys', 'nys', 'nys', 'nys', 'freelance', 'off'),
(10, 'yudha', '1234', 'ppc', '1234', 'manager', 'on'),
(11, 'arya p', '1212', 'ppc', '12123', 'spv', 'on'),
(12, 'exim', 'exim', 'exim', 'exim', '', 'on'),
(13, 'fa', 'fa', 'fa', 'fa', '', 'on'),
(14, 'ic', 'ic', 'ic', 'ic', '', 'on'),
(15, 'qmp', 'qmp', 'qmp', 'qmp', '', 'on'),
(16, 'whs', 'whs', 'whs', 'whs', '', 'on'),
(17, 'prod', 'prod', 'prod', 'prod', '', 'on'),
(19, 'yudha', '1234', 'pp', '12', 'manager', 'on'),
(22, 'arya', '123', 'pp', '123', 'manager', 'waiting');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1712;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `kode_dvs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mactivity`
--
ALTER TABLE `mactivity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `nor`
--
ALTER TABLE `nor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
