-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2023 at 08:19 AM
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
-- Database: `system_development`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(6) NOT NULL,
  `emp_image` longblob DEFAULT NULL,
  `emp_fname` varchar(50) NOT NULL,
  `emp_lname` varchar(50) NOT NULL,
  `emp_initial` varchar(50) DEFAULT NULL,
  `emp_role` varchar(50) NOT NULL,
  `emp_conumber` bigint(13) DEFAULT NULL,
  `emp_address` varchar(50) NOT NULL,
  `emp_email` varchar(50) NOT NULL,
  `emp_date_reg` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_image`, `emp_fname`, `emp_lname`, `emp_initial`, `emp_role`, `emp_conumber`, `emp_address`, `emp_email`, `emp_date_reg`) VALUES
(5142, 0x6d6972612e6a7067, 'Mira', 'Jalandoni', 'T', '3', 639876765544, 'JP Laurel', 'mira@gmail.com', '2023-12-21'),
(8191, 0x64616e69656c6c612e6a7067, 'Daniela May', 'Carwana', '', '1', 639084774747, 'Panabo', 'carawana@email.com', '2023-12-22'),
(8523, 0x64696e6e6f2e6a7067, 'Dinno', 'Guerba', 'M', '1', 639083384040, 'New Corella', 'dinnomguerba@gmail.com', '2023-12-21'),
(8628, 0x726f626572742e6a7067, 'Robert', 'Ramos', 'A', '2', 639429883311, 'Kapalong', 'robert@gmail.com', '2023-12-22');

-- ---------------------------------------------------------
-- Table structure for table `offduty`
--

CREATE TABLE `offduty` (
  `offduty_id` int(30) NOT NULL,
  `emp_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offduty`
--

INSERT INTO `offduty` (`offduty_id`, `emp_id`) VALUES
(1, 5142),
(2, 8523),
(3, 8628),
(4, 8191);

-- --------------------------------------------------------

--
-- Table structure for table `onduty`
--

CREATE TABLE `onduty` (
  `onduty_id` int(30) NOT NULL,
  `emp_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `onduty`
--

INSERT INTO `onduty` (`onduty_id`, `emp_id`) VALUES
(0, 8191);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(6) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Store Manager'),
(2, 'Assistant Manager'),
(3, 'Inventory Manager'),
(4, 'Cashier'),
(5, 'Sales Associate'),
(6, 'Customer Service'),
(7, 'Security Guard');

-- --------------------------------------------------------

--
-- Table structure for table `shift_data`
--

CREATE TABLE `shift_data` (
  `shift_id` int(20) NOT NULL,
  `shift_date` date NOT NULL DEFAULT current_timestamp(),
  `emp_id` int(11) DEFAULT NULL,
  `emp_fname` varchar(255) DEFAULT NULL,
  `emp_lname` varchar(255) DEFAULT NULL,
  `emp_role` int(11) DEFAULT NULL,
  `shift_start_time` time DEFAULT current_timestamp(),
  `shift_end_time` time DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL,
  `total_hours` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shift_data`
--

INSERT INTO `shift_data` (`shift_id`, `shift_date`, `emp_id`, `emp_fname`, `emp_lname`, `emp_role`, `shift_start_time`, `shift_end_time`, `status`, `total_hours`) VALUES
(1, '2023-12-22', 5142, 'Mira', 'Jalandoni', 3, '09:30:45', '09:31:10', 'ON DUTY', '00:00:25'),
(2, '2023-12-22', 8191, 'Daniela May', 'Carwana', 1, '09:30:52', '09:31:16', 'ON DUTY', '00:00:24'),
(3, '2023-12-22', 8523, 'Dinno', 'Guerba', 1, '09:30:58', '09:31:21', 'ON DUTY', '00:00:23'),
(4, '2023-12-22', 8628, 'Robert', 'Ramos', 2, '09:31:04', '09:31:29', 'ON DUTY', '00:00:25'),
(9, '2023-12-22', 5142, 'Mira', 'Jalandoni', 3, NULL, NULL, 'OFF DUTY', NULL),
(10, '2023-12-22', 8191, 'Daniela May', 'Carwana', 1, '14:01:14', '14:02:34', 'ON DUTY', '00:01:20'),
(11, '2023-12-22', 8523, 'Dinno', 'Guerba', 1, NULL, NULL, 'OFF DUTY', NULL),
(12, '2023-12-22', 8628, 'Robert', 'Ramos', 2, NULL, NULL, 'OFF DUTY', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shift_in`
--

CREATE TABLE `shift_in` (
  `shift_id` int(30) NOT NULL,
  `emp_id` int(30) NOT NULL,
  `shift_time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shift_in`
--

INSERT INTO `shift_in` (`shift_id`, `emp_id`, `shift_time`) VALUES
(1, 8191, '14:42:50');

-- --------------------------------------------------------

--
-- Table structure for table `shift_out`
--

CREATE TABLE `shift_out` (
  `shift_id` int(30) NOT NULL,
  `emp_id` int(30) NOT NULL,
  `shift_time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time_in`
--

CREATE TABLE `time_in` (
  `ti_id` int(30) NOT NULL,
  `emp_id` int(30) NOT NULL,
  `ti_time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `time_in`
--

INSERT INTO `time_in` (`ti_id`, `emp_id`, `ti_time`) VALUES
(3291, 8191, '14:42:50');

-- --------------------------------------------------------

--
-- Table structure for table `time_out`
--

CREATE TABLE `time_out` (
  `to_id` int(30) NOT NULL,
  `emp_id` int(60) NOT NULL,
  `to_time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `time_out`
--

INSERT INTO `time_out` (`to_id`, `emp_id`, `to_time`) VALUES
(54, 5142, '09:31:10'),
(56, 8523, '09:31:21'),
(57, 8628, '09:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(6) NOT NULL,
  `emp_id` int(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `emp_id`, `username`, `password`) VALUES
(18, 1, 'admin', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `offduty`
--
ALTER TABLE `offduty`
  ADD PRIMARY KEY (`offduty_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `shift_data`
--
ALTER TABLE `shift_data`
  ADD PRIMARY KEY (`shift_id`);

--
-- Indexes for table `shift_in`
--
ALTER TABLE `shift_in`
  ADD PRIMARY KEY (`shift_id`);

--
-- Indexes for table `shift_out`
--
ALTER TABLE `shift_out`
  ADD PRIMARY KEY (`shift_id`);

--
-- Indexes for table `time_in`
--
ALTER TABLE `time_in`
  ADD PRIMARY KEY (`ti_id`);

--
-- Indexes for table `time_out`
--
ALTER TABLE `time_out`
  ADD PRIMARY KEY (`to_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8629;

--
-- AUTO_INCREMENT for table `offduty`
--
ALTER TABLE `offduty`
  MODIFY `offduty_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shift_data`
--
ALTER TABLE `shift_data`
  MODIFY `shift_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `shift_in`
--
ALTER TABLE `shift_in`
  MODIFY `shift_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shift_out`
--
ALTER TABLE `shift_out`
  MODIFY `shift_id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_in`
--
ALTER TABLE `time_in`
  MODIFY `ti_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3292;

--
-- AUTO_INCREMENT for table `time_out`
--
ALTER TABLE `time_out`
  MODIFY `to_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
