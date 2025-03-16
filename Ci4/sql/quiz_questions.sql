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
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `quizID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user` varchar(220) NOT NULL,
  `question` text NOT NULL,
  `choice1` text NOT NULL,
  `choice2` text NOT NULL,
  `choice3` text NOT NULL,
  `choice4` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`quizID`, `user_id`, `user`, `question`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES
(1, 2, 'Miss Wales', 'How many days are there in July?', '30 days', '28 days', '32 days', '31 days', '31 days'),
(2, 2, 'Miss Wales', 'At what temperature centigrade does pure water boil at?', '95 degrees', '100 degrees', '96 degrees', '102 degrees', '100 degrees'),
(3, 2, 'Miss Wales', 'What company name matches one of the longest rivers in the world?', 'Woolworths', 'Nile', 'Amazon', 'Buffalo', 'Amazon'),
(4, 2, 'Miss Wales', 'What in the animal kingdom is a doe?', 'Piglet', 'Filly', 'Deer', 'Rat', 'Deer'),
(5, 2, 'Miss Wales', 'What is the tallest mountain in the world?', 'Mount Everest', 'Mount Kilimanjaro', 'Andies', 'Swiss Alps', 'Mount Everest'),
(6, 1, 'Mr.Martin', 'What is the correct unit of force?', 'Joule', 'N/m', 'Nm', 'Newton', 'Newton'),
(7, 1, 'Mr.Martin', 'What is the correct unit for energy?', 'Nm', 'Joule', 'kg', 'mm', 'Joule'),
(8, 1, 'Mr.Martin', 'What is the correct unit for Power?', 'Joule', 'kg', 'Joule/sec', 'Nm', 'Joule/sec'),
(9, 1, 'Mr.Martin', 'What is the correct unit for acceleration?', 'mm/sec', 'Joule/sec', 'm/sec squared', 'Nm', 'm/sec squared'),
(10, 1, 'Mr.Martin', 'What is the correct unit for momment of inertia?', 'Kg.m squared', 'J', 'N', 'kg', 'Kg.m squared'),
(11, 4, 'Mrs.Maze', 'Where is the city of Richards Bay situated?', 'Gauteng', 'Kwazulu-Natal', 'Northern Cape', 'Eastern Cape', 'Kwazulu-Natal'),
(12, 4, 'Mrs.Maze', 'Where is the city of Cape Town situated?', 'Western Cape', 'Eastern Cape', 'Limpopo', 'Northen Cape', 'Western Cape'),
(13, 4, 'Mrs.Maze', 'Where is the city of Johannesburg situated?', 'Free State', 'Gauteng', 'Mapumalanga', 'Kimberly', 'Gauteng'),
(14, 4, 'Mrs.Maze', 'Where is the city of Amanzimtoti situated?', 'Zululand', 'Oranja', 'Kwazulu-Natal', 'Guateng', 'Kwazulu-Natal'),
(15, 4, 'Mrs.Maze', 'Where is the city of Margate situated?', 'Kwazulu-Natal', 'Eastern Cape', 'Western Cape', 'Northern Cape', 'Kwazulu-Natal'),
(16, 5, 'Mr.Donk', 'What color is the sky?', 'Red', 'Blue', 'Green', 'Pink', 'Blue'),
(17, 5, 'Mr.Donk', 'What mobile phone do I use?', 'Nokia', 'iPhone', 'Samsung', 'Motorolla', 'iPhone'),
(18, 5, 'Mr.Donk', 'How many laptops do I own?', 'One', 'Two', 'Three', 'None', 'One'),
(19, 5, 'Mr.Donk', 'What is my favourite operating system?', 'MacOSX', 'Unix', 'Linux', 'Microsoft Windows', 'MacOSX'),
(20, 5, 'Mr.Donk', 'How many meals do I eat in a day?', 'One', 'Twp', 'It depends', 'Three', 'It depends');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`quizID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `quizID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
