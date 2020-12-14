-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2020 at 04:51 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `Name`, `LastName`, `Address`, `Country`) VALUES
(1, 'Eric', 'Dupont', '10 Rue de la Paix', 'France'),
(2, 'Pierre', 'Maison', '2 Street of peace', 'England'),
(3, 'Paul', 'Jacque', '21 jump street', 'USA'),
(4, 'Marc', 'Antoine', 'Rue du Vent', 'France'),
(5, 'Marie Antoinette', 'Dupont', '10 Rue de la paix', 'France');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `numOrder` varchar(20) NOT NULL,
  `idcustomer` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `numOrder`, `idcustomer`, `price`) VALUES
(9, '1280A', 3, 800),
(10, '1280B', 3, 150),
(11, '41A', 1, 600);

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(11) NOT NULL,
  `idorder` varchar(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  `order_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `idorder`, `idproduct`, `order_quantity`) VALUES
(3, '1280A', 3, 2),
(4, '1280B', 4, 30),
(5, '41A', 3, 1),
(6, '41A', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `product` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `product`, `price`, `quantity`) VALUES
(1, 'Apple', 1, 500),
(2, 'Pear', 2, 100),
(3, 'Computer', 400, 30),
(4, 'Paper Sheet', 5, 350),
(5, 'Computer Screen', 200, 500),
(6, 'Cabinet', 350, 100),
(7, 'Shoes', 60, 30),
(8, 'Pants', 5, 350);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(50) NOT NULL,
  `password_web` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `password_web`) VALUES
(1, 'bruno', 'bruno.doucet@email.com', 'YH0DQHufEZU=', 'admin', 'f71dbe52628a3f83a77ab494817525c6'),
(5, 'thomas', 'thomas@email.com', '1zX9kqmTt9s=', 'user', '098f6bcd4621d373cade4e832627b4f6'),
(6, 'testuser', 'usertest@email.fr', 'm6cxqlUnOZBru2HizxmfnA==', 'user', 'ee11cbb19052e40b07aac0ca060c23ee'),
(9, 'Pomme', 'pomme@email.com', NULL, 'admin', 'ede0f9c3a1d2093e3f48fcafd3c70915'),
(10, 'Bubu', 'bubu@email.com', NULL, 'user', '49d02d55ad10973b7b9d0dc9eba7fdf0'),
(11, 'Poire', 'poire@email.com', NULL, 'admin', '8fd5b344f9146f482e4129c163bf9482');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcustomer` (`idcustomer`) USING BTREE;

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product` (`product`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
