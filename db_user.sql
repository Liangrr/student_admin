/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1_3306
Source Server Version : 50612
Source Host           : 127.0.0.1:3306
Source Database       : db_user

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2018-07-03 20:40:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_student
-- ----------------------------
DROP TABLE IF EXISTS `tb_student`;
CREATE TABLE `tb_student` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) CHARACTER SET utf8 NOT NULL,
  `sex` varchar(2) CHARACTER SET utf8 NOT NULL,
  `age` int(3) NOT NULL,
  `grade` varchar(3) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_student
-- ----------------------------
INSERT INTO `tb_student` VALUES ('20', 'sun', '女', '18', '78', 'asd0dsa', 'sadsadsa');
INSERT INTO `tb_student` VALUES ('22', 'wang', '女', '18', '78', 'asd0', 'asd');
INSERT INTO `tb_student` VALUES ('52', 'wang', '女', '18', '78', 'asd0', 'asd');
INSERT INTO `tb_student` VALUES ('73', 'liang', '男', '21', '86', 'liangrourui', '123456');
INSERT INTO `tb_student` VALUES ('74', 'das', '女', '69', '59', 'a123', 'a1');
INSERT INTO `tb_student` VALUES ('85', 'aaa', '男', '19', '67', 'al123', 'l123');
INSERT INTO `tb_student` VALUES ('88', 'sad', '男', '52', '18', 'a63', 'sad');
