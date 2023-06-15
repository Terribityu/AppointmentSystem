-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 15, 2023 at 03:16 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `destiny`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointmentID` int NOT NULL,
  `scheduleID` int NOT NULL,
  `studentID` int NOT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'TBA',
  `status_a` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
  `payment_s` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'unpaid',
  `remarks_details` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `reason_rej` varchar(155) COLLATE utf8mb4_general_ci NOT NULL,
  `appointmentArchive` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedbackID` int NOT NULL,
  `description` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
  `studentID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`feedbackID`, `description`, `status`, `studentID`) VALUES
(1, '<p>Quality driver education to last a lifetime</p>', 'approved', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `salesID` int NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price_s` int NOT NULL,
  `appointmentID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sched_details` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `slots` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'upcoming',
  `instructorID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_reports`
--

CREATE TABLE `system_reports` (
  `reportsID` int NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `transactID` int NOT NULL,
  `reportType` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `reportDate` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `reportTime` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_reports`
--

INSERT INTO `system_reports` (`reportsID`, `username`, `transactID`, `reportType`, `reportDate`, `reportTime`) VALUES
(1, 'destinyadmin', 2, 'addinstructor', '05-25-2023', '21:04:19'),
(2, 'destinyadmin', 3, 'addinstructor', '05-25-2023', '21:09:38'),
(3, 'destinyadmin', 4, 'addinstructor', '05-25-2023', '21:11:57'),
(4, 'destinyadmin', 1, 'addSchedule', '05-25-2023', '21:13:57'),
(5, 'destinyadmin', 2, 'addSchedule', '05-25-2023', '21:14:11'),
(6, 'destinyadmin', 3, 'addSchedule', '05-25-2023', '21:15:18'),
(7, 'destinyadmin', 4, 'addSchedule', '05-25-2023', '21:15:42'),
(8, 'destinyadmin', 5, 'addSchedule', '05-25-2023', '21:15:57'),
(9, 'destinyadmin', 6, 'addSchedule', '05-25-2023', '21:16:07'),
(10, 'destinyadmin', 7, 'addSchedule', '05-25-2023', '21:16:17'),
(11, 'destinyadmin', 8, 'addSchedule', '05-25-2023', '21:16:27'),
(12, 'destinyadmin', 9, 'addSchedule', '05-25-2023', '21:16:43'),
(13, 'destinyadmin', 10, 'addSchedule', '05-25-2023', '21:17:28'),
(15, 'destinyadmin', 5, 'registerstudent', '05-25-2023', '22:00:00'),
(16, 'fascinating', 1, 'enrollstudent', '05/25/2023', '22:00:00'),
(18, 'destinyadmin', 1, 'addfeedback', '05-26-2023', '06:46:56'),
(19, 'destinyadmin', 1, 'approveappointment', '05-27-2023', '03:28:36'),
(20, 'destinyadmin', 11, 'addSchedule', '05-27-2023', '08:51:49'),
(21, 'fascinating', 2, 'enrollstudent', '05-27-2023', '21:44:09'),
(22, 'destinyadmin', 8, 'addstudent', '05-28-2023', '15:33:54'),
(23, 'fascinating', 3, 'enrollstudent', '05-30-2023', '00:48:59'),
(24, 'destinyadmin', 1, 'rejectappointment', '05-30-2023', '00:51:50'),
(25, 'destinyadmin', 2, 'rejectappointment', '05-30-2023', '00:51:54'),
(26, 'destinyadmin', 3, 'rejectappointment', '05-30-2023', '00:51:57'),
(27, 'destinyadmin', 5, 'deleteSchedule', '05-29-2023', '18:19:25'),
(28, 'destinyadmin', 12, 'addSchedule', '05-29-2023', '20:04:47'),
(29, 'destinyadmin', 12, 'deleteSchedule', '05-29-2023', '20:04:50'),
(30, 'destinyadmin', 13, 'addSchedule', '05-30-2023', '20:18:14'),
(31, 'destinyadmin', 13, 'deleteSchedule', '05-30-2023', '20:18:17'),
(32, 'destinyadmin', 10, 'deleteSchedule', '05-30-2023', '20:20:34'),
(33, 'destinyadmin', 14, 'addSchedule', '05-30-2023', '21:01:18'),
(34, 'destinyadmin', 14, 'deleteSchedule', '05-30-2023', '21:06:44'),
(35, 'destinyadmin', 15, 'addSchedule', '05-30-2023', '21:06:48'),
(36, 'destinyadmin', 15, 'deleteSchedule', '05-30-2023', '21:06:51'),
(37, 'destinyadmin', 16, 'addSchedule', '05-30-2023', '21:07:31'),
(38, 'destinyadmin', 16, 'deleteSchedule', '05-30-2023', '21:07:33'),
(39, 'destinyadmin', 17, 'addSchedule', '05-30-2023', '21:07:42'),
(40, 'destinyadmin', 18, 'addSchedule', '05-30-2023', '21:07:45'),
(41, 'destinyadmin', 17, 'deleteSchedule', '05-30-2023', '21:08:03'),
(42, 'destinyadmin', 18, 'deleteSchedule', '05-30-2023', '21:08:06'),
(43, 'destinyadmin', 19, 'addSchedule', '05-30-2023', '21:08:20'),
(44, 'destinyadmin', 19, 'deleteSchedule', '05-30-2023', '21:08:22'),
(45, 'destinyadmin', 20, 'addSchedule', '05-30-2023', '21:08:33'),
(46, 'destinyadmin', 20, 'deleteSchedule', '05-30-2023', '21:08:36'),
(47, 'destinyadmin', 21, 'addSchedule', '05-30-2023', '21:09:44'),
(48, 'destinyadmin', 21, 'deleteSchedule', '05-30-2023', '21:09:47'),
(49, 'destinyadmin', 22, 'addSchedule', '05-30-2023', '21:10:49'),
(50, 'destinyadmin', 23, 'addSchedule', '05-30-2023', '22:01:42'),
(51, 'fascinating', 4, 'enrollstudent', '06-01-2023', '16:08:45'),
(52, 'fascinating', 5, 'enrollstudent', '06-01-2023', '16:08:49'),
(53, 'fascinating', 6, 'enrollstudent', '06-01-2023', '16:09:03'),
(54, 'fascinating', 7, 'enrollstudent', '06-01-2023', '16:09:05'),
(55, 'fascinating', 8, 'enrollstudent', '06-01-2023', '16:09:19'),
(56, 'destinyadmin', 4, 'rejectappointment', '06-02-2023', '00:15:13'),
(57, 'destinyadmin', 5, 'rejectappointment', '06-02-2023', '00:15:17'),
(58, 'destinyadmin', 6, 'rejectappointment', '06-02-2023', '00:15:20'),
(59, 'destinyadmin', 7, 'rejectappointment', '06-02-2023', '00:15:23'),
(60, 'destinyadmin', 8, 'rejectappointment', '06-02-2023', '00:15:26'),
(61, 'fascinating', 9, 'enrollstudent', '06-02-2023', '00:28:00'),
(62, 'destinyadmin', 2, 'addfeedback', '06-02-2023', '00:34:29'),
(63, 'destinyadmin', 9, 'approveappointment', '06-02-2023', '00:39:45'),
(64, 'florentinocarlocruz', 9, 'approveappointment', '06-02-2023', '00:45:00'),
(65, 'fascinating', 9, 'requestcancellation', '06-02-2023', '00:47:30'),
(66, 'fascinating', 9, 'requestcancellation', '06-07-2023', '16:49:39'),
(67, 'destinyadmin', 24, 'addSchedule', '06-07-2023', '08:50:42'),
(68, 'fascinating', 10, 'enrollstudent', '06-07-2023', '17:12:18'),
(69, 'destinyadmin', 10, 'rejectappointment', '06-07-2023', '17:29:41'),
(70, 'fascinating', 11, 'enrollstudent', '06-07-2023', '17:30:19'),
(71, 'destinyadmin', 11, 'rejectappointment', '06-07-2023', '17:31:32'),
(72, 'fascinating', 12, 'enrollstudent', '06-07-2023', '17:31:40'),
(73, 'destinyadmin', 12, 'rejectappointment', '06-07-2023', '17:31:51'),
(74, 'destinyadmin', 25, 'addSchedule', '06-13-2023', '13:51:10'),
(75, 'destinyadmin', 26, 'addSchedule', '06-13-2023', '13:51:13'),
(76, 'fascinating', 14, 'enrollstudent', '06-14-2023', '23:15:05'),
(77, 'fascinating', 15, 'enrollstudent', '06-14-2023', '23:15:48'),
(78, 'destinyadmin', 27, 'addSchedule', '06-14-2023', '16:40:34'),
(79, 'destinyadmin', 25, 'deleteSchedule', '06-14-2023', '16:40:36'),
(80, 'destinyadmin', 27, 'deleteSchedule', '06-14-2023', '16:40:39'),
(81, 'destinyadmin', 28, 'addSchedule', '06-14-2023', '16:40:43'),
(82, 'destinyadmin', 29, 'addSchedule', '06-14-2023', '16:40:45'),
(83, 'fascinating', 16, 'enrollstudent', '06-15-2023', '00:41:03'),
(84, 'fascinating', 17, 'enrollstudent', '06-15-2023', '01:25:37'),
(85, 'fascinating', 18, 'enrollstudent', '06-15-2023', '01:39:34'),
(86, 'fascinating', 18, 'requestcancellation', '06-15-2023', '01:50:13'),
(87, 'destinyadmin', 30, 'addSchedule', '06-14-2023', '17:59:35'),
(88, 'destinyadmin', 31, 'addSchedule', '06-14-2023', '17:59:39'),
(89, 'destinyadmin', 31, 'deleteSchedule', '06-14-2023', '17:59:41'),
(90, 'destinyadmin', 30, 'deleteSchedule', '06-14-2023', '17:59:56'),
(91, 'destinyadmin', 32, 'addSchedule', '06-14-2023', '18:00:06'),
(92, 'destinyadmin', 33, 'addSchedule', '06-14-2023', '18:00:14'),
(93, 'fascinating', 19, 'enrollstudent', '06-15-2023', '02:02:05'),
(94, 'destinyadmin', 19, 'approveappointment', '06-15-2023', '02:27:37'),
(95, 'fascinating', 20, 'enrollstudent', '06-15-2023', '02:27:47'),
(96, 'arjonarogelio', 2, 'updateAccount', '06-15-2023', '02:49:35'),
(97, 'florentinocarlocruz', 3, 'updateAccount', '06-15-2023', '02:53:25'),
(98, 'delaminesjose', 4, 'updateAccount', '06-15-2023', '02:54:11'),
(99, 'destinyadmin', 1, 'addfeedback', '06-15-2023', '23:11:29'),
(100, 'destinyadmin', 1, 'updateAccount', '06-15-2023', '23:13:05'),
(101, 'destinyadmin', 1, 'updateAccount', '06-15-2023', '23:13:37'),
(102, 'destinyadmin', 10, 'addinstructor', '06-15-2023', '23:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `number` bigint NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'avatar.jpg',
  `userType` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `userArchive` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `email`, `number`, `password`, `avatar`, `userType`, `userArchive`) VALUES
(1, 'destinyadmin', 'destinydrivingschool@gmail.com', 9351723271, '$2y$10$AAu/d25/w4L0UAgaMCLExuO.odDPCzXD8qePSltRT0mNYc6V3HLEK', 'https://res.cloudinary.com/ddf34uiqq/image/upload/v1686842017/cia2w2g7qusam1y0wjeg.jpg', 'admin', 0),
(2, 'arjonarogelio', 'arjonarogelio@gmail.com', 9351723271, '$2y$10$cFOlW4oKqI6gVoewuuNJnO6CLz05003X9CP11OFiMa7/XgaUtXr1m', 'https://res.cloudinary.com/ddf34uiqq/image/upload/v1686768574/aeekp83fe5ymmln7o9wy.png', 'instructor', 0),
(3, 'florentinocarlocruz', 'florentinocarlocruz@gmail.com', 9613031529, '$2y$10$3k4lHGaaqSWMwgPR71uZYOkOyd3maZ4meT6.nq4Lmxfp8PijOYmfS', 'https://res.cloudinary.com/ddf34uiqq/image/upload/v1686768804/u5i6hylo2e2mxsekyrsx.png', 'instructor', 0),
(4, 'delaminesjose', 'delaminesjose@gmail.com', 9561073815, '$2y$10$4hbhLTmQQweP5.FiNp5QMuOejPGe1Ncr4.OjfQblS0UnZGsPFYUuu', 'https://res.cloudinary.com/ddf34uiqq/image/upload/v1686768851/gfirowavp55xkyr8aqj8.png', 'instructor', 0),
(5, 'fascinating', 'stodomingojohnrey5@gmail.com', 9561073815, '$2y$10$fjcerRDHv7FRP3VSd6d4G.p25XWVSBoruVBOn6211rgBA8pUqjaS6', 'https://res.cloudinary.com/ddf34uiqq/image/upload/v1682772503/m5voiqwbccmzooxvi8wa.jpg', 'student', 0),
(6, 'mizzyssippi', 'mizzymanigque19@gmail.com', 9561073815, '$2y$10$d7kfhH15TI/R4fT9HmmAReB6ZPj/H4rIvJ4M8pgMgr6.Odf8qX5HK', 'https://res.cloudinary.com/ddf34uiqq/image/upload/v1685052766/p1jffnwgmz1k5ogmkpau.jpg', 'student', 0),
(10, 'violajakec325___x_6', 'violajakec325@gmail.com', 9351723271, '$2y$10$lsp65UgMKZqeG2bo7nAEE.zlX7j2pgYJEBaTA9Kebiqq.wTOKjzXm', 'https://res.cloudinary.com/ddf34uiqq/image/upload/v1682772503/m5voiqwbccmzooxvi8wa.jpg', 'instructor', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `detail_ID` int NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `middlename` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `suffix` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `zipcode` int NOT NULL,
  `dateofbirth` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `civilstatus` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`detail_ID`, `firstname`, `middlename`, `lastname`, `suffix`, `address`, `zipcode`, `dateofbirth`, `gender`, `civilstatus`, `username`) VALUES
(1, 'Destiny', 'Driving', 'School', '', 'San Miguel Bulacan', 3011, '2023-04-05', 'Male', 'Single', 'destinyadmin'),
(2, 'Rogelio', 'S.', 'Arjona', 'JR.', 'Poblacion, San Miguel Bulacan', 3011, '1983-04-16', 'Male', 'Married', 'arjonarogelio'),
(3, 'Carlo Florentino', 'T.', 'Cruz', '', 'Salangan, San Miguel Bulacan', 3011, '1985-09-21', 'Male', 'Single', 'florentinocarlocruz'),
(4, 'Jose', 'DS.', 'Dela Mines', '', 'Salangan, San Miguel Bulacan', 3011, '1988-01-14', 'Male', 'Married', 'delaminesjose'),
(5, 'John Rey', 'Daano', 'Sto Domingo', '', '203 Buliran San Miguel Bulacan', 3011, '2000-05-05', 'Male', 'Single', 'fascinating'),
(6, 'Mizzy Jenvy', 'Fernandez', 'Manigque', '', '176 San Agustin, San Miguel Bulacan', 3011, '2000-11-19', 'Female', 'Single', 'mizzyssippi'),
(8, 'Jake', 'C.', 'Viola', '', 'Salangan, San Miguel Bulacan', 3011, '1985-12-21', 'Male', 'Married', 'violajakec325___x_6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointmentID`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `scheduleID` (`scheduleID`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedbackID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`salesID`),
  ADD KEY `sales_ibfk_1` (`appointmentID`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instructorID` (`instructorID`);

--
-- Indexes for table `system_reports`
--
ALTER TABLE `system_reports`
  ADD PRIMARY KEY (`reportsID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`detail_ID`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointmentID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedbackID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `salesID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_reports`
--
ALTER TABLE `system_reports`
  MODIFY `reportsID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `detail_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`scheduleID`) REFERENCES `schedules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`appointmentID`) REFERENCES `appointments` (`appointmentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`instructorID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
