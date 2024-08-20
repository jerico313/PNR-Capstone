-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 28, 2024 at 05:53 AM
-- Server version: 10.6.14-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u794434112_pnr`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verification_code` int(50) NOT NULL,
  `verified` int(10) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `profile_picture` varchar(255) DEFAULT 'default.jpg',
  `wallet` decimal(10,2) DEFAULT 0.00,
  `points` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `firstname`, `lastname`, `email`, `phone`, `password`, `verification_code`, `verified`, `registration_date`, `profile_picture`, `wallet`, `points`) VALUES
(1, 'Marijo', 'Pedian', 'marijopedian0502@gmail.com', '09054153618', '$2y$10$sJau6KazLEfcLucCD.CBB.6L2jPivagXFl.olGs.EqC1N1boPgqcm', 0, 1, '2023-09-22 12:35:52', 'default.jpg', 0.00, 0.00),
(8, 'Carmel', 'Alfonso', 'alfonsocarmel0305@gmail.com', '09123456789', '$2y$10$MLudawWFNPpLAB1RRU/.UexrMTSenoPmAz5O47RjJ6PmkGSGeGX3O', 0, 1, '2023-09-23 11:49:54', 'default.jpg', 0.00, 0.00),
(11, 'Jerico', 'Buncag', 'jericobuncag0@gmail.com', '09471601910', '$2y$10$MnTfGBBqjY3wP9YirSzcFejrOwEXoZjke7YGLvV0.jdElXryoMlJK', 0, 1, '2023-10-13 16:11:37', '11_default.jpg', 920.50, 0.50),
(12, 'Berlyn', 'Toribio', 'berlyn.toribio@gmail.com', '09098765432', '$2y$10$rdPrmDK69bXgG9ZQTtHnpueH..D1L/s7JTVx4p9X5Dw7O8cF4EFqC', 0, 1, '2023-11-11 12:17:04', 'default.jpg', 0.00, 0.00),
(13, 'John Rei', 'Delos reyes', 'rei_delosreyes3@gmail.com', '09246810121', '$2y$10$JBpbRLJ1rCyKQZ3D93jF8.f7TdqWWfL5nNWNII.THRwc682xH66jm', 0, 1, '2023-11-18 09:11:23', 'default.jpg', 170.00, 1.00),
(14, 'Kene', 'Baterina', 'kene.baterina27@gmail.com', '09502329912', '$2y$10$HveMbuYiLJQmnW9/SFrkKeL1alW6sqzDs5E1PNsIzGnp28RANgk06', 0, 0, '2023-11-25 10:44:57', '14_Screenshot (164).png', 443.75, 0.00),
(15, 'Gino', 'Vidal', 'ginovidal.7@gmail.com', '09983357026', '$2y$10$rYc3PXcgJilAcZU4o/NH5.7GfZ8QeoG/a1j2XFY0HXq16ltkrBETm', 0, 1, '2023-11-27 12:04:40', 'default.jpg', 285.00, 0.25),
(16, 'Arren', 'Arizala', 'arrenarizala06@gmail.com', '09081475482', '$2y$10$Op1jxkpRyxsVwdWl3j9rmOCPv4kJv8UBNE61z4lmGVN7NX69Hizpq', 0, 1, '2023-11-27 15:43:14', 'default.jpg', 0.00, 0.00),
(17, 'Camille', 'Madera', 'camsmadera14@gmail.com', '09052508721', '$2y$10$F1HOpGrEgySBdMaasbDWlO6aZ3NVZgXI3rXlSUYiXhTtxekHoXTUW', 0, 1, '2023-11-27 15:43:38', 'default.jpg', 0.00, 0.00),
(18, 'LYKA MAE', 'DILLA', 'dillalykamae07@gmail.com', '0967064451', '$2y$10$ukB8xPaiyTyD2qRGAf3dEO/Rs1FJc1y2pGw0MGG5ijqaaXqRhxiAu', 0, 1, '2023-11-27 15:47:18', 'default.jpg', 50.00, 1.00),
(19, 'Elizabeth', 'Maming', 'elizabethmaming66@gmail.com', '09812782906', '$2y$10$LYF3K7f2AQOnlrha9GItB.cL9RltcqRgQoWhT/ToyXYlhvLPmI/jW', 0, 1, '2023-11-27 16:06:20', 'default.jpg', 0.00, 0.00),
(21, 'Winter', 'Tordecillas', 'asdasdsasad', '09272580996', '$2y$10$YH5xNY4n7cX6iFIqJbQ5GeJkPHwkLodbFZBwRu4udJZweZiGIgwAK', 0, 0, '2023-11-27 16:14:52', 'default.jpg', 0.00, 0.00),
(23, 'Christopher ', 'Buncag', 'cristo@gmail.com', '09369121518', '$2y$10$IwBI..85JS7V6Y7Bfr4G1eHhbIax.gVG8iG.dSep5TRlE/eEQXDuW', 0, 0, '2023-11-28 02:33:51', 'default.jpg', 235.00, 1.00),
(24, 'Leng', 'Olaivar', 'leng_olaivar0@gmail.com', '09094414059', '$2y$10$90f0Jhqu25FWyIor834fpOXiU9bI4Lt3lzP7rRp/ITJHqfAF25AQS', 0, 0, '2023-11-29 04:18:41', 'default.jpg', 258.50, 0.25),
(25, 'Irish Mae', 'Otic', 'irishmaeotic9@gmail.com', '09983872077', '$2y$10$4wOQfJXOBDYjdZXnwKaFnOvVoxiX4WPvd6g7lqAhG6WjqsUkTBjua', 249556, 1, '2023-11-29 11:22:17', 'default.jpg', 288.00, 0.25),
(27, 'Cristopher Gerald', 'Buncag', 'cristophergeraldb@gmai.com', '09614079687', '$2y$10$NuVH/agzWqTENndKrEnApOvwUCyN7V5Ka05faKnMgnYo52FbkLt7.', 97452, 0, '2024-01-02 07:46:40', 'default.jpg', 0.00, 0.00),
(29, 'Christopher ', 'Buncag', 'cristopherbuncag8@gmail.com', '09390000008', '$2y$10$8YxBxRxaYx6cUS3Eptwl.OtX.EC/7htINgjmEXThOIEqFMhrJUMiO', 162854, 0, '2024-01-02 08:04:33', 'default.jpg', 0.00, 0.00),
(32, 'jerico', 'buncag', 'jerico_buncag01@yahoo.com', '09896745231', '$2y$10$4.PVAnqovBKnPD9DWdIka.hwnadj6owy38aMke.I9zeIBtLRCA7gK', 483015, 0, '2024-01-02 08:31:14', 'default.jpg', 0.00, 0.00),
(34, 'Jerico', 'Buncag', 'jericobuncag313@gmail.com', '09050000001', '$2y$10$kf9yOe3jr/EY1oeoQ/3Ese0mcnjV2dW8IZTI7usfbRSWcnJHn3xoG', 907832, 1, '2024-01-03 05:14:18', 'default.jpg', 0.00, 0.00),
(35, 'Aileen', 'Olaivar', 'aileen.olaivar260@gmail.com', '09502329911', '$2y$10$4hI5qNovbv7pcG5Z2sltBeeQ.tAcwZettiXV.enteifBQ5bl2Gbqy', 756093, 1, '2024-01-03 08:15:27', 'default.jpg', 1319.75, 0.25),
(36, 'Juliana Carmel', 'Alfonso', 'alfonsojaycee@gmail.com', '09951190634', '$2y$10$bGbJ6VMVS1tWTllWHXTfKO2JYdHsiBtMqEb9fyDbwUbwUCjLvulx.', 101012, 1, '2024-01-03 14:58:22', 'default.jpg', 285.00, 0.25),
(37, 'Christian', 'Ong', 'yourfetal@gmail.com', '09602429930', '$2y$10$kDuPmP9vxIQFyHGBHpjsGOg5u7FQ4wQ5ZshKPI4YqNUU3Nk3CDaru', 590471, 1, '2024-01-04 02:00:59', 'default.jpg', 0.00, 0.00),
(38, 'Berlyn', 'Toribio', 'berlyntoribio@gmail.com', '09609027729', '$2y$10$KWRY.E6MTdLhv60AhEqgJ.NamFn6VwdsDp07H2JfVAvPzivb/.8PW', 795230, 1, '2024-01-04 13:04:33', 'default.jpg', 488.00, 0.25),
(39, 'Ma. Kyla', 'Capanay', 'kylacapanay0@gmail.com', '09234177984', '$2y$10$wlO2PrvafOGR/w7OthFCoOLrjd/YpI.nfuICYvECRp97FtQs8mqq.', 210349, 1, '2024-01-06 02:40:01', 'default.jpg', 280.00, 0.25),
(40, 'Ejay', 'Magpantay', 'doccaps000@gmail.com', '09089523553', '$2y$10$M69eiKKR5Yb53aonswKBLemK7frOFW97NSls3Z92r9iTsWePptUry', 63957, 1, '2024-01-07 13:03:20', 'default.jpg', 8300.00, 0.00),
(41, 'Jan Maverick', 'Tordecillas', 'janmaverick01@gmail.com', '09995804348', '$2y$10$IZiKSEeQB9PFCPv02/GJLOk0ikR/mOMBoPOd/7m82wMTT1tbnrQ2q', 19368, 1, '2024-01-07 13:42:50', 'default.jpg', 61.00, 0.75),
(42, 'Reeona', 'Dela cruz', 'kleinkestray@gmail.com', '09981517477', '$2y$10$K5AHx5Wb0xKtkUeh80LH/ece2eggU.241H2lOKwPAxPn3dWNalUKO', 463528, 1, '2024-01-08 07:23:02', 'default.jpg', 288.00, 0.25),
(43, 'Paula', 'Evangelista', 'evangelistabeah3@gmail.com', '09064669085', '$2y$10$LG.PZdFbNS9izN58l4NUw.0.tFfrN4M1ECcz67X.3VgPiaJi9uubm', 57436, 1, '2024-01-08 08:00:43', 'default.jpg', 0.00, 0.00),
(44, 'Rei Kristian', 'Panelo', 'reipanelo11@gmail.com', '09222156136', '$2y$10$Rup3bTJer5eTNovntVFZc.aI1yj438CcSUnpTkD90JDHlJwT9rxJa', 531825, 1, '2024-01-08 13:54:32', 'default.jpg', 0.00, 0.00),
(45, 'Jabez Victor', 'Chavez', 'jabezvictor05@gmail.com', '09989258410', '$2y$10$YyWVRAZCwRHx0gxEv7KlgetGL9SiwQgH9sKOrGkMRzLc6KPg/iu9C', 37569, 1, '2024-01-12 01:00:22', 'default.jpg', 285.00, 0.25),
(46, 'John Louise', 'Francisco', 'johnlouisefrancisco95@gmail.com', '09112334760', '$2y$10$qePNw1KySFTE0Lu8mq.LgOnnmRlvnH7/9qJu245BvdfNQH5mthCiW', 326049, 1, '2024-01-12 17:40:33', '46_zhang hao.jpg', 285.00, 0.25),
(47, 'Aileen', 'Olaivar', 'bonjoviolaivar@gmail.com', '09705216409', '$2y$10$/oP0LpE2vx4xyfJjaIHE4em/AxfVa3V1BP8KeLcG3uWpMmbOAtSjq', 957023, 1, '2024-01-13 17:40:13', 'default.jpg', 255.00, 0.75);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `adm_firstname` varchar(50) NOT NULL,
  `adm_lastname` varchar(50) NOT NULL,
  `adm_email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` varchar(255) DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `adm_firstname`, `adm_lastname`, `adm_email`, `password`, `profile_picture`) VALUES
(3, 'PNR', 'Administrator', 'pnradmin2023@gmail.com', '$2y$10$Sccu/EFtmIv85Sg5X2Abhu68FPpmgcSXVP1UFIwqbGFNShXcGr7Ki', '3_default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `alabang`
--

CREATE TABLE `alabang` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alabang`
--

INSERT INTO `alabang` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '05:30 AM', 'Delayed - 10 mins', ' ', 'Northbound'),
(2, '05:57 AM', 'On Time', ' ', 'Northbound'),
(3, '07:23 AM', 'On Time', ' ', 'Northbound'),
(4, '07:53 AM', 'On Time', ' ', 'Northbound'),
(5, '09:03 AM', 'On Time', ' ', 'Northbound'),
(6, '10:03 AM', 'On Time', ' ', 'Northbound'),
(7, '11:03 AM', 'On Time', ' ', 'Northbound'),
(8, '12:13 PM', 'On Time', ' ', 'Northbound'),
(9, '02:28 PM', 'On Time', ' ', 'Northbound'),
(10, '03:53 PM', 'On Time', ' ', 'Northbound'),
(11, '04:53 PM', 'On Time', ' ', 'Northbound'),
(12, '05:53 PM', 'On Time', ' ', 'Northbound'),
(13, '07:16 PM', 'On Time', ' ', 'Northbound'),
(14, '08:03 PM', 'On Time', ' ', 'Northbound'),
(15, '12:30 PM', 'On Time', ' ', 'Northbound');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `announcement_id` int(11) NOT NULL,
  `description` varchar(10000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`announcement_id`, `description`, `created_at`) VALUES
(1, 'ANUNSYO: Ngayong umaga ng January 08, 2024, may byahe ang Philippine National Railways (PNR) sa mga sumusunod na ruta.Laging abangan ang mga updates o maaaring pagbabago sa mga train schedules sa PNR Facebook page. Mag-ingat po tayong lahat. Salamat po.TUTUBAN TO ALABANG -5:06 AM; 6:06 AM; 7:16 AM; 8:16 AM; 9:16 AM; 10:26 AMTUTUBAN TO BICUTAN - 11:26AMALABANG TO TUTUBAN -5:33 AM; 5:57 AM; 7:23 AM; 7:53 AM; 9:03 AM; 10:03 AM; 11:03AM#PNRUpdates #pnrschedtoday #PNR #PhilippineNationalRailways', '2023-10-13 04:50:31');

-- --------------------------------------------------------

--
-- Table structure for table `bicutan`
--

CREATE TABLE `bicutan` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bicutan`
--

INSERT INTO `bicutan` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '06:20 AM', 'On Time', ' ', 'Northbound'),
(2, '07:20 AM', 'On Time', ' ', 'Northbound'),
(3, '08:30 AM', 'On Time', ' ', 'Northbound'),
(4, '09:30 AM', 'On Time', ' ', 'Northbound'),
(5, '10:30 AM', 'On Time', ' ', 'Northbound'),
(7, '11:40 AM', 'On Time', ' ', 'Northbound'),
(8, '01:40 PM', 'On Time', ' ', 'Northbound'),
(9, '03:20 PM', 'On Time', ' ', 'Northbound'),
(10, '04:20 PM', 'On Time', ' ', 'Northbound'),
(11, '05:20 PM', 'On Time', ' ', 'Northbound'),
(12, '06:30 PM', 'On Time', ' ', 'Northbound'),
(13, '07:30 PM', 'On Time', ' ', 'Northbound');

-- --------------------------------------------------------

--
-- Table structure for table `bluementritt`
--

CREATE TABLE `bluementritt` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bluementritt`
--

INSERT INTO `bluementritt` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '07:02 AM', 'On Time', ' ', 'Northbound'),
(2, '07:28 AM', 'On Time', ' ', 'Northbound'),
(3, '08:52 AM', 'On Time', ' ', 'Northbound'),
(4, '09:22 AM', 'On Time', ' ', 'Northbound'),
(5, '10:07 AM', 'On Time', ' ', 'Northbound'),
(6, '10:32 AM', 'On Time', ' ', 'Northbound'),
(7, '11:32 AM', 'On Time', ' ', 'Northbound'),
(8, '12:32 PM', 'On Time', ' ', 'Northbound'),
(9, '01:42 PM', 'On Time', ' ', 'Northbound'),
(10, '02:12 PM', 'On Time', ' ', 'Northbound'),
(11, '03:57 PM', 'On Time', ' ', 'Northbound'),
(12, '05:22 PM', 'On Time', ' ', 'Northbound'),
(13, '06:22 PM', 'On Time', ' ', 'Northbound'),
(14, '07:22 PM', 'On Time', ' ', 'Northbound'),
(15, '08:45 PM', 'On Time', ' ', 'Northbound'),
(16, '09:32 PM', 'On Time', ' ', 'Northbound');

-- --------------------------------------------------------

--
-- Table structure for table `buendia`
--

CREATE TABLE `buendia` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buendia`
--

INSERT INTO `buendia` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '06:21 AM', 'On Time', ' ', 'Northbound'),
(2, '06:45 AM', 'On Time', ' ', 'Northbound'),
(3, '08:11 AM', 'On Time', ' ', 'Northbound'),
(4, '08:41 AM', 'On Time', ' ', 'Northbound'),
(5, '09:51 AM', 'On Time', ' ', 'Northbound'),
(6, '10:51 AM', 'On Time', ' ', 'Northbound'),
(7, '11:51 AM', 'On Time', ' ', 'Northbound'),
(8, '01:31 PM', 'On Time', ' ', 'Northbound'),
(9, '03:16 PM', 'On Time', ' ', 'Northbound'),
(10, '04:41 PM', 'On Time', ' ', 'Northbound'),
(11, '05:41 PM', 'On Time', ' ', 'Northbound'),
(12, '06:41 PM', 'On Time', ' ', 'Northbound'),
(13, '07:18 PM', 'On Time', ' ', 'Northbound'),
(14, '08:04 PM', 'On Time', ' ', 'Northbound'),
(15, '08:51 PM', 'On Time', ' ', 'Northbound');

-- --------------------------------------------------------

--
-- Table structure for table `comments_complaints`
--

CREATE TABLE `comments_complaints` (
  `complaints_id` int(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments_complaints`
--

INSERT INTO `comments_complaints` (`complaints_id`, `name`, `email`, `subject`, `message`, `date`) VALUES
(2, 'Jerico Buncag', 'jericobuncag0@gmail.com', 'Cleanliness of some PNR trains', 'The cleanliness of some PNR trains leaves much to be desired. Passengers deserve a hygienic environment, and I hope the PNR takes steps to improve the cleanliness of their trains.', '2023-11-24 13:42:54');

-- --------------------------------------------------------

--
-- Table structure for table `edsa`
--

CREATE TABLE `edsa` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `edsa`
--

INSERT INTO `edsa` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '06:02 PM', 'On Time', ' ', 'Northbound'),
(2, '07:02 AM', 'On Time', ' ', 'Northbound'),
(3, '08:12 AM', 'On Time', ' ', 'Northbound'),
(4, '08:28 AM', 'On Time', ' ', 'Northbound'),
(5, '09:12 AM', 'On Time', ' ', 'Northbound'),
(6, '10:12 AM', 'On Time', ' ', 'Northbound'),
(7, '11:22 AM', 'On Time', ' ', 'Northbound'),
(8, '12:22 PM', 'On Time', ' ', 'Northbound'),
(9, '01:22 PM', 'On Time', ' ', 'Northbound'),
(10, '03:02 PM', 'On Time', ' ', 'Northbound'),
(11, '04:02 PM', 'On Time', ' ', 'Northbound'),
(12, '05:02 PM', 'On Time', ' ', 'Northbound'),
(13, '06:12 PM', 'On Time', ' ', 'Northbound'),
(14, '06:27 PM', 'On Time', ' ', 'Northbound'),
(15, '07:12 PM', 'On Time', ' ', 'Northbound'),
(16, '08:52 PM', 'On Time', ' ', 'Northbound'),
(17, '09:32 PM', 'On Time', ' ', 'Northbound');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `emp_firstname` varchar(50) NOT NULL,
  `emp_lastname` varchar(50) NOT NULL,
  `emp_email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `profile_picture` varchar(255) DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `emp_firstname`, `emp_lastname`, `emp_email`, `password`, `role`, `profile_picture`) VALUES
(7, 'Dionisio', 'Balabas', 'dionisiobalaba0@gmail.com', '$2y$10$ypSkoFJwRgsBP9eYo0nfbeqGREmuOhl9CQ.2sC3aXTNyCzVTZeHOm', 'Train Operator', 'default.jpg'),
(26, 'Eduardo', 'Tolentino', 'eduardo_tolentino01@gmail.com', '$2y$10$olEodnGawpzbnZeS05g/J.hNlgh/kM9vNftvbxiXpd5ZW8wm687ri', 'Train Operator', 'default.jpg'),
(29, 'Sanny', 'Legaspi', 'sanny.legaspi08@gmail.com', '$2y$10$qVzPrguElf62aA9d7oFRB.U8zZtKmuvK6IxJIPCodA4Gt1it.CkIu', 'Ticket Inspector', 'default.jpg'),
(30, 'Carlito', 'Guarin', 'carlitoguarin05@gmail.com', '$2y$10$Z.Y.TAD82cDvY9KNTScGKOA61y.7aq7vTygBFLbvmXGF6XpY/hhZe', 'Train Operator', 'default.jpg'),
(31, 'Rolando', 'Rodriguez', 'rolando_rodriguez@gmail.com', '$2y$10$9waJL06VLdjMIpqi87axV.GkjDO.ynlaikPKlelTfxgSAcMKGVZTa', 'Train Operator', 'default.jpg'),
(48, 'Lucio', 'Barrera', 'lucio_barerra0@gmail.cpm', '$2y$10$SGMDY0gIeCO/2hhtkBNcSeXu27hAR0LAo5E4smXoa94XmzyDo9ek.', 'Train Operator', 'default.jpg'),
(49, 'Monchito', 'Cababao', 'monchiocababao30@gmail.com', '$2y$10$VJEbJcGixOXa3uqaOx6uWu1YIMzrwN5s2xHiuM0LIlN7SMVr4yUUq', 'Train Operator', 'default.jpg'),
(50, 'Cesario', 'Baratas', 'cesario.baratas05@gmail.com', '$2y$10$OKzpaiOZ9bdFCGtfqSYwWus61rVNj4SaICVgC/hIa5fiLvZBZJWdq', 'Ticket Inspector', 'default.jpg'),
(51, 'Felix', 'Bernarte', 'bernarte_felix1995@gmail.com', '$2y$10$/SNqxeyoypXtKHurXP3nzeKBYMdcJjn0Bi8dtSPKJew3vcXTTC2Ey', 'Train Operator', 'default.jpg'),
(52, 'Juan', 'Bumalay', 'juanbumalay01@gmail.com', '$2y$10$I51sdpUsMp4KM4bw/fVbzu5Ts2VUn5y1PVoehlbNV8ikveNbhMmnO', 'Ticket Inspector', 'default.jpg'),
(53, 'Ronaldo', 'Arizala', 'ronaldoarizala0205@gmail.com', '$2y$10$qHCvvz9XINkJlQ0RhNINK./x7srNkiTg0isIvtbZ3/burqUU700V2', 'Ticket Inspector', 'default.jpg'),
(54, 'Danilo', 'Vidal', 'dani_vidal90@gmail.com', '$2y$10$soUqPbJzXX0LnwocFH9BG.trIonSQFX2h.TrscJCagn.gKipQV.He', 'Train Operator', 'default.jpg'),
(55, 'Edwardo', 'Joaquin', 'edwardojoaquin0819@gmail.com', '$2y$10$vdU1xy0r5s12eVfD1caWmO6yIT9np4Mn20uAX72Ca.fIP9dVn96Ki', 'Train Operator', 'default.jpg'),
(56, 'Jeffrey', 'Verzon', 'verzonjeffrey3@gmail.com', '$2y$10$zBWUiaz79XZs4Jo.qxyM2ecNy8jluTtjJgoQdHH0e/qe8ru2mNjom', 'Train Operator', 'default.jpg'),
(57, 'Robert', 'Bernal', 'robertbernal17@gmail.com', '$2y$10$LBsaELk/REriAQ0pFrtGue6jEjUPCLPrUzxWVKZN5vBwFknwSsQpC', 'Train Operator', 'default.jpg'),
(58, 'Novelino', 'Canoy', 'novelinocanoy1201@gmail.com', '$2y$10$hOoVkx4IlU/lCHn82LlHx.FfKIw4QD5sgjOPxRVssk269G3REKzeW', 'Ticket Inspector', 'default.jpg'),
(59, 'Kris', 'Galangi', 'kris.galangi101290@gmail.com', '$2y$10$FhPeKr4lW1nMyfGlrY5BOOVsmcX.kKsvorI70oC6bxMJUoQSWm2zO', 'Train Operator', 'default.jpg'),
(60, 'Martin', 'Catimbang', 'martincatimbang@gmail.com', '$2y$10$ALqYbcGI8pMfbL4poFJvIuvMwut5vk8o01OICpS/VYfSZp0bzRa2C', 'Ticket Inspector', 'default.jpg'),
(61, 'Gino', 'Latuga', 'ginolatuga92@gmail.com', '$2y$10$p4w/2iph9akYICvTUHreTOW9G6CQWyanaC8ZZ64J84q7ho2Q6E0uW', 'Train Operator', 'default.jpg'),
(62, 'Arthur', 'Cantillo', 'arturocantillo@gmail.com', '$2y$10$eYUID/GKQ/OldgboM9mn9e.RYs6hp5JfIuefZsM4rceuKETslvcWa', 'Ticket Inspector', 'default.jpg'),
(63, 'Gerry ', 'Logronio', 'gerry.Logronio2089@gmail.com', '$2y$10$gT8BOexRyCIjXuIC4xyJyOj9ei6BvCuP8SMHXkH/LI9ULHQM4pd.S', 'Train Operator', 'default.jpg'),
(64, 'Nestor', 'Datahan', 'nestordatahan.1988@gmail.com', '$2y$10$bqhHDCftzW65SRDrjxlwpeCn8nhyMvYvIpi3muEHRBqrBUt7hPviK', 'Train Operator', 'default.jpg'),
(65, 'Tony ', 'Beron', 'tonytonyberon21@gmail.com', '$2y$10$iZ9GdISUZ2CAeTNjhwBn.O9B46STQi0J03kW7zFsyFt0SIo2jtOvW', 'Train Operator', 'default.jpg'),
(66, 'Mike ', 'Gonzales', 'mikegonzales92@gmail.com', '$2y$10$B6OIyan2pffpnvz6.ULTz.0jID2UOmTKUPV/vXj3E.FAjUOlPjsIu', 'Train Operator', 'default.jpg'),
(68, 'Jose', 'Panganiban', 'pangannibanjose42@gmail.com', '$2y$10$HNwQTgKrDZcLYZO0GboQc.q5zJq2NptsZfl7f./emFo.yFsXJBMGS', 'Train Operator', 'default.jpg'),
(69, 'Jodi', 'Garcia', 'jodigarcia@gmail.com', '$2y$10$3pTzE89JD6UTA4nMFDl.Q.Dzc7P97H2Bso9nwTeKB5OgwHJsv7jQu', 'Train Operator', 'default.jpg'),
(70, 'Mateo', 'Abad', 'mabad@gmail.com', '$2y$10$97ztZP7DjmaZsH9.nuz19.FWtzaAucfuSA3V1Og9a0.eULjMLLl06', 'Train Operator', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `españa`
--

CREATE TABLE `españa` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `españa`
--

INSERT INTO `españa` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '05:22 AM', 'On Time', ' ', 'Northbound'),
(2, '06:22 AM', 'On Time', ' ', 'Northbound'),
(3, '07:32 AM', 'On Time', ' ', 'Northbound'),
(4, '08:32 AM', 'On Time', ' ', 'Northbound'),
(5, '10:42 AM', 'On Time', ' ', 'Northbound'),
(6, '12:42 PM', 'On Time', ' ', 'Northbound'),
(7, '02:22 PM', 'On Time', ' ', 'Northbound'),
(8, '05:22 PM', 'On Time', ' ', 'Northbound'),
(9, '06:32 PM', 'On Time', ' ', 'Northbound'),
(10, '08:12 PM', 'On Time', ' ', 'Northbound'),
(11, '08:52 PM', 'On Time', ' ', 'Northbound');

-- --------------------------------------------------------

--
-- Table structure for table `faretable`
--

CREATE TABLE `faretable` (
  `fare_id` int(50) NOT NULL,
  `route` varchar(255) NOT NULL,
  `fare` int(10) NOT NULL,
  `Direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faretable`
--

INSERT INTO `faretable` (`fare_id`, `route`, `fare`, `Direction`) VALUES
(1, 'Alabang - Tutuban', 30, 'Northbound'),
(2, 'Alabang - Blumentritt', 30, 'Northbound'),
(3, 'Alabang - Laon Laan', 25, 'Northbound'),
(4, 'Alabang - España', 25, 'Northbound'),
(5, 'Alabang - Santa Mesa', 25, 'Northbound'),
(6, 'Alabang - Pandacan', 20, 'Northbound'),
(7, 'Alabang - Paco', 20, 'Northbound'),
(8, 'Alabang - San Andres', 20, 'Northbound'),
(9, 'Alabang - Vito Cruz', 20, 'Northbound'),
(10, 'Alabang - Buendia', 20, 'Northbound'),
(11, 'Alabang - Pasay Road', 15, 'Northbound'),
(12, 'Alabang - EDSA', 15, 'Northbound'),
(13, 'Alabang - Nichols', 15, 'Northbound'),
(14, 'Alabang - FTI', 15, 'Northbound'),
(15, 'Alabang - Bicutan', 15, 'Northbound'),
(16, 'Alabang - Sucat', 15, 'Northbound'),
(17, 'Sucat - Tutuban', 25, 'Northbound'),
(18, 'Sucat - Blumentritt', 25, 'Northbound'),
(19, 'Sucat - Laon Laan', 25, 'Northbound'),
(20, 'Sucat - España', 20, 'Northbound'),
(21, 'Sucat - Santa Mesa', 20, 'Northbound'),
(22, 'Sucat - Pandacan', 20, 'Northbound'),
(23, 'Sucat - Paco', 15, 'Northbound'),
(24, 'Sucat - San Andres', 15, 'Northbound'),
(25, 'Sucat - Vito Cruz', 15, 'Northbound'),
(26, 'Sucat - Buendia', 15, 'Northbound'),
(27, 'Sucat - Pasay Road', 15, 'Northbound'),
(28, 'Sucat - EDSA', 15, 'Northbound'),
(29, 'Sucat - Nichols', 15, 'Northbound'),
(30, 'Sucat - FTI', 15, 'Northbound'),
(31, 'Sucat - Bicutan', 15, 'Northbound'),
(32, 'Sucat - Alabang', 15, 'Southbound'),
(33, 'Bicutan - Tutuban', 20, 'Northbound'),
(34, 'Bicutan - Blumentritt', 20, 'Northbound'),
(35, 'Bicutan - Laon Laan', 20, 'Northbound'),
(36, 'Bicutan - España', 20, 'Northbound'),
(37, 'Bicutan - Santa Mesa', 15, 'Northbound'),
(38, 'Bicutan - Pandacan', 15, 'Northbound'),
(39, 'Bicutan - Paco', 15, 'Northbound'),
(40, 'Bicutan - San Andres', 15, 'Northbound'),
(41, 'Bicutan - Vito Cruz', 15, 'Northbound'),
(42, 'Bicutan - Buendia', 15, 'Northbound'),
(43, 'Bicutan - Pasay Road', 15, 'Northbound'),
(44, 'Bicutan - EDSA', 15, 'Northbound'),
(45, 'Bicutan - Nichols', 15, 'Northbound'),
(46, 'Bicutan - FTI', 15, 'Northbound'),
(47, 'Bicutan - Sucat', 15, 'Southbound'),
(48, 'Bicutan - Alabang', 15, 'Southbound'),
(49, 'FTI - Tutuban', 20, 'Northbound'),
(50, 'FTI - Blumentritt', 15, 'Northbound'),
(51, 'FTI - Laon Laan', 15, 'Northbound'),
(52, 'FTI - España', 15, 'Northbound'),
(53, 'FTI - Santa Mesa', 15, 'Northbound'),
(54, 'FTI - Pandacan', 15, 'Northbound'),
(55, 'FTI - Paco', 15, 'Northbound'),
(56, 'FTI - San Andres', 15, 'Northbound'),
(57, 'FTI - Vito Cruz', 15, 'Northbound'),
(58, 'FTI - Buendia', 15, 'Northbound'),
(59, 'FTI - Pasay Road', 15, 'Northbound'),
(60, 'FTI - EDSA', 15, 'Northbound'),
(61, 'FTI - Nichols', 15, 'Northbound'),
(62, 'FTI - Bicutan', 15, 'Southbound'),
(63, 'FTI - Sucat', 15, 'Southbound'),
(64, 'FTI - Alabang', 15, 'Southbound'),
(65, 'Nichols - Tutuban', 20, 'Northbound'),
(66, 'Nichols - Blumentritt', 15, 'Northbound'),
(67, 'Nichols - Laon Laan', 15, 'Northbound'),
(68, 'Nichols - España', 15, 'Northbound'),
(69, 'Nichols - Santa Mesa', 15, 'Northbound'),
(70, 'Nichols - Pandacan', 15, 'Northbound'),
(71, 'Nichols - Paco', 15, 'Northbound'),
(72, 'Nichols - San Andres', 15, 'Northbound'),
(73, 'Nichols - Vito Cruz', 15, 'Northbound'),
(74, 'Nichols - Buendia', 15, 'Northbound'),
(75, 'Nichols - Pasay Road', 15, 'Northbound'),
(76, 'Nichols - EDSA', 15, 'Northbound'),
(77, 'Nichols - FTI', 15, 'Southbound'),
(78, 'Nichols - Bicutan', 15, 'Southbound'),
(79, 'Nichols - Sucat', 15, 'Southbound'),
(80, 'Nichols - Alabang', 15, 'Southbound'),
(81, 'EDSA - Tutuban', 15, 'Northbound'),
(82, 'EDSA - Blumentritt', 15, 'Northbound'),
(83, 'EDSA - Laon Laan', 15, 'Northbound'),
(84, 'EDSA - España', 15, 'Northbound'),
(85, 'EDSA - Santa Mesa', 15, 'Northbound'),
(86, 'EDSA - Pandacan', 15, 'Northbound'),
(87, 'EDSA - Paco', 15, 'Northbound'),
(88, 'EDSA - San Andres', 15, 'Northbound'),
(89, 'EDSA - Vito Cruz', 15, 'Northbound'),
(90, 'EDSA - Buendia', 15, 'Northbound'),
(91, 'EDSA - Pasay Road', 15, 'Northbound'),
(92, 'EDSA - Nichols', 15, 'Southbound'),
(93, 'EDSA - FTI', 15, 'Southbound'),
(94, 'EDSA - Bicutan', 15, 'Southbound'),
(95, 'EDSA - Sucat', 15, 'Southbound'),
(96, 'EDSA - Alabang', 15, 'Southbound'),
(97, 'Pasay Road - Tutuban', 15, 'Northbound'),
(98, 'Pasay Road - Blumentritt', 15, 'Northbound'),
(99, 'Pasay Road - Laon Laan', 15, 'Northbound'),
(100, 'Pasay Road - España', 15, 'Northbound'),
(101, 'Pasay Road - Santa Mesa', 15, 'Northbound'),
(102, 'Pasay Road - Pandacan', 15, 'Northbound'),
(103, 'Pasay Road - Paco', 15, 'Northbound'),
(104, 'Pasay Road - San Andres', 15, 'Northbound'),
(105, 'Pasay Road - Vito Cruz', 15, 'Northbound'),
(106, 'Pasay Road - Buendia', 15, 'Northbound'),
(107, 'Pasay Road - EDSA', 15, 'Southbound'),
(108, 'Pasay Road - Nichols', 15, 'Southbound'),
(109, 'Pasay Road - FTI', 15, 'Southbound'),
(110, 'Pasay Road - Bicutan', 15, 'Southbound'),
(111, 'Pasay Road - Sucat', 15, 'Southbound'),
(112, 'Pasay Road - Alabang', 15, 'Southbound'),
(113, 'Buendia - Tutuban', 15, 'Northbound'),
(114, 'Buendia - Blumentritt', 15, 'Northbound'),
(115, 'Buendia - Laon Laan', 15, 'Northbound'),
(116, 'Buendia - España', 15, 'Northbound'),
(117, 'Buendia - Santa Mesa', 15, 'Northbound'),
(118, 'Buendia - Pandacan', 15, 'Northbound'),
(119, 'Buendia - Paco', 15, 'Northbound'),
(120, 'Buendia - San Andres', 15, 'Northbound'),
(121, 'Buendia - Vito Cruz', 15, 'Northbound'),
(122, 'Buendia - Pasay Road', 15, 'Southbound'),
(123, 'Buendia - EDSA', 15, 'Southbound'),
(124, 'Buendia - Nichols', 15, 'Southbound'),
(125, 'Buendia - FTI', 15, 'Southbound'),
(126, 'Buendia - Bicutan', 15, 'Southbound'),
(127, 'Buendia - Sucat', 15, 'Southbound'),
(128, 'Buendia - Alabang', 20, 'Southbound'),
(129, 'Vito Cruz - Tutuban', 15, 'Northbound'),
(130, 'Vito Cruz - Blumentritt', 15, 'Northbound'),
(131, 'Vito Cruz - Laon Laan', 15, 'Northbound'),
(132, 'Vito Cruz - España', 15, 'Northbound'),
(133, 'Vito Cruz - Santa Mesa', 15, 'Northbound'),
(134, 'Vito Cruz - Pandacan', 15, 'Northbound'),
(135, 'Vito Cruz - Paco', 15, 'Northbound'),
(136, 'Vito Cruz - San Andres', 15, 'Northbound'),
(137, 'Vito Cruz - Buendia', 15, 'Southbound'),
(138, 'Vito Cruz - Pasay Road', 15, 'Southbound'),
(139, 'Vito Cruz - EDSA', 15, 'Southbound'),
(140, 'Vito Cruz - Nichols', 15, 'Southbound'),
(141, 'Vito Cruz - FTI', 15, 'Southbound'),
(142, 'Vito Cruz - Bicutan', 15, 'Southbound'),
(143, 'Vito Cruz - Sucat', 15, 'Southbound'),
(144, 'Vito Cruz - Alabang', 20, 'Southbound'),
(145, 'San Andres - Tutuban', 15, 'Northbound'),
(146, 'San Andres - Blumentritt', 15, 'Northbound'),
(147, 'San Andres - Laon Laan', 15, 'Northbound'),
(148, 'San Andres - España', 15, 'Northbound'),
(149, 'San Andres - Santa Mesa', 15, 'Northbound'),
(150, 'San Andres - Pandacan', 15, 'Northbound'),
(151, 'San Andres - Paco', 15, 'Northbound'),
(152, 'San Andres - Vito Cruz', 15, 'Southbound'),
(153, 'San Andres - Buendia', 15, 'Southbound'),
(154, 'San Andres - Pasay Road', 15, 'Southbound'),
(155, 'San Andres - EDSA', 15, 'Southbound'),
(156, 'San Andres - Nichols', 15, 'Southbound'),
(157, 'San Andres - FTI', 15, 'Southbound'),
(158, 'San Andres - Bicutan', 15, 'Southbound'),
(159, 'San Andres - Sucat', 15, 'Southbound'),
(160, 'San Andres - Alabang', 20, 'Southbound'),
(161, 'Paco - Tutuban', 15, 'Northbound'),
(162, 'Paco - Blumentritt', 15, 'Northbound'),
(163, 'Paco - Laon Laan', 15, 'Northbound'),
(164, 'Paco - España', 15, 'Northbound'),
(165, 'Paco - Santa Mesa', 15, 'Northbound'),
(166, 'Paco - Pandacan', 15, 'Northbound'),
(167, 'Paco - San Andres', 15, 'Southbound'),
(168, 'Paco - Vito Cruz', 15, 'Southbound'),
(169, 'Paco - Buendia', 15, 'Southbound'),
(170, 'Paco - Pasay Road', 15, 'Southbound'),
(171, 'Paco - EDSA', 15, 'Southbound'),
(172, 'Paco - Nichols', 15, 'Southbound'),
(173, 'Paco - FTI', 15, 'Southbound'),
(174, 'Paco - Bicutan', 15, 'Southbound'),
(175, 'Paco - Sucat', 15, 'Southbound'),
(176, 'Paco - Alabang', 20, 'Southbound'),
(177, 'Pandacan - Tutuban', 15, 'Northbound'),
(178, 'Pandacan - Blumentritt', 15, 'Northbound'),
(179, 'Pandacan - Laon Laan', 15, 'Northbound'),
(180, 'Pandacan - España', 15, 'Northbound'),
(181, 'Pandacan - Santa Mesa', 15, 'Northbound'),
(182, 'Pandacan - Paco', 15, 'Southbound'),
(183, 'Pandacan - San Andres', 15, 'Southbound'),
(184, 'Pandacan - Vito Cruz', 15, 'Southbound'),
(185, 'Pandacan - Buendia', 15, 'Southbound'),
(186, 'Pandacan - Pasay Road', 15, 'Southbound'),
(187, 'Pandacan - EDSA', 15, 'Southbound'),
(188, 'Pandacan - Nichols', 15, 'Southbound'),
(189, 'Pandacan - FTI', 15, 'Southbound'),
(190, 'Pandacan - Bicutan', 15, 'Southbound'),
(191, 'Pandacan - Sucat', 20, 'Southbound'),
(192, 'Pandacan - Alabang', 20, 'Southbound'),
(193, 'Santa Mesa - Tutuban', 15, 'Northbound'),
(194, 'Santa Mesa - Blumentritt', 15, 'Northbound'),
(195, 'Santa Mesa - Laon Laan', 15, 'Northbound'),
(196, 'Santa Mesa - España', 15, 'Northbound'),
(197, 'Santa Mesa - Pandacan', 15, 'Southbound'),
(198, 'Santa Mesa - Paco', 15, 'Southbound'),
(199, 'Santa Mesa - San Andres', 15, 'Southbound'),
(200, 'Santa Mesa - Vito Cruz', 15, 'Southbound'),
(201, 'Santa Mesa - Buendia', 15, 'Southbound'),
(202, 'Santa Mesa - Pasay Road', 15, 'Southbound'),
(203, 'Santa Mesa - EDSA', 15, 'Southbound'),
(204, 'Santa Mesa - Nichols', 15, 'Southbound'),
(205, 'Santa Mesa - FTI', 15, 'Southbound'),
(206, 'Santa Mesa - Bicutan', 15, 'Southbound'),
(207, 'Santa Mesa - Sucat', 20, 'Southbound'),
(208, 'Santa Mesa - Alabang', 25, 'Southbound'),
(209, 'España - Tutuban', 15, 'Northbound'),
(210, 'España - Blumentritt', 15, 'Northbound'),
(211, 'España - Laon Laan', 15, 'Northbound'),
(212, 'España - Santa Mesa', 15, 'Southbound'),
(213, 'España - Pandacan', 15, 'Southbound'),
(214, 'España - Paco', 15, 'Southbound'),
(215, 'España - San Andres', 15, 'Southbound'),
(216, 'España - Vito Cruz', 15, 'Southbound'),
(217, 'España - Buendia', 15, 'Southbound'),
(218, 'España - Pasay Road', 15, 'Southbound'),
(219, 'España - EDSA', 15, 'Southbound'),
(220, 'España - Nichols', 15, 'Southbound'),
(221, 'España - FTI', 15, 'Southbound'),
(222, 'España - Bicutan', 20, 'Southbound'),
(223, 'España - Sucat', 20, 'Southbound'),
(224, 'España - Alabang', 25, 'Southbound'),
(225, 'Laon Laan - Tutuban', 15, 'Northbound'),
(226, 'Laon Laan - Blumentritt', 15, 'Northbound'),
(227, 'Laon Laan - España', 15, 'Southbound'),
(228, 'Laon Laan - Santa Mesa', 15, 'Southbound'),
(229, 'Laon Laan - Pandacan', 15, 'Southbound'),
(230, 'Laon Laan - Paco', 15, 'Southbound'),
(231, 'Laon Laan - San Andres', 15, 'Southbound'),
(232, 'Laon Laan - Vito Cruz', 15, 'Southbound'),
(233, 'Laon Laan - Buendia', 15, 'Southbound'),
(234, 'Laon Laan - Pasay Road', 15, 'Southbound'),
(235, 'Laon Laan - EDSA', 15, 'Southbound'),
(236, 'Laon Laan - Nichols', 15, 'Southbound'),
(237, 'Laon Laan - FTI', 15, 'Southbound'),
(238, 'Laon Laan - Bicutan', 20, 'Southbound'),
(239, 'Laon Laan - Sucat', 25, 'Southbound'),
(240, 'Laon Laan - Alabang', 25, 'Southbound'),
(241, 'Blumentritt - Tutuban', 15, 'Northbound'),
(242, 'Blumentritt - Laon Laan', 15, 'Southbound'),
(243, 'Blumentritt - España', 15, 'Southbound'),
(244, 'Blumentritt - Santa Mesa', 15, 'Southbound'),
(245, 'Blumentritt - Pandacan', 15, 'Southbound'),
(246, 'Blumentritt - Paco', 15, 'Southbound'),
(247, 'Blumentritt - San Andres', 15, 'Southbound'),
(248, 'Blumentritt - Vito Cruz', 15, 'Southbound'),
(249, 'Blumentritt - Buendia', 15, 'Southbound'),
(250, 'Blumentritt - Pasay Road', 15, 'Southbound'),
(251, 'Blumentritt - EDSA', 15, 'Southbound'),
(252, 'Blumentritt - Nichols', 15, 'Southbound'),
(253, 'Blumentritt - FTI', 15, 'Southbound'),
(254, 'Blumentritt - Bicutan', 20, 'Southbound'),
(255, 'Blumentritt - Sucat', 25, 'Southbound'),
(256, 'Blumentritt - Alabang', 30, 'Southbound'),
(257, 'Tutuban - Blumentritt', 15, 'Southbound'),
(258, 'Tutuban - Laon Laan', 15, 'Southbound'),
(259, 'Tutuban - España', 15, 'Southbound'),
(260, 'Tutuban - Santa Mesa', 15, 'Southbound'),
(261, 'Tutuban - Pandacan', 15, 'Southbound'),
(262, 'Tutuban - Paco', 15, 'Southbound'),
(263, 'Tutuban - San Andres', 15, 'Southbound'),
(264, 'Tutuban - Vito Cruz', 15, 'Southbound'),
(265, 'Tutuban - Buendia', 15, 'Southbound'),
(266, 'Tutuban - Pasay Road', 15, 'Southbound'),
(267, 'Tutuban - EDSA', 15, 'Southbound'),
(268, 'Tutuban - Nichols', 20, 'Southbound'),
(269, 'Tutuban - FTI', 20, 'Southbound'),
(270, 'Tutuban - Bicutan', 20, 'Southbound'),
(271, 'Tutuban - Sucat', 25, 'Southbound'),
(272, 'Tutuban - Alabang', 30, 'Southbound'),
(279, 'Alabang - Calamba', 40, 'Northbound');

-- --------------------------------------------------------

--
-- Table structure for table `fti`
--

CREATE TABLE `fti` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fti`
--

INSERT INTO `fti` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '06:15 AM', 'On Time', ' ', 'Northbound'),
(2, '07:15 AM', 'On Time', ' ', 'Northbound'),
(3, '08:25 AM', 'On Time', ' ', 'Northbound'),
(4, '09:25 AM', 'On Time', ' ', 'Northbound'),
(5, '09:41 AM', 'On Time', ' ', 'Northbound'),
(6, '10:25 AM', 'On Time', ' ', 'Northbound'),
(7, '11:35 AM', 'On Time', ' ', 'Northbound'),
(8, '12:35 PM', 'On Time', ' ', 'Northbound'),
(9, '01:35 PM', 'On Time', ' ', 'Northbound'),
(10, '03:15 PM', 'On Time', ' ', 'Northbound'),
(11, '04:15 PM', 'On Time', ' ', 'Northbound'),
(12, '05:15 PM', 'On Time', ' ', 'Northbound'),
(13, '06:25 PM', 'On Time', ' ', 'Northbound'),
(14, '06:40 PM', 'On Time', ' ', 'Northbound'),
(15, '07:25 PM', 'On Time', ' ', 'Northbound'),
(16, '09:05 PM', 'On Time', ' ', 'Northbound'),
(17, '09:45 PM', 'On Time', ' ', 'Northbound');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `inquiry_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`name`, `email`, `subject`, `message`, `date`, `inquiry_id`) VALUES
('Jerico Buncag', 'jericobuncag313@gmail.com', 'Inquiry about Philippine National Railways Services', 'Are there any special services or accommodations for passengers with disabilities?', '2023-11-24 13:15:47', 3);

-- --------------------------------------------------------

--
-- Table structure for table `laonlaan`
--

CREATE TABLE `laonlaan` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laonlaan`
--

INSERT INTO `laonlaan` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '05:46 AM', 'On Time', ' ', 'Northbound'),
(2, '06:46 AM', 'On Time', ' ', 'Northbound'),
(3, '07:16 AM', 'On Time', ' ', 'Northbound'),
(4, '08:16 AM', 'On Time', ' ', 'Northbound'),
(5, '09:16 AM', 'On Time', ' ', 'Northbound'),
(6, '10:16 AM', 'On Time', ' ', 'Northbound'),
(7, '11:16 AM', 'On Time', ' ', 'Northbound'),
(8, '12:16 PM', 'On Time', ' ', 'Northbound'),
(9, '01:16 PM', 'On Time', ' ', 'Northbound'),
(10, '02:16 PM', 'On Time', ' ', 'Northbound'),
(11, '03:16 PM', 'On Time', ' ', 'Northbound'),
(12, '04:06 PM', 'On Time', ' ', 'Northbound'),
(13, '04:46 PM', 'On Time', ' ', 'Northbound'),
(14, '05:46 PM', 'On Time', ' ', 'Northbound'),
(15, '06:46 PM', 'On Time', ' ', 'Northbound'),
(16, '07:26 PM', 'On Time', ' ', 'Northbound');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `timestamp` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `employee_id`, `latitude`, `longitude`, `timestamp`) VALUES
(1, 7, 14.60797440, 121.05809920, '2023-11-25 11:54:56'),
(2, 7, 14.60797440, 121.05809920, '2023-11-25 11:55:10'),
(3, 7, 14.61267170, 121.05068770, '2023-11-25 11:57:24'),
(4, 7, 14.60797440, 121.05809920, '2023-11-25 11:58:22'),
(5, 7, 14.60797440, 121.05809920, '2023-11-25 11:58:52'),
(6, 7, 14.60797440, 121.05809920, '2023-11-25 14:37:18'),
(7, 7, 14.61267610, 121.05068950, '2023-11-25 14:38:28'),
(8, 7, 14.61265820, 121.05067560, '2023-11-25 14:42:15'),
(9, 7, 14.60797440, 121.05809920, '2023-11-25 10:44:17'),
(10, 7, 14.61138530, 120.97304409, '2023-11-25 10:47:38'),
(11, 26, 14.55472900, 121.02444520, '2023-11-27 17:43:40'),
(12, 26, 14.54990543, 121.01218336, '2023-11-27 17:44:50'),
(13, 26, 14.55472900, 121.02444520, '2023-11-28 15:20:13'),
(14, 26, 14.55472900, 121.02444520, '2023-11-28 15:23:13'),
(15, 26, 14.55472900, 121.02444520, '2023-11-28 15:24:45'),
(16, 26, 14.55472900, 121.02444520, '2023-11-28 15:27:30'),
(17, 26, 14.55472900, 121.02444520, '2023-11-28 15:28:24'),
(18, 26, 14.46539868, 121.05234232, '2023-11-28 15:30:01'),
(19, 26, 14.55472900, 121.02444520, '2023-11-28 15:59:48'),
(20, 26, 14.54287167, 121.00010886, '2023-11-28 22:48:10'),
(21, 26, 14.54285381, 121.00007826, '2023-11-28 22:48:30'),
(22, 26, 14.54744380, 120.99870587, '2023-11-28 22:52:01'),
(23, 26, 14.54756400, 120.99865398, '2023-11-28 22:54:23'),
(24, 26, 14.54756400, 120.99865398, '2023-11-28 22:54:38'),
(25, 26, 14.54756400, 120.99865398, '2023-11-28 22:54:54'),
(26, 26, 14.55401472, 120.99716127, '2023-11-28 22:58:00'),
(27, 26, 14.55410085, 120.99716840, '2023-11-28 22:58:15'),
(28, 26, 14.55413169, 120.99716043, '2023-11-28 22:58:38'),
(29, 26, 14.57019061, 120.99159525, '2023-11-28 23:02:14'),
(30, 26, 14.57018565, 120.99159751, '2023-11-28 23:02:34'),
(31, 26, 14.58166472, 121.00139702, '2023-11-28 23:05:31'),
(32, 26, 14.55226880, 121.02205440, '2023-11-29 01:52:39'),
(33, 26, 14.55226880, 121.02205440, '2023-11-29 01:53:43'),
(34, 26, 14.55226880, 121.02205440, '2023-11-29 01:54:07'),
(35, 26, 14.55226880, 121.02205440, '2023-11-29 01:54:41'),
(36, 26, 14.59680860, 121.01088755, '2023-11-29 01:57:20'),
(37, 26, 14.59682586, 121.01074355, '2023-11-29 01:57:42'),
(38, 26, 14.59682674, 121.01076090, '2023-11-29 01:58:04'),
(39, 26, 14.58166472, 121.00139702, '2023-11-29 01:58:22'),
(40, 26, 14.59658109, 121.01065699, '2023-11-29 04:37:14'),
(41, 26, 14.59658740, 121.01065760, '2023-11-29 04:38:53'),
(42, 26, 14.59726750, 121.01350895, '2023-11-29 04:50:42'),
(43, 7, 14.62763520, 121.06792960, '2024-01-13 14:28:22'),
(44, 7, 14.62763520, 121.06792960, '2024-01-13 14:28:40'),
(45, 7, 14.62763520, 121.06792960, '2024-01-13 14:35:13'),
(46, 7, 14.62198780, 121.06718680, '2024-01-13 14:40:38'),
(47, 7, 14.62261025, 120.98350000, '2024-01-13 14:44:41'),
(48, 51, 14.54966122, 121.01217827, '2024-01-14 09:04:35'),
(49, 64, 14.57325332, 120.99944582, '2024-01-14 09:04:35'),
(50, 26, 14.54390652, 121.00430369, '2024-01-14 23:27:53'),
(51, 26, 14.54390652, 121.00430369, '2024-01-14 23:28:11'),
(52, 26, 14.54390652, 121.00430369, '2024-01-14 23:28:31'),
(53, 26, 14.54981528, 121.01168893, '2024-01-14 23:49:37'),
(54, 26, 14.54980530, 121.01178536, '2024-01-14 23:49:56'),
(55, 26, 14.54969661, 121.01208421, '2024-01-14 23:50:16'),
(56, 26, 14.54986073, 121.01166729, '2024-01-14 23:50:36'),
(57, 26, 14.54983004, 121.01166256, '2024-01-14 23:50:56'),
(58, 26, 14.55075012, 121.01166269, '2024-01-15 00:12:47'),
(59, 26, 14.55150889, 121.01116950, '2024-01-15 00:12:54'),
(60, 26, 14.55466714, 121.00957603, '2024-01-15 00:13:45'),
(61, 26, 14.55466714, 121.00957603, '2024-01-15 00:13:54'),
(62, 26, 14.55607000, 121.00840000, '2024-01-15 00:14:16'),
(63, 26, 14.55607000, 121.00840000, '2024-01-15 00:14:36'),
(64, 26, 14.55607000, 121.00840000, '2024-01-15 00:14:56'),
(65, 26, 14.55658177, 121.00844146, '2024-01-15 00:16:01'),
(66, 26, 14.55683402, 121.00753615, '2024-01-15 00:16:23'),
(67, 26, 14.56092053, 121.00659409, '2024-01-15 00:17:52'),
(68, 26, 14.56216960, 121.00595026, '2024-01-15 00:18:11'),
(69, 26, 14.56323186, 121.00438407, '2024-01-15 00:18:32'),
(70, 26, 14.56484569, 121.00402102, '2024-01-15 00:18:52'),
(71, 26, 14.56585038, 121.00325598, '2024-01-15 00:19:12'),
(72, 26, 14.56661829, 121.00301783, '2024-01-15 00:19:32'),
(73, 26, 14.56663299, 121.00310609, '2024-01-15 00:19:52'),
(74, 26, 14.57293937, 120.99963611, '2024-01-15 00:23:45'),
(75, 26, 14.57293429, 120.99965709, '2024-01-15 00:23:54'),
(76, 26, 14.57294554, 120.99957577, '2024-01-15 00:24:15'),
(77, 26, 14.57322643, 120.99900356, '2024-01-15 00:24:35'),
(78, 26, 14.57401497, 120.99895729, '2024-01-15 00:24:56'),
(79, 26, 14.57482552, 120.99834487, '2024-01-15 00:25:15'),
(80, 26, 14.57617514, 120.99842293, '2024-01-15 00:25:35'),
(81, 26, 14.57684650, 120.99758332, '2024-01-15 00:25:55'),
(82, 26, 14.57872000, 120.99861000, '2024-01-15 00:26:15'),
(83, 26, 14.57872000, 120.99861000, '2024-01-15 00:26:35'),
(84, 26, 14.57876783, 120.99893016, '2024-01-15 00:26:55'),
(85, 26, 14.57874798, 120.99879033, '2024-01-15 00:27:15'),
(86, 26, 14.57872669, 120.99876253, '2024-01-15 00:27:35'),
(87, 26, 14.57874798, 120.99879033, '2024-01-15 00:27:55'),
(88, 26, 14.57975103, 120.99917002, '2024-01-15 00:28:15'),
(89, 26, 14.58016579, 121.00060826, '2024-01-15 00:28:35'),
(90, 26, 14.58053244, 121.00036873, '2024-01-15 00:28:41'),
(91, 26, 14.58085326, 121.00046118, '2024-01-15 00:28:55'),
(92, 26, 14.58256710, 121.00199109, '2024-01-15 00:29:15'),
(93, 26, 14.58313880, 121.00288804, '2024-01-15 00:29:35'),
(94, 26, 14.58377000, 121.00239000, '2024-01-15 00:29:55'),
(95, 26, 14.58476880, 121.00385247, '2024-01-15 00:30:15'),
(96, 26, 14.58871425, 121.00754112, '2024-01-15 00:31:47'),
(97, 26, 14.58937074, 121.00802409, '2024-01-15 00:32:06'),
(98, 26, 14.59068063, 121.00922540, '2024-01-15 00:33:36'),
(99, 26, 14.59107042, 121.00952789, '2024-01-15 00:33:56'),
(100, 26, 14.59191884, 121.01003957, '2024-01-15 00:34:14'),
(101, 26, 14.59295603, 121.01117718, '2024-01-15 00:34:36'),
(102, 26, 14.59345709, 121.01134133, '2024-01-15 00:34:44'),
(103, 26, 14.59370847, 121.01166671, '2024-01-15 00:34:56'),
(104, 26, 14.59500706, 121.01264523, '2024-01-15 00:35:16'),
(105, 26, 14.59635294, 121.01287956, '2024-01-15 00:35:36'),
(106, 26, 14.59679033, 121.01309886, '2024-01-15 00:35:56'),
(107, 26, 14.59827053, 121.01341792, '2024-01-15 00:36:16'),
(108, 26, 14.59865362, 121.01258598, '2024-01-15 00:36:36'),
(109, 26, 14.59950263, 121.01202542, '2024-01-15 00:36:56'),
(110, 26, 14.59989833, 121.01130595, '2024-01-15 00:37:16'),
(111, 26, 14.59990520, 121.01127814, '2024-01-15 00:37:36'),
(112, 26, 14.60024733, 121.01133257, '2024-01-15 00:37:45'),
(113, 26, 14.59995706, 121.01126588, '2024-01-15 00:37:56'),
(114, 26, 14.59997348, 121.01126324, '2024-01-15 00:40:39'),
(115, 26, 14.59997348, 121.01126324, '2024-01-15 00:40:46'),
(116, 26, 14.60011909, 121.01123609, '2024-01-15 00:41:00'),
(117, 26, 14.60084830, 121.01007988, '2024-01-15 00:41:19'),
(118, 26, 14.60095438, 121.01017187, '2024-01-15 00:41:40'),
(119, 26, 14.60107599, 121.00991107, '2024-01-15 00:41:59'),
(120, 64, 14.57474215, 120.99871092, '2024-02-10 05:48:59');

-- --------------------------------------------------------

--
-- Table structure for table `nichols`
--

CREATE TABLE `nichols` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nichols`
--

INSERT INTO `nichols` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '06:08 AM', 'On Time', ' ', 'Northbound'),
(2, '07:08 AM', 'On Time', ' ', 'Northbound'),
(3, '08:18 AM', 'On Time', ' ', 'Northbound'),
(4, '08:34 AM', 'On Time', ' ', 'Northbound'),
(5, '09:18 AM', 'On Time', ' ', 'Northbound'),
(6, '10:18 AM', 'On Time', ' ', 'Northbound'),
(7, '11:28 AM', 'On Time', ' ', 'Northbound'),
(8, '12:28 PM', 'On Time', ' ', 'Northbound'),
(9, '01:28 PM', 'On Time', ' ', 'Northbound'),
(10, '03:08 PM', 'On Time', ' ', 'Northbound'),
(11, '04:08 PM', 'On Time', ' ', 'Northbound'),
(12, '05:08 PM', 'On Time', ' ', 'Northbound'),
(13, '06:18 PM', 'On Time', ' ', 'Northbound'),
(14, '06:34 PM', 'On Time', ' ', 'Northbound'),
(15, '07:18 PM', 'On Time', ' ', 'Northbound'),
(16, '08:58 PM', 'On Time', ' ', 'Northbound'),
(17, '09:38 PM', 'On Time', ' ', 'Northbound');

-- --------------------------------------------------------

--
-- Table structure for table `paco`
--

CREATE TABLE `paco` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paco`
--

INSERT INTO `paco` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '05:40 AM', 'On Time', ' ', 'Northbound'),
(2, '06:40 AM', 'On Time', ' ', 'Northbound'),
(3, '07:50 AM', 'On Time', ' ', 'Northbound'),
(4, '08:50 AM', 'On Time', ' ', 'Northbound'),
(5, '09:50 AM', 'On Time', ' ', 'Northbound'),
(6, '11:00 AM', 'On Time', ' ', 'Northbound'),
(7, '01:00 PM', 'On Time', ' ', 'Northbound'),
(8, '02:40 PM', 'On Time', ' ', 'Northbound'),
(9, '03:40 PM', 'On Time', ' ', 'Northbound'),
(10, '04:40 PM', 'On Time', ' ', 'Northbound'),
(11, '05:50 PM', 'On Time', ' ', 'Northbound'),
(12, '06:50 PM', 'On Time', ' ', 'Northbound'),
(13, '08:30 PM', 'On Time', ' ', 'Northbound'),
(14, '09:10 PM', 'On Time', ' ', 'Northbound');

-- --------------------------------------------------------

--
-- Table structure for table `pandacan`
--

CREATE TABLE `pandacan` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pandacan`
--

INSERT INTO `pandacan` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '05:34 AM', 'On Time', ' ', 'Northbound'),
(2, '06:34 AM', 'On Time', ' ', 'Northbound'),
(3, '07:44 AM', 'On Time', ' ', 'Northbound'),
(4, '08:44 AM', 'On Time', ' ', 'Northbound'),
(5, '09:44 AM', 'On Time', ' ', 'Northbound'),
(6, '10:54 AM', 'On Time', ' ', 'Northbound'),
(7, '12:54 PM', 'On Time', ' ', 'Northbound'),
(8, '02:34 PM', 'On Time', ' ', 'Northbound'),
(9, '03:34 PM', 'On Time', ' ', 'Northbound'),
(10, '04:34 PM', 'On Time', ' ', 'Northbound'),
(11, '05:44 PM', 'On Time', ' ', 'Northbound'),
(12, '06:44 PM', 'On Time', ' ', 'Northbound'),
(13, '09:04 PM', 'On Time', ' ', 'Northbound');

-- --------------------------------------------------------

--
-- Table structure for table `pasayroad`
--

CREATE TABLE `pasayroad` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasayroad`
--

INSERT INTO `pasayroad` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '05:57 AM', 'On Time', ' ', 'Northbound'),
(2, '06:57 AM', 'On Time', ' ', 'Northbound'),
(3, '08:07 AM', 'On Time', ' ', 'Northbound'),
(4, '08:23 AM', 'On Time', ' ', 'Northbound'),
(5, '09:07 AM', 'On Time', ' ', 'Northbound'),
(6, '10:07 AM', 'On Time', ' ', 'Northbound'),
(7, '11:17 AM', 'On Time', ' ', 'Northbound'),
(8, '12:17 PM', 'On Time', ' ', 'Northbound'),
(9, '01:17 PM', 'On Time', ' ', 'Northbound'),
(10, '02:57 PM', 'On Time', ' ', 'Northbound'),
(11, '03:57 PM', 'On Time', ' ', 'Northbound'),
(12, '04:57 PM', 'On Time', ' ', 'Northbound'),
(13, '06:07 PM', 'On Time', ' ', 'Northbound'),
(14, '06:22 PM', 'On Time', ' ', 'Northbound'),
(15, '07:07 PM', 'On Time', ' ', 'Northbound'),
(16, '08:47 PM', 'On Time', ' ', 'Northbound'),
(17, '09:27 PM', 'On Time', ' ', 'Northbound');

-- --------------------------------------------------------

--
-- Table structure for table `sanandres`
--

CREATE TABLE `sanandres` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanandres`
--

INSERT INTO `sanandres` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '05:44 AM', 'On Time', ' ', 'Northbound'),
(2, '06:44 AM', 'On Time', ' ', 'Northbound'),
(3, '07:54 AM', 'On Time', ' ', 'Northbound'),
(4, '08:54 AM', 'On Time', ' ', 'Northbound'),
(5, '09:54 AM', 'On Time', ' ', 'Northbound'),
(6, '11:04 AM', 'On Time', ' ', 'Northbound'),
(7, '01:04 PM', 'On Time', ' ', 'Northbound'),
(8, '02:44 AM', 'On Time', ' ', 'Northbound'),
(9, '03:44 PM', 'On Time', ' ', 'Northbound'),
(10, '04:44 PM', 'On Time', ' ', 'Northbound'),
(11, '05:54 PM', 'On Time', ' ', 'Northbound'),
(12, '06:54 PM', 'On Time', ' ', 'Northbound');

-- --------------------------------------------------------

--
-- Table structure for table `santamesa`
--

CREATE TABLE `santamesa` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `santamesa`
--

INSERT INTO `santamesa` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '05:30 AM', 'On Time', ' ', 'Northbound'),
(2, '06:30 AM', 'On Time', ' ', 'Northbound'),
(3, '07:40 AM', 'On Time', ' ', 'Northbound'),
(4, '08:40 AM', 'On Time', ' ', 'Northbound'),
(5, '09:40 AM', 'On Time', ' ', 'Northbound'),
(6, '10:50 AM', 'On Time', ' ', 'Northbound'),
(7, '12:50 PM', 'On Time', ' ', 'Northbound'),
(8, '02:30 PM', 'On Time', ' ', 'Northbound'),
(9, '03:30 PM', 'On Time', ' ', 'Northbound'),
(10, '04:30 PM', 'On Time', ' ', 'Southbound'),
(11, '05:40 PM', 'On Time', ' ', 'Northbound'),
(12, '06:40 PM', 'On Time', ' ', 'Northbound'),
(13, '09:00 PM', 'On Time', ' ', 'Northbound');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `slider_id` int(11) NOT NULL,
  `slider_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`slider_id`, `slider_image`) VALUES
(1, '8086d1aa912c0616e4f04963c0d4822f.png'),
(2, 'slide2.jpg'),
(3, 'slide3.jpg'),
(4, 'slide4.jpg'),
(6, 'f020eed3ccc0c74530b181c6910a04a2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `station_id` int(50) NOT NULL,
  `station_name` varchar(50) NOT NULL,
  `station_value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`station_id`, `station_name`, `station_value`) VALUES
(1, 'Alabang', 'Alabang'),
(2, 'Sucat', 'Sucat'),
(3, 'Bicutan', 'Bicutan'),
(4, 'FTI', 'FTI'),
(5, 'Nichols', 'Nichols'),
(6, 'EDSA', 'EDSA'),
(7, 'Pasay Road', 'Pasay Road'),
(8, 'Buendia', 'Buendia'),
(9, 'Vito Cruz', 'Vito Cruz'),
(10, 'San Andres', 'San Andres'),
(11, 'Paco', 'Paco'),
(12, 'Pandacan', 'Pandacan'),
(13, 'Santa Mesa', 'Santa Mesa'),
(14, 'España', 'España'),
(15, 'Laon Laan', 'Laon Laan'),
(16, 'Blumentritt', 'Blumentritt'),
(17, 'Tutuban', 'Tutuban'),
(26, 'Calamba', 'Calamba');

-- --------------------------------------------------------

--
-- Table structure for table `sucat`
--

CREATE TABLE `sucat` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sucat`
--

INSERT INTO `sucat` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '06:32 AM', 'On Time', ' ', 'Northbound'),
(2, '07:32 AM', 'On Time', ' ', 'Northbound'),
(3, '08:42 AM', 'On Time', ' ', 'Northbound'),
(4, '09:42 AM', 'On Time', ' ', 'Northbound'),
(5, '10:42 AM', 'On Time', ' ', 'Northbound'),
(6, '11:42 AM', 'On Time', ' ', 'Northbound'),
(7, '01:52 PM', 'On Time', ' ', 'Northbound'),
(8, '03:32 PM', 'On Time', ' ', 'Northbound'),
(9, '04:32 PM', 'On Time', ' ', 'Northbound'),
(10, '05:32 PM', 'On Time', ' ', 'Northbound'),
(11, '06:42 PM', 'On Time', ' ', 'Northbound'),
(12, '07:42 PM', 'On Time', ' ', 'Northbound');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `user_id` int(50) NOT NULL,
  `passenger_name` varchar(255) NOT NULL,
  `ticket_id` int(50) NOT NULL,
  `route` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `fare` int(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `passenger_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`user_id`, `passenger_name`, `ticket_id`, `route`, `date`, `fare`, `status`, `passenger_type`) VALUES
(11, 'Eco Buncag', 20234544, 'Alabang - Bicutan', '2023-11-16', 15, 'Ticket Already Used', ''),
(11, 'Eco Buncag', 20234545, 'Sucat - Bicutan', '2023-11-16', 15, 'Ticket Already Used', ''),
(11, 'Eco Buncag', 20234546, 'Alabang - Bicutan', '2023-11-16', 15, 'Ticket Already Used', ''),
(11, 'Eco Buncag', 20234547, 'Alabang - Bicutan', '2023-11-16', 15, 'Ticket Already Used', ''),
(11, 'Eco Buncag', 20234549, 'Alabang - Bicutan', '2023-11-16', 15, 'Ticket Already Used', ''),
(11, 'Eco Buncag', 20234550, 'Alabang - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234551, 'Alabang - Bicutan', '2023-11-16', 15, 'Ticket Already Used', ''),
(11, 'Eco Buncag', 20234552, 'Alabang - Bicutan', '2023-11-16', 15, 'Ticket Already Used', ''),
(11, 'Eco Buncag', 20234553, 'Alabang - Bicutan', '2023-11-16', 15, 'Ticket Already Used', ''),
(11, 'Eco Buncag', 20234554, 'Alabang - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234555, 'Alabang - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234556, 'Alabang - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234557, 'Alabang - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234558, 'Alabang - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234559, 'Alabang - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234560, 'Alabang - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234561, 'Alabang - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234562, 'Alabang - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234563, 'Sucat - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234564, 'Sucat - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234565, 'Sucat - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234566, 'Sucat - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234567, 'Sucat - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234568, 'Sucat - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234569, 'Sucat - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234570, 'Sucat - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234571, 'Sucat - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234572, 'Sucat - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234573, 'Sucat - Alabang', '2023-11-16', 15, 'Ticket Already Used', ''),
(11, 'Eco Buncag', 20234574, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234575, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234576, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234577, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234578, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234579, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234580, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234581, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234582, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234583, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234584, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234585, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234586, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234587, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234588, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234589, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234590, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234591, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234592, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234593, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234594, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234595, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234596, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234597, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234598, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234599, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234600, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234601, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234602, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234603, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234604, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234605, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234606, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234607, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234608, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234609, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234610, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234611, 'Sucat - Alabang', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234612, 'Sucat - EDSA', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234613, 'Sucat - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234614, 'Sucat - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234615, 'Alabang - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234616, 'Alabang - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234617, 'Alabang - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234618, 'Alabang - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234619, 'Alabang - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234620, 'Alabang - Sucat', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234621, 'Alabang - Sucat', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234622, 'Sucat - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234623, 'Sucat - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234624, 'Alabang - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234625, 'Alabang - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234626, 'Sucat - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234627, 'Alabang - Sucat', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234628, 'Alabang - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234629, 'Sucat - Paco', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234630, 'Alabang - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234631, 'Alabang - Pasay Road', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234632, 'Alabang - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234633, 'Alabang - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234634, 'Sucat - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234635, 'Alabang - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234636, 'Sucat - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234637, 'Alabang - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234638, 'Alabang - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234639, 'Alabang - Bicutan', '2023-11-16', 15, '', ''),
(11, 'Eco Buncag', 20234640, 'Alabang - Bicutan', '2023-11-17', 15, '', ''),
(11, 'Eco Buncag', 20234641, 'Sucat - Bicutan', '2023-11-17', 15, '', ''),
(11, 'Eco Buncag', 20234642, 'Sucat - Alabang', '2023-11-17', 15, '', ''),
(11, 'Eco Buncag', 20234643, 'Alabang - Bicutan', '2023-11-17', 15, '', ''),
(11, 'Eco Buncag', 20234644, 'Alabang - Bicutan', '2023-11-17', 12, '', ''),
(11, 'Eco Buncag', 20234645, 'Alabang - Bicutan', '2023-11-17', 15, '', ''),
(11, 'Eco Buncag', 20234646, 'Alabang - Bicutan', '2023-11-17', 15, '', ''),
(11, 'Eco Buncag', 20234647, 'Alabang - Vito Cruz', '2023-11-17', 20, '', ''),
(11, 'Eco Buncag', 20234648, 'Sucat - FTI', '2023-11-17', 15, '', ''),
(11, 'Eco Buncag', 20234649, 'Alabang - Bicutan', '2023-11-17', 15, '', ''),
(11, 'Eco Buncag', 20234650, 'Sucat - Bicutan', '2023-11-17', 15, '', ''),
(11, 'Eco Buncag', 20234651, 'Alabang - Bicutan', '2023-11-18', 15, '', ''),
(11, 'Eco Buncag', 20234652, 'Buendia - Sucat', '2023-11-18', 15, '', ''),
(11, 'Eco Buncag', 20234653, 'Alabang - Bicutan', '2023-11-18', 15, '', ''),
(13, 'Chichi Rodriguez', 20234654, 'Alabang - Bicutan', '2023-11-18', 15, '', ''),
(13, 'Chichi Rodriguez', 20234655, 'FTI - Sucat', '2023-11-18', 15, '', ''),
(11, 'Jerico Buncag', 20234656, 'Alabang - Bicutan', '2023-11-20', 15, '', ''),
(11, 'Jerico Buncag', 20234657, 'Alabang - Bicutan', '2023-11-20', 15, '', ''),
(11, 'Jerico Buncag', 20234658, 'Laon Laan - Sucat', '2023-11-20', 25, '', ''),
(11, 'Jerico Buncag', 20234659, 'Pasay Road - Sucat', '2023-11-20', 15, '', ''),
(11, 'Jerico Buncag', 20234660, 'Laon Laan - San Andres', '2023-11-20', 15, '', ''),
(11, 'Jerico Buncag', 20234661, 'Buendia - Sucat', '2023-11-20', 15, '', ''),
(11, 'Jerico Buncag', 20234662, 'Bicutan - Sucat', '2023-11-20', 15, '', ''),
(11, 'Jerico Buncag', 20234663, 'Sucat - Bicutan', '2023-11-20', 15, '', ''),
(11, 'Jerico Buncag', 20234664, 'FTI - Sucat', '2023-11-20', 15, '', ''),
(11, 'Jerico Buncag', 20234665, 'Nichols - Sucat', '2023-11-20', 15, '', ''),
(11, 'Jerico Buncag', 20234666, 'EDSA - Sucat', '2023-11-20', 15, '', ''),
(11, 'Jerico Buncag', 20234667, 'Pasay Road - Sucat', '2023-11-20', 15, '', ''),
(11, 'Jerico Buncag', 20234668, 'Paco - Sucat', '2023-11-20', 15, '', ''),
(11, 'Jerico Buncag', 20234669, 'Buendia - Sucat', '2023-11-20', 15, '', ''),
(11, 'Jerico Buncag', 20234670, 'Laon Laan - Sucat', '2023-11-20', 25, '', ''),
(11, 'Jerico Buncag', 20234671, 'Santa Mesa - Alabang', '2023-11-20', 25, 'Ticket Already Used', ''),
(11, 'Jerico Buncag', 20234672, 'Alabang - Sucat', '2023-11-20', 0, '', ''),
(11, 'Jerico Buncag', 20234673, 'Alabang - Sucat', '2023-11-20', 0, '', ''),
(11, 'Jerico Buncag', 20234674, 'Vito Cruz - Alabang', '2023-11-20', 20, 'Ticket Already Used', ''),
(11, 'Jerico Buncag', 20234675, 'Alabang - Sucat', '2023-11-20', 15, '', ''),
(11, 'Jerico Buncag', 20234676, 'Alabang - Bicutan', '2023-11-20', 15, '', ''),
(11, 'Jerico Buncag', 20234677, 'Vito Cruz - Sucat', '2023-11-20', 15, 'Ticket Already Used', ''),
(11, 'Jerico Buncag', 20234678, 'España - Sucat', '2023-11-21', 20, 'Ticket Already Used', ''),
(11, 'Jerico Buncag', 20234679, 'España - Sucat', '2023-11-21', 20, 'Ticket Already Used', ''),
(11, 'Jerico Buncag', 20234680, 'San Andres - Tutuban', '2023-11-23', 15, '', ''),
(11, 'Jericos Buncag', 20234681, 'Alabang - Sucat', '2023-11-25', 15, 'Ticket Already Used', ''),
(11, 'Jericos Buncag', 20234682, 'Pandacan - Santa Mesa', '2023-11-25', 15, '', ''),
(14, 'Aileen Olaivar', 20234683, 'Alabang - Bicutan', '2023-11-25', 15, 'Ticket Already Used', ''),
(15, 'Gino Vidal', 20234684, 'Alabang - Bicutan', '2023-11-27', 15, '', ''),
(11, 'Jericos Buncag', 20234685, 'Alabang - Sucat', '2023-11-27', 15, '', ''),
(18, 'LYKA MAE DILLA', 20234686, 'Alabang - Santa Mesa', '2023-11-27', 25, '', ''),
(18, 'LYKA MAE DILLA', 20234687, 'Alabang - Santa Mesa', '2023-11-27', 25, '', ''),
(12, 'Chichi Rodriguez', 22404336, 'Alabang - Santa Mesa', '2023-11-11', 25, '', ''),
(11, 'Jerico Buncag', 22404470, 'Alabang - Pasay Road', '2023-11-12', 15, 'Ticket Already Used', ''),
(23, 'Christopher  Buncag', 2023004688, 'FTI - Laon Laan', '2023-11-28', 15, '', ''),
(11, 'Jericos Buncag', 2023004689, 'Sucat - Vito Cruz', '2023-11-28', 15, '', ''),
(11, 'Jericos Buncag', 2023004690, 'Santa Mesa - Sucat', '2023-11-28', 20, '', ''),
(11, 'Jericos Buncag', 2023004691, 'Sucat - Bicutan', '2023-11-28', 15, '', ''),
(11, 'Jericos Buncag', 2023004692, 'Sucat - San Andres', '2023-11-28', 15, '', ''),
(11, 'Jericos Buncag', 2023004693, 'Sucat - San Andres', '2023-11-28', 15, '', ''),
(14, 'Aileeng Olaivar', 2023004694, 'Vito Cruz - Tutuban', '2023-11-28', 15, '', ''),
(14, 'Aileeng Olaivar', 2023004695, 'Vito Cruz - Tutuban', '2023-11-28', 15, '', ''),
(14, 'Aileen Olaivar', 2023004696, 'Alabang - Pandacan', '2023-11-28', 20, '', ''),
(14, 'Aileen Olaivar', 2023004697, 'Alabang - Pandacan', '2023-11-28', 20, '', ''),
(14, 'Aileen Olaivar', 2023004698, 'Alabang - Bicutan', '2023-11-28', 15, '', ''),
(14, 'Aileen Olaivar', 2023004699, 'Alabang - Bicutan', '2023-11-28', 15, '', ''),
(14, 'Aileen Olaivar', 2023004700, 'San Andres - Santa Mesa', '2023-11-28', 15, '', ''),
(14, 'Kene Baterina', 2023004701, 'Bicutan - San Andres', '2023-11-28', 15, '', ''),
(14, 'Kene Baterina', 2023004702, 'Bicutan - San Andres', '2023-11-28', 15, '', ''),
(14, 'Kene Baterina', 2023004703, 'Alabang - Sucat', '2023-11-28', 15, '', ''),
(24, 'Leng Olaivar', 2023004704, 'Alabang - Pasay Road', '2023-11-29', 15, '', ''),
(24, 'Leng Olaivar', 2023004705, 'Alabang - Pasay Road', '2023-11-29', 15, '', ''),
(24, 'Leng Olaivar', 2023004706, 'Alabang - Bicutan', '2023-11-29', 15, 'Ticket Already Used', ''),
(36, 'Juliana Carmel Alfonso', 2024000001, 'Alabang - Bicutan', '2024-01-15', 15, '', ''),
(35, 'Aileen Olaivar', 2024000002, 'Alabang - San Andres', '2024-01-04', 20, '', ''),
(38, 'Berlyn Toribio', 2024000003, 'Alabang - Sucat', '2024-01-05', 15, '', ''),
(35, 'Aileen Olaivar', 2024000004, 'Alabang - San Andres', '2024-01-05', 20, '', ''),
(35, 'Aileen Olaivar', 2024000005, 'Blumentritt - EDSA', '2024-01-09', 15, '', ''),
(35, 'Aileen Olaivar', 2024000006, 'Blumentritt - EDSA', '2024-01-09', 15, '', ''),
(39, 'Ma. Kyla Capanay', 2024000007, 'Alabang - Santa Mesa', '2024-01-06', 25, '', ''),
(25, 'Irish Mae Otic', 2024000008, 'FTI - Santa Mesa', '2024-01-08', 15, '', ''),
(41, 'Jan Maverick Tordecillas', 2024000009, 'Pasay Road - Tutuban', '2024-01-08', 15, '', ''),
(35, 'Aileen Olaivar', 2024000010, 'Nichols - Espanya', '2024-01-08', 15, '', ''),
(35, 'Aileen Olaivar', 2024000011, 'Tutuban - Sucat', '2024-01-08', 25, '', ''),
(35, 'Aileen Olaivar', 2024000012, 'Bicutan - Santa Mesa', '2024-01-08', 15, '', ''),
(42, 'Reeona Dela cruz', 2024000013, 'Sucat - Alabang', '2024-01-08', 15, '', ''),
(35, 'Aileen Olaivar', 2024000014, 'Santa Mesa - Tutuban', '2024-01-08', 15, '', ''),
(35, 'Aileen Olaivar', 2024000015, 'Santa Mesa - Tutuban', '2024-01-08', 15, '', ''),
(35, 'Aileen Olaivar', 2024000016, 'Santa Mesa - Tutuban', '2024-01-08', 15, '', ''),
(45, 'Jabez Victor Chavez', 2024000017, 'Santa Mesa - Espanya', '2024-01-12', 15, '', ''),
(35, 'Aileen Olaivar', 2024000018, 'Alabang - Bicutan', '2024-01-13', 15, '', ''),
(46, 'John Louise Francisco', 2024000019, 'Alabang - Sucat', '2024-02-01', 15, 'Ticket Already Used', ''),
(41, 'Jan Maverick Tordecillas', 2024000020, 'Pasay Road - Tutuban', '2024-01-13', 15, '', ''),
(41, 'Jan Maverick Tordecillas', 2024000021, 'Alabang - Sucat', '2024-01-13', 15, '', ''),
(11, 'Jerico Buncag', 2024000022, 'Santa Mesa - Tutuban', '2024-01-13', 15, 'Ticket Already Used', ''),
(47, 'Aileen Olaivar', 2024000023, 'Santa Mesa - Alabang', '2024-01-14', 25, '', ''),
(47, 'Aileen Olaivar', 2024000024, 'Santa Mesa - Alabang', '2024-01-14', 25, '', ''),
(35, 'Aileen Olaivar', 2024000025, 'Alabang - Pasay Road', '2024-01-15', 15, 'Ticket Already Used', '');

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

CREATE TABLE `trains` (
  `train_id` int(11) NOT NULL,
  `train_no` varchar(10) NOT NULL,
  `train_value` varchar(10) NOT NULL,
  `current_employee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`train_id`, `train_no`, `train_value`, `current_employee_id`) VALUES
(1, 'INKA 8102', 'INKA 8102', 7),
(2, 'INKA 8103', 'INKA 8103', 26),
(4, 'INKA 8104', 'INKA 8104', 31),
(5, 'INKA 8001', 'INKA 8001', 30),
(6, 'INKA 8002', 'INKA 8002', 31),
(7, 'KIHA White', 'KIHA White', 48),
(8, 'DMU 5', 'DMU 5', 49),
(10, 'DMU 6', 'DMU 6', 51),
(11, 'EMU 2', 'EMU 2', 54),
(12, 'EMU 3', 'EMU 3', 55),
(13, 'EMU 4', 'EMU 4', 56),
(14, 'EMU 5', 'EMU 5', 57),
(15, 'EMU 6', 'EMU 6', 59),
(16, 'EMU 7', 'EMU 7', 61),
(17, 'INKA 8301', 'INKA 8301', 63),
(18, 'INKA 8302', 'INKA 8302', 64),
(21, 'INKA 8303', 'INKA 8303', 69);

-- --------------------------------------------------------

--
-- Table structure for table `train_status_updates`
--

CREATE TABLE `train_status_updates` (
  `update_id` int(11) NOT NULL,
  `train_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by_employee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `train_status_updates`
--

INSERT INTO `train_status_updates` (`update_id`, `train_id`, `status`, `timestamp`, `updated_by_employee_id`) VALUES
(1, 1, 'Arriving at Sta. Mesa Station', '2023-11-25 04:03:59', 7),
(2, 1, 'Departing Sta. Mesa Station', '2023-11-27 17:44:17', 26),
(3, 2, 'Departing Pasay Road Station', '2023-11-27 17:45:07', 26),
(4, 2, 'Arriving Buendia Station', '2023-11-28 15:21:07', 26),
(5, 2, 'Arriving Pandacan Station', '2023-11-29 02:01:42', 26),
(6, 1, 'Departing Tutuban Station', '2023-11-29 02:02:26', 26),
(7, 1, 'Arrived Tutuban Station', '2024-01-05 23:32:50', 26),
(8, 1, 'Arrived Blumentritt Station', '2024-01-13 11:09:06', 70),
(9, 1, 'in transit', '2024-01-14 08:19:42', 26),
(10, 2, 'Departing from Santa Mesa', '2024-01-14 08:19:42', 26),
(11, 2, 'Departing from Santa Mesa', '2024-01-14 08:20:12', 26),
(12, 1, 'in transit', '2024-01-14 08:20:12', 26),
(13, 2, 'Departing from Santa Mesa', '2024-01-14 08:20:42', 26),
(14, 1, 'in transit', '2024-01-14 08:20:42', 26),
(15, 1, 'in transit', '2024-01-14 08:21:11', 26),
(16, 2, 'Departing from Santa Mesa', '2024-01-14 08:21:11', 26),
(17, 2, 'Departing from Santa Mesa', '2024-01-14 08:21:43', 26),
(18, 1, 'in transit', '2024-01-14 08:21:43', 26),
(19, 2, 'Departing from Santa Mesa', '2024-01-14 08:22:12', 26),
(20, 1, 'in transit', '2024-01-14 08:22:12', 26),
(21, 2, 'Departing from Santa Mesa', '2024-01-14 08:22:43', 26),
(22, 1, 'in transit', '2024-01-14 08:22:43', 26),
(23, 2, 'Departing from Santa Mesa', '2024-01-14 08:23:13', 26),
(24, 1, 'in transit', '2024-01-14 08:23:13', 26),
(25, 2, 'Arrived at Santa Mesa', '2024-01-14 08:24:06', 26),
(26, 1, 'in transit', '2024-01-14 08:24:06', 26),
(27, 2, 'Arrived at Santa Mesa', '2024-01-14 08:24:42', 26),
(28, 1, 'in transit', '2024-01-14 08:24:42', 26),
(29, 2, 'Arrived at Santa Mesa', '2024-01-14 08:25:13', 26),
(30, 1, 'in transit', '2024-01-14 08:25:13', 26),
(31, 2, 'Arrived at Santa Mesa', '2024-01-14 08:25:43', 26),
(32, 1, 'in transit', '2024-01-14 08:25:43', 26),
(33, 2, 'Arrived at Santa Mesa', '2024-01-14 08:26:44', 26),
(34, 1, 'in transit', '2024-01-14 08:26:44', 26),
(35, 2, 'Arrived at Santa Mesa', '2024-01-14 08:27:45', 26),
(36, 1, 'in transit', '2024-01-14 08:27:45', 26),
(37, 1, 'in transit', '2024-01-14 08:28:46', 26),
(38, 2, 'Arrived at Santa Mesa', '2024-01-14 08:28:46', 26),
(39, 1, 'in transit', '2024-01-14 08:29:47', 26),
(40, 2, 'Arrived at Santa Mesa', '2024-01-14 08:29:47', 26),
(41, 2, 'Arrived at Santa Mesa', '2024-01-14 08:30:48', 26),
(42, 1, 'in transit', '2024-01-14 08:30:48', 26),
(43, 2, 'Arrived at Santa Mesa', '2024-01-14 08:31:49', 26),
(44, 1, 'in transit', '2024-01-14 08:31:49', 26),
(45, 1, 'in transit', '2024-01-14 08:32:50', 26),
(46, 2, 'Arrived at Santa Mesa', '2024-01-14 08:32:50', 26),
(47, 2, 'Arrived at Santa Mesa', '2024-01-14 08:33:51', 26),
(48, 1, 'in transit', '2024-01-14 08:33:51', 26),
(49, 2, 'Arrived at Santa Mesa', '2024-01-14 08:34:52', 26),
(50, 1, 'in transit', '2024-01-14 08:34:52', 26),
(51, 2, 'Arrived at Santa Mesa', '2024-01-14 08:35:53', 26),
(52, 1, 'in transit', '2024-01-14 08:35:53', 26),
(53, 2, 'Arrived at Santa Mesa', '2024-01-14 08:36:54', 26),
(54, 1, 'in transit', '2024-01-14 08:36:54', 26),
(55, 2, 'Arrived at Santa Mesa', '2024-01-14 08:37:55', 26),
(56, 1, 'in transit', '2024-01-14 08:37:55', 26),
(57, 2, 'Arrived at Santa Mesa', '2024-01-14 08:38:56', 26),
(58, 1, 'in transit', '2024-01-14 08:38:56', 26),
(59, 1, 'in transit', '2024-01-14 08:39:57', 26),
(60, 2, 'Arrived at Santa Mesa', '2024-01-14 08:39:57', 26),
(61, 1, 'in transit', '2024-01-14 08:40:58', 26),
(62, 2, 'Arrived at Santa Mesa', '2024-01-14 08:40:58', 26),
(63, 1, 'in transit', '2024-01-14 08:41:59', 26),
(64, 2, 'Arrived at Santa Mesa', '2024-01-14 08:41:59', 26),
(65, 2, 'Arrived at Santa Mesa', '2024-01-14 08:43:00', 26),
(66, 1, 'in transit', '2024-01-14 08:43:00', 26),
(67, 1, 'in transit', '2024-01-14 08:44:01', 26),
(68, 2, 'Arrived at Santa Mesa', '2024-01-14 08:44:01', 26),
(69, 2, 'Arrived at Santa Mesa', '2024-01-14 08:45:02', 26),
(70, 1, 'in transit', '2024-01-14 08:45:02', 26),
(71, 2, 'Arrived at Santa Mesa', '2024-01-14 08:46:03', 26),
(72, 1, 'in transit', '2024-01-14 08:46:03', 26),
(73, 2, 'Arrived at Santa Mesa', '2024-01-14 08:47:04', 26),
(74, 1, 'in transit', '2024-01-14 08:47:04', 26),
(75, 1, 'in transit', '2024-01-14 08:48:05', 26),
(76, 2, 'Arrived at Santa Mesa', '2024-01-14 08:48:05', 26),
(77, 1, 'Departing from Blumentritt', '2024-01-14 08:49:06', 26),
(78, 2, 'Arrived at Santa Mesa', '2024-01-14 08:49:06', 26),
(79, 1, 'Departing from Blumentritt', '2024-01-14 08:49:41', 26),
(80, 2, 'Arrived at Santa Mesa', '2024-01-14 08:49:41', 26),
(81, 2, 'Arrived at Santa Mesa', '2024-01-14 08:50:13', 26),
(82, 1, 'Departing from Blumentritt', '2024-01-14 08:50:13', 26),
(83, 2, 'Arrived at Santa Mesa', '2024-01-14 08:51:06', 26),
(84, 1, 'Departing from Blumentritt', '2024-01-14 08:51:06', 26),
(85, 2, 'Arrived at Santa Mesa', '2024-01-14 08:52:06', 26),
(86, 1, 'Departing from Blumentritt', '2024-01-14 08:52:06', 26),
(87, 2, 'Arrived at Santa Mesa', '2024-01-14 08:52:46', 26),
(88, 1, 'Departing from Blumentritt', '2024-01-14 08:52:46', 26),
(89, 2, 'Arrived at Santa Mesa', '2024-01-14 08:53:10', 26),
(90, 1, 'Departing from Blumentritt', '2024-01-14 08:53:10', 26),
(91, 2, 'Arrived at Santa Mesa', '2024-01-14 08:53:41', 26),
(92, 1, 'Departing from Blumentritt', '2024-01-14 08:53:41', 26),
(93, 1, 'Arrived at Blumentritt', '2024-01-14 08:54:12', 26),
(94, 2, 'Arrived at Santa Mesa', '2024-01-14 08:54:12', 26),
(95, 1, 'Arrived at Blumentritt', '2024-01-14 08:54:42', 26),
(96, 2, 'Arrived at Santa Mesa', '2024-01-14 08:54:42', 26),
(97, 2, 'Arrived at Santa Mesa', '2024-01-14 08:58:17', 26),
(98, 2, 'in transit', '2024-01-14 09:00:17', 26),
(99, 2, 'in transit', '2024-01-14 09:05:19', 26),
(100, 2, 'in transit', '2024-01-14 23:27:42', 26),
(101, 2, 'in transit', '2024-01-14 23:28:42', 26),
(102, 2, 'in transit', '2024-01-14 23:29:10', 26),
(103, 2, 'in transit', '2024-01-14 23:49:29', 26),
(104, 2, 'Arrived at Pasay Road', '2024-01-14 23:49:59', 26),
(105, 2, 'Arrived at Pasay Road', '2024-01-14 23:51:34', 26),
(106, 2, 'Arrived at Pasay Road', '2024-01-15 00:12:33', 26),
(107, 2, 'Arrived at Pasay Road', '2024-01-15 00:13:28', 26),
(108, 2, 'Departing from Buendia', '2024-01-15 00:14:28', 26),
(109, 2, 'Arrived at Buendia', '2024-01-15 00:14:58', 26),
(110, 2, 'Arrived at Buendia', '2024-01-15 00:16:28', 26),
(111, 2, 'Arrived at Buendia', '2024-01-15 00:16:59', 26),
(112, 2, 'Arrived at Buendia', '2024-01-15 00:18:03', 26),
(113, 2, 'in transit', '2024-01-15 00:18:33', 26),
(114, 2, 'Departing from Vito Cruz', '2024-01-15 00:19:03', 26),
(115, 2, 'Arrived at Vito Cruz', '2024-01-15 00:19:33', 26),
(116, 2, 'Arrived at Vito Cruz', '2024-01-15 00:20:03', 26),
(117, 2, 'Arrived at Vito Cruz', '2024-01-15 00:20:35', 26),
(118, 2, 'Arrived at San Andres', '2024-01-15 00:24:30', 26),
(119, 2, 'Arrived at San Andres', '2024-01-15 00:25:05', 26),
(120, 2, 'Arrived at San Andres', '2024-01-15 00:25:30', 26),
(121, 2, 'Departing from San Andres', '2024-01-15 00:26:00', 26),
(122, 2, 'Departing from Paco', '2024-01-15 00:26:30', 26),
(123, 2, 'Arrived at Paco', '2024-01-15 00:27:13', 26),
(124, 2, 'arriving at Paco', '2024-01-15 00:27:33', 26),
(125, 2, 'Arrived at Paco', '2024-01-15 00:28:00', 26),
(126, 2, 'Arrived at Paco', '2024-01-15 00:29:00', 26),
(127, 2, 'Arriving Pandacan ', '2024-01-15 00:29:26', 26),
(128, 2, 'Arrived at Paco', '2024-01-15 00:29:30', 26),
(129, 2, 'in transit', '2024-01-15 00:30:00', 26),
(130, 2, 'in transit', '2024-01-15 00:30:30', 26),
(131, 2, 'Arriving Pandacan ', '2024-01-15 00:30:30', 26),
(132, 2, 'in transit', '2024-01-15 00:31:00', 26),
(133, 2, 'in transit', '2024-01-15 00:31:31', 26),
(134, 2, 'Arrived at Pandacan', '2024-01-15 00:32:31', 26),
(135, 2, 'Arrived at Pandacan', '2024-01-15 00:34:01', 26),
(136, 2, 'Arrived at Pandacan', '2024-01-15 00:34:31', 26),
(137, 2, 'Departing from Pandacan', '2024-01-15 00:35:01', 26),
(138, 2, 'Departing from Pandacan', '2024-01-15 00:35:31', 26),
(139, 2, 'in transit', '2024-01-15 00:36:01', 26),
(140, 2, 'in transit', '2024-01-15 00:36:31', 26),
(141, 2, 'Departing from Santa Mesa', '2024-01-15 00:37:01', 26),
(142, 2, 'Arrived at Santa Mesa', '2024-01-15 00:37:31', 26),
(143, 2, 'Arrived at Santa Mesa', '2024-01-15 00:39:30', 26),
(144, 2, 'Arrived at Santa Mesa', '2024-01-15 00:40:19', 26),
(145, 2, 'Arrived at Santa Mesa', '2024-01-15 00:41:49', 26),
(146, 2, 'Arrived at Santa Mesa', '2024-01-15 00:43:09', 26),
(147, 2, 'Arrived at Santa Mesa', '2024-01-15 01:08:44', 26),
(148, 2, 'Arrived at Santa Mesa', '2024-01-15 01:20:43', 26),
(149, 1, 'Arrived at Blumentritt', '2024-01-15 01:34:49', 7),
(150, 1, 'Arrived at Blumentritt', '2024-01-15 02:04:02', 7),
(151, 2, 'Arrived at Santa Mesa', '2024-01-15 02:24:16', 26),
(152, 2, 'Arrived at Santa Mesa', '2024-01-15 02:26:24', 26),
(153, 2, 'Arriving at Santa Mesa', '2024-01-15 04:01:40', 26),
(154, 2, 'Arrived at Santa Mesa', '2024-01-15 04:01:45', 26),
(155, 2, 'Arriving at Santa Mesa', '2024-01-15 04:02:27', 26),
(156, 2, 'Arrived at Santa Mesa', '2024-01-15 04:02:40', 26),
(157, 2, 'Departing Santa Mesa', '2024-01-15 07:39:11', 26),
(158, 2, 'Arrived at Santa Mesa', '2024-01-15 07:39:15', 26),
(159, 2, 'Departing Santa Mesa', '2024-01-15 07:39:55', 26),
(160, 2, 'Arrived at Santa Mesa', '2024-01-15 07:41:12', 26),
(161, 2, 'Arrived at Santa Mesa', '2024-01-15 07:50:04', 26),
(162, 2, 'Arrived at Santa Mesa', '2024-01-17 22:27:18', 26),
(163, 18, 'Departed from San Andres', '2024-02-10 05:50:58', 64);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` bigint(20) NOT NULL,
  `date` datetime DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `date`, `amount`, `status`, `user_id`) VALUES
(2023111604, '2023-11-16 06:45:07', 15.00, 'Payment', 11),
(2023111605, '2023-11-16 06:45:43', 15.00, 'Payment', 11),
(2023111606, '2023-11-16 06:46:06', 15.00, 'Payment', 11),
(2023111607, '2023-11-16 06:46:41', 15.00, 'Payment', 11),
(2023111608, '2023-11-16 06:46:52', 15.00, 'Payment', 11),
(2023111609, '2023-11-16 06:47:49', 15.00, 'Payment', 11),
(2023111610, '2023-10-01 00:00:00', 15.00, 'Payment', 11),
(2023111611, '2023-10-16 06:48:22', 15.00, 'Payment', 11),
(2023111612, '2023-11-16 06:48:29', 15.00, 'Payment', 11),
(2023111613, '2023-11-16 06:48:46', 15.00, 'Payment', 11),
(2023111614, '2023-11-16 06:49:04', 15.00, 'Payment', 11),
(2023111615, '2023-11-16 06:49:30', 15.00, 'Payment', 11),
(2023111616, '2023-11-16 06:49:37', 15.00, 'Payment', 11),
(2023111618, '2023-11-16 06:50:05', 15.00, 'Payment', 11),
(2023111619, '2023-11-16 06:55:49', 15.00, 'Payment', 11),
(2023111620, '2023-10-16 07:06:32', 15.00, 'Payment', 11),
(2023111621, '2023-11-16 07:11:55', 15.00, 'Payment', 11),
(2023111622, '2023-11-16 07:13:16', 15.00, 'Payment', 11),
(2023111623, '2023-11-16 07:14:01', 15.00, 'Payment', 11),
(2147483647, '2023-11-16 16:11:42', 0.00, 'Payment', 11),
(202311162323320001, '2023-11-16 16:23:32', 0.00, 'Payment', 11),
(202311162324390001, '2023-11-16 16:24:39', 0.00, 'Payment', 11),
(202311162326160001, '2023-11-16 16:26:16', 0.00, 'Payment', 11),
(202311162334280001, '2023-11-16 16:34:28', 0.00, 'Payment', 11),
(202311162342320001, '2023-09-01 00:00:00', 0.00, 'Payment', 11),
(202311162347420001, '2023-11-16 16:47:42', 0.00, 'Payment', 11),
(202311162351540001, '2023-11-16 16:51:54', 0.00, 'Payment', 11),
(202311162357170001, '2023-11-16 16:57:17', 0.00, 'Payment', 11),
(202311162359440001, '2023-11-16 16:59:44', 0.00, 'Payment', 11),
(202311170002250001, '2023-10-16 17:02:25', 0.00, 'Payment', 11),
(202311170003560001, '2023-11-16 17:03:56', 2.50, 'Payment', 11),
(202311170007260001, '2023-11-16 17:07:26', 0.00, 'Payment', 11),
(202311170010010001, '2023-11-16 17:10:01', 15.00, 'Payment', 11),
(202311171107060001, '2023-11-17 04:07:06', 15.00, 'Payment', 11),
(202311171107540001, '2023-11-17 04:07:54', 15.00, 'Payment', 11),
(202311171108400001, '2023-10-17 04:08:40', 15.00, 'Payment', 11),
(202311171109380001, '2023-11-17 04:09:38', 20.00, 'Payment', 11),
(202311171110130001, '2023-11-17 04:10:13', 15.00, 'Payment', 11),
(202311172141210001, '2023-11-17 14:41:21', 13.00, 'Payment', 11),
(202311172149470001, '2023-11-17 14:49:47', 15.00, 'Payment', 11),
(202311180909470001, '2023-11-18 02:09:47', 14.50, 'Payment', 11),
(202311181706450001, '2023-11-18 10:06:45', 15.00, 'Payment', 11),
(202311181712170001, '2023-11-18 10:12:17', 15.00, 'Payment', 13),
(202311181726150001, '2023-11-18 10:26:15', 15.00, 'Payment', 13),
(202311201010160001, '2023-11-20 03:10:16', 15.00, 'Payment', 11),
(202311201010550001, '2023-11-20 03:10:55', 15.00, 'Payment', 11),
(202311201016390001, '2023-11-20 03:16:39', 30.00, 'Cash In', 11),
(202311201022450001, '2023-11-20 03:22:45', 25.00, 'Payment', 11),
(202311201029210001, '2023-11-20 03:29:21', 15.00, 'Payment', 11),
(202311201108530001, '2023-11-20 04:08:53', 15.00, 'Payment', 11),
(202311201109430001, '2023-11-20 04:09:43', 15.00, 'Payment', 11),
(202311201118560001, '2023-11-20 04:18:56', 15.00, 'Payment', 11),
(202311201121190001, '2023-11-20 04:21:19', 15.00, 'Payment', 11),
(202311201121470001, '2023-11-20 04:21:47', 15.00, 'Payment', 11),
(202311201122140001, '2023-11-20 04:22:14', 15.00, 'Payment', 11),
(202311201122390001, '2023-11-20 04:22:39', 15.00, 'Payment', 11),
(202311201123030001, '2023-11-20 04:23:03', 15.00, 'Payment', 11),
(202311201125130001, '2023-11-20 04:25:13', 15.00, 'Payment', 11),
(202311201131260001, '2023-11-20 04:31:26', 15.00, 'Payment', 11),
(202311201132000001, '2023-11-20 04:32:00', 25.00, 'Payment', 11),
(202311201133320001, '2023-11-20 04:33:32', 25.00, 'Payment', 11),
(202311201525090001, '2023-11-20 08:25:09', 27.00, 'Payment', 11),
(202311201918270001, '2023-11-20 12:18:27', 27.00, 'Payment', 11),
(202311201923330001, '2023-11-20 12:23:33', 20.00, 'Payment', 11),
(202311201933190001, '2023-11-20 12:33:19', 15.00, 'Payment', 11),
(202311201939560001, '2023-11-20 12:39:56', 15.00, 'Payment', 11),
(202311201940360001, '2023-11-20 12:40:36', 15.00, 'Payment', 11),
(202311212021410001, '2023-11-21 13:21:41', 20.00, 'Payment', 11),
(202311212037400001, '2023-11-21 13:37:40', 20.00, 'Payment', 11),
(202311232242170001, '2023-11-23 15:42:17', 300.00, 'Cash In', 11),
(202311232301220001, '2023-11-23 16:01:22', 15.00, 'Payment', 11),
(202311251025080001, '2023-11-25 10:25:08', 15.00, 'Payment', 11),
(202311251028080001, '2023-11-25 10:28:08', 15.00, 'Payment', 11),
(202311251051020001, '2023-11-25 10:51:02', 500.00, 'Cash In', 14),
(202311251052300001, '2023-11-25 10:52:30', 15.00, 'Payment', 14),
(202311260715210001, '2023-11-26 07:15:21', 50.00, 'Cash In', 11),
(202311260720260001, '2023-11-26 07:20:26', 30.00, 'Cash In', 11),
(202311260725260001, '2023-11-26 07:25:26', 30.00, 'Cash In', 11),
(202311260741580001, '2023-11-26 07:41:58', 25.00, 'Cash In', 11),
(202311271205190001, '2023-11-27 12:05:19', 300.00, 'Cash In', 15),
(202311271206180001, '2023-11-27 12:06:18', 15.00, 'Payment', 15),
(202311271226010001, '2023-11-27 12:26:01', 12.00, 'Payment', 11),
(202311271548090001, '2023-11-27 15:48:09', 100.00, 'Cash In', 18),
(202311271559230001, '2023-11-27 15:59:23', 50.00, 'Payment', 18),
(202311271621530001, '2023-11-27 16:21:53', 40.00, 'Payment', 11),
(202311280147070001, '2023-11-28 01:47:07', 24.25, 'Payment', 11),
(202311280226120001, '2023-11-28 02:26:12', 8.50, 'Payment', 11),
(202311280227100001, '2023-11-28 02:27:10', 27.00, 'Payment', 11),
(202311280229250001, '2023-11-28 02:29:25', 16.00, 'Payment', 11),
(202311280234410001, '2023-11-28 02:34:41', 300.00, 'Cash In', 23),
(202311280235230001, '2023-11-28 02:35:23', 20.00, 'Payment', 23),
(202311280237500001, '2023-11-28 02:37:50', 30.00, 'Payment', 23),
(202311280240130001, '2023-11-28 02:40:13', 15.00, 'Payment', 23),
(202311280243010001, '2023-11-28 02:43:01', 15.00, 'Payment', 11),
(202311280432300001, '2023-11-28 04:32:30', 19.75, 'Payment', 11),
(202311280433170001, '2023-11-28 04:33:17', 15.00, 'Payment', 11),
(202311280434090001, '2023-11-28 04:34:09', 23.50, 'Payment', 11),
(202311280533450001, '2023-11-28 05:33:45', 26.75, 'Payment', 14),
(202311280801180001, '2023-11-28 08:01:18', 100.00, 'Cash In', 14),
(202311280803540001, '2023-11-28 08:03:54', 36.00, 'Payment', 14),
(202311280807150001, '2023-11-28 08:07:15', 27.00, 'Payment', 14),
(202311280809390001, '2023-11-28 08:09:39', 13.25, 'Payment', 14),
(202311281508010001, '2023-11-28 15:08:01', 27.00, 'Payment', 14),
(202311281508360001, '2023-11-28 15:08:36', 11.25, 'Payment', 14),
(202311290419310001, '2023-11-29 04:19:31', 300.00, 'Cash In', 24),
(202311290421160001, '2023-11-29 04:21:16', 27.00, 'Payment', 24),
(202311290422100001, '2023-11-29 04:22:10', 14.50, 'Payment', 24),
(202311291124080001, '2023-11-29 11:24:08', 300.00, 'Cash In', 25),
(202401031501200001, '2024-01-03 15:01:20', 300.00, 'Cash In', 36),
(202401031502220001, '2024-01-03 15:02:22', 15.00, 'Payment', 36),
(202401040214430001, '2024-01-04 02:14:43', 300.00, 'Cash In', 35),
(202401040215280001, '2024-01-04 02:15:28', 16.00, 'Payment', 35),
(202401041309210001, '2024-01-04 13:09:21', 500.00, 'Cash In', 38),
(202401041310260001, '2024-01-04 13:10:26', 12.00, 'Payment', 38),
(202401050930390001, '2024-01-05 09:30:39', 300.00, 'Cash In', 35),
(202401050947300001, '2024-01-05 09:47:30', 20.00, 'Payment', 35),
(202401051513450001, '2024-01-05 15:13:45', 300.00, 'Cash In', 35),
(202401051551390001, '2024-01-05 15:51:39', 27.00, 'Payment', 35),
(202401060242430001, '2024-01-06 02:42:43', 300.00, 'Cash In', 39),
(202401060244220001, '2024-01-06 02:44:22', 20.00, 'Payment', 39),
(202401060311560001, '2024-01-06 03:11:56', 12.00, 'Payment', 25),
(202401071307300001, '2024-01-07 13:07:30', 300.00, 'Cash In', 40),
(202401071324040001, '2024-01-07 13:24:04', 8000.00, 'Cash In', 40),
(202401071343460001, '2024-01-07 13:43:46', 100.00, 'Cash In', 41),
(202401071345090001, '2024-01-07 13:45:09', 15.00, 'Payment', 41),
(202401080111430001, '2024-01-08 01:11:43', 11.50, 'Payment', 35),
(202401080207510001, '2024-01-08 02:07:51', 25.00, 'Payment', 35),
(202401080707580001, '2024-01-08 07:07:58', 12.00, 'Payment', 35),
(202401080724300001, '2024-01-08 07:24:30', 300.00, 'Cash In', 42),
(202401080725290001, '2024-01-08 07:25:29', 12.00, 'Payment', 42),
(202401080729180001, '2024-01-08 07:29:18', 38.75, 'Payment', 35),
(202401120102260001, '2024-01-12 01:02:26', 300.00, 'Cash In', 45),
(202401120103100001, '2024-01-12 01:03:10', 15.00, 'Payment', 45),
(202401120112140001, '2024-01-12 01:12:14', 15.00, 'Payment', 35),
(202401120112460001, '2024-01-12 01:12:46', 300.00, 'Cash In', 35),
(202401121800410001, '2024-01-12 18:00:41', 300.00, 'Cash In', 46),
(202401121801320001, '2024-01-12 18:01:32', 15.00, 'Payment', 46),
(202401130234110001, '2024-01-13 02:34:11', 12.00, 'Payment', 41),
(202401130247270001, '2024-01-13 02:47:27', 12.00, 'Payment', 41),
(202401131446330001, '2024-01-13 14:46:33', 15.00, 'Payment', 11),
(202401131810440001, '2024-01-13 18:10:44', 300.00, 'Cash In', 47),
(202401131828190001, '2024-01-13 18:28:19', 45.00, 'Payment', 47),
(202401150125270001, '2024-01-15 01:25:27', 300.00, 'Cash In', 35),
(202401150126570001, '2024-01-15 01:26:57', 15.00, 'Payment', 35);

-- --------------------------------------------------------

--
-- Table structure for table `tutuban`
--

CREATE TABLE `tutuban` (
  `schedule_id` int(11) NOT NULL,
  `time` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutuban`
--

INSERT INTO `tutuban` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '05:06 AM', 'On Time', ' ', 'Southbound'),
(2, '06:06 AM', 'On Time', ' ', 'Southbound'),
(3, '07:16 AM', 'On Time', ' ', 'Southbound'),
(4, '08:16 AM', 'On Time', ' ', 'Southbound'),
(5, '09:16 AM', 'On Time', ' ', 'Southbound'),
(6, '10:26 AM', 'On Time', ' ', 'Southbound'),
(7, '12:26 PM', 'On Time', ' ', 'Southbound'),
(8, '02:06 PM', 'On Time', ' ', 'Southbound'),
(9, '03:06 PM', 'On Time', ' ', 'Southbound'),
(10, '04:06 PM', 'On Time', ' ', 'Southbound'),
(11, '05:16 PM', 'On Time', ' ', 'Southbound'),
(12, '06:16 PM', 'On Time', ' ', 'Southbound'),
(13, '07:16 PM', 'On Time', ' ', 'Southbound'),
(14, '08:36 PM', 'On Time', ' ', 'Southbound');

-- --------------------------------------------------------

--
-- Table structure for table `tutuban_bicutan`
--

CREATE TABLE `tutuban_bicutan` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutuban_bicutan`
--

INSERT INTO `tutuban_bicutan` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '05:54 AM', 'On Time', ' ', 'Southbound'),
(2, '06:16 AM', 'On Time', ' ', 'Southbound'),
(3, '07:17 AM', 'On Time', ' ', 'Southbound'),
(4, '07:42 AM', 'On Time', ' ', 'Southbound'),
(5, '08:12 AM', 'On Time', ' ', 'Southbound'),
(6, '09:22 AM', 'On Time', ' ', 'Southbound'),
(7, '10:22 AM', 'On Time', ' ', 'Southbound'),
(8, '11:22 AM', 'On Time', ' ', 'Southbound'),
(9, '12:32 PM', 'On Time', ' ', 'Southbound'),
(10, '02:47 PM', 'On Time', ' ', 'Southbound'),
(11, '04:12 PM', 'On Time', ' ', 'Southbound'),
(12, '05:12 PM', 'On Time', ' ', 'Southbound'),
(13, '06:12 PM', 'On Time', ' ', 'Southbound'),
(14, '07:35 PM', 'On Time', ' ', 'Southbound'),
(15, '08:22 PM', 'On Time', ' ', 'Southbound');

-- --------------------------------------------------------

--
-- Table structure for table `tutuban_bluementritt`
--

CREATE TABLE `tutuban_bluementritt` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutuban_bluementritt`
--

INSERT INTO `tutuban_bluementritt` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '05:13 AM', 'On Time', ' ', 'Southbound'),
(2, '06:13 AM', 'On Time', ' ', 'Southbound'),
(3, '07:23 AM', 'On Time', ' ', 'Southbound'),
(4, '08:23 AM', 'On Time', ' ', 'Southbound'),
(5, '09:23 AM', 'On Time', ' ', 'Southbound'),
(6, '10:33 AM', 'On Time', ' ', 'Southbound'),
(7, '12:33 PM', 'On Time', ' ', 'Southbound'),
(8, '02:13 PM', 'On Time', ' ', 'Southbound'),
(9, '03:13 PM', 'On Time', ' ', 'Southbound'),
(10, '04:13 PM', 'On Time', ' ', 'Southbound'),
(11, '05:23 PM', 'On Time', ' ', 'Southbound'),
(12, '06:23 PM', 'On Time', ' ', 'Southbound'),
(13, '08:03 PM', 'On Time', ' ', 'Southbound'),
(14, '08:43 PM', 'On Time', ' ', 'Southbound');

-- --------------------------------------------------------

--
-- Table structure for table `tutuban_buendia`
--

CREATE TABLE `tutuban_buendia` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutuban_buendia`
--

INSERT INTO `tutuban_buendia` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '06:19 AM', 'On Time', ' ', 'Southbound'),
(2, '06:43 AM', 'On Time', ' ', 'Southbound'),
(3, '08:09 AM', 'On Time', ' ', 'Southbound'),
(4, '09:23 AM', 'On Time', ' ', 'Southbound'),
(5, '09:49 AM', 'On Time', ' ', 'Southbound'),
(6, '10:49 AM', 'On Time', ' ', 'Southbound'),
(7, '11:49 AM', 'On Time', ' ', 'Southbound'),
(8, '12:59 AM', 'On Time', ' ', 'Southbound'),
(9, '01:29 PM', 'On Time', ' ', 'Southbound'),
(10, '03:14 PM', 'On Time', ' ', 'Southbound'),
(11, '04:39 PM', 'On Time', ' ', 'Southbound'),
(12, '05:39 PM', 'On Time', ' ', 'Southbound'),
(13, '06:39 PM', 'On Time', ' ', 'Southbound'),
(14, '07:16 PM', 'On Time', ' ', 'Southbound'),
(15, '08:02 PM', 'On Time', ' ', 'Southbound'),
(16, '08:49 PM', 'On Time', ' ', 'Southbound');

-- --------------------------------------------------------

--
-- Table structure for table `tutuban_edsa`
--

CREATE TABLE `tutuban_edsa` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutuban_edsa`
--

INSERT INTO `tutuban_edsa` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '06:14 PM', 'On Time', ' ', 'Southbound'),
(2, '06:38 AM', 'On Time', ' ', 'Southbound'),
(3, '08:04 AM', 'On Time', ' ', 'Southbound'),
(4, '08:34 AM', 'On Time', ' ', 'Southbound'),
(5, '09:19 AM', 'On Time', ' ', 'Southbound'),
(6, '09:44 AM', 'On Time', ' ', 'Southbound'),
(7, '10:44 AM', 'On Time', ' ', 'Southbound'),
(8, '11:44 AM', 'On Time', ' ', 'Southbound'),
(9, '12:55 PM', 'On Time', ' ', 'Southbound'),
(10, '01:24 PM', 'On Time', ' ', 'Southbound'),
(11, '03:09 PM', 'On Time', ' ', 'Southbound'),
(12, '04:34 PM', 'On Time', ' ', 'Southbound'),
(13, '05:34 PM', 'On Time', ' ', 'Southbound'),
(14, '06:34 PM', 'On Time', ' ', 'Southbound'),
(15, '07:12 PM', 'On Time', ' ', 'Southbound'),
(16, '07:57 PM', 'On Time', ' ', 'Southbound'),
(17, '08:44 AM', 'On Time', ' ', 'Southbound');

-- --------------------------------------------------------

--
-- Table structure for table `tutuban_españa`
--

CREATE TABLE `tutuban_españa` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutuban_españa`
--

INSERT INTO `tutuban_españa` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '06:55 AM', 'On Time', ' ', 'Southbound'),
(2, '07:19 AM', 'On Time', ' ', 'Southbound'),
(3, '08:43 AM', 'On Time', ' ', 'Southbound'),
(4, '09:13 AM', 'On Time', ' ', 'Southbound'),
(5, '10:23 AM', 'On Time', ' ', 'Southbound'),
(6, '11:23 AM', 'On Time', ' ', 'Southbound'),
(7, '12:23 PM', 'On Time', ' ', 'Southbound'),
(8, '01:33 PM', 'On Time', ' ', 'Southbound'),
(9, '02:03 PM', 'On Time', ' ', 'Southbound'),
(10, '03:48 PM', 'On Time', ' ', 'Southbound'),
(11, '05:13 PM', 'On Time', ' ', 'Southbound'),
(12, '06:13 PM', 'On Time', ' ', 'Southbound'),
(13, '07:13 PM', 'On Time', ' ', 'Southbound'),
(14, '08:36 PM', 'On Time', ' ', 'Southbound'),
(15, '09:23 PM', 'On Time', ' ', 'Southbound');

-- --------------------------------------------------------

--
-- Table structure for table `tutuban_fti`
--

CREATE TABLE `tutuban_fti` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutuban_fti`
--

INSERT INTO `tutuban_fti` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '06:01 AM', 'On Time', 'EMU 2', 'Southbound'),
(2, '06:25 AM', 'On Time', 'EMU 7', 'Southbound'),
(3, '07:51 AM', 'On Time', 'EMU 5', 'Southbound'),
(4, '08:21 AM', 'On Time', 'INKA 8303', 'Southbound'),
(5, '09:09 AM', 'On Time', 'KIHA White', 'Southbound'),
(6, '09:31 AM', 'On Time', 'INKA 8302', 'Southbound'),
(7, '10:31 AM', 'On Time', 'INKA 8001', 'Southbound'),
(8, '11:31 AM', 'On Time', 'EMU 2', 'Southbound'),
(9, '12:41 PM', 'On Time', 'EMU 7', 'Southbound'),
(10, '01:11 PM', 'On Time', 'INKA 8303', 'Southbound'),
(11, '02:56 PM', 'On Time', 'INKA 8104', 'Southbound'),
(12, '04:21 PM', 'On Time', 'INKA 8002', 'Southbound'),
(13, '05:21 PM', 'On Time', 'EMU 5', 'Southbound'),
(14, '06:21 PM', 'On Time', 'DMU 6', 'Southbound'),
(15, '07:02 PM', 'On Time', '', 'Southbound'),
(16, '07:44 PM', 'On Time', '', 'Southbound'),
(17, '08:31 PM', 'On Time', '', 'Southbound');

-- --------------------------------------------------------

--
-- Table structure for table `tutuban_laonlaan`
--

CREATE TABLE `tutuban_laonlaan` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutuban_laonlaan`
--

INSERT INTO `tutuban_laonlaan` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '07:05 PM', 'On Time', ' ', 'Southbound'),
(2, '08:15 AM', 'On Time', ' ', 'Southbound'),
(3, '09:05 AM', 'On Time', ' ', 'Southbound'),
(4, '09:45 AM', 'On Time', ' ', 'Southbound'),
(5, '10:45 AM', 'On Time', ' ', 'Southbound'),
(6, '11:35 AM', 'On Time', ' ', 'Southbound'),
(7, '12:35 PM', 'On Time', ' ', 'Southbound'),
(8, '01:35 PM', 'On Time', ' ', 'Southbound'),
(9, '02:45 PM', 'On Time', ' ', 'Southbound'),
(10, '03:35 PM', 'On Time', ' ', 'Southbound'),
(11, '04:45 PM', 'On Time', ' ', 'Southbound'),
(12, '05:35 PM', 'On Time', ' ', 'Southbound'),
(13, '06:25 PM', 'On Time', ' ', 'Southbound'),
(14, '07:15 PM', 'On Time', ' ', 'Southbound'),
(15, '08:15 PM', 'On Time', ' ', 'Southbound'),
(16, '09:05 PM', 'On Time', ' ', 'Southbound');

-- --------------------------------------------------------

--
-- Table structure for table `tutuban_nichols`
--

CREATE TABLE `tutuban_nichols` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutuban_nichols`
--

INSERT INTO `tutuban_nichols` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '06:08 AM', 'On Time', 'EMU 2', 'Southbound'),
(2, '06:32 AM', 'On Time', 'EMU 7', 'Southbound'),
(3, '07:57 AM', 'On Time', 'EMU 5', 'Southbound'),
(4, '08:28 AM', 'On Time', 'INKA 8303', 'Southbound'),
(5, '09:16 AM', 'On Time', 'KIHA White', 'Southbound'),
(6, '09:38 AM', 'On Time', 'INKA 8302', 'Southbound'),
(7, '10:38 AM', 'On Time', 'INKA 8001', 'Southbound'),
(8, '11:38 AM', 'On Time', 'EMU 2', 'Southbound'),
(9, '12:48 PM', 'On Time', 'EMU 7', 'Southbound'),
(10, '01:18 PM', 'On Time', 'INKA 8303', 'Southbound'),
(11, '03:03 PM', 'On Time', 'INKA 8104', 'Southbound'),
(12, '04:28 PM', 'On Time', 'INKA 8002', 'Southbound'),
(13, '05:28 PM', 'On Time', 'EMU 5', 'Southbound'),
(14, '06:28 PM', 'On Time', 'DMU 6', 'Southbound'),
(15, '07:09 PM', 'On Time', '', 'Southbound'),
(16, '07:51 PM', 'On Time', '', 'Southbound'),
(17, '08:38 PM', 'On Time', '', 'Southbound');

-- --------------------------------------------------------

--
-- Table structure for table `tutuban_paco`
--

CREATE TABLE `tutuban_paco` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutuban_paco`
--

INSERT INTO `tutuban_paco` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '06:55 AM', 'On Time', ' ', 'Southbound'),
(2, '07:51 AM', 'On Time', ' ', 'Southbound'),
(3, '08:21 AM', 'On Time', ' ', 'Southbound'),
(4, '08:51 AM', 'On Time', ' ', 'Southbound'),
(5, '10:01 AM', 'On Time', ' ', 'Southbound'),
(6, '11:01 AM', 'On Time', ' ', 'Southbound'),
(7, '12:01 PM', 'On Time', ' ', 'Southbound'),
(8, '01:11 PM', 'On Time', ' ', 'Southbound'),
(9, '01:41 PM', 'On Time', ' ', 'Southbound'),
(10, '03:26 PM', 'On Time', ' ', 'Southbound'),
(11, '04:51 PM', 'On Time', ' ', 'Southbound'),
(12, '05:51 PM', 'On Time', ' ', 'Southbound'),
(13, '06:51 PM', 'On Time', ' ', 'Southbound'),
(14, '08:14 PM', 'On Time', ' ', 'Southbound'),
(15, '09:01 PM', 'On Time', ' ', 'Southbound');

-- --------------------------------------------------------

--
-- Table structure for table `tutuban_pandacan`
--

CREATE TABLE `tutuban_pandacan` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutuban_pandacan`
--

INSERT INTO `tutuban_pandacan` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '06:41 AM', 'On Time', ' ', 'Southbound'),
(2, '07:05 AM', 'On Time', ' ', 'Southbound'),
(3, '08:31 AM', 'On Time', ' ', 'Southbound'),
(4, '09:01 AM', 'On Time', ' ', 'Southbound'),
(5, '10:11 AM', 'On Time', ' ', 'Southbound'),
(6, '11:11 AM', 'On Time', ' ', 'Southbound'),
(7, '12:11 PM', 'On Time', ' ', 'Southbound'),
(8, '01:21 PM', 'On Time', ' ', 'Southbound'),
(9, '01:51 PM', 'On Time', ' ', 'Southbound'),
(10, '03:56 PM', 'On Time', ' ', 'Southbound'),
(11, '05:01 PM', 'On Time', ' ', 'Southbound'),
(12, '06:01 PM', 'On Time', ' ', 'Southbound'),
(13, '07:01 PM', 'On Time', ' ', 'Southbound'),
(14, '08:24 PM', 'On Time', ' ', 'Southbound'),
(15, '09:11 PM', 'On Time', ' ', 'Southbound');

-- --------------------------------------------------------

--
-- Table structure for table `tutuban_pasayroad`
--

CREATE TABLE `tutuban_pasayroad` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutuban_pasayroad`
--

INSERT INTO `tutuban_pasayroad` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '06:19 PM', 'On Time', ' ', 'Southbound'),
(2, '06:19 AM', 'On Time', ' ', 'Southbound'),
(3, '6:43 AM', 'On Time', ' ', 'Southbound'),
(4, '08:09 AM', 'On Time', ' ', 'Southbound'),
(5, '09:23 AM', 'On Time', ' ', 'Southbound'),
(6, '09:49 AM', 'On Time', ' ', 'Southbound'),
(7, '10:49 AM', 'On Time', ' ', 'Southbound'),
(8, '11:49 AM', 'On Time', ' ', 'Southbound'),
(9, '12:59 PM', 'On Time', ' ', 'Southbound'),
(10, '01:29 PM', 'On Time', ' ', 'Southbound'),
(11, '03:14 PM', 'On Time', ' ', 'Southbound'),
(12, '04:39 PM', 'On Time', ' ', 'Southbound'),
(13, '05:39 PM', 'On Time', ' ', 'Southbound'),
(14, '06:39 PM', 'On Time', ' ', 'Southbound'),
(15, '07:16 PM', 'On Time', ' ', 'Southbound'),
(16, '08:02 PM', 'On Time', ' ', 'Southbound'),
(17, '08:49 PM', 'On Time', ' ', 'Southbound');

-- --------------------------------------------------------

--
-- Table structure for table `tutuban_sanandres`
--

CREATE TABLE `tutuban_sanandres` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutuban_sanandres`
--

INSERT INTO `tutuban_sanandres` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '06:55 AM', 'On Time', ' ', 'Southbound'),
(2, '07:51 AM', 'On Time', ' ', 'Southbound'),
(3, '08:21 AM', 'On Time', ' ', 'Southbound'),
(4, '08:51 AM', 'On Time', ' ', 'Southbound'),
(5, '10:01 AM', 'On Time', ' ', 'Southbound'),
(6, '11:01 AM', 'On Time', ' ', 'Southbound'),
(7, '12:01 PM', 'On Time', ' ', 'Southbound'),
(8, '01:11 PM', 'On Time', ' ', 'Southbound'),
(9, '01:41 PM', 'On Time', ' ', 'Southbound'),
(10, '03:26 PM', 'On Time', ' ', 'Southbound'),
(11, '04:51 PM', 'On Time', ' ', 'Southbound'),
(12, '05:51 PM', 'On Time', ' ', 'Southbound'),
(13, '06:51 PM', 'On Time', ' ', 'Southbound'),
(14, '08:14 PM', 'On Time', ' ', 'Southbound'),
(15, '09:01 PM', 'On Time', ' ', 'Southbound');

-- --------------------------------------------------------

--
-- Table structure for table `tutuban_santamesa`
--

CREATE TABLE `tutuban_santamesa` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutuban_santamesa`
--

INSERT INTO `tutuban_santamesa` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '06:45 AM', 'On Time', ' ', 'Southbound'),
(2, '07:09 AM', 'On Time', ' ', 'Southbound'),
(3, '08:35 AM', 'On Time', ' ', 'Southbound'),
(4, '09:05 AM', 'On Time', ' ', 'Southbound'),
(5, '10:15 AM', 'On Time', ' ', 'Southbound'),
(6, '11:15 AM', 'On Time', ' ', 'Southbound'),
(7, '12:15 PM', 'On Time', ' ', 'Southbound'),
(8, '01:25 PM', 'On Time', ' ', 'Southbound'),
(9, '01:55 PM', 'On Time', ' ', 'Southbound'),
(10, '03:40 PM', 'On Time', ' ', 'Southbound'),
(11, '05:05 PM', 'On Time', ' ', 'Southbound'),
(12, '06:05 PM', 'On Time', ' ', 'Southbound'),
(13, '07:05 PM', 'On Time', ' ', 'Southbound'),
(14, '08:28 PM', 'On Time', ' ', 'Southbound'),
(15, '09:15 PM', 'On Time', ' ', 'Southbound');

-- --------------------------------------------------------

--
-- Table structure for table `tutuban_sucat`
--

CREATE TABLE `tutuban_sucat` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutuban_sucat`
--

INSERT INTO `tutuban_sucat` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '05:43 AM', 'On Time', ' ', 'Southbound'),
(2, '06:07 AM', 'On Time', ' ', 'Southbound'),
(3, '07:33 AM', 'On Time', ' ', 'Southbound'),
(4, '08:03 AM', 'On Time', ' ', 'Southbound'),
(5, '09:13 AM', 'On Time', ' ', 'Southbound'),
(6, '10:13 AM', 'On Time', ' ', 'Southbound'),
(7, '11:13 AM', 'On Time', ' ', 'Southbound'),
(8, '12:23 PM', 'On Time', ' ', 'Southbound'),
(9, '02:38 PM', 'On Time', ' ', 'Southbound'),
(10, '04:03 PM', 'On Time', ' ', 'Southbound'),
(11, '05:03 PM', 'On Time', ' ', 'Southbound'),
(12, '06:03 PM', 'On Time', ' ', 'Southbound'),
(13, '07:26 PM', 'On Time', ' ', 'Southbound'),
(14, '08:13 PM', 'On Time', ' ', 'Southbound');

-- --------------------------------------------------------

--
-- Table structure for table `tutuban_vitocruz`
--

CREATE TABLE `tutuban_vitocruz` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutuban_vitocruz`
--

INSERT INTO `tutuban_vitocruz` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '06:51 AM', 'On Time', ' ', 'Southbound'),
(2, '07:47 AM ', 'On Time', ' ', 'Southbound'),
(3, '08:17 AM', 'On Time', ' ', 'Southbound'),
(4, '08:47 AM', 'On Time', ' ', 'Southbound'),
(5, '09:30 AM', 'On Time', ' ', 'Southbound'),
(6, '09:57 AM', 'On Time', ' ', 'Southbound'),
(7, '10:57 AM', 'On Time', ' ', 'Southbound'),
(8, '11:57 AM', 'On Time', ' ', 'Southbound'),
(9, '01:07 PM', 'On Time', ' ', 'Southbound'),
(10, '01:37 PM', 'On Time', ' ', 'Southbound'),
(11, '03:22 PM', 'On Time', ' ', 'Southbound'),
(12, '04:47 PM', 'On Time', ' ', 'Southbound'),
(13, '05:47 PM', 'On Time', ' ', 'Southbound'),
(14, '06:47 PM', 'On Time', ' ', 'Southbound'),
(15, '07:23 PM', 'On Time', ' ', 'Southbound'),
(16, '08:10 PM', 'On Time', ' ', 'Southbound'),
(17, '08:57 PM', 'On Time', ' ', 'Southbound');

-- --------------------------------------------------------

--
-- Table structure for table `vitocruz`
--

CREATE TABLE `vitocruz` (
  `schedule_id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `train` varchar(10) NOT NULL,
  `direction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vitocruz`
--

INSERT INTO `vitocruz` (`schedule_id`, `time`, `status`, `train`, `direction`) VALUES
(1, '05:47 AM', 'On Time', ' ', 'Northbound'),
(2, '06:47 AM', 'On Time', ' ', 'Northbound'),
(3, '07:58 AM', 'On Time', ' ', 'Northbound'),
(4, '08:13 AM', 'On Time', ' ', 'Northbound'),
(5, '08:57 AM', 'On Time', ' ', 'Northbound'),
(6, '09:57 AM', 'On Time', ' ', 'Northbound'),
(7, '11:07 AM ', 'On Time', ' ', 'Northbound'),
(8, '12:07 PM', 'On Time', ' ', 'Northbound'),
(9, '01:07 PM', 'On Time', ' ', 'Northbound'),
(10, '02:47 PM', 'On Time', ' ', 'Northbound'),
(11, '03:47 PM', 'On Time', ' ', 'Northbound'),
(12, '04:47 PM', 'On Time', ' ', 'Northbound'),
(13, '05:47 PM', 'On Time', ' ', 'Northbound'),
(14, '06:57 PM', 'On Time', ' ', 'Northbound'),
(15, '06:12 PM', 'On Time', ' ', 'Northbound');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `alabang`
--
ALTER TABLE `alabang`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `bicutan`
--
ALTER TABLE `bicutan`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `bluementritt`
--
ALTER TABLE `bluementritt`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `buendia`
--
ALTER TABLE `buendia`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `comments_complaints`
--
ALTER TABLE `comments_complaints`
  ADD PRIMARY KEY (`complaints_id`);

--
-- Indexes for table `edsa`
--
ALTER TABLE `edsa`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `españa`
--
ALTER TABLE `españa`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `faretable`
--
ALTER TABLE `faretable`
  ADD PRIMARY KEY (`fare_id`);

--
-- Indexes for table `fti`
--
ALTER TABLE `fti`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indexes for table `laonlaan`
--
ALTER TABLE `laonlaan`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `nichols`
--
ALTER TABLE `nichols`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `paco`
--
ALTER TABLE `paco`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `pandacan`
--
ALTER TABLE `pandacan`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `pasayroad`
--
ALTER TABLE `pasayroad`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `sanandres`
--
ALTER TABLE `sanandres`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `santamesa`
--
ALTER TABLE `santamesa`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`station_id`);

--
-- Indexes for table `sucat`
--
ALTER TABLE `sucat`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `trains`
--
ALTER TABLE `trains`
  ADD PRIMARY KEY (`train_id`),
  ADD KEY `current_employee_id` (`current_employee_id`);

--
-- Indexes for table `train_status_updates`
--
ALTER TABLE `train_status_updates`
  ADD PRIMARY KEY (`update_id`),
  ADD KEY `train_id` (`train_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tutuban`
--
ALTER TABLE `tutuban`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tutuban_bicutan`
--
ALTER TABLE `tutuban_bicutan`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tutuban_bluementritt`
--
ALTER TABLE `tutuban_bluementritt`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tutuban_buendia`
--
ALTER TABLE `tutuban_buendia`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tutuban_edsa`
--
ALTER TABLE `tutuban_edsa`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tutuban_españa`
--
ALTER TABLE `tutuban_españa`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tutuban_fti`
--
ALTER TABLE `tutuban_fti`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tutuban_laonlaan`
--
ALTER TABLE `tutuban_laonlaan`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tutuban_nichols`
--
ALTER TABLE `tutuban_nichols`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tutuban_paco`
--
ALTER TABLE `tutuban_paco`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tutuban_pandacan`
--
ALTER TABLE `tutuban_pandacan`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tutuban_pasayroad`
--
ALTER TABLE `tutuban_pasayroad`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tutuban_sanandres`
--
ALTER TABLE `tutuban_sanandres`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tutuban_santamesa`
--
ALTER TABLE `tutuban_santamesa`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tutuban_sucat`
--
ALTER TABLE `tutuban_sucat`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tutuban_vitocruz`
--
ALTER TABLE `tutuban_vitocruz`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `vitocruz`
--
ALTER TABLE `vitocruz`
  ADD PRIMARY KEY (`schedule_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `alabang`
--
ALTER TABLE `alabang`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bicutan`
--
ALTER TABLE `bicutan`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bluementritt`
--
ALTER TABLE `bluementritt`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `buendia`
--
ALTER TABLE `buendia`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `comments_complaints`
--
ALTER TABLE `comments_complaints`
  MODIFY `complaints_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `edsa`
--
ALTER TABLE `edsa`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `españa`
--
ALTER TABLE `españa`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `faretable`
--
ALTER TABLE `faretable`
  MODIFY `fare_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;

--
-- AUTO_INCREMENT for table `fti`
--
ALTER TABLE `fti`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inquiry_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laonlaan`
--
ALTER TABLE `laonlaan`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `nichols`
--
ALTER TABLE `nichols`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `paco`
--
ALTER TABLE `paco`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pandacan`
--
ALTER TABLE `pandacan`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pasayroad`
--
ALTER TABLE `pasayroad`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sanandres`
--
ALTER TABLE `sanandres`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `santamesa`
--
ALTER TABLE `santamesa`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `station_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `sucat`
--
ALTER TABLE `sucat`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2024000026;

--
-- AUTO_INCREMENT for table `trains`
--
ALTER TABLE `trains`
  MODIFY `train_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `train_status_updates`
--
ALTER TABLE `train_status_updates`
  MODIFY `update_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `tutuban`
--
ALTER TABLE `tutuban`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tutuban_bicutan`
--
ALTER TABLE `tutuban_bicutan`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tutuban_bluementritt`
--
ALTER TABLE `tutuban_bluementritt`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tutuban_buendia`
--
ALTER TABLE `tutuban_buendia`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tutuban_edsa`
--
ALTER TABLE `tutuban_edsa`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tutuban_españa`
--
ALTER TABLE `tutuban_españa`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tutuban_fti`
--
ALTER TABLE `tutuban_fti`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tutuban_laonlaan`
--
ALTER TABLE `tutuban_laonlaan`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tutuban_nichols`
--
ALTER TABLE `tutuban_nichols`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tutuban_paco`
--
ALTER TABLE `tutuban_paco`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tutuban_pandacan`
--
ALTER TABLE `tutuban_pandacan`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tutuban_pasayroad`
--
ALTER TABLE `tutuban_pasayroad`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tutuban_sanandres`
--
ALTER TABLE `tutuban_sanandres`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tutuban_santamesa`
--
ALTER TABLE `tutuban_santamesa`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tutuban_sucat`
--
ALTER TABLE `tutuban_sucat`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tutuban_vitocruz`
--
ALTER TABLE `tutuban_vitocruz`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `vitocruz`
--
ALTER TABLE `vitocruz`
  MODIFY `schedule_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `fk_employee` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`);

--
-- Constraints for table `trains`
--
ALTER TABLE `trains`
  ADD CONSTRAINT `current_employee_id` FOREIGN KEY (`current_employee_id`) REFERENCES `employees` (`employee_id`),
  ADD CONSTRAINT `fk_current_employee` FOREIGN KEY (`current_employee_id`) REFERENCES `employees` (`employee_id`);

--
-- Constraints for table `train_status_updates`
--
ALTER TABLE `train_status_updates`
  ADD CONSTRAINT `train_status_updates_ibfk_1` FOREIGN KEY (`train_id`) REFERENCES `trains` (`train_id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `accounts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
