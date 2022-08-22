-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2022 at 04:03 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `javi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `timestamp`) VALUES
(1, 'admin', '36c74eb7ab237cbd2b3f8389a5c651ddf31107f1394a618164ab85e53285ef87', '2022-07-18 01:38:45');

-- --------------------------------------------------------

--
-- Table structure for table `carrier_request`
--

CREATE TABLE `carrier_request` (
  `id` int(11) NOT NULL,
  `user_id` varchar(150) DEFAULT NULL,
  `dot` varchar(150) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `contact` varchar(150) DEFAULT NULL,
  `ms_sac` varchar(150) DEFAULT NULL,
  `mx_ff` varchar(150) DEFAULT NULL,
  `type` varchar(150) DEFAULT NULL,
  `fleet_size` varchar(150) DEFAULT NULL,
  `requested_on` varchar(150) DEFAULT NULL,
  `status` varchar(5) DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carrier_request`
--

INSERT INTO `carrier_request` (`id`, `user_id`, `dot`, `name`, `contact`, `ms_sac`, `mx_ff`, `type`, `fleet_size`, `requested_on`, `status`) VALUES
(1, NULL, NULL, 'test', 'test@gmail.com', NULL, NULL, 'MOTORCYCLE', '3', NULL, 'A'),
(2, NULL, NULL, 'Test', 'Test@gfmail.com', NULL, NULL, 'MOTORCYCLE', '3', NULL, 'A'),
(3, NULL, NULL, 'teste', 'test@Gmail.com', 'testmac', NULL, 'MOTORCYCLE', '4', NULL, 'A'),
(4, '6', '2022-07-05', 'Test', '9867602207', 'Test', 'Test', '1111', '3', '3', 'D'),
(5, '6', '2022-06-28', 'Allied', '9867602207', 'test', 'Test', '1111', '4', '20-07-2022 15:12:05', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `msg` varchar(500) DEFAULT NULL,
  `created_on` varchar(150) DEFAULT NULL,
  `status` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email`, `msg`, `created_on`, `status`) VALUES
(1, 'hamza@gmail.com', 'Test', '20-07-22 12:27:05', 'A'),
(2, 'alliedtechnologies59@gmail.com', 'Test again', '20-07-22 12:27:26', 'R');

-- --------------------------------------------------------

--
-- Table structure for table `container_item_pack`
--

CREATE TABLE `container_item_pack` (
  `cpack_id` int(11) NOT NULL,
  `container_item_pack` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `container_item_pack`
--

INSERT INTO `container_item_pack` (`cpack_id`, `container_item_pack`) VALUES
(1, 'Pallet\r\n'),
(2, 'Bale\r\n'),
(3, 'Box\r\n'),
(4, 'Bundle \r\n'),
(5, 'Can\r\n'),
(6, 'Carton\r\n'),
(7, 'Case\r\n'),
(8, 'Crate\r\n'),
(9, 'Cylinder\r\n'),
(10, 'Pieces\r\n'),
(11, 'Bag\r\n'),
(12, 'Reel\r\n'),
(13, 'Skid\r\n'),
(14, 'Tube\r\n'),
(15, 'Other\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `container_item_quan`
--

CREATE TABLE `container_item_quan` (
  `c_id` int(11) NOT NULL,
  `item_quan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `container_item_quan`
--

INSERT INTO `container_item_quan` (`c_id`, `item_quan`) VALUES
(1, 'Units'),
(2, 'Cases'),
(3, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `age` varchar(150) DEFAULT NULL,
  `mobile` varchar(150) DEFAULT NULL,
  `license_no` varchar(150) DEFAULT NULL,
  `license_expiry` varchar(150) DEFAULT NULL,
  `exp` varchar(150) DEFAULT NULL,
  `joining_date` varchar(150) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `notes` varchar(150) DEFAULT NULL,
  `status` varchar(150) DEFAULT NULL,
  `status_record` varchar(5) DEFAULT NULL,
  `created_on` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `name`, `age`, `mobile`, `license_no`, `license_expiry`, `exp`, `joining_date`, `address`, `notes`, `status`, `status_record`, `created_on`) VALUES
(1, '', '122121', '', '', '', '', '', '', '', '', 'D', '20-07-2022 04:34:49'),
(2, 'Test', '12', 'Test', 'tays', 'yteqy', 'yteq', 'tyea', 'tye', 'ytwe', 'A', 'D', '20-07-2022 04:36:01'),
(3, 'Hamza', '25', '9867602207', 'test12313', '12', '1', '1', '21', '1', 'A', 'A', '20-07-2022 04:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `lati` varchar(150) DEFAULT NULL,
  `longi` varchar(150) DEFAULT NULL,
  `status` varchar(150) DEFAULT 'A',
  `created_on` varchar(150) DEFAULT NULL,
  `modified_on` varchar(150) DEFAULT NULL,
  `deleted_on` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `title`, `lati`, `longi`, `status`, `created_on`, `modified_on`, `deleted_on`) VALUES
(1, 'Test', '123', '1223', 'A', NULL, NULL, NULL),
(2, 'Amsterdam, Netherlands', '52.359257931874595', ' 4.8716865947964685', 'A', NULL, NULL, NULL),
(3, 'Mumbai', '19.17918213357552', ' 72.86400949413382', 'A', NULL, NULL, NULL),
(4, 'Shahpur', '19.480304573823005', '73.29330020808769', 'A', NULL, NULL, NULL),
(5, 'Thakur Complex', '19.209288394641135', '72.86785186031712', 'A', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `id` int(11) NOT NULL,
  `r_v_id` varchar(11) DEFAULT NULL,
  `r_date` varchar(150) DEFAULT NULL,
  `r_message` varchar(256) DEFAULT NULL,
  `r_isread` varchar(11) DEFAULT '0',
  `status` varchar(5) DEFAULT NULL,
  `r_created_date` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reminder`
--

INSERT INTO `reminder` (`id`, `r_v_id`, `r_date`, `r_message`, `r_isread`, `status`, `r_created_date`) VALUES
(1, '4', '2022-06-28', 'test', 'Y', 'A', '0000-00-00 00:00:00'),
(2, '4', '2022-07-11', 'Followup', 'N', 'D', '20-07-2022 05:39:04');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `user_id` varchar(150) DEFAULT NULL,
  `v_type` varchar(150) DEFAULT NULL,
  `pickup` varchar(150) DEFAULT NULL,
  `r_drop` varchar(150) DEFAULT NULL,
  `p_date` varchar(150) DEFAULT NULL,
  `status` varchar(150) DEFAULT NULL,
  `created_on` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `user_id`, `v_type`, `pickup`, `r_drop`, `p_date`, `status`, `created_on`) VALUES
(1, NULL, '3', 'Test', 'Thakur Complex', NULL, 'A', NULL),
(2, '6', '3', 'Test', 'Amsterdam, Netherlands', NULL, 'D', NULL),
(3, '6', '3', 'Test', 'Amsterdam, Netherlands', '07/20/2022', 'A', NULL),
(4, '6', '3', 'Test', 'Amsterdam, Netherlands', '07/21/2022', 'D', NULL),
(5, '6', '3', 'Test', 'Amsterdam, Netherlands', '07/22/2022', 'D', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `contact` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `status` varchar(150) DEFAULT NULL,
  `created_on` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `contact`, `email`, `password`, `address`, `status`, `created_on`) VALUES
(1, 'Allied', '9867602207', 'alliedtechnologies59@gmail.com', 'test', 'test', 'A', NULL),
(2, 'Allied', '9867602207', 'alliedtechnologies59@gmail.com1', 'test', 'test', 'A', NULL),
(3, 'Allied', '9867602207', 'alliedtechnologies59@gmail.com2', 'qwwq', 'qwq', 'A', NULL),
(4, '', '', '', '', '', 'D', NULL),
(5, 'Allied', '9867602207', 'ascasc@acs.com', 'ascasc', 'ascacs', 'A', NULL),
(6, 'Hamza', '9867602207', 'hamza@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'test address', 'A', NULL),
(7, 'Test', '89653685', 'bachjk ', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 'qwqec', 'A', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `reg_no` varchar(150) DEFAULT NULL,
  `chasis_no` varchar(150) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `model` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `ms_sac` varchar(150) DEFAULT NULL,
  `mx_ff` varchar(150) DEFAULT NULL,
  `manufacture` varchar(150) DEFAULT NULL,
  `type` varchar(150) DEFAULT NULL,
  `color` varchar(150) DEFAULT NULL,
  `expiry` varchar(150) DEFAULT NULL,
  `fleet_size` varchar(150) DEFAULT NULL,
  `dot_number` varchar(150) DEFAULT NULL,
  `api_url` varchar(150) DEFAULT NULL,
  `username` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `created_on` varchar(150) DEFAULT NULL,
  `status` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `reg_no`, `chasis_no`, `name`, `model`, `email`, `ms_sac`, `mx_ff`, `manufacture`, `type`, `color`, `expiry`, `fleet_size`, `dot_number`, `api_url`, `username`, `password`, `created_on`, `status`) VALUES
(1, '1111', NULL, 'test', 'tses', 'test@gmail.com', NULL, NULL, '1111', 'MOTORCYCLE', '#610559', '2022-07-18', '3', '1111', 'https://javi.alliedtechnologies.co/api', NULL, '485971', '19-07-2022 14:56:45', 'D'),
(2, 'Test', 'qwqwq', 'Test', 'Test', 'Test@gfmail.com', NULL, NULL, 'Test', 'MOTORCYCLE', '#994d92', '2022-07-13', '3', 'qwwq', 'https://javi.alliedtechnologies.co/api', NULL, '485971', '19-07-2022 15:18:46', 'A'),
(3, '1112', 'chasis', 'teste', 'test', 'test@Gmail.com', 'testmac', NULL, 'manu', 'MOTORCYCLE', '#85327e', '2022-07-17', '4', 'dot', 'https://javi.alliedtechnologies.co/api', 'user', '485971', '19-07-2022 15:21:35', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_group`
--

CREATE TABLE `vehicle_group` (
  `gr_id` int(11) NOT NULL,
  `gr_name` varchar(256) DEFAULT NULL,
  `gr_desc` varchar(256) DEFAULT NULL,
  `gr_created_date` timestamp NULL DEFAULT current_timestamp(),
  `status` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_group`
--

INSERT INTO `vehicle_group` (`gr_id`, `gr_name`, `gr_desc`, `gr_created_date`, `status`) VALUES
(3, 'Company Driver', 'Best describes', '2022-03-26 15:49:28', 'A'),
(4, 'Owner Operator', 'Best describes', '2022-03-26 15:50:06', 'A'),
(5, 'Driver-Dispatcher', 'Best describes', '2022-03-26 15:50:28', 'A'),
(6, 'Dispatcher', 'Best describes', '2022-03-26 15:50:59', 'A'),
(7, 'E', 'EQUIPMENT', '2022-03-29 00:30:39', 'A'),
(9, 'Expeditious / Fleet size ?', 'How many', '2022-04-03 01:32:36', 'A'),
(10, '( 1 ) Owner Operator', 'How many', '2022-04-03 01:39:49', 'A'),
(11, '( 2-11 ) Small - Medium size', 'How many', '2022-04-03 01:41:39', 'A'),
(12, '( 12 - 300 ) Medium - Large', 'How many', '2022-04-03 01:42:33', 'A'),
(13, '( 301 + ) Extra Large', 'How many', '2022-04-03 01:43:08', 'A'),
(14, 'new_fleet', 'new_fleet', '2022-04-21 14:40:31', 'A'),
(15, 'Test', 'Test', '0000-00-00 00:00:00', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carrier_request`
--
ALTER TABLE `carrier_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `container_item_pack`
--
ALTER TABLE `container_item_pack`
  ADD PRIMARY KEY (`cpack_id`);

--
-- Indexes for table `container_item_quan`
--
ALTER TABLE `container_item_quan`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_group`
--
ALTER TABLE `vehicle_group`
  ADD PRIMARY KEY (`gr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carrier_request`
--
ALTER TABLE `carrier_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `container_item_pack`
--
ALTER TABLE `container_item_pack`
  MODIFY `cpack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `container_item_quan`
--
ALTER TABLE `container_item_quan`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicle_group`
--
ALTER TABLE `vehicle_group`
  MODIFY `gr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
