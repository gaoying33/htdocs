/*
Navicat MySQL Data Transfer

Source Server         : project
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : aboutus

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

<<<<<<< HEAD
Date: 2015-07-17 14:24:19
=======
Date: 2015-07-15 22:15:21
>>>>>>> 2d4073dbfe3f697a72586ed2b00fb7fdfa975939
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
<<<<<<< HEAD
INSERT INTO `ab_companyinfo` VALUES ('1', '北京市丰台区镇岗塔路北口珠江御景13号楼2单元802（近期换新的办公室）\r\n15201614757 杨晶\r\n13513419145 赵东海\r\n244081468@qq.com\r\nyysjmike@126.com\r\n\r\nyysjmike@126.com\r\n', 'contact');
INSERT INTO `ab_companyinfo` VALUES ('2', '新视界成立于2014年11月，由北京理工大学毕业生杨晶与同学及资深企业人创立。', 'describe_part1');
INSERT INTO `ab_companyinfo` VALUES ('3', '新视界当前服务范围为网站制作维护、APP开发运营以及在北理中接触到的MOOC视频后期处理。', 'describe_part2');
INSERT INTO `ab_companyinfo` VALUES ('4', '新视界的宗旨是记录每个人的历史，为所有人立言，从而改变浮躁之气。服务于当今社会中所有需要规划人生、行走人生以及回忆人生的人。', 'describe_part3');
INSERT INTO `ab_companyinfo` VALUES ('5', '新视界现在有员工20人，主要为维护人员，核心开发人员唯有3人，诚招各方贤才。', 'describe_part4');
=======
INSERT INTO `ab_companyinfo` VALUES ('1', '地址：北京市XX区XXXX街道XXX大厦XXX\r\n\r\n电话: 1XXXXXXXXXX\r\n1XXXXXXXXXX\r\n\r\n\r\n传真: XXXXXXXXXXX\r\n\r\n邮箱: MAIL@163.COM', 'contact');
INSERT INTO `ab_companyinfo` VALUES ('2', '新视界成立于。。。是。。。 ', 'describe_part1');
INSERT INTO `ab_companyinfo` VALUES ('3', '新视界的服务范围是。。。主要做。。。', 'describe_part2');
INSERT INTO `ab_companyinfo` VALUES ('4', '新视界的宗旨是。。。服务于。。。', 'describe_part3');
INSERT INTO `ab_companyinfo` VALUES ('5', '新视界现在有员工。。。主要为。。。', 'describe_part4');
>>>>>>> 2d4073dbfe3f697a72586ed2b00fb7fdfa975939

-- ----------------------------
-- Table structure for `ab_companynews`
-- ----------------------------
DROP TABLE IF EXISTS `ab_companynews`;
CREATE TABLE `ab_companynews` (
  `c_newsid` int(11) NOT NULL AUTO_INCREMENT,
  `c_newstitle` varchar(255) NOT NULL,
  `c_newsdetail` longtext NOT NULL,
  PRIMARY KEY (`c_newsid`)
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
=======
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
>>>>>>> 2d4073dbfe3f697a72586ed2b00fb7fdfa975939

-- ----------------------------
-- Records of ab_companynews
-- ----------------------------
<<<<<<< HEAD
INSERT INTO `ab_companynews` VALUES ('1', '新闻标题', '新闻详情');
INSERT INTO `ab_companynews` VALUES ('2', '公司将于XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', 'dt2');
INSERT INTO `ab_companynews` VALUES ('3', '公司XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', 'dt3');
INSERT INTO `ab_companynews` VALUES ('4', '公司XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', 'dt4');
INSERT INTO `ab_companynews` VALUES ('5', '公司XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', 'dt5');
INSERT INTO `ab_companynews` VALUES ('6', '公司XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', 'dt6');
INSERT INTO `ab_companynews` VALUES ('7', 'XXXXX公司XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', 'dt7');
INSERT INTO `ab_companynews` VALUES ('8', 'XXXXXXXXXXXXX公司XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX\r\nXXXXXXXXXXXXX公司XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX\r\nXXXXXXXXXXXXX公司XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX\r\nXXXXXXXXXXXXX公司XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', 'dt8');
INSERT INTO `ab_companynews` VALUES ('9', 'haha', 'dt9');
INSERT INTO `ab_companynews` VALUES ('10', 'xududu', 'dt10');
INSERT INTO `ab_companynews` VALUES ('12', '新闻标题', '新闻详情');
=======
>>>>>>> 2d4073dbfe3f697a72586ed2b00fb7fdfa975939

-- ----------------------------
-- Table structure for `ab_employee`
-- ----------------------------
DROP TABLE IF EXISTS `ab_employee`;
CREATE TABLE `ab_employee` (
  `e_password` varchar(255) NOT NULL,
  `e_loginname` varchar(255) NOT NULL,
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
<<<<<<< HEAD
=======
  `e_loginip` varchar(255) DEFAULT NULL,
  `e_logintime` varchar(255) DEFAULT NULL,
>>>>>>> 2d4073dbfe3f697a72586ed2b00fb7fdfa975939
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ab_employee
-- ----------------------------
<<<<<<< HEAD
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
=======
INSERT INTO `ab_employee` VALUES ('123456', 'gy', '1', '0.0.0.0', '2015-06-03 09:58:47');
>>>>>>> 2d4073dbfe3f697a72586ed2b00fb7fdfa975939

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
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
=======
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
>>>>>>> 2d4073dbfe3f697a72586ed2b00fb7fdfa975939

-- ----------------------------
-- Records of ab_productinfo
-- ----------------------------
<<<<<<< HEAD
INSERT INTO `ab_productinfo` VALUES ('1', '产品名', '产品图片URL', '产品简介', '产品详情');
=======
INSERT INTO `ab_productinfo` VALUES ('1', '1p', '1.jpg', '这款软件是。。。。', 'pd1');
>>>>>>> 2d4073dbfe3f697a72586ed2b00fb7fdfa975939
INSERT INTO `ab_productinfo` VALUES ('2', '2p', '2.jpg', '这款软件是。。。。', 'pd2');
INSERT INTO `ab_productinfo` VALUES ('3', '3p', '3.jpg', '这款软件是。。。。', 'pd3');
INSERT INTO `ab_productinfo` VALUES ('4', '4p', '4.jpg', '这款软件是。。。。', 'pd4');
INSERT INTO `ab_productinfo` VALUES ('5', '5p', '5.jpg', '这款软件是。。。。', 'pd5');
<<<<<<< HEAD
INSERT INTO `ab_productinfo` VALUES ('7', '产品名', '产品图片URL', '产品简介', '产品详情');
=======
>>>>>>> 2d4073dbfe3f697a72586ed2b00fb7fdfa975939

-- ----------------------------
-- Table structure for `ab_recruitinfo`
-- ----------------------------
DROP TABLE IF EXISTS `ab_recruitinfo`;
CREATE TABLE `ab_recruitinfo` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_content` longtext NOT NULL,
  PRIMARY KEY (`r_id`)
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
=======
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
>>>>>>> 2d4073dbfe3f697a72586ed2b00fb7fdfa975939

-- ----------------------------
-- Records of ab_recruitinfo
-- ----------------------------
INSERT INTO `ab_recruitinfo` VALUES ('1', '软件工程师\r\n\r\n岗位职责：\r\n\r\n任职要求：');
<<<<<<< HEAD
INSERT INTO `ab_recruitinfo` VALUES ('3', '安卓开发工程师\r\n\r\n岗位职责：\r\n\r\n任职要求：');
INSERT INTO `ab_recruitinfo` VALUES ('4', '产品经理\r\n\r\n岗位职责：\r\n\r\n任职要求：');
INSERT INTO `ab_recruitinfo` VALUES ('5', '我们招人啦');
=======
INSERT INTO `ab_recruitinfo` VALUES ('2', 'IOS开发工程师\r\n\r\n岗位职责：\r\n\r\n任职要求：');
INSERT INTO `ab_recruitinfo` VALUES ('3', '安卓开发工程师\r\n\r\n岗位职责：\r\n\r\n任职要求：');
INSERT INTO `ab_recruitinfo` VALUES ('4', '产品经理\r\n\r\n岗位职责：\r\n\r\n任职要求：');
>>>>>>> 2d4073dbfe3f697a72586ed2b00fb7fdfa975939

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
<<<<<<< HEAD
=======

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
>>>>>>> 2d4073dbfe3f697a72586ed2b00fb7fdfa975939
