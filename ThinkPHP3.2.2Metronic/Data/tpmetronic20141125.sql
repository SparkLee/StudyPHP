/*
Navicat MySQL Data Transfer

Source Server         : 本机MySQL数据库
Source Server Version : 50525
Source Host           : localhost:3306
Source Database       : tpmetronic

Target Server Type    : MYSQL
Target Server Version : 50525
File Encoding         : 65001

Date: 2014-11-26 01:21:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `think_access`
-- ----------------------------
DROP TABLE IF EXISTS `think_access`;
CREATE TABLE `think_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`role_id`,`node_id`),
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_access
-- ----------------------------

-- ----------------------------
-- Table structure for `think_node`
-- ----------------------------
DROP TABLE IF EXISTS `think_node`;
CREATE TABLE `think_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_node
-- ----------------------------

-- ----------------------------
-- Table structure for `think_role`
-- ----------------------------
DROP TABLE IF EXISTS `think_role`;
CREATE TABLE `think_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_role
-- ----------------------------
INSERT INTO `think_role` VALUES ('2', '超级管理员', null, '1', '拥有系统的一切权限');
INSERT INTO `think_role` VALUES ('3', '管理员', null, '1', '');
INSERT INTO `think_role` VALUES ('5', '普通用户', null, '1', '');
INSERT INTO `think_role` VALUES ('6', 'VIP会员', null, '0', '');

-- ----------------------------
-- Table structure for `think_role_user`
-- ----------------------------
DROP TABLE IF EXISTS `think_role_user`;
CREATE TABLE `think_role_user` (
  `role_id` mediumint(9) unsigned NOT NULL DEFAULT '0',
  `user_id` char(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`role_id`,`user_id`),
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_role_user
-- ----------------------------

-- ----------------------------
-- Table structure for `think_user`
-- ----------------------------
DROP TABLE IF EXISTS `think_user`;
CREATE TABLE `think_user` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `logintime` int(10) unsigned DEFAULT NULL,
  `loginip` varchar(30) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_user
-- ----------------------------
