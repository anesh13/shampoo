-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2018 at 05:05 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shampoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `c_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `hair_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `c_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `issue` varchar(50) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hair`
--

CREATE TABLE `hair` (
  `id` int(11) NOT NULL,
  `hair_id` int(11) NOT NULL,
  `age` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `scalp` varchar(50) NOT NULL,
  `struc` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `concern1` varchar(50) NOT NULL,
  `concern2` varchar(50) NOT NULL,
  `fragrance` varchar(50) NOT NULL,
  `label` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hair`
--

INSERT INTO `hair` (`id`, `hair_id`, `age`, `gender`, `scalp`, `struc`, `type`, `concern1`, `concern2`, `fragrance`, `label`) VALUES
(2, 1, '7', 'female', 'normal', 'wavy', 'curly', 'oily', 'volume', 'woody', 'pjkhjkgj'),
(2, 43, '3', 'Female', 'Wavy', 'Fine', 'Normal', 'Dry and Damaged', 'Color Protection', 'Sweet', 'hhhh'),
(1, 44, '46', 'Female', 'Curly', 'Medium', 'Normal', 'Dandruff', 'Enhanced Shine', 'Sweet', 'yanka');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `mobile`, `password`, `fname`, `lname`) VALUES
(1, 'priyankaev97@gmail.com', '8904022258', '84f80a3ae85bbc0ad0b7cf957352569b', 'Priyanka', 'EV'),
(2, 'lina2396@gmail.com', '8904022258', '84f80a3ae85bbc0ad0b7cf957352569b', 'lina', 'd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `hair_id` (`hair_id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `hair`
--
ALTER TABLE `hair`
  ADD PRIMARY KEY (`hair_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hair`
--
ALTER TABLE `hair`
  MODIFY `hair_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`hair_id`) REFERENCES `hair` (`hair_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hair`
--
ALTER TABLE `hair`
  ADD CONSTRAINT `hair_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

DROP TABLE IF EXISTS product;
CREATE TABLE product
(product_id int NOT NULL PRIMARY KEY,
product_title varchar(30) NOT NULL,
product_price float NOT NULL,
product_image varchar(30) NOT NULL);




insert into product (product_id,
product_title,
product_price,
product_image) values (1,
'hair brush',
20,
'brush.jpeg'),(2,
'scalp brush',
18,
'brush1.jpeg'),(3,
'ceramic brush',
24,
'ceramic.jpeg'),(4,
'Combo: Shampoo + Conditioner',
38,
'combo1.jpeg'),(5,
'Combo: brushes',
41,
'combo2.jpeg'),(6,
'conditioner',
20,
'conditioner.jpeg'),(7,
'shampoo',
20,
'shampoo.jpeg'),(8,
'hair mask',
22,
'mask.jpeg'),(9,
'silk bonnet',
18,
'silk.jpeg'),(10,
'wide-toothed comb',
13,
'wide.jpeg'),(11,
'wooden comb',
14,
'wood.jpeg');
