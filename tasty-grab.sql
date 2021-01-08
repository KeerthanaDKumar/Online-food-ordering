-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2021 at 05:49 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasty-grab`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback`) VALUES
('tastes good'),
('Nice work'),
('chicken pizza tastes good');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `pizza_name` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` float NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `email_id`, `pizza_name`, `area`, `qty`, `total`, `time`) VALUES
(8, 'dvpk511@gmail.com', 'Mushroom Pizza', 'Banashankari', 1, 400, '2021-01-03 17:54:49'),
(9, 'dvpk511@gmail.com', 'Mushroom Pizza', 'Kengeri', 1, 400, '2021-01-03 18:12:51'),
(10, 'dvpk511@gmail.com', 'Chicken Pizza', 'Kengeri', 1, 450, '2021-01-03 18:14:18'),
(11, 'dvpk511@gmail.com', 'Corn Pizza', 'Kengeri', 1, 100, '2021-01-03 18:15:20'),
(12, 'dvpk511@gmail.com', 'Veg Pizza', 'Kengeri', 3, 1, '2021-01-03 18:16:12'),
(13, 'dvpk511@gmail.com', 'Mushroom Pizza', 'Kengeri', 1, 400, '2021-01-03 18:22:26'),
(18, 'keerthana5112k@gmail.com', 'Chicken Pizza', 'vijayanagar', 1, 450, '2021-01-08 01:44:13'),
(19, 'keerthana5112k@gmail.com', 'Chicken Pizza', 'Banashankar 2nd stage', 1, 450, '2021-01-08 01:46:22'),
(23, 'veda@gmail.com', 'Chicken Pizza', 'Banashankar 2nd stage', 2, 900, '2021-01-08 02:43:28'),
(24, 'veda@gmail.com', 'Chicken Pizza', 'vijayanagar', 2, 900, '2021-01-08 02:45:56'),
(25, 'veda@gmail.com', 'Chicken Pizza', 'Banashankari', 2, 900, '2021-01-08 02:52:20'),
(26, 'veda@gmail.com', 'Corn Pizza', 'vijayanagar', 2, 200, '2021-01-08 02:57:15'),
(27, 'keerthana5112k@gmail.com', 'Corn Pizza', 'Maruthinagar', 2, 200, '2021-01-08 02:58:08'),
(28, 'keerthana5112k@gmail.com', 'Panner Pizza', 'vijayanagar', 3, 387, '2021-01-08 03:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `pizza`
--

CREATE TABLE `pizza` (
  `pizza_name` varchar(255) NOT NULL,
  `cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pizza`
--

INSERT INTO `pizza` (`pizza_name`, `cost`) VALUES
('Chicken Pizza', 450),
('Corn Pizza', 100),
('Margherita', 250),
('Panner Pizza', 129),
('Veg Pizza', 390);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `ph_no` varchar(10) NOT NULL,
  `user_passwd` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_name`, `email_id`, `ph_no`, `user_passwd`, `area`) VALUES
('KEERTHANA D', 'dvpk511@gmail.com', '6361521713', 'd702af1d701d104102bc3b3c4292a803', 'Maruthinagar'),
('THANA D', 'dvpk5@gmail.com', '9164734140', 'c44755c3379313db173e53c3e8fb6701', 'Kengeri'),
('KEERTHANA D', 'keerthana5112k@gmail.com', '9164734147', '202cb962ac59075b964b07152d234b70', 'Kengeri'),
('DilliKumar B', 'tastygrab@gmail.com', '7353330985', 'c7217b04fe11f374f9a6737901025606', 'T Nagar'),
('Veda', 'veda@gmail.com', '8147212602', '202cb962ac59075b964b07152d234b70', 'Yashwanthpur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`pizza_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
