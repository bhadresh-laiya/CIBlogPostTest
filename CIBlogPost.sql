-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 15, 2019 at 04:35 PM
-- Server version: 5.7.27-0ubuntu0.16.04.1
-- PHP Version: 7.1.31-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CIBlogPost`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `categories` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `user_id`, `title`, `description`, `categories`, `slug`, `created_at`) VALUES
(1, 3, 'Senior Developer', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1,3,12,13,14,15,16', 'senior-developer', '2019-11-15 16:16:11');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `created_at`) VALUES
(1, 'Corporate', 'corporate', '2019-11-15 15:45:20'),
(2, 'Personal Brand', 'personal-brand', '2019-11-15 15:45:20'),
(3, 'Niche', 'niche', '2019-11-15 15:45:55'),
(4, 'Affiliate', 'affiliate', '2019-11-15 15:45:55'),
(5, 'Artist', 'artist', '2019-11-15 15:46:29'),
(6, 'Case Study', 'case-study', '2019-11-15 15:46:29'),
(7, 'Finance', 'finance', '2019-11-15 15:46:56'),
(8, 'Music', 'music', '2019-11-15 15:46:56'),
(9, 'Sports', 'sports', '2019-11-15 15:47:24'),
(10, 'Food', 'food', '2019-11-15 15:47:24'),
(11, 'Games', 'games', '2019-11-15 15:47:53'),
(12, 'Travel', 'travel', '2019-11-15 15:47:53'),
(13, 'Entertainment', 'entertainment', '2019-11-15 15:48:11'),
(14, 'Fashion', 'fashion', '2019-11-15 15:48:11'),
(15, 'Politics', 'politics', '2019-11-15 15:48:36'),
(16, 'Lifestyle', 'lifestyle', '2019-11-15 15:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `created_at`) VALUES
(1, 'Bhadresh', 'Laiya', 'bblaiya@gmail.com', '73b94d0fc3e39e453e9174ed469d4ee9', '2019-11-15 15:15:37'),
(2, 'john', 'Laiya', 'johndoe@gmail.com', '6579e96f76baa00787a28653876c6127', '2019-11-15 15:16:42'),
(3, 'john', 'Laiya', 'johndoe2@gmail.com', '6579e96f76baa00787a28653876c6127', '2019-11-15 15:24:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
