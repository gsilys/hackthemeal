-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016 m. Lap 13 d. 10:18
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hackthemeal`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `diner`
--

CREATE TABLE `diner` (
  `id` int(11) NOT NULL,
  `fname` varchar(45) COLLATE utf8_swedish_ci DEFAULT NULL,
  `lname` varchar(45) COLLATE utf8_swedish_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `energyneed` int(11) DEFAULT NULL,
  `L` tinyint(1) NOT NULL DEFAULT '0',
  `G` tinyint(1) NOT NULL DEFAULT '0',
  `M` tinyint(1) NOT NULL DEFAULT '0',
  `VL` tinyint(1) NOT NULL DEFAULT '0',
  `V` tinyint(1) NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT NULL,
  `allergy` varchar(20) COLLATE utf8_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Sukurta duomenų kopija lentelei `diner`
--

INSERT INTO `diner` (`id`, `fname`, `lname`, `password`, `energyneed`, `L`, `G`, `M`, `VL`, `V`, `status`, `allergy`) VALUES
(1, 'Hank', 'Hacker', '1a1dc91c907325c69271ddf0c944bc72', 2200, 0, 1, 0, 0, 0, NULL, NULL),
(2, 'Helen', 'Hipster', '', 1900, 1, 1, 1, 1, 1, NULL, 'Nuts'),
(3, 'Keijo', 'Karppaaja', '', 2100, 0, 0, 0, 0, 0, NULL, NULL),
(4, 'Donald', 'Duck', '', 1200, 1, 1, 1, 0, 1, NULL, 'Fish'),
(5, 'Teuvo', 'Testaaja', '', 2200, 0, 0, 0, 0, 0, NULL, NULL),
(6, 'Tiina', 'Testaaja', '', 2000, 0, 0, 0, 0, 0, NULL, NULL),
(7, 'Risto', 'Ruokailija', '', 2150, 0, 0, 0, 0, 0, NULL, NULL),
(8, 'Teija', 'Rautiainen', '', 1980, 0, 0, 0, 1, 0, NULL, 'Nuts');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `dish`
--

CREATE TABLE `dish` (
  `id` int(11) NOT NULL,
  `dispname` varchar(60) CHARACTER SET utf8 NOT NULL,
  `energy` int(11) NOT NULL,
  `protein` int(11) DEFAULT NULL,
  `fat` int(11) DEFAULT NULL,
  `carbon` int(11) DEFAULT NULL,
  `L` tinyint(1) NOT NULL DEFAULT '0',
  `G` tinyint(1) NOT NULL DEFAULT '0',
  `M` tinyint(1) NOT NULL DEFAULT '0',
  `VL` tinyint(1) NOT NULL DEFAULT '0',
  `V` tinyint(1) NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT NULL,
  `allergy` varchar(20) COLLATE utf8_swedish_ci DEFAULT NULL,
  `origin` varchar(45) COLLATE utf8_swedish_ci DEFAULT NULL,
  `ingredients` varchar(1000) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Sukurta duomenų kopija lentelei `dish`
--

INSERT INTO `dish` (`id`, `dispname`, `energy`, `protein`, `fat`, `carbon`, `L`, `G`, `M`, `VL`, `V`, `status`, `allergy`, `origin`, `ingredients`) VALUES
(1, 'Broiler file', 110, 23, 2, 1, 0, 0, 0, 0, 0, NULL, NULL, 'Kauhava', ''),
(2, 'Risotto Verde', 142, 3, 7, 16, 1, 1, 0, 1, 1, NULL, 'Nuts', 'Livorno', ''),
(3, 'Roast beef', 157, 31, 4, 0, 1, 1, 1, 1, 0, NULL, NULL, 'Brasil', ''),
(4, 'Salmon casserole', 129, 6, 6, 12, 1, 1, 0, 1, 0, NULL, 'Fish', 'Puumala', ''),
(5, 'Paella', 101, 7, 3, 12, 0, 1, 0, 0, 0, NULL, 'Shrimp', 'Valencia', ''),
(6, 'Meatballs', 260, 16, 17, 8, 1, 0, 1, 1, 0, NULL, NULL, 'Finland', ''),
(7, 'Cooked potatoes', 76, 2, 0, 15, 1, 1, 1, 1, 1, NULL, NULL, 'Finland', ''),
(8, 'Country-style potato wedges', 85, 1, 7, 4, 1, 1, 1, 1, 1, NULL, NULL, NULL, ''),
(9, 'Minced meat patties', 220, 13, 12, 13, 1, 0, 1, 1, 0, NULL, NULL, NULL, ''),
(10, 'Pepper sauce', 35, 0, 2, 3, 1, 1, 0, 1, 0, NULL, NULL, NULL, ''),
(11, 'Vegetable ball', 131, 4, 6, 15, 1, 1, 1, 1, 1, NULL, NULL, NULL, ''),
(12, 'Sour cream wiht chili', 98, 2, 5, 13, 1, 1, 0, 1, 0, NULL, NULL, NULL, ''),
(13, 'Cocos-broiler', 107, 8, 6, 5, 1, 1, 1, 1, 0, NULL, NULL, NULL, ''),
(14, 'Tofu with leek sauce', 116, 4, 9, 3, 1, 1, 1, 1, 1, NULL, NULL, NULL, ''),
(15, 'Wholegrain rice', 64, 1, 0, 13, 1, 1, 1, 1, 1, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `feedback_general`
--

CREATE TABLE `feedback_general` (
  `id` int(11) NOT NULL,
  `review` varchar(200) NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `feedback_general`
--

INSERT INTO `feedback_general` (`id`, `review`, `rating`) VALUES
(1, 'Thanks for delicious diner!', 5),
(2, 'The meal was good.', 3),
(3, 'I really liked it.', 4),
(4, 'Next time give me something more tasty!', 1),
(5, 'Food is very well...	', 5);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `feedback_meal`
--

CREATE TABLE `feedback_meal` (
  `id` int(100) NOT NULL,
  `meal_id` varchar(100) NOT NULL,
  `review` varchar(100) NOT NULL,
  `rating` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `feedback_meal`
--

INSERT INTO `feedback_meal` (`id`, `meal_id`, `review`, `rating`) VALUES
(1, '1', 'I very liked this meal!', 4),
(2, '2', 'You should put some cheese.', 2),
(3, '4', 'Very tasty!', 5),
(4, '3', '			Delicious meal', 5),
(5, '5', '			Not so tasty', 2),
(6, '7', 'Very good meal, do it more often!	', 5),
(7, '8', '			Good potato wedges!', 4),
(8, '4', '			Good meal!', 4),
(9, '6', '			Good meal!', 4),
(10, '9', '			Good meal!', 4),
(11, '10', '			Good meal!', 4),
(12, '11', '			Good meal!', 4),
(13, '12', '			Good meal!', 4),
(14, '13', '			Good meal!', 4),
(15, '14', '			Good meal!', 4),
(16, '15', '			Good meal!', 4),
(17, '4', '			Good meal!', 4),
(18, '4', '			Good meal!', 4),
(19, '4', '			Good meal!', 4),
(20, '4', '			Good meal!', 4),
(21, '4', '			Good meal!', 4),
(22, '4', '			Good meal!', 4);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(100) NOT NULL,
  `meal_id` int(100) NOT NULL,
  `ingredient` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `ingredients`
--

INSERT INTO `ingredients` (`id`, `meal_id`, `ingredient`) VALUES
(1, 1, 'Chicken filet thin (chicken filet (82%)'),
(2, 1, 'water'),
(4, 1, 'canola oil'),
(5, 1, 'satl (1,1%)'),
(6, 1, 'honey (0,4%)'),
(7, 1, 'sugar'),
(8, 1, 'spices');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `portion`
--

CREATE TABLE `portion` (
  `id` int(11) NOT NULL,
  `dinerid` int(11) NOT NULL,
  `dishid` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `moment` datetime NOT NULL,
  `energy` int(11) DEFAULT NULL,
  `protein` int(11) DEFAULT NULL,
  `fat` int(11) DEFAULT NULL,
  `carbon` int(11) DEFAULT NULL,
  `mealname` varchar(60) COLLATE utf8_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Sukurta duomenų kopija lentelei `portion`
--

INSERT INTO `portion` (`id`, `dinerid`, `dishid`, `weight`, `moment`, `energy`, `protein`, `fat`, `carbon`, `mealname`) VALUES
(1, 1, 1, 250, '2016-11-02 12:31:45', 275, 58, 5, 3, 'Broiler file'),
(2, 1, 2, 185, '2016-11-02 12:32:25', 263, 6, 13, 30, 'Risotto Verde'),
(3, 2, 2, 235, '2016-11-08 12:13:14', 334, 7, 16, 38, 'Risotto Verde'),
(4, 1, 1, 335, '2016-11-09 12:13:14', 369, 77, 7, 3, 'Broiler file'),
(5, 1, 5, 120, '2016-11-09 12:13:14', 121, 8, 4, 14, 'Paella'),
(6, 8, 7, 105, '2016-08-26 13:14:00', 80, 2, 0, 16, 'Cooked potatoes');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `schedule`
--

CREATE TABLE `schedule` (
  `id` int(100) NOT NULL,
  `day` varchar(100) NOT NULL,
  `meal_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `schedule`
--

INSERT INTO `schedule` (`id`, `day`, `meal_id`) VALUES
(1, '13-11-2016', 5),
(2, '14-11-2016', 5),
(3, '15-11-2016', 6),
(4, '13-11-2016', 10),
(5, '15-11-2016', 5),
(6, '16-11-2016', 6),
(7, '15-11-2016', 10),
(8, '13-11-2016', 5),
(9, '13-11-2016', 6),
(10, '14-11-2016', 10),
(11, '15-11-2016', 5),
(12, '14-11-2016', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diner`
--
ALTER TABLE `diner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_general`
--
ALTER TABLE `feedback_general`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_meal`
--
ALTER TABLE `feedback_meal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portion`
--
ALTER TABLE `portion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diner`
--
ALTER TABLE `diner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `dish`
--
ALTER TABLE `dish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `feedback_general`
--
ALTER TABLE `feedback_general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `feedback_meal`
--
ALTER TABLE `feedback_meal`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `portion`
--
ALTER TABLE `portion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
