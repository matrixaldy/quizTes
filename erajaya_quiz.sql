-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Bulan Mei 2023 pada 08.04
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erajaya_quiz`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(20, '2014_10_11_000000_create_roles_table', 1),
(21, '2014_10_12_000000_create_users_table', 1),
(22, '2014_10_12_100000_create_password_resets_table', 1),
(23, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(24, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(25, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(26, '2016_06_01_000004_create_oauth_clients_table', 1),
(27, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(28, '2019_08_19_000000_create_failed_jobs_table', 1),
(29, '2023_05_12_135559_create_settings_table', 1),
(30, '2023_05_12_135735_create_questions_table', 1),
(31, '2023_05_12_135801_create_question_answer_choices_table', 1),
(32, '2023_05_12_135811_create_question_answers_table', 1),
(33, '2023_05_12_140235_create_user_question_answers_table', 1),
(34, '2023_05_13_174545_create_user_quiz_details_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0a5f49b0ea7334a4af6d45636a6c6c3cd72ffd826f2b4e5664b3f2726afc4898cf06c870d1461fc6', 2, 8, 'Personal Access Token', '[]', 0, '2023-05-13 10:20:40', '2023-05-13 10:20:40', '2024-05-13 17:20:40'),
('12de2296690ebd8556ecae3391a95a6e809e6693b6b2d55d5e20dbe13f741b0cc468709ffcd7e930', 1, 8, 'Personal Access Token', '[]', 0, '2023-05-13 21:13:50', '2023-05-13 21:13:50', '2024-05-14 04:13:50'),
('1deccc623630d72fd6722b283546c9907ce59d8c34bc6cc10828b3df0bb75b9d0212377fa4033877', 1, 8, 'Personal Access Token', '[]', 0, '2023-05-13 21:13:43', '2023-05-13 21:13:43', '2024-05-14 04:13:43'),
('237e362bfe764163edf8a292e7bf2a65488a1ba665f1430b4e3fe64b6fa25f8f6216726d1f609a48', 2, 8, 'Personal Access Token', '[]', 0, '2023-05-13 00:34:46', '2023-05-13 00:34:46', '2024-05-13 07:34:46'),
('23f1c78200273646810d2cb38d8155a3e92040283bc1871d4655f1bd250187b8aabafb5437afc0e7', 2, 8, 'Personal Access Token', '[]', 0, '2023-05-13 19:58:10', '2023-05-13 19:58:10', '2024-05-14 02:58:10'),
('31110d34ff2125806f0da3f0ecf3849fe0d9e0a13a6e439f48afa47fad77f991860f76e638266561', 2, 8, 'Personal Access Token', '[]', 0, '2023-05-13 00:36:59', '2023-05-13 00:36:59', '2024-05-13 07:36:59'),
('3aafccbd7a17c2265a7cdf5b81d0e6bcd5f2c5b1c34f4faecfd92befeabf4e99486d4a795456abcb', 1, 8, 'Personal Access Token', '[]', 0, '2023-05-13 00:38:57', '2023-05-13 00:38:57', '2024-05-13 07:38:57'),
('411b641f4c7de256effa0d56af82f06f350975fa6e94845c3e020b4701e4127037e09a031f0e210c', 1, 8, 'Personal Access Token', '[]', 0, '2023-05-13 10:08:16', '2023-05-13 10:08:16', '2024-05-13 17:08:16'),
('430a37cf4b0e52d729b99f330d2e8fc6f4dd33f110f0ef21d66b30ba3dd519d5d44ed9f15356aa1d', 1, 8, 'Personal Access Token', '[]', 0, '2023-05-13 10:06:26', '2023-05-13 10:06:26', '2024-05-13 17:06:26'),
('4b068ce40b009eddd62cfa8b04da2a619aca7403e9f84a48f1aacd4be37806fc2215e3963c1b4ea0', 1, 8, 'Personal Access Token', '[]', 0, '2023-05-13 10:06:01', '2023-05-13 10:06:01', '2024-05-13 17:06:01'),
('506b2672adee48f204b4fa91d0643032e003493f69042501d3ebe3ac653b2a50a19c3f34ccc1b304', 2, 8, 'Personal Access Token', '[]', 0, '2023-05-13 19:21:49', '2023-05-13 19:21:49', '2024-05-14 02:21:49'),
('51040e112bc544181e67b9151ebb2d98d4fcadfca74ade5ecd582e4451ec2cd81c5c8dd8a31a84d5', 1, 8, 'Personal Access Token', '[]', 0, '2023-05-13 10:04:42', '2023-05-13 10:04:42', '2024-05-13 17:04:42'),
('5442b0d7ad8115d4ae0728808a42a32a13b3c3370a84905565796aab82468ec856aec4eb39064500', 1, 8, 'Personal Access Token', '[]', 0, '2023-05-13 19:25:09', '2023-05-13 19:25:09', '2024-05-14 02:25:09'),
('555422dac1385b9dfa5aef1dba77834938c0b5620c88731e754ed6b5bb1d28ed71d38d76f18c4632', 1, 8, 'Personal Access Token', '[]', 0, '2023-05-13 10:01:10', '2023-05-13 10:01:10', '2024-05-13 17:01:10'),
('597f5918322d983ca9b6d87fa91428fc93c509ab69c508db9728d1b0aef15415cd4234c2b0a4e131', 2, 8, 'Personal Access Token', '[]', 0, '2023-05-13 10:14:54', '2023-05-13 10:14:54', '2024-05-13 17:14:54'),
('5cd75985730afff976364a1e6fc2ace487667bb10929947bccd5a03b8d764fd246f881b1ee73640f', 1, 8, 'Personal Access Token', '[]', 0, '2023-05-13 10:08:31', '2023-05-13 10:08:31', '2024-05-13 17:08:31'),
('64a96da6d92d31ccc3926cb165f6085ca7f275cc0477d0056a5294347ef3e8ef3ee30b0145b649a7', 1, 8, 'Personal Access Token', '[]', 0, '2023-05-13 10:06:17', '2023-05-13 10:06:17', '2024-05-13 17:06:17'),
('71a226a73e6afe273b6291ad465eb5858f881a27777b4f2fb6f3cf538ae816c66681e4ffca3336e3', 2, 8, 'Personal Access Token', '[]', 0, '2023-05-13 10:14:29', '2023-05-13 10:14:29', '2024-05-13 17:14:29'),
('731030e17f0501c6799f4ebb5935a7b479f0a53fb65e6176bd9bc565554b0bbf47c1253bd231865f', 2, 4, 'nApp', '[]', 0, '2023-05-13 00:31:25', '2023-05-13 00:31:25', '2024-05-13 07:31:25'),
('77c56e34191d22f0230939a54ae76532bfb302a674380ee2d131e206a5d7efc8be16808391295c80', 1, 8, 'Personal Access Token', '[]', 0, '2023-05-13 10:03:34', '2023-05-13 10:03:34', '2024-05-13 17:03:34'),
('7bfd5d84cd619c67509bae042691c2d155f5cef3c6a1e3a19363d603b854ae97820acea56a69e282', 2, 8, 'nApp', '[]', 0, '2023-05-13 00:33:10', '2023-05-13 00:33:10', '2024-05-13 07:33:10'),
('80e6ff1c56079bab295390e7453bbee928bf99142551c0b8b99d7fb9c9ee1269799ad02e51e72dde', 2, 8, 'nApp', '[]', 0, '2023-05-13 00:36:28', '2023-05-13 00:36:28', '2024-05-13 07:36:28'),
('88cb6c113f92ecd016ffb57d6d7c076df0f881031c597aeaf4d6a27829dd1d27b7efa715c00bc3ad', 1, 8, 'Personal Access Token', '[]', 0, '2023-05-13 10:04:14', '2023-05-13 10:04:14', '2024-05-13 17:04:14'),
('91f909c778299ad7390064b948e23a6c94d53607d6f209e919c18c16786e8d9da3574e350332f1b0', 2, 8, 'Personal Access Token', '[]', 0, '2023-05-13 19:57:55', '2023-05-13 19:57:55', '2024-05-14 02:57:55'),
('954e229f98305b3bfd921abcb239fead2133ff2ec215c9565b2bb2939cf0d75bebcdc0e9612280a3', 1, 8, 'Personal Access Token', '[]', 0, '2023-05-13 19:26:33', '2023-05-13 19:26:33', '2024-05-14 02:26:33'),
('987bab109047afbed20f870487bcc0b03c1ad59cec35b6433573d58e32707ea968153bc577204592', 1, 8, 'Personal Access Token', '[]', 0, '2023-05-13 10:00:55', '2023-05-13 10:00:55', '2024-05-13 17:00:55'),
('9c53b3c76c2061bebfb4c64812e43fdb03d7f41a6c00a0a2c7a6ce541319ea3a353f060d3052ea16', 2, 8, 'Personal Access Token', '[]', 0, '2023-05-13 10:17:08', '2023-05-13 10:17:08', '2024-05-13 17:17:08'),
('9c8581ab1ce7d94dfd1e6c8eba90afcee16a83bc179526dc8473fce8569e014202e294c2cd012da8', 2, 8, 'Personal Access Token', '[]', 0, '2023-05-13 21:32:06', '2023-05-13 21:32:06', '2024-05-14 04:32:06'),
('a983d62d84516ce253859140b5f4da1e775d39b49078df3f65d25d9163a80f1ab139cd65c1b1e7e3', 1, 8, 'Personal Access Token', '[]', 0, '2023-05-13 21:34:25', '2023-05-13 21:34:25', '2024-05-14 04:34:25'),
('b7dc8835fb9dd53da77907a196fd1fd6369d339c9c9918d4209450e499750268041b9595a2e8fb05', 2, 8, 'Personal Access Token', '[]', 0, '2023-05-13 21:14:07', '2023-05-13 21:14:07', '2024-05-14 04:14:07'),
('ba58be4bbd6a94021280d7c5239e6ecd7486111a70ecf998d11489af32b1610668178665b56bd343', 2, 8, 'Personal Access Token', '[]', 0, '2023-05-13 19:16:29', '2023-05-13 19:16:29', '2024-05-14 02:16:29'),
('bd77d79e2f311ea552a56427971f493349a8c81b3bad35f01e6cd006b5f87293cfafd0e04666534e', 1, 8, 'Personal Access Token', '[]', 0, '2023-05-13 21:14:37', '2023-05-13 21:14:37', '2024-05-14 04:14:37'),
('ca6732072278edf0cb8880f5d863d07b673aacb9a169fee0fb9c1d1ac60c35cfa966fc298373dd3a', 2, 8, 'Personal Access Token', '[]', 0, '2023-05-13 21:05:01', '2023-05-13 21:05:01', '2024-05-14 04:05:01'),
('cc86accda2f7593f14ad5697942a67f35f685f1ac33af9d9b99a64b997823d68b1e385d663fff397', 2, 8, 'Personal Access Token', '[]', 0, '2023-05-13 10:14:24', '2023-05-13 10:14:24', '2024-05-13 17:14:24'),
('cea5eceffce591d607d4be86cc72f79ecf0575ba75884fbe27cc640bf05af685fdc5407d4108a353', 2, 8, 'Personal Access Token', '[]', 0, '2023-05-13 10:17:35', '2023-05-13 10:17:35', '2024-05-13 17:17:35'),
('d10c6d185c830d8fc67ee0182fc27f874cb07689181f94cacd2ab6b8bc7b87b2d0d6f34874a27019', 2, 8, 'Personal Access Token', '[]', 0, '2023-05-13 10:12:21', '2023-05-13 10:12:21', '2024-05-13 17:12:21'),
('e6b1c2d40d6916318115669d0755268bc848fa9187b098005f22d89a25efd1ec05ab5260ec905801', 1, 8, 'Personal Access Token', '[]', 0, '2023-05-13 10:06:42', '2023-05-13 10:06:42', '2024-05-13 17:06:42'),
('e9e37cf65f80091dbaaa8881ef8f5972e54f55983b720a90bf81c21b67f0fa82f8f0a78f9d382f75', 2, 8, 'Personal Access Token', '[]', 0, '2023-05-13 19:24:05', '2023-05-13 19:24:05', '2024-05-14 02:24:05'),
('ead3fdb44bdc26ec5f53e678d931a403afb7f44acb176dec3642abaf52a989b92d559ea9d4417ce7', 2, 8, 'nApp', '[]', 0, '2023-05-13 00:36:19', '2023-05-13 00:36:19', '2024-05-13 07:36:19'),
('eb32b3d35edc180d799a16cf892d18cc249318c04ebbde8f73d1ca50d5b560c638ad031fa5aa8dce', 2, 8, 'Personal Access Token', '[]', 0, '2023-05-13 10:41:09', '2023-05-13 10:41:09', '2024-05-13 17:41:09'),
('f337df0a2688bccbab1257709f0eea125f73668be27e741e0a89439cb83d42aeba6a7d104aabeaa2', 2, 8, 'Personal Access Token', '[]', 0, '2023-05-13 19:26:41', '2023-05-13 19:26:41', '2024-05-14 02:26:41'),
('f8c376beaadbd8bd89623fd9a9afb4381adfe4365f5aa5177313b11b6407821e220a26afbb9edefd', 1, 8, 'Personal Access Token', '[]', 0, '2023-05-13 10:04:50', '2023-05-13 10:04:50', '2024-05-13 17:04:50'),
('fc3f011652eddbc970393f1d07c695001f937de5a65ddc0d41565cdea5e741b99921df735616bd96', 2, 8, 'Personal Access Token', '[]', 0, '2023-05-13 10:13:09', '2023-05-13 10:13:09', '2024-05-13 17:13:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(8, NULL, 'Laravel Personal Access Client', 'd7v7QsQQTzyrh9X2elsV5Ln62rTCut5xckxxvq9R', NULL, 'http://localhost', 1, 0, 0, '2023-05-13 00:32:53', '2023-05-13 00:32:53'),
(9, NULL, 'Laravel Password Grant Client', 'JnXf7L6ZKSRUr8emXf5xEUxqixQ76qsLNgVywfZK', 'users', 'http://localhost', 0, 1, 0, '2023-05-13 00:32:53', '2023-05-13 00:32:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(2, 4, '2023-05-13 00:31:12', '2023-05-13 00:31:12'),
(3, 6, '2023-05-13 00:32:32', '2023-05-13 00:32:32'),
(4, 8, '2023-05-13 00:32:53', '2023-05-13 00:32:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `question_answers`
--

CREATE TABLE `question_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `choice_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `question_answer_choices`
--

CREATE TABLE `question_answer_choices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2023-05-12 20:02:19', '2023-05-12 20:02:19'),
(2, 'User', '2023-05-12 20:02:19', '2023-05-12 20:02:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_time` int(11) NOT NULL DEFAULT 0,
  `max_score` float DEFAULT 100,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `quiz_time`, `max_score`, `created_at`, `updated_at`) VALUES
(1, 15, 100, NULL, '2023-05-13 21:31:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'superadmin@admin.com', NULL, '$2y$10$D26qh67NkDQQczogghClbOtza.d1zIAfGSXAKS2.6pOaNzdpeYhCK', 1, NULL, '2023-05-12 20:02:24', '2023-05-12 20:02:24'),
(2, 'User 1', 'user@user.com', NULL, '$2y$10$D26qh67NkDQQczogghClbOtza.d1zIAfGSXAKS2.6pOaNzdpeYhCK', 2, NULL, '2023-05-12 20:32:12', '2023-05-12 20:32:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_question_answers`
--

CREATE TABLE `user_question_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `choice_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_quiz_details`
--

CREATE TABLE `user_quiz_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `max_time` int(11) NOT NULL DEFAULT 0,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `question_answers`
--
ALTER TABLE `question_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_answers_question_id_foreign` (`question_id`),
  ADD KEY `question_answers_choice_id_foreign` (`choice_id`);

--
-- Indeks untuk tabel `question_answer_choices`
--
ALTER TABLE `question_answer_choices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_answer_choices_question_id_foreign` (`question_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `user_question_answers`
--
ALTER TABLE `user_question_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_question_answers_user_id_foreign` (`user_id`),
  ADD KEY `user_question_answers_question_id_foreign` (`question_id`),
  ADD KEY `user_question_answers_choice_id_foreign` (`choice_id`);

--
-- Indeks untuk tabel `user_quiz_details`
--
ALTER TABLE `user_quiz_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_quiz_details_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `question_answers`
--
ALTER TABLE `question_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `question_answer_choices`
--
ALTER TABLE `question_answer_choices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_question_answers`
--
ALTER TABLE `user_question_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user_quiz_details`
--
ALTER TABLE `user_quiz_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `question_answers`
--
ALTER TABLE `question_answers`
  ADD CONSTRAINT `question_answers_choice_id_foreign` FOREIGN KEY (`choice_id`) REFERENCES `question_answer_choices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `question_answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `question_answer_choices`
--
ALTER TABLE `question_answer_choices`
  ADD CONSTRAINT `question_answer_choices_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_question_answers`
--
ALTER TABLE `user_question_answers`
  ADD CONSTRAINT `user_question_answers_choice_id_foreign` FOREIGN KEY (`choice_id`) REFERENCES `question_answer_choices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_question_answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_question_answers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_quiz_details`
--
ALTER TABLE `user_quiz_details`
  ADD CONSTRAINT `user_quiz_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
