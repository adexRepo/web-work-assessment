-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2022 at 06:32 PM
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
-- Table structure for table `code_base`
--

CREATE TABLE `code_base` (
  `id` varchar(15) NOT NULL COMMENT 'uniq type code',
  `code` int(3) NOT NULL COMMENT 'code , 0 = female , 1 for male',
  `code_title` varchar(50) NOT NULL COMMENT 'code title , like gender',
  `value` varchar(50) NOT NULL COMMENT 'male and female',
  `date_regist` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'timestamp',
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'timestamp',
  `remark` varchar(500) DEFAULT NULL COMMENT 'note'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `code_base`
--
ALTER TABLE `code_base`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `code_base` ADD FULLTEXT KEY `remark` (`remark`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
