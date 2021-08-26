-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2020 at 09:01 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `charitymanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` varchar(12) NOT NULL,
  `adminEmail` varchar(64) NOT NULL,
  `adminPwd` varchar(12) NOT NULL,
  `pwdHash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminEmail`, `adminPwd`, `pwdHash`) VALUES
('Alynn', 'alynn99@gmail.com', 'jimin123', '$2y$10$FaHnb/PZqEJ6zpjAfXsC5.gbQlyP5GqY2eGrEosTBW/.AWFZbQX1O'),
('Susan', 'susan@yahoo.com', 'susan123', '$2y$10$uoLTSbEfCTUkCLh3kseoF.9y0fVwB.TRAFisqIbZSXY2EUOinYtky'),
('TaeTae', 'taehyung_cute@gmail.com', 'taehyung678', '$2y$10$M2NvbBgB3L4/Ss2rOw/6Y.E2dDTc0BqFmKGT40Wv2lTDYmvBff4Se');

-- --------------------------------------------------------

--
-- Table structure for table `charityrequest`
--

CREATE TABLE `charityrequest` (
  `requestID` int(3) NOT NULL,
  `requestName` varchar(50) NOT NULL,
  `requestEmail` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `charityrequest`
--

INSERT INTO `charityrequest` (`requestID`, `requestName`, `requestEmail`) VALUES
(9, 'Organmu Organku', 'organSedunia@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `donorID` int(3) NOT NULL,
  `donorName` varchar(64) NOT NULL,
  `donorEmail` varchar(50) NOT NULL,
  `orgID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventID` int(3) NOT NULL,
  `eventTitle` varchar(64) NOT NULL,
  `eventVenue` varchar(50) NOT NULL,
  `eventDesc` varchar(255) NOT NULL,
  `orgID` int(3) NOT NULL,
  `eventImg` varchar(80) NOT NULL,
  `eventDate` date NOT NULL,
  `statusEvent` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventID`, `eventTitle`, `eventVenue`, `eventDesc`, `orgID`, `eventImg`, `eventDate`, `statusEvent`) VALUES
(1, 'WeCare Bees!', 'Bukit Tinggi, Pahang', 'Pihak kami akan menganjurkan aktiviti mendaki di Bukit Tinggi. Sepanjang pendakian, peserta akan mengutip lebah untk diselamatkan. #SaveTheBees', 13, 'stockImg/bee.jpg', '2020-09-10', 'Y'),
(2, 'WeCare Cats', 'Jonker Street, Malacca', 'We will held an event that allows participants to be more closer to the sweet street cats by giving them food and caring for the sick cats! Participants will also visit our vet clinic to further assist us in treating the sick street cats.', 13, 'stockImg/catChina.png', '2020-08-06', 'Y'),
(9, 'Care for the Cuties', 'Jonker Walk', 'Join us with our adventure to meet friendly stray cats and dogs! Feed them food, and if sick, help us treat the animal at our local vet clinic! Participation is absolutely free. Food and drinks are provided.', 11, 'stockImg/file-20180116-53302-19zq1oe.jpg', '2020-08-19', 'Y'),
(10, 'Hamsters on the run!', 'Happy Vet Clinic, Seremban', 'Join us in helping cute little hammies recover from their sickness!', 11, 'stockImg/hammy.jpg', '2020-09-09', 'Y'),
(12, 'WeCare Volunteering Event in Subang', 'Coming soon', 'WeCare Charity is holding an event to give used clothes including food and drinks to the homeless community around Kuala Lumpur region. We would love some help from willing volunteers in handling and distributing the packages. ', 10, '', '2020-10-13', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `organisation`
--

CREATE TABLE `organisation` (
  `orgID` int(3) NOT NULL,
  `orgPwd` varchar(12) NOT NULL,
  `orgHash` varchar(255) NOT NULL,
  `orgName` varchar(50) NOT NULL,
  `orgEmail` varchar(64) NOT NULL,
  `orgDescription` varchar(255) NOT NULL,
  `OrgFax` varchar(12) DEFAULT NULL,
  `OrgAddress` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organisation`
--

INSERT INTO `organisation` (`orgID`, `orgPwd`, `orgHash`, `orgName`, `orgEmail`, `orgDescription`, `OrgFax`, `OrgAddress`) VALUES
(10, 'patBoneka71', '$2y$10$EGDgDY2DPJyo2UvCbd9.I.zaFbXAyQSlPAVw/EqG9PbadpfyLr9z6', 'WeCare Charity Sdn Bhd', 'wecare_hq@charity.com', 'We do humanitarian work including animal rescue. Based in Selangor.', '06-674 2345', 'Jalan Yoyo 5, Pasir Salak, Klang'),
(11, 'patBoneka53', '$2y$10$ld.tTdZRZ.Tmxh/ZUrnu9uIWa1kLIxHFpGu4xP4CrmsZGaxUZf3c6', 'Pets Care Sdn Bhd', 'careforpets@hq.com', ' We are an organization that focuses on animal rescue and training. We accept any independent animal rescue shelters that wants to be an affiliate with us! Just simply email us for further details.', '06-4395192', ' Jalan Serumpun 2, Batu Berendam, Johor'),
(12, 'patBoneka69', '$2y$10$O0JHZz0LbPRrz/Y4wL1J9OI.5yNPsNpTdGCkrGAhHk4yS13rEFTdy', 'Pusat Anak Yatim Permai', 'anak_permai@gmail.com', ' We are an organization that handles orphans and unwanted children. We accept volunteers and any individuals that seeks for adoption.', '06-432 8745', ' Bangunan Putih, Jalan Sekerat Tujuh, Durain Gugur, Pahang'),
(13, 'botolAir56', '$2y$10$vovYcTDILNuWnFvLq5vUIej760FDrKja4GZD0tm6m0VdAB4NBLbRC', 'WeCare Org', 'wecare_support@gmail.com', ' As the name suggest, we care in helping those in need! It is not limited to humans only, animals are also included! We organize local and international volunteering events. ', '06-4399198', ' Jalan Sutera Emas 21, Taman Rumput Hijau, 76540 Melaka');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(3) NOT NULL,
  `donorID` int(3) NOT NULL,
  `payAmount` int(5) NOT NULL,
  `orgID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `volunteerID` int(3) NOT NULL,
  `volunteerPhone` int(12) NOT NULL,
  `volunteerEmail` varchar(64) NOT NULL,
  `orgID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `charityrequest`
--
ALTER TABLE `charityrequest`
  ADD PRIMARY KEY (`requestID`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`donorID`),
  ADD KEY `orgID` (`orgID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventID`),
  ADD KEY `orgID` (`orgID`);

--
-- Indexes for table `organisation`
--
ALTER TABLE `organisation`
  ADD PRIMARY KEY (`orgID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `donorID` (`donorID`),
  ADD KEY `orgID` (`orgID`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`volunteerID`),
  ADD KEY `orgID` (`orgID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `charityrequest`
--
ALTER TABLE `charityrequest`
  MODIFY `requestID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `donorID` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `organisation`
--
ALTER TABLE `organisation`
  MODIFY `orgID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `volunteerID` int(3) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donor`
--
ALTER TABLE `donor`
  ADD CONSTRAINT `donor_ibfk_1` FOREIGN KEY (`orgID`) REFERENCES `organisation` (`orgID`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`orgID`) REFERENCES `organisation` (`orgID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`donorID`) REFERENCES `donor` (`donorID`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`orgID`) REFERENCES `donor` (`orgID`);

--
-- Constraints for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD CONSTRAINT `volunteer_ibfk_1` FOREIGN KEY (`orgID`) REFERENCES `organisation` (`orgID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
