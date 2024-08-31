-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2024 at 06:48 PM
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
-- Database: `latihan_sql`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(3) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `avaibility` varchar(100) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `yearex` int(3) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `nama`, `role`, `avaibility`, `age`, `lokasi`, `yearex`, `email`) VALUES
(195, 'widodo', 'Arif', 'Full-time', 12, '0', 23, 'dentamustofa625@gmail.com'),
(198, 'jokowi', 'Back-end', 'full-time', 23, '0', 34, '23@gmail.com'),
(202, 'DentaMusofa', 'Back-end', 'full-time', 23, 'Jakarta', 34, '23@gmail.com'),
(209, 'Denta Musofaxx', 'Back-end', 'full-time', 23, 'ddddddddd', 34, '23@gmail.com'),
(210, 'arifff', 'Back-end', 'full-time', 23, '0', 34, '23@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
