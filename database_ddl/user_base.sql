-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2022 at 06:33 PM
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
-- Table structure for table `user_base`
--

CREATE TABLE `user_base` (
  `user_id` varchar(15) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `gender` int(1) DEFAULT NULL COMMENT '(0) Female, (1) male',
  `status` int(1) DEFAULT NULL COMMENT '(2) not active, (1) active , (0) resign',
  `auth_user` int(1) DEFAULT NULL COMMENT '(0) manager, (1) supervisor, (2) karyawan',
  `team` varchar(20) DEFAULT NULL COMMENT 'team in branch',
  `departement` varchar(20) DEFAULT NULL COMMENT 'departemen in branch',
  `branch_id` varchar(15) DEFAULT NULL COMMENT 'branch code',
  `password` varchar(50) DEFAULT NULL COMMENT 'hash',
  `contract` int(1) DEFAULT NULL COMMENT '(0) permanent , (1) contract',
  `last_contract` varchar(17) DEFAULT NULL COMMENT 'format [20220705-20221204]',
  `date_regist` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'timestamp',
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'timestamp',
  `remark` varchar(200) DEFAULT NULL COMMENT 'spesial comment'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='table user aja';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_base`
--
ALTER TABLE `user_base`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
