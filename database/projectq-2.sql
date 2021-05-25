-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 28, 2020 at 12:05 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectq`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_p`
--

CREATE TABLE `address_p` (
  `ad_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `ad_idhome` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ad_alley` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ad_road` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ad_moo` int(5) NOT NULL,
  `ad_tumbol` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ad_amper` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ad_province` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ad_atbirth` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Info_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `defence`
--

CREATE TABLE `defence` (
  `de_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `type_id` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `Info_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `di_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `di_NameSymptom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `medic_id` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `Info_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `emp_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `emp_surname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `emp_gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `emp_pre` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `history_drug`
--

CREATE TABLE `history_drug` (
  `hd_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `hd_namedrug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Info_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medic`
--

CREATE TABLE `medic` (
  `medic_id` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `medic_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `medic_surname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `medic_age` int(5) NOT NULL,
  `medic_pre` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `mem_id` int(1) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `cardnumber` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mem_id`, `email`, `cardnumber`, `password`, `username`) VALUES
(1, 'pachara@hotmail.com', '0991565524', '1234', 'pachara'),
(2, 'test@hotmail.com', '0989153617', '1234', 'test'),
(3, 'asd', '0989153617', '1234', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `nexttime`
--

CREATE TABLE `nexttime` (
  `nt_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `nt_date` datetime NOT NULL,
  `nt_time` datetime NOT NULL,
  `emp_id` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `Info_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_info`
--

CREATE TABLE `patient_info` (
  `Info_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Info_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Info_surename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Info_age` int(3) NOT NULL,
  `Info_cardnum` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `Info_pre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Info_sex` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Info_career` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Info_birthday` datetime NOT NULL,
  `Info_religion` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Info_race` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Info_national` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Info_infoname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Info_about` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Info_nameadult` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Info_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ad_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

CREATE TABLE `queue` (
  `queue_id` int(1) NOT NULL,
  `queue_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `queue_time` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type_id` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mem_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `queue_date`
--

CREATE TABLE `queue_date` (
  `id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL DEFAULT '',
  `ontime` time NOT NULL,
  `hasq` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `queue_date`
--

INSERT INTO `queue_date` (`id`, `date`, `ontime`, `hasq`) VALUES
(1, '27-11-2020', '14:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `queue_emp`
--

CREATE TABLE `queue_emp` (
  `eguest_id` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `eguest_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eguest_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_id` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `emp_id` varchar(4) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `se_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `se_idlicense` int(20) NOT NULL,
  `se_idpublic` int(20) NOT NULL,
  `se_idhn` int(20) NOT NULL,
  `se_idfamily` int(20) NOT NULL,
  `se_idXray` int(20) NOT NULL,
  `se_roft` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `se_pressure` int(10) NOT NULL,
  `se_weight` int(3) NOT NULL,
  `se_height` int(3) NOT NULL,
  `se_waist` int(3) NOT NULL,
  `se_temp` int(10) NOT NULL,
  `emp_id` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `Info_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time_list`
--

CREATE TABLE `time_list` (
  `id` int(11) NOT NULL,
  `time_string` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time` time NOT NULL,
  `time_end` time NOT NULL,
  `hasq` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `time_list`
--

INSERT INTO `time_list` (`id`, `time_string`, `time`, `time_end`, `hasq`) VALUES
(1, '09:00-10:30', '09:00:00', '10:30:00', 0),
(2, '10:30-12:00', '10:30:00', '12:00:00', 0),
(3, '13:00-14:30', '13:00:00', '14:30:00', 0),
(4, '14:30-16:00', '14:00:00', '16:30:00', 0),
(5, '17:00-18:30', '17:00:00', '18:30:00', 0),
(6, '18:30-20:00', '18:30:00', '20:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `type_service`
--

CREATE TABLE `type_service` (
  `type_id` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_service`
--

INSERT INTO `type_service` (`type_id`, `type_name`) VALUES
('T001', 'ประคบร้อน'),
('T002', 'นวดแพทย์แผนไทย');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `medic`
--
ALTER TABLE `medic`
  ADD PRIMARY KEY (`medic_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `queue`
--
ALTER TABLE `queue`
  ADD PRIMARY KEY (`queue_id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- Indexes for table `queue_date`
--
ALTER TABLE `queue_date`
  ADD KEY `Index 1` (`id`);

--
-- Indexes for table `time_list`
--
ALTER TABLE `time_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_service`
--
ALTER TABLE `type_service`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mem_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `queue`
--
ALTER TABLE `queue`
  MODIFY `queue_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `queue_date`
--
ALTER TABLE `queue_date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `time_list`
--
ALTER TABLE `time_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
