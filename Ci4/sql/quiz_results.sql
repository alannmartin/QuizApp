-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 25, 2025 at 08:54 AM
-- Server version: 5.7.39
-- PHP Version: 8.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `QuizApp`
--

-- --------------------------------------------------------

--
-- Table structure for table `quiz_results`
--

CREATE TABLE `quiz_results` (
  `result_id` int(11) NOT NULL,
  `user` varchar(225) NOT NULL,
  `quiz_taker` varchar(255) NOT NULL,
  `class` varchar(35) NOT NULL,
  `your_answer1` varchar(255) NOT NULL,
  `your_answer2` varchar(255) NOT NULL,
  `your_answer3` varchar(255) NOT NULL,
  `your_answer4` varchar(255) NOT NULL,
  `final` int(3) NOT NULL,
  `date_taken` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_results`
--

INSERT INTO `quiz_results` (`result_id`, `user`, `quiz_taker`, `class`, `your_answer1`, `your_answer2`, `your_answer3`, `your_answer4`, `final`, `date_taken`) VALUES
(8, 'Miss Wales', 'A Hero', '12Q', '31 days', '100 degrees', 'Amazon', 'Deer', 5, '2024-12-26 00:00:00'),
(9, 'Miss Wales', 'A Student', '12A', '28 days', '102 degrees', 'Amazon', 'Deer', 3, '2024-12-26 00:00:00'),
(10, 'Miss Wales', 'URA Doffy', '34R', '30 days', '100 degrees', 'Nile', 'Deer', 2, '2024-12-26 00:00:00'),
(12, 'Miss Wales', 'Any Nerd', '78t', '31 days', '100 degrees', 'Amazon', 'Deer', 5, '2024-12-26 00:00:00'),
(18, 'Mr.Martin', 'Joseph Dongle', '23Y', 'Newton', 'Joule', 'Joule/sec', 'm/sec squared', 5, '2025-01-10 19:37:29'),
(22, 'Mr.Martin', 'Jim Clark', '23E', 'Newton', 'Joule', 'Joule/sec', 'm/sec squared', 4, '2025-01-14 16:49:33'),
(26, 'Mr.Martin', 'John Smith', '23T', 'Newton', 'Joule', 'Joule/sec', 'm/sec squared', 4, '2025-01-14 19:24:02'),
(28, 'Mrs.Maze', 'Peter Pan', '23Y', 'Kwazulu-Natal', 'Western Cape', 'Gauteng', 'Kwazulu-Natal', 4, '2025-01-14 19:48:13'),
(29, 'Mr.Martin', 'James Bond', '45W', 'Newton', 'Joule', 'Nm', 'm/sec squared', 4, '2025-01-14 19:56:34'),
(31, 'Miss Wales', 'James', '34Y', '31 days', '95 degrees', 'Woolworths', 'Deer', 3, '2025-01-23 17:02:17'),
(33, 'Mrs.Maze', 'James', '23R', 'Kwazulu-Natal', 'Limpopo', 'Mapumalanga', 'Kwazulu-Natal', 3, '2025-01-23 17:03:27'),
(34, 'Mr.Donk', 'Alan Martin', '23Y', 'Blue', 'iPhone', 'One', 'MacOSX', 5, '2025-01-25 10:50:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD PRIMARY KEY (`result_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quiz_results`
--
ALTER TABLE `quiz_results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
