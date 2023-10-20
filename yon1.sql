-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2023 at 08:47 AM
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
-- Database: `yon1`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`product_id`, `ip_address`, `quantity`) VALUES
(7, '::1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'iPhone'),
(2, 'iPad'),
(3, 'Watch'),
(4, 'Mac'),
(5, 'Aksesoris'),
(8, 'Lego');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `product_image1`, `product_image2`, `product_price`, `date`, `status`) VALUES
(1, 'Wireless Charger', '3 in 1 Wireless Charger', 'Charger', 5, 'wirelessCharger-1.jpg', 'wirelessCharger-2.jpg', '1.199.000', '2023-10-16 01:18:15', 0),
(2, 'iPhone 13', 'Rp 13.899.000', 'iPhone', 1, 'iphone13-1.jpg', 'iphone13-2.jpg', '13.899.000', '2023-10-12 12:16:37', 0),
(3, 'iPhone 13 Pro', 'Rp 15.521.000', 'iPhone', 1, 'iphone13Pro-1.jpg', 'iphone13Pro-2.jpg', '15.521.000', '2023-10-12 12:18:24', 0),
(4, 'iPad 6 Pro', 'Rp 17.000.000', 'iPad', 2, 'ipad6Pro-1.jpg', 'ipad6Pro2.jpg', '17.000.000', '2023-10-12 12:19:10', 0),
(6, 'Apple Watch Ultra with Trail Loop', 'Rp 13.999.000', 'Watch', 3, 'applewatchultra-1.jpg', 'applewatchultra-2.jpg', '13.999.000', '2023-10-12 12:20:55', 0),
(7, 'AirPods Max', 'Rp 9.499.000', 'Aksesoris', 5, 'airpodsMax.jpg', 'airpodsMax.jpg', '9.499.000', '2023-10-12 12:21:31', 0),
(8, 'iPad', 'Ipaddd', 'iPad', 2, 'ipad9Air-1.jpg', 'ipad9Air-2.jpg', 'Rp 12.000.000', '2023-10-16 04:38:17', 0),
(9, 'IPAD', 'IPAD10', 'IPAD', 2, 'ipad10Air-1.jpg', 'ipad10Air-2.jpg', 'Rp 15.000.000', '2023-10-16 04:40:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(5, 3, 5014, 89982461, 2, '2023-10-15 16:27:34', 'pending'),
(6, 3, 1, 1501626077, 1, '2023-10-16 01:18:42', 'pending'),
(7, 3, 1, 455734930, 1, '2023-10-16 01:21:14', 'pending'),
(8, 3, 1, 1898940787, 1, '2023-10-16 01:32:34', 'pending'),
(9, 3, 1, 1960358024, 1, '2023-10-16 04:22:32', 'pending'),
(10, 3, 11, 828379691, 2, '2023-10-16 04:29:25', 'pending'),
(11, 3, 9, 1867559619, 1, '2023-10-16 04:36:48', 'pending'),
(12, 3, 19, 800567648, 1, '2023-10-18 06:45:57', 'pending'),
(13, 3, 19, 776455715, 1, '2023-10-18 07:03:39', 'pending'),
(14, 3, 19, 348545243, 1, '2023-10-19 07:20:27', 'pending'),
(15, 3, 19, 888605553, 1, '2023-10-19 08:07:24', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(100) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(3, 'admin', 'admin@gmail.com', '$2y$10$So5BHLCGd6R/ex0bEiG9FOCVysHWH80OAV8fOL4eUis8I0gSr6LfS', 'man-2.png', '::1', 'hahahaha', '08123456778'),
(4, 'admin1', 'admin1@gmail.com', '$2y$10$fH0UtlijLsMv4gkSTh4yMeuiNcZTT2/7QToHwYaRAKv7KIZK7537W', 'man-1.png', '::1', 'qwqwqwqw', '136523611');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
