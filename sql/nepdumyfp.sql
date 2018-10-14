-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2018 at 04:35 PM
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
(4, 'Urdaneta', 'Jenkins Street', 'Pozorrubio', 'Pozorrubio', 'Pangasinan', '2435');

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
(1, '', NULL, '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(2, 'Raymark', 'Chan', 'Bornales', '', 'Male', '1996-11-23', '21', '#116', 'Jenkins Street', 'Pozorrubio', 'Pozorrubio', 'Pangasinan', '09266578978', 'kramyl333@gmail.com', 'Yes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `user_FirstName` varchar(50) NOT NULL,
  `user_MiddleName` varchar(50) DEFAULT NULL,
  `user_LastName` varchar(50) NOT NULL,
  `user_UserName` varchar(30) NOT NULL,
  `user_Password` varchar(200) NOT NULL,
  `user_AccountType` varchar(30) NOT NULL,
  `church_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `user_FirstName`, `user_MiddleName`, `user_LastName`, `user_UserName`, `user_Password`, `user_AccountType`, `church_ID`) VALUES
(1, 'Raymark', 'Chan', 'Bornales', 'kramyl', 'lymark', 'Admin', 1);

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
  MODIFY `church_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
