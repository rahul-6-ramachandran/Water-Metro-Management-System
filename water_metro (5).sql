-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2022 at 10:13 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `water_metro`
--

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `notice_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `notice` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`notice_id`, `date`, `notice`) VALUES
(1, '2022-11-18', 'very gud');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `price_id` int(11) NOT NULL,
  `routeno` int(11) NOT NULL,
  `min_price` int(11) NOT NULL,
  `max_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`price_id`, `routeno`, `min_price`, `max_price`) VALUES
(1, 1, 20, 30),
(2, 2, 20, 25),
(3, 3, 20, 28);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `user_id` int(50) NOT NULL,
  `name` varchar(40) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `email_address` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`user_id`, `name`, `phone_no`, `email_address`, `password`, `admin`) VALUES
(13, 'Rahul Ramachandran', 9895885219, 'rahulramachandran432@gmail.com', 'rahulr@123', 1),
(14, 'Akshay KS', 9582575725, 'akshayfunda@123.gmail.com', 'akshaykunna', 1),
(16, 'aflah', 7486573979, 'aflah123@gmail.com', 'aflahsalim', 0),
(18, 'kili', 9898989898, 'kili123@gmail.com', 'ikkili', 2),
(19, 'staff1', 9674957493, 'staff123@gmail.com', 'staff123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `reviews` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `name`, `reviews`) VALUES
(1, 'aflah salim', 's;lrvmetvobjetbvoje4t');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `routeno` int(100) NOT NULL,
  `startpoint` varchar(40) NOT NULL,
  `endpoint` varchar(40) NOT NULL,
  `jetties` int(10) NOT NULL,
  `length(km)` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`routeno`, `startpoint`, `endpoint`, `jetties`, `length(km)`) VALUES
(1, 'South Chittoor', 'Ernakulam', 4, 8.2),
(2, 'Edakochi', 'Thevara', 3, 3.74),
(3, 'Ernakulam', 'Vypin', 4, 6.4),
(4, 'Ernakulam', 'Mattancherry', 4, 6.1),
(5, 'High Court', 'Mulavukadu', 8, 11),
(6, 'Vyttila', 'Info Park', 4, 8),
(7, 'Kumbhalam', 'Thevara', 3, 4),
(8, 'Info Park', 'Edakochi', 7, 12),
(9, 'Mulavukad Panchayat', 'South Chittoor', 5, 8),
(10, 'Edakochi', 'Vypin', 5, 13.6),
(11, 'South Chittoor', 'Cheranallur', 8, 6),
(12, 'Elamkunnapuzha', 'High Court', 4, 15),
(13, 'Kadamakkudy', 'Kothad', 3, 6),
(14, 'Chennur North', 'Thundathum Kadav', 3, 3),
(15, 'ChariyamThuruth South', 'Chennur South', 3, 3),
(16, 'Kothad', 'Amrita Hospital', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `terminals`
--

CREATE TABLE `terminals` (
  `terminal_id` int(11) NOT NULL,
  `places` varchar(30) NOT NULL,
  `routeno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `terminals`
--

INSERT INTO `terminals` (`terminal_id`, `places`, `routeno`) VALUES
(1, 'South Chittoor', 1),
(2, 'Mulavukadu Panchayath', 1),
(3, 'Ponnarimangalam', 1),
(4, 'Thanthonnithuruth', 2),
(5, 'Edakochi', 2),
(6, 'Kumbalam', 2),
(7, 'Thevara', 2),
(8, 'Ernakulam', 3),
(9, 'Embarkation(WI)', 3),
(10, 'Fort Kochi', 3),
(11, 'Vypeen', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start` varchar(30) NOT NULL,
  `end` varchar(30) NOT NULL,
  `routeno` int(11) NOT NULL,
  `boat_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `no_of_tickets` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `verified` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `user_id`, `start`, `end`, `routeno`, `boat_id`, `date`, `time`, `no_of_tickets`, `total_price`, `verified`) VALUES
(1, 16, 'Edakochi', 'Kumbalam', 2, 10007, '2022-11-14', '09:10:00', 4, 80, 'No'),
(2, 16, 'Edakochi', 'Thevara', 2, 10007, '2022-11-17', '09:10:00', 2, 40, 'No'),
(3, 16, 'Embarkation(WI)', 'Ernakulam', 3, 10009, '2022-11-25', '07:40:00', 2, 40, 'No'),
(9, 16, 'Ernakulam', 'Embarkation(WI)', 3, 10009, '2022-11-30', '07:40:00', 2, 40, 'No'),
(10, 16, 'Ernakulam', 'Embarkation(WI)', 3, 10009, '2022-11-30', '07:40:00', 2, 40, 'No'),
(11, 16, 'Ernakulam', 'Embarkation(WI)', 3, 10009, '2022-11-30', '07:40:00', 2, 40, 'No'),
(12, 16, 'Ernakulam', 'Embarkation(WI)', 3, 10009, '2022-11-30', '07:40:00', 2, 40, 'No'),
(13, 16, 'Embarkation(WI)', 'Ernakulam', 3, 10009, '2022-11-22', '07:40:00', 3, 60, 'No'),
(14, 16, 'Fort Kochi', 'Vypeen', 3, 10009, '2022-11-16', '07:40:00', 3, 60, 'Yes'),
(16, 16, 'Fort Kochi', 'Vypeen', 3, 10009, '2022-11-16', '07:40:00', 3, 60, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `times` varchar(10) NOT NULL,
  `boat_id` int(11) NOT NULL,
  `routeno` int(11) NOT NULL,
  `Boat_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`times`, `boat_id`, `routeno`, `Boat_name`) VALUES
('6:15 am', 10001, 1, ''),
('7:40 am', 10002, 1, ''),
('9:10 am', 10003, 1, ''),
('6:15 pm', 10004, 1, ''),
('6:15 am', 10005, 2, ''),
('7:40 am', 10006, 2, ''),
('9:10 am', 10007, 2, ''),
('6:15 am', 10008, 3, ''),
('7:40 am', 10009, 3, ''),
('9:10 pm', 100010, 3, ''),
('6:15 pm', 100011, 2, ''),
('6:15 pm', 100012, 3, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`routeno`);

--
-- Indexes for table `terminals`
--
ALTER TABLE `terminals`
  ADD PRIMARY KEY (`terminal_id`),
  ADD KEY `routeno` (`routeno`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `routeno` (`routeno`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `boat_id` (`boat_id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`boat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `routeno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `terminals`
--
ALTER TABLE `terminals`
  MODIFY `terminal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `terminals`
--
ALTER TABLE `terminals`
  ADD CONSTRAINT `terminals_ibfk_1` FOREIGN KEY (`routeno`) REFERENCES `routes` (`routeno`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`routeno`) REFERENCES `routes` (`routeno`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `registration` (`user_id`),
  ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`boat_id`) REFERENCES `time` (`boat_id`),
  ADD CONSTRAINT `tickets_ibfk_4` FOREIGN KEY (`boat_id`) REFERENCES `time` (`boat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
