-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2017 at 12:42 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `contact` int(11) NOT NULL,
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
(1, 'John David Lozano', 'lozanojohndavid@gmai.com', 2147483647, 'dave.lozano2016', '$2y$10$1lXipi01.NlTjosWCCUlI.hE5rmcLzbRqUnDKAbCDU5v7InBEFKma', 34800, 1, 1, 'June 27,  2017 03:22 AM'),
(2, 'adasdasd', 'lozano2johndavid@gmai.com', 1231121111, 'dave.lozanos2016', '$2y$10$WqA3UGBkCRCNhXd5kuAX1OitzyOPFvIMWE6j37KXGn6biQOqmgicm', 24426, 1, 1, 'June 27,  2017 03:26 AM'),
(3, 'asdasd', 'lozanojaohndavid@gmai.com', 1919191199, '1919191199', '$2y$10$7mZLjQM0WOPOT3X/afRG2uJIzPkY3Y1bhnOFKYdJOBEvo.fiq/SOa', 71195, 1, 1, 'June 27,  2017 03:42 AM'),
(4, 'asdasd', 'lozanojaohndavid@gmail.com', 1919191199, '19191911995', '$2y$10$wA.twSKBL5YlWiE/Hu2NfOLQITfOCgQr4YEotll4P8UBGWO2iTS46', 75924, 1, 1, 'June 27,  2017 04:13 AM'),
(5, 'asdasd', 'lozanojaohandavid@gmail.com', 1919191199, '1919191199aa5', '$2y$10$UaIFmOPhkEN7W2pBv8PcLeyjS9n4h.CHClw0WRSDrLG37sKXvwKoe', 34020, 1, 1, 'June 27,  2017 04:13 AM'),
(6, 'asdasd', 'lozanojaoahandavid@gmail.com', 1919191199, '1919191199aaa5', '$2y$10$Varh9EsylZfWy1yzRelkeumW4yAnUECys677VVUNibEsrPP4Kxz1y', 22918, 1, 1, 'June 27,  2017 04:14 AM'),
(7, 'asdasd', 'lozanojaoahanadavid@gmail.com', 1919191199, '1919191199aaaasd5', '$2y$10$UZW0d6ecEhf0LIRbcXs2hOV8JBn3BfnlrN0sQfEeV6vkiHjP.RzGG', 61535, 1, 1, 'June 27,  2017 04:14 AM'),
(8, 'asdasd', 'lozanojaoahanaddavid@gmail.com', 1919191199, '1919191199aaaaasd5', '$2y$10$1dM01jwG7iKZPlOzURbroeBR0GCULu6ZE1ULyrNn2Cn8tLYUfEn.W', 58314, 1, 1, 'June 27,  2017 04:15 AM'),
(9, 'asdasd', 'lozanojaoahanad2david@gmail.com', 1919191199, '1919191199aaaaasd25', '$2y$10$lySj017kSUIr43g8J4NNQeCQrdF9yJdjb6xfqcUX7H4CrIskGTJca', 20884, 1, 1, 'June 27,  2017 04:16 AM'),
(10, 'asdasd', 'lozanojaoahaasdnad2david@gmail.com', 1919191199, '1919191199aaaaaasdsd25', '$2y$10$THfux1kR1a3edTM8y/qZkOY6PqY.Eph7wpHniZ69qp0UvwSmU27Ee', 41802, 1, 1, 'June 27,  2017 04:17 AM'),
(11, 'asdasd', 'lozanojaoahaas1dnad2david@gmail.com', 1919191199, '1919191199aa1aaaasdsd25', '$2y$10$2wKwvKN5aELdC0xC630gi.eaRo5mGNMpo//8L3x92KgyrsQuUZNAO', 76657, 1, 1, 'June 27,  2017 04:18 AM'),
(12, 'asdasd', 'lozanoasdjaoahaas1dnad2david@gmail.com', 1919191199, '1919191199aa1aaaaasdsdsd25', '$2y$10$78mB/MhI7xv4Z2k/MDiTXOJ/i8Q3bobfriFl1/3zxIUqhR6E7a81a', 27191, 1, 1, 'June 27,  2017 04:19 AM'),
(13, 'asdasd', 'lozanoasdjaoahaaas1dnad2david@gmail.com', 1919191199, '1919191199aa1aaaaaasdsdsd25', '$2y$10$Yoia4JFMdNyg3D4IbhMQSObZQNufGZJQ9jLfz4KekRld6WCaBTXDK', 72677, 1, 1, 'June 27,  2017 04:21 AM'),
(14, 'asdasdadsasd', 'aa@aa.co', 1234541111, 'dave.lozano201s6', '$2y$10$YfCIrXFxLoLpWua14oOiSunEr6HIWck5UyqH2C3RRqI6AifaGn6RW', 95433, 1, 1, 'June 27,  2017 04:26 AM'),
(15, 'asdasdadsasd', 'aa@aa.coasd', 1234541111, 'dave.lozano201s6a', '$2y$10$Xj47pfZ2pieoEjNHNLV.KuoH2YGXGf8WkOdTgICbXBTLN6G8.YQiW', 71042, 1, 1, 'June 27,  2017 04:28 AM'),
(16, 'asdasdadsasd', 'aa@aaa.coasd', 1234541111, 'dave.lozano201s6aa', '$2y$10$/DC5m3JGZc0YdlNR9E0q8.QEgaAWNw8yVqpHbbvgo5MHLYg7u85z2', 64429, 1, 1, 'June 27,  2017 04:29 AM'),
(17, 'asdasdadsasd', 'aa@aaa.acoasd', 1234541111, 'dave.lozano20a1s6aa', '$2y$10$N2fxsFf7zH0bJTJguXbOHuXicij9VKkevzNd2nUQJAC1mfs4xE5Je', 19024, 1, 1, 'June 27,  2017 04:30 AM'),
(18, 'zczcz', 'aa@aaaaa.co', 2147483647, '2828282828', '$2y$10$oQSkLDnhpgOnx/0t8O61xetZzhllW5e62eH.ynibzzDq9Hdb1OS6y', 35596, 1, 1, 'June 27,  2017 04:44 AM'),
(19, 'asdasd', 'aa@2aa.co', 2147483647, '28282828282', '$2y$10$1EDu8rSCJYQ4QxICyOvxU.7Eh/u8o1ZrL94enZ11.7/GWEBwPsFFu', 20748, 1, 1, 'June 27,  2017 04:45 AM'),
(20, 'John David lozano', 'lozaanojohndavid@gmai.com', 922255545, 'dave.lozanoa2016', '$2y$10$J19ODG4rt/.Sr8tIJBFEHOKYTY.mEUDOxxinJ/okl3C/PvUj7/CGW', 85277, 1, 1, 'June 27,  2017 04:49 AM'),
(21, 'asdasdasd', 'lozanaojohndavid@gmai.com', 955555555, 'dave.lozanao2016', '$2y$10$e8aG8seO5JtqcFWvJtkC/uDNxE4eLdnKa3FzqN4772D.mHbxiX6Q6', 75980, 1, 1, 'June 27,  2017 04:57 AM'),
(22, 'asdasdasd', 'lozanaojohnadavid@gmai.com', 955555555, 'dave.lozanao2a016', '$2y$10$d6shGjQMGvI.k3oehykrzuGwtz5em47T5ildRYJRK8rfh0Vzdx.eC', 95164, 1, 1, 'June 27,  2017 04:57 AM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `et_accounts_tbl`
--
ALTER TABLE `et_accounts_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `et_accounts_tbl`
--
ALTER TABLE `et_accounts_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
