-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 12:01 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `midtermproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `jobId` int(100) NOT NULL,
  `jobTitle` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `usersId` int(10) NOT NULL,
  `cityName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jobId`, `jobTitle`, `category`, `description`, `usersId`, `cityName`) VALUES
(1, 'Manager', 'Accounting', 'Looking for managers to work on the new Albanian office', 1, 'Tirana'),
(2, 'Post Delivery Driver', 'Delivery', 'Looking for driver to deliver packages in the city', 1, 'Tirana'),
(3, 'Factory Worker', 'Factory', 'Opening new factory in Tirana for packaging line, looking for workers', 2, 'Tirana'),
(4, 'Intern Programmer', 'Intern', 'Offering job for Intern, great working conditions to gain a lot of experience from home', 3, 'Los Angeles'),
(5, 'Designer', 'Designer', 'Looking for experienced Designer to work with our team on future projects', 3, 'Los Angeles');

-- --------------------------------------------------------

--
-- Table structure for table `pfp`
--

CREATE TABLE `pfp` (
  `id` int(10) NOT NULL,
  `usersId` int(10) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pfp`
--

INSERT INTO `pfp` (`id`, `usersId`, `status`) VALUES
(1, 1, 0),
(2, 2, 0),
(3, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(10) NOT NULL,
  `companyName` varchar(50) NOT NULL,
  `cityName` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `upassword` varchar(50) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `companyName`, `cityName`, `username`, `upassword`, `phoneNumber`) VALUES
(1, 'Amazon', 'Tirana', 'amazon123', 'amazon123', '0674684863'),
(2, 'Coca Cola', 'Tirana', 'coca123', 'coca123', '0664846544'),
(3, 'Google', 'Los Angeles', 'google123', 'google123', '0678947816');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jobId`);

--
-- Indexes for table `pfp`
--
ALTER TABLE `pfp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jobId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pfp`
--
ALTER TABLE `pfp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
