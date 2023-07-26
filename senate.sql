-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2023 at 08:14 PM
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
-- Database: `senate`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'dao@nitc.ac.in', '$2y$10$IcxwohuVjv9ZRwSDrDNyqeEbw2RegAeW0zs5fb5NhzFhWqzZi25yC');

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `title` varchar(2048) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `des` varchar(8192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meeting_id` int(11) NOT NULL,
  `submitted` varchar(2048) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id`, `title`, `category`, `des`, `doc`, `meeting_id`, `submitted`) VALUES
(20, 'Proposal from Student Affairs Council (SAC) for including the date.', 'PhD', 'Currently only the Convocation date is included in the Ph.D. degree certificate. However, for a Ph.D. degree, the date of oral examination is considered as the qualifying date. For Jobs / Promotions, etc generally the qualifying date of a degree is considered. The absence of an actual date of qualification may lead to missing the eligibility criteria in such cases. Hence, SAC proposed to include the viva date and to change the format of the degree certificate.', '9_minutes-of-the-87th-senate-held-on-14-07-2022_45885fa8-b93e-4902-99e7-ae260f28b8c6_0.pdf', 9, 'SAC'),
(21, 'Permission granted by Chairman Senate on medical grounds to Mr. Adwait Uday Kochare.', 'Student', 'Mr. Adwait Uday Kochare, (B211298PE) was admitted to the Institute in the academic year 2021-22 for the B.Tech program in Production Engineering. He has successfully completed 12 credits in the first semester. He has not reported for the offline classes in the 2nd semester due to medical grounds. Based on the request submitted by the student, Chairman Senate permitted Mr. Adwait Uday Kochare to temporarily discontinue the studies on medical grounds and rejoin in the next academic year along with the newly admitted students in 2022-23', '9_minutes-of-the-88th-senate-held-on-30-08-2022_95e0af47-6741-4cb6-8d4f-f4b5556f07aa_0.pdf', 9, 'Chairman'),
(22, 'Proposal for a New Slot System for the Institute', 'Slot', 'The number of students admitted to major B.Tech programs of the Institute has increased significantly on account of the economically weaker sections (EWS) reservations implemented from the 2018-19 period. Hence it is proposed to divide the B.Tech students of five major branches (CE,CS,EC, EE and ME) from the two-batch system followed at present to four batches for better teaching learning experience for students and management of workload for the faculty. In order to fit additional batches within the available classrooms a new slot system needs to be proposed. A committee was constituted by the Dean (Academic) with following members to study the feasibility and propose a suitable slot system for the same.', '9_minutes-of-the-89th-senate-held-on-01-11-2022_8a150d90-eef9-4645-b89f-332430b2106b_0.pdf', 9, 'Office'),
(23, 'Recommendation from HOD, CSED for inclusion of Dr. Madhu.S.Nair, Associate Professor.', 'Academic', 'The Senate approved Dr. Madhu. S. Nair, Associate Professor, CUSAT, as co-guide for Ms. Sithara Kanakaraj (P150033CS).', '9_minutes-of-the-70th-senate--held-on-02---04---2019_7a23873b-25eb-443a-832b-04b677a01d55_0.pdf', 9, 'CSED');

-- --------------------------------------------------------

--
-- Table structure for table `invite`
--

CREATE TABLE `invite` (
  `id` int(11) NOT NULL,
  `meeting_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invite`
--

INSERT INTO `invite` (`id`, `meeting_id`, `member_id`, `status`) VALUES
(24, 9, 23, 2),
(25, 9, 24, 1),
(26, 9, 26, 0);

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `venue` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` int(2) NOT NULL,
  `agenda` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minutes` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`id`, `count`, `venue`, `date`, `time`, `flag`, `agenda`, `minutes`) VALUES
(9, 1, 'Aryabhatta hall', '2023-04-27', '10:00', 0, '1', '9_minutes-of-the-79th-senate--held-on-28---09---2020_ccdc0a37-7a18-44dc-81c2-14eb7ae8c55f_0.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `email`, `password`, `designation`, `post`, `name`) VALUES
(13, 'ADITYA@nitc.ac.in', 'A26EGNo', 'Associate Professor', 'Senior Senate', 'ADITYANIVRUTTIJADHAV'),
(14, 'AKSHAY@nitc.ac.in', 'iLwMkoi', 'Assistant Professor', 'Senate', 'AKSHAY KUMAR'),
(15, 'ANISH@nitc.ac.in', 'yIrEvtk', 'Associate Professor', 'Senate', 'ANISH KUMAR YADAV'),
(16, 'ARASTU@nitc.ac.in', '7mBKkLr', 'Professor', 'Senior Senate', 'ARASTU SHARMA'),
(17, 'ARAVIND@nitc.ac.in', 'sN7xwvt', 'Associate Professor', 'Senior Senate', ' ARAVIND A'),
(18, 'ARPITA@nitc.ac.in', 'hTn82iM', 'Depertment head', 'Senior Senate', 'ARPITA KAYAL'),
(19, 'ATUL@nitc.ac.in', 'dFLI70C', 'Assistant Professor', 'Senate', 'ATUL KUMAR KAITHAL'),
(20, 'AYUSHI@nitc.ac.in', 'oMX6tig', 'Assistant Professor', 'Senate', 'AYUSHI KUMARI'),
(21, 'DEBOLINA@nitc.ac.in', 'SwRHFQX', 'Associate Professor', 'Senate', 'DEBOLINA SAHA'),
(22, 'PAVAN@nitc.ac.in', 'wkhaFg9', 'Professor', 'Senior Senate', 'DERANGULA PAVAN KUMAR'),
(23, 'himanshu_m220263cs@nitc.ac.in', '5ccfNz3', 'Professor', 'Senior Senate', ' HIMANSHU DEWANGAN'),
(24, 'jaybharat_m220249cs@nitc.ac.in', 'JDzItUJ', 'Professor', 'Deputy Chair Person', 'JAY BHARAT VORA'),
(25, 'SRINIVAS@nitc.ac.in', 'Mj2S937', 'Assistant Professor', 'Senate', 'K SRINIVAS'),
(26, 'karan_m220284cs@nitc.ac.in', 'DeW8cLj', 'Professor', 'Deputy Chair Person', 'KARAN KUWAR SINGH'),
(27, 'TEJAS@nitc.ac.in', 'GcOxs1S', 'Professor', 'Chair Person', 'KHANGAL TEJAS KHANDERAO'),
(28, 'SHUBHANKAR@nitc.ac.in', 'vkkU3zd', 'Associate Professor', 'Senior Senate', 'KULKARNI SHUBHANKAR SURENDRA'),
(29, 'MOHIT@nitc.ac.in', 'Q9ObE8O', 'Assistant Professor', 'Senate', 'MOHIT DEWANGAN'),
(30, 'MONA@nitc.ac.in', 'VTQICHs', 'Assistant Professor', 'Senate', 'MONA PAINKRA'),
(31, 'PREETHI@nitc.ac.in', 'kbLgnZQ', 'Associate Professor', 'Senate', ' PREETHI ANN JACOB'),
(32, 'PRIYANKA@nitc.ac.in', 'ikTSsjB', 'Associate Professor', 'Senior Senate', 'PRIYANKA KUMARI'),
(33, 'SALONI@nitc.ac.in', 'vDFsWNs', 'Assistant Professor', 'Senate', 'SALONI AZAD'),
(34, 'SHARON@nitc.ac.in', 'RvQAkyq', 'Assistant Professor', 'Senate', 'SHARON BINU GEORGE'),
(35, 'SHASHANK@nitc.ac.in', 'kn1H0eQ', 'Associate Professor', 'Senior Senate', 'SHASHANK N S'),
(36, 'SHREYA@nitc.ac.in', 'ESRDggp', 'Assistant Professor', 'Senate', 'SHREYA DUTTA'),
(37, 'SUBHRANIL@nitc.ac.in', 'QQWJPK7', 'Assistant Professor', 'Senate', 'SUBHRANIL BARUA'),
(38, 'SULALA@nitc.ac.in', 'nRL91Ur', 'Associate Professor', 'Senior Senate', 'SULALA SALEEM P'),
(39, 'YATTTANDEEP@nitc.ac.in', '6ehNaHQ', 'Associate Professor', 'Senate', 'YATTTANDEEP SINGH'),
(40, 'AASHISH@nitc.ac.in', 'ue9aJx8', 'Assistant Professor', 'Senate', 'AASHISH CHAUHAN'),
(41, 'ABHIMANYU@nitc.ac.in', 'xOMSbon', 'Assistant Professor', 'Senate', 'ABHIMANYU SINGH'),
(42, 'AFSAL@nitc.ac.in', 'tM8FPRq', 'Associate Professor', 'Senate', 'AFSAL NOOR E. V'),
(43, 'ANKIT@nitc.ac.in', 'ZhC2t3R', 'Assistant Professor', 'Senate', 'ANKIT SHAKYA'),
(44, 'AYUSH@nitc.ac.in', 'hIrQgcu', 'Associate Professor', 'Senate', 'AYUSH RANJAN'),
(45, 'DINUSHA@nitc.ac.in', 'OH6ggbK', 'Associate Professor', 'Senior Senate', 'DINUSHA P'),
(46, 'DURGESH@nitc.ac.in', '2sbrlsy', 'Assistant Professor', 'Senate', 'DURGESH SINGH MUNDA'),
(47, 'MALLIKARJUN@nitc.ac.in', 'KSqtnMj', 'Associate Professor', 'Senior Senate', 'GUNDLA MALLIKARJUN'),
(48, 'RAGHAVENDRA@nitc.ac.in', 'w0foZea', 'Assistant Professor', 'Senate', 'K RAGHAVENDRA'),
(49, 'KHUSHALI@nitc.ac.in', 'OdeDQwr', 'Associate Professor', 'Senate', 'KHUSHALI BHIMRAO CHANDEKAR'),
(50, 'BHAVAN@nitc.ac.in', 'IqsbjLv', 'Associate Professor', 'Senate', 'MEEGADA BHAVAN KUMAR REDDY'),
(51, 'JUGAL@nitc.ac.in', 'YMsVHN3', 'Associate Professor', 'Senior Senate', ' PATEL JUGAL RAMESHBHAI'),
(52, 'PRACHI@nitc.ac.in', 'rPuSdb5', 'Assistant Professor', 'Senate', 'PRACHI MISHRA'),
(53, 'PREKSHA@nitc.ac.in', 'VWvqV2j', 'Associate Professor', 'Senior Senate', 'PREKSHA UNIYAL'),
(54, 'SAMEER@nitc.ac.in', 'Arv2NYK', 'Associate Professor', 'Senate', 'SHAIK SAMEER'),
(55, 'SHUBHAM@nitc.ac.in', 'S70Uyed', 'Assistant Professor', 'Senate', 'SHUBHAM KUMAR'),
(56, 'SNEHA@nitc.ac.in', 'iXgeRU0', 'Associate Professor', 'Senate', 'SNEHA GHOSH'),
(57, 'SUBEDAR@nitc.ac.in', 'sbGowX5', 'Assistant Professor', 'Senate', 'SUBEDAR CHAURASIYA'),
(58, 'SUJEET@nitc.ac.in', '67QkD6H', 'Associate Professor', 'Senate', 'SUJEET KUMAR SINGH'),
(59, 'SUSHAL@nitc.ac.in', 'cbhbLsz', 'Assistant Professor', 'Senior Senate', 'SUSHAL DEVASARI'),
(60, 'SWAPNIL@nitc.ac.in', 'miIdtFZ', 'Assistant Professor', 'Senate', 'SWAPNIL VISHWAS BAVISKAR'),
(61, 'VAIBHAV@nitc.ac.in', 'Hh5dQYh', 'Assistant Professor', 'Senior Senate', 'VAIBHAV PRABHAKAR RAIBOLE'),
(62, 'YUGAM@nitc.ac.in', 'YVxmPbB', 'Professor', 'Senior Senate', 'YUGAM PARASHAR'),
(63, 'SYAM@nitc.ac.in', 'yi9D2b1', 'Associate Professor', 'Senate', 'SYAM KUMAR K S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invite`
--
ALTER TABLE `invite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`count`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `invite`
--
ALTER TABLE `invite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
