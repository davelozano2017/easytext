-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2017 at 08:28 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easytext`
--

-- --------------------------------------------------------

--
-- Table structure for table `et_accounts_tbl`
--

CREATE TABLE `et_accounts_tbl` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `security_code` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `et_accounts_tbl`
--

INSERT INTO `et_accounts_tbl` (`id`, `fullname`, `email`, `contact`, `username`, `password`, `security_code`, `status`, `role`, `date`) VALUES
(32, 'John David Lozano', 'lozanojohndavid@gmail.com', '9555773952', 'dave.lozano2016', '$2y$10$1ptcvMVKYS7Cao78xoA7XeKCHuQD0DwOdh.w0sA0kDAEiwV8RhmE6', 492509, 0, 1, 'July 18,  2017 03:43 PM'),
(37, 'Jeddahlyn Cabuga', 'cabugajeddahlyn@gmail.com', '9265691158', 'jeddahlyn.cabuga', '$2y$10$j3rYIV92VfY9ZpJbPtoB0ubaKQzb1BH3La6THKRa6LiZmAFwPSrCO', 675370, 0, 1, 'July 19,  2017 08:56 PM'),
(38, 'demo', 'demo@gmail.com', '1234567890', 'demonstration', '$2y$10$buGH.p86IJOndjcYco7wx.DFYbpSgnvowVtLdLm5dK2N4p/qwQs72', 143446, 0, 1, 'July 20,  2017 04:57 AM');

-- --------------------------------------------------------

--
-- Table structure for table `et_contacts_tbl`
--

CREATE TABLE `et_contacts_tbl` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `blocklist` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `et_contacts_tbl`
--

INSERT INTO `et_contacts_tbl` (`id`, `userid`, `fullname`, `contact`, `blocklist`) VALUES
(33, 32, 'Jeddahlyn Cabuga', '9265691152', 1),
(35, 32, 'Dave', '9555773952', 1),
(36, 32, 'Jufrey', '9187791432', 1),
(37, 37, 'Dave', '9555773952', 1);

-- --------------------------------------------------------

--
-- Table structure for table `et_messages_tbl`
--

CREATE TABLE `et_messages_tbl` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `message` varchar(10000) NOT NULL,
  `archieve` int(11) NOT NULL,
  `important` int(11) NOT NULL,
  `message_code` int(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `et_messages_tbl`
--

INSERT INTO `et_messages_tbl` (`id`, `userid`, `contact`, `message`, `archieve`, `important`, `message_code`, `date`) VALUES
(16, 32, '9265691152', 'asdasdasd', 1, 0, 478718, 'July 21,  2017 12:39 PM'),
(17, 32, '9555773952', 'asdasda', 0, 1, 651583, 'July 21,  2017 12:39 PM'),
(18, 37, '9555773952', 'asdasd', 0, 1, 423900, 'July 21,  2017 12:40 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `et_accounts_tbl`
--
ALTER TABLE `et_accounts_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `et_contacts_tbl`
--
ALTER TABLE `et_contacts_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `et_messages_tbl`
--
ALTER TABLE `et_messages_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `et_accounts_tbl`
--
ALTER TABLE `et_accounts_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `et_contacts_tbl`
--
ALTER TABLE `et_contacts_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `et_messages_tbl`
--
ALTER TABLE `et_messages_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
