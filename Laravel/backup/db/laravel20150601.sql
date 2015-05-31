/*
Navicat MySQL Data Transfer

Source Server         : 本机MySQL数据库
Source Server Version : 50525
Source Host           : localhost:3306
Source Database       : laravel

Target Server Type    : MYSQL
Target Server Version : 50525
File Encoding         : 65001

Date: 2015-06-01 00:25:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `articles`
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES ('1', '第一篇文章的标题0000', null, '文章内容文章内容文章内容文章内容00000', null, '1', '2015-05-21 13:35:21', '2015-05-21 13:57:45');
INSERT INTO `articles` VALUES ('4', '第二篇来了', null, '第二篇来了第二篇来了第二篇来了', null, '1', '2015-05-22 02:09:04', '2015-05-22 02:09:04');

-- ----------------------------
-- Table structure for `cities`
-- ----------------------------
DROP TABLE IF EXISTS `cities`;
CREATE TABLE `cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cities
-- ----------------------------
INSERT INTO `cities` VALUES ('1', '1', '北京市', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `cities` VALUES ('2', '1', '湖南省', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `comments`
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `page_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES ('4', '小萝莉', 'liweijsj@163.com', null, '不错哦，顶一个来。', '74', '0', '2015-05-31 11:48:25', '2015-05-31 11:48:25');
INSERT INTO `comments` VALUES ('5', '李威', 'liwei@vriworks.com', null, '一直关注，从未放弃，不错的博文，无理由不点赞。', '74', '0', '2015-05-31 11:49:23', '2015-05-31 11:49:23');

-- ----------------------------
-- Table structure for `counties`
-- ----------------------------
DROP TABLE IF EXISTS `counties`;
CREATE TABLE `counties` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of counties
-- ----------------------------
INSERT INTO `counties` VALUES ('1', '2', '长沙市', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `counties` VALUES ('2', '2', '娄底市', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `counties` VALUES ('3', '2', '涟源市', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `counties` VALUES ('4', '2', '常德市', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `countries`
-- ----------------------------
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of countries
-- ----------------------------
INSERT INTO `countries` VALUES ('1', '中国', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2015_05_20_074234_create_articles_table', '1');
INSERT INTO `migrations` VALUES ('2015_05_20_074256_create_pages_table', '1');
INSERT INTO `migrations` VALUES ('2015_05_21_015437_create_comments_table', '1');
INSERT INTO `migrations` VALUES ('2015_05_31_102446_create_phones_table', '2');
INSERT INTO `migrations` VALUES ('2015_05_31_121956_create_roles_table', '3');
INSERT INTO `migrations` VALUES ('2015_05_31_122244_create_user__roles_table', '3');
INSERT INTO `migrations` VALUES ('2015_05_31_122244_create_user_roles_table', '4');
INSERT INTO `migrations` VALUES ('2015_05_31_143407_create_countries_table', '5');
INSERT INTO `migrations` VALUES ('2015_05_31_143428_create_cities_table', '5');
INSERT INTO `migrations` VALUES ('2015_05_31_143506_create_counties_table', '5');
INSERT INTO `migrations` VALUES ('2015_05_31_152232_create_photos_table', '6');
INSERT INTO `migrations` VALUES ('2015_05_31_152257_create_staff_table', '6');
INSERT INTO `migrations` VALUES ('2015_05_31_152307_create_orders_table', '6');

-- ----------------------------
-- Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', '10', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES ('2', '23', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES ('3', '33', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES ('4', '54', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `orders` VALUES ('5', '44', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `pages`
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of pages
-- ----------------------------
INSERT INTO `pages` VALUES ('75', 'spark储存新的模型数据（使用save方法）-我是标题', null, '储存新的模型数据（使用save方法）-我是内容', '0', '2015-05-30 04:05:50', '2015-05-30 04:24:53', '2015-05-30 15:04:56');
INSERT INTO `pages` VALUES ('69', 'Spark储存新的模型数据（使用save方法）-我是标题', null, '速度太慢，我想屎啊。', '0', '2015-05-30 04:05:48', '2015-05-30 05:53:33', '2015-05-30 15:05:09');
INSERT INTO `pages` VALUES ('70', '储存新的模型数据（使用save方法）-我是标题', null, '储存新的模型数据（使用save方法）-我是内容', '0', '2015-05-30 04:05:49', '2015-05-30 04:26:28', '2015-05-30 04:26:28');
INSERT INTO `pages` VALUES ('72', '储存新的模型数据（使用save方法）-我是标题', null, '速度太慢，我想屎啊。', '0', '2015-05-30 04:05:49', '2015-05-30 04:05:49', '2015-05-30 13:56:23');
INSERT INTO `pages` VALUES ('73', 'Spark储存新的模型数据（使用save方法）-我是标题', null, '储存新的模型数据（使用save方法）-我是内容', '0', '2015-05-30 04:05:50', '2015-05-30 04:05:50', '2015-05-30 15:05:47');
INSERT INTO `pages` VALUES ('74', 'spark储存新的模型数据（使用save方法）-我是标题', null, '储存新的模型数据（使用save方法）-我是内容', '0', '2015-05-30 04:05:50', '2015-05-30 04:05:50', null);

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `phones`
-- ----------------------------
DROP TABLE IF EXISTS `phones`;
CREATE TABLE `phones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `phonenum` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remaining_tel_charge` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of phones
-- ----------------------------
INSERT INTO `phones` VALUES ('1', '1', '18973832617', '电信', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `photos`
-- ----------------------------
DROP TABLE IF EXISTS `photos`;
CREATE TABLE `photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imageable_id` int(11) NOT NULL,
  `imageable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of photos
-- ----------------------------
INSERT INTO `photos` VALUES ('1', '\\images\\staff\\1', '1', 'Staff', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `photos` VALUES ('2', '\\images\\order\\1', '1', 'Order', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `photos` VALUES ('3', '\\images\\staff\\2', '2', 'Staff', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `photos` VALUES ('4', '\\images\\order\\3', '3', 'Order', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `photos` VALUES ('5', '\\images\\order\\4', '4', 'Order', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `remark` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', '管理员', '0', '1', '网站管理员', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `roles` VALUES ('2', '技术总监', '0', '1', '统管技术方面的一切资源', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `staff`
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of staff
-- ----------------------------
INSERT INTO `staff` VALUES ('1', '李威', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `staff` VALUES ('2', '哈三儿', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `staff` VALUES ('3', '张三', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `staff` VALUES ('4', '静之恒', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `staff` VALUES ('5', '古极', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('4', '李威', 'liwei@vriworks.com', '$2y$10$HWMI5Hhq2raiDBlLaU/sUeIUrufLwsM12sYpYDpp.g/kI5WJzjtBm', '05MQcuB7m9frtKes0goDqkPTt3AX6sNjpZ2ZZRFCWZ1jduWByeffOO8n6Utq', '2015-05-21 11:54:50', '2015-05-31 12:27:53');
INSERT INTO `users` VALUES ('5', '哈三儿', 'haha@jingzhiheng.com', '$2y$10$xlpkgOryENCv4eOxQVRL0.yDOJfPlTw6qDdd0.8vuklddFIHfcIiW', null, '2015-05-31 12:28:52', '2015-05-31 12:28:52');

-- ----------------------------
-- Table structure for `user_roles`
-- ----------------------------
DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE `user_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user_roles
-- ----------------------------
INSERT INTO `user_roles` VALUES ('1', '4', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `user_roles` VALUES ('3', '5', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `user_roles` VALUES ('4', '5', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `user_roles` VALUES ('6', '4', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
