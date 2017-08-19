/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50717
Source Host           : localhost:3306
Source Database       : ecms

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2017-08-19 15:14:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(20) NOT NULL,
  `admin_pass` varchar(32) NOT NULL,
  `true_name` varchar(20) NOT NULL,
  `admin_level` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_name` (`admin_name`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '超级管理员', '3');
INSERT INTO `admin` VALUES ('2', 'editor', '5aee9dbd2a188839105073571bee1b1f', '主编', '2');
INSERT INTO `admin` VALUES ('3', 'noraml', 'fea087517c26fadd409bd4b9dc642555', '新闻采编', '1');
INSERT INTO `admin` VALUES ('4', '123', '8stknev3j80vcbst9hdjrn1k91', '123', '3');
INSERT INTO `admin` VALUES ('5', '1234', '81dc9bdb52d04dc20036dbd8313ed055', '1234', '1');
INSERT INTO `admin` VALUES ('6', '111111111', '123', '111111111', '1');
INSERT INTO `admin` VALUES ('13', '32', '', '', '1');
INSERT INTO `admin` VALUES ('14', '789', '789', '789', '1');
INSERT INTO `admin` VALUES ('15', '21', '', '', '1');

-- ----------------------------
-- Table structure for `article`
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `art_subject` varchar(80) NOT NULL,
  `art_content` mediumtext NOT NULL,
  `cate_id` smallint(5) unsigned NOT NULL,
  `add_time` int(10) unsigned NOT NULL,
  `ptr_id` smallint(5) unsigned NOT NULL,
  `admin_id` smallint(5) unsigned NOT NULL,
  `cmt_num` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `is_checked` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `filepath` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('1', '456456', '<p>456456456<br/></p>', '3', '1497233864', '1', '1', '0', '1', '1', '');
INSERT INTO `article` VALUES ('2', 'asd asf dsdf sd sadf', '<p>fasd fsdg sdf gdfh ggh</p>', '1', '1497238164', '1', '1', '0', '0', '1', '');
INSERT INTO `article` VALUES ('3', 'zzzzz', '<p>456456456<br/></p>', '3', '1497251074', '1', '1', '0', '1', '0', '');
INSERT INTO `article` VALUES ('4', 'asdasd', 'asdasdasdasd', '2', '18456456', '1', '1', '0', '1', '0', '');
INSERT INTO `article` VALUES ('5', 'sa fdsa ', 'asd asd ', '1', '1497251074', '1', '1', '0', '1', '0', '');
INSERT INTO `article` VALUES ('6', '146312', '213213', '2', '1497252074', '1', '1', '0', '1', '0', '');
INSERT INTO `article` VALUES ('7', 'hhh', '<p>1230</p>', '1', '1497357016', '1', '1', '0', '1', '0', '');
INSERT INTO `article` VALUES ('8', '87', '<p>78999999999999999</p>', '6', '1497403243', '2', '1', '0', '1', '0', '');
INSERT INTO `article` VALUES ('9', '655+5+', '<p>56+5+</p>', '1', '1497508865', '1', '1', '0', '1', '0', '');
INSERT INTO `article` VALUES ('10', '4596456456', '<p>4564564</p>', '1', '1497582500', '1', '1', '0', '0', '0', '2017-06-16/edca6c51b20f55c1f420ddaf530159e4.html');
INSERT INTO `article` VALUES ('11', '98+98++++++++++++++', '<p>98++++++++++++++++++++++</p>', '1', '1497597933', '1', '1', '0', '0', '1', '2017-06-16/cb456d67e0cbfa3fdb5af72719ebe2ce.html');
INSERT INTO `article` VALUES ('12', 'ewrwer bwe r', '<p>werwerwerwerrr</p>', '1', '1497604435', '1', '1', '0', '0', '1', '2017-06-16/572f945d8fd59f6c3a8ac8a070b1d0bf.html');

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(30) NOT NULL,
  `parent_id` smallint(6) NOT NULL DEFAULT '0',
  `position` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', '国内新闻', '0', '0');
INSERT INTO `category` VALUES ('2', '国际新闻', '0', '0');
INSERT INTO `category` VALUES ('3', '体育新闻', '0', '0');
INSERT INTO `category` VALUES ('4', '内地新闻', '1', '2');
INSERT INTO `category` VALUES ('5', '港澳台新闻', '1', '0');
INSERT INTO `category` VALUES ('6', '最新消息', '2', '0');
INSERT INTO `category` VALUES ('7', '环球视野', '2', '0');
INSERT INTO `category` VALUES ('8', '中国国足', '3', '0');
INSERT INTO `category` VALUES ('9', '乡村新闻', '0', '0');
INSERT INTO `category` VALUES ('10', '国内新闻', '0', '0');
INSERT INTO `category` VALUES ('11', '国际新闻', '0', '0');
INSERT INTO `category` VALUES ('12', '体育新闻', '0', '0');
INSERT INTO `category` VALUES ('13', '内地新闻', '1', '0');
INSERT INTO `category` VALUES ('14', '港澳台新闻', '1', '0');
INSERT INTO `category` VALUES ('15', '最新消息', '2', '0');
INSERT INTO `category` VALUES ('16', '环球视野', '2', '0');

-- ----------------------------
-- Table structure for `comment`
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cmt_content` varchar(255) NOT NULL,
  `mem_id` mediumint(8) unsigned NOT NULL,
  `art_id` int(10) unsigned NOT NULL,
  `add_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('1', '这是评论测试1', '5', '13', '1497584118');
INSERT INTO `comment` VALUES ('2', '这是评论测试2', '1', '13', '1497584118');
INSERT INTO `comment` VALUES ('3', '这是评论测试3', '7', '13', '1497584118');
INSERT INTO `comment` VALUES ('4', '这是评论测试4', '2', '13', '1497584118');
INSERT INTO `comment` VALUES ('5', ' 654554', '3', '44', '1497604381');
INSERT INTO `comment` VALUES ('6', '546 45 ', '3', '13', '1497607021');
INSERT INTO `comment` VALUES ('7', '456456456', '3', '13', '1497607033');
INSERT INTO `comment` VALUES ('8', '4566', '3', '13', '1497667147');

-- ----------------------------
-- Table structure for `images`
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `info` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of images
-- ----------------------------
INSERT INTO `images` VALUES ('1', '\"id\":11010,\"name\":\"商品1\",\"image\":[\"images/1.jpg\",\"images/2.jpg\",\"images/3.jpg\"]');
INSERT INTO `images` VALUES ('2', '\"id\":15622,\"name\":\"商品2\",\"image\":[\"images/3.jpg\",\"images/4.jpg\"]');
INSERT INTO `images` VALUES ('3', '\"id\":17966,\"name\":\"商品2\",\"image\":[\"images/5.jpg\",\"images/6.jpg\",\"images/7.jpg\",\"images/8.jpg\"]');

-- ----------------------------
-- Table structure for `member`
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `mem_name` varchar(30) NOT NULL,
  `mem_pass` varchar(32) NOT NULL,
  `mem_face` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mem_name` (`mem_name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('1', 'tom', '34b7da764b21d298ef307d04d8152dc5', '1.jpg');
INSERT INTO `member` VALUES ('2', 'john', '34b7da764b21d298ef307d04d8152dc5', '2.jpg');
INSERT INTO `member` VALUES ('3', 'rose', '34b7da764b21d298ef307d04d8152dc5', '3.jpg');
INSERT INTO `member` VALUES ('4', 'ben', '34b7da764b21d298ef307d04d8152dc5', '4.jpg');
INSERT INTO `member` VALUES ('5', 'david', '34b7da764b21d298ef307d04d8152dc5', '5.jpg');
INSERT INTO `member` VALUES ('6', 'frank', '34b7da764b21d298ef307d04d8152dc5', '6.jpg');
INSERT INTO `member` VALUES ('7', 'ellise', '34b7da764b21d298ef307d04d8152dc5', '7.jpg');

-- ----------------------------
-- Table structure for `partner`
-- ----------------------------
DROP TABLE IF EXISTS `partner`;
CREATE TABLE `partner` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `ptr_name` varchar(30) NOT NULL,
  `ptr_url` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of partner
-- ----------------------------
INSERT INTO `partner` VALUES ('1', '新浪网', 'http://www.sina.com.cn');
INSERT INTO `partner` VALUES ('2', '网易', 'http://www.163.com');
INSERT INTO `partner` VALUES ('3', '腾讯网', 'http://www.qq.com');
INSERT INTO `partner` VALUES ('4', '新华网', 'http://www.xinhuanet.com');
INSERT INTO `partner` VALUES ('5', '新浪网', 'http://www.sina.com.cn');
INSERT INTO `partner` VALUES ('6', '网易', 'http://www.163.com');
INSERT INTO `partner` VALUES ('7', '腾讯网', 'http://www.qq.com');
INSERT INTO `partner` VALUES ('8', '新华网', 'http://www.xinhuanet.com');
