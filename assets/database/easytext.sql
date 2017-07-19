-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2017 at 09:57 PM
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
(37, 'Jeddahlyn Cabuga', 'cabugajeddahlyn@gmail.com', '9265691158', 'jeddahlyn.cabuga', '$2y$10$j3rYIV92VfY9ZpJbPtoB0ubaKQzb1BH3La6THKRa6LiZmAFwPSrCO', 675370, 0, 1, 'July 19,  2017 08:56 PM');

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
(11, 32, 'Jeddahlyn Cabuga', '9265691158', 1),
(13, 37, 'John David', '9555773952', 1),
(21, 37, 'Jade Batal', '9222222222', 1),
(22, 37, 'Shinjie Calica', '9222222222', 1);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `et_accounts_tbl`
--
ALTER TABLE `et_accounts_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `et_contacts_tbl`
--
ALTER TABLE `et_contacts_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
