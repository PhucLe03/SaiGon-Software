-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2023 at 09:20 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bkecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(45) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `byear` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `fname`, `lname`, `byear`, `password`) VALUES
('admin', 'Admin', 'User', 2003, '123');

-- --------------------------------------------------------

--
-- Table structure for table `bought`
--

CREATE TABLE `bought` (
  `buyID` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `productID` varchar(45) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bought`
--

INSERT INTO `bought` (`buyID`, `username`, `productID`, `count`) VALUES
(1, 'phucle', 'lc175', 2),
(2, 'hailua', 'tn113', 0),
(3, 'phucle', 'lc175', 0),
(4, 'phucle', 'tn113', 1),
(5, 'phucle', 'tn113', 1),
(6, 'phucle', 'lc175', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `product` varchar(45) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cID` varchar(45) NOT NULL,
  `cName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cID`, `cName`) VALUES
('HP', 'Tai nghe'),
('LT', 'Laptop'),
('MP', 'Lót chuột'),
('PC', 'Máy tính để bàn');

-- --------------------------------------------------------

--
-- Table structure for table `exchange`
--

CREATE TABLE `exchange` (
  `exID` int(11) NOT NULL,
  `hang` varchar(45) NOT NULL,
  `sanpham` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` varchar(45) NOT NULL,
  `prName` varchar(255) NOT NULL,
  `category` varchar(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `type` varchar(45) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `prName`, `category`, `price`, `type`, `origin`, `desc`) VALUES
('lc175', 'Lót chuột 175', 'MP', 100000, 'Small', 'Trung Quốc', 'Lót chuột giá rẻ'),
('tn113', 'Tai nghe 113', 'HP', 1000000, 'Medium', 'Trung Quốc', 'Tai nghe xịn');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transID` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `productA` varchar(45) NOT NULL,
  `productB` varchar(45) NOT NULL,
  `count` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transID`, `username`, `type`, `productA`, `productB`, `count`, `date_time`) VALUES
(1, 'hailua', 'buy', 'tn113', '', 1, '2023-12-05 14:21:20'),
(2, 'hailua', 'exchange', 'tn113', 'lc175', 1, '2023-12-05 14:32:28'),
(3, 'phucle', 'exchange', 'lc175', 'lc175', 1, '2023-12-05 14:40:36'),
(4, 'phucle', 'exchange', 'lc175', 'lc175', 1, '2023-12-05 14:45:21'),
(5, 'phucle', 'exchange', 'lc175', 'tn113', 1, '2023-12-05 14:45:42'),
(6, 'phucle', 'buy', 'tn113', '', 1, '2023-12-05 15:07:31'),
(7, 'phucle', 'buy', 'lc175', '', 2, '2023-12-05 15:07:31');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(45) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `byear` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `fname`, `lname`, `byear`, `password`, `balance`) VALUES
('hailua', 'Phuc', 'Le', 2003, '123', 850000),
('phucle', 'Phuc', 'Le', 2003, '123', 7485000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `bought`
--
ALTER TABLE `bought`
  ADD PRIMARY KEY (`buyID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `cart_fk1` (`username`),
  ADD KEY `cart_fk2` (`product`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cID`);

--
-- Indexes for table `exchange`
--
ALTER TABLE `exchange`
  ADD PRIMARY KEY (`exID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bought`
--
ALTER TABLE `bought`
  MODIFY `buyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `exchange`
--
ALTER TABLE `exchange`
  MODIFY `exID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_fk1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `cart_fk2` FOREIGN KEY (`product`) REFERENCES `products` (`productID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`cID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
