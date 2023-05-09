-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2018 at 11:31 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clothesinfo`
--

INSERT INTO `clothesinfo` (`clothID`, `designerID`, `clothName`, `clothDescription`, `clothPrice`, `clothCategory`, `image`) VALUES
(1, 4, 'dashiki', 'for the couples', 10000, 'couples', 'couple (10).jpg'),
(2, 4, 'dashiki', 'for the couples', 10000, 'couples', 'couple (10).jpg'),
(8, 4, 'dashiki', 'fsacv', 10000, 'men', 'couple (10).jpg'),
(9, 4, 'dcbsu', 'ds hv vdsv', 10000, 'men', 'couple (10).jpg'),
(10, 4, 'gehbd', 'kjihug', 10000, 'men', 'couple (10).jpg'),
(11, 4, 'uhygf', 'byughv', 12345, 'men', 'couple (10).jpg'),
(12, 4, 'Jack Johnson', 'f gywgfvghgefve', 10000, 'men', 'couple (10).jpg'),
(13, 4, 'dashiki', 'youte', 10000, 'men', 'couple (10).jpg'),
(14, 4, 'Royal Kitenge', 'gfyugfwdsx', 10000, 'men', 'couple (10).jpg'),
(15, 4, 'itdwgsyd', 'jeby f', 3785, 'men', 'couple (10).jpg'),
(16, 4, 'cr ftg', 'gfvcg cdc', 200, 'men', 'couple (10).jpg'),
(17, 4, 'ogaoo', 'cpouples', 2437, 'couples', 'couple (5).jpg'),
(18, 4, 'man25', 'urban', 10000, 'men', 'men_2_225x225.jpg'),
(19, 4, 'nguo ya brown', 'hii nguo ni fire', 5000, 'men', 'men (18).jpg'),
(20, 4, 'pia hii ni nomare', 'bro', 560, 'men', 'men (21).jpg'),
(21, 4, 'slayqueen armor', 'drops', 500, 'women', 'women (2).jpg'),
(22, 4, 'crew regalia', 'kjfkehwdgsy', 6589, 'women', 'women (7).jpg'),
(23, 5, 'purity', 'hellllo', 12000, 'couples', 'couple (8).jpg'),
(24, 6, 'sylvia', 'hello', 12000, 'couples', 'couple (6).jpg'),
(25, 7, 'Micheal', 'helllloooo', 20000, 'men', 'men (9).jpg'),
(26, 4, 'Ivy Special', 'Suitable for the night outs', 12000, 'women', 'women (24).jpg'),
(27, 4, 'African Punch', 'elegance redefined', 34560, 'women', 'women (12).jpg'),
(28, 4, 'Phoebe on Fleek', 'BFF', 2000, 'women', 'IMG-20181122-WA0010.jpg'),
(29, 4, 'Jack Johnson', 'poiu9y8t7rfdtyg', 7653, 'men', 'IMG-20181125-WA0017.jpg');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designerinfo`
--

INSERT INTO `designerinfo` (`designerID`, `designerFname`, `designerSname`, `designerUsername`, `designerEmail`, `designerPhonenumber`, `designerCounty`, `designerConstituency`, `passwordReset`, `designerPassword`) VALUES
(3, 'sylvia', 'yvonne', 'yvette', 'jobokello5@gmail.com', '734665786', 'nairobi', 'Embakasi', NULL, 'efb02011d94efa80ae173716e51bad47'),
(4, 'dedan', 'sewe', 'dedan', 'sewe@yahoo.com', '734665786', 'nairobi', 'Embakasi', NULL, '3e2c40ab0228b135920d1ee60574bbce'),
(5, 'job', 'opiyo', 'mac', 'jobokello5@gmail.com', '0745673456', 'mombasa', 'kakamega', NULL, 'fcea920f7412b5da7be0cf42b8c93759'),
(6, 'sylvia', 'yvonne', 'syl', 'sylviayvonne65@gmail.com', '', 'mombasa', 'kakamega', NULL, 'fcea920f7412b5da7be0cf42b8c93759'),
(7, 'mark', 'opiyo', 'prosy', 'jobokello5@gmail.com', '', 'Garissa', 'Sirisia', NULL, '25f9e794323b453885f5181f1b624d0b');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dispatch`
--

INSERT INTO `dispatch` (`dispatchID`, `orderID`, `clothName`, `trpFee`, `shopperID`, `trpAgentID`, `shopperLattitude`, `shopperLongitude`, `deliveryStatus`) VALUES
(12, 1, 'pia hii ni nomare', 200, 11, 7, NULL, NULL, 'confirmed');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `clothID`, `clothName`, `clothDescription`, `orderPrice`, `trpFee`, `shopperID`, `designerID`, `trpAgentID`, `paymentCode`, `paymentStatus`, `designerStatus`, `trpAgentStatus`, `shopperStatus`) VALUES
(1, 20, 'pia hii ni nomare', 'bro', 560, 200, 11, 4, 7, 'zerdtfy ub', 'Paid', 'Confirmed', 'confirmed', 'Confirmed'),
(2, 17, 'ogaoo', 'cpouples', 2437, NULL, 11, 4, 0, 'vygifbdhcj', 'Paid', 'Confirmed', 'pending', 'Confirmed'),
(3, 19, 'nguo ya brown', 'hii nguo ni fire', 5000, NULL, 11, 4, 0, 'ftyefv45dr', 'Paid', 'pending', 'pending', 'pending'),
(4, 22, 'crew regalia', 'kjfkehwdgsy', 6589, NULL, 11, 4, 0, 'bryvfggyed', 'Paid', 'Confirmed', 'pending', 'pending'),
(5, 2, 'dashiki', 'for the couples', 10000, NULL, 11, 4, 0, 'trfyghjbkf', 'Paid', 'pending', 'pending', 'pending'),
(6, 12, 'Jack Johnson', 'f gywgfvghgefve', 10000, NULL, 11, 4, 0, 'rdctfgvhjk', 'Paid', 'pending', 'pending', 'pending'),
(7, 2, 'dashiki', 'for the couples', 10000, NULL, 9, 4, 0, 'efvdgsbhjk', 'Paid', 'pending', 'pending', 'Confirmed'),
(8, 16, 'cr ftg', 'gfvcg cdc', 200, NULL, 9, 4, 0, 'gebskdjfds', 'unpaid', 'pending', 'pending', 'pending'),
(9, 20, 'pia hii ni nomare', 'bro', 560, NULL, 9, 4, 0, '2345678990', 'unpaid', 'pending', 'pending', 'pending'),
(10, 22, 'crew regalia', 'kjfkehwdgsy', 6589, NULL, 9, 4, 0, 'itrwfgyeuw', 'unpaid', 'pending', 'pending', 'pending'),
(11, 25, 'Micheal', 'helllloooo', 20000, NULL, 9, 7, 0, 'bciudsytjf', 'Paid', 'pending', 'pending', 'pending'),
(12, 19, 'nguo ya brown', 'hii nguo ni fire', 5000, NULL, 9, 4, 0, 'hbejgfiuew', 'Paid', 'pending', 'confirmed', 'pending'),
(13, 23, 'purity', 'hellllo', 12000, NULL, 9, 5, 0, '09uoit7r6y', 'Paid', 'pending', 'pending', 'pending'),
(14, 25, 'Micheal', 'helllloooo', 20000, NULL, 11, 7, 0, 'missing', 'unpaid', 'pending', 'pending', 'pending'),
(15, 15, 'itdwgsyd', 'jeby f', 3785, NULL, 11, 4, 0, 'missing', 'unpaid', 'pending', 'pending', 'pending'),
(16, 18, 'man25', 'urban', 10000, NULL, 11, 4, 0, 'missing', 'unpaid', 'pending', 'pending', 'pending'),
(17, 23, 'purity', 'hellllo', 12000, NULL, 11, 5, 0, 'missing', 'unpaid', 'pending', 'pending', 'pending'),
(18, 24, 'sylvia', 'hello', 12000, NULL, 11, 6, 0, 'missing', 'unpaid', 'pending', 'pending', 'pending'),
(19, 25, 'Micheal', 'helllloooo', 20000, NULL, 11, 7, 0, 'missing', 'unpaid', 'pending', 'pending', 'pending'),
(20, 22, 'crew regalia', 'kjfkehwdgsy', 6589, NULL, 11, 4, 0, 'missing', 'unpaid', 'pending', 'pending', 'pending'),
(21, 20, 'pia hii ni nomare', 'bro', 560, NULL, 11, 4, 0, 'missing', 'unpaid', 'pending', 'pending', 'pending'),
(22, 10, 'gehbd', 'kjihug', 10000, NULL, 11, 4, 0, 'missing', 'unpaid', 'pending', 'pending', 'pending'),
(23, 27, 'African Punch', 'elegance redefined', 34560, NULL, 11, 4, 0, '8uyfdercft', 'Paid', 'pending', 'pending', 'pending'),
(24, 26, 'Ivy Special', 'Suitable for the night outs', 12000, NULL, 11, 4, 0, 'swedrftyui', 'Paid', 'pending', 'pending', 'pending'),
(25, 2, 'dashiki', 'for the couples', 10000, NULL, 11, 4, NULL, 'missing', 'unpaid', 'pending', 'pending', 'pending'),
(26, 28, 'Phoebe on Fleek', 'BFF', 2000, NULL, 11, 4, NULL, 'missing', 'unpaid', 'pending', 'pending', 'pending');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopperinfo`
--

INSERT INTO `shopperinfo` (`shopperID`, `shopperFname`, `shopperSname`, `shopperUsername`, `shopperEmail`, `shopperPhonenumber`, `shopperCounty`, `shopperConstituency`, `longitude`, `latitude`, `passwordReset`, `shopperPassword`) VALUES
(9, 'job', 'okello', 'jobson', 'jobokello5@gmail.com', '0728633625', 'nairobi', 'kibra', NULL, NULL, NULL, '685b142ec68c96fd2d898b11da966670'),
(10, 'yvonne', 'sylvia', 'yvette', 'sylviayvonne65@gmail.com', '0728633625', 'nairobi', 'kibra', NULL, NULL, NULL, 'efb02011d94efa80ae173716e51bad47'),
(11, 'dedan', 'sewe', 'sewe', 'sewe@yahoo.com', '2243545231', 'Kisumu', 'Kombewa', NULL, NULL, NULL, 'ad8b2bfedc34541070953461e62f533a'),
(12, 'sylvia', 'yvonne', 'syl', 'sylviayvonne65@gmail.com', '', 'mombasa', 'kakamega', NULL, NULL, NULL, 'fcea920f7412b5da7be0cf42b8c93759'),
(13, 'sylvia', 'yvonne', 'syl', 'sylviayvonne65@gmail.com', '', 'mombasa', 'kakamega', NULL, NULL, NULL, 'fcea920f7412b5da7be0cf42b8c93759'),
(14, 'sylvia', 'yvonne', 'ivy', 'sylviayvonne65@gmail.com', '', 'kenya', 'sarangombe', NULL, NULL, NULL, 'fcea920f7412b5da7be0cf42b8c93759'),
(15, 'sylvia', 'yvonne', 'ivy', 'sylviayvonne65@gmail.com', '0745673456', 'mombasa', 'kakamega', NULL, NULL, NULL, 'fcea920f7412b5da7be0cf42b8c93759'),
(16, 'mark', 'nyang', 'mac', 'jobokello5@gmail.com', '0745673456', 'mombasa', 'kakamega', NULL, NULL, NULL, '25d55ad283aa400af464c76d713c07ad'),
(17, 'mark', 'nyang', 'mac', 'jobokello5@gmail.com', '0745673456', 'mombasa', 'kakamega', NULL, NULL, NULL, '25d55ad283aa400af464c76d713c07ad'),
(18, 'sylvia', 'yvonne', 'ivy', 'sylviayvonne65@gmail.com', '', 'mombasa', 'kakamega', NULL, NULL, NULL, '25f9e794323b453885f5181f1b624d0b'),
(19, 'byron', 'Ochieng', 'byron', 'byron@yahoo.com', '012176888', 'nairobi', 'Embakasi', NULL, NULL, NULL, '8720070ac8f94bbbff5a347eed656925'),
(20, 'Byron', 'okello', 'okello', 'jobokello5@gmail.com', '', 'Nairobi', 'Embakasi', '36.0076904296875', '-1.14543079216601', 0, 'e57ce41e0426a259ae4f7470e88c06e9');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trpagentinfo`
--

INSERT INTO `trpagentinfo` (`trpAgentID`, `trpAgentFname`, `trpAgentSname`, `trpAgentUsername`, `trpAgentEmail`, `trpAgentPhonenumber`, `trpAgentCounty`, `trpAgentConstituency`, `jobCount`, `passwordReset`, `trpAgentPassword`) VALUES
(6, 'dedan', 'sewe', 'dedan', 'sewe@yahoo.com', '2243545231', 'nairobi', 'kibra', 0, NULL, 'ad8b2bfedc34541070953461e62f533a'),
(7, 'Adrian', 'Nyangau', 'Adrian', 'jobokello5@gmail.com', '734665786', 'Kisumu', 'Kombewa', 4, NULL, '8c4205ec33d8f6caeaaaa0c10a14138c');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wages`
--

INSERT INTO `wages` (`wageID`, `orderID`, `designerID`, `trpAgentID`, `trpAgentWage`, `designerWage`, `wageStatus`) VALUES
(1, 1, 4, 7, 200, 560, 'pending'),
(2, 1, 4, 7, 200, 560, 'pending'),
(3, 1, 4, 7, 200, 560, 'pending'),
(4, 1, 4, 7, 200, 560, 'pending'),
(5, 1, 4, 7, 200, 560, 'pending'),
(6, 1, 4, 7, 200, 560, 'pending'),
(7, 1, 4, 7, 200, 560, 'pending'),
(8, 1, 4, 7, 200, 560, 'pending'),
(9, 1, 4, 7, 200, 560, 'pending'),
(10, 1, 4, 7, 200, 560, 'pending'),
(11, 1, 4, 7, 200, 560, 'pending'),
(12, 1, 4, 7, 200, 560, 'pending'),
(13, 1, 4, 7, 200, 560, 'pending'),
(14, 1, 4, 7, 200, 560, 'pending'),
(15, 1, 4, 7, 200, 560, 'pending'),
(16, 1, 4, 7, 200, 560, 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clothesinfo`
--
ALTER TABLE `clothesinfo`
  ADD PRIMARY KEY (`clothID`),
  ADD KEY `clothID` (`clothID`),
  ADD KEY `clothID_2` (`clothID`),
  ADD KEY `clothID_3` (`clothID`,`designerID`),
  ADD KEY `designerID` (`designerID`);

--
-- Indexes for table `designerinfo`
--
ALTER TABLE `designerinfo`
  ADD PRIMARY KEY (`designerID`),
  ADD KEY `designerID` (`designerID`),
  ADD KEY `designerID_2` (`designerID`);

--
-- Indexes for table `dispatch`
--
ALTER TABLE `dispatch`
  ADD PRIMARY KEY (`dispatchID`),
  ADD KEY `dispatchID` (`dispatchID`),
  ADD KEY `dispatchID_2` (`dispatchID`,`orderID`,`shopperID`,`trpAgentID`),
  ADD KEY `shopperID` (`shopperID`),
  ADD KEY `trpAgentID` (`trpAgentID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `orderID_2` (`orderID`,`clothID`,`shopperID`,`designerID`,`trpAgentID`),
  ADD KEY `shopperID` (`shopperID`),
  ADD KEY `designerID` (`designerID`),
  ADD KEY `clothID` (`clothID`);

--
-- Indexes for table `refunds`
--
ALTER TABLE `refunds`
  ADD PRIMARY KEY (`refundID`),
  ADD KEY `refundID` (`refundID`),
  ADD KEY `refundID_2` (`refundID`,`orderID`,`shopperID`),
  ADD KEY `shopperID` (`shopperID`);

--
-- Indexes for table `shopperinfo`
--
ALTER TABLE `shopperinfo`
  ADD PRIMARY KEY (`shopperID`),
  ADD KEY `shopperID` (`shopperID`);

--
-- Indexes for table `trpagentinfo`
--
ALTER TABLE `trpagentinfo`
  ADD PRIMARY KEY (`trpAgentID`),
  ADD KEY `trpAgentID` (`trpAgentID`);

--
-- Indexes for table `wages`
--
ALTER TABLE `wages`
  ADD PRIMARY KEY (`wageID`),
  ADD KEY `wageID` (`wageID`),
  ADD KEY `wageID_2` (`wageID`),
  ADD KEY `wageID_3` (`wageID`,`orderID`,`designerID`,`trpAgentID`),
  ADD KEY `designerID` (`designerID`),
  ADD KEY `trpAgentID` (`trpAgentID`);

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
  MODIFY `shopperID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
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
--
-- Constraints for dumped tables
--

--
-- Constraints for table `clothesinfo`
--
ALTER TABLE `clothesinfo`
  ADD CONSTRAINT `clothesinfo_ibfk_1` FOREIGN KEY (`designerID`) REFERENCES `designerinfo` (`designerID`);

--
-- Constraints for table `dispatch`
--
ALTER TABLE `dispatch`
  ADD CONSTRAINT `dispatch_ibfk_1` FOREIGN KEY (`shopperID`) REFERENCES `shopperinfo` (`shopperID`),
  ADD CONSTRAINT `dispatch_ibfk_2` FOREIGN KEY (`trpAgentID`) REFERENCES `trpagentinfo` (`trpAgentID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`shopperID`) REFERENCES `shopperinfo` (`shopperID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`designerID`) REFERENCES `designerinfo` (`designerID`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`clothID`) REFERENCES `clothesinfo` (`clothID`);

--
-- Constraints for table `refunds`
--
ALTER TABLE `refunds`
  ADD CONSTRAINT `refunds_ibfk_1` FOREIGN KEY (`shopperID`) REFERENCES `shopperinfo` (`shopperID`);

--
-- Constraints for table `wages`
--
ALTER TABLE `wages`
  ADD CONSTRAINT `wages_ibfk_1` FOREIGN KEY (`designerID`) REFERENCES `designerinfo` (`designerID`),
  ADD CONSTRAINT `wages_ibfk_2` FOREIGN KEY (`trpAgentID`) REFERENCES `trpagentinfo` (`trpAgentID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
