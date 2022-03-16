-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2022 at 10:49 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `service_matter`
--

-- --------------------------------------------------------

--
-- Table structure for table `acl_rules`
--

CREATE TABLE `acl_rules` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `code`, `symbol`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bangladeshi Taaka', 'BDT', '৳', 1, '2022-01-02 03:20:16', '2022-01-02 03:20:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hires`
--

CREATE TABLE `hires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` double NOT NULL DEFAULT 0,
  `per_hour` double NOT NULL DEFAULT 0,
  `working_hour` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `transaction_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hires`
--

INSERT INTO `hires` (`id`, `name`, `email`, `phone`, `total_amount`, `per_hour`, `working_hour`, `address`, `employee_id`, `user_id`, `transaction_by`, `transaction_id`, `status`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 'MR Customer', 'customer@example.com', '01822122556', 600, 300, '2', 'Naogaon, Rajshahi, Dhaka, Bangladesh', 2, 3, 'cod', NULL, 1, 0, '2022-01-03 08:36:46', '2022-01-03 08:36:46');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `log_date` datetime NOT NULL,
  `table_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `log_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `log_date`, `table_name`, `log_type`, `data`) VALUES
(1, 1, '2022-01-02 10:58:57', 'users', 'edit', '{\"id\":1,\"name\":\"Soumik Ahammed\",\"email\":\"admin@example.com\",\"nid\":\"121220000\",\"email_verified_at\":null,\"password\":\"$2y$10$uRFJS1hCp96wWapSodQl6.A8IGyfkK\\/9rQIFNyxg.I8i8\\/7ho6AbS\",\"mobile\":\"01689201370\",\"image\":null,\"utype\":\"ADM\",\"bio\":null,\"address\":null,\"work_start_time\":null,\"work_end_time\":null,\"per_hour_charge\":null,\"status\":1,\"remember_token\":null,\"created_at\":\"2022-01-02 09:20:16\",\"updated_at\":\"2022-01-02 09:20:16\",\"user_service_category_id\":null}'),
(2, 1, '2022-01-02 10:58:57', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/96.0.4664.110 Safari\\/537.36\"}'),
(3, 1, '2022-01-02 11:55:51', 'users', 'edit', '{\"id\":1,\"name\":\"Soumik Ahammed\",\"email\":\"admin@example.com\",\"nid\":\"121220000\",\"email_verified_at\":null,\"password\":\"$2y$10$uRFJS1hCp96wWapSodQl6.A8IGyfkK\\/9rQIFNyxg.I8i8\\/7ho6AbS\",\"mobile\":\"01689201370\",\"image\":null,\"utype\":\"ADM\",\"bio\":null,\"address\":null,\"work_start_time\":null,\"work_end_time\":null,\"per_hour_charge\":null,\"status\":1,\"remember_token\":\"W5OaEPTXG8WQ5A5rsy0oJoiFlgQLrMC5cKDphjAwpgvAl8VkYWwBVfAXxHtG\",\"created_at\":\"2022-01-02 09:20:16\",\"updated_at\":\"2022-01-02 09:20:16\",\"user_service_category_id\":null}'),
(4, 3, '2022-01-02 11:55:58', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/96.0.4664.110 Safari\\/537.36\"}'),
(5, 1, '2022-01-02 12:07:51', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/96.0.4664.110 Safari\\/537.36\"}'),
(6, 1, '2022-01-02 12:28:08', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/96.0.4664.110 Safari\\/537.36\"}'),
(7, 1, '2022-01-02 12:29:19', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/96.0.4664.110 Safari\\/537.36\"}'),
(8, 1, '2022-01-02 20:49:22', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/96.0.4664.110 Safari\\/537.36\"}'),
(9, 1, '2022-01-03 11:23:29', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/96.0.4664.110 Safari\\/537.36\"}'),
(10, 1, '2022-01-03 14:33:04', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/96.0.4664.110 Safari\\/537.36\"}'),
(11, 1, '2022-01-03 14:33:07', 'users', 'edit', '{\"id\":1,\"name\":\"Soumik Ahammed\",\"email\":\"admin@example.com\",\"nid\":\"121220000\",\"email_verified_at\":null,\"password\":\"$2y$10$uRFJS1hCp96wWapSodQl6.A8IGyfkK\\/9rQIFNyxg.I8i8\\/7ho6AbS\",\"mobile\":\"01689201370\",\"image\":null,\"utype\":\"ADM\",\"bio\":null,\"address\":null,\"work_start_time\":null,\"work_end_time\":null,\"per_hour_charge\":null,\"status\":1,\"remember_token\":\"UyfwypiSpvRDG0mIB9cacsKEqEYAGUyCA2AHZVEVv0XL7GbPC0IU5b5AbkNO\",\"created_at\":\"2022-01-02 09:20:16\",\"updated_at\":\"2022-01-02 09:20:16\",\"user_service_category_id\":null}'),
(12, 2, '2022-01-03 14:33:13', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/96.0.4664.110 Safari\\/537.36\"}'),
(13, 2, '2022-01-03 14:35:08', 'users', 'edit', '{\"id\":2,\"name\":\"MR Provider\",\"email\":\"provider@example.com\",\"nid\":\"1212212000\",\"email_verified_at\":null,\"password\":\"$2y$10$3cMeESWG1gmXb19wg3XVCOwXFfZKFrKgUuZR3T10r62uBBQzbWPM2\",\"mobile\":\"01822115588\",\"image\":null,\"utype\":\"SVP\",\"bio\":null,\"address\":null,\"work_start_time\":null,\"work_end_time\":null,\"per_hour_charge\":null,\"status\":1,\"remember_token\":null,\"created_at\":\"2022-01-02 09:20:16\",\"updated_at\":\"2022-01-02 09:20:16\",\"user_service_category_id\":null}'),
(14, 2, '2022-01-03 14:35:38', 'users', 'edit', '{\"id\":2,\"name\":\"MR Provider\",\"email\":\"provider@example.com\",\"nid\":\"1212212000\",\"email_verified_at\":null,\"password\":\"$2y$10$3cMeESWG1gmXb19wg3XVCOwXFfZKFrKgUuZR3T10r62uBBQzbWPM2\",\"mobile\":\"01822115588\",\"image\":\"http:\\/\\/servicematter.test\\/storage\\/allu-arjun-image-7.jpg\",\"utype\":\"SVP\",\"bio\":\"<p>Quisque id mi. Praesent nonummy mi in odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed aliquam, nisi quis porttitor congue, elit erat euismod orci, ac placerat dolor lectus quis orci. Ut non enim eleifend felis pretium feugiat. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi.<\\/p>\",\"address\":\"Rajshahi\",\"work_start_time\":\"10:00:00\",\"work_end_time\":\"22:00:00\",\"per_hour_charge\":300,\"status\":1,\"remember_token\":null,\"created_at\":\"2022-01-02 09:20:16\",\"updated_at\":\"2022-01-03 14:35:08\",\"user_service_category_id\":1}'),
(15, 3, '2022-01-03 14:35:58', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/96.0.4664.110 Safari\\/537.36\"}'),
(16, 4, '2022-01-03 15:24:48', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/96.0.4664.110 Safari\\/537.36\"}'),
(17, 4, '2022-01-03 15:26:27', 'users', 'edit', '{\"id\":4,\"name\":\"Empolyee Duo\",\"email\":\"emduo@gmail.com\",\"nid\":null,\"email_verified_at\":null,\"password\":\"$2y$10$ctFcy4osM569GZS3ovPTIOKs4L50cI2laa6BGYGVcSxAPo8LBMqiO\",\"mobile\":\"017777777\",\"image\":null,\"utype\":\"SVP\",\"bio\":null,\"address\":null,\"work_start_time\":null,\"work_end_time\":null,\"per_hour_charge\":null,\"status\":1,\"remember_token\":null,\"created_at\":\"2022-01-03 15:24:42\",\"updated_at\":\"2022-01-03 15:24:42\",\"user_service_category_id\":null}'),
(18, 4, '2022-01-03 15:26:46', 'users', 'edit', '{\"id\":4,\"name\":\"Empolyee Duo\",\"email\":\"emduo@gmail.com\",\"nid\":\"200064160290000513\",\"email_verified_at\":null,\"password\":\"$2y$10$ctFcy4osM569GZS3ovPTIOKs4L50cI2laa6BGYGVcSxAPo8LBMqiO\",\"mobile\":\"017777777\",\"image\":\"http:\\/\\/servicematter.test\\/storage\\/Business-Development-Manager-Profile-Photo.jpg\",\"utype\":\"SVP\",\"bio\":\"<p>Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Nam adipiscing. Pellentesque commodo eros a enim. Fusce pharetra convallis urna.<\\/p>\",\"address\":\"Dhaka\",\"work_start_time\":\"09:30:00\",\"work_end_time\":\"18:30:00\",\"per_hour_charge\":250,\"status\":1,\"remember_token\":null,\"created_at\":\"2022-01-03 15:24:42\",\"updated_at\":\"2022-01-03 15:26:27\",\"user_service_category_id\":8}'),
(19, 3, '2022-01-03 15:32:30', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/96.0.4664.110 Safari\\/537.36\"}'),
(20, 3, '2022-01-03 15:34:40', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/96.0.4664.110 Safari\\/537.36\"}'),
(21, 2, '2022-01-04 10:40:58', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/96.0.4664.110 Safari\\/537.36\"}'),
(22, 1, '2022-01-04 10:44:13', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/96.0.4664.110 Safari\\/537.36\"}'),
(23, 1, '2022-01-04 10:44:29', 'users', 'edit', '{\"id\":1,\"name\":\"Soumik Ahammed\",\"email\":\"admin@example.com\",\"nid\":\"121220000\",\"email_verified_at\":null,\"password\":\"$2y$10$uRFJS1hCp96wWapSodQl6.A8IGyfkK\\/9rQIFNyxg.I8i8\\/7ho6AbS\",\"mobile\":\"01689201370\",\"image\":null,\"utype\":\"ADM\",\"bio\":null,\"address\":null,\"work_start_time\":null,\"work_end_time\":null,\"per_hour_charge\":null,\"status\":1,\"remember_token\":\"LrIfNsf31ShQ8YTFjzBj2erQ3cy6ED3tVxfGAN4q04y5tpRpfes0LrDYZ3lg\",\"created_at\":\"2022-01-02 09:20:16\",\"updated_at\":\"2022-01-02 09:20:16\",\"user_service_category_id\":null}'),
(24, 1, '2022-01-04 10:49:32', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/96.0.4664.110 Safari\\/537.36\"}'),
(25, 1, '2022-01-07 14:01:52', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/96.0.4664.110 Safari\\/537.36\"}'),
(26, 1, '2022-01-07 14:03:43', 'users', 'edit', '{\"id\":1,\"name\":\"Soumik Ahammed\",\"email\":\"admin@example.com\",\"nid\":\"121220000\",\"email_verified_at\":null,\"password\":\"$2y$10$OSlLoRlRSI3E4uk4bsso\\/euZ5510n\\/MVwOs2INVm13MDCXeuZgyuu\",\"mobile\":\"01689201370\",\"image\":null,\"utype\":\"ADM\",\"bio\":null,\"address\":null,\"work_start_time\":null,\"work_end_time\":null,\"per_hour_charge\":null,\"status\":1,\"remember_token\":\"kOXrvYtG6906BaejOLIAdeKRn8POAaWhbyHfkrELW6zBUef65W9OeI1m9TuZ\",\"created_at\":\"2022-01-02 09:20:16\",\"updated_at\":\"2022-01-04 10:49:28\",\"user_service_category_id\":null}'),
(27, 1, '2022-01-15 14:29:08', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/97.0.4692.71 Safari\\/537.36\"}'),
(28, 1, '2022-01-15 14:32:21', 'users', 'edit', '{\"id\":1,\"name\":\"Soumik Ahammed\",\"email\":\"admin@example.com\",\"nid\":\"121220000\",\"email_verified_at\":null,\"password\":\"$2y$10$OSlLoRlRSI3E4uk4bsso\\/euZ5510n\\/MVwOs2INVm13MDCXeuZgyuu\",\"mobile\":\"01689201370\",\"image\":null,\"utype\":\"ADM\",\"bio\":null,\"address\":null,\"work_start_time\":null,\"work_end_time\":null,\"per_hour_charge\":null,\"status\":1,\"remember_token\":\"bHqHTftoNC3kTFUq0UskewsSN1bcC8L6mWxoVP2TXtp5dB7HpVM0o5RtUtzt\",\"created_at\":\"2022-01-02 09:20:16\",\"updated_at\":\"2022-01-04 10:49:28\",\"user_service_category_id\":null}'),
(29, 2, '2022-01-15 14:32:33', 'users', 'edit', '{\"id\":2,\"name\":\"MR Employee\",\"email\":\"employee@example.com\",\"nid\":\"1212212000\",\"email_verified_at\":null,\"password\":\"$2y$10$3cMeESWG1gmXb19wg3XVCOwXFfZKFrKgUuZR3T10r62uBBQzbWPM2\",\"mobile\":\"01822115588\",\"image\":\"http:\\/\\/servicematter.test\\/storage\\/allu-arjun-image-7.jpg\",\"utype\":\"SVP\",\"bio\":\"<p>Quisque id mi. Praesent nonummy mi in odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed aliquam, nisi quis porttitor congue, elit erat euismod orci, ac placerat dolor lectus quis orci. Ut non enim eleifend felis pretium feugiat. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi.<\\/p>\",\"address\":\"Rajshahi\",\"work_start_time\":\"10:00:00\",\"work_end_time\":\"22:00:00\",\"per_hour_charge\":300,\"status\":1,\"remember_token\":null,\"created_at\":\"2022-01-02 09:20:16\",\"updated_at\":\"2022-01-03 14:35:38\",\"user_service_category_id\":1}'),
(30, 2, '2022-01-15 14:32:33', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/97.0.4692.71 Safari\\/537.36\"}'),
(31, 2, '2022-01-15 14:33:59', 'users', 'edit', '{\"id\":2,\"name\":\"MR Employee\",\"email\":\"employee@example.com\",\"nid\":\"1212212000\",\"email_verified_at\":null,\"password\":\"$2y$10$3cMeESWG1gmXb19wg3XVCOwXFfZKFrKgUuZR3T10r62uBBQzbWPM2\",\"mobile\":\"01822115588\",\"image\":\"http:\\/\\/servicematter.test\\/storage\\/allu-arjun-image-7.jpg\",\"utype\":\"SVP\",\"bio\":\"<p>Quisque id mi. Praesent nonummy mi in odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed aliquam, nisi quis porttitor congue, elit erat euismod orci, ac placerat dolor lectus quis orci. Ut non enim eleifend felis pretium feugiat. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi.<\\/p>\",\"address\":\"Rajshahi\",\"work_start_time\":\"10:00:00\",\"work_end_time\":\"22:00:00\",\"per_hour_charge\":300,\"status\":1,\"remember_token\":\"gnkbdQguYjQC6vCcHW0HracjWEplv9z5F8h38yoRzNAKuddMnnnqx9UAkslN\",\"created_at\":\"2022-01-02 09:20:16\",\"updated_at\":\"2022-01-03 14:35:38\",\"user_service_category_id\":1}'),
(32, 3, '2022-01-15 14:34:06', 'users', 'edit', '{\"id\":3,\"name\":\"MR Customer\",\"email\":\"customer@example.com\",\"nid\":\"12122125800\",\"email_verified_at\":null,\"password\":\"$2y$10$kPdiaZD.Stek2ZjTjMQR0eVa6jaoEkX7Hu7leAOTGdxux2JKs\\/mWG\",\"mobile\":\"01822122556\",\"image\":null,\"utype\":\"CST\",\"bio\":null,\"address\":null,\"work_start_time\":null,\"work_end_time\":null,\"per_hour_charge\":null,\"status\":1,\"remember_token\":null,\"created_at\":\"2022-01-02 09:20:16\",\"updated_at\":\"2022-01-02 09:20:16\",\"user_service_category_id\":null}'),
(33, 3, '2022-01-15 14:34:06', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/97.0.4692.71 Safari\\/537.36\"}'),
(34, 3, '2022-01-15 14:35:37', 'users', 'edit', '{\"id\":3,\"name\":\"MR Customer\",\"email\":\"customer@example.com\",\"nid\":\"12122125800\",\"email_verified_at\":null,\"password\":\"$2y$10$kPdiaZD.Stek2ZjTjMQR0eVa6jaoEkX7Hu7leAOTGdxux2JKs\\/mWG\",\"mobile\":\"01822122556\",\"image\":null,\"utype\":\"CST\",\"bio\":null,\"address\":null,\"work_start_time\":null,\"work_end_time\":null,\"per_hour_charge\":null,\"status\":1,\"remember_token\":\"EsHy0KdekHFhpXct94nxh4tpO6BTcVrF6kOQsd4y7yYlM4CRBxHDRpCQkPx6\",\"created_at\":\"2022-01-02 09:20:16\",\"updated_at\":\"2022-01-02 09:20:16\",\"user_service_category_id\":null}'),
(35, 1, '2022-01-15 15:36:57', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/97.0.4692.71 Safari\\/537.36\"}'),
(36, 1, '2022-01-17 13:44:11', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/97.0.4692.71 Safari\\/537.36\"}'),
(37, 1, '2022-01-17 13:44:25', 'users', 'edit', '{\"id\":1,\"name\":\"Soumik Ahammed\",\"email\":\"admin@example.com\",\"nid\":\"121220000\",\"email_verified_at\":null,\"password\":\"$2y$10$OSlLoRlRSI3E4uk4bsso\\/euZ5510n\\/MVwOs2INVm13MDCXeuZgyuu\",\"mobile\":\"01689201370\",\"image\":null,\"utype\":\"ADM\",\"bio\":null,\"address\":null,\"work_start_time\":null,\"work_end_time\":null,\"per_hour_charge\":null,\"status\":1,\"remember_token\":\"SsjQuqg1j1gsROIKQJlGTFTGdoCTqjZswPVMneyIwjtHZ1A87uSWabzGIOcW\",\"created_at\":\"2022-01-02 09:20:16\",\"updated_at\":\"2022-01-04 10:49:28\",\"user_service_category_id\":null}'),
(38, 3, '2022-01-17 13:44:33', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/97.0.4692.71 Safari\\/537.36\"}'),
(39, 3, '2022-01-17 13:51:57', 'users', 'edit', '{\"id\":3,\"name\":\"MR Customer\",\"email\":\"customer@example.com\",\"nid\":\"12122125800\",\"email_verified_at\":null,\"password\":\"$2y$10$kPdiaZD.Stek2ZjTjMQR0eVa6jaoEkX7Hu7leAOTGdxux2JKs\\/mWG\",\"mobile\":\"01822122556\",\"image\":null,\"utype\":\"CST\",\"bio\":null,\"address\":null,\"work_start_time\":null,\"work_end_time\":null,\"per_hour_charge\":null,\"status\":1,\"remember_token\":\"GNzUpA56Xrni1LmuwHl2QBueUVgSpAX7R64BN5w4vmhOLqJN5pbEAKREtxyF\",\"created_at\":\"2022-01-02 09:20:16\",\"updated_at\":\"2022-01-02 09:20:16\",\"user_service_category_id\":null}'),
(40, 1, '2022-01-17 13:52:13', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/97.0.4692.71 Safari\\/537.36\"}');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_02_06_174631_make_acl_rules_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_11_20_100001_create_log_table', 1),
(7, '2021_08_23_153706_create_permission_tables', 1),
(8, '2021_09_06_110659_create_currencies_table', 1),
(9, '2021_09_07_115435_create_settings_table', 1),
(10, '2021_09_09_094210_create_service_categories_table', 1),
(11, '2021_09_09_094228_create_services_table', 1),
(12, '2021_09_09_095050_create_sliders_table', 1),
(13, '2021_11_12_104428_create_orders_table', 1),
(14, '2021_11_16_121212_create_reviews_table', 1),
(15, '2021_11_17_140410_create_hires_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` tinyint(1) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `amount`, `address`, `transaction_id`, `currency`, `status`, `order_status`, `user_id`, `service_id`, `created_at`, `updated_at`) VALUES
(8, 'Soumik Ahammed', 'soumik.ahammed.9@gmail.com', '01689201370', 1960, 'Naogaon, Rajshahi, Dhaka, Bangladesh', '61d19a872f465', 'BDT', 'Completed', 1, 1, 21, '2022-01-02 06:28:55', '2022-01-02 06:28:55'),
(9, 'MR Customer', 'customer@example.com', '01822122556', 5000, 'Rajshahi', '61d3175287774', 'BDT', 'Completed', 3, 3, 22, '2022-01-03 09:33:38', '2022-01-03 09:33:38');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user-list', 'web', '2022-01-02 03:20:15', '2022-01-02 03:20:15'),
(2, 'user-create', 'web', '2022-01-02 03:20:15', '2022-01-02 03:20:15'),
(3, 'user-edit', 'web', '2022-01-02 03:20:15', '2022-01-02 03:20:15'),
(4, 'user-delete', 'web', '2022-01-02 03:20:15', '2022-01-02 03:20:15'),
(5, 'role-list', 'web', '2022-01-02 03:20:15', '2022-01-02 03:20:15'),
(6, 'role-create', 'web', '2022-01-02 03:20:15', '2022-01-02 03:20:15'),
(7, 'role-edit', 'web', '2022-01-02 03:20:15', '2022-01-02 03:20:15'),
(8, 'role-delete', 'web', '2022-01-02 03:20:15', '2022-01-02 03:20:15'),
(9, 'permission-list', 'web', '2022-01-02 03:20:15', '2022-01-02 03:20:15'),
(10, 'permission-create', 'web', '2022-01-02 03:20:15', '2022-01-02 03:20:15'),
(11, 'permission-edit', 'web', '2022-01-02 03:20:15', '2022-01-02 03:20:15'),
(12, 'permission-delete', 'web', '2022-01-02 03:20:15', '2022-01-02 03:20:15'),
(13, 'currency-list', 'web', '2022-01-02 03:20:15', '2022-01-02 03:20:15'),
(14, 'currency-create', 'web', '2022-01-02 03:20:15', '2022-01-02 03:20:15'),
(15, 'currency-edit', 'web', '2022-01-02 03:20:16', '2022-01-02 03:20:16'),
(16, 'currency-delete', 'web', '2022-01-02 03:20:16', '2022-01-02 03:20:16'),
(17, 'servicecategory-list', 'web', '2022-01-02 03:20:16', '2022-01-02 03:20:16'),
(18, 'servicecategory-create', 'web', '2022-01-02 03:20:16', '2022-01-02 03:20:16'),
(19, 'servicecategory-edit', 'web', '2022-01-02 03:20:16', '2022-01-02 03:20:16'),
(20, 'servicecategory-delete', 'web', '2022-01-02 03:20:16', '2022-01-02 03:20:16'),
(21, 'service-list', 'web', '2022-01-02 03:20:16', '2022-01-02 03:20:16'),
(22, 'service-create', 'web', '2022-01-02 03:20:16', '2022-01-02 03:20:16'),
(23, 'service-edit', 'web', '2022-01-02 03:20:16', '2022-01-02 03:20:16'),
(24, 'service-delete', 'web', '2022-01-02 03:20:16', '2022-01-02 03:20:16'),
(25, 'slide-list', 'web', '2022-01-02 03:20:16', '2022-01-02 03:20:16'),
(26, 'slide-create', 'web', '2022-01-02 03:20:16', '2022-01-02 03:20:16'),
(27, 'slide-edit', 'web', '2022-01-02 03:20:16', '2022-01-02 03:20:16'),
(28, 'slide-delete', 'web', '2022-01-02 03:20:16', '2022-01-02 03:20:16'),
(29, 'order-list', 'web', '2022-01-02 03:20:16', '2022-01-02 03:20:16'),
(30, 'order-view', 'web', '2022-01-02 03:20:16', '2022-01-02 03:20:16'),
(31, 'order-edit', 'web', '2022-01-02 03:20:16', '2022-01-02 03:20:16'),
(32, 'order-delete', 'web', '2022-01-02 03:20:16', '2022-01-02 03:20:16'),
(33, 'hire-list', 'web', '2022-01-02 03:20:16', '2022-01-02 03:20:16'),
(34, 'hire-view', 'web', '2022-01-02 03:20:16', '2022-01-02 03:20:16'),
(35, 'hire-edit', 'web', '2022-01-02 03:20:16', '2022-01-02 03:20:16'),
(36, 'hire-delete', 'web', '2022-01-02 03:20:16', '2022-01-02 03:20:16'),
(37, 'file-manager', 'web', '2022-01-02 03:20:16', '2022-01-02 03:20:16'),
(38, 'websetting-edit', 'web', '2022-01-02 03:20:16', '2022-01-02 03:20:16'),
(39, 'user-activity', 'web', '2022-01-02 03:20:16', '2022-01-02 03:20:16'),
(40, 'log-view', 'web', '2022-01-02 03:20:16', '2022-01-02 03:20:16'),
(41, 'provider-menu', 'web', '2022-01-02 03:20:16', '2022-01-02 03:20:16'),
(42, 'customer-menu', 'web', '2022-01-02 03:20:16', '2022-01-02 03:20:16');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `email`, `service_name`, `rating`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Soumik Ahammed', 'soumik@gmail.com', 'AC basic service', 5, 'Wow, they are really awesome. Fast and timely done everything.', 1, NULL, NULL),
(2, 'MR Customer', 'customer@example.com', 'AC Uninstallation & Installation Service', 2, 'sss', 0, '2022-01-17 07:45:05', '2022-01-17 07:45:05');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `code`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'web', '2022-01-02 03:20:15', '2022-01-02 03:20:15'),
(2, 'Provider', 'SVP', 'web', '2022-01-02 03:20:16', '2022-01-02 03:20:16'),
(3, 'Customer', 'CST', 'web', '2022-01-02 03:20:16', '2022-01-02 03:20:16');

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
(41, 2),
(42, 3);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tagline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `discount_type` enum('fixed','percent') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `slug`, `tagline`, `service_category_id`, `price`, `discount`, `discount_type`, `image`, `thumbnail`, `description`, `featured`, `status`, `created_at`, `updated_at`) VALUES
(21, 'AC Basic Service', 'ac-basic-service', NULL, 1, '2000.00', '2.00', 'percent', 'http://servicematter.test/storage/services/ac.jpg', 'http://servicematter.test/storage/services/thumbnails/ac.jpg', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, 1, '2022-01-02 06:15:18', '2022-01-02 06:15:18'),
(22, 'AC Uninstallation & Installation Service', 'ac-uninstallation--installation-service', NULL, 1, '5000.00', NULL, NULL, 'http://servicematter.test/storage/services/ac2.jpg', 'http://servicematter.test/storage/services/thumbnails/ac2.jpg', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, 1, '2022-01-02 06:15:48', '2022-01-02 06:15:48'),
(23, 'Home cleaning Full', 'home-cleaning-full', NULL, 5, '500.00', NULL, NULL, 'http://servicematter.test/storage/services/room.jpg', 'http://servicematter.test/storage/services/thumbnails/room clean.jpg', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, 1, '2022-01-02 06:16:27', '2022-01-02 06:16:27'),
(24, 'Monitor or Tv Repair', 'monitor-or-tv-repair', NULL, 8, '1500.00', '100.00', 'fixed', 'http://servicematter.test/storage/services/monitor.jpg', 'http://servicematter.test/storage/services/thumbnails/monitor.jpg', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, 1, '2022-01-02 06:17:10', '2022-01-02 06:17:10');

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_categories`
--

INSERT INTO `service_categories` (`id`, `name`, `slug`, `image`, `featured`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AC', 'ac', 'http://servicematter.test/storage/categories/ac.png', 0, 1, NULL, '2022-01-02 05:21:58'),
(2, 'Beauty', 'beauty', 'http://servicematter.test/storage/categories/beauty.png', 1, 1, NULL, '2022-01-02 05:22:26'),
(4, 'Electrical', 'electrical', 'http://servicematter.test/storage/categories/electrical.png', 0, 1, NULL, '2022-01-02 05:21:17'),
(5, 'Home Cleaning', 'home-cleaning', 'http://servicematter.test/storage/categories/clean.png', 1, 1, NULL, '2022-01-02 05:22:32'),
(7, 'Computer Repair', 'computer-repair', 'http://servicematter.test/storage/categories/laptop.png', 0, 1, NULL, '2022-01-02 05:20:01'),
(8, 'TV', 'tv', 'http://servicematter.test/storage/categories/TV.png', 1, 1, NULL, '2022-01-02 05:22:06'),
(12, 'Refrigerator', 'refrigerator', 'http://servicematter.test/storage/categories/ref.png', 0, 1, NULL, '2022-01-02 05:19:13'),
(14, 'Painting', 'painting', 'http://servicematter.test/storage/categories/painting.png', 0, 1, NULL, '2022-01-02 05:19:02'),
(15, 'Home Automation', 'home-automation', 'http://servicematter.test/storage/categories/homeauto.png', 0, 1, NULL, '2022-01-02 05:18:55'),
(18, 'Movers & Packers', 'movers-packers', 'http://servicematter.test/storage/categories/movers.png', 1, 1, NULL, '2022-01-02 05:18:12'),
(19, 'Pest Control', 'pest-control', 'http://servicematter.test/storage/categories/pest.png', 0, 1, NULL, '2022-01-02 05:18:43');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_logo_dark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_logo_light` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_logo_small` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `website_title`, `website_logo_dark`, `website_logo_light`, `website_logo_small`, `website_favicon`, `meta_title`, `meta_description`, `meta_tag`, `currency_id`, `address`, `phone`, `email`, `facebook`, `twitter`, `linkedin`, `instagram`, `github`, `created_at`, `updated_at`) VALUES
(1, 'Service Matter', '', '', '', '', '', '', '', 1, 'Dhaka, Bangladesh', '+8801689201370', 'servicematter@example.com', 'https://www.facebook.com/soumik.ahammed.9/', 'www.twitter.com/soumik9', 'https://www.linkedin.com/in/soumik-ahammed-a41915171/', 'https://www.instagram.com/soumik.ahammed.9/', 'https://github.com/soumik9', '2022-01-02 03:20:16', '2022-01-02 03:20:16');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'A new slide', 'http://servicematter.test/storage/1.jpg', 1, '2022-01-02 05:06:39', '2022-01-02 05:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utype` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_start_time` time DEFAULT NULL,
  `work_end_time` time DEFAULT NULL,
  `per_hour_charge` double(8,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_service_category_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `nid`, `email_verified_at`, `password`, `mobile`, `image`, `utype`, `bio`, `address`, `work_start_time`, `work_end_time`, `per_hour_charge`, `status`, `remember_token`, `created_at`, `updated_at`, `user_service_category_id`) VALUES
(1, 'Soumik Ahammed', 'admin@example.com', '121220000', NULL, '$2y$10$OSlLoRlRSI3E4uk4bsso/euZ5510n/MVwOs2INVm13MDCXeuZgyuu', '01689201370', NULL, 'ADM', NULL, NULL, NULL, NULL, NULL, 1, 'bU6FnW87sfBASEBuYOUKl1Y0lDqGboaihCjZ5kJGmdt4taah1orEdUDhxKNH', '2022-01-02 03:20:16', '2022-01-04 04:49:28', NULL),
(2, 'MR Employee', 'employee@example.com', '1212212000', NULL, '$2y$10$3cMeESWG1gmXb19wg3XVCOwXFfZKFrKgUuZR3T10r62uBBQzbWPM2', '01822115588', 'http://servicematter.test/storage/allu-arjun-image-7.jpg', 'SVP', '<p>Quisque id mi. Praesent nonummy mi in odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed aliquam, nisi quis porttitor congue, elit erat euismod orci, ac placerat dolor lectus quis orci. Ut non enim eleifend felis pretium feugiat. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi.</p>', 'Rajshahi', '10:00:00', '22:00:00', 300.00, 1, 'uYJv1EUlUfkn57gFVpLl18ArvHRGmP8DXYleEP1v09WsJoD3gah3lJJfHpSt', '2022-01-02 03:20:16', '2022-01-03 08:35:38', 1),
(3, 'MR Customer', 'customer@example.com', '12122125800', NULL, '$2y$10$kPdiaZD.Stek2ZjTjMQR0eVa6jaoEkX7Hu7leAOTGdxux2JKs/mWG', '01822122556', NULL, 'CST', NULL, NULL, NULL, NULL, NULL, 1, 'vUgnElckCPzL5M423GgiHTlbYJkTvfUXk76qvybAS7GedJH0VJtL8X3FxwxX', '2022-01-02 03:20:16', '2022-01-02 03:20:16', NULL),
(4, 'Empolyee Duo', 'emduo@gmail.com', '200064160290000513', NULL, '$2y$10$ctFcy4osM569GZS3ovPTIOKs4L50cI2laa6BGYGVcSxAPo8LBMqiO', '017777777', 'http://servicematter.test/storage/Ferry-Vermeulen.jpeg', 'SVP', '<p>Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Nam adipiscing. Pellentesque commodo eros a enim. Fusce pharetra convallis urna.</p>', 'Dhaka', '09:30:00', '18:30:00', 250.00, 1, NULL, '2022-01-03 09:24:42', '2022-01-03 09:26:46', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acl_rules`
--
ALTER TABLE `acl_rules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acl_rules_user_id_foreign` (`user_id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `currencies_code_unique` (`code`),
  ADD UNIQUE KEY `currencies_symbol_unique` (`symbol`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hires`
--
ALTER TABLE `hires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hires_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_service_id_foreign` (`service_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_code_guard_name_unique` (`name`,`code`,`guard_name`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_service_category_id_foreign` (`service_category_id`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `settings_currency_id_foreign` (`currency_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_nid_unique` (`nid`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acl_rules`
--
ALTER TABLE `acl_rules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hires`
--
ALTER TABLE `hires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acl_rules`
--
ALTER TABLE `acl_rules`
  ADD CONSTRAINT `acl_rules_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `hires`
--
ALTER TABLE `hires`
  ADD CONSTRAINT `hires_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

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
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_service_category_id_foreign` FOREIGN KEY (`service_category_id`) REFERENCES `service_categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `settings_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
