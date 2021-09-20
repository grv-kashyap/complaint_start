-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2019 at 04:49 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `complaint`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complaint_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `complaint_title` varchar(256) NOT NULL,
  `complaint_description` text NOT NULL,
  `complaint_date` datetime NOT NULL,
  `complaint_image` varchar(256) NOT NULL,
  `complaint_reply` text NOT NULL,
  `complaint_category` varchar(64) NOT NULL,
  `complaint_place_address` text NOT NULL,
  `complaint_status` tinyint(1) NOT NULL,
  `complaint_created` datetime NOT NULL,
  `complaint_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `complaints`
--


-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `faq_question` varchar(128) NOT NULL,
  `faq_answer` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq`
--



-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_title` varchar(256) NOT NULL,
  `feedback_description` text NOT NULL,
  `feedback_created` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--
- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `message_text` text NOT NULL,
  `message_from` int(11) NOT NULL,
  `message_to` int(11) NOT NULL,
  `message_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--


-- --------------------------------------------------------

--
-- Table structure for table `missing_persons`
--

CREATE TABLE `missing_persons` (
  `missing_person_id` int(11) NOT NULL,
  `missing_person_name` varchar(64) NOT NULL,
  `missing_person_age` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `missing_person_sex` int(1) NOT NULL,
  `missing_person_address` text NOT NULL,
  `missing_person_date` datetime NOT NULL,
  `missing_person_fir_no` varchar(32) NOT NULL,
  `missing_person_description` text NOT NULL,
  `missing_person_image` varchar(256) NOT NULL,
  `missing_person_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `missing_persons`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_name` varchar(256) NOT NULL,
  `news_description` text NOT NULL,
  `news_location` varchar(128) NOT NULL,
  `news_image` varchar(256) NOT NULL,
  `news_status` tinyint(1) NOT NULL,
  `news_created` datetime NOT NULL,
  `news_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `safety_tips`
--

CREATE TABLE `safety_tips` (
  `safety_tip_id` int(11) NOT NULL,
  `safety_tip_tagline` text NOT NULL,
  `safety_tip_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `safety_tips`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `user_name` varchar(32) DEFAULT NULL,
  `user_email` varchar(64) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_status` tinyint(1) DEFAULT NULL,
  `user_profile_image` varchar(128) DEFAULT NULL,
  `user_cretaed` datetime DEFAULT NULL,
  `user_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role_id`, `user_name`, `user_email`, `user_password`, `user_status`, `user_profile_image`, `user_cretaed`, `user_updated`) VALUES
(2, 1, 'gaurav', 'gauravkashyap1234@gmail.com', '$2y$10$tONznHWZ8SMPR4xKURhF3utfoDm7jbvGecmgEzm89G8YXEzYxVgQa', 1, '', '0000-00-00 00:00:00', '2018-11-28 10:40:36'),

-- --------------------------------------------------------

--
-- Table structure for table `wanted_persons`
--

CREATE TABLE `wanted_persons` (
  `wanted_person_id` int(11) NOT NULL,
  `wanted_person_name` varchar(128) NOT NULL,
  `wanted_person_description` text NOT NULL,
  `wanted_person_image` varchar(256) NOT NULL,
  `wanted_person_created` datetime NOT NULL,
  `wanted_person_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wanted_persons`
--

INSERT INTO `wanted_persons` (`wanted_person_id`, `wanted_person_name`, `wanted_person_description`, `wanted_person_image`, `wanted_person_created`, `wanted_person_modified`) VALUES
(1, 'Carlos Hernandez', 'Hernandez has the following tattoos: a bell on his back; a large bell on his abdomen with the word \"Chanslor\"; the word \"south\" on his inner right bicep; and the word \"side\" on his inner left bicep.', '1551898651_preview.png', '2019-03-06 19:57:31', '0000-00-00 00:00:00'),
(2, 'Jose Ramirez-Perez', 'Ramirez has a tattoo on his right shoulder of a heart and wings.', '1551899171_preview.jpg', '2019-03-06 20:06:11', '0000-00-00 00:00:00'),
(3, 'NATALIA WOLF', 'Natalia Wolf and her husband, Victor Wolf, are wanted for their alleged involvement in a massive real estate-related fraud scheme.', '1551899367_preview (1).jpg', '2019-03-06 20:09:27', '0000-00-00 00:00:00'),
(4, 'ALBERTO HINOJOSA', 'Alberto Hinojosa pled guilty to possession with intent to distribute 50 or more grams of methamphetamine and heroin before a federal judge in the United States District Court located in Medford', '1551899515_preview (2).jpg', '2019-03-06 20:11:55', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `missing_persons`
--
ALTER TABLE `missing_persons`
  ADD PRIMARY KEY (`missing_person_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `safety_tips`
--
ALTER TABLE `safety_tips`
  ADD PRIMARY KEY (`safety_tip_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wanted_persons`
--
ALTER TABLE `wanted_persons`
  ADD PRIMARY KEY (`wanted_person_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `missing_persons`
--
ALTER TABLE `missing_persons`
  MODIFY `missing_person_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `safety_tips`
--
ALTER TABLE `safety_tips`
  MODIFY `safety_tip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `wanted_persons`
--
ALTER TABLE `wanted_persons`
  MODIFY `wanted_person_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
