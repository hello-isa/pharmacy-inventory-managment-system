-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2023 at 06:14 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy_inventory_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `date_ordered` datetime NOT NULL,
  `status` enum('Partial','Pending','Ready') NOT NULL DEFAULT 'Partial'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `product_id`, `users_id`, `order_quantity`, `total_price`, `date_ordered`, `status`) VALUES
(223, 6, 93, 2, 53, '2023-05-16 11:58:10', 'Pending'),
(224, 10, 93, 10, 385, '2023-05-16 11:58:10', 'Pending'),
(231, 2, 93, 5, 67.5, '2023-05-16 11:59:29', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `quantity` int(11) NOT NULL,
  `availability` enum('Available','Unavailable') NOT NULL DEFAULT 'Unavailable',
  `product_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `quantity`, `availability`, `product_price`) VALUES
(1, 'Biogesics', 'Analgesic and antipyretics', 16, 'Available', 25.5),
(2, 'Decolgen', 'Decongestant and antipyretic', 5, 'Available', 13.5),
(3, 'Neozep', 'Decongestant and antihistamine', 5, 'Available', 13.5),
(6, 'Bioflu', 'Analgesic, antipyretic, and decongestant', 5, 'Available', 26.5),
(7, 'Gaviscon', 'Antacid', 10, 'Available', 35),
(8, 'Kremil-S', 'Antacid', 10, 'Available', 37),
(9, 'Mefenamic Acid', 'Analgesic and anti-inflammatory', 10, 'Available', 38),
(10, 'Cetirizine', 'Antihistamine', 0, 'Unavailable', 38.5),
(11, 'Loratadine', 'Antihistamine', 5, 'Available', 39),
(12, 'Paracetamol', 'Analgesic and antipyretic', 10, 'Unavailable', 39.5),
(13, 'Amoxicillin', 'Antibiotic', 10, 'Available', 42),
(14, 'Losartan', 'Antihypertensive', 10, 'Available', 44),
(15, 'Omeprazole', 'Proton pump inhibitor', 10, 'Available', 45),
(16, 'Simvastatin', 'Antihyperlipidemic', 10, 'Available', 47),
(17, 'Atenolol', 'Beta blocker', 10, 'Unavailable', 48),
(18, 'Metformin', 'Antidiabetic', 10, 'Available', 50),
(19, 'Folic Acid', 'Vitamin supplement', 10, 'Available', 53),
(20, 'Aspirin', 'Analgesic and antiplatelet', 10, 'Available', 55),
(21, 'Metronidazole', 'Antibiotic and antiprotozoal', 10, 'Available', 57),
(23, 'Cefalexin', 'Antibiotic', 10, 'Available', 62),
(24, 'Captoprils', 'ACE inhibitor', 15, 'Available', 63),
(25, 'Loperamide', 'Antidiarrheal', 10, 'Available', 65),
(26, 'Diclofenac', 'NSAID', 10, 'Available', 68),
(27, 'Enalapril', 'ACE inhibitor', 10, 'Available', 70),
(28, 'Ibuprofen', 'NSAID', 10, 'Available', 73),
(29, 'Diazepam', 'Benzodiazepine', 10, 'Available', 75),
(30, 'Paracetamol', 'Analgesic and antipyretic', 10, 'Available', 80),
(31, 'Losartan', 'ARB', 10, 'Available', 82),
(32, 'Amoxicillin', 'Antibiotic', 10, 'Available', 85),
(33, 'Cetirizine', 'Antihistamine', 10, 'Available', 90),
(59, 'Cheriffer', 'Capsule', 5, 'Available', 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `registration` timestamp NOT NULL DEFAULT current_timestamp(),
  `usertype` enum('Customer','Admin') DEFAULT 'Customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `registration`, `usertype`) VALUES
(90, '09455996355@usc.edu.ph', '09455996355', '$2y$10$RE2Lo4zqpdtvHA/LiJs6qe062YlqJUqmkUfGdbWKqHepO5YYvx6iC', '2023-04-22 03:53:12', 'Customer'),
(91, 'byceGPT@gmail.com', 'beansandboba', '$2y$10$XU8Mx71p0Dd1lv/Bs1MdauX8yq1PA5VeepKxeWD0ixtaOSUbKgLCm', '2023-04-26 06:10:27', 'Customer'),
(92, 'jasper@gmail.com', 'gwapo', '$2y$10$H6LBR0d1C3A7jV5tS1U0LupV68kpZX7J/oLLI.PHNHMV.KQciFehq', '2023-04-29 08:14:49', 'Admin'),
(93, 'xavier@gmail.com', 'guitarhero', '$2y$10$uJFU9k4RnViQjkzEgClT4Ol27YV83dmQY1a3HfKZWtyYo9fiqJfIq', '2023-04-29 09:03:29', 'Customer'),
(94, 'arjoy@gmail.com', 'arjoy', '$2y$10$l3/z0CI2XenhJ5s8Bs6FQ.qkws8b8Pg0aSDx6wF4pyOQWOOclwrBu', '2023-05-15 20:36:49', 'Customer'),
(95, 'ivannebayer@gmail.com', 'asd', '$2y$10$afk5qihD7DF3czxl4G4CJe6IPZCwxXBMcoMtWBMV5PcRfC7uD7tGO', '2023-05-15 20:40:16', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `users_id` (`users_id`) USING BTREE,
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_ID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
