-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 26, 2017 at 04:21 AM
-- Server version: 5.7.13-log
-- PHP Version: 5.6.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mudb`
--

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `reseller_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`id`, `reseller_id`, `name`, `site_name`, `menus`, `theme`, `description`, `logo`, `created_at`, `updated_at`) VALUES
(1, 5, '21th century fox', 'The site for 21th century fox agency', '["9", "10", "11", "12"]', 'yellow', NULL, 'upload/agency/logos/1.jpg', '2017-01-31 05:29:06', '2017-01-31 05:29:06'),
(2, 5, 'Dream Factory', 'The site for dream factory', '["9", "11", "12"]', 'green', 'This is the site for dream factory', 'upload/agency/logos/2.jpg', '2017-02-01 00:24:19', '2017-02-01 00:24:20'),
(3, 5, 'Disney', 'Disney website', '["9", "11"]', 'yellow', 'Disney website for Children', 'upload/agency/logos/3.jpg', '2017-02-02 01:51:52', '2017-02-02 01:51:52');

-- --------------------------------------------------------

--
-- Table structure for table `agency_users`
--

CREATE TABLE `agency_users` (
  `agency_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agency_users`
--

INSERT INTO `agency_users` (`agency_id`, `user_id`) VALUES
(1, 5),
(2, 5),
(3, 5),
(1, 6),
(2, 6),
(2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_able` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `permission_id`, `name`, `uri`, `display_name`, `description`, `icon`, `cat`, `is_able`, `sort`, `created_at`, `updated_at`) VALUES
(1, 1, 'add_user', 'adduser', 'Add User', 'Add New Users', NULL, 'back_text', 1, 0, '2017-01-30 05:48:10', '2017-01-30 05:48:10'),
(2, 2, 'add-role', 'addrole', 'Add Role', NULL, NULL, 'back_text', 1, 0, '2017-01-30 05:49:11', '2017-01-30 05:49:11'),
(3, 3, 'add_permission', 'addpermission', 'Add Permission', NULL, NULL, 'back_text', 1, 0, '2017-01-30 05:50:04', '2017-01-30 05:50:04'),
(5, 6, 'add_menu', 'addmenu', 'Add Menu', NULL, NULL, 'back_text', 1, 0, '2017-01-30 05:51:23', '2017-01-30 05:51:23'),
(6, 7, 'list_users', 'userlist', 'List Users', NULL, NULL, 'back_text', 1, 0, '2017-01-30 05:55:02', '2017-01-30 05:55:02'),
(7, 8, 'list_roles', 'rolelist', 'List Roles', NULL, NULL, 'back_text', 1, 0, '2017-01-30 05:55:34', '2017-01-30 05:55:34'),
(8, 13, 'add_agency', 'addagency', 'Add Agency', NULL, NULL, 'back_text', 1, 0, '2017-01-30 05:58:11', '2017-01-30 05:58:11'),
(9, 5, 'about', 'about', 'About', NULL, NULL, 'front_text', 1, 0, '2017-01-30 06:12:05', '2017-01-30 06:12:05'),
(10, 5, 'vmmc-media', 'vmmcmedia', 'VMMC Media', NULL, NULL, 'front_text', 1, 0, '2017-01-30 06:13:05', '2017-01-30 06:13:05'),
(11, 5, 'pairing-app', 'pairing-app', 'Pairing APP', NULL, NULL, 'front_text', 1, 0, '2017-01-30 06:13:38', '2017-01-30 06:13:38'),
(12, 5, 'lcd-control', 'lcd-control', 'LCD Control', NULL, NULL, 'front_text', 1, 0, '2017-01-30 06:14:16', '2017-01-30 06:14:16'),
(13, 14, 'list-agency', 'agencylist', 'Agency List', NULL, NULL, 'back_text', 1, 0, '2017-01-31 08:22:01', '2017-01-31 08:22:01'),
(14, 5, 'home', 'home', 'Home', NULL, NULL, 'back_text', 1, 0, '2017-02-02 02:01:51', '2017-02-02 02:01:51');

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
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2017_01_28_025543_roles_setup_tables', 2),
(12, '2017_01_30_034725_create_menus_table', 5),
(13, '2017_01_30_122105_create_agencies_table', 6),
(14, '2017_02_02_031042_create_table_agency_users', 7),
(15, '2017_02_04_083748_create_pairing_app_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `pairing_app`
--

CREATE TABLE `pairing_app` (
  `id` int(10) UNSIGNED NOT NULL,
  `agency_id` int(10) UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mac_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_zone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'add-user', 'Add User', '$2y$10$FHuXMWzVDtNvOzhl52fv2ex0kQFtwYgRJ2S1lql5BocL3HjfSdzRO', '2017-01-28 20:18:00', '2017-01-28 20:18:00'),
(2, 'add-role', 'Add Role', '$2y$10$xs6Sk9f/bOzlYklamkXv/O9oa4KCJB27P5.RO32ulqsTqmjApPULW', '2017-01-28 20:18:17', '2017-01-28 20:18:17'),
(3, 'add-permission', 'Add Permission', '$2y$10$49ocp3CtcPWHm1YBMbEjLeOylMvzNptPbYrP3qXwPdt046/St4qJa', '2017-01-28 20:18:37', '2017-01-28 20:18:37'),
(4, 'set-permission', 'Set Permission', 'set permission for role', '2017-01-29 06:48:41', '2017-01-29 06:48:41'),
(5, 'everyone-can', 'Everyone Can', 'Everyone Can access it', '2017-01-29 07:14:17', '2017-01-29 07:14:17'),
(6, 'add-menu', 'Add Menu', 'Add new menu for this website', '2017-01-29 18:28:13', '2017-01-29 18:28:13'),
(7, 'list-users', 'List Users', 'List all the users', '2017-01-29 23:12:07', '2017-01-29 23:12:07'),
(8, 'list-roles', 'List Roles', 'List all the roles that are available', '2017-01-29 23:16:06', '2017-01-29 23:16:06'),
(13, 'add-agency', 'Add Agency', '', '2017-01-30 05:57:01', '2017-01-30 05:57:01'),
(14, 'list-agency', 'List Agency', '', '2017-01-31 08:20:48', '2017-01-31 08:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(1, 2),
(5, 2),
(7, 2),
(5, 3),
(13, 3),
(14, 3),
(5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'project_owner', 'Project Owner', '$2y$10$nocqHSc0/QDT6bz9182IUu65muPKZWXZiPByxyEI.O2PLvHksmJfm', '2017-01-28 19:52:38', '2017-01-28 19:52:38'),
(2, 'admin', 'Administrator', '$2y$10$iokgemueC2ho8/BP.8iGUe/0dVmhTtFVdrTas/lFw9PXzJY83rjQ6', '2017-01-28 19:52:55', '2017-01-28 19:52:55'),
(3, 'reseller', 'Reseller', '$2y$10$eySrl2adgoCfvuE54tYnbuczfq7.oDYPMep.sWoHCqcX9n7PKEXIG', '2017-01-28 19:53:10', '2017-01-28 19:53:10'),
(4, 'end_user', 'End User', '$2y$10$tmbwhY89Ve3JVPysl4j3be2fEVHnN3AruK4mzBO0KjWPPyfhTOKAm', '2017-01-28 19:53:29', '2017-01-28 19:53:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 1, 'James', 'abc@123.com', '$2y$10$pk84XzZ00gs6l92aQO.D8O34WkiPcTDmg41YgCQIT1rSwGrN2Wdty', 'iXctfJ6bfJT1Xr6KDViOS4tHrpYcTXDtkdeDJal03D3J5Z89JUkZKpfuScYS', '2017-01-28 19:54:57', '2017-01-28 19:54:57'),
(4, 2, 'zhang', 'zhang@123.com', '$2y$10$I7wg2rQ7a5FzlCs3hh3itOEkNdRcJqi1tIkW6vzhLk0YpQxp2MY66', 'dMFnZYjJx9y3xesKYfI6hSZj3CJojSxvVTzSsA0RyDiRVSDURde7drJa35R7', '2017-01-28 21:18:42', '2017-01-28 21:18:42'),
(5, 3, 'Liu', 'liu@123.com', '$2y$10$7Um1ctmNEbDYF.T.UKu0leQ9D3onXf.UvXbNJd3KOe599GDZSVi8u', 'Z3oSihEzfDrgvYGUJKQmBQBQtUNgC2ZfHink0YSQfheiHTJBdijyTvIIH3hF', '2017-01-28 21:19:05', '2017-01-28 21:19:05'),
(6, 4, 'Li', 'li@123.com', '$2y$10$Jq79hPKf75PYhSnNBsbQ1u2/COE3fOiQgCN3veqJUxFuJb1sWMBGm', 'YnngYp59fi5gdrI6GuUPIdupDV3oDSJFbDVvIFU9egCel8kfB72BEvxSbJ6f', '2017-01-29 06:42:07', '2017-01-29 06:42:07'),
(7, 4, 'James Lea', 'enduser1@123.com', '$2y$10$lV45m6cf2ln0eV9mw58L0.WJCG.4J9uaJASsgdAX5jmNxXVldUrXy', NULL, '2017-02-01 18:43:39', '2017-02-01 18:43:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agencies_reseller_id_foreign` (`reseller_id`);

--
-- Indexes for table `agency_users`
--
ALTER TABLE `agency_users`
  ADD PRIMARY KEY (`agency_id`,`user_id`),
  ADD KEY `agency_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`),
  ADD UNIQUE KEY `menus_uri_unique` (`uri`),
  ADD KEY `menus_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pairing_app`
--
ALTER TABLE `pairing_app`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pairing_app_agency_id_foreign` (`agency_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pairing_app`
--
ALTER TABLE `pairing_app`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `agencies`
--
ALTER TABLE `agencies`
  ADD CONSTRAINT `agencies_reseller_id_foreign` FOREIGN KEY (`reseller_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `agency_users`
--
ALTER TABLE `agency_users`
  ADD CONSTRAINT `agency_users_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agency_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pairing_app`
--
ALTER TABLE `pairing_app`
  ADD CONSTRAINT `pairing_app_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
