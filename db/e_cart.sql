-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 02:40 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `purchase_history`
--

CREATE TABLE `purchase_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_history`
--

INSERT INTO `purchase_history` (`id`, `user_id`, `product_id`, `qty`, `amount`, `created_at`) VALUES
(1, 1, 3, 2, 160, '2023-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `product_sku` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `price` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `product_name`, `image`, `product_sku`, `description`, `quantity`, `added_by`, `price`, `created_at`, `updated_at`) VALUES
(2, 'Money plant', '1675205049.jpeg', 'Mon023', 'What is money plant good for?\r\nImage result for money plant\r\nMoney plants add value to a healthy lifestyle by removing airborne pollutants from indoor air, such as benzene, carbon monoxide, formaldehyde, and xylene. The air in the room with the money plant is known to have more oxygen & helps in easy breathing.', 120, 8, 120, '2023-01-31 14:44:09', '2023-02-01 00:51:46'),
(3, 'Cactus plant', '1675206289.jpeg', 'CAC01', 'The plant helps cleans the air and improves breathing. Carbon dioxide is absorbed by all plants, including the cactus, and converted into breathing oxygen. Furthermore, the cactus removes pollutants from the interior air, assisting in improving indoor air quality.', 8, 8, 80, '2023-01-31 15:04:49', '2023-02-01 00:52:24'),
(4, 'Succulents', '1675206354.jpeg', 'Suc321', 'Hey, do you know the difference between a succulent and a cactus? This question is a pretty common one among our customers at Establish. So we thought we’d take a moment to let you know what are some of the similarities and what are some of the difference. Knowing some of these will definitely help green your thumb!', 11, 8, 60, '2023-01-31 15:05:54', '2023-02-01 01:18:26'),
(5, 'Christmas Cactus', '1675206425.jpg', 'CH05', 'This popular, winter-flowering houseplant makes a great addition to nearly any indoor setting. Christmas cactus is not only easy to care for but propagates easily too, making it an exceptional candidate for holiday gift giving.', 10, 8, 50, '2023-01-31 15:07:05', '2023-02-01 00:51:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `show_password` varchar(30) NOT NULL,
  `profile_img` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0-active, 1-inactive, 2-deleted',
  `user_type` tinyint(4) NOT NULL COMMENT '0-admin, 1-user',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `email`, `full_name`, `phone`, `password`, `show_password`, `profile_img`, `status`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 'shikhabkte@mailinator.com', 'shikhabkte024', '9874563102', '$2y$10$/VB5zD2O8HbQWxJuFcCa5Ow6QYHUnKIN4/X3sKMfEAEoLD/H0giWa', 'admin@987', '', 0, 0, '2023-01-30 22:26:17', '2023-01-30 22:26:17'),
(2, 'bkte024@gmail.com', 'Shikha Borkute', '8741259630', '$2y$10$Pu2/QYDhyufPXtqD24RJxuZ.Ti.645WboIv3wCGAkb/rVbbrjWu7C', 'bkte024', NULL, 0, 1, '2023-01-31 21:13:54', '2023-01-31 21:13:54'),
(8, 'parth024@mailinator.com', 'Parth bkte', '9874102563', '$2y$10$SEWlUVMSyB1kFEtZX/rVp.z9UtV4rW5gDRb20.THcVI.4xDOXfwU6', 'parth024', NULL, 0, 1, '2023-01-31 13:22:22', '2023-01-31 13:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` float NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_cart`
--

INSERT INTO `user_cart` (`id`, `user_id`, `product_id`, `quantity`, `amount`, `created_at`, `updated_at`) VALUES
(2, 8, 2, 2, 240, '2023-01-31 15:48:10', '2023-01-31 15:48:10'),
(5, 1, 4, 5, 300, '2023-01-31 17:18:26', '2023-01-31 17:18:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `purchase_history`
--
ALTER TABLE `purchase_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purchase_history`
--
ALTER TABLE `purchase_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_cart`
--
ALTER TABLE `user_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
