-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2021 at 12:09 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event`
--

-- --------------------------------------------------------

--
-- Table structure for table `event_details`
--

CREATE TABLE `event_details` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `repeat_type` enum('1','2') NOT NULL COMMENT '1 - Repeat\r\n2 - Repeat Specific',
  `repeat_every` enum('Every','Every Other','Every Third','Every Fourth') DEFAULT NULL,
  `repeat_on` enum('Day','Week','Month','Year') DEFAULT NULL,
  `repeat_interval` enum('First','Second','Third','Fourth') DEFAULT NULL,
  `repeat_day` enum('sunday','monday','tuesday','wednesday','thursday','friday','saturday') DEFAULT NULL,
  `repeat_month_year` enum('Month','3 Months','4 Months','6 Months','Year') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_details`
--

INSERT INTO `event_details` (`id`, `title`, `start_date`, `end_date`, `repeat_type`, `repeat_every`, `repeat_on`, `repeat_interval`, `repeat_day`, `repeat_month_year`, `created_at`, `updated_at`) VALUES
(16, 'EVENT 2', '2021-12-06', '2021-12-27', '1', 'Every Fourth', 'Day', NULL, NULL, NULL, '2021-12-31 08:40:37', '2021-12-31 11:02:45'),
(20, 'EVENT 1', '2021-12-01', '2022-08-19', '2', NULL, NULL, 'Fourth', 'wednesday', 'Month', '2021-12-31 08:45:45', '2021-12-31 10:50:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event_details`
--
ALTER TABLE `event_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_details`
--
ALTER TABLE `event_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
