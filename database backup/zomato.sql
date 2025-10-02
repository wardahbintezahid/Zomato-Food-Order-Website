-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2025 at 05:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zomato`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `name`) VALUES
(1, 'admin@gmail.com', '123456', 'Sabrina Islam');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_category` varchar(255) NOT NULL,
  `food_price` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `food_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `category_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `category_image`, `category_desc`) VALUES
(4, 'Pizza', 'category-1731831346.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i'),
(5, 'Burger', 'category-1731831382.png', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Diam himenaeos lectus magna nunc ullamcorper a malesuada. Ligula hac rutrum eleifend fames ex. Porttitor lacus primis fermentum felis at nascetur laoreet ut. Nunc litora quisque posuere volutpat fames.'),
(9, 'Tacos', 'category-1732628727.png', 'Delicious buritto!'),
(10, 'Momos', 'category-1732628828.png', 'Delicious Momos');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `driver_first_name` varchar(255) NOT NULL,
  `driver_last_name` varchar(255) DEFAULT NULL,
  `driver_email` varchar(255) NOT NULL,
  `driver_phone` varchar(255) DEFAULT NULL,
  `driver_image` text NOT NULL,
  `driver_car_name` varchar(255) NOT NULL,
  `driver_car_number` varchar(255) NOT NULL,
  `driver_car_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `driver_first_name`, `driver_last_name`, `driver_email`, `driver_phone`, `driver_image`, `driver_car_name`, `driver_car_number`, `driver_car_image`) VALUES
(1, 'John', 'Doe', 'john.doe@gmail.com', '017411545887', 'driver-1731834012.jpg', 'Bajaj Honda', 'GH-444548', 'car-1731834012.png');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_price` int(11) NOT NULL,
  `food_discount_price` int(11) NOT NULL,
  `food_category` varchar(255) NOT NULL,
  `food_quantity` int(11) NOT NULL,
  `food_image` text NOT NULL,
  `food_desc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `food_name`, `food_price`, `food_discount_price`, `food_category`, `food_quantity`, `food_image`, `food_desc`) VALUES
(1, 'Korean Honey Chicken Fry', 280, 250, 'Chicken Fry', 80, 'food-1731835344.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(2, 'Italian Maccaroni Pizza (Oven baked)', 590, 0, 'Pizza', 6, 'food-1731836097.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book'),
(4, 'Beef Burrito', 280, 250, 'Buritto', 60, 'food-1731865426.jpg', 'This is a very delicious buritto!'),
(5, 'Chicken Momo', 230, 200, 'Momos', 80, 'food-1732628883.png', 'Delicious Chicken Momo');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `food_image` text NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `order_payment_method` varchar(255) NOT NULL,
  `order_delivary_status` varchar(255) NOT NULL,
  `order_amount` int(11) NOT NULL,
  `order_delivary_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `food_image`, `order_code`, `order_date`, `order_payment_method`, `order_delivary_status`, `order_amount`, `order_delivary_address`) VALUES
(19, 'food-1731835344.png', '71070-60821', '26/11/2024', 'Cash On Delivery', '1', 250, 'Mirpur, Dhaka 1216'),
(27, 'food-1731835344.png', '33099-86375', '23/05/2025', 'Cash On Delivery', '1', 500, ''),
(28, 'food-1731865426.jpg', '62438-35269', '23/05/2025', 'Cash On Delivery', '1', 250, ''),
(29, 'food-1731835344.png', '33755-23503', '20/08/2025', 'Cash On Delivery', '1', 500, ''),
(30, 'food-1731836097.png', '64417-36837', '20/08/2025', 'Cash On Delivery', '0', 590, ''),
(31, 'food-1732628883.png', '47938-16557', '20/08/2025', 'Cash On Delivery', '0', 200, ''),
(32, 'food-1731835344.png', '61756-46093', '20/08/2025', 'Cash On Delivery', '0', 250, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_first_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_first_name`, `user_last_name`, `user_email`, `user_phone`, `user_image`, `user_password`) VALUES
(2, 'Monica', 'Ramboo', '01718638686', 'monica.ramboo.420@yahoo.com', 'user-1731838616.png', 'Monica'),
(3, 'Akash', 'Islam', '01718638686', 'akashdth@gmail.com', 'user-1731842425.png', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
