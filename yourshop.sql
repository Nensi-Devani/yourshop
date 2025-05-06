-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2025 at 04:00 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yourshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '1=visible,0=hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `category_id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'CB-COLEBROOK ', 'cb-colebrook', 1, '2024-03-16 02:20:39', '2024-03-16 02:20:39'),
(2, 2, 'Giordano', 'giordano', 1, '2024-03-16 02:20:58', '2024-03-16 02:20:58'),
(3, 2, 'FRENCH CROWN', 'french-crown', 1, '2024-03-16 02:21:19', '2024-03-16 02:21:19'),
(4, 1, 'KLOSIA', 'klosia', 1, '2024-03-16 02:21:53', '2024-03-16 05:06:24'),
(5, 1, 'GoSriKi', 'gosriki', 1, '2024-03-16 02:22:10', '2024-03-16 02:22:10'),
(6, 1, 'Naixa', 'naixa', 1, '2024-03-16 02:22:42', '2024-03-16 02:22:42'),
(7, 1, 'Leriya Fashion', 'leriya-fashion', 1, '2024-03-16 05:18:09', '2024-03-16 05:18:30'),
(8, 1, 'Kids Brand', 'kids-brand', 1, '2024-03-18 13:11:27', '2024-04-11 23:41:38'),
(9, 4, 'Lenovo', 'lanovo-laptop', 1, '2024-03-22 02:46:55', '2024-03-22 02:47:56'),
(10, 1, 'Denill', 'denill', 1, '2024-03-23 03:53:07', '2024-03-23 03:53:07'),
(11, 1, 'Demo', 'demo', 0, '2024-03-28 04:21:25', '2024-03-28 04:26:51'),
(12, 1, 'Adidas', 'adidas', 1, '2024-04-26 18:48:31', '2024-04-26 18:48:31'),
(16, 12, 'MATTERHORN', 'matterhorn', 1, '2024-04-26 23:54:20', '2024-04-26 23:54:20'),
(17, 12, 'KridayKraft', 'kridaykraft', 1, '2024-04-26 23:57:11', '2024-04-26 23:57:11'),
(18, 8, 'Estele', 'estele', 1, '2024-04-27 00:31:22', '2024-04-27 00:31:22');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `size_id` bigint UNSIGNED DEFAULT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `size_id`, `quantity`) VALUES
(22, 2, 15, 1, 1),
(23, 2, 18, 1, 1),
(61, 6, 16, NULL, 1),
(63, 6, 21, 1, 1),
(64, 1, 21, 1, 1),
(65, 1, 18, 6, 1),
(66, 1, 16, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0=hidden,1=visible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Women', 'women', 'Women Category', 'Women Products', 'Women Products', 'Women Products', 1, '2024-03-16 02:11:38', '2024-03-16 02:11:38'),
(2, 'Men', 'men', 'Men Products', 'Men Products', 'Men Products', 'Men Products', 1, '2024-03-16 02:12:15', '2024-03-16 02:12:15'),
(4, 'Laptop', 'laptop', 'Laptops', 'Lapotps', 'Lapotps', 'Lapotps', 1, '2024-03-16 02:13:51', '2024-03-16 02:13:51'),
(5, 'Mobile', 'mobile', 'Mobile', 'Mobiles', 'Mobiles', 'Mobiles', 1, '2024-03-16 02:14:30', '2024-03-16 02:14:30'),
(7, 'Beauty', 'beauty', 'Beauty', 'Beauty Products', 'Beauty Products', 'Beauty Products', 1, '2024-03-16 02:15:56', '2024-03-16 02:15:56'),
(8, 'Jewellary', 'jewellery', 'Jewellary', 'Jewellary', 'Jewellary', 'Jewellary', 1, '2024-03-16 02:16:53', '2024-03-16 02:16:53'),
(9, 'Music', 'music', 'Music', 'Musical Instruments', 'Music', 'Music', 1, '2024-03-16 02:18:03', '2024-03-16 02:18:03'),
(10, 'Pet Products', 'pet-products', 'Pet Products', 'Pet Products', 'Pet Products', 'Pet Products', 1, '2024-03-16 02:19:00', '2024-03-16 02:19:00'),
(11, 'Footwear', 'footwear', 'Footwear', 'Footwear', 'Footwear', 'Footwear', 1, '2024-03-16 02:19:36', '2024-03-16 02:19:36'),
(12, 'Home & Furniture', 'home-furniture', 'Home & Furniture', 'Home & Furniture', 'Home & Furniture', 'Home & Furniture', 1, '2024-03-23 04:57:20', '2024-03-23 04:57:20'),
(13, 'Demo', 'demo', 'demo', 'demo', 'demo', 'demo', 0, '2024-03-28 03:44:06', '2024-03-28 03:44:42'),
(14, 'Photos & Idols', 'photos-idols', 'Photos & Idols', 'Photos & Idols', 'Photos & Idols', 'Photos & Idols', 1, '2024-04-26 19:09:23', '2024-04-26 19:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '1=visible, 0=hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Red', '#ec3636', 1, '2024-03-16 02:22:50', '2024-03-27 00:59:44'),
(2, 'Blue', '#2072b1', 1, '2024-03-16 02:22:56', '2024-03-27 01:00:09'),
(3, 'Pink', '#f20d7c', 1, '2024-03-16 02:23:04', '2024-03-27 01:00:39'),
(4, 'White', '#f7f2f2', 1, '2024-03-16 02:23:11', '2024-03-27 01:00:56'),
(5, 'Skin', '#fdce7c', 1, '2024-03-16 02:23:16', '2024-03-27 01:01:14'),
(6, 'Black', '#000000', 1, '2024-03-16 02:23:23', '2024-03-27 01:01:42'),
(7, 'Yellow', '#fbf413', 1, '2024-03-16 02:23:35', '2024-03-27 01:01:54'),
(8, 'Brown', '#714f04', 1, '2024-03-16 02:23:41', '2024-03-27 01:02:13'),
(9, 'Green', '#3a9712', 1, '2024-03-16 02:23:50', '2024-03-27 01:02:24'),
(10, 'Grey', '#b1aaaa', 1, '2024-03-16 02:23:58', '2024-03-28 04:26:00'),
(11, 'Bluegreen', '#41aaaa', 1, '2024-03-27 00:33:50', '2024-03-28 04:25:25'),
(12, 'Violet', '#cf28f0', 1, '2024-04-01 13:31:40', '2024-04-01 13:31:40');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `sub_category_id` bigint UNSIGNED NOT NULL,
  `material` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '1=visible,0=hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `category_id`, `sub_category_id`, `material`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Cotton', 1, '2024-03-28 02:12:32', '2024-03-28 02:12:32'),
(3, 1, 4, 'Reyon', 1, '2024-03-28 02:15:13', '2024-03-28 02:32:47'),
(4, 1, 1, 'Rayon', 1, '2024-03-28 23:31:44', '2024-03-28 23:31:44'),
(5, 1, 1, 'Polyster', 1, '2024-03-28 23:31:55', '2024-03-28 23:31:55'),
(6, 1, 4, 'Cotton', 1, '2024-04-01 13:32:11', '2024-04-01 13:32:11'),
(7, 1, 4, 'Cotton Blend', 1, '2024-04-01 13:32:34', '2024-04-01 13:32:34'),
(8, 1, 4, 'Silk', 1, '2024-04-01 13:32:50', '2024-04-01 13:32:50'),
(9, 1, 7, 'Denim', 1, '2024-04-26 18:48:59', '2024-04-26 18:48:59');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `order_column` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Category', 1, '56aa0420-3e2a-410e-83c3-2b912602178d', 'category_avatar', 'women', 'women.png', 'image/png', 'public', 'public', 3229, '[]', '[]', '[]', '[]', 1, '2024-03-16 02:11:38', '2024-03-16 02:11:38'),
(2, 'App\\Models\\Category', 1, '96da41d7-69e8-48de-b3d3-41d80fc16632', 'category_image', 'women', 'women.png', 'image/png', 'public', 'public', 851714, '[]', '[]', '[]', '[]', 2, '2024-03-16 02:11:39', '2024-03-16 02:11:39'),
(3, 'App\\Models\\Category', 2, 'd9ba76cc-a785-4d0e-9111-b2f1fbf6ea17', 'category_avatar', 'men', 'men.png', 'image/png', 'public', 'public', 4587, '[]', '[]', '[]', '[]', 1, '2024-03-16 02:12:16', '2024-03-16 02:12:16'),
(4, 'App\\Models\\Category', 2, 'e17b37f3-1a3c-4f8c-bbd1-df4a87e0343b', 'category_image', 'men', 'men.jpg', 'image/jpeg', 'public', 'public', 6060, '[]', '[]', '[]', '[]', 2, '2024-03-16 02:12:16', '2024-03-16 02:12:16'),
(7, 'App\\Models\\Category', 4, '20f7363f-7f2a-485a-8213-963efda00589', 'category_avatar', 'laptop', 'laptop.png', 'image/png', 'public', 'public', 891, '[]', '[]', '[]', '[]', 1, '2024-03-16 02:13:51', '2024-03-16 02:13:51'),
(8, 'App\\Models\\Category', 4, 'dc6f8aaf-605e-4d89-a5bb-ae6b69084333', 'category_image', 'l2', 'l2.jpeg', 'image/jpeg', 'public', 'public', 4404, '[]', '[]', '[]', '[]', 2, '2024-03-16 02:13:51', '2024-03-16 02:13:51'),
(9, 'App\\Models\\Category', 5, '52cd4c18-da62-41f0-b48d-21ac5738ae87', 'category_avatar', 'mobile', 'mobile.png', 'image/png', 'public', 'public', 775, '[]', '[]', '[]', '[]', 1, '2024-03-16 02:14:30', '2024-03-16 02:14:30'),
(13, 'App\\Models\\Category', 7, '17ed7e71-578b-4fbc-a30d-f35c81c48f91', 'category_avatar', 'beauty', 'beauty.png', 'image/png', 'public', 'public', 3820, '[]', '[]', '[]', '[]', 1, '2024-03-16 02:15:56', '2024-03-16 02:15:56'),
(14, 'App\\Models\\Category', 7, '73be91ae-5b8f-44b1-9a3c-99fd2974ee6e', 'category_image', 'beauty', 'beauty.jpg', 'image/jpeg', 'public', 'public', 97508, '[]', '[]', '[]', '[]', 2, '2024-03-16 02:15:56', '2024-03-16 02:15:56'),
(15, 'App\\Models\\Category', 8, '2bf22bbb-ecb3-4087-9c97-081f88c780ee', 'category_avatar', 'jewellery', 'jewellery.png', 'image/png', 'public', 'public', 3744, '[]', '[]', '[]', '[]', 1, '2024-03-16 02:16:53', '2024-03-16 02:16:53'),
(16, 'App\\Models\\Category', 8, 'c93e8bfb-46e8-419e-b6a3-3f77a998aefe', 'category_image', 'jewellary1', 'jewellary1.jpg', 'image/jpeg', 'public', 'public', 110101, '[]', '[]', '[]', '[]', 2, '2024-03-16 02:16:53', '2024-03-16 02:16:53'),
(17, 'App\\Models\\Category', 9, 'de8f4f0e-310e-4f7e-b89e-17b72a9d3313', 'category_avatar', 'icons8-guitar-100', 'icons8-guitar-100.png', 'image/png', 'public', 'public', 2070, '[]', '[]', '[]', '[]', 1, '2024-03-16 02:18:03', '2024-03-16 02:18:03'),
(18, 'App\\Models\\Category', 9, 'fe2c3382-dccd-4fb3-a2fb-b1ffc70afe66', 'category_image', 'music', 'music.jpg', 'image/jpeg', 'public', 'public', 22236, '[]', '[]', '[]', '[]', 2, '2024-03-16 02:18:03', '2024-03-16 02:18:03'),
(19, 'App\\Models\\Category', 10, 'e8e6ac2c-7ed4-436d-8240-fb714ef10688', 'category_avatar', 'icons8-pet-100', 'icons8-pet-100.png', 'image/png', 'public', 'public', 2505, '[]', '[]', '[]', '[]', 1, '2024-03-16 02:19:00', '2024-03-16 02:19:00'),
(20, 'App\\Models\\Category', 10, 'f449a961-b111-4ed1-bdb4-ceeedaf66759', 'category_image', 'pet', 'pet.jpg', 'image/jpeg', 'public', 'public', 33334, '[]', '[]', '[]', '[]', 2, '2024-03-16 02:19:00', '2024-03-16 02:19:00'),
(21, 'App\\Models\\Category', 11, '20058028-aea9-4a0e-b356-c2ef108b5a1a', 'category_avatar', 'footwear', 'footwear.png', 'image/png', 'public', 'public', 3708, '[]', '[]', '[]', '[]', 1, '2024-03-16 02:19:36', '2024-03-16 02:19:36'),
(22, 'App\\Models\\Category', 11, 'bd6a5672-39c5-4ef0-8d08-f0586889a697', 'category_image', 'footwear', 'footwear.jpeg', 'image/jpeg', 'public', 'public', 5098, '[]', '[]', '[]', '[]', 2, '2024-03-16 02:19:36', '2024-03-16 02:19:36'),
(88, 'App\\Models\\Category', 12, 'ce2c7ccc-c49d-4e74-8476-772852d7c680', 'category_avatar', 'home_&_furniture', 'home_&_furniture.png', 'image/png', 'public', 'public', 3377, '[]', '[]', '[]', '[]', 1, '2024-03-23 04:57:20', '2024-03-23 04:57:20'),
(89, 'App\\Models\\Category', 12, 'ebe97cfb-efae-4ef9-a7a4-edb2d11d0264', 'category_image', 'decor', 'decor.jpg', 'image/jpeg', 'public', 'public', 200450, '[]', '[]', '[]', '[]', 2, '2024-03-23 04:57:20', '2024-03-23 04:57:20'),
(90, 'App\\Models\\Category', 5, 'fafe1008-684f-4b52-b52c-a1be01a95bd3', 'category_image', 'mobile', 'mobile.jpeg', 'image/jpeg', 'public', 'public', 6954, '[]', '[]', '[]', '[]', 2, '2024-03-23 04:59:32', '2024-03-23 04:59:32'),
(93, 'App\\Models\\Category', 13, '5dc82b66-02ed-4179-9b4a-9d2e2a9bbcb8', 'category_avatar', 'decor2', 'decor2.jpg', 'image/jpeg', 'public', 'public', 93395, '[]', '[]', '[]', '[]', 1, '2024-03-28 03:44:08', '2024-03-28 03:44:08'),
(94, 'App\\Models\\Category', 13, '991e4446-2ae8-4dcb-8247-e05a9b2f6745', 'category_image', 'decor2', 'decor2.jpg', 'image/jpeg', 'public', 'public', 93395, '[]', '[]', '[]', '[]', 2, '2024-03-28 03:44:08', '2024-03-28 03:44:08'),
(101, 'App\\Models\\Product', 15, '5b79d65a-3f8a-4faa-a011-da83547eb5ef', 'default', '2_1', '2_1.jpg', 'image/jpeg', 'public', 'public', 39441, '[]', '[]', '[]', '[]', 1, '2024-04-01 01:00:49', '2024-04-01 01:00:49'),
(102, 'App\\Models\\Product', 15, '870f2635-1aa7-4776-a7ae-0d7f8aeb63c7', 'default', '2_2', '2_2.jpg', 'image/jpeg', 'public', 'public', 100893, '[]', '[]', '[]', '[]', 2, '2024-04-01 01:00:49', '2024-04-01 01:00:49'),
(103, 'App\\Models\\Product', 15, 'ef0593ad-c1fd-4a35-a17f-85cf7c9bbd08', 'default', '2_3', '2_3.jpg', 'image/jpeg', 'public', 'public', 98510, '[]', '[]', '[]', '[]', 3, '2024-04-01 01:00:49', '2024-04-01 01:00:49'),
(104, 'App\\Models\\Product', 15, 'a1bc3591-e9d5-4422-bc0f-9eb9a8957539', 'default', '2_4', '2_4.jpg', 'image/jpeg', 'public', 'public', 108699, '[]', '[]', '[]', '[]', 4, '2024-04-01 01:00:49', '2024-04-01 01:00:49'),
(105, 'App\\Models\\Product', 15, '0a95e133-12c2-414a-a12e-b9aae8755ce3', 'default', '2_5', '2_5.jpg', 'image/jpeg', 'public', 'public', 101920, '[]', '[]', '[]', '[]', 5, '2024-04-01 01:00:49', '2024-04-01 01:00:49'),
(106, 'App\\Models\\Product', 16, '02f1aeaa-d47c-4af4-8ae8-902d01f92fc7', 'default', '4_1', '4_1.jpg', 'image/jpeg', 'public', 'public', 33174, '[]', '[]', '[]', '[]', 1, '2024-04-01 13:14:33', '2024-04-01 13:14:33'),
(107, 'App\\Models\\Product', 16, '259de13d-2688-4752-8b9d-5d5bb2e69e89', 'default', '4_2', '4_2.jpg', 'image/jpeg', 'public', 'public', 45690, '[]', '[]', '[]', '[]', 2, '2024-04-01 13:14:34', '2024-04-01 13:14:34'),
(108, 'App\\Models\\Product', 16, '1e4031fe-c7c0-44e2-9dc2-a52cbc4ab812', 'default', '4_3', '4_3.jpg', 'image/jpeg', 'public', 'public', 34947, '[]', '[]', '[]', '[]', 3, '2024-04-01 13:14:34', '2024-04-01 13:14:34'),
(109, 'App\\Models\\Product', 16, '4b8e4aee-1473-4061-bf17-3d58d0b84d47', 'default', '4_4', '4_4.jpg', 'image/jpeg', 'public', 'public', 25099, '[]', '[]', '[]', '[]', 4, '2024-04-01 13:14:34', '2024-04-01 13:14:34'),
(110, 'App\\Models\\Product', 16, '7fb8cccf-8749-4c6d-8b4c-b106f915857f', 'default', '4_5', '4_5.jpg', 'image/jpeg', 'public', 'public', 33209, '[]', '[]', '[]', '[]', 5, '2024-04-01 13:14:34', '2024-04-01 13:14:34'),
(111, 'App\\Models\\Product', 17, 'bf8da225-4b01-4e31-be42-2313541ccb62', 'default', '5_1', '5_1.jpg', 'image/jpeg', 'public', 'public', 34114, '[]', '[]', '[]', '[]', 1, '2024-04-01 13:25:16', '2024-04-01 13:25:16'),
(112, 'App\\Models\\Product', 17, 'b525e675-8728-45a3-a51b-7d2a56fb10ae', 'default', '5_2', '5_2.jpg', 'image/jpeg', 'public', 'public', 25015, '[]', '[]', '[]', '[]', 2, '2024-04-01 13:25:16', '2024-04-01 13:25:16'),
(113, 'App\\Models\\Product', 17, '2fe1f8af-5bb4-48c2-95c0-8762951b5e8d', 'default', '5_3', '5_3.jpg', 'image/jpeg', 'public', 'public', 35706, '[]', '[]', '[]', '[]', 3, '2024-04-01 13:25:16', '2024-04-01 13:25:16'),
(114, 'App\\Models\\Product', 17, 'e6304d12-b7da-4f1c-9617-42fb8f72582d', 'default', '5_4', '5_4.jpg', 'image/jpeg', 'public', 'public', 34105, '[]', '[]', '[]', '[]', 4, '2024-04-01 13:25:16', '2024-04-01 13:25:16'),
(115, 'App\\Models\\Product', 17, '92cef382-7d98-4e1d-811e-37ea74c6bb61', 'default', '5_5', '5_5.jpg', 'image/jpeg', 'public', 'public', 40657, '[]', '[]', '[]', '[]', 5, '2024-04-01 13:25:16', '2024-04-01 13:25:16'),
(116, 'App\\Models\\Product', 18, '001ea043-8a25-4681-aaab-f8380f8e222f', 'default', '61kIVnGChCL._SX679_', '61kIVnGChCL._SX679_.jpg', 'image/jpeg', 'public', 'public', 49221, '[]', '[]', '[]', '[]', 1, '2024-04-01 13:38:59', '2024-04-01 13:38:59'),
(117, 'App\\Models\\Product', 18, '39be682f-4b30-4471-b2a2-37dfde8d80bc', 'default', '71d1yiTIKBL._SY741_', '71d1yiTIKBL._SY741_.jpg', 'image/jpeg', 'public', 'public', 62705, '[]', '[]', '[]', '[]', 2, '2024-04-01 13:38:59', '2024-04-01 13:38:59'),
(118, 'App\\Models\\Product', 18, '3c3c521e-97a2-415c-9e78-475d9ea64867', 'default', '71ivxRUq8FL._SY741_', '71ivxRUq8FL._SY741_.jpg', 'image/jpeg', 'public', 'public', 62026, '[]', '[]', '[]', '[]', 3, '2024-04-01 13:38:59', '2024-04-01 13:38:59'),
(119, 'App\\Models\\Product', 18, 'b97ca9a1-810a-4ee1-ba52-4fa6dd358c2e', 'default', '71p7v7pDrML._SY741_', '71p7v7pDrML._SY741_.jpg', 'image/jpeg', 'public', 'public', 66678, '[]', '[]', '[]', '[]', 4, '2024-04-01 13:38:59', '2024-04-01 13:38:59'),
(120, 'App\\Models\\Product', 18, 'ee949ff3-4115-41f9-a78f-5f7be8aecc09', 'default', '71wbIDd4QeL._SY741_', '71wbIDd4QeL._SY741_.jpg', 'image/jpeg', 'public', 'public', 69460, '[]', '[]', '[]', '[]', 5, '2024-04-01 13:38:59', '2024-04-01 13:38:59'),
(121, 'App\\Models\\Product', 18, '60c62427-0a78-43ea-8853-247c8aa2eb39', 'default', '717NrCOoNCL._SY741_', '717NrCOoNCL._SY741_.jpg', 'image/jpeg', 'public', 'public', 61431, '[]', '[]', '[]', '[]', 6, '2024-04-01 13:38:59', '2024-04-01 13:38:59'),
(127, 'App\\Models\\Product', 20, '3b6c927e-856f-4048-bfb5-2b16d9423bdd', 'default', '61H29r55dVL._SY741_', '61H29r55dVL._SY741_.jpg', 'image/jpeg', 'public', 'public', 33709, '[]', '[]', '[]', '[]', 1, '2024-04-01 23:49:30', '2024-04-01 23:49:30'),
(128, 'App\\Models\\Product', 20, '5d39fc0d-d577-460a-bcc2-485ef3af61fb', 'default', '61jUSNlQfPL._SY741_', '61jUSNlQfPL._SY741_.jpg', 'image/jpeg', 'public', 'public', 36895, '[]', '[]', '[]', '[]', 2, '2024-04-01 23:49:30', '2024-04-01 23:49:30'),
(129, 'App\\Models\\Product', 20, '1c549073-7816-4d8f-a37f-e8b76f7ea10a', 'default', '61KjBVs1DOL._SY741_', '61KjBVs1DOL._SY741_.jpg', 'image/jpeg', 'public', 'public', 44505, '[]', '[]', '[]', '[]', 3, '2024-04-01 23:49:30', '2024-04-01 23:49:30'),
(130, 'App\\Models\\Product', 20, 'ccaa9de8-ee13-477e-9d08-e7636aa5e989', 'default', '61U9QF9skxL._SY741_', '61U9QF9skxL._SY741_.jpg', 'image/jpeg', 'public', 'public', 45965, '[]', '[]', '[]', '[]', 4, '2024-04-01 23:49:30', '2024-04-01 23:49:30'),
(131, 'App\\Models\\Product', 20, '26a2addb-7fb3-4ba0-ba60-66c623781361', 'default', '61uxj5VXeQL._SY741_', '61uxj5VXeQL._SY741_.jpg', 'image/jpeg', 'public', 'public', 35505, '[]', '[]', '[]', '[]', 5, '2024-04-01 23:49:30', '2024-04-01 23:49:30'),
(132, 'App\\Models\\Product', 20, '963ed84a-c594-46b0-ba13-0313fb5d1cbb', 'default', '712sOLpAdSL._SY741_', '712sOLpAdSL._SY741_.jpg', 'image/jpeg', 'public', 'public', 57147, '[]', '[]', '[]', '[]', 6, '2024-04-01 23:49:30', '2024-04-01 23:49:30'),
(133, 'App\\Models\\Product', 21, '21c5556a-e44d-40bd-85a0-12c8bbe0b870', 'default', '3_1', '3_1.jpg', 'image/jpeg', 'public', 'public', 53752, '[]', '[]', '[]', '[]', 1, '2024-04-03 01:36:42', '2024-04-03 01:36:42'),
(134, 'App\\Models\\Product', 21, 'e7d2df1b-c938-4573-96d0-4ff143fa0ee1', 'default', '3_2', '3_2.jpg', 'image/jpeg', 'public', 'public', 90164, '[]', '[]', '[]', '[]', 2, '2024-04-03 01:36:42', '2024-04-03 01:36:42'),
(135, 'App\\Models\\Product', 21, '14d726c6-eee3-4a31-bfac-03f9e953f1a3', 'default', '3_3', '3_3.jpg', 'image/jpeg', 'public', 'public', 107574, '[]', '[]', '[]', '[]', 3, '2024-04-03 01:36:42', '2024-04-03 01:36:42'),
(136, 'App\\Models\\Product', 21, 'f08c17ff-266a-420d-aa98-775a7989d8ff', 'default', '3_4', '3_4.jpg', 'image/jpeg', 'public', 'public', 105552, '[]', '[]', '[]', '[]', 4, '2024-04-03 01:36:42', '2024-04-03 01:36:42'),
(137, 'App\\Models\\Product', 21, 'b15dc9e8-f149-4ed2-9d03-f0e67f69c299', 'default', '3_5', '3_5.jpg', 'image/jpeg', 'public', 'public', 65429, '[]', '[]', '[]', '[]', 5, '2024-04-03 01:36:42', '2024-04-03 01:36:42'),
(144, 'App\\Models\\Slider', 4, '969ea953-e9f6-468e-becd-1127fac3590d', 'default', 'slider5', 'slider5.jpg', 'image/jpeg', 'public', 'public', 38614, '[]', '[]', '[]', '[]', 1, '2024-04-04 00:31:58', '2024-04-04 00:31:58'),
(145, 'App\\Models\\Slider', 3, '63b2d87b-27b9-469d-8c89-2ebb82b56469', 'default', 'slider3', 'slider3.jpg', 'image/jpeg', 'public', 'public', 30965, '[]', '[]', '[]', '[]', 1, '2024-04-05 17:02:16', '2024-04-05 17:02:16'),
(146, 'App\\Models\\Product', 22, '5dbd0b5a-9e97-4da8-b109-10925783404d', 'default', '1_1', '1_1.jpg', 'image/jpeg', 'public', 'public', 52479, '[]', '[]', '[]', '[]', 1, '2024-04-10 03:44:19', '2024-04-10 03:44:19'),
(147, 'App\\Models\\Product', 22, '9dc42b07-2de1-4df6-b1a8-36c487151a16', 'default', '1_2', '1_2.jpg', 'image/jpeg', 'public', 'public', 92203, '[]', '[]', '[]', '[]', 2, '2024-04-10 03:44:20', '2024-04-10 03:44:20'),
(148, 'App\\Models\\Product', 22, 'fc2028ca-a1bd-4f3c-ac58-8c7ab8a5bede', 'default', '1_3', '1_3.jpg', 'image/jpeg', 'public', 'public', 92043, '[]', '[]', '[]', '[]', 3, '2024-04-10 03:44:20', '2024-04-10 03:44:20'),
(149, 'App\\Models\\Product', 22, '5b6cd3a6-c5e7-477c-92d5-4c972dfc2b79', 'default', '1_4', '1_4.jpg', 'image/jpeg', 'public', 'public', 110253, '[]', '[]', '[]', '[]', 4, '2024-04-10 03:44:20', '2024-04-10 03:44:20'),
(150, 'App\\Models\\Product', 22, '32096987-264d-45b5-886b-9ee57b6f26fe', 'default', '1_5', '1_5.jpg', 'image/jpeg', 'public', 'public', 156289, '[]', '[]', '[]', '[]', 5, '2024-04-10 03:44:20', '2024-04-10 03:44:20'),
(151, 'App\\Models\\Product', 23, '4af41562-7130-4ab5-a3e2-73482e004b8b', 'default', 'l1', 'l1.jpeg', 'image/jpeg', 'public', 'public', 10042, '[]', '[]', '[]', '[]', 1, '2024-04-10 04:04:01', '2024-04-10 04:04:01'),
(152, 'App\\Models\\Product', 23, '28cb104b-22c8-46cd-9093-63c6e8fe6559', 'default', 'l2', 'l2.jpeg', 'image/jpeg', 'public', 'public', 4404, '[]', '[]', '[]', '[]', 2, '2024-04-10 04:04:01', '2024-04-10 04:04:01'),
(153, 'App\\Models\\Product', 23, 'fa04365f-ed9d-48e8-ad06-c27261467a85', 'default', 'l3', 'l3.jpeg', 'image/jpeg', 'public', 'public', 3561, '[]', '[]', '[]', '[]', 3, '2024-04-10 04:04:01', '2024-04-10 04:04:01'),
(166, 'App\\Models\\Setting', 1, '920378a0-2fff-4dfc-850c-45e1b132832b', 'big_screen', 'logo-dark', 'logo-dark.png', 'image/png', 'public', 'public', 74684, '[]', '[]', '[]', '[]', 3, '2024-04-12 05:00:11', '2024-04-12 05:00:11'),
(168, 'App\\Models\\Setting', 1, 'f01dd7b4-907f-4418-8f0a-e88da1c50eea', 'small_screen', 'logo-light', 'logo-light.png', 'image/png', 'public', 'public', 53432, '[]', '[]', '[]', '[]', 4, '2024-04-12 05:00:31', '2024-04-12 05:00:31'),
(208, 'App\\Models\\User', 6, 'a866f7b3-5ae0-47e1-bdf7-933706489106', 'default', 'god', 'god.png', 'image/png', 'public', 'public', 3559, '[]', '[]', '[]', '[]', 1, '2024-04-26 09:01:17', '2024-04-26 09:01:17'),
(214, 'App\\Models\\Product', 19, 'b9245043-96f0-4b88-9540-bbf62cdc66d9', 'default', '71bdsO5rW9L._SY741_', '71bdsO5rW9L._SY741_.jpg', 'image/jpeg', 'public', 'public', 61542, '[]', '[]', '[]', '[]', 1, '2024-04-26 18:08:05', '2024-04-26 18:08:05'),
(215, 'App\\Models\\Product', 19, '5ca386ff-3623-4385-a59a-aa46fd52fa12', 'default', '71eDopgquKL._SY741_', '71eDopgquKL._SY741_.jpg', 'image/jpeg', 'public', 'public', 58832, '[]', '[]', '[]', '[]', 2, '2024-04-26 18:08:05', '2024-04-26 18:08:05'),
(216, 'App\\Models\\Product', 19, '8dcd05b4-a650-4dae-b7c6-7a71250ee720', 'default', '71mxRQFMFDL._SY741_', '71mxRQFMFDL._SY741_.jpg', 'image/jpeg', 'public', 'public', 58963, '[]', '[]', '[]', '[]', 3, '2024-04-26 18:08:05', '2024-04-26 18:08:05'),
(217, 'App\\Models\\Product', 19, '09a5bfcb-6fda-40ac-af8f-4e3bfe90ba6a', 'default', '71SB4Ua0bCL._SY741_ (1)', '71SB4Ua0bCL._SY741_-(1).jpg', 'image/jpeg', 'public', 'public', 63353, '[]', '[]', '[]', '[]', 4, '2024-04-26 18:08:05', '2024-04-26 18:08:05'),
(218, 'App\\Models\\Product', 19, 'd54dd0ac-9474-46f3-804a-bb6b48971f51', 'default', '715yxEWAk1L._SY741_', '715yxEWAk1L._SY741_.jpg', 'image/jpeg', 'public', 'public', 58271, '[]', '[]', '[]', '[]', 5, '2024-04-26 18:08:05', '2024-04-26 18:08:05'),
(227, 'App\\Models\\User', 1, '5fc17072-cf46-47c6-a78e-907a5ccb2dba', 'default', 'god', 'god.png', 'image/png', 'public', 'public', 3559, '[]', '[]', '[]', '[]', 1, '2024-04-26 18:58:44', '2024-04-26 18:58:44'),
(228, 'App\\Models\\Category', 14, '9a07b301-a79a-4ce9-aeac-6ab13ab782cc', 'category_avatar', 'god', 'god.png', 'image/png', 'public', 'public', 3559, '[]', '[]', '[]', '[]', 1, '2024-04-26 19:09:23', '2024-04-26 19:09:23'),
(229, 'App\\Models\\Category', 14, '5433f429-3dbc-4698-96eb-2d4af9ce4c7d', 'category_image', 'ideal', 'ideal.jpg', 'image/jpeg', 'public', 'public', 73939, '[]', '[]', '[]', '[]', 2, '2024-04-26 19:09:23', '2024-04-26 19:09:23'),
(230, 'App\\Models\\Product', 25, 'aa549942-cfae-451a-9781-c4b1d96ee6bd', 'default', 't4', 't4.jpg', 'image/jpeg', 'public', 'public', 55353, '[]', '[]', '[]', '[]', 1, '2024-04-26 22:39:48', '2024-04-26 22:39:48'),
(231, 'App\\Models\\Product', 26, '943b1441-60ec-4e57-9851-761396bb4788', 'default', 'tt1', 'tt1.jpg', 'image/jpeg', 'public', 'public', 89927, '[]', '[]', '[]', '[]', 1, '2024-04-26 22:42:45', '2024-04-26 22:42:45'),
(232, 'App\\Models\\Product', 26, '6405dd6b-fd64-4780-869b-a25a063793b2', 'default', 'tt2', 'tt2.jpg', 'image/jpeg', 'public', 'public', 24552, '[]', '[]', '[]', '[]', 2, '2024-04-26 22:42:45', '2024-04-26 22:42:45'),
(233, 'App\\Models\\Product', 26, 'f3f99c78-a3ba-4492-a389-9fffcbb8a993', 'default', 'tt3', 'tt3.jpg', 'image/jpeg', 'public', 'public', 37893, '[]', '[]', '[]', '[]', 3, '2024-04-26 22:42:45', '2024-04-26 22:42:45'),
(234, 'App\\Models\\Product', 26, 'a6dcbe8c-397e-44f6-9ef7-5fc0e3f5fad6', 'default', 'tt4', 'tt4.jpg', 'image/jpeg', 'public', 'public', 37860, '[]', '[]', '[]', '[]', 4, '2024-04-26 22:42:45', '2024-04-26 22:42:45'),
(235, 'App\\Models\\Product', 26, '8d32258a-6e5c-41f2-ae03-04bb967a33ff', 'default', 'tt5', 'tt5.jpg', 'image/jpeg', 'public', 'public', 63607, '[]', '[]', '[]', '[]', 5, '2024-04-26 22:42:45', '2024-04-26 22:42:45'),
(236, 'App\\Models\\Product', 27, '3a5fbe0d-2c2e-497b-b6b1-f7ee2c788c64', 'default', 't1', 't1.jpg', 'image/jpeg', 'public', 'public', 62566, '[]', '[]', '[]', '[]', 1, '2024-04-26 23:55:10', '2024-04-26 23:55:10'),
(237, 'App\\Models\\Product', 27, 'f3600e5c-067a-40b6-aeac-b1085a702171', 'default', 't2', 't2.jpg', 'image/jpeg', 'public', 'public', 29463, '[]', '[]', '[]', '[]', 2, '2024-04-26 23:55:10', '2024-04-26 23:55:10'),
(238, 'App\\Models\\Product', 27, 'db48f3e4-e560-4515-9d21-d3b5ded085ee', 'default', 't3', 't3.jpg', 'image/jpeg', 'public', 'public', 82019, '[]', '[]', '[]', '[]', 3, '2024-04-26 23:55:10', '2024-04-26 23:55:10'),
(239, 'App\\Models\\Product', 27, '3024d72e-7113-4b18-b2c5-b0b549c39a25', 'default', 't4', 't4.jpg', 'image/jpeg', 'public', 'public', 55353, '[]', '[]', '[]', '[]', 4, '2024-04-26 23:55:10', '2024-04-26 23:55:10'),
(240, 'App\\Models\\Product', 28, '8d07db38-cea6-4f01-8c96-2f45392fa3e3', 'default', 'i1', 'i1.jpg', 'image/jpeg', 'public', 'public', 13534, '[]', '[]', '[]', '[]', 1, '2024-04-26 23:59:12', '2024-04-26 23:59:12'),
(241, 'App\\Models\\Product', 28, '3c880d18-d1c9-47ee-85a8-71721b4be291', 'default', 'i2', 'i2.jpg', 'image/jpeg', 'public', 'public', 59990, '[]', '[]', '[]', '[]', 2, '2024-04-26 23:59:12', '2024-04-26 23:59:12'),
(242, 'App\\Models\\Product', 28, '7c728e22-3522-42ce-a02c-c5d0dabac780', 'default', 'i3', 'i3.jpg', 'image/jpeg', 'public', 'public', 96376, '[]', '[]', '[]', '[]', 3, '2024-04-26 23:59:12', '2024-04-26 23:59:12'),
(243, 'App\\Models\\Product', 28, '61a72b97-e125-4eec-9c52-b801b2b1ff16', 'default', 'i4', 'i4.jpg', 'image/jpeg', 'public', 'public', 112459, '[]', '[]', '[]', '[]', 4, '2024-04-26 23:59:12', '2024-04-26 23:59:12'),
(244, 'App\\Models\\Product', 28, 'c9942e8b-5602-4656-9830-ae43df42af54', 'default', 'i5', 'i5.jpg', 'image/jpeg', 'public', 'public', 48044, '[]', '[]', '[]', '[]', 5, '2024-04-26 23:59:12', '2024-04-26 23:59:12'),
(245, 'App\\Models\\Product', 29, '91ae49cb-0cfb-475b-8be2-58d12e280d15', 'default', 'e1', 'e1.jpg', 'image/jpeg', 'public', 'public', 25958, '[]', '[]', '[]', '[]', 1, '2024-04-27 00:33:52', '2024-04-27 00:33:52'),
(246, 'App\\Models\\Product', 29, '81b51bbd-9e0a-4973-888e-3b07e5319bf0', 'default', 'e2', 'e2.jpg', 'image/jpeg', 'public', 'public', 108117, '[]', '[]', '[]', '[]', 2, '2024-04-27 00:33:52', '2024-04-27 00:33:52'),
(247, 'App\\Models\\Product', 29, '28486ece-8e11-4ef7-9b2a-7c72fdd71109', 'default', 'e3', 'e3.jpg', 'image/jpeg', 'public', 'public', 20189, '[]', '[]', '[]', '[]', 3, '2024-04-27 00:33:52', '2024-04-27 00:33:52'),
(248, 'App\\Models\\Product', 29, '7759fd81-4026-4644-b37b-492e6d80d1c3', 'default', 'e4', 'e4.jpg', 'image/jpeg', 'public', 'public', 19587, '[]', '[]', '[]', '[]', 4, '2024-04-27 00:33:52', '2024-04-27 00:33:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_01_05_085838_create_categories_table', 1),
(7, '2024_01_08_045956_create_media_table', 1),
(8, '2024_01_18_183009_create_brands_table', 1),
(9, '2024_02_06_134317_create_products_table', 1),
(10, '2024_02_27_134403_create_colors_table', 1),
(11, '2024_02_29_050952_create_product_colors_table', 1),
(12, '2024_03_04_182545_create_sliders_table', 1),
(13, '2024_03_21_110849_create_sub_categories_table', 2),
(14, '2024_03_26_055230_create_wish_lists_table', 3),
(15, '2024_03_28_062537_create_sizes_table', 4),
(16, '2024_03_28_062740_create_materials_table', 5),
(17, '2024_03_28_063453_create_product_sizes_table', 6),
(18, '2024_03_28_063724_add_details_to_products_table', 7),
(19, '2024_03_28_065135_add_details_to_products_table', 8),
(20, '2024_04_01_064141_add_columns_to_products_sizes_table', 9),
(21, '2024_04_01_065001_add_columns_to_products_sizes_table', 10),
(25, '2024_04_01_084044_create_product_varient_table', 11),
(26, '2024_04_03_050404_create_carts_table', 12),
(27, '2024_04_03_052207_add_details_to_carts__table', 13),
(28, '2024_04_04_195009_create_orders_table', 14),
(29, '2024_04_04_195405_create_order_items_table', 15),
(30, '2024_04_04_205617_add_data_to_order_items_table', 16),
(32, '2024_04_12_064250_create_settings_table', 17),
(33, '2024_04_19_094049_add_details_to_order_items_table', 18),
(34, '2024_04_20_075915_add_details_to_order_items_table', 19),
(35, '2024_04_21_100351_add_details_to_order_items_table', 20),
(36, '2024_04_25_040448_create_user_details_table', 21);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `tracking_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `tracking_no`, `fullname`, `email`, `phone`, `pincode`, `address`, `payment_mode`, `payment_id`, `created_at`, `updated_at`) VALUES
(34, 6, 'yourShopGL7KspLtI3', 'Nensi D', 'devaninensi138@gmail.com', '1234567890', '123456', 'Demo addrss', 'COD', NULL, '2024-04-04 22:59:49', '2024-04-04 22:59:49'),
(35, 6, 'yourShopY4tZMU5ThQ', 'Nensi D', 'devaninensi138@gmail.com', '1234567890', '123456', 'Demo addrss', 'paypal', NULL, '2024-04-04 22:59:49', '2024-04-04 22:59:49'),
(36, 6, 'yourShophUT3C14wnb', 'Nensi D', 'devaninensi138@gmail.com', '1234567890', '123456', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aut sunt fugiat explicabo esse aliquid quam dolores neque molestias velit minima exercitationem, suscipit tenetur eaque dolorem quaerat asperiores, fuga cum eveniet.', 'COD', NULL, '2024-04-05 02:12:46', '2024-04-17 03:38:32'),
(37, 6, 'yourShopZ0JY6EEzQU', 'Nensi D', 'devaninensi138@gmail.com', '1234567890', '123456', 'ndkdhi', 'paypal', NULL, '2024-04-05 02:12:46', '2024-04-05 02:12:46'),
(38, 6, 'yourShopzHIPd31O5R', 'Nensi D', 'devaninensi138@gmail.com', '1234567890', '123456', 'demo addrewss', 'COD', NULL, '2024-04-18 07:05:00', '2024-04-18 07:05:00'),
(39, 6, 'yourShoplOI1mePz8C', 'Nensi D', 'devaninensi138@gmail.com', '1234567890', '123456', 'demo addrewss', 'COD', NULL, '2024-04-18 07:05:00', '2024-04-18 07:05:00'),
(40, 6, 'yourShop9pK2SVSBOP', 'Nensi D', 'devaninensi138@gmail.com', '1234567890', '123456', 'dfghjkjhgf', 'COD', NULL, '2024-04-18 07:08:21', '2024-04-18 07:08:21'),
(41, 6, 'yourShop5MLl7xe7Ed', 'Nensi D', 'devaninensi138@gmail.com', '1234567890', '123456', 'dfghjkjhgf', 'COD', NULL, '2024-04-18 07:08:21', '2024-04-18 07:08:21'),
(42, 6, 'yourShopj6j9JW60vu', 'Nensi D', 'devaninensi138@gmail.com', '1234567890', '123456', 'fghjkljh', 'COD', NULL, '2024-04-18 07:08:54', '2024-04-18 07:08:54'),
(43, 6, 'yourShop1qJFxshaPN', 'Nensi D', 'devaninensi138@gmail.com', '1234567890', '123456', 'fghjkljh', 'COD', NULL, '2024-04-18 07:08:54', '2024-04-18 07:08:54'),
(44, 6, 'yourShop6zYNCEkKGS', 'Nensi D', 'devaninensi138@gmail.com', '1234567890', '123456', 'rtykl', 'COD', NULL, '2024-04-18 07:09:38', '2024-04-18 07:09:38'),
(45, 6, 'yourShopOM9Fs8ozsT', 'Nensi D', 'devaninensi138@gmail.com', '1234567890', '123456', 'rtykl', 'COD', NULL, '2024-04-18 07:09:38', '2024-04-18 07:09:38'),
(46, 6, 'yourShopSMjB76ORQC', 'Nensi D', 'devaninensi138@gmail.com', '1234567890', '123456', 'erthjkkjghj', 'COD', NULL, '2024-04-18 07:09:55', '2024-04-18 07:09:55'),
(47, 6, 'yourShop1KQNvrlfX2', 'Nensi D', 'devaninensi138@gmail.com', '1234567890', '123456', 'erthjkkjghj', 'COD', NULL, '2024-04-18 07:09:55', '2024-04-18 07:09:55'),
(48, 6, 'yourShopTZ0E7m0vgD', 'Nensi D', 'devaninensi138@gmail.com', '1234567890', '123456', 'erthjkkjghj', 'COD', NULL, '2024-04-18 07:09:56', '2024-04-18 07:09:56'),
(49, 6, 'yourShopV0uVbZgHmp', 'Nensi D', 'devaninensi138@gmail.com', '1234567890', '123456', 'erthjkkjghj', 'COD', NULL, '2024-04-18 07:09:56', '2024-04-18 07:09:56'),
(50, 6, 'yourShopun3W3emTfp', 'Nensi D', 'devaninensi138@gmail.com', '1234567890', '123456', 'Demo address', 'COD', NULL, '2024-04-19 04:25:25', '2024-04-19 04:25:25'),
(51, 6, 'yourShopdRC1SIjy2K', 'Nensi D', 'devaninensi138@gmail.com', '1234567890', '123456', 'Demo address', 'COD', NULL, '2024-04-19 04:25:25', '2024-04-19 04:25:25'),
(52, 1, 'yourShop1cMJ8NNAF3', 'Admin', 'admin@gmail.com', '1234567890', '123456', 'admiin addredd', 'COD', NULL, '2024-04-19 04:30:35', '2024-04-19 04:30:35'),
(53, 1, 'yourShop29Qg8Va84r', 'Admin', 'admin@gmail.com', '1234567890', '123456', 'admiin addredd', 'COD', NULL, '2024-04-19 04:30:35', '2024-04-19 04:30:35'),
(54, 1, 'yourShopcSUtIYvMCE', 'Admin', 'admin@gmail.com', '1234567890', '123456', 'Admin address 2', 'COD', NULL, '2024-04-19 04:36:50', '2024-04-19 04:36:50'),
(55, 6, 'yourShopphquMrU6jW', 'Nensi D', 'devaninensi138@gmail.com', '1234567890', '123456', 'sdeml', 'Online', NULL, '2024-04-24 00:35:16', '2024-04-24 00:35:16'),
(56, 6, 'yourShopzqUlRYI4Og', 'Nensi D', 'devaninensi138@gmail.com', '1234567890', '123456', 'deno', 'Online', NULL, '2024-04-24 01:39:08', '2024-04-24 01:39:08'),
(57, 6, 'yourShopYfnBuNTplR', 'Nensi D', 'devaninensi138@gmail.com', '1234567890', '123456', 'fghjkl;', 'Online', NULL, '2024-04-24 01:39:34', '2024-04-24 01:39:34'),
(58, 6, 'yourShop1M3eLQwUsc', 'Nensi D', 'devaninensi138@gmail.com', '1234567890', '123456', 'demo', 'Online', NULL, '2024-04-24 01:40:11', '2024-04-24 01:40:11'),
(59, 6, 'yourShopHryQLhOQ4r', 'Nensi D', 'devaninensi138@gmail.com', '1234567890', '123456', 'demo', 'Online', NULL, '2024-04-24 01:45:49', '2024-04-24 01:45:49'),
(60, 6, 'yourShopgvg34Z8vfX', 'Nensi D', 'devaninensi138@gmail.com', '1234567890', '123456', 'demo', 'Online', NULL, '2024-04-24 01:52:36', '2024-04-24 01:52:36'),
(61, 6, 'yourShopIOE5MTe2At', 'Nensi D', 'devaninensi138@gmail.com', '1234567890', '123456', 'Demo address new', 'Online', NULL, '2024-04-24 01:54:49', '2024-04-24 01:54:49'),
(62, 6, 'yourShopKOR3azS2PV', 'Nensi D', 'devaninensi138@gmail.com', '1234567890', '123456', 'demo address here...', 'Online', NULL, '2024-04-24 03:02:43', '2024-04-24 03:02:43'),
(63, 6, 'yourShopasvKmX5fxD', 'Nensi D', 'devaninensi138@gmail.com', '1234567890', '234568', 'dmldmls', 'Online', NULL, '2024-04-24 03:04:54', '2024-04-24 03:04:54'),
(64, 6, 'yourShopOkZpJ3mv8t', 'Nensi Devani', 'devaninensi138@gmail.com', '1234567890', '123456', 'demo adres', 'COD', NULL, '2024-04-26 13:17:59', '2024-04-26 13:17:59'),
(65, 6, 'yourShopqveAli11jl', 'Nensi Devani', 'devaninensi138@gmail.com', '1234567890', '123456', 'demo addrss', 'COD', NULL, '2024-04-26 13:19:41', '2024-04-26 13:19:41'),
(66, 6, 'yourShopjeUVSDoVX0', 'Nensi Devani', 'devaninensi138@gmail.com', '1111111111', '111111', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit corporis maxime laborum voluptate nobis qui voluptates repudiandae eum quasi quo, dicta delectus ipsam labore debitis veritatis? Alias cum vitae officia?', 'COD', NULL, '2024-04-26 15:33:49', '2024-04-26 15:33:49'),
(67, 6, 'yourShopEidTFFaKFa', 'Nensi Devani', 'devaninensi138@gmail.com', '1111111111', '111111', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit corporis maxime laborum voluptate nobis qui voluptates repudiandae eum quasi quo, dicta delectus ipsam labore debitis veritatis? Alias cum vitae officia?', 'COD', NULL, '2024-04-26 15:34:33', '2024-04-26 15:34:33'),
(68, 6, 'yourShopjHzwMER8oF', 'Nensi Devani', 'devaninensi138@gmail.com', '1111111111', '111111', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit corporis maxime laborum voluptate nobis qui voluptates repudiandae eum quasi quo, dicta delectus ipsam labore debitis veritatis? Alias cum vitae officia?', 'COD', NULL, '2024-04-26 15:35:03', '2024-04-26 15:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `size_id` bigint UNSIGNED DEFAULT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'in progress',
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `size_id`, `quantity`, `price`, `order_status`, `reason`, `pickup`, `created_at`, `updated_at`) VALUES
(5, 34, 15, 1, 2, 599, 'delivered', NULL, NULL, '2024-04-04 22:59:49', '2024-04-04 22:59:49'),
(6, 35, 15, 1, 1, 599, 'delivered', NULL, NULL, '2024-04-04 22:59:49', '2024-04-04 22:59:49'),
(7, 36, 16, NULL, 2, 599, 'shipped', NULL, NULL, '2024-04-05 02:12:46', '2024-04-20 00:25:56'),
(8, 36, 15, 1, 1, 599, 'pending', NULL, NULL, '2024-04-05 02:12:46', '2024-04-20 00:25:51'),
(9, 36, 18, 6, 2, 349, 'cancelled', NULL, NULL, '2024-04-05 02:12:46', '2024-04-20 00:26:01'),
(10, 37, 16, NULL, 1, 599, 'in progress', NULL, NULL, '2024-04-05 02:12:46', '2024-04-05 02:12:46'),
(11, 37, 15, 1, 1, 599, 'in progress', NULL, NULL, '2024-04-05 02:12:46', '2024-04-05 02:12:46'),
(12, 37, 18, 1, 1, 349, 'in progress', NULL, NULL, '2024-04-05 02:12:46', '2024-04-05 02:12:46'),
(13, 38, 16, NULL, 2, 599, 'in progress', NULL, NULL, '2024-04-18 07:05:00', '2024-04-18 07:05:00'),
(14, 38, 21, 1, 1, 399, 'in progress', NULL, NULL, '2024-04-18 07:05:00', '2024-04-18 07:05:00'),
(15, 38, 19, 1, 1, 399, 'in progress', NULL, NULL, '2024-04-18 07:05:00', '2024-04-18 07:05:00'),
(16, 38, 15, 1, 1, 599, 'in progress', NULL, NULL, '2024-04-18 07:05:00', '2024-04-18 07:05:00'),
(17, 39, 16, NULL, 2, 599, 'cancelled', 'Changed Mind', NULL, '2024-04-18 07:05:00', '2024-04-20 03:39:55'),
(18, 39, 21, 1, 1, 399, 'shipped', NULL, NULL, '2024-04-18 07:05:00', '2024-04-20 00:25:29'),
(19, 39, 19, 1, 1, 399, 'pending', NULL, NULL, '2024-04-18 07:05:00', '2024-04-20 00:25:34'),
(20, 39, 15, 1, 1, 599, 'pending', NULL, NULL, '2024-04-18 07:05:00', '2024-04-20 00:25:40'),
(21, 40, 18, 1, 1, 349, 'cancelled', 'Changed Mind', NULL, '2024-04-18 07:08:21', '2024-04-20 03:32:21'),
(22, 40, 22, NULL, 1, 799, 'in progress', NULL, NULL, '2024-04-18 07:08:21', '2024-04-20 00:24:35'),
(23, 40, 21, 1, 1, 399, 'pending', NULL, NULL, '2024-04-18 07:08:21', '2024-04-20 00:24:42'),
(24, 40, 16, NULL, 1, 599, 'shipped', NULL, NULL, '2024-04-18 07:08:21', '2024-04-20 00:24:49'),
(25, 41, 18, 1, 1, 349, 'cancelled', NULL, NULL, '2024-04-18 07:08:21', '2024-04-20 00:25:13'),
(26, 41, 22, NULL, 1, 799, 'returned', 'Size or Fit Issue:', NULL, '2024-04-18 07:08:21', '2024-04-20 03:34:31'),
(27, 41, 21, 1, 2, 399, 'delivered', NULL, NULL, '2024-04-18 07:08:21', '2024-04-20 00:25:08'),
(28, 41, 16, NULL, 1, 599, 'delivered', NULL, NULL, '2024-04-18 07:08:21', '2024-04-18 07:08:21'),
(29, 42, 22, NULL, 1, 799, 'returned', 'Product Defect or Damage', NULL, '2024-04-18 07:08:54', '2024-04-20 03:09:02'),
(30, 43, 22, NULL, 1, 799, 'cancelled', NULL, NULL, '2024-04-18 07:08:54', '2024-04-20 03:31:33'),
(31, 44, 19, 1, 1, 399, 'cancelled', 'Found Cheaper Option', NULL, '2024-04-18 07:09:38', '2024-04-20 03:28:58'),
(32, 45, 19, 1, 1, 399, 'in progress', NULL, NULL, '2024-04-18 07:09:38', '2024-04-18 07:09:38'),
(33, 46, 20, 6, 1, 399, 'in progress', NULL, NULL, '2024-04-18 07:09:55', '2024-04-18 07:09:55'),
(34, 47, 20, 6, 1, 399, 'in progress', NULL, NULL, '2024-04-18 07:09:55', '2024-04-18 07:09:55'),
(35, 50, 21, 1, 2, 399, 'returned', 'Wrong Item Received', NULL, '2024-04-19 04:25:25', '2024-04-20 03:40:55'),
(36, 50, 16, NULL, 1, 599, 'returned', 'Product Defect or Damaged', NULL, '2024-04-19 04:25:25', '2024-04-20 03:41:47'),
(37, 51, 21, 1, 2, 399, 'in progress', NULL, NULL, '2024-04-19 04:25:25', '2024-04-19 04:25:25'),
(38, 51, 16, NULL, 1, 599, 'returned', 'Wrong Item Received', NULL, '2024-04-19 04:25:25', '2024-04-20 03:44:46'),
(39, 52, 21, 1, 1, 399, 'shipped', NULL, NULL, '2024-04-19 04:30:35', '2024-04-21 04:44:56'),
(40, 53, 21, 1, 1, 399, 'shipped', NULL, NULL, '2024-04-19 04:30:35', '2024-04-21 04:47:42'),
(41, 54, 17, NULL, 1, 799, 'shipped', NULL, NULL, '2024-04-19 04:36:50', '2024-04-21 04:44:39'),
(42, 55, 18, 6, 1, 449, 'in progress', NULL, NULL, '2024-04-24 00:35:16', '2024-04-24 00:35:16'),
(43, 55, 19, 1, 1, 399, 'in progress', NULL, NULL, '2024-04-24 00:35:16', '2024-04-24 00:35:16'),
(44, 56, 19, 1, 1, 399, 'in progress', NULL, NULL, '2024-04-24 01:39:08', '2024-04-24 01:39:08'),
(45, 56, 20, 6, 1, 399, 'in progress', NULL, NULL, '2024-04-24 01:39:08', '2024-04-24 01:39:08'),
(46, 57, 19, 1, 1, 399, 'delivered', NULL, NULL, '2024-04-24 01:39:34', '2024-04-26 12:29:21'),
(47, 57, 20, 6, 1, 399, 'delivered', NULL, NULL, '2024-04-24 01:39:34', '2024-04-26 12:31:16'),
(48, 58, 19, 1, 1, 399, 'in progress', NULL, NULL, '2024-04-24 01:40:11', '2024-04-24 01:40:11'),
(49, 58, 20, 6, 1, 399, 'in progress', NULL, NULL, '2024-04-24 01:40:11', '2024-04-24 01:40:11'),
(50, 59, 19, 1, 1, 399, 'in progress', NULL, NULL, '2024-04-24 01:45:49', '2024-04-24 01:45:49'),
(51, 59, 20, 6, 1, 399, 'in progress', NULL, NULL, '2024-04-24 01:45:49', '2024-04-24 01:45:49'),
(52, 60, 19, 1, 1, 399, 'in progress', NULL, NULL, '2024-04-24 01:52:36', '2024-04-24 01:52:36'),
(53, 60, 20, 6, 1, 399, 'in progress', NULL, NULL, '2024-04-24 01:52:36', '2024-04-24 01:52:36'),
(54, 61, 19, 1, 1, 399, 'in progress', NULL, NULL, '2024-04-24 01:54:49', '2024-04-24 01:54:49'),
(55, 61, 20, 6, 1, 399, 'in progress', NULL, NULL, '2024-04-24 01:54:49', '2024-04-24 01:54:49'),
(56, 62, 19, 1, 1, 399, 'in progress', NULL, NULL, '2024-04-24 03:02:43', '2024-04-24 03:02:43'),
(57, 62, 20, 6, 1, 399, 'in progress', NULL, NULL, '2024-04-24 03:02:43', '2024-04-24 03:02:43'),
(58, 63, 18, 6, 1, 449, 'shipped', 'Found Cheaper Option', NULL, '2024-04-24 03:04:54', '2024-04-26 11:56:48'),
(59, 63, 19, 1, 2, 399, 'cancelled', 'Changed Mind', NULL, '2024-04-24 03:04:54', '2024-04-26 08:24:52'),
(60, 64, 18, 5, 1, 399, 'in progress', NULL, NULL, '2024-04-26 13:17:59', '2024-04-26 13:17:59'),
(61, 64, 19, 1, 1, 399, 'in progress', NULL, NULL, '2024-04-26 13:17:59', '2024-04-26 13:17:59'),
(62, 65, 21, 1, 1, 399, 'in progress', NULL, NULL, '2024-04-26 13:19:41', '2024-04-26 13:19:41'),
(63, 66, 16, NULL, 1, 749, 'in progress', NULL, NULL, '2024-04-26 15:33:49', '2024-04-26 15:33:49'),
(64, 67, 16, NULL, 1, 749, 'in progress', NULL, NULL, '2024-04-26 15:34:33', '2024-04-26 15:34:33'),
(65, 68, 16, NULL, 1, 749, 'cancelled', 'Wrong Item Received', 1, '2024-04-26 15:35:03', '2024-04-26 18:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `sub_category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_id` bigint UNSIGNED DEFAULT NULL,
  `color_id` bigint UNSIGNED DEFAULT NULL,
  `small_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_price` int NOT NULL DEFAULT '0',
  `selling_price` int NOT NULL DEFAULT '0',
  `quantity` int NOT NULL DEFAULT '0',
  `delivery_charge` int DEFAULT NULL,
  `trending` tinyint NOT NULL DEFAULT '1' COMMENT '1=trending,0=not-trending',
  `featured` tinyint NOT NULL DEFAULT '0' COMMENT '''0=not-featured,1=featured''',
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0=hidden,1=visible',
  `available` tinyint NOT NULL DEFAULT '1' COMMENT '1=available, 0=not-available',
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` mediumtext COLLATE utf8mb4_unicode_ci,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `sub_category_id`, `name`, `slug`, `brand_id`, `material_id`, `color_id`, `small_description`, `description`, `original_price`, `selling_price`, `quantity`, `delivery_charge`, `trending`, `featured`, `status`, `available`, `parent_id`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(15, 1, 4, 'Women\'s Cotton Blend Straight Printed Kurta with Pant & Dupatta', 'womens-cotton-blend-straight-printed-kurta-with-pant-dupatta', '5', NULL, 3, 'Women\'s Cotton Blend Straight Printed Kurta with Pant & Dupatta', 'Kurta Set Fabric: Georgette || Kurta Set Color :- Pista\nStyle: Straight || Length: Calf Length || Sleeves: 3/4 Sleeves || Size Chart- Kurta-S-36 in, M-38 in , L-40 in , XL-42 in , XXL-44 in,Pant :- S-28 in, M-30 in , L-32 in, XL- 34 in , XXL- 36 in,For More Please refer to the size Chart below.\nThis set includes: 1 Kurta and 1 Pant with Dupatta || Work :- Printed || Neck Style:- Round Neck\nColour Declaration : There might be slight variation in the actual color of the product due to different screen resolutions.\nOcassion: Traditional wear, Casual Wear, party wear, evening wear,Please Click On Brand Name \"GoSriKi\" For More Products.', 0, 0, 0, 0, 1, 0, 1, 1, NULL, 'Women\'s Cotton Blend Straight Printed Kurta with Pant & Dupatta', 'Women\'s Cotton Blend Straight Printed Kurta with Pant & Dupatta', 'Women\'s Cotton Blend Straight Printed Kurta with Pant & Dupatta', '2024-04-01 01:00:47', '2024-04-01 01:00:47'),
(16, 1, 1, 'delivaryCharge', 'delivarycharge', '4', NULL, 5, 'delivaryCharge', 'delivaryCharge', 0, 599, 51, 150, 1, 0, 1, 1, NULL, 'delivaryCharge', 'delivaryCharge', 'delivaryCharge', '2024-04-01 13:14:32', '2024-04-01 13:14:32'),
(17, 2, 3, 'Men shirt', 'men-shirt', '1', NULL, 10, 'Men shirt', 'Men shirt', 0, 799, 15, 0, 1, 0, 1, 1, NULL, 'Men shirt', 'Men shirt', 'Men shirt', '2024-04-01 13:25:16', '2024-04-01 13:25:16'),
(18, 1, 4, 'New Women Kurta set with dupatta', 'new-women-kurta-set-with-dupatta', '7', 7, 11, 'New Women Kurta set with dupatta', 'New Women Kurta set with dupatta', 0, 0, 0, 0, 1, 0, 1, 1, NULL, 'New Women Kurta set with dupatta', 'New Women Kurta set with dupatta', 'New Women Kurta set with dupatta', '2024-04-01 13:38:59', '2024-04-01 13:38:59'),
(19, 1, 4, 'Women Kurta set violet', 'women-kurta-set-violet', '5', 7, 12, 'Women Kurta set violet', 'Women Kurta set violet.Women Kurta set violet.Women Kurta set violet.Women Kurta set violet.', 0, 0, 0, NULL, 1, 0, 1, 1, 18, 'Women Kurta set violet', 'Women Kurta set violet', 'Women Kurta set violet', '2024-04-01 23:45:48', '2024-04-26 18:20:23'),
(20, 1, 4, 'Women Kurta set - Green', 'women-kurta-set-green', '7', 7, 9, 'Women Kurta set - Green', 'Women Kurta set - Green. Women Kurta set - Green. Women Kurta set - Green. Women Kurta set - Green.', 0, 0, 0, 0, 1, 0, 1, 1, 18, 'Women Kurta set - Green', 'Women Kurta set - Green', 'Women Kurta set - Green', '2024-04-01 23:49:30', '2024-04-01 23:49:30'),
(21, 1, 4, 'Women kurta set skin', 'women-kurta-set-skin', '4', 6, 5, 'Women kurta set skin', 'Women kurta set skin', 0, 0, 0, 0, 0, 0, 1, 0, NULL, 'Women kurta set skin', 'Women kurta set skin', 'Women kurta set skin', '2024-04-03 01:36:41', '2024-04-26 19:12:18'),
(22, 1, 1, 'Demo1', 'demo1', '4', 1, 3, 'nfdl', 'dnwl', 999, 799, 0, 0, 0, 1, 1, 1, NULL, 'demo1', 'demo1', 'demo1', '2024-04-10 03:44:18', '2024-04-10 03:44:18'),
(23, 4, 12, 'Lenovo laptop', 'lenovo-laptop', '9', NULL, 4, 'Lenovo laptop', 'Lenovo laptop', 50000, 45000, 21, 0, 0, 1, 1, 1, NULL, 'Lenovo laptop', 'Lenovo laptop', 'Lenovo laptop', '2024-04-10 04:04:01', '2024-04-19 00:41:34'),
(27, 12, 17, 'MATTERHORN Engineered Wood Coffee Table', 'matterhorn-engineered-wood-coffee-table', '16', NULL, 4, 'The Madesa Office Desk offers a wide tabletop, a shelf to quickly store book and acessories, as well as three drawers and a large cabinet. Every detail of this furniture is made with practicality, comfort and durability in mind, without missing a beautiful esthetic.\nThe Office Desk is made with Eco-Friendly Engineered Wood and has a paited finish. The back of the desk is NOT painted.\nSize: 136 W x 45 D x 77 H Cm\nAt Madesa, the client\'s satisfaction is our purpose. We are here to support you before and after the purchase. If you come across any problem with our products, please feel free to contact us at anytime on Amazon.\nOur Products are finished in Polyester Paint with 7 Layers to ensure protection.\nDISCLAIMER: This is a DIY (Do It Yourself) product. Easy assemble with provided instructions and hardware', 'The Madesa Office Desk offers a wide tabletop, a shelf to quickly store book and acessories, as well as three drawers and a large cabinet. Every detail of this furniture is made with practicality, comfort and durability in mind, without missing a beautiful esthetic.\nThe Office Desk is made with Eco-Friendly Engineered Wood and has a paited finish. The back of the desk is NOT painted.\nSize: 136 W x 45 D x 77 H Cm\nAt Madesa, the client\'s satisfaction is our purpose. We are here to support you before and after the purchase. If you come across any problem with our products, please feel free to contact us at anytime on Amazon.\nOur Products are finished in Polyester Paint with 7 Layers to ensure protection.\nDISCLAIMER: This is a DIY (Do It Yourself) product. Easy assemble with provided instructions and hardware', 9999, 8999, 51, NULL, 0, 0, 1, 1, NULL, 'MATTERHORN Engineered Wood Coffee Table', 'MATTERHORN Engineered Wood Coffee Table', 'MATTERHORN Engineered Wood Coffee Table', '2024-04-26 23:55:10', '2024-04-26 23:55:10'),
(28, 12, 20, 'KridayKraft Metal Ganesha ji Statue', 'kridaykraft-metal-ganesha-ji-statue', '17', NULL, NULL, 'KridayKraft Metal Ganesha ji Statue,Ganpati Wall Hanging Sculpture Lord Ganesh Idol Lucky Feng Shui Wall Decor Your Home, Office,Religious Gift Article Decorative,Showpiece Figurines...', 'KridayKraft Metal Ganesha ji Statue,Ganpati Wall Hanging Sculpture Lord Ganesh Idol Lucky Feng Shui Wall Decor Your Home, Office,Religious Gift Article Decorative,Showpiece Figurines...', 799, 499, 51, NULL, 1, 0, 1, 1, NULL, 'KridayKraft Metal Ganesha ji Statue', 'KridayKraft Metal Ganesha ji Statue', 'KridayKraft Metal Ganesha ji Statue', '2024-04-26 23:59:12', '2024-04-26 23:59:12'),
(29, 8, 21, 'Estele Gold Plated Lotus Designer Dazzling Pearl Drop Earrings with Pink Enamel', 'estele-gold-plated-lotus-designer-dazzling-pearl-drop-earrings-with-pink-enamel', '18', NULL, NULL, 'Estele Gold Plated Lotus Designer Dazzling Pearl Drop Earrings with Pink Enamel.Estele Gold Plated Lotus Designer Dazzling Pearl Drop Earrings with Pink Enamel.Estele Gold Plated Lotus Designer Dazzling Pearl Drop Earrings with Pink Enamel.Estele Gold Plated Lotus Designer Dazzling Pearl Drop Earrings with Pink Enamel', 'Estele Gold Plated Lotus Designer Dazzling Pearl Drop Earrings with Pink Enamel.Estele Gold Plated Lotus Designer Dazzling Pearl Drop Earrings with Pink Enamel.Estele Gold Plated Lotus Designer Dazzling Pearl Drop Earrings with Pink Enamel.Estele Gold Plated Lotus Designer Dazzling Pearl Drop Earrings with Pink Enamel', 549, 249, 101, NULL, 0, 0, 1, 1, NULL, 'Estele Gold Plated Lotus Designer Dazzling Pearl Drop Earrings with Pink Enamel', 'Estele Gold Plated Lotus Designer Dazzling Pearl Drop Earrings with Pink Enamel', 'Estele Gold Plated Lotus Designer Dazzling Pearl Drop Earrings with Pink Enamel', '2024-04-27 00:33:52', '2024-04-27 00:33:52');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `color_id` bigint UNSIGNED DEFAULT NULL,
  `quantity` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `size_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `original_price` int DEFAULT '0',
  `price` int NOT NULL,
  `delivery_charge` int NOT NULL DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `size_id`, `quantity`, `original_price`, `price`, `delivery_charge`, `status`) VALUES
(1, 15, 1, 0, 699, 599, 0, 1),
(2, 18, 1, 0, 449, 349, 100, 1),
(3, 18, 5, 30, 0, 399, 0, 1),
(4, 18, 6, 21, 0, 449, 0, 1),
(5, 18, 8, 21, 0, 549, 0, 1),
(6, 19, 1, 0, 0, 0, 50, 1),
(7, 19, 5, 51, 0, 349, 0, 1),
(8, 19, 7, 61, 0, 449, 0, 1),
(9, 20, 6, 30, 0, 399, 0, 1),
(10, 20, 8, 40, 0, 449, 0, 1),
(11, 20, 5, 20, 0, 349, 0, 1),
(12, 20, 1, 10, 0, 399, 0, 1),
(13, 21, 1, 50, 0, 399, 0, 1),
(14, 21, 5, 100, 0, 499, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_varients`
--

CREATE TABLE `product_varients` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `color_id` bigint UNSIGNED NOT NULL,
  `size_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `original_price` int NOT NULL DEFAULT '0',
  `selling_price` int NOT NULL DEFAULT '0',
  `delivery_charges` int NOT NULL DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `pincode` bigint DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no1` bigint DEFAULT NULL,
  `phone_no2` bigint DEFAULT NULL,
  `copyright_text` text COLLATE utf8mb4_unicode_ci,
  `facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `description`, `address`, `pincode`, `email`, `phone_no1`, `phone_no2`, `copyright_text`, `facebook_link`, `twitter_link`, `instagram_link`, `youtube_link`) VALUES
(1, 'YourShop', 'Your one-shop destination for a wide range of products.', '#555, Main road, shivaji nagar, Bangalore, India', 123123, 'yourshop@gmail.com', 1234567890, NULL, '2024 - YourShop. All rights reserved.', 'https://facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.youtube.com/');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `sub_category_id` bigint UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '1=visible, 0=hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `category_id`, `sub_category_id`, `size`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'S', 1, '2024-03-28 03:17:25', '2024-03-28 03:17:25'),
(3, 1, 1, 'S', 1, '2024-03-28 23:35:37', '2024-03-28 23:35:37'),
(4, 1, 1, 'M', 1, '2024-03-28 23:35:46', '2024-03-28 23:35:46'),
(5, 1, 4, 'M', 1, '2024-04-01 13:33:05', '2024-04-01 13:33:05'),
(6, 1, 4, 'L', 1, '2024-04-01 13:33:15', '2024-04-01 13:33:19'),
(7, 1, 4, 'XL', 1, '2024-04-01 13:33:29', '2024-04-01 13:33:34'),
(8, 1, 4, 'XXL', 1, '2024-04-01 13:33:47', '2024-04-01 13:33:51'),
(9, 1, 4, 'XXXL', 1, '2024-04-01 13:34:03', '2024-04-01 13:34:11'),
(10, 1, 7, 'S', 1, '2024-04-26 18:50:05', '2024-04-26 18:50:05');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0=hidden,1=visible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Stay Connected with Us.... Checkout latest festival collections', 'Stay connected to get the latest updates....elit. Repudiandae laborum nisi ducimus voluptates ipsam non eligendi vel esse voluptas. Facere eligendi doloribus tempore blanditiis similique iure, maiores minima, quos aspernatur animi aliquid vel! ', 1, '2024-03-16 02:30:43', '2024-04-05 17:11:16'),
(4, 'Sale is live now !!! Shop anything.... only on YourShop', 'Shop anything and get maximum discount on every product !!!.elit. Repudiandae laborum nisi ducimus voluptates ipsam non eligendi vel esse voluptas. Facere eligendi doloribus tempore ', 1, '2024-03-16 02:30:54', '2024-04-05 17:11:46');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'T-shirts', 1, '2024-03-21 12:24:16', '2024-03-21 12:24:16'),
(3, 2, 'Shirts', 1, '2024-03-21 12:29:34', '2024-03-21 12:32:22'),
(4, 1, 'Kurta Sets with Dupatta', 1, '2024-03-22 00:49:36', '2024-03-22 00:49:36'),
(5, 1, 'Kerta Sets without Dupatta', 1, '2024-03-22 00:49:53', '2024-03-22 00:49:53'),
(7, 1, 'Tops', 1, '2024-03-22 00:50:14', '2024-03-22 00:50:14'),
(8, 2, 'Shoes', 1, '2024-03-22 00:50:23', '2024-03-22 00:50:23'),
(9, 2, 'T-shirts', 1, '2024-03-22 00:50:35', '2024-03-22 00:50:35'),
(10, 1, 'Heels', 1, '2024-03-23 03:50:34', '2024-03-23 03:50:34'),
(11, 1, 'Shoes', 1, '2024-03-28 03:39:15', '2024-03-28 03:39:25'),
(12, 4, 'Normal Laptop', 1, '2024-04-10 04:03:10', '2024-04-10 04:03:31'),
(13, 4, 'Gaming Laptop', 1, '2024-04-10 04:03:23', '2024-04-10 04:03:36'),
(14, 1, 'Saree', 1, '2024-04-19 00:50:47', '2024-04-19 00:50:47'),
(17, 12, 'Table', 1, '2024-04-26 23:50:28', '2024-04-26 23:50:28'),
(18, 12, 'Chair', 1, '2024-04-26 23:50:54', '2024-04-26 23:50:54'),
(19, 12, 'Photo frams', 1, '2024-04-26 23:51:14', '2024-04-26 23:51:14'),
(20, 12, 'Show piece', 1, '2024-04-26 23:57:42', '2024-04-26 23:57:42'),
(21, 8, 'Earings', 1, '2024-04-27 00:31:42', '2024-04-27 00:31:42'),
(22, 8, 'Nosepin', 1, '2024-04-27 00:32:05', '2024-04-27 00:32:05'),
(23, 8, 'Chain', 1, '2024-04-27 00:32:17', '2024-04-27 00:32:17'),
(24, 8, 'Neckless', 1, '2024-04-27 00:32:28', '2024-04-27 00:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_as` tinyint NOT NULL DEFAULT '0' COMMENT '0=user,1=admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role_as`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$e1PtU4MBne0qXua6J296GeRq7I8Z4egdaTnOKnMoECj5NezBd/0nq', 'c1n07wXP9cCJILnJV7UmZNgahAs0Urr3WiRrDnW29CroBTppBhnznGD5PcYu', 1, '2024-03-16 02:09:41', '2024-04-26 18:58:20'),
(2, 'User', 'user@gmail.com', NULL, '$2y$12$UYAVBRy4srFzOOLvhNrbmuwWCreFGgf27Hasgau0hPkwWl8/aJWh2', NULL, 0, '2024-03-26 00:43:34', '2024-03-26 00:43:34'),
(3, 'User 2', 'user2@gmail.com', NULL, '$2y$12$xly1cfDc0fv8K4WH8KjU3umO1LhZhQj4.8nH9l0xJzLA0JwyUt.96', NULL, 0, '2024-03-26 04:54:49', '2024-03-26 04:54:49'),
(4, 'Nensi', 'ndevani894@rku.ac.in', NULL, '$2y$12$VXjQyDN9eThed47ob5Qr1.pCmcdWbxXKAxj8Trq7pUpZLK8x.1QT.', 'KX4AQI5obSAemIFhrRGT6wF90uwHHAZl2h2t1T4XR2Ul5rnYRXvLlHzSX4DA', 0, '2024-04-04 02:53:02', '2024-04-04 12:48:48'),
(6, 'Nensi Devani', 'devaninensi138@gmail.com', NULL, '$2y$12$0Kn5aEPAbwT5n6wJrzoS8eRX/gsi.TFOnPVMs.3DG1JBtATT2l166', NULL, 0, '2024-04-04 22:13:43', '2024-04-25 01:48:23'),
(11, 'Admin second', 'admin2@gmail.com', NULL, '$2y$12$/ISYr6jWoCtBbXtpjr9id.K59RbzDr5gOKY9DpYzrY750l3RbyVlO', NULL, 1, '2024-04-21 04:29:41', '2024-04-25 00:54:13'),
(12, 'Demo', 'demo@gmail.com', NULL, '$2y$12$M12J6pIJ.n7o48T/exKYAON/YxqjN/6Kq9DZsYSLHYN2dclWoHR06', NULL, 0, '2024-04-25 01:03:59', '2024-04-25 01:03:59'),
(13, 'd', 'd@gmail.com', NULL, '$2y$12$fpxj/K2xk48bFX1wmWvLfuwC.mSlEz/Fse/RLxvTb86CrQnGv5tr.', NULL, 0, '2024-04-25 01:05:57', '2024-04-25 01:05:57'),
(14, 'N', 'n@gmail.com', NULL, '$2y$12$K2pWMJ3AVF/fAKJbBiuGvu8TzauaQisB9b09Yu8aZGxWWwY1wS6sa', NULL, 0, '2024-04-25 01:08:14', '2024-04-25 01:08:14'),
(15, 'Demo', 'demo2@gmail.com', NULL, '$2y$12$fNl5FA8oRr0SkjrmF1GjtuAWu5HZq6Dfon1x1.diOS9y777chiq/u', NULL, 0, '2024-04-26 18:50:53', '2024-04-26 18:52:01');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `phone_no`, `pin_code`, `address`) VALUES
(1, 6, '1111111111', '111111', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit corporis maxime laborum voluptate nobis qui voluptates repudiandae eum quasi quo, dicta delectus ipsam labore debitis veritatis? Alias cum vitae officia?'),
(5, 2, '1234567890', '123456', 'User Address'),
(6, 11, '1234554321', '111133', 'Admin 2\'s Address.'),
(7, 14, '1234432167', '444655', 'New add');

-- --------------------------------------------------------

--
-- Table structure for table `wish_lists`
--

CREATE TABLE `wish_lists` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wish_lists`
--

INSERT INTO `wish_lists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(144, 2, 15, '2024-04-04 12:56:06', '2024-04-04 12:56:06'),
(145, 2, 18, '2024-04-04 12:56:12', '2024-04-04 12:56:12'),
(146, 2, 19, '2024-04-04 12:56:15', '2024-04-04 12:56:15'),
(147, 2, 20, '2024-04-04 12:56:17', '2024-04-04 12:56:17'),
(148, 2, 16, '2024-04-04 12:56:30', '2024-04-04 12:56:30'),
(156, 1, 19, '2024-04-19 03:06:29', '2024-04-19 03:06:29'),
(157, 1, 15, '2024-04-19 03:06:36', '2024-04-19 03:06:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_size_id_foreign` (`size_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materials_category_id_foreign` (`category_id`),
  ADD KEY `materials_sub_category_id_foreign` (`sub_category_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_size_id_foreign` (`size_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_parent_id_foreign` (`parent_id`),
  ADD KEY `products_material_id_foreign` (`material_id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_colors_product_id_foreign` (`product_id`),
  ADD KEY `product_colors_color_id_foreign` (`color_id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_sizes_product_id_foreign` (`product_id`),
  ADD KEY `product_sizes_size_id_foreign` (`size_id`);

--
-- Indexes for table `product_varients`
--
ALTER TABLE `product_varients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_varients_product_id_foreign` (`product_id`),
  ADD KEY `product_varients_color_id_foreign` (`color_id`),
  ADD KEY `product_varients_size_id_foreign` (`size_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sizes_category_id_foreign` (`category_id`),
  ADD KEY `sizes_sub_category_id_foreign` (`sub_category_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wish_lists_user_id_foreign` (`user_id`),
  ADD KEY `wish_lists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_varients`
--
ALTER TABLE `product_varients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wish_lists`
--
ALTER TABLE `wish_lists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`),
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `materials_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_items_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_material_id_foreign` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`),
  ADD CONSTRAINT `products_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD CONSTRAINT `product_sizes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_sizes_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`);

--
-- Constraints for table `product_varients`
--
ALTER TABLE `product_varients`
  ADD CONSTRAINT `product_varients_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `product_varients_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_varients_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`);

--
-- Constraints for table `sizes`
--
ALTER TABLE `sizes`
  ADD CONSTRAINT `sizes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `sizes_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`);

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD CONSTRAINT `wish_lists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `wish_lists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
