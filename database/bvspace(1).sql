-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2022 at 07:27 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bvspace`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `ques_id` int(255) DEFAULT NULL,
  `ans` text NOT NULL,
  `upvote` int(255) NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(255) NOT NULL,
  `ans_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`ques_id`, `ans`, `upvote`, `date_posted`, `id`, `ans_id`) VALUES
(13, 'Functional programming is a programming paradigm in which we try to bind everything in pure mathematical functions style. It is a declarative type of programming style. Its main focus is on “what to solve” in contrast to an imperative style where the main focus is “how to solve”. It uses expressions instead of statements. An expression is evaluated to produce a value whereas a statement is executed to assign variables.', 0, '2022-05-01 03:26:34', 32, 57),
(14, 'Structured programming is a programming paradigm aimed at improving the clarity, quality, and development time of a computer program by making extensive use of the structured control flow constructs of selection (if/then/else) and repetition (while and for), block structures, and subroutines. ', 1, '2022-05-01 03:31:53', 32, 58),
(14, 'In structured programming, we sub-divide the whole program into small modules so that the program becomes easy to understand. The purpose of structured programming is to linearize control flow through a computer program so that the execution sequence follows the sequence in which the code is written. The dynamic structure of the program than resemble the static structure of the program. This enhances the readability, testability, and modifiability of the program. This linear flow of control can be managed by restricting the set of allowed applications construct to a single entry, single exit formats.', 0, '2022-05-01 04:19:33', 32, 59),
(15, 'A Queue is a linear structure which follows a particular order in which the operations are performed. The order is First In First Out (FIFO). A good example of a queue is any queue of consumers for a resource where the consumer that came first is served first. The difference between stacks and queues is in removing. In a stack we remove the item the most recently added; in a queue, we remove the item the least recently added.', 0, '2022-05-01 05:12:11', 32, 60);

-- --------------------------------------------------------

--
-- Table structure for table `liketable`
--

CREATE TABLE `liketable` (
  `ans_id` int(255) NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `liketable`
--

INSERT INTO `liketable` (`ans_id`, `id`) VALUES
(58, 32);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `ques_id` int(255) NOT NULL,
  `ques` text NOT NULL,
  `view_times_no` int(10) NOT NULL,
  `date_posted` int(11) NOT NULL DEFAULT current_timestamp(),
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`ques_id`, `ques`, `view_times_no`, `date_posted`, `id`) VALUES
(13, 'What is functional programming?', 10, 2147483647, 32),
(14, 'what is Structured Programming?', 58, 2147483647, 32),
(15, 'What is a queue?', 3, 2147483647, 32);

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `S.No` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `Branch` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Document` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`S.No`, `id`, `Branch`, `Subject`, `Title`, `Document`) VALUES
(49, 26, 'CS', 'Probability', 'Probability and Statistcis', 'uploads/626b92b9263c67.22026717.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(500) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `startYear` date NOT NULL,
  `endYear` date NOT NULL,
  `Branch` varchar(255) NOT NULL,
  `linkedin` varchar(500) NOT NULL,
  `summerIntern` varchar(500) NOT NULL,
  `UIL` varchar(500) NOT NULL,
  `placement` varchar(500) NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `is_verified` int(10) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `startYear`, `endYear`, `Branch`, `linkedin`, `summerIntern`, `UIL`, `placement`, `verification_code`, `is_verified`, `created_at`) VALUES
(28, 'Tanya Arora', 'tanya123@gmail.com', '15de21c670ae7c3f6f3f1f37029303c9', '2022-04-19', '2024-04-10', '', 'tanya', 'Barclay', 'essentia', '', '', 0, '2022-04-25 21:42:43'),
(32, 'Kumari Saumya Singh', 'ksaumyasingh@gmail.com', '$2y$10$ZvkTKH.8.jpKbPFqgVq3b.P5CzhiohB0UnFXbLnp6eZHK/dmKfyn2', '2019-06-11', '2023-05-30', 'CS', 'https://www.linkedin.com/in/ksaumyasingh/', 'Barclay', 'Essentia', '', 'b978c0360829bf4dca87db7a04e9f81d', 1, '2022-04-29 15:48:32'),
(34, 'Shivani Paliwal', 'shivanipaliwal2909@gmail.com', '$2y$10$KbcthmRmKtAtdNhqMPCmzuNBqmDBP8JWDZ0SgAnRIr182W5M98yBC', '2019-05-14', '2023-05-01', 'CS', 'https://www.linkedin.com/in/ksaumyasingh/', '', 'Essentia', '', '16b1fbab75da6a1e715f0520847bde21', 0, '2022-05-01 12:09:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`ans_id`),
  ADD KEY `id` (`id`),
  ADD KEY `ques_id` (`ques_id`);

--
-- Indexes for table `liketable`
--
ALTER TABLE `liketable`
  ADD KEY `ans_id` (`ans_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`ques_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`S.No`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `ans_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `ques_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `S.No` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`ques_id`) REFERENCES `question` (`ques_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `liketable`
--
ALTER TABLE `liketable`
  ADD CONSTRAINT `liketable_ibfk_1` FOREIGN KEY (`ans_id`) REFERENCES `answer` (`ans_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `liketable_ibfk_2` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
