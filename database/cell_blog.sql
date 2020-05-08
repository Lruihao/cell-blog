-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3307
-- 生成日期： 2020-05-08 09:05:19
-- 服务器版本： 10.3.14-MariaDB
-- PHP 版本： 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `cell_blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin_menu`
--

DROP TABLE IF EXISTS `admin_menu`;
CREATE TABLE IF NOT EXISTS `admin_menu` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `parent_id`, `order`, `title`, `icon`, `uri`, `permission`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Dashboard', 'fa-bar-chart', '/', NULL, NULL, NULL),
(2, 0, 2, 'Admin', 'fa-tasks', '', NULL, NULL, NULL),
(3, 2, 3, 'Users', 'fa-users', 'auth/users', NULL, NULL, NULL),
(4, 2, 4, 'Roles', 'fa-user', 'auth/roles', NULL, NULL, NULL),
(5, 2, 5, 'Permission', 'fa-ban', 'auth/permissions', NULL, NULL, NULL),
(6, 2, 6, 'Menu', 'fa-bars', 'auth/menu', NULL, NULL, NULL),
(7, 2, 7, 'Operation log', 'fa-history', 'auth/logs', NULL, NULL, NULL),
(8, 0, 8, 'Media manager', 'fa-file', 'media', NULL, '2020-05-08 09:03:55', '2020-05-08 09:03:55'),
(9, 0, 9, 'Article', 'fa-edit', '', NULL, NULL, NULL),
(10, 9, 10, 'Articles', 'fa-edit', '/articles', NULL, NULL, NULL),
(11, 9, 11, 'Categories', 'fa-th', '/categories', NULL, NULL, NULL),
(12, 9, 12, 'Tags', 'fa-tags', '/tags', NULL, NULL, NULL),
(13, 0, 13, 'Pages', 'fa-pagelines', '/pages', NULL, NULL, NULL),
(14, 0, 14, 'Navigations', 'fa-navicon', '/navigations', NULL, NULL, NULL),
(15, 0, 15, 'Mottoes', 'fa-book', '/mottoes', NULL, NULL, NULL),
(16, 0, 16, 'Links', 'fa-user-plus', '/links', NULL, NULL, NULL),
(17, 0, 17, 'Systems', 'fa-toggle-on', '/systems', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `admin_operation_log`
--

DROP TABLE IF EXISTS `admin_operation_log`;
CREATE TABLE IF NOT EXISTS `admin_operation_log` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_operation_log_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `admin_operation_log`
--

INSERT INTO `admin_operation_log` (`id`, `user_id`, `path`, `method`, `ip`, `input`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'GET', '127.0.0.1', '[]', '2020-05-08 09:03:21', '2020-05-08 09:03:21'),
(2, 1, 'admin', 'GET', '127.0.0.1', '[]', '2020-05-08 09:03:26', '2020-05-08 09:03:26'),
(3, 1, 'admin', 'GET', '127.0.0.1', '[]', '2020-05-08 09:04:42', '2020-05-08 09:04:42');

-- --------------------------------------------------------

--
-- 表的结构 `admin_permissions`
--

DROP TABLE IF EXISTS `admin_permissions`;
CREATE TABLE IF NOT EXISTS `admin_permissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `http_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_permissions_name_unique` (`name`),
  UNIQUE KEY `admin_permissions_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `admin_permissions`
--

INSERT INTO `admin_permissions` (`id`, `name`, `slug`, `http_method`, `http_path`, `created_at`, `updated_at`) VALUES
(1, 'All permission', '*', '', '*', NULL, NULL),
(2, 'Dashboard', 'dashboard', 'GET', '/', NULL, NULL),
(3, 'Login', 'auth.login', '', '/auth/login\r\n/auth/logout', NULL, NULL),
(4, 'User setting', 'auth.setting', 'GET,PUT', '/auth/setting', NULL, NULL),
(5, 'Auth management', 'auth.management', '', '/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs', NULL, NULL),
(6, 'Media manager', 'ext.media-manager', '', '/media*', '2020-05-08 09:03:55', '2020-05-08 09:03:55'),
(7, 'article', 'article', '', '/articles*', NULL, NULL),
(8, 'category', 'category', '', '/categories*', NULL, NULL),
(9, 'tag', 'tag', '', '/tags*', NULL, NULL),
(10, 'page', 'page', '', '/pages*', NULL, NULL),
(11, 'motto', 'motto', '', '/mottoes*', NULL, NULL),
(12, 'friendship-link', 'friendship link', '', '/links*', NULL, NULL),
(13, 'system', 'system config', '', '/systems*', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `admin_roles`
--

DROP TABLE IF EXISTS `admin_roles`;
CREATE TABLE IF NOT EXISTS `admin_roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_roles_name_unique` (`name`),
  UNIQUE KEY `admin_roles_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `admin_roles`
--

INSERT INTO `admin_roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'administrator', '2020-05-08 09:02:09', '2020-05-08 09:02:09');

-- --------------------------------------------------------

--
-- 表的结构 `admin_role_menu`
--

DROP TABLE IF EXISTS `admin_role_menu`;
CREATE TABLE IF NOT EXISTS `admin_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `admin_role_menu`
--

INSERT INTO `admin_role_menu` (`role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `admin_role_permissions`
--

DROP TABLE IF EXISTS `admin_role_permissions`;
CREATE TABLE IF NOT EXISTS `admin_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `admin_role_permissions`
--

INSERT INTO `admin_role_permissions` (`role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `admin_role_users`
--

DROP TABLE IF EXISTS `admin_role_users`;
CREATE TABLE IF NOT EXISTS `admin_role_users` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `admin_role_users`
--

INSERT INTO `admin_role_users` (`role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_username_unique` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `name`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$jbEOt2eBNsCJfv070/mdZODpJA4NdyukNp9.L9tzR7qMpuHtr6DW.', 'Administrator', NULL, NULL, '2020-05-08 09:02:09', '2020-05-08 09:02:09');

-- --------------------------------------------------------

--
-- 表的结构 `admin_user_permissions`
--

DROP TABLE IF EXISTS `admin_user_permissions`;
CREATE TABLE IF NOT EXISTS `admin_user_permissions` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '文章表主键',
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '标题',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '作者ID',
  `category_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '分类ID',
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '描述',
  `keywords` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '关键词',
  `sort` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '置顶排序',
  `comments` tinyint(1) NOT NULL DEFAULT 1 COMMENT '评论: 1打开 0关闭',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '状态: 1发布 0草稿',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '文章密码',
  `views` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '阅读数量',
  `markdown` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'markdown文章内容',
  `html` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'markdown转的html页面',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `article_tags`
--

DROP TABLE IF EXISTS `article_tags`;
CREATE TABLE IF NOT EXISTS `article_tags` (
  `article_id` int(10) UNSIGNED NOT NULL COMMENT '文章id',
  `tag_id` int(10) UNSIGNED NOT NULL COMMENT '标签id',
  KEY `article_tags_article_id_index` (`article_id`),
  KEY `article_tags_tag_id_index` (`tag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '分类主键',
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '分类名称',
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '描述',
  `keywords` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '关键词',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `friendship_links`
--

DROP TABLE IF EXISTS `friendship_links`;
CREATE TABLE IF NOT EXISTS `friendship_links` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '友链主键',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '链接名',
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '链接地址',
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '头像地址',
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '友链描述',
  `sort` tinyint(4) NOT NULL DEFAULT 0 COMMENT '排序',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '状态: 1启用 0关闭',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2016_01_04_173148_create_admin_tables', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_04_17_120903_create_articles_table', 1),
(4, '2020_04_17_121103_create_tags_table', 1),
(5, '2020_04_17_121112_create_categories_table', 1),
(6, '2020_04_17_154157_create_article_tags_table', 1),
(7, '2020_04_24_144638_create_navigations_table', 1),
(8, '2020_04_24_154338_create_friendship_links_table', 1),
(9, '2020_04_24_160607_create_pages_table', 1),
(10, '2020_04_24_165142_create_systems_table', 1),
(11, '2020_05_06_222451_create_mottoes_table', 1);

-- --------------------------------------------------------

--
-- 表的结构 `mottoes`
--

DROP TABLE IF EXISTS `mottoes`;
CREATE TABLE IF NOT EXISTS `mottoes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '格言主键',
  `motto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '格言',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `navigations`
--

DROP TABLE IF EXISTS `navigations`;
CREATE TABLE IF NOT EXISTS `navigations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '导航主键',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '导航名',
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '链接',
  `icon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'globe' COMMENT '图标',
  `target` tinyint(1) NOT NULL DEFAULT 0 COMMENT '打开方式: 1外部 0内部',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '状态: 1显示 0隐藏',
  `sort` tinyint(4) NOT NULL DEFAULT 0 COMMENT '排序',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '页面主键',
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '页面标题',
  `link_alias` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '链接别名',
  `keywords` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '关键词',
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '描述',
  `comments` tinyint(1) NOT NULL DEFAULT 1 COMMENT '评论: 1打开 0关闭',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '状态: 1发布 0草稿',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '页面密码',
  `markdown` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'markdown页面内容',
  `html` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'markdown转的html页面',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_link_alias_unique` (`link_alias`),
  KEY `pages_link_alias_index` (`link_alias`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `systems`
--

DROP TABLE IF EXISTS `systems`;
CREATE TABLE IF NOT EXISTS `systems` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '设置主键',
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '设置名称',
  `system_key` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '设置项',
  `system_value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '设置值',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '状态: 1启用 0关闭',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `systems_system_key_unique` (`system_key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '标签主键',
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '标签名称',
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '描述',
  `keywords` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '关键词',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags_name_unique` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
