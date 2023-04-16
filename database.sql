-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 14, 2023 at 06:45 PM
-- Server version: 5.7.39-42-log
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbzg3bcp49ujsy`
--

-- --------------------------------------------------------

--
-- Table structure for table `exercises`
--

CREATE TABLE `exercises` (
  `exerciseName` varchar(50) NOT NULL,
  `workoutID` int(11) NOT NULL,
  `reps` int(11) NOT NULL,
  `sets` int(11) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exercises`
--

INSERT INTO `exercises` (`exerciseName`, `workoutID`, `reps`, `sets`, `weight`) VALUES
('crunches', 1, 20, 3, 0),
('pull-ups', 1, 5, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `password` varchar(25) NOT NULL,
  `joinDate` varchar(25) NOT NULL,
  `workoutsCompleted` int(11) NOT NULL,
  `height` varchar(6) NOT NULL,
  `weight` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `username` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table for the Users';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `password`, `joinDate`, `workoutsCompleted`, `height`, `weight`, `age`, `username`) VALUES
(1, 'test123', 'today', 0, '6\'5', 190, 65, 'rodri100172'),
(2, 'test123', 'tomorrow', 45, '7\'5', 350, 29, 'adamw');

-- --------------------------------------------------------

--
-- Table structure for table `Workouts`
--

CREATE TABLE `Workouts` (
  `userID` int(11) NOT NULL,
  `type` varchar(25) NOT NULL,
  `date` varchar(25) NOT NULL,
  `workoutID` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Workouts`
--

INSERT INTO `Workouts` (`userID`, `type`, `date`, `workoutID`) VALUES
(1, 'Cardio', '04/13/2023', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `Workouts`
--
ALTER TABLE `Workouts`
  ADD UNIQUE KEY `workoutID` (`workoutID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Workouts`
--
ALTER TABLE `Workouts`
  MODIFY `workoutID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;