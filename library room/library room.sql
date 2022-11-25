-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2022 at 06:33 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
('Q12345', 'สมพงษ์ คงสมปราชญ์', '12345'),
('Q25681\n', 'ชาญวิทย์ จันอังคาร\r\n', '2222'),
('Q44965\r\n', 'ซีอิ๋ว เด็กสมบูน\r\n', '1235'),
('Q65655', 'ธนวัต ประดิษของ', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `bookdetail`
--

CREATE TABLE `bookdetail` (
  `rid` int(11) NOT NULL,
  `book_id` varchar(255) DEFAULT NULL,
  `room_code` varchar(255) NOT NULL,
  `date_chin` date NOT NULL,
  `time_chin` varchar(255) NOT NULL,
  `each_order` int(11) NOT NULL,
  `each_cancel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookdetail`
--

INSERT INTO `bookdetail` (`rid`, `book_id`, `room_code`, `date_chin`, `time_chin`, `each_order`, `each_cancel`) VALUES
(0, 'R0', '701', '0000-00-00', '9.00-11.00', 28, 28),
(1, 'R1', '701', '2022-11-20', '9.00-11.00', 28, 28),
(2, 'R5', '701', '2022-11-20', '13.00-15.00', 0, 1),
(3, 'R2', '702', '2022-11-20', '9.00-11.00', 5, 19),
(4, 'R6', '702', '2022-11-20', '13.00-15.00', 1, 0),
(5, 'R3', '703', '2022-11-20', '9.00-11.00', 0, 19),
(6, 'R7', '703', '2022-11-20', '13.00-15.00', 0, 0),
(7, 'R4', '704', '2022-11-20', '9.00-11.00', 0, 19),
(18, 'R8', '704', '2022-11-21', '13.00-15.00', 1, 0);

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
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_code` varchar(255) NOT NULL,
  `code_admin` varchar(255) NOT NULL,
  `count_cancel` int(11) NOT NULL,
  `count_book` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_code`, `code_admin`, `count_cancel`, `count_book`) VALUES
('701', 'Q12345', 43, 52),
('702', 'Q25681', 26, 13),
('703', 'Q44965', 24, 5),
('704', 'Q65655', 22, 3);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `std_user` varchar(255) NOT NULL,
  `std_name` varchar(255) NOT NULL,
  `std_book` int(11) NOT NULL,
  `std_pass` char(50) NOT NULL,
  `room_code` varchar(255) NOT NULL,
  `time_chin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std_user`, `std_name`, `std_book`, `std_pass`, `room_code`, `time_chin`) VALUES
('s630401515361', 'อรุณ แจ่มใส', 1, '1546', '', ''),
('s630401516443', 'อรุณ เทพเกิน', 1, '2654', '', ''),
('s630402534317', 'ดีเด่น ชัยภูมิ', 1, '5436', '', ''),
('s630402548234', 'มีสุข อดทน', 1, '3851', '', ''),
('s630405455564', 'ญาญ่า สวยเลิศ', 1, '6821', '', ''),
('s630406545641', 'เก่งกาญ เลิศไพรบูญ', 1, '5423', '', ''),
('s630406852155', 'ศิริวัน พร้อมทรัพย์', 1, '1537', '', ''),
('s630407213535', 'องค์อาจ โชคดี', 1, '5821', '', ''),
('s630409234838', 'อานนท์ จิตสงบ', 1, '6921', '', ''),
('s630409531535', 'มีชัย สุขสัน', 1, '4582', '', '');

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
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
