-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2020 at 11:02 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `county` varchar(50) NOT NULL,
  `ticketprice` double NOT NULL,
  `period` int(5) NOT NULL,
  `date` date NOT NULL,
  `venue` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `saved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `county`, `ticketprice`, `period`, `date`, `venue`, `category`, `userid`, `poster`, `description`, `saved`) VALUES
(107, 'koroga festival', 'Mombasa', 1500, 1, '2020-07-31', 'shores', 'Art', 31, '1597413294-', 'art is maad good', 0),
(109, 'wrestling smack down', 'Nairobi', 700, 1, '2020-07-31', 'ruiru sports club', 'Sports', 31, '1596223651-jason-pofahl-ZOTkKCx_DAc-unsplash.jpg', 'come wrestle with us', 0),
(110, 'snack attack', 'Nairobi', 2000, 2, '2020-08-01', 'ngong racecourse', 'Food', 31, '1596364608-', 'come try a snack', 0),
(111, 'koroga festival', 'Kiambu', 400, 1, '2020-08-02', 'kwamichael', 'Educative', 31, '1596549196-', 'goat eating ', 0),
(112, 'blankets and wine', 'Nairobi', 400, 1, '2020-08-04', 'ngong racecourse', 'Music', 31, '1596558431-crawford-jolly-_KtJcVn6DHc-unsplash.jpg', 'it will be a happy day', 0),
(113, 'jamuhuri fest', 'Nairobi', 500, 2, '2020-08-04', 'bomas of kenya', 'Music', 31, '1596558511-jon-tyson-MsSgZ6kqLnI-unsplash.jpg', 'nakuyanza come celebrate with us and dance to great tunes and maad vibes', 0),
(114, 'blankets and wine', 'Nairobi', 500, 3, '2020-08-04', 'alchemist', 'Music', 31, '1596562700-jason-pofahl-ZOTkKCx_DAc-unsplash.jpg', 'hey there', 0),
(115, 'snack attack', 'Nairobi', 1500, 2, '2020-08-07', 'bomas of kenya', 'Music', 31, '1596812236-crawford-jolly-MIGVortZbKY-unsplash.jpg', 'come eat a snack', 0),
(116, 'mashujaa fest', 'Nairobi', 1400, 1, '2020-08-14', 'alchemist', 'Music', 31, '1597412903-crawford-jolly-tMUCzU_ThOw-unsplash.jpg', 'come celebrate the diversity of the kenyan music scene on the 11/10/2020 from 6:00pm till dawn', 0),
(117, 'afrobeats', 'Nairobi', 1500, 1, '2020-08-18', 'alchemist', 'Music', 31, '1597784737-jazmin-quaynor-CXjp1ycr5Vw-unsplash.jpg', 'come experience true african beats', 0),
(119, 'battle of the choirs', 'Nairobi', 100, 1, '2020-08-26', 'ICC west parish', 'Music', 32, '1598434327-yannic-laderach-l8TSjZx-aK0-unsplash.jpg', 'come experience the ultimate battle of heavenly sounds', 0),
(120, 'art in motion', 'Kiambu', 500, 1, '2020-08-26', 'keraita dam', 'Art', 32, '1598475370-eric-muhr-DBquJTiFpxk-unsplash.jpg', 'come experience the ultimate dance challenge as you will get the chance to enjoy stories narrated through dance..Do not miss out', 0);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `bio` text DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `bio`, `profile_image`, `userid`) VALUES
(41, 'art lover soul touched', '1597310691-mitchell-luo-Klj0ABeij8U-unsplash.jpg', 31),
(42, 'the moon loves you too', '1598474580-adam-miller-dBaz0xhCkPY-unsplash.jpg', 32);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `fullname`, `password`, `active`, `username`, `date`) VALUES
(31, 'flositaflonchie@gmail.com', 'Florence Kuria', '$2y$10$nFauxf43o1HwIJ.a2WxY7Ozlg0hyKtA5lYvpnPTF2dXKu4/uXgLWW', 1, 'kush.pie😘', '2020-07-31'),
(32, 'bkuria@me.com', 'Brian Irungu Kuria', '$2y$10$cZkmSlG7KlewcIzDtI9fuODlWgVvfXgYcjMS7GjrUWuZdwROV7lsa', 1, 'k.o.b.e.y🕳', '2020-08-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `INDEX` (`userid`) USING BTREE;
ALTER TABLE `events` ADD FULLTEXT KEY `name` (`name`);
ALTER TABLE `events` ADD FULLTEXT KEY `description` (`description`);
ALTER TABLE `events` ADD FULLTEXT KEY `name_2` (`name`,`description`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
