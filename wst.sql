-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2018 at 11:52 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test2`
--

-- --------------------------------------------------------

--
-- Table structure for table `avail_drivers`
--

CREATE TABLE `avail_drivers` (
  `driver_id` int(11) NOT NULL,
  `driver_lic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `avail_vehicles`
--

CREATE TABLE `avail_vehicles` (
  `veh_id` int(50) NOT NULL,
  `veh_reg_no` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `avail_vehicles`
--

INSERT INTO `avail_vehicles` (`veh_id`, `veh_reg_no`) VALUES
(1, '');

-- --------------------------------------------------------

--
-- Table structure for table `billinfo`
--

CREATE TABLE `billinfo` (
  `user` varchar(30) DEFAULT NULL,
  `billid` int(10) NOT NULL,
  `orderid` int(10) NOT NULL,
  `vehicletype` varchar(30) DEFAULT NULL,
  `goods` varchar(30) DEFAULT NULL,
  `orderquantity` int(10) DEFAULT NULL,
  `rate` int(10) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL,
  `taxes` varchar(10) DEFAULT NULL,
  `totalamount` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billinfo`
--

INSERT INTO `billinfo` (`user`, `billid`, `orderid`, `vehicletype`, `goods`, `orderquantity`, `rate`, `amount`, `taxes`, `totalamount`) VALUES
(NULL, 119, 52, 'Truck', NULL, NULL, NULL, NULL, NULL, NULL),
(NULL, 119, 52, 'Truck', 'Construction material', NULL, NULL, NULL, NULL, NULL),
(NULL, 119, 52, 'Truck', 'Construction material', 100, NULL, NULL, NULL, NULL),
(NULL, 119, 52, 'Truck', 'Construction material', 100, 5, NULL, NULL, NULL),
(NULL, 119, 52, 'Truck', 'Construction material', 100, 5, 2392, NULL, NULL),
(NULL, 119, 52, 'Truck', 'Construction material', 100, 5, 2392, '14%', NULL),
(NULL, 119, 52, 'Truck', 'Construction material', 100, 5, 2392, '14%', NULL),
(NULL, 119, 52, 'Truck', 'Construction material', 100, 5, 2392, '14%', 2727),
(NULL, 122, 55, 'Minitruck', 'Grains', 100, 0, 0, '14%', 0),
(NULL, 123, 56, 'Truck', 'Construction material', 153, 5, 3660, '14%', 4173),
(NULL, 123, 56, 'Truck', 'Construction material', 153, 5, 3660, '14%', 4173),
(NULL, 123, 56, 'Truck', 'Construction material', 153, 5, 3660, '14%', 4173),
(NULL, 123, 56, 'Truck', 'Construction material', 153, 5, 3660, '14%', 4173),
(NULL, 124, 57, 'Tempo', 'Grains', 100, 3, 1435, '14%', 1636),
(NULL, 124, 57, 'Tempo', 'Grains', 100, 3, 1435, '14%', 1636),
(NULL, 125, 58, 'Truck', 'Grains', 150, 5, 3589, '14%', 4091),
(NULL, 125, 58, 'Truck', 'Grains', 150, 5, 3589, '14%', 4091),
(NULL, 125, 58, 'Truck', 'Grains', 150, 5, 3589, '14%', 4091),
(NULL, 125, 58, 'Truck', 'Grains', 150, 5, 3589, '14%', 4091),
(NULL, 125, 58, 'Truck', 'Grains', 150, 5, 3589, '14%', 4091),
(NULL, 125, 58, 'Truck', 'Grains', 150, 5, 3589, '14%', 4091),
(NULL, 125, 58, 'Truck', 'Grains', 150, 5, 3589, '14%', 4091),
(NULL, 125, 58, 'Truck', 'Grains', 150, 5, 3589, '14%', 4091),
(NULL, 125, 58, 'Truck', 'Grains', 150, 5, 3589, '14%', 4091),
(NULL, 125, 58, 'Truck', 'Grains', 150, 5, 3589, '14%', 4091),
(NULL, 120, 53, 'Truck', 'Construction material', 25, 5, 598, '14%', 682),
(NULL, 126, 59, 'Truck', 'Grains', 152, 5, 3637, '14%', 4146),
(NULL, 127, 60, 'Truck', 'Grains', 150, 5, 4257, '14%', 4853),
(NULL, 120, 53, 'Truck', 'Construction material', 25, 5, 0, '14%', 0),
(NULL, 120, 53, 'Truck', 'Construction material', 25, 5, 598, '14%', 682),
(NULL, 120, 53, 'Truck', 'Construction material', 25, 5, 598, '14%', 682),
(NULL, 127, 60, 'Truck', 'Grains', 150, 5, 0, '14%', 0),
(NULL, 127, 60, 'Truck', 'Grains', 150, 5, 4257, '14%', 4853);

-- --------------------------------------------------------

--
-- Table structure for table `busytable`
--

CREATE TABLE `busytable` (
  `orderid` int(10) NOT NULL,
  `veh_id` int(10) NOT NULL,
  `veh_type` varchar(30) NOT NULL,
  `veh_name` varchar(30) NOT NULL,
  `driver_id` int(10) NOT NULL,
  `driver_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `busytable`
--

INSERT INTO `busytable` (`orderid`, `veh_id`, `veh_type`, `veh_name`, `driver_id`, `driver_name`) VALUES
(60, 5, 'Truck', 'MH301829', 1, 'kumari');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `username` text,
  `email` varchar(50) NOT NULL,
  `comment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`username`, `email`, `comment`) VALUES
('Pawan', 'pawanhage123@gmail.com', 'Good Website');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `driver_id` int(200) NOT NULL,
  `driver_type` text,
  `driver_name` text,
  `driver_lic` varchar(20) DEFAULT NULL,
  `driver_city` text,
  `driver_age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`driver_id`, `driver_type`, `driver_name`, `driver_lic`, `driver_city`, `driver_age`) VALUES
(1, 'Female', 'kumari', '894723947', 'Akola', 23),
(2, 'Male', 'pawan', '38249732989', 'Akot', 26);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `billid` int(10) NOT NULL,
  `orderid` int(10) NOT NULL,
  `vehicletype` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`billid`, `orderid`, `vehicletype`) VALUES
(12, 20, 0),
(2, 56, 0),
(4, 12, 4),
(4, 12, 4),
(4, 12, 4),
(14, 22, 14);

-- --------------------------------------------------------

--
-- Table structure for table `orderinfo`
--

CREATE TABLE `orderinfo` (
  `billid` int(11) NOT NULL,
  `orderid` int(10) NOT NULL,
  `user` varchar(10) NOT NULL,
  `fastdelivery` varchar(10) NOT NULL,
  `date` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderinfo`
--

INSERT INTO `orderinfo` (`billid`, `orderid`, `user`, `fastdelivery`, `date`) VALUES
(4, 12, 'pk', 'no', NULL),
(15, 27, 'ag', 'no', '2018-04-11 00:00:00.000000'),
(16, 28, 'ag', 'no', '2018-04-11 00:00:00.000000'),
(17, 29, 'ag', 'no', '2018-04-11 09:03:31.000000'),
(18, 30, 'ag', 'no', '2018-04-12 00:17:42.000000'),
(19, 31, 'ag', 'no', '2018-04-12 00:28:19.000000'),
(20, 32, 'ag', 'no', '2018-04-12 00:39:25.000000'),
(21, 33, 'ag', 'no', '2018-04-12 00:44:24.000000'),
(22, 34, 'ag', 'no', '2018-04-12 00:48:33.000000'),
(23, 35, 'ag', 'no', '2018-04-12 00:51:11.000000'),
(24, 36, 'ag', 'no', '2018-04-12 00:55:23.000000'),
(26, 38, 'ag', 'no', '2018-04-12 00:57:50.000000'),
(27, 39, 'ag', 'no', '2018-04-12 01:10:32.000000'),
(28, 40, 'ag', 'no', '2018-04-12 01:15:55.000000'),
(29, 41, 'ag', 'no', '2018-04-12 01:21:35.000000'),
(99, 100, 'ag', 'no', '2018-04-11 22:04:54.000000'),
(100, 42, 'ag', 'no', '2018-04-13 08:25:55.000000'),
(101, 43, 'ag', 'no', '2018-04-14 14:38:19.000000'),
(102, 44, 'ag', 'no', '2018-04-14 14:40:23.000000'),
(103, 45, 'ag', 'no', '2018-04-14 14:40:51.000000'),
(104, 46, 'ag', 'no', '2018-04-14 14:41:32.000000'),
(105, 47, 'ag', 'no', '2018-04-14 14:44:39.000000'),
(106, 47, 'ag', 'no', '2018-04-14 14:44:46.000000'),
(107, 47, 'ag', 'no', '2018-04-14 14:45:01.000000'),
(108, 47, 'ag', 'no', '2018-04-14 14:53:20.000000'),
(109, 48, 'ag', 'no', '2018-04-14 14:54:08.000000'),
(110, 49, 'ag', 'no', '2018-04-14 14:55:58.000000'),
(111, 50, 'ag', 'no', '2018-04-14 14:56:39.000000'),
(112, 51, 'ag', 'no', '2018-04-14 15:08:06.000000'),
(113, 51, 'ag', 'no', '2018-04-14 15:08:37.000000'),
(114, 51, 'ag', 'no', '2018-04-14 15:12:37.000000'),
(115, 51, 'ag', 'no', '2018-04-14 15:13:58.000000'),
(116, 51, 'ag', 'no', '2018-04-14 15:17:30.000000'),
(117, 51, 'ag', 'no', '2018-04-14 15:17:38.000000'),
(118, 51, 'ag', 'no', '2018-04-14 17:30:02.000000'),
(119, 52, 'ag', 'no', '2018-04-14 17:32:08.000000'),
(120, 53, '', 'no', '2018-04-15 10:55:57.000000'),
(121, 54, 'ag', 'no', '2018-04-15 17:07:01.000000'),
(122, 55, 'ag', 'no', '2018-04-15 17:11:54.000000'),
(123, 56, 'ag', 'no', '2018-04-15 17:17:20.000000'),
(124, 57, 'ag', 'no', '2018-04-15 17:33:50.000000'),
(125, 58, 'ag', 'no', '2018-04-15 17:47:49.000000'),
(126, 59, 'ag', 'no', '2018-04-15 18:13:18.000000'),
(127, 60, 'ak', 'no', '2018-04-16 11:28:33.000000');

-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

CREATE TABLE `ordertable` (
  `orderid` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `vehicletype` varchar(30) NOT NULL,
  `goods` varchar(30) NOT NULL,
  `orderquantity` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `deladdress` varchar(30) NOT NULL,
  `mobilenumber` varchar(10) NOT NULL,
  `sourcecity` varchar(30) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pincode` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertable`
--

INSERT INTO `ordertable` (`orderid`, `user`, `vehicletype`, `goods`, `orderquantity`, `name`, `email`, `deladdress`, `mobilenumber`, `sourcecity`, `city`, `pincode`) VALUES
(1, '', '', '', 0, 'as', 'as@gmail.com', 'p', '12', '', 'pune', 410),
(2, '', '', '', 0, 'sa', '', 'sa', '45', '', 'Nagpur', 456),
(3, '', '', '', 0, 'jkj', '', 'p', '45', '', 'Solapur', 45),
(4, '', '', '', 200, 'as', '', '56', 'pune', '', 'Solapur', 45622),
(5, '', '', '', 100, 'Ashutosh', '', '5665', 'tgn', '', 'Pune', 56565),
(6, '', 'Mini-truck', 'Construction material', 450, 'ga', 'ga@gmail.com', 'kothrud', '78', '', 'Pune', 45),
(7, '', 'Mini-truck', 'Construction material', 89, 'jk', 'hj@gmail.com', 'tgn', '56', '', 'Pune', 565),
(8, '', 'Mini-truck', 'Construction material', 45, 'ag', 'ag@gmail.com', 'p', '898', '', 'Pune', 4562),
(9, 'ag', 'Mini-truck', 'Construction material', 99, 'asu', 'as@gmail.com', 'hj', '89', '', 'Solapur', 6565),
(12, 'pk', 'Mini-truck', 'Construction material', 100, 'Pawan', 'p@gmail.com', 'ak', '788', '', 'Akola', 1444),
(23, 'ag', 'Mini-truck', 'Construction material', 101, 'jkk', 'ja@gmail.com', 'pun', '6565', 'Pune', 'Amravati', 1665),
(24, 'ag', 'Truck', 'Construction material', 51, 'jik', 'j@gmail.com', 'tgn', '98898', 'Pune', 'Nagpur', 456789),
(25, 'ag', 'Truck', 'Construction material', 51, 'jik', 'j@gmail.com', 'tgn', '98898', 'Pune', 'Nagpur', 456789),
(26, 'ag', 'Truck', 'Grocery', 41, 'jack', 'j@gmail.com', 'pun', '9898', 'Pune', 'Nagpur', 456789),
(27, 'ag', 'Truck', 'Grocery', 41, 'jack', 'j@gmail.com', 'pun', '9898', 'Pune', 'Nagpur', 456789),
(28, 'ag', 'Truck', 'Construction material', 71, 'mark', 'm@gmail.com', 'pun', '8566', 'Pune', 'Akola', 45666),
(29, 'ag', 'Truck', 'Grains', 101, 'sam', 'sa@gmail.com', 'lnl', '87999', 'Pune', 'Amravati', 456789),
(30, 'ag', 'Tempo', 'Grains', 101, 'sha', 'sha@gmail.com', 'tgn', '987456', 'Pune', 'Amravati', 78999),
(31, 'ag', 'Tempo', 'Grains', 101, 'sha', 'sha@gmail.com', 'tgn', '987456', 'Pune', 'Amravati', 78999),
(32, 'ag', 'Truck', 'Grains', 91, 'shar', 's@gmail.com', 'tgn', '78566', 'Pune', 'Amravati', 456789),
(33, 'ag', 'Truck', 'Grains', 91, 'shar', 's@gmail.com', 'tgn', '78566', 'Pune', 'Amravati', 456789),
(34, 'ag', 'Truck', 'Construction material', 41, 'tha', 's@gmail.com', 'tgn', '787', 'Pune', 'Akola', 665),
(35, 'ag', 'Truck', 'Construction material', 41, 'tha', 's@gmail.com', 'tgn', '787', 'Pune', 'Akola', 665),
(36, 'ag', 'Truck', 'Grains', 31, 'dhr', 'd@gmail.com', 'tgn', '656565', 'Pune', 'Amravati', 45689),
(37, 'ag', 'Truck', 'Grains', 31, 'dhr', 'd@gmail.com', 'tgn', '656565', 'Pune', 'Amravati', 45689),
(38, 'ag', 'Truck', 'Construction material', 41, 'hjk', 'ja@gmail.com', 'lnl', '6565', 'Pune', 'Nagpur', 456789),
(39, 'ag', 'Truck', 'Construction material', 21, 'jk', 'kl@gmail.com', 'tgn', '99889', 'Pune', 'Amravati', 565),
(40, 'ag', 'Truck', 'Construction material', 21, 'jk', 'kl@gmail.com', 'tgn', '99889', 'Pune', 'Amravati', 565),
(41, 'ag', 'Truck', 'Construction material', 41, 'jake', 'j@gmail.com', 'tgn', '898', 'Pune', 'Amravati', 45665),
(42, 'ag', 'Tempo', 'Construction material', 100, 'ashu', 'ja@gmil.com', 'pun', '898', 'Pune', 'Akola', 6565),
(43, 'ag', 'Truck', 'Construction material', 100, 'as', 's@gmail.com', 'pqr', '45566', 'Pune', 'Amravati', 410507),
(44, 'ag', 'Truck', 'Construction material', 100, 'as', 's@gmail.com', 'pqr', '45566', 'Pune', 'Amravati', 410507),
(45, 'ag', 'Truck', 'Construction material', 100, 'as', 's@gmail.com', 'pqr', '45566', 'Pune', 'Amravati', 410507),
(46, 'ag', 'Truck', 'Construction material', 100, 'ask', 'dj@gmail.com', 'lp', '7899', 'Pune', 'Akola', 456664),
(47, 'ag', 'Truck', 'Construction material', 100, 'ask', 'dj@gmail.com', 'lp', '7899', 'Pune', 'Akola', 456664),
(48, 'ag', 'Truck', 'Grains', 51, 'akshay', 'k@gmail.com', 'pune', '98756', 'Pune', 'Akola', 405071),
(49, 'ag', 'Truck', 'Grains', 51, 'akshay', 'k@gmail.com', 'pune', '98756', 'Pune', 'Akola', 405071),
(50, 'ag', 'Truck', 'Construction material', 88, 'abd', 'ad@gmail.com', 'pu', '8855', 'Pune', 'Akola', 456456),
(51, 'ag', 'Truck', 'Construction material', 88, 'abd', 'ad@gmail.com', 'pu', '8855', 'Pune', 'Akola', 456456),
(52, 'ag', 'Truck', 'Construction material', 100, 'devilliers', 'd@gmail.com', 'pune', '7539514562', 'Pune', 'Akola', 4561),
(53, '', 'Truck', 'Construction material', 25, 'zampa', 'za@gmail.com', 'pun', '9874561230', 'Pune', 'Akola', 456123),
(54, 'ag', 'Truck', 'Grains', 10, 'Pawan', 'pawanhage123@gmail.c', 'akola', '9075592263', 'Pune', 'Akola', 444101),
(55, 'ag', 'Minitruck', 'Grains', 100, 'Pawan', 'pawanhage123@gmail.c', 'akola', '9075592263', 'Pune', 'Akola', 444101),
(56, 'ag', 'Truck', 'Construction material', 153, 'Pawan', 'pawanhage123@gmail.c', 'akola', '9075592263', 'Pune', 'Akola', 456789),
(57, 'ag', 'Tempo', 'Grains', 100, 'Pawan', 'pawanhage123@gmail.c', 'akola', '9075592263', 'Pune', 'Akola', 441042),
(58, 'ag', 'Truck', 'Grains', 150, 'Pawan', 'pawanhage123@gmail.c', 'akola', '9075592263', 'Pune', 'Akola', 4657646),
(59, 'ag', 'Truck', 'Grains', 152, 'P', 'pawanhage123@gmail.c', 'akola', '9075592263', 'Pune', 'Akola', 6546),
(60, 'ak', 'Truck', 'Grains', 150, 'Ak', 'ak@gmail.com', 'amvt', '9586926345', 'Pune', 'Amravati', 444604);

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `city` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`city`) VALUES
('Pune'),
('Akola'),
('Nagpur'),
('Amravati'),
('Jalgaon'),
('Bhusaval'),
('Ahmednagar'),
('Solapur'),
('Aurangabad'),
('Wardha');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `vehicleneed` varchar(30) NOT NULL,
  `ratevalue` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`vehicleneed`, `ratevalue`) VALUES
('Truck', 5),
('Tempo', 3),
('Mini-truck', 4);

-- --------------------------------------------------------

--
-- Stand-in structure for view `total`
-- (See below for the actual view)
--
CREATE TABLE `total` (
`billid` int(10)
,`orderid` int(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `password` text NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `contact` bigint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`password`, `name`, `username`, `contact`) VALUES
('pawan', 'pawan', 'pawan', 545),
('ashutosh', 'Ashutosh', 'ashutosh', 9075592263),
('ashu', 'Ashutosh', 'ashu', 9856256378),
('user', 'Ashutosh', 'ag', 9874561230),
('pawan', 'pawan', 'pawankumar', 54678964),
('ak', 'ak', 'ak', 90755869386);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `veh_id` int(255) NOT NULL,
  `veh_type` text,
  `veh_name` varchar(20) DEFAULT NULL,
  `veh_reg_no` varchar(50) DEFAULT NULL,
  `loadcapacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`veh_id`, `veh_type`, `veh_name`, `veh_reg_no`, `loadcapacity`) VALUES
(5, 'Truck', 'MH301829', '478973249832', 668),
(7, 'Tempo', 'MH38 4578', '98237498756', 897),
(9, 'Truck', 'MH29 1781', '47326847636', 678),
(10, 'Tempo', 'MH04 4141', '74382648732', 878),
(11, 'Truck', 'MH28 6789', '78432678234', 897),
(12, 'MiniTruck', 'MH30 3536', '48276823483', 743),
(13, 'Truck', 'MH30 6436', '76846543653', 872),
(14, 'Tempo', 'MH29 7634', '78624862843', 999),
(15, 'MiniTruck', 'MH30 3265', '37427684263', 234),
(16, 'Tempo', 'MH29 6543', '24368723648', 764),
(17, 'MiniTruck', 'MH30 7781', '87346862843', 362),
(18, 'Tempo', 'M09 7781', '73824823648', 899);

-- --------------------------------------------------------

--
-- Structure for view `total`
--
DROP TABLE IF EXISTS `total`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total`  AS  select `billinfo`.`billid` AS `billid`,`billinfo`.`orderid` AS `orderid` from `billinfo` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avail_drivers`
--
ALTER TABLE `avail_drivers`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `avail_vehicles`
--
ALTER TABLE `avail_vehicles`
  ADD PRIMARY KEY (`veh_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `orderinfo`
--
ALTER TABLE `orderinfo`
  ADD PRIMARY KEY (`billid`);

--
-- Indexes for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `contact` (`contact`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`veh_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avail_drivers`
--
ALTER TABLE `avail_drivers`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `avail_vehicles`
--
ALTER TABLE `avail_vehicles`
  MODIFY `veh_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `driver_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orderinfo`
--
ALTER TABLE `orderinfo`
  MODIFY `billid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `ordertable`
--
ALTER TABLE `ordertable`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `veh_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
