-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2018 at 09:14 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bengaz`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categotyID` int(10) NOT NULL,
  `category` varchar(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categotyID`, `category`, `deleted_at`) VALUES
(101, 'bangladesh', NULL),
(102, 'international', NULL),
(104, 'sports', NULL),
(105, 'corporate', NULL),
(106, 'economics', NULL),
(107, 'entertainment', NULL),
(108, 'technology', NULL),
(109, 'lifestyle', NULL),
(110, 'opinion', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(10) NOT NULL,
  `newsID` int(10) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `comment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `logID` int(10) NOT NULL,
  `log` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `newsID` int(10) NOT NULL,
  `headline` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `writterID` int(10) NOT NULL,
  `categoryID` int(10) NOT NULL,
  `written_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `newsimages`
--

CREATE TABLE `newsimages` (
  `newsImageID` int(10) NOT NULL,
  `newsID` int(10) NOT NULL,
  `imagePath` varchar(50) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `onthisday`
--

CREATE TABLE `onthisday` (
  `ID` int(10) NOT NULL,
  `eventDate` date NOT NULL,
  `event` varchar(1000) NOT NULL,
  `deleted_on` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `onthisday`
--

INSERT INTO `onthisday` (`ID`, `eventDate`, `event`, `deleted_on`) VALUES
(400441, '1991-04-10', 'Kings\'s revolution', NULL),
(400442, '0491-04-11', 'Flavius Anastasius becomes Byzantine emperor, with the name of Anastasius I.', NULL),
(400443, '0491-04-11', 'People\'s Revolution', NULL),
(400444, '1814-04-11', 'Napoleon abdicates unconditionally; he is exiled to Elba1865 Abraham Lincoln urges a spirit of generous conciliation during reconstruction.', NULL),
(400445, '1881-04-11', 'Spelman College is founded in Atlanta, Georgia as the Atlanta Baptist Female Seminary, an institute of higher education for African-American women.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tagID` int(10) NOT NULL,
  `newsID` int(10) NOT NULL,
  `tag` varchar(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(10) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `role` varchar(20) NOT NULL,
  `joined_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `password`, `firstName`, `lastName`, `gender`, `email`, `dateOfBirth`, `role`, `joined_at`, `deleted_at`) VALUES
(10010010, 'rakib', 'a36949228c1d9146cace6359d88968e8', 'rakibul', 'islam', 'male', 'fat.oyunn@gmail.com', '1997-08-15', 'admin', '2018-04-03 13:58:39', NULL),
(10010012, 'asif', 'ce0b996aa0b7d64169a4b8ffeaf878c5', 'asif', 'hasan', 'male', 'asif@gmail.com', '2000-01-28', 'user', '2018-04-03 15:43:41', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categotyID`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `Comments_fk0` (`newsID`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`logID`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newsID`),
  ADD KEY `News_fk0` (`writterID`),
  ADD KEY `News_fk1` (`categoryID`);

--
-- Indexes for table `newsimages`
--
ALTER TABLE `newsimages`
  ADD PRIMARY KEY (`newsImageID`),
  ADD UNIQUE KEY `imagePath` (`imagePath`),
  ADD KEY `NewsImages_fk0` (`newsID`);

--
-- Indexes for table `onthisday`
--
ALTER TABLE `onthisday`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tagID`),
  ADD KEY `Tags_fk0` (`newsID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userName` (`userName`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categotyID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `logID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `newsID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsimages`
--
ALTER TABLE `newsimages`
  MODIFY `newsImageID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `onthisday`
--
ALTER TABLE `onthisday`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=400446;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tagID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10010013;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `Comments_fk0` FOREIGN KEY (`newsID`) REFERENCES `news` (`newsID`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `News_fk0` FOREIGN KEY (`writterID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `News_fk1` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categotyID`);

--
-- Constraints for table `newsimages`
--
ALTER TABLE `newsimages`
  ADD CONSTRAINT `NewsImages_fk0` FOREIGN KEY (`newsID`) REFERENCES `news` (`newsID`);

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `Tags_fk0` FOREIGN KEY (`newsID`) REFERENCES `news` (`newsID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
