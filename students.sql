-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 27, 2020 at 08:46 AM
-- Server version: 8.0.18
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_management_system_lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `roll` int(11) NOT NULL,
  `reg_no` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='students table created success';

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `lname`, `roll`, `reg_no`, `email`, `username`, `password`, `phone`, `image`, `status`, `date_time`) VALUES
(1, 'Selim', 'Swadhin', 123456, 654123, 'selimrezaswadhim@gmail.com', 'rezasa', '$2y$10$ZHdfrTPH1miz5jb3dSlS6ObT8eSxx/7NfSENEcmu2KlCHwm6G7m7C', 1724063642, NULL, 0, '2020-09-23 15:08:56'),
(3, 'hena', 'Swadhin', 123456, 654123, 'selimrezaswadhin@gmail.com', 'zannat', '$2y$10$adUPzcAm1qFkP.S4UJb2L.8HuzGwCyLaXo2P79HzkRkbrblW3z/au', 1724063643, NULL, 1, '2020-09-23 15:28:05'),
(4, 'reza', 'Swadhin', 789456, 987456, 'selimreza@gmail.com', 'helloworld', '$2y$10$wIf0VT2j1wI6ZqLQtD0EL.Qyqz1gHq4QqgnoXA5rS7D0kbFLcoThe', 1472145872, 'upload/avatar.jpg', 1, '2020-09-24 16:34:37');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
