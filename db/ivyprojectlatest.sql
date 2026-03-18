-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 30, 2018 at 04:16 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

DROP TABLE IF EXISTS `clothesinfo`;
CREATE TABLE IF NOT EXISTS `clothesinfo` (
  `clothID` int(10) NOT NULL AUTO_INCREMENT,
  `designerID` int(10) NOT NULL,
  `clothName` varchar(40) NOT NULL,
  `clothDescription` varchar(255) NOT NULL,
  `clothPrice` int(10) NOT NULL,
  `clothCategory` varchar(40) NOT NULL,
  `dateOfUpload` varchar(40) NOT NULL,
  PRIMARY KEY (`clothID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `designerinfo`
--

DROP TABLE IF EXISTS `designerinfo`;
CREATE TABLE IF NOT EXISTS `designerinfo` (
  `designerID` int(10) NOT NULL AUTO_INCREMENT,
  `designerFname` varchar(40) NOT NULL,
  `designerSname` varchar(40) NOT NULL,
  `designerUsername` varchar(40) NOT NULL,
  `designerEmail` varchar(40) NOT NULL,
  `designerPhonenumber` varchar(15) NOT NULL,
  `designerCounty` varchar(40) NOT NULL,
  `designerConstituency` varchar(40) NOT NULL,
  `designerPassword` varchar(40) NOT NULL,
  PRIMARY KEY (`designerID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designerinfo`
--

INSERT INTO `designerinfo` (`designerID`, `designerFname`, `designerSname`, `designerUsername`, `designerEmail`, `designerPhonenumber`, `designerCounty`, `designerConstituency`, `designerPassword`) VALUES
(3, 'sylvia', 'yvonne', 'yvette', 'jobokello5@gmail.com', '734665786', 'nairobi', 'Embakasi', 'efb02011d94efa80ae173716e51bad47'),
(4, 'dedan', 'sewe', 'dedan', 'sewe@yahoo.com', '734665786', 'nairobi', 'Embakasi', '3e2c40ab0228b135920d1ee60574bbce');

-- --------------------------------------------------------

--
-- Table structure for table `dispatch`
--

DROP TABLE IF EXISTS `dispatch`;
CREATE TABLE IF NOT EXISTS `dispatch` (
  `dispatchID` int(10) NOT NULL AUTO_INCREMENT,
  `clothName` varchar(40) NOT NULL,
  `trpFee` int(10) NOT NULL,
  `shopperID` int(10) NOT NULL,
  `trpAgentID` int(10) NOT NULL,
  `shopperLattitude` varchar(50) NOT NULL,
  `shopperLongitude` varchar(50) NOT NULL,
  `deliveryStatus` varchar(20) NOT NULL,
  PRIMARY KEY (`dispatchID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderID` int(10) NOT NULL AUTO_INCREMENT,
  `clothName` varchar(40) NOT NULL,
  `clothDescription` varchar(400) NOT NULL,
  `orderPrice` int(10) NOT NULL,
  `shopperID` int(10) NOT NULL,
  `DesignerID` int(10) NOT NULL,
  `designerStatus` varchar(20) NOT NULL,
  `trpAgentStatus` varchar(20) NOT NULL,
  `shopperStatus` varchar(20) NOT NULL,
  PRIMARY KEY (`orderID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `refunds`
--

DROP TABLE IF EXISTS `refunds`;
CREATE TABLE IF NOT EXISTS `refunds` (
  `refundID` int(10) NOT NULL,
  `orderID` int(10) NOT NULL,
  `clothName` varchar(40) NOT NULL,
  `shopperID` int(10) NOT NULL,
  `refundAmount` int(10) NOT NULL,
  `refundStatus` varchar(20) NOT NULL,
  `reason` varchar(200) NOT NULL,
  PRIMARY KEY (`refundID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shopperinfo`
--

DROP TABLE IF EXISTS `shopperinfo`;
CREATE TABLE IF NOT EXISTS `shopperinfo` (
  `shopperID` int(20) NOT NULL AUTO_INCREMENT,
  `shopperFname` varchar(40) NOT NULL,
  `shopperSname` varchar(40) NOT NULL,
  `shopperUsername` varchar(40) NOT NULL,
  `shopperEmail` varchar(40) NOT NULL,
  `shopperPhonenumber` varchar(15) NOT NULL,
  `shopperCounty` varchar(40) NOT NULL,
  `shopperConstituency` varchar(40) NOT NULL,
  `shopperPassword` varchar(40) NOT NULL,
  PRIMARY KEY (`shopperID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopperinfo`
--

INSERT INTO `shopperinfo` (`shopperID`, `shopperFname`, `shopperSname`, `shopperUsername`, `shopperEmail`, `shopperPhonenumber`, `shopperCounty`, `shopperConstituency`, `shopperPassword`) VALUES
(9, 'job', 'okello', 'jobson', 'jobokello5@gmail.com', '0728633625', 'nairobi', 'kibra', '685b142ec68c96fd2d898b11da966670'),
(10, 'yvonne', 'sylvia', 'yvette', 'sylviayvonne65@gmail.com', '0728633625', 'nairobi', 'kibra', 'efb02011d94efa80ae173716e51bad47'),
(11, 'dedan', 'sewe', 'sewe', 'sewe@yahoo.com', '2243545231', 'Kisumu', 'kombewa', 'ad8b2bfedc34541070953461e62f533a');

-- --------------------------------------------------------

--
-- Table structure for table `trpagentinfo`
--

DROP TABLE IF EXISTS `trpagentinfo`;
CREATE TABLE IF NOT EXISTS `trpagentinfo` (
  `trpAgentID` int(11) NOT NULL AUTO_INCREMENT,
  `trpAgentFname` varchar(40) NOT NULL,
  `trpAgentSname` varchar(40) NOT NULL,
  `trpAgentUsername` varchar(40) NOT NULL,
  `trpAgentEmail` varchar(40) NOT NULL,
  `trpAgentPhonenumber` varchar(15) NOT NULL,
  `trpAgentCounty` varchar(40) NOT NULL,
  `trpAgentConstituency` varchar(40) NOT NULL,
  `trpAgentPassword` varchar(40) NOT NULL,
  PRIMARY KEY (`trpAgentID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trpagentinfo`
--

INSERT INTO `trpagentinfo` (`trpAgentID`, `trpAgentFname`, `trpAgentSname`, `trpAgentUsername`, `trpAgentEmail`, `trpAgentPhonenumber`, `trpAgentCounty`, `trpAgentConstituency`, `trpAgentPassword`) VALUES
(6, 'dedan', 'sewe', 'dedan', 'sewe@yahoo.com', '2243545231', 'nairobi', 'kibra', 'ad8b2bfedc34541070953461e62f533a');

-- --------------------------------------------------------

--
-- Table structure for table `wages`
--

DROP TABLE IF EXISTS `wages`;
CREATE TABLE IF NOT EXISTS `wages` (
  `wageID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `designerID` int(11) NOT NULL,
  `trpAgentID` int(11) NOT NULL,
  `trpAgentWage` int(11) NOT NULL,
  `designerWage` int(11) NOT NULL,
  `wageStatus` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
