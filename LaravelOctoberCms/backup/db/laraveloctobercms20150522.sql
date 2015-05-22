/*
Navicat MySQL Data Transfer

Source Server         : 本机
Source Server Version : 50051
Source Host           : localhost:3306
Source Database       : laraveloctobercms

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2015-05-22 15:10:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `backend_access_log`
-- ----------------------------
DROP TABLE IF EXISTS `backend_access_log`;
CREATE TABLE `backend_access_log` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL,
  `ip_address` varchar(255) collate utf8_unicode_ci default NULL,
  `created_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of backend_access_log
-- ----------------------------
INSERT INTO `backend_access_log` VALUES ('1', '1', '127.0.0.1', '2015-05-22 06:36:56', '2015-05-22 06:36:56');

-- ----------------------------
-- Table structure for `backend_users`
-- ----------------------------
DROP TABLE IF EXISTS `backend_users`;
CREATE TABLE `backend_users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `first_name` varchar(255) collate utf8_unicode_ci default NULL,
  `last_name` varchar(255) collate utf8_unicode_ci default NULL,
  `login` varchar(255) collate utf8_unicode_ci NOT NULL,
  `email` varchar(255) collate utf8_unicode_ci NOT NULL,
  `password` varchar(255) collate utf8_unicode_ci NOT NULL,
  `activation_code` varchar(255) collate utf8_unicode_ci default NULL,
  `persist_code` varchar(255) collate utf8_unicode_ci default NULL,
  `reset_password_code` varchar(255) collate utf8_unicode_ci default NULL,
  `permissions` text collate utf8_unicode_ci,
  `is_activated` tinyint(1) NOT NULL default '0',
  `activated_at` timestamp NULL default NULL,
  `last_login` timestamp NULL default NULL,
  `created_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `login_unique` (`login`),
  UNIQUE KEY `email_unique` (`email`),
  KEY `act_code_index` (`activation_code`),
  KEY `reset_code_index` (`reset_password_code`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of backend_users
-- ----------------------------
INSERT INTO `backend_users` VALUES ('1', 'Spark', 'Lee', 'admin', 'liweijsj@163.com', '$2y$10$N1Ph1JDcTE6/PQtPnqzwwOpmAQJP.KY4pjJSC8MUOm7JSqpMimpjW', null, '$2y$10$WQZg5e9oIuwgXyevgXgLBukMrU0IyjDjUi3ilha.uIvykl.9mNay.', null, '{\"superuser\":1}', '1', null, '2015-05-22 06:36:55', '2015-05-22 06:35:18', '2015-05-22 06:36:55');

-- ----------------------------
-- Table structure for `backend_users_groups`
-- ----------------------------
DROP TABLE IF EXISTS `backend_users_groups`;
CREATE TABLE `backend_users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `user_group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`user_id`,`user_group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of backend_users_groups
-- ----------------------------
INSERT INTO `backend_users_groups` VALUES ('1', '1');

-- ----------------------------
-- Table structure for `backend_user_groups`
-- ----------------------------
DROP TABLE IF EXISTS `backend_user_groups`;
CREATE TABLE `backend_user_groups` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `permissions` text collate utf8_unicode_ci,
  `created_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `code` varchar(255) collate utf8_unicode_ci default NULL,
  `description` text collate utf8_unicode_ci,
  `is_new_user_default` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name_unique` (`name`),
  KEY `code_index` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of backend_user_groups
-- ----------------------------
INSERT INTO `backend_user_groups` VALUES ('1', 'Admins', null, '2015-05-22 06:35:18', '2015-05-22 06:35:18', 'admins', 'Default group for administrators', '1');

-- ----------------------------
-- Table structure for `backend_user_preferences`
-- ----------------------------
DROP TABLE IF EXISTS `backend_user_preferences`;
CREATE TABLE `backend_user_preferences` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL,
  `namespace` varchar(100) collate utf8_unicode_ci NOT NULL,
  `group` varchar(50) collate utf8_unicode_ci NOT NULL,
  `item` varchar(150) collate utf8_unicode_ci NOT NULL,
  `value` text collate utf8_unicode_ci,
  PRIMARY KEY  (`id`),
  KEY `user_item_index` (`user_id`,`namespace`,`group`,`item`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of backend_user_preferences
-- ----------------------------

-- ----------------------------
-- Table structure for `backend_user_throttle`
-- ----------------------------
DROP TABLE IF EXISTS `backend_user_throttle`;
CREATE TABLE `backend_user_throttle` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned default NULL,
  `ip_address` varchar(255) collate utf8_unicode_ci default NULL,
  `attempts` int(11) NOT NULL default '0',
  `last_attempt_at` timestamp NULL default NULL,
  `is_suspended` tinyint(1) NOT NULL default '0',
  `suspended_at` timestamp NULL default NULL,
  `is_banned` tinyint(1) NOT NULL default '0',
  `banned_at` timestamp NULL default NULL,
  PRIMARY KEY  (`id`),
  KEY `backend_user_throttle_user_id_index` (`user_id`),
  KEY `backend_user_throttle_ip_address_index` (`ip_address`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of backend_user_throttle
-- ----------------------------
INSERT INTO `backend_user_throttle` VALUES ('1', '1', '127.0.0.1', '0', null, '0', null, '0', null);

-- ----------------------------
-- Table structure for `cms_theme_data`
-- ----------------------------
DROP TABLE IF EXISTS `cms_theme_data`;
CREATE TABLE `cms_theme_data` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `theme` varchar(255) collate utf8_unicode_ci default NULL,
  `data` mediumtext collate utf8_unicode_ci,
  `created_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  KEY `cms_theme_data_theme_index` (`theme`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cms_theme_data
-- ----------------------------

-- ----------------------------
-- Table structure for `deferred_bindings`
-- ----------------------------
DROP TABLE IF EXISTS `deferred_bindings`;
CREATE TABLE `deferred_bindings` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `master_type` varchar(255) collate utf8_unicode_ci NOT NULL,
  `master_field` varchar(255) collate utf8_unicode_ci NOT NULL,
  `slave_type` varchar(255) collate utf8_unicode_ci NOT NULL,
  `slave_id` varchar(255) collate utf8_unicode_ci NOT NULL,
  `session_key` varchar(255) collate utf8_unicode_ci NOT NULL,
  `is_bind` tinyint(1) NOT NULL default '1',
  `created_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  KEY `deferred_bindings_master_type_index` (`master_type`),
  KEY `deferred_bindings_master_field_index` (`master_field`),
  KEY `deferred_bindings_slave_type_index` (`slave_type`),
  KEY `deferred_bindings_slave_id_index` (`slave_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of deferred_bindings
-- ----------------------------

-- ----------------------------
-- Table structure for `jobs`
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `queue` varchar(255) collate utf8_unicode_ci NOT NULL,
  `payload` text collate utf8_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned default NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of jobs
-- ----------------------------

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
INSERT INTO `migrations` VALUES ('2013_10_01_000001_Db_Deferred_Bindings', '1');
INSERT INTO `migrations` VALUES ('2013_10_01_000002_Db_System_Files', '1');
INSERT INTO `migrations` VALUES ('2013_10_01_000003_Db_System_Plugin_Versions', '1');
INSERT INTO `migrations` VALUES ('2013_10_01_000004_Db_System_Plugin_History', '1');
INSERT INTO `migrations` VALUES ('2013_10_01_000005_Db_System_Settings', '1');
INSERT INTO `migrations` VALUES ('2013_10_01_000006_Db_System_Parameters', '1');
INSERT INTO `migrations` VALUES ('2013_10_01_000007_Db_System_Add_Disabled_Flag', '1');
INSERT INTO `migrations` VALUES ('2013_10_01_000008_Db_System_Mail_Templates', '1');
INSERT INTO `migrations` VALUES ('2013_10_01_000009_Db_System_Mail_Layouts', '1');
INSERT INTO `migrations` VALUES ('2014_10_01_000010_Db_Jobs', '1');
INSERT INTO `migrations` VALUES ('2014_10_01_000011_Db_System_Event_Logs', '1');
INSERT INTO `migrations` VALUES ('2014_10_01_000012_Db_System_Request_Logs', '1');
INSERT INTO `migrations` VALUES ('2014_10_01_000013_Db_System_Sessions', '1');
INSERT INTO `migrations` VALUES ('2015_10_01_000014_Db_System_Mail_Layout_Rename', '1');
INSERT INTO `migrations` VALUES ('2013_10_01_000001_Db_Backend_Users', '2');
INSERT INTO `migrations` VALUES ('2013_10_01_000002_Db_Backend_User_Groups', '2');
INSERT INTO `migrations` VALUES ('2013_10_01_000003_Db_Backend_Users_Groups', '2');
INSERT INTO `migrations` VALUES ('2013_10_01_000004_Db_Backend_User_Throttle', '2');
INSERT INTO `migrations` VALUES ('2014_01_04_000005_Db_Backend_User_Preferences', '2');
INSERT INTO `migrations` VALUES ('2014_10_01_000006_Db_Backend_Access_Log', '2');
INSERT INTO `migrations` VALUES ('2014_10_01_000007_Db_Backend_Add_Description_Field', '2');
INSERT INTO `migrations` VALUES ('2014_10_01_000001_Db_Cms_Theme_Data', '3');

-- ----------------------------
-- Table structure for `sessions`
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) collate utf8_unicode_ci NOT NULL,
  `payload` text collate utf8_unicode_ci,
  `last_activity` int(11) default NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of sessions
-- ----------------------------

-- ----------------------------
-- Table structure for `system_event_logs`
-- ----------------------------
DROP TABLE IF EXISTS `system_event_logs`;
CREATE TABLE `system_event_logs` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `level` varchar(255) collate utf8_unicode_ci default NULL,
  `message` text collate utf8_unicode_ci,
  `details` mediumtext collate utf8_unicode_ci,
  `created_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  KEY `system_event_logs_level_index` (`level`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of system_event_logs
-- ----------------------------

-- ----------------------------
-- Table structure for `system_files`
-- ----------------------------
DROP TABLE IF EXISTS `system_files`;
CREATE TABLE `system_files` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `disk_name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `file_name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `file_size` int(11) NOT NULL,
  `content_type` varchar(255) collate utf8_unicode_ci NOT NULL,
  `title` varchar(255) collate utf8_unicode_ci default NULL,
  `description` text collate utf8_unicode_ci,
  `field` varchar(255) collate utf8_unicode_ci default NULL,
  `attachment_id` varchar(255) collate utf8_unicode_ci default NULL,
  `attachment_type` varchar(255) collate utf8_unicode_ci default NULL,
  `is_public` tinyint(1) NOT NULL default '1',
  `sort_order` int(11) default NULL,
  `created_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  KEY `system_files_field_index` (`field`),
  KEY `system_files_attachment_id_index` (`attachment_id`),
  KEY `system_files_attachment_type_index` (`attachment_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of system_files
-- ----------------------------

-- ----------------------------
-- Table structure for `system_mail_layouts`
-- ----------------------------
DROP TABLE IF EXISTS `system_mail_layouts`;
CREATE TABLE `system_mail_layouts` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) collate utf8_unicode_ci default NULL,
  `code` varchar(255) collate utf8_unicode_ci default NULL,
  `content_html` text collate utf8_unicode_ci,
  `content_text` text collate utf8_unicode_ci,
  `content_css` text collate utf8_unicode_ci,
  `is_locked` tinyint(1) NOT NULL default '0',
  `created_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of system_mail_layouts
-- ----------------------------
INSERT INTO `system_mail_layouts` VALUES ('1', 'Default', 'default', '<html>\n    <head>\n        <style type=\"text/css\" media=\"screen\">\n            {{ css|raw }}\n        </style>\n    </head>\n    <body>\n        {{ content|raw }}\n    </body>\n</html>', '{{ content|raw }}', 'a, a:hover {\n    text-decoration: none;\n    color: #0862A2;\n    font-weight: bold;\n}\n\ntd, tr, th, table {\n    padding: 0px;\n    margin: 0px;\n}\n\np {\n    margin: 10px 0;\n}', '1', '2015-05-22 06:35:18', '2015-05-22 06:35:18');
INSERT INTO `system_mail_layouts` VALUES ('2', 'System', 'system', '<html>\n    <head>\n        <style type=\"text/css\" media=\"screen\">\n            {{ css|raw }}\n        </style>\n    </head>\n    <body>\n        {{ content|raw }}\n        <hr />\n        <p>This is an automatic message. Please do not reply to it.</p>\n    </body>\n</html>', '{{ content|raw }}\n\n\n---\nThis is an automatic message. Please do not reply to it.', 'a, a:hover {\n    text-decoration: none;\n    color: #0862A2;\n    font-weight: bold;\n}\n\ntd, tr, th, table {\n    padding: 0px;\n    margin: 0px;\n}\n\np {\n    margin: 10px 0;\n}', '1', '2015-05-22 06:35:18', '2015-05-22 06:35:18');

-- ----------------------------
-- Table structure for `system_mail_templates`
-- ----------------------------
DROP TABLE IF EXISTS `system_mail_templates`;
CREATE TABLE `system_mail_templates` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `code` varchar(255) collate utf8_unicode_ci default NULL,
  `subject` varchar(255) collate utf8_unicode_ci default NULL,
  `description` text collate utf8_unicode_ci,
  `content_html` text collate utf8_unicode_ci,
  `content_text` text collate utf8_unicode_ci,
  `layout_id` int(11) default NULL,
  `is_custom` tinyint(1) NOT NULL default '0',
  `created_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  KEY `system_mail_templates_layout_id_index` (`layout_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of system_mail_templates
-- ----------------------------
INSERT INTO `system_mail_templates` VALUES ('1', 'backend::mail.invite', null, 'Invitation for newly created administrators.', null, null, '2', '0', '2015-05-22 06:50:41', '2015-05-22 06:50:41');
INSERT INTO `system_mail_templates` VALUES ('2', 'backend::mail.restore', null, 'Password reset instructions for backend-end administrators.', null, null, '2', '0', '2015-05-22 06:50:42', '2015-05-22 06:50:42');

-- ----------------------------
-- Table structure for `system_parameters`
-- ----------------------------
DROP TABLE IF EXISTS `system_parameters`;
CREATE TABLE `system_parameters` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `namespace` varchar(100) collate utf8_unicode_ci NOT NULL,
  `group` varchar(50) collate utf8_unicode_ci NOT NULL,
  `item` varchar(150) collate utf8_unicode_ci NOT NULL,
  `value` text collate utf8_unicode_ci,
  PRIMARY KEY  (`id`),
  KEY `item_index` (`namespace`,`group`,`item`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of system_parameters
-- ----------------------------
INSERT INTO `system_parameters` VALUES ('1', 'system', 'update', 'count', '0');
INSERT INTO `system_parameters` VALUES ('2', 'system', 'core', 'hash', '\"4c89c19aaecb9efe116df793bdc99055\"');
INSERT INTO `system_parameters` VALUES ('3', 'system', 'core', 'build', '\"259\"');
INSERT INTO `system_parameters` VALUES ('4', 'cms', 'theme', 'active', '\"demo\"');

-- ----------------------------
-- Table structure for `system_plugin_history`
-- ----------------------------
DROP TABLE IF EXISTS `system_plugin_history`;
CREATE TABLE `system_plugin_history` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `code` varchar(255) collate utf8_unicode_ci NOT NULL,
  `type` varchar(20) collate utf8_unicode_ci NOT NULL,
  `version` varchar(50) collate utf8_unicode_ci NOT NULL,
  `detail` varchar(255) collate utf8_unicode_ci default NULL,
  `created_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  KEY `system_plugin_history_code_index` (`code`),
  KEY `system_plugin_history_type_index` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of system_plugin_history
-- ----------------------------

-- ----------------------------
-- Table structure for `system_plugin_versions`
-- ----------------------------
DROP TABLE IF EXISTS `system_plugin_versions`;
CREATE TABLE `system_plugin_versions` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `code` varchar(255) collate utf8_unicode_ci NOT NULL,
  `version` varchar(50) collate utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `is_disabled` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `system_plugin_versions_code_index` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of system_plugin_versions
-- ----------------------------

-- ----------------------------
-- Table structure for `system_request_logs`
-- ----------------------------
DROP TABLE IF EXISTS `system_request_logs`;
CREATE TABLE `system_request_logs` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `status_code` int(11) default NULL,
  `url` varchar(255) collate utf8_unicode_ci default NULL,
  `referer` text collate utf8_unicode_ci,
  `count` int(11) NOT NULL default '0',
  `created_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of system_request_logs
-- ----------------------------
INSERT INTO `system_request_logs` VALUES ('1', '404', 'http://spklaraveloctobercms.com/welcome.htm', null, '1', '2015-05-22 07:08:07', '2015-05-22 07:08:07');

-- ----------------------------
-- Table structure for `system_settings`
-- ----------------------------
DROP TABLE IF EXISTS `system_settings`;
CREATE TABLE `system_settings` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `item` varchar(255) collate utf8_unicode_ci default NULL,
  `value` mediumtext collate utf8_unicode_ci,
  PRIMARY KEY  (`id`),
  KEY `system_settings_item_index` (`item`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of system_settings
-- ----------------------------
INSERT INTO `system_settings` VALUES ('1', 'cms_maintenance_settings', '{\"is_enabled\":\"1\",\"cms_page\":\"404\",\"theme_map\":{\"demo\":\"404\"}}');
