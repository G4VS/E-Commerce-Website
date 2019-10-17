-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2019 at 01:57 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a-z_doors`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Image` varchar(500) NOT NULL,
  `Price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_ID`, `Name`, `Description`, `Image`, `Price`) VALUES
(4, 'Fire Door', 'A door designed to keep fires contained in the room its is install for a sertain period of time ', './fireDoor.png', 10000),
(5, 'Stacking/Folding Doors', 'Door that folds when opened', './staking.png', 8000),
(6, 'Pivot Doors', 'This door does not open like a normal door as it pivots more towards the center of the frame ', './pivot.png', 4000),
(7, 'External Wooden Doors', 'Any wooden door made to with stand direct exposure to the elements.', './external.png', 6000),
(8, 'Sliding Doors', 'This door opens by sliding behind itself', './sliding.png', 5000),
(9, 'Interior Wooden doors', 'Wooden doors made for the inside of buildings. Is lighter than exterior doors', './interior.png', 3000),
(10, 'Door Frame', 'Hoses the door to be able to open and close', './frame.png', 4000),
(11, 'Wooden Window', 'Frame which hoses the glass of the windos', './window.png', 2000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
