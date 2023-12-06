-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 05:14 AM
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

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartID`, `username`, `product`, `count`) VALUES
(20, 'phucle', 'pc123', 1);

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
-- Stand-in structure for view `in4products`
-- (See below for the actual view)
--
CREATE TABLE `in4products` (
`productID` varchar(45)
,`prName` varchar(255)
,`price` decimal(10,0)
,`type` varchar(45)
,`origin` varchar(255)
,`desc` varchar(255)
,`category` varchar(255)
);

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
('lc175', 'Lót chuột 175', 'MP', 100000, 'Medium', 'Việt Nam', 'Lót chuột giá rẻ'),
('pc111', 'Máy tính 111', 'PC', 18000000, 'Medium', 'Việt Nam', 'Máy tính đời mới'),
('pc123', 'Máy tính 123', 'PC', 10000000, 'Medium', 'Trung', 'Máy tính Trung Quốc'),
('tn113', 'Tai nghe 113', 'HP', 300000, 'Medium', 'Mỹ', 'Tai nghe xịn'),
('tnbk', 'Tai nghe Bách Khoa', 'HP', 800000, 'Medium', 'Việt Nam', 'HCMUT');

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
  `cost` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transID`, `username`, `type`, `productA`, `productB`, `count`, `cost`, `date_time`) VALUES
(1, 'hailua', 'buy', 'tn113', '', 1, 300000, '2023-12-05 14:21:20'),
(2, 'hailua', 'exchange', 'tn113', 'lc175', 1, -185000, '2023-12-05 14:32:28'),
(3, 'phucle', 'exchange', 'lc175', 'lc175', 1, 5000, '2023-12-05 14:40:36'),
(4, 'phucle', 'exchange', 'lc175', 'lc175', 1, 5000, '2023-12-05 14:45:21'),
(5, 'phucle', 'exchange', 'lc175', 'tn113', 1, 5000, '2023-12-05 14:45:42'),
(6, 'phucle', 'buy', 'tn113', '', 1, 300000, '2023-12-05 15:07:31'),
(7, 'phucle', 'buy', 'lc175', '', 2, 100000, '2023-12-05 15:07:31'),
(8, 'phucle', 'addfund', '', '', 1, 20000, '2023-12-05 22:05:19'),
(9, 'phucle', 'addfund', '', '', 1, 20000, '2023-12-05 22:05:28'),
(10, 'phucle', 'addfund', '', '', 1, 30000, '2023-12-05 22:33:01'),
(11, 'phucle', 'addfund', '', '', 1, 100000, '2023-12-05 22:33:12');

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
('hailua', 'Phúc', 'Lê', 2003, '123', 850000),
('phucle', 'Phuc', 'Le', 2003, '123', 8705000),
('phucle03', 'Hoàng Phúc', 'Lê', 2003, '123', 0);

-- --------------------------------------------------------

--
-- Structure for view `in4products`
--
DROP TABLE IF EXISTS `in4products`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `in4products`  AS SELECT `p`.`productID` AS `productID`, `p`.`prName` AS `prName`, `p`.`price` AS `price`, `p`.`type` AS `type`, `p`.`origin` AS `origin`, `p`.`desc` AS `desc`, `c`.`cName` AS `category` FROM (`products` `p` join `category` `c` on(`p`.`category` = `c`.`cID`)) ;

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
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `exchange`
--
ALTER TABLE `exchange`
  MODIFY `exID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
