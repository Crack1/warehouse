-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2017 at 08:26 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii_warehouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id_category` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id_category`, `name`, `status`, `created_at`, `updated_at`, `user`) VALUES
(1, 'Videogames', 1, '2017-02-11', '2017-02-11', 1),
(2, 'Consoles', 1, '2017-02-11', '2017-02-11', 1),
(3, 'Toys', 1, '2017-02-11', '2017-02-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id_product` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(255) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id_product`, `name`, `description`, `picture`, `price`, `status`, `created_at`, `updated_at`, `user`) VALUES
(1, 'PS2', 'Announced in 1999, the PlayStation 2 was the first PlayStation console to offer backwards compatibility for its predecessor''s DualShock controller, as well as for its games. The PlayStation 2 is the best-selling video game console of all time, selling over 155 million units, with 150 million confirmed by Sony in 2011. More than 3,874 game titles have been released for the PS2 since launch, and more than 1.5 billion copies have been sold. Sony later manufactured several smaller, lighter revisions of the console known as Slimline models in 2004 and well on, and in 2006, announced and launched its successor, the PlayStation 3.', '/warehouse/backend/web/uploads/w4AuPhjiP8XnyNAdkjo6F6cif8PvkZn5.jpg', '123.56', 1, '2017-02-11', '2017-02-11', 1),
(2, 'Dreamcast', 'The Dreamcast is a home video game console released by Sega on November 27, 1998 in Japan, September 9, 1999 in North America, and October 14, 1999 in Europe. It was the first in the sixth generation of video game consoles, preceding Sony''s PlayStation 2, Nintendo''s GameCube and Microsoft''s Xbox. The Dreamcast was Sega''s final home console, marking the end of the company''s 18 years in the console market.', '/warehouse/backend/web/uploads/UwkRjJJqA3_qh-DOaOJHb3shVo0YQtoP.png', '50.00', 1, '2017-02-11', '2017-02-11', 1),
(3, 'Xbox', 'The original Xbox was released on November 15, 2001 in North America, February 22, 2002 in Japan, and March 14, 2002 in Australia and Europe. It was Microsoft''s first foray into the gaming console market. As part of the sixth-generation of gaming, the Xbox competed with Sony''s PlayStation 2, Sega''s Dreamcast (which stopped American sales before the Xbox went on sale), and Nintendo''s GameCube. The Xbox was the first console offered by an American company after the Atari Jaguar stopped sales in 1996. The name Xbox was derived from a contraction of DirectX Box, a reference to Microsoft''s graphics API, DirectX.\r\n', '/warehouse/backend/web/uploads/Fbepk-qiHRsGPpnjpHAgNzI_wwMtm_k4.jpg', '342.00', 1, '2017-02-11', '2017-02-11', 1),
(4, 'Wii U', 'The Wii U is the first Nintendo console to support HD graphics. The system''s primary controller is the Wii U GamePad, which features an embedded touchscreen, and combines directional buttons, analog sticks, and action buttons. The screen can be used either as a supplement to the main display (either providing an alternate, asymmetric gameplay experience, or a means of local multiplayer without resorting to a split screen), or in supported games, to play the game directly on the GamePad independently of the television.', '/warehouse/backend/web/uploads/vQ9pbIwi9vCE4ygzvG6zAymTBUnNhXL_.png', '100.00', 1, '2017-02-11', '2017-02-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_categories`
--

CREATE TABLE `tbl_product_categories` (
  `product` int(11) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_categories`
--

INSERT INTO `tbl_product_categories` (`product`, `category`) VALUES
(4, 1),
(4, 2),
(1, 2),
(3, 1),
(3, 2),
(3, 3),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `nombre`, `apellido`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `imagen`, `status`, `role`, `created_at`, `updated_at`) VALUES
(1, 'erwin', 'Erwin', 'Vides', '9aOnHNXrkkvtxVTz15K1bZqw3QEyWd6e', '$2y$13$XnRDTfYNVwt1w0rF1AHaDO5kzFNbeIfiqIZlqe2J8rkSVndtiG6eq', NULL, 'erwinvides@hotmail.com', '/sisv4/backend/web/uploads/xqcrEV9dh59BAov12G2zlCKnFeU53q8l.png', 1, 10, 1471393434, 1486794998),
(5, 'rommel', 'Rommel', 'Porillo', 'GGU0gIea2ZS3QsYQ7tHXXSjZHkxGAQle', '$2y$13$EY7yJF.hsPm83Jwm2suD9up4QixqUVTBRBePLOi62n.rEDRKFmQke', NULL, 'ingerwinvides@gmail.com', '/warehouse/backend/web/uploads/sPSqsFcWD8GHNLXnHqzx2YY2XOUbtYzv.jpg', 1, 20, 1474399148, 1486796872);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id_category`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `tbl_product_categories`
--
ALTER TABLE `tbl_product_categories`
  ADD KEY `product` (`product`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD KEY `estado` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD CONSTRAINT `tbl_categories_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`);

--
-- Constraints for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `tbl_products_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`);

--
-- Constraints for table `tbl_product_categories`
--
ALTER TABLE `tbl_product_categories`
  ADD CONSTRAINT `tbl_product_categories_ibfk_1` FOREIGN KEY (`product`) REFERENCES `tbl_products` (`id_product`),
  ADD CONSTRAINT `tbl_product_categories_ibfk_2` FOREIGN KEY (`category`) REFERENCES `tbl_categories` (`id_category`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
