/*
Navicat MySQL Data Transfer

Source Server         : project
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : aboutus

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-07-15 22:15:21
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `ab_companyinfo`
-- ----------------------------
DROP TABLE IF EXISTS `ab_companyinfo`;
CREATE TABLE `ab_companyinfo` (
  `ci_id` int(11) NOT NULL AUTO_INCREMENT,
  `ci_content` longtext NOT NULL,
  `ci_type` varchar(255) NOT NULL,
  PRIMARY KEY (`ci_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ab_companyinfo
-- ----------------------------
INSERT INTO `ab_companyinfo` VALUES ('1', '地址：北京市XX区XXXX街道XXX大厦XXX\r\n\r\n电话: 1XXXXXXXXXX\r\n1XXXXXXXXXX\r\n\r\n\r\n传真: XXXXXXXXXXX\r\n\r\n邮箱: MAIL@163.COM', 'contact');
INSERT INTO `ab_companyinfo` VALUES ('2', '新视界成立于。。。是。。。 ', 'describe_part1');
INSERT INTO `ab_companyinfo` VALUES ('3', '新视界的服务范围是。。。主要做。。。', 'describe_part2');
INSERT INTO `ab_companyinfo` VALUES ('4', '新视界的宗旨是。。。服务于。。。', 'describe_part3');
INSERT INTO `ab_companyinfo` VALUES ('5', '新视界现在有员工。。。主要为。。。', 'describe_part4');

-- ----------------------------
-- Table structure for `ab_companynews`
-- ----------------------------
DROP TABLE IF EXISTS `ab_companynews`;
CREATE TABLE `ab_companynews` (
  `c_newsid` int(11) NOT NULL AUTO_INCREMENT,
  `c_newstitle` varchar(255) NOT NULL,
  `c_newsdetail` longtext NOT NULL,
  PRIMARY KEY (`c_newsid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ab_companynews
-- ----------------------------

-- ----------------------------
-- Table structure for `ab_employee`
-- ----------------------------
DROP TABLE IF EXISTS `ab_employee`;
CREATE TABLE `ab_employee` (
  `e_password` varchar(255) NOT NULL,
  `e_loginname` varchar(255) NOT NULL,
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `e_loginip` varchar(255) DEFAULT NULL,
  `e_logintime` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ab_employee
-- ----------------------------
INSERT INTO `ab_employee` VALUES ('123456', 'gy', '1', '0.0.0.0', '2015-06-03 09:58:47');

-- ----------------------------
-- Table structure for `ab_productinfo`
-- ----------------------------
DROP TABLE IF EXISTS `ab_productinfo`;
CREATE TABLE `ab_productinfo` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(255) NOT NULL,
  `p_picture` varchar(255) DEFAULT NULL,
  `p_introduction` varchar(255) DEFAULT NULL,
  `p_description` longtext,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ab_productinfo
-- ----------------------------
INSERT INTO `ab_productinfo` VALUES ('1', '1p', '1.jpg', '这款软件是。。。。', 'pd1');
INSERT INTO `ab_productinfo` VALUES ('2', '2p', '2.jpg', '这款软件是。。。。', 'pd2');
INSERT INTO `ab_productinfo` VALUES ('3', '3p', '3.jpg', '这款软件是。。。。', 'pd3');
INSERT INTO `ab_productinfo` VALUES ('4', '4p', '4.jpg', '这款软件是。。。。', 'pd4');
INSERT INTO `ab_productinfo` VALUES ('5', '5p', '5.jpg', '这款软件是。。。。', 'pd5');

-- ----------------------------
-- Table structure for `ab_recruitinfo`
-- ----------------------------
DROP TABLE IF EXISTS `ab_recruitinfo`;
CREATE TABLE `ab_recruitinfo` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_content` longtext NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ab_recruitinfo
-- ----------------------------
INSERT INTO `ab_recruitinfo` VALUES ('1', '软件工程师\r\n\r\n岗位职责：\r\n\r\n任职要求：');
INSERT INTO `ab_recruitinfo` VALUES ('2', 'IOS开发工程师\r\n\r\n岗位职责：\r\n\r\n任职要求：');
INSERT INTO `ab_recruitinfo` VALUES ('3', '安卓开发工程师\r\n\r\n岗位职责：\r\n\r\n任职要求：');
INSERT INTO `ab_recruitinfo` VALUES ('4', '产品经理\r\n\r\n岗位职责：\r\n\r\n任职要求：');

-- ----------------------------
-- Table structure for `ab_setting`
-- ----------------------------
DROP TABLE IF EXISTS `ab_setting`;
CREATE TABLE `ab_setting` (
  `name` varchar(11) NOT NULL,
  `value` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ab_setting
-- ----------------------------
INSERT INTO `ab_setting` VALUES ('visit_count', '161', '1');

-- ----------------------------
-- Table structure for `ab_user`
-- ----------------------------
DROP TABLE IF EXISTS `ab_user`;
CREATE TABLE `ab_user` (
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ab_user
-- ----------------------------
INSERT INTO `ab_user` VALUES ('ww', 'ww', '1');
INSERT INTO `ab_user` VALUES ('222', '5353', '2');
INSERT INTO `ab_user` VALUES ('123456', 'gy', '3');
