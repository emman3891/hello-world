-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2022 at 06:47 PM
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
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `id` int(10) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `batch` varchar(50) NOT NULL,
  `expiry_date` date NOT NULL,
  `branch` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `allocated` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`id`, `code`, `name`, `batch`, `expiry_date`, `branch`, `quantity`, `allocated`) VALUES
(18, 'zda', 'zenadol', 'q11%', '2050-07-08', 'manila, JACARTAR', 215, 79),
(19, 'ccccc', 'lucozade', '34e', '2000-09-12', 'mbeya', 100, 76),
(20, 'bcc', 'panadol', '54565', '2022-12-06', 'temeke', 20, 4),
(21, 'ddd', 'zenadol', '670', '2021-10-04', 'mbeya', 60, 0),
(24, 'ggh', 'zenadol', '245', '2000-09-11', 'mbeya', 48, 23),
(25, 'ert', 'panadol', '670', '2022-10-10', 'temeke', 45, 17),
(26, 'hhhh', 'zenadol', '245', '2022-12-06', 'mbezi', 400, 65),
(27, 'hhh', 'zenadol', '245', '2021-10-04', 'mbezi', 90, 55),
(28, 'bbb', 'zenadol', '566', '2022-10-10', 'mbezi', 88, 56);

-- --------------------------------------------------------

--
-- Table structure for table `drug_batch`
--

CREATE TABLE `drug_batch` (
  `id` int(11) NOT NULL,
  `batch__no` int(11) NOT NULL,
  `entry_date` date NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `drug_inventory`
--

CREATE TABLE `drug_inventory` (
  `inventory id` int(50) NOT NULL,
  `drug_id` int(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `quantity allocated` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
