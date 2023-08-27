-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2023 at 10:42 PM
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
(5, 'x', 'x-gon', 'x@gmail.com', '$2y$10$diHTWalbWV.V9TcRAUOva.zekVKvvjkkuzTW8jvZ/u1v13pGBjRbG', 'USER'),
(6, 'dan', 'danny', 'dan@gmail.com', '$2y$10$mSoKi4aifTkKy/Hu7u61te2H2oyqZOBRNr9LNr8Hyydp9qJP7Prt6', 'ADMIN'),
(7, 'Su', 'susan', 'su@outlook.com', '$2y$10$gfnc1eHbejeVGTUMiTJhE.PhVEdJ50jwxVB.pI/YZ5YxX.u2nI3YK', 'TECHNICIAN'),
(8, 'abc', 'ABC', 'abc@abc.com', '$2y$10$JjlmEZRBhKVBCf9p0Mmt5uwnjy6o51yOf8ChiRO2cmme.lk52EZm2', 'USER'),
(9, 'user1', 'user1', 'user1@gmail.com', '$2y$10$QqUGhSfr/odZwkS5XggvnOaxD.CV6pmvoWlvuwjFCRJqy2/s.A.x6', 'USER'),
(10, 'user2', 'user2', 'user2@gmail.com', '$2y$10$F1gd4/MjYhZEF5z/ZfK6BeOoFsx5dLEP18lDUAHgfuZ394bHAiMjS', 'USER'),
(11, 'user3', 'user3', 'user3@gmail.com', '$2y$10$PY3qVjriXxwqDeFPmZmtyukkJz/hQ.xvGb5VRuqZ/gZimcaDBagxu', 'USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(75) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
