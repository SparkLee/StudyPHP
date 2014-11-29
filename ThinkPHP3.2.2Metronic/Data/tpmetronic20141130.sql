/*
Navicat MySQL Data Transfer

Source Server         : 本机MySQL数据库
Source Server Version : 50525
Source Host           : localhost:3306
Source Database       : tpmetronic

Target Server Type    : MYSQL
Target Server Version : 50525
File Encoding         : 65001

Date: 2014-11-30 02:28:55
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
  `name` varchar(20) NOT NULL COMMENT '英文描述',
  `title` varchar(50) DEFAULT NULL COMMENT '中文描述',
  `status` tinyint(1) DEFAULT '0' COMMENT '启用状态',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `sort` smallint(6) unsigned DEFAULT NULL COMMENT '排序',
  `pid` smallint(6) unsigned NOT NULL COMMENT '父节点',
  `level` tinyint(1) unsigned NOT NULL COMMENT '类型',
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_node
-- ----------------------------
INSERT INTO `think_node` VALUES ('1', 'Admin', '后台管理', '1', null, '1', '0', '1');
INSERT INTO `think_node` VALUES ('10', 'publishPost', '发布文章', '1', null, '1', '7', '3');
INSERT INTO `think_node` VALUES ('3', 'Rbac', '权限管理', '1', null, '1', '1', '2');
INSERT INTO `think_node` VALUES ('4', 'addRole', '添加角色', '1', null, '1', '3', '3');
INSERT INTO `think_node` VALUES ('5', 'roleList', '角色管理', '0', null, '2', '3', '3');
INSERT INTO `think_node` VALUES ('7', 'Cms', '文章管理', '1', null, '2', '1', '2');
INSERT INTO `think_node` VALUES ('9', 'Security', '安全处理', '0', null, '3', '1', '2');
INSERT INTO `think_node` VALUES ('14', 'Home', '前台管理', '1', null, '2', '0', '1');

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_role
-- ----------------------------
INSERT INTO `think_role` VALUES ('3', '管理员', null, '1', '');
INSERT INTO `think_role` VALUES ('5', '普通用户', null, '1', '');
INSERT INTO `think_role` VALUES ('6', 'VIP会员', null, '0', '');
INSERT INTO `think_role` VALUES ('7', '1', null, '1', '');
INSERT INTO `think_role` VALUES ('8', '2', null, '1', '');
INSERT INTO `think_role` VALUES ('10', '4', null, '1', '');
INSERT INTO `think_role` VALUES ('11', '5', null, '1', '');
INSERT INTO `think_role` VALUES ('13', '7', null, '1', '');

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
INSERT INTO `think_role_user` VALUES ('3', '1');
INSERT INTO `think_role_user` VALUES ('5', '2');
INSERT INTO `think_role_user` VALUES ('6', '3');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_user
-- ----------------------------
INSERT INTO `think_user` VALUES ('1', '李威', '', '1417278269', '127.0.0.1', '1');
INSERT INTO `think_user` VALUES ('2', '管理员', '202cb962ac59075b964b07152d234b70', '1417278357', '127.0.0.1', '1');
INSERT INTO `think_user` VALUES ('3', '李四', '202cb962ac59075b964b07152d234b70', '1417285695', '127.0.0.1', '1');
