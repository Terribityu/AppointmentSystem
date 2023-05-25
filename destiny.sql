-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 25, 2023 at 10:49 PM
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

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointmentID`, `scheduleID`, `studentID`, `remarks`, `status_a`, `payment_s`, `remarks_details`, `reason_rej`, `appointmentArchive`) VALUES
(1, 6, 5, 'TBA', 'pending', 'unpaid', '', '', 0);

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
(1, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'approved', 1);

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
  `price` int NOT NULL,
  `slots` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'upcoming',
  `instructorID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `title`, `start`, `end`, `time`, `price`, `slots`, `status`, `instructorID`) VALUES
(1, 'TDC', '2023-06-03', '2023-06-04', '08:00', 900, 30, 'upcoming', 3),
(2, 'TDC', '2023-06-04', '2023-06-05', '08:00', 900, 30, 'upcoming', 3),
(3, 'PDC', '2023-05-29', '2023-05-30', '08:00', 5500, 1, 'upcoming', 2),
(4, 'PDC', '2023-05-29', '2023-05-30', '08:00', 5500, 1, 'upcoming', 3),
(5, 'PDC', '2023-05-30', '2023-05-31', '08:00', 5500, 1, 'upcoming', 2),
(6, 'PDC', '2023-05-31', '2023-06-01', '08:00', 5500, 0, 'upcoming', 3),
(7, 'PDC', '2023-06-01', '2023-06-02', '08:00', 5500, 1, 'upcoming', 4),
(8, 'PDC', '2023-06-01', '2023-06-02', '08:00', 5500, 1, 'upcoming', 2),
(9, 'PDC', '2023-05-31', '2023-06-01', '08:00', 5500, 1, 'upcoming', 4),
(10, 'PDC', '2023-06-02', '2023-06-03', '08:00', 5500, 1, 'upcoming', 4);

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
(18, 'destinyadmin', 1, 'addfeedback', '05-26-2023', '06:46:56');

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
(1, 'destinyadmin', 'destinydrivingschool@gmail.com', 9763140537, '$2y$10$MkZtXAtg/ERI8KAnqX9Lq.PBnFtCxvR0U2lhcIjKOu8NXKVU4Jw9y', 'https://res.cloudinary.com/ddf34uiqq/image/upload/v1682772503/m5voiqwbccmzooxvi8wa.jpg', 'admin', 0),
(2, 'arjonarogelio', 'arjonarogelio@gmail.com', 9351723271, '$2y$10$MkZtXAtg/ERI8KAnqX9Lq.PBnFtCxvR0U2lhcIjKOu8NXKVU4Jw9y', 'https://res.cloudinary.com/ddf34uiqq/image/upload/v1682772503/m5voiqwbccmzooxvi8wa.jpg', 'instructor', 0),
(3, 'florentinocarlocruz', 'florentinocarlocruz@gmail.com', 9613031529, '$2y$10$MkZtXAtg/ERI8KAnqX9Lq.PBnFtCxvR0U2lhcIjKOu8NXKVU4Jw9y', 'https://res.cloudinary.com/ddf34uiqq/image/upload/v1682772503/m5voiqwbccmzooxvi8wa.jpg', 'instructor', 0),
(4, 'delaminesjose', 'delaminesjose@gmail.com', 9561073815, '$2y$10$MkZtXAtg/ERI8KAnqX9Lq.PBnFtCxvR0U2lhcIjKOu8NXKVU4Jw9y', 'https://res.cloudinary.com/ddf34uiqq/image/upload/v1682772503/m5voiqwbccmzooxvi8wa.jpg', 'instructor', 0),
(5, 'fascinating', 'stodomingojohnrey5@gmail.com', 9561073815, '$2y$10$fjcerRDHv7FRP3VSd6d4G.p25XWVSBoruVBOn6211rgBA8pUqjaS6', 'https://res.cloudinary.com/ddf34uiqq/image/upload/v1682772503/m5voiqwbccmzooxvi8wa.jpg', 'student', 0),
(6, 'mizzyssippi', 'mizzymanigque19@gmail.com', 9561073815, '$2y$10$d7kfhH15TI/R4fT9HmmAReB6ZPj/H4rIvJ4M8pgMgr6.Odf8qX5HK', 'https://res.cloudinary.com/ddf34uiqq/image/upload/v1685052766/p1jffnwgmz1k5ogmkpau.jpg', 'student', 0);

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
(6, 'Mizzy Jenvy', 'Fernandez', 'Manigque', '', '176 San Agustin, San Miguel Bulacan', 3011, '2000-11-19', 'Female', 'Single', 'mizzyssippi');

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
  ADD KEY `appointmentID` (`appointmentID`);

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
  ADD PRIMARY KEY (`reportsID`),
  ADD KEY `username` (`username`);

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
  MODIFY `appointmentID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `system_reports`
--
ALTER TABLE `system_reports`
  MODIFY `reportsID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `detail_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- Constraints for table `system_reports`
--
ALTER TABLE `system_reports`
  ADD CONSTRAINT `system_reports_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
