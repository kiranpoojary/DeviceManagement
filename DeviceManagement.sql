
DROP DATABASE IF EXISTS `DeviceManagement`;

CREATE DATABASE `DeviceManagement`;


DROP TABLE IF EXISTS `alldevices`;
CREATE TABLE IF NOT EXISTS `alldevices` (
  `devCategory` varchar(20) NOT NULL,
  `devid` varchar(30) NOT NULL,
  `serNo` varchar(20) NOT NULL,
  `model` varchar(25) NOT NULL,
  `dop` date NOT NULL,
  `company` varchar(20) NOT NULL,
  `seller` varchar(25) NOT NULL,
  `waranty` int(3) NOT NULL,
  `installedin` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`devid`),
  UNIQUE KEY `serNo` (`serNo`),
  KEY `devCategory_2` (`devCategory`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alldevices`
--

INSERT INTO `alldevices` (`devCategory`, `devid`, `serNo`, `model`, `dop`, `company`, `seller`, `waranty`, `installedin`, `status`) VALUES
('DESKTOPS', 'DESKTOPS15112019002', 'dsf45sf55', 'HP Pavillion', '2019-11-15', 'HP', 'HP Laps And Computers', 12, 'LAB3', 'Active'),
('DESKTOPS', 'DESKTOPS26042019001', 'xhhs786', '7765', '2019-04-26', 'HP', 'Km Electronics', 12, 'LAB1', 'Active'),
('LAPTOPS', 'LAPTOPS03122018007', '12gh78e5sg', 'hp800X', '2018-12-03', 'HP', 'Richard Computer Sales', 12, 'LAB5', 'Active'),
('LAPTOPS', 'LAPTOPS05032019002', 'kopf657f', 'dfg76asw', '2019-03-05', 'DELL', 'Mars Electricals', 12, 'LAB3', 'Active'),
('LAPTOPS', 'LAPTOPS06032019006', 'jhfg7e', 'sdg456a', '2019-03-06', '', 'Mars Electricals', 2, 'LAB3', 'Active'),
('LAPTOPS', 'LAPTOPS26032019001', 'dfgtyudg', 'sdf546hjk,', '2019-03-26', 'Lenovo', 'Mars Electricals', 18, 'LAB3', 'Active'),
('MONITOR', 'MONITOR03042019001', 'ghd6w7', '425', '2019-04-03', 'Lenovo', 'M R electronics', 6, 'A008', 'Active'),
('PRINTER', 'PRINTER08012019002', '45df15eg54', 'HP500xc', '2019-01-08', 'HP', 'Pai Computers', 12, 'Dept. Office', 'Active'),
('PRINTER', 'PRINTER11032019001', 'fgnvc6y44', 'S213', '2019-03-11', '', 'Mars Electricals', 12, 'LAB3', 'Active'),
('PROJECTOR', 'PROJECTOR02042019001', 'fgd564', '432', '2019-04-02', 'HP', 'JK electronics', 12, 'LAB1', 'Active'),
('SCANNER', 'SCANNER01032019002', 'dg567tyed43', 'A120', '2019-03-01', 'HP', 'Mars Electricals', 20, 'LAB3', 'Active'),
('SCANNER', 'SCANNER06032019001', 'dc46sfd45', 'A120', '2019-03-06', '', 'electro', 12, 'LAB3', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `devCategory` varchar(15) NOT NULL,
  `lastAdded` int(4) NOT NULL,
  PRIMARY KEY (`devCategory`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`devCategory`, `lastAdded`) VALUES
('DESKTOPS', 2),
('LAN CABLE', 0),
('LAPTOPS', 7),
('MONITOR', 1),
('PRINTER', 2),
('PROJECTOR', 1),
('RAM', 0),
('ROUTER', 0),
('SCANNER', 2),
('SWITCH', 1),
('UPS', 0),
('WIFI', 0),
('_OTHER_', 0);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `coname` varchar(30) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `taluk` varchar(20) NOT NULL,
  `landmark` varchar(30) NOT NULL,
  `pin` int(6) NOT NULL,
  `cin_no` varchar(21) NOT NULL,
  `contact` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Comany related details are stored in this table';

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`coname`, `branch`, `country`, `state`, `district`, `taluk`, `landmark`, `pin`, `cin_no`, `contact`) VALUES
('PES University', 'Ring Road', 'India', 'Karnataka', 'Bangalore', 'BBMP', 'Banashankari 3rd Stage', 560085, '56987asdfg85476952htf', 995875869);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

DROP TABLE IF EXISTS `maintenance`;
CREATE TABLE IF NOT EXISTS `maintenance` (
  `maintenanceID` int(6) NOT NULL AUTO_INCREMENT,
  `devCategory` varchar(20) NOT NULL,
  `devid` varchar(30) NOT NULL,
  `maintainDate` date NOT NULL,
  `issue` varchar(150) NOT NULL,
  `repairedBy` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `withWarranty` varchar(3) NOT NULL,
  `added` varchar(3) NOT NULL,
  `addedName` varchar(20) NOT NULL,
  `addedsl` varchar(20) NOT NULL,
  `addedWarranty` int(3) NOT NULL,
  `removed` varchar(3) NOT NULL,
  `removedName` varchar(20) NOT NULL,
  `removedsl` varchar(20) NOT NULL,
  `billno` varchar(15) NOT NULL,
  `Description` varchar(200) NOT NULL,
  PRIMARY KEY (`maintenanceID`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`maintenanceID`, `devCategory`, `devid`, `maintainDate`, `issue`, `repairedBy`, `status`, `withWarranty`, `added`, `addedName`, `addedsl`, `addedWarranty`, `removed`, `removedName`, `removedsl`, `billno`, `Description`) VALUES
(52, 'DESKTOPS', 'DESKTOPS15112019002', '2019-11-15', 'Power Button Not Working.', 'Computer Repair Solution', 'Active', 'No', 'No', 'Nil', 'Nil', 0, 'No', 'Nil', 'Nil', 'Nil', 'Fixed'),
(51, 'DESKTOPS', 'DESKTOPS26042019001', '2019-04-28', 'hard disk not booting', 'Mars Computer Solution', 'Active', 'No', 'No', 'Nil', 'Nil', 0, 'Yes', 'smps', '65xshbx', '1225587', 'device is working fine'),
(50, 'SCANNER', 'SCANNER06032019001', '2019-02-18', 'Laser Fault', 'Swagath Hardware Solutions', 'Active', 'No', 'Yes', 'laser bulb', '1423hj5g2', 6, 'Yes', 'laser bulb', '5g69f4hd', '1256478', 'Fixed and Reinstalled'),
(48, 'LAPTOPS', 'LAPTOPS26032019001', '2019-03-13', 'display blur and Slow', 'Mars Computer Solution', 'Active', 'No', 'Yes', 'yy', 'dh', 6, 'No', 'Nil', 'Nil', '123321', 'Fixed'),
(49, 'LAPTOPS', 'LAPTOPS03122018007', '2019-05-03', 'Slow Processing', 'HP Services', 'Active', 'Yes', 'No', 'Nil', 'Nil', 0, 'No', 'Nil', 'Nil', 'Nil', 'Repaired and Reinstalled');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` varchar(20) NOT NULL,
  `password` varchar(12) NOT NULL,
  `email` varchar(40) NOT NULL,
  `privilage` varchar(5) NOT NULL,
  UNIQUE KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `password`, `email`, `privilage`) VALUES
('chandra123', '123123', 'chandramouliganesh97@gmail.com', 'User'),
('admin123', '123123', 'kiranpoojary483@gmail.com', 'Admin'),
('abhiram123', '123123', 'abhiramp21@gmail.com', 'User'),
('kiran123', '123123', 'kiranpjr97@gmail.com', 'User');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alldevices`
--
ALTER TABLE `alldevices`
  ADD CONSTRAINT `alldevices_ibfk_1` FOREIGN KEY (`devCategory`) REFERENCES `categories` (`devCategory`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
