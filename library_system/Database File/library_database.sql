-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2021 at 12:17 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `books_list`
--

CREATE TABLE `books_list` (
  `books_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `year_published` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books_list`
--

INSERT INTO `books_list` (`books_id`, `title`, `author`, `year_published`, `status`) VALUES
(1, 'The Fundamental of Programming', 'Bill Gates', '2001', 'Good'),
(2, 'Filipino sa pag-sulat', 'Menardo Jevara', '2008', 'Damaged'),
(3, 'Understanding of Machine Learning', 'Bill Gates', '2005', 'Good'),
(4, 'The Basic Fundamental of Web Development', 'Steve Jobs', '2005', 'Borrowed'),
(5, 'Business Management', 'Mark Douglas', '2009', 'Damaged'),
(6, 'The Basic Fundamental of Machine Learning', 'Park Boo Jun', '2015', 'Good'),
(7, 'Diwang Filipino sa pag-basa', 'Mark Douglas', '2015', 'Damaged'),
(8, 'Math 101', 'Bill Gates', '2010', 'Damaged');

-- --------------------------------------------------------

--
-- Table structure for table `borrows_list`
--

CREATE TABLE `borrows_list` (
  `borrows_id` int(11) NOT NULL,
  `books_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrows_list`
--

INSERT INTO `borrows_list` (`borrows_id`, `books_id`, `users_id`, `status`, `date_added`) VALUES
(1, 1, 2, 'Returned', '2021-01-29 15:04:04'),
(2, 2, 1, 'Returned', '2021-01-30 14:43:09'),
(3, 2, 1, 'Returned', '2021-01-30 16:39:15'),
(4, 2, 1, 'Returned', '2021-01-30 16:48:08'),
(5, 5, 1, 'Returned', '2021-01-31 12:36:40'),
(6, 2, 1, 'Returned', '2021-01-31 12:42:03'),
(7, 5, 1, 'Returned', '2021-01-31 12:45:23'),
(8, 5, 2, 'Returned', '2021-01-31 12:49:30'),
(9, 3, 3, 'Returned', '2021-01-31 13:11:54'),
(10, 4, 2, 'Returned', '2021-01-31 13:13:42'),
(11, 2, 3, 'Returned', '2021-01-31 13:34:34'),
(12, 2, 3, 'Returned', '2021-01-31 14:06:16'),
(13, 1, 2, 'Returned', '2021-01-31 14:16:47'),
(14, 6, 2, 'Returned', '2021-01-31 14:32:41'),
(15, 3, 2, 'Returned', '2021-01-31 14:35:11'),
(16, 5, 4, 'Returned', '2021-01-31 14:38:03'),
(17, 7, 3, 'Returned', '2021-01-31 15:56:46'),
(18, 5, 3, 'Returned', '2021-01-31 16:46:28'),
(19, 3, 3, 'Returned', '2021-01-31 16:52:17'),
(20, 6, 4, 'Returned', '2021-02-01 08:54:59'),
(21, 4, 4, 'Returned', '2021-02-01 08:55:00'),
(22, 6, 4, 'Returned', '2021-02-01 08:57:36'),
(23, 4, 4, 'Returned', '2021-02-01 08:57:37'),
(24, 1, 4, 'Returned', '2021-02-01 08:57:39'),
(25, 3, 4, 'Returned', '2021-02-01 08:57:40'),
(26, 5, 4, 'Returned', '2021-02-01 09:00:12'),
(27, 7, 4, 'Returned', '2021-02-01 09:00:13'),
(28, 3, 4, 'Returned', '2021-02-01 09:00:15'),
(29, 1, 4, 'Returned', '2021-02-01 09:00:17'),
(30, 5, 3, 'Returned', '2021-02-01 09:02:44'),
(31, 5, 3, 'Returned', '2021-02-01 09:19:46'),
(32, 7, 3, 'Returned', '2021-02-01 09:19:48'),
(33, 1, 3, 'Returned', '2021-02-01 09:21:15'),
(34, 3, 3, 'Returned', '2021-02-01 09:21:16'),
(35, 4, 3, 'Returned', '2021-02-01 09:21:17'),
(36, 5, 2, 'Returned', '2021-02-01 10:05:12'),
(37, 5, 2, 'Returned', '2021-02-01 13:32:20'),
(38, 7, 2, 'Returned', '2021-02-01 13:32:21'),
(39, 2, 2, 'Returned', '2021-02-01 13:32:23'),
(40, 5, 2, 'Returned', '2021-02-01 14:18:10'),
(41, 7, 2, 'Returned', '2021-02-01 14:18:11'),
(42, 2, 2, 'Returned', '2021-02-01 14:18:13'),
(43, 5, 3, 'Returned', '2021-02-01 14:21:27'),
(44, 7, 3, 'Returned', '2021-02-01 14:21:28'),
(45, 5, 3, 'Returned', '2021-02-01 14:22:53'),
(46, 5, 3, 'Returned', '2021-02-01 14:24:55'),
(47, 7, 2, 'Returned', '2021-02-01 14:25:01'),
(48, 5, 3, 'Returned', '2021-02-01 14:27:25'),
(49, 7, 3, 'Returned', '2021-02-01 14:27:26'),
(50, 2, 3, 'Returned', '2021-02-01 14:27:26'),
(51, 5, 3, 'Returned', '2021-02-01 14:30:21'),
(52, 7, 3, 'Returned', '2021-02-01 14:30:21'),
(53, 2, 3, 'Returned', '2021-02-01 14:30:22'),
(54, 5, 2, 'Returned', '2021-02-01 14:33:06'),
(55, 7, 2, 'Returned', '2021-02-01 14:33:07'),
(56, 2, 2, 'Returned', '2021-02-01 14:33:07'),
(57, 5, 3, 'Returned', '2021-02-01 17:49:52'),
(58, 7, 3, 'Returned', '2021-02-01 17:49:53'),
(59, 5, 3, 'Returned', '2021-02-02 05:47:10'),
(60, 7, 3, 'Returned', '2021-02-02 05:47:11'),
(61, 2, 3, 'Returned', '2021-02-02 06:05:26'),
(62, 5, 3, 'Returned', '2021-02-02 06:05:26'),
(63, 7, 3, 'Returned', '2021-02-02 06:05:26'),
(64, 8, 3, 'Returned', '2021-02-02 06:05:31'),
(65, 5, 3, 'Returned', '2021-02-02 07:27:22'),
(66, 7, 3, 'Returned', '2021-02-02 07:27:23'),
(67, 5, 3, 'Returned', '2021-02-02 07:29:20'),
(68, 7, 3, 'Returned', '2021-02-02 07:29:21'),
(69, 5, 3, 'Returned', '2021-02-02 07:31:47'),
(70, 7, 3, 'Returned', '2021-02-02 07:31:47'),
(71, 5, 3, 'Returned', '2021-02-02 07:33:55'),
(72, 7, 3, 'Returned', '2021-02-02 07:33:56'),
(73, 5, 2, 'Returned', '2021-02-02 07:36:10'),
(74, 7, 2, 'Returned', '2021-02-02 07:36:10'),
(75, 5, 4, 'Returned', '2021-02-02 07:37:04'),
(76, 7, 4, 'Returned', '2021-02-02 07:37:05'),
(77, 5, 3, 'Returned', '2021-02-02 15:16:34'),
(78, 7, 3, 'Returned', '2021-02-02 15:16:35'),
(79, 2, 3, 'Returned', '2021-02-02 15:16:36'),
(80, 5, 3, 'Returned', '2021-02-02 15:18:19'),
(81, 7, 3, 'Returned', '2021-02-02 15:18:20'),
(82, 5, 2, 'Returned', '2021-02-02 15:19:05'),
(83, 7, 2, 'Returned', '2021-02-02 15:19:06'),
(84, 2, 2, 'Returned', '2021-02-02 15:19:06'),
(85, 8, 2, 'Returned', '2021-02-02 15:19:07'),
(86, 5, 2, 'Returned', '2021-02-02 15:31:56'),
(87, 7, 2, 'Returned', '2021-02-02 15:31:57'),
(88, 2, 2, 'Returned', '2021-02-02 15:31:58'),
(89, 8, 2, 'Returned', '2021-02-02 15:31:59'),
(90, 6, 2, 'Returned', '2021-02-02 15:32:00'),
(91, 4, 2, 'Returned', '2021-02-02 15:32:01'),
(92, 1, 2, 'Returned', '2021-02-02 15:32:03'),
(93, 3, 2, 'Returned', '2021-02-02 15:32:06'),
(94, 5, 3, 'Returned', '2021-02-02 15:33:12'),
(95, 7, 3, 'Returned', '2021-02-02 15:33:12'),
(96, 2, 3, 'Returned', '2021-02-02 15:33:13'),
(97, 8, 3, 'Returned', '2021-02-02 15:33:14'),
(98, 6, 3, 'Returned', '2021-02-02 15:33:15'),
(99, 5, 4, 'Returned', '2021-02-02 15:36:14'),
(100, 2, 4, 'Returned', '2021-02-02 15:36:15'),
(101, 8, 4, 'Returned', '2021-02-02 15:36:15'),
(102, 5, 3, 'Returned', '2021-02-02 15:40:25'),
(103, 7, 3, 'Returned', '2021-02-02 15:40:25'),
(104, 2, 3, 'Returned', '2021-02-02 15:40:26'),
(105, 8, 3, 'Returned', '2021-02-02 15:40:26'),
(106, 5, 3, 'Returned', '2021-02-02 15:42:43'),
(107, 7, 3, 'Returned', '2021-02-02 15:42:44'),
(108, 2, 3, 'Returned', '2021-02-02 15:42:45'),
(109, 5, 3, 'Returned', '2021-02-02 17:27:33'),
(110, 7, 3, 'Returned', '2021-02-02 17:27:34'),
(111, 2, 3, 'Returned', '2021-02-02 17:27:34'),
(112, 5, 3, 'Returned', '2021-02-03 06:35:49'),
(113, 7, 3, 'Returned', '2021-02-03 06:35:50'),
(114, 8, 3, 'Returned', '2021-02-03 06:35:52'),
(115, 5, 3, 'Returned', '2021-02-03 06:38:15'),
(116, 7, 3, 'Returned', '2021-02-03 06:38:16'),
(117, 2, 3, 'Returned', '2021-02-03 06:38:16'),
(118, 8, 3, 'Returned', '2021-02-03 06:38:17'),
(119, 5, 2, 'Returned', '2021-02-03 06:39:24'),
(120, 7, 2, 'Returned', '2021-02-03 06:39:25'),
(121, 2, 2, 'Returned', '2021-02-03 06:39:26'),
(122, 8, 2, 'Returned', '2021-02-03 06:39:26'),
(123, 6, 2, 'Returned', '2021-02-03 06:39:28'),
(124, 5, 3, 'Returned', '2021-02-03 06:40:25'),
(125, 7, 3, 'Returned', '2021-02-03 06:40:25'),
(126, 2, 3, 'Returned', '2021-02-03 06:40:26'),
(127, 8, 3, 'Returned', '2021-02-03 06:40:26'),
(128, 6, 3, 'Returned', '2021-02-03 06:40:27'),
(129, 4, 3, 'Returned', '2021-02-03 06:40:27'),
(130, 5, 3, 'Returned', '2021-02-04 06:22:08'),
(131, 7, 3, 'Returned', '2021-02-04 06:22:08'),
(132, 2, 3, 'Returned', '2021-02-04 06:22:09'),
(133, 8, 3, 'Returned', '2021-02-04 06:22:10'),
(134, 5, 2, 'Returned', '2021-02-11 19:56:39'),
(135, 7, 2, 'Returned', '2021-02-11 19:56:39'),
(136, 2, 2, 'Returned', '2021-02-11 19:56:40'),
(137, 8, 2, 'Returned', '2021-02-11 19:56:40'),
(138, 5, 3, 'Returned', '2021-02-11 20:07:12'),
(139, 7, 3, 'Returned', '2021-02-11 20:07:12'),
(140, 2, 3, 'Returned', '2021-02-11 20:07:13'),
(141, 8, 3, 'Returned', '2021-02-11 20:07:14'),
(142, 5, 3, 'Returned', '2021-02-12 14:10:13'),
(143, 7, 3, 'Returned', '2021-02-12 14:10:14'),
(144, 2, 3, 'Returned', '2021-02-12 14:10:15'),
(145, 5, 2, 'Returned', '2021-02-12 14:12:38'),
(146, 7, 2, 'Returned', '2021-02-12 14:12:39'),
(147, 2, 2, 'Returned', '2021-02-12 14:12:39'),
(148, 8, 2, 'Returned', '2021-02-12 14:12:40'),
(149, 6, 2, 'Returned', '2021-02-12 14:12:40'),
(150, 5, 2, 'Returned', '2021-02-12 14:18:41'),
(151, 7, 2, 'Returned', '2021-02-12 14:18:42'),
(152, 5, 3, 'Returned', '2021-02-12 14:24:07'),
(153, 7, 3, 'Returned', '2021-02-12 14:24:07'),
(154, 2, 3, 'Returned', '2021-02-12 14:24:08'),
(155, 5, 4, 'Lost', '2021-02-12 14:27:29'),
(156, 7, 4, 'Lost', '2021-02-12 14:27:30'),
(157, 2, 4, 'Lost', '2021-02-12 14:27:30'),
(158, 8, 4, 'Lost', '2021-02-12 14:27:31'),
(159, 6, 4, 'Lost', '2021-02-12 14:37:11'),
(160, 4, 4, 'Lost', '2021-02-12 14:37:11'),
(161, 1, 4, 'Lost', '2021-02-12 14:37:12'),
(162, 3, 2, 'Lost', '2021-02-12 14:39:54'),
(163, 5, 2, 'Lost', '2021-02-12 14:42:15'),
(164, 7, 2, 'Lost', '2021-02-12 14:42:15'),
(165, 2, 2, 'Lost', '2021-02-12 14:42:16'),
(166, 5, 3, 'Damaged', '2021-02-12 14:46:52'),
(167, 7, 3, 'Damaged', '2021-02-12 14:46:52'),
(168, 2, 3, 'Damaged', '2021-02-12 14:46:53'),
(169, 8, 3, 'Damaged', '2021-02-12 14:46:55'),
(170, 5, 5, 'Damaged', '2021-02-12 14:49:32'),
(171, 7, 5, 'Damaged', '2021-02-12 14:49:33'),
(172, 2, 5, 'Damaged', '2021-02-12 14:49:33'),
(173, 8, 5, 'Damaged', '2021-02-12 14:49:34'),
(174, 6, 3, 'Returned', '2021-02-12 14:55:50'),
(175, 4, 3, 'Returned', '2021-02-12 14:55:51'),
(176, 6, 2, 'Returned', '2021-02-23 06:08:41'),
(177, 4, 2, 'Returned', '2021-02-23 06:08:42');

-- --------------------------------------------------------

--
-- Table structure for table `returns_list`
--

CREATE TABLE `returns_list` (
  `returns_id` int(11) NOT NULL,
  `borrow_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returns_list`
--

INSERT INTO `returns_list` (`returns_id`, `borrow_id`, `date_added`, `status`) VALUES
(1, 1, '2021-02-01 00:16:44', 'Returned'),
(2, 2, '2021-02-01 00:16:44', 'Returned'),
(3, 3, '2021-02-01 00:17:09', 'Returned'),
(4, 4, '2021-02-01 00:17:09', 'Returned'),
(5, 23, '2021-02-01 16:59:20', 'Returned'),
(6, 22, '2021-02-01 16:59:31', 'Returned'),
(7, 29, '2021-02-01 17:00:28', 'Returned'),
(8, 28, '2021-02-01 17:00:31', 'Returned'),
(9, 27, '2021-02-01 17:00:32', 'Returned'),
(10, 26, '2021-02-01 17:00:33', 'Returned'),
(11, 30, '2021-02-01 17:02:52', 'Returned'),
(12, 32, '2021-02-01 17:20:01', 'Returned'),
(13, 31, '2021-02-01 17:20:02', 'Returned'),
(14, 35, '2021-02-01 17:21:24', 'Returned'),
(15, 34, '2021-02-01 17:21:32', 'Returned'),
(16, 33, '2021-02-01 17:21:37', 'Returned'),
(17, 36, '2021-02-01 18:05:25', 'Returned'),
(18, 39, '2021-02-01 21:32:36', 'Returned'),
(19, 38, '2021-02-01 21:32:39', 'Returned'),
(20, 37, '2021-02-01 21:32:41', 'Returned'),
(21, 42, '2021-02-01 22:18:24', 'Returned'),
(22, 41, '2021-02-01 22:18:28', 'Returned'),
(23, 40, '2021-02-01 22:18:32', 'Returned'),
(24, 44, '2021-02-01 22:21:35', 'Returned'),
(25, 43, '2021-02-01 22:21:37', 'Returned'),
(26, 455, '2021-02-01 22:22:59', 'Returned'),
(27, 455, '2021-02-01 22:23:00', 'Returned'),
(28, 455, '2021-02-01 22:23:01', 'Returned'),
(29, 45, '2021-02-01 22:24:42', 'Returned'),
(30, 47, '2021-02-01 22:25:08', 'Returned'),
(31, 46, '2021-02-01 22:25:16', 'Returned'),
(32, 49, '2021-02-01 22:27:38', 'Returned'),
(33, 50, '2021-02-01 22:27:41', 'Returned'),
(34, 48, '2021-02-01 22:27:48', 'Returned'),
(35, 53, '2021-02-01 22:30:29', 'Returned'),
(36, 51, '2021-02-01 22:30:37', 'Returned'),
(37, 52, '2021-02-01 22:30:45', 'Returned'),
(38, 55, '2021-02-01 22:33:13', 'Returned'),
(39, 56, '2021-02-01 22:33:21', 'Returned'),
(40, 54, '2021-02-01 22:36:25', 'Returned'),
(41, 58, '2021-02-02 01:51:04', 'Returned'),
(42, 57, '2021-02-02 01:51:10', 'Returned'),
(43, 60, '2021-02-02 13:52:06', 'Returned'),
(44, 59, '2021-02-02 13:52:10', 'Returned'),
(45, 64, '2021-02-02 14:06:33', 'Returned'),
(46, 61, '2021-02-02 14:08:35', 'Returned'),
(47, 62, '2021-02-02 14:08:44', 'Returned'),
(48, 63, '2021-02-02 14:08:45', 'Returned'),
(49, 66, '2021-02-02 15:27:30', 'Returned'),
(50, 65, '2021-02-02 15:27:52', 'Returned'),
(51, 68, '2021-02-02 15:29:27', 'Returned'),
(52, 67, '2021-02-02 15:30:12', 'Returned'),
(53, 69, '2021-02-02 15:31:54', 'Returned'),
(54, 70, '2021-02-02 15:31:56', 'Returned'),
(55, 72, '2021-02-02 15:34:02', 'Returned'),
(56, 71, '2021-02-02 15:34:04', 'Returned'),
(57, 73, '2021-02-02 15:36:16', 'Returned'),
(58, 74, '2021-02-02 15:36:18', 'Returned'),
(59, 76, '2021-02-02 15:37:16', 'Returned'),
(60, 75, '2021-02-02 15:37:19', 'Returned'),
(61, 79, '2021-02-02 23:17:45', 'Returned'),
(62, 77, '2021-02-02 23:17:46', 'Returned'),
(63, 78, '2021-02-02 23:17:46', 'Returned'),
(64, 81, '2021-02-02 23:18:28', 'Returned'),
(65, 80, '2021-02-02 23:18:29', 'Returned'),
(66, 85, '2021-02-02 23:19:15', 'Returned'),
(67, 83, '2021-02-02 23:19:16', 'Returned'),
(68, 84, '2021-02-02 23:19:17', 'Returned'),
(69, 82, '2021-02-02 23:19:18', 'Returned'),
(70, 93, '2021-02-02 23:32:19', 'Returned'),
(71, 92, '2021-02-02 23:32:20', 'Returned'),
(72, 91, '2021-02-02 23:32:21', 'Returned'),
(73, 90, '2021-02-02 23:32:22', 'Returned'),
(74, 89, '2021-02-02 23:32:23', 'Returned'),
(75, 88, '2021-02-02 23:32:24', 'Returned'),
(76, 87, '2021-02-02 23:32:26', 'Returned'),
(77, 86, '2021-02-02 23:32:27', 'Returned'),
(78, 98, '2021-02-02 23:33:22', 'Returned'),
(79, 97, '2021-02-02 23:33:30', 'Returned'),
(80, 94, '2021-02-02 23:33:34', 'Returned'),
(81, 95, '2021-02-02 23:33:37', 'Returned'),
(82, 96, '2021-02-02 23:33:41', 'Returned'),
(83, 99, '2021-02-02 23:36:22', 'Returned'),
(84, 101, '2021-02-02 23:36:24', 'Returned'),
(85, 100, '2021-02-02 23:36:27', 'Returned'),
(86, 103, '2021-02-02 23:40:32', 'Returned'),
(87, 102, '2021-02-02 23:40:34', 'Returned'),
(88, 105, '2021-02-02 23:40:35', 'Returned'),
(89, 104, '2021-02-02 23:40:36', 'Returned'),
(90, 106, '2021-02-02 23:42:52', 'Returned'),
(91, 107, '2021-02-02 23:42:55', 'Returned'),
(92, 108, '2021-02-02 23:42:58', 'Returned'),
(93, 111, '2021-02-03 01:27:47', 'Returned'),
(94, 109, '2021-02-03 01:27:49', 'Returned'),
(95, 110, '2021-02-03 01:28:26', 'Returned'),
(96, 112, '2021-02-03 14:36:47', 'Returned'),
(97, 113, '2021-02-03 14:36:53', 'Returned'),
(98, 114, '2021-02-03 14:37:15', 'Returned'),
(99, 118, '2021-02-03 14:38:23', 'Returned'),
(100, 116, '2021-02-03 14:38:27', 'Returned'),
(101, 115, '2021-02-03 14:38:30', 'Returned'),
(102, 117, '2021-02-03 14:38:33', 'Returned'),
(103, 121, '2021-02-03 14:39:35', 'Returned'),
(104, 119, '2021-02-03 14:39:41', 'Returned'),
(105, 120, '2021-02-03 14:39:42', 'Returned'),
(106, 122, '2021-02-03 14:39:45', 'Returned'),
(107, 123, '2021-02-03 14:39:46', 'Returned'),
(108, 129, '2021-02-03 14:40:54', 'Returned'),
(109, 126, '2021-02-03 14:40:54', 'Returned'),
(110, 127, '2021-02-03 14:40:55', 'Returned'),
(111, 124, '2021-02-03 14:40:56', 'Returned'),
(112, 125, '2021-02-03 14:40:57', 'Returned'),
(113, 128, '2021-02-03 14:41:45', 'Returned'),
(114, 131, '2021-02-04 14:22:18', 'Returned'),
(115, 130, '2021-02-04 14:22:19', 'Returned'),
(116, 132, '2021-02-04 14:22:20', 'Returned'),
(117, 133, '2021-02-04 14:22:20', 'Returned'),
(118, 136, '2021-02-12 04:06:35', 'Returned'),
(119, 137, '2021-02-12 04:06:41', 'Returned'),
(120, 134, '2021-02-12 04:06:42', 'Returned'),
(121, 135, '2021-02-12 04:06:43', 'Returned'),
(122, 139, '2021-02-12 04:07:19', 'Returned'),
(123, 138, '2021-02-12 04:07:20', 'Returned'),
(124, 140, '2021-02-12 04:07:21', 'Returned'),
(125, 141, '2021-02-12 04:07:22', 'Returned'),
(126, 144, '2021-02-12 22:10:36', 'Returned'),
(127, 142, '2021-02-12 22:10:38', 'Returned'),
(128, 143, '2021-02-12 22:10:38', 'Returned'),
(129, 147, '2021-02-12 22:12:46', 'Returned'),
(130, 146, '2021-02-12 22:12:47', 'Returned'),
(131, 149, '2021-02-12 22:12:48', 'Returned'),
(132, 148, '2021-02-12 22:12:48', 'Returned'),
(133, 145, '2021-02-12 22:12:53', 'Returned'),
(134, 0, '2021-02-12 22:21:15', 'LOST'),
(135, 0, '2021-02-12 22:21:20', 'LOST'),
(136, 0, '2021-02-12 22:22:08', 'Lost'),
(137, 0, '2021-02-12 22:22:09', 'Lost'),
(138, 150, '2021-02-12 22:22:45', 'Returned'),
(139, 151, '2021-02-12 22:22:46', 'Returned'),
(140, 0, '2021-02-12 22:26:42', 'Lost'),
(141, 0, '2021-02-12 22:26:46', 'Lost'),
(142, 0, '2021-02-12 22:26:50', 'Lost'),
(143, 153, '2021-02-12 22:26:53', 'Returned'),
(144, 152, '2021-02-12 22:26:53', 'Returned'),
(145, 154, '2021-02-12 22:26:54', 'Returned'),
(154, 164, '2021-02-12 22:44:56', 'Damaged'),
(155, 163, '2021-02-12 22:45:00', 'Damaged'),
(156, 167, '2021-02-12 22:47:00', 'Damaged'),
(157, 166, '2021-02-12 22:47:01', 'Damaged'),
(158, 168, '2021-02-12 22:47:03', 'Damaged'),
(159, 169, '2021-02-12 22:47:03', 'Damaged'),
(160, 170, '2021-02-12 22:49:43', 'Damaged'),
(161, 172, '2021-02-12 22:49:44', 'Damaged'),
(162, 171, '2021-02-12 22:49:44', 'Damaged'),
(163, 173, '2021-02-12 22:49:45', 'Damaged'),
(164, 174, '2021-02-23 14:08:26', 'Returned'),
(165, 175, '2021-02-23 14:08:27', 'Returned'),
(166, 177, '2021-02-23 14:08:58', 'Returned'),
(167, 176, '2021-02-23 14:08:59', 'Returned');

-- --------------------------------------------------------

--
-- Table structure for table `users_list`
--

CREATE TABLE `users_list` (
  `users_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userpassword` varchar(255) NOT NULL,
  `access` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_list`
--

INSERT INTO `users_list` (`users_id`, `name`, `email`, `username`, `userpassword`, `access`, `status`) VALUES
(1, 'Mobarak M. Dimalotang', 'mobarakguro@gmail.com', 'admin', 'admin', 'administrator', 'Deactivate'),
(2, 'Sittie Fathma C. Hadji Bashim', 'sittie_bash1114@gmail.com', 'bash1146', 'darulkhair', 'students', 'Activate'),
(3, 'Najib M. Sultan', 'najibsultan16@yahoo.com', 'pandagaming0001', 'darulkhair', 'students', 'Activate'),
(4, 'Amanie M. Dimalotang', 'amanieguro@gmail.com', 'amanie11146', 'darulkhair', 'students', 'Activate'),
(5, 'Clarissa S. Adriano', 'clarissa11146@gmail.com', 'clarissa11146', 'darulkhair', 'students', 'Activate'),
(6, 'Mohammad M. Dimalotang', 'mohammadmegavip@gmail.com', 'mohammad11146', 'darulkhair', 'students', 'Activate');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books_list`
--
ALTER TABLE `books_list`
  ADD PRIMARY KEY (`books_id`);

--
-- Indexes for table `borrows_list`
--
ALTER TABLE `borrows_list`
  ADD PRIMARY KEY (`borrows_id`);

--
-- Indexes for table `returns_list`
--
ALTER TABLE `returns_list`
  ADD PRIMARY KEY (`returns_id`);

--
-- Indexes for table `users_list`
--
ALTER TABLE `users_list`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books_list`
--
ALTER TABLE `books_list`
  MODIFY `books_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `borrows_list`
--
ALTER TABLE `borrows_list`
  MODIFY `borrows_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `returns_list`
--
ALTER TABLE `returns_list`
  MODIFY `returns_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `users_list`
--
ALTER TABLE `users_list`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
