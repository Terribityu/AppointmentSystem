-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 23, 2023 at 09:43 PM
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
  `payment_s` varchar(255) NOT NULL DEFAULT 'unpaid',
  `remarks_details` varchar(150) NOT NULL,
  `reason_rej` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointmentID`, `scheduleID`, `studentID`, `remarks`, `status_a`, `payment_s`, `remarks_details`, `reason_rej`) VALUES
(8, 27, 27, 'TBA', 'rejected', 'unpaid', '', ''),
(9, 27, 27, 'TBA', 'rejected', 'unpaid', '', ''),
(11, 28, 27, 'TBA', 'rejected', 'unpaid', '', ''),
(12, 28, 27, 'TBA', 'rejected', 'unpaid', '', ''),
(13, 27, 27, 'TBA', 'rejected', 'unpaid', '', ''),
(14, 27, 27, 'TBA', 'rejected', 'unpaid', '', ''),
(18, 28, 27, 'TBA', 'rejected', 'unpaid', '', ''),
(19, 28, 27, 'TBA', 'approved', 'paid', '', ''),
(20, 29, 27, 'TBA', 'rejected', 'unpaid', '', ''),
(21, 29, 27, 'TBA', 'rejected', 'unpaid', '', ''),
(22, 29, 27, 'TBA', 'rejected', 'unpaid', '', ''),
(23, 29, 27, 'TBA', 'rejected', 'unpaid', '', ''),
(25, 31, 27, 'TBA', 'approved', 'paid', '', ''),
(26, 32, 27, 'TBA', 'request', 'unpaid', '', ''),
(27, 34, 27, 'TBA', 'approved', 'paid', '', ''),
(28, 32, 27, 'TBA', 'pending', 'unpaid', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `url`, `start`, `end`) VALUES
(6, 'dawdwa', 'dawdwa', 'facebook.com', '2023-04-13', '2023-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedbackID` int NOT NULL,
  `description` longtext NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `studentID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `salesID` int NOT NULL,
  `date` varchar(255) NOT NULL,
  `price_s` int NOT NULL,
  `appointmentID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`salesID`, `date`, `price_s`, `appointmentID`) VALUES
(2, '2023-04-11 03:42:43', 4500, 2),
(3, '2023-04-30 04:08:43', 123, 6),
(4, '2023-05-14 14:00:28', 5000, 19),
(5, '2023-05-14 18:22:55', 5555, 25),
(6, '2023-05-18 15:09:01', 5555, 25),
(7, '2023-05-18 15:09:12', 12123, 27);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `slots` int NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'upcoming',
  `instructorID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `title`, `start`, `end`, `time`, `price`, `slots`, `status`, `instructorID`) VALUES
(15, 'PDC', '2023-04-14', '2023-04-15', '20:15', 123, 1, 'upcoming', 9),
(17, 'PDC', '2023-04-19', '2023-04-20', '20:18', 3123, 1, 'upcoming', 9),
(22, 'PDC', '2023-04-12', '2023-04-13', '11:56', 4434, 1, 'upcoming', 9),
(24, 'PDC', '2023-04-13', '2023-04-14', '07:35', 4500, 1, 'upcoming', 10),
(25, 'PDC', '2023-04-20', '2023-04-21', '20:40', 43432, 1, 'upcoming', 9),
(26, 'PDC', '2023-04-27', '2023-04-28', '22:36', 2555, 1, 'upcoming', 10),
(27, 'PDC', '2023-05-02', '2023-05-03', '08:07', 5000, 1, 'upcoming', 10),
(28, 'PDC', '2023-05-02', '2023-05-03', '05:07', 5000, 1, 'upcoming', 9),
(29, 'TDC', '2023-05-05', '2023-05-06', '08:04', 3555, 30, 'upcoming', 9),
(30, 'TDC', '2023-05-06', '2023-05-07', '06:02', 3555, 30, 'upcoming', 10),
(31, 'PDC', '2023-05-17', '2023-05-18', '20:42', 5555, 0, 'upcoming', 9),
(32, 'PDC', '2023-05-18', '2023-05-19', '21:22', 3123, 4, 'upcoming', 9),
(34, 'PDC', '2023-05-19', '2023-05-20', '14:55', 12123, 1, 'upcoming', 9);

-- --------------------------------------------------------

--
-- Table structure for table `system_reports`
--

CREATE TABLE `system_reports` (
  `reportsID` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `transactID` int NOT NULL,
  `reportType` varchar(255) NOT NULL,
  `reportDate` varchar(255) NOT NULL,
  `reportTime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_reports`
--

INSERT INTO `system_reports` (`reportsID`, `username`, `transactID`, `reportType`, `reportDate`, `reportTime`) VALUES
(1, 'destinyadmin', 7, 'addstudent', '04-06-2023', '16:19:38'),
(2, 'destinyadmin', 7, 'editstudent', '04-06-2023', '16:24:14'),
(3, 'destinyadmin', 7, 'deletestudent', '04-06-2023', '16:25:46'),
(4, 'destinyadmin', 8, 'addstudent', '04-06-2023', '16:49:32'),
(5, 'destinyadmin', 4, 'editinstructor', '04-06-2023', '16:52:20'),
(6, 'destinyadmin', 9, 'addinstructor', '04-06-2023', '16:53:19'),
(7, 'destinyadmin', 8, 'editstudent', '04-10-2023', '05:55:43'),
(8, 'destinyadmin', 19, 'addSchedule', '04-10-2023', '06:20:18'),
(9, 'destinyadmin', 0, 'deleteSchedule', '04-10-2023', '06:21:01'),
(10, 'destinyadmin', 12, 'deleteSchedule', '04-10-2023', '06:21:27'),
(11, 'destinyadmin', 18, 'deleteSchedule', '04-10-2023', '06:33:37'),
(12, 'destinyadmin', 13, 'deleteSchedule', '04-10-2023', '07:20:54'),
(13, 'destinyadmin', 10, 'addinstructor', '04-10-2023', '10:18:25'),
(14, 'destinyadmin', 4, 'editinstructor', '04-10-2023', '10:23:07'),
(15, 'destinyadmin', 9, 'editinstructor', '04-10-2023', '10:23:21'),
(16, 'destinyadmin', 14, 'deleteSchedule', '04-10-2023', '11:43:03'),
(17, 'destinyadmin', 20, 'addSchedule', '04-10-2023', '11:46:58'),
(18, 'destinyadmin', 20, 'deleteSchedule', '04-10-2023', '11:48:25'),
(19, 'destinyadmin', 21, 'addSchedule', '04-10-2023', '11:55:04'),
(20, 'destinyadmin', 21, 'deleteSchedule', '04-10-2023', '11:55:10'),
(21, 'destinyadmin', 22, 'addSchedule', '04-10-2023', '11:56:15'),
(22, 'destinyadmin', 23, 'addSchedule', '04-10-2023', '14:35:14'),
(23, 'destinyadmin', 23, 'deleteSchedule', '04-10-2023', '14:35:17'),
(24, 'destinyadmin', 24, 'addSchedule', '04-10-2023', '14:35:37'),
(25, 'destinyadmin', 11, 'addstudent', '04-10-2023', '15:57:48'),
(26, 'destinyadmin', 1, 'createappointment', '04-10-2023', '16:23:56'),
(27, 'destinyadmin', 1, 'deleteappointment', '04-10-2023', '16:28:47'),
(28, 'destinyadmin', 1, 'deleteappointment', '04-10-2023', '16:38:54'),
(29, 'destinyadmin', 2, 'createappointment', '04-10-2023', '16:39:04'),
(30, 'destinyadmin', 3, 'createappointment', '04-10-2023', '16:49:12'),
(31, 'destinyadmin', 4, 'createappointment', '04-10-2023', '16:50:06'),
(32, 'destinyadmin', 5, 'createappointment', '04-10-2023', '16:50:49'),
(33, 'destinyadmin', 5, 'deleteappointment', '04-10-2023', '16:51:35'),
(34, 'destinyadmin', 2, 'editappointment', '04-10-2023', '17:11:26'),
(35, 'destinyadmin', 2, 'rejectappointment', '04-10-2023', '18:26:49'),
(36, 'destinyadmin', 2, 'approveappointment', '04-10-2023', '19:00:50'),
(37, 'destinyadmin', 2, 'approveappointment', '04-10-2023', '19:02:45'),
(38, 'destinyadmin', 2, 'passedstudent', '04-10-2023', '19:16:15'),
(39, 'destinyadmin', 2, 'passedstudent', '04-10-2023', '19:18:09'),
(40, 'destinyadmin', 2, 'paidappointment', '04-10-2023', '19:33:41'),
(41, 'destinyadmin', 2, 'paidappointment', '04-10-2023', '19:39:52'),
(42, 'destinyadmin', 2, 'paidappointment', '04-10-2023', '19:42:43'),
(43, 'destinyadmin', 25, 'addSchedule', '04-16-2023', '09:40:13'),
(44, 'destinyadmin', 12, 'addstudent', '04-16-2023', '09:47:12'),
(45, 'destinyadmin', 26, 'addSchedule', '04-25-2023', '08:36:58'),
(46, '', 13, 'registerstudent', '04-25-2023', '17:27:43'),
(47, '', 14, 'registerstudent', '04-25-2023', '17:30:55'),
(48, '', 15, 'fascinating', '04-25-2023', '17:33:02'),
(49, 'student', 16, 'registerstudent', '04-29-2023', '09:16:31'),
(50, 'student', 17, 'registerstudent', '04-29-2023', '09:17:58'),
(51, 'student', 18, 'registerstudent', '04-29-2023', '11:05:03'),
(52, 'student', 19, 'registerstudent', '04-29-2023', '11:11:03'),
(53, 'student', 20, 'registerstudent', '04-29-2023', '11:15:12'),
(54, 'student', 21, 'registerstudent', '04-29-2023', '12:43:34'),
(55, 'student', 22, 'registerstudent', '04-29-2023', '12:46:36'),
(56, 'student', 23, 'registerstudent', '04-29-2023', '12:47:35'),
(57, 'student', 24, 'registerstudent', '04-29-2023', '12:48:23'),
(58, 'student', 25, 'registerstudent', '04-29-2023', '13:09:18'),
(59, 'destinyadmin', 27, 'addSchedule', '04-29-2023', '20:07:19'),
(60, 'destinyadmin', 28, 'addSchedule', '04-29-2023', '20:07:29'),
(61, 'destinyadmin', 6, 'createappointment', '04-29-2023', '20:08:22'),
(62, 'destinyadmin', 6, 'approveappointment', '04-29-2023', '20:08:31'),
(63, 'destinyadmin', 6, 'paidappointment', '04-29-2023', '20:08:43'),
(64, 'destinyadmin', 6, 'passedstudent', '04-29-2023', '20:08:47'),
(65, 'student', 7, 'enrollstudent', '04-29-2023', '20:31:30'),
(66, 'student', 8, 'enrollstudent', '04-29-2023', '21:04:02'),
(67, 'destinyadmin', 7, 'rejectappointment', '04-29-2023', '21:11:40'),
(68, 'destinyadmin', 8, 'rejectappointment', '04-29-2023', '21:11:46'),
(69, 'destinyadmin', 9, 'createappointment', '04-29-2023', '21:15:55'),
(70, 'destinyadmin', 9, 'rejectappointment', '04-29-2023', '21:16:02'),
(71, 'destinyadmin', 10, 'createappointment', '04-29-2023', '21:27:18'),
(72, 'destinyadmin', 10, 'rejectappointment', '04-29-2023', '21:27:26'),
(73, 'destinyadmin', 11, 'createappointment', '04-29-2023', '21:27:53'),
(74, 'destinyadmin', 11, 'rejectappointment', '04-29-2023', '21:28:03'),
(75, 'destinyadmin', 12, 'createappointment', '04-29-2023', '21:28:26'),
(76, 'destinyadmin', 12, 'rejectappointment', '04-29-2023', '21:28:29'),
(77, 'destinyadmin', 13, 'createappointment', '04-29-2023', '21:30:48'),
(78, 'destinyadmin', 14, 'createappointment', '04-29-2023', '21:32:15'),
(79, 'destinyadmin', 14, 'rejectappointment', '04-29-2023', '21:32:20'),
(80, 'destinyadmin', 7, 'deleteappointment', '04-29-2023', '21:32:29'),
(81, 'destinyadmin', 10, 'deleteappointment', '04-29-2023', '21:32:34'),
(82, 'student', 15, 'enrollstudent', '04-29-2023', '21:48:07'),
(83, 'student', 16, 'enrollstudent', '04-29-2023', '21:48:39'),
(84, 'student', 17, 'enrollstudent', '04-29-2023', '21:48:42'),
(85, 'student', 18, 'enrollstudent', '04-29-2023', '21:50:35'),
(86, 'destinyadmin', 18, 'rejectappointment', '04-29-2023', '21:50:54'),
(87, 'student', 19, 'enrollstudent', '04-29-2023', '21:51:50'),
(88, 'destinyadmin', 29, 'addSchedule', '04-29-2023', '22:01:54'),
(89, 'destinyadmin', 30, 'addSchedule', '04-29-2023', '22:02:16'),
(90, 'student', 20, 'enrollstudent', '04-29-2023', '22:03:20'),
(91, 'destinyadmin', 28, 'addinstructor', '04-29-2023', '22:19:24'),
(92, 'destinyadmin', 29, 'addinstructor', '04-29-2023', '22:22:20'),
(93, 'destinyadmin', 29, 'deleteinstructor', '04-29-2023', '22:23:39'),
(94, 'destinyadmin', 30, 'addinstructor', '04-29-2023', '22:24:15'),
(95, 'destinyadmin', 28, 'editinstructor', '04-29-2023', '22:26:15'),
(96, 'destinyadmin', 28, 'editinstructor', '04-29-2023', '22:26:26'),
(97, 'destinyadmin', 28, 'editinstructor', '04-29-2023', '22:26:53'),
(98, 'destinyadmin', 28, 'editinstructor', '04-29-2023', '22:30:33'),
(99, 'destinyadmin', 28, 'editinstructor', '04-29-2023', '22:30:39'),
(100, 'student', 21, 'enrollstudent', '05-01-2023', '17:41:05'),
(101, 'student', 22, 'enrollstudent', '05-01-2023', '17:44:22'),
(102, 'student', 23, 'enrollstudent', '05-01-2023', '17:45:16'),
(103, 'destinyadmin', 19, 'rejectappointment', '05-01-2023', '17:46:21'),
(104, 'destinyadmin', 20, 'rejectappointment', '05-01-2023', '17:46:24'),
(105, 'destinyadmin', 21, 'rejectappointment', '05-01-2023', '17:46:26'),
(106, 'destinyadmin', 22, 'rejectappointment', '05-01-2023', '17:46:30'),
(107, 'destinyadmin', 23, 'rejectappointment', '05-01-2023', '17:46:32'),
(108, 'destinyadmin', 10, 'deleteinstructor', '05-13-2023', '13:49:53'),
(109, 'destinyadmin', 4, 'deleteinstructor', '05-13-2023', '13:50:04'),
(110, 'destinyadmin', 10, 'deleteinstructor', '05-13-2023', '13:50:09'),
(111, 'destinyadmin', 10, 'deleteinstructor', '05-13-2023', '13:50:30'),
(112, 'destinyadmin', 30, 'editinstructor', '05-13-2023', '16:41:42'),
(113, 'destinyadmin', 30, 'editinstructor', '05-13-2023', '16:41:46'),
(114, 'destinyadmin', 25, 'editstudent', '05-13-2023', '16:44:30'),
(115, 'destinyadmin', 25, 'editstudent', '05-13-2023', '16:44:35'),
(116, 'destinyadmin', 30, 'editinstructor', '05-13-2023', '16:48:22'),
(117, 'destinyadmin', 30, 'editinstructor', '05-13-2023', '16:48:25'),
(118, 'destinyadmin', 27, 'editstudent', '05-13-2023', '16:50:44'),
(119, 'destinyadmin', 27, 'editstudent', '05-13-2023', '16:50:48'),
(120, 'destinyadmin', 4, 'updateProfile', '05-13-2023', '16:59:06'),
(121, 'destinyadmin', 4, 'updateProfile', '05-13-2023', '16:59:12'),
(122, 'destinyadmin', 4, 'updateProfile', '05-13-2023', '17:01:55'),
(123, 'destinyadmin', 4, 'updateProfile', '05-13-2023', '17:02:00'),
(124, 'destinyadmin', 4, 'updateAccount', '05-13-2023', '18:15:58'),
(125, 'destinyadmin', 4, 'updateAccount', '05-13-2023', '18:18:47'),
(126, 'destinyadmin', 4, 'updateAccount', '05-13-2023', '18:21:14'),
(127, 'destinyadmin', 4, 'updateAccount', '05-13-2023', '18:22:28'),
(128, 'destinyadmin', 4, 'updateAccount', '05-13-2023', '18:22:30'),
(129, 'destinyadmin', 4, 'updateAccount', '05-13-2023', '18:22:49'),
(130, 'destinyadmin', 31, 'addSchedule', '05-14-2023', '05:42:54'),
(131, 'destinyadmin', 25, 'createappointment', '05-14-2023', '05:46:51'),
(132, 'destinyadmin', 25, 'approveappointment', '05-14-2023', '05:46:54'),
(133, 'mizzymanigque19', 19, 'paidappointment', '05-14-2023', '06:00:28'),
(134, 'mizzymanigque19', 31, 'addinstructor', '05-14-2023', '06:22:40'),
(135, 'mizzymanigque19', 31, 'deleteinstructor', '05-14-2023', '06:31:30'),
(136, 'mizzymanigque19', 32, 'addinstructor', '05-14-2023', '06:31:44'),
(137, 'mizzymanigque19', 32, 'deleteinstructor', '05-14-2023', '06:32:09'),
(138, 'mizzymanigque19', 33, 'addinstructor', '05-14-2023', '06:32:19'),
(139, 'mizzymanigque19', 33, 'deleteinstructor', '05-14-2023', '06:32:28'),
(140, 'mizzymanigque19', 34, 'addinstructor', '05-14-2023', '06:32:59'),
(141, 'mizzymanigque19', 34, 'deleteinstructor', '05-14-2023', '06:35:16'),
(142, 'mizzymanigque19', 35, 'addinstructor', '05-14-2023', '06:35:36'),
(143, 'mizzymanigque19', 35, 'deleteinstructor', '05-14-2023', '06:36:17'),
(144, 'mizzymanigque19', 36, 'addinstructor', '05-14-2023', '06:36:28'),
(145, 'mizzymanigque19', 36, 'deleteinstructor', '05-14-2023', '06:37:02'),
(146, 'mizzymanigque19', 37, 'addinstructor', '05-14-2023', '06:37:11'),
(147, 'mizzymanigque19', 37, 'deleteinstructor', '05-14-2023', '06:38:26'),
(148, 'mizzymanigque19', 38, 'addinstructor', '05-14-2023', '06:38:38'),
(149, 'mizzymanigque19', 38, 'deleteinstructor', '05-14-2023', '06:39:28'),
(150, 'mizzymanigque19', 39, 'addinstructor', '05-14-2023', '06:39:37'),
(151, 'mizzymanigque19', 39, 'deleteinstructor', '05-14-2023', '06:40:35'),
(152, 'mizzymanigque19', 40, 'addinstructor', '05-14-2023', '06:40:47'),
(153, 'cavoyo7720', 40, 'updateAccount', '05-14-2023', '06:42:30'),
(154, 'cavoyo7720', 40, 'updateAccount', '05-14-2023', '06:43:09'),
(155, 'cavoyo7720', 40, 'updateProfile', '05-14-2023', '06:49:23'),
(156, 'mizzymanigque19', 32, 'addSchedule', '05-14-2023', '10:22:39'),
(157, 'mizzymanigque19', 25, 'paidappointment', '05-14-2023', '10:22:55'),
(158, 'mizzymanigque19', 33, 'addSchedule', '05-14-2023', '13:54:37'),
(159, 'mizzymanigque19', 34, 'addSchedule', '05-15-2023', '15:55:51'),
(160, 'destinyadmin', 26, 'createappointment', '05-15-2023', '15:57:51'),
(161, 'destinyadmin', 27, 'createappointment', '05-15-2023', '15:57:57'),
(162, 'destinyadmin', 26, 'approveappointment', '05-15-2023', '15:58:08'),
(163, 'destinyadmin', 27, 'approveappointment', '05-15-2023', '15:58:16'),
(164, 'student', 28, 'enrollstudent', '05-17-2023', '10:01:26'),
(165, 'mizzymanigque19', 26, 'cancelappointment', '05-17-2023', '19:09:56'),
(166, 'mizzymanigque19', 26, 'cancelappointment', '05-17-2023', '19:11:36'),
(167, 'student', 26, 'requestcancellation', '05-17-2023', '19:47:51'),
(168, 'student', 26, 'requestcancellation', '05-17-2023', '19:49:43'),
(169, 'destinyadmin', 25, 'paidappointment', '05-18-2023', '07:09:01'),
(170, 'destinyadmin', 27, 'paidappointment', '05-18-2023', '07:09:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` bigint NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'avatar.jpg',
  `userType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `email`, `number`, `password`, `avatar`, `userType`) VALUES
(4, 'destinyadmin', 'destinydrivingschool@gmail.com', 9763140537, '$2y$10$MkZtXAtg/ERI8KAnqX9Lq.PBnFtCxvR0U2lhcIjKOu8NXKVU4Jw9y', 'https://res.cloudinary.com/ddf34uiqq/image/upload/v1684002151/q2x5j7tzr4lrqbvmheqj.png', 'admin'),
(9, 'mizzymanigque19', 'mizzymanigque19@gmail.com', 9763140537, '$2y$10$7WwfQEeWGhfw8NVhSJOtgu8IBAc0ES9.yCyqBDL6cgXR2yGfTWHNW', 'https://res.cloudinary.com/ddf34uiqq/image/upload/v1682772503/m5voiqwbccmzooxvi8wa.jpg', 'instructor'),
(27, 'fascinating', 'fascinatingact@gmail.com', 9763140537, '$2y$10$7WwfQEeWGhfw8NVhSJOtgu8IBAc0ES9.yCyqBDL6cgXR2yGfTWHNW', 'https://res.cloudinary.com/ddf34uiqq/image/upload/v1682772503/m5voiqwbccmzooxvi8wa.jpg', 'student'),
(30, 'rstodomingo.o2', 'rstodomingo.o2@gmail.com', 9763140537, '$2y$10$5onDrnK4y20ForHbxYU/RuE7Yuo3KlqeqRzvVGeR9Xtn0jKVihIdK', 'https://res.cloudinary.com/ddf34uiqq/image/upload/v1682772503/m5voiqwbccmzooxvi8wa.jpg', 'instructor'),
(40, 'cavoyo7720', 'cavoyo7720@glumark.com', 9763140537, '$2y$10$A6QC64ORXNw3slePNkYEdO.7qiY4t.upafmeu2oFGvArlwMvs0UYm', 'https://res.cloudinary.com/ddf34uiqq/image/upload/v1684046589/ptjuuh3jmukui9jbpt7q.png', 'instructor');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `detail_ID` int NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `suffix` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `zipcode` int NOT NULL,
  `dateofbirth` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `civilstatus` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`detail_ID`, `firstname`, `middlename`, `lastname`, `suffix`, `address`, `zipcode`, `dateofbirth`, `gender`, `civilstatus`, `username`) VALUES
(4, 'Destiny', 'Driving', 'School', '', 'San Miguel Bulacan', 3011, '2023-04-05', 'Male', 'Single', 'destinyadmin'),
(9, 'Mizzy Jenvy', 'Fernandez', 'Manigque', '', 'Bulacann', 3011, '2023-04-06', 'Female', 'Single', 'mizzymanigque19'),
(25, 'John Rey', 'Daano', 'Sto Domingo', '', 'Bulacan', 3011, '2006-11-27', 'Male', 'Single', 'fascinating'),
(28, 'Roel', 'Daano', 'Sto Domingo', '', 'Bulacan', 3011, '1996-03-02', 'Male', 'Single', 'rstodomingo.o2'),
(39, 'Cavoyo', 'Gor', 'Deguz', '', 'A108 Adam Street, New York, NY 535022', 3123, '2023-05-15', 'Male', 'Single', 'cavoyo7720');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointmentID`),
  ADD KEY `usersID` (`studentID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`salesID`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedules_ibfk_1` (`instructorID`);

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
  MODIFY `appointmentID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedbackID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `salesID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `system_reports`
--
ALTER TABLE `system_reports`
  MODIFY `reportsID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `detail_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
