/*
Navicat MySQL Data Transfer

Source Server         : 本机
Source Server Version : 50051
Source Host           : localhost:3306
Source Database       : laravel

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2015-05-22 10:17:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `articles`
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(255) collate utf8_unicode_ci NOT NULL,
  `slug` varchar(255) collate utf8_unicode_ci default NULL,
  `body` text collate utf8_unicode_ci,
  `image` varchar(255) collate utf8_unicode_ci default NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES ('1', '第一篇文章的标题0000', null, '文章内容文章内容文章内容文章内容00000', null, '1', '2015-05-21 13:35:21', '2015-05-21 13:57:45');
INSERT INTO `articles` VALUES ('4', '第二篇来了', null, '第二篇来了第二篇来了第二篇来了', null, '1', '2015-05-22 02:09:04', '2015-05-22 02:09:04');

-- ----------------------------
-- Table structure for `comments`
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `nickname` varchar(255) collate utf8_unicode_ci NOT NULL,
  `email` varchar(255) collate utf8_unicode_ci default NULL,
  `website` varchar(255) collate utf8_unicode_ci default NULL,
  `content` text collate utf8_unicode_ci,
  `page_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES ('1', '李威', 'liwei@vriworks.com', 'http://www.vriworks.cn', '不错不错，第一个来了啦', '1', '0', '2015-05-21 12:02:21', '2015-05-21 12:02:21');
INSERT INTO `comments` VALUES ('2', '张三', 'zhangsan@vriworks.com', '', '真想给你发个红包', '1', '0', '2015-05-21 12:02:59', '2015-05-21 12:02:59');

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) collate utf8_unicode_ci NOT NULL,
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

-- ----------------------------
-- Table structure for `pages`
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(255) collate utf8_unicode_ci NOT NULL,
  `slug` varchar(255) collate utf8_unicode_ci default NULL,
  `body` text collate utf8_unicode_ci,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of pages
-- ----------------------------
INSERT INTO `pages` VALUES ('3', 'Title 0', 'first-page', 'Body 0', '1', '2015-05-21 13:26:06', '2015-05-21 13:26:06');
INSERT INTO `pages` VALUES ('4', 'Title 1', 'first-page', 'Body 1', '1', '2015-05-21 13:26:06', '2015-05-21 13:26:06');
INSERT INTO `pages` VALUES ('5', 'Title 2', 'first-page', 'Body 2', '1', '2015-05-21 13:26:06', '2015-05-21 13:26:06');
INSERT INTO `pages` VALUES ('6', 'Title 3', 'first-page', 'Body 3', '1', '2015-05-21 13:26:06', '2015-05-21 13:26:06');
INSERT INTO `pages` VALUES ('7', 'Title 4', 'first-page', 'Body 4', '1', '2015-05-21 13:26:06', '2015-05-21 13:26:06');
INSERT INTO `pages` VALUES ('8', 'Title 5', 'first-page', 'Body 5', '1', '2015-05-21 13:26:06', '2015-05-21 13:26:06');
INSERT INTO `pages` VALUES ('9', 'Title 6', 'first-page', 'Body 6', '1', '2015-05-21 13:26:06', '2015-05-21 13:26:06');
INSERT INTO `pages` VALUES ('10', 'Title 7', 'first-page', 'Body 7', '1', '2015-05-21 13:26:06', '2015-05-21 13:26:06');
INSERT INTO `pages` VALUES ('11', 'Title 8', 'first-page', 'Body 8', '1', '2015-05-21 13:26:06', '2015-05-21 13:26:06');
INSERT INTO `pages` VALUES ('12', 'Title 9', 'first-page', 'Body 9', '1', '2015-05-21 13:26:06', '2015-05-21 13:26:06');
INSERT INTO `pages` VALUES ('13', '页面20150521', null, '内容就是内容', '1', '2015-05-22 02:08:45', '2015-05-22 02:08:45');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) collate utf8_unicode_ci NOT NULL,
  `token` varchar(255) collate utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `email` varchar(255) collate utf8_unicode_ci NOT NULL,
  `password` varchar(60) collate utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) collate utf8_unicode_ci default NULL,
  `created_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '李威', 'liwei@vriworks.com', '$2y$10$HWMI5Hhq2raiDBlLaU/sUeIUrufLwsM12sYpYDpp.g/kI5WJzjtBm', null, '2015-05-21 11:54:50', '2015-05-21 11:54:50');
