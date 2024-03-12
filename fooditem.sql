-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2024 at 07:51 PM
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
-- Database: `justc`
--

-- --------------------------------------------------------

--
-- Table structure for table `fooditem`
--

CREATE TABLE `fooditem` (
  `Myfood_ID` bigint(20) NOT NULL,
  `id` bigint(20) NOT NULL,
  `Description` varchar(30) NOT NULL,
  `Calories` int(11) NOT NULL,
  `Portion` float NOT NULL,
  `Unit` varchar(10) NOT NULL,
  `SubmitGlobal` int(11) NOT NULL,
  `ApprovedGlobal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fooditem`
--

INSERT INTO `fooditem` (`Myfood_ID`, `id`, `Description`, `Calories`, `Portion`, `Unit`, `SubmitGlobal`, `ApprovedGlobal`) VALUES
(1, 4, 'Pickle', 2, 1, 'Each', 1, 0),
(2, 4, 'Chicken', 220, 1, 'Cup', 1, 0),
(3, 4, 'Carrot Cake', 300, 1, 'Slice', 1, 0),
(4, 4, 'Fried Fish', 255, 1, 'Filet', 1, 0),
(5, 5, 'Fried Wallie', 256, 1, 'Filet', 1, 0),
(6, 5, 'Fried Wallie', 256, 1, 'Filet', 1, 0),
(7, 5, 'Fried Walleye', 257, 1, 'Filet', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fooditem`
--
ALTER TABLE `fooditem`
  ADD PRIMARY KEY (`Myfood_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fooditem`
--
ALTER TABLE `fooditem`
  MODIFY `Myfood_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
