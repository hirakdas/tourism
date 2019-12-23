-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2019 at 07:45 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bonde_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `id` int(11) NOT NULL,
  `tour_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `introduction` text NOT NULL,
  `duration` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`id`, `tour_name`, `location`, `introduction`, `duration`, `price`, `image`) VALUES
(1, 'Patna beauty is a thing', 'Patna ', 'Intro', '2 Daysz', '2000', 'shillong.jpg'),
(2, 'test', 'test intro', '<p>test</p>\r\n', 'test', 'test', 'IC3.jpg'),
(3, 'test2', 'twes1', '', 'e23', '12312', 'images_(2).jpg'),
(4, 'hello', 'hello', '<p>hello</p>\r\n\r\n<p>how <em>are you</em></p>\r\n', 'hello', 'hello', 'Capture26.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `destination_img`
--

CREATE TABLE `destination_img` (
  `id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `destination_img`
--

INSERT INTO `destination_img` (`id`, `tour_id`, `image`) VALUES
(3, 1, 'images_(3).jpg'),
(4, 1, 'images_(2)3.jpg'),
(5, 2, 'Capture2.PNG'),
(6, 2, 'images_(2)4.jpg'),
(7, 2, 'images_(3)1.jpg'),
(8, 2, '1_uFINNsYNbYuPIC3sUMyy6w1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `destination_text`
--

CREATE TABLE `destination_text` (
  `id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `about` text NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `destination_text`
--

INSERT INTO `destination_text` (`id`, `tour_id`, `about`, `details`) VALUES
(2, 1, '<p>yygy</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>hi</p>\r\n', '<p>hbvhb</p>\r\n'),
(3, 2, '<p>chan</p>\r\n', '<p>changed is here</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `tour_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `people` int(11) DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `price` int(11) NOT NULL,
  `amount_paid` int(11) DEFAULT NULL,
  `created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `tour_id`, `tour_name`, `name`, `email`, `phone`, `people`, `date_from`, `date_to`, `price`, `amount_paid`, `created`) VALUES
(4, 0, 'Patna beauty is a thing', 'Kallol Medhi', 'kallol24@outlook.com', '7002018752', 0, '0000-00-00', '0000-00-00', 2000, NULL, '1577125508'),
(5, 1, 'Patna beauty is a thing', 'Kallol Medhi', 'kallol24@outlook.com', '7002018752', 0, '0000-00-00', '0000-00-00', 2000, NULL, '1577126168'),
(6, 1, 'Patna beauty is a thing', 'Kallol Medhi', 'kallol24@outlook.com', '7002018752', 0, '0000-00-00', '0000-00-00', 2000, NULL, '1577126171'),
(7, 1, 'Patna beauty is a thing', 'Kallol Medhi', 'kallol24@outlook.com', '7002018752', 0, '0000-00-00', '0000-00-00', 2000, NULL, '1577126274'),
(8, 1, 'Patna beauty is a thing', 'Kallol Medhi', 'kallol24@outlook.com', '7002018752', 0, '0000-00-00', '0000-00-00', 2000, NULL, '1577126365'),
(9, 1, 'Patna beauty is a thing', 'Kallol Medhi', 'kallol24@outlook.com', '7002018752', 0, '0000-00-00', '0000-00-00', 2000, NULL, '1577126558'),
(10, 1, 'Patna beauty is a thing', 'Kallol Medhi', 'kallol24@outlook.com', '7002018752', 0, '0000-00-00', '0000-00-00', 2000, NULL, '1577126635');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destination_img`
--
ALTER TABLE `destination_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destination_text`
--
ALTER TABLE `destination_text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `destination_img`
--
ALTER TABLE `destination_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `destination_text`
--
ALTER TABLE `destination_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
