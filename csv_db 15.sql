-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2022 at 04:32 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csv_db 16`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic plan codes`
--

CREATE TABLE `academic plan codes` (
  `Code` varchar(10) NOT NULL,
  `Academic Plan` varchar(30) DEFAULT NULL,
  `School` varchar(49) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `academic plan codes`
--

INSERT INTO `academic plan codes` (`Code`, `Academic Plan`, `School`) VALUES
('ABCDEFG', 'BA Hons English', 'English'),
('M5UFDAES', 'Cert Fnd Prog in Arts & Ed', 'Arts & Education (Foundation)'),
('M5UFDAET', 'Cert Fnd Prog in Arts & Ed', 'Arts & Education (Foundation)'),
('M5UFDBMS', 'Cert Fnd Prog in Bus & Mgmt', 'Business and Management (Foundation)'),
('M5UFDBMT', 'Cert Fnd Prog in Bus & Mgmt', 'Business and Management (Foundation)'),
('M5UFDEGS', 'Cert Fnd Prog in Engineering', 'Engineering (Foundation)'),
('M5UFDEGT', 'Cert Fnd Prog in Engineering', 'Engineering (Foundation)'),
('M5UFDSCS', 'Cert Foundation in Sci', 'Science (Foundation)'),
('M5UFDSCT', 'Cert Foundation in Sci', 'Science (Foundation)'),
('M6UAPPMS', 'BSc Hons App Psych & Mgmt St', 'Organisational and Applied Psychology'),
('M6UBMEDS', 'BSc Hons Biomedical Sciences', 'Biomedical Sciences'),
('M6UBSECFS', 'BSc Hons Business Econ&Finance', 'Nottingham University Business School'),
('M6UBSECMS', 'BSc Hons Business Econ & Mgmt', 'Nottingham University Business School'),
('M6UBSMMGT', 'BSc Hons Maths & Management', 'Mathematical Sciences'),
('M6UBTECH', 'BSc Hons Biotechnology', 'Biosciences'),
('M6UCEEVE', 'BEng Hons Chem Eng w Env Eng', 'Chemical & Environmental Engineering'),
('M6UCHENG', 'BEng Hons Chemical Engineering', 'Chemical & Environmental Engineering'),
('M6UCMPAI', 'BSc Hons Comp Sci with AI', 'Computer Science'),
('M6UCMPSC', 'BSc Hons Computer Science', 'Computer Science'),
('M6UCOMPAI', 'BSc Hons Comp Sci with AI 3+0', 'Computer Science'),
('M6UCVENG', 'BEng Hons Civil Engineering', 'Civil Engineering'),
('M6UECNMS', 'BSc Hons Economics', 'Economics'),
('M6UECOIE', 'BSc Hons Econ & Int Econimcs', 'Economics'),
('M6UEDUCT', 'BA Hons Education  (TESOL)', 'Education'),
('M6UEEENG', 'BEng Hons Electl & Electnc Eng', 'Electrical & Electronic Engineering'),
('M6UENLCW', 'BA Hons Engl w Creative Writ', 'English'),
('M6UENLLL', 'BA Hons English Language & Lit', 'English'),
('M6UEVNSC', 'BSc Hons Environmental Science', 'Environmental & Geographical Sciences'),
('M6UFAMGTS', 'BSc Hons Finance, Acc\'ng &Mgmt', 'Nottingham University Business School'),
('M6UICELL', 'BA Hons IntComSt w Eng L & L', 'Media, Languages and Cultures'),
('M6UICFTV', 'BA Hons IntComSt w Film & TV', 'Media, Languages and Cultures'),
('M6UICPAT', 'BA Hons IntlCommSt wt Pfr Arts', 'Media, Languages and Cultures'),
('M6UINREL', 'BA Hons Intnl Relations', 'Politics, History & International Relations'),
('M6UINTBMS', 'BSc Hons Intn\'l Business Mgmt', 'Nottingham University Business School'),
('M6UINTCS', 'BA Hons Intnl Communication St', 'Media, Languages and Cultures'),
('M6UIRFRN', 'BA Hons Intnl Rels w French', 'Politics, History & International Relations'),
('M6UIRSPN', 'BA Hons Intnl Rels w Spanish', 'Politics, History & International Relations'),
('M6ULIBAT', 'BA Hons Liberal Arts', 'Media, Languages and Cultures'),
('M6UMANAG', 'BSc Hons Management', 'Nottingham University Business School'),
('M6UMCENG', 'BEng Hons Mechanical Eng', 'Mechanical, Materials & Manufacturing Engineering'),
('M6UMTENG', 'BEng Hons Mechatronic Eng', 'Electrical & Electronic Engineering'),
('M6UNUTRN', 'BSc Hons Nutrition', 'Biosciences'),
('M6UPCTHS', 'BSc Hons Pharmal & Health Sci', 'Pharmacy'),
('M6UPSYCH', 'BSc Hons Psychology', 'Psychology'),
('M6UPSYCN', 'BSc Hons Psych & Cog Neurosci', 'Psychology'),
('M6USWENG', 'BSc Hons Software Engineering', 'Computer Science'),
('M6UTESOL', 'BEd Hons TESOL', 'Education'),
('M7PBAMTMSF', 'MBA Business Administration', 'Nottingham University Business School'),
('M7PBAMTMSP', 'MBA Business Administration', 'Nottingham University Business School'),
('M7PBIOSCL2', 'MPhil Biosciences (non-molec)', 'Biosciences'),
('M7PBMEDSL2', 'MPhil BiomedicalSci(non-molec)', 'Biomedical Sciences'),
('M7PBUSMA', 'MSc Business and Management', 'Nottingham University Business School'),
('M7PCHENG', 'MSc Chemical Engineering', 'Chemical & Environmental Engineering'),
('M7PCHENGL', 'MPhil Chemical Engineering', 'Chemical & Environmental Engineering'),
('M7PCHENGP', 'MSc Chemical Engineering', 'Chemical & Environmental Engineering'),
('M7PCTSST', 'MA Cultural Studies', 'Media, Languages and Cultures'),
('M7PCVENG', 'MSc Civil Engineering', 'Civil Engineering'),
('M7PCVENGL', 'MPhil Civil Engineering', 'Civil Engineering'),
('M7PEDCTCSF', 'PG Cert Education', 'Education'),
('M7PEDCTCSP', 'PG Cert Education', 'Education'),
('M7PEDCTMSF', 'MA Education', 'Education'),
('M7PEDCTNL', 'MPhil Education', 'Education'),
('M7PEEENG', 'MSc Electrical&Electronic Eng', 'Electrical & Electronic Engineering'),
('M7PEEENGL', 'MPhil Electl & Electnc Eng', 'Electrical & Electronic Engineering'),
('M7PELMTMSF', 'MA Education Lead & Mgmt', 'Education'),
('M7PENLCW', 'MA English w Creative Writing', 'English'),
('M7PEVENG', 'MSc Environmental Engineering', 'Chemical & Environmental Engineering'),
('M7PFNIVMSF', 'MSc Finance & Investment', 'Nottingham University Business School'),
('M7PFNIVMSP', 'MSc Finance & Investment', 'Nottingham University Business School'),
('M7PGOEGRL', 'MPhil Geography', 'Environmental & Geographical Sciences'),
('M7PINREL', 'MA Intnl Relations', 'Politics, History & International Relations'),
('M7PINTDM', 'MSc Intnl Development Mgmt', 'Politics, History & International Relations'),
('M7PMBAFMSF', 'MBA Finance', 'Nottingham University Business School'),
('M7PMBAFMSP', 'MBA Finance', 'Nottingham University Business School'),
('M7PMCENG', 'MSc Mechanical Engineering', 'Mechanical, Materials & Manufacturing Engineering'),
('M7PMCENGL', 'MPhil Mechanical Engineering', 'Mechanical, Materials & Manufacturing Engineering'),
('M7PMGTPS', 'MSc Management Psychology', 'Organisational and Applied Psychology'),
('M7PMODLCR', 'MRes Mod Lang & Cultures', 'Media, Languages and Cultures'),
('M7PPHMCYL', 'MPhil Pharmacy', 'Pharmacy'),
('M7PPRACMSF', 'MSc Professional Accountancy', 'Nottingham University Business School'),
('M7PPSYCHL', 'MPhil Psychology', 'Psychology'),
('M7PPSYCHR', 'MRes Psychology', 'Psychology'),
('M7PSIEDCSF', 'PGCert Special & Inc Edu', 'Education'),
('M7PSIEDMSF', 'MA Special & Inclusive Edu', 'Education'),
('M7PTSOLMSF', 'MA TESOL', 'Education'),
('M7UPHMCY', 'MPharm Pharmacy', 'Pharmacy'),
('M8PAPPSY', 'PhD Applied Psychology', 'Organisational and Applied Psychology'),
('M8PBMEDS3', 'PhD Biomedical Sci (non-molec)', 'Biomedical Sciences'),
('M8PBMNGT', 'PhD Business & Management', 'Nottingham University Business School'),
('M8PCHENG', 'PhD Chemical Engineering', 'Chemical & Environmental Engineering'),
('M8PCMPSC', 'PhD Computer Science', 'Computer Science'),
('M8PCVENG', 'PhD Civil Engineering', 'Civil Engineering'),
('M8PEDCTN', 'PhD Education', 'Education'),
('M8PEEENG', 'PhD Electl & Electnc Eng', 'Electrical & Electronic Engineering'),
('M8PENLSH2', 'MPhil English', 'English'),
('M8PGEOGR', 'PhD Geography', 'Environmental & Geographical Sciences'),
('M8PMCENG', 'PhD Mechanical Engineering', 'Mechanical, Materials & Manufacturing Engineering'),
('M8PPSYCH', 'PhD Psychology', 'Psychology');

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `Admin ID` int(8) NOT NULL,
  `Password` varchar(200) NOT NULL DEFAULT '0000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`Admin ID`, `Password`) VALUES
(10000001, '0000');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcement_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `tutor_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `Appointment_ID` int(11) NOT NULL,
  `Lect ID` int(11) NOT NULL,
  `Monday` int(11) NOT NULL,
  `Tuesday` int(11) NOT NULL,
  `Wednesday` int(11) NOT NULL,
  `Thursday` int(11) NOT NULL,
  `Friday` int(11) NOT NULL,
  `Saturday` int(11) NOT NULL,
  `Sunday` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`Appointment_ID`, `Lect ID`, `Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`, `Saturday`, `Sunday`) VALUES
(1, 50000001, 1, 1, 1, 1, 1, 1, 1),
(2, 50000002, 2, 2, 2, 2, 2, 2, 2),
(3, 50000003, 3, 3, 3, 3, 3, 3, 3),
(4, 50000004, 4, 4, 4, 4, 4, 4, 4),
(5, 50000005, 5, 5, 5, 5, 5, 5, 5),
(6, 50000006, 6, 6, 6, 6, 6, 6, 6),
(7, 50000007, 7, 7, 7, 7, 7, 7, 7),
(8, 50000008, 8, 8, 8, 8, 8, 8, 8),
(9, 50000009, 9, 9, 9, 9, 9, 9, 9),
(10, 50000010, 10, 10, 10, 10, 10, 10, 10),
(11, 50000011, 11, 11, 11, 11, 11, 11, 11),
(12, 50000012, 12, 12, 12, 12, 12, 12, 12),
(13, 50000013, 13, 13, 13, 13, 13, 13, 13),
(14, 50000014, 14, 14, 14, 14, 14, 14, 14),
(15, 50000015, 15, 15, 15, 15, 15, 15, 15),
(16, 50000016, 16, 16, 16, 16, 16, 16, 16),
(17, 50000017, 17, 17, 17, 17, 17, 17, 17),
(18, 50000018, 18, 18, 18, 18, 18, 18, 18),
(19, 50000019, 19, 19, 19, 19, 19, 19, 19),
(20, 50000020, 20, 20, 20, 20, 20, 20, 20),
(21, 50000021, 21, 21, 21, 21, 21, 21, 21),
(22, 50000022, 22, 22, 22, 22, 22, 22, 22),
(23, 50000023, 23, 23, 23, 23, 23, 23, 23),
(24, 50000024, 24, 24, 24, 24, 24, 24, 24),
(25, 50000025, 25, 25, 25, 25, 25, 25, 25),
(26, 50000026, 26, 26, 26, 26, 26, 26, 26),
(27, 50000027, 27, 27, 27, 27, 27, 27, 27),
(28, 50000028, 28, 28, 28, 28, 28, 28, 28),
(29, 50000029, 29, 29, 29, 29, 29, 29, 29),
(30, 50000030, 30, 30, 30, 30, 30, 30, 30),
(31, 50000031, 31, 31, 31, 31, 31, 31, 31),
(32, 50000032, 32, 32, 32, 32, 32, 32, 32),
(33, 50000033, 33, 33, 33, 33, 33, 33, 33),
(34, 50000034, 34, 34, 34, 34, 34, 34, 34),
(35, 50000035, 35, 35, 35, 35, 35, 35, 35),
(36, 50000036, 36, 36, 36, 36, 36, 36, 36),
(37, 50000037, 37, 37, 37, 37, 37, 37, 37),
(38, 50000038, 38, 38, 38, 38, 38, 38, 38),
(39, 50000039, 39, 39, 39, 39, 39, 39, 39),
(40, 50000040, 40, 40, 40, 40, 40, 40, 40),
(41, 50000041, 41, 41, 41, 41, 41, 41, 41),
(42, 50000042, 42, 42, 42, 42, 42, 42, 42),
(43, 50000043, 43, 43, 43, 43, 43, 43, 43),
(44, 50000044, 44, 44, 44, 44, 44, 44, 44),
(45, 50000045, 45, 45, 45, 45, 45, 45, 45),
(46, 50000046, 46, 46, 46, 46, 46, 46, 46),
(47, 50000047, 47, 47, 47, 47, 47, 47, 47),
(48, 50000048, 48, 48, 48, 48, 48, 48, 48),
(49, 50000049, 49, 49, 49, 49, 49, 49, 49),
(50, 50000050, 50, 50, 50, 50, 50, 50, 50),
(51, 50000051, 51, 51, 51, 51, 51, 51, 51),
(52, 50000052, 52, 52, 52, 52, 52, 52, 52),
(53, 50000053, 53, 53, 53, 53, 53, 53, 53),
(54, 50000054, 54, 54, 54, 54, 54, 54, 54),
(55, 50000055, 55, 55, 55, 55, 55, 55, 55),
(56, 50000056, 56, 56, 56, 56, 56, 56, 56),
(57, 50000057, 57, 57, 57, 57, 57, 57, 57),
(58, 50000058, 58, 58, 58, 58, 58, 58, 58),
(59, 50000059, 59, 59, 59, 59, 59, 59, 59),
(60, 50000060, 60, 60, 60, 60, 60, 60, 60),
(61, 50000061, 61, 61, 61, 61, 61, 61, 61),
(62, 50000062, 62, 62, 62, 62, 62, 62, 62),
(63, 50000063, 63, 63, 63, 63, 63, 63, 63),
(64, 50000064, 64, 64, 64, 64, 64, 64, 64),
(65, 50000065, 65, 65, 65, 65, 65, 65, 65),
(66, 50000066, 66, 66, 66, 66, 66, 66, 66),
(67, 50000067, 67, 67, 67, 67, 67, 67, 67),
(68, 50000068, 68, 68, 68, 68, 68, 68, 68),
(69, 50000069, 69, 69, 69, 69, 69, 69, 69),
(70, 50000070, 70, 70, 70, 70, 70, 70, 70),
(71, 50000071, 71, 71, 71, 71, 71, 71, 71),
(72, 50000072, 72, 72, 72, 72, 72, 72, 72),
(73, 50000073, 73, 73, 73, 73, 73, 73, 73),
(74, 50000074, 74, 74, 74, 74, 74, 74, 74);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `announcement_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `friday timeslot`
--

CREATE TABLE `friday timeslot` (
  `appointment_id` int(11) NOT NULL,
  `timeslot1` varchar(255) DEFAULT NULL,
  `timeslot2` varchar(255) DEFAULT NULL,
  `timeslot3` varchar(255) DEFAULT NULL,
  `timeslot4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friday timeslot`
--

INSERT INTO `friday timeslot` (`appointment_id`, `timeslot1`, `timeslot2`, `timeslot3`, `timeslot4`) VALUES
(1, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL),
(13, NULL, NULL, NULL, NULL),
(14, NULL, NULL, NULL, NULL),
(15, NULL, NULL, NULL, NULL),
(16, NULL, NULL, NULL, NULL),
(17, NULL, NULL, NULL, NULL),
(18, NULL, NULL, NULL, NULL),
(19, NULL, NULL, NULL, NULL),
(20, NULL, NULL, NULL, NULL),
(21, NULL, NULL, NULL, NULL),
(22, NULL, NULL, NULL, NULL),
(23, NULL, NULL, NULL, NULL),
(24, NULL, NULL, NULL, NULL),
(25, NULL, NULL, NULL, NULL),
(26, NULL, NULL, NULL, NULL),
(27, NULL, NULL, NULL, NULL),
(28, NULL, NULL, NULL, NULL),
(29, NULL, NULL, NULL, NULL),
(30, NULL, NULL, NULL, NULL),
(31, 'Elsaid,Salma Tamer Fathy Ahmed', NULL, NULL, NULL),
(32, NULL, NULL, NULL, NULL),
(33, NULL, NULL, NULL, NULL),
(34, NULL, NULL, NULL, NULL),
(35, NULL, NULL, NULL, NULL),
(36, NULL, NULL, NULL, NULL),
(37, NULL, NULL, NULL, NULL),
(38, NULL, NULL, NULL, NULL),
(39, NULL, NULL, NULL, NULL),
(40, NULL, NULL, NULL, NULL),
(41, NULL, NULL, NULL, NULL),
(42, NULL, NULL, NULL, NULL),
(43, NULL, NULL, NULL, NULL),
(44, NULL, NULL, NULL, NULL),
(45, NULL, NULL, NULL, NULL),
(46, NULL, NULL, NULL, NULL),
(47, NULL, NULL, NULL, NULL),
(48, NULL, NULL, NULL, NULL),
(49, NULL, NULL, NULL, NULL),
(50, NULL, NULL, NULL, NULL),
(51, NULL, NULL, NULL, NULL),
(52, NULL, NULL, NULL, NULL),
(53, NULL, NULL, NULL, NULL),
(54, NULL, NULL, NULL, NULL),
(55, NULL, NULL, NULL, NULL),
(56, NULL, NULL, NULL, NULL),
(57, NULL, NULL, NULL, NULL),
(58, NULL, NULL, NULL, NULL),
(59, NULL, NULL, NULL, NULL),
(60, NULL, NULL, NULL, NULL),
(61, NULL, NULL, NULL, NULL),
(62, NULL, NULL, NULL, NULL),
(63, NULL, NULL, NULL, NULL),
(64, NULL, NULL, NULL, NULL),
(65, NULL, NULL, NULL, NULL),
(66, NULL, NULL, NULL, NULL),
(67, NULL, NULL, NULL, NULL),
(68, NULL, NULL, NULL, NULL),
(69, NULL, NULL, NULL, NULL),
(70, NULL, NULL, NULL, NULL),
(71, NULL, NULL, NULL, NULL),
(72, NULL, NULL, NULL, NULL),
(73, NULL, NULL, NULL, NULL),
(74, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `general_chat`
--

CREATE TABLE `general_chat` (
  `chatid` int(11) NOT NULL,
  `chat_room_id` int(11) DEFAULT NULL,
  `chat_msg` text DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `chat_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_chat`
--

INSERT INTO `general_chat` (`chatid`, `chat_room_id`, `chat_msg`, `username`, `chat_date`) VALUES
(15, 1, 'Hi', 'Tomas Maul', 'March 11, 2022 3:04:pm'),
(16, 1, 'Hello', 'KR Selvaraj', 'March 11, 2022 3:05:pm'),
(17, 2, 'This is Cs chat room', 'KR Selvaraj', 'March 11, 2022 3:05:pm');

-- --------------------------------------------------------

--
-- Table structure for table `monday timeslot`
--

CREATE TABLE `monday timeslot` (
  `appointment_id` int(11) NOT NULL,
  `timeslot1` varchar(255) DEFAULT NULL,
  `timeslot2` varchar(255) DEFAULT NULL,
  `timeslot3` varchar(255) DEFAULT NULL,
  `timeslot4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monday timeslot`
--

INSERT INTO `monday timeslot` (`appointment_id`, `timeslot1`, `timeslot2`, `timeslot3`, `timeslot4`) VALUES
(1, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL),
(3, '', NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL),
(13, NULL, NULL, NULL, NULL),
(14, NULL, NULL, NULL, NULL),
(15, NULL, NULL, NULL, NULL),
(16, NULL, NULL, NULL, NULL),
(17, NULL, NULL, NULL, NULL),
(18, NULL, NULL, NULL, NULL),
(19, NULL, NULL, NULL, NULL),
(20, NULL, NULL, NULL, NULL),
(21, NULL, NULL, NULL, NULL),
(22, NULL, NULL, NULL, NULL),
(23, NULL, NULL, NULL, NULL),
(24, NULL, NULL, NULL, NULL),
(25, NULL, NULL, NULL, NULL),
(26, NULL, NULL, NULL, NULL),
(27, NULL, NULL, NULL, NULL),
(28, NULL, NULL, NULL, NULL),
(29, NULL, NULL, NULL, NULL),
(30, NULL, NULL, NULL, NULL),
(31, 'Dania Imanina Binti Kamarul Bahrin', '', NULL, NULL),
(32, NULL, NULL, NULL, NULL),
(33, 'Choo Ming Ze', NULL, NULL, NULL),
(34, NULL, NULL, NULL, NULL),
(35, NULL, NULL, NULL, NULL),
(36, NULL, NULL, NULL, NULL),
(37, NULL, NULL, NULL, NULL),
(38, NULL, NULL, NULL, NULL),
(39, NULL, NULL, NULL, NULL),
(40, NULL, NULL, NULL, NULL),
(41, NULL, NULL, NULL, NULL),
(42, NULL, NULL, NULL, NULL),
(43, NULL, NULL, NULL, NULL),
(44, NULL, NULL, NULL, NULL),
(45, NULL, NULL, NULL, NULL),
(46, NULL, NULL, NULL, NULL),
(47, NULL, NULL, NULL, NULL),
(48, NULL, NULL, NULL, NULL),
(49, NULL, NULL, NULL, NULL),
(50, NULL, NULL, NULL, NULL),
(51, NULL, NULL, NULL, NULL),
(52, NULL, NULL, NULL, NULL),
(53, NULL, NULL, NULL, NULL),
(54, NULL, NULL, NULL, NULL),
(55, NULL, NULL, NULL, NULL),
(56, NULL, NULL, NULL, NULL),
(57, NULL, NULL, NULL, NULL),
(58, NULL, NULL, NULL, NULL),
(59, NULL, NULL, NULL, NULL),
(60, NULL, NULL, NULL, NULL),
(61, NULL, NULL, NULL, NULL),
(62, NULL, NULL, NULL, NULL),
(63, NULL, NULL, NULL, NULL),
(64, NULL, NULL, NULL, NULL),
(65, NULL, NULL, NULL, NULL),
(66, NULL, NULL, NULL, NULL),
(67, NULL, NULL, NULL, NULL),
(68, NULL, NULL, NULL, NULL),
(69, NULL, NULL, NULL, NULL),
(70, NULL, NULL, NULL, NULL),
(71, NULL, NULL, NULL, NULL),
(72, NULL, NULL, NULL, NULL),
(73, NULL, NULL, NULL, NULL),
(74, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE `remarks` (
  `Student Id` int(8) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Remarks` text NOT NULL,
  `Lect Id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `saturday timeslot`
--

CREATE TABLE `saturday timeslot` (
  `appointment_id` int(11) NOT NULL,
  `timeslot1` varchar(255) DEFAULT NULL,
  `timeslot2` varchar(255) DEFAULT NULL,
  `timeslot3` varchar(255) DEFAULT NULL,
  `timeslot4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saturday timeslot`
--

INSERT INTO `saturday timeslot` (`appointment_id`, `timeslot1`, `timeslot2`, `timeslot3`, `timeslot4`) VALUES
(1, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL),
(13, NULL, NULL, NULL, NULL),
(14, NULL, NULL, NULL, NULL),
(15, NULL, NULL, NULL, NULL),
(16, NULL, NULL, NULL, NULL),
(17, NULL, NULL, NULL, NULL),
(18, NULL, NULL, NULL, NULL),
(19, NULL, NULL, NULL, NULL),
(20, NULL, NULL, NULL, NULL),
(21, NULL, NULL, NULL, NULL),
(22, NULL, NULL, NULL, NULL),
(23, NULL, NULL, NULL, NULL),
(24, NULL, NULL, NULL, NULL),
(25, NULL, NULL, NULL, NULL),
(26, NULL, NULL, NULL, NULL),
(27, NULL, NULL, NULL, NULL),
(28, NULL, NULL, NULL, NULL),
(29, NULL, NULL, NULL, NULL),
(30, NULL, NULL, NULL, NULL),
(31, NULL, NULL, NULL, NULL),
(32, NULL, NULL, NULL, NULL),
(33, NULL, NULL, NULL, NULL),
(34, NULL, NULL, NULL, NULL),
(35, NULL, NULL, NULL, NULL),
(36, NULL, NULL, NULL, NULL),
(37, NULL, NULL, NULL, NULL),
(38, NULL, NULL, NULL, NULL),
(39, NULL, NULL, NULL, NULL),
(40, NULL, NULL, NULL, NULL),
(41, NULL, NULL, NULL, NULL),
(42, NULL, NULL, NULL, NULL),
(43, NULL, NULL, NULL, NULL),
(44, NULL, NULL, NULL, NULL),
(45, NULL, NULL, NULL, NULL),
(46, NULL, NULL, NULL, NULL),
(47, NULL, NULL, NULL, NULL),
(48, NULL, NULL, NULL, NULL),
(49, NULL, NULL, NULL, NULL),
(50, NULL, NULL, NULL, NULL),
(51, NULL, NULL, NULL, NULL),
(52, NULL, NULL, NULL, NULL),
(53, NULL, NULL, NULL, NULL),
(54, NULL, NULL, NULL, NULL),
(55, NULL, NULL, NULL, NULL),
(56, NULL, NULL, NULL, NULL),
(57, NULL, NULL, NULL, NULL),
(58, NULL, NULL, NULL, NULL),
(59, NULL, NULL, NULL, NULL),
(60, NULL, NULL, NULL, NULL),
(61, NULL, NULL, NULL, NULL),
(62, NULL, NULL, NULL, NULL),
(63, NULL, NULL, NULL, NULL),
(64, NULL, NULL, NULL, NULL),
(65, NULL, NULL, NULL, NULL),
(66, NULL, NULL, NULL, NULL),
(67, NULL, NULL, NULL, NULL),
(68, NULL, NULL, NULL, NULL),
(69, NULL, NULL, NULL, NULL),
(70, NULL, NULL, NULL, NULL),
(71, NULL, NULL, NULL, NULL),
(72, NULL, NULL, NULL, NULL),
(73, NULL, NULL, NULL, NULL),
(74, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `senior tutors`
--

CREATE TABLE `senior tutors` (
  `Lect ID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `senior tutors`
--

INSERT INTO `senior tutors` (`Lect ID`) VALUES
(50000001),
(50000004),
(50000007),
(50000010),
(50000013),
(50000016),
(50000019),
(50000022),
(50000025),
(50000028),
(50000031),
(50000042),
(50000045),
(50000048),
(50000051),
(50000054),
(50000057),
(50000060),
(50000063),
(50000066),
(50000069),
(50000072);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `Student Id` int(8) NOT NULL,
  `Full Name` varchar(50) DEFAULT NULL,
  `First Name` varchar(30) DEFAULT NULL,
  `Last Name` varchar(28) DEFAULT NULL,
  `Nationality` varchar(31) DEFAULT NULL,
  `Gender` varchar(6) DEFAULT NULL,
  `Academic Plan Code` varchar(10) DEFAULT NULL,
  `Intake` varchar(9) DEFAULT NULL,
  `Year of Entry (UG)` int(1) DEFAULT NULL,
  `Current Year` int(1) DEFAULT NULL,
  `Fnd 2-sem or 3-sem?` varchar(5) DEFAULT NULL,
  `New` varchar(11) DEFAULT NULL,
  `Level` varchar(21) DEFAULT NULL,
  `Email Address` varchar(33) DEFAULT NULL,
  `Registration Date` varchar(29) DEFAULT NULL,
  `Registered` varchar(7) DEFAULT NULL,
  `Remarks` varchar(59) DEFAULT NULL,
  `Remarks 2` varchar(51) DEFAULT NULL,
  `Tutor Id` int(8) NOT NULL,
  `Password` varchar(25) NOT NULL DEFAULT '0',
  `Personal Goals` varchar(145) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Student Id`, `Full Name`, `First Name`, `Last Name`, `Nationality`, `Gender`, `Academic Plan Code`, `Intake`, `Year of Entry (UG)`, `Current Year`, `Fnd 2-sem or 3-sem?`, `New`, `Level`, `Email Address`, `Registration Date`, `Registered`, `Remarks`, `Remarks 2`, `Tutor Id`, `Password`, `Personal Goals`) VALUES
(10268107, 'Dania Imanina Binti Kamarul Bahrin', 'Dania Imanina', 'Kamarul Bahrin', 'Malaysia', 'Female', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'efydk1@nottingham.edu.my', '7-Sep-19', 'Yes', '', '', 50000031, '1234', NULL),
(10268818, 'Wong Qing Joe', 'Qing Joe', 'Wong', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyqw1@nottingham.edu.my', '14-Sep-19', 'Yes', '', '', 50000038, '1234', NULL),
(10280587, 'Yap,Uen Hsieh', 'Uen Hsieh', 'Yap', 'Malaysia', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyuy1@nottingham.edu.my', '8-Sep-19', 'Yes', '', '', 50000032, '1234', NULL),
(10286955, 'Mariyam Imtha Shafeeu', 'Mariyam Imtha', 'Shafeeu', 'Maldives', 'Female', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyms2@nottingham.edu.my', '7-Sep-19', 'Yes', '', '', 50000031, '1234', NULL),
(10342346, 'Lau Yu Xuan', 'Yu Xuan', 'Lau', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyyl3@nottingham.edu.my', '7-Sep-19', 'Yes', '', '', 50000031, '1234', NULL),
(18024817, 'Rusli,Aiman Naim', 'Aiman Naim', 'Rusli', 'Malaysia', 'Male', 'M6USWENG', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'kefey6anr@nottingham.edu.my', '15-Sep-19', 'Yes', '', '', 50000039, '1234', NULL),
(18025557, 'Ismail Amaan', 'Ismail', 'Amaan', 'Maldives', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'kefey6iaa@nottingham.edu.my', '17-Sep-19', 'Yes', '', '', 50000041, '1234', NULL),
(20006742, 'Kugan Reddy A/L Nadaraja', 'Kugan Reddy', 'Nadaraja', 'Malaysia', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcykn2@nottingham.edu.my', '13-Sep-19', 'Yes', '', '', 50000037, '1234', NULL),
(20012508, 'Foo Yao Chong ', 'Yao Chong', 'Foo', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'efyyf1@nottingham.edu.my', '16-Sep-19', 'Yes', '', '', 50000040, '1234', NULL),
(20012708, 'Ismail,Ahmad Nabil', 'Ahmad Nabil', 'Ismail', 'Malaysia', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyai1@nottingham.edu.my', '14-Sep-19', 'Yes', '', '', 50000038, '1234', NULL),
(20012961, 'Shim,Bryan Sze Siang', 'Bryan Sze Siang', 'Shim', 'Malaysia', 'Male', 'M6USWENG', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'efybs1@nottingham.edu.my', '13-Sep-19', 'Yes', '', '', 50000037, '1234', NULL),
(20040136, 'Chong,Nicholas Wei Chen', 'Nicholas', 'Chong', 'Malaysia', 'Male', 'M6USWENG', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfync1@nottingham.edu.my', '14-Sep-19', 'Yes', '', '', 50000038, '1234', NULL),
(20050927, 'Elsaid,Salma Tamer Fathy Ahmed', 'Salma Tamer Fathy Ahmed', 'Elsaid', 'Egypt', 'Female', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'test@nottingham.edu.my', '7-Sep-19', 'Yes', '', '', 50000031, '1234', 'Pass Se'),
(20052342, 'Wan Hanna Monisha Binti Wan Nurnizam', 'Wan Hanna Monisha', 'Wan Nurnizam', 'Malaysia', 'Female', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfww1@nottingham.edu.my', '7-Sep-19', 'Yes', '', '', 50000031, '1234', NULL),
(20063426, 'Khaled Alazem', 'Khaled', 'Alazem', 'Syrian Arab Republic', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'ecyka1@nottingham.edu.my', '17-Sep-19', 'Yes', '', '', 50000041, '1234', NULL),
(20063592, 'Nik Nufayl Daniel Bin Md Nezam', 'Nik Nufayl Daniel', 'Md Nezam', 'Malaysia', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfynm7@nottingham.edu.my', '15-Sep-19', 'Yes', '', '', 50000039, '1234', NULL),
(20082200, 'Lim,Xin Jieh', 'Xin Jieh', 'Lim', 'Malaysia', 'Female', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyxl2@nottingham.edu.my', '15-Sep-19', 'Yes', '', '', 50000039, '1234', NULL),
(20089417, 'Khor Yong Teng', 'Yong Teng', 'Khor', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyyk4@nottingham.edu.my', '7-Sep-19', 'Yes', '', '', 50000031, '1234', NULL),
(20089930, 'Hashem Mohammad Sami Elbiali', 'Hashem Mohammad Sami', 'Elbiali', 'Egypt', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyhe1@nottingham.edu.my', '16-Sep-19', 'Yes', '', '', 50000040, '1234', NULL),
(20090325, 'Liew Yih Seng', 'Yih Seng', 'Liew', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyyl2@nottingham.edu.my', '15-Sep-19', 'Yes', '', '', 50000039, '1234', NULL),
(20093715, 'Goh Xin Yee', 'Xin Yee', 'Goh', 'Malaysia', 'Female', 'M6USWENG', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'sfyxg1@nottingham.edu.my', '16-Sep-19', 'Yes', '', '', 50000040, '1234', NULL),
(20102358, 'Fu, Zijie', 'Zijie', 'Fu', 'China', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyzf1@nottingham.edu.my', '7-Sep-19', 'Yes', '', '', 50000031, '1234', NULL),
(20102664, 'Saha,Amit', 'Amit', 'Saha', 'Bangladesh', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyas3@nottingham.edu.my', '14-Sep-19', 'Yes', '', '', 50000038, '1234', NULL),
(20104414, 'Lim Yen Kai', 'Yen Kai', 'Lim', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyyl3@nottingham.edu.my', '7-Sep-19', 'Yes', '', '', 50000031, '1234', NULL),
(20105227, 'Goh Jia Hui', 'Jia Hui', 'Goh', 'Malaysia', 'Female', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyjg1@nottingham.edu.my', '7-Sep-19', 'Yes', '', '', 50000031, '1234', NULL),
(20105560, 'Fadl,Karim Ahmed Safieldin', 'Karim Ahmed Safieldin', 'Fadl', 'Egypt', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfykf1@nottingham.edu.my', '7-Sep-19', 'Yes', '', '', 50000031, '1234', NULL),
(20105652, 'Sham Maatouk', 'Sham', 'Maatouk', 'Syria', 'Female', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfysm2@nottingham.edu.my', '16-Sep-19', 'Yes', '', '', 50000040, '1234', NULL),
(20106684, 'Yong Zi Li', 'Zi Li', 'Yong', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyzy2@nottingham.edu.my', '7-Sep-19', 'Yes', '', '', 50000031, '1234', NULL),
(20107125, 'Ng Yao Hong', 'Yao Hong', 'Ng', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'efyyn2@nottingham.edu.my', '7-Sep-19', 'Yes', '', '', 50000031, '1234', NULL),
(20107338, 'Cham Jin Sheng', 'Jin Sheng', 'Cham', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyjc7@nottingham.edu.my', '7-Sep-19', 'Yes', '', '', 50000031, '1234', NULL),
(20108211, 'Tan Fan Hwa', 'Fan Hwa', 'Tan', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'sayft1@nottingham.edu.my', '8-Sep-19', 'Yes', '', '', 50000032, '1234', NULL),
(20108472, 'Rahizan,Shahril Ameerul Ashraf', 'Shahril Ameerul Ashraf', 'Rahizan', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfysr3@nottingham.edu.my', '15-Sep-19', 'Yes', '', '', 50000039, '1234', NULL),
(20109354, 'Chung,Hao Xian', 'Hao Xian', 'Chung', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyhc1@nottingham.edu.my', '15-Sep-19', 'Yes', '', '', 50000039, '1234', NULL),
(20111857, 'Lee Shun Mei', 'Shun Mei', 'Lee', 'Malaysia', 'Female', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'saysl9@nottingham.edu.my', '8-Sep-19', 'Yes', '', '', 50000032, '1234', NULL),
(20112394, 'Kuah Min Yei', 'Min Yei', 'Kuah', 'Malaysia', 'Female', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfymk1@nottingham.edu.my', '8-Sep-19', 'Yes', '', '', 50000032, '1234', NULL),
(20112612, 'Chua Sung Hui', 'Sung Hui', 'Chua', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'efysc4@nottingham.edu.my', '16-Sep-19', 'Yes', '', '', 50000040, '1234', NULL),
(20113100, 'Brendan Nicholas Sia Cheong Hui', 'Brendan Nicholas', 'Sia Cheong Hui', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfybs1@nottingham.edu.my', '8-Sep-19', 'Yes', '', '', 50000032, '1234', NULL),
(20113421, 'Erin Soraya Binti Ruslan', 'Erin Soraya', 'Ruslan', 'Malaysia', 'Female', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyer1@nottingham.edu.my', '8-Sep-19', 'Yes', '', '', 50000032, '1234', NULL),
(20113422, 'Chang Hoe Tyng', 'Hoe Tyng', 'Chang', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyhc1@nottingham.edu.my', '8-Sep-19', 'Yes', '', '', 50000032, '1234', NULL),
(20113424, 'Tey Kai Jun', 'Kai Jun', 'Tey', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfykt6@nottingham.edu.my', '8-Sep-19', 'Yes', '', '', 50000032, '1234', NULL),
(20113450, 'Cheok Jun Yang', 'Jun Yang', 'Cheok', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyjc8@nottingham.edu.my', '8-Sep-19', 'Yes', '', '', 50000032, '1234', NULL),
(20113472, 'Ganesan,Darmesh', 'Darmesh', 'Ganesan', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfydg1@nottingham.edu.my', '15-Sep-19', 'Yes', '', '', 50000039, '1234', NULL),
(20113477, 'Koh Ze Wei', 'Ze Wei', 'Koh', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyzk3@nottingham.edu.my', '8-Sep-19', 'Yes', '', '', 50000032, '1234', NULL),
(20113480, 'Yap,J-Shyne', 'J-Shyne', 'Yap', 'Malaysia', 'Female', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyjy2@nottingham.edu.my', '16-Sep-19', 'Yes', '', '', 50000040, '1234', NULL),
(20113536, 'Gan E-Shen', 'E-Shen', 'Gan', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyeg2@nottingham.edu.my', '8-Sep-19', 'Yes', '', '', 50000032, '1234', NULL),
(20113553, 'Lim Zhen Wen', 'Zhen Wen', 'Lim', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyzl3@nottingham.edu.my', '8-Sep-19', 'Yes', '', '', 50000032, '1234', NULL),
(20113589, 'Chew Boon Zhan', 'Boon Zhan', 'Chew', 'Malaysia', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfycb1@nottingham.edu.my', '8-Sep-19', 'Yes', '', '', 50000032, '1234', NULL),
(20113626, 'Choo Ming Ze', 'Ming Ze', 'Choo', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfymc4@nottingham.edu.my', '9-Sep-19', 'Yes', '', '', 50000033, '1234', NULL),
(20113634, 'Norman Shaqir Bin Shariran', 'Norman Shaqir', 'Shariran', 'Malaysia', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyns3@nottingham.edu.my', '9-Sep-19', 'Yes', '', '', 50000033, '1234', NULL),
(20113641, 'Muhammad Fayyadh Bin Azrin', 'Muhammad Fayyadh', 'Azrin', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyma6@nottingham.edu.my', '12-Sep-19', 'Yes', '', '', 50000036, '1234', NULL),
(20113642, 'Pang Cheng Han', 'Cheng Han', 'Pang', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfycp1@nottingham.edu.my', '9-Sep-19', 'Yes', '', '', 50000033, '1234', NULL),
(20113659, 'Norazharuddin,Damia', 'Damia', 'Norazharuddin', 'Malaysia', 'Female', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfydn1@nottingham.edu.my', '15-Sep-19', 'Yes', '', '', 50000039, '1234', NULL),
(20113681, 'Chai Wen Jye', 'Wen Jye', 'Chai', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfywc5@nottingham.edu.my', '9-Sep-19', 'Yes', '', '', 50000033, '1234', NULL),
(20113717, 'Grigoriy Kirpa', 'Grigoriy', 'Kirpa', 'Turkmenistan', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfygk1@nottingham.edu.my', '9-Sep-19', 'Yes', '', '', 50000033, '1234', NULL),
(20114122, 'Teo Filson', 'Filson', 'Teo', 'Malaysia', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyft1@nottingham.edu.my', '9-Sep-19', 'Yes', '', '', 50000033, '1234', NULL),
(20114148, 'Arielle Alessandra Liaw', 'Arielle Alessandra', 'Liaw', 'Malaysia', 'Female', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyal1@nottingham.edu.my', '9-Sep-19', 'Yes', '', '', 50000033, '1234', NULL),
(20114279, 'Neng,Zhen Yii', 'Zhen Yii', 'Neng', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyzn2@nottingham.edu.my', '15-Sep-19', 'Yes', '', '', 50000039, '1234', NULL),
(20115077, 'Hania Mubasher', 'Hania', 'Mubasher', 'Pakistan (Refugee)', 'Female', 'M6USWENG', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyhm4@nottingham.edu.my', '17-Sep-19', 'Yes', '', '', 50000041, '1234', NULL),
(20115147, 'Marcus Wong J-Fatt', 'Marcus', 'Wong', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfymw1@nottingham.edu.my', '10-Sep-19', 'Yes', '', '', 50000034, '1234', NULL),
(20115275, 'Joshua Ryan Koh Yiew', 'Joshua', 'Ryan', 'Malaysia', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'edyjk1@nottingham.edu.my', '9-Sep-19', 'Yes', '', '', 50000033, '1234', NULL),
(20115811, 'Soh Kai Xuan', 'Kai Xuan', 'Soh', 'Malaysia', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyks3@nottingham.edu.my', '9-Sep-19', 'Yes', '', '', 50000033, '1234', NULL),
(20116042, 'Mohamad Arif Bin Mohamed Abu Baker', 'Mohamad Arif', 'Mohamed Abu Baker', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfymm5@nottingham.edu.my', '9-Sep-19', 'Yes', '', '', 50000033, '1234', NULL),
(20116065, 'Muhammad Fikri Bin Mohd Roslee', 'Muhammad Fikri', 'Mohd Roslee', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfymm4@nottingham.edu.my', '9-Sep-19', 'Yes', '', '', 50000033, '1234', NULL),
(20116099, 'Haffz Shawer,Khaled Mohamed Hussein', 'Khaled Mohamed Hussein', 'Haffz Shawer', 'Egypt', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'efykh1@nottingham.edu.my', '12-Sep-19', 'Yes', '', '', 50000036, '1234', NULL),
(20116154, 'Yousef Mohamad Ebrahim Abdelshafy Ebrahim', 'Yousef Mohamad Ebrahim', 'Abdelshafy Ebrahim', 'Egypt', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyya2@nottingham.edu.my', '14-Sep-19', 'Yes', '', '', 50000038, '1234', NULL),
(20118385, 'Goh,Jiun Ming', 'Jiun Ming', 'Goh', 'Malaysia', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyjg3@nottingham.edu.my', '12-Sep-19', 'Yes', '', '', 50000036, '1234', NULL),
(20118680, 'Lee Jiaxin', 'Jiaxin', 'Lee', 'Malaysia', 'Female', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'sayjl12@nottingham.edu.my', '9-Sep-19', 'Yes', '', '', 50000033, '1234', NULL),
(20118741, 'Celia Lim Ern Yin', 'Celia', 'Lim', 'Malaysia', 'Female', 'M6USWENG', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfycl2@nottingham.edu.my', '9-Sep-19', 'Yes', '', '', 50000033, '1234', NULL),
(20119146, 'Shi, Monan', 'Monan', 'Shi', 'China', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyms3@nottingham.edu.my', '13-Sep-19', 'Yes', '', '', 50000037, '1234', NULL),
(20119209, 'Siti Nur\'Aina Binti Norzafri', 'Siti Nur\'Aina', 'Norzafri', 'Malaysia', 'Female', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfysn2@nottingham.edu.my', '10-Sep-19', 'Yes', '', '', 50000034, '1234', NULL),
(20119350, 'Imran Ho,Daud Syahiran Ho', 'Daud Syahiran Ho', 'Imran Ho', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfydi1@nottingham.edu.my', '15-Sep-19', 'Yes', '', '', 50000039, '1234', NULL),
(20119422, 'Guan, Xusen', 'Xusen', 'Guan', 'China', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyxg1@nottingham.edu.my', '10-Sep-19', 'Yes', '', '', 50000034, '1234', NULL),
(20120114, 'Dina Zhamash', 'Dina', 'Zhamash', 'Kazakhstan', 'Female', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfydz1@nottingham.edu.my', '9-Sep-19', 'Yes', '', '', 50000033, '1234', NULL),
(20120791, 'Muhammad Salman Malik', 'Muhammad Salman', 'Malik', 'Pakistan', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcymm2@nottingham.edu.my', '10-Sep-19', 'Yes', '', '', 50000034, '1234', NULL),
(20121143, 'Alvin Chaidrata', 'Alvin', 'Chaidrata', 'Indonesia', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyac1@nottingham.edu.my', '14-Sep-19', 'Yes', '', '', 50000038, '1234', NULL),
(20122166, 'Lee Kin Yip', 'Kin Yip', 'Lee', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfykl7@nottingham.edu.my', '10-Sep-19', 'Yes', '', '', 50000034, '1234', NULL),
(20123697, 'Noah Christophe Rijkaard', 'Noah Christophe', 'Rijkaard', 'Netherlands', 'Male', 'M6USWENG', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfynr3@nottingham.edu.my', '16-Sep-19', 'Yes', '', '', 50000040, '1234', NULL),
(20124376, 'Muhammad Asri,Adriana Sofiya', 'Adriana Sofiya', 'Muhammad Asri', 'Malaysia', 'Female', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyam2@nottingham.edu.my', '8-Sep-19', 'Yes', '', '', 50000032, '1234', NULL),
(20125427, 'Lee Hui Fang', 'Hui Fang', 'Lee', 'Malaysia', 'Female', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyhl2@nottingham.edu.my', '10-Sep-19', 'Yes', '', '', 50000034, '1234', NULL),
(20125502, 'Lee,Marc Jarrod', 'Marc Jarrod', 'Lee', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyml4@nottingham.edu.my', '15-Sep-19', 'Yes', '', '', 50000039, '1234', NULL),
(20127448, 'Gabriel Quek', 'Gabriel', 'Quek', 'Malaysia', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'efygq1@nottingham.edu.my', '7-Sep-19', 'Yes', '', '', 50000031, '1234', NULL),
(20127579, 'Danial Eizlan Bin Daud ', 'Danial Eizlan', 'Daud', 'Malaysia', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'edydd2@nottingham.edu.my', '7-Sep-19', 'Yes', '', '', 50000031, '1234', NULL),
(20128258, 'Keshminder Singh,Keebir Hansraj Singh Gill', 'Keebir Hansraj Singh Gill', 'Keshminder Singh', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfykk3@nottingham.edu.my', '15-Sep-19', 'Yes', '', '', 50000039, '1234', NULL),
(20128775, 'Linghesh A/L K. Ravichandran', 'Linghesh', 'K. Ravichandran', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfylk2@nottingham.edu.my', '10-Sep-19', 'Yes', '', '', 50000034, '1234', NULL),
(20128804, 'Chee Han Lin', 'Han Lin', 'Chee', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyhc2@nottingham.edu.my', '14-Sep-19', 'Yes', '', '', 50000038, '1234', NULL),
(20129063, 'Mohammad Ridzuan,Nurul Syahadah', 'Nurul Syahadah', 'Mohammad Ridzuan', 'Malaysia', 'Female', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'efynm1@nottingham.edu.my', '15-Sep-19', 'Yes', '', '', 50000039, '1234', NULL),
(20129374, 'Law,Khye Yueh', 'Khye Yueh', 'Law', 'Malaysia', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfykl8@nottingham.edu.my', '7-Sep-19', 'Yes', '', '', 50000031, '1234', NULL),
(20129377, 'Lee Ren Jin', 'Ren Jin', 'Lee', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hfyrl2@nottingham.edu.my', '10-Sep-19', 'Yes', '', '', 50000034, '1234', NULL),
(20150707, 'Ang Jia Hau', 'Jia Hau', 'Ang', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyja1@nottingham.edu.my', '10-Sep-19', 'Yes', '', '', 50000034, '1234', NULL),
(20183717, 'Teo Shi Bin', 'Shi Bin', 'Teo', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyst2@nottingham.edu.my', '10-Sep-19', 'Yes', '', '', 50000034, '1234', NULL),
(20186070, 'Sii Her Sheng', 'Her Seng', 'Sii', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyhs2@nottingham.edu.my', '10-Sep-19', 'Yes', '', '', 50000034, '1234', NULL),
(20187029, 'Syed Muhammad Hassan Zaidi', 'Syed Muhammad Hassan', 'Zaidi', 'Pakistan', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcysz1@nottingham.edu.my', '11-Sep-19', 'Yes', '', '', 50000035, '1234', NULL),
(20187945, 'Malvi Suresh Bid', 'Malvi', 'Suresh Bid', 'Kenya', 'Female', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcymb2@nottingham.edu.my', '11-Sep-19', 'Yes', '', '', 50000035, '1234', NULL),
(20194491, 'Steven Ho Chu Leong', 'Steven', 'Ho', 'Malaysia', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcysh2@nottingham.edu.my', '11-Sep-19', 'Yes', '', '', 50000035, '1234', NULL),
(20194531, 'Ooi Han Wei', 'Han Wei', 'Ooi', 'Malaysia', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyho1@nottingham.edu.my', '11-Sep-19', 'Yes', '', '', 50000035, '1234', NULL),
(20194664, 'Loh Qian Kai', 'Qian Kai', 'Loh', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyql1@nottingham.edu.my', '11-Sep-19', 'Yes', '', '', 50000035, '1234', NULL),
(20197749, 'Ock Ju Won', 'Ju Won', 'Ock', 'Korea', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyjo2@nottingham.edu.my', '11-Sep-19', 'Yes', '', '', 50000035, '1234', NULL),
(20198566, 'Lim Yi Yong', 'Yi Yong', 'Lim', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyyl4@nottingham.edu.my', '11-Sep-19', 'Yes', '', '', 50000035, '1234', NULL),
(20201895, 'Chin Yaw Hon', 'Yaw Hon', 'Chin', 'Malaysia', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyyc3@nottingham.edu.my', '11-Sep-19', 'Yes', '', '', 50000035, '1234', NULL),
(20203983, 'Ng Jun Hui', 'Jun Hui', 'Ng', 'Malaysia', 'Male', 'M6USWENG', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyjn1@nottingham.edu.my', '11-Sep-19', 'Yes', '', '', 50000035, '1234', NULL),
(20204134, 'Chuang Caleb', 'Caleb', 'Chuang', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcycc2@nottingham.edu.my', '13-Sep-19', 'Yes', '', '', 50000037, '1234', NULL),
(20204780, 'Kong Soon Ing', 'Soon Ing', 'Kong', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcysk1@nottingham.edu.my', '11-Sep-19', 'Yes', '', '', 50000035, '1234', NULL),
(20204972, 'Lim Zhi Xin', 'Zhi Xin', 'Lim', 'Malaysia', 'Female', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hpyzl1@nottingham.edu.my', '8-Sep-19', 'Yes', '', '', 50000032, '1234', NULL),
(20205163, 'Abhinav George Basil', 'Abhinav', 'Basil', 'India', 'Male', 'M6USWENG', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyab2@nottingham.edu.my', '11-Sep-19', 'Yes', '', '', 50000035, '1234', NULL),
(20206025, 'Yeoh Wei En', 'Wei En', 'Yeoh', 'Malaysia', 'Female', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcywy2@nottingham.edu.my', '12-Sep-19', 'Yes', '', '', 50000036, '1234', NULL),
(20208420, 'Khor Yoong Joo', 'Yoong Joo', 'Khor', 'Malaysia', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyyk1@nottingham.edu.my', '12-Sep-19', 'Yes', '', '', 50000036, '1234', NULL),
(20208621, 'Rahul Sharma Yuddhishthir-Gopaul', 'Rahul Sharma', 'Yuddhishthir-Gopaul', 'Mauritius', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyry1@nottingham.edu.my', '12-Sep-19', 'Yes', '', '', 50000036, '1234', NULL),
(20209307, 'Chevalier Tan Ga Foo', 'Chevalier', 'Tan', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyct3@nottingham.edu.my', '13-Sep-19', 'Yes', '', '', 50000037, '1234', NULL),
(20209463, 'Gilbert Valentino', 'Gilbert', 'Valentino', 'Indonesia', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcygv1@nottingham.edu.my', '14-Sep-19', 'Yes', '', '', 50000038, '1234', NULL),
(20210392, 'Ong Kwang Xi', 'Kwang Xi', 'Ong', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyko2@nottingham.edu.my', '16-Sep-19', 'Yes', '', '', 50000040, '1234', NULL),
(20210406, 'Keitaro Mirakel Wongso', 'Keitaro Mirakel', 'Wongso', 'Indonesia', 'Male', 'M6USWENG', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcykw2@nottingham.edu.my', '12-Sep-19', 'Yes', '', '', 50000036, '1234', NULL),
(20210654, 'How Khai Chuin', 'Khai Chuin', 'How', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcykh1@nottingham.edu.my', '12-Sep-19', 'Yes', '', '', 50000036, '1234', NULL),
(20211487, 'Soh Jing Shun', 'Jing Shun', 'Soh', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyjs2@nottingham.edu.my', '12-Sep-19', 'Yes', '', '', 50000036, '1234', NULL),
(20211830, 'Ng Jiun Loong', 'Jiun Loong', 'Ng', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyjn2@nottingham.edu.my', '12-Sep-19', 'Yes', '', '', 50000036, '1234', NULL),
(20211968, 'Sneha Lata Umrit', 'Sneha Lata', 'Umrit', 'Mauritius', 'Female', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcysu1@nottingham.edu.my', '12-Sep-19', 'Yes', '', '', 50000036, '1234', NULL),
(20212058, 'Jong Yen Shuang @ Ye Xian', 'Yen Shuang', 'Jong', 'Malaysia', 'Female', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyyj1@nottingham.edu.my', '16-Sep-19', 'Yes', '', '', 50000040, '1234', NULL),
(20212747, 'Sohail Shabir Pyarali Rashid', 'Sohail Shabir', 'Pyarali Rashid', 'Tanzania', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcysr1@nottingham.edu.my', '16-Sep-19', 'Yes', '', '', 50000040, '1234', NULL),
(20212765, 'Alya Amirah Binti Muhammad Saufee', 'Alya Amirah', 'Muhammad Saufee', 'Malaysia', 'Female', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyam2@nottingham.edu.my', '12-Sep-19', 'Yes', '', '', 50000036, '1234', NULL),
(20213131, 'Sharfa Dhamin', 'Sharfa', 'Dhamin', 'Bangladesh', 'Female', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcysd1@nottingham.edu.my', '11-Sep-19', 'Yes', '', '', 50000035, '1234', NULL),
(20214054, 'Mohanad Omar Mostafa Abotaleb', 'Mohanad Omar', 'Mostafa Abotaleb', 'Egypt', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyma4@nottingham.edu.my', '13-Sep-19', 'Yes', '', '', 50000037, '1234', NULL),
(20214560, 'Chin Jun Yuan', 'Jun Yuan', 'Chin', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyjc6@nottingham.edu.mu', '13-Sep-19', 'Yes', '', '', 50000037, '1234', NULL),
(20215180, 'Lim Junette', 'Junette', 'Lim', 'Malaysia', 'Female', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyjl4@nottingham.edu.my', '14-Sep-19', 'Yes', '', '', 50000038, '1234', NULL),
(20215979, 'Tan Hau Yatt', 'Hau Yatt', 'Tan', 'Malaysia', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyht1@nottingham.edu.my', '14-Sep-19', 'Yes', '', '', 50000038, '1234', NULL),
(20217623, 'Low Yi Xuan', 'Yi Xuan', 'Low', 'Malaysia', 'Female', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyyl6@nottingham.edu.my', '11-Sep-19', 'Yes', '', '', 50000035, '1234', NULL),
(20217678, 'Chiam Camy', 'Camy', 'Chiam', 'Malaysia', 'Female', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcycc1@nottingham.edu.my', '13-Sep-19', 'Yes', '', '', 50000037, '1234', NULL),
(20218680, 'Yoo Yen Yi', 'Yen Yi', 'Yoo', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyyy1@nottingham.edu.my', '13-Sep-19', 'Yes', '', '', 50000037, '1234', NULL),
(20218707, 'Kelvin Goh Jin Jiet', 'Kelvin', 'Goh', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcykg2@nottingham.edu.my', '13-Sep-19', 'Yes', '', '', 50000037, '1234', NULL),
(20218845, 'Lee,Kai En', 'Kai En', 'Lee', 'Malaysia', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcykl5@nottingham.edu.my', '16-Sep-19', 'Yes', '', '', 50000040, '1234', NULL),
(20218985, 'Faith New Xin Yue', 'Faith', 'New', 'Malaysia', 'Female', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyfn1@nottingham.edu.my', '14-Sep-19', 'Yes', '', '', 50000038, '1234', NULL),
(20218995, 'Cheong Beng Chuan', 'Beng Chuan', 'Cheong', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcybc1@nottingham.edu.my', '14-Sep-19', 'Yes', '', '', 50000038, '1234', NULL),
(20219279, 'Ng,Kai Wen', 'Kai Wen', 'Ng', 'Malaysia', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcykn3@nottingham.edu.my', '16-Sep-19', 'Yes', '', '', 50000040, '1234', NULL),
(20219480, 'Ng Yi Kai', 'Yi Kai', 'Ng', 'Malaysia', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyyn1@nottingham.edu.my', '14-Sep-19', 'Yes', '', '', 50000038, '1234', NULL),
(20219534, 'Wang Yee Xuan', 'Yee Xuan', 'Wang', 'Malaysia', 'Male', 'M6UCMPSC', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyyw1@nottingham.edu.my', '14-Sep-19', 'Yes', '', '', 50000038, '1234', NULL),
(20219680, 'Chua,Xin Hui', 'Xin Hui', 'Chua', 'Malaysia', 'Female', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcyxc1@nottingham.edu.my', '16-Sep-19', 'Yes', '', '', 50000040, '1234', NULL),
(20220036, 'Ahmad Rosehaizat,Syed Ahmad Azhad', 'Syed Ahmad Azhad', 'Ahmad Rosehaizat', 'Malaysia', 'Male', 'M6UCMPAI', '2019 / 09', 1, 2, '', 'Progressing', 'Undergraduate', 'hcysa2@nottingham.edu.my', '16-Sep-19', 'Yes', '', '', 50000040, '1234', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sunday timeslot`
--

CREATE TABLE `sunday timeslot` (
  `appointment_id` int(11) NOT NULL,
  `timeslot1` varchar(255) DEFAULT NULL,
  `timeslot2` varchar(255) DEFAULT NULL,
  `timeslot3` varchar(255) DEFAULT NULL,
  `timeslot4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sunday timeslot`
--

INSERT INTO `sunday timeslot` (`appointment_id`, `timeslot1`, `timeslot2`, `timeslot3`, `timeslot4`) VALUES
(1, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL),
(13, NULL, NULL, NULL, NULL),
(14, NULL, NULL, NULL, NULL),
(15, NULL, NULL, NULL, NULL),
(16, NULL, NULL, NULL, NULL),
(17, NULL, NULL, NULL, NULL),
(18, NULL, NULL, NULL, NULL),
(19, NULL, NULL, NULL, NULL),
(20, NULL, NULL, NULL, NULL),
(21, NULL, NULL, NULL, NULL),
(22, NULL, NULL, NULL, NULL),
(23, NULL, NULL, NULL, NULL),
(24, NULL, NULL, NULL, NULL),
(25, NULL, NULL, NULL, NULL),
(26, NULL, NULL, NULL, NULL),
(27, NULL, NULL, NULL, NULL),
(28, NULL, NULL, NULL, NULL),
(29, NULL, NULL, NULL, NULL),
(30, NULL, NULL, NULL, NULL),
(31, NULL, NULL, NULL, NULL),
(32, NULL, NULL, NULL, NULL),
(33, NULL, NULL, NULL, NULL),
(34, NULL, NULL, NULL, NULL),
(35, NULL, NULL, NULL, NULL),
(36, NULL, NULL, NULL, NULL),
(37, NULL, NULL, NULL, NULL),
(38, NULL, NULL, NULL, NULL),
(39, NULL, NULL, NULL, NULL),
(40, NULL, NULL, NULL, NULL),
(41, NULL, NULL, NULL, NULL),
(42, NULL, NULL, NULL, NULL),
(43, NULL, NULL, NULL, NULL),
(44, NULL, NULL, NULL, NULL),
(45, NULL, NULL, NULL, NULL),
(46, NULL, NULL, NULL, NULL),
(47, NULL, NULL, NULL, NULL),
(48, NULL, NULL, NULL, NULL),
(49, NULL, NULL, NULL, NULL),
(50, NULL, NULL, NULL, NULL),
(51, NULL, NULL, NULL, NULL),
(52, NULL, NULL, NULL, NULL),
(53, NULL, NULL, NULL, NULL),
(54, NULL, NULL, NULL, NULL),
(55, NULL, NULL, NULL, NULL),
(56, NULL, NULL, NULL, NULL),
(57, NULL, NULL, NULL, NULL),
(58, NULL, NULL, NULL, NULL),
(59, NULL, NULL, NULL, NULL),
(60, NULL, NULL, NULL, NULL),
(61, NULL, NULL, NULL, NULL),
(62, NULL, NULL, NULL, NULL),
(63, NULL, NULL, NULL, NULL),
(64, NULL, NULL, NULL, NULL),
(65, NULL, NULL, NULL, NULL),
(66, NULL, NULL, NULL, NULL),
(67, NULL, NULL, NULL, NULL),
(68, NULL, NULL, NULL, NULL),
(69, NULL, NULL, NULL, NULL),
(70, NULL, NULL, NULL, NULL),
(71, NULL, NULL, NULL, NULL),
(72, NULL, NULL, NULL, NULL),
(73, NULL, NULL, NULL, NULL),
(74, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `Lect ID` int(8) NOT NULL,
  `task` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `Lect ID`, `task`, `status`) VALUES
(16, 0, 'Get a job', '');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `Student Id` int(8) DEFAULT NULL,
  `Full Name` varchar(50) DEFAULT NULL,
  `First Name` varchar(30) DEFAULT NULL,
  `Last Name` varchar(28) DEFAULT NULL,
  `Nationality` varchar(31) DEFAULT NULL,
  `Gender` varchar(6) DEFAULT NULL,
  `Academic Plan Code` varchar(10) DEFAULT NULL,
  `Intake` varchar(9) DEFAULT NULL,
  `Year of Entry (UG)` int(1) DEFAULT NULL,
  `Fnd 2-sem or 3-sem?` varchar(5) DEFAULT NULL,
  `New / Progressing` varchar(11) DEFAULT NULL,
  `Level` varchar(21) DEFAULT NULL,
  `Email Address` varchar(33) DEFAULT NULL,
  `Registration Date` varchar(29) DEFAULT NULL,
  `Registered` varchar(7) DEFAULT NULL,
  `Remarks` varchar(59) DEFAULT NULL,
  `Remarks 2` varchar(51) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tempemails`
--

CREATE TABLE `tempemails` (
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `LECTID` int(11) NOT NULL,
  `office` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tempemails`
--

INSERT INTO `tempemails` (`email`, `LECTID`, `office`) VALUES
('addie.schoen@nottingham.edu.my', 20000001, 'BB20'),
('alexzander81@nottingham.edu.my', 20000002, 'BB21'),
('alia90@nottingham.edu.my', 20000003, 'BB22'),
('amiya.koss@nottingham.edu.my', 20000004, 'BB23'),
('annalise91@nottingham.edu.my', 20000005, 'BB24'),
('aric56@nottingham.edu.my', 20000006, 'BB25'),
('arno85@nottingham.edu.my', 20000007, 'BB26'),
('brannon27@nottingham.edu.my', 20000008, 'BB27'),
('brekke.fredrick@nottingham.edu.my', 20000009, 'BB28'),
('chaim93@nottingham.edu.my', 20000010, 'BB29'),
('crist.paolo@nottingham.edu.my', 20000011, 'BB30'),
('d\'amore.johnny@nottingham.edu.my', 20000012, 'CB20'),
('deshaun.kunde@nottingham.edu.my', 20000013, 'CB21'),
('dominic.boyer@nottingham.edu.my', 20000014, 'CB22'),
('douglas.spencer@nottingham.edu.my', 20000015, 'CB23'),
('ebony.skiles@nottingham.edu.my', 20000016, 'CB24'),
('ehomenick@nottingham.edu.my', 20000017, 'CB25'),
('elwin.koepp@nottingham.edu.my', 20000018, 'CB26'),
('ericka.brakus@nottingham.edu.my', 20000019, 'CB27'),
('hagenes.crawford@nottingham.edu.my', 20000020, 'CB28'),
('haven.collier@nottingham.edu.my', 20000021, 'CB29'),
('hector47@nottingham.edu.my', 20000022, 'CB30'),
('houston95@nottingham.edu.my', 20000023, 'DB20'),
('huels.letha@nottingham.edu.my', 20000024, 'DB21'),
('israel.kunze@nottingham.edu.my', 20000025, ''),
('iwillms@nottingham.edu.my', 20000026, 'DB22'),
('jeanne.raynor@nottingham.edu.my', 20000027, 'DB23'),
('jerel.senger@nottingham.edu.my', 20000028, 'DB24'),
('jesse.feil@nottingham.edu.my', 20000029, 'DB25'),
('jones.dena@nottingham.edu.my', 20000030, 'DB26'),
('kris.darien@nottingham.edu.my', 20000031, 'DB27'),
('lakin.kendrick@nottingham.edu.my', 20000032, 'DB28'),
('lwest@nottingham.edu.my', 20000033, 'DB29'),
('madilyn.dach@nottingham.edu.my', 20000034, 'DB30'),
('mmraz@nottingham.edu.my', 20000035, 'BA12'),
('mueller.rashawn@nottingham.edu.my', 20000036, 'BA13'),
('nathanael.rowe@nottingham.edu.my', 20000037, 'BA14'),
('ncrooks@nottingham.edu.my', 20000038, 'BA15'),
('oma82@nottingham.edu.my', 20000039, 'BA16'),
('ondricka.breanne@nottingham.edu.my', 20000040, 'BA17'),
('qcruickshank@nottingham.edu.my', 20000041, 'BA18'),
('rosamond.yost@nottingham.edu.my', 20000042, 'BA19'),
('rossie.legros@nottingham.edu.my', 20000043, 'CA12'),
('saul85@nottingham.edu.my', 20000044, 'CA13'),
('sawayn.humberto@nottingham.edu.my', 20000045, 'CA14'),
('schroeder.ceasar@nottingham.edu.my', 20000046, 'CA15'),
('scot.dooley@nottingham.edu.my', 20000047, 'CA16'),
('selina41@nottingham.edu.my', 20000048, 'CA17'),
('shields.cyrus@nottingham.edu.my', 20000049, 'CA18'),
('smith.mina@nottingham.edu.my', 20000050, 'CA19'),
('tressie02@nottingham.edu.my', 20000051, 'CA11'),
('tsanford@nottingham.edu.my', 20000052, 'DA12'),
('uschimmel@nottingham.edu.my', 20000053, 'DA13'),
('whodkiewicz@nottingham.edu.my', 20000054, 'DA14'),
('will.carlie@nottingham.edu.my', 20000055, 'DA15'),
('wmurray@nottingham.edu.my', 20000056, 'DA16'),
('wolff.elijah@nottingham.edu.my', 20000057, 'DA17'),
('wyman.raina@nottingham.edu.my', 20000058, 'DA18'),
('ykutch@nottingham.edu.my', 20000059, 'DA19'),
('ylittel@nottingham.edu.my', 20000060, 'DA11'),
('ystiedemann@nottingham.edu.my', 20000061, 'DD40'),
('zcrona@nottingham.edu.my', 20000062, 'DB34'),
('zetta26@nottingham.edu.my', 20000063, 'CB32'),
('zlangosh@nottingham.edu.my', 20000064, 'AA60'),
('zrempel@nottingham.edu.my', 20000065, 'AA62'),
('zsipes@nottingham.edu.my', 20000066, 'AA38');

-- --------------------------------------------------------

--
-- Table structure for table `thursday timeslot`
--

CREATE TABLE `thursday timeslot` (
  `appointment_id` int(11) NOT NULL,
  `timeslot1` varchar(255) DEFAULT NULL,
  `timeslot2` varchar(255) DEFAULT NULL,
  `timeslot3` varchar(255) DEFAULT NULL,
  `timeslot4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thursday timeslot`
--

INSERT INTO `thursday timeslot` (`appointment_id`, `timeslot1`, `timeslot2`, `timeslot3`, `timeslot4`) VALUES
(1, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL),
(13, NULL, NULL, NULL, NULL),
(14, NULL, NULL, NULL, NULL),
(15, NULL, NULL, NULL, NULL),
(16, NULL, NULL, NULL, NULL),
(17, NULL, NULL, NULL, NULL),
(18, NULL, NULL, NULL, NULL),
(19, NULL, NULL, NULL, NULL),
(20, NULL, NULL, NULL, NULL),
(21, NULL, NULL, NULL, NULL),
(22, NULL, NULL, NULL, NULL),
(23, NULL, NULL, NULL, NULL),
(24, NULL, NULL, NULL, NULL),
(25, NULL, NULL, NULL, NULL),
(26, NULL, NULL, NULL, NULL),
(27, NULL, NULL, NULL, NULL),
(28, NULL, NULL, NULL, NULL),
(29, NULL, NULL, NULL, NULL),
(30, NULL, NULL, NULL, NULL),
(31, 'Mariyam Imtha Shafeeu', 'Dania Imanina Binti Kamarul Bahrin', NULL, NULL),
(32, NULL, NULL, NULL, NULL),
(33, NULL, NULL, NULL, NULL),
(34, NULL, NULL, NULL, NULL),
(35, NULL, NULL, NULL, NULL),
(36, NULL, NULL, NULL, NULL),
(37, NULL, NULL, NULL, NULL),
(38, NULL, NULL, NULL, NULL),
(39, NULL, NULL, NULL, NULL),
(40, NULL, NULL, NULL, NULL),
(41, NULL, NULL, NULL, NULL),
(42, NULL, NULL, NULL, NULL),
(43, NULL, NULL, NULL, NULL),
(44, NULL, NULL, NULL, NULL),
(45, NULL, NULL, NULL, NULL),
(46, NULL, NULL, NULL, NULL),
(47, NULL, NULL, NULL, NULL),
(48, NULL, NULL, NULL, NULL),
(49, NULL, NULL, NULL, NULL),
(50, NULL, NULL, NULL, NULL),
(51, NULL, NULL, NULL, NULL),
(52, NULL, NULL, NULL, NULL),
(53, NULL, NULL, NULL, NULL),
(54, NULL, NULL, NULL, NULL),
(55, NULL, NULL, NULL, NULL),
(56, NULL, NULL, NULL, NULL),
(57, NULL, NULL, NULL, NULL),
(58, NULL, NULL, NULL, NULL),
(59, NULL, NULL, NULL, NULL),
(60, NULL, NULL, NULL, NULL),
(61, NULL, NULL, NULL, NULL),
(62, NULL, NULL, NULL, NULL),
(63, NULL, NULL, NULL, NULL),
(64, NULL, NULL, NULL, NULL),
(65, NULL, NULL, NULL, NULL),
(66, NULL, NULL, NULL, NULL),
(67, NULL, NULL, NULL, NULL),
(68, NULL, NULL, NULL, NULL),
(69, NULL, NULL, NULL, NULL),
(70, NULL, NULL, NULL, NULL),
(71, NULL, NULL, NULL, NULL),
(72, NULL, NULL, NULL, NULL),
(73, NULL, NULL, NULL, NULL),
(74, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tuesday timeslot`
--

CREATE TABLE `tuesday timeslot` (
  `appointment_id` int(11) NOT NULL,
  `timeslot1` varchar(255) DEFAULT NULL,
  `timeslot2` varchar(255) DEFAULT NULL,
  `timeslot3` varchar(255) DEFAULT NULL,
  `timeslot4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tuesday timeslot`
--

INSERT INTO `tuesday timeslot` (`appointment_id`, `timeslot1`, `timeslot2`, `timeslot3`, `timeslot4`) VALUES
(1, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL),
(13, NULL, NULL, NULL, NULL),
(14, NULL, NULL, NULL, NULL),
(15, NULL, NULL, NULL, NULL),
(16, NULL, NULL, NULL, NULL),
(17, NULL, NULL, NULL, NULL),
(18, NULL, NULL, NULL, NULL),
(19, NULL, NULL, NULL, NULL),
(20, NULL, NULL, NULL, NULL),
(21, NULL, NULL, NULL, NULL),
(22, NULL, NULL, NULL, NULL),
(23, NULL, NULL, NULL, NULL),
(24, NULL, NULL, NULL, NULL),
(25, NULL, NULL, NULL, NULL),
(26, NULL, NULL, NULL, NULL),
(27, NULL, NULL, NULL, NULL),
(28, NULL, NULL, NULL, NULL),
(29, NULL, NULL, NULL, NULL),
(30, NULL, NULL, NULL, NULL),
(31, NULL, 'Dania Imanina Binti Kamarul Bahrin', NULL, NULL),
(32, NULL, NULL, NULL, NULL),
(33, NULL, NULL, NULL, NULL),
(34, NULL, NULL, NULL, NULL),
(35, NULL, NULL, NULL, NULL),
(36, NULL, NULL, NULL, NULL),
(37, NULL, NULL, NULL, NULL),
(38, NULL, NULL, NULL, NULL),
(39, NULL, NULL, NULL, NULL),
(40, NULL, NULL, NULL, NULL),
(41, NULL, NULL, NULL, NULL),
(42, NULL, NULL, NULL, NULL),
(43, NULL, NULL, NULL, NULL),
(44, NULL, NULL, NULL, NULL),
(45, NULL, NULL, NULL, NULL),
(46, NULL, NULL, NULL, NULL),
(47, NULL, NULL, NULL, NULL),
(48, NULL, NULL, NULL, NULL),
(49, NULL, NULL, NULL, NULL),
(50, NULL, NULL, NULL, NULL),
(51, NULL, NULL, NULL, NULL),
(52, NULL, NULL, NULL, NULL),
(53, NULL, NULL, NULL, NULL),
(54, NULL, NULL, NULL, NULL),
(55, NULL, NULL, NULL, NULL),
(56, NULL, NULL, NULL, NULL),
(57, NULL, NULL, NULL, NULL),
(58, NULL, NULL, NULL, NULL),
(59, NULL, NULL, NULL, NULL),
(60, NULL, NULL, NULL, NULL),
(61, NULL, NULL, NULL, NULL),
(62, NULL, NULL, NULL, NULL),
(63, NULL, NULL, NULL, NULL),
(64, NULL, NULL, NULL, NULL),
(65, NULL, NULL, NULL, NULL),
(66, NULL, NULL, NULL, NULL),
(67, NULL, NULL, NULL, NULL),
(68, NULL, NULL, NULL, NULL),
(69, NULL, NULL, NULL, NULL),
(70, NULL, NULL, NULL, NULL),
(71, NULL, NULL, NULL, NULL),
(72, NULL, NULL, NULL, NULL),
(73, NULL, NULL, NULL, NULL),
(74, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `Lect ID` int(8) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `School` varchar(200) NOT NULL,
  `Password` varchar(20) NOT NULL DEFAULT '0000',
  `email` varchar(100) NOT NULL,
  `office` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`Lect ID`, `Name`, `School`, `Password`, `email`, `office`) VALUES
(50000001, 'Addie Schoen', 'Arts & Education (Foundation)', '1234', 'addie.schoen@nottingham.edu.my', 'CC01'),
(50000002, 'Alexzander', 'Arts & Education (Foundation)', '1234', 'alexzander81@nottingham.edu.my', 'CC02'),
(50000003, 'Alia', 'Arts & Education (Foundation)', '1234', 'alia90@nottingham.edu.my', 'CC03'),
(50000004, 'Amiya Koss', 'Business and Management (Foundation)', '1234', 'amiya.koss@nottingham.edu.my', 'CC04'),
(50000005, 'Annalise', 'Business and Management (Foundation)', '1234', 'annalise91@nottingham.edu.my', 'CC05'),
(50000006, 'Aric', 'Business and Management (Foundation)', '1234', 'aric56@nottingham.edu.my', 'CC06'),
(50000007, 'Arno', 'Engineering (Foundation)', '1234', 'arno85@nottingham.edu.my', 'CC07'),
(50000008, 'Brannon', 'Engineering (Foundation)', '1234', 'brannon27@nottingham.edu.my', 'CC08'),
(50000009, 'Brekke Fredrick', 'Engineering (Foundation)', '1234', 'brekke.fredrick@nottingham.edu.my', 'CC09'),
(50000010, 'Chaim', 'Science (Foundation)', '1234', 'chaim93@nottingham.edu.my', 'CC10'),
(50000011, 'Crist Paolo', 'Science (Foundation)', '1234', 'crist.paolo@nottingham.edu.my', 'CC11'),
(50000012, 'Amore Johnny', 'Science (Foundation)', '1234', 'amore.johnny@nottingham.edu.my', 'CC12'),
(50000013, 'Deshaun Kunde', 'Organisational and Applied Psychology', '1234', 'deshaun.kunde@nottingham.edu.my', 'CC13'),
(50000014, 'Dominic Boyer', 'Organisational and Applied Psychology', '1234', 'dominic.boyer@nottingham.edu.my', 'CC14'),
(50000015, 'Douglas Spencer', 'Organisational and Applied Psychology', '1234', 'douglas.spencer@nottingham.edu.my', 'CC15'),
(50000016, 'Ebony Skiles', 'Biomedical Sciences', '1234', 'ebony.skiles@nottingham.edu.my', 'CC16'),
(50000017, 'Ehome Nick', 'Biomedical Sciences', '1234', 'ehomenick@nottingham.edu.my', 'CC17'),
(50000018, 'Elwin Koepp', 'Biomedical Sciences', '1234', 'elwin.koepp@nottingham.edu.my', 'CC18'),
(50000019, 'Ericka Brakus', 'Nottingham University Business School', '1234', 'ericka.brakus@nottingham.edu.my', 'CC19'),
(50000020, 'Hagenes Crawford', 'Nottingham University Business School', '1234', 'hagenes.crawford@nottingham.edu.my', 'CC20'),
(50000021, 'Haven Collier', 'Nottingham University Business School', '1234', 'haven.collier@nottingham.edu.my', 'CC21'),
(50000022, 'Hector', 'Mathematical Sciences', '1234', 'hector47@nottingham.edu.my', 'CC22'),
(50000023, 'Houston', 'Mathematical Sciences', '1234', 'houston95@nottingham.edu.my', 'CC23'),
(50000024, 'Huels Letha', 'Mathematical Sciences', '1234', 'huels.letha@nottingham.edu.my', 'CC24'),
(50000025, 'Israel Kunze', 'Biosciences', '1234', 'israel.kunze@nottingham.edu.my', 'CC25'),
(50000026, 'Iwillms', 'Biosciences', '1234', 'iwillms@nottingham.edu.my', 'CC26'),
(50000027, 'Jeanne Raynor', 'Biosciences', '1234', 'jeanne.raynor@nottingham.edu.my', 'CC27'),
(50000028, 'Jerel Senger', 'Chemical & Environmental Engineering', '1234', 'jerel.senger@nottingham.edu.my', 'CC28'),
(50000029, 'Jesse Feil', 'Chemical & Environmental Engineering', '1234', 'jesse.feil@nottingham.edu.my', 'CC29'),
(50000030, 'Jones Dena', 'Chemical & Environmental Engineering', '1234', 'jones.dena@nottingham.edu.my', 'CC30'),
(50000031, 'KR Selvaraj', 'Computer Science', '1234', 'kr.selvaraj@nottingham.edu.my', 'BB60'),
(50000032, 'Iman Liao', 'Computer Science', '1234', 'iman.liao@nottingham.edu.my', 'BB63'),
(50000033, 'Tomas Maul', 'Computer Science', '1234', 'tomas.maul@nottingham.edu.my', 'BB65'),
(50000034, 'Chew Sze Ker', 'Computer Science', '1234', 'chew.sze-ker@nottingham.edu.my', 'BB72'),
(50000035, 'Michael Chung', 'Computer Science', '1234', 'michael.chung@nottingham.edu.my', 'BB72'),
(50000036, 'Amr Ahmed', 'Computer Science', '1234', 'amr.ahmed@nottingham.edu.my', 'BB70'),
(50000037, 'Zhiyuan Chen', 'Computer Science', '1234', 'zhiyuan.chen@nottingham.edu.my', 'BB71'),
(50000038, 'Marina Ng', 'Computer Science', '1234', 'marina.ng@nottingham.edu.my', 'BB71'),
(50000039, 'Aazam', 'Computer Science', '1234', 'mohammad.aazam@nottingham.edu.my', 'DB33'),
(50000040, 'Chong Siang Yew', 'Computer Science', '1234', 'siang-yew.chong@nottingham.edu.my', 'BB03'),
(50000041, 'Radu Muschevici', 'Computer Science', '1234', 'radu.muschevici@nottingham.edu.my', 'BB03'),
(50000042, 'Madilyn Dach', 'Civil Engineering', '1234', 'madilyn.dach@nottingham.edu.my', 'CC31'),
(50000043, 'Raz', 'Civil Engineering', '1234', 'mmraz@nottingham.edu.my', 'CC32'),
(50000044, 'Mueller Rashawn', 'Civil Engineering', '1234', 'mueller.rashawn@nottingham.edu.my', 'CC33'),
(50000045, 'Nathanael Rowe', 'Economics', '1234', 'nathanael.rowe@nottingham.edu.my', 'CC34'),
(50000046, 'Crooks', 'Economics', '1234', 'ncrooks@nottingham.edu.my', 'CC35'),
(50000047, 'Oma', 'Economics', '1234', 'oma82@nottingham.edu.my', 'CC36'),
(50000048, 'Ondricka Breanne', 'Education', '1234', 'ondricka.breanne@nottingham.edu.my', 'CC37'),
(50000049, 'Cruick Shank', 'Education', '1234', 'qcruickshank@nottingham.edu.my', 'CC38'),
(50000050, 'Rosamond Yost', 'Education', '1234', 'rosamond.yost@nottingham.edu.my', 'CC39'),
(50000051, 'Rossie Legros', 'Electrical & Electronic Engineering', '1234', 'rossie.legros@nottingham.edu.my', 'CC40'),
(50000052, 'Saul', 'Electrical & Electronic Engineering', '1234', 'saul85@nottingham.edu.my', 'CC41'),
(50000053, 'Sawayn Humberto', 'Electrical & Electronic Engineering', '1234', 'sawayn.humberto@nottingham.edu.my', 'CC42'),
(50000054, 'Schroeder Ceasar', 'English', '1234', 'schroeder.ceasar@nottingham.edu.my', 'CC43'),
(50000055, 'Scot Dooley', 'English', '1234', 'scot.dooley@nottingham.edu.my', 'CC44'),
(50000056, 'Selina', 'English', '1234', 'selina41@nottingham.edu.my', 'CC45'),
(50000057, 'Shields Cyrus', 'Environmental & Geographical Sciences', '1234', 'shields.cyrus@nottingham.edu.my', 'CC46'),
(50000058, 'Smith Mina', 'Environmental & Geographical Sciences', '1234', 'smith.mina@nottingham.edu.my', 'CC47'),
(50000059, 'Tressie', 'Environmental & Geographical Sciences', '1234', 'tressie02@nottingham.edu.my', 'CC48'),
(50000060, 'Tsanford', 'Media, Languages and Cultures', '1234', 'tsanford@nottingham.edu.my', 'CC49'),
(50000061, 'Uschimmel', 'Media, Languages and Cultures', '1234', 'uschimmel@nottingham.edu.my', 'CC50'),
(50000062, 'Whodkiewicz', 'Media, Languages and Cultures', '1234', 'whodkiewicz@nottingham.edu.my', 'CC51'),
(50000063, 'Will Carlie', 'Politics, History & International Relations', '1234', 'will.carlie@nottingham.edu.my', 'CC52'),
(50000064, 'Wmurray', 'Politics, History & International Relations', '1234', 'wmurray@nottingham.edu.my', 'CC53'),
(50000065, 'Wolff Elijah', 'Politics, History & International Relations', '1234', 'wolff.elijah@nottingham.edu.my', 'CC54'),
(50000066, 'Wyman Raina', 'Mechanical, Materials & Manufacturing Engineering', '1234', 'wyman.raina@nottingham.edu.my', 'CC55'),
(50000067, 'Ykutch', 'Mechanical, Materials & Manufacturing Engineering', '1234', 'ykutch@nottingham.edu.my', 'CC56'),
(50000068, 'Ylittel', 'Mechanical, Materials & Manufacturing Engineering', '1234', 'ylittel@nottingham.edu.my', 'CC57'),
(50000069, 'Ystiedemann', 'Pharmacy', '1234', 'ystiedemann@nottingham.edu.my', 'CC58'),
(50000070, 'Zcrona', 'Pharmacy', '1234', 'zcrona@nottingham.edu.my', 'CC59'),
(50000071, 'Zetta', 'Pharmacy', '1234', 'zetta26@nottingham.edu.my', 'CC60'),
(50000072, 'Zlangosh', 'Psychology', '1234', 'zlangosh@nottingham.edu.my', 'CC61'),
(50000073, 'Zrempel', 'Psychology', '1234', 'zrempel@nottingham.edu.my', 'CC62'),
(50000074, 'Zsipes', 'Psychology', '1234', 'zsipes@nottingham.edu.my', 'CC63');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wednesday timeslot`
--

CREATE TABLE `wednesday timeslot` (
  `appointment_id` int(11) NOT NULL,
  `timeslot1` varchar(255) DEFAULT NULL,
  `timeslot2` varchar(255) DEFAULT NULL,
  `timeslot3` varchar(255) DEFAULT NULL,
  `timeslot4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wednesday timeslot`
--

INSERT INTO `wednesday timeslot` (`appointment_id`, `timeslot1`, `timeslot2`, `timeslot3`, `timeslot4`) VALUES
(1, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL),
(13, NULL, NULL, NULL, NULL),
(14, NULL, NULL, NULL, NULL),
(15, NULL, NULL, NULL, NULL),
(16, NULL, NULL, NULL, NULL),
(17, NULL, NULL, NULL, NULL),
(18, NULL, NULL, NULL, NULL),
(19, NULL, NULL, NULL, NULL),
(20, NULL, NULL, NULL, NULL),
(21, NULL, NULL, NULL, NULL),
(22, NULL, NULL, NULL, NULL),
(23, NULL, NULL, NULL, NULL),
(24, NULL, NULL, NULL, NULL),
(25, NULL, NULL, NULL, NULL),
(26, NULL, NULL, NULL, NULL),
(27, NULL, NULL, NULL, NULL),
(28, NULL, NULL, NULL, NULL),
(29, NULL, NULL, NULL, NULL),
(30, NULL, NULL, NULL, NULL),
(31, 'Dania Imanina Binti Kamarul Bahrin', 'Dania Imanina Binti Kamarul Bahrin', 'Dania Imanina Binti Kamarul Bahrin', NULL),
(32, NULL, NULL, NULL, NULL),
(33, NULL, NULL, NULL, NULL),
(34, NULL, NULL, NULL, NULL),
(35, NULL, NULL, NULL, NULL),
(36, NULL, NULL, NULL, NULL),
(37, NULL, NULL, NULL, NULL),
(38, NULL, NULL, NULL, NULL),
(39, NULL, NULL, NULL, NULL),
(40, NULL, NULL, NULL, NULL),
(41, NULL, NULL, NULL, NULL),
(42, NULL, NULL, NULL, NULL),
(43, NULL, NULL, NULL, NULL),
(44, NULL, NULL, NULL, NULL),
(45, NULL, NULL, NULL, NULL),
(46, NULL, NULL, NULL, NULL),
(47, NULL, NULL, NULL, NULL),
(48, NULL, NULL, NULL, NULL),
(49, NULL, NULL, NULL, NULL),
(50, NULL, NULL, NULL, NULL),
(51, NULL, NULL, NULL, NULL),
(52, NULL, NULL, NULL, NULL),
(53, NULL, NULL, NULL, NULL),
(54, NULL, NULL, NULL, NULL),
(55, NULL, NULL, NULL, NULL),
(56, NULL, NULL, NULL, NULL),
(57, NULL, NULL, NULL, NULL),
(58, NULL, NULL, NULL, NULL),
(59, NULL, NULL, NULL, NULL),
(60, NULL, NULL, NULL, NULL),
(61, NULL, NULL, NULL, NULL),
(62, NULL, NULL, NULL, NULL),
(63, NULL, NULL, NULL, NULL),
(64, NULL, NULL, NULL, NULL),
(65, NULL, NULL, NULL, NULL),
(66, NULL, NULL, NULL, NULL),
(67, NULL, NULL, NULL, NULL),
(68, NULL, NULL, NULL, NULL),
(69, NULL, NULL, NULL, NULL),
(70, NULL, NULL, NULL, NULL),
(71, NULL, NULL, NULL, NULL),
(72, NULL, NULL, NULL, NULL),
(73, NULL, NULL, NULL, NULL),
(74, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic plan codes`
--
ALTER TABLE `academic plan codes`
  ADD PRIMARY KEY (`Code`);

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`Admin ID`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`Appointment_ID`),
  ADD KEY `Lect ID` (`Lect ID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `general_chat`
--
ALTER TABLE `general_chat`
  ADD PRIMARY KEY (`chatid`);

--
-- Indexes for table `monday timeslot`
--
ALTER TABLE `monday timeslot`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `remarks`
--
ALTER TABLE `remarks`
  ADD KEY `Student Id` (`Student Id`),
  ADD KEY `Lect Id` (`Lect Id`);

--
-- Indexes for table `senior tutors`
--
ALTER TABLE `senior tutors`
  ADD KEY `Lect ID` (`Lect ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Student Id`),
  ADD KEY `Tutor Id` (`Tutor Id`),
  ADD KEY `Academic Plan Code` (`Academic Plan Code`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `tempemails`
--
ALTER TABLE `tempemails`
  ADD PRIMARY KEY (`LECTID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`Lect ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `general_chat`
--
ALTER TABLE `general_chat`
  MODIFY `chatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tempemails`
--
ALTER TABLE `tempemails`
  MODIFY `LECTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20000068;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`Lect ID`) REFERENCES `tutors` (`Lect ID`);

--
-- Constraints for table `remarks`
--
ALTER TABLE `remarks`
  ADD CONSTRAINT `student_remarks` FOREIGN KEY (`Student Id`) REFERENCES `students` (`Student Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tutor_remarks` FOREIGN KEY (`Lect Id`) REFERENCES `tutors` (`Lect ID`) ON UPDATE CASCADE;

--
-- Constraints for table `senior tutors`
--
ALTER TABLE `senior tutors`
  ADD CONSTRAINT `senior_tutors` FOREIGN KEY (`Lect ID`) REFERENCES `tutors` (`Lect ID`) ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `course` FOREIGN KEY (`Academic Plan Code`) REFERENCES `academic plan codes` (`Code`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tutor_id` FOREIGN KEY (`Tutor Id`) REFERENCES `tutors` (`Lect ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
