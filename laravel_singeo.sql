/*
Navicat MySQL Data Transfer

Source Server         : B本地数据库
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : laravel_singeo

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2019-06-17 23:06:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `lrv_console_nodes`
-- ----------------------------
DROP TABLE IF EXISTS `lrv_console_nodes`;
CREATE TABLE `lrv_console_nodes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `pid` int(10) unsigned NOT NULL COMMENT '父节点ID',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '菜单类型;1:菜单,2:操作',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态;1:正常,-1:禁用',
  `is_route` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否需要路由，1需要，0不需要',
  `node_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '节点名称',
  `node_icon` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '节点图标',
  `node_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '节点链接地址',
  `sort` smallint(5) unsigned NOT NULL COMMENT '排序',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of lrv_console_nodes
-- ----------------------------
INSERT INTO `lrv_console_nodes` VALUES ('1', '0', '1', '1', '1', '系统配置', 'glyphicon-cog', '/system/', '50', '2019-04-18 22:03:49', '2019-04-18 22:04:17');
INSERT INTO `lrv_console_nodes` VALUES ('2', '1', '1', '1', '1', '管理员管理', null, '/consoleuser/index', '10', '2019-04-18 22:04:57', '2019-04-18 22:04:57');
INSERT INTO `lrv_console_nodes` VALUES ('3', '2', '2', '1', '1', '新增管理员', null, '/consoleuser/create', '10', '2019-04-18 22:05:46', '2019-04-18 22:05:46');
INSERT INTO `lrv_console_nodes` VALUES ('4', '2', '2', '1', '1', '提交新增', null, '/consoleuser/store', '20', '2019-04-18 22:06:17', '2019-04-18 22:06:17');
INSERT INTO `lrv_console_nodes` VALUES ('5', '2', '2', '1', '1', '修改管理员', null, '/consoleuser/edit', '30', '2019-04-18 22:06:43', '2019-04-18 22:06:43');
INSERT INTO `lrv_console_nodes` VALUES ('6', '2', '2', '1', '1', '提交修改', null, '/consoleuser/save', '40', '2019-04-18 22:07:10', '2019-04-18 22:12:11');
INSERT INTO `lrv_console_nodes` VALUES ('7', '1', '1', '1', '1', '角色管理', null, '/consolerole/index', '20', '2019-04-18 22:07:45', '2019-04-18 22:07:45');
INSERT INTO `lrv_console_nodes` VALUES ('8', '7', '2', '1', '1', '新增角色', null, '/consolerole/create', '10', '2019-04-18 22:08:29', '2019-04-18 22:08:29');
INSERT INTO `lrv_console_nodes` VALUES ('9', '7', '2', '1', '1', '提交新增', null, '/consolerole/store', '20', '2019-04-18 22:08:55', '2019-04-18 22:08:55');
INSERT INTO `lrv_console_nodes` VALUES ('10', '7', '2', '1', '1', '修改角色', null, '/consolerole/edit', '30', '2019-04-18 22:09:32', '2019-04-18 22:09:40');
INSERT INTO `lrv_console_nodes` VALUES ('11', '7', '2', '1', '1', '提交修改', null, '/consolerole/save', '40', '2019-04-18 22:10:27', '2019-04-18 22:10:27');
INSERT INTO `lrv_console_nodes` VALUES ('12', '7', '2', '1', '1', '角色授权', null, '/consolerole/rolenode', '50', '2019-04-18 22:11:43', '2019-04-18 22:11:43');
INSERT INTO `lrv_console_nodes` VALUES ('13', '1', '1', '1', '1', '后台菜单管理', null, '/consolenode/index', '30', '2019-04-18 22:13:01', '2019-04-18 22:13:01');
INSERT INTO `lrv_console_nodes` VALUES ('14', '13', '2', '1', '1', '新增菜单', null, '/consolenode/create', '10', '2019-04-18 22:13:43', '2019-04-18 22:13:43');
INSERT INTO `lrv_console_nodes` VALUES ('15', '13', '2', '1', '1', '提交新增', null, '/consolenode/store', '20', '2019-04-18 22:14:02', '2019-04-18 22:14:02');
INSERT INTO `lrv_console_nodes` VALUES ('16', '13', '1', '1', '1', '修改菜单', null, '/consolenode/edit', '30', '2019-04-18 22:14:33', '2019-04-18 22:14:33');
INSERT INTO `lrv_console_nodes` VALUES ('17', '13', '2', '1', '1', '提交修改', null, '/consolenode/save', '40', '2019-04-18 22:14:54', '2019-04-18 22:14:54');
INSERT INTO `lrv_console_nodes` VALUES ('18', '13', '2', '1', '1', '删除菜单', null, '/consolenode/delete', '50', '2019-04-18 22:15:35', '2019-04-18 22:15:35');
INSERT INTO `lrv_console_nodes` VALUES ('19', '13', '2', '1', '1', '提交删除', null, '/consolenode/submitdelete', '60', '2019-04-18 22:16:27', '2019-04-18 22:16:27');

-- ----------------------------
-- Table structure for `lrv_console_roles`
-- ----------------------------
DROP TABLE IF EXISTS `lrv_console_roles`;
CREATE TABLE `lrv_console_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `role_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '角色名称',
  `sort` smallint(5) unsigned NOT NULL COMMENT '排序',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '角色状态;-1:禁用,1:正常',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `console_roles_role_name_unique` (`role_name`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of lrv_console_roles
-- ----------------------------
INSERT INTO `lrv_console_roles` VALUES ('1', '测试', '10', '1', '2019-04-19 10:50:48', '2019-04-19 10:50:48');
INSERT INTO `lrv_console_roles` VALUES ('2', '测试2', '30', '1', '2019-04-19 13:09:15', '2019-04-19 13:09:15');

-- ----------------------------
-- Table structure for `lrv_console_roles_nodes`
-- ----------------------------
DROP TABLE IF EXISTS `lrv_console_roles_nodes`;
CREATE TABLE `lrv_console_roles_nodes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `role_id` int(10) unsigned NOT NULL COMMENT '角色ID',
  `node_id` int(10) unsigned NOT NULL COMMENT '节点ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of lrv_console_roles_nodes
-- ----------------------------
INSERT INTO `lrv_console_roles_nodes` VALUES ('29', '1', '6');
INSERT INTO `lrv_console_roles_nodes` VALUES ('28', '1', '5');
INSERT INTO `lrv_console_roles_nodes` VALUES ('27', '1', '4');
INSERT INTO `lrv_console_roles_nodes` VALUES ('26', '1', '3');
INSERT INTO `lrv_console_roles_nodes` VALUES ('25', '1', '2');

-- ----------------------------
-- Table structure for `lrv_console_roles_users`
-- ----------------------------
DROP TABLE IF EXISTS `lrv_console_roles_users`;
CREATE TABLE `lrv_console_roles_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `role_id` int(10) unsigned NOT NULL COMMENT '角色ID',
  `user_id` int(10) unsigned NOT NULL COMMENT '用户ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of lrv_console_roles_users
-- ----------------------------
INSERT INTO `lrv_console_roles_users` VALUES ('3', '1', '2');

-- ----------------------------
-- Table structure for `lrv_console_users`
-- ----------------------------
DROP TABLE IF EXISTS `lrv_console_users`;
CREATE TABLE `lrv_console_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `user_login` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '用户登录名',
  `user_pass` char(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '登录密码',
  `user_nickname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '用户昵称',
  `user_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '邮箱',
  `mobile` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '用户手机号',
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '用户头像',
  `user_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '用户状态;-1:禁用,1:正常',
  `login_times` smallint(6) NOT NULL DEFAULT '0' COMMENT '登录次数',
  `last_login_time` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '最后登录ip',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `console_users_user_login_unique` (`user_login`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of lrv_console_users
-- ----------------------------
INSERT INTO `lrv_console_users` VALUES ('1', 'master', '$2y$10$B0GcjXtAX3DnXVM0PKfz2eVx2A4kmET1rdW0ekH2owpPraxshDVYq', '超级管理员', '123@123.com', '', '', '1', '0', null, '0', null, null);
INSERT INTO `lrv_console_users` VALUES ('2', 'test_01', '$2y$10$NmJ/BADU0LMpT9iKZ/xXUunIFz7Oxi8c4CTtfDryS4NPmrKAmPAa6', '测试1', '123@126.com', '15989884146', '', '1', '0', null, '0', '2019-04-19 10:50:31', '2019-04-19 10:50:31');

-- ----------------------------
-- Table structure for `lrv_migrations`
-- ----------------------------
DROP TABLE IF EXISTS `lrv_migrations`;
CREATE TABLE `lrv_migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of lrv_migrations
-- ----------------------------
INSERT INTO `lrv_migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `lrv_migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `lrv_migrations` VALUES ('3', '2019_04_08_022343_create_console_users_table', '1');
INSERT INTO `lrv_migrations` VALUES ('4', '2019_04_12_025001_create_console_roles_table', '1');
INSERT INTO `lrv_migrations` VALUES ('5', '2019_04_12_025009_create_console_roles_nodes_table', '1');
INSERT INTO `lrv_migrations` VALUES ('6', '2019_04_12_025015_create_console_nodes_table', '1');
INSERT INTO `lrv_migrations` VALUES ('7', '2019_04_12_025045_create_console_roles_users_table', '1');
INSERT INTO `lrv_migrations` VALUES ('8', '2019_04_15_090424_alter_users_tables', '1');
INSERT INTO `lrv_migrations` VALUES ('10', '2019_04_25_133039_alter_console_nodes_table', '2');

-- ----------------------------
-- Table structure for `lrv_password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `lrv_password_resets`;
CREATE TABLE `lrv_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of lrv_password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `lrv_users`
-- ----------------------------
DROP TABLE IF EXISTS `lrv_users`;
CREATE TABLE `lrv_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of lrv_users
-- ----------------------------
