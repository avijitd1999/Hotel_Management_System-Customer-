-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 25, 2023 at 03:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(150) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `address` text NOT NULL,
  `dob` date NOT NULL,
  `phonumber` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `gender`, `address`, `dob`, `phonumber`) VALUES
(1, 'Rabbi', 'ra@email.com', 'rabbi', 'sg56$ewb!', 'male', 'Baridhara, Dhaka', '1991-08-06', '01321453873'),
(2, 'Ramin', 'trefscd@email.com', 'ramin', 'sdhkfnsk$kdjd', 'male', 'Khulna', '1993-11-29','01312765890'),
(3, 'Jabbs', 'sjdhs@email.com', 'jabbs', 'jabbs$123', 'male', 'Dhaka', '1992-12-10','01728234398'),
(4, 'Razen', 'shdjsgajd@email.com', 'razen', 'kjahkjads$sjkadh', 'male', 'Kustia', '1994-06-24','01325362837'),
(5, 'Kain', 'Kabla@email.com', 'kain', 'gst56$fsv', 'male', 'Cumilla', '1995-02-23','01573627954'),
(6, 'Jami', 'sgain@email.com', 'jami', 'tuggb#sjdn990', 'male', 'Bogura', '1994-01-11','01826370453'),
(7, 'Shawn', 'sfrfshaw@email.com', 'shawn', 'gadg536352#dhr', 'male', 'Mymensingh', '1996-03-21','01324546398'),
(10, 'Hujaifa', 'huf@email.com', 'hujaifa', 'gafhgfahgd$teywg', 'male', 'Jamalpur', '1995-03-22', '01742517832'),
(11, 'Rouf', 'ru@email.com', 'rouf', 'afsag#erefw!', 'male', 'Bagherhat', '1995-08-06','01523142873');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;


CREATE TABLE `searchroom` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10, 2) NOT NULL,
  `availability` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `searchroom`
ADD COLUMN `booked` BOOLEAN NOT NULL DEFAULT 0;


-- Dumping data for table `searchroom`
INSERT INTO `searchroom` (`room_name`, `category`, `description`, `price`, `availability`) VALUES
('Standard Room', 'Standard', 'A comfortable standard room with essential amenities.', 100.00, 10),
('Deluxe Room', 'Deluxe', 'A spacious deluxe room with additional features.', 150.00, 8),
('Suite Room', 'Suite', 'A luxurious suite with premium facilities and services.', 200.00, 5),
('Single Room', 'Economy', 'A cozy single room for budget-conscious travelers.', 80.00, 12),
('Family Suite', 'Suite', 'An ideal suite for families with spacious living areas.', 250.00, 4),
('Ocean View Room', 'Premium', 'Enjoy breathtaking views of the ocean in this premium room.', 180.00, 6),
-- Add more rooms as needed
('Business Suite', 'Suite', 'Perfect for business travelers with dedicated workspace.', 220.00, 7),
('Mountain View Chalet', 'Premium', 'Experience the charm of mountain views in this cozy chalet.', 170.00, 9);
-- Add more rooms as needed


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
COMMIT;
-- Create the car booking table
CREATE TABLE `bookedcars` (
    `id` int(100) NOT NULL AUTO_INCREMENT,
    `make` varchar(250) NOT NULL,
    `model` varchar(250) NOT NULL,
    `year` int(11) NOT NULL,
    `price` decimal(10, 2) NOT NULL,
    `book` BOOLEAN NOT NULL DEFAULT 0,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `bookedcars`
INSERT INTO `bookedcars` (`make`, `model`, `year`, `price`, `book`) VALUES
('Economy Car', 'Economy', 2022, 50.00, 0),
('Standard Sedan', 'Standard', 2021, 80.00, 0),
('Luxury SUV', 'Luxury', 2023, 150.00, 0),
('Compact Car', 'Compact', 2022, 40.00, 0),
('Convertible', 'Sports', 2022, 120.00, 0),
('Electric Car', 'Green', 2023, 100.00, 0),
('Sports Car', 'Sports', 2023, 200.00, 0),
('Family Minivan', 'Family', 2022, 90.00, 0);

