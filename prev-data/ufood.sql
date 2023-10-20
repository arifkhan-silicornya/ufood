-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2023 at 11:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ufood`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userName` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `profilePic` varchar(255) NOT NULL DEFAULT 'avatar.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `userName`, `adminPass`, `profilePic`, `created_at`, `updated_at`) VALUES
(1, 'arif', '123', 'avatar.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1000, 1, 20, '2021-06-11 04:59:55', NULL),
(2, 1000, 2, 10, '2021-06-11 05:06:10', NULL),
(3, 1000, 3, 0, '2021-06-12 12:35:06', NULL),
(4, 101, 5, 3, '2021-06-15 22:32:02', NULL),
(5, 101, 4, 1, '2021-06-15 22:32:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manager_name` varchar(255) NOT NULL,
  `institute_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `NID` bigint(20) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `manager_password` varchar(255) NOT NULL,
  `profilePicture` varchar(255) NOT NULL DEFAULT 'avatar.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `manager_name`, `institute_name`, `email`, `NID`, `phone`, `address`, `gender`, `active`, `manager_password`, `profilePicture`, `created_at`, `updated_at`) VALUES
(1, 'Chaity Biswas', 'city_c', 'arifkhanshanto123@gmail.com', 121, 1749903970, 'P.O : Basabo , P.S.: Sabujbagh', 'FeMale', 1, '202cb962ac59075b964b07152d234b70', 'avatar.jpg', NULL, NULL),
(2, 'Arif', 'city_c', 'arifkhanshanto1234@Gmail.com', 10101, 1749904253, 'P.O : Basabo , P.S.: Sabujbagh', 'Male', 1, '827ccb0eea8a706c4c34a16891f84e7b', '1623197868.png', NULL, NULL),
(3, 'Arif khan', 'city_s', 'arifkhanshanto234@gmail.com', 999, 1749903970, 'P.O : Basabo , P.S.: Sabujbagh', 'on', 1, '202cb962ac59075b964b07152d234b70', 'avatar.jpg', NULL, NULL),
(4, 'Onirudda Islam', 'NSU', 'arifkhanshanto1@gmail.com', 331, 1749903970, 'P.O : Basabo , P.S.: Sabujbagh', 'on', 1, '202cb962ac59075b964b07152d234b70', 'avatar.jpg', '2021-06-15 22:19:03', NULL),
(5, 'Abir', 'NSU', 'arifkhanshanto2@gmail.com', 332, 1749903970, 'P.O : Basabo , P.S.: Sabujbagh', 'on', 1, '202cb962ac59075b964b07152d234b70', 'avatar.jpg', '2021-06-15 22:19:46', NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_05_30_160408_create_user_account_table', 1),
(6, '2021_05_30_160658_create_admin_table', 1),
(7, '2021_05_30_161919_create_recharge_user_table', 1),
(8, '2021_05_30_162436_create_orders_table', 1),
(9, '2021_05_30_162821_create_orders_details_table', 1),
(10, '2021_05_30_163640_create_products_table', 1),
(11, '2021_06_04_063359_create_versity_table', 1),
(12, '2021_06_11_043444_create_carts_table', 1),
(13, '2023_10_20_075954_create_manager_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `total_Price` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `customer_name`, `customer_address`, `phoneNumber`, `session_id`, `payment_type`, `total_Price`, `status`, `created_at`, `updated_at`) VALUES
(15, 1000, 'MD. ARIF KHAN', 'Room - 420', '01749903970', '6532ec3d4100f', NULL, 220, 'delivered', NULL, NULL),
(16, 1000, 'MD. ARIF KHAN', 'Room - 420', '01749903970', '6532ed2bd411c', NULL, 2100, 'cancel', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`id`, `customer_id`, `order_id`, `item_id`, `quantity`, `price`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 1000, 2, 1, 2, 100, 200, NULL, NULL),
(2, 1000, 2, 2, 2, 10, 20, NULL, NULL),
(3, 1000, 2, 3, 7, 200, 1400, NULL, NULL),
(4, 1000, 3, 1, 2, 100, 200, NULL, NULL),
(5, 1000, 3, 2, 2, 10, 20, NULL, NULL),
(6, 1000, 3, 3, 7, 200, 1400, NULL, NULL),
(7, 1000, 4, 1, 2, 100, 200, NULL, NULL),
(8, 1000, 4, 2, 2, 10, 20, NULL, NULL),
(9, 1000, 4, 3, 7, 200, 1400, NULL, NULL),
(10, 1000, 5, 1, 2, 100, 200, NULL, NULL),
(11, 1000, 5, 2, 2, 10, 20, NULL, NULL),
(12, 1000, 5, 3, 7, 200, 1400, NULL, NULL),
(13, 1000, 6, 1, 2, 100, 200, NULL, NULL),
(14, 1000, 6, 2, 2, 10, 20, NULL, NULL),
(15, 1000, 7, 1, 2, 100, 200, NULL, NULL),
(16, 1000, 7, 2, 2, 10, 20, NULL, NULL),
(17, 1000, 8, 1, 2, 100, 200, NULL, NULL),
(18, 1000, 8, 2, 2, 10, 20, NULL, NULL),
(19, 1000, 9, 1, 2, 100, 200, NULL, NULL),
(20, 1000, 9, 2, 2, 10, 20, NULL, NULL),
(21, 1000, 9, 3, 5, 200, 1000, NULL, NULL),
(22, 1000, 10, 1, 2, 100, 200, NULL, NULL),
(23, 1000, 10, 2, 2, 10, 20, NULL, NULL),
(24, 1000, 10, 3, 5, 200, 1000, NULL, NULL),
(25, 1000, 11, 1, 2, 100, 200, NULL, NULL),
(26, 1000, 11, 2, 2, 10, 20, NULL, NULL),
(27, 1000, 11, 3, 5, 200, 1000, NULL, NULL),
(28, 1000, 12, 1, 2, 100, 200, NULL, NULL),
(29, 1000, 12, 2, 2, 10, 20, NULL, NULL),
(30, 1000, 12, 3, 5, 200, 1000, NULL, NULL),
(31, 101, 13, 5, 3, 5, 15, NULL, NULL),
(32, 101, 13, 4, 1, 110, 110, NULL, NULL),
(33, 101, 14, 5, 3, 5, 15, NULL, NULL),
(34, 101, 14, 4, 1, 110, 110, NULL, NULL),
(35, 1000, 15, 1, 2, 100, 200, NULL, NULL),
(36, 1000, 15, 2, 2, 10, 20, NULL, NULL),
(37, 1000, 16, 1, 20, 100, 2000, NULL, NULL),
(38, 1000, 16, 2, 10, 10, 100, NULL, NULL);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_img_name` varchar(255) NOT NULL,
  `pro_quantity` int(11) NOT NULL,
  `pro_price` int(11) NOT NULL,
  `pro_details` varchar(255) NOT NULL,
  `instituteCode` varchar(255) NOT NULL,
  `pro_category` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pro_name`, `pro_img_name`, `pro_quantity`, `pro_price`, `pro_details`, `instituteCode`, `pro_category`, `created_at`, `updated_at`) VALUES
(1, 'Ruti', '1622951552.jpg', 21, 100, 'ruti', 'city_c', 'breakfast', NULL, NULL),
(2, 'Chicken Roll', '1623207799.webp', 100, 10, 'ggggggggggggggg', 'city_c', 'breakfast', NULL, NULL),
(3, 'Kacchi', '1623208653.png', 20, 200, 'Mutton Kacchi + Salad', 'city_s', 'lunch', NULL, NULL),
(4, 'Coca cola - 2.25ml', '1623795671.jpg', 100, 110, '300', 'NSU', 'drinks', NULL, NULL),
(5, 'shingara', '1623795804.jpg', 197, 5, 'Single Regular', 'NSU', 'breakfast', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `recharge_user`
--

CREATE TABLE `recharge_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL,
  `accountNumber` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `rechargedBy` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recharge_user`
--

INSERT INTO `recharge_user` (`id`, `userName`, `userID`, `accountNumber`, `amount`, `rechargedBy`, `created_at`, `updated_at`) VALUES
(1, 'MD. ARIF KHAN', 1000, 1, 1000, 'admin', NULL, NULL),
(2, 'rtr', 4, 4, 4, 'arifkhanshanto123@gmail.com', '2021-06-09 03:47:40', NULL),
(3, 'MD. ARIF KHAN', 1000, 1, 100, 'admin', NULL, NULL),
(4, 'MD. ARIF KHAN', 1000, 1, 200, 'arifkhanshanto123@gmail.com', NULL, NULL),
(5, 'MD. ARIF KHAN', 1000, 1, -150, 'admin', '2021-06-13 09:37:12', NULL),
(6, 'MD. ARIF KHAN', 1000, 1, 20, 'arifkhanshanto123@gmail.com', '2021-06-14 21:25:30', NULL),
(7, 'MD. ARIF KHAN', 1000, 1, 100, 'arifkhanshanto123@gmail.com', '2021-06-14 21:26:04', NULL),
(8, 'MD. ARIF KHAN', 1000, 1, 1000, 'arifkhanshanto123@gmail.com', '2021-06-14 21:26:22', NULL),
(9, 'MD. ARIF KHAN', 1000, 1, 200, 'arifkhanshanto123@gmail.com', '2021-06-14 21:26:35', NULL),
(10, 'MD. ARIF KHAN', 1000, 1, 120, 'arifkhanshanto1@gmail.com', '2021-06-15 22:26:52', NULL),
(11, 'MD. ARIF KHAN', 101, 2, 1200, 'arifkhanshanto1@gmail.com', '2021-06-15 22:36:37', NULL),
(12, 'MD. ARIF KHAN', 1000, 1, 100, 'arifkhanshanto123@gmail.com', '2021-07-12 13:06:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `instituteName` varchar(255) NOT NULL,
  `studentid` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `usertype` varchar(255) DEFAULT NULL,
  `contact` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `batch` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `profilePic` varchar(255) NOT NULL DEFAULT 'avatar.jpg',
  `verified` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `instituteName`, `studentid`, `email`, `gender`, `usertype`, `contact`, `address`, `department`, `batch`, `email_verified_at`, `password`, `profilePic`, `verified`, `deleted`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'MD. ARIF KHAN', 'city_c', '1000', 'arifkhanshanto123@gmail.com', NULL, 'Teacher', 1749903970, 'Room - 420', 'CSE', '42', '2021-06-04 19:00:55', '827ccb0eea8a706c4c34a16891f84e7b', '1623693981.jpg', 0, 1, 'rh2EfKpAF6YXcdfqZuuskgFrw8EOSncEeJ27450b', NULL, NULL),
(2, 'MD. ARIF KHAN', 'NSU', '101', 'qamodee75@mobinum.com', NULL, NULL, 1749903970, NULL, NULL, '45', '2021-06-15 16:31:30', '025c5a0612540810311fce2392d21f6b', 'avatar.jpg', 0, 1, 'zVN3PyaajQ036N1Nnr4koIriwgxkSvXis0xYcgqH', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `current_money` int(11) NOT NULL DEFAULT 0,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `name`, `user_id`, `current_money`, `active`, `created_at`, `updated_at`) VALUES
(1, 'MD. ARIF KHAN', 1000, 1620, 1, NULL, NULL),
(2, 'MD. ARIF KHAN', 101, 1200, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `versity`
--

CREATE TABLE `versity` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `instituteName` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `campusName` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `versity`
--

INSERT INTO `versity` (`id`, `instituteName`, `code`, `campusName`, `created_at`, `updated_at`) VALUES
(1, 'City University', 'city_c', 'City Campus', NULL, NULL),
(2, 'City University - Savar', 'city_s', 'Savar Campus', NULL, NULL),
(3, 'North South University', 'NSU', 'Bashundhara', NULL, NULL),
(4, 'East West University', 'EWU', 'Rampura', NULL, NULL),
(5, 'World University', 'wu', 'Greenroad', NULL, NULL),
(6, 'Daffodil International University', 'DIU', 'Dhanmondi-27', NULL, NULL),
(7, 'Monarat International University', 'MIU', 'Gulshan', NULL, NULL),
(8, 'Independent University', 'IU', 'Bashundhara', NULL, NULL),
(9, 'Uttora University', 'UU', 'Uttora', NULL, NULL),
(10, 'Dhaka University - CSE', 'DU-CSE', 'Dhaka', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `manager_email_unique` (`email`),
  ADD UNIQUE KEY `manager_nid_unique` (`NID`);

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
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recharge_user`
--
ALTER TABLE `recharge_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_studentid_unique` (`studentid`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `versity`
--
ALTER TABLE `versity`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `versity_code_unique` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `recharge_user`
--
ALTER TABLE `recharge_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `versity`
--
ALTER TABLE `versity`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
