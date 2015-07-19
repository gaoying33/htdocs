/*
Navicat MySQL Data Transfer

Source Server         : project
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : aboutus

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-07-19 10:35:47
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
INSERT INTO `ab_companyinfo` VALUES ('1', '地址：北京市XX区XXXX街道XXX大厦XXX电话: 1XXXXXXXXXX 1XXXXXXXXXX传真: XXXXXXXXXXX邮箱: MAIL@163.COM newhaha', 'contact');
INSERT INTO `ab_companyinfo` VALUES ('2', '新视界成立于2014年11月，由北京理工大学毕业生杨晶与同学及资深企业人创立。', 'describe_part1');
INSERT INTO `ab_companyinfo` VALUES ('3', '新视界当前服务范围为网站制作维护、APP开发运营以及在北理中接触到的MOOC视频后期处理。', 'describe_part2');
INSERT INTO `ab_companyinfo` VALUES ('4', '新视界的宗旨是记录每个人的历史，为所有人立言，从而改变浮躁之气。服务于当今社会中所有需要规划人生、行走人生以及回忆人生的人。', 'describe_part3');
INSERT INTO `ab_companyinfo` VALUES ('5', '新视界现在有员工20人，主要为维护人员，核心开发人员唯有3人，诚招各方贤才。', 'describe_part4');

-- ----------------------------
-- Table structure for `ab_companynews`
-- ----------------------------
DROP TABLE IF EXISTS `ab_companynews`;
CREATE TABLE `ab_companynews` (
  `c_newsid` int(11) NOT NULL AUTO_INCREMENT,
  `c_newstitle` varchar(255) NOT NULL,
  `c_newsdetail` longtext NOT NULL,
  `c_rank` int(11) DEFAULT NULL,
  PRIMARY KEY (`c_newsid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ab_companynews
-- ----------------------------
INSERT INTO `ab_companynews` VALUES ('1', '新闻标题', '新闻详情', '1');
INSERT INTO `ab_companynews` VALUES ('2', '公司将于XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', 'dt2', '2');
INSERT INTO `ab_companynews` VALUES ('3', '公司XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', 'dt3', '3');
INSERT INTO `ab_companynews` VALUES ('4', '公司XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', 'dt4', '4');
INSERT INTO `ab_companynews` VALUES ('5', '公司XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', 'dt5', '5');
INSERT INTO `ab_companynews` VALUES ('6', '公司XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', 'dt6', '7');
INSERT INTO `ab_companynews` VALUES ('7', 'XXXXX公司XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', 'dt7', '6');
INSERT INTO `ab_companynews` VALUES ('8', 'XXXXXXXXXXXXX公司XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX\r\nXXXXXXXXXXXXX公司XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX\r\nXXXXXXXXXXXXX公司XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX\r\nXXXXXXXXXXXXX公司XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', 'dt8', '8');
INSERT INTO `ab_companynews` VALUES ('9', 'haha', 'dt9', '9');
INSERT INTO `ab_companynews` VALUES ('10', 'xududu', 'dt10', '12');
INSERT INTO `ab_companynews` VALUES ('12', '新闻标题', '新闻详情', '10');
INSERT INTO `ab_companynews` VALUES ('13', '新闻标题', '新闻详情', '13');
INSERT INTO `ab_companynews` VALUES ('14', '新闻标题', '新闻详情', '14');

-- ----------------------------
-- Table structure for `ab_employee`
-- ----------------------------
DROP TABLE IF EXISTS `ab_employee`;
CREATE TABLE `ab_employee` (
  `e_password` varchar(255) NOT NULL,
  `e_loginname` varchar(255) NOT NULL,
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ab_employee
-- ----------------------------
INSERT INTO `ab_employee` VALUES ('haha1234', 'gy', '1');

-- ----------------------------
-- Table structure for `ab_newspicture`
-- ----------------------------
DROP TABLE IF EXISTS `ab_newspicture`;
CREATE TABLE `ab_newspicture` (
  `pic_id` int(11) NOT NULL,
  `pic_url` varchar(255) NOT NULL,
  `pic_des` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ab_newspicture
-- ----------------------------
INSERT INTO `ab_newspicture` VALUES ('1', 'new url', 'haha');
INSERT INTO `ab_newspicture` VALUES ('2', 'b.jpg', '2xixi');
INSERT INTO `ab_newspicture` VALUES ('3', 'c.jpg', '3xixi');
INSERT INTO `ab_newspicture` VALUES ('4', 'gjg', 'gjh');

-- ----------------------------
-- Table structure for `ab_otherpicture`
-- ----------------------------
DROP TABLE IF EXISTS `ab_otherpicture`;
CREATE TABLE `ab_otherpicture` (
  `p_url` varchar(255) NOT NULL,
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ab_otherpicture
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ab_productinfo
-- ----------------------------
INSERT INTO `ab_productinfo` VALUES ('1', '产品名', '产品图片URL', '产品简介', '产品详情');
INSERT INTO `ab_productinfo` VALUES ('2', '2p', '2.jpg', '这款软件是。。。。', 'pd2');
INSERT INTO `ab_productinfo` VALUES ('3', '3p', '3.jpg', '这款软件是。。。。', 'pd3');
INSERT INTO `ab_productinfo` VALUES ('4', '4p', '4.jpg', '这款软件是。。。。', 'pd4');
INSERT INTO `ab_productinfo` VALUES ('5', '5p', '5.jpg', '这款软件是。。。。', 'pd5');
INSERT INTO `ab_productinfo` VALUES ('7', '产品名', '产品图片URL', '产品简介', '产品详情');
INSERT INTO `ab_productinfo` VALUES ('8', '', '', '', '');
INSERT INTO `ab_productinfo` VALUES ('9', '', '', '', '');
INSERT INTO `ab_productinfo` VALUES ('10', '产品名', '产品图片URL', '产品简介', '产品详情');

-- ----------------------------
-- Table structure for `ab_recruitinfo`
-- ----------------------------
DROP TABLE IF EXISTS `ab_recruitinfo`;
CREATE TABLE `ab_recruitinfo` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_content` longtext NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ab_recruitinfo
-- ----------------------------
INSERT INTO `ab_recruitinfo` VALUES ('1', '软件工程师\r\n\r\n岗位职责：\r\n\r\n任职要求：');
INSERT INTO `ab_recruitinfo` VALUES ('3', '安卓开发工程师\r\n\r\n岗位职责：\r\n\r\n任职要求：');
INSERT INTO `ab_recruitinfo` VALUES ('4', '产品经理\r\n\r\n岗位职责：\r\n\r\n任职要求：');
INSERT INTO `ab_recruitinfo` VALUES ('5', '我们招人啦');

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
