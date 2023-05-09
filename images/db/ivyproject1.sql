-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2018 at 08:10 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ivyproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `clothesinfo`
--

CREATE TABLE `clothesinfo` (
  `clothID` int(10) NOT NULL,
  `designerID` int(10) NOT NULL,
  `clothName` varchar(40) NOT NULL,
  `clothDescription` varchar(255) NOT NULL,
  `clothPrice` int(10) NOT NULL,
  `clothCategory` varchar(40) NOT NULL,
  `image` varchar(10000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clothesinfo`
--


-- --------------------------------------------------------

--
-- Table structure for table `designerinfo`
--

CREATE TABLE `designerinfo` (
  `designerID` int(10) NOT NULL,
  `designerFname` varchar(40) NOT NULL,
  `designerSname` varchar(40) NOT NULL,
  `designerUsername` varchar(40) NOT NULL,
  `designerEmail` varchar(40) NOT NULL,
  `designerPhonenumber` varchar(15) NOT NULL,
  `designerCounty` varchar(40) NOT NULL,
  `designerConstituency` varchar(40) NOT NULL,
  `passwordReset` int(10) DEFAULT NULL,
  `designerPassword` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designerinfo`
--



-- --------------------------------------------------------

--
-- Table structure for table `dispatch`
--

CREATE TABLE `dispatch` (
  `dispatchID` int(10) NOT NULL,
  `orderID` int(10) DEFAULT NULL,
  `clothName` varchar(40) NOT NULL,
  `trpFee` int(10) NOT NULL,
  `shopperID` int(10) NOT NULL,
  `trpAgentID` int(10) NOT NULL,
  `shopperLattitude` varchar(50) DEFAULT NULL,
  `shopperLongitude` varchar(50) DEFAULT NULL,
  `deliveryStatus` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dispatch`
--



-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(10) NOT NULL,
  `clothID` int(11) NOT NULL,
  `clothName` varchar(40) NOT NULL,
  `clothDescription` varchar(400) NOT NULL,
  `orderPrice` int(10) NOT NULL,
  `trpFee` int(10) DEFAULT NULL,
  `shopperID` int(10) NOT NULL,
  `designerID` int(10) NOT NULL,
  `trpAgentID` int(11) DEFAULT NULL,
  `paymentCode` varchar(20) NOT NULL DEFAULT 'missing',
  `paymentStatus` varchar(20) NOT NULL DEFAULT 'unpaid',
  `designerStatus` varchar(20) NOT NULL DEFAULT 'pending',
  `trpAgentStatus` varchar(20) NOT NULL DEFAULT 'pending',
  `shopperStatus` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--



-- --------------------------------------------------------

--
-- Table structure for table `refunds`
--

CREATE TABLE `refunds` (
  `refundID` int(10) NOT NULL,
  `orderID` int(10) NOT NULL,
  `clothName` varchar(40) NOT NULL,
  `shopperID` int(10) NOT NULL,
  `refundAmount` int(10) NOT NULL,
  `refundStatus` varchar(20) NOT NULL,
  `reason` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shopperinfo`
--

CREATE TABLE `shopperinfo` (
  `shopperID` int(20) NOT NULL,
  `shopperFname` varchar(40) NOT NULL,
  `shopperSname` varchar(40) NOT NULL,
  `shopperUsername` varchar(40) NOT NULL,
  `shopperEmail` varchar(40) NOT NULL,
  `shopperPhonenumber` varchar(15) NOT NULL,
  `shopperCounty` varchar(40) NOT NULL,
  `shopperConstituency` varchar(40) NOT NULL,
  `longitude` varchar(126) DEFAULT 'Empty',
  `latitude` varchar(126) DEFAULT 'Empty',
  `passwordReset` int(10) DEFAULT '0',
  `shopperPassword` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopperinfo`
--



-- --------------------------------------------------------

--
-- Table structure for table `trpagentinfo`
--

CREATE TABLE `trpagentinfo` (
  `trpAgentID` int(11) NOT NULL,
  `trpAgentFname` varchar(40) NOT NULL,
  `trpAgentSname` varchar(40) NOT NULL,
  `trpAgentUsername` varchar(40) NOT NULL,
  `trpAgentEmail` varchar(40) NOT NULL,
  `trpAgentPhonenumber` varchar(15) NOT NULL,
  `trpAgentCounty` varchar(40) NOT NULL,
  `trpAgentConstituency` varchar(40) NOT NULL,
  `jobCount` int(10) DEFAULT '0',
  `passwordReset` int(10) DEFAULT NULL,
  `trpAgentPassword` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trpagentinfo`
--



-- --------------------------------------------------------

--
-- Table structure for table `wages`
--

CREATE TABLE `wages` (
  `wageID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `designerID` int(11) NOT NULL,
  `trpAgentID` int(11) NOT NULL,
  `trpAgentWage` int(11) NOT NULL,
  `designerWage` int(11) NOT NULL,
  `wageStatus` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wages`
--



--
-- Indexes for dumped tables
--

--
-- Indexes for table `clothesinfo`
--
ALTER TABLE `clothesinfo`
  ADD PRIMARY KEY (`clothID`);

--
-- Indexes for table `designerinfo`
--
ALTER TABLE `designerinfo`
  ADD PRIMARY KEY (`designerID`);

--
-- Indexes for table `dispatch`
--
ALTER TABLE `dispatch`
  ADD PRIMARY KEY (`dispatchID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `refunds`
--
ALTER TABLE `refunds`
  ADD PRIMARY KEY (`refundID`);

--
-- Indexes for table `shopperinfo`
--
ALTER TABLE `shopperinfo`
  ADD PRIMARY KEY (`shopperID`);

--
-- Indexes for table `trpagentinfo`
--
ALTER TABLE `trpagentinfo`
  ADD PRIMARY KEY (`trpAgentID`);

--
-- Indexes for table `wages`
--
ALTER TABLE `wages`
  ADD PRIMARY KEY (`wageID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clothesinfo`
--
ALTER TABLE `clothesinfo`
  MODIFY `clothID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `designerinfo`
--
ALTER TABLE `designerinfo`
  MODIFY `designerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `dispatch`
--
ALTER TABLE `dispatch`
  MODIFY `dispatchID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `shopperinfo`
--
ALTER TABLE `shopperinfo`
  MODIFY `shopperID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `trpagentinfo`
--
ALTER TABLE `trpagentinfo`
  MODIFY `trpAgentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `wages`
--
ALTER TABLE `wages`
  MODIFY `wageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
