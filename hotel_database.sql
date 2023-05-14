-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2022 at 07:34 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `approve_db`
--

CREATE TABLE `approve_db` (
  `ApproveID` int(11) NOT NULL,
  `BookingID` int(11) NOT NULL,
  `ApproveDate` date NOT NULL,
  `LeaveDate` date NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `approve_db`
--

INSERT INTO `approve_db` (`ApproveID`, `BookingID`, `ApproveDate`, `LeaveDate`, `status`) VALUES
(11, 23, '2022-11-24', '2022-11-26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `booking_db`
--

CREATE TABLE `booking_db` (
  `BookingID` int(11) NOT NULL,
  `RoomID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `PaymentID` int(11) NOT NULL,
  `Checkin` date NOT NULL,
  `Checkout` date NOT NULL,
  `Adult` int(11) DEFAULT NULL,
  `Child` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_db`
--

INSERT INTO `booking_db` (`BookingID`, `RoomID`, `UserID`, `PaymentID`, `Checkin`, `Checkout`, `Adult`, `Child`, `status`) VALUES
(23, 6, 3, 1, '2022-11-24', '2022-11-26', 2, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `category_db`
--

CREATE TABLE `category_db` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_db`
--

INSERT INTO `category_db` (`CategoryID`, `CategoryName`) VALUES
(1, 'Double Room'),
(2, 'Single Room'),
(3, 'VIP Room'),
(5, 'Triple Beds Room');

-- --------------------------------------------------------

--
-- Table structure for table `food_db`
--

CREATE TABLE `food_db` (
  `FoodID` int(11) NOT NULL,
  `FoodName` varchar(50) NOT NULL,
  `PhoneNumber` int(11) NOT NULL,
  `FoodPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_db`
--

INSERT INTO `food_db` (`FoodID`, `FoodName`, `PhoneNumber`, `FoodPrice`) VALUES
(1, 'Noodle', 789, 20),
(3, 'Shan Noodle', 789, 5);

-- --------------------------------------------------------

--
-- Table structure for table `payment_db`
--

CREATE TABLE `payment_db` (
  `PaymentID` int(11) NOT NULL,
  `PaymentType` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_db`
--

INSERT INTO `payment_db` (`PaymentID`, `PaymentType`) VALUES
(1, 'Cash'),
(2, 'VISA'),
(3, 'Master'),
(4, 'Online Pay');

-- --------------------------------------------------------

--
-- Table structure for table `review_db`
--

CREATE TABLE `review_db` (
  `ReviewID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `RoomID` int(11) NOT NULL,
  `Review` varchar(255) NOT NULL,
  `Anonymous` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review_db`
--

INSERT INTO `review_db` (`ReviewID`, `UserID`, `RoomID`, `Review`, `Anonymous`) VALUES
(8, 3, 6, 'Good Room', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles_db`
--

CREATE TABLE `roles_db` (
  `RoleID` int(11) NOT NULL,
  `RoleName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles_db`
--

INSERT INTO `roles_db` (`RoleID`, `RoleName`) VALUES
(2, 'GuestUser'),
(1, 'WebAdmin');

-- --------------------------------------------------------

--
-- Table structure for table `room_db`
--

CREATE TABLE `room_db` (
  `RoomID` int(11) NOT NULL,
  `RoomNo` varchar(50) NOT NULL,
  `RoomImage` varchar(255) NOT NULL,
  `RoomType` varchar(50) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `Prices` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_db`
--

INSERT INTO `room_db` (`RoomID`, `RoomNo`, `RoomImage`, `RoomType`, `CategoryID`, `Prices`) VALUES
(6, 'R01', 'hol.jpg', 'Burma Type', 1, 500),
(7, 'R02', 'bed.jpg', 'Extra Type ', 1, 555),
(8, 'R03', 'hotel.jpg', 'Comfort Type', 1, 60),
(9, 'R04', 'hotel1.jpg', 'Comfort Type', 2, 100),
(10, 'R05', 'bed1.jpg', 'Comfort Type', 2, 300),
(11, 'R06', 'bed2.jpg', 'Extra Type ', 5, 499);

-- --------------------------------------------------------

--
-- Table structure for table `user_db`
--

CREATE TABLE `user_db` (
  `UserID` int(11) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `User_name` varchar(50) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `User_email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `NRC` int(30) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Contact_No` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_db`
--

INSERT INTO `user_db` (`UserID`, `FullName`, `User_name`, `RoleID`, `User_email`, `Password`, `NRC`, `Address`, `Contact_No`) VALUES
(1, 'Max', 'max', 1, 'max@gmail.com', '123', 5485, 'Yangon', 945126769),
(2, 'PPL', 'ppl', 1, 'ppl@gmail.com', '123', 21344, 'Mdy', 984185765),
(3, 'April', 'april', 2, 'april@gmail.com', '123', 21341, 'New York', 9874577),
(4, 'August', 'august', 2, 'august@gmail.com', '123', 12345, 'Yangon', 12355),
(5, 'Tester', 'test', 2, 'test123@gmail.com', '123', 11122, 'Naypyidaw', 922113312);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approve_db`
--
ALTER TABLE `approve_db`
  ADD PRIMARY KEY (`ApproveID`),
  ADD KEY `BookingID` (`BookingID`);

--
-- Indexes for table `booking_db`
--
ALTER TABLE `booking_db`
  ADD PRIMARY KEY (`BookingID`),
  ADD KEY `RoomID` (`RoomID`,`UserID`,`PaymentID`),
  ADD KEY `PaymentID` (`PaymentID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `category_db`
--
ALTER TABLE `category_db`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `food_db`
--
ALTER TABLE `food_db`
  ADD PRIMARY KEY (`FoodID`);

--
-- Indexes for table `payment_db`
--
ALTER TABLE `payment_db`
  ADD PRIMARY KEY (`PaymentID`);

--
-- Indexes for table `review_db`
--
ALTER TABLE `review_db`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `UserID` (`UserID`,`RoomID`),
  ADD KEY `RoomID` (`RoomID`);

--
-- Indexes for table `roles_db`
--
ALTER TABLE `roles_db`
  ADD PRIMARY KEY (`RoleID`),
  ADD UNIQUE KEY `RoleName` (`RoleName`);

--
-- Indexes for table `room_db`
--
ALTER TABLE `room_db`
  ADD PRIMARY KEY (`RoomID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `user_db`
--
ALTER TABLE `user_db`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `User_name` (`User_name`,`User_email`),
  ADD KEY `RoleID` (`RoleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approve_db`
--
ALTER TABLE `approve_db`
  MODIFY `ApproveID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `booking_db`
--
ALTER TABLE `booking_db`
  MODIFY `BookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `category_db`
--
ALTER TABLE `category_db`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `food_db`
--
ALTER TABLE `food_db`
  MODIFY `FoodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_db`
--
ALTER TABLE `payment_db`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `review_db`
--
ALTER TABLE `review_db`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles_db`
--
ALTER TABLE `roles_db`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `room_db`
--
ALTER TABLE `room_db`
  MODIFY `RoomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_db`
--
ALTER TABLE `user_db`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `approve_db`
--
ALTER TABLE `approve_db`
  ADD CONSTRAINT `approve_db_ibfk_1` FOREIGN KEY (`BookingID`) REFERENCES `booking_db` (`BookingID`);

--
-- Constraints for table `booking_db`
--
ALTER TABLE `booking_db`
  ADD CONSTRAINT `booking_db_ibfk_1` FOREIGN KEY (`RoomID`) REFERENCES `room_db` (`RoomID`),
  ADD CONSTRAINT `booking_db_ibfk_2` FOREIGN KEY (`PaymentID`) REFERENCES `payment_db` (`PaymentID`),
  ADD CONSTRAINT `booking_db_ibfk_3` FOREIGN KEY (`UserID`) REFERENCES `user_db` (`UserID`);

--
-- Constraints for table `review_db`
--
ALTER TABLE `review_db`
  ADD CONSTRAINT `review_db_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user_db` (`UserID`),
  ADD CONSTRAINT `review_db_ibfk_2` FOREIGN KEY (`RoomID`) REFERENCES `room_db` (`RoomID`);

--
-- Constraints for table `room_db`
--
ALTER TABLE `room_db`
  ADD CONSTRAINT `room_db_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `category_db` (`CategoryID`);

--
-- Constraints for table `user_db`
--
ALTER TABLE `user_db`
  ADD CONSTRAINT `user_db_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `roles_db` (`RoleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
