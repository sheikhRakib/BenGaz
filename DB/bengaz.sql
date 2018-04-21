-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2018 at 04:08 PM
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
  `commenter` varchar(100) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `comment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentID`, `newsID`, `commenter`, `comment`, `comment_time`, `deleted_at`) VALUES
(3005, 9008, 'asif', 'nice', '2018-04-21 13:26:40', NULL),
(3006, 9008, 'hanna', 'wow', '2018-04-21 13:26:45', NULL),
(3007, 9008, 'alal', 'joss', '2018-04-21 13:46:59', NULL),
(3008, 9008, 'malek', 'ki sundor', '2018-04-21 13:39:43', NULL),
(3009, 9008, 'malek', 'ki sundor', '2018-04-21 13:41:12', NULL),
(3010, 9008, 'rakib', 'I dont think Russia will do this.', '2018-04-21 13:48:49', NULL),
(3011, 9008, 'amin', 'what the hell is Bangladesh doing here?', '2018-04-21 13:49:47', NULL),
(3012, 9003, 'navin', 'why so serious?', '2018-04-21 13:50:32', NULL),
(3013, 9006, 'rakib', 'what should I do?', '2018-04-21 13:58:20', NULL),
(3014, 9007, ':P', 'LALALA', '2018-04-21 13:59:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `logID` int(10) NOT NULL,
  `log` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`logID`, `log`, `time`) VALUES
(1011, 'log started', '2018-04-20 04:57:32'),
(1012, 'Second Log', '2018-04-20 07:40:32'),
(1013, '[temp] attempts to LOG IN', '2018-04-20 07:43:32'),
(1014, '[raib] attempts to LOG IN', '2018-04-20 07:57:32'),
(1015, '[rakib] attempts to LOG IN', '2018-04-20 07:57:32'),
(1016, '[rakib] attempts to LOG IN', '2018-04-20 07:57:32'),
(1017, '[rakib] attempts to LOG IN', '2018-04-20 07:57:32'),
(1018, '[rakib] successfully logged in', '2018-04-20 07:57:32'),
(1019, '[rakib] attempts to LOG IN', '2018-04-20 07:57:32'),
(1020, '[rakib] successfully logged in', '2018-04-20 07:57:32'),
(1021, '[rakib] attempts to LOG IN', '2018-04-20 07:57:32'),
(1022, '[rakib] successfully logged in', '2018-04-20 07:57:32'),
(1023, '[chagol] attempts to LOG IN', '2018-04-20 08:00:20'),
(1024, '[rakib] attempts to LOG IN', '2018-04-20 08:08:54'),
(1025, '[rakib] successfully logged in', '2018-04-20 08:08:54'),
(1026, '[rakib] attempts to LOG IN', '2018-04-20 08:13:50'),
(1027, '[rakib] successfully logged in', '2018-04-20 08:13:50'),
(1028, '[rakib] Logged out', '2018-04-20 08:14:27'),
(1029, '[asif] attempts to LOG IN', '2018-04-20 08:15:30'),
(1030, '[rakib] attempts to LOG IN', '2018-04-20 08:16:00'),
(1031, '[rakib] successfully logged in', '2018-04-20 08:16:00'),
(1032, '[rakib] Logged out', '2018-04-20 08:16:04'),
(1033, '[rakib] attempts to LOG IN', '2018-04-20 08:16:28'),
(1034, '[rakib] successfully logged in', '2018-04-20 08:16:28'),
(1035, '[rakib] Logged out', '2018-04-20 08:30:07'),
(1036, '[rakib] Logged out', '2018-04-20 08:31:17'),
(1037, '[rakib] attempts to LOG IN', '2018-04-20 12:19:03'),
(1038, '[rakib] successfully logged in', '2018-04-20 12:19:03'),
(1039, '[rakib] Gave an Opinion.', '2018-04-20 12:20:56'),
(1040, '[asif] Gave an Opinion.', '2018-04-20 12:26:08'),
(1041, '[rakib] attempts to LOG IN', '2018-04-20 13:24:14'),
(1042, '[rakib] successfully logged in', '2018-04-20 13:24:14'),
(1043, '[asif] Gave an Opinion.', '2018-04-20 14:11:49'),
(1044, '[asif] Gave an Opinion.', '2018-04-20 17:05:25'),
(1045, '[asif] Gave an Opinion.', '2018-04-20 17:05:41'),
(1046, '[asif] Gave an Opinion.', '2018-04-20 17:08:49'),
(1047, '[asif] Gave an Opinion.', '2018-04-20 17:10:37'),
(1048, '[asif] Changed Password.', '2018-04-20 17:18:58'),
(1049, '[asif] Changed Password.', '2018-04-20 17:21:10'),
(1050, '[asif] Changed Password.', '2018-04-20 17:48:31'),
(1051, '[asif] Changed Password.', '2018-04-20 17:52:27'),
(1052, '[asif] Changed Password.', '2018-04-20 17:52:46'),
(1053, '[borhan] Gave an Opinion.', '2018-04-21 07:59:45'),
(1054, '[borhan] Gave an Opinion.', '2018-04-21 08:02:44');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `newsID` int(10) NOT NULL,
  `headline` varchar(100) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `writterID` int(10) NOT NULL,
  `categoryID` int(10) NOT NULL,
  `popularity` int(5) NOT NULL DEFAULT '0',
  `written_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`newsID`, `headline`, `description`, `writterID`, `categoryID`, `popularity`, `written_at`, `deleted_at`) VALUES
(9000, 'First Opinion Must be Blank', 'halajfhbb fddjd dcbc cvnjhfdbc', 10010012, 110, 0, '2018-04-20 11:08:44', NULL),
(9001, 'Second Opinion', 'halajfhbb fddjd dcbc cvnjhfdbc', 10010012, 110, 0, '2018-04-20 11:55:47', NULL),
(9002, 'Corruption Must Be Destroyed', 'All I want is corruption must be destroyed from our country', 10010012, 110, 3, '2018-04-21 12:58:45', NULL),
(9003, 'Will Our Next War Be Fought Among The Stars?', 'Sitting at the controls of a Boeing space-flight simulator, â€œdockingâ€ the companyâ€™s planned â€œStarlinerâ€ craft with an imaginary space station, you begin to understand why the Pentagon is so focused on such advanced systems.\r\n\r\nSpace is the new frontier of warfare. That was the theme of a â€œSpace Symposiumâ€ here this week that gathered thousands of military and corporate experts from around the globe. A variant of the Boeing simulator may someday be training the 21st-century version of space-drone pilots.\r\n\r\nThe future battle may be in the heavens. But you can already see some sparring on the ground over who should control U.S. space-war-fighting capability â€” with the White House, Congress and the military services debating how best to allocate hundreds of billions of dollars and scores of senior Pentagon command positions. But letâ€™s start with the threat, as described by U.S. military officials here.\r\n\r\nSince the glory days of the first moon walk in 1969, Americans hav', 10010010, 110, 3, '2018-04-21 13:01:37', NULL),
(9004, '11 Senators Are About To Make A Big Mistake', 'For the first time in the history of the republic, it appears increasingly likely that a majority of the Senate Foreign Relations Committee will vote against the presidentâ€™s nominee for secretary of state. If this happens, it would be a black mark not on Mike Pompeoâ€™s record, but on the reputation of this once-storied committee.\r\n\r\nThere are no instances of a secretary of state nominee ever receiving an unfavorable committee vote since such votes were first publicly recorded in 1925. (Before that, the committee voted in closed session.) Democrat John Kerry was approved in a unanimous voice vote, including from Sen. Rand Paul (R-Ky.), who opposes Pompeo. Democrat Hillary Clinton was approved 16 to 1, despite concerns about foreign donors to the Clinton Foundation. Madeleine Albright was approved unanimously, with the strong support of my former boss, the committeeâ€™s conservative then-chairman, Sen. Jesse Helms (R-N.C.), who called Albright â€œa tough and courageous ladyâ€ and vot', 10010012, 110, 0, '2018-04-20 12:26:08', NULL),
(9005, 'A', 'aaaa', 10010012, 110, 0, '2018-04-20 14:11:49', NULL),
(9006, 'LLLL', 'My Kidney Lost', 10010012, 110, 5, '2018-04-21 13:58:52', NULL),
(9007, 'Beyond Starbucks: How Racism Shapes Customer Service.', 'On May 29, Starbucks will close 8,000 locations to administer racial bias training for 175,000 of its employees. The move is a response to national outrage over the arrests of two black patrons while they were simply waiting for a meeting to begin at a Philadelphia coffee shop.\r\n\r\nBut racial bias training for employees is not enough to address the epidemic of discrimination by American companies.\r\n\r\nOver the past two years, we have investigated discrimination in customer service by conducting large-scale field experiments in the hospitality industry. We have repeatedly found that front-line workers exhibit racial bias in the quality of customer service they provide.\r\n\r\nIn one experiment, we emailed approximately 6,000 hotels across the United States from 12 fictitious email accounts. We varied the names of the senders to signal different attributes, such as race and gender, to the recipients. Names carry a lot of information; for instance, from our names â€” Alexandra Feldberg and Tami', 10010013, 110, 2, '2018-04-21 13:59:44', NULL),
(9008, ' Russia Is Going After The Internet Jugular. What Will America Do? ', 'THE LATEST alert from the United States and Britain about Russian intrusion into computer networks contains alarming conclusions. Earlier warnings were issued about Russian meddling in social media, election systems, and energy, water, and aviation controls. The new alert calls attention to Russian efforts to compromise network devices, such as routers, the heartbeat of the Internet. The alert says that existing network vulnerability, coupled with a â€œworldwideâ€ Russian campaign, â€œthreatens the safety, security, and economic well-being of the United States.â€\r\n\r\nHow is the United States going to respond?\r\n\r\nThe alert says the FBI â€œhas high confidence that Russian state-sponsored cyber actors are using compromised routers to conduct man-in-the-middle attacks to support espionage, extract intellectual property, maintain persistent access to victim networks, and potentially lay a foundation for future offensive operations.â€ In essence, the Russians have infiltrated the digital b', 10010013, 110, 4, '2018-04-21 13:57:50', NULL);

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
(400441, '1991-04-14', 'Kings\'s revolution', NULL),
(400442, '0491-04-15', 'Flavius Anastasius becomes Byzantine emperor, with the name of Anastasius I.', NULL),
(400443, '0491-04-15', 'People\'s Revolution', '2018-04-02 18:00:00'),
(400444, '1814-04-11', 'Napoleon abdicates unconditionally; he is exiled to Elba1865 Abraham Lincoln urges a spirit of generous conciliation during reconstruction.', NULL),
(400445, '1881-04-11', 'Spelman College is founded in Atlanta, Georgia as the Atlanta Baptist Female Seminary, an institute of higher education for African-American women.', NULL),
(400446, '1111-04-15', 'Henry V is crowned Holy Roman Emperor.', NULL),
(400447, '1111-04-13', 'LL', '2018-04-14 22:06:22'),
(400448, '1204-04-13', 'Constantinople falls to the Crusaders of the Fourth Crusade, temporarily ending the Byzantine Empire.', NULL),
(400449, '1250-04-13', 'The Seventh Crusade is defeated in Egypt, Louis IX of France captured.', NULL),
(400450, '2017-04-15', 'The US drops the largest ever non-nuclear weapon on Nangarhar Province, Afghanistan.', NULL),
(400451, '2017-04-15', 'Suicide car bomb targets buses carrying Syrian evacuees at Rashidin, 126 killed including 70 children.', NULL),
(400452, '1970-04-15', 'During the Cambodian Civil War, massacres of the Vietnamese minority results in 800 bodies flowing down the Mekong river into South Vietnam.', NULL),
(400453, '1861-04-15', 'President Abraham Lincoln calls for 75,000 Volunteers to quell the insurrection that soon became the American Civil War.', NULL),
(400454, '1941-04-15', 'In the Belfast Blitz, two-hundred bombers of the German Luftwaffe attack Belfast, killing around one thousand people.', NULL);

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
(10010012, 'asif', 'ce0b996aa0b7d64169a4b8ffeaf878c5', 'Asif', 'hasan', 'male', 'asif@gmail.com', '2000-01-28', 'user', '2018-04-20 17:48:41', NULL),
(10010013, 'borhan', 'ab518431c9ede536d97fd4c6d23323b9', 'MD Borhan', 'Uddin', 'male', 'borhan@aiub.edu', '2017-11-08', 'user', '2018-04-21 06:52:18', NULL),
(10010016, 'khalid', '794761a765ceca759536a1bf39100142', 'Khalid', 'Hasan', 'male', 'khalid@gmail.com', '2018-04-10', 'user', '2018-04-21 07:08:51', NULL);

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
  MODIFY `commentID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3015;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `logID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1055;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `newsID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9009;

--
-- AUTO_INCREMENT for table `newsimages`
--
ALTER TABLE `newsimages`
  MODIFY `newsImageID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `onthisday`
--
ALTER TABLE `onthisday`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=400455;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tagID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10010017;

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
