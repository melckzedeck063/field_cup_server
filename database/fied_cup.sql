-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 20, 2023 at 01:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fied_cup`
--

-- --------------------------------------------------------

--
-- Table structure for table `match_results`
--

CREATE TABLE `match_results` (
  `result_id` int(11) NOT NULL,
  `match_played` varchar(100) NOT NULL,
  `results` varchar(40) NOT NULL,
  `yellow_card` int(11) NOT NULL,
  `red_card` int(11) NOT NULL,
  `valuable_player` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `match_results`
--

INSERT INTO `match_results` (`result_id`, `match_played`, `results`, `yellow_card`, `red_card`, `valuable_player`) VALUES
(3, 'Kijistone vs Chisorya', '3-1', 5, 0, 'Kimwamu Jadidu'),
(4, 'Maokoto Sports vs Kijistone', '2-2', 7, 0, 'Mghwai Charles'),
(5, 'Maokoto Sports vs Dream League', '3-2', 5, 0, 'Richard Keneth');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `player_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `position` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `team` varchar(50) NOT NULL,
  `date_registered` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`player_id`, `name`, `position`, `age`, `team`, `date_registered`) VALUES
(1, 'Nickson Kibabage', 'Defender', 24, 'Young Africans', '2023-09-16'),
(2, 'Mutambara Lomalisa', 'Defender', 26, 'Young Africans', '2023-09-16'),
(3, 'Patrick Mafisango', 'Stricker', 29, 'Maokoto Sports Club', '2023-09-17'),
(4, 'Richard Keneth', 'Midfielder', 22, 'Dream League', '2023-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `STUDENT_ID` varchar(20) NOT NULL,
  `FIRST_NAME` varchar(50) NOT NULL,
  `MIDDLE_NAME` varchar(40) NOT NULL,
  `LAST_NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(70) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `ADMIN_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `STUDENT_ID`, `FIRST_NAME`, `MIDDLE_NAME`, `LAST_NAME`, `EMAIL`, `PASSWORD`, `ADMIN_ID`) VALUES
(1, 'T22-03-10102', 'JACKSON', 'KAWAWA', 'JACKSON', 'jackson@gmail.com', 'jackson123', 1),
(3, 'T22-03-05151', 'JOSEPH', 'MASATU', 'MANYAMA', 'joseph@gmail.com ', 'joseph123', 3),
(4, 'T22-03-05151', 'AMINA', 'JOSEPH', 'MASATU', 'amina@gmail.com ', 'amina123', 3),
(6, 'T22-03-05005', 'John', 'Mafuru', 'Misango', 'john@gmail.com ', 'john123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `team_id` int(11) NOT NULL,
  `team` varchar(40) NOT NULL,
  `coach` varchar(70) NOT NULL,
  `points` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `goals` int(11) NOT NULL,
  `adminID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_id`, `team`, `coach`, `points`, `position`, `goals`, `adminID`) VALUES
(3, 'Chisorya', 'Masau Bwire', 26, 3, 12, 1),
(4, 'Kijistone', 'Chars Mkwasa', 29, 2, 14, 1),
(5, 'Maokoto Sports Club', 'Jackson Kawawa', 20, 5, 10, 1),
(6, 'Dream League', 'Japhet Richard', 30, 2, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE `time_table` (
  `id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `day` varchar(20) NOT NULL,
  `time` varchar(11) NOT NULL,
  `game` varchar(50) NOT NULL,
  `ground` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `time_table`
--

INSERT INTO `time_table` (`id`, `date`, `day`, `time`, `game`, `ground`) VALUES
(2, '20-09-2023', 'Tuesday', '16:00', 'Chisorya vs Kijistone', 'Cive Grounds'),
(3, '21-09-2023', 'Wednesday', '16:00', 'Maokoto vs Vibunda', 'Cive Arena'),
(4, '11-10-2023', 'Friday', '16:00', 'Dream League vs Kijistone', 'Social Ground');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `match_results`
--
ALTER TABLE `match_results`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`player_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_id`),
  ADD KEY `adminID` (`adminID`);

--
-- Indexes for table `time_table`
--
ALTER TABLE `time_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `match_results`
--
ALTER TABLE `match_results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `player_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `time_table`
--
ALTER TABLE `time_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
