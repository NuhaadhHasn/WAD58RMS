-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2023 at 06:55 PM
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
-- Database: `rms`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `foodId` int(11) NOT NULL,
  `foodName` varchar(100) NOT NULL,
  `foodPrice` varchar(100) NOT NULL,
  `foodCategory` varchar(100) NOT NULL,
  `offerAvailable` int(11) DEFAULT NULL,
  `foodDescription` varchar(255) DEFAULT NULL,
  `foodImage` varchar(255) DEFAULT NULL,
  `dateAdded` timestamp NULL DEFAULT current_timestamp(),
  `dateUpdated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`foodId`, `foodName`, `foodPrice`, `foodCategory`, `offerAvailable`, `foodDescription`, `foodImage`, `dateAdded`, `dateUpdated`) VALUES
(1, 'Pepperoni Pizza', '2500', 'Pizza', 0, 'One of the most popular pizza types worldwide, the Pepperoni pizza features a generous topping of spicy, cured pepperoni slices over a bed of gooey melted cheese and tomato sauce.', 'pepperoni.jpg', '2023-07-26 07:01:55', '2023-07-26 10:06:32'),
(2, 'Hawaiian-Pizza', '2800', 'Pizza', 1, 'A divisive but beloved choice, the Hawaiian pizza pairs sweet and savory flavors with ham and juicy pineapple chunks resting on a cheese covered crust', 'hawaiian.jpg', '2023-07-26 07:49:40', '2023-07-26 08:23:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobileNumber` varchar(25) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `displayPicture` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `dateRegistered` timestamp NULL DEFAULT current_timestamp(),
  `dateUpdated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `fullName`, `username`, `email`, `mobileNumber`, `type`, `displayPicture`, `password`, `dateRegistered`, `dateUpdated`) VALUES
(1, 'Nuhaadh Hassan', 'nuhaadh', 'nuhaadh@gmail.com', '0752907003', 'ADMIN', '4.jpeg', 'nuhaadh', '2023-07-22 19:23:27', '2023-07-26 10:00:33'),
(2, 'Abed Ahmed', 'abed', 'abed@gmail.com', '0718278829', 'STAFF', 'default.png', 'abed', '2023-07-22 21:04:02', '2023-07-26 11:39:08'),
(3, '123', '123', '123', '123', 'CUSTOMER', NULL, '123', '2023-07-23 00:56:58', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`foodId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `foodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
