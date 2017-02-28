-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2017 at 07:16 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raksha_clothes`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryId` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` text,
  `IsActive` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryId`, `Name`, `Description`, `IsActive`) VALUES
(1, 'Sari', '5mtrs', 1),
(2, 'Pant', 'Jeans', 1),
(3, 'Dhoti', 'Synthetic', 1),
(4, 'Shirt', 'Readymade', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductId` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `SKU` varchar(255) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Description` text,
  `CategoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductId`, `Name`, `SKU`, `Price`, `Type`, `Image`, `Description`, `CategoryId`) VALUES
(1, 'Red Knight', '500B', 495, 'Jali', '1486523744_11451468908181-Ligalz-Women-Printed-Sari-9991451468908008-1.jpg', NULL, 1),
(2, 'Blue lagoon', '800C', 759, 'Synthetic', '1485487878_Designersareez-Women-Partywear-Sari_d93c6dffb9e53344b44cd20ce6f74d44_images.jpg', NULL, 1),
(3, 'Shilpa Style', '2000D', 1999, 'Bollywood', '1487097815_shilpa_1452836139.jpg', NULL, 1),
(4, 'Pure Denim', '900B', 849, 'Plain', '1487097871_54GAK.jpg', NULL, 2),
(5, 'Funky', '1500D', 1299, 'Ruff & Tuff', '1487097928_1473393213141459769.jpg', NULL, 2),
(7, 'Blues', '1200C', 1049, 'Original', '1487097977_291357_main.jpg', NULL, 2),
(9, 'Men Style', '500B', 499, 'Silk', '1487098043_6c0826f02367aa645545c9a1ffbad437.jpg', NULL, 3),
(10, 'Sunshine', '400B', 379, 'Thin', '1487098098_dhoti-salwar-250x250.jpg', NULL, 3),
(11, 'Green India', '600B', 539, 'Forml', '1487098142_stylish-dhoti-salwar-500x500.jpg', NULL, 3),
(12, 'Youngistan', '1200D', 1049, 'Formal', '1487098183_Brand-2017-font-b-Dress-b-font-font-b-Shirts-b-font-font-b-Mens-b.jpg', NULL, 4),
(13, 'Classic', '900C', 799, 'Chex', '1487098216_men-s-formal-check-shirts-500x500.jpg', NULL, 4),
(14, 'Cotton', '1100B', 1000, 'Suit', '1487098297_41-V3SI69-L._AC_UL260_SR200,260_.jpg', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserId` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `FirstName`, `LastName`, `UserName`, `Password`, `Email`, `Phone`) VALUES
(1, NULL, NULL, 'sarthakshah', 'sarthak', 'sarthak.sd77@gmail.com', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductId`),
  ADD KEY `ForeignKey` (`CategoryId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
