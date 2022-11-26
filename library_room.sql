-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2022 at 10:05 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library room`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `code_admin` varchar(255) NOT NULL,
  `user_admin` varchar(255) NOT NULL,
  `pass_admin` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`code_admin`, `user_admin`, `pass_admin`) VALUES
('Q12345', 'Sompong Konhod', '12345'),
('Q25681\n', 'Chab Wee', '2222'),
('Q44965\r\n', 'Seal Meow', '1235'),
('Q65655', 'PaPa MaMa', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `bookdetail`
--

CREATE TABLE `bookdetail` (
  `rid` int(11) NOT NULL,
  `book_id` varchar(255) DEFAULT NULL,
  `room_code` varchar(255) DEFAULT NULL,
  `date_chin` date NOT NULL,
  `time_chin` varchar(255) NOT NULL,
  `each_order` int(11) NOT NULL,
  `each_cancel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookdetail`
--

INSERT INTO `bookdetail` (`rid`, `book_id`, `room_code`, `date_chin`, `time_chin`, `each_order`, `each_cancel`) VALUES
(0, 'R0', '700', '0000-00-00', '9.00-11.00', 0, 0),
(1, 'R1', '701', '2022-11-22', '9.00-11.00', 26, 25),
(2, 'R6', '702', '2022-11-22', '13.00-15.00', 0, 0),
(3, 'R3', '703', '2022-11-23', '9.00-11.00', 1, 1),
(4, 'R8', '704', '2022-11-22', '13.00-15.00', 1, 1),
(5, 'R8', '704', '2022-11-23', '13.00-15.00', 1, 1),
(6, 'R1', '701', '2022-11-27', '9.00-11.00', 24, 25);

-- --------------------------------------------------------

--
-- Table structure for table `bookorder`
--

CREATE TABLE `bookorder` (
  `book_id` varchar(50) NOT NULL,
  `book_cancel` varchar(50) NOT NULL,
  `book_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookorder`
--

INSERT INTO `bookorder` (`book_id`, `book_cancel`, `book_status`) VALUES
('R0', 'Yes', 'No'),
('R1', 'Yes', 'No'),
('R2', 'Yes', 'No'),
('R3', 'Yes', 'No'),
('R4', 'Yes', 'No'),
('R5', 'Yes', 'No'),
('R6', 'Yes', 'No'),
('R7', 'Yes', 'No'),
('R8', 'Yes', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `std_user` varchar(255) NOT NULL,
  `std_pass` varchar(255) NOT NULL,
  `std_name` varchar(255) NOT NULL,
  `room_code` varchar(255) NOT NULL,
  `time_chin` varchar(255) NOT NULL,
  `std_book` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `std_user`, `std_pass`, `std_name`, `room_code`, `time_chin`, `std_book`) VALUES
(1, 's630401515361', '1546', 'Tanawat Pradidkong', '701', '9.00-11.00', 0),
(2, 's630401515361', '1546', 'Tanawat Pradidkong', '702', '9.00-11.00', 0),
(3, 's630401516443', '2654', 'Supasit Humyai', '701', '9.00-11.00', 0),
(4, 's630401516443', '2654', 'Supasit Humyai', '701', '9.00-11.00', 0),
(5, 's630401516443', '2654', 'Supasit Humyai', '701', '9.00-11.00', 0),
(6, 's630401515361', '1546', 'Tanawat Pradidkong', '703', '9.00-11.00', 0),
(7, 's630401515361', '1546', 'Tanawat Pradidkong', '701', '9.00-11.00', 0),
(8, 's630401515361', '1546', 'Tanawat Pradidkong', '701', '9.00-11.00', 0),
(9, 's630401515361', '1546', 'Tanawat Pradidkong', '701', '9.00-11.00', 0),
(10, 's630401515361', '1546', 'Tanawat Pradidkong', '701', '9.00-11.00', 0),
(11, 's630401515361', '1546', 'Tanawat Pradidkong', '701', '9.00-11.00', 0),
(12, 's630401515361', '1546', 'Tanawat Pradidkong', '701', '9.00-11.00', 0),
(13, 's630401515361', '1546', 'Tanawat Pradidkong', '701', '9.00-11.00', 0),
(14, 's630401515361', '1546', 'Tanawat Pradidkong', '701', '9.00-11.00', 0),
(15, 's630401515361', '1546', 'Tanawat Pradidkong', '701', '9.00-11.00', 0),
(16, 's630401515361', '1546', 'Tanawat Pradidkong', '701', '9.00-11.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_code` varchar(255) NOT NULL,
  `count_book` int(11) NOT NULL,
  `count_cancel` int(11) NOT NULL,
  `code_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_code`, `count_book`, `count_cancel`, `code_admin`) VALUES
('701', 26, 25, 'Q44965'),
('702', 0, 0, 'Q65655'),
('703', 1, 1, 'Q25681'),
('704', 1, 1, 'Q12345');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `std_user` varchar(255) NOT NULL,
  `std_pass` char(50) NOT NULL,
  `std_name` varchar(255) NOT NULL,
  `room_code` varchar(255) NOT NULL,
  `time_chin` varchar(255) NOT NULL,
  `std_book` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std_user`, `std_pass`, `std_name`, `room_code`, `time_chin`, `std_book`) VALUES
('s630401515361', '1546', 'Tanawat Pradidkong', '704', '13.00-15.00', 0),
('s630401516443', '2654', 'Supasit Humyai', '702', '13.00-15.00', 0),
('s630402534317', '5436', 'Supravee Chophee', '', '', 1),
('s630402548234', '3851', 'Adisak Kondee', '', '', 1),
('s630405455564', '6821', 'YaYa Deles', '', '', 1),
('s630406545641', '5423', 'Kavin Kakmak', '', '', 1),
('s630406852155', '1537', 'Manee Suaymak', '', '', 1),
('s630407213535', '5821', 'Namnom omjan', '', '', 1),
('s630409234838', '6921', 'Peachy Peeyapa', '', '', 1),
('s630409531535', '4582', 'Chanwit Jundow', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`code_admin`);

--
-- Indexes for table `bookdetail`
--
ALTER TABLE `bookdetail`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `bookorder`
--
ALTER TABLE `bookorder`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_code`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`std_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookdetail`
--
ALTER TABLE `bookdetail`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
