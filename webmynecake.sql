-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2017 at 01:32 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webmynecake`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_ID` bigint(20) UNSIGNED NOT NULL,
  `comment_post_ID` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL,
  `comment_date_gmt` datetime NOT NULL,
  `comment_content` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emailtemplates`
--

CREATE TABLE `emailtemplates` (
  `id` int(16) NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `subject` varchar(256) NOT NULL,
  `content` text NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL,
  `created_by` int(16) DEFAULT NULL,
  `modified_by` int(16) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `type` enum('ON_CARD_APPLY','ON_CARD_ACCEPT','ON_CARD_REJECT','ON_CARD_APPROVE','ON_CARD_DISAPPROVE','ON_CARD_COMPLETED','USER_REGISTRATION','ON_PRODUCT_ADD','ON_CURRENCY_ADD') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(32) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `post_id` int(32) NOT NULL,
  `texonomy` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `post_type` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_520_ci,
  `parent_id` int(32) NOT NULL DEFAULT '0',
  `lft` int(32) NOT NULL,
  `rght` int(32) NOT NULL,
  `count` int(16) NOT NULL DEFAULT '0',
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `created_by` int(16) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(16) DEFAULT NULL,
  `term_group` bigint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `post_id`, `texonomy`, `post_type`, `description`, `parent_id`, `lft`, `rght`, `count`, `status`, `created`, `created_by`, `modified`, `modified_by`, `term_group`) VALUES
(21, 'test', 0, 'topics', NULL, 'test', 0, 1, 2, 0, NULL, '2017-09-12 11:10:35', 96, '2017-09-12 11:10:35', NULL, NULL),
(23, 'Home Page', 0, 'categories', 'sliders', 'test', 0, 3, 6, 0, 'ACTIVE', '2017-09-13 10:40:32', 96, '2017-09-13 11:43:55', 96, NULL),
(25, 'Home Page', 0, 'categories', 'post', 'test', 0, 3, 6, 0, 'ACTIVE', '2017-09-13 11:11:10', 96, '2017-09-13 11:15:46', NULL, NULL),
(26, 'News', 0, 'categories', 'post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pellentesque quis turpis nec pulvinar. Integer nec pharetra magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent ac molestie felis, et tincidunt arcu. Donec ornare massa tellus,', 0, 7, 8, 0, 'ACTIVE', '2017-09-13 11:12:56', 96, '2017-09-13 15:58:23', 96, NULL),
(28, 'Top', 0, 'categories', 'sliders', 'test', 23, 9, 10, 0, 'ACTIVE', '2017-09-13 11:45:07', 96, '2017-09-13 12:06:11', NULL, NULL),
(30, 'Bottom', 0, 'categories', 'sliders', 'test', 23, 4, 5, 0, 'ACTIVE', '2017-09-13 13:54:06', 96, '2017-09-13 13:54:12', NULL, NULL),
(31, 'Entertinement', 0, 'categories', 'post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pellentesque quis turpis nec pulvinar. Integer nec pharetra magna. Pellentesque habitant morbi tristique ', 0, 11, 12, 0, 'ACTIVE', '2017-09-13 15:58:47', 96, '2017-09-13 15:59:35', NULL, NULL),
(32, 'Business', 0, 'categories', 'post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pellentesque quis turpis nec pulvinar. Integer nec pharetra magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent ac molestie felis, et tincidunt arcu. Donec ornare massa tellus,', 0, 13, 14, 0, 'ACTIVE', '2017-09-13 15:58:59', 96, '2017-09-13 15:59:35', NULL, NULL),
(33, 'Health', 0, 'categories', 'post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pellentesque quis turpis nec pulvinar. Integer nec pharetra magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent ac molestie felis, et tincidunt arcu. Donec ornare massa tellus,', 0, 15, 16, 0, 'ACTIVE', '2017-09-13 15:59:11', 96, '2017-09-13 15:59:39', NULL, NULL),
(34, 'Food', 0, 'categories', 'post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pellentesque quis turpis nec pulvinar. Integer nec pharetra magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent ac molestie felis, et tincidunt arcu. Donec ornare massa tellus,', 0, 17, 18, 0, 'ACTIVE', '2017-09-13 15:59:21', 96, '2017-09-13 15:59:33', NULL, NULL),
(35, 'Tech', 0, 'categories', 'post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pellentesque quis turpis nec pulvinar. Integer nec pharetra magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent ac molestie felis, et tincidunt arcu. Donec ornare massa tellus,', 0, 19, 20, 0, 'ACTIVE', '2017-09-13 15:59:28', 96, '2017-09-13 15:59:31', NULL, NULL),
(46, '', 0, NULL, NULL, NULL, 0, 21, 22, 0, NULL, '2017-09-13 16:17:26', 96, '2017-09-13 16:17:26', NULL, NULL),
(47, '', 0, NULL, NULL, NULL, 0, 23, 24, 0, NULL, '2017-09-13 16:19:36', 96, '2017-09-13 16:19:36', NULL, NULL),
(48, '', 0, NULL, NULL, NULL, 0, 25, 26, 0, NULL, '2017-09-13 16:19:51', 96, '2017-09-13 16:19:51', NULL, NULL),
(49, '', 0, NULL, NULL, NULL, 0, 27, 28, 0, NULL, '2017-09-13 16:20:10', 96, '2017-09-13 16:20:10', NULL, NULL),
(50, '', 0, NULL, NULL, NULL, 0, 29, 30, 0, NULL, '2017-09-13 16:20:20', 96, '2017-09-13 16:20:20', NULL, NULL),
(51, '', 0, NULL, NULL, NULL, 0, 31, 32, 0, NULL, '2017-09-13 16:21:08', 96, '2017-09-13 16:21:08', NULL, NULL),
(52, 'test', 0, 'topics', 'teams', 'test', 0, 33, 34, 0, NULL, '2017-09-13 17:08:55', 96, '2017-09-13 17:08:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newslettersubscribers`
--

CREATE TABLE `newslettersubscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  `modified_by` int(16) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Country has many state';

--
-- Dumping data for table `newslettersubscribers`
--

INSERT INTO `newslettersubscribers` (`id`, `email`, `status`, `modified_by`, `created`, `modified`) VALUES
(35, 'pruthviraj848@gmail.com', 'ACTIVE', 88, '2017-08-14 17:28:06', '2017-08-14 17:28:06'),
(36, 'bharatnpanchal@gmail.com', 'ACTIVE', NULL, '2017-08-17 18:25:50', '2017-08-17 18:25:50'),
(37, 'rathod@webmynesystems.com', 'ACTIVE', 88, '2017-08-17 18:34:30', '2017-08-17 18:34:30'),
(38, 'testalfredosfs', 'ACTIVE', 88, '2017-08-17 19:00:30', '2017-08-17 19:00:30'),
(39, 'sdfsdf', 'ACTIVE', 88, '2017-08-17 19:01:29', '2017-08-17 19:01:29'),
(40, 'sdfsd', 'ACTIVE', 88, '2017-08-17 19:02:39', '2017-08-17 19:02:39'),
(41, 'sdfs', 'ACTIVE', 88, '2017-08-17 19:02:43', '2017-08-17 19:02:43'),
(42, 'd', 'ACTIVE', 88, '2017-08-17 19:02:48', '2017-08-17 19:02:48'),
(43, 'f', 'ACTIVE', 88, '2017-08-17 19:03:26', '2017-08-17 19:03:26'),
(44, 's', 'ACTIVE', 88, '2017-08-17 19:04:34', '2017-08-17 19:04:34'),
(45, 'ds', 'ACTIVE', 88, '2017-08-17 19:04:37', '2017-08-17 19:04:37'),
(46, 'df', 'ACTIVE', 88, '2017-08-17 19:15:26', '2017-08-17 19:15:26'),
(47, 'ketul@webmyne.com', 'ACTIVE', 88, '2017-08-17 19:20:13', '2017-08-17 19:20:13'),
(48, 'suppsdfsdfsort@card4crypto.com', 'ACTIVE', NULL, '2017-08-22 10:33:47', '2017-08-22 10:33:47');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(16) NOT NULL,
  `title` varchar(64) NOT NULL,
  `image` text,
  `content` text NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `post_type` varchar(64) DEFAULT NULL,
  `parent_id` int(32) DEFAULT NULL,
  `lft` int(32) DEFAULT NULL,
  `rght` int(32) DEFAULT NULL,
  `order` int(32) DEFAULT NULL,
  `excerpt` text,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  `created_by` int(16) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified_by` int(16) NOT NULL DEFAULT '0',
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `image`, `content`, `slug`, `post_type`, `parent_id`, `lft`, `rght`, `order`, `excerpt`, `status`, `created_by`, `created`, `modified_by`, `modified`) VALUES
(46, 'Tes', 'post/image_46.PNG', '<p>sdf</p>\r\n', 'sdf', 'teams', NULL, 1, 2, NULL, 'test', 'ACTIVE', 96, '2017-09-12 11:04:42', 96, '2017-09-12 11:04:42'),
(52, 'Etiam ullamcorper. Suspendisse', 'post/image_52.jpg', '<p>Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula.</p>\r\n', NULL, 'sliders', NULL, 7, 8, NULL, 'Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula.', 'ACTIVE', 96, '2017-09-13 10:49:36', 96, '2017-09-13 15:36:52'),
(53, 'Suspendisse a pellentesque dui', 'post/image_53.jpg', '<p>Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula.</p>\r\n', NULL, 'sliders', NULL, 9, 10, NULL, 'Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula.', 'ACTIVE', 96, '2017-09-13 10:50:18', 96, '2017-09-13 15:36:37'),
(54, 'Maecenas malesuada elit lectus felis', 'post/image_54.jpg', '<p>Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula. Ut molestie a, ultricies porta urna. Vestibulu.</p>\r\n', NULL, 'sliders', NULL, 11, 12, NULL, 'Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula. Ut molestie a, ultricies porta urna. Vestibulu.', 'ACTIVE', 96, '2017-09-13 10:51:35', 96, '2017-09-13 15:36:24'),
(55, 'Suspendisse a pellentesque', 'post/image_55.jpg', '<p>Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula.</p>\r\n', NULL, 'post', NULL, 13, 14, NULL, 'Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula.', 'ACTIVE', 96, '2017-09-13 11:16:51', 96, '2017-09-13 15:35:58'),
(56, 'Suspendisse a pellentesque dui', 'post/image_56.jpg', '<p>Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula.Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula.</p>\r\n', NULL, 'post', NULL, 15, 16, NULL, 'Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula.', 'ACTIVE', 96, '2017-09-13 11:17:58', 96, '2017-09-13 15:35:50'),
(57, 'Suspendisse a pellentesque dui', 'post/image_57.jpg', '<p>Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula.Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula.</p>\r\n', NULL, 'post', NULL, 15, 16, NULL, 'Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula.', 'ACTIVE', 96, '2017-09-13 11:17:58', 96, '2017-09-13 17:32:30'),
(58, 'Suspendisse a pellentesque dui', 'post/image_58.jpg', '<p>Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula.Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula.</p>\r\n', NULL, 'post', NULL, 15, 16, NULL, 'Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula.', 'ACTIVE', 96, '2017-09-13 11:17:58', 96, '2017-09-13 15:35:29'),
(59, 'image 1', 'post/image_59.jpg', '<p>test</p>\r\n', NULL, 'sliders', NULL, 17, 18, NULL, 'test', 'ACTIVE', 96, '2017-09-13 13:55:06', 96, '2017-09-13 15:38:03'),
(60, 'image 2', 'post/image_60.jpg', '<p>test</p>\r\n', NULL, 'sliders', NULL, 19, 20, NULL, 'test', 'ACTIVE', 96, '2017-09-13 13:55:35', 96, '2017-09-13 15:37:55'),
(61, 'image 3', 'post/image_61.jpg', '<p>test</p>\r\n', NULL, 'sliders', NULL, 21, 22, NULL, 'test', 'ACTIVE', 96, '2017-09-13 13:55:54', 96, '2017-09-13 15:37:46'),
(62, 'image 4', 'post/image_62.jpg', '<p>test</p>\r\n', NULL, 'sliders', NULL, 23, 24, NULL, 'test', 'ACTIVE', 96, '2017-09-13 13:56:11', 96, '2017-09-13 15:37:39'),
(77, 'Top', NULL, '[]', NULL, 'menu', NULL, 25, 26, NULL, NULL, 'ACTIVE', 96, '2017-09-14 16:29:21', 0, '2017-09-14 18:05:31'),
(78, 'Primary', NULL, '[{"text":"Home","icon":"","href":"http://localhost/projects/ud/webmynecake/"},{"text":"About Us","href":"http://localhost/projects/ud/webmynecake/about-us","target":"_self","title":"","icon":""},{"text":"Services","href":"#"},{"text":"Blog","href":"#"},{"text":"Shortcodes","href":"#"},{"text":"Login","href":"#"}]', NULL, 'menu', NULL, 27, 28, NULL, NULL, 'ACTIVE', 96, '2017-09-14 17:26:53', 0, '2017-09-14 18:31:12'),
(79, 'Footer', NULL, '[{"text":"Quick Links","href":"#","children":[{"text":"Lorem Ipsum passage","href":"#","target":"_self","title":"Lorem Ipsum passage"}]},{"text":"Favorite Resources","href":"#","children":[{"text":"Finibus Bonorum et","href":"#","target":"_self","title":"Finibus Bonorum et"}]},{"text":"About Us","icon":"","href":"#","children":[{"text":" Treatise on the theory","href":"#","target":"_self","title":" Treatise on the theory"}]},{"text":"Custom Menu","icon":"","href":"#","children":[{"text":"which looks reasonable","href":"#","target":"_self","title":"which looks reasonable"}]}]', NULL, 'menu', NULL, 29, 30, NULL, NULL, 'ACTIVE', 96, '2017-09-14 17:52:37', 0, '2017-09-14 17:54:19'),
(80, 'About Us', 'post/image_80.jpg', '<h3>Lorem Ipsum has been the industry&#39;s</h3>\r\n\r\n<p>Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. of Lorem Ipsum. PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions Letraset sheets containing Lorem Ipsum passages, and more recently with including versions of Lorem Ipsum.</p>\r\n', NULL, 'pages', NULL, 31, 32, NULL, 'Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions Letraset sheets containing Lorem Ipsum passages', 'ACTIVE', 96, '2017-09-14 18:28:50', 96, '2017-09-14 19:10:32');

-- --------------------------------------------------------

--
-- Table structure for table `postmeta`
--

CREATE TABLE `postmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `postmeta`
--

INSERT INTO `postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, 'page_template', 'default');

-- --------------------------------------------------------

--
-- Table structure for table `postterms`
--

CREATE TABLE `postterms` (
  `post_id` int(32) NOT NULL,
  `term_id` int(32) NOT NULL,
  `texonomy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postterms`
--

INSERT INTO `postterms` (`post_id`, `term_id`, `texonomy`) VALUES
(52, 28, 'categories'),
(53, 28, 'categories'),
(54, 28, 'categories'),
(55, 25, 'categories'),
(56, 25, 'categories'),
(57, 25, 'categories'),
(58, 25, 'categories'),
(59, 30, 'categories'),
(60, 30, 'categories'),
(61, 30, 'categories'),
(62, 30, 'categories'),
(77, 53, 'menu'),
(78, 54, 'menu'),
(79, 55, 'menu'),
(80, 61, 'templates');

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `id` int(11) NOT NULL,
  `post_id` int(32) DEFAULT NULL,
  `url` text NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`id`, `post_id`, `url`, `keywords`, `description`) VALUES
(1, 46, 'the-girl-of-my-dreams', 'the-girl-of-my-dreams', ''),
(6, 52, 'etiam-ullamcorper-suspendisse', '[object Object]', 'Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula.'),
(7, 53, 'suspendisse-a-pellentesque-dui', '[object Object]', 'Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula.'),
(8, 54, 'maecenas-malesuada-elit-lectus-felis', 'Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula. Ut molestie a, ultricies porta urna. Vestibulu.', 'Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula. Ut molestie a, ultricies porta urna. Vestibulu.'),
(9, 55, 'suspendisse-a-pellentesque', 'test', 'Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula.'),
(10, 56, 'suspendisse-a-pellentesque-dui-jjxrk', 'Etiam ullamcorper. Suspendisse ', 'Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula.'),
(11, 59, 'image-1', 'test', 'test'),
(12, 60, 'image-2', 'test', 'test'),
(13, 61, 'image-3', 'test', 'test'),
(14, 62, 'image-4', 'test', 'test'),
(22, 55, 'suspendisse-a-pellentesque-dui-pziwk', 'Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula.', 'Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula.'),
(23, 55, 'suspendisse-a-pellentesque-dui-pziwk', 'Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula.', 'Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula.'),
(24, 58, 'suspendisse-a-pellentesque-dui-szlgl', 'Etiam ullamcorper.', 'Etiam ullamcorper.'),
(25, 57, 'suspendisse-a-pellentesque-dui-lgseu', 'hello hello hello hello hello hello', 'test'),
(26, 80, 'about-us', 'letraset,containing,lorem,ipsum,passages,desktop,publishing,software,aldus,letraset,containing,lorem,ipsum,passages,desktop,publishing,software,aldus,pagemaker,versions,letraset,containing,lorem,ipsum,passages', 'Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. of Lorem Ipsum. PageMaker including versions of Lorem Ipsum.');

-- --------------------------------------------------------

--
-- Table structure for table `siteconfigs`
--

CREATE TABLE `siteconfigs` (
  `id` int(16) NOT NULL,
  `title` varchar(128) NOT NULL,
  `front_theme` varchar(255) DEFAULT NULL,
  `header_logo_image` varchar(512) NOT NULL,
  `footer_logo_image` varchar(512) NOT NULL,
  `copyright` varchar(128) NOT NULL,
  `email` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `facebook` varchar(512) DEFAULT NULL,
  `google_plus` varchar(512) DEFAULT NULL,
  `twitter` varchar(512) DEFAULT NULL,
  `instagram` varchar(512) DEFAULT NULL,
  `pinterest` varchar(512) DEFAULT NULL,
  `facebook_app_id` varchar(512) NOT NULL,
  `facebook_app_secret` varchar(512) NOT NULL,
  `google_client_id` varchar(512) NOT NULL,
  `google_client_secret` varchar(512) NOT NULL,
  `twitter_consumer_key` varchar(512) NOT NULL,
  `twitter_consumer_secret` varchar(512) NOT NULL,
  `mailchimp_key` varchar(1024) NOT NULL,
  `mailchimp_list_id` varchar(1024) NOT NULL,
  `smtp_host` varchar(128) NOT NULL,
  `smtp_port` int(16) NOT NULL,
  `smtp_email_id` varchar(512) DEFAULT NULL,
  `smtp_password` varchar(512) DEFAULT NULL,
  `created_by` int(16) NOT NULL DEFAULT '0',
  `modified_by` int(16) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siteconfigs`
--

INSERT INTO `siteconfigs` (`id`, `title`, `front_theme`, `header_logo_image`, `footer_logo_image`, `copyright`, `email`, `description`, `facebook`, `google_plus`, `twitter`, `instagram`, `pinterest`, `facebook_app_id`, `facebook_app_secret`, `google_client_id`, `google_client_secret`, `twitter_consumer_key`, `twitter_consumer_secret`, `mailchimp_key`, `mailchimp_list_id`, `smtp_host`, `smtp_port`, `smtp_email_id`, `smtp_password`, `created_by`, `modified_by`, `created`, `modified`, `status`) VALUES
(19, 'card4crypto', 'ThemeDefault', 'siteconfigs/header_logo_image_19.png', 'siteconfigs/footer_logo_image_19.png', 'Powered by Webmyne System', 'support@card4crypto.com', 'A great program that offers multiple ways to earn free coins. Especially now, given that this cryptocurrency has become the most sought after digital asset, many people want to get more of it.', 'https://www.facebook.com/Card-4-Crypto-1889194071399320/', 'http://plus.google.com/card4crypto', 'https://twitter.com/Card4Crypto', 'https://www.instagram.com/card4crypto/', 'https://www.pinterest.com/card4crypto/', '1954576868113250', 'a1472f48e09a3d96bb04b14bf133d85e', '336478259292-cpknamo3rnguq5k56vo48keqfpotpsk7.apps.googleusercontent.com', 'rfnMbFiY9o-1SwHspvsOC9Jf', '5HfXsmIr7spWNg2EYfYupSqJU', 'RmplMKNJ1nz4gvhllCrBgmYxtmH2XGam5YWVXnpeUIJKRS2kuY', '512f4960a28f7c1c62d47745cef26eda-us16', 'e5f0eba5da', 'ssl://box1047.bluehost.com', 465, 'support@card4crypto.com', 'v#*js2VY/eB2ui', 5, 96, '2017-07-31 17:26:18', '2017-09-15 18:13:09', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `termmeta`
--

CREATE TABLE `termmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(32) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `texonomy` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `post_type` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_520_ci,
  `parent_id` int(32) NOT NULL DEFAULT '0',
  `lft` int(32) NOT NULL,
  `rght` int(32) NOT NULL,
  `count` int(16) NOT NULL DEFAULT '0',
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `created_by` int(16) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(16) DEFAULT NULL,
  `term_group` bigint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `name`, `texonomy`, `post_type`, `description`, `parent_id`, `lft`, `rght`, `count`, `status`, `created`, `created_by`, `modified`, `modified_by`, `term_group`) VALUES
(21, 'test', 'topics', NULL, 'test', 0, 1, 2, 0, NULL, '2017-09-12 11:10:35', 96, '2017-09-12 11:10:35', NULL, NULL),
(23, 'Home Page', 'categories', 'sliders', 'test', 0, 3, 6, 0, 'ACTIVE', '2017-09-13 10:40:32', 96, '2017-09-13 11:43:55', 96, NULL),
(25, 'Home Page', 'categories', 'post', 'test', 0, 3, 6, 0, 'ACTIVE', '2017-09-13 11:11:10', 96, '2017-09-13 11:15:46', NULL, NULL),
(26, 'News', 'categories', 'post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pellentesque quis turpis nec pulvinar. Integer nec pharetra magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent ac molestie felis, et tincidunt arcu. Donec ornare massa tellus,', 0, 7, 8, 0, 'ACTIVE', '2017-09-13 11:12:56', 96, '2017-09-13 15:58:23', 96, NULL),
(28, 'Top', 'categories', 'sliders', 'test', 23, 9, 10, 0, 'ACTIVE', '2017-09-13 11:45:07', 96, '2017-09-13 12:06:11', NULL, NULL),
(30, 'Bottom', 'categories', 'sliders', 'test', 23, 4, 5, 0, 'ACTIVE', '2017-09-13 13:54:06', 96, '2017-09-13 13:54:12', NULL, NULL),
(31, 'Entertinement', 'categories', 'post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pellentesque quis turpis nec pulvinar. Integer nec pharetra magna. Pellentesque habitant morbi tristique ', 0, 11, 12, 0, 'ACTIVE', '2017-09-13 15:58:47', 96, '2017-09-13 15:59:35', NULL, NULL),
(32, 'Business', 'categories', 'post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pellentesque quis turpis nec pulvinar. Integer nec pharetra magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent ac molestie felis, et tincidunt arcu. Donec ornare massa tellus,', 0, 13, 14, 0, 'ACTIVE', '2017-09-13 15:58:59', 96, '2017-09-13 15:59:35', NULL, NULL),
(33, 'Health', 'categories', 'post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pellentesque quis turpis nec pulvinar. Integer nec pharetra magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent ac molestie felis, et tincidunt arcu. Donec ornare massa tellus,', 0, 15, 16, 0, 'ACTIVE', '2017-09-13 15:59:11', 96, '2017-09-13 15:59:39', NULL, NULL),
(34, 'Food', 'categories', 'post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pellentesque quis turpis nec pulvinar. Integer nec pharetra magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent ac molestie felis, et tincidunt arcu. Donec ornare massa tellus,', 0, 17, 18, 0, 'ACTIVE', '2017-09-13 15:59:21', 96, '2017-09-13 15:59:33', NULL, NULL),
(35, 'Tech', 'categories', 'post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pellentesque quis turpis nec pulvinar. Integer nec pharetra magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent ac molestie felis, et tincidunt arcu. Donec ornare massa tellus,', 0, 19, 20, 0, 'ACTIVE', '2017-09-13 15:59:28', 96, '2017-09-13 15:59:31', NULL, NULL),
(46, '', NULL, NULL, NULL, 0, 21, 22, 0, NULL, '2017-09-13 16:17:26', 96, '2017-09-13 16:17:26', NULL, NULL),
(47, '', NULL, NULL, NULL, 0, 23, 24, 0, NULL, '2017-09-13 16:19:36', 96, '2017-09-13 16:19:36', NULL, NULL),
(48, '', NULL, NULL, NULL, 0, 25, 26, 0, NULL, '2017-09-13 16:19:51', 96, '2017-09-13 16:19:51', NULL, NULL),
(49, '', NULL, NULL, NULL, 0, 27, 28, 0, NULL, '2017-09-13 16:20:10', 96, '2017-09-13 16:20:10', NULL, NULL),
(50, '', NULL, NULL, NULL, 0, 29, 30, 0, NULL, '2017-09-13 16:20:20', 96, '2017-09-13 16:20:20', NULL, NULL),
(51, '', NULL, NULL, NULL, 0, 31, 32, 0, NULL, '2017-09-13 16:21:08', 96, '2017-09-13 16:21:08', NULL, NULL),
(52, 'test', 'topics', 'teams', 'test', 0, 33, 34, 0, NULL, '2017-09-13 17:08:55', 96, '2017-09-13 17:08:55', NULL, NULL),
(53, 'Top', 'categories', 'menu', 'top', 0, 35, 36, 0, 'ACTIVE', '2017-09-14 12:42:20', 96, '2017-09-14 12:44:31', NULL, NULL),
(54, 'Primary', 'categories', 'menu', 'primary', 0, 37, 38, 0, 'ACTIVE', '2017-09-14 12:42:42', 96, '2017-09-14 12:44:31', NULL, NULL),
(55, 'Footer', 'categories', 'menu', 'footer', 0, 39, 40, 0, 'ACTIVE', '2017-09-14 12:43:00', 96, '2017-09-14 12:44:30', NULL, NULL),
(56, 'Left Sidebar', 'categories', 'menu', 'left sidebar', 0, 41, 42, 0, 'ACTIVE', '2017-09-14 12:44:08', 96, '2017-09-14 12:44:30', NULL, NULL),
(57, 'Right Sidebar', 'categories', 'menu', 'right sidebar', 0, 43, 44, 0, 'ACTIVE', '2017-09-14 12:44:26', 96, '2017-09-14 12:44:29', NULL, NULL),
(58, 'default', 'categories', 'pages', 'default', 0, 45, 46, 0, 'ACTIVE', '2017-09-14 18:58:14', 96, '2017-09-14 18:58:57', NULL, NULL),
(59, 'About Us', 'categories', 'pages', 'about us', 0, 47, 48, 0, 'ACTIVE', '2017-09-14 18:59:10', 96, '2017-09-14 18:59:14', NULL, NULL),
(60, 'page', 'templates', 'pages', 'page', 0, 49, 50, 0, 'ACTIVE', '2017-09-14 19:07:20', 96, '2017-09-14 19:21:55', 96, NULL),
(61, 'About us', 'templates', 'pages', 'about us', 0, 51, 52, 0, 'ACTIVE', '2017-09-14 19:07:32', 96, '2017-09-14 19:07:35', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `term_relationships`
--

CREATE TABLE `term_relationships` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `term_relationships`
--

INSERT INTO `term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `term_taxonomy`
--

CREATE TABLE `term_taxonomy` (
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `term_taxonomy`
--

INSERT INTO `term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(16) NOT NULL,
  `first_name` varchar(64) DEFAULT NULL,
  `last_name` varchar(64) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `address` varchar(512) DEFAULT NULL,
  `mobile_no` varchar(32) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `facebook_id` varchar(512) DEFAULT NULL,
  `google_id` varchar(512) DEFAULT NULL,
  `twitter_screen_name` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `gender` enum('MALE','FEMALE') DEFAULT NULL,
  `image` text,
  `type` enum('ADMIN','USER') NOT NULL DEFAULT 'USER',
  `about` text,
  `created_by` int(16) DEFAULT NULL,
  `modified_by` int(16) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `login` datetime DEFAULT NULL,
  `logout` datetime DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `address`, `mobile_no`, `email`, `facebook_id`, `google_id`, `twitter_screen_name`, `password`, `gender`, `image`, `type`, `about`, `created_by`, `modified_by`, `created`, `modified`, `login`, `logout`, `status`) VALUES
(86, 'Crypto2Crypto', NULL, 'Crypto2Crypto_', '', NULL, 'evxa2009@gmail.com', NULL, NULL, 'Crypto2Crypto_', '$2y$10$FGco5HVvC0xkvVtqi9Uo2ugV31ycWOkx9g10n2WYyXDY.HoIwSO0a', NULL, 'https://pbs.twimg.com/profile_images/884074765132214272/OI7w5kj1_normal.jpg', 'USER', 'Subscribe to our youtube \nhttps://t.co/V8hFL09B7H\nWe love the tech behind #crypto and not just pump and dumps. $Btc $Eth $Pivx', NULL, NULL, '2017-08-11 07:27:00', '2017-08-17 07:30:34', NULL, '2017-08-11 07:37:05', 'ACTIVE'),
(88, 'admin', 'admin', 'Webadmin', 'India', '2222222222', 'cparikh@webmyne.com', NULL, NULL, NULL, '$2y$10$kmWgE5950AXXZWfzvOaVxegJsCuhX8HxA8geLwF5IMd/WkxnDhqx.', 'MALE', 'users/image_88.jpg', 'ADMIN', NULL, NULL, 88, NULL, '2017-08-17 18:32:14', '2017-08-17 18:32:14', '2017-08-16 18:17:51', 'ACTIVE'),
(96, 'test', 'TEST', 'admin', 'testvadodara', '1234567890', 'a@a.com', NULL, NULL, NULL, '$2y$10$BmEcnaxtlCQ1Owq9N.KG.ej7aef1ZeS0EECmqq9spv.f0nEdWjedW', 'MALE', 'users/image_96.jpg', 'ADMIN', NULL, 88, NULL, '2017-08-11 13:06:13', '2017-09-15 18:10:44', '2017-09-15 18:10:44', '2017-09-14 18:15:55', 'ACTIVE'),
(99, 'Pruthviraj', 'Rathod', 'Pruthviraj848', 'India', NULL, 'pruthviraj848@gmail.com', '1406439649404742', '117316379352571578692', 'Pruthviraj848', '$2y$10$Zn2wHG/OBxArR2yejjCW5.Y/hygRrhQNorOYFphHNGD2XhHJI2U/.', NULL, 'https://pbs.twimg.com/profile_images/1704621196/DSC_1275_normal.jpg', 'USER', '', NULL, 99, '2017-08-11 14:17:47', '2017-08-28 14:55:01', NULL, '2017-08-28 14:55:01', 'ACTIVE'),
(123, 'Cire', 'Nihpuad', 'cirenihpuad', NULL, NULL, 'thesourcehq1@gmail.com', '341647029608843', NULL, NULL, '$2y$10$ZZZ8WTlt8y1oqTVhJIWqs.3F06ym26UYsbFSzSbH8lnG91TB5t7ZS', NULL, 'https://scontent.xx.fbcdn.net/v/t1.0-1/p240x240/13754256_113761639064051_7678811272502424459_n.jpg?oh=0d6f3b62f7a33ab6a921b840a3d460ce&oe=59EEBCC8', 'USER', NULL, NULL, 123, '2017-08-14 12:17:31', '2017-08-14 12:17:38', NULL, '2017-08-14 12:17:38', 'ACTIVE'),
(124, NULL, NULL, '278', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$PSDm/Axj9YKc9ec4e9PUuOrPwfxWNxFd1vsq7nalJD9mp4u6D1aE2', NULL, NULL, 'USER', NULL, NULL, 124, '2017-08-21 12:42:10', '2017-08-21 12:42:25', NULL, '2017-08-21 12:42:25', 'ACTIVE'),
(125, 'Card', '4', 'Card4Crypto', '', NULL, 'crypto2crypto101@gmail.com', NULL, NULL, 'Card4Crypto', '$2y$10$XtnUVCw3J.cgJXT4zZBuzOuaxgBZeTmUow5tsGcqXM5zHo31z.jj2', NULL, 'https://abs.twimg.com/sticky/default_profile_images/default_profile_normal.png', 'USER', '', NULL, 125, '2017-08-21 12:42:29', '2017-08-21 16:14:14', NULL, '2017-08-21 16:14:14', 'ACTIVE'),
(132, NULL, NULL, '645', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$pXoSNO16ffTqIwfISgzVD.YANVxgWLRYIsa.WujVgEdGw/41Z0h3K', NULL, NULL, 'USER', NULL, NULL, NULL, '2017-08-28 14:33:10', '2017-08-28 14:33:10', NULL, NULL, 'ACTIVE'),
(133, NULL, NULL, '518', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$lMWy8aSidBvL5F/VKHCVeub0cXd7utxoCPVTFMRDeY1afiZRa0aSq', NULL, NULL, 'USER', NULL, 132, 132, '2017-08-28 14:33:12', '2017-08-28 14:33:12', NULL, NULL, 'ACTIVE'),
(134, NULL, NULL, '254', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$E2IeTo3JCHhfkjx8xkl/iuaLl5hZ56/QHjcZ/MhDZTPG2W/TORGeu', NULL, NULL, 'USER', NULL, 133, 133, '2017-08-28 14:33:18', '2017-08-28 14:33:18', NULL, NULL, 'ACTIVE'),
(135, NULL, NULL, '142', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$JFZ/JRl4wiLAXEpQAG/aDOD85IZ4RM6pH5gtWXQZ.X.fT32JU8lKS', NULL, NULL, 'USER', NULL, 134, 134, '2017-08-28 14:33:21', '2017-08-28 14:33:21', NULL, NULL, 'ACTIVE'),
(136, NULL, NULL, '271', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$yQjuCzzCIb5V6oRSyFZRReFXSukyII/tsYFfijgh929Cx1RIJNliS', NULL, NULL, 'USER', NULL, 135, 135, '2017-08-28 14:35:11', '2017-08-28 14:35:11', NULL, NULL, 'ACTIVE'),
(137, NULL, NULL, '575', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$Mnjq2GjIi9P.Yb5dytQqxuZj.33iLXDE5rNRwkAjKUI56coHjSuHm', NULL, NULL, 'USER', NULL, 136, 137, '2017-08-28 14:35:12', '2017-08-28 14:36:42', NULL, '2017-08-28 14:36:42', 'ACTIVE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emailtemplates`
--
ALTER TABLE `emailtemplates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`(191));

--
-- Indexes for table `newslettersubscribers`
--
ALTER TABLE `newslettersubscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`email`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postmeta`
--
ALTER TABLE `postmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `postterms`
--
ALTER TABLE `postterms`
  ADD PRIMARY KEY (`post_id`,`term_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `term_id` (`term_id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `siteconfigs`
--
ALTER TABLE `siteconfigs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `termmeta`
--
ALTER TABLE `termmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`(191));

--
-- Indexes for table `term_relationships`
--
ALTER TABLE `term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Indexes for table `term_taxonomy`
--
ALTER TABLE `term_taxonomy`
  ADD PRIMARY KEY (`term_taxonomy_id`),
  ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  ADD KEY `taxonomy` (`taxonomy`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emailtemplates`
--
ALTER TABLE `emailtemplates`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `newslettersubscribers`
--
ALTER TABLE `newslettersubscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `postmeta`
--
ALTER TABLE `postmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `siteconfigs`
--
ALTER TABLE `siteconfigs`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `termmeta`
--
ALTER TABLE `termmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `term_taxonomy`
--
ALTER TABLE `term_taxonomy`
  MODIFY `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `postterms`
--
ALTER TABLE `postterms`
  ADD CONSTRAINT `belongsToPost` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `belongsToTerms` FOREIGN KEY (`term_id`) REFERENCES `terms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seo`
--
ALTER TABLE `seo`
  ADD CONSTRAINT `seobelongstopost` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
