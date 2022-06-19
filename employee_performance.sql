-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 20, 2021 at 12:58 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_employee_performance`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ID`, `name`, `email`, `subject`, `mobile`, `message`, `date`, `time`) VALUES
(2, 'fasdf', 'sadfas', 'asdf', 'asdf', 'asdf', '', ''),
(3, 'fasdf', 'sadfas', 'asdf', 'asdf', 'asdf', '2018-05-12', '06:48 PM');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`ID`, `name`, `location`) VALUES
(1, 'Department 01', 'Pune'),
(2, 'Department 02', 'Dhule');

-- --------------------------------------------------------

--
-- Table structure for table `month_list`
--

CREATE TABLE `month_list` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `month_list`
--

INSERT INTO `month_list` (`ID`, `name`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'Novemeber'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE `performance` (
  `ID` int(11) NOT NULL,
  `employe_id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `month_id` int(11) NOT NULL,
  `target` int(11) NOT NULL,
  `working_efficient` int(11) NOT NULL,
  `performance` int(11) NOT NULL,
  `presenty` int(11) NOT NULL,
  `customer_interaction` int(11) NOT NULL,
  `overtime` int(11) NOT NULL,
  `extra_sales` int(11) NOT NULL,
  `max_value` int(11) NOT NULL DEFAULT 5,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`ID`, `employe_id`, `manager_id`, `month_id`, `target`, `working_efficient`, `performance`, `presenty`, `customer_interaction`, `overtime`, `extra_sales`, `max_value`, `date`) VALUES
(1, 5, 6, 1, 5, 5, 5, 15, 5, 5, 5, 5, '2021-04-20 11:10:09 AM'),
(2, 5, 6, 1, 5, 5, 5, 15, 5, 5, 5, 5, '2021-04-20'),
(3, 5, 6, 2, 5, 5, 5, 15, 5, 5, 5, 5, '2021-04-20'),
(4, 10, 6, 1, 3, 3, 3, 10, 0, 0, 0, 5, '2021-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `performance1`
--

CREATE TABLE `performance1` (
  `ID` int(11) NOT NULL,
  `employe_id` text NOT NULL,
  `manager_id` text NOT NULL,
  `month_id` text NOT NULL,
  `target` text NOT NULL,
  `working_efficient` text NOT NULL,
  `performance` text NOT NULL,
  `presenty` text NOT NULL,
  `customer_interaction` text NOT NULL,
  `overtime` text NOT NULL,
  `extra_sales` text NOT NULL,
  `max_value` text NOT NULL DEFAULT '5',
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `performance1`
--

INSERT INTO `performance1` (`ID`, `employe_id`, `manager_id`, `month_id`, `target`, `working_efficient`, `performance`, `presenty`, `customer_interaction`, `overtime`, `extra_sales`, `max_value`, `date`) VALUES
(1, '$employe_id', '$user_id', '$month_id', '$target', '$working_efficient', '$performance', '$presenty', '$customer_interaction', '$overtime', '$extra_sales', '5', '$date');

-- --------------------------------------------------------

--
-- Stand-in structure for view `performance_calculate`
-- (See below for the actual view)
--
CREATE TABLE `performance_calculate` (
`ID` int(11)
,`employee_name` varchar(200)
,`manager_name` varchar(200)
,`message` varchar(20)
,`month_name` varchar(50)
,`employe_id` int(11)
,`month_id` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL DEFAULT 'NONE',
  `email` varchar(50) NOT NULL DEFAULT 'None',
  `mobile` varchar(14) NOT NULL DEFAULT 'None',
  `password` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(20) NOT NULL,
  `post` varchar(50) NOT NULL DEFAULT '-',
  `active` int(1) NOT NULL DEFAULT 0,
  `dept_id` int(11) NOT NULL DEFAULT 0,
  `manager_id` int(11) NOT NULL DEFAULT 0,
  `type` varchar(100) NOT NULL DEFAULT 'employee',
  `city` varchar(30) NOT NULL DEFAULT '-',
  `age` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `name`, `user_name`, `email`, `mobile`, `password`, `address`, `gender`, `post`, `active`, `dept_id`, `manager_id`, `type`, `city`, `age`) VALUES
(1, '', 'Performance Mgt. Admin', 'admin@gmail.com', '9226926292', '123456', '', '', '', 0, 0, 0, 'admin', '-', 0),
(3, '', 'Nikhil Gharte', 'nikhilgharate365@gmail.com', '9226926292', '123456', '', '', '', 1, 0, 0, 'user', '-', 0),
(4, '', 'admin', 'nikhilgharate365@gmail.com', '9226926292', 'admin', '', '', '', 0, 0, 0, 'user', '-', 0),
(5, 'Employee 01', 'employee001', 'nikhilgharate365@gmail.com', '9226926292', 'admin', 'dhule', 'Male', 'Sale Executive', 1, 1, 8, 'employee', '-', 47),
(6, 'sdafsdf sdfs dfsdfdsaf', 'vishal  ', 'vishal@gmail.com', '3453534534543', '123456', 'dasfsdfasfdsfds', 'Male', '', 1, 1, 0, 'manager', '-', 0),
(8, 'abhishek sonawane', 'abhishek123', 'abhishek@gmail.com', '9878898776', '123456', 'dhule', 'Male', '-', 0, 1, 0, 'manager', '-', 0),
(9, 'abhishek sonawane', 'abhishek1234', 'abhishek@gmail.com', '9878898776', '123456', 'dhule', 'Male', '-', 1, 2, 0, 'manager', '-', 0),
(10, 'mahesh deshmukh', 'mahesh31', 'mahesh@gmail.com', '98786767767', '123', 'dhule', 'Male', 'mnager', 0, 1, 6, 'employee', 'dhule', 34);

-- --------------------------------------------------------

--
-- Structure for view `performance_calculate`
--
DROP TABLE IF EXISTS `performance_calculate`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `performance_calculate`  AS  select `performance`.`ID` AS `ID`,(select `user`.`name` from `user` where `user`.`ID` = `performance`.`employe_id`) AS `employee_name`,(select `user`.`name` from `user` where `user`.`ID` = `performance`.`manager_id`) AS `manager_name`,case when `performance`.`target` + `performance`.`working_efficient` + `performance`.`performance` + `performance`.`presenty` / 30 * 100 * `performance`.`max_value` / 100 + `performance`.`customer_interaction` + `performance`.`overtime` + `performance`.`extra_sales` > 25 then 'Excelent Performance' when `performance`.`target` + `performance`.`working_efficient` + `performance`.`performance` + `performance`.`presenty` / 30 * 100 * `performance`.`max_value` / 100 + `performance`.`customer_interaction` + `performance`.`overtime` + `performance`.`extra_sales` > 20 then 'Good Performance' when `performance`.`target` + `performance`.`working_efficient` + `performance`.`performance` + `performance`.`presenty` / 30 * 100 * `performance`.`max_value` / 100 + `performance`.`customer_interaction` + `performance`.`overtime` + `performance`.`extra_sales` > 18 then 'Fair Performance' else 'Bad Performance' end AS `message`,(select `month_list`.`name` from `month_list` where `month_list`.`ID` = `performance`.`month_id`) AS `month_name`,`performance`.`employe_id` AS `employe_id`,`performance`.`month_id` AS `month_id` from `performance` ;

--
-- Indexes for dumped tables
--
--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `month_list`
--
ALTER TABLE `month_list`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `month_list`
--
ALTER TABLE `month_list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `performance`
--
ALTER TABLE `performance`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
