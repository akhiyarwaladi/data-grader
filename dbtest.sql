-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2017 at 07:27 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `dataId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `leaderboard` varchar(50) NOT NULL DEFAULT 'NotYet',
  `link` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`dataId`, `name`, `description`, `leaderboard`, `link`, `image`) VALUES
(1, 'Warm Up: Predict Blood Donations', 'Blood donation has been around for a long time. The first successful recorded transfusion was between two dogs in 1665, and the first medical use of human blood in a transfusion occurred in 1818. Even today, donated blood remains a critical resource during emergencies.\\n\\nOur dataset is from a mobile blood donation vehicle in Taiwan. The Blood Transfusion Service Center drives to different universities and collects blood as part of a blood drive. We want to predict whether or not a donor will give blood the next time the vehicle comes to campus.', 'ayase', 'https://goo.gl/AMWiLw', '1.jpg'),
(2, 'Pump it Up: Data Mining the Water Table', 'Can you predict which water pumps are faulty?\\n\\nUsing data from Taarifa and the Tanzanian Ministry of Water, can you predict which pumps are functional, which need some repairs, and which don''t work at all? This is an intermediate-level practice competition. Predict one of these three classes based on a number of variables about what kind of pump is operating, when it was installed, and how it is managed. A smart understanding of which waterpoints will fail can improve maintenance operations and ensure that clean, potable water is available to communities across Tanzania.', 'ayase', 'https://goo.gl/MGyvAB', '2.jpg'),
(3, 'Mushroom Classification', 'This dataset includes descriptions of hypothetical samples corresponding to 23 species of gilled mushrooms in the Agaricus and Lepiota Family Mushroom drawn from The Audubon Society Field Guide to North American Mushrooms (1981). Each species is identified as definitely edible, definitely poisonous, or of unknown edibility and not recommended. This latter class was combined with the poisonous one. The Guide clearly states that there is no simple rule for determining the edibility of a mushroom; no rule like "leaflets three, let it be'''' for Poisonous Oak and Ivy.\r\n', 'ayase', 'https://goo.gl/7PSyva', '3.jpg'),
(4, 'Digit Recognizer', 'A popular demonstration of the capability of deep learning techniques is object recognition in image data. The hello world of object recognition for machine learning and deep learning is\r\nthe MNIST dataset for handwritten digit recognition.\\n\\nThe MNIST problem is a dataset developed by Yann LeCun, Corinna Cortes and Christopher Burges for evaluating machine learning models on the handwritten digit classification problem.\\n\\n The dataset was constructed from a number of scanned document datasets available from the\r\nNational Institute of Standards and Technology (NIST). This is where the name for the dataset comes from, as the Modified NIST or MNIST dataset.', 'NotYet', 'https://goo.gl/iDRfop', '4.gif');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `scoreId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `dataId` int(11) NOT NULL,
  `score` float NOT NULL,
  `version` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`scoreId`, `userId`, `dataId`, `score`, `version`, `timestamp`) VALUES
(46, 1, 1, 100, 4, '2017-02-01 00:52:39'),
(47, 5, 1, 0.854701, 2, '2017-02-01 17:17:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`) VALUES
(1, 'ayase', 'akiyar18@gmail.com', 'ab81042442b9a9fa6b3872205fe6ceb639303a855c9d77ac91a4371f11d34985'),
(2, 'ohara', 'akiyar@apps.ipb.ac.id', 'ab81042442b9a9fa6b3872205fe6ceb639303a855c9d77ac91a4371f11d34985'),
(3, 'deybi', 'deybi@gmail.com', 'ab81042442b9a9fa6b3872205fe6ceb639303a855c9d77ac91a4371f11d34985'),
(4, 'devi', 'devipa@gmail.com', 'ab81042442b9a9fa6b3872205fe6ceb639303a855c9d77ac91a4371f11d34985'),
(5, 'David', 'davidlimbonggg@gmail.com', 'e801fc95dca4016d77d6dd5f61d2f7528eb2b301ba0f23f9e5d6ca1a8da65a7f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`dataId`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`scoreId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `dataId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `scoreId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
