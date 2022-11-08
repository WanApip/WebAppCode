-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2022 at 10:47 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pakmatwestern_restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(255) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(7) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `ic` varchar(15) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `customer_address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `ic`, `phone_no`, `customer_address`) VALUES
(10, 'MUHAMMAD AMIN SHAUKY', '030117070299', '0126672241', 'Padang Serai, Kulim, Kedah'),
(11, 'MUHAMMAD LUQMAN', '030529023455', '0175649980', 'Bertam, Kepala Batas, Pulau Pinang'),
(12, 'MUHAMMAD FARIZ ZAMRI', '030622070988', '0136672210', 'Jawi, Pulau Pinang'),
(13, 'NUR AFIQAH', '040530072011', '0175992314', 'Balik Pulau, Pulau Pinang'),
(14, 'NUR IZZATI', '030710075543', '0192280990', 'Alor Setar,  Kedah'),
(15, 'AHMAD HAIKAL AFENDY', '980231078899', '0138907543', 'Ipoh, Perak'),
(16, 'AMIRUL FARUQI', '020517020211', '0135300211', 'Bukit Mertajam, Pulau Pinang'),
(17, 'AHMAD MUIZZUDDIN', '0312455Y254647', '011234567', 'BUKIT MERTAJAM,PULAU PINANG');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(7) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `position` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `name`, `phone_no`, `email`, `position`, `password`) VALUES
(9, 'FAIZ ZAINAL @ RAHIMY', '0135667889', 'faizzainal@gmail.com', 'Staff', '0707'),
(10, 'AMIRUL FARUQI', '0175552341', 'faruqi@gmail.com', 'Staff', '8889'),
(11, 'AISY ISKANDAR', '0115660921', 'aisyiskandar@gmail.com', 'Staff', '5644'),
(12, 'WAN AFIF', '0135300211', 'afif030524@gmail.com', 'Admin', '1234'),
(13, 'ZULHELMI MALIK', '0178092144', 'zulhelmimalik@gmail.com', 'Manager', '6788'),
(14, 'MUHAMMAD HAFIZ', '0124456788', 'hafiz@gmail.com', 'Staff', '1234'),
(15, 'Asyraf', '0124556789', 'asyraf@gmail.com', 'Staff', '12334');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
