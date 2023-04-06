-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2023 at 07:05 PM
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
  `status` enum('Pending','Ready') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `product_id`, `users_id`, `order_quantity`, `total_price`, `date_ordered`, `status`) VALUES
(162, 1, 35, 10, 800, '2023-04-02 08:14:39', 'Ready'),
(163, 2, 35, 5, 67.5, '2023-04-02 08:14:41', 'Ready'),
(178, 1, 67, 5, 400, '2023-04-02 19:39:26', 'Ready'),
(182, 2, 68, 5, 67.5, '2023-04-03 15:16:34', 'Ready');

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
(1, 'Biogesic', 'Analgesic and antipyretic', 16, 'Available', 80),
(2, 'Decolgen', 'Decongestant and antipyretic', 5, 'Available', 13.5),
(3, 'Neozep', 'Decongestant and antihistamine', 5, 'Available', 13.5),
(6, 'Bioflu', 'Analgesic, antipyretic, and decongestant', 10, 'Available', 26.5),
(7, 'Gaviscon', 'Antacid', 25, 'Available', 35),
(8, 'Kremil-S', 'Antacid', 10, 'Available', 37),
(9, 'Mefenamic Acid', 'Analgesic and anti-inflammatory', 10, 'Available', 38),
(10, 'Cetirizine', 'Antihistamine', 10, 'Available', 38.5),
(11, 'Loratadine', 'Antihistamine', 10, 'Available', 39),
(12, 'Paracetamol', 'Analgesic and antipyretic', 10, 'Available', 39.5),
(13, 'Amoxicillin', 'Antibiotic', 10, 'Available', 42),
(14, 'Losartan', 'Antihypertensive', 10, 'Available', 44),
(15, 'Omeprazole', 'Proton pump inhibitor', 10, 'Available', 45),
(16, 'Simvastatin', 'Antihyperlipidemic', 10, 'Available', 47),
(17, 'Atenolol', 'Beta blocker', 10, 'Available', 48),
(18, 'Metformin', 'Antidiabetic', 10, 'Available', 50),
(19, 'Folic Acid', 'Vitamin supplement', 10, 'Available', 53),
(20, 'Aspirin', 'Analgesic and antiplatelet', 10, 'Available', 55),
(21, 'Metronidazole', 'Antibiotic and antiprotozoal', 10, 'Available', 57),
(22, 'Gliclazide', 'Antidiabetic', 10, 'Available', 58),
(23, 'Cefalexin', 'Antibiotic', 10, 'Available', 62),
(24, 'Captopril', 'ACE inhibitor', 10, 'Available', 63),
(25, 'Loperamide', 'Antidiarrheal', 10, 'Available', 65),
(26, 'Diclofenac', 'NSAID', 10, 'Available', 68),
(27, 'Enalapril', 'ACE inhibitor', 10, 'Available', 70),
(28, 'Ibuprofen', 'NSAID', 10, 'Available', 73),
(29, 'Diazepam', 'Benzodiazepine', 10, 'Available', 75),
(30, 'Paracetamol', 'Analgesic and antipyretic', 10, 'Available', 80),
(31, 'Losartan', 'ARB', 10, 'Available', 82),
(32, 'Amoxicillin', 'Antibiotic', 10, 'Available', 85),
(33, 'Cetirizine', 'Antihistamine', 10, 'Available', 90),
(56, 'Cheriffer', 'Capsule', 10, 'Available', 60);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `registration` timestamp NOT NULL DEFAULT current_timestamp(),
  `usertype` varchar(250) DEFAULT 'Customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `registration`, `usertype`) VALUES
(35, 'artstyle123', '123', '123', '2023-03-27 10:55:59', 'Customer'),
(63, '09455996355@usc.edu.ph', '09455996355', '09455996355', '2023-03-27 12:46:59', 'Customer'),
(64, 'jorwen@gmail.com', 'rokiki', '12345', '2023-03-27 23:53:58', 'Customer'),
(65, 'mark@gmail.com', 'mark', '123', '2023-04-01 12:17:10', 'Customer'),
(67, 'lmao@lmao', 'lmao', 'lmao', '2023-04-01 22:58:37', 'Customer'),
(68, 'jasper@gmail.com', 'ciscogod', 'ciscogod', '2023-04-03 07:11:20', 'Customer');

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
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

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
