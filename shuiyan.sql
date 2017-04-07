/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : shuiyan

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-04-06 14:05:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_mail` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@ideait.net');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `pid` int(11) NOT NULL,
  `href` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '水研新闻', '0', '');
INSERT INTO `menu` VALUES ('2', '添加新闻', '1', 'admin/news/addNews');
INSERT INTO `menu` VALUES ('3', '新闻列表', '1', 'admin/news/newslist');
INSERT INTO `menu` VALUES ('4', '信息管理', '0', null);
INSERT INTO `menu` VALUES ('5', '通知公告', '4', 'admin/news/addNews');
INSERT INTO `menu` VALUES ('6', '菜单4', '4', 'admin/news/addNews');
INSERT INTO `menu` VALUES ('8', '走进水研', '0', null);
INSERT INTO `menu` VALUES ('9', '水研村简介', '8', 'admin/news/addNews');
INSERT INTO `menu` VALUES ('10', '水研娱乐天地', '0', null);
INSERT INTO `menu` VALUES ('11', '搞笑视频', '10', 'admin/news/addNews');
INSERT INTO `menu` VALUES ('12', '奇闻趣事', '10', 'admin/news/addNews');
INSERT INTO `menu` VALUES ('13', '系统管理', '0', null);
INSERT INTO `menu` VALUES ('14', '会员管理', '0', null);

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `push_time` datetime DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `source` varchar(100) DEFAULT NULL,
  `carousel` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='carousel 为轮播图显示';

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('13', '2017-04-06 10:00:09', 'admin', '2017年4月6号标题', '这是今天上午的一条新闻吧', null, '水研人才库', '1');
INSERT INTO `news` VALUES ('10', '2017-04-05 18:15:50', 'admin', '搜索搜索搜索', '搜索', null, '水研人才库', '1');
INSERT INTO `news` VALUES ('11', '2017-04-05 18:16:04', 'admin', '是是是', '是是是', null, '水研人才库', '0');
INSERT INTO `news` VALUES ('12', '2017-04-05 18:16:19', 'admin', '这次不一样吧', '哦哦哦好吧', null, '水研人才库', '1');
INSERT INTO `news` VALUES ('14', '2017-04-06 10:00:40', 'admin', '2017再来一条', '走起 不一样的未来', null, '水研人才库', '0');
INSERT INTO `news` VALUES ('15', '2017-04-06 10:02:09', 'admin', '第1集剧情', '必须要多一些新闻  才好弄分页', null, '水研人才库', '0');
INSERT INTO `news` VALUES ('16', '2017-04-06 10:02:39', 'admin', '呈现出第二季', '带回家倒计时第三季度', null, '水研人才库', '0');
INSERT INTO `news` VALUES ('17', '2017-04-06 10:02:50', 'admin', '所得到的', '等丰富的非的方法', null, '水研人才库', '1');
INSERT INTO `news` VALUES ('18', '2017-04-06 10:03:23', 'admin', '顶顶顶顶', '电放费苟富贵覆盖', null, '水研人才库', '1');
INSERT INTO `news` VALUES ('19', '2017-04-06 10:03:39', 'admin', '离开了快来咯', '动环监控的热很贵很好', null, '水研人才库', '0');
INSERT INTO `news` VALUES ('20', '2017-04-06 10:03:53', 'admin', '黄河和共和国和', '共和国哈哈哈江湖救急', null, '水研人才库', '1');
INSERT INTO `news` VALUES ('21', '2017-04-06 10:04:13', 'admin', '拉开了付款官方老顾客', '分隔符覆盖骨很贵很好和或或韩国货哈哈哈哈或', null, '水研人才库', '1');
INSERT INTO `news` VALUES ('22', '2017-04-06 10:04:21', 'admin', '为鹅鹅鹅', '巍峨鹅鹅鹅', null, '水研人才库', '0');
INSERT INTO `news` VALUES ('23', '2017-04-06 10:04:35', 'admin', '牵牵牵手', '啥答案得到的的', null, '水研人才库', '1');
INSERT INTO `news` VALUES ('24', '2017-04-06 10:05:07', 'admin', '动感地带个', '风格的非官方收费', null, '水研人才库', '1');
INSERT INTO `news` VALUES ('25', '2017-04-06 10:05:21', 'admin', '即可看看', '共和国哈哈交换机黑胡椒', null, '水研人才库', '1');
INSERT INTO `news` VALUES ('26', '2017-04-06 10:05:32', 'admin', '阿达阿达的', '分分合合韩国国会', null, '水研人才库', '1');
INSERT INTO `news` VALUES ('27', '2017-04-06 10:05:32', 'admin', '阿达阿达的', '分分合合韩国国会', '', '水研人才库', '1');
INSERT INTO `news` VALUES ('28', '2017-04-06 10:05:32', 'admin', '阿达阿达的', '分分合合韩国国会', '', '水研人才库', '1');
INSERT INTO `news` VALUES ('29', '2017-04-06 10:05:32', 'admin', '阿达阿达2014的', '分分合合韩国国会', '', '水研人才库', '1');
INSERT INTO `news` VALUES ('30', '2017-04-06 10:05:32', 'admin', '阿达阿达2014的', '分分合合2014国会', '', '水研人才库', '1');
INSERT INTO `news` VALUES ('31', '2017-04-06 10:05:32', 'admin', '阿达阿达2014dfd的', '分分合合2014国会', '', '水研人才库', '0');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `truename` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `user_headimg` varchar(255) DEFAULT NULL,
  `last_login_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('3', '小刘', null, null, '214340687@qq.com', '15224564786', null, null);
INSERT INTO `user` VALUES ('2', '小黄', null, null, null, '12354564565', null, null);
INSERT INTO `user` VALUES ('4', '小鸡鸡', null, null, null, '15245246554', null, null);
