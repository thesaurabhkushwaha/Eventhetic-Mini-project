-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 22, 2019 at 08:38 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exhibition`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `password`) VALUES
('saurabh', 'abc123'),
('sk', '123');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `contactnumber` bigint(15) NOT NULL,
  `ecode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cid`, `name`, `contactnumber`, `ecode`) VALUES
(1000, 'Saurabh Kushwaha', 7204807242, 500),
(1001, 'Sanikumar Sahani', 6755439871, 501),
(1002, 'Suman Chaudhary', 7656430870, 502),
(1003, 'Roshan D', 9966424561, 503),
(1004, 'Swaraj P', 8869445299, 504);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `evecode` int(11) NOT NULL,
  `evename` varchar(30) NOT NULL,
  `evetime` varchar(5) NOT NULL,
  `ecode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`evecode`, `evename`, `evetime`, `ecode`) VALUES
(800, 'Tech Quiz', '10:00', 500),
(801, 'Paper Presentation', '22:22', 500),
(802, 'R&D for Beginners', '13:45', 504),
(803, 'Building Resume', '09:00', 501),
(804, 'Industry Overview', '14:30', 501),
(805, 'Art of Entrepreneurship', '10:45', 502),
(806, 'Our Physical Environment', '11:30', 503),
(807, 'Chasing Chemistry', '14:00', 503),
(808, 'Concept to Reality', '11:33', 503);

-- --------------------------------------------------------

--
-- Table structure for table `exhibition`
--

CREATE TABLE `exhibition` (
  `ecode` int(11) NOT NULL,
  `icode` int(11) NOT NULL,
  `etitle` varchar(50) NOT NULL,
  `edate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exhibition`
--

INSERT INTO `exhibition` (`ecode`, `icode`, `etitle`, `edate`) VALUES
(500, 120, 'SEAONICS', '2018-05-02'),
(501, 121, 'PES Job Fair', '2018-11-17'),
(502, 122, 'Start-up Launch Pad', '2018-03-28'),
(503, 123, 'Science Exhibition', '2018-12-12'),
(504, 124, 'Innovating Research', '2018-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `institution`
--

CREATE TABLE `institution` (
  `icode` int(11) NOT NULL,
  `iname` varchar(20) COLLATE utf8_bin NOT NULL,
  `ilocation` varchar(30) COLLATE utf8_bin NOT NULL,
  `ihead` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `institution`
--

INSERT INTO `institution` (`icode`, `iname`, `ilocation`, `ihead`) VALUES
(120, 'SEACET', 'KR Puram, Bangalore', 'Mrs. Manjula Krishnappa'),
(121, 'PESIT', 'Electronic City, Bangalore', 'Prof. Ajoy Kumar'),
(122, 'ITI Limited', 'Doorvaninagar, Bangalore', 'Sundaram Gopu'),
(123, 'KV NAL', 'Murugeshpalya, Bangalore', 'M.Manoharan'),
(124, 'DSIT', 'Kumaraswamy Layout, Bangalore', 'Mrs. Prema David');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE `sponsor` (
  `sid` int(11) NOT NULL,
  `sname` varchar(30) NOT NULL,
  `evecode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`sid`, `sname`, `evecode`) VALUES
(900, 'Roshan & Sons Co.', 801),
(901, 'TCS', 803),
(902, 'Intel', 804),
(903, 'MSI', 805),
(904, 'Tunnelbear', 806),
(905, 'SquareSpace', 807),
(906, 'GlassWire', 808),
(907, 'Universal Studios', 800),
(908, 'MIT', 802);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `contact_ibfk_1` (`ecode`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`evecode`),
  ADD KEY `ecode` (`ecode`);

--
-- Indexes for table `exhibition`
--
ALTER TABLE `exhibition`
  ADD PRIMARY KEY (`ecode`),
  ADD KEY `inst-exhi` (`icode`);

--
-- Indexes for table `institution`
--
ALTER TABLE `institution`
  ADD PRIMARY KEY (`icode`);

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `evecode` (`evecode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `institution`
--
ALTER TABLE `institution`
  MODIFY `icode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`ecode`) REFERENCES `exhibition` (`ecode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`ecode`) REFERENCES `exhibition` (`ecode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exhibition`
--
ALTER TABLE `exhibition`
  ADD CONSTRAINT `inst-exhi` FOREIGN KEY (`icode`) REFERENCES `institution` (`icode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD CONSTRAINT `sponsor_ibfk_1` FOREIGN KEY (`evecode`) REFERENCES `event` (`evecode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
