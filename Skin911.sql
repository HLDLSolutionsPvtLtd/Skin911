-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 07, 2022 at 12:35 PM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Skin911`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `landmark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `house_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `name`, `user_id`, `phone_number`, `state`, `city`, `district`, `street`, `landmark`, `house_no`, `created_at`, `updated_at`, `pincode`) VALUES
(1, 'work', '1', '8974393643', 'Aizawl', 'Aizawl', 'Aizawl', 'Bawngkawn South', 'PCI church', 'M-32/3', '2022-01-15 04:15:58', '2022-01-15 05:10:35', '796014'),
(3, 'Home', '1', '4543523453425', 'Mizoram', 'Aizawl', 'Aizawl', 'Bawngkawn', 'm-32/3', 'M-32/3', '2022-01-15 05:40:41', '2022-01-15 05:40:41', '796014');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `img`, `created_at`, `updated_at`) VALUES
(1, '3ce', 'media/bb2b10cf-987c-4596-8720-ba6182360073.jpg', '2022-01-13 03:16:56', '2022-01-13 03:53:31'),
(2, 'A\'pieu', 'media/806bc6c9-a1fd-48a8-b004-acd90f278fd6.jpg', '2022-01-13 03:54:13', '2022-01-13 03:54:13'),
(3, 'Acewell', 'media/41d95173-0536-43d4-8e09-261c7c72a4da.jpg', '2022-01-13 03:54:38', '2022-01-13 03:54:38'),
(4, 'Dear Klairs', 'media/53237562-588f-4a71-8616-cf4159e7c8fa.png', '2022-01-13 03:55:10', '2022-01-13 03:55:10'),
(5, 'Banila Co.', 'media/5ad5bbd6-39ad-4afa-82d6-c14d90e5ddd2.jpg', '2022-01-13 03:55:52', '2022-01-13 03:55:52'),
(6, 'Cosrx', 'media/92fdd19b-d58c-4bcb-917d-7e6f9adb3045.jpg', '2022-01-13 03:56:17', '2022-01-13 03:56:17'),
(7, 'Heimish', 'media/a8668238-4ea2-44b0-8bf5-41ab55ed37fe.jpg', '2022-01-13 03:56:39', '2022-01-13 03:56:39'),
(8, 'Nature Republic', 'media/4800201b-a573-4b3d-a3cb-e9d5181bc228.jpg', '2022-01-13 03:57:45', '2022-01-13 03:57:45');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1', '2022-01-15 00:33:16', '2022-01-15 00:33:16');

-- --------------------------------------------------------

--
-- Table structure for table `cart_product`
--

CREATE TABLE `cart_product` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `variant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Acid Toner', 'media/d8168eb5-6195-49d8-980e-ec897b967a8e.jpg', '2022-01-13 01:12:31', '2022-01-13 03:58:35'),
(3, 'chemical Exfolicator', '', '2022-01-13 03:58:59', '2022-01-13 03:58:59'),
(4, 'Double-Cleanse', '', '2022-01-13 03:59:16', '2022-01-13 03:59:16'),
(5, 'Essence', '', '2022-01-13 03:59:26', '2022-01-13 03:59:26'),
(6, 'Exfoliator', '', '2022-01-13 03:59:38', '2022-01-13 03:59:38'),
(7, 'Eye Care', '', '2022-01-13 03:59:51', '2022-01-13 03:59:51'),
(8, 'Eye Cream', '', '2022-01-13 04:00:01', '2022-01-13 04:00:01'),
(9, 'Facial Moisturizer', '', '2022-01-13 04:00:17', '2022-01-13 04:00:17'),
(10, 'Hair And Body', '', '2022-01-13 04:00:30', '2022-01-13 04:00:30'),
(11, 'Makeup and Tools', '', '2022-01-13 04:00:48', '2022-01-13 04:00:48'),
(12, 'Mask', '', '2022-01-13 04:00:56', '2022-01-13 04:00:56'),
(13, 'Moisturizer', '', '2022-01-13 04:01:20', '2022-01-13 04:01:20');

-- --------------------------------------------------------

--
-- Table structure for table `discountables`
--

CREATE TABLE `discountables` (
  `id` bigint UNSIGNED NOT NULL,
  `discount_id` int NOT NULL,
  `discountable_id` int NOT NULL,
  `discountable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discountables`
--

INSERT INTO `discountables` (`id`, `discount_id`, `discountable_id`, `discountable_type`, `created_at`, `updated_at`) VALUES
(52, 2, 6, 'App\\Models\\Product', NULL, NULL),
(58, 3, 4, 'App\\Models\\Product', NULL, NULL),
(59, 3, 4, 'App\\Models\\Category', NULL, NULL),
(60, 3, 1, 'App\\Models\\Brand', NULL, NULL),
(61, 4, 2, 'App\\Models\\Product', NULL, NULL),
(62, 4, 3, 'App\\Models\\Product', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('fixed_amount','percentage') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `img` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_from` date NOT NULL,
  `valid_upto` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `name`, `type`, `amount`, `created_at`, `updated_at`, `img`, `valid_from`, `valid_upto`) VALUES
(2, 'Summer Discount', 'fixed_amount', '150', '2022-01-27 03:41:32', '2022-01-27 03:41:32', 'media/e1d3948c-19ce-41e2-ac2a-6b2b45920890.jpg', '2022-01-27', '2022-02-25'),
(3, 'Winter Sale', 'fixed_amount', '500', '2022-01-28 02:12:21', '2022-01-28 02:12:21', 'media/558235ca-7ef7-4dac-9447-6e0ec88d7815.jpg', '2022-01-28', '2022-02-04'),
(4, 'Sale', 'percentage', '10', '2022-02-02 05:48:16', '2022-02-02 05:48:16', 'media/c30b126e-371a-4b02-82aa-8b1bb3398d0b.jpg', '2022-02-02', '2022-02-22');

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
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `product_id`, `link`, `created_at`, `updated_at`) VALUES
(1, '2', 'media/b54de983-930b-4da0-85cc-e48638ed8fd2.jpg', '2022-01-13 03:25:57', '2022-01-13 03:25:57'),
(2, '2', 'media/69dcfbad-3bc6-48bc-acb4-9611b24902e4.jpg', '2022-01-13 03:25:57', '2022-01-13 03:25:57'),
(3, '3', 'media/ca96da26-bf19-4592-921c-1e749dd735cb.jpg', '2022-01-13 03:26:16', '2022-01-13 03:26:16'),
(4, '3', 'media/bb2141c0-260b-414a-a3e1-656ababcdc54.jpg', '2022-01-13 03:26:16', '2022-01-13 03:26:16'),
(5, '4', 'media/79b7352d-7f19-442d-a616-ebe014d310bc.jpg', '2022-01-13 03:27:09', '2022-01-13 03:27:09'),
(6, '4', 'media/57fb64b7-d883-4c6e-9c15-168471008146.jpg', '2022-01-13 03:27:09', '2022-01-13 03:27:09'),
(7, '4', 'media/7fe7bf12-24bb-4c1c-9afa-dcc519b33950.webp', '2022-01-13 03:27:09', '2022-01-13 03:27:09'),
(8, '5', 'media/66f9afc1-7fe1-4b25-8df9-2fed4ff4c1f9.jpg', '2022-01-26 04:48:22', '2022-01-26 04:48:22'),
(9, '5', 'media/31942091-025d-4532-b90f-2aaa6e8774b3.jpg', '2022-01-26 04:48:22', '2022-01-26 04:48:22'),
(10, '5', 'media/a7e87971-d2a6-4523-b113-e9832e2611c3.jpg', '2022-01-26 04:48:22', '2022-01-26 04:48:22'),
(11, '6', 'media/469502e3-4b71-43a8-b753-95ba618f829d.webp', '2022-01-26 05:21:15', '2022-01-26 05:21:15'),
(12, '6', 'media/6a5a24b0-d0a6-493c-b8d7-094d310f9844.jpg', '2022-01-26 05:21:15', '2022-01-26 05:21:15');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_09_15_074206_create_sessions_table', 1),
(7, '2022_01_10_091843_add_products', 1),
(8, '2022_01_10_092324_create_variants', 1),
(9, '2022_01_10_092506_create_brands', 1),
(10, '2022_01_10_092553_create_categories', 1),
(11, '2022_01_10_092616_create_images', 1),
(12, '2022_01_10_092727_create_carts', 1),
(13, '2022_01_10_092918_create_cart_product', 1),
(14, '2022_01_10_093015_create_orders', 1),
(15, '2022_01_10_093303_create_order_product', 1),
(16, '2022_01_10_093401_create_addresses', 1),
(17, '2022_01_10_093618_create_transactions', 1),
(18, '2022_01_26_114122_create_discounts_table', 2),
(19, '2022_01_27_060652_create_discountables', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('placed','accepted','denied','cancelled','out_for_delivery','delivered') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'placed',
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address_id` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` enum('cod','rzp') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `total`, `created_at`, `updated_at`, `address_id`, `payment_type`) VALUES
(25, '1', 'accepted', '3000', '2022-01-17 03:05:22', '2022-01-25 05:53:25', '1', 'rzp'),
(26, '1', 'out_for_delivery', '500', '2022-01-17 04:19:50', '2022-01-25 05:53:31', '1', 'rzp'),
(27, '1', 'delivered', '500', '2022-01-17 05:14:23', '2022-01-18 03:19:21', '1', 'rzp'),
(28, '1', 'placed', '1000', '2022-01-26 05:44:24', '2022-01-26 05:44:24', '1', 'rzp'),
(29, '1', 'accepted', '1000', '2022-02-07 01:28:36', '2022-02-07 01:29:37', '1', 'rzp');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `variant` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `quantity`, `subtotal`, `created_at`, `updated_at`, `variant`) VALUES
(21, '25', '4', '3', '1500', NULL, NULL, NULL),
(22, '25', '4', '2', '1000', NULL, NULL, NULL),
(23, '25', '3', '1', '500', NULL, NULL, NULL),
(24, '26', '3', '1', '500', NULL, NULL, NULL),
(25, '27', '4', '1', '500', NULL, NULL, NULL),
(26, '28', '4', '1', '500', NULL, NULL, NULL),
(27, '28', '2', '1', '500', NULL, NULL, NULL),
(28, '29', '5', '2', '1000', NULL, NULL, NULL);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `category_id`, `brand_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(2, 'Product1', 'test description', 'chemical Exfolicator', 'Banila Co.', 10, '500', '2022-01-13 03:25:57', '2022-01-25 04:36:38'),
(3, 'Product2', 'test description', 'chemical Exfolicator', 'A\'pieu', 10, '500', '2022-01-13 03:26:16', '2022-01-25 04:34:23'),
(4, 'Product3', 'test description', 'Essence', 'Dear Klairs', 10, '500', '2022-01-13 03:27:09', '2022-01-25 04:36:55'),
(5, '3CE SOFT LIP LACQUER #IMPOSING', 'The moment you put it on your lips, it gives you a vivid and intense color feel. It sticks lightly as if nothing is applied to the lips. It lasts for a long time, just as it was originally painted.\r\n\r\nSoft liquid texture with strong color and soft fit finish. Thin slip mood texture gentle on lips spread with light bare feeling. Color adjustment and detail coloring for attractive color variation finish. High color fine pigment gives clear lip cover, fills between lip wrinkles for even blend and silky lip makeup finish.', 'Makeup and Tools', 'A\'pieu', 12, '500', '2022-01-26 04:48:22', '2022-01-26 04:48:22'),
(6, '3CE MOOD RECIPE LIP COLOR #220 HIT ME UP - [MATTE]', 'HIT ME UP, tasteful paisley orange.\r\nInspired by the gentle orange-brown found amidst an intricate paisley pattern, this is an MLBB shade of a whole new vibe.\r\n\r\nA matte-type lipstick with a creamy application; this primer-like consistency will let your lips maintain a distinct color all day.\r\n\r\n \r\n\r\nExpiry Date: 2022/12', 'Makeup and Tools', '3ce', 20, '1550', '2022-01-26 05:21:15', '2022-01-26 05:21:15');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('LP5NNdE03g3VgOEz4xYUPfc2Ds1QqdWBzWHDm1V7', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:96.0) Gecko/20100101 Firefox/96.0', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoibFFubmFMQUViRTJuZjZZdmNRU0NzQUc0c2o1WHVld3oxSnZLYlV3NSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvdmlldy9jYXRlZ29yaWVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJDdiTDU1cU1KdElsb0ZZdnJ3eGxtLk9mZUhvRkE0Rjllb3czUHJvbkNpdk1NbUs2QUNoRGNXIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCQ3Ykw1NXFNSnRJbG9GWXZyd3hsbS5PZmVIb0ZBNEY5ZW93M1Byb25DaXZNTW1LNkFDaERjVyI7fQ==', 1644217431);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `razorpay_transaction_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `razorpay_transaction_signature` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `razorpay_order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('paid','pending','refunded') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `order_id`, `razorpay_transaction_id`, `razorpay_transaction_signature`, `razorpay_order_id`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(5, '1', '25', 'pay_IkkGrC65eD798z', 'ed9297e81ad29e5f1f7c3a714551d36ced8bab397fb1c5edca76a38e88fbe6a1', 'order_IkkGIbfU12fR76', '3000', 'paid', '2022-01-17 03:05:22', '2022-01-17 03:05:59'),
(6, '1', '26', 'pay_IklXFii5jqMERl', '2808b41f55fc621d5c1f6829d0d5c43ae51b346fb52b31954ff86cdf4bf03cbd', 'order_IklWy8eQHFuBEj', '500', 'refunded', '2022-01-17 04:19:51', '2022-01-18 04:52:50'),
(7, '1', '27', 'pay_IlAmRYEvX8PIlj', '2d13cca2f922db8bf2bf0c9e97a1b62f33f9e536f155d7959097e634c5ff2e25', 'order_IkmSasAIWZyfpv', '500', 'paid', '2022-01-17 05:14:24', '2022-01-18 05:01:55'),
(8, '1', '28', NULL, NULL, 'order_IoLmNsImG4Gh6L', '1000', 'pending', '2022-01-26 05:44:25', '2022-01-26 05:44:25'),
(9, '1', '29', 'pay_It1pvin4ePeXmD', '800cebe87998eb01eb427a3d2c5e9630dd04286a2f688937618317cfadbb0dc9', 'order_It1pd5XtO81O3G', '1000', 'paid', '2022-02-07 01:28:37', '2022-02-07 01:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `is_admin`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `phone_no`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'terinao', 'terinao86@gmail.com', 1, NULL, '$2y$10$7bL55qMJtIloFYvrwxlm.OfeHoFA4F9eow3PronCivMMmK6AChDcW', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-13 01:10:29', '2022-01-26 05:43:26');

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

CREATE TABLE `variants` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variants`
--

INSERT INTO `variants` (`id`, `product_id`, `name`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, '2', 'Variant1', '500', 6, '2022-01-13 03:25:57', '2022-01-13 03:25:57'),
(2, '2', 'Variant2', '600', 4, '2022-01-13 03:25:57', '2022-01-13 03:25:57'),
(3, '4', 'Yellow', '700', 10, '2022-01-13 03:27:09', '2022-01-13 03:27:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discountables`
--
ALTER TABLE `discountables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_product`
--
ALTER TABLE `cart_product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `discountables`
--
ALTER TABLE `discountables`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
