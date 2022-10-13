-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2019 at 12:46 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `station`
--

-- --------------------------------------------------------

--
-- Table structure for table `attempts`
--

CREATE TABLE `attempts` (
  `id` int(11) NOT NULL,
  `ip` varchar(39) NOT NULL,
  `count` int(11) NOT NULL,
  `expiredate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attempts`
--

INSERT INTO `attempts` (`id`, `ip`, `count`, `expiredate`) VALUES
(0, '::1', 1, '2015-02-23 20:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `crimes`
--

CREATE TABLE `crimes` (
  `Crime_No` int(9) NOT NULL,
  `Status` char(100) NOT NULL DEFAULT 'No action',
  `Category` char(100) NOT NULL,
  `date` date NOT NULL,
  `Description` char(100) NOT NULL,
  `Crime_Scene` char(100) NOT NULL,
  `Suspects` char(100) NOT NULL DEFAULT 'Not yet',
  `phoneNumber` int(11) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `evidence` text NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `reporterid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crimes`
--

INSERT INTO `crimes` (`Crime_No`, `Status`, `Category`, `date`, `Description`, `Crime_Scene`, `Suspects`, `phoneNumber`, `Address`, `evidence`, `remarks`, `reporterid`) VALUES
(1, '', 'Rape', '2012-11-12', 'This is terrible', 'Kisumu county', 'Suspects Found', 0, '', '', 'kartik', 2),
(2, 'No action', 'Robbery', '2012-11-12', 'This is terrible', 'Kisumu county, Nyalenda sub county, along western road road.', 'kkk', 0, '', '', 'llll', 2),
(3, 'No action', 'Robbery', '2012-11-12', 'A house has been broke into and valuables stollen', 'Kisumu county, Nyando sub county, Ahero Kisumu road road.', 'Not yet', 0, '', '', '', 2),
(4, 'No action', 'Looting', '2012-11-12', 'Students looting a shop', 'Uasin Gishu county, Ziwa sub county, along kapsoya Nairobi road road.', 'Not yet', 0, '', '', '', 2),
(5, 'No action', 'Rape', '2012-11-12', 'Rape case', 'Nakuru county, Kirinyaga sub county, along kapsoya Nairobi road road.', 'Not yet', 0, '', '', '', 2),
(6, 'No action', 'Robbery', '2012-11-12', 'Rape', 'Kisumu county, Nyakack sub county, along kapsoya Nairobi road road.', 'Not yet', 0, '', '', '', 2),
(7, 'No action', 'Theft', '2012-11-12', 'My door was brocken into and all my property stollen', 'Kisumu county, Nyakach sub county, Ziwa Kitale road road.', 'Not yet', 0, '', '', '', 2),
(8, 'No action', 'Theft', '2012-11-12', 'This was a bad crime....', 'Kisumu county, Nyakach sub county, Along ahero Kisumu road road.', 'Not yet', 0, '', '', '', 2),
(9, 'No action', 'Theft', '2012-11-12', 'Mb hasdjas iuasduiasd iasdasd iasduasid', 'Kisumu county, Nyakach sub county, along kapsoya Nairobi road road.', 'Not yet', 0, '', '', '', 2),
(10, 'No action', 'muder', '2012-11-12', 'man murdered', 'kenya county, kisumu sub county, ngara road.', 'Not yet', 0, '', '', '', 2),
(11, 'No action', 'ewfwqedrqefqf', '2012-11-12', 'qewfqdfqfe', 'eqfqwfq county, efqwfqewfwf sub county, eqfqefq road.', 'Not yet', 0, '', '', '', 2),
(12, 'No action', 'xyz', '2012-11-12', 'thisi is crime', 'india county, Maharashtra sub county, ambegaon road.', 'Not yet', 0, '', '', '', 2),
(13, 'No action', 'crm1', '2012-11-12', 'ha aahe crime', 'India county, Maharashtra sub county, ambegaon road.', 'Not yet', 0, '', '', '', 2),
(14, 'No action', 'Merdur', '2012-11-12', 'pune', 'india county, maharashtra sub county, ambegaon road.', 'Not yet', 0, '', '', '', 2),
(15, 'No action', '1', '2012-11-12', '5', '2 county, 3 sub county, 4 road.', 'Not yet', 0, '', '', '', 2),
(16, 'No action', 'Crime1', '2012-11-12', 'this is description\r\n', 'Country:India, State:Maharashtra Dist.:, ambegaon', 'Not yet', 0, '', '', '', 2),
(17, 'No action', 'latest', '2012-11-12', 'admin', 'State:maharshtra, City:pune Area:, ambegaon', 'Not yet', 0, '', '', 'xccxcc', 2);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `Item_NO` int(6) NOT NULL,
  `Description` char(100) NOT NULL,
  `Last_Seen` date NOT NULL,
  `Item_Name` varchar(1000) NOT NULL,
  `category` char(100) NOT NULL,
  `status` char(100) NOT NULL DEFAULT 'Not found'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`Item_NO`, `Description`, `Last_Seen`, `Item_Name`, `category`, `status`) VALUES
(1, 'Lets see this one', '2015-03-07', 'Phone', 'found', ''),
(5, 'good pen', '0000-00-00', 'pens', 'Lost', 'Not found'),
(6, 'mnj,km', '0000-00-00', 'phone', 'Lost', 'Not found');

-- --------------------------------------------------------

--
-- Table structure for table `lost_valuables`
--

CREATE TABLE `lost_valuables` (
  `id` int(10) NOT NULL,
  `item_name` char(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `missing_persons`
--

CREATE TABLE `missing_persons` (
  `person_id` int(10) NOT NULL,
  `fullName` char(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `phoneNumber` int(10) NOT NULL,
  `Description` text NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Status` varchar(50) NOT NULL DEFAULT 'Not Found',
  `alert` varchar(100) NOT NULL DEFAULT 'Not posted',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `missing_vehicles`
--

CREATE TABLE `missing_vehicles` (
  `vehicle_id` int(18) NOT NULL,
  `Number_plate` varchar(100) NOT NULL,
  `Model` varchar(200) NOT NULL,
  `Owner` varchar(100) NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `national_id` int(15) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `reviewed` varchar(1000) NOT NULL DEFAULT 'Not reviewed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `missing_vehicles`
--

INSERT INTO `missing_vehicles` (`vehicle_id`, `Number_plate`, `Model`, `Owner`, `phoneNumber`, `national_id`, `description`, `image`, `reviewed`) VALUES
(10, 'MH 20 5566', 'YAMAHA', 'KArtik Chaudhary', 987456123, 2147483647, '444', '_7R71re9DLKCSTH0TVP2F6eJE.jpg', 'Not reviewed');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `rkey` varchar(20) NOT NULL,
  `expire` datetime NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `hash` varchar(40) NOT NULL,
  `expiredate` datetime NOT NULL,
  `ip` varchar(39) NOT NULL,
  `agent` varchar(200) NOT NULL,
  `cookie_crc` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `uid`, `hash`, `expiredate`, `ip`, `agent`, `cookie_crc`) VALUES
(0, 1, '66442538ef7c20ded1ac034cfe791747b2280509', '2015-03-23 20:17:36', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:36.0) Gecko/20100101 Firefox/36.0', '0d9a3acc2cef71e12f75719cb343f1f1010db5a0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `password` varchar(60) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` int(13) NOT NULL,
  `address` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `email`, `mobile`, `address`, `name`) VALUES
(1, 'admin', 'admin@admin.com', 0, '', ''),
(2, 'admin', 'normal@gmail.com', 2147483647, 'pune', 'Kartik Chaudhary');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attempts`
--
ALTER TABLE `attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crimes`
--
ALTER TABLE `crimes`
  ADD PRIMARY KEY (`Crime_No`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`Item_NO`);

--
-- Indexes for table `lost_valuables`
--
ALTER TABLE `lost_valuables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `missing_persons`
--
ALTER TABLE `missing_persons`
  ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `missing_vehicles`
--
ALTER TABLE `missing_vehicles`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crimes`
--
ALTER TABLE `crimes`
  MODIFY `Crime_No` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `Item_NO` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `lost_valuables`
--
ALTER TABLE `lost_valuables`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `missing_persons`
--
ALTER TABLE `missing_persons`
  MODIFY `person_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `missing_vehicles`
--
ALTER TABLE `missing_vehicles`
  MODIFY `vehicle_id` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
