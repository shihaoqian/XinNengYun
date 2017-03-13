/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50022
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50022
File Encoding         : 65001

Date: 2017-03-13 17:02:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for list_view_table
-- ----------------------------
DROP TABLE IF EXISTS `list_view_table`;
CREATE TABLE `list_view_table` (
  `zhuangtai` varchar(100) NOT NULL,
  `bianhao` varchar(100) NOT NULL default '',
  `mingcheng` varchar(100) NOT NULL,
  `shijian` varchar(100) NOT NULL,
  `DCdianya` double NOT NULL,
  `DCdianliu` double NOT NULL,
  `DCgonglv` double NOT NULL,
  `ACdianya` double NOT NULL,
  `ACdianliu` double NOT NULL,
  `ACgonglv` double NOT NULL,
  `wendu` double NOT NULL,
  `xiaolv` double NOT NULL,
  `pinlv` double NOT NULL,
  `gonglvyinsu` double NOT NULL,
  `rifadianliang` double NOT NULL,
  `zongfadianliang` double NOT NULL,
  PRIMARY KEY  (`bianhao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of list_view_table
-- ----------------------------
INSERT INTO `list_view_table` VALUES ('正常运行', '001', '1#8A逆变器', '2017-03-06 10:40:06', '101', '61.7', '40', '305.8', '83.7', '38.9', '11', '98', '50', '0.99', '99.3', '932491');
INSERT INTO `list_view_table` VALUES ('正常运行', '002', '1#7B逆变器', '2017-03-06 10:40:08', '201', '62.7', '40', '305.8', '83.7', '38.9', '11', '98', '50', '0.99', '99.3', '912491');
INSERT INTO `list_view_table` VALUES ('正常运行', '003', '1#7A逆变器', '2017-03-06 10:40:11', '301', '63.7', '40', '305.8', '83.7', '38.9', '11', '98', '50', '0.99', '99.3', '892491');
INSERT INTO `list_view_table` VALUES ('正常运行', '004', '1#8A逆变器', '2017-03-06 10:40:06', '647.2', '61.7', '40', '305.8', '83.7', '38.9', '11', '98', '50', '0.99', '99.3', '932491');
INSERT INTO `list_view_table` VALUES ('正常运行', '005', '1#8A逆变器', '2017-03-06 10:40:06', '647.2', '61.7', '40', '305.8', '83.7', '38.9', '11', '98', '50', '0.99', '99.3', '932491');
INSERT INTO `list_view_table` VALUES ('正常运行', '006', '1#8A逆变器', '2017-03-06 10:40:06', '647.2', '61.7', '40', '305.8', '83.7', '38.9', '11', '98', '50', '0.99', '99.3', '932491');
INSERT INTO `list_view_table` VALUES ('正常运行', '007', '1#8A逆变器', '2017-03-06 10:40:06', '647.2', '61.7', '40', '305.8', '83.7', '38.9', '11', '98', '50', '0.99', '99.3', '932491');
INSERT INTO `list_view_table` VALUES ('正常运行', '008', '1#8A逆变器', '2017-03-06 10:40:06', '647.2', '61.7', '40', '305.8', '83.7', '38.9', '11', '98', '50', '0.99', '99.3', '932491');
INSERT INTO `list_view_table` VALUES ('正常运行', '009', '1#8A逆变器', '2017-03-06 10:40:06', '647.2', '61.7', '40', '305.8', '83.7', '38.9', '11', '98', '50', '0.99', '99.3', '932491');
INSERT INTO `list_view_table` VALUES ('正常运行', '010', '1#8A逆变器', '2017-03-06 10:40:06', '647.2', '61.7', '40', '305.8', '83.7', '38.9', '11', '98', '50', '0.99', '99.3', '932491');
INSERT INTO `list_view_table` VALUES ('正常运行', '011', '1#8A逆变器', '2017-03-06 10:40:06', '647.2', '61.7', '40', '305.8', '83.7', '38.9', '11', '98', '50', '0.99', '99.3', '932491');
INSERT INTO `list_view_table` VALUES ('正常运行', '012', '1#8A逆变器', '2017-03-06 10:40:06', '647.2', '61.7', '40', '305.8', '83.7', '38.9', '11', '98', '50', '0.99', '99.3', '932491');
INSERT INTO `list_view_table` VALUES ('正常运行', '013', '1#8A逆变器', '2017-03-06 10:40:06', '647.2', '61.7', '40', '305.8', '83.7', '38.9', '11', '98', '50', '0.99', '99.3', '932491');
INSERT INTO `list_view_table` VALUES ('正常运行', '014', '1#8A逆变器', '2017-03-06 10:40:06', '647.2', '61.7', '40', '305.8', '83.7', '38.9', '11', '98', '50', '0.99', '99.3', '932491');
INSERT INTO `list_view_table` VALUES ('正常运行', '015', '1#8A逆变器', '2017-03-06 10:40:06', '647.2', '61.7', '40', '305.8', '83.7', '38.9', '11', '98', '50', '0.99', '99.3', '932491');
INSERT INTO `list_view_table` VALUES ('正常运行', '016', '1#8A逆变器', '2017-03-06 10:40:06', '647.2', '61.7', '40', '305.8', '83.7', '38.9', '11', '98', '50', '0.99', '99.3', '932491');
