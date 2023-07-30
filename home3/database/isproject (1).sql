-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2023 at 06:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(75) NOT NULL,
  `aName` varchar(75) NOT NULL,
  `fullName` varchar(75) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meter`
--

CREATE TABLE `meter` (
  `mid` int(11) NOT NULL,
  `consumption` float DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meter`
--

INSERT INTO `meter` (`mid`, `consumption`, `latitude`, `longitude`, `time`) VALUES
(1, NULL, NULL, NULL, '2023-07-23 20:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `meters`
--

CREATE TABLE `meters` (
  `mid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `energy` float NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smartmeter`
--

CREATE TABLE `smartmeter` (
  `mid` int(100) NOT NULL,
  `energy` float DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `time` datetime DEFAULT current_timestamp(),
  `uid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smeter`
--

CREATE TABLE `smeter` (
  `uid` int(75) NOT NULL,
  `mid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE `technician` (
  `tid` int(75) NOT NULL,
  `tName` varchar(75) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(75) NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(75) NOT NULL,
  `uName` varchar(75) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(75) NOT NULL,
  `role` text NOT NULL,
  `mid` int(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(75) NOT NULL,
  `uName` varchar(75) NOT NULL,
  `fullName` text NOT NULL,
  `email` varchar(75) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uName`, `fullName`, `email`, `password`, `role`) VALUES
(3, 'daniel', 'Daniel', 'dan@gmail.com', '1234', 'USER'),
(5, 'x', 'x-gon', 'x@gmail.com', '$2y$10$diHTWalbWV.V9TcRAUOva.zekVKvvjkkuzTW8jvZ/u1v13pGBjRbG', 'USER'),
(6, 'dan', 'danny', 'dan@gmail.com', '$2y$10$mSoKi4aifTkKy/Hu7u61te2H2oyqZOBRNr9LNr8Hyydp9qJP7Prt6', 'ADMIN'),
(7, 'Su', 'susan', 'su@outlook.com', '$2y$10$gfnc1eHbejeVGTUMiTJhE.PhVEdJ50jwxVB.pI/YZ5YxX.u2nI3YK', 'TECHNICIAN'),
(8, 'abc', 'ABC', 'abc@abc.com', '$2y$10$JjlmEZRBhKVBCf9p0Mmt5uwnjy6o51yOf8ChiRO2cmme.lk52EZm2', 'USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `meter`
--
ALTER TABLE `meter`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `smartmeter`
--
ALTER TABLE `smartmeter`
  ADD PRIMARY KEY (`mid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `smeter`
--
ALTER TABLE `smeter`
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `technician`
--
ALTER TABLE `technician`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `mid` (`mid`),
  ADD KEY `mid_2` (`mid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(75) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `technician`
--
ALTER TABLE `technician`
  MODIFY `tid` int(75) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(75) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(75) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `smartmeter`
--
ALTER TABLE `smartmeter`
  ADD CONSTRAINT `smartmeter_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);

--
-- Constraints for table `smeter`
--
ALTER TABLE `smeter`
  ADD CONSTRAINT `smeter_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
