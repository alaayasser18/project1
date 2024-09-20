-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2024 at 11:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone`, `picture`, `manager_id`) VALUES
(4, 'alaa', 'alaa@gmail.com', '0107685653', '4.jpg', 4),
(8, 'alaa', 'alaa@gmail.com', '0107685653', '3.jpg', 1),
(9, 'sahar', 'sahar@gmail.com', '01029875547', '12.jpg', 1),
(10, 'aya', 'aya@gmail.com', '0107685653', '4.jpg', 1),
(12, 'omar', 'omar@gmail.com', '0107685653', '11.jpg', 8),
(13, 'aya', 'aya@gmail.com', '01029875547', '5.jpg', 2),
(14, 'sahar', 'sahar@gmail.com', '01029875547', '1.jpg', 2),
(15, 'alaa', 'alaa@gmail.com', '01029875547', '3.jpg', 2),
(16, 'tayam', 'tayam@gmail.com', '0107685653', '9.jpg', 12);

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `name`, `email`, `password`) VALUES
(1, 'soad', 'soad@gmail.com', '$2y$10$/EUUD6.KLvHe5Hrp9O2cR./8eqSxFi8XCOz4JUEsbGF6M72L5DK6i'),
(2, 'yasser', 'yasseralaa041@gmail.com', '$2y$10$7XZnub0oTSkaa/qJL7vuCOJ71vxrgIi6q2bUesUa1faUs8qKt3dku'),
(4, 'moaz', 'moaz@gmail.com', '$2y$10$.SgQKdKwv/1yXiKs.prdy.ohEUNp1y.v9l2SPSCNsS3C3N1P3Uro.'),
(5, 'soad', 'soad@gmail.com', '$2y$10$OkhssKbV.zGyS5vEKG5JyuwnzQquBXC9rNfo5oQ4eaDo.JVFBQYrW'),
(6, 'abdelrahman', 'aya@gmail.com', '$2y$10$U0aTPnQIchOcPtC1QCH8E.iTtojlGgU1ECRysp2qb0DI1hss7tpAm'),
(7, 'abdelrahman', 'aya@gmail.com', '$2y$10$S0RDBjCa.65xvUu9JjPj6eD3Zym92ImxUUi9b5JcCpU2uMYE8u3pW'),
(8, 'abdelrahman', 'abdo@gmail.com', '$2y$10$EQ09J8o05maO.WMNsqakSuhuksCJJ4kuk/XNO6UH3ugF.XIjaMEbS'),
(12, 'alaa', 'alaa@gmail.com', '$2y$10$TckCZ5.mIpyh2B9.jFGP8.TBVT1Wx3Bg.Wp0QwszMeWWIW5zKn74u');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `managers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
