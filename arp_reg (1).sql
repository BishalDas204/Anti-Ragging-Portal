-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 03:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arp_reg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pn` varchar(10) NOT NULL,
  `pas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `email`, `pn`, `pas`) VALUES
('Anirban Dutta', 'a@gmail.com', '1234567890', '$2y$10$xjiGlgMxeAhDRoSwoInD7.X5LDKoC8wT3qpVJENAVrulxzeXmwogi'),
('fdfdfd', 'f@gmail.com', '1234567880', '$2y$10$FYf8irFJXANKakiZ4KoDC.YCoOnLYvAFYdwjCbhXKKvPyiRAkJo3G'),
('nahida', 'n@gmail.com', '7777777777', '$2y$10$65j7Gynd0pHpRib/QlOM3e342/HR/OYpyrd2RawE2WUaUr2zqBe8O');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `r_id` int(11) NOT NULL,
  `r_name` varchar(20) NOT NULL,
  `r_mail` varchar(100) NOT NULL,
  `r_college` varchar(100) NOT NULL,
  `r_course` varchar(20) NOT NULL,
  `r_sem` int(11) NOT NULL,
  `r_roll` varchar(20) NOT NULL,
  `r_msg` varchar(200) NOT NULL,
  `a_name` varchar(20) NOT NULL,
  `a_college` varchar(100) NOT NULL,
  `a_course` varchar(20) NOT NULL,
  `a_sem` int(11) NOT NULL,
  `a_roll` varchar(20) NOT NULL,
  `r_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`r_id`, `r_name`, `r_mail`, `r_college`, `r_course`, `r_sem`, `r_roll`, `r_msg`, `a_name`, `a_college`, `a_course`, `a_sem`, `a_roll`, `r_date`) VALUES
(1, 'Anish', 'anish@gmail.com', 'Adamas', 'BCA', 6, '13', 'gfg', 'Anirban', 'ADAMAS UNIVERSITY', 'BCA', 5, '12', '2024-11-11 19:13:09'),
(2, 'Anish', 'anish@gmail.com', 'Adamas', 'BCA', 6, '13', 'eterererer', 'Anirban', 'ADAMAS UNIVERSITY', 'BCA', 5, '12', '2024-11-11 19:13:24'),
(3, 'Anirban', 'a@gmail.com', 'Techno', 'BCA', 6, '13', 'cvc', 'Anirban', 'ADAMAS UNIVERSITY', 'BCA', 5, '12', '2024-11-17 13:48:17');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `name` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pn` varchar(10) NOT NULL,
  `pas` varchar(255) NOT NULL,
  `coll name` varchar(100) NOT NULL,
  `rcount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`name`, `email`, `pn`, `pas`, `coll name`, `rcount`) VALUES
('Anirban', 'a@gmail.com', '1234567899', '$2y$10$m57VycDWDFgZrMkE8gQRW.hZS/cgBm151oUeYeodMjc.vqhsRPPS2', 'Techno', 0),
('Anirban Dutta', 'ad@gmail.com', '1234567898', '$2y$10$UYKEa2gMcMCy3sYXDAUJIeD4DN4DnNX9lp8c9AEbH7oeaF974bOdG', 'Techno', 0),
('Anish', 'anish@gmail.com', '8565565879', '$2y$10$po/18p2nC8BlW5D5WyDIf.EZ4wjww9QodH.BEY6UG/vz3LEGpQBNO', 'Adamas', 2),
('fd', 'fdfd@gmail.com', '899999', '$2y$10$B030AWiFzl9voj4DqgZt.ON6Vzl5p3FvDTSl5zCuSVRVlVQbiwzxe', 'Adamas University', 0),
('Mouma', 'mouma@gmail.com', '1234567890', '$2y$10$TRZ0JVKggvAgzU1LjJ4i9.HXqEEwfKIBvvXZ8aJnCkriPMrsKcxFy', 'adamas', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `pn` (`pn`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `pn` (`pn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
