-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2024 at 03:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `FreshCart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$Zz84cxwDUMOHjivk0/Nqr..jqzNwszg1PCoUqLwBDp/QhSauhe7P2', '2024-02-01 06:14:28'),
(7, 'admin1', '$2y$10$yRXcKMMZP3W2SO.46kBbLeys3SdpVFvBgJf.p9GMsy7AnpE8mtN8i', '2024-02-01 06:36:41'),
(9, 'admin2', '$2y$10$yVLvYIZFmp8XX10XnBRPy.lWydVJjJJvitBFjOr1yygoDhLp/PVwu', '2024-02-01 06:38:53'),
(11, 'admin123', '$2y$10$CYXzmE24VkqemlaUV7sV0OcjatIcpBnCd.2/2Ck6.RR7l.C1ERRJ.', '2024-02-06 12:58:39'),
(12, 'robert', '$2y$10$g2pkDTmtrq50q1nRwvvLwux7r0CZRZ2yA2QdssyvKdWFUXH0F0Jfa', '2024-02-06 13:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `grocery_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `reference_number` varchar(255) DEFAULT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `grocery_id`, `user_id`, `user_name`, `user_email`, `reference_number`, `booking_date`) VALUES
(16, 2, 17, 'tadeomuhumuza@gmail.com', 'tadeomuhumuza@gmail.com', 'REF66052ddc1ef972302', '2024-03-28 08:44:12'),
(17, 3, 17, 'tadeomuhumuza@gmail.com', 'tadeomuhumuza@gmail.com', 'REF66052f7bcf7819712', '2024-03-28 08:51:07');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(4, 'SSENONO ROBERT ', 'robsseno@gmail.com', 'testing one two', '2024-02-08 08:24:39'),
(7, 'SSENONO ROBERT ', 'robsseno@gmail.com', 'da,as', '2024-03-04 09:40:49');

-- --------------------------------------------------------

--
-- Table structure for table `groceries`
--

CREATE TABLE `groceries` (
  `grocery_id` int(11) NOT NULL,
  `grocery_name` varchar(255) NOT NULL,
  `grocery_description` text NOT NULL,
  `item_price` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `where` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `grocery_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groceries`
--

INSERT INTO `groceries` (`grocery_id`, `grocery_name`, `grocery_description`, `item_price`, `details`, `where`, `contact`, `grocery_image`) VALUES
(2, 'benja', 'cd,ms', 'esd', '7', 'eds', 'robert ssenono', '/opt/lampp/htdocs/NyakaReserve/admin/uploads/form20.jpg'),
(3, 'benja', 'CDMSD', 'SFDSD', 'SDFD', 'SDF', 'SDF', '/opt/lampp/htdocs/NyakaReserve/admin/uploads/007.jpg'),
(4, 'queen elizabeth tpout', 'touring all over', '400usd', '7', 'kisoro', 'benja, reagan and robert', '/opt/lampp/htdocs/NyakaReserve/admin/uploads/me-removebg-preview.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `password`) VALUES
(13, 'ssenono', 'robsseno@gmail.com', '202cb962ac59075b964b07152d234b70'),
(15, 'ssenono robert', 'robsseno@gmail.com', '$2y$10$cboetdDxl8t8.c693EnIxueVwlgqILUdWk4rlEcB/GbB76.1/ryUy'),
(16, 'robsseno@gmail.com', 'robsseno@gmail.com', '$2y$10$rphEq9FGtfTo33YQ7.m9OeNVhC8qqgIoC7tQ0KJGUB3ku3ASOno.i'),
(17, 'tadeo', 'tadeomuhumuza@gmail.com', '$2y$10$LiPw3/FjeIUL3E2FWd1Y0.W9.YrzNdjMr/JvPBCXJcSjBc/Ij8qFO'),
(18, 'benjamin', 'benjamin@gmail.com', '$2y$10$qWcSaO4cnHUZel4.Th1c/.3CPSxjIMF3xvdnC/70UEOlVhE0LZn.y'),
(19, 'oloro emmanuel', 'oloroemmanuel@gmail.com', '$2y$10$YinuwV6PCXpSnYUf72eLVuzX.Tm9vfxjNrW9WJfaXnDIZvSpteqFu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `tour_id` (`grocery_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groceries`
--
ALTER TABLE `groceries`
  ADD PRIMARY KEY (`grocery_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `groceries`
--
ALTER TABLE `groceries`
  MODIFY `grocery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`grocery_id`) REFERENCES `groceries` (`grocery_id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
