/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : lgblog

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-03-17 13:54:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_content` varchar(255) DEFAULT NULL COMMENT '文章',
  `cTime` datetime DEFAULT NULL,
  `article_title` varchar(255) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `sort_article_id` varchar(255) DEFAULT NULL COMMENT '所属分类',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('1', null, null, '王者荣耀（入门篇）', 'Louisxiv', '3');
INSERT INTO `article` VALUES ('2', null, null, '王者荣耀（晋级篇）', 'Louisxiv', '3');

-- ----------------------------
-- Table structure for articledepend
-- ----------------------------
DROP TABLE IF EXISTS `articledepend`;
CREATE TABLE `articledepend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort_article_name` varchar(50) NOT NULL,
  `sort_article_owner` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of articledepend
-- ----------------------------
INSERT INTO `articledepend` VALUES ('1', '科学技术', null);
INSERT INTO `articledepend` VALUES ('2', '娱乐资讯', null);
INSERT INTO `articledepend` VALUES ('3', '热门游戏', null);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(255) NOT NULL AUTO_INCREMENT COMMENT '用户表',
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `usertype` varchar(50) DEFAULT NULL COMMENT '用户类型',
  `login_status` varchar(255) DEFAULT NULL,
  `cTime` datetime DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'liuguan', '111111', '1', null, null, null, null);

-- ----------------------------
-- Table structure for user_apply
-- ----------------------------
DROP TABLE IF EXISTS `user_apply`;
CREATE TABLE `user_apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `apply_status` varchar(255) DEFAULT NULL COMMENT '登录状态',
  `apply_time` datetime NOT NULL COMMENT '申请时间',
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `head_icon` varchar(255) DEFAULT NULL COMMENT '头像',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_apply
-- ----------------------------
