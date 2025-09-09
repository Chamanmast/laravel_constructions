-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2025 at 08:39 AM
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
-- Database: `laravel_construction`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogcategories`
--

CREATE TABLE `blogcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogcategories`
--

INSERT INTO `blogcategories` (`id`, `category_name`, `category_slug`, `created_at`, `updated_at`) VALUES
(1, 'Sustainability', 'sustainability', '2023-12-08 07:17:53', '2025-09-05 23:36:28'),
(2, 'Energy Efficiency', 'energy-efficiency', '2023-12-08 07:17:56', '2025-09-05 23:36:37'),
(3, 'Compliance & Security', 'compliance-security', '2025-09-05 23:36:50', '2025-09-05 23:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blogcat_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `post_slug` varchar(255) DEFAULT NULL,
  `post_image` varchar(255) DEFAULT NULL,
  `short_descp` text DEFAULT NULL,
  `long_descp` text DEFAULT NULL,
  `post_tags` varchar(255) DEFAULT NULL,
  `front` int(11) DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blogcat_id`, `user_id`, `post_title`, `post_slug`, `post_image`, `short_descp`, `long_descp`, `post_tags`, `front`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'How Your Property Fits into Vision 2030', 'how-your-property-fits-into-vision-2030', 'upload/blog/thumbnail/1842628873725919.jpg', 'We\'re all seeing Saudi Arabia transform under Vision 2030. It\'s an exciting time of building a smarter, greener, and more vibrant nation. But did you know that the buildings we live and work in are a huge part of this story.', '<p>We\'re all seeing Saudi Arabia transform under Vision 2030. It\'s an exciting time of building a smarter, greener, and more vibrant nation. But did you know that the buildings we live and work in are a huge part of this story?</p><p>This is where \"smart buildings\" come in, and they\'re simpler than you might think.</p><p>So, What Makes a Building \"Smart\"?</p><p>Imagine your building had a brain. That\'s essentially a Building Management System (BMS). It\'s a central hub that connects everything—the AC, lights, security cameras, and elevators—and helps them work together intelligently.</p><p>Instead of wasting energy cooling an empty room or leaving lights on all night, a BMS automates everything for maximum efficiency and comfort. It\'s the secret sauce that turns a regular structure into a smart, responsive environment.</p>', '1,2', 0, 0, '2024-04-23 08:31:17', '2025-09-07 12:27:12'),
(2, 2, 1, 'Why This Matters for Vision 2030', 'why-this-matters-for-vision-2030', 'upload/blog/thumbnail/1842629156487070.jpg', 'A huge part of Vision 2030 is sustainability. A smart building with a BMS is incredibly energy-efficient. It knows when to power down systems, which means', '<p>This isn\'t just about cool tech; it\'s about hitting the key goals for our country\'s future.</p><h2>Greener &amp; Smarter Spending</h2><p>A huge part of Vision 2030 is sustainability. A smart building with a BMS is incredibly energy-efficient. It knows when to power down systems, which means:</p><ul><li>&nbsp;Lower electricity bills: A direct impact on your bottom line.</li><li>&nbsp;A smaller carbon footprint: Helping meet the goals of the Saudi Green Initiative.</li><li>Less waste: The building only uses what it needs, when it needs it.</li></ul><h2>A Better Place to Live and Work</h2><p>Vision 2030 is also about improving our quality of life. Smart buildings create spaces that are simply better for people.</p>', '', 0, 0, '2024-04-23 10:15:49', '2025-09-07 12:31:41'),
(3, 3, 1, 'BMS Cybersecurity: OT Segmentation Made Practical', 'bms-cybersecurity-ot-segmentation-made-practical', '', 'dadsdas', NULL, '13', 0, 1, '2025-09-05 23:53:47', '2025-09-07 12:17:34');

-- --------------------------------------------------------

--
-- Table structure for table `blogtags`
--

CREATE TABLE `blogtags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_name` varchar(255) NOT NULL,
  `tag_slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogtags`
--

INSERT INTO `blogtags` (`id`, `tag_name`, `tag_slug`, `created_at`, `updated_at`) VALUES
(1, 'iaq', 'iaq', '2023-12-08 07:15:41', '2025-09-05 23:38:05'),
(2, 'smart buildings', 'smart-buildings', '2023-12-08 07:21:37', '2025-09-05 23:37:52'),
(3, 'esg', 'esg', '2025-09-05 23:37:30', '2025-09-05 23:38:02'),
(4, 'net zero', 'net-zero', '2025-09-05 23:38:15', '2025-09-05 23:38:15'),
(5, 'ot security', 'ot-security', '2025-09-05 23:44:49', '2025-09-05 23:44:49'),
(6, 'network segmentation', 'network-segmentation', '2025-09-05 23:44:54', '2025-09-05 23:44:54'),
(7, 'zero trust', 'zero-trust', '2025-09-05 23:44:59', '2025-09-05 23:44:59'),
(8, 'nist', 'nist', '2025-09-05 23:45:05', '2025-09-05 23:45:05'),
(9, 'secure remote access', 'secure-remote-access', '2025-09-05 23:45:11', '2025-09-05 23:45:11'),
(10, 'hvac optimization', 'hvac-optimization', '2025-09-05 23:45:23', '2025-09-05 23:45:23'),
(11, 'fdd', 'fdd', '2025-09-05 23:45:30', '2025-09-05 23:45:30'),
(12, 'tariff-based scheduling', 'tariff-based-scheduling', '2025-09-05 23:45:37', '2025-09-05 23:45:37'),
(13, 'energy savings', 'energy-savings', '2025-09-05 23:45:42', '2025-09-05 23:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `small_text` varchar(255) DEFAULT NULL,
  `text` mediumtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `small_text`, `text`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Johnson Controls-FX', 'upload/brand/thumbnail/1842597971239413.jpg', NULL, NULL, 0, '2025-09-08 16:54:48', '2025-09-08 16:54:48'),
(2, 'DEOS-AG', 'upload/brand/thumbnail/1842597856513136.jpg', NULL, NULL, 0, '2025-09-08 16:54:48', '2025-09-08 16:54:48'),
(3, 'Honeywell Alerton', 'upload/brand/thumbnail/1842765587782127.png', NULL, NULL, 0, '2025-09-08 16:54:48', '2025-09-09 00:40:12'),
(4, 'Eelectron', 'upload/brand/thumbnail/1842765677319127.png', NULL, NULL, 0, '2025-09-08 16:54:48', '2025-09-09 00:41:37'),
(5, 'Setra', 'upload/brand/thumbnail/1842598048583291.png', NULL, NULL, 0, '2025-09-08 16:54:48', '2025-09-08 16:54:48'),
(6, 'Eelectron-KNX', NULL, NULL, NULL, 0, '2025-09-08 16:54:48', '2025-09-08 16:54:48'),
(7, 'Kamstrup', 'upload/brand/thumbnail/1842598118050297.png', NULL, NULL, 0, '2025-09-08 16:54:48', '2025-09-08 16:54:48'),
(8, 'Axioma', 'upload/brand/thumbnail/1842598091849424.jpeg', NULL, NULL, 0, '2025-09-08 16:54:48', '2025-09-08 16:54:48'),
(9, 'Hochiki', 'upload/brand/thumbnail/1842764846638844.png', NULL, NULL, 0, '2025-09-08 16:54:48', '2025-09-09 00:28:25'),
(10, 'Notifier', 'upload/brand/thumbnail/1842764862990423.png', NULL, NULL, 0, '2025-09-08 16:54:48', '2025-09-09 00:28:41'),
(11, 'Ravel-Fire', 'upload/brand/thumbnail/1842764890191000.jpeg', NULL, NULL, 0, '2025-09-08 16:54:48', '2025-09-09 00:29:07'),
(12, 'Avaya', 'upload/brand/thumbnail/1842764953162068.png', NULL, NULL, 0, '2025-09-08 16:54:48', '2025-09-09 00:30:07'),
(13, 'Cisco', 'upload/brand/thumbnail/1842764729020174.png', NULL, NULL, 0, '2025-09-08 16:54:48', '2025-09-09 00:26:37'),
(14, 'Schrack Seconet AG', 'upload/brand/thumbnail/1842765000607465.jpeg', NULL, NULL, 0, '2025-09-08 16:54:48', '2025-09-09 00:30:52'),
(15, 'Bosch', 'upload/brand/thumbnail/1842764825040448.png', NULL, NULL, 0, '2025-09-08 16:54:48', '2025-09-09 00:28:04'),
(16, 'Ravel Electronics', 'upload/brand/thumbnail/1842765048210991.jpeg', NULL, NULL, 0, '2025-09-08 16:54:48', '2025-09-09 00:31:37'),
(17, 'Legrand', 'upload/brand/thumbnail/1842765102673386.png', NULL, NULL, 0, '2025-09-08 16:54:48', '2025-09-09 00:32:29'),
(18, 'Systimax', 'upload/brand/thumbnail/1842764802661021.png', NULL, NULL, 0, '2025-09-08 16:54:48', '2025-09-09 00:27:43'),
(19, 'Axis', 'upload/brand/thumbnail/1842765173549602.png', NULL, NULL, 0, '2025-09-08 16:54:48', '2025-09-09 00:33:37'),
(20, 'Dahua', 'upload/brand/thumbnail/1842765184896504.png', NULL, NULL, 0, '2025-09-08 16:54:48', '2025-09-09 00:33:48'),
(21, 'Honeywell', 'upload/brand/thumbnail/1842597930282341.png', NULL, NULL, 0, '2025-09-08 16:54:48', '2025-09-08 16:54:48'),
(22, 'Hikvision', 'upload/brand/thumbnail/1842765221215855.jpg', NULL, NULL, 0, '2025-09-08 16:54:48', '2025-09-09 00:34:22'),
(23, 'ZMR Technology Distribution', 'upload/brand/thumbnail/1842765200801516.png', NULL, NULL, 0, '2025-09-08 16:54:48', '2025-09-09 00:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_spatie.permission.cache', 'a:3:{s:5:\"alias\";a:5:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"group_name\";s:1:\"d\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:102:{i:0;a:5:{s:1:\"a\";i:1;s:1:\"b\";s:9:\"smtp.menu\";s:1:\"c\";s:4:\"smtp\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:5:{s:1:\"a\";i:2;s:1:\"b\";s:12:\"smtp.setting\";s:1:\"c\";s:4:\"smtp\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:5:{s:1:\"a\";i:3;s:1:\"b\";s:9:\"site.menu\";s:1:\"c\";s:4:\"site\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:5:{s:1:\"a\";i:4;s:1:\"b\";s:12:\"site.setting\";s:1:\"c\";s:4:\"site\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:5:{s:1:\"a\";i:5;s:1:\"b\";s:9:\"role.menu\";s:1:\"c\";s:4:\"role\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:5:{s:1:\"a\";i:6;s:1:\"b\";s:10:\"role.index\";s:1:\"c\";s:4:\"role\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:5:{s:1:\"a\";i:7;s:1:\"b\";s:11:\"role.create\";s:1:\"c\";s:4:\"role\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:5:{s:1:\"a\";i:8;s:1:\"b\";s:9:\"role.edit\";s:1:\"c\";s:4:\"role\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:5:{s:1:\"a\";i:9;s:1:\"b\";s:11:\"role.delete\";s:1:\"c\";s:4:\"role\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:5:{s:1:\"a\";i:10;s:1:\"b\";s:16:\"permission.index\";s:1:\"c\";s:4:\"role\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:5:{s:1:\"a\";i:11;s:1:\"b\";s:17:\"permission.create\";s:1:\"c\";s:4:\"role\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:5:{s:1:\"a\";i:12;s:1:\"b\";s:15:\"permission.edit\";s:1:\"c\";s:4:\"role\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:5:{s:1:\"a\";i:13;s:1:\"b\";s:17:\"permission.delete\";s:1:\"c\";s:4:\"role\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:5:{s:1:\"a\";i:14;s:1:\"b\";s:20:\"add.roles.permission\";s:1:\"c\";s:4:\"role\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:5:{s:1:\"a\";i:15;s:1:\"b\";s:20:\"all.roles.permission\";s:1:\"c\";s:4:\"role\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:5:{s:1:\"a\";i:16;s:1:\"b\";s:10:\"admin.menu\";s:1:\"c\";s:5:\"admin\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:5:{s:1:\"a\";i:17;s:1:\"b\";s:9:\"all.admin\";s:1:\"c\";s:5:\"admin\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:5:{s:1:\"a\";i:18;s:1:\"b\";s:9:\"add.admin\";s:1:\"c\";s:5:\"admin\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:5:{s:1:\"a\";i:19;s:1:\"b\";s:9:\"all.users\";s:1:\"c\";s:5:\"admin\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:5:{s:1:\"a\";i:20;s:1:\"b\";s:17:\"image_preset.menu\";s:1:\"c\";s:12:\"image_preset\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:5:{s:1:\"a\";i:21;s:1:\"b\";s:18:\"image_preset.index\";s:1:\"c\";s:12:\"image_preset\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:5:{s:1:\"a\";i:22;s:1:\"b\";s:19:\"image_preset.create\";s:1:\"c\";s:12:\"image_preset\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:5:{s:1:\"a\";i:23;s:1:\"b\";s:17:\"image_preset.edit\";s:1:\"c\";s:12:\"image_preset\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:23;a:5:{s:1:\"a\";i:24;s:1:\"b\";s:19:\"image_preset.status\";s:1:\"c\";s:12:\"image_preset\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:24;a:5:{s:1:\"a\";i:25;s:1:\"b\";s:19:\"image_preset.delete\";s:1:\"c\";s:12:\"image_preset\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:25;a:5:{s:1:\"a\";i:26;s:1:\"b\";s:11:\"module.menu\";s:1:\"c\";s:6:\"module\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:26;a:5:{s:1:\"a\";i:27;s:1:\"b\";s:12:\"module.index\";s:1:\"c\";s:6:\"module\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:27;a:5:{s:1:\"a\";i:28;s:1:\"b\";s:13:\"module.create\";s:1:\"c\";s:6:\"module\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:28;a:5:{s:1:\"a\";i:29;s:1:\"b\";s:13:\"module.delete\";s:1:\"c\";s:6:\"module\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:29;a:5:{s:1:\"a\";i:30;s:1:\"b\";s:10:\"pages.menu\";s:1:\"c\";s:5:\"pages\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:30;a:5:{s:1:\"a\";i:31;s:1:\"b\";s:12:\"pages.create\";s:1:\"c\";s:5:\"pages\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:31;a:5:{s:1:\"a\";i:32;s:1:\"b\";s:11:\"pages.index\";s:1:\"c\";s:5:\"pages\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:32;a:5:{s:1:\"a\";i:33;s:1:\"b\";s:10:\"pages.edit\";s:1:\"c\";s:5:\"pages\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:33;a:5:{s:1:\"a\";i:34;s:1:\"b\";s:12:\"pages.status\";s:1:\"c\";s:5:\"pages\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:34;a:5:{s:1:\"a\";i:35;s:1:\"b\";s:12:\"pages.delete\";s:1:\"c\";s:5:\"pages\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:35;a:5:{s:1:\"a\";i:36;s:1:\"b\";s:9:\"blog.menu\";s:1:\"c\";s:4:\"post\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:36;a:5:{s:1:\"a\";i:37;s:1:\"b\";s:10:\"blog.index\";s:1:\"c\";s:4:\"post\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:37;a:5:{s:1:\"a\";i:38;s:1:\"b\";s:11:\"blog.create\";s:1:\"c\";s:4:\"post\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:38;a:5:{s:1:\"a\";i:39;s:1:\"b\";s:9:\"blog.edit\";s:1:\"c\";s:4:\"post\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:39;a:5:{s:1:\"a\";i:40;s:1:\"b\";s:11:\"blog.delete\";s:1:\"c\";s:4:\"post\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:40;a:5:{s:1:\"a\";i:41;s:1:\"b\";s:8:\"tag.menu\";s:1:\"c\";s:3:\"tag\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:41;a:5:{s:1:\"a\";i:42;s:1:\"b\";s:9:\"tag.index\";s:1:\"c\";s:3:\"tag\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:42;a:5:{s:1:\"a\";i:43;s:1:\"b\";s:10:\"tag.create\";s:1:\"c\";s:3:\"tag\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:43;a:5:{s:1:\"a\";i:44;s:1:\"b\";s:8:\"tag.edit\";s:1:\"c\";s:3:\"tag\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:44;a:5:{s:1:\"a\";i:45;s:1:\"b\";s:10:\"tag.delete\";s:1:\"c\";s:3:\"tag\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:45;a:5:{s:1:\"a\";i:46;s:1:\"b\";s:10:\"menus.menu\";s:1:\"c\";s:5:\"menus\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:46;a:5:{s:1:\"a\";i:47;s:1:\"b\";s:11:\"menus.index\";s:1:\"c\";s:5:\"menus\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:47;a:5:{s:1:\"a\";i:48;s:1:\"b\";s:12:\"menus.create\";s:1:\"c\";s:5:\"menus\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:48;a:5:{s:1:\"a\";i:49;s:1:\"b\";s:10:\"menus.edit\";s:1:\"c\";s:5:\"menus\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:49;a:5:{s:1:\"a\";i:50;s:1:\"b\";s:12:\"menus.delete\";s:1:\"c\";s:5:\"menus\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:50;a:5:{s:1:\"a\";i:51;s:1:\"b\";s:12:\"menus.status\";s:1:\"c\";s:5:\"menus\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:51;a:5:{s:1:\"a\";i:52;s:1:\"b\";s:14:\"menugroup.menu\";s:1:\"c\";s:9:\"menugroup\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:52;a:5:{s:1:\"a\";i:53;s:1:\"b\";s:15:\"menugroup.index\";s:1:\"c\";s:9:\"menugroup\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:53;a:5:{s:1:\"a\";i:54;s:1:\"b\";s:16:\"menugroup.create\";s:1:\"c\";s:9:\"menugroup\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:54;a:5:{s:1:\"a\";i:55;s:1:\"b\";s:14:\"menugroup.edit\";s:1:\"c\";s:9:\"menugroup\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:55;a:5:{s:1:\"a\";i:56;s:1:\"b\";s:16:\"menugroup.delete\";s:1:\"c\";s:9:\"menugroup\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:56;a:5:{s:1:\"a\";i:57;s:1:\"b\";s:17:\"blogcategory.menu\";s:1:\"c\";s:12:\"blogcategory\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:57;a:5:{s:1:\"a\";i:58;s:1:\"b\";s:19:\"blogcategory.create\";s:1:\"c\";s:12:\"blogcategory\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:58;a:5:{s:1:\"a\";i:59;s:1:\"b\";s:18:\"blogcategory.index\";s:1:\"c\";s:12:\"blogcategory\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:59;a:5:{s:1:\"a\";i:60;s:1:\"b\";s:17:\"blogcategory.edit\";s:1:\"c\";s:12:\"blogcategory\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:60;a:5:{s:1:\"a\";i:61;s:1:\"b\";s:19:\"blogcategory.delete\";s:1:\"c\";s:12:\"blogcategory\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:61;a:5:{s:1:\"a\";i:62;s:1:\"b\";s:19:\"blogcategory.status\";s:1:\"c\";s:12:\"blogcategory\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:62;a:5:{s:1:\"a\";i:63;s:1:\"b\";s:13:\"category.menu\";s:1:\"c\";s:4:\"post\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:63;a:5:{s:1:\"a\";i:64;s:1:\"b\";s:14:\"category.index\";s:1:\"c\";s:4:\"post\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:64;a:5:{s:1:\"a\";i:65;s:1:\"b\";s:15:\"category.create\";s:1:\"c\";s:4:\"post\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:65;a:5:{s:1:\"a\";i:66;s:1:\"b\";s:13:\"category.edit\";s:1:\"c\";s:4:\"post\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:66;a:5:{s:1:\"a\";i:67;s:1:\"b\";s:15:\"category.delete\";s:1:\"c\";s:4:\"post\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:67;a:5:{s:1:\"a\";i:68;s:1:\"b\";s:14:\"megamenu.index\";s:1:\"c\";s:8:\"megamenu\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:68;a:5:{s:1:\"a\";i:69;s:1:\"b\";s:15:\"megamenu.create\";s:1:\"c\";s:8:\"megamenu\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:69;a:5:{s:1:\"a\";i:70;s:1:\"b\";s:13:\"megamenu.edit\";s:1:\"c\";s:8:\"megamenu\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:70;a:5:{s:1:\"a\";i:71;s:1:\"b\";s:15:\"megamenu.delete\";s:1:\"c\";s:8:\"megamenu\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:71;a:5:{s:1:\"a\";i:72;s:1:\"b\";s:15:\"megamenu.status\";s:1:\"c\";s:8:\"megamenu\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:72;a:5:{s:1:\"a\";i:79;s:1:\"b\";s:17:\"testimonials.menu\";s:1:\"c\";s:12:\"testimonials\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:73;a:5:{s:1:\"a\";i:80;s:1:\"b\";s:19:\"testimonials.create\";s:1:\"c\";s:12:\"testimonials\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:74;a:5:{s:1:\"a\";i:81;s:1:\"b\";s:18:\"testimonials.index\";s:1:\"c\";s:12:\"testimonials\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:75;a:5:{s:1:\"a\";i:82;s:1:\"b\";s:17:\"testimonials.edit\";s:1:\"c\";s:12:\"testimonials\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:76;a:5:{s:1:\"a\";i:83;s:1:\"b\";s:19:\"testimonials.status\";s:1:\"c\";s:12:\"testimonials\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:77;a:5:{s:1:\"a\";i:84;s:1:\"b\";s:19:\"testimonials.delete\";s:1:\"c\";s:12:\"testimonials\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:78;a:5:{s:1:\"a\";i:91;s:1:\"b\";s:13:\"services.menu\";s:1:\"c\";s:8:\"services\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:79;a:5:{s:1:\"a\";i:92;s:1:\"b\";s:15:\"services.create\";s:1:\"c\";s:8:\"services\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:80;a:5:{s:1:\"a\";i:93;s:1:\"b\";s:14:\"services.index\";s:1:\"c\";s:8:\"services\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:81;a:5:{s:1:\"a\";i:94;s:1:\"b\";s:13:\"services.edit\";s:1:\"c\";s:8:\"services\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:82;a:5:{s:1:\"a\";i:95;s:1:\"b\";s:15:\"services.status\";s:1:\"c\";s:8:\"services\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:83;a:5:{s:1:\"a\";i:96;s:1:\"b\";s:15:\"services.delete\";s:1:\"c\";s:8:\"services\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:84;a:5:{s:1:\"a\";i:97;s:1:\"b\";s:11:\"slider.menu\";s:1:\"c\";s:6:\"slider\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:85;a:5:{s:1:\"a\";i:98;s:1:\"b\";s:13:\"slider.create\";s:1:\"c\";s:6:\"slider\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:86;a:5:{s:1:\"a\";i:99;s:1:\"b\";s:12:\"slider.index\";s:1:\"c\";s:6:\"slider\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:87;a:5:{s:1:\"a\";i:100;s:1:\"b\";s:11:\"slider.edit\";s:1:\"c\";s:6:\"slider\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:88;a:5:{s:1:\"a\";i:101;s:1:\"b\";s:13:\"slider.status\";s:1:\"c\";s:6:\"slider\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:89;a:5:{s:1:\"a\";i:102;s:1:\"b\";s:13:\"slider.delete\";s:1:\"c\";s:6:\"slider\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:90;a:5:{s:1:\"a\";i:109;s:1:\"b\";s:10:\"brand.menu\";s:1:\"c\";s:5:\"brand\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:91;a:5:{s:1:\"a\";i:110;s:1:\"b\";s:12:\"brand.create\";s:1:\"c\";s:5:\"brand\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:92;a:5:{s:1:\"a\";i:111;s:1:\"b\";s:11:\"brand.index\";s:1:\"c\";s:5:\"brand\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:93;a:5:{s:1:\"a\";i:112;s:1:\"b\";s:10:\"brand.edit\";s:1:\"c\";s:5:\"brand\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:94;a:5:{s:1:\"a\";i:113;s:1:\"b\";s:12:\"brand.status\";s:1:\"c\";s:5:\"brand\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:95;a:5:{s:1:\"a\";i:114;s:1:\"b\";s:12:\"brand.delete\";s:1:\"c\";s:5:\"brand\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:96;a:5:{s:1:\"a\";i:115;s:1:\"b\";s:12:\"project.menu\";s:1:\"c\";s:7:\"project\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:97;a:5:{s:1:\"a\";i:116;s:1:\"b\";s:14:\"project.create\";s:1:\"c\";s:7:\"project\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:98;a:5:{s:1:\"a\";i:117;s:1:\"b\";s:13:\"project.index\";s:1:\"c\";s:7:\"project\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:99;a:5:{s:1:\"a\";i:118;s:1:\"b\";s:12:\"project.edit\";s:1:\"c\";s:7:\"project\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:100;a:5:{s:1:\"a\";i:119;s:1:\"b\";s:14:\"project.status\";s:1:\"c\";s:7:\"project\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:101;a:5:{s:1:\"a\";i:120;s:1:\"b\";s:14:\"project.delete\";s:1:\"c\";s:7:\"project\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:1:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:10:\"SuperAdmin\";s:1:\"d\";s:3:\"web\";}}}', 1757483644);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `front` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `type`, `front`, `name`, `slug`, `image`, `text`, `status`) VALUES
(1, 0, 1, 'Control & automations', 'control-automations', '', NULL, 0),
(2, 0, 0, 'Fire', 'fire', '', NULL, 0),
(3, 0, 1, 'Low Current Systems', 'low-current-systems', '', NULL, 0),
(4, 0, 1, 'Data & Networking Solutions', 'data-networking-solutions', '', NULL, 0),
(5, 0, 1, 'Security Systems', 'security-systems', '', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `image_presets`
--

CREATE TABLE `image_presets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_presets`
--

INSERT INTO `image_presets` (`id`, `name`, `width`, `height`, `status`) VALUES
(1, 'small', 36, 36, 0),
(2, 'avatar', 30, 30, 0),
(3, 'photo', 100, 100, 0),
(4, 'thumb', 130, 100, 0),
(5, 'Profile', 370, 250, 0),
(6, 'Testimonials', 250, 318, 0),
(7, 'slider', 770, 520, 0),
(8, 'property_listing', 300, 350, 0),
(9, 'Agent_avatar', 300, 334, 0),
(10, 'portfolio_image', 347, 200, 0),
(11, 'blog_image_large', 837, 523, 0),
(12, 'blog_image_front', 515, 322, 0),
(13, 'logo', 150, 106, 0),
(14, 'Full', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mega_menus`
--

CREATE TABLE `mega_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `links` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mega_menus`
--

INSERT INTO `mega_menus` (`id`, `menu_id`, `title`, `links`) VALUES
(1, 2, 'Control & automations', '1,2,3,4'),
(2, 2, 'Fire', '6,7,8,9'),
(3, 2, 'Low Current Systems', '8,9,10,11'),
(4, 2, 'Data & Networking Solutions', '12,16'),
(5, 2, 'Security Systems', '13,14,15');

-- --------------------------------------------------------

--
-- Table structure for table `menugroups`
--

CREATE TABLE `menugroups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menugroups`
--

INSERT INTO `menugroups` (`id`, `title`) VALUES
(1, 'Main Menu'),
(2, 'Footer Menu');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` tinyint(4) DEFAULT 0,
  `title` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 1,
  `position` tinyint(4) NOT NULL,
  `group_id` varchar(20) NOT NULL,
  `megamenu` tinyint(1) NOT NULL DEFAULT 0,
  `attachment` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `title`, `url`, `type`, `position`, `group_id`, `megamenu`, `attachment`, `status`) VALUES
(1, 0, 'Company', 'about-us', 2, 1, '1', 0, '', 0),
(2, 0, 'Solutions', 'solutions', 2, 2, '1', 1, '', 0),
(3, 1, 'About us', 'about-us', 2, 3, '1', 0, '', 0),
(4, 1, 'Our Partners', 'brands', 2, 5, '1', 0, '', 0),
(5, 0, 'Projects', 'projects', 2, 4, '1', 0, '', 0),
(6, 1, 'Download Company Profile', '#', 1, 6, '1', 0, 'attachment/66jnBIzbHDznX1xyDFsgdrV7C6Lclv559FUsskvt.pdf', 0),
(7, 1, 'Download Product List', '#', 1, 7, '1', 0, '', 0),
(8, 0, 'Blog', 'blogs', 2, 8, '1', 0, '', 0),
(9, 0, 'Contact Us', 'contact-us', 2, 9, '1', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `metainfos`
--

CREATE TABLE `metainfos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `metable_id` bigint(20) UNSIGNED NOT NULL,
  `metable_type` varchar(255) NOT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metainfos`
--

INSERT INTO `metainfos` (`id`, `metable_id`, `metable_type`, `meta_description`, `meta_keywords`) VALUES
(1, 7, 'App\\Models\\Menu', NULL, NULL),
(2, 1, 'App\\Models\\Service', NULL, NULL),
(3, 3, 'App\\Models\\Menu', NULL, NULL),
(4, 5, 'App\\Models\\Menu', NULL, NULL),
(5, 1, 'App\\Models\\Blog', NULL, NULL),
(6, 2, 'App\\Models\\Blog', NULL, NULL),
(7, 2, 'App\\Models\\Service', NULL, NULL),
(8, 3, 'App\\Models\\Service', NULL, NULL),
(9, 4, 'App\\Models\\Service', NULL, NULL),
(10, 5, 'App\\Models\\Service', NULL, NULL),
(11, 8, 'App\\Models\\Service', NULL, NULL),
(12, 7, 'App\\Models\\Service', NULL, NULL),
(13, 9, 'App\\Models\\Service', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '2023_11_28_131149_create_site_settings_table', 1),
(4, '2023_11_28_131201_create_smtp_settings_table', 1),
(5, '2023_11_28_131225_create_menus_table', 1),
(6, '2023_11_28_131244_create_pages_table', 1),
(7, '2023_11_28_131306_create_modules_table', 1),
(8, '2023_11_28_132524_create_image_presets_table', 1),
(9, '2023_12_05_064558_create_menugroups_table', 1),
(10, '2023_12_05_120341_create_blogcategories_table', 1),
(11, '2023_12_05_120351_create_blogs_table', 1),
(12, '2023_12_05_120456_create_blogtags_table', 1),
(13, '2024_02_15_074005_create_testimonials_table', 1),
(14, '2025_04_16_114251_create_metainfos_table', 1),
(15, '2025_04_17_152736_create_mega_menus_table', 1),
(16, '2025_04_26_072044_create_permission_tables', 1),
(17, '2025_05_24_222344_add_group_name_to_permissions_table', 1),
(18, '2025_08_11_044830_create_sliders_table', 1),
(19, '2025_08_11_050535_create_categories_table', 1),
(21, '2025_08_15_075036_create_products_table', 2),
(22, '2025_08_15_090944_create_galleries_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `small_text` varchar(400) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `text` mediumtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `heading`, `link`, `small_text`, `image`, `text`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Contact Page', 'Convinced yet? Let\'s make something great together.', NULL, '5000', 'upload/module/thumbnail/1830358231602119.jpg', '<p>Satisfied Customers</p>', 0, '2024-09-12 06:36:29', '2024-09-12 06:36:29'),
(2, 'Contact Form', 'Drop Us a Line', NULL, 'Reach out to us from our contact form and we will get back to you shortly.', 'upload/module/thumbnail/1830358767930576.jpg', NULL, 0, '2024-09-12 06:38:38', '2024-09-12 06:38:38'),
(3, 'Emails', 'Contact Emails', NULL, '<strong>Support:</strong> support@mastheadtechnologies.com<br><strong>Sales:</strong> sales@mastheadtechnologies.com<br><strong>Hr: </strong>hr@mastheadtechnologies.com', '', NULL, 0, '2024-09-12 06:52:06', '2024-09-12 06:52:06'),
(4, 'Home About', 'About Muassasah Mwad AlTshyd', NULL, NULL, 'upload/module/thumbnail/1842585632560039.jpg', '<p>Welcome to Construction Material Trading official name Muassasah Mwad AlTshyd, Saudi Arabia\'s leading supplier of high-quality MEP, HVAC, Low Current, innovative and Automation solutions provider. We are committed to delivering excellence, innovation, and customer satisfaction while upholding the highest standards of safety and sustainability.</p><p>We are a trusted partner delivering end-to-end MEP, HVAC, Low Current, and Automation solutions across Saudi Arabia. Through global partnerships and local expertise, we ensure reliability, compliance, and innovation in every project</p>', 0, '2025-08-29 00:57:13', '2025-08-29 00:57:13'),
(6, 'About Page', 'Who Are We?', NULL, NULL, 'upload/module/thumbnail/1842716335654551.jpg', '<p>Muassasah Mwad AlTshyd is one of Saudi Arabia’s most trusted partners for integrated MEP, HVAC, Low Current, and Automation solutions. Leveraging a strong network of global and local partners, we deliver innovative and cost-effective systems engineered for long-term reliability.</p><p><br>Guided by the principles of Vision 2030, our approach combines international expertise with localized procurement to support national growth while upholding the highest standards of quality and safety. From critical systems like fire alarm and security systems to intelligent buildings, guest room automation and IOT, our solutions are trusted by leading clients across the commercial, hospitality, and infrastructure sectors. Muassasah Mwad AlTshyd stands as a proven partner, committed to delivering integrated engineering excellence</p>', 0, '2025-09-08 17:06:54', '2025-09-08 17:06:54'),
(7, 'home vision', 'Vision 2030 & Local Commitment', NULL, NULL, '', '<p>At Muassasah Mwad Al Tshyd, we\'re passionate about building the future of Saudi Arabia. Our focus is simple: we invest in local talents and businesses, use the smartest technology to create innovative solutions, and ensure everything we build is sustainable for the long run. For us, it’s about more than just projects—it’s about helping build a stronger, smarter, and greener Kingdom, together</p>', 0, '2025-09-08 17:09:55', '2025-09-08 17:09:55');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `menu_id` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `small_text` varchar(400) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `text` mediumtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `group_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'smtp.menu', 'smtp', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(2, 'smtp.setting', 'smtp', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(3, 'site.menu', 'site', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(4, 'site.setting', 'site', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(5, 'role.menu', 'role', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(6, 'role.index', 'role', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(7, 'role.create', 'role', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(8, 'role.edit', 'role', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(9, 'role.delete', 'role', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(10, 'permission.index', 'role', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(11, 'permission.create', 'role', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(12, 'permission.edit', 'role', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(13, 'permission.delete', 'role', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(14, 'add.roles.permission', 'role', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(15, 'all.roles.permission', 'role', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(16, 'admin.menu', 'admin', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(17, 'all.admin', 'admin', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(18, 'add.admin', 'admin', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(19, 'all.users', 'admin', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(20, 'image_preset.menu', 'image_preset', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(21, 'image_preset.index', 'image_preset', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(22, 'image_preset.create', 'image_preset', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(23, 'image_preset.edit', 'image_preset', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(24, 'image_preset.status', 'image_preset', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(25, 'image_preset.delete', 'image_preset', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(26, 'module.menu', 'module', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(27, 'module.index', 'module', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(28, 'module.create', 'module', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(29, 'module.delete', 'module', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(30, 'pages.menu', 'pages', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(31, 'pages.create', 'pages', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(32, 'pages.index', 'pages', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(33, 'pages.edit', 'pages', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(34, 'pages.status', 'pages', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(35, 'pages.delete', 'pages', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(36, 'blog.menu', 'post', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(37, 'blog.index', 'post', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(38, 'blog.create', 'post', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(39, 'blog.edit', 'post', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(40, 'blog.delete', 'post', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(41, 'tag.menu', 'tag', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(42, 'tag.index', 'tag', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(43, 'tag.create', 'tag', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(44, 'tag.edit', 'tag', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(45, 'tag.delete', 'tag', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(46, 'menus.menu', 'menus', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(47, 'menus.index', 'menus', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(48, 'menus.create', 'menus', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(49, 'menus.edit', 'menus', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(50, 'menus.delete', 'menus', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(51, 'menus.status', 'menus', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(52, 'menugroup.menu', 'menugroup', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(53, 'menugroup.index', 'menugroup', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(54, 'menugroup.create', 'menugroup', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(55, 'menugroup.edit', 'menugroup', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(56, 'menugroup.delete', 'menugroup', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(57, 'blogcategory.menu', 'blogcategory', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(58, 'blogcategory.create', 'blogcategory', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(59, 'blogcategory.index', 'blogcategory', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(60, 'blogcategory.edit', 'blogcategory', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(61, 'blogcategory.delete', 'blogcategory', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(62, 'blogcategory.status', 'blogcategory', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(63, 'category.menu', 'post', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(64, 'category.index', 'post', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(65, 'category.create', 'post', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(66, 'category.edit', 'post', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(67, 'category.delete', 'post', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(68, 'megamenu.index', 'megamenu', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(69, 'megamenu.create', 'megamenu', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(70, 'megamenu.edit', 'megamenu', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(71, 'megamenu.delete', 'megamenu', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(72, 'megamenu.status', 'megamenu', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(79, 'testimonials.menu', 'testimonials', 'web', '2025-08-15 03:15:51', '2025-08-15 03:15:51'),
(80, 'testimonials.create', 'testimonials', 'web', '2025-08-15 03:15:51', '2025-08-15 03:15:51'),
(81, 'testimonials.index', 'testimonials', 'web', '2025-08-15 03:15:51', '2025-08-15 03:15:51'),
(82, 'testimonials.edit', 'testimonials', 'web', '2025-08-15 03:15:51', '2025-08-15 03:15:51'),
(83, 'testimonials.status', 'testimonials', 'web', '2025-08-15 03:15:51', '2025-08-15 03:15:51'),
(84, 'testimonials.delete', 'testimonials', 'web', '2025-08-15 03:15:51', '2025-08-15 03:15:51'),
(91, 'services.menu', 'services', 'web', '2025-08-24 02:21:24', '2025-08-24 02:21:24'),
(92, 'services.create', 'services', 'web', '2025-08-24 02:21:24', '2025-08-24 02:21:24'),
(93, 'services.index', 'services', 'web', '2025-08-24 02:21:24', '2025-08-24 02:21:24'),
(94, 'services.edit', 'services', 'web', '2025-08-24 02:21:24', '2025-08-24 02:21:24'),
(95, 'services.status', 'services', 'web', '2025-08-24 02:21:24', '2025-08-24 02:21:24'),
(96, 'services.delete', 'services', 'web', '2025-08-24 02:21:24', '2025-08-24 02:21:24'),
(97, 'slider.menu', 'slider', 'web', '2025-08-24 03:06:08', '2025-08-24 03:06:08'),
(98, 'slider.create', 'slider', 'web', '2025-08-24 03:06:09', '2025-08-24 03:06:09'),
(99, 'slider.index', 'slider', 'web', '2025-08-24 03:06:09', '2025-08-24 03:06:09'),
(100, 'slider.edit', 'slider', 'web', '2025-08-24 03:06:09', '2025-08-24 03:06:09'),
(101, 'slider.status', 'slider', 'web', '2025-08-24 03:06:09', '2025-08-24 03:06:09'),
(102, 'slider.delete', 'slider', 'web', '2025-08-24 03:06:09', '2025-08-24 03:06:09'),
(109, 'brand.menu', 'brand', 'web', '2025-09-07 03:40:08', '2025-09-07 03:40:08'),
(110, 'brand.create', 'brand', 'web', '2025-09-07 03:40:08', '2025-09-07 03:40:08'),
(111, 'brand.index', 'brand', 'web', '2025-09-07 03:40:08', '2025-09-07 03:40:08'),
(112, 'brand.edit', 'brand', 'web', '2025-09-07 03:40:08', '2025-09-07 03:40:08'),
(113, 'brand.status', 'brand', 'web', '2025-09-07 03:40:08', '2025-09-07 03:40:08'),
(114, 'brand.delete', 'brand', 'web', '2025-09-07 03:40:08', '2025-09-07 03:40:08'),
(115, 'project.menu', 'project', 'web', '2025-09-07 04:29:59', '2025-09-07 04:29:59'),
(116, 'project.create', 'project', 'web', '2025-09-07 04:29:59', '2025-09-07 04:29:59'),
(117, 'project.index', 'project', 'web', '2025-09-07 04:29:59', '2025-09-07 04:29:59'),
(118, 'project.edit', 'project', 'web', '2025-09-07 04:29:59', '2025-09-07 04:29:59'),
(119, 'project.status', 'project', 'web', '2025-09-07 04:29:59', '2025-09-07 04:29:59'),
(120, 'project.delete', 'project', 'web', '2025-09-07 04:29:59', '2025-09-07 04:29:59');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `stext` varchar(500) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `front` tinyint(1) DEFAULT 0,
  `client` varchar(100) DEFAULT NULL,
  `contractor` varchar(100) DEFAULT NULL,
  `specialist_supplier` varchar(100) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `service_id`, `name`, `slug`, `image`, `stext`, `text`, `front`, `client`, `contractor`, `specialist_supplier`, `brand`, `location`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Al Akaria – Olaya Street, Riyadh', 'al-akaria-olaya-street-riyadh', 'upload/projects/thumbnail/1842599640199663.jpeg', 'We have successfully completed the upgrade of the Fire Alarm system to a new system', '<p>The scope includes the supply of the new fire alarm system, including installation of the fire alarm system (2nd fix) and testing &amp; commissioning with handing over of the system</p>', 0, 'Al-Akaria', 'Idworks Global Company', 'Muassasah Mwad AlTshyd', '9,10,11', 'Al Olaya Street - Riyadh', 0, NULL, '2025-09-08 11:28:24'),
(2, 2, 'Al Yamama – University Riyadh', 'al-yamama-university-riyadh', 'upload/projects/thumbnail/1842617202763293.jpeg', 'We are in the process of upgrading the existing BMS, Fire, CCTV and ACS System for the entire University. The system includes HVAC, plumbing systems, Lighting control system, upgrading of the legacy Fire alarm system, CCTV and ACS system.', '<p>The scope includes the supply of BMS, CCTV and Fire materials with field devices along with installation, testing &amp; commissioning, and handing over.</p>', 0, 'Al-Yamama University', 'International Contracting Company', 'Muassasah Mwad AlTshyd', '19,2,6,9,21,3,1,10,11,Hikvision', 'Madinah Road - Riyadh', 0, '2025-09-07 09:21:41', '2025-09-08 11:30:15'),
(3, 2, 'Kimpton IHG Hotel KAFD - Riyadh', 'kimpton-ihg-hotel-kafd-riyadh', 'upload/projects/thumbnail/1842617318677718.jpeg', 'We have completed the handing over of the wireless distress/panic alarm system and the handing over of the Avaya Server for IP telephony', '<p>The scope includes the supply of a wireless panic alarm system, installation of the panic alarm system, and testing &amp; commissioning with handing over of the system</p><p>For the Avaya Server, our scope was testing &amp; commissioning, including handing over</p>', 0, 'KAFD', '3S', 'Construction  Material', '12,13', 'KAFD parcel-4.05 at Boulevard Street, Aqiq District', 0, '2025-09-07 09:23:17', '2025-09-08 11:28:58'),
(4, 2, 'King Khalid International Airport Load Center 3', 'king-khalid-international-airport-load-center-3', 'upload/projects/thumbnail/1842617511033785.jpeg', 'We have successfully completed the completion of Chiller Plant Manager.', '<p>The scope includes the supply of the BMS Materials and testing &amp; commissioning with handing over of the system</p>', 0, 'GACA', 'SSEM', 'Muassasah Mwad AlTshyd', '1,2,3', 'Airport Load Center 3 - Riyadh', 0, '2025-09-07 09:26:12', '2025-09-07 09:26:35'),
(5, 3, 'Marriott Hotel – Diplomatic Quarter', 'marriott-hotel-diplomatic-quarter', 'upload/projects/thumbnail/1842617584346576.jpeg', 'We have commissioned new HVAC units and upgraded the existing systems', '<p>Our scope included upgrading of the existing AHU and supply of new materials for the VAV and FCUs, including testing &amp; commissioning and handing over.</p>', 0, 'Marriott', 'Anfa Contracting Company', 'Muassasah Mwad AlTshyd', '1,2,3,6', 'Diplomatic Quarter - Riyadh', 0, '2025-09-07 09:27:45', '2025-09-07 09:27:45'),
(6, 4, 'Riyadh Cables Factory', 'riyadh-cables-factory', 'upload/projects/thumbnail/1842617667547775.jpeg', 'Completion of the HVAC system in the Riyadh Cable Factory', '<p>Our scope included complete supply of BMS materials along with handing over of the system</p>', 0, 'Riyadh Cables', 'Raneem Al Wusta', 'Muassasah Mwad AlTshyd', '1,2,3,6', '2nd Industrial City, Kharj Road – Riyadh', 0, '2025-09-07 09:29:04', '2025-09-08 11:13:56');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(2, 'Editor', 'web', '2025-08-15 02:14:08', '2025-08-15 02:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` tinyint(4) NOT NULL DEFAULT 0,
  `name` varchar(100) NOT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `favorite` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `small_text` varchar(255) DEFAULT NULL,
  `text` mediumtext DEFAULT NULL,
  `brands` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `category_id`, `name`, `slug`, `favorite`, `image`, `small_text`, `text`, `brands`, `status`) VALUES
(1, 1, 'Building Management System', 'building-management-system', 0, 'upload/services/thumbnail/1842624297280304.jpg', 'Linking productivity and well-being to controlled comfort, air quality, and lighting reflects widely cited BMS outcomes that enhance occupant experience and performance.', NULL, '1,2,3', 0),
(2, 1, 'Guest Room Management System', 'guest-room-management-system', 0, 'upload/services/thumbnail/1842624591615327.jpg', 'Automated guest room controls for lighting, temperature, and entertainment systems to enhance guest comfort and operational efficiency.', NULL, '4', 0),
(3, 1, 'HVAC Control System', 'hvac-control-system', 0, 'upload/services/thumbnail/1842624537126337.jpg', 'Centralized heating, ventilation, and air conditioning management to optimize indoor climate while reducing energy consumption and maintenance costs.', NULL, '5', 0),
(4, 1, 'Lighting Control System', 'lighting-control-system', 0, 'upload/services/thumbnail/1842624820892177.jpg', 'Intelligent lighting management with automated scheduling, occupancy sensing, and dimming controls to improve energy efficiency and user comfort.', NULL, '6', 0),
(5, 1, 'Meters & Billing System', 'meters-billing-system', 0, 'upload/services/thumbnail/1842624989241559.jpg', 'Real-time monitoring and automated billing for utilities including electricity, water, and gas consumption to enable accurate cost allocation and energy management.', NULL, '7,8', 0),
(6, 2, 'Fire Alarm System', 'fire-alarm-system', 0, NULL, 'Comprehensive fire detection and alarm network with smoke sensors, heat detectors, and notification devices to ensure occupant safety and regulatory compliance.', NULL, NULL, 0),
(7, 2, 'VESDA System', 'vesda-system', 0, 'upload/services/thumbnail/1842625289773936.jpg', 'Very Early Smoke Detection Apparatus providing ultra-sensitive air sampling smoke detection for critical areas requiring advanced fire protection.', NULL, NULL, 0),
(8, 3, 'IP Telephony System', 'ip-telephony-system', 0, 'upload/services/thumbnail/1842625156732354.jpg', 'Voice over Internet Protocol communication system enabling scalable, cost-effective telephony with advanced features like unified messaging and mobility.', NULL, NULL, 0),
(9, 3, 'Nurse Call System', 'nurse-call-system', 0, 'upload/services/thumbnail/1842625435510942.jpg', 'Patient-to-staff communication system allowing immediate assistance requests and priority-based response management in healthcare facilities.', NULL, NULL, 0),
(10, 3, 'Public Address System', 'public-address-system', 0, NULL, 'Building-wide audio communication system for announcements, emergency notifications, and background music distribution across multiple zones.', NULL, NULL, 0),
(11, 3, 'UPS System', 'ups-system', 0, NULL, 'Uninterruptible Power Supply providing backup power and voltage regulation to protect critical systems from power outages and electrical disturbances.', NULL, NULL, 0),
(12, 4, 'Data and Passive Components', 'data-and-passive-components', 0, NULL, 'Structured cabling infrastructure including fiber optic and copper networks, patch panels, and passive connectivity components supporting all building systems.', NULL, NULL, 0),
(13, 5, 'CCTV', 'cctv', 0, NULL, 'Closed Circuit Television surveillance system with IP cameras, recording capabilities, and remote monitoring to enhance security and incident management.', NULL, NULL, 0),
(14, 5, 'ACS', 'acs', 0, NULL, 'Access Control System managing entry permissions through card readers, biometric scanners, and electronic locks to secure restricted areas and track personnel movement.', NULL, NULL, 0),
(15, 5, 'Intrusion Detection System', 'intrusion-detection-system', 0, NULL, 'Perimeter and interior security monitoring with motion sensors, door/window contacts, and glass break detectors to detect unauthorized access attempts.', NULL, NULL, 0),
(16, 4, 'IOT Solutions', 'iot-solutions', 0, NULL, 'We harness the power of the Internet of Things (IoT) to create a truly intelligent and unified building ecosystem.', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3VFX6lfG5mcWizaRlgHIyyuqGybkMHYkUThaklAp', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUzJVckVJM2diTFplUmRpS3pNWUdUZjlzYWRET1ZvSmNOWHA1Um4zUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly9sYXJhdmVsX2NvbnN0cnVjdGlvbnMudGVzdC9hZG1pbi9icmFuZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9fQ==', 1757398494),
('DZdS2wQue7D8fLYPombvv5zijlKuq8WJL2Lwuk2g', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.22.1 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaFRkZ1JWTExVQUF5VmJjMWFqQVdCMHN2RjRjMjZ1MmI5Y0lWNXE2MCI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly9sYXJhdmVsX2NvbnN0cnVjdGlvbnMudGVzdC8/aGVyZD1wcmV2aWV3Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1757397012),
('M3IYKGoP9CpHI3MytSZz4ehczGDzq6Tf2e4ou3CP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR3V4bzNLZWcxRkpYdGVNcFdDb2ZIR01lVmEyRE83UzBYVVl4QnVRbSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly9sYXJhdmVsX2NvbnN0cnVjdGlvbnMudGVzdC9hZG1pbi9sb2dpbiI7fX0=', 1757396833),
('VKEV2lKCqH7XQFYK1PjMkkB4YU7Lw9kqu1AfLadS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMkxhaFRFVktVY0xzWFh4N1NDUG1yZjh2V2prZkhPbU5UbGtRZUN3SiI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9sYXJhdmVsX2NvbnN0cnVjdGlvbnMudGVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757397014);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `favicon` varchar(100) DEFAULT NULL,
  `site_title` varchar(100) NOT NULL,
  `app_name` varchar(100) DEFAULT NULL,
  `meta_description` mediumtext DEFAULT NULL,
  `meta_keywords` mediumtext DEFAULT NULL,
  `about` varchar(200) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `twitter` varchar(50) DEFAULT NULL,
  `pinterest` varchar(50) DEFAULT NULL,
  `instagram` varchar(50) DEFAULT NULL,
  `youtube` varchar(50) DEFAULT NULL,
  `copywrite` varchar(100) DEFAULT NULL,
  `pagination` int(11) NOT NULL DEFAULT 6,
  `script` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `logo`, `favicon`, `site_title`, `app_name`, `meta_description`, `meta_keywords`, `about`, `phone`, `address`, `email`, `facebook`, `twitter`, `pinterest`, `instagram`, `youtube`, `copywrite`, `pagination`, `script`, `created_at`, `updated_at`) VALUES
(1, 'upload/template/thumbnail/1842618048986219.png', 'upload/template/thumbnail/1841318869029999.png', 'Muassasah Mwad AlTshyd', 'Muassasah Mwad AlTshyd', NULL, NULL, 'Welcome to Construction Material Trading official name Muassasah Mwad AlTshyd, Saudi Arabia\'s leading supplier of high-quality MEP, HVAC, Low Current, innovative and Automation solutions provider.', '966-546308237', 'Building No.3242, Nhaound, Al-Aziziyah District, Riyadh-14513, Saudi Arabia', 'sales@consmtest.com', '#', '#', '#', NULL, NULL, NULL, 10, '', '2025-08-15 07:44:08', '2025-09-07 09:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `link`, `title`, `sub_title`, `image`, `text`, `status`) VALUES
(1, 'Slider-1', NULL, 'Precision, Innovation, and Reliability', 'in Every System We Deliver', 'upload/slider/thumbnail/1841325484379738.jpg', '<p>Innovative Low Current &amp; Automation Solutions for a Smarter Saudi Arabia.</p>', 0),
(2, 'Slider-2', NULL, 'Empowering Smart Buildings with Seamless Automation', 'We are here to take care of all your smart, low-current, and automation needs—making your building more intelligent, safe, and energy efficient.', 'upload/slider/thumbnail/1841325774957390.jpg', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `smtp_settings`
--

CREATE TABLE `smtp_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mailer` varchar(255) DEFAULT NULL,
  `host` varchar(255) DEFAULT NULL,
  `port` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `encryption` varchar(255) DEFAULT NULL,
  `from_name` varchar(100) DEFAULT NULL,
  `from_email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smtp_settings`
--

INSERT INTO `smtp_settings` (`id`, `mailer`, `host`, `port`, `username`, `password`, `encryption`, `from_name`, `from_email`, `created_at`, `updated_at`) VALUES
(1, 'smtp', 'mail.demo.in', '465', 'support@demo.in', 'chamaasdas', 'ssl', 'Muassasah Mwad AlTshyd', 'support@mastheadtechnologies.in', '2023-07-24 20:34:21', '2025-08-17 11:07:17');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `designation` varchar(60) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `text` mediumtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `image`, `text`, `status`) VALUES
(1, 'Eng. Faisal Al‑Harbi', 'Facilities Director, Riyadh Commercial Tower', NULL, 'Muassasah Mwad AlTshyd our HVAC, lighting, and metering into a single BMS dashboard. We saw immediate energy savings and far better visibility for reporting.', 0),
(2, 'Sara Al‑Qahtani', 'Sustainability Lead, Mixed‑Use Development (Jeddah)', NULL, 'Their team delivered a smooth migration to a modern BMS with analytics. Fault detection cut waste and complaints dropped significantly.', 0),
(3, 'Mohammed Al‑Amri', 'Operations Manager, 5‑Star Hotel (Makkah)', NULL, 'Smart room controls and centralized BMS improved guest comfort while reducing energy during low occupancy hours. Excellent support and training.', 0),
(4, 'Dr. Hanan Al‑Mutairi', 'Hospital Administrator, Dammam', NULL, 'We rely on Aala Tech for HVAC, IAQ, and emergency integrations. The BMS helps maintain comfort targets and compliance with audit-ready data.', 0),
(5, 'Omar Al‑Ghamdi', 'Real Estate Asset Manager, KSA Portfolio', NULL, 'Portfolio dashboards and open integrations made budgeting and ESG reporting easier. Clear ROI from optimization and maintenance reduction.', 0),
(6, 'Eng. Reem Al‑Otaibi', 'MEP Lead, Government Campus (Riyadh)', NULL, 'Seamless integration of access control, fire alarm, and metering with the BMS. Strong engineering discipline and on‑time delivery.', 0),
(7, 'Khalid Al‑Dosari', 'Factory GM, Eastern Province', NULL, 'Variable frequency drives and BMS sequencing stabilized our loads and reduced downtime. The mobile dashboards are invaluable for on‑call teams.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `about`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', NULL, '$2y$12$XYVfK/Msk7ekN8vCsZX/dOnRfRIeIfEkmeFRvPVqQQYdBHYSdAoFi', 'upload/user/thumbnail/1830193814201669.jpg', NULL, NULL, 'admin', 0, 'd6ruabvGCDiJbUNDIPIHs9X5ThYTMzjB0JJ3NE70AlnP9ppDQvce7dxXDlmm', '2025-08-15 02:14:08', '2025-08-15 02:14:08'),
(2, 'sumit kumar', 'sumit', 'sumit@gmail.com', NULL, '$2y$12$hZpVX8vApS7jmIVFFjW9iOZ/Es2dC9j5Oy7erTTEonIH9zzdKdVY2', '', NULL, NULL, 'admin', 0, NULL, '2025-08-15 02:14:08', '2025-08-15 02:14:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogcategories`
--
ALTER TABLE `blogcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogtags`
--
ALTER TABLE `blogtags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_presets`
--
ALTER TABLE `image_presets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mega_menus`
--
ALTER TABLE `mega_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menugroups`
--
ALTER TABLE `menugroups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `position` (`position`);

--
-- Indexes for table `metainfos`
--
ALTER TABLE `metainfos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `metainfos_metable_id_metable_type_index` (`metable_id`,`metable_type`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smtp_settings`
--
ALTER TABLE `smtp_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogcategories`
--
ALTER TABLE `blogcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogtags`
--
ALTER TABLE `blogtags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `image_presets`
--
ALTER TABLE `image_presets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mega_menus`
--
ALTER TABLE `mega_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menugroups`
--
ALTER TABLE `menugroups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `metainfos`
--
ALTER TABLE `metainfos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `smtp_settings`
--
ALTER TABLE `smtp_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
