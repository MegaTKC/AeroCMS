-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 05, 2021 at 03:50 AM
-- Server version: 8.0.26-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Default');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int NOT NULL,
  `comment_post_id` int NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(1, 1, 'MegaTKC', 'megatkc@example.com', 'Welcome to your website running on AeroCMS. This is a comment, go to the Comments section on your AeroCMS Admin panel to approve, unapprove or delete this or other comments. Enjoy AeroCMS! - MegaTKC (Owner of AeroCMS).', 'approved', '2021-10-04');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int NOT NULL,
  `post_category_id` int NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_user` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_user`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(1, 1, 'Your first post using AeroCMS!', '', 'Admin', '2021-10-05', 'belinda-fewings-6wAGwpsXHE0-unsplash.jpg', '<p>AeroCMS has been installed! Enjoy it! Login to the default admin account with these credentials!</p>\r\n<p>&nbsp;</p>\r\n<p>Username: admin</p>\r\n<p>&nbsp;</p>\r\n<p>Password: password</p>\r\n<p>&nbsp;</p>\r\n<p>With the admin account you can access the AeroCMS Admin Panel where you can edit your blog, create more users, give them permissions, create posts and more! We recommend that you create a new admin account because you cannot change user passwords! Anyway enjoy AeroCMS!</p>\r\n<p>&nbsp;</p>\r\n<p>Credits:</p>\r\n<p>&nbsp;</p>\r\n<p>Photo by Belinda Fewings on Unsplash</p>', 'aerocms, start guide, aero, cms, guide, user credentials, getting started', 0, 'published', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_lastname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(1, 'admin', '$2y$12$0BgqODF66TD.JZxL5MVRlOEIvap9XzkBEMVEeHyHe6RiOxdGrx3Ne', NULL, NULL, 'admin@example.net', NULL, 'Admin', '$2y$10$iusesomecrazystrings22');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, 'pf2ovmbhtdn7dtrli83rjetlv6', 1525603889),
(2, 'g4eaojs9lup5uoi9clh0a7dlj2', 1525600070),
(3, 'u5b26mae8k9upvdf0loiv4qh80', 1525600816),
(4, '7dg0jaipc161dirait3omf4fk0', 1525603284),
(5, 'p9e0jf3ama3n4hvbp6eknime52', 1525603543),
(6, 'hqhn3mcl82dg0t12i01do5gkp2', 1525753912),
(7, 'krkd2v356t3jv5k5d2v6sa4om6', 1525837122),
(8, '04nli9lc34bfm8qnnbn0s47t63', 1525861608),
(9, 'drpe2pej7n3glgdkgltdu59ft1', 1525925780),
(10, 'nvqkpc95pdac56qmctcrm89jh0', 1526038120),
(11, '66isnml6mnu741n3r5q9s5m956', 1526200326),
(12, 'jdicp9b8bbek3opi4b7970lo02', 1526219068),
(13, '8o8u5o0gglhrok5fjobnrll0s0', 1526268404),
(14, 'ins7sdp4b5gbb079c4kv5hd734', 1526273159),
(15, 'rmtl5qd6uo6nadc4ql7fifcr47', 1526306904),
(16, '7d1vov1qav2kgbi18hrcgtcmd2', 1526312831),
(17, '7sjflm0u8i7qonakjs6341jdl1', 1526355967),
(18, '32hpoav8ksrhvi4qd7f5iisdh7', 1526395857),
(19, 'b51ki4eoffu1a3suqagcjcb662', 1526441933),
(20, '05t149k9ossbtvs3l0lb24u9up', 1633389690),
(21, '5kavrpik2i0gl4cdskfif3c9gj', 1633405608);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
