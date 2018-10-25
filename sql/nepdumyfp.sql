-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2018 at 04:49 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nepdumyfp`
--

-- --------------------------------------------------------

--
-- Table structure for table `churches`
--

CREATE TABLE `churches` (
  `church_ID` int(11) NOT NULL,
  `church_LocalName` varchar(50) NOT NULL,
  `church_Street` varchar(50) NOT NULL,
  `church_Barangay` varchar(50) NOT NULL,
  `church_Town` varchar(50) NOT NULL,
  `church_Province` varchar(50) NOT NULL,
  `church_ZipCode` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `churches`
--

INSERT INTO `churches` (`church_ID`, `church_LocalName`, `church_Street`, `church_Barangay`, `church_Town`, `church_Province`, `church_ZipCode`) VALUES
(1, 'Pozorrubio', 'Penoy Street', 'District 1', 'Pozorrubio', 'Pangasinan', '2435'),
(3, 'Villasis', 'Jenkins Street', 'Pozorrubio', 'Pozorrubio', 'Pangasinan', '2435'),
(4, 'Urdaneta', 'Ass', '124', 'Urdaneta City', 'Pangasinans', '1233'),
(5, 'Haha', 'Jenkins Street', 'Pozorrubio', 'Pozorrubio', 'Pangasinan', '2435'),
(6, 'Asd', 'Jenkins Street', 'Pozorrubio', 'Pozorrubio', 'Pangasinan', '2435');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_ID` int(11) NOT NULL,
  `member_FirstName` varchar(50) NOT NULL,
  `member_MiddleName` varchar(50) DEFAULT NULL,
  `member_LastName` varchar(50) NOT NULL,
  `member_Suffix` varchar(30) DEFAULT NULL,
  `member_Gender` varchar(15) NOT NULL,
  `member_BirthDate` varchar(15) NOT NULL,
  `member_Age` varchar(10) NOT NULL,
  `member_HouseNo` varchar(10) DEFAULT NULL,
  `member_Street` varchar(20) DEFAULT NULL,
  `member_Barangay` varchar(30) DEFAULT NULL,
  `member_Town` varchar(30) DEFAULT NULL,
  `member_Province` varchar(30) DEFAULT NULL,
  `member_ContactNo` varchar(15) DEFAULT NULL,
  `member_EmailAddress` varchar(50) DEFAULT NULL,
  `member_FinishedConfirmationClass` varchar(10) NOT NULL,
  `church_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_ID`, `member_FirstName`, `member_MiddleName`, `member_LastName`, `member_Suffix`, `member_Gender`, `member_BirthDate`, `member_Age`, `member_HouseNo`, `member_Street`, `member_Barangay`, `member_Town`, `member_Province`, `member_ContactNo`, `member_EmailAddress`, `member_FinishedConfirmationClass`, `church_ID`) VALUES
(2, 'Raymark', 'Chan', 'Bornales', '', 'Male', '1996-11-23', '21', '#116', 'Jenkins Street', 'Pozorrubio', 'Pozorrubio', 'Pangasinan', '09266578978', 'kramyl333@gmail.com', 'Yes', 1),
(3, 'Pj', 'Castro', 'Castillo', '78th', 'Female', '2018-01-01', '22', '#112', 'Ma. St.', 'Zone 2', 'Villasis', 'Pangasinans', '09020235010', 'aquawalker@gmail.com', 'Yes', 4),
(4, 'Asda', 'Sdds', 'Sdfds', 'Sdfsdf', 'Male', '2018-10-01', '2018-10-01', '13', 'Asd', 'Ad', 'Adasdad', 'Asdsadsa', '09266578978', 'kramyl12333@gmail.com', 'Yes', 4),
(5, 'Raymark', 'Chan', 'Bornales', '', 'Female', '2018-10-10', '213', '2', 'Jenkins Street', 'Pozorrubio', 'Pozorrubio', 'Pangasinan', '09266578978', 'kramyl333@gmail.com', 'Yes', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `user_FirstName` varchar(50) NOT NULL,
  `user_MiddleName` varchar(50) DEFAULT NULL,
  `user_LastName` varchar(50) NOT NULL,
  `user_Suffix` varchar(30) DEFAULT NULL,
  `user_UserName` varchar(30) NOT NULL,
  `user_Password` varchar(200) NOT NULL,
  `user_AccountType` varchar(30) NOT NULL,
  `church_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `user_FirstName`, `user_MiddleName`, `user_LastName`, `user_Suffix`, `user_UserName`, `user_Password`, `user_AccountType`, `church_ID`) VALUES
(1, 'Raymark', 'Chan', 'Bornales', 'II', 'superadmin', 'lymark0623', 'SuperAdmin', 0),
(3, 'Raymarks', 'Chan', 'Bornales', '', 'kramyl603', 'lymark', 'Admin', 3),
(4, 'PJ', 'Castillo', 'Castro', '213', 'philcaster', 'caster', 'Admin', 1),
(5, 'David', 'David', 'David', '', 'david', 'kramyl', 'Admin', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `churches`
--
ALTER TABLE `churches`
  ADD PRIMARY KEY (`church_ID`),
  ADD UNIQUE KEY `church_LocalName` (`church_LocalName`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `user_UserName` (`user_UserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `churches`
--
ALTER TABLE `churches`
  MODIFY `church_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
