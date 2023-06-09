-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 01:44 PM
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
-- Database: `ngo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_email` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_email`, `admin_pass`) VALUES
('sh@reya.com', 'shreya');

-- --------------------------------------------------------

--
-- Table structure for table `contactform`
--

CREATE TABLE `contactform` (
  `sid` int(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `semail` varchar(255) NOT NULL,
  `ssubject` varchar(255) NOT NULL,
  `smessage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contactform`
--

INSERT INTO `contactform` (`sid`, `sname`, `semail`, `ssubject`, `smessage`) VALUES
(36, 'Anuj Nanda Gorkhali', 'anuj.gorkhali@gmail.com', 'test', 'test is real'),
(37, '', '', '', ''),
(38, '', '', '', ''),
(39, 'Anuj Nanda Gorkhali', 'anuj.gorkhali@gmail.com', 'test', 'test mo 1');

-- --------------------------------------------------------

--
-- Table structure for table `donation_amount`
--

CREATE TABLE `donation_amount` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amount` int(100) NOT NULL,
  `date_of_transaction` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donation_amount`
--

INSERT INTO `donation_amount` (`transaction_id`, `user_id`, `total_amount`, `date_of_transaction`) VALUES
(30, 13, 100, '2023-05-17'),
(31, 13, 0, '2023-05-17'),
(32, 13, 250, '2023-05-17'),
(33, 13, 0, '2023-05-17'),
(34, 13, 100, '2023-05-17'),
(35, 13, 100, '2023-05-17'),
(36, 13, 100, '2023-05-17'),
(37, 13, 0, '2023-05-17'),
(38, 13, 0, '2023-05-17'),
(39, 13, 0, '2023-05-17'),
(40, 13, 0, '2023-05-17'),
(41, 13, 0, '2023-05-17'),
(42, 13, 0, '2023-05-17'),
(43, 13, 0, '2023-05-17'),
(44, 13, 100, '2023-05-17'),
(45, 13, 0, '2023-05-17'),
(46, 13, 0, '2023-05-17'),
(47, 13, 0, '2023-05-17'),
(48, 13, 0, '2023-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `name_of_event` varchar(300) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `address` varchar(100) NOT NULL,
  `imageurl` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `name_of_event`, `description`, `date`, `address`, `imageurl`) VALUES
(13, 'Feed the Needy', 'A food donation drive to feed the ones in need.', '2021-02-14', 'Kolkata', 'https://images.unsplash.com/photo-1593113598332-cd288d649433?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60'),
(18, 'Eye Checkup Clinic', 'Get your eyes checked for free by professionals.', '2020-10-21', 'Dublin', 'https://images.unsplash.com/photo-1576210117723-cd06449a467d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60'),
(26, 'COVID Vaccine Drive', 'Free COVID vaccination for everyone above the age of 70.', '2021-09-05', 'Mumbai', 'https://images.unsplash.com/photo-1576765608866-5b51046452be?ixid=MXwxMjA3fDB8MHxzZWFyY2h8OXx8dmFjY2luZXxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `contact` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `dob`, `contact`) VALUES
(1, 'Shivani', 'Shenai', 'shivani@gmail.com', '$2y$10$3i43AkgXrdTJAz6nHLaHx.wBC3PWVhs9iwY8bFVdw5l/j6NPzUH1O', '2000-11-02', 2147483647),
(13, 'Anuj', 'Gorkhali', 'anuj.gorkhali@gmail.com', '$2y$10$BCbFOzT97sfNI7sx7XopuufVMa6oYGF0X6BU57zIr6VpAGDzAoB6e', '2001-10-17', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `user_id` int(11) NOT NULL,
  `chapter` varchar(200) NOT NULL,
  `event_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `volunteers`
--

INSERT INTO `volunteers` (`user_id`, `chapter`, `event_name`) VALUES
(1, 'Barcelona', 'Each One Teach One'),
(1, 'Venice', 'Feed the Needy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_email`);

--
-- Indexes for table `contactform`
--
ALTER TABLE `contactform`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `donation_amount`
--
ALTER TABLE `donation_amount`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `fk_user1` (`user_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `fk_chapter1` (`imageurl`(768));

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD KEY `fk_user2` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactform`
--
ALTER TABLE `contactform`
  MODIFY `sid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `donation_amount`
--
ALTER TABLE `donation_amount`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donation_amount`
--
ALTER TABLE `donation_amount`
  ADD CONSTRAINT `fk_user1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD CONSTRAINT `fk_user2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
