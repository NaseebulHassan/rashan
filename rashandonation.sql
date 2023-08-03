-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2023 at 09:03 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rashandonation`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addinv` (IN `Title` VARCHAR(50), IN `locdescription` VARCHAR(100), IN `locquantity` INT(10))  BEGIN
	 DECLARE countdupilicate INT;
	  SELECT count(*) INTO countdupilicate FROM rd_packages WHERE title=Title;
	 IF countdupilicate = 0 THEN
	  INSERT INTO rd_packages(title,description,quantity) values(Title,locdescription,locquantity);
	 END IF;
  END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertData` (IN `cnic` VARCHAR(15), IN `country` VARCHAR(20), IN `region` VARCHAR(50))  BEGIN
    Insert into cnic (cnic,country,region) values(cnic,country,region);
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cnic`
--

CREATE TABLE `cnic` (
  `id` int(20) NOT NULL,
  `cnic` varchar(15) NOT NULL,
  `country` varchar(50) NOT NULL,
  `region` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cnic`
--

INSERT INTO `cnic` (`id`, `cnic`, `country`, `region`, `created_at`) VALUES
(1, '36603', 'Pakistan', 'Asia', '2023-06-06 07:10:50'),
(4, '36605', 'Pakistan', 'Asia', '2023-06-07 13:49:29');

--
-- Triggers `cnic`
--
DELIMITER $$
CREATE TRIGGER `duplicate_cnic` BEFORE INSERT ON `cnic` FOR EACH ROW BEGIN
      DECLARE duplicate_count INT;
        SELECT COUNT(*) INTO duplicate_count FROM cnic WHERE cnic = NEW.cnic;
        IF duplicate_count > 0 THEN
          SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT='Duplicate Value not Allowed';
        END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `emptyRegion` BEFORE INSERT ON `cnic` FOR EACH ROW begin
        IF NEW.region='' THEN set NEW.region='Asia';
        END IF;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rd_city`
--

CREATE TABLE `rd_city` (
  `id` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `city_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rd_city`
--

INSERT INTO `rd_city` (`id`, `pid`, `city_name`) VALUES
(1, 1, 'Attock'),
(2, 1, 'Bahawalnagar'),
(3, 1, 'Bahawalpur'),
(4, 1, 'Bhakkar'),
(5, 1, 'Chakwal'),
(6, 1, 'Chiniot'),
(7, 1, 'Dera Ghazi Khan'),
(8, 1, 'Faisalabad'),
(9, 1, 'Gujranwala'),
(10, 1, 'Gujrat'),
(11, 1, 'Hafizabad'),
(12, 1, 'Jhang'),
(13, 1, 'Jhelum'),
(14, 1, 'Kasur'),
(15, 1, 'Khanewal'),
(16, 1, 'Khushab'),
(17, 1, 'Lahore'),
(18, 1, 'Layyah'),
(19, 1, 'Lodhran'),
(20, 1, 'Mandi Bahauddin'),
(21, 1, 'Mianwali'),
(22, 1, 'Multan'),
(23, 1, 'Muzaffargarh'),
(24, 1, 'Narowal'),
(25, 1, 'Nankana Sahib'),
(26, 1, 'Okara'),
(27, 1, 'Pakpattan'),
(28, 1, 'Rahim Yar Khan'),
(29, 1, 'Rajanpur'),
(30, 1, 'Rawalpindi'),
(31, 1, 'Sahiwal'),
(32, 1, 'Sargodha'),
(33, 1, 'Sheikhupura'),
(34, 1, 'Sialkot'),
(35, 1, 'Toba Tek Singh'),
(36, 1, 'Vehari'),
(37, 2, 'Badin'),
(38, 2, 'Dadu'),
(39, 2, 'Ghotki'),
(40, 2, 'Hyderabad'),
(41, 2, 'Jacobabad'),
(42, 2, 'Jamshoro'),
(43, 2, 'Karachi?East'),
(44, 2, 'Karachi West'),
(45, 2, 'Karachi South'),
(46, 2, 'Karachi Central'),
(47, 2, 'Karachi Malir'),
(48, 2, 'Karachi Korangi'),
(49, 2, 'Kashmore'),
(50, 2, 'Khairpur'),
(51, 2, 'Larkana'),
(52, 2, 'Matiari'),
(53, 2, 'Matli'),
(54, 2, 'Matli'),
(55, 2, 'Mirpurkhas'),
(56, 2, 'Naushahro Firoze'),
(57, 2, 'Shaheed Benazirabad'),
(58, 2, 'Kambar Shahdadkot'),
(59, 2, 'Sanghar'),
(60, 2, 'Shikarpur District'),
(61, 2, 'Sukkur'),
(62, 2, 'Tando Allahyar'),
(63, 2, 'Tando Muhammad Khan'),
(64, 2, 'Tharparkar'),
(65, 2, 'Thatta'),
(66, 2, 'Umerkot'),
(67, 3, 'Abbottabad'),
(68, 3, 'Bannu'),
(69, 3, 'Battagram'),
(70, 3, 'Buner'),
(71, 3, 'Charsadda'),
(72, 3, 'Chitral'),
(73, 3, 'Dera Ismail Khan'),
(74, 3, 'Hangu'),
(75, 3, 'Haripur'),
(76, 3, 'Karak'),
(77, 3, 'Kohat'),
(78, 3, 'Kohistan'),
(79, 3, 'Lakki Marwat'),
(80, 3, 'Lower Dir'),
(81, 3, 'Malakand'),
(82, 3, 'Mansehra'),
(83, 3, 'Mardan'),
(84, 3, 'Nowshera'),
(85, 3, 'Peshawar'),
(86, 3, 'Shangla'),
(87, 3, 'Swabi'),
(88, 3, 'Swat'),
(89, 3, 'Tank'),
(90, 3, 'Tor Ghar'),
(91, 3, 'Upper Dir'),
(92, 4, 'Awaran'),
(93, 4, 'Barkhan'),
(94, 4, 'Kachi?(Bolan)'),
(95, 4, 'Chagai'),
(96, 4, 'Dera Bugti'),
(97, 4, 'Gwadar'),
(98, 4, 'Harnai'),
(99, 4, 'Jafarabad'),
(100, 4, 'Jhal Magsi'),
(101, 4, 'Kalat'),
(102, 4, 'Kech?(Turbat)'),
(103, 4, 'Kharan'),
(104, 4, 'Kohlu'),
(105, 4, 'Khuzdar'),
(106, 4, 'Killa Abdullah'),
(107, 4, 'Killa Saifullah'),
(108, 4, 'Lasbela'),
(109, 4, 'Loralai'),
(110, 4, 'Mastung'),
(111, 4, 'Musakhel'),
(112, 4, 'Nasirabad'),
(113, 4, 'Nushki'),
(114, 4, 'Panjgur'),
(115, 4, 'Pishin'),
(116, 4, 'Quetta'),
(117, 4, 'Sherani'),
(118, 4, 'Sibi'),
(119, 4, 'Washuk'),
(120, 4, 'Zhob'),
(121, 4, 'Ziarat'),
(122, 4, 'Lehri?'),
(123, 4, 'Sohbatpur'),
(124, 5, 'Muzaffarabad'),
(125, 5, 'Hattian'),
(126, 5, 'Neelum'),
(127, 5, 'Mirpur'),
(128, 5, 'Bhimber'),
(129, 5, 'Kotli'),
(130, 5, 'Poonch'),
(131, 5, 'Bagh'),
(132, 5, 'Haveli'),
(133, 5, 'Sudhnati'),
(134, 6, 'Ghanche'),
(135, 6, 'Skardu'),
(136, 6, 'Astore'),
(137, 6, 'Diamer'),
(138, 6, 'Ghizer'),
(139, 6, 'Gilgit'),
(140, 6, 'Hunza-Nagar'),
(141, 7, 'Bajaur Agency'),
(142, 7, 'Khyber Agency'),
(143, 7, 'Kurram Agency'),
(144, 7, 'Mohmand Agency'),
(145, 7, 'North Waziristan Agency'),
(146, 7, 'Orakzai Agency'),
(147, 7, 'South Waziristan Agency'),
(148, 7, 'FR Bannu'),
(149, 7, 'FR Dera Ismail Khan'),
(150, 7, 'FR Kohat'),
(151, 7, 'FR Lakki Marwat'),
(152, 7, 'FR Peshawar'),
(153, 7, 'FR Tank'),
(154, 8, 'Islamabad');

-- --------------------------------------------------------

--
-- Table structure for table `rd_country`
--

CREATE TABLE `rd_country` (
  `id` int(10) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `sortid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rd_country`
--

INSERT INTO `rd_country` (`id`, `cname`, `sortid`) VALUES
(1, 'PAKISTAN', 1),
(2, 'CHINA', 2),
(3, 'CANADA', 3),
(4, 'NIGERIA', 4),
(5, 'SOMALIA', 5),
(6, 'UZBEKISTAN', 6),
(7, 'AFGHANISTAN', 7),
(8, 'AMERICA', 8),
(9, 'YEMEN', 9);

-- --------------------------------------------------------

--
-- Table structure for table `rd_inventory_history`
--

CREATE TABLE `rd_inventory_history` (
  `id` int(20) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rd_inventory_history`
--

INSERT INTO `rd_inventory_history` (`id`, `title`, `description`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'Flour 20kg', 'Flour 20kg', 200, '2023-04-16 16:14:47', NULL),
(2, 'Ghee 5kg', 'Ghee 5kg', 200, '2023-04-16 16:15:19', NULL),
(3, 'Suger 5kg', 'Suger 5kg', 200, '2023-04-16 16:15:45', NULL),
(4, 'Cash 1000', 'Cash 1000 Rs', 200, '2023-04-16 16:17:22', NULL),
(5, '', 'dsdas', 41, '2023-07-02 12:55:45', NULL),
(6, 'Ghee 5Kg', 'uy', 456, '2023-08-02 17:55:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rd_issued_package`
--

CREATE TABLE `rd_issued_package` (
  `id` bigint(20) NOT NULL,
  `userid` int(20) NOT NULL,
  `custid` int(10) NOT NULL,
  `invid` int(10) NOT NULL,
  `title` varchar(150) NOT NULL,
  `quantity` int(10) NOT NULL,
  `amount` int(10) DEFAULT 0,
  `pkgtype` varchar(150) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rd_packages`
--

CREATE TABLE `rd_packages` (
  `pid` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `quantity` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rd_packages`
--

INSERT INTO `rd_packages` (`pid`, `title`, `description`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'Flour 20kg', 'Flour 20kg', 220, '2023-04-16 11:14:47', NULL);

--
-- Triggers `rd_packages`
--
DELIMITER $$
CREATE TRIGGER `checkduplicate` BEFORE INSERT ON `rd_packages` FOR EACH ROW BEGIN
      DECLARE duplicate_count INT;
        SELECT COUNT(*) INTO duplicate_count FROM rd_packages WHERE title = NEW.title;
        IF duplicate_count > 0 THEN
          SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT='Duplicate Value not Allowed';
        END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rd_packages_names`
--

CREATE TABLE `rd_packages_names` (
  `id` int(10) NOT NULL,
  `pkgname` varchar(150) NOT NULL,
  `description` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rd_people`
--

CREATE TABLE `rd_people` (
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `gender` varchar(15) NOT NULL,
  `cnic` varchar(20) NOT NULL,
  `martial_status` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile1` varchar(15) NOT NULL,
  `mobile2` varchar(15) NOT NULL,
  `country` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `address1` varchar(150) DEFAULT NULL,
  `address2` varchar(150) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `ft_bio_matric1` text DEFAULT NULL,
  `ft_bio_matric2` text DEFAULT NULL,
  `registerby` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rd_people`
--

INSERT INTO `rd_people` (`id`, `name`, `fname`, `gender`, `cnic`, `martial_status`, `dob`, `email`, `mobile1`, `mobile2`, `country`, `province`, `city`, `address1`, `address2`, `photo`, `ft_bio_matric1`, `ft_bio_matric2`, `registerby`, `created_at`, `updated_at`) VALUES
(1, 'Naseeb ul Hassan', 'Khushi Muhammad', 'Male', '3660321244409', 'Married', '2023-03-27', '', '343', '0', 'PAKISTAN', '1', '36', '', '', '3660321244409_', NULL, NULL, 0, '2023-04-10 22:43:36', NULL),
(2, 'Hassan', 'asdsad', 'Male', '3660321254897', 'Married', '2023-04-04', '', '0343-5180609', '', 'PAKISTAN', '1', '36', 'House # CB-121, St# 123, Rawalpindi', '', '', NULL, NULL, 1, '2023-04-10 23:14:16', NULL),
(3, 'Aftab ALi', 'asdsakd', 'Male', '3740556456466', 'Married', '2023-04-07', '', '0306-5724978', '', 'PAKISTAN', '1', '30', 'House abc, Street xzc, Rawalpindi', '', '', NULL, NULL, 1, '2023-04-10 23:25:22', NULL),
(4, 'hasdfg', 'sdkfdsjhf', 'Male', '78953454646546', 'Married', '2023-04-04', '', '0306-4667878', '', 'PAKISTAN', '1', '36', 'kjfjdshfkjhsdkjhfjkhsdkjf', '', '', NULL, NULL, 1, '2023-04-10 23:33:05', NULL),
(5, 'nsdfsfdsg', 'ghfgfd', 'Male', '645887898555', 'Single', '2023-04-06', '', '0031-2546556', '', 'PAKISTAN', '1', '36', 'kjgjhgjgjghjghjghkj', '', '', NULL, NULL, 1, '2023-04-10 23:39:50', NULL),
(6, 'Naseeb', 'fhgh', 'Male', '36603214445688', 'Married', '2023-04-04', '', '0345-6548799', '', 'PAKISTAN', '1', '36', 'hfgdfgdgdgjfgdjgdf yfghykufu', '', 'data-science.PNG', NULL, NULL, 1, '2023-04-11 10:34:28', NULL),
(7, 'Hassan', 'Ali', 'Male', '3660321548798', 'Married', '2023-04-13', '', '0343-5180609', '', 'PAKISTAN', '1', '36', 'House 12, St# abc', '', '', NULL, NULL, 3, '2023-04-27 08:14:20', NULL),
(8, 'Nadeem', 'Ali', 'Male', '3124566456464', 'Married', '2023-04-04', '', '0343-5187906', '', 'PAKISTAN', '1', '36', 'Islamabad, Pakistan', '', '', NULL, NULL, 3, '2023-04-27 08:16:48', NULL),
(9, 'Sugra Bibi', 'sdhas', 'Female', '3215465465465', 'Married', '2023-04-20', '', '0343-5180609', '', 'PAKISTAN', '1', '36', 'mdjbfbhdsfsdkf jdfbjdhs  sjdjfjksd', '', '', NULL, NULL, 1, '2023-04-27 15:01:28', NULL),
(10, 'naseeb', 'sodksad', 'Male', '2654654654654', 'Married', '2023-04-27', '', '0455-7545564', '', 'PAKISTAN', '1', '36', 'dsadsadsad', '', '', NULL, NULL, 1, '2023-04-27 15:15:14', NULL),
(11, 'Sugra bibi', 'JASDksad', 'Female', '4664564646465', 'Married', '2023-04-20', '', '0312-1654654', '', 'PAKISTAN', '1', '36', 'jdkjfb dfkjdsbf kjbjdjf dsjbn kdkasdkh fkasfkas', '', '', NULL, NULL, 1, '2023-04-27 15:33:28', NULL),
(12, 'Ahmed Ali', 'Akram', 'Male', '6646886786767', 'Single', '2023-04-21', '', '4466-6687878', '', 'PAKISTAN', '1', '36', 'Rawalpindi, Sadder', '', '', NULL, NULL, 1, '2023-04-27 15:52:04', NULL),
(13, 'jhffgh', 'mfgdgd', 'Male', '3165456456464', 'Single', '2023-04-28', '', '0343-5646556', '', 'PAKISTAN', '1', '36', 'hjfhgc fhfgfhkfvk khgghgdjg', '', '', NULL, NULL, 1, '2023-04-27 19:00:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rd_person_package`
--

CREATE TABLE `rd_person_package` (
  `id` int(10) NOT NULL,
  `personid` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `package_id` int(10) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `issued` varchar(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rd_person_package`
--

INSERT INTO `rd_person_package` (`id`, `personid`, `userid`, `package_id`, `description`, `issued`, `created_at`) VALUES
(1, 3, 1, 1, 'Flour 20kg', NULL, '2023-04-16 20:01:28'),
(2, 3, 1, 2, 'Ghee 5kg', NULL, '2023-04-16 20:01:28'),
(3, 3, 1, 3, 'Suger 5kg', NULL, '2023-04-16 20:01:28'),
(4, 3, 1, 4, 'Cash 1000', NULL, '2023-04-16 20:01:28'),
(5, 5, 1, 1, 'Flour 20kg', NULL, '2023-04-16 20:16:18'),
(6, 5, 1, 2, 'Ghee 5kg', NULL, '2023-04-16 20:16:18'),
(7, 6, 1, 1, 'Flour 20kg', NULL, '2023-04-16 20:17:20'),
(8, 6, 1, 4, 'Cash 1000', NULL, '2023-04-16 20:17:20'),
(9, 10, 1, 1, 'Flour 20kg', NULL, '2023-04-27 15:30:47'),
(10, 10, 1, 2, 'Ghee 5kg', NULL, '2023-04-27 15:30:47'),
(11, 10, 1, 3, 'Suger 5kg', NULL, '2023-04-27 15:30:47'),
(12, 10, 1, 4, 'Cash 1000', NULL, '2023-04-27 15:30:47'),
(13, 11, 1, 1, 'Flour 20kg', NULL, '2023-04-27 15:34:18'),
(14, 11, 1, 2, 'Ghee 5kg', NULL, '2023-04-27 15:34:18'),
(15, 11, 1, 4, 'Cash 1000', NULL, '2023-04-27 15:34:18'),
(16, 11, 1, 1, 'Flour 20kg', NULL, '2023-04-27 15:36:50'),
(17, 11, 1, 2, 'Ghee 5kg', NULL, '2023-04-27 15:36:50'),
(18, 11, 1, 4, 'Cash 1000', NULL, '2023-04-27 15:36:50'),
(37, 13, 1, 1, 'Flour 20kg', NULL, '2023-04-27 19:00:32'),
(38, 13, 1, 2, 'Ghee 5kg', NULL, '2023-04-27 19:00:32'),
(39, 13, 1, 4, 'Cash 1000', NULL, '2023-04-27 19:00:33');

-- --------------------------------------------------------

--
-- Table structure for table `rd_province`
--

CREATE TABLE `rd_province` (
  `id` int(10) NOT NULL,
  `pname` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rd_province`
--

INSERT INTO `rd_province` (`id`, `pname`) VALUES
(1, 'Punjab'),
(2, 'Sindh'),
(3, 'Khyber Pakhtunkhwa'),
(4, 'Balochistan'),
(5, 'AJK'),
(6, 'Gilgit Baltistan'),
(7, 'FATA'),
(8, 'Federal Capital');

-- --------------------------------------------------------

--
-- Table structure for table `rd_users`
--

CREATE TABLE `rd_users` (
  `uid` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `userstatus` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rd_users`
--

INSERT INTO `rd_users` (`uid`, `name`, `email`, `password`, `usertype`, `userstatus`, `created_at`, `updated`) VALUES
(1, 'Naseeb ul Hassan', 'naseeb@gmail.com', 'naseeb', 'User', 1, '2023-05-17 05:34:38', NULL),
(3, 'Admin', 'admin@gmail.com', 'admin123', 'Admin', 1, '2023-04-13 11:20:20', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_person_package`
-- (See below for the actual view)
--
CREATE TABLE `v_person_package` (
`id` int(10)
,`personid` int(10)
,`name` varchar(100)
,`cnic` varchar(20)
,`gender` varchar(15)
,`mobile1` varchar(15)
,`1` varchar(100)
,`2` varchar(100)
,`3` varchar(100)
,`4` varchar(100)
,`5` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure for view `v_person_package`
--
DROP TABLE IF EXISTS `v_person_package`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_person_package`  AS SELECT `pk`.`id` AS `id`, `pk`.`personid` AS `personid`, `p`.`name` AS `name`, `p`.`cnic` AS `cnic`, `p`.`gender` AS `gender`, `p`.`mobile1` AS `mobile1`, min(case when `pk`.`package_id` = 1 then `pk`.`description` else NULL end) AS `1`, min(case when `pk`.`package_id` = 2 then `pk`.`description` else NULL end) AS `2`, min(case when `pk`.`package_id` = 3 then `pk`.`description` else NULL end) AS `3`, min(case when `pk`.`package_id` = 4 then `pk`.`description` else NULL end) AS `4`, min(case when `pk`.`package_id` = 5 then `pk`.`description` else NULL end) AS `5` FROM (`rd_person_package` `pk` join `rd_people` `p`) WHERE `pk`.`personid` = `p`.`id` GROUP BY `pk`.`personid` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cnic`
--
ALTER TABLE `cnic`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq` (`cnic`),
  ADD KEY `cnicindex` (`cnic`);

--
-- Indexes for table `rd_city`
--
ALTER TABLE `rd_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rd_country`
--
ALTER TABLE `rd_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rd_inventory_history`
--
ALTER TABLE `rd_inventory_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rd_issued_package`
--
ALTER TABLE `rd_issued_package`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custid` (`custid`),
  ADD KEY `invid` (`invid`),
  ADD KEY `userId` (`userid`);

--
-- Indexes for table `rd_packages`
--
ALTER TABLE `rd_packages`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `rd_packages_names`
--
ALTER TABLE `rd_packages_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rd_people`
--
ALTER TABLE `rd_people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rd_person_package`
--
ALTER TABLE `rd_person_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rd_province`
--
ALTER TABLE `rd_province`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rd_users`
--
ALTER TABLE `rd_users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cnic`
--
ALTER TABLE `cnic`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rd_city`
--
ALTER TABLE `rd_city`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `rd_country`
--
ALTER TABLE `rd_country`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rd_inventory_history`
--
ALTER TABLE `rd_inventory_history`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rd_issued_package`
--
ALTER TABLE `rd_issued_package`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rd_packages`
--
ALTER TABLE `rd_packages`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rd_packages_names`
--
ALTER TABLE `rd_packages_names`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rd_people`
--
ALTER TABLE `rd_people`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rd_person_package`
--
ALTER TABLE `rd_person_package`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `rd_province`
--
ALTER TABLE `rd_province`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rd_users`
--
ALTER TABLE `rd_users`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rd_issued_package`
--
ALTER TABLE `rd_issued_package`
  ADD CONSTRAINT `rd_issued_package_ibfk_1` FOREIGN KEY (`custid`) REFERENCES `rd_people` (`id`),
  ADD CONSTRAINT `rd_issued_package_ibfk_2` FOREIGN KEY (`custid`) REFERENCES `rd_people` (`id`),
  ADD CONSTRAINT `rd_issued_package_ibfk_3` FOREIGN KEY (`invid`) REFERENCES `rd_inventory_history` (`id`),
  ADD CONSTRAINT `rd_issued_package_ibfk_4` FOREIGN KEY (`userid`) REFERENCES `rd_users` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
