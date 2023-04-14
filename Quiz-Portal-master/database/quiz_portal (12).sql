-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2018 at 11:49 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `colour` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `password`, `colour`) VALUES
(1, 'csi_secret', 'unity', '#465a64');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `ans_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `ques_id` bigint(20) NOT NULL,
  `answer_provided` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `option`
--

CREATE TABLE `option` (
  `option_id` bigint(20) NOT NULL,
  `ques_id` bigint(20) NOT NULL,
  `description` longtext NOT NULL,
  `image` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `option`
--

INSERT INTO `option` (`option_id`, `ques_id`, `description`, `image`) VALUES
(29, 15, 'Bharuch', NULL),
(30, 15, 'Gandhinagar', NULL),
(31, 15, 'surat', NULL),
(32, 15, 'vadodara', NULL),
(33, 16, 'yes', NULL),
(34, 16, 'no', NULL),
(35, 18, 'yes', NULL),
(36, 18, 'no', NULL),
(37, 19, 'poor', NULL),
(38, 19, 'medium', NULL),
(39, 19, 'good', NULL),
(40, 19, 'awesome', NULL),
(41, 21, 'yes', NULL),
(42, 21, 'no', NULL),
(43, 22, 'Bharuch', NULL),
(44, 22, 'Gandhinagar', NULL),
(45, 22, 'surat', NULL),
(46, 22, 'vadodara', NULL),
(47, 23, 'yes', NULL),
(48, 23, 'no', NULL),
(49, 25, 'yes', NULL),
(50, 25, 'no', NULL),
(51, 26, 'poor', NULL),
(52, 26, 'medium', NULL),
(53, 26, 'good', NULL),
(54, 26, 'awesome', NULL),
(55, 28, 'yes', NULL),
(56, 28, 'no', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `ques_id` bigint(20) NOT NULL,
  `quiz_id` bigint(20) NOT NULL,
  `description` longtext NOT NULL,
  `answer` longtext NOT NULL,
  `has_options` tinyint(1) NOT NULL,
  `image` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`ques_id`, `quiz_id`, `description`, `answer`, `has_options`, `image`) VALUES
(15, 30, 'What is capital of gujrat?', 'Gandhinagar', 4, NULL),
(16, 30, 'do you like the ddit sesssional examination?', 'no', 2, NULL),
(17, 30, 'describe your self in 2 or 4 word.', 'I am zerocool', 0, NULL),
(18, 30, 'do you have ever sent message in wrong group and then think that you have made big scene?', 'yes', 2, NULL),
(19, 30, 'how do you find your junior technical commeety work?', 'awesome', 4, NULL),
(20, 30, 'tell one or two word about our portal!', 'awesome', 0, NULL),
(21, 30, 'do you have ever prank with friend and then that became a serious issue?', 'yes', 2, NULL),
(22, 31, 'What is capital of gujrat?', 'Gandhinagar', 4, NULL),
(23, 31, 'do you like the ddit sesssional examination?', 'no', 2, NULL),
(24, 31, 'describe your self in 2 or 4 word.', 'I am zerocool', 0, NULL),
(25, 31, 'do you have ever sent message in wrong group and then think that you have made big scene?', 'yes', 2, NULL),
(26, 31, 'how do you find your junior technical commeety work?', 'awesome', 4, NULL),
(27, 31, 'tell one or two word about our portal!', 'awesome', 0, NULL),
(28, 31, 'do you have ever prank with friend and then that became a serious issue?', 'yes', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` bigint(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `duration` bigint(20) NOT NULL,
  `is_available` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `name`, `duration`, `is_available`) VALUES
(30, 'quiz for fun', 7200, 1),
(31, 'coading Quiz', 7100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` longtext NOT NULL,
  `password` varchar(50) NOT NULL,
  `quiz_id` bigint(20) NOT NULL,
  `time_started` bigint(20) DEFAULT NULL,
  `time_completed` bigint(20) DEFAULT NULL,
  `time_elapsed` bigint(20) DEFAULT NULL,
  `score` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `firstname`, `lastname`, `password`, `quiz_id`, `time_started`, `time_completed`, `time_elapsed`, `score`) VALUES
(25, 'sid', 'Siddharth', 'Yadav', 'sid123', 30, NULL, NULL, NULL, 0),
(26, 'anmol', 'anmol', 'Saxena', 'anmol123', 30, NULL, NULL, NULL, 0),
(27, 'mohit', 'mohit', 'madlewala', 'mohit123', 30, NULL, NULL, NULL, 0),
(28, 'arshit', 'arshit', 'vaghasiya', 'arshit123', 30, NULL, NULL, NULL, 0),
(29, 'rachit', 'rachit', 'shah', 'rachit123', 30, NULL, NULL, NULL, 0),
(30, 'rahi', 'rahi', 'jobanputra', 'rahi123', 30, NULL, NULL, NULL, 0),
(31, 'amrita', 'amrita', 'boghayata', 'amrita123', 30, NULL, NULL, NULL, 0),
(32, 'tilak', 'tilak', 'desai', 'tilak123', 30, NULL, NULL, NULL, 0),
(33, 'vishal', 'vishal', 'kapadia', 'vishal123', 30, NULL, NULL, NULL, 0),
(34, 'miss9', 'maitri', 'joshi', 'miss9123', 30, NULL, NULL, NULL, 0),
(35, 'vaibhav', 'vaibhav', 'dodiya', 'vaibhav123', 30, NULL, NULL, NULL, 0),
(36, 'bhargav', 'bhargav', 'lad', 'bhargav123', 30, NULL, NULL, NULL, 0),
(37, 'sid', 'Siddharth', 'Yadav', 'sid123', 31, NULL, NULL, NULL, 0),
(38, 'anmol', 'anmol', 'Saxena', 'anmol123', 31, NULL, NULL, NULL, 0),
(39, 'mohit', 'mohit', 'madlewala', 'mohit123', 31, NULL, NULL, NULL, 0),
(40, 'arshit', 'arshit', 'vaghasiya', 'arshit123', 31, NULL, NULL, NULL, 0),
(41, 'rachit', 'rachit', 'shah', 'rachit123', 31, NULL, NULL, NULL, 0),
(42, 'rahi', 'rahi', 'jobanputra', 'rahi123', 31, NULL, NULL, NULL, 0),
(43, 'amrita', 'amrita', 'boghayata', 'amrita123', 31, NULL, NULL, NULL, 0),
(44, 'tilak', 'tilak', 'desai', 'tilak123', 31, NULL, NULL, NULL, 0),
(45, 'vishal', 'vishal', 'kapadia', 'vishal123', 31, NULL, NULL, NULL, 0),
(46, 'miss9', 'maitri', 'joshi', 'miss9123', 31, NULL, NULL, NULL, 0),
(47, 'vaibhav', 'vaibhav', 'dodiya', 'vaibhav123', 31, NULL, NULL, NULL, 0),
(48, 'bhargav', 'bhargav', 'lad', 'bhargav123', 31, NULL, NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`ans_id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`,`ques_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ques_id` (`ques_id`);

--
-- Indexes for table `option`
--
ALTER TABLE `option`
  ADD PRIMARY KEY (`option_id`),
  ADD KEY `ques_id` (`ques_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`ques_id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `ans_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `option`
--
ALTER TABLE `option`
  MODIFY `option_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `ques_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_question` FOREIGN KEY (`ques_id`) REFERENCES `question` (`ques_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answer_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `option`
--
ALTER TABLE `option`
  ADD CONSTRAINT `option_question` FOREIGN KEY (`ques_id`) REFERENCES `question` (`ques_id`) ON DELETE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_quiz` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`) ON DELETE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_quiz` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
