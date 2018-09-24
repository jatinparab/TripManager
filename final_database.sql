-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 03, 2018 at 11:57 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trip_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked_trips`
--

CREATE TABLE `booked_trips` (
  `id` int(11) NOT NULL,
  `trip_id` varchar(255) NOT NULL,
  `date` varchar(2555) NOT NULL,
  `owner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `content` varchar(25555) NOT NULL,
  `owner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `content`, `owner`) VALUES
(1, '           Test feedback from mohit', 3);

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `difficulty` varchar(255) NOT NULL,
  `length` varchar(255) NOT NULL,
  `altitude` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `members` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `title`, `img`, `price`, `region`, `difficulty`, `length`, `altitude`, `duration`, `members`) VALUES
(1, 'Kedarkantha', 'http://localhost/trip_manager/img/1.jpg', '8450', 'Uttarakhand', 'Easy-Moderate', '20', '12500', '6', ''),
(2, 'ChanderKhani Pass\r\n', 'http://localhost/trip_manager/img/2.jpg', '8970', 'Uttarakhand', 'Moderate', '25', '12500', '8', ''),
(4, 'Roopkund', 'http://localhost/trip_manager/img/4.jpg', '9000', 'Uttarakhand', 'Difficult', '30', '19,500', '9', ''),
(5, 'Braamhatal', 'http://localhost/trip_manager/img/6.jpg', '9000', 'Uttarakhand', 'Moderate', '30', '9000', '8', ''),
(6, 'Sandakphu Phalut', 'http://localhost/trip_manager/img/6.jpg', '11000', 'Sikkim', 'Moderate', '30', '9000', '8', ''),
(7, 'Kauri pass\r\n', 'http://localhost/trip_manager/img/6.jpg', '10000', 'Uttarakhand', 'Easy-Moderate \r\n', '30', '9000', '8', ''),
(8, 'Bedini Bugyal\r\n', 'http://localhost/trip_manager/img/6.jpg', '7500', 'Uttarakhand', 'Easy-Moderate', '30', '9000', '8', ''),
(11, 'Harr Ki Dun', 'http://localhost/trip_manager/img/6.jpg', '7000', 'Uttarakhand', 'Easy', '20', '8050', '5', ''),
(14, 'Test', 'https://www.w3schools.com/howto/img_fjords.jpg', '123', 'Thane', 'easy', '123', '1233123', '1231231231', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_number` bigint(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `isAdmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `contact_number`, `gender`, `isAdmin`) VALUES
(1, 'Jatin Parab', 'sulphurgfx@gmail.com', '123456', 9820181347, 0, 0),
(2, 'Admin', 'admin@example.com', 'Test@123', 9820181347, 0, 1),
(3, 'Mohit Patel', 'mappatel2@gmail.com', '123456', 7666796561, 0, 0),
(4, 'abc', 'abc@feed.in', 'qwerty', 8768985735, 2, 0),
(5, 'Jatin', '123@gmail.com', '1234567', 9820181347, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked_trips`
--
ALTER TABLE `booked_trips`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked_trips`
--
ALTER TABLE `booked_trips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
