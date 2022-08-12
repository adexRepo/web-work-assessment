-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2022 at 06:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_web_work_assessment`
--

-- --------------------------------------------------------

--
-- Table structure for table `benefit_rule`
--

CREATE TABLE `benefit_rule` (
  `id` varchar(50) NOT NULL COMMENT 'generate',
  `auth_user` int(1) NOT NULL COMMENT 'link with user base',
  `departement` varchar(20) NOT NULL COMMENT 'link with user base and code base',
  `contract` int(1) NOT NULL COMMENT '0 / 1 link with code_base and user_base',
  `principal_salary` varchar(20) NOT NULL COMMENT 'static value manager can setting this (gapok)',
  `target` int(5) NOT NULL COMMENT 'static value manager can setting this (condition) misal 50 barang terkirim maka [lihat comment interest_salary]',
  `interest_salary` varchar(20) NOT NULL COMMENT 'static value manager can setting this [maka dapat untung 125.000] , jadi per barang yang terkirim 2500 rupiah',
  `promotion` int(5) DEFAULT NULL COMMENT '[day] kalo user lebih dari target selama 90 hari berturut2 maka layak dapat promosi',
  `user_id` int(11) NOT NULL COMMENT 'updated or regist this table rule , FK with user_base userId',
  `date_regist` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `remark` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `benefit_rule`
--
ALTER TABLE `benefit_rule`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
