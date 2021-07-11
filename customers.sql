-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2021 at 10:30 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `ID` int(11) NOT NULL,
  `fldName` varchar(50) NOT NULL,
  `fldEmail` varchar(100) NOT NULL,
  `bal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`ID`, `fldName`, `fldEmail`, `bal`) VALUES
(1, 'Muskan Sharma', 'muskan23@gmail.com', 20000),
(2, 'Riya Patel', 'riya.p@gmail.com', 10000),
(3, 'Prachi Desai', 'prachi76@yahoo.com', 5500),
(4, 'bhavana Chauhan', 'bhavana34@gmail.com', 85000),
(5, 'Priyanka Patel', 'priyankapatel2@gmail.com', 9000),
(6, 'Dhruvi Shah', 'pockemon777@gmail.com', 6800),
(7, 'Aman Jain', 'amanj@gmail.com', 3000),
(8, 'aayushi_86', 'anastasiascheckholm@gmail.com', 33000),
(9, 'Jinesh Verma', 'vermaj12@gmail.com', 16000),
(10, 'Kajal Agrawal', 'kajal.p@yahoo.com', 39000),
(11, 'asfslhad', 'aartisinghal@gmail.com', 5010),
(12, 'Dilip Chauhan', 'dilip75@gmail.com', 55000),
(13, 'Pankaj Jain', 'pankaj.j12@gmail.com', 35000),
(14, 'Jay Bihola', 'jaybihola@outlook.com', 25000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
