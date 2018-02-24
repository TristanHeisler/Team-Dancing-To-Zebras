-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 24, 2018 at 01:18 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.25-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ense470`
--

-- --------------------------------------------------------

--
-- Table structure for table `ApproverList`
--

CREATE TABLE `ApproverList` (
  `approverID` int(10) UNSIGNED NOT NULL,
  `softwareToolID` int(10) UNSIGNED NOT NULL,
  `approvalRegion` varchar(255) NOT NULL DEFAULT 'Canada'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ApproverList`
--

INSERT INTO `ApproverList` (`approverID`, `softwareToolID`, `approvalRegion`) VALUES
(1, 1, 'Canada'),
(2, 1, 'Canada'),
(3, 2, 'Canada'),
(4, 3, 'Canada'),
(5, 4, 'Canada'),
(6, 5, 'Canada'),
(7, 6, 'Canada'),
(8, 7, 'Canada'),
(9, 8, 'Canada'),
(10, 9, 'Canada'),
(11, 10, 'Canada'),
(12, 11, 'Canada'),
(13, 12, 'Canada'),
(14, 13, 'Canada'),
(15, 14, 'Canada'),
(16, 15, 'Canada'),
(17, 16, 'Canada'),
(18, 17, 'Canada'),
(19, 18, 'Canada'),
(20, 19, 'Canada'),
(21, 20, 'Canada'),
(22, 21, 'Canada'),
(23, 22, 'Canada'),
(24, 23, 'Canada'),
(25, 24, 'Canada'),
(26, 25, 'Canada'),
(27, 26, 'Canada'),
(28, 27, 'Canada'),
(29, 28, 'Canada'),
(30, 29, 'Canada'),
(31, 29, 'Canada'),
(32, 30, 'Canada'),
(33, 30, 'Canada'),
(32, 31, 'Canada'),
(33, 31, 'Canada'),
(34, 32, 'Canada'),
(35, 33, 'Canada'),
(36, 34, 'Canada'),
(37, 35, 'Canada'),
(38, 36, 'Canada'),
(39, 37, 'Canada'),
(40, 38, 'Canada'),
(41, 39, 'Canada'),
(42, 40, 'Canada'),
(43, 41, 'Canada'),
(44, 42, 'Canada'),
(45, 43, 'Canada'),
(46, 44, 'Canada'),
(47, 45, 'Canada'),
(48, 46, 'Canada'),
(49, 47, 'Canada'),
(50, 48, 'Canada'),
(31, 49, 'Canada'),
(30, 49, 'Canada'),
(2, 50, 'Canada'),
(51, 51, 'Canada'),
(52, 52, 'Canada'),
(53, 53, 'Canada'),
(54, 54, 'Canada'),
(56, 56, 'British Columbia'),
(57, 57, 'Canada'),
(58, 56, 'Alberta, Saskatchewan, Manitoba'),
(59, 58, 'Canada'),
(60, 59, 'Canada'),
(61, 60, 'Canada'),
(62, 61, 'Canada'),
(63, 62, 'Canada'),
(64, 56, 'Ontario'),
(65, 56, 'Quebec'),
(66, 56, 'Yukon, Northwest Territories, Nunavut'),
(67, 63, 'Canada'),
(68, 64, 'Canada'),
(69, 65, 'Canada'),
(70, 56, 'New Brunswick, Prince Edward Island, Nova Scotia, Newfoundland and Labrador'),
(71, 66, 'Canada'),
(72, 67, 'Canada'),
(33, 68, 'Canada'),
(32, 68, 'Canada'),
(73, 69, 'Canada'),
(55, 55, 'Canada');

-- --------------------------------------------------------

--
-- Table structure for table `SoftwareTool`
--

CREATE TABLE `SoftwareTool` (
  `toolID` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `acronym` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SoftwareTool`
--

INSERT INTO `SoftwareTool` (`toolID`, `name`, `acronym`) VALUES
(1, 'Operating Map of Gastropathy', 'OMG'),
(2, 'Limited Operating Liability', 'LOL'),
(3, 'Total Mastering of Incisions', 'TMI'),
(4, 'Fixed Orthodontics Medical Operations', 'FOMO'),
(5, 'List of Transactions and Redactions', 'LOTR'),
(6, 'Northern Ozone & Ocean Biome', 'NOOB'),
(7, 'Alternative Sewage System', NULL),
(8, 'Relational Observation System Limited', 'ROFL'),
(9, 'Fast Family Finder', NULL),
(10, 'Sustainable Xeriscaping', 'SuX'),
(11, 'World Terrain & Forestry', 'WTF'),
(12, 'Web Utility Table', 'WUT'),
(13, 'Data & Utility Heuristics', 'DUH'),
(14, 'Observation (version 1)', 'OB1'),
(15, 'National Ozone Observatory Bot', 'NOOB'),
(16, 'Heart Ultrasound Heatmaps', 'HUH'),
(17, 'Free MySQL Logger', 'FML'),
(18, 'Heart, Abdomen, and Head Assessor', 'HAHA'),
(19, 'Waste Electronic & Wireless Equipment', 'WEWE'),
(20, 'Biosphere Air and Gas Interpreter', NULL),
(21, 'Original Record of Landscape and Yards', 'ORLY'),
(22, 'Selected Analytical Methods', 'SAM'),
(23, 'Storm Water Management', NULL),
(24, 'Planetary Environmental Reference System', 'PERS'),
(25, 'Snowmed Analyzer System Extended Edition', 'SASEE'),
(26, 'Picture Archive and Communication System', 'PACS'),
(27, 'Radiology Information System', 'RIS'),
(28, 'Download Urgent Medical Backups', 'DUMB'),
(29, 'Pharmaceutical Information Program', 'PIP'),
(30, 'Remote Health Checker', NULL),
(31, 'Remote Stroke Checker', NULL),
(32, 'Chronic Disease Management', NULL),
(33, 'Ambulance Schedule System', NULL),
(34, 'Care Manager', NULL),
(35, 'Lab Information System', 'LIS'),
(36, 'Patient Admitter Tool', 'PAT'),
(37, 'Spillage Locator Tool', NULL),
(38, 'Environmental Assessor Tool', NULL),
(39, 'Statistical Analysis System', 'SAS'),
(40, 'Statistical Package for Social Sciences', 'SPSS'),
(41, 'Cisco WebEx', NULL),
(42, 'Homecare System', NULL),
(43, 'Electronic Medical Record (Viewer)', 'EMR'),
(44, 'eHealthChart', NULL),
(45, 'Environmental Home Manager', NULL),
(46, 'Clinical Data Repository', 'CDR'),
(47, 'Netcare Occupation & Observation Base System', NULL),
(48, 'Find a Doctor', 'FAD'),
(49, 'Drug Profile Viewer', 'DPV'),
(50, 'Abdomen Tissue and Analysis Tool', 'AT-AT'),
(51, 'Provider Coverage Viewer', 'PCV'),
(52, 'Transcription Magic Interpreter', 'TMI'),
(53, 'PharmaCare', NULL),
(54, 'Provider Registry System', 'PRS'),
(55, 'Electronic Lab System Interpolator', 'ELSI'),
(56, 'myeHealth', NULL),
(57, 'eReferral', NULL),
(58, 'Cleaning Product Analyzer', NULL),
(59, 'Greenhouse Gas Analyzer', NULL),
(60, 'Pollution Alerts Datamart', 'PAD'),
(61, 'Water and Land Data Observer', 'WALDO'),
(62, 'Waste Observation System', NULL),
(63, 'Weather Analyzer Software System Unix Platform', 'WASSUP'),
(64, 'Weather and Ozone Observation Knowledge Emulator Enterprise Edition', 'WOOKEEE'),
(65, 'Microstrategy', NULL),
(66, 'Clinical Admission Manager', NULL),
(67, 'Ambulance Supply System', NULL),
(68, 'TeleCare', NULL),
(69, 'Surgical Information System', 'SIS');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `userID` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL DEFAULT 'abc123',
  `email` varchar(50) NOT NULL DEFAULT 'user@hell.com',
  `isAnalyst` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`userID`, `name`, `username`, `password`, `email`, `isAnalyst`) VALUES
(1, 'Chester Field', 'ChesterField', 'abc123', 'user@hell.com', 0),
(2, 'Ida Claire', 'IdaClaire', 'abc123', 'user@hell.com', 0),
(3, 'Amanda Huginkiss', 'AmandaHuginkiss', 'abc123', 'user@hell.com', 0),
(4, 'Les Wynan', 'LesWynan', 'abc123', 'user@hell.com', 0),
(5, 'Tara Dactyl', 'TaraDactyl', 'abc123', 'user@hell.com', 0),
(6, 'Claire Voyant', 'ClaireVoyant', 'abc123', 'user@hell.com', 0),
(7, 'Will Tickelu', 'WillTickelu', 'abc123', 'user@hell.com', 0),
(8, 'Polly Graff', 'PollyGraff', 'abc123', 'user@hell.com', 0),
(9, 'Stan Dupp', 'StanDupp', 'abc123', 'user@hell.com', 0),
(10, 'Gene Poole', 'GenePoole', 'abc123', 'user@hell.com', 0),
(11, 'Neil Down', 'NeilDown', 'abc123', 'user@hell.com', 0),
(12, 'Brock Lee', 'BrockLee', 'abc123', 'user@hell.com', 0),
(13, 'Dot Matricks', 'DotMatricks', 'abc123', 'user@hell.com', 0),
(14, 'Goldie Locke', 'GoldieLocke', 'abc123', 'user@hell.com', 0),
(15, 'Ally Katz', 'AllyKatz', 'abc123', 'user@hell.com', 0),
(16, 'Leah Tarde', 'LeahTarde', 'abc123', 'user@hell.com', 0),
(17, 'Dr. Chris P. Bacon', 'ChrisBacon', 'abc123', 'user@hell.com', 0),
(18, 'Sue Flay', 'SueFlay', 'abc123', 'user@hell.com', 0),
(19, 'Derry Yare', 'DerryYare', 'abc123', 'user@hell.com', 0),
(20, 'Krystal Ball', 'KrystalBall', 'abc123', 'user@hell.com', 0),
(21, 'Honey Potts', 'HoneyPotts', 'abc123', 'user@hell.com', 0),
(22, 'Seymore Butts', 'SeymoreButts', 'abc123', 'user@hell.com', 0),
(23, 'Bud Light', 'BudLight', 'abc123', 'user@hell.com', 0),
(24, 'Filet Minyon', 'FiletMinyon', 'abc123', 'user@hell.com', 0),
(25, 'Robyn Banks', 'RobynBanks', 'abc123', 'user@hell.com', 0),
(26, 'Dyl Pickel', 'DylPickel', 'abc123', 'user@hell.com', 0),
(27, 'Paige Turner', 'PaigeTurner', 'abc123', 'user@hell.com', 0),
(28, 'Dr. Jed I. Knight', 'JedKnight', 'abc123', 'user@hell.com', 0),
(29, 'Justin Case', 'JustinCase', 'abc123', 'user@hell.com', 0),
(30, 'Crystal Ball', 'CrystalBall', 'abc123', 'user@hell.com', 0),
(31, 'Pea Pu', 'PeaPu', 'abc123', 'user@hell.com', 0),
(32, 'Al Dente', 'AlDente', 'abc123', 'user@hell.com', 0),
(33, 'Douglas Furr', 'DouglasFurr', 'abc123', 'user@hell.com', 0),
(34, 'Biff Wellington', 'BiffWellington', 'abc123', 'user@hell.com', 0),
(35, 'Art Dekko', 'ArtDekko', 'abc123', 'user@hell.com', 0),
(36, 'Clay Potts', 'ClayPotts', 'abc123', 'user@hell.com', 0),
(37, 'Al Falfa', 'AlFalfa', 'abc123', 'user@hell.com', 0),
(38, 'Frank Furter', 'FrankFurter', 'abc123', 'user@hell.com', 0),
(39, 'Harry Beard', 'HarryBeard', 'abc123', 'user@hell.com', 0),
(40, 'Anna Conda', 'AnnaConda', 'abc123', 'user@hell.com', 0),
(41, 'Justin Thyme', 'JustinThyme', 'abc123', 'user@hell.com', 0),
(42, 'Ollie Gark', 'OllieGark', 'abc123', 'user@hell.com', 0),
(43, 'Pete Moss', 'PeteMoss', 'abc123', 'user@hell.com', 0),
(44, 'Rusty Foord', 'RustyFoord', 'abc123', 'user@hell.com', 0),
(45, 'Tom Foolery', 'TomFoolery', 'abc123', 'user@hell.com', 0),
(46, 'Warren Peace', 'WarrenPeace', 'abc123', 'user@hell.com', 0),
(47, 'Linda Hand', 'LindaHand', 'abc123', 'user@hell.com', 0),
(48, 'Lotta Noyes', 'LottaNoyes', 'abc123', 'user@hell.com', 0),
(49, 'Barb Wyre', 'BarbWyre', 'abc123', 'user@hell.com', 0),
(50, 'Bunsen Berner', 'BunsenBerner', 'abc123', 'user@hell.com', 0),
(51, 'Ginger Vitus', 'GingerVitus', 'abc123', 'user@hell.com', 0),
(52, 'Jack Uzzi', 'JackUzzi', 'abc123', 'user@hell.com', 0),
(53, 'Mason Jarr', 'MasonJarr', 'abc123', 'user@hell.com', 0),
(54, 'Ty Kuhn', 'TyKuhn', 'abc123', 'user@hell.com', 0),
(55, 'Wazziz Naime', 'WazzizNaime', 'abc123', 'user@hell.com', 0),
(56, 'Rod Curtains', 'RodCurtains', 'abc123', 'user@hell.com', 0),
(57, 'Kayne Kun', 'KayneKun', 'abc123', 'user@hell.com', 0),
(58, 'Rocky Rhodes', 'RockyRhodes', 'abc123', 'user@hell.com', 0),
(59, 'Sandy Beech', 'SandyBeech', 'abc123', 'user@hell.com', 0),
(60, 'Sue Vlaki', 'SueVlaki', 'abc123', 'user@hell.com', 0),
(61, 'Alan Rench', 'AlanRench', 'abc123', 'user@hell.com', 0),
(62, 'Anne Thrax', 'AnneThrax', 'abc123', 'user@hell.com', 0),
(63, 'Annita Job', 'AnnitaJob', 'abc123', 'user@hell.com', 0),
(64, 'Art Major', 'ArtMajor', 'abc123', 'user@hell.com', 0),
(65, 'Tess Tamoni', 'TessTamoni', 'abc123', 'user@hell.com', 0),
(66, 'Al Pacca', 'AlPacca', 'abc123', 'user@hell.com', 0),
(67, 'Art A. Choake', 'ArtChoake', 'abc123', 'user@hell.com', 0),
(68, 'Benny Fitz', 'BennyFitz', 'abc123', 'user@hell.com', 0),
(69, 'Anna Nimmity', 'AnnaNimmity', 'abc123', 'user@hell.com', 0),
(70, 'Mike Raffone', 'MikeRaffone', 'abc123', 'user@hell.com', 0),
(71, 'Sonny Day', 'SonnyDay', 'abc123', 'user@hell.com', 0),
(72, 'Wil Doolittle', 'WilDoolittle', 'abc123', 'user@hell.com', 0),
(73, 'Gladys Dunn', 'GladysDunn', 'abc123', 'user@hell.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `SoftwareTool`
--
ALTER TABLE `SoftwareTool`
  ADD PRIMARY KEY (`toolID`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `name_2` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `SoftwareTool`
--
ALTER TABLE `SoftwareTool`
  MODIFY `toolID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `userID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
