-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2020 at 07:11 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_bentuk`
--

CREATE TABLE `m_bentuk` (
  `bentuk_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_bentuk`
--

INSERT INTO `m_bentuk` (`bentuk_id`, `name`, `created`, `updated`) VALUES
(1, 'Tablet', '0000-00-00 00:00:00', NULL),
(2, 'Kaplet', '0000-00-00 00:00:00', NULL),
(3, 'Kapsul', '0000-00-00 00:00:00', NULL),
(4, 'Sirup', '0000-00-00 00:00:00', NULL),
(5, 'Cair', '0000-00-00 00:00:00', NULL),
(6, 'Cairan Infus', '0000-00-00 00:00:00', NULL),
(7, 'Salep', '0000-00-00 00:00:00', NULL),
(8, 'Gel', '0000-00-00 00:00:00', NULL),
(9, 'Inhaler', '0000-00-00 00:00:00', NULL),
(10, 'Batang', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_category`
--

CREATE TABLE `m_category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_category`
--

INSERT INTO `m_category` (`category_id`, `name`, `created`, `updated`) VALUES
(1, 'Generik', '2020-12-10 10:14:24', '2020-12-10 04:16:54'),
(2, 'Paten', '2020-12-10 10:14:39', NULL),
(3, 'HV', '2020-12-10 10:14:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_unit`
--

CREATE TABLE `m_unit` (
  `unit_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_unit`
--

INSERT INTO `m_unit` (`unit_id`, `name`, `created`, `updated`) VALUES
(1, 'Tablet', '2020-12-10 21:36:58', NULL),
(2, 'Strip', '2020-12-10 21:37:10', NULL),
(3, 'Sachet', '2020-12-10 21:37:22', NULL),
(4, 'Pcs', '2020-12-10 21:37:29', NULL),
(5, 'Pak', '2020-12-10 21:37:40', NULL),
(6, 'Tube', '2020-12-10 21:37:47', NULL),
(7, 'Botol', '2020-12-10 21:37:59', NULL),
(8, 'Batang', '2020-12-10 21:38:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `name`, `alamat`, `email`, `phone`, `deskripsi`, `created`, `update`) VALUES
(1, 'PT Bundamedik', 'Jl. Kyai Mojo No18A, Jetis, Indralaya ', 'ptbunda@gmail.com', '088869303467', 'Obat-Obat Kapsul', '2020-12-10 22:44:24', '2020-12-10 17:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_peg` varchar(50) NOT NULL,
  `alamat_peg` text NOT NULL,
  `hp_peg` varchar(13) NOT NULL,
  `jk_peg` varchar(10) NOT NULL DEFAULT '',
  `lhr_peg` date NOT NULL,
  `foto_peg` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL COMMENT '1. Admin 2.Manager 3. Apoteker 4. Kasir ',
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `password`, `nama_peg`, `alamat_peg`, `hp_peg`, `jk_peg`, `lhr_peg`, `foto_peg`, `level`, `email`) VALUES
(1, 'admin', 'a1ba66f1c884540482db1137b73813ea', 'Heriyadi ', 'Indralaya, Mutiarah indah 2', '082175805939', '1', '1998-07-09', 'yofi.jpg', '1', 'admin@gmail.com'),
(2, 'tasya', 'a98d6c3f06afa3746bd02e4ba7b2807d', 'Tasya Aulia', 'Palembang, Plaju', '082764783853', '2', '2004-12-23', 'picture.jpg', '2', 'tasya@gmail.com'),
(4, 'wahyu', '8cbbdc3fff847eee79abadc7b693b60e', 'Wahyu', 'hghfhfgh', '081242564645', '1', '2020-12-18', '0001.jpg', '3', 'robetfauzi43@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_bentuk`
--
ALTER TABLE `m_bentuk`
  ADD PRIMARY KEY (`bentuk_id`);

--
-- Indexes for table `m_category`
--
ALTER TABLE `m_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `m_unit`
--
ALTER TABLE `m_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_bentuk`
--
ALTER TABLE `m_bentuk`
  MODIFY `bentuk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `m_category`
--
ALTER TABLE `m_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_unit`
--
ALTER TABLE `m_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
