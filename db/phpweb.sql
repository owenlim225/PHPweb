-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2025 at 05:31 AM
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
-- Database: `phpweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `is_purchased` tinyint(1) DEFAULT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `instructor` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_title`, `description`, `instructor`, `price`, `image`, `created_at`) VALUES
(1, 'Leadership & Team Management for Creative Projects', 'Develop leadership skills tailored for creative industries. Learn how to inspire teams, manage conflicts, delegate tasks, and foster a productive work environment.', 'Project Management & Leadership', 10000.00, 'course-1.png', '2025-03-30 10:37:11'),
(2, 'Mastering Agile & Scrum for Game Development', 'Learn how to implement Agile and Scrum methodologies to manage game projects efficiently, from sprint planning to backlog refinement and iterative development.', 'Project Management & Leadership', 6900.00, 'course-2.png', '2025-03-30 10:37:47'),
(8, 'Motion Graphics & VFX for Games', 'Create stunning visual effects, animated UI elements, and dynamic motion graphics using After Effects, Spine, and Shader Graph.', 'Graphic Design & Digital Art', 24000.00, 'product4.png', '2025-04-01 09:14:22'),
(9, 'Game Music Composition: From Concept to Final Mix', 'Learn how to compose memorable game soundtracks, covering melody, harmony, orchestration, and digital audio production techniques.', 'Music Production & Sound Design', 24000.00, 'product5.png', '2025-04-01 09:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `country` varchar(100) NOT NULL,
  `payment_method` enum('gcash','maya','grabpay') NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `order_status` varchar(50) NOT NULL DEFAULT '''pending''',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `full_name`, `email`, `mobile`, `country`, `payment_method`, `total_amount`, `order_status`, `created_at`) VALUES
(2, 11, 'iop', 'asd@gmail.com', '+639703017634', 'Philippines', 'maya', 6900.00, 'completed', '2025-04-02 15:45:51'),
(3, 11, 'iop', 'asd@gmail.com', '+639703017634', 'Philippines', 'grabpay', 10000.00, 'completed', '2025-04-02 15:48:35'),
(4, 11, 'iop', 'asd@gmail.com', '+639703017634', 'Philippines', 'maya', 6900.00, 'completed', '2025-04-02 15:49:22'),
(5, 11, 'zczxc', 'asd@gmail.com', '+639703017634', 'Philippines', 'grabpay', 92800.00, 'completed', '2025-04-02 15:51:50'),
(6, 11, 'zczxc', 'asd@gmail.com', '+639703017634', 'Philippines', 'gcash', 10000.00, 'completed', '2025-04-02 16:00:10'),
(7, 11, '123456', 'asd@gmail.com', '+639703017634', 'Philippines', 'gcash', 6900.00, 'completed', '2025-04-02 16:09:01'),
(8, 11, 'zczxc', 'asd@gmail.com', '+639703017634', 'Philippines', 'grabpay', 54900.00, 'completed', '2025-04-02 16:53:00'),
(9, 15, 'vbn', 'vbn@gmail.com', '+639703017634', 'Philippines', 'gcash', 23800.00, 'completed', '2025-04-02 16:59:38'),
(12, 13, 'iop', 'limosnerosherwin@gmail.com', '+639703017634', 'Philippines', 'gcash', 10000.00, 'completed', '2025-04-03 06:41:53'),
(13, 12, 'iop', 'iop@gmail.com', '+639703017634', 'Philippines', 'gcash', 10000.00, 'completed', '2025-04-03 07:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `purchased_courses`
--

CREATE TABLE `purchased_courses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `purchased_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchased_courses`
--

INSERT INTO `purchased_courses` (`id`, `user_id`, `course_id`, `order_id`, `purchased_at`) VALUES
(1, 11, 1, 6, '2025-04-02 16:00:10'),
(2, 11, 2, 7, '2025-04-02 16:09:01'),
(6, 15, 1, 9, '2025-04-02 16:59:38'),
(7, 15, 2, 9, '2025-04-02 16:59:38'),
(15, 13, 1, 12, '2025-04-03 06:41:53'),
(16, 12, 1, 13, '2025-04-03 07:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(90) NOT NULL,
  `last_name` varchar(90) NOT NULL,
  `contact` int(11) NOT NULL,
  `email` varchar(90) NOT NULL,
  `password` varchar(90) NOT NULL,
  `is_admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `contact`, `email`, `password`, `is_admin`) VALUES
(4, '123', 'asd', 214, 'zxc@gmail.com', '$2y$10$ADFby4HOyjh9A6dhtL2AqOO5dsVgnmhE1xVe9W3zendNf44/a2IgC', 1),
(10, 'ertqwe', 'qwe', 1231231231, 'qwe@gmail.com', '$2y$10$HYX205aQfBbQRZRuWmsggOv17BR7PeMgEBtGwcRHTOoPVWoZlKA0W', 0),
(11, 'qwe', 'qwe', 2147483647, 'asd@gmail.com', '$2y$10$43rL.d34evdIDPqUKu3B.OeD6mN2VoVi8/TwvZQbpu3qZGkruEXz.', 0),
(12, 'iop', 'iop', 89089089, 'iop@gmail.com', '$2y$10$xbEY2uSNWsY7mYD4pPP11esf7Av1bANF2utI3n80yDgcUAFXqG12u', 0),
(13, 'Sherwin', 'limosnero', 2147483647, 'limosnerosherwin@gmail.com', '$2y$10$2NDa1uZUHQPuLTFFFdjXneCRY5tqKFq59p8.Ie8nns0N.AlD.jAc6', 0),
(15, 'vbn', 'vbn', 2147483647, 'vbn@gmail.com', '$2y$10$E8TN07OsuFIscB4ljhs1uOYhI8zz8pYwxzRsp6TeC/.EqT1ptHnqu', 1),
(16, 'admin', 'admin', 2147483647, 'admin@gmail.com', '$2y$10$HixlXLeh/qqTKiqXBDlh.Oldta9.mR5AQICubHegonNvir7fvav2u', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `purchased_courses`
--
ALTER TABLE `purchased_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `purchased_courses`
--
ALTER TABLE `purchased_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `purchased_courses`
--
ALTER TABLE `purchased_courses`
  ADD CONSTRAINT `purchased_courses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchased_courses_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchased_courses_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
