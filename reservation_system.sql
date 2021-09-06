-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2021 at 03:05 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservation_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `cnic` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `station` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`user_id`, `firstname`, `cnic`, `phone`, `email`, `station`, `password`) VALUES
(1, 'Admin', '4240165784532', '03123433451', 'admin@gmail.com', 'karachi', '$2y$10$GPq0eMQCnFYEbEBQL4/scOKHIOTB0lo.5m9ERc0.psju6f0HLRNPG');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `TrainNumber` int(11) NOT NULL,
  `StopNumber` int(11) NOT NULL,
  `StationName` varchar(15) NOT NULL,
  `ArrivalTime` datetime NOT NULL,
  `DepartureTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`TrainNumber`, `StopNumber`, `StationName`, `ArrivalTime`, `DepartureTime`) VALUES
(100001, 1, 'Karachi', '2021-09-04 16:42:50', '2021-09-04 19:42:56'),
(100001, 2, 'lahore', '2021-09-04 16:54:50', '2021-09-07 16:57:26'),
(100001, 3, 'queta', '2021-09-07 19:48:00', '2021-09-07 20:48:00'),
(100001, 4, 'islamabad', '2021-09-07 19:52:47', '2021-09-04 16:21:03'),
(100002, 5, 'Karachi', '2021-09-04 16:42:50', '2021-09-04 16:42:50'),
(100002, 6, 'lahore', '2021-09-04 16:42:50', '2021-09-04 16:42:50'),
(100002, 7, 'islamabad', '2021-09-04 16:42:50', '2021-09-04 16:42:50');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `pnr` int(11) NOT NULL,
  `passenger_name` varchar(40) NOT NULL,
  `TrainNumber` int(11) NOT NULL,
  `no_of_seats` int(11) NOT NULL,
  `train_status` varchar(20) NOT NULL,
  `booking_date` date NOT NULL,
  `booked_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`pnr`, `passenger_name`, `TrainNumber`, `no_of_seats`, `train_status`, `booking_date`, `booked_on`) VALUES
(123456, 'Ahsan', 100001, 2, 'conformed', '2021-09-05', '2021-09-05 18:27:40'),
(366795, 'ahsan', 100001, 3, 'confirm', '2021-09-07', '2021-09-06 00:00:00'),
(544482, 'Asad', 100001, 2, 'confirm', '2021-09-06', '2021-09-05 00:00:00'),
(849035, 'asad', 100001, 2, 'confirm', '2021-09-07', '2021-09-06 00:00:00'),
(948035, 'ahsan', 100001, 2, 'confirm', '2021-09-07', '2021-09-06 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

CREATE TABLE `trains` (
  `TrainNumber` int(11) NOT NULL,
  `TrainName` varchar(20) NOT NULL,
  `Start` varchar(20) NOT NULL,
  `End` varchar(20) NOT NULL,
  `Category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`TrainNumber`, `TrainName`, `Start`, `End`, `Category`) VALUES
(100001, 'taizgam', 'karachi', 'lahore', 'supperfast'),
(100002, 'shalimar ', 'karachi', 'multan', 'express'),
(100003, 'Shaheen Passenger', 'Multan', 'Islamabad', 'Passenger'),
(100004, 'Pakistan Express', 'Islamabad', 'Karachi', 'express'),
(100005, 'Kohat Express', 'karachi', 'Islamabad', 'express'),
(100006, 'Jinnah Express', 'Pishawer', 'Gilgit', 'express'),
(100007, 'Sir Syed Express', 'Lahore', 'Kashmeer', 'express'),
(100008, 'Islamabad Express', 'Islamabad', 'pishawar', 'express'),
(100009, 'Jinnah Express', 'Pishawar', 'Queta', 'express'),
(100010, 'Lasani Express', 'karachi', 'Gilgit', 'express'),
(100011, 'Ahsan Express', 'Lahore', 'karachi', 'Express');

-- --------------------------------------------------------

--
-- Table structure for table `train_status`
--

CREATE TABLE `train_status` (
  `TrainNumber` int(11) NOT NULL,
  `available_seat` int(11) NOT NULL,
  `booked_seats` int(11) NOT NULL,
  `available_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `train_status`
--

INSERT INTO `train_status` (`TrainNumber`, `available_seat`, `booked_seats`, `available_Date`) VALUES
(100001, 300, 0, '2021-09-05'),
(100010, 300, 0, '2021-09-05'),
(100001, 300, 0, '2021-09-05'),
(100010, 300, 0, '2021-09-05'),
(100005, 295, 5, '2021-09-05'),
(100005, 295, 5, '2021-09-05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `cnic` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `station` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `cnic`, `phone`, `email`, `station`, `password`) VALUES
(3, 'Ahsan', '2147483647', '2147483647', 'ahsan.muh123@gmail.com', 'karachi cant', '$2y$10$GPq0eMQCnFYEbEBQL4/scOKHIOTB0lo.5m9ERc0.psju6f0HLRNPG'),
(4, 'asad', '2147483647', '2147483647', 'asadabbasi@gmail.com', 'karachi cant', '$2y$10$OzYOvN33owR7SxCgbdbd/OynkQaZq6hWiZ05Uy2UBWPXSXE3gvjKy'),
(5, 'ashoo', '4240121758941', '2147483647', 'ashoo.muh123@gmail.com', 'karachi cant', '$2y$10$p863iEtLhTNoG3Kf4K2WPudKCYxuC9JFL.cLucFIeFRvhnbStvKaC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`TrainNumber`,`StopNumber`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`pnr`);

--
-- Indexes for table `trains`
--
ALTER TABLE `trains`
  ADD PRIMARY KEY (`TrainNumber`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trains`
--
ALTER TABLE `trains`
  MODIFY `TrainNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100012;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
