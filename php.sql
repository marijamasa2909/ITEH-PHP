-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 14, 2020 at 04:47 PM
-- Server version: 8.0.22-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `domaci`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `user_id` int NOT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NOT NULL,
  `about` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NOT NULL,
  `price` double NOT NULL,
  `url` varchar(200) COLLATE utf8mb4_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `about`, `price`, `url`) VALUES
(28, 'stolica', 'lepa stolica', 500, 'https://jysk.rs/trpezarija/trpez-stolice/3600210-adslev-3600227-marstrand.jpg'),
(30, 'Ugaona garnitura', 'ugaona garnitura', 600, 'https://namestajlugano.com/wp-content/uploads/2019/10/image-6.jpg'),
(31, 'Drveni sto', 'drveni sto', 100, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSi57zlRlmJDDVo6_Dmd52uvDKC6wQw6hTPAw&usqp=CAU'),
(32, 'Ormar', 'ormar', 200, 'https://supercompany.biz/image/cache/artikli/ormari-vitrine/510%20K%20001%20final-800x800.jpg'),
(33, 'Ormar', 'ormar', 300, 'https://cdn2.emmezeta.rs/media/catalog/product/cache/71a0a3c4bed4bde6e0639628e13ab2b6/6/3/630202-oronero-klizni-ormar_2.jpg'),
(34, 'Ikea stolica', 'jako lepa stolica iz ikee', 50, 'https://www.ikea.com/rs/sr/images/products/ingolf-stolica-bela__0728152_PE736113_S5.JPG?f=s'),
(35, 'Komoda', 'komoda', 100, 'https://cdn1.jysk.com/getimage/wd2.large/114583'),
(36, 'Ikea stolica(zelena)', 'jos jedna lepa stolica iz ikee', 50, 'https://media.mojtrg.rs/Image/4c9fab6954fe4224a3b8e1d548b59f2d/20140203/false/false/1280/960/Ikea-stolica-sa-naslonom--stolovi.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NOT NULL,
  `last_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NOT NULL,
  `password` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NOT NULL,
  `address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NOT NULL,
  `admin` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `address`, `admin`) VALUES
(1, 'John', 'Smit', 'johnsmit', 'johnsmit', 'Jones Street 10', 0),
(12, 'Apple', 'fs', 'admin', 'admin', 'adresa', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD KEY `usr_id_fk` (`user_id`),
  ADD KEY `product_id_fk` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usr_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
