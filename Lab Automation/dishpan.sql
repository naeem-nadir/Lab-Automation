-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2024 at 07:55 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dishpan`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `C_Name` varchar(200) DEFAULT NULL,
  `C_Description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `C_Name`, `C_Description`) VALUES
(47, 'nadir ali', 'jjjc'),
(48, 'software1', 'kkcmxask'),
(49, 'dddd', 'dddd'),
(50, 'dddd', 'dddd'),
(51, 'malik', 'test'),
(52, 'malik', 'test'),
(53, 'asad', 'test'),
(54, 'asad', 'test'),
(55, 'qqq', 'qqqq'),
(56, 'qqq', 'qqqq');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `ProductName` varchar(200) NOT NULL,
  `UnitsSold` varchar(200) NOT NULL,
  `InStock` varchar(12) NOT NULL,
  `ExpireDate` date NOT NULL,
  `c_id` int(11) NOT NULL,
  `status` enum('pending','approved') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `ProductName`, `UnitsSold`, `InStock`, `ExpireDate`, `c_id`, `status`) VALUES
(56, 'Holder', '33', '44', '2024-01-11', 47, 'pending'),
(58, 'capacitor', '24', '21', '2024-01-23', 48, 'pending'),
(60, 'PlugWire', '22', '22', '2024-02-01', 48, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `smoke_test`
--

CREATE TABLE `smoke_test` (
  `id` int(11) NOT NULL,
  `TestName` varchar(200) NOT NULL,
  `TestDescription` varchar(200) NOT NULL,
  `TestSteps` varchar(200) NOT NULL,
  `ExpectedResult` varchar(200) NOT NULL,
  `p_id` int(11) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `smoke_test`
--

INSERT INTO `smoke_test` (`id`, `TestName`, `TestDescription`, `TestSteps`, `ExpectedResult`, `p_id`, `status`) VALUES
(1, 'unit test ', 'it`s fet for market', '22', 'Good', 0, ''),
(2, 'unit test ', 'acb', 'abc', 'abc', 0, ''),
(3, '', '', '', '', 0, ''),
(4, 'holder', 'sbc jscajhbjbcasj', '1', '1', 0, 'pending'),
(5, '<br /><b>Warning</b>:  Undefined variable $product in <b>C:\\xampp2\\htdocs\\dashpanil\\Add-smoke.php</b> on line <b>33</b><br /><br /><b>Warning</b>:  Trying to access array offset on value of type null ', '', '', 'check Result', 0, 'pending'),
(6, '<br /><b>Warning</b>:  Undefined variable $product in <b>C:\\xampp2\\htdocs\\dashpanil\\Add-smoke.php</b> on line <b>33</b><br /><br /><b>Warning</b>:  Trying to access array offset on value of type null ', '', '', 'check Result', 0, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `ProductName` varchar(200) DEFAULT NULL,
  `Repetition` varchar(200) NOT NULL,
  `Control` varchar(200) NOT NULL,
  `Comparison` varchar(200) NOT NULL,
  `Value` varchar(200) NOT NULL,
  `ExpectedValue` varchar(200) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `ProductName`, `Repetition`, `Control`, `Comparison`, `Value`, `ExpectedValue`, `p_id`) VALUES
(1, 'PlugWire', '78', 'Pass', 'equal', '1', 'abc', 60),
(2, 'capacitor', '78', 'Fail', 'ndja', '1', '45', 58),
(3, 'Holder', '90', 'Pass', 'eq', 'check Value', '', 56),
(4, 'Holder', 'jh', 'check Control', '', 'check Value', '', 56),
(5, 'Holder', '', 'check Control', '', 'check Value', '', 56);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `U_Email` varchar(200) NOT NULL,
  `U_Password` varchar(200) NOT NULL,
  `role` varchar(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `U_Email`, `U_Password`, `role`) VALUES
(1, 'admin@gmail.com', '123', '1'),
(2, 'name@gmail.com', '222', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ProductName` (`ProductName`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `smoke_test`
--
ALTER TABLE `smoke_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `smoke_test`
--
ALTER TABLE `smoke_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
