-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 16, 2022 at 04:45 PM
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
-- Database: `amdp3`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(11) NOT NULL,
  `shopID` int(11) DEFAULT NULL,
  `itemID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `itemAmount` int(11) DEFAULT NULL,
  `itemNotes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(1, 'Foods'),
(2, 'Drinks'),
(3, 'Snacks');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemID` int(11) NOT NULL,
  `shopID` int(11) NOT NULL,
  `itemName` varchar(255) DEFAULT NULL,
  `itemDesc` varchar(255) DEFAULT NULL,
  `itemPrice` int(11) DEFAULT NULL,
  `itemImgUrl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemID`, `shopID`, `itemName`, `itemDesc`, `itemPrice`, `itemImgUrl`) VALUES
(1, 1, 'Bakmie Ayam Enak', 'Daging ayam dapat dipilih dada atau paha, cantumkan di notes', 15000, './img/food/Bakmie Enak_Bakmie Ayam Enak.jpg'),
(2, 1, 'Bakmie Ayam Pangsit Enak', 'Dapat 2 pangsit, daging ayam dapat dipilih dada atau paha, cantumkan di notes', 17000, './img/food/Bakmie Enak_Bakmie Ayam Pangsit Enak.jpg'),
(3, 1, 'Es Teh Tawar', '', 3000, './img/food/Bakmie Enak_Es Teh Tawar.jpg'),
(4, 2, 'Bakso Urat', 'Bakso pake urat', 25000, './img/food/Bakso Pak Jali_Bakso Urat.jpg'),
(5, 2, 'Bakso Kikil', 'Bakso pake kikil', 30000, './img/food/Bakso Pak Jali_Bakso Kikil.jpg'),
(6, 2, 'Baso Granat', 'Bakso gede', 35000, './img/food/Bakso Pak Jali_Bakso Granat.jpg'),
(8, 2, 'Bakso Setan', 'Bakso pedes', 20000, './img/food/Bakso Pak Jali_Bakso Setan.jpg'),
(12, 1, 'Kerupuk', 'Kerupuk putih biasa', 1000, './img/food/Bakmie Enak_Kerupuk.jpg'),
(13, 1, 'Pangsit', 'Pangsit kuah', 20000, './img/food/Bakmie Enak_Pangsit.jpg'),
(14, 2, 'Bakso Gepeng', 'Bakso gepeng', 25000, './img/food/Bakso Pak Jali_Bakso Gepeng.jpg'),
(15, 3, 'Ayam Bakar', 'Smoky', 20000, './img/food/Warung Jajan_Ayam Bakar.jpg'),
(16, 3, 'Ketoprak', 'Saus kacang banyak', 15000, './img/food/Warung Jajan_Ketoprak.jpg'),
(17, 3, 'Mie Goreng', 'Indomie seleraku', 10000, './img/food/Warung Jajan_Mie Goreng.jpg'),
(18, 3, 'Nasi Uduk', 'Nasi uduk lengkap', 20000, './img/food/Warung Jajan_Nasi Uduk.jpg'),
(19, 3, 'Warung Jajan_Sate', 'Dapat 12 tusuk', 25000, './img/food/Warung Jajan_Sate.jpg'),
(20, 4, 'Boba', 'Milk tea boba', 23000, './img/food/Segar Segar_Boba.jpg'),
(21, 4, 'Es Buah', 'Es buah fresh', 10000, './img/food/Segar Segar_Es Buah.jpg'),
(22, 4, 'Jus Jambu', 'Jambu asli', 10000, './img/food/Segar Segar_Jus Jambu.jpg'),
(23, 4, 'Jus Jeruk', 'Jeruk asli', 10000, './img/food/Segar Segar_Jus Jeruk.jpg'),
(24, 4, 'Kelapa Muda', 'Baru jatoh dari pohon', 20000, './img/food/Segar Segar_Kelapa Muda.jpg'),
(25, 5, 'Chicken Wings', '10 pieces', 55000, './img/food/Ayam Nation_Chicken Wings.jpg'),
(26, 5, 'Fried Chicken', 'Juicy and delicious', 22000, './img/food/Ayam Nation_Fried Chicken.jpg'),
(27, 5, 'Karaage', '10 bite sized pieces', 45000, './img/food/Ayam Nation_Karaage.jpg'),
(28, 5, 'Nashville Hot Chicken', 'Hot and spicy', 35000, './img/food/Ayam Nation_Nashville Hot Chicken.jpg'),
(29, 5, 'Peri Peri Chicken', 'Full of spice', 30000, './img/food/Ayam Nation_Peri Peri Chicken.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `shopID` int(11) DEFAULT NULL,
  `itemID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `itemAmount` int(11) DEFAULT NULL,
  `itemNotes` varchar(255) DEFAULT NULL,
  `orderTimeStamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `userAddress` varchar(255) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'uncompleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `shopID`, `itemID`, `userID`, `itemAmount`, `itemNotes`, `orderTimeStamp`, `userAddress`, `totalPrice`, `status`) VALUES
(19, 2, 6, 2, 4, '', '2022-11-15 18:42:53', 'Puri Mansion', 140000, 'completed'),
(20, 2, 4, 2, 3, '', '2022-11-15 18:42:53', 'Puri Mansion', 90000, 'completed'),
(21, 2, 5, 2, 3, '', '2022-11-15 18:42:53', 'Puri Mansion', 87000, 'completed'),
(22, 1, 1, 2, 4, '', '2022-11-15 18:54:25', 'Puri', 60000, 'completed'),
(23, 1, 2, 2, 3, '', '2022-11-15 18:54:25', 'Puri', 51000, 'completed'),
(24, 2, 4, 1, 3, '', '2022-11-16 02:28:49', 'Binus', 90000, 'completed'),
(25, 2, 6, 1, 1, '', '2022-11-16 02:28:49', 'Binus', 35000, 'completed'),
(26, 1, 3, 4, 1, '', '2022-11-16 03:55:36', 'Central Park', 3000, 'completed'),
(27, 1, 1, 4, 1, '', '2022-11-16 03:55:36', 'Central Park', 15000, 'completed'),
(28, 2, 4, 4, 3, '', '2022-11-16 03:55:56', 'Binus', 90000, 'completed'),
(29, 1, 1, 2, 3, '', '2022-11-16 06:54:17', 'Anggrek', 45000, 'completed'),
(30, 2, 5, 2, 4, '', '2022-11-16 13:27:21', 'Puri', 120000, 'completed'),
(31, 1, 12, 2, 3, 'Garing', '2022-11-16 13:59:39', 'Puri Mansion', 3000, 'completed'),
(32, 1, 13, 2, 2, '', '2022-11-16 13:59:39', 'Puri Mansion', 40000, 'completed'),
(33, 2, 8, 2, 2, 'Tambah cabe', '2022-11-16 13:59:56', 'Puri Mansion', 40000, 'completed'),
(34, 3, 15, 2, 3, '', '2022-11-16 14:00:20', 'Puri Mansion', 60000, 'completed'),
(35, 3, 17, 2, 2, '', '2022-11-16 14:00:20', 'Puri Mansion', 20000, 'completed'),
(36, 4, 20, 2, 2, '', '2022-11-16 14:00:31', 'Puri Mansion', 46000, 'completed'),
(37, 4, 22, 2, 1, '', '2022-11-16 14:00:31', 'Puri Mansion', 10000, 'completed'),
(38, 5, 27, 2, 2, '', '2022-11-16 14:00:43', 'Puri Mansion', 90000, 'completed'),
(39, 5, 25, 2, 1, '', '2022-11-16 14:00:43', 'Puri Mansion', 55000, 'completed'),
(40, 1, 1, 6, 2, '', '2022-11-16 14:01:30', 'Greenville', 30000, 'completed'),
(41, 2, 14, 6, 2, '', '2022-11-16 14:01:37', 'Greenville', 50000, 'completed'),
(42, 3, 16, 6, 1, '', '2022-11-16 14:01:47', 'Greenville', 15000, 'completed'),
(43, 4, 24, 6, 1, 'Wow', '2022-11-16 14:02:01', 'Greenville', 20000, 'completed'),
(44, 5, 29, 6, 1, 'Banyakin saos', '2022-11-16 14:02:13', 'Greenville', 30000, 'completed'),
(45, 1, 13, 7, 1, '', '2022-11-16 14:03:04', 'Taman Anggrek', 20000, 'completed'),
(46, 2, 8, 7, 1, '', '2022-11-16 14:03:11', 'Taman Anggrek', 20000, 'completed'),
(47, 3, 17, 7, 1, '', '2022-11-16 14:03:18', 'Taman Anggrek', 10000, 'completed'),
(48, 4, 20, 7, 1, '', '2022-11-16 14:03:25', 'Taman Anggrek', 23000, 'completed'),
(49, 5, 28, 7, 1, '', '2022-11-16 14:03:34', 'Taman Anggrek', 35000, 'completed'),
(50, 1, 3, 9, 1, '', '2022-11-16 14:04:07', 'Syahdan kampus', 3000, 'completed'),
(51, 2, 6, 9, 1, '', '2022-11-16 14:04:14', 'Syahdan kampus', 35000, 'completed'),
(52, 3, 18, 9, 1, '', '2022-11-16 14:04:21', 'Syahdan kampus', 20000, 'completed'),
(53, 4, 21, 9, 1, '', '2022-11-16 14:04:29', 'Syahdan kampus', 10000, 'completed'),
(54, 5, 26, 9, 4, 'Syahdan kampus', '2022-11-16 14:04:38', 'Syahdan kampus', 88000, 'completed'),
(55, 1, 1, 11, 5, '', '2022-11-16 14:05:09', 'Green garden', 75000, 'completed'),
(56, 2, 4, 11, 3, '', '2022-11-16 14:05:18', 'Green garden', 75000, 'completed'),
(57, 3, 19, 11, 2, '', '2022-11-16 14:05:29', 'Green garden', 50000, 'completed'),
(58, 4, 21, 11, 2, '', '2022-11-16 14:05:36', 'Green garden', 20000, 'completed'),
(59, 5, 25, 11, 2, '', '2022-11-16 14:05:45', 'Green garden', 110000, 'completed'),
(60, 1, 2, 8, 2, '', '2022-11-16 14:06:23', 'Depok', 34000, 'completed'),
(61, 2, 5, 8, 2, '', '2022-11-16 14:06:29', 'Depok', 60000, 'completed'),
(62, 3, 15, 8, 2, '', '2022-11-16 14:06:35', 'Depok', 40000, 'completed'),
(63, 4, 22, 8, 2, '', '2022-11-16 14:06:42', 'Depok', 20000, 'completed'),
(64, 5, 28, 8, 5, '', '2022-11-16 14:06:49', 'Depok', 175000, 'completed'),
(65, 1, 1, 10, 4, '', '2022-11-16 14:07:13', 'Palmerah', 60000, 'completed'),
(66, 2, 14, 10, 2, '', '2022-11-16 14:07:19', 'Palmerah', 50000, 'completed'),
(67, 3, 16, 10, 1, '', '2022-11-16 14:07:25', 'Palmerah', 15000, 'completed'),
(68, 3, 17, 10, 2, '', '2022-11-16 14:07:31', 'Palmerah', 20000, 'completed'),
(69, 4, 23, 10, 3, '', '2022-11-16 14:07:44', 'Palmerah', 30000, 'completed'),
(70, 5, 29, 10, 3, '', '2022-11-16 14:08:03', 'Palmerah', 90000, 'completed'),
(71, 1, 1, 5, 1, '', '2022-11-16 14:08:37', 'Greenville', 15000, 'completed'),
(72, 2, 8, 5, 2, '', '2022-11-16 14:08:44', 'Greenville', 40000, 'completed'),
(73, 3, 17, 5, 2, '', '2022-11-16 14:08:51', 'Greenville', 20000, 'completed'),
(74, 4, 20, 5, 2, '', '2022-11-16 14:08:57', 'Greenville', 46000, 'completed'),
(75, 5, 27, 5, 2, '', '2022-11-16 14:09:04', 'Greenville', 90000, 'completed'),
(76, 3, 17, 4, 2, '', '2022-11-16 14:26:48', 'Greenville', 20000, 'completed'),
(77, 3, 19, 4, 2, '', '2022-11-16 14:26:48', 'Greenville', 50000, 'completed'),
(78, 3, 15, 4, 2, '', '2022-11-16 14:26:48', 'Greenville', 40000, 'completed'),
(79, 4, 23, 4, 2, '', '2022-11-16 14:27:01', 'Greenville', 20000, 'completed'),
(80, 4, 22, 4, 1, '', '2022-11-16 14:27:01', 'Greenville', 10000, 'completed'),
(81, 4, 20, 4, 1, '', '2022-11-16 14:27:01', 'Greenville', 23000, 'completed'),
(82, 5, 28, 4, 1, '', '2022-11-16 14:27:15', 'selamatpagi', 35000, 'completed'),
(83, 5, 25, 4, 1, '', '2022-11-16 14:27:15', 'selamatpagi', 55000, 'completed'),
(84, 5, 27, 4, 1, '', '2022-11-16 14:27:15', 'selamatpagi', 45000, 'completed'),
(85, 3, 18, 6, 1, '', '2022-11-16 14:27:52', 'Tangerang', 20000, 'completed'),
(86, 3, 15, 6, 1, '', '2022-11-16 14:27:52', 'Tangerang', 20000, 'completed'),
(87, 4, 20, 6, 1, '', '2022-11-16 14:28:02', 'Tangerang', 23000, 'completed'),
(88, 4, 24, 6, 1, '', '2022-11-16 14:28:02', 'Tangerang', 20000, 'completed'),
(89, 5, 27, 6, 2, '', '2022-11-16 14:28:10', 'Tangerang', 90000, 'completed'),
(90, 5, 29, 6, 1, '', '2022-11-16 14:28:10', 'Tangerang', 30000, 'completed'),
(91, 1, 1, 2, 2, '', '2022-11-16 14:31:49', 'Kebon jeruk', 30000, 'uncompleted'),
(92, 2, 8, 2, 3, '', '2022-11-16 14:31:59', 'Kebon jeruk', 60000, 'uncompleted'),
(93, 3, 16, 2, 2, '', '2022-11-16 14:32:07', 'Kebon jeruk', 30000, 'uncompleted'),
(94, 3, 15, 2, 1, '', '2022-11-16 14:32:07', 'Kebon jeruk', 20000, 'uncompleted'),
(95, 4, 20, 2, 2, '', '2022-11-16 14:32:16', 'Kebon jeruk', 46000, 'uncompleted'),
(96, 5, 28, 2, 1, '', '2022-11-16 14:32:26', 'Kebon jeruk', 35000, 'uncompleted'),
(97, 1, 1, 2, 3, '', '2022-11-16 14:33:10', 'Kebon jeruk', 45000, 'uncompleted');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `orderID` int(11) DEFAULT NULL,
  `reviewTimeStamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `reviewText` varchar(255) DEFAULT NULL,
  `stars` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewID`, `userID`, `orderID`, `reviewTimeStamp`, `reviewText`, `stars`) VALUES
(8, 2, 19, '2022-11-15 20:44:11', 'Very Cool', 5),
(9, 2, 20, '2022-11-15 20:44:11', 'Very Cool', 5),
(10, 2, 21, '2022-11-15 20:44:11', 'Very Cool', 5),
(11, 1, 24, '2022-11-16 02:29:13', 'Enak Banget', 5),
(12, 1, 25, '2022-11-16 02:29:13', 'Enak Banget', 5),
(13, 4, 26, '2022-11-16 03:57:30', 'Boleh juga', 4),
(14, 4, 27, '2022-11-16 03:57:30', 'Boleh juga', 4),
(15, 4, 28, '2022-11-16 03:57:43', 'Nikmat Sekali', 5),
(16, 2, 29, '2022-11-16 06:55:26', '', 5),
(17, 1, 24, '2022-11-16 14:13:19', 'Boleh lah', 3),
(18, 1, 25, '2022-11-16 14:13:19', 'Boleh lah', 3),
(19, 2, 19, '2022-11-16 14:14:11', 'porsi banyak', 5),
(20, 2, 20, '2022-11-16 14:14:11', 'porsi banyak', 5),
(21, 2, 21, '2022-11-16 14:14:11', 'porsi banyak', 5),
(22, 2, 22, '2022-11-16 14:14:24', 'B aja', 2),
(23, 2, 23, '2022-11-16 14:14:24', 'B aja', 2),
(24, 2, 29, '2022-11-16 14:14:36', 'Lebih enak', 3),
(25, 2, 30, '2022-11-16 14:14:46', 'So bakso', 5),
(26, 2, 31, '2022-11-16 14:15:02', '', 4),
(27, 2, 32, '2022-11-16 14:15:02', '', 4),
(28, 2, 33, '2022-11-16 14:15:27', 'Kepedesan', 2),
(29, 2, 34, '2022-11-16 14:15:42', 'Mahal', 3),
(30, 2, 35, '2022-11-16 14:15:42', 'Mahal', 3),
(31, 2, 36, '2022-11-16 14:15:51', 'Seger', 5),
(32, 2, 37, '2022-11-16 14:15:51', 'Seger', 5),
(33, 2, 38, '2022-11-16 14:16:03', 'Garing', 5),
(34, 2, 39, '2022-11-16 14:16:03', 'Garing', 5),
(35, 6, 44, '2022-11-16 14:18:34', '', 5),
(36, 6, 43, '2022-11-16 14:18:43', 'Mahal', 4),
(37, 6, 42, '2022-11-16 14:18:51', 'Murah', 5),
(38, 6, 41, '2022-11-16 14:18:58', 'Mantap sekali', 5),
(39, 6, 40, '2022-11-16 14:19:11', 'LEZATTT', 5),
(40, 7, 49, '2022-11-16 14:19:51', '', 5),
(41, 7, 45, '2022-11-16 14:19:55', '', 5),
(42, 7, 46, '2022-11-16 14:19:58', '', 4),
(43, 7, 47, '2022-11-16 14:20:01', '', 3),
(44, 7, 48, '2022-11-16 14:20:06', '', 4),
(45, 9, 54, '2022-11-16 14:20:37', '', 5),
(46, 9, 53, '2022-11-16 14:20:39', '', 5),
(47, 9, 52, '2022-11-16 14:20:42', '', 5),
(48, 9, 51, '2022-11-16 14:20:46', '', 4),
(49, 9, 50, '2022-11-16 14:20:49', '', 3),
(50, 8, 60, '2022-11-16 14:21:21', '', 5),
(51, 8, 61, '2022-11-16 14:21:27', 'ENak banget woy', 5),
(52, 8, 62, '2022-11-16 14:21:34', 'Smokynya berasa', 5),
(53, 8, 63, '2022-11-16 14:21:38', 'Biasa', 5),
(54, 8, 64, '2022-11-16 14:21:45', 'Pedas sangat', 5),
(55, 11, 55, '2022-11-16 14:22:16', '', 5),
(56, 11, 56, '2022-11-16 14:22:22', 'Lumayan', 4),
(57, 11, 57, '2022-11-16 14:22:35', 'LEzat', 5),
(58, 11, 58, '2022-11-16 14:22:47', 'Nais', 5),
(59, 11, 59, '2022-11-16 14:22:54', 'Cripsy', 5),
(60, 10, 65, '2022-11-16 14:23:25', '', 5),
(61, 10, 66, '2022-11-16 14:23:28', '', 5),
(62, 10, 67, '2022-11-16 14:23:33', 'MANTAPPPP', 5),
(63, 10, 68, '2022-11-16 14:23:40', 'Agak dikit', 4),
(64, 10, 69, '2022-11-16 14:23:48', 'Seger banget sih ini', 5),
(65, 10, 70, '2022-11-16 14:23:58', 'Kurang berasa rempah', 3),
(66, 5, 71, '2022-11-16 14:24:52', 'Ga suka, rasanya kenapa begini', 1),
(67, 5, 72, '2022-11-16 14:25:01', 'Agak kepedesan', 4),
(68, 5, 73, '2022-11-16 14:25:14', 'Biasa aja sih, gaada yang spesial', 3),
(69, 5, 74, '2022-11-16 14:25:21', 'Boleh juga ini', 4),
(70, 5, 75, '2022-11-16 14:25:31', 'Nyam nyam', 5),
(71, 4, 76, '2022-11-16 14:29:33', 'yoooo this stuff really good', 5),
(72, 4, 77, '2022-11-16 14:29:33', 'yoooo this stuff really good', 5),
(73, 4, 78, '2022-11-16 14:29:33', 'yoooo this stuff really good', 5),
(74, 4, 79, '2022-11-16 14:29:41', 'plain old boba', 3),
(75, 4, 80, '2022-11-16 14:29:41', 'plain old boba', 3),
(76, 4, 81, '2022-11-16 14:29:41', 'plain old boba', 3),
(77, 4, 82, '2022-11-16 14:29:50', 'Really crispy and good', 5),
(78, 4, 83, '2022-11-16 14:29:50', 'Really crispy and good', 5),
(79, 4, 84, '2022-11-16 14:29:51', 'Really crispy and good', 5),
(80, 6, 89, '2022-11-16 14:30:21', 'Boleh beli disini kapan kapan', 5),
(81, 6, 90, '2022-11-16 14:30:21', 'Boleh beli disini kapan kapan', 5),
(82, 6, 87, '2022-11-16 14:30:30', 'Berasa lagi di pantai', 5),
(83, 6, 88, '2022-11-16 14:30:30', 'Berasa lagi di pantai', 5),
(84, 6, 85, '2022-11-16 14:30:47', 'Oke juga, cuma ada kurang apa gitu', 4),
(85, 6, 86, '2022-11-16 14:30:47', 'Oke juga, cuma ada kurang apa gitu', 4);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `shopID` int(11) NOT NULL,
  `shopTitle` varchar(255) NOT NULL,
  `imgUrl` varchar(255) NOT NULL DEFAULT './img/Dummy.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`shopID`, `shopTitle`, `imgUrl`) VALUES
(1, 'Bakmie Enak', './img/shop/Bakmie Enak.png'),
(2, 'Bakso Pak Jali', './img/shop/Bakso Pak Jali.png'),
(3, 'Warung Jajan', './img/shop/Warung Jajan.png\r\n'),
(4, 'Segar Segar', './img/shop/Segar Segar.png\r\n'),
(5, 'Ayam Nation', './img/shop/Ayam Nation.png');

-- --------------------------------------------------------

--
-- Table structure for table `shopcategories`
--

CREATE TABLE `shopcategories` (
  `categoryRelationID` int(11) NOT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `shopID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopcategories`
--

INSERT INTO `shopcategories` (`categoryRelationID`, `categoryID`, `shopID`) VALUES
(1, 1, 1),
(2, 2, 1),
(4, 2, 3),
(5, 3, 3),
(6, 2, 4),
(20, 1, 2),
(22, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userRole` varchar(15) NOT NULL DEFAULT 'customer',
  `gender` varchar(255) NOT NULL DEFAULT 'Male'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `name`, `email`, `phoneNumber`, `userPassword`, `userRole`, `gender`) VALUES
(1, 'Daniel', 'daniel@gmail.com', '085280076262', 'helloworld', 'customer', 'Male'),
(2, 'Daniel', 'danielyohanes03@gmail.com', '085280076262', 'helloworld', 'customer', 'Male'),
(3, 'Bakso Pak Jali', 'baksojali@gmail.com', '085280063285', 'sobakso', 'tenant', 'Male'),
(4, 'Darren', 'darren@gmail.com', '086458878382', 'selamatpagi', 'customer', 'Male'),
(5, 'Dennis', 'dennis@gmail.com', '026436875386', 'selamatsore', 'customer', 'Male'),
(6, 'Kenneth', 'kenneth@gmail.com', '083978846493', 'selamatsiang', 'customer', 'Male'),
(7, 'Christian', 'christian@gmail.com', '086490062748', 'selamatmalam', 'customer', 'Male'),
(8, 'Jeremy', 'jeremy@gmail.com', '086392274695', 'sayalapar', 'customer', 'Male'),
(9, 'Michael', 'michael@gmail.com', '086295570908', 'bikinibottom', 'customer', 'Male'),
(10, 'Arif M', 'arif@gmail.com', '085479932954', 'computerscience', 'customer', 'Male'),
(11, 'Ruth J', 'ruth@gmail.com', '07493945868', 'kucingkucing', 'customer', 'Female'),
(12, 'Bakmie Enak', 'bakmieenak@gmail.com', '087689784750', 'bakmiekuy', 'tenant', 'Male'),
(13, 'Ayam Nation', 'ayamnation@gmail.com', '085284408364', 'ayamkuy', 'tenant', 'Male'),
(14, 'Warung Jajan', 'warungjajan@gmail.com', '086583397564', 'warungkuy', 'tenant', 'Male'),
(15, 'Segar Segar', 'segarsegar@gmail.com', '085387765927', 'segarkuy', 'tenant', 'Male'),
(16, 'Daniel Yohanes', 'danieladmin@gmail.com', '085280076262', 'rootuser', 'admin', 'Male'),
(17, 'Sylvia', 'syladmin@gmail.com', '087639972739', 'rootuser2', 'admin', 'Female'),
(18, 'Kenneth', 'kennethadmin@gmail.com', '083978846493', 'rootuser3', 'admin', 'Male'),
(21, 'Darren', 'darrenadmin@gmail.com', '086458878382', 'rootuser3', 'admin', 'Male'),
(22, 'Yosua', 'yosuaadmin@gmail.com', '08749907385', 'rootuser4', 'admin', 'Male'),
(23, 'Plankton', 'planktonadmin@gmail.com', '085239824379487', 'xdvuq751', 'admin', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `shopID` (`shopID`),
  ADD KEY `itemID` (`itemID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemID`),
  ADD KEY `fk_foreign` (`shopID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `shopID` (`shopID`),
  ADD KEY `itemID` (`itemID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `orderID` (`orderID`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shopID`);

--
-- Indexes for table `shopcategories`
--
ALTER TABLE `shopcategories`
  ADD PRIMARY KEY (`categoryRelationID`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `shopID` (`shopID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `shopID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `shopcategories`
--
ALTER TABLE `shopcategories`
  MODIFY `categoryRelationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`shopID`) REFERENCES `shop` (`shopID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`itemID`) REFERENCES `item` (`itemID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_foreign` FOREIGN KEY (`shopID`) REFERENCES `shop` (`shopID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`shopID`) REFERENCES `shop` (`shopID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`shopID`) REFERENCES `shop` (`shopID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`itemID`) REFERENCES `item` (`itemID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shopcategories`
--
ALTER TABLE `shopcategories`
  ADD CONSTRAINT `shopcategories_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shopcategories_ibfk_2` FOREIGN KEY (`shopID`) REFERENCES `shop` (`shopID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
