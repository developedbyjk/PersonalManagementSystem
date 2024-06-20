-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2024 at 03:52 PM
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
-- Database: `meowgram`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `id` int(11) NOT NULL,
  `bookmark_title` varchar(99) NOT NULL,
  `bookmark_link` varchar(200) NOT NULL,
  `byuser` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `overall_experience` varchar(255) NOT NULL,
  `user_interface` varchar(255) NOT NULL,
  `features` varchar(255) NOT NULL,
  `improvements` text DEFAULT NULL,
  `bugs_issues` text DEFAULT NULL,
  `suggestions` text DEFAULT NULL,
  `recommendation` text DEFAULT NULL,
  `additional_comments` text DEFAULT NULL,
  `byuser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `finance`
--

CREATE TABLE `finance` (
  `id` int(99) NOT NULL,
  `total` int(50) NOT NULL DEFAULT 0,
  `amount` int(50) NOT NULL,
  `ie` varchar(99) NOT NULL,
  `note` varchar(100) NOT NULL,
  `byuser` varchar(99) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `finance`
--

INSERT INTO `finance` (`id`, `total`, `amount`, `ie`, `note`, `byuser`, `date`) VALUES
(2, 10, 300, 'expense', '', 'jk', '2024-04-14 13:28:59'),
(3, 500, 200, 'expense', '', 'madni', '2024-04-14 13:53:06'),
(7, 510, 500, 'income', '', 'jk', '2024-04-14 22:45:26'),
(8, 800, 200, 'expense', '', 'lala', '2024-04-15 09:50:03'),
(9, 1300, 500, 'income', '', 'lala', '2024-04-15 09:50:44'),
(10, 1200, 700, 'income', '', 'madni', '2024-04-25 17:01:02'),
(11, -300, 1500, 'expense', '', 'madni', '2024-04-25 17:01:14'),
(12, 588, 888, 'income', '', 'madni', '2024-04-25 17:01:28'),
(13, 1000000587, 999999999, 'income', '', 'madni', '2024-04-25 17:01:44'),
(0, 4700, 300, 'expense', 'girl party ', 'tannu', '2024-06-14 22:51:34'),
(0, 5200, 500, 'income', 'given by dad on eid', 'tannu', '2024-06-14 22:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `health`
--

CREATE TABLE `health` (
  `id` int(99) NOT NULL,
  `health_title` varchar(200) NOT NULL,
  `byuser` varchar(99) NOT NULL,
  `health_details` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `health`
--

INSERT INTO `health` (`id`, `health_title`, `byuser`, `health_details`) VALUES
(4, 'test', '', ' - this will come\r\n- this will aslo come '),
(5, 'check', '', ' check '),
(17, 'wow it is working now', 'madni', '  '),
(18, 'bill', 'jk', ' - arvind clinic bill reamins to pay\r\n '),
(20, 'hhh', 'madni', ' hhhh ');

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `id` int(11) NOT NULL,
  `journal_details` varchar(1000) NOT NULL,
  `journal_date` datetime NOT NULL DEFAULT current_timestamp(),
  `byuser` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `journal`
--

INSERT INTO `journal` (`id`, `journal_details`, `journal_date`, `byuser`) VALUES
(1, 'today i went to college and came and did a lot of good things but when i was back i saw atoday i went to college and came and did a lot of good things but when i was back i saw atoday i went to college and came and did a lot of good things but when i was back i saw a', '2024-04-04 13:07:06', 'lala'),
(3, 'it was so amazing day and i was going to school and i will be at home and i will come to school and yup its amazing', '2024-04-04 13:20:39', 'madni'),
(4, 'nothing sepecial', '2024-04-04 13:20:48', 'madni'),
(5, 'ahh what a hard day but still worth it', '2024-04-04 17:24:39', 'jk'),
(7, 'today was eid i went to ahmedabad, and meet all the family and other people of my life and it was so good day and i ate pizza and i got happy', '2024-04-15 09:51:30', 'lala'),
(0, 'jhjhhjgjgjgjgjghggjhgggjhgghjgj', '2024-06-14 22:52:34', 'tannu');

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `id` int(11) NOT NULL,
  `task` varchar(255) NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `byuser` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`id`, `task`, `completed`, `byuser`) VALUES
(12, 'completing the homework at 2 am', 1, 'madni'),
(13, 'lala', 0, 'lala'),
(15, 'Attend coaching class.', 0, 'lala'),
(20, 'this is my new task for today', 1, 'junedkhn'),
(21, 'wow this is so amazing', 0, 'madni');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `emoji` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `emoji`) VALUES
(1, 'madni', 'madni@gmail.com', 'madni', '😲'),
(2, 'jk', 'jk@yandex.com', 'jk', ' 🤗'),
(3, 'lala', 'lala@gmail.com', 'lala', ' 😁'),
(4, 'junedkhn', 'junedkhan@gmail.com', 'junedkhan', ' 😎'),
(5, 'hassan', 'hassandon@gmail.com', 'hassan', ' 😉'),
(0, 'tannu', 'tannu@gmail.com', 'tannu', ' 😄');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
