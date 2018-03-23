/*
Navicat MySQL Data Transfer

Source Server         : RWJ
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : ne-laravel

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-01-28 15:14:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for banner
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '轮播图',
  `order` int(255) DEFAULT NULL COMMENT '排序',
  `photo` varchar(255) DEFAULT NULL COMMENT '图片',
  `banner_type` varchar(255) DEFAULT NULL COMMENT '类型',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `content` varchar(255) DEFAULT NULL COMMENT '内容',
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0' COMMENT '状态',
  `current` enum('current','active') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of banner
-- ----------------------------
INSERT INTO `banner` VALUES ('17', '6', 'images/banner-6.jpg', '首页', '首页轮播', '轮播', '2018-01-08 16:23:56', '2018-01-08 16:23:56', '1', 'current');
INSERT INTO `banner` VALUES ('2', '1', 'images/banner-1.jpg', '首页', '首页轮播图', '轮播', '2018-01-04 20:02:36', '2018-01-04 20:02:36', '1', '');
INSERT INTO `banner` VALUES ('3', '2', 'images/banner-2.jpg', '首页', '首页轮播', '轮播', '2018-01-04 21:01:26', '2018-01-04 21:01:26', '1', null);
INSERT INTO `banner` VALUES ('4', '3', 'images/banner-3.jpg', '首页', '首页轮播', '轮播', '2018-01-04 21:01:48', '2018-01-04 21:01:48', '1', null);
INSERT INTO `banner` VALUES ('15', '4', 'images/banner-4.jpg', '首页', '轮播', '轮播', '2018-01-08 16:23:08', '2018-01-08 16:23:08', '1', null);
INSERT INTO `banner` VALUES ('16', '5', 'images/banner-5.jpg', '首页', '首页轮播', '轮播', '2018-01-08 16:23:43', '2018-01-08 16:23:43', '1', null);
INSERT INTO `banner` VALUES ('18', '0', 'images/lcbO6cQQvq.jpg', '品牌商', 'Adidas制造商', '35元起', '2018-01-08 19:07:51', '2018-01-08 19:07:51', '1', null);
INSERT INTO `banner` VALUES ('19', '1', 'images/AzwyGqYwl3.jpg', '品牌商', 'UGG制造商', '129元起', '2018-01-08 19:08:41', '2018-01-08 19:08:41', '1', null);
INSERT INTO `banner` VALUES ('20', '2', 'images/OfL9i01jvV.jpg', '品牌商', '新秀丽制造商', '49元起', '2018-01-08 19:09:22', '2018-01-08 19:09:22', '1', null);
INSERT INTO `banner` VALUES ('21', '3', 'images/pRcUiCYhX0.jpg', '品牌商', 'MUJI制造商', '12.9元起', '2018-01-08 19:10:04', '2018-01-08 19:10:04', '1', null);
INSERT INTO `banner` VALUES ('22', '0', 'images/x2FscSh0ZQ.jpg', '类别展示', '居家', '居家', '2018-01-10 16:24:47', '2018-01-10 16:24:47', '1', 'active');
INSERT INTO `banner` VALUES ('23', '1', 'images/l0lUH0H5dK.jpg', '类别展示', '餐厨', '餐厨', '2018-01-10 16:25:23', '2018-01-24 20:46:08', '1', 'active');
INSERT INTO `banner` VALUES ('24', '2', 'images/Ngud1rHDDa.jpg', '类别展示', '配件', '配件', '2018-01-10 16:25:48', '2018-01-10 16:25:48', '1', 'active');
INSERT INTO `banner` VALUES ('25', '3', 'images/GbUw6l1NnW.jpg', '类别展示', '服装', '服装', '2018-01-10 16:26:14', '2018-01-10 16:26:14', '1', 'active');
INSERT INTO `banner` VALUES ('26', '4', 'images/wuz635dleC.jpg', '类别展示', '电器', '电器', '2018-01-10 16:26:34', '2018-01-10 16:26:34', '1', 'active');
INSERT INTO `banner` VALUES ('27', '5', 'images/AhbMvsjQTd.jpg', '类别展示', '洗护', '洗护', '2018-01-10 16:27:02', '2018-01-10 16:27:02', '1', 'active');
INSERT INTO `banner` VALUES ('28', '6', 'images/J3oyQx5jdI.jpg', '类别展示', '杂货', '杂货', '2018-01-10 16:27:26', '2018-01-10 16:27:26', '1', 'active');
INSERT INTO `banner` VALUES ('29', '7', 'images/EJfAZNmNNP.jpg', '类别展示', '饮食', '饮食', '2018-01-10 16:27:50', '2018-01-10 16:27:50', '1', 'active');
INSERT INTO `banner` VALUES ('30', '8', 'images/3EztKxIlwt.jpg', '类别展示', '婴童', '婴童', '2018-01-10 16:28:15', '2018-01-10 16:28:15', '1', 'active');
INSERT INTO `banner` VALUES ('31', '9', 'images/fLYP936YZp.jpg', '类别展示', '志趣', '志趣', '2018-01-10 16:28:46', '2018-01-10 16:28:46', '1', 'active');
INSERT INTO `banner` VALUES ('32', '10', 'images/FybW4QjqJr.jpg', '类别展示', '居家', '居家', '2018-01-12 11:10:11', '2018-01-12 11:10:11', '1', null);
INSERT INTO `banner` VALUES ('35', '7', 'images/banner-7.jpg', '首页', '3423', '343434', '2018-01-25 19:32:30', '2018-01-25 19:32:30', '1', null);

-- ----------------------------
-- Table structure for circums
-- ----------------------------
DROP TABLE IF EXISTS `circums`;
CREATE TABLE `circums` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '产品详情表',
  `cir_id` int(11) NOT NULL COMMENT '产品id',
  `cir_ty` varchar(255) NOT NULL COMMENT '产品类id',
  `cir_img` longtext NOT NULL COMMENT '产品详情图',
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of circums
-- ----------------------------
INSERT INTO `circums` VALUES ('5', '5', '春风系列', '<div class=\"promCt\"></div><p><br/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/4d4522bfac5edd41159ff1ad255988ba.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/863585d8444ca3075386d7549c558abe.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/235e59b8fb3c2511728b81527fdf2c26.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/2982a5937a613ba3d6af094a7e8498b5.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/fcd4a7c0b2c48445abf9c5a1462e78bb.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/b2be6bd734158173de129fb58f947c7a.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/f33e11d4c5d0a61169acdff1592af3a4.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/c524ab7d78e1c66b46536566e14dc460.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/09d45776ee31da7be25c107a7730b6a5.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/e5874173a6ed9bfa49bb9184ce368dc3.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/8712ab59af845744cdcfe0cf528ce8ce.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/fb298eb5bebe111e455d09a840e2a643.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/95433970ab1c99b64334aa4b3dd6b6ef.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/e0cdf55c8682d36349c2d2806d84d447.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/7cfda28a60c119c64118c58234176833.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/10c5ea3cf6f398d715baeece3ac9475d.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/5a0802cb1a766887157ea6caac180d83.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/ff0bfc268b3f70b93d89e7bdadc77fe0.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/a5204860d130bfad605230a46d2cd2a8.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/b1ebae64a9592f88a7e0d9def281e796.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/576f0478a9b2866742e2ea944361803b.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/29a4e055e5deda2cca2ba6dabadbb5fb.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/32dc95635e313e097e76caa37907ae49.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/14802509bc174566ec4926043dbc672f.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/d9d2a4ce3c9337f7a1cd45ead05e0738.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/d2cbb94ced2c2b959e05d5aec2e6b14c.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/de610a3179db3bad154aaec1bdb5c010.jpg\"/></p><p><br/></p>', '2018-01-08 19:24:51', '2018-01-08 19:24:51');
INSERT INTO `circums` VALUES ('6', '6', '春风系列', '<div class=\"promCt\"><br/></div><br/><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/8dc76110e408d0bf50b36b4c995880d7.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/63e00b6a9e43091129af59b88275f741.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/af5f4390a7c32a7cfb7b0856332a2432.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/46f0c8b155150b8a90abde1a2dfb45ce.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/07baaee48b5b9a77083171eb5e36a1bf.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/685bd92600d511235c3bd1be48a7bf33.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/246181cf4ff320c4a1554c367cfe343b.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/37a471534d64eb4aa8387f4bd8e16a40.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/f5fe1adfffb41f200bc033f9296669c7.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/00c5fd703990758f5149e25349403b13.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/8ac0e78f7c3ecde7ad9f8f2ae2b221a4.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/658763b05e3106e18122abb46e39e45b.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/fb481c64973b880b9581565411e8feed.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/ae69ed38f762b23a26f1135921b3d16f.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/4999a0993bb431031665aaa65ce5098f.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/f3b942c936fcb5ac548fce506e3b4349.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/5df13e1b290a03acbf1e00ab22da7d25.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/b6e84b992480441d36f200c05b7d3dd4.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/1566b836c71ad23b59e27712b2e0656a.jpg\"/></p><p><br/></p>', '2018-01-08 19:33:39', '2018-01-08 19:33:39');
INSERT INTO `circums` VALUES ('7', '7', '春风系列', '<div class=\"promCt\"><br/></div><br/><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/8fb9b2741b4b44964a2a3a098a703a50.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/1452cbf1075291255e927741f250255c.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/461d431f5ef0006940a734af1b3112c5.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/3bcaec371c4eba46c355629ee2119cb2.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/ca48177cbc9298b9f014e2fd09762eb1.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/c526606b10a5c1c9d896c112bbec8cee.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/198b61f9c951b76120943251fa619559.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/cf6a9668066237453046f3006b5425e5.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/a28694d31b95d375bb14abfda1323c98.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/35ae8f1899ae6b4b873ecf02fdc70d6e.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/d29bcb8acfad287c1a550c27dc21c2e1.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/a350c3f7edd1e14a9e4e6c84c5bb5440.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/810015289c1f31c05bf521d116013d3d.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/36662661b2d1644cf219cd62ec3151bb.jpg\"/></p><p><br/></p>', '2018-01-08 19:38:27', '2018-01-08 19:38:27');
INSERT INTO `circums` VALUES ('8', '8', '食材', '<div class=\"promCt\"></div><p><br/></p><br/><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/4043f62ded2fd90614102ec38228dcea.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/4c9e5334d615f07eddbc2bbf33304a3a.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/35eb201729d67157cc277a090f417cf6.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/f19db165d99586bef0135eb4b152a80b.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/051166fb4eb64b8ef032b5ef8eede434.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/86c93c4174f3a46babf809ad3f9933ff.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/5eb2f257e51a488745a9547bcdfa2d6f.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/2a57f7528ba71e3eee27edf7f449b912.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/4e2f47c4e7a0afe371d27dbb7cc055b8.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/a5a15e68f43c9c7eb77fcdffa03d45ef.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/8f51884b05e1af12246972486ec58a9d.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/aa63dac557eaab6a69cb8992d6ed6413.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/4da3c7f5c3db81a009d77fbe248c4775.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/e20ae12ea1f6e51a7f67722f1b12a4bb.jpg\"/></p><p><img class=\"img-lazyload short img-lazyloaded\" src=\"http://yanxuan.nosdn.127.net/0f06faf0b9df6b8f66f0e96b463297d3.jpg\"/></p><p><br/></p>', '2018-01-08 19:44:18', '2018-01-08 19:44:18');
INSERT INTO `circums` VALUES ('10', '21', '锅具', '<p>&nbsp;bnjkbndgfgghgfhgfhfgfgh<br/></p>', '2018-01-25 19:44:02', '2018-01-25 19:44:02');

-- ----------------------------
-- Table structure for circums_order
-- ----------------------------
DROP TABLE IF EXISTS `circums_order`;
CREATE TABLE `circums_order` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '产品详情--规格',
  `cir_ord_id` int(11) NOT NULL COMMENT '产品id',
  `cir_ty` varchar(255) NOT NULL COMMENT '产品类id',
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `size` varchar(255) DEFAULT NULL COMMENT '尺寸大小',
  `number` varchar(255) DEFAULT NULL COMMENT '数量',
  `depth` varchar(255) DEFAULT NULL COMMENT '深度',
  `weight` varchar(255) DEFAULT NULL COMMENT '重量',
  `texture` varchar(255) DEFAULT NULL COMMENT '材质',
  `plus` varchar(255) DEFAULT NULL COMMENT '面料',
  `fill` varchar(255) DEFAULT NULL COMMENT '填充',
  `environment` varchar(255) DEFAULT NULL COMMENT '适用环境',
  `color` varchar(255) DEFAULT NULL COMMENT '颜色',
  `style` varchar(255) DEFAULT NULL COMMENT '风格',
  `functionn` varchar(255) DEFAULT NULL COMMENT '功能',
  `is_assemble` varchar(255) DEFAULT NULL COMMENT '是否（组装or安装）',
  `assemble` varchar(255) DEFAULT NULL COMMENT '(组装 or 安装)方式',
  `place` varchar(255) DEFAULT NULL COMMENT '产地',
  `criterion` varchar(255) DEFAULT NULL COMMENT '标准',
  `security` varchar(255) DEFAULT NULL COMMENT '安全类别',
  `prompt` varchar(255) DEFAULT NULL COMMENT '温馨提示',
  `attention` varchar(255) DEFAULT NULL COMMENT '特别提醒',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of circums_order
-- ----------------------------
INSERT INTO `circums_order` VALUES ('6', '5', '春风安全套超润滑持久激爽15件', '', '', '1', '1', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `circums_order` VALUES ('7', '21', '不锈钢汤锅 6L超大容量', '', '', '1', '', '1', '', '1', '', '1', '', '1', '', '', '', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for commentary
-- ----------------------------
DROP TABLE IF EXISTS `commentary`;
CREATE TABLE `commentary` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '评价',
  `pro_id` int(11) NOT NULL COMMENT '产品号',
  `user_id` int(11) NOT NULL COMMENT '用户信息',
  `order_id` int(11) NOT NULL COMMENT '订单号',
  `content` varchar(100) DEFAULT NULL COMMENT '评论内容',
  `show1` varchar(255) DEFAULT NULL COMMENT '评论图片展示',
  `show2` varchar(255) DEFAULT NULL,
  `show3` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL COMMENT '评论时间',
  `is_use` enum('1','0') NOT NULL DEFAULT '0' COMMENT '是否禁用',
  `supper` text COMMENT '服务反馈',
  `supper1` text COMMENT '追评-内容',
  `pic1` varchar(255) DEFAULT NULL COMMENT '追评-图片',
  `pic2` varchar(255) DEFAULT NULL,
  `pic3` varchar(255) DEFAULT NULL,
  `time2` datetime NOT NULL COMMENT '追评-时间',
  `reply` text,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of commentary
-- ----------------------------
INSERT INTO `commentary` VALUES ('5', '138', '1', '15', '还不错啊', null, null, null, '2018-01-21 17:52:06', '1', null, null, null, null, null, '0000-00-00 00:00:00', null, null);
INSERT INTO `commentary` VALUES ('6', '181', '1', '15', '还不错啊', null, null, null, '2018-01-21 17:52:06', '1', null, null, null, null, null, '0000-00-00 00:00:00', null, null);
INSERT INTO `commentary` VALUES ('7', '76', '1', '17', 'very good', null, null, null, '2018-01-22 09:44:00', '1', null, null, null, null, null, '0000-00-00 00:00:00', null, null);
INSERT INTO `commentary` VALUES ('13', '168', '1', '54', '还不错啊', null, null, null, '2018-01-25 19:51:46', '1', '\r\n                            谢谢', '一定还会再来的', null, null, null, '2018-01-25 19:52:33', null, null);

-- ----------------------------
-- Table structure for gl_order
-- ----------------------------
DROP TABLE IF EXISTS `gl_order`;
CREATE TABLE `gl_order` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '关联订单--产品',
  `order_id` varchar(255) DEFAULT NULL COMMENT '订单id',
  `goods_id` int(11) DEFAULT NULL COMMENT '产品id',
  `name` varchar(255) DEFAULT NULL COMMENT '名',
  `image` varchar(255) DEFAULT NULL COMMENT '缩略图',
  `type` varchar(255) DEFAULT NULL COMMENT '类别',
  `spec` varchar(255) DEFAULT NULL COMMENT '规格',
  `price` varchar(255) DEFAULT NULL COMMENT '商品单价',
  `count` int(11) DEFAULT NULL COMMENT '数量',
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gl_order
-- ----------------------------
INSERT INTO `gl_order` VALUES ('28', '53', '157', '面部美容组合', 'images/goods/ykHR8rFbPO.png', '面部护理', '美眼笔+脸部按摩仪', '329', '1', '2018-01-25 12:40:59', '2018-01-25 12:40:59');
INSERT INTO `gl_order` VALUES ('29', '53', '148', 'IH电饭煲', 'images/goods/opQMbomlm7.png', '厨房电器', '4L', '499', '1', '2018-01-25 12:40:59', '2018-01-25 12:40:59');
INSERT INTO `gl_order` VALUES ('30', '54', '168', '100年传世珐琅锅 马卡龙系列', 'images/goods/TGky0vKsDu.png', '黑凤梨系列', '磨白沙/有盖', '359', '3', '2018-01-25 19:50:43', '2018-01-25 19:50:43');

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '产品列表',
  `name` varchar(120) NOT NULL COMMENT '产品名',
  `goods_sn` varchar(60) DEFAULT NULL COMMENT '货号',
  `goods_desc` varchar(255) DEFAULT NULL COMMENT '商品详细描述',
  `type` text COMMENT '产品类别',
  `created_at` datetime DEFAULT NULL COMMENT '上架时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  `goods_img1` varchar(255) DEFAULT NULL COMMENT '图片名称',
  `goods_img2` varchar(255) DEFAULT NULL COMMENT '图片名称',
  `goods_img3` varchar(255) DEFAULT NULL COMMENT '图片名称',
  `goods_img4` varchar(255) DEFAULT NULL COMMENT '图片名称',
  `goods_img5` varchar(255) DEFAULT NULL COMMENT '图片名称',
  `is_best` enum('1','0') DEFAULT '0' COMMENT '是否精品',
  `is_new` enum('1','0') DEFAULT '0' COMMENT '是否新品',
  `is_hot` enum('1','0') DEFAULT '0' COMMENT '是否热销',
  `is_promote` enum('1','0') DEFAULT '0' COMMENT '是否低价促销',
  `is_putaway` enum('1','0') DEFAULT '0' COMMENT '是否上架',
  `is_pinkage` enum('1','0') DEFAULT '0' COMMENT '是否包邮',
  `maker` varchar(255) NOT NULL COMMENT '制造商',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=223 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('5', '春风安全套超润滑持久激爽15件', '5a53540d297df', '新品', '春风系列', '2018-01-08 19:20:46', '2018-01-08 19:20:46', 'images/goods/RhBwCIK8cB.png', 'images/goods/GJ7WzpiBqF.jpg', 'images/goods/NZOtjz9nbA.jpg', 'images/goods/B1nVCiLVnO.jpg', 'images/goods/fVRgXVnTLa.jpg', '1', '1', '1', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('6', '春风安全套超薄零度雾薄9件', '5a5356be0f753', '新品', '春风系列', '2018-01-08 19:32:15', '2018-01-08 19:32:15', 'images/goods/oFwdR43lOP.png', 'images/goods/RMsw8blEVc.jpg', 'images/goods/DIbb9G034m.jpg', 'images/goods/ftDFTe3vAc.jpg', 'images/goods/yXR5pNc177.jpg', '1', '1', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('7', '20只装 致薄0.03 天然胶乳橡胶避孕套', '5a5357cfd5b45', '新品', '春风系列', '2018-01-08 19:36:48', '2018-01-08 19:36:48', 'images/goods/e0cOfKYC3L.png', 'images/goods/5Cp3XVsks1.jpg', 'images/goods/Ej0IsV179Q.jpg', 'images/goods/4lILExn7lR.jpg', 'images/goods/E7amTeDTTP.jpg', '1', '1', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('8', '台湾眷村酱面', '5a5358d734479', '新品', '食材', '2018-01-08 19:41:12', '2018-01-08 19:41:12', 'images/goods/NzAaAQTbn3.png', 'images/goods/UNIsZfc1S9.png', 'images/goods/MvRyB6bDeg.jpg', 'images/goods/IZpeS1VOOA.jpg', 'images/goods/lXALPqGS1M.jpg', '1', '1', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('9', '2条装 新年红男式丝滑莫代尔平角内裤', '5a5416fd31fc2', '新品', '内裤', '2018-01-09 09:12:30', '2018-01-09 09:12:30', 'images/goods/N5x8uekkoE.jpg', 'images/goods/iYnaBeOYsg.jpg', 'images/goods/9g2kOP0qL4.jpg', 'images/goods/SwWOrCDSPI.png', 'images/goods/izL0DYeh4G.png', '1', '1', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('10', '网易智造减压按摩腰靠', '5a5417c438475', '新品', '个护健康', '2018-01-09 09:15:49', '2018-01-09 09:15:49', 'images/goods/XHV3IAeH8F.png', 'images/goods/cntzieKuBx.jpg', 'images/goods/b23yGUb0O5.jpg', 'images/goods/drEpPmQf03.jpg', 'images/goods/44rau02v60.jpg', '1', '1', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('11', '互联网大会同款 特型黄酒 500毫升', '5a54186b2105f', '新品', '酒水', '2018-01-09 09:18:36', '2018-01-09 09:18:36', 'images/goods/4KyLDJLVH6.png', 'images/goods/1iaHkio5pE.jpg', 'images/goods/NxWAqsrJ0l.jpg', 'images/goods/Wl0723QgpW.jpg', 'images/goods/7TGlxl1ZM9.jpg', '1', '1', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('12', '德式轻量保温杯', '5a54192a3dd4e', '新品', '水具酒具', '2018-01-09 09:21:47', '2018-01-09 09:21:47', 'images/goods/ugEyhWwTOu.png', 'images/goods/Z24kaQntvk.jpg', 'images/goods/iEBohIfQfJ.jpg', 'images/goods/dXrkowo1qp.jpg', 'images/goods/MmlCYlocz6.jpg', '1', '1', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('13', '莹雪珍珠 可调节式项链', '5a541b25cf5e5', '新品', '配饰', '2018-01-09 09:30:14', '2018-01-09 09:30:14', 'images/goods/SPbOBOno7c.png', 'images/goods/xMPh1il72l.jpg', 'images/goods/ENTJgXJN6y.jpg', 'images/goods/mqMmHvxdU6.jpg', 'images/goods/RcZW1kx8fV.jpg', '1', '1', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('14', '安全智能控温电热毯', '5a541ba99e86d', '日德进口原配件，安全调温', '被枕', '2018-01-09 09:32:26', '2018-01-09 09:32:26', 'images/goods/lx10SDqIPm.png', 'images/goods/H6Ffd99vaV.jpg', 'images/goods/KhMS8qYGyt.jpg', 'images/goods/6k8z6S7zNG.jpg', 'images/goods/O1PEvmb6w7.jpg', '0', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('15', '春宴干货礼盒', '5a541ce5cf47e', '原生原味 自然珍品', '食材', '2018-01-09 09:37:42', '2018-01-09 09:37:42', 'images/goods/uFFqza2WPP.png', 'images/goods/RBWOarVlv7.jpg', 'images/goods/P2iMOncNgA.jpg', 'images/goods/JQ1CrNPGUZ.jpg', 'images/goods/PiJTMo4ck2.jpg', '0', '0', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('16', '芙蓉海鲜汤', '5a541d6265120', '冻干鲜蔬，即食便捷', '食材', '2018-01-09 09:39:47', '2018-01-09 09:39:47', 'images/goods/UBxV5lCZVC.png', 'images/goods/brfMKxquVF.jpg', 'images/goods/sMWI0KeRQe.jpg', 'images/goods/qfgpmiBGFt.jpg', 'images/goods/hVgdnbmM8l.jpg', '0', '0', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('17', '黑凤梨宫廷奢华真丝四件套', '5a55cf7514fc3', '100%桑蚕丝，丝滑润肤', '床品件套', '2018-01-10 16:31:50', '2018-01-10 16:31:50', 'images/goods/NMxkdXXGXe.jpg', 'images/goods/C9gBAXzbxZ.jpg', 'images/goods/wXAWQaQaPo.jpg', 'images/goods/jETN2KPkZ9.jpg', 'images/goods/5e17klWWpf.jpg', '1', '1', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('18', '艾米 真皮沙发', '5a55d04a5a796', '定位高端,国际顶级品牌代工厂', '家具', '2018-01-10 16:35:23', '2018-01-10 16:35:23', 'images/goods/s1nUCbcWGK.png', 'images/goods/iNBDpvKJyH.jpg', 'images/goods/fMaQ8PVWQh.jpg', 'images/goods/og1WwNbhob.jpg', 'images/goods/UQRrkm6oBA.jpg', '1', '1', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('19', '3D透气高端弹簧床垫', '5a55d27e853b8', '仅售供应商建议价的1/6', '被枕', '2018-01-10 16:44:47', '2018-01-10 16:44:47', 'images/goods/CcwMvVRhPZ.png', 'images/goods/TqZ2t1WbeF.jpg', 'images/goods/gfUXY6rVBm.jpg', 'images/goods/8O5JnMzvQ1.jpg', 'images/goods/13cvZGQgxF.jpg', '1', '1', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('20', '日式和风懒人沙发', '5a55d32c18bf6', '优质莱卡和纯棉面料，和风家居新体验', '布艺软装', '2018-01-10 16:47:41', '2018-01-10 16:47:41', 'images/goods/vJ7mrcFGNa.png', 'images/goods/k6AuZURBT7.jpg', 'images/goods/1zYLiSNDma.jpg', 'images/goods/p3EYV278Ix.jpg', 'images/goods/yavxH6cbCo.jpg', '1', '1', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('21', '不锈钢汤锅 6L超大容量', '5a55d449dace0', '网易主厨精选，还原食之本味', '锅具', '2018-01-10 16:52:26', '2018-01-10 16:52:26', 'images/goods/KxIJfzy7lJ.png', 'images/goods/xz79u8SXtM.jpg', 'images/goods/dJxf0oMK9v.jpg', 'images/goods/00Z21QyAFJ.jpg', 'images/goods/O112eG7Zxq.jpg', '1', '1', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('22', '6件装 石趣功夫茶具套装', '5a55d4f11ba07', '原创设计，光滑润泽', '茶具', '2018-01-10 16:55:14', '2018-01-10 16:55:14', 'images/goods/CohUXdpp7B.png', 'images/goods/blH2IKI4q3.jpg', 'images/goods/KgjFMjNLBy.jpg', 'images/goods/rTqoRkTROz.jpg', 'images/goods/GIMfVtevfm.jpg', '1', '1', '1', '0', '1', '0', 'Wedgwood制造商');
INSERT INTO `goods` VALUES ('23', '双底面淘米洗菜篮', '5a55d585e5f6a', '浸洗&沥水，一盆两用', '功能厨具', '2018-01-10 16:57:42', '2018-01-10 16:57:42', 'images/goods/zz1Xavxevu.png', 'images/goods/QLsYGkOOnC.jpg', 'images/goods/kw9tkwO1x6.jpg', 'images/goods/ckAcF0huSO.jpg', 'images/goods/TrfU7ythr9.jpg', '1', '1', '1', '0', '1', '0', '贝印制造商');
INSERT INTO `goods` VALUES ('24', '不锈钢砂光保温饭盒 ', '5a55d5e909337', '热饭热菜热汤，配独立筷盒', '水具酒具', '2018-01-10 16:59:22', '2018-01-10 16:59:22', 'images/goods/YwsvtMgYuQ.png', 'images/goods/cvVrMnDBCM.jpg', 'images/goods/JuRU6KTWea.jpg', 'images/goods/drepm1fkmR.jpg', 'images/goods/ov9VN9WAL5.jpg', '1', '1', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('26', '男式加绒皮毛一体豆豆鞋', '5a55d7b7cab13', '澳洲羊毛，踩在云端的轻柔感', '男鞋', '2018-01-10 17:07:04', '2018-01-10 17:07:04', 'images/goods/g1tAM604GN.png', 'images/goods/PLlL0kMfqb.jpg', 'images/goods/i02nCWnBAM.jpg', 'images/goods/QQBoR8REGF.jpg', 'images/goods/pl7cFAjVOt.jpg', '1', '1', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('27', '丝感雪花扣平底女鞋', '5a55d864aeca5', '如真丝般鞋面，视觉顺滑触感温柔', '女鞋', '2018-01-10 17:09:57', '2018-01-10 17:09:57', 'images/goods/jn1Vs9MZs3.png', 'images/goods/pzQV7gKnsN.jpg', 'images/goods/oN11YcVqbA.png', 'images/goods/L1I3NxeRbv.jpg', 'images/goods/hNwaEllxrA.jpg', '1', '1', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('28', '20寸纯PC“铝框”(非全铝)登机箱', '5a55d9570f82e', '40升适中容量，铝质包角，牢固抗摔', '行李箱', '2018-01-10 17:14:00', '2018-01-10 17:14:00', 'images/goods/EsXt9aOR5Q.png', 'images/goods/TKYesRft6w.jpg', 'images/goods/fFFpGbe4LT.jpg', 'images/goods/k8itknCqTl.jpg', 'images/goods/YvPP1WGw0K.jpg', '1', '1', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('29', '多功能商务双肩包', '5a55de7a7fa9f', '17个功能分区，理性的完美展现', '男士包袋', '2018-01-10 17:35:55', '2018-01-10 17:35:55', 'images/goods/QkALiqkKUA.png', 'images/goods/cryImTY3vz.jpg', 'images/goods/C55exHIhDK.jpg', 'images/goods/VZ4drJtqSm.jpg', 'images/goods/ctBlEBeR72.jpg', '1', '1', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('30', '女式天丝棉弹小脚牛仔裤', '5a55f3bfe5f86', '仅售供应商建议价的1/6', '裤装', '2018-01-10 19:06:40', '2018-01-10 19:06:40', 'images/goods/oh3cvihhSu.png', 'images/goods/XpLUmk8YOO.jpg', 'images/goods/AVntEjGKYn.jpg', 'images/goods/ST51WqEOJF.jpg', 'images/goods/CeUMLStcRb.jpg', '1', '1', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('34', '女式咖啡碳+5℃升级保暖内衣', '5a56000fe0383', '这个冬季的御冷利器', '内衣', '2018-01-10 19:59:12', '2018-01-10 19:59:12', 'images/goods/jxWmPf7oh3.png', 'images/goods/61SdMf1Jff.jpg', 'images/goods/FXavwQT1f2.jpg', 'images/goods/QRhwvWWkjN.jpg', 'images/goods/Pu63Iq2Ddx.jpg', '1', '1', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('35', '男式小山羊绒圆领针织衫', '5a5600e1b9053', '感受小山羊绒触感，享受极致温柔', '毛衫', '2018-01-10 20:02:42', '2018-01-10 20:02:42', 'images/goods/q6K3cBHfIC.png', 'images/goods/bWdURXwLiJ.jpg', 'images/goods/eUvOLuIsod.jpg', 'images/goods/zVstqWw6lC.jpg', 'images/goods/fdo9dY9xzq.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('36', '2条装 男式基础平角内裤', '5a5601b82c6e4', '专业内裤制造商，自由U凸', '内衣', '2018-01-10 20:06:17', '2018-01-10 20:06:17', 'images/goods/SAYAYhE7Er.png', 'images/goods/JeDJaUphUK.jpg', 'images/goods/ZNeFZwvmaY.jpg', 'images/goods/SK9MOVqNmU.jpg', 'images/goods/RTUEwPlgNk.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('37', '网易智造马卡龙系列移动电源', '5a56024204858', '大容量 一流电芯 轻薄漂亮', '数码', '2018-01-10 20:08:35', '2018-01-10 20:08:35', 'images/goods/vJ1oS500RE.png', 'images/goods/0iLsu3eQsw.jpg', 'images/goods/nGxh7yMWZc.jpg', 'images/goods/M4ZIfsu2fG.jpg', 'images/goods/KL8UmfEVd3.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('38', '网易智造N520除螨吸尘器', '5a56098bf3f4d', '除螨吸尘 深层清洁', '生活电器', '2018-01-10 20:39:41', '2018-01-10 20:39:41', 'images/goods/zGKeGUo9n7.png', 'images/goods/nxh1pHpiNm.jpg', 'images/goods/ZEiMyUAFmB.jpg', 'images/goods/4dG8PjzvhV.jpg', 'images/goods/PlNZSxkJAv.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('39', '网易智造X3蓝牙HiFi耳机', '5a560a0ad03b8', 'HiFi 蓝牙无线 镀钛耳膜', '影音娱乐', '2018-01-10 20:41:47', '2018-01-10 20:41:47', 'images/goods/5OKPYyBltE.png', 'images/goods/G56KHwAghL.jpg', 'images/goods/gFW4fNJMsE.jpg', 'images/goods/5aWuwLHdWQ.jpg', 'images/goods/IvC9KNwXVp.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('40', '黑凤梨 体脂秤', '5a560ab7a8473', '超薄材质，精确记录', '生活电器', '2018-01-10 20:44:40', '2018-01-10 20:44:40', 'images/goods/CCvlNhzAsF.png', 'images/goods/s6axoFzysL.jpg', 'images/goods/VhsMd5TQk8.jpg', 'images/goods/c0PxTlTIgX.jpg', 'images/goods/DKF2ZYuaXD.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('41', '密吸式马桶圈垫', '5a56ba19e0446', '全涤长绒毛，方便拆卸隔水隔脏', '浴室用具', '2018-01-11 09:12:58', '2018-01-11 09:12:58', 'images/goods/PvCgRF5F9q.png', 'images/goods/DSsEeKOpX2.jpg', 'images/goods/BR2ITh9hp7.jpg', 'images/goods/dHxzQaNY5K.jpg', 'images/goods/KkTUdnDhBi.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('42', '墨玉 日常妆容化妆套刷', '5a56ba9838b63', '精致五刷，打造气质底妆', '美妆', '2018-01-11 09:15:05', '2018-01-11 09:15:05', 'images/goods/pYJ9bzZbPE.png', 'images/goods/T3rrZFUs0l.jpg', 'images/goods/MLBm3BLGag.jpg', 'images/goods/OF0YWnBKe5.jpg', 'images/goods/veYKb7jlTV.jpg', '1', '1', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('43', '猪鬃气垫按摩梳', '5a56bb0ad4d26', '猪鬃顺发，按摩减乏', '洗发护发', '2018-01-11 09:16:59', '2018-01-11 09:16:59', 'images/goods/04hJVe3Vtx.png', 'images/goods/HC7rrLXmJd.jpg', 'images/goods/P6TcohxVXM.jpg', 'images/goods/kgaQxO96mZ.jpg', 'images/goods/xNbKsE76Xg.jpg', '1', '1', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('44', '谷风一木软抽面巾纸囤货装 ', '5a56bb96c513c', '环保取材，安全天然更亲肤', '家庭清洁', '2018-01-11 09:19:19', '2018-01-11 09:19:19', 'images/goods/8aKX7HxncK.png', 'images/goods/zTWSIhbW6y.jpg', 'images/goods/pXxC60zBVF.jpg', 'images/goods/9hpamPDHsQ.jpg', 'images/goods/cJh0Ninjcg.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('45', '黑凤梨 20寸全铝镁合金登机箱', '5a56bc54b5c9a', '41升超薄坚固，100%铝镁合金', '黑凤梨系列', '2018-01-11 09:22:29', '2018-01-11 09:22:29', 'images/goods/vgucQVB4Bq.png', 'images/goods/bGfdnsfxLJ.jpg', 'images/goods/Sk8VBuwNit.jpg', 'images/goods/uG8W9zb9m8.jpg', 'images/goods/kawzG5SiYe.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('46', '3D纳米薄膜口罩', '5a56bcf4d7c44', '超薄纳米，超强隔霾', '旅行用品', '2018-01-11 09:25:09', '2018-01-11 09:25:09', 'images/goods/TzZeVkdRoB.png', 'images/goods/QyGh9FmjBA.jpg', 'images/goods/g5CZYSDlF8.jpg', 'images/goods/6QXKBmJaAx.jpg', 'images/goods/3E0o2w9icF.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('47', '日本制造 晶钻玻璃锅2.2L', '5a56bd7839c2a', '世界五百强康宁出品', '海外', '2018-01-11 09:27:21', '2018-01-11 09:27:21', 'images/goods/0PCl5xLf6P.png', 'images/goods/nqfxjAWajs.jpg', 'images/goods/EwHhPOXamx.jpg', 'images/goods/rQr0Z8Sukh.jpg', 'images/goods/PDks2IrJeD.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('48', '皮面笔记本', '5a56bdd46bb73', '环保充皮纸，护眼舒适', '文具', '2018-01-11 09:28:53', '2018-01-11 09:28:53', 'images/goods/rDMWm6aHjb.png', 'images/goods/Im6DshdFGt.jpg', 'images/goods/E0ejaXfmjl.jpg', 'images/goods/uXM2Vq9OZM.jpg', 'images/goods/GOXXzX1ct4.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('49', '黑凤梨 鲜果冻 180克', '5a56be4d1ddec', '果冻里面有真果粒', '小食', '2018-01-11 09:30:54', '2018-01-11 09:30:54', 'images/goods/AEpoyzj9eH.png', 'images/goods/hZrScTP8L8.jpg', 'images/goods/rO3BsVrSQg.jpg', 'images/goods/TLRQ9kLUb0.jpg', 'images/goods/khnFFiCOsc.jpg', '1', '0', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('50', '洁净燕窝（燕盏）', '5a56bed603543', '凝丝成盏，缕缕柔滑', '食材', '2018-01-11 09:33:11', '2018-01-11 09:33:11', 'images/goods/33Yt6UyxZ7.png', 'images/goods/9XU98dAEj1.jpg', 'images/goods/rcNH12SAhP.jpg', 'images/goods/VHGtRGPDbL.jpg', 'images/goods/zzQ6Yjif5S.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('51', '天然酵母面包 208克', '5a56bf863cfe7', '浓郁奶香，清甜松软', '糕点', '2018-01-11 09:36:07', '2018-01-11 09:36:07', 'images/goods/LnnLgRW7qB.png', 'images/goods/rul0TOOEFk.jpg', 'images/goods/36sAgSbZSY.jpg', 'images/goods/zlgnIKnkHb.jpg', 'images/goods/y9VT2kM1g2.jpg', '1', '0', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('52', '玲珑柑普 130克', '5a56c011cde08', '勐海熟普邂逅新会鲜柑', '茗茶', '2018-01-11 09:38:26', '2018-01-11 09:38:26', 'images/goods/54hWdz9tqb.png', 'images/goods/ahIweWXbiI.jpg', 'images/goods/mgFW0j350V.jpg', 'images/goods/F78aMSyUUE.jpg', 'images/goods/WsBHOiGang.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('53', '银点锁温 超轻羽绒马甲', '5a56c0ef5b264', '优质蓬松白鸭绒 外穿内搭两相宜', '儿童服饰', '2018-01-11 09:42:08', '2018-01-11 09:42:08', 'images/goods/9gs6L0oyfp.png', 'images/goods/c6eSdJoYOg.jpg', 'images/goods/PO0gXxBnl5.jpg', 'images/goods/nUCTEdSsxg.jpg', 'images/goods/yj09lXEWTm.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('54', '棉质生活 蜂窝超薄一次性防溢乳垫', '5a56c1b35ff97', '蜂窝超薄 强力吸收', '妈咪', '2018-01-11 09:45:24', '2018-01-11 09:45:24', 'images/goods/tTCHc6eCX7.png', 'images/goods/fTaUmK9pRZ.jpg', 'images/goods/xDZukpQdDf.jpg', 'images/goods/yduna4vvuh.jpg', 'images/goods/xuky12Zx4O.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('55', '轻柔触感 宝宝空气层保暖套装', '5a56c266c3fa0', '空气夹棉套装 贴心呵护宝宝', '婴幼儿服饰', '2018-01-11 09:48:23', '2018-01-11 09:48:23', 'images/goods/vv7IAqocVy.png', 'images/goods/RjzrujIqzP.jpg', 'images/goods/tA7Ucm3lnJ.jpg', 'images/goods/Wd4Hwq4KZg.jpg', 'images/goods/s36JmU28tB.jpg', '1', '0', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('56', '儿童游戏帐篷组合装', '5a56c32f9d453', '宝宝宅家必备', '玩具', '2018-01-11 09:51:44', '2018-01-11 09:51:44', 'images/goods/2QHnB0nRoE.png', 'images/goods/WGcmkrJssd.jpg', 'images/goods/7egnmtiZcv.jpg', 'images/goods/LMI0H7O4YZ.jpg', 'images/goods/S6hxGCYX5C.png', '1', '0', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('57', '哞菇钢笔套装 我的世界', '5a56c3aed0bfa', '精致套装，附赠可替换墨囊', '我的世界', '2018-01-11 09:53:51', '2018-01-11 09:53:51', 'images/goods/FrB0CcBTxI.jpg', 'images/goods/J5yYl0zn6A.jpg', 'images/goods/iwfMMP0Od6.jpg', 'images/goods/5LsKVExzxo.jpg', 'images/goods/B00TAtL8Wn.png', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('58', '陶瓷杯 达摩 阴阳师', '5a56c4228d00d', '七转八起，达摩不倒翁', '阴阳师', '2018-01-11 09:55:47', '2018-01-11 09:55:47', 'images/goods/IQ9icnyVs5.png', 'images/goods/rK43ucApWX.jpg', 'images/goods/gZrnKlHqdu.jpg', 'images/goods/kvgAhBKMxX.jpg', 'images/goods/RgEnNDPSpi.jpg', '1', '0', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('59', '防水便携运动包 守望先锋', '5a56c48fcfdf5', '可折叠收纳，运动必备', '守望先锋', '2018-01-11 09:57:36', '2018-01-11 09:57:36', 'images/goods/ZMWwrTcUoD.jpg', 'images/goods/tzon0wzObf.jpg', 'images/goods/XJZWv4gJCD.jpg', 'images/goods/8qGzBHTNVj.jpg', 'images/goods/z1CUTztAul.jpg', '1', '0', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('60', '真皮多功能钥匙包 网易游戏', '5a56c4e717e9f', '用心甄选头层牛皮', '游戏表情', '2018-01-11 09:59:04', '2018-01-11 09:59:04', 'images/goods/d434JgzMhm.png', 'images/goods/ZToI8DYUsb.jpg', 'images/goods/e18IABI4OK.jpg', 'images/goods/IxP0JA6EOF.jpg', 'images/goods/luJ5lPcWrm.jpg', '1', '0', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('62', '撞色全亚麻四件套', '5a6084b8abe4c', '100%亚麻，透气干爽', '床品件套', '2018-01-18 19:27:53', '2018-01-18 19:27:53', 'images/goods/fKmR3p6zVN.jpg', 'images/goods/O56nPmPLrV.jpg', 'images/goods/TK91sOi8br.jpg', 'images/goods/6MkUUjESG8.jpg', 'images/goods/QirKjA23Ee.jpg', '0', '0', '1', '0', '1', '1', '');
INSERT INTO `goods` VALUES ('63', '良缘美满婚庆十件套', '5a60883a3e783', '60s长绒棉，好运代代传', '床品件套', '2018-01-18 19:42:51', '2018-01-18 19:42:51', 'images/goods/GnX8pg0cD7.jpg', 'images/goods/TUFDKRwmoL.jpg', 'images/goods/EgJIQwchW7.jpg', 'images/goods/NY5BZXrHCp.jpg', 'images/goods/WPfAhEVozw.jpg', '1', '0', '1', '0', '1', '1', '');
INSERT INTO `goods` VALUES ('67', '网易智造智能感体按摩椅', '5a608f1db11c7', '由头到脚享受360度舒适体验', '家具', '2018-01-18 20:12:14', '2018-01-18 20:12:14', 'images/goods/UXV9LBVZ56.jpg', 'images/goods/6UQvQ0tfy6.jpg', 'images/goods/CuHeN0Ca1x.jpg', 'images/goods/pCaklZEeDc.jpg', 'images/goods/MvcjPcFKIR.png', '1', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('71', '棱面牛奶果汁杯 370ml', '5a6095341a5b9', '简约纯色凉水杯', '水具酒具', '2018-01-18 20:38:13', '2018-01-18 20:38:13', 'images/goods/YgxgHXkCfe.png', 'images/goods/Eb1r1LsfQj.png', 'images/goods/DUIi84EgeD.jpg', 'images/goods/qN8khNpKXv.jpg', 'images/goods/BQCEI42hXI.jpg', '1', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('72', '法国制造 水晶玻璃红酒杯大号', '5a6096ab24dc1', '<p class=\"desc\" data-reactid=\".2.1.$1007000.1.$1156138.0.3.3.1\">法国制造，近100%透光</p>', '水具酒具', '2018-01-18 20:44:28', '2018-01-18 20:44:28', 'images/goods/Iuh7r1pAcK.jpg', 'images/goods/Hk1GZSsDcL.jpg', 'images/goods/wMnO2zQp19.png', 'images/goods/rG6KZt28ES.jpg', 'images/goods/2QyjTB95V4.jpg', '1', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('73', '黑凤梨 Carat钻石炒锅30cm', '5a60976a0db09', '安全涂层，轻便无烟', '锅具', '2018-01-18 20:47:39', '2018-01-18 20:47:39', 'images/goods/wHm6hi001u.jpg', 'images/goods/wTevB5lUBG.png', 'images/goods/o4rcstVgjq.jpg', 'images/goods/Rg4Scf3kXI.jpg', 'images/goods/FhnkEmeNun.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('74', '健康厨房 少油烟锅具套装', '5a609834762e6', '少油烹饪，不沾易清洗', '锅具', '2018-01-18 20:51:01', '2018-01-18 20:51:01', 'images/goods/RDVEhGEAuy.png', 'images/goods/JUWwpDhXnZ.jpg', 'images/goods/L01WnJmkwA.png', 'images/goods/C06lMMp6CO.jpg', 'images/goods/nk3fz8ieqD.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('75', 'Carat钻石汤锅24cm', '5a60998e57411', '安全涂层，锁热保温', '锅具', '2018-01-18 20:56:47', '2018-01-18 20:56:47', 'images/goods/NBXkJl1sox.png', 'images/goods/uRuFhTJ3lx.jpg', 'images/goods/Ll0hkJai83.jpg', 'images/goods/hzBkezjB9g.jpg', 'images/goods/jPD2ChG2DJ.jpg', '0', '0', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('76', '秋月鎏光点心盘', '5a609a7186ff7', '星空一不小心掉进了盘里', '餐具', '2018-01-18 21:00:34', '2018-01-18 21:02:31', 'images/goods/aqOWomZnnc.jpg', 'images/goods/x9OpixdkrY.jpg', 'images/goods/jcWf2gwN1g.png', 'images/goods/z0yc3CVe4I.jpg', 'images/goods/wJvkckI0gy.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('77', '新中式汤碗 19.5cm', '5a609b5c80fc7', '超大容量，端取不烫手', '餐具', '2018-01-18 21:04:29', '2018-01-18 21:04:29', 'images/goods/8en5jouKI5.jpg', 'images/goods/24totaoSv4.jpg', 'images/goods/khGW2YsOs2.png', 'images/goods/juxkMnz96O.jpg', 'images/goods/B6c0LNu8ps.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('78', '玉琢龙泉青瓷餐具 9头', '5a609c1f99d9b', '薄胎厚釉，葱翠如玉', '餐具', '2018-01-18 21:07:44', '2018-01-18 21:07:44', 'images/goods/yS82nBOCeZ.jpg', 'images/goods/mTwR39lIXh.jpg', 'images/goods/14ql2F6tmr.png', 'images/goods/Hx2lK0vxqw.jpg', 'images/goods/Ha6Yd3tces.jpg', '0', '0', '0', '0', '1', '1', '');
INSERT INTO `goods` VALUES ('79', '零食盘', '5a609d17036a9', '三格防串味，竹粉新材料', '餐具', '2018-01-18 21:11:52', '2018-01-18 21:11:52', 'images/goods/V2UtdoIpRW.jpg', 'images/goods/DCYHxIRmYa.jpg', 'images/goods/PqT2XBDTcl.jpg', 'images/goods/YzkPGK3rqu.jpg', 'images/goods/qfzQu0DZjz.png', '0', '0', '0', '0', '1', '1', '');
INSERT INTO `goods` VALUES ('80', '趣味粉彩，防脏防烫系列', '5a609e35a8659', '做饭可以既放心，又省心', '功能厨具', '2018-01-18 21:16:38', '2018-01-18 21:16:38', 'images/goods/P4B5bghN2Y.jpg', 'images/goods/hJBERRNMnF.png', 'images/goods/5c0QKDhimw.jpg', 'images/goods/ogxSIBzTW4.jpg', 'images/goods/hwtg5Rn9cM.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('81', '懒人蒸笼布', '5a609f76a9778', '避免食物粘锅，DIY平铺', '功能厨具', '2018-01-18 21:21:59', '2018-01-18 21:21:59', 'images/goods/6hKZlGNmfi.jpg', 'images/goods/mja7WwDTY9.jpg', 'images/goods/7bPn3qBSau.jpg', 'images/goods/8Wu4lN2vTi.jpg', 'images/goods/Gdk1sb7yqh.png', '0', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('82', '黑凤梨 不粘台面硅厨具5件套', '5a60a0b2ed027', '隔热不变性，适用涂层锅', '功能厨具', '2018-01-18 21:27:16', '2018-01-18 21:27:16', 'images/goods/IOH39TPlk4.jpg', 'images/goods/uWbPDGpEF7.jpg', 'images/goods/Wm2ssTfXdg.jpg', 'images/goods/VM86sogWDV.png', 'images/goods/pi1li8pzkF.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('83', '5件装 日式巧趣陶瓷茶具套装', '5a60a16a74ea0', '基础款茶具，简单方便', '茶具', '2018-01-18 21:30:19', '2018-01-18 21:30:19', 'images/goods/4GXkJo6Le7.png', 'images/goods/FC8Gal9oIh.jpg', 'images/goods/zDJacZCbwb.jpg', 'images/goods/4TCLMI1STb.jpg', 'images/goods/cTUWL0K0cW.jpg', '0', '0', '0', '0', '1', '1', '');
INSERT INTO `goods` VALUES ('85', '花杯个人茶', '5a60a84bda59f', '通透明澈，均匀滤茶', '茶具', '2018-01-18 21:59:40', '2018-01-18 21:59:40', 'images/goods/z5hum1n2Q3.jpg', 'images/goods/0sF4pPwb77.jpg', 'images/goods/tLM5YEhVy5.jpg', 'images/goods/90cymEdwOX.png', 'images/goods/Rf8J5II5qo.jpg', '1', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('86', '茶漏，搅拌棍2件套', '5a60a8fb91fdd', '泡茶咖啡蜂蜜好伴侣', '茶具', '2018-01-18 22:02:36', '2018-01-18 22:02:36', 'images/goods/tJJA4TEc1j.jpg', 'images/goods/Iz7zP8y0eE.jpg', 'images/goods/Fs3jbVDJGr.png', 'images/goods/PFReSHg05j.jpg', 'images/goods/HUnARGDDPn.jpg', '0', '1', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('87', '2片装 加厚华夫格 竹纤维抹布', '5a60a9a0aa9f6', '一冲即白，抑菌去油污', '清洁保鲜', '2018-01-18 22:05:21', '2018-01-18 22:05:21', 'images/goods/7VPW261cR4.jpg', 'images/goods/cd3XvqoXK5.jpg', 'images/goods/AgDzPj54dL.jpg', 'images/goods/wmDW0UHqQ9.jpg', 'images/goods/HXU78VGHpo.png', '0', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('88', '便携含餐具高硼硅玻璃保险盒', '5a61458b29612', '便携可组餐具，便当出行', '清洁保鲜', '2018-01-19 09:10:36', '2018-01-19 09:10:36', 'images/goods/YzRamsP8HM.jpg', 'images/goods/wlu5cDRs1I.png', 'images/goods/Bww5gaw4zb.jpg', 'images/goods/gphd1wjrnK.jpg', 'images/goods/YWiE4trgz1.png', '0', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('89', '雪尼尔擦手球', '5a6146737b072', '吸水快干，不掉毛屑', '清洁保鲜', '2018-01-19 09:14:28', '2018-01-19 09:14:28', 'images/goods/ecHUEAaWeu.jpg', 'images/goods/o3eOcxcNUR.png', 'images/goods/6i15dIeR6M.jpg', 'images/goods/efocyrDXvr.jpg', 'images/goods/cvKtEKyrSm.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('90', '按压式真空储物罐 长方形底', '5a614771766f4', '3倍延长保鲜期，减少浪费', '清洁保鲜', '2018-01-19 09:18:42', '2018-01-19 09:18:42', 'images/goods/SYNXylCwzb.png', 'images/goods/kwapEqK6no.jpg', 'images/goods/XBJtOAY9KA.png', 'images/goods/2VMFMXo0U3.png', 'images/goods/uMVb41fjdt.jpg', '0', '0', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('91', '长条蔬菜专用刨', '5a61481918092', '手握设计，一削到底', '刀剪粘板', '2018-01-19 09:21:30', '2018-01-19 09:21:30', 'images/goods/owzznhhi7X.jpg', 'images/goods/CQoEndF79n.jpg', 'images/goods/qSivLwTBhC.png', 'images/goods/yS9qdCR5N2.jpg', 'images/goods/GvTWdmHoDf.jpg', '0', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('92', '源自天然 拼花砧板组合', '5a6148d52d217', '拯救无处安放的砧板和刀具', '刀剪粘板', '2018-01-19 09:24:38', '2018-01-19 09:24:38', 'images/goods/ZUARf6XpmO.jpg', 'images/goods/fV8z1iQTrt.png', 'images/goods/2RzD3wEwVS.jpg', 'images/goods/asBjPyJF3c.jpg', 'images/goods/njKXCuX7nj.jpg', '0', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('93', '纳米氧化股陶瓷果蔬削', '5a614a05232cf', '纳米抑菌，轻巧削皮', '刀剪粘板', '2018-01-19 09:29:42', '2018-01-19 09:29:42', 'images/goods/CbXks4AkJl.jpg', 'images/goods/WnY8WKzHu0.png', 'images/goods/xFqlHrREUy.jpg', 'images/goods/3lxvQpwxna.jpg', 'images/goods/NXfhokw2jb.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('94', '加长版厨房剪', '5a614ace14ab5', '力学考究，加长省力', '刀剪粘板', '2018-01-19 09:33:03', '2018-01-19 09:33:03', 'images/goods/yxSzQquHLE.jpg', 'images/goods/FCM1Hob2xt.jpg', 'images/goods/4pvGTPiVWR.jpg', 'images/goods/eO1MiwnpwG.jpg', 'images/goods/sEhsqpDi3j.png', '0', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('95', '趣味粉彩陶瓷马克杯', '5a614b6693a4e', '原创设计，现代时尚', '咖啡具', '2018-01-19 09:35:35', '2018-01-19 09:35:35', 'images/goods/qcmozmbF8i.jpg', 'images/goods/Nco4M9sXfA.jpg', 'images/goods/Kpnn5LBOM9.jpg', 'images/goods/aqvxrRwvCq.jpg', 'images/goods/ggr2aa6TJ3.png', '1', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('96', '黑凤梨 20寸全铝镁和金登机箱', '5a614cb7344b8', '41升超薄坚固，100%铝镁合金', '行李箱', '2018-01-19 09:41:12', '2018-01-19 09:41:12', 'images/goods/xteWS76cf8.png', 'images/goods/Qdqo2YXVQ1.jpg', 'images/goods/hY8jTqCujl.jpg', 'images/goods/yjiQkQFR7p.jpg', 'images/goods/Ik5r1Wgfbb.jpg', '0', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('97', '112升 纯PC拉链斜纹拉杆箱', '5a614de4ee2f8', '28寸充足容量，全家一箱搞定', '行李箱', '2018-01-19 09:46:14', '2018-01-19 09:46:14', 'images/goods/aqvjRs69ao.jpg', 'images/goods/hsGsAl7HTJ.jpg', 'images/goods/225DGxoOps.jpg', 'images/goods/OHRbzFrbD5.jpg', 'images/goods/XBqrh16MP4.png', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('98', '28寸 纯pc“铝装”（非全铝）拉杆箱', '5a614ebb31534', '109升大容量，满足全家出行', '行李箱', '2018-01-19 09:49:48', '2018-01-19 09:49:48', 'images/goods/q2Q8CxgVvp.jpg', 'images/goods/b9jGUXCcUP.jpg', 'images/goods/mouKwxvhB6.jpg', 'images/goods/wwtHzXsHTL.png', 'images/goods/wUQjHDoTGM.jpg', '0', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('99', '折口多位电脑包', '5a614f5f62162', '珍珠棉防护，电脑安心存放', '男士包袋', '2018-01-19 09:52:32', '2018-01-19 09:52:32', 'images/goods/Amhs7Ih7oX.jpg', 'images/goods/zbTirS66fY.jpg', 'images/goods/IhT2l0mAPf.jpg', 'images/goods/Xrg9ElIpK9.jpg', 'images/goods/oMsg1Tknuv.png', '1', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('100', '零负重超纤立体双肩包', '5a6150042224d', '14L大容量，外出零负担', '男士包袋', '2018-01-19 09:55:17', '2018-01-19 09:55:17', 'images/goods/qHoXjWqASd.jpg', 'images/goods/BCZCwzBmHn.jpg', 'images/goods/SJhjirJrPI.jpg', 'images/goods/ZMnsXMvM0u.jpg', 'images/goods/dCPc93DboG.png', '0', '1', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('101', '素色信封毛毡MAC包', '5a6158747a7b9', '透气毛毡，柔软保护', '男士包袋', '2018-01-19 10:31:17', '2018-01-19 10:31:17', 'images/goods/kqLovpRX9w.png', 'images/goods/Ra6XxV4AB7.jpg', 'images/goods/niCJB5fCYO.jpg', 'images/goods/LdZOMor0IZ.jpg', 'images/goods/1YwLk2ryOz.jpg', '0', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('102', '巴黎谧 搭扣手提单肩包', '5a61593ba431a', '1天1人仅手作的珍贵品质', '女士包袋', '2018-01-19 10:34:36', '2018-01-19 10:34:36', 'images/goods/wK0Cdq9uSJ.png', 'images/goods/knpTw1Fjen.jpg', 'images/goods/MmdREWOvdG.jpg', 'images/goods/lrFvSiiw4p.jpg', 'images/goods/vh9hCyiwyW.jpg', '1', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('103', '意式流光牛皮双肩包', '5a615a093d912', '美国牛皮，外黑内红的经典诱惑', '女士包袋', '2018-01-19 10:38:02', '2018-01-19 10:38:51', 'images/goods/pRiwbnU8R7.jpg', 'images/goods/D2sjZG6MyO.jpg', 'images/goods/4uplHbd99T.jpg', 'images/goods/uB9c5xkcc0.jpg', 'images/goods/OHyu7lMrnh.png', '0', '0', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('104', '幸运桃心链条单肩包', '5a615a9fc2227', '幸运桃心链条单肩包', '女士包袋', '2018-01-19 10:40:32', '2018-01-19 10:40:32', 'images/goods/1vuDbEBbu5.jpg', 'images/goods/aRziTjOUKc.png', 'images/goods/DEEXiBzoOR.jpg', 'images/goods/XZ25MGuMGL.jpg', 'images/goods/FnjIF8PwLp.jpg', '1', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('105', '挚爱纽约牛皮水桶包', '5a615b0f52947', '大牌品质，值得信赖', '女士包袋', '2018-01-19 10:42:24', '2018-01-19 10:42:24', 'images/goods/gIyQu40jmd.jpg', 'images/goods/vv0JRIUAQx.jpg', 'images/goods/do911bLlFX.jpg', 'images/goods/kYLiRd5epZ.png', 'images/goods/ekoDJrubZK.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('106', '头层牛皮长款拉链钱包', '5a615c0324f68', '进口头层牛皮，14道卡位奢享生活', '钱包及小皮件', '2018-01-19 10:46:28', '2018-01-19 10:46:28', 'images/goods/wcQBAV68kU.png', 'images/goods/7FIm5hL08O.jpg', 'images/goods/VAGI7KUMGe.jpg', 'images/goods/rn0Vt7RVCt.jpg', 'images/goods/BZcruKzI2b.jpg', '0', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('107', '牛皮日系蝴蝶结钱包', '5a615c9281ad8', '优雅女性不可缺的指尖温柔，头层牛皮', '钱包及小皮件', '2018-01-19 10:48:51', '2018-01-19 10:48:51', 'images/goods/Gsi34Tisyu.png', 'images/goods/sq3LDHG1Xo.jpg', 'images/goods/pSvAPutaQ6.png', 'images/goods/71WLoRgoAh.jpg', 'images/goods/uCvjR25au0.jpg', '0', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('108', '迷你信封钥匙包', '5a615d80821ba', '一手可握大小，贴心后背卡位', '钱包及小皮件', '2018-01-19 10:52:49', '2018-01-19 10:52:49', 'images/goods/CjMvr0BUrZ.jpg', 'images/goods/WryZ0MpBEu.jpg', 'images/goods/knC8Ym8Koe.jpg', 'images/goods/MePDzGjULo.jpg', 'images/goods/NQdIHjR49L.png', '1', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('109', '伦敦墨 长款钱包', '5a615e782276d', '一包搞定所有的科学储物', '钱包及小皮件', '2018-01-19 10:56:57', '2018-01-19 10:56:57', 'images/goods/nxhD8UjTM7.png', 'images/goods/M1gWPvtke3.jpg', 'images/goods/tmtA4Dmgdw.jpg', 'images/goods/45rwvLvrSd.jpg', 'images/goods/zQNK7noYNn.jpg', '1', '0', '0', '0', '1', '1', '');
INSERT INTO `goods` VALUES ('110', '率性男式沙漠靴', '5a615f158a71c', '天然生胶大底，升级行走体验', '男鞋', '2018-01-19 10:59:34', '2018-01-19 10:59:34', 'images/goods/WbPXSiKoL6.png', 'images/goods/CGl5byyEyD.jpg', 'images/goods/HYCp4TPkt4.jpg', 'images/goods/Db1tqGlpai.jpg', 'images/goods/InCtyHVxBI.jpg', '0', '1', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('111', '男式手工牛津鞋', '5a615ff15e147', '24小时仅手作一双，传统工艺', '男鞋', '2018-01-19 11:03:14', '2018-01-19 11:03:14', 'images/goods/JWQoP1jUt5.jpg', 'images/goods/l2PcM5eKBK.jpg', 'images/goods/eyURA0Zinu.jpg', 'images/goods/F7ZvlqSjsm.jpg', 'images/goods/ycaOgw6l84.png', '1', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('112', '磨砂牛皮德比鞋', '5a6160928ec83', 'Polo制造商，复古磨砂皮', '男鞋', '2018-01-19 11:05:55', '2018-01-19 11:05:55', 'images/goods/xpn3I7j635.png', 'images/goods/dVzcDqLnq4.jpg', 'images/goods/uTOgxSrDgw.jpg', 'images/goods/pCWIH8LhYW.jpg', 'images/goods/RykxJBiltg.jpg', '0', '0', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('113', '率性女士沙漠靴', '5a6161747a8ed', '经典短靴，来一场说走就走的旅行', '女鞋', '2018-01-19 11:09:41', '2018-01-19 11:09:41', 'images/goods/yOFceirQr3.png', 'images/goods/QS4KCRKVvs.jpg', 'images/goods/YBEeSovbaZ.jpg', 'images/goods/148DYTGGdH.jpg', 'images/goods/avkiBgxe19.jpg', '1', '0', '1', '1', '1', '1', '');
INSERT INTO `goods` VALUES ('114', '布洛克三明治松糕女鞋', '5a61620713e00', '大牌厚底鞋款，增高修饰腿型', '女鞋', '2018-01-19 11:12:08', '2018-01-19 11:12:08', 'images/goods/aFke6iE5dD.jpg', 'images/goods/Sa4pSNozpC.jpg', 'images/goods/kxUYSFv1B7.jpg', 'images/goods/JZTGkWX8pr.png', 'images/goods/UnqIDV0Abb.jpg', '1', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('115', '女士休闲一脚蹬豆豆鞋', '5a616287d7c00', 'A级羊反皮，踩出你的自由时尚', '女鞋', '2018-01-19 11:14:16', '2018-01-19 11:14:16', 'images/goods/BAHQ0eCVnm.png', 'images/goods/7z7UhGH3JP.jpg', 'images/goods/yXGv7dmsz6.jpg', 'images/goods/PY4dHuoluK.jpg', 'images/goods/a1DIyuiQbW.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('116', '简风斜纹男/女家居拖鞋', '5a6163247126b', 'MUJI制造商，含羊毛混纺鞋面', '拖鞋', '2018-01-19 11:16:53', '2018-01-19 11:16:53', 'images/goods/TEemVgHujR.png', 'images/goods/ZhufaTVhrG.jpg', 'images/goods/KGVg367LhD.jpg', 'images/goods/9qKWMdjyMy.jpg', 'images/goods/ynF9EPNlLE.jpg', '0', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('117', '儒沐轻雅简风牛皮拖鞋', '5a6163a94240a', '韩剧男主也穿的牛皮拖鞋，精致居家', '拖鞋', '2018-01-19 11:19:06', '2018-01-19 11:19:06', 'images/goods/d3xwzjVGe1.png', 'images/goods/9YCejbC59f.jpg', 'images/goods/P55yQ1BOZd.jpg', 'images/goods/NKOXKiJ22P.jpg', 'images/goods/VOaIWdECgC.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('118', '大白鲨男/女家居拖鞋', '5a616441f0f2b', '可爱大白鲨，萌化一整冬', '拖鞋', '2018-01-19 11:21:39', '2018-01-19 11:21:39', 'images/goods/xXKiRwRsbC.png', 'images/goods/2vZPBcPQdo.jpg', 'images/goods/PdhIRRr1tj.jpg', 'images/goods/EoMwHZdwYR.jpg', 'images/goods/0luWIKMhej.jpg', '0', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('119', '经典羊皮毛一体拖鞋', '5a6164d005212', 'UGG制造商，澳洲羊毛', '拖鞋', '2018-01-19 11:24:01', '2018-01-19 11:24:01', 'images/goods/V00XbWQPaV.png', 'images/goods/GPSEZvE1cG.jpg', 'images/goods/lMLaqTMcmA.jpg', 'images/goods/N9sgQBCRhJ.jpg', 'images/goods/j37M3aSWak.jpg', '1', '0', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('120', '软Q随意贴', '5a616553d532b', '软萌Q弹，想贴哪里贴哪里', '鞋配', '2018-01-19 11:26:12', '2018-01-19 11:26:12', 'images/goods/7cCKv0xvug.png', 'images/goods/1dxZ0vnPpT.jpg', 'images/goods/mKgZpz9O3y.png', 'images/goods/wZpd3tLOeB.jpg', 'images/goods/2BkwrjMYIR.jpg', '1', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('121', '二合一后跟贴后跟垫', '5a6166292e1ca', '多功能二合一贴，同时解决双重问题', '鞋配', '2018-01-19 11:29:46', '2018-01-19 11:29:46', 'images/goods/Czfmbnn9n4.png', 'images/goods/rmNtxko1Bm.jpg', 'images/goods/niZEcrOtI5.jpg', 'images/goods/n54Ej3CdOA.jpg', 'images/goods/nczMRHGXPv.jpg', '0', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('122', '软Q前掌垫', '5a6166e94e5a9', '多功能二合一贴，同时解决双重问题', '鞋配', '2018-01-19 11:32:58', '2018-01-19 11:32:58', 'images/goods/G3dV5tUe24.png', 'images/goods/KTRBTqYMl6.jpg', 'images/goods/ojC2T3PWRR.jpg', 'images/goods/foE15tk5Fb.jpg', 'images/goods/yjA6NoGFrc.jpg', '0', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('124', '互联网大会同款 100%羊毛简约纯色围巾', '5a6168794fe80', '百分百内蒙古羊毛，纯粹的温暖', '围巾件套', '2018-01-19 11:39:38', '2018-01-19 11:39:38', 'images/goods/Msj1aGaWp5.png', 'images/goods/pGHx2t3Unt.jpg', 'images/goods/RGhk82NW3D.jpg', 'images/goods/c2UFzn1DAS.jpg', 'images/goods/pkIdB7imtA.jpg', '1', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('125', '100%绢丝拉绒 风致AB面围巾', '5a616932c4ca3', '百分百真丝材质拉绒工艺，简洁不简单', '围巾件套', '2018-01-19 11:42:43', '2018-01-19 11:42:43', 'images/goods/2aqv7DIQh3.png', 'images/goods/O7Fbv02U9e.jpg', 'images/goods/D1TGBMrohW.jpg', 'images/goods/eNNKjojjC6.jpg', 'images/goods/TQKfvoZaZV.jpg', '0', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('126', '日系拉菲草女式草帽', '5a6169fec64de', '仅售供应商建议价的1/3', '围巾件套', '2018-01-19 11:46:07', '2018-01-19 11:46:07', 'images/goods/OC578x0TT9.png', 'images/goods/Axpba8ec10.jpg', 'images/goods/KqBALP9CrM.jpg', 'images/goods/bYCYj1pmS0.jpg', 'images/goods/Vr0ZcapOFz.jpg', '0', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('128', '黑凤梨情侣棒球帽', '5a616c68da489', '47Brand合作供应商', '围巾件套', '2018-01-19 11:56:25', '2018-01-19 11:56:25', 'images/goods/blN9AFcKgN.png', 'images/goods/ma1v27JLCM.jpg', 'images/goods/DyRA4fQTQE.jpg', 'images/goods/Rc0VlV7xr0.jpg', 'images/goods/lELlnfXiyv.jpg', '0', '1', '1', '0', '1', '1', '');
INSERT INTO `goods` VALUES ('129', '镜架系列 圆形全框金属眼镜架', '5a616d2397583', 'TR材质，金属质感', '眼镜', '2018-01-19 11:59:32', '2018-01-19 11:59:32', 'images/goods/hT880AwSxz.png', 'images/goods/McffSWc0Hz.jpg', 'images/goods/mBkdM0Hhjr.jpg', 'images/goods/M7Y7VUTIdt.jpg', 'images/goods/ASl9igH0jX.jpg', '1', '1', '1', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('130', '镜架系列 板材全框光学架', '5a616d9b73dbf', '暗哑花纹，时尚复古', '眼镜', '2018-01-19 12:01:32', '2018-01-19 12:01:32', 'images/goods/aDt1oG40QJ.png', 'images/goods/NKJ5qYPT5d.jpg', 'images/goods/HjFaGlWLFr.jpg', 'images/goods/tHRZnePsLy.jpg', 'images/goods/RVUOPiYNlU.jpg', '1', '1', '1', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('131', '镜架系列 方形全框眼镜架', '5a616e2b6688c', '超轻TR材质，佩戴舒适', '眼镜', '2018-01-19 12:03:56', '2018-01-19 12:03:56', 'images/goods/fBmEO9ANXY.png', 'images/goods/kD67Y8C6R9.jpg', 'images/goods/SDu7jky5VM.jpg', 'images/goods/FqtF84H3I2.jpg', 'images/goods/H65itgKIFd.png', '0', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('132', '摩登世纪方形墨镜', '5a616e990a28a', '修饰脸型，1秒显瘦', '眼镜', '2018-01-19 12:05:46', '2018-01-19 12:05:46', 'images/goods/Ko3DvSW1nQ.png', 'images/goods/8bYtFp1QFO.png', 'images/goods/2tuOuP3pvm.jpg', 'images/goods/JfNtWa6nWU.jpg', 'images/goods/W4J3iOqfPh.png', '0', '1', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('133', 'Jolly Doggie 新年生肖银手链', '5a616f0f2c3dc', '独特生肖造型 品牌制造商出品', '配饰', '2018-01-19 12:07:44', '2018-01-19 12:07:44', 'images/goods/06VnajY5ej.png', 'images/goods/P7IEKXQby2.jpg', 'images/goods/WvpiuuS2IW.jpg', 'images/goods/WtNIbsOafK.jpg', 'images/goods/awXjMYcREP.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('134', 'Jolly Doggie 新年生肖银项链', '5a616fafd5df4', '独特生肖造型 品牌制造商工艺', '配饰', '2018-01-19 12:10:24', '2018-01-19 12:10:24', 'images/goods/G3JZ0TA4Dk.png', 'images/goods/n2Zgs538WZ.jpg', 'images/goods/btJUKjzAei.jpg', 'images/goods/xARp53JvOc.jpg', 'images/goods/rUvtzC6oJJ.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('135', '莹雪珍珠 可调节式项链', '5a61703039489', 'AAA级淡水珠，颈间百变小风情', '配饰', '2018-01-19 12:12:33', '2018-01-19 12:12:33', 'images/goods/t30nuioG5B.png', 'images/goods/GnjGpFz7cv.jpg', 'images/goods/ELQzYPQF99.jpg', 'images/goods/VrsKzi88ua.jpg', 'images/goods/EbeYxRCc2Z.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('136', '女士美利奴澳毛优雅百搭双V领套头毛衫', '5a6170e7e7735', '澳洲珍稀面料“软黄金” 给你柔软温暖', '毛衫', '2018-01-19 12:15:36', '2018-01-19 12:15:36', 'images/goods/DPZkRkasiA.png', 'images/goods/qgqXMmsSPl.jpg', 'images/goods/RMmyrgoklf.jpg', 'images/goods/k81giQqTXL.jpg', 'images/goods/jBdQ3KGmDT.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('137', '女式气质短款毛呢大衣', '5a6171b2c15d3', '高挑干练，甜美可人都是你', '外衣', '2018-01-19 12:18:59', '2018-01-19 12:18:59', 'images/goods/Kg5BnWSk7B.png', 'images/goods/M6wfoFzTMG.jpg', 'images/goods/zy4NpmWwMX.jpg', 'images/goods/YGfH44BkvF.jpg', 'images/goods/c3jXIJVkk9.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('138', '女式经典水洗皮机车夹克', '5a617247d5f90', '一身亮眼皮衣抓住潮流焦点', '外衣', '2018-01-19 12:21:28', '2018-01-19 12:21:28', 'images/goods/cvISv8cbR2.png', 'images/goods/XYXXxwalNX.jpg', 'images/goods/NtsUtJH1oH.jpg', 'images/goods/K6s0xSpFJ8.jpg', 'images/goods/2n8dEERWBC.jpg', '1', '0', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('140', '女式运动连帽开衫', '5a61738d0e6d9', '旅行外套，匠心飞行外套', '卫衣', '2018-01-19 12:26:54', '2018-01-19 12:26:54', 'images/goods/tPiI4l6LbW.png', 'images/goods/FzeLSKCtkw.jpg', 'images/goods/UtG1SmK6Kx.jpg', 'images/goods/rDIeazNjNB.jpg', 'images/goods/gqODkW1HFF.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('141', '时尚休闲牛津纺衬衫', '5a61743902912', '潮流百搭 舒适有型', '衬衫', '2018-01-19 12:29:46', '2018-01-19 12:29:46', 'images/goods/R1N2TNGSpf.png', 'images/goods/Epqo977r6t.jpg', 'images/goods/0mpQL0Tnja.jpg', 'images/goods/WnzErq2QO2.jpg', 'images/goods/xvrFLR0DpF.jpg', '0', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('142', '女式极简长绒棉圆领打底衫', '5a6174c778d90', '换季温暖，秘鲁pima棉的细腻之选', 'T恤', '2018-01-19 12:32:08', '2018-01-19 12:32:08', 'images/goods/KxYszAjpuW.png', 'images/goods/aaVwoTCZ2F.jpg', 'images/goods/HoxELdrBCg.jpg', 'images/goods/uAFC3z0rGM.jpg', 'images/goods/yYSRsWA1rj.png', '0', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('143', '4双装 女式美丽诺羊毛混纺中筒袜', '5a61756152f58', '美丽诺羊毛，温暖舒适', '袜子', '2018-01-19 12:34:42', '2018-01-19 12:34:42', 'images/goods/hSTnME7obp.png', 'images/goods/q2iufvmy5n.jpg', 'images/goods/CEoghhc03L.jpg', 'images/goods/cLzpxofgWw.jpg', 'images/goods/GgSY0GvIrw.jpg', '0', '0', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('144', '2双装 80D 超柔天鹅绒连裤袜', '5a617612ddd0e', '柔软天鹅绒材质 ，触感细腻', '丝袜', '2018-01-19 12:37:39', '2018-01-19 12:37:39', 'images/goods/x4wOGPsWIA.png', 'images/goods/xhauOmb0VJ.jpg', 'images/goods/DOQHGfiCnp.jpg', 'images/goods/pXrg5YW6Bx.jpg', 'images/goods/T833VGnc2i.jpg', '0', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('145', 'Paris名媛睡袍', '5a61767e05e71', '取棉精梳，双面织造', '家居服', '2018-01-19 12:39:27', '2018-01-19 12:39:27', 'images/goods/QYCztdUk2D.png', 'images/goods/5lVtFBrQcP.jpg', 'images/goods/PveymrmDhU.png', 'images/goods/3hqAHj3m0w.jpg', 'images/goods/7Et4DGtCMf.jpg', '0', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('146', '针织百褶小黑裙 ', '5a6176d93467d', '早春新品，经典百褶', '裙装', '2018-01-19 12:40:58', '2018-01-19 12:40:58', 'images/goods/3YigBwoWq6.png', 'images/goods/Da17vNQiRI.jpg', 'images/goods/Oeh3uNUnBo.jpg', 'images/goods/qqaYBsS7XL.jpg', 'images/goods/WIKKh0J0hj.jpg', '0', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('147', '网易智造锁味干果机', '5a619523b4777', '锁住食物新鲜感，每一口都有阳光风味', '厨房电器', '2018-01-19 14:50:12', '2018-01-19 14:50:12', 'images/goods/2j5roKKeqZ.png', 'images/goods/JXRWy7g0aJ.jpg', 'images/goods/NlS77yQaB6.jpg', 'images/goods/qRsjkt3LxA.jpg', 'images/goods/IHx9u2er2N.jpg', '0', '0', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('148', 'IH电饭煲', '5a6195c7896a8', '电磁感应加热，米饭更好吃', '厨房电器', '2018-01-19 14:52:56', '2018-01-19 14:52:56', 'images/goods/opQMbomlm7.png', 'images/goods/ATCPnVvhoG.jpg', 'images/goods/AXVDDlvm3W.jpg', 'images/goods/VgbkBDE8xn.jpg', 'images/goods/q0kXJrsY0E.jpg', '1', '1', '0', '0', '1', '1', '');
INSERT INTO `goods` VALUES ('149', '全净皓齿变速式声波电动牙刷', '5a6196817a376', '999+好评爆款，洁齿又护龈', '个护健康', '2018-01-19 14:56:02', '2018-01-19 14:57:57', 'images/goods/1lp61o17fs.png', 'images/goods/8sW6hEcAwr.jpg', 'images/goods/xZJPTRlYb9.jpg', 'images/goods/ltprlGn88v.jpg', 'images/goods/SGg9EAh5zm.jpg', '0', '0', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('151', '网易智造编织纹手机软壳', '5a61987cd8d46', '会呼吸的手机壳', '数码', '2018-01-19 15:04:29', '2018-01-19 15:04:29', 'images/goods/hHvIeoxQKi.jpg', 'images/goods/1aYXVatLmT.jpg', 'images/goods/VbSoFYsDI7.jpg', 'images/goods/zfkV0rpsHj.jpg', 'images/goods/YGee5s0u3g.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('152', '网易智造易魔方蓝牙音箱', '5a61990cda3b2', '纯粹原声 便携体型 高颜值', '影音娱乐', '2018-01-19 15:06:53', '2018-01-19 15:06:53', 'images/goods/SiGHUQjyVT.png', 'images/goods/OZwpHUAlxM.jpg', 'images/goods/t8dLNnJRDw.jpg', 'images/goods/SCgi31Pphg.jpg', 'images/goods/Dp0o42QY00.jpg', '1', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('153', '全棉进口埃及长绒棉浴巾', '5a6199cc56f22', '纯粹原声 便携体型 高颜值', '毛巾', '2018-01-19 15:10:05', '2018-01-19 15:10:05', 'images/goods/fTBQHJGTUB.png', 'images/goods/fN0E3MzdYl.jpg', 'images/goods/BqhULd7H8l.jpg', 'images/goods/rxNTQHPanH.jpg', 'images/goods/pxKhzgWHPO.jpg', '1', '1', '0', '0', '1', '1', '');
INSERT INTO `goods` VALUES ('154', '趣味粉彩浴室特惠组合', '5a619a82294c5', '浴室三件套，直降50元', '毛巾', '2018-01-19 15:13:07', '2018-01-19 15:13:07', 'images/goods/SI445NyKXK.png', 'images/goods/JaUx7ReEYf.jpg', 'images/goods/8dh8XiGG0s.jpg', 'images/goods/aOSQajsLZn.jpg', 'images/goods/lveqCW1p2Q.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('155', '棉质生活 绿茶清爽湿巾', '5a619b12ba423', '绿茶提取，温和清洁兼顾护肤', '家庭清洁', '2018-01-19 15:15:31', '2018-01-19 15:15:31', 'images/goods/4gewMxOSt0.png', 'images/goods/IXXEOEgB5W.jpg', 'images/goods/bQDbNK7Sqb.jpg', 'images/goods/ATsA44HDAl.jpg', 'images/goods/3gukcnWKLu.jpg', '0', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('156', 'creamy blue系列 眼部化妆套刷', '5a619ba77dee2', '德制纤维 极致眼部妆容', '美妆', '2018-01-19 15:18:00', '2018-01-19 15:18:00', 'images/goods/CDH2Fr52Yq.png', 'images/goods/I0E0Ae55YZ.jpg', 'images/goods/vptnBlbIkj.jpg', 'images/goods/4C4Jeo3bPc.jpg', 'images/goods/eHzq2z5j6N.jpg', '1', '0', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('157', '面部美容组合', '5a619c2cbd677', '随时可享的美肌焕颜按摩', '面部护理', '2018-01-19 15:20:13', '2018-01-19 15:20:13', 'images/goods/ykHR8rFbPO.png', 'images/goods/0mHe225CvM.jpg', 'images/goods/ajDEdFpWLP.jpg', 'images/goods/SrbgYdSBcP.jpg', 'images/goods/XknTkp7tut.jpg', '0', '1', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('158', '红茶玫瑰洁面手工皂', '5a619cb21ad6d', '玫瑰馥郁 红茶轻盈', '面部护理', '2018-01-19 15:22:27', '2018-01-19 15:22:27', 'images/goods/aIVcUg9eY6.png', 'images/goods/SpJpZQUBJW.jpg', 'images/goods/pRNnDBdiqx.jpg', 'images/goods/vOVY3qr85V.jpg', 'images/goods/U9rU3iUu2w.jpg', '0', '1', '0', '1', '1', '1', '');
INSERT INTO `goods` VALUES ('159', '萌喵水晶超柔束发带', '5a619d4a7bd22', '乐天派的猫耳少女', '身体护理', '2018-01-19 15:24:59', '2018-01-19 15:24:59', 'images/goods/axP0LD5QyQ.png', 'images/goods/0Sxvnrt4tL.jpg', 'images/goods/OHYmzgntiD.jpg', 'images/goods/sumdf6CiUy.jpg', 'images/goods/91b8X0I2FF.jpg', '1', '1', '0', '0', '1', '1', '');
INSERT INTO `goods` VALUES ('160', '植物精油沐浴手工皂', '5a619dddab413', '天然精油成分，肤白香滑洗出来', '身体护理', '2018-01-19 15:27:26', '2018-01-19 15:27:26', 'images/goods/FLrh6Xxs99.png', 'images/goods/cH14JZhK7M.jpg', 'images/goods/lLu9A1aa8S.jpg', 'images/goods/n0YIWT9Uct.jpg', 'images/goods/ohuo01FseN.jpg', '0', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('161', '屋顶花园香熏蜡烛', '5a619eeb57a47', '爱马仕集团制造商，清甜', '香薰', '2018-01-19 15:31:56', '2018-01-19 15:31:56', 'images/goods/vsncWnoCOD.png', 'images/goods/kPaDShrwrb.jpg', 'images/goods/etHmrm4ohW.jpg', 'images/goods/YOtHHdt2BR.jpg', 'images/goods/yPXHOQVVff.jpg', '1', '0', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('162', '薰衣草植物精油', '5a619f6430979', '舒缓放松好睡眠', '香薰', '2018-01-19 15:33:57', '2018-01-19 15:33:57', 'images/goods/mvaf87111t.png', 'images/goods/V9l0JFqQRm.jpg', 'images/goods/r3Ddy5rty3.jpg', 'images/goods/1nIFb2ou58.jpg', 'images/goods/7tzCpylxss.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('163', '指触LED子母化妆镜', '5a619ffb084cf', '耐用节能，一键照亮细节美', '洗发护发', '2018-01-19 15:36:28', '2018-01-19 15:36:28', 'images/goods/UaiiaS6MMz.png', 'images/goods/XzbkEFqnwj.jpg', 'images/goods/DKbqy6XTlc.jpg', 'images/goods/2Y9XGbNRpa.jpg', 'images/goods/1Z1u8JnPx3.jpg', '0', '0', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('164', '白色亚克力洗浴三件套', '5a61a0a29fc1e', '进口材质，安全无毒轻盈耐用', '浴室用具', '2018-01-19 15:39:15', '2018-01-19 15:39:15', 'images/goods/TY93VgRoZZ.png', 'images/goods/iBfYtUwrpM.jpg', 'images/goods/O29KsNLgcL.jpg', 'images/goods/wWFeiSsykb.jpg', 'images/goods/gTUM5gqX7j.jpg', '0', '1', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('165', '3包装 网易严选 云感 护垫', '5a61a1697c925', '150mm没感觉，才是真的好', '生理用品', '2018-01-19 15:42:34', '2018-01-19 15:42:34', 'images/goods/C8ZzMJvXWh.png', 'images/goods/Y2tvuhoWg0.jpg', 'images/goods/NS4kVtQtP2.jpg', 'images/goods/LyUOJ3K8Au.jpg', 'images/goods/RCtSGSkZDk.jpg', '0', '1', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('166', '20只装 致薄0.03 天然胶乳橡胶避孕套', '5a61a1feda563', '超薄体验，宛如无物', '生理用品', '2018-01-19 15:45:03', '2018-01-19 15:45:03', 'images/goods/mbI7WKGT9W.png', 'images/goods/V1Tn1qk7lW.jpg', 'images/goods/hrGTp9eEhm.jpg', 'images/goods/32oel3y9aJ.jpg', 'images/goods/b6eBIAC3qp.jpg', '1', '0', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('167', '韩国制造 蜜桃味漱口水', '5a61a34595b3f', '比那氏供应商，沁甜蜜桃清新口气', '海外', '2018-01-19 15:50:30', '2018-01-19 15:50:30', 'images/goods/WlwCdtNh0p.png', 'images/goods/rUMhA6vWjg.jpg', 'images/goods/mfEJdIerlU.jpg', 'images/goods/KaeApT5KSs.jpg', 'images/goods/IliECBl4AK.jpg', '1', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('168', '100年传世珐琅锅 马卡龙系列', '5a61a3f0a03ac', '仅售供应商建议价的1/8', '黑凤梨系列', '2018-01-19 15:53:21', '2018-01-19 15:53:21', 'images/goods/TGky0vKsDu.png', 'images/goods/gIfFy4IOZ3.jpg', 'images/goods/2FkgPuFtel.png', 'images/goods/hpyj7pWVtW.jpg', 'images/goods/Hb9ktuxizS.png', '0', '1', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('169', '4盒囤货装 蒸汽热敷眼罩', '5a61a513a3e83', '给眼睛25分钟的SPA', '旅行用品', '2018-01-19 15:58:12', '2018-01-19 15:58:12', 'images/goods/56iTpWFEg1.png', 'images/goods/bOO1CtW8tf.jpg', 'images/goods/tLJjw0dqX1.jpg', 'images/goods/RHZuB1eM5k.jpg', 'images/goods/8AWqEkAtRr.jpg', '0', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('170', '双层防风防潮自动展开3-4人帐篷', '5a61a6d5a14c9', '轻松搭建，户外必备', '旅行用品', '2018-01-19 16:05:42', '2018-01-19 16:05:42', 'images/goods/MmukappPaQ.png', 'images/goods/I5dkwJbApi.jpg', 'images/goods/V2YUOZglaE.jpg', 'images/goods/n2oCUr2IQM.jpg', 'images/goods/JXKTzYJD2o.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('171', '健身瑜伽垫', '5a61a7be3a3df', '超强回弹，让身体自由伸展', '户外', '2018-01-19 16:09:35', '2018-01-19 16:09:35', 'images/goods/uqdylrpKZk.png', 'images/goods/g2ITL9rz1y.jpg', 'images/goods/LGS5mXmO0l.jpg', 'images/goods/qujtpS3sih.jpg', 'images/goods/3dRSalM6Lo.jpg', '0', '1', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('172', '超强回弹，让身体自由伸展', '5a61a8b578e08', '快速制冷，家庭必备', '户外', '2018-01-19 16:13:42', '2018-01-19 16:13:42', 'images/goods/niMksVbXOF.png', 'images/goods/tG0B9i2X0B.jpg', 'images/goods/F26Uvi6c1r.jpg', 'images/goods/yi1gHHI6sT.jpg', 'images/goods/QmEFGBMnRE.jpg', '0', '1', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('173', '6支装 碳素钢笔墨囊', '5a61a946a66b2', '轻巧重量，秒速替换', '文具', '2018-01-19 16:16:07', '2018-01-19 16:16:07', 'images/goods/4Bc3tjVBjz.png', 'images/goods/d89zDqa5ft.png', 'images/goods/NLujaX0vFT.jpg', 'images/goods/IWw3cRSWoG.jpg', 'images/goods/XOb5KaCqua.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('175', '2017SnowWish绅士圣诞礼盒', '5a61aa8c05e7f', '牛皮卡包钱包两件套+电动剃须刀', '雪愿礼盒', '2018-01-19 16:21:33', '2018-01-19 16:21:33', 'images/goods/2bA6iiGz5A.png', 'images/goods/BXYSD6rCyl.jpg', 'images/goods/6GFpGGr83h.jpg', 'images/goods/OGZiCxxu6n.jpg', 'images/goods/4SUYiv82KR.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('176', '2017SnowWish百媚圣诞礼盒', '5a61ab9ab1004', '女式蕾丝连体塑身衣+微电流滚轮身体按摩仪+连裤袜×2', '雪愿礼盒', '2018-01-19 16:26:03', '2018-01-19 16:26:03', 'images/goods/K3qkYKPEvy.png', 'images/goods/XfLVdNfRPf.jpg', 'images/goods/fduzz8FnSZ.jpg', 'images/goods/kq9UP38jg4.jpg', 'images/goods/jf8Tlqrpyd.jpg', '0', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('177', '严选礼品卡 1000元面值', '5a61ac22b825f', '高档、精致、省心的礼赠佳品', '礼品卡', '2018-01-19 16:28:19', '2018-01-19 16:28:19', 'images/goods/V16D8FHEQ6.png', 'images/goods/7rWYi9r7aC.jpg', 'images/goods/vhy8U7MAk4.jpg', 'images/goods/zkchD97jIo.jpg', 'images/goods/6LreECM6li.png', '0', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('178', '严选礼品卡 200元面值', '5a61ac93ede6c', '高档、精致、省心的礼赠佳品', '礼品卡', '2018-01-19 16:30:13', '2018-01-19 16:30:13', 'images/goods/HCALnwOGYT.png', 'images/goods/rx3N0AwKuu.jpg', 'images/goods/pOBudzpwsC.jpg', 'images/goods/NMMHeGn1Bx.jpg', 'images/goods/pvNj3Pfawk.jpg', '0', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('179', '柔风黄油曲奇 480克', '5a61ad6b2e997', '进口优质原料，不人工添加食品添加剂', '糕点', '2018-01-19 16:33:48', '2018-01-19 16:33:48', 'images/goods/rVLyuG1pop.png', 'images/goods/xXazXd4YWf.jpg', 'images/goods/0RXYwJPPPm.jpg', 'images/goods/1c0Hwe6pux.jpg', 'images/goods/oWsvdLJH0W.jpg', '0', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('180', '南枣核桃糕 160克', '5a61add7a0c65', '手工制作 口感绵软', '小食', '2018-01-19 16:35:36', '2018-01-19 16:35:36', 'images/goods/0fofC50QNz.png', 'images/goods/g1hy8r6JHQ.jpg', 'images/goods/jQc88e9UMc.jpg', 'images/goods/wDLCrq0sLQ.jpg', 'images/goods/EBKptMLWsI.jpg', '0', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('181', '八方珍选坚果礼盒', '5a61ae89e5eec', '自然好物 酥脆醇香', '坚果炒货', '2018-01-19 16:38:34', '2018-01-19 16:38:34', 'images/goods/SGB7Pqr1fV.jpg', 'images/goods/yRgqBhcgB0.jpg', 'images/goods/cFH0eU91h9.jpg', 'images/goods/H1VfpXMFwE.jpg', 'images/goods/3CWpNZ1NeO.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('182', '手剥山核桃(铁锅水煮) 128克', '5a61af2aba985', '壳薄易剥，肉仁饱满', '坚果炒货', '2018-01-19 16:41:15', '2018-01-19 16:41:15', 'images/goods/z726FSp341.png', 'images/goods/uu9aSVkGtH.jpg', 'images/goods/xbBnZ2vyXH.jpg', 'images/goods/8IEERnXoK6.jpg', 'images/goods/ov35BuFzMv.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('183', '新疆灰枣 280克', '5a61af8bd8d32', '精选新疆和田灰枣', '果干', '2018-01-19 16:42:52', '2018-01-19 16:42:52', 'images/goods/FaPGjZHn9J.png', 'images/goods/y1nWgvSN6C.jpg', 'images/goods/TGq156gux8.jpg', 'images/goods/jGUGpbHTNT.jpg', 'images/goods/oEbroRvRKj.png', '0', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('184', '芒果干 118克', '5a61b03246de8', '新鲜澳芒，甜鲜果味', '果干', '2018-01-19 16:45:39', '2018-01-19 16:45:39', 'images/goods/YBran2Ki0n.png', 'images/goods/dTZF5ic91N.jpg', 'images/goods/JNxg3hoOJq.jpg', 'images/goods/sKhu0U7a0s.jpg', 'images/goods/7dcnmy70Rj.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('185', '冻干银耳汤 15克*10包', '5a61b0b173973', '60秒速泡立享银耳原味', '冲饮', '2018-01-19 16:47:46', '2018-01-19 16:47:46', 'images/goods/b9GegkEcmO.png', 'images/goods/OiiHHTjHh7.jpg', 'images/goods/rE4wb7TC9q.jpg', 'images/goods/72doinJyIY.jpg', 'images/goods/T7rnmUXMOI.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('186', '紫椴雪蜜 420克', '5a61b122b93b6', '溶成色洁白如雪，调得质润细如膏', '冲饮', '2018-01-19 16:49:39', '2018-01-19 16:49:39', 'images/goods/KblwgAggaq.png', 'images/goods/0NA3QKlL8A.jpg', 'images/goods/o3pHceFPqA.jpg', 'images/goods/3GA5u11lIP.jpg', 'images/goods/EZXkHz0eDQ.jpg', '0', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('187', '黑凤梨 陈皮滇红礼盒 130克', '5a61b1b5a7d41', '鲜爽滇红初遇柑香陈皮', '茗茶', '2018-01-19 16:52:06', '2018-01-19 16:52:06', 'images/goods/t5wjW776QI.png', 'images/goods/YH8ZUnDPKB.jpg', 'images/goods/WOlkTleLkw.jpg', 'images/goods/8O7df9tTp4.jpg', 'images/goods/C6WJSYjMob.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('188', '羊蝎子', '5a61b22fbb5a8', '髓香肉多，回味香浓', '肉制品', '2018-01-19 16:54:08', '2018-01-19 16:54:08', 'images/goods/NzwcGd8O3o.png', 'images/goods/ncuFEu66ko.jpg', 'images/goods/o4k1IrRkjN.jpg', 'images/goods/FbtazPpTJy.jpg', 'images/goods/dQg42ovUik.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('189', '鱼豆腐 260克', '5a61b2ad5460a', '源自海捕鱼肉 口感弹嫩', '肉制品', '2018-01-19 16:56:14', '2018-01-19 16:56:14', 'images/goods/a6Ny5F1agB.png', 'images/goods/zjDr9QSgN3.jpg', 'images/goods/GDKf9A1yml.jpg', 'images/goods/kMR65bSpMC.jpg', 'images/goods/BWPhdlOV0z.jpg', '1', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('190', '麻小炒料煌酱料 390克', '5a61b34c30e9f', '味香酱浓，麻小搭档', '调味', '2018-01-19 16:58:53', '2018-01-19 16:58:53', 'images/goods/DNHpftlBhT.png', 'images/goods/bmM3R1I9Oo.jpg', 'images/goods/GJk9cM72Ok.jpg', 'images/goods/1LTeCm3Oj4.jpg', 'images/goods/3fSaximaTE.jpg', '1', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('191', '鲜椒香辣酱 220克', '5a61b3aebe77f', '鲜辣过瘾，椒香扑鼻', '调味', '2018-01-19 17:00:31', '2018-01-19 17:00:31', 'images/goods/SKpq3Vi9bp.png', 'images/goods/SsMIxS0enu.jpg', 'images/goods/7PY8yA0rCw.jpg', 'images/goods/KNXohZtRms.jpg', 'images/goods/N3r7a3Ww2u.jpg', '0', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('192', '1997年份波尔多波美候干红葡萄酒', '5a61b477b5a21', '卓越产区 馥郁堂皇', '酒水', '2018-01-19 17:03:52', '2018-01-19 17:03:52', 'images/goods/gGrnAN9e29.png', 'images/goods/ahmlUPM7dr.jpg', 'images/goods/acBLVvFH6e.jpg', 'images/goods/MhDZFAtuws.jpg', 'images/goods/dfv69gtMJm.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('193', '轻弹 双层空气棉拉链卫衣（儿童）', '5a61b521e6290', '极简裁剪 挺括保暖', '儿童服饰', '2018-01-19 17:06:42', '2018-01-19 17:06:42', 'images/goods/FG9TBVhwby.png', 'images/goods/2ym4LtRcBB.jpg', 'images/goods/J8ihSNAvJc.jpg', 'images/goods/p3rYVQ8bWi.jpg', 'images/goods/w7VVr9thEO.jpg', '1', '1', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('194', '初生礼 毛绒安抚套装', '5a61b5f49f7fe', '购买即赠同款形象毛绒玩偶1件', '玩具', '2018-01-19 17:10:13', '2018-01-19 17:10:13', 'images/goods/pU6lyZvOnd.png', 'images/goods/MTy2RIj68w.jpg', 'images/goods/0MTeh0Rfwh.jpg', 'images/goods/Tf93Yzg5MB.jpg', 'images/goods/DhErHUzTOY.jpg', '0', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('195', '毛巾绒斗篷披肩（婴童）', '5a61b67caccc4', '毛巾绒质感，挡风小斗篷', '婴幼儿服饰', '2018-01-19 17:12:29', '2018-01-19 17:12:29', 'images/goods/KTKce65g2k.png', 'images/goods/3wPfG8P2YO.jpg', 'images/goods/NQKs7ioRC9.jpg', 'images/goods/F1V9WRYMDp.jpg', 'images/goods/R63sjUXvsV.jpg', '0', '0', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('196', '新手妈咪哺乳专属搭配', '5a61b74288c3c', '多功能哺乳枕+双层纱哺乳巾', '妈咪', '2018-01-19 17:15:47', '2018-01-19 17:15:47', 'images/goods/qJ1hWzJCIY.png', 'images/goods/DhnrDiZlPZ.jpg', 'images/goods/hTg4gfpIiT.jpg', 'images/goods/h8EYeCI5Qm.jpg', 'images/goods/prK10xBdHV.jpg', '0', '1', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('198', '儿童五层收纳柜', '5a61ba703f8a4', '金属滑轨，灵活静音', '寝居', '2018-01-19 17:29:21', '2018-01-19 17:29:21', 'images/goods/9Yh9xN7qA0.png', 'images/goods/GZ0111rUbP.jpg', 'images/goods/VCquMEcUle.jpg', 'images/goods/aXnqkg0We6.jpg', 'images/goods/mErz2xORvJ.jpg', '0', '1', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('199', '2件装 儿童玩具收纳筐', '5a61bae09b5fc', '超大容量 收纳方便', '寝居', '2018-01-19 17:31:13', '2018-01-19 17:31:13', 'images/goods/KEmLa4ODN0.png', 'images/goods/So6MoFvvTH.png', 'images/goods/u0ll7bQYPN.jpg', 'images/goods/HZLhxNxUfq.jpg', 'images/goods/Zs2qTnnMYr.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('200', '10件装 棉质生活 20片婴幼儿全棉湿巾', '5a61bb6172ed4', '出门随身装，即抽即用', '婴童洗护', '2018-01-19 17:33:22', '2018-01-19 17:33:22', 'images/goods/qyl7jl6MC0.png', 'images/goods/dpNEfxCJOf.jpg', 'images/goods/nJFpGtT36c.jpg', 'images/goods/ocQpcnrrzM.jpg', 'images/goods/Xc2erBbW8d.jpg', '1', '0', '1', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('201', '儿童多功能坐便器', '5a61bbd06908c', '安全卫生 守护宝宝健康', '婴童洗护', '2018-01-19 17:35:13', '2018-01-19 17:35:13', 'images/goods/GDgfKfeZlq.png', 'images/goods/OjVT0MtBAj.jpg', 'images/goods/TrXIZu8rQ4.jpg', 'images/goods/5PXP1EL9tC.jpg', 'images/goods/elfDjvYbKa.jpg', '0', '1', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('202', '儿童防摔三格餐盘', '5a61bc618194b', '安心使用，耐摔不易碎', '喂养', '2018-01-19 17:37:38', '2018-01-19 17:37:38', 'images/goods/N3pG2YOGTg.png', 'images/goods/kEq1M8BxYV.jpg', 'images/goods/g7saNyA80p.jpg', 'images/goods/l9l3z0BNmB.jpg', 'images/goods/l9zVeQiodU.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('203', '儿童焖烧罐', '5a61bce43c8be', '小巧易携，冬日焖煮美味', '喂养', '2018-01-19 17:39:49', '2018-01-19 17:39:49', 'images/goods/ZxcmbV0UkR.png', 'images/goods/Z7PgeMYpeh.jpg', 'images/goods/8p3ZeOpukG.jpg', 'images/goods/rtTBzoO8DJ.jpg', 'images/goods/a0ccbrnwTP.jpg', '1', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('204', '儿童卡通轻便推车伞车', '5a61bd5f59013', '卡通造型，轻便牢固', '婴童出行', '2018-01-19 17:41:52', '2018-01-19 17:41:52', 'images/goods/59yQrnKCcM.png', 'images/goods/H26fECWcZL.jpg', 'images/goods/cZKJCzciax.jpg', 'images/goods/abVMGmMjVW.jpg', 'images/goods/2Z3O11UjMW.jpg', '0', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('205', '儿童汽车安全座椅0-4岁', '5a61bddbe04bf', '仅售供应商建议价的1/2', '婴童出行', '2018-01-19 17:43:56', '2018-01-19 17:43:56', 'images/goods/Et0HhLI4Z3.png', 'images/goods/UiblqJbSoJ.jpg', 'images/goods/6Ha5u8m0Sw.jpg', 'images/goods/6SCIfM1M5L.jpg', 'images/goods/64TXCinuqP.jpg', '0', '0', '0', '1', '1', '0', '');
INSERT INTO `goods` VALUES ('206', '瑞鸣收藏版CD-瑶山夜歌', '5a61be6a81338', '儿童合唱，甜美童声', '唱片', '2018-01-19 17:46:19', '2018-01-19 17:46:19', 'images/goods/jrJRM390B5.png', 'images/goods/8ttqfZhMIk.jpg', 'images/goods/3ZgxQIjpD0.jpg', 'images/goods/IxeWJ00g3c.jpg', 'images/goods/CnI5XVOR5H.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('207', '防水便携运动包 联盟 魔兽世界', '5a61bee295a9e', '可折叠收纳，运动必备', '魔兽世界', '2018-01-19 17:48:19', '2018-01-19 17:48:19', 'images/goods/xcaxEClHl4.jpg', 'images/goods/DZE1H1AhBF.jpg', 'images/goods/1h08L7xikZ.jpg', 'images/goods/FdnoNVb8Nh.jpg', 'images/goods/eCLPeoU98A.jpg', '1', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('208', '笔记本 炉石传说', '5a61bf40da8d9', '做工精细，收藏精品', '炉石传说', '2018-01-19 17:49:53', '2018-01-19 17:49:53', 'images/goods/MwDL5eR4rF.png', 'images/goods/3rNc2Z2JgB.jpg', 'images/goods/cWwuRc1its.jpg', 'images/goods/w78s9RDWFC.jpg', 'images/goods/b4pnk3l7nm.jpg', '0', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('209', '笔记本 暗黑破坏神III', '5a61bfc61a154', '内页可更换', '暗黑破坏神|||', '2018-01-19 17:52:07', '2018-01-19 17:52:07', 'images/goods/Q3n7HWAgr1.png', 'images/goods/xjeBe1Awwn.jpg', 'images/goods/tMagFpI6N7.jpg', 'images/goods/2F9rhL2lqS.jpg', 'images/goods/EoWJhKzldh.jpg', '0', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('210', '英雄系列 凯瑞甘 马克杯 星际争霸II', '5a61c03a4f49b', '萌版英雄凯瑞甘马克杯', '星际争霸||', '2018-01-19 17:54:03', '2018-01-19 17:54:03', 'images/goods/C3Y31NCc6C.png', 'images/goods/sU2aPeoNpz.jpg', 'images/goods/49mpsAsh8i.jpg', 'images/goods/WaAgoaMDw7.jpg', 'images/goods/XYnvkFVFz5.jpg', '0', '0', '0', '0', '1', '0', '');
INSERT INTO `goods` VALUES ('211', '风暴英雄纸巾抽 - 诺娃', '5a61c0aa9d595', '个性美观的纸巾盒', '风暴英雄', '2018-01-19 17:55:55', '2018-01-19 17:55:55', 'images/goods/r0SM8jvxaq.png', 'images/goods/36AXKCxJAn.jpg', 'images/goods/T2udidh7ET.jpg', 'images/goods/zO31rj7CAr.jpg', 'images/goods/qjZ0tTgpEU.jpg', '1', '0', '0', '1', '1', '0', '');

-- ----------------------------
-- Table structure for goods_order
-- ----------------------------
DROP TABLE IF EXISTS `goods_order`;
CREATE TABLE `goods_order` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单',
  `order_sn` varchar(255) DEFAULT NULL COMMENT '订单号',
  `member` varchar(255) DEFAULT NULL COMMENT '用户名',
  `phone` varchar(255) DEFAULT NULL COMMENT '手机号',
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `status` enum('6','5','4','3','2','1','0') DEFAULT '0' COMMENT '状态',
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods_order
-- ----------------------------
INSERT INTO `goods_order` VALUES ('54', 'IrmYRB61Bs', '349621400@qq.com', '13503590030', '人民路', '5', '2018-01-25 19:50:43', '2018-01-25 19:50:43');

-- ----------------------------
-- Table structure for goods_spec
-- ----------------------------
DROP TABLE IF EXISTS `goods_spec`;
CREATE TABLE `goods_spec` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '产品规格',
  `pid` int(11) DEFAULT NULL,
  `spec` varchar(255) DEFAULT NULL COMMENT '规格',
  `price` double(11,0) DEFAULT NULL COMMENT '价格',
  `count` int(11) DEFAULT NULL COMMENT '库存',
  `is_putaway` enum('1','0') DEFAULT '0' COMMENT '是否上架',
  `picture` varchar(255) DEFAULT NULL COMMENT '图片',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=423 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods_spec
-- ----------------------------
INSERT INTO `goods_spec` VALUES ('14', '6', '9件组合装（超薄&003）', '52', '999', '0', 'images/goods/43dUqu69EW.jpg');
INSERT INTO `goods_spec` VALUES ('13', '5', '15件组合装（超润滑&996）', '47', '1000', '0', 'images/goods/nLt6iNKdNt.png');
INSERT INTO `goods_spec` VALUES ('15', '7', '20只装', '99', '888', '0', 'images/goods/Vupp9KMo1y.png');
INSERT INTO `goods_spec` VALUES ('16', '8', '醋香麻辣酱味', '78', '555', '0', 'images/goods/BH1l3PzKuw.jpg');
INSERT INTO `goods_spec` VALUES ('17', '8', '蒜香麻酱味', '78', '666', '0', 'images/goods/KMScAdSFNJ.png');
INSERT INTO `goods_spec` VALUES ('88', '9', 'M', '89', '199', '0', 'images/goods/n5wbvWVUIO.png');
INSERT INTO `goods_spec` VALUES ('20', '10', 'aa', '269', '999', '0', 'images/goods/alC1s7P0fi.png');
INSERT INTO `goods_spec` VALUES ('21', '10', 'aa', '269', '999', '0', 'images/goods/9h3YTo44rY.png');
INSERT INTO `goods_spec` VALUES ('90', '11', '盒装：500毫升', '68', '299', '0', 'images/goods/h7Jg3nVG9G.png');
INSERT INTO `goods_spec` VALUES ('24', '12', '轻奢金', '119', '888', '0', 'images/goods/WmqH2rNHYq.png');
INSERT INTO `goods_spec` VALUES ('25', '12', '哥特黑', '119', '888', '0', 'images/goods/4Z4y9bNZTS.png');
INSERT INTO `goods_spec` VALUES ('26', '12', '罗曼粉', '119', '888', '0', 'images/goods/1gppzcPJK1.png');
INSERT INTO `goods_spec` VALUES ('27', '12', '古典白', '119', '888', '0', 'images/goods/8pnWIgLnqb.png');
INSERT INTO `goods_spec` VALUES ('28', '13', '项链', '299', '566', '0', 'images/goods/MiDun6GiPB.png');
INSERT INTO `goods_spec` VALUES ('91', '14', '176*88cm（单人）', '349', '199', '0', 'images/goods/iuOr6OHRnJ.png');
INSERT INTO `goods_spec` VALUES ('92', '14', '176*140cm（双人）', '449', '199', '0', 'images/goods/Wb89aegqt5.png');
INSERT INTO `goods_spec` VALUES ('31', '15', '969克', '198', '499', '0', 'images/goods/fWOp5tu2Ux.png');
INSERT INTO `goods_spec` VALUES ('32', '16', '9克*6杯', '24', '199', '0', 'images/goods/NGwKDqdnaq.png');
INSERT INTO `goods_spec` VALUES ('33', '17', '1.5M （床尺寸）', '2599', '999', '0', 'images/goods/v5Gqhuqk22.png');
INSERT INTO `goods_spec` VALUES ('34', '17', '1.8M/2.0M （床尺寸）', '2599', '999', '0', 'images/goods/wwbLm4TSIs.png');
INSERT INTO `goods_spec` VALUES ('35', '18', '单人位', '6999', '587', '0', 'images/goods/94oaaV3bYg.png');
INSERT INTO `goods_spec` VALUES ('36', '18', '双人位', '7999', '599', '0', 'images/goods/OL4gxS0RTH.png');
INSERT INTO `goods_spec` VALUES ('37', '18', '三人位', '9999', '499', '0', 'images/goods/6LgbMuKFBw.png');
INSERT INTO `goods_spec` VALUES ('93', '19', '1.8*2m', '3899', '199', '0', 'images/goods/M9nYN8L3R6.png');
INSERT INTO `goods_spec` VALUES ('40', '20', '藏青', '599', '777', '0', 'images/goods/fRtEceawBh.png');
INSERT INTO `goods_spec` VALUES ('41', '20', '深咖', '499', '666', '0', 'images/goods/Yvi8knCh1v.png');
INSERT INTO `goods_spec` VALUES ('95', '21', ' 20cm口径', '169', '199', '0', 'images/goods/sXJFEYiVew.png');
INSERT INTO `goods_spec` VALUES ('44', '22', '茶具套装', '189', '455', '0', 'images/goods/HrWR7R0uEs.png');
INSERT INTO `goods_spec` VALUES ('45', '23', '不锈钢304', '30', '599', '0', 'images/goods/Ry5BZjIIzb.png');
INSERT INTO `goods_spec` VALUES ('46', '24', '五件套(1壶+3盒+1筷)', '169', '599', '0', 'images/goods/uRUhUP9Mke.png');
INSERT INTO `goods_spec` VALUES ('97', '26', '39码', '299', '199', '0', 'images/goods/QoLgvH6L5s.png');
INSERT INTO `goods_spec` VALUES ('98', '26', '40码', '299', '199', '0', 'images/goods/IE7AX969Of.png');
INSERT INTO `goods_spec` VALUES ('100', '27', '36', '219', '199', '0', 'images/goods/ph3fAerBOW.png');
INSERT INTO `goods_spec` VALUES ('101', '27', '37', '219', '199', '0', 'images/goods/Y3fJR3Ab9d.png');
INSERT INTO `goods_spec` VALUES ('102', '27', '38', '219', '199', '0', 'images/goods/kzhQ4eMHSm.png');
INSERT INTO `goods_spec` VALUES ('108', '34', 'L', '59', '199', '0', 'images/goods/FUuxbwqqnj.png');
INSERT INTO `goods_spec` VALUES ('57', '28', '玫红色', '349', '599', '0', 'images/goods/HjE6XhpNZe.jpg');
INSERT INTO `goods_spec` VALUES ('58', '28', '宝红色', '349', '599', '0', 'images/goods/v9BxCw6DHF.jpg');
INSERT INTO `goods_spec` VALUES ('59', '28', '行军绿', '349', '599', '0', 'images/goods/jY7gFC5aVu.png');
INSERT INTO `goods_spec` VALUES ('60', '28', '草木绿', '349', '599', '0', 'images/goods/hFe0rqdj3e.png');
INSERT INTO `goods_spec` VALUES ('61', '29', '黑色', '369', '599', '0', 'images/goods/WqvWDJFP2C.png');
INSERT INTO `goods_spec` VALUES ('103', '30', '25（155/64A）', '189', '199', '0', 'images/goods/GXUOq2Oezs.png');
INSERT INTO `goods_spec` VALUES ('104', '30', '26（160/66A）', '189', '199', '0', 'images/goods/4QBsZg6Xwo.png');
INSERT INTO `goods_spec` VALUES ('105', '30', '27（160/68A）', '189', '199', '0', 'images/goods/na7kaBV7ve.png');
INSERT INTO `goods_spec` VALUES ('106', '34', 'S', '59', '199', '0', 'images/goods/h0nmMmNMNn.png');
INSERT INTO `goods_spec` VALUES ('107', '34', 'M', '59', '199', '0', 'images/goods/ZvHcNsWDMe.png');
INSERT INTO `goods_spec` VALUES ('110', '35', 'S(165/84A)', '799', '199', '0', 'images/goods/KeaF9FMXFO.png');
INSERT INTO `goods_spec` VALUES ('111', '35', 'M(170/88A)', '799', '199', '0', 'images/goods/K3b9p9zgH2.png');
INSERT INTO `goods_spec` VALUES ('112', '35', 'L(175/92A)', '799', '199', '0', 'images/goods/D5chZn21Px.png');
INSERT INTO `goods_spec` VALUES ('113', '36', 'S', '59', '199', '0', 'images/goods/uEcUn13dqo.png');
INSERT INTO `goods_spec` VALUES ('114', '36', 'M', '59', '199', '0', 'images/goods/HvOf2ItOPW.png');
INSERT INTO `goods_spec` VALUES ('124', '37', '灰', '89', '199', '0', 'images/goods/l9b0IiaSas.png');
INSERT INTO `goods_spec` VALUES ('89', '9', 'L', '89', '199', '0', 'images/goods/j9OhvtshM8.png');
INSERT INTO `goods_spec` VALUES ('94', '19', '1.5*2m', '2899', '199', '0', 'images/goods/aHtUQZkQ9e.png');
INSERT INTO `goods_spec` VALUES ('96', '21', ' 24cm口径', '269', '199', '0', 'images/goods/zNGL34gHSS.png');
INSERT INTO `goods_spec` VALUES ('99', '26', '41码', '299', '199', '0', 'images/goods/aQ0LJ7CL35.png');
INSERT INTO `goods_spec` VALUES ('109', '34', 'XL', '59', '199', '0', 'images/goods/XM6KZOTbHr.png');
INSERT INTO `goods_spec` VALUES ('115', '36', 'L', '59', '199', '0', 'images/goods/pJSTMGOfqx.png');
INSERT INTO `goods_spec` VALUES ('116', '36', 'XL', '59', '199', '0', 'images/goods/tgKBshJAVF.png');
INSERT INTO `goods_spec` VALUES ('123', '37', '黑', '89', '199', '0', 'images/goods/PXmoMio7lW.png');
INSERT INTO `goods_spec` VALUES ('122', '37', '蓝', '89', '199', '0', 'images/goods/SmfK8MONNb.png');
INSERT INTO `goods_spec` VALUES ('121', '37', '粉', '89', '199', '0', 'images/goods/Vb4Ql5pmjQ.png');
INSERT INTO `goods_spec` VALUES ('125', '38', '粉色', '499', '299', '0', 'images/goods/wQjg7eCuaU.png');
INSERT INTO `goods_spec` VALUES ('126', '39', '太空黑', '199', '199', '0', 'images/goods/JYtYuQP2G3.png');
INSERT INTO `goods_spec` VALUES ('127', '39', '冰原白', '199', '199', '0', 'images/goods/mgrBbX1by7.png');
INSERT INTO `goods_spec` VALUES ('128', '39', '火热红', '199', '199', '0', 'images/goods/EoMMGDMCrJ.png');
INSERT INTO `goods_spec` VALUES ('129', '40', '黑色', '129', '1', '0', 'images/goods/HcIfawT1cR.png');
INSERT INTO `goods_spec` VALUES ('130', '40', '粉色', '129', '119', '0', 'images/goods/WA94lISPE1.png');
INSERT INTO `goods_spec` VALUES ('131', '41', '浅咖色', '19', '199', '0', 'images/goods/FDZQlx0Clc.png');
INSERT INTO `goods_spec` VALUES ('132', '41', '粉色', '19', '199', '0', 'images/goods/aKDWhJNJzs.png');
INSERT INTO `goods_spec` VALUES ('133', '42', '5只入', '119', '199', '0', 'images/goods/tkAyKutdjY.png');
INSERT INTO `goods_spec` VALUES ('134', '43', '229*70*28mm', '79', '199', '0', 'images/goods/BS0wPpogBr.png');
INSERT INTO `goods_spec` VALUES ('135', '44', '5件装 谷风一木 软抽面巾纸30包', '78', '199', '0', 'images/goods/Otp5WP0aPu.png');
INSERT INTO `goods_spec` VALUES ('136', '45', '经典黑', '699', '199', '0', 'images/goods/h58qQu1cZy.png');
INSERT INTO `goods_spec` VALUES ('137', '45', '太空银', '699', '199', '0', 'images/goods/9XXEejSLwh.png');
INSERT INTO `goods_spec` VALUES ('138', '45', '草木绿', '699', '199', '0', 'images/goods/upZ5TbGyQx.png');
INSERT INTO `goods_spec` VALUES ('139', '45', '宝石红', '699', '199', '0', 'images/goods/Y7y5E4x6MX.png');
INSERT INTO `goods_spec` VALUES ('140', '46', '紫色3只装', '25', '199', '0', 'images/goods/b8Xge8Itnw.png');
INSERT INTO `goods_spec` VALUES ('141', '46', '白色10只装', '70', '199', '0', 'images/goods/qPvPikm4iY.png');
INSERT INTO `goods_spec` VALUES ('142', '47', '2.2L', '279', '299', '0', 'images/goods/exBERQ7XDg.png');
INSERT INTO `goods_spec` VALUES ('143', '48', 'A5 黑色', '49', '199', '0', 'images/goods/k2EH0SbbGe.png');
INSERT INTO `goods_spec` VALUES ('144', '48', 'A5 红色', '49', '199', '0', 'images/goods/rGojqmfU0s.jpg');
INSERT INTO `goods_spec` VALUES ('145', '49', '青梅鲜果冻', '14', '199', '0', 'images/goods/L4IPmS1C5H.png');
INSERT INTO `goods_spec` VALUES ('146', '49', '雪梨鲜果冻', '14', '199', '0', 'images/goods/dJeJVd4lgk.png');
INSERT INTO `goods_spec` VALUES ('147', '50', '10克（两盏）', '428', '199', '0', 'images/goods/LLkELo5vki.png');
INSERT INTO `goods_spec` VALUES ('148', '50', '30克（六盏）', '1288', '199', '0', 'images/goods/v6XJswvk1S.png');
INSERT INTO `goods_spec` VALUES ('149', '51', '北海道牛奶风味', '13', '299', '0', 'images/goods/Q4stv8FVdo.png');
INSERT INTO `goods_spec` VALUES ('150', '51', '香蕉牛奶风味', '13', '299', '0', 'images/goods/q8x7Z5aGsO.jpg');
INSERT INTO `goods_spec` VALUES ('151', '52', '简易装（130克）', '85', '299', '0', 'images/goods/tutiuc5Sd6.png');
INSERT INTO `goods_spec` VALUES ('152', '52', '礼盒装（250克）', '198', '299', '0', 'images/goods/59AZvb6n9e.png');
INSERT INTO `goods_spec` VALUES ('153', '53', '110cm（建议3~4岁）', '149', '199', '0', 'images/goods/Lpfga3pVyv.png');
INSERT INTO `goods_spec` VALUES ('154', '53', '120cm（建议5~6岁)', '149', '199', '0', 'images/goods/ZnfXfbjplL.png');
INSERT INTO `goods_spec` VALUES ('155', '53', '130cm（建议7~8岁)', '149', '199', '0', 'images/goods/N1sYSNpKEe.png');
INSERT INTO `goods_spec` VALUES ('156', '54', '100片/1袋', '29', '199', '0', 'images/goods/hr6FQENQIg.png');
INSERT INTO `goods_spec` VALUES ('157', '54', '100片/*2', '49', '199', '0', 'images/goods/DOiWKNArou.png');
INSERT INTO `goods_spec` VALUES ('158', '55', '66cm（适合3-6个月）', '115', '129', '0', 'images/goods/a0NXry1Xgr.png');
INSERT INTO `goods_spec` VALUES ('159', '55', '73cm（适合6-9个月）', '115', '129', '0', 'images/goods/faZXEEW8cH.png');
INSERT INTO `goods_spec` VALUES ('160', '56', '蓝色组合', '428', '199', '0', 'images/goods/yxJ8f2hYkq.png');
INSERT INTO `goods_spec` VALUES ('161', '56', '粉色组合', '428', '199', '0', 'images/goods/NC9mqCDZii.png');
INSERT INTO `goods_spec` VALUES ('162', '57', '一套', '69', '199', '0', 'images/goods/TWgXGv6OTb.jpg');
INSERT INTO `goods_spec` VALUES ('163', '58', '红色', '79', '199', '0', 'images/goods/Ckc26zxGd3.jpg');
INSERT INTO `goods_spec` VALUES ('164', '58', '白色', '79', '199', '0', 'images/goods/CgFwVQodgM.jpg');
INSERT INTO `goods_spec` VALUES ('165', '58', '黑色', '79', '199', '0', 'images/goods/CtPV9FRwGK.jpg');
INSERT INTO `goods_spec` VALUES ('166', '59', '守望先锋', '39', '299', '0', 'images/goods/kfgvUn73uJ.jpg');
INSERT INTO `goods_spec` VALUES ('167', '60', '头层牛皮', '88', '199', '0', 'images/goods/S5sfp8BI5D.png');
INSERT INTO `goods_spec` VALUES ('176', '63', '1.8M', '1599', '34', '0', 'images/goods/WtUvi4I3No.jpg');
INSERT INTO `goods_spec` VALUES ('175', '62', '1.8M/ 2.0M（床尺寸）', '719', '123', '0', '0');
INSERT INTO `goods_spec` VALUES ('174', '62', '1.5M（床尺寸）', '719', '666', '0', '0');
INSERT INTO `goods_spec` VALUES ('181', '67', '烟灰棕', '8999', '2323', '0', 'images/goods/ZwdE6wiZhQ.jpg');
INSERT INTO `goods_spec` VALUES ('182', '71', '素粉', '25', '888', '0', 'images/goods/sCe3yfURgx.png');
INSERT INTO `goods_spec` VALUES ('183', '71', '灰蓝', '25', '132', '0', 'images/goods/J2gAMMFhOB.png');
INSERT INTO `goods_spec` VALUES ('184', '71', '琉青', '25', '123', '0', 'images/goods/HDYjVK4lYf.png');
INSERT INTO `goods_spec` VALUES ('185', '71', '奶白', '25', '22', '0', 'images/goods/fWFezY4APm.png');
INSERT INTO `goods_spec` VALUES ('186', '71', '浅咖', '25', '11', '0', 'images/goods/lLKQHgYsjj.png');
INSERT INTO `goods_spec` VALUES ('187', '72', '2支装-550ml', '109', '123', '0', 'images/goods/qGZOafwKv6.png');
INSERT INTO `goods_spec` VALUES ('188', '73', '薄荷绿/无盖/直火使用/电磁炉不可用', '180', '23', '0', 'images/goods/LHrrsDRZIK.png');
INSERT INTO `goods_spec` VALUES ('189', '73', '象牙白/无盖/直火使用/电磁炉不可用', '180', '34', '0', 'images/goods/COwBQ0Omo0.png');
INSERT INTO `goods_spec` VALUES ('190', '74', '炒锅/汤锅/多用锅/锅铲/汤勺/火锅筷/锅垫', '599', '34', '0', 'images/goods/Xr6a1sgX2x.jpg');
INSERT INTO `goods_spec` VALUES ('191', '75', '薄荷绿/钻石锅盖/直火使用/电磁炉不可用', '299', '32', '0', 'images/goods/NQlo3Hzyta.png');
INSERT INTO `goods_spec` VALUES ('192', '75', '象牙白/钻石锅盖/直火使用/电磁炉不可用', '299', '343', '0', 'images/goods/Gn6tLxcfm2.png');
INSERT INTO `goods_spec` VALUES ('193', '76', '大盘-星空蓝', '69', '122', '0', 'images/goods/zWHBICPyzL.png');
INSERT INTO `goods_spec` VALUES ('194', '76', '小盘-月光蓝', '69', '232', '0', 'images/goods/djQuwXWKP9.png');
INSERT INTO `goods_spec` VALUES ('195', '77', '素粉', '59', '45', '0', 'images/goods/UdKQGQQASd.png');
INSERT INTO `goods_spec` VALUES ('196', '77', '灰蓝', '59', '45', '0', 'images/goods/a8JmoSMO2c.png');
INSERT INTO `goods_spec` VALUES ('197', '77', '琉青', '59', '546', '0', 'images/goods/2YwXG1rfJW.png');
INSERT INTO `goods_spec` VALUES ('198', '78', '9头青瓷餐具套装', '499', '768', '0', 'images/goods/KmctyO9qc9.jpg');
INSERT INTO `goods_spec` VALUES ('199', '79', '竹林青', '25', '45', '0', 'images/goods/AQDAFzlcFX.png');
INSERT INTO `goods_spec` VALUES ('200', '79', '素粉', '25', '56', '0', 'images/goods/uPHushajIo.png');
INSERT INTO `goods_spec` VALUES ('201', '80', '围裙1', '20', '3245', '0', 'images/goods/fRE2lhtDEV.png');
INSERT INTO `goods_spec` VALUES ('202', '80', '手套1', '20', '45', '0', 'images/goods/0iZqKPQoMQ.png');
INSERT INTO `goods_spec` VALUES ('203', '80', '锅垫', '20', '45', '0', 'images/goods/NdbYoQ6p9K.png');
INSERT INTO `goods_spec` VALUES ('204', '81', 'pp不织布*40（月度装）', '10', '345', '0', 'images/goods/E5oMZxoYgp.png');
INSERT INTO `goods_spec` VALUES ('205', '81', 'pp不织布*120（季度装）', '10', '45', '0', 'images/goods/iFWjZq4HPB.png');
INSERT INTO `goods_spec` VALUES ('206', '82', '欧标硅胶', '129', '56', '0', 'images/goods/Dti46pDihv.jpg');
INSERT INTO `goods_spec` VALUES ('207', '83', '[茶具套装] 1壶4杯', '79', '56', '0', 'images/goods/f5JOqokNxB.jpg');
INSERT INTO `goods_spec` VALUES ('209', '85', '1只装【500ml】', '69', '56', '0', 'images/goods/jinZuzgh6P.jpg');
INSERT INTO `goods_spec` VALUES ('210', '86', '不锈钢304', '19', '45', '0', 'images/goods/ovaXTZysxd.jpg');
INSERT INTO `goods_spec` VALUES ('211', '87', '两片装', '13', '5896', '0', 'images/goods/rTBFHVEIJ5.jpg');
INSERT INTO `goods_spec` VALUES ('213', '88', '1只装', '30', '343', '0', '0');
INSERT INTO `goods_spec` VALUES ('214', '89', '1支装', '15', '34', '0', 'images/goods/wjw8ECUrQl.png');
INSERT INTO `goods_spec` VALUES ('215', '90', '白盖1L', '19', '45', '0', 'images/goods/gHJtC5S5Rp.png');
INSERT INTO `goods_spec` VALUES ('216', '91', '不锈钢304', '15', '34', '0', 'images/goods/UoYpJu271p.png');
INSERT INTO `goods_spec` VALUES ('217', '92', '【2件组 】砧板加砧板架', '199', '5656', '0', 'images/goods/U8xInEywUN.png');
INSERT INTO `goods_spec` VALUES ('218', '92', '【3件装】砧板+砧板架+中式菜刀', '251', '567', '0', 'images/goods/L8IacmJNLD.png');
INSERT INTO `goods_spec` VALUES ('219', '93', '波普粉', '10', '453', '0', 'images/goods/AYt7R589eP.png');
INSERT INTO `goods_spec` VALUES ('220', '93', '星空黑', '10', '45', '0', 'images/goods/iqKkdL9iRU.png');
INSERT INTO `goods_spec` VALUES ('221', '94', '刀片加长版', '20', '34895', '0', 'images/goods/ozNtp0fM6J.png');
INSERT INTO `goods_spec` VALUES ('222', '95', '格伦秦键（柚子黄）', '49', '676', '0', 'images/goods/t4kdWFkb01.png');
INSERT INTO `goods_spec` VALUES ('223', '95', '华章线普（樱花粉）', '49', '65', '0', 'images/goods/fiCmGUh2z4.png');
INSERT INTO `goods_spec` VALUES ('224', '96', '经典黑', '699', '940', '0', 'images/goods/UXE5JMAwwh.png');
INSERT INTO `goods_spec` VALUES ('225', '96', '太空银', '699', '4596', '0', 'images/goods/cyejv58YUN.png');
INSERT INTO `goods_spec` VALUES ('226', '97', '翼光金', '319', '456', '0', 'images/goods/4y0htzyjlB.png');
INSERT INTO `goods_spec` VALUES ('227', '97', '曼沙粉', '319', '546', '0', 'images/goods/Nyc10R93dY.png');
INSERT INTO `goods_spec` VALUES ('228', '98', '神秘灰', '439', '345', '0', 'images/goods/EJGt55fb2r.jpg');
INSERT INTO `goods_spec` VALUES ('229', '98', '太空银', '439', '67', '0', 'images/goods/1rUN7goiDA.png');
INSERT INTO `goods_spec` VALUES ('230', '99', '灰色', '199', '45', '0', 'images/goods/i1BAopT2Kk.png');
INSERT INTO `goods_spec` VALUES ('231', '100', '阳光橙', '199', '435', '0', 'images/goods/1D0LZJm6j7.png');
INSERT INTO `goods_spec` VALUES ('232', '101', '灰色', '59', '56', '0', 'images/goods/YIqdeW7CJr.png');
INSERT INTO `goods_spec` VALUES ('233', '102', '红/蓝色', '759', '34', '0', 'images/goods/78o2luvGvt.png');
INSERT INTO `goods_spec` VALUES ('234', '102', '灰色', '759', '34', '0', 'images/goods/9qjNxRjcCb.png');
INSERT INTO `goods_spec` VALUES ('235', '103', '黑色', '359', '567', '0', 'images/goods/KI7DdNECfe.png');
INSERT INTO `goods_spec` VALUES ('237', '104', '金色', '199', '67', '0', 'images/goods/Iy05TjdQBU.png');
INSERT INTO `goods_spec` VALUES ('238', '105', '经典黑/罂粟红', '459', '78', '0', 'images/goods/2ZoLK3C0Gy.png');
INSERT INTO `goods_spec` VALUES ('239', '105', '樱花粉', '459', '78', '0', 'images/goods/Jnl4sOyobi.png');
INSERT INTO `goods_spec` VALUES ('240', '105', '浅棕色', '459', '67', '0', 'images/goods/ioNqFDJZ1l.png');
INSERT INTO `goods_spec` VALUES ('241', '106', '黑色', '269', '67856', '0', 'images/goods/q8h6OcNYaU.png');
INSERT INTO `goods_spec` VALUES ('242', '107', '灰色', '239', '0', '0', 'images/goods/nuobr16FHR.png');
INSERT INTO `goods_spec` VALUES ('243', '108', '黑色', '69', '4598', '0', 'images/goods/j8QKQOqI9P.png');
INSERT INTO `goods_spec` VALUES ('244', '108', '浅蓝', '69', '9408', '0', 'images/goods/izQD1yJNXl.png');
INSERT INTO `goods_spec` VALUES ('245', '108', '深蓝', '69', '45', '0', 'images/goods/f6TyLb30Ln.png');
INSERT INTO `goods_spec` VALUES ('246', '109', '黑色', '189', '98', '0', 'images/goods/eyQcqPjFfJ.png');
INSERT INTO `goods_spec` VALUES ('247', '110', '深棕', '199', '4', '0', 'images/goods/UJEdhLJMRH.png');
INSERT INTO `goods_spec` VALUES ('248', '110', '深蓝', '199', '98', '0', 'images/goods/2REJNrZqgy.png');
INSERT INTO `goods_spec` VALUES ('249', '110', '浅粉', '199', '89', '0', 'images/goods/FT3EU8CLMy.png');
INSERT INTO `goods_spec` VALUES ('250', '111', '黑色', '149', '39', '0', 'images/goods/aTbHzwUj5F.png');
INSERT INTO `goods_spec` VALUES ('251', '111', '棕色', '149', '45', '0', 'images/goods/BW7kjKFAe0.png');
INSERT INTO `goods_spec` VALUES ('254', '112', '灰色', '349', '89', '0', 'images/goods/zM4HF8uwou.png');
INSERT INTO `goods_spec` VALUES ('255', '113', '米色', '189', '456', '0', 'images/goods/GdomHTkiyP.png');
INSERT INTO `goods_spec` VALUES ('256', '113', '棕色', '189', '890', '0', 'images/goods/Xo8kPm3gil.png');
INSERT INTO `goods_spec` VALUES ('257', '114', '黑色', '90', '23', '0', 'images/goods/lGBHqSdGJA.png');
INSERT INTO `goods_spec` VALUES ('258', '115', '优雅棕', '89', '345', '0', 'images/goods/3dALWWf6CF.png');
INSERT INTO `goods_spec` VALUES ('259', '115', '质感灰', '89', '89', '0', 'images/goods/Yt3UsoLjxQ.png');
INSERT INTO `goods_spec` VALUES ('260', '116', '粉色', '27', '8', '0', 'images/goods/VHNGAbUt52.png');
INSERT INTO `goods_spec` VALUES ('261', '116', '浅蓝', '27', '90', '0', 'images/goods/VyinBYbCGw.png');
INSERT INTO `goods_spec` VALUES ('262', '117', '男宽灰色', '129', '989', '0', 'images/goods/WMymd0e4CH.png');
INSERT INTO `goods_spec` VALUES ('263', '117', '女款粉色', '129', '98', '0', 'images/goods/QR96f85yrL.png');
INSERT INTO `goods_spec` VALUES ('264', '118', '35-36码', '35', '89', '0', 'images/goods/hvAdZ4zeem.png');
INSERT INTO `goods_spec` VALUES ('265', '118', '37-38码', '35', '809', '0', 'images/goods/ZM1VXHfrgr.jpg');
INSERT INTO `goods_spec` VALUES ('266', '119', '粉色', '199', '89', '0', 'images/goods/qrRONKx5Po.png');
INSERT INTO `goods_spec` VALUES ('267', '119', '豆沙色', '199', '89', '0', 'images/goods/iHx2gTqDPg.png');
INSERT INTO `goods_spec` VALUES ('268', '120', '裸色', '9', '89', '0', 'images/goods/yBzl6rQ9SG.png');
INSERT INTO `goods_spec` VALUES ('269', '120', '无色', '9', '90', '0', 'images/goods/Zgf039xZ1E.png');
INSERT INTO `goods_spec` VALUES ('270', '121', '无色', '9', '98', '0', 'images/goods/tc2bkPVTQZ.png');
INSERT INTO `goods_spec` VALUES ('271', '121', '裸色', '9', '78', '0', 'images/goods/PYfamwSPmC.png');
INSERT INTO `goods_spec` VALUES ('272', '122', '裸色', '9', '890', '0', 'images/goods/U2AMu5eR2d.png');
INSERT INTO `goods_spec` VALUES ('273', '122', '透明色', '9', '98', '0', 'images/goods/uQsiRx76zo.png');
INSERT INTO `goods_spec` VALUES ('274', '123', '裸色', '9', '89', '0', 'images/goods/xYi3BL2e3R.png');
INSERT INTO `goods_spec` VALUES ('275', '123', '无色', '9', '89', '0', 'images/goods/sppLGbU1Mc.png');
INSERT INTO `goods_spec` VALUES ('276', '124', '璎紫（紫蓝）', '159', '89', '0', 'images/goods/UfE8oejX4F.png');
INSERT INTO `goods_spec` VALUES ('277', '124', '驼色', '159', '980', '0', 'images/goods/m5yFO7O0Gm.png');
INSERT INTO `goods_spec` VALUES ('278', '124', '粉色', '159', '980', '0', 'images/goods/9YSytHNuTo.png');
INSERT INTO `goods_spec` VALUES ('279', '125', '灰+酒红', '93', '89', '0', 'images/goods/ccCRQBpyFU.png');
INSERT INTO `goods_spec` VALUES ('280', '125', '黑+灰', '93', '89', '0', 'images/goods/OUlUsEC7Mx.png');
INSERT INTO `goods_spec` VALUES ('281', '126', '本草原色', '129', '89', '0', 'images/goods/f9DCsY1Mug.jpg');
INSERT INTO `goods_spec` VALUES ('282', '127', '米色', '39', '89', '0', 'images/goods/XmCQd84k1r.png');
INSERT INTO `goods_spec` VALUES ('283', '127', '黑色', '0', '0', '0', '0');
INSERT INTO `goods_spec` VALUES ('284', '128', '樱粉凤梨', '59', '90', '0', 'images/goods/J6rms0JQtI.png');
INSERT INTO `goods_spec` VALUES ('285', '129', '黑色', '159', '98', '0', 'images/goods/2whYkZFpt9.png');
INSERT INTO `goods_spec` VALUES ('286', '130', '圆型', '179', '89', '0', 'images/goods/C28xITa9w9.png');
INSERT INTO `goods_spec` VALUES ('287', '130', '方型', '179', '89', '0', 'images/goods/wBY3ZI6Je6.png');
INSERT INTO `goods_spec` VALUES ('288', '131', '黑色', '129', '89', '0', 'images/goods/CjUeJJb3h5.png');
INSERT INTO `goods_spec` VALUES ('289', '132', '摩登黑', '129', '879', '0', 'images/goods/So1SDFVRYz.png');
INSERT INTO `goods_spec` VALUES ('290', '133', '金色', '135', '8', '0', 'images/goods/EqYnzyHGXJ.png');
INSERT INTO `goods_spec` VALUES ('291', '133', '黑色', '135', '89', '0', 'images/goods/VBEkTwmIP6.png');
INSERT INTO `goods_spec` VALUES ('292', '134', '金色', '199', '89', '0', 'images/goods/VCrTzvD3Hn.png');
INSERT INTO `goods_spec` VALUES ('293', '134', '黑色', '19', '890', '0', 'images/goods/zjSfGj3AEh.png');
INSERT INTO `goods_spec` VALUES ('294', '135', '项链', '293', '89', '0', 'images/goods/QcgIShWzVL.png');
INSERT INTO `goods_spec` VALUES ('295', '136', '军绿色', '250', '89', '0', 'images/goods/EYB1odAE7W.png');
INSERT INTO `goods_spec` VALUES ('296', '136', '红色', '250', '89', '0', 'images/goods/S0pIWrtaff.png');
INSERT INTO `goods_spec` VALUES ('297', '136', '藏青色', '250', '789', '0', 'images/goods/gs2BxKQi5B.png');
INSERT INTO `goods_spec` VALUES ('298', '137', '樱花粉', '399', '89', '0', 'images/goods/9Do1XmuTnt.jpg');
INSERT INTO `goods_spec` VALUES ('299', '137', '浅灰色', '399', '90', '0', 'images/goods/C975B4TGwB.png');
INSERT INTO `goods_spec` VALUES ('300', '138', '黑色', '429', '89', '0', 'images/goods/6u6Esxg6Fz.png');
INSERT INTO `goods_spec` VALUES ('301', '139', '中花灰', '249', '89', '0', 'images/goods/afNceJzytK.png');
INSERT INTO `goods_spec` VALUES ('302', '139', '灰色', '249', '898', '0', '0');
INSERT INTO `goods_spec` VALUES ('303', '140', '蒂凡尼蓝/白', '199', '65', '0', 'images/goods/wWtu8NXEk4.png');
INSERT INTO `goods_spec` VALUES ('304', '141', '水蓝色', '199', '89', '0', 'images/goods/FEKrykM7kl.png');
INSERT INTO `goods_spec` VALUES ('305', '142', '麻灰色', '89', '90', '0', 'images/goods/cCNUN0qtHa.png');
INSERT INTO `goods_spec` VALUES ('306', '143', '姜黄/粉红', '45', '56', '0', 'images/goods/8Nfh266c7k.png');
INSERT INTO `goods_spec` VALUES ('307', '144', '藏青色', '16', '89', '0', 'images/goods/L9ZAMypO2K.png');
INSERT INTO `goods_spec` VALUES ('308', '145', '藏青色', '235', '90', '0', 'images/goods/f3oIJAAdIL.png');
INSERT INTO `goods_spec` VALUES ('309', '146', '黑色', '139', '78', '0', 'images/goods/DdrfuXgKic.jpg');
INSERT INTO `goods_spec` VALUES ('310', '147', '5层', '299', '89213', '0', 'images/goods/cKAYQqGRFn.png');
INSERT INTO `goods_spec` VALUES ('311', '148', '4L', '499', '3478', '0', 'images/goods/FINbeASb4c.png');
INSERT INTO `goods_spec` VALUES ('312', '149', '红色', '219', '843590', '0', 'images/goods/zLfUydtkoU.png');
INSERT INTO `goods_spec` VALUES ('313', '149', '白色', '219', '890', '0', 'images/goods/nYGJh19bMh.png');
INSERT INTO `goods_spec` VALUES ('314', '149', '黑色', '219', '89054', '0', 'images/goods/h4dEbI0M0V.png');
INSERT INTO `goods_spec` VALUES ('320', '151', '中国红', '29', '890', '0', 'images/goods/Uz15jp1oBu.png');
INSERT INTO `goods_spec` VALUES ('319', '151', '深海蓝', '29', '890', '0', 'images/goods/OXnOkW8hr2.png');
INSERT INTO `goods_spec` VALUES ('318', '151', '曜石黑', '29', '809', '0', 'images/goods/6nFo0dAtAP.png');
INSERT INTO `goods_spec` VALUES ('321', '152', '樱花粉', '238', '45980', '0', 'images/goods/y3vRSf5rwa.png');
INSERT INTO `goods_spec` VALUES ('322', '152', '极简白', '238', '8099', '0', 'images/goods/yD5qHnjHYG.png');
INSERT INTO `goods_spec` VALUES ('323', '152', '经典黑', '238', '789', '0', 'images/goods/8qmJXMJPIE.png');
INSERT INTO `goods_spec` VALUES ('324', '153', '柿红', '99', '987', '0', 'images/goods/V50Di79dhj.png');
INSERT INTO `goods_spec` VALUES ('325', '153', '浅绿', '99', '798', '0', 'images/goods/HNzPmp97Bu.png');
INSERT INTO `goods_spec` VALUES ('326', '153', '暮蓝', '99', '789', '0', 'images/goods/9xoGKkQjfz.png');
INSERT INTO `goods_spec` VALUES ('327', '154', '毛巾+浴巾+浴垫', '139', '890', '0', 'images/goods/Kl8viGj2LB.png');
INSERT INTO `goods_spec` VALUES ('328', '155', '10片便携装', '5', '789', '0', 'images/goods/RQlJ7RozTj.png');
INSERT INTO `goods_spec` VALUES ('329', '155', '10片装*10包', '10', '4543', '0', 'images/goods/G9qT0uergy.png');
INSERT INTO `goods_spec` VALUES ('330', '156', '四支装套刷', '39', '4534', '0', 'images/goods/HrEMiMB3HO.png');
INSERT INTO `goods_spec` VALUES ('331', '157', '美眼笔+脸部按摩仪', '329', '5619', '0', 'images/goods/fw05flJOKa.png');
INSERT INTO `goods_spec` VALUES ('332', '158', '80g', '49', '4543', '0', 'images/goods/V5uIKAT0hC.png');
INSERT INTO `goods_spec` VALUES ('333', '158', '80g*10', '59', '45435', '0', 'images/goods/ltdCM9WYb6.jpg');
INSERT INTO `goods_spec` VALUES ('334', '159', '波斯白', '15', '890', '0', 'images/goods/LSPNDESi1C.png');
INSERT INTO `goods_spec` VALUES ('335', '160', '抹茶蜂蜜精油手工皂', '25', '5654', '0', 'images/goods/vzpFSRY5QW.png');
INSERT INTO `goods_spec` VALUES ('336', '160', '豆乳樱花沐浴手工皂', '22', '809', '0', 'images/goods/Xn9J8evY9V.png');
INSERT INTO `goods_spec` VALUES ('337', '160', '杏仁深海沐浴手工皂', '22', '45345', '0', 'images/goods/uefWdXj6Sq.png');
INSERT INTO `goods_spec` VALUES ('338', '161', '200g', '99', '5675', '0', 'images/goods/u7NmrQCcQk.png');
INSERT INTO `goods_spec` VALUES ('339', '162', '10ml', '49', '8098', '0', 'images/goods/1xXTeIp5ef.png');
INSERT INTO `goods_spec` VALUES ('340', '163', '樱花粉', '109', '345890', '0', 'images/goods/kCSDS5WiYK.png');
INSERT INTO `goods_spec` VALUES ('341', '163', '珍珠白', '109', '4543', '0', 'images/goods/htCtuEmoAa.png');
INSERT INTO `goods_spec` VALUES ('342', '164', '肥皂盒', '25', '5654', '0', 'images/goods/5tEIS6JDYT.png');
INSERT INTO `goods_spec` VALUES ('343', '164', '牙刷架', '25', '789789', '0', 'images/goods/Bo7UgEpA5R.jpg');
INSERT INTO `goods_spec` VALUES ('344', '165', '3包装护垫-共90片', '30', '56456', '0', 'images/goods/3MfDTlwcoc.png');
INSERT INTO `goods_spec` VALUES ('345', '166', '20支装', '99', '789', '0', 'images/goods/by4q0J0iST.png');
INSERT INTO `goods_spec` VALUES ('346', '167', '60ml', '49', '87908', '0', 'images/goods/ogzEcv6rTG.png');
INSERT INTO `goods_spec` VALUES ('347', '168', '磨白沙/有盖', '359', '4551', '0', 'images/goods/EVfmAJMd0M.png');
INSERT INTO `goods_spec` VALUES ('348', '169', '无香款10片装*2盒+薰衣草10片装*2盒', '159', '45', '0', 'images/goods/dLwLTyXju1.png');
INSERT INTO `goods_spec` VALUES ('352', '170', '暗夜灰', '349', '8908', '0', '0');
INSERT INTO `goods_spec` VALUES ('351', '170', '沙漠驼', '349', '8900', '0', '0');
INSERT INTO `goods_spec` VALUES ('353', '171', '粉色', '79', '590', '0', 'images/goods/3vt6AmEYst.png');
INSERT INTO `goods_spec` VALUES ('355', '172', '两盒', '10', '85968', '0', '0');
INSERT INTO `goods_spec` VALUES ('356', '172', '三盒', '30', '890', '0', 'images/goods/72qLBMO83Y.png');
INSERT INTO `goods_spec` VALUES ('357', '173', '黑色', '10', '9450', '0', 'images/goods/J5CMPGtKvP.png');
INSERT INTO `goods_spec` VALUES ('358', '173', '蓝色', '10', '89', '0', 'images/goods/ZVRjr04fJJ.png');
INSERT INTO `goods_spec` VALUES ('359', '173', '红色', '10', '98', '0', 'images/goods/omJHEetvd3.png');
INSERT INTO `goods_spec` VALUES ('360', '175', '牛皮卡包', '359', '5656', '0', 'images/goods/S4ODIebDTA.png');
INSERT INTO `goods_spec` VALUES ('361', '176', '百媚礼盒 塑身衣尺码XL', '369', '565', '0', 'images/goods/O2Qs2p9joI.png');
INSERT INTO `goods_spec` VALUES ('362', '176', '百媚礼盒 塑身衣尺码L', '369', '6575', '0', 'images/goods/Hltv8lbchZ.png');
INSERT INTO `goods_spec` VALUES ('363', '177', '电子卡', '1000', '890', '0', 'images/goods/X5N2XXqSiz.jpg');
INSERT INTO `goods_spec` VALUES ('364', '177', '实体卡', '1000', '890', '0', 'images/goods/MTPoHxWxcR.jpg');
INSERT INTO `goods_spec` VALUES ('365', '178', '电子卡', '100', '789', '0', 'images/goods/qU9U0vOND4.jpg');
INSERT INTO `goods_spec` VALUES ('366', '178', '实体卡', '1000', '890', '0', 'images/goods/Oukf1PWI48.jpg');
INSERT INTO `goods_spec` VALUES ('367', '179', '480', '48', '980', '0', 'images/goods/YHNKzhL2Lq.png');
INSERT INTO `goods_spec` VALUES ('368', '180', '1盒装', '26', '890', '0', 'images/goods/eoKS0OCZ9s.png');
INSERT INTO `goods_spec` VALUES ('369', '181', '1.176千克', '288', '890', '0', 'images/goods/eD5SfrYudb.jpg');
INSERT INTO `goods_spec` VALUES ('370', '182', '128g', '32', '890', '0', 'images/goods/e7fZTZu5bs.png');
INSERT INTO `goods_spec` VALUES ('371', '183', '购买3袋装赠送1袋苹果脆片', '29', '6546', '0', 'images/goods/E9EmOXxBFb.png');
INSERT INTO `goods_spec` VALUES ('372', '183', '组合装（2袋新疆灰枣+2袋和田骏枣）', '40', '453', '0', 'images/goods/APh02XcoRC.png');
INSERT INTO `goods_spec` VALUES ('373', '184', '购买3袋装送1袋苹果脆片', '34', '343', '0', 'images/goods/oPipJsQKqE.jpg');
INSERT INTO `goods_spec` VALUES ('374', '184', '1袋装   ', '20', '675', '0', 'images/goods/MEpzWnDPuL.jpg');
INSERT INTO `goods_spec` VALUES ('375', '185', '组合装（红枣枸杞 150克+冰糖雪梨 150克）', '49', '564', '0', 'images/goods/AmdihYGCEm.png');
INSERT INTO `goods_spec` VALUES ('376', '185', '冰糖雪梨 150克   ', '45', '564', '0', 'images/goods/WwLlDQFSHH.jpg');
INSERT INTO `goods_spec` VALUES ('377', '186', '家庭装：1千克', '32', '453', '0', 'images/goods/1A16YaeZ8O.jpg');
INSERT INTO `goods_spec` VALUES ('378', '186', '个人装：420克   ', '32', '2342', '0', 'images/goods/zMDk35QC9c.jpg');
INSERT INTO `goods_spec` VALUES ('379', '187', '130克（5克*26袋）', '198', '45', '0', 'images/goods/xZbhck3AAK.png');
INSERT INTO `goods_spec` VALUES ('380', '188', '香辣味', '68', '564', '0', 'images/goods/Gc92ekTceQ.png');
INSERT INTO `goods_spec` VALUES ('381', '188', '原味', '68', '67', '0', 'images/goods/D95uLiUIKi.jpg');
INSERT INTO `goods_spec` VALUES ('382', '189', '原味', '168', '678', '0', 'images/goods/RY6wfoodeD.jpg');
INSERT INTO `goods_spec` VALUES ('383', '189', '香辣味', '168', '765', '0', 'images/goods/QgLuiAK3lW.jpg');
INSERT INTO `goods_spec` VALUES ('384', '190', '390g', '26', '45', '0', 'images/goods/hbgXP8sbWk.jpg');
INSERT INTO `goods_spec` VALUES ('385', '191', '220g', '23', '3453', '0', 'images/goods/0co2Wwz3Ch.png');
INSERT INTO `goods_spec` VALUES ('386', '192', '750ml', '488', '786', '0', 'images/goods/L0pyi4jxmr.jpg');
INSERT INTO `goods_spec` VALUES ('387', '193', '160cm（建议14~15岁）', '77', '56', '0', 'images/goods/85MxCXLciY.jpg');
INSERT INTO `goods_spec` VALUES ('388', '194', '狐狸', '65', '5654', '0', 'images/goods/60pb8sFMdr.png');
INSERT INTO `goods_spec` VALUES ('389', '195', '白色', '99', '56', '0', 'images/goods/ji43nFG6N7.png');
INSERT INTO `goods_spec` VALUES ('390', '196', '粉白色', '159', '546', '0', 'images/goods/cY9BYeFfIa.png');
INSERT INTO `goods_spec` VALUES ('391', '196', '灰白色', '139', '890', '0', 'images/goods/Iz72UibjYS.png');
INSERT INTO `goods_spec` VALUES ('393', '197', '白色五层', '499', '45', '0', 'images/goods/MFFPa7cF0e.png');
INSERT INTO `goods_spec` VALUES ('394', '198', '白色五层', '499', '567', '0', 'images/goods/MFFPa7cF0e.png');
INSERT INTO `goods_spec` VALUES ('395', '199', '蓝色', '135', '345', '0', 'images/goods/GtMWZkpNIQ.png');
INSERT INTO `goods_spec` VALUES ('396', '199', '粉红', '135', '3453', '0', 'images/goods/caEIrUNC2a.png');
INSERT INTO `goods_spec` VALUES ('397', '200', '20pcs*10包', '169', '56', '0', 'images/goods/0dkAgQfuYi.png');
INSERT INTO `goods_spec` VALUES ('398', '201', '蓝色', '125', '45', '0', 'images/goods/FC2Ltvawil.png');
INSERT INTO `goods_spec` VALUES ('399', '201', '粉色', '125', '5345', '0', 'images/goods/w5iLm9twlO.png');
INSERT INTO `goods_spec` VALUES ('400', '202', '蓝色', '16', '89', '0', 'images/goods/biG1WQEkGd.png');
INSERT INTO `goods_spec` VALUES ('401', '202', '粉色', '16', '7', '0', 'images/goods/KlpkbC9xiR.png');
INSERT INTO `goods_spec` VALUES ('402', '203', '粉色', '59', '766', '0', 'images/goods/GFZErlnGB1.png');
INSERT INTO `goods_spec` VALUES ('403', '204', '浅茶', '239', '78', '0', 'images/goods/22N8ozwq9X.png');
INSERT INTO `goods_spec` VALUES ('404', '204', '浅粉', '239', '76', '0', 'images/goods/Iwlrso6pQB.png');
INSERT INTO `goods_spec` VALUES ('405', '205', '蓝色', '189', '89', '0', 'images/goods/uKEe0Qk0Oz.png');
INSERT INTO `goods_spec` VALUES ('406', '205', '红色', '189', '89', '0', 'images/goods/Yq2dDGIqOt.png');
INSERT INTO `goods_spec` VALUES ('407', '206', '瑶山夜歌', '49', '67', '0', 'images/goods/mNkGfOdXLb.jpg');
INSERT INTO `goods_spec` VALUES ('408', '207', '联盟', '39', '67', '0', 'images/goods/HeOcP7umAD.jpg');
INSERT INTO `goods_spec` VALUES ('409', '208', '笔记本', '78', '786', '0', 'images/goods/tlzU5NssrK.jpg');
INSERT INTO `goods_spec` VALUES ('410', '209', '笔记本', '150', '67', '0', 'images/goods/qbErE6jrWW.png');
INSERT INTO `goods_spec` VALUES ('411', '210', '水杯', '69', '67', '0', 'images/goods/ph1JIgF77E.jpg');
INSERT INTO `goods_spec` VALUES ('412', '211', '诺娃', '68', '78', '0', 'images/goods/YfCxxbRuM2.png');

-- ----------------------------
-- Table structure for good_de
-- ----------------------------
DROP TABLE IF EXISTS `good_de`;
CREATE TABLE `good_de` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '储存信息--遍历至页面',
  `pid` varchar(255) DEFAULT NULL COMMENT '产品号',
  `name` varchar(255) DEFAULT NULL COMMENT '产品名',
  `spec` varchar(255) DEFAULT NULL COMMENT '规格',
  `price` varchar(255) DEFAULT NULL COMMENT '价格',
  `count` varchar(255) DEFAULT NULL COMMENT '数量',
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL COMMENT '图片',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=165 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of good_de
-- ----------------------------
INSERT INTO `good_de` VALUES ('164', '168', '100年传世珐琅锅 马卡龙系列', '磨白沙/有盖', '359', '3', null, null, 'images/goods/TGky0vKsDu.png');

-- ----------------------------
-- Table structure for member
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '前台用户',
  `name` varchar(32) DEFAULT NULL COMMENT '呢称',
  `username` varchar(32) DEFAULT NULL COMMENT '用户名',
  `birthday` varchar(255) DEFAULT NULL COMMENT '生日',
  `sex` enum('女','男','未知') NOT NULL DEFAULT '未知' COMMENT '性别',
  `phone` varchar(32) DEFAULT NULL COMMENT '手机',
  `email` varchar(32) DEFAULT NULL COMMENT '邮箱',
  `password` varchar(40) NOT NULL COMMENT '密码',
  `addtime` varchar(255) DEFAULT NULL COMMENT '注册时间',
  `rank` enum('智慧生活家','至尊生活家','品质生活家','小白生活家') DEFAULT '小白生活家' COMMENT '等级',
  `payment` varchar(32) DEFAULT NULL COMMENT '支付密码',
  `img` varchar(255) DEFAULT NULL COMMENT '用户头像',
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `status` enum('1','0') DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('1', '349621400@qq.com', '阿泰666', '--', '女', '13503590030', '349621400@qq.com', '96e79218965eb72c92a549dd5a330112', null, '小白生活家', '96e79218965eb72c92a549dd5a330112', 'images/PrOquUNkAm.jpg', '2018-01-10 09:41:58', '2018-01-25 19:47:46', '1');
INSERT INTO `member` VALUES ('4', '17634025261', '王源', '--', '女', '17634025261', '', 'e10adc3949ba59abbe56e057f20f883e', null, '小白生活家', null, null, '2018-01-25 19:22:46', '2018-01-25 19:22:46', '0');
INSERT INTO `member` VALUES ('3', '15581931912', null, null, '未知', '15581931912', '', '96e79218965eb72c92a549dd5a330112', null, '小白生活家', null, null, '2018-01-25 16:13:36', '2018-01-25 16:13:36', '1');

-- ----------------------------
-- Table structure for member_address
-- ----------------------------
DROP TABLE IF EXISTS `member_address`;
CREATE TABLE `member_address` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '地址',
  `userid` int(11) DEFAULT NULL COMMENT '用户id',
  `whether` varchar(255) DEFAULT NULL COMMENT '是否默认收货地址',
  `province` varchar(255) DEFAULT NULL COMMENT '省份',
  `city` varchar(255) DEFAULT NULL COMMENT '城市',
  `county` varchar(255) DEFAULT NULL COMMENT '区县',
  `detailed` varchar(255) DEFAULT NULL COMMENT '详细地址',
  `consignee` varchar(255) DEFAULT NULL COMMENT '收货人',
  `phone` varchar(255) DEFAULT NULL COMMENT '电话',
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of member_address
-- ----------------------------
INSERT INTO `member_address` VALUES ('6', '4', null, '北京市', '北京市', '西城区', '付过款了', '封建快攻', '11111111111', '2018-01-25 19:27:27', '2018-01-25 19:28:14');
INSERT INTO `member_address` VALUES ('5', '1', 'on', '山西省', '运城市', '盐湖区', '人民路', '阿泰', '13503590030', '2018-01-25 17:51:16', '2018-01-25 19:50:17');

-- ----------------------------
-- Table structure for member_record
-- ----------------------------
DROP TABLE IF EXISTS `member_record`;
CREATE TABLE `member_record` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户浏览--商品',
  `userid` int(11) NOT NULL COMMENT '用户id',
  `footprint` varchar(255) DEFAULT NULL COMMENT '浏览足迹',
  `collection` varchar(255) DEFAULT NULL COMMENT '收藏',
  `interested` varchar(255) DEFAULT NULL COMMENT '感兴趣的商品',
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of member_record
-- ----------------------------
INSERT INTO `member_record` VALUES ('1', '1', '62,168,168,168,63,19,67,20,181,181,181,181,181', '168,62,', null, null, '2018-01-26 09:48:04');
INSERT INTO `member_record` VALUES ('2', '2', '', null, null, null, null);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2018_01_02_101838_entrust_setup_tables', '1');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '权限',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('10', 'member_list', '后台会员管理', '后台会员管理', '2018-01-03 22:17:01', '2018-01-03 22:17:01');
INSERT INTO `permissions` VALUES ('7', 'adminlist', '后台管理员', '对后台管理员的一些操作', '2018-01-03 22:12:00', '2018-01-03 22:12:00');
INSERT INTO `permissions` VALUES ('8', 'permission', '后台权限管理', '对后台权限的操作', '2018-01-03 22:13:23', '2018-01-03 22:13:23');
INSERT INTO `permissions` VALUES ('9', 'role', '后台角色管理', '对后台角色的操作', '2018-01-03 22:15:41', '2018-01-03 22:15:41');
INSERT INTO `permissions` VALUES ('11', 'product_type', '后台产品分类', '对后台产品分类的操作', '2018-01-03 22:18:15', '2018-01-03 22:18:15');
INSERT INTO `permissions` VALUES ('12', 'product', '后台产品列表', '对后台产品列表的操作', '2018-01-03 22:19:14', '2018-01-03 22:19:14');
INSERT INTO `permissions` VALUES ('13', 'product_details', '后台产品详情', '对后台产品详情的操作', '2018-01-03 22:19:55', '2018-01-03 22:19:55');
INSERT INTO `permissions` VALUES ('14', 'Banindex', '后台Banner', '对后台Banner的操作', '2018-01-03 22:21:01', '2018-01-03 22:21:01');
INSERT INTO `permissions` VALUES ('15', 'details', '后台评论操作', '对后台评论的操作', '2018-01-03 22:21:47', '2018-01-03 22:21:47');
INSERT INTO `permissions` VALUES ('16', 'orderindex', '后台订单管理', '对后台订单的操作', '2018-01-03 22:25:28', '2018-01-03 22:25:28');

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL COMMENT '权限角色关联',
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES ('7', '21');
INSERT INTO `permission_role` VALUES ('7', '31');
INSERT INTO `permission_role` VALUES ('8', '22');
INSERT INTO `permission_role` VALUES ('8', '31');
INSERT INTO `permission_role` VALUES ('9', '23');
INSERT INTO `permission_role` VALUES ('9', '31');
INSERT INTO `permission_role` VALUES ('10', '24');
INSERT INTO `permission_role` VALUES ('10', '31');
INSERT INTO `permission_role` VALUES ('11', '25');
INSERT INTO `permission_role` VALUES ('11', '31');
INSERT INTO `permission_role` VALUES ('12', '26');
INSERT INTO `permission_role` VALUES ('12', '31');
INSERT INTO `permission_role` VALUES ('13', '27');
INSERT INTO `permission_role` VALUES ('13', '31');
INSERT INTO `permission_role` VALUES ('14', '29');
INSERT INTO `permission_role` VALUES ('14', '31');
INSERT INTO `permission_role` VALUES ('15', '28');
INSERT INTO `permission_role` VALUES ('15', '31');
INSERT INTO `permission_role` VALUES ('16', '30');
INSERT INTO `permission_role` VALUES ('16', '31');

-- ----------------------------
-- Table structure for product_type
-- ----------------------------
DROP TABLE IF EXISTS `product_type`;
CREATE TABLE `product_type` (
  `id` int(32) unsigned NOT NULL AUTO_INCREMENT COMMENT '产品分类',
  `name` varchar(100) NOT NULL COMMENT '呢称',
  `pid` varchar(100) NOT NULL COMMENT '父级ID',
  `path` varchar(100) NOT NULL COMMENT '路径',
  `num` varchar(100) DEFAULT NULL COMMENT '添加的逗号',
  `nbsp` varchar(100) DEFAULT NULL COMMENT '横线',
  `icon` varchar(100) DEFAULT NULL COMMENT '图标',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=133 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_type
-- ----------------------------
INSERT INTO `product_type` VALUES ('1', '居家', '0', '0,', null, null, null);
INSERT INTO `product_type` VALUES ('2', '餐厨', '0', '0,', null, null, null);
INSERT INTO `product_type` VALUES ('3', '配件', '0', '0,', null, null, null);
INSERT INTO `product_type` VALUES ('4', '服装', '0', '0,', null, null, null);
INSERT INTO `product_type` VALUES ('5', '电器', '0', '0,', null, null, null);
INSERT INTO `product_type` VALUES ('6', '洗护', '0', '0,', null, null, null);
INSERT INTO `product_type` VALUES ('7', '杂货', '0', '0,', null, null, null);
INSERT INTO `product_type` VALUES ('8', '饮食', '0', '0,', null, null, null);
INSERT INTO `product_type` VALUES ('9', '婴童', '0', '0,', null, null, null);
INSERT INTO `product_type` VALUES ('10', '志趣', '0', '0,', null, null, null);
INSERT INTO `product_type` VALUES ('11', '为你严选', '0', '0,', null, null, null);
INSERT INTO `product_type` VALUES ('12', '甄选家', '0', '0,', null, null, null);
INSERT INTO `product_type` VALUES ('17', '床品件套', '1', '0,1,', '1', '-----', 'images/giItp0troA.png');
INSERT INTO `product_type` VALUES ('18', '被枕', '1', '0,1,', '1', '-----', 'images/3UD3CuKcXa.png');
INSERT INTO `product_type` VALUES ('19', '家具', '1', '0,1,', '1', '-----', 'images/DMiOXzRmdV.png');
INSERT INTO `product_type` VALUES ('20', '收纳', '1', '0,1,', '1', '-----', 'images/hVp9gP5cLV.png');
INSERT INTO `product_type` VALUES ('21', '布艺软装', '1', '0,1,', '1', '-----', 'images/8aUuyKqWbS.png');
INSERT INTO `product_type` VALUES ('22', '家饰', '1', '0,1,', '1', '-----', 'images/B0ptGBNNqH.png');
INSERT INTO `product_type` VALUES ('23', '宠物', '1', '0,1,', '1', '-----', 'images/IoFRO09XJf.png');
INSERT INTO `product_type` VALUES ('24', '咖啡具', '2', '0,2,', '1', '-----', 'images/Ty8jfAS6fz.png');
INSERT INTO `product_type` VALUES ('25', '水具酒具', '2', '0,2,', '1', '-----', 'images/1AndJQd2De.png');
INSERT INTO `product_type` VALUES ('26', '锅具', '2', '0,2,', '1', '-----', 'images/bBi8wnu5pJ.png');
INSERT INTO `product_type` VALUES ('27', '餐具', '2', '0,2,', '1', '-----', 'images/vWTTeoFYTP.png');
INSERT INTO `product_type` VALUES ('28', '功能厨具', '2', '0,2,', '1', '-----', 'images/ZKJrvrCce0.png');
INSERT INTO `product_type` VALUES ('29', '茶具', '2', '0,2,', '1', '-----', 'images/PguRzYctCl.png');
INSERT INTO `product_type` VALUES ('30', '清洁保鲜', '2', '0,2,', '1', '-----', 'images/HQA7a8iKhd.png');
INSERT INTO `product_type` VALUES ('31', '刀剪粘板', '2', '0,2,', '1', '-----', 'images/UD90Ef6LBR.png');
INSERT INTO `product_type` VALUES ('32', '行李箱', '3', '0,3,', '1', '-----', 'images/RD2wjBbrrW.png');
INSERT INTO `product_type` VALUES ('33', '男士包袋', '3', '0,3,', '1', '-----', 'images/msLl1BFDl5.png');
INSERT INTO `product_type` VALUES ('34', '女士包袋', '3', '0,3,', '1', '-----', 'images/M2t3Ah4ium.png');
INSERT INTO `product_type` VALUES ('35', '钱包及小皮件', '3', '0,3,', '1', '-----', 'images/9Of9MtgKVI.png');
INSERT INTO `product_type` VALUES ('36', '男鞋', '3', '0,3,', '1', '-----', 'images/H9qSGaOyx2.png');
INSERT INTO `product_type` VALUES ('37', '女鞋', '3', '0,3,', '1', '-----', 'images/T7QKGNnaIb.png');
INSERT INTO `product_type` VALUES ('38', '拖鞋', '3', '0,3,', '1', '-----', 'images/k2L6VdhoKR.png');
INSERT INTO `product_type` VALUES ('39', '鞋配', '3', '0,3,', '1', '-----', 'images/d9i7atHAbI.png');
INSERT INTO `product_type` VALUES ('40', '围巾件套', '3', '0,3,', '1', '-----', 'images/qY7IQuuBKN.png');
INSERT INTO `product_type` VALUES ('120', '配饰', '3', '0,3,', '1', '-----', 'images/YrzPgkhpjS.png');
INSERT INTO `product_type` VALUES ('42', '眼镜', '3', '0,3,', '1', '-----', 'images/uvvM8U8Hqf.png');
INSERT INTO `product_type` VALUES ('43', '毛衫', '4', '0,4,', '1', '-----', 'images/Qq4Ummp1Dz.png');
INSERT INTO `product_type` VALUES ('44', '外衣', '4', '0,4,', '1', '-----', 'images/PB4R5DH5sF.png');
INSERT INTO `product_type` VALUES ('45', '卫衣', '4', '0,4,', '1', '-----', 'images/B4Myze0nTi.png');
INSERT INTO `product_type` VALUES ('46', '裤装', '4', '0,4,', '1', '-----', 'images/89VyJfiDYn.png');
INSERT INTO `product_type` VALUES ('47', '衬衫', '4', '0,4,', '1', '-----', 'images/eGOGgtXHm5.png');
INSERT INTO `product_type` VALUES ('48', 'T恤', '4', '0,4,', '1', '-----', 'images/AxM0kwpaql.png');
INSERT INTO `product_type` VALUES ('49', '内衣', '4', '0,4,', '1', '-----', 'images/ZALCi36c4Z.png');
INSERT INTO `product_type` VALUES ('50', '内裤', '4', '0,4,', '1', '-----', 'images/VV4f8xxj56.png');
INSERT INTO `product_type` VALUES ('51', '袜子', '4', '0,4,', '1', '-----', 'images/vXeiMrhqJQ.png');
INSERT INTO `product_type` VALUES ('52', '丝袜', '4', '0,4,', '1', '-----', 'images/AxGTUETLKb.png');
INSERT INTO `product_type` VALUES ('53', '家居服', '4', '0,4,', '1', '-----', 'images/pZCFBfAXP0.png');
INSERT INTO `product_type` VALUES ('54', '裙装', '4', '0,4,', '1', '-----', 'images/koCV0rw0UJ.png');
INSERT INTO `product_type` VALUES ('55', '生活电器', '5', '0,5,', '1', '-----', 'images/NRM44dtt2f.png');
INSERT INTO `product_type` VALUES ('56', '厨房电器', '5', '0,5,', '1', '-----', 'images/ExxBtqgr3y.png');
INSERT INTO `product_type` VALUES ('57', '个护健康', '5', '0,5,', '1', '-----', 'images/5KCzX0lxkl.png');
INSERT INTO `product_type` VALUES ('58', '数码', '5', '0,5,', '1', '-----', 'images/PsFO9T0Ye1.png');
INSERT INTO `product_type` VALUES ('59', '影音娱乐', '5', '0,5,', '1', '-----', 'images/5xCXUGQeCe.png');
INSERT INTO `product_type` VALUES ('60', '毛巾', '6', '0,6,', '1', '-----', 'images/k14DKvlXqr.png');
INSERT INTO `product_type` VALUES ('61', '家庭清洁', '6', '0,6,', '1', '-----', 'images/JAlPCQY8Ic.png');
INSERT INTO `product_type` VALUES ('62', '美妆', '6', '0,6,', '1', '-----', 'images/uNC9UkEUZu.png');
INSERT INTO `product_type` VALUES ('63', '面部护理', '6', '0,6,', '1', '-----', 'images/UETUjmUkLC.png');
INSERT INTO `product_type` VALUES ('64', '身体护理', '6', '0,6,', '1', '-----', 'images/mqOM7mTd5x.png');
INSERT INTO `product_type` VALUES ('65', '香薰', '6', '0,6,', '1', '-----', 'images/5qAfBhPpzL.png');
INSERT INTO `product_type` VALUES ('66', '洗发护发', '6', '0,6,', '1', '-----', 'images/Ajnu1Xxhkp.png');
INSERT INTO `product_type` VALUES ('67', '浴室用具', '6', '0,6,', '1', '-----', 'images/x0IJK6iOCy.png');
INSERT INTO `product_type` VALUES ('68', '生理用品', '6', '0,6,', '1', '-----', 'images/1cp6CXIub5.png');
INSERT INTO `product_type` VALUES ('69', '海外', '7', '0,7,', '1', '-----', 'images/C7cWy8BOrB.png');
INSERT INTO `product_type` VALUES ('71', '春风系列', '7', '0,7,', '1', '-----', 'images/teLeF7GYC9.png');
INSERT INTO `product_type` VALUES ('72', '黑凤梨系列', '7', '0,7,', '1', '-----', 'images/qqR00DvRMD.png');
INSERT INTO `product_type` VALUES ('73', '旅行用品', '7', '0,7,', '1', '-----', 'images/a4trUNriUf.png');
INSERT INTO `product_type` VALUES ('74', '户外', '7', '0,7,', '1', '-----', 'images/XpG1CXDlD2.png');
INSERT INTO `product_type` VALUES ('75', '文具', '7', '0,7,', '1', '-----', 'images/QTKJ34AQ4R.png');
INSERT INTO `product_type` VALUES ('76', '雪愿礼盒', '7', '0,7,', '1', '-----', 'images/Z7a7qeIhik.png');
INSERT INTO `product_type` VALUES ('77', '礼品卡', '7', '0,7,', '1', '-----', 'images/Ix0t6PG8pG.png');
INSERT INTO `product_type` VALUES ('78', '糕点', '8', '0,8,', '1', '-----', 'images/jLyvbUyvII.png');
INSERT INTO `product_type` VALUES ('79', '小食', '8', '0,8,', '1', '-----', 'images/dmI4ovo5cC.png');
INSERT INTO `product_type` VALUES ('80', '坚果炒货', '8', '0,8,', '1', '-----', 'images/TDLTmNfX2s.png');
INSERT INTO `product_type` VALUES ('81', '果干', '8', '0,8,', '1', '-----', 'images/aYmtpYgdDB.png');
INSERT INTO `product_type` VALUES ('82', '冲饮', '8', '0,8,', '1', '-----', 'images/SDE8iOUXGo.png');
INSERT INTO `product_type` VALUES ('83', '茗茶', '8', '0,8,', '1', '-----', 'images/LulQy0cZt8.png');
INSERT INTO `product_type` VALUES ('84', '肉制品', '8', '0,8,', '1', '-----', 'images/xlKPJ7uAPE.png');
INSERT INTO `product_type` VALUES ('85', '食材', '8', '0,8,', '1', '-----', 'images/zL3OzuoCd7.png');
INSERT INTO `product_type` VALUES ('86', '调味', '8', '0,8,', '1', '-----', 'images/VToLBXeSEz.png');
INSERT INTO `product_type` VALUES ('87', '生鲜', '7', '0,7,', '1', '-----', 'images/fjXZ6nvNiV.png');
INSERT INTO `product_type` VALUES ('88', '酒水', '8', '0,8,', '1', '-----', 'images/4CgeybkWRa.png');
INSERT INTO `product_type` VALUES ('89', '儿童服饰', '9', '0,9,', '1', '-----', 'images/5DxOXbrOhm.png');
INSERT INTO `product_type` VALUES ('90', '配搭', '9', '0,9,', '1', '-----', 'images/cs2x7mrBJC.png');
INSERT INTO `product_type` VALUES ('91', '玩具', '9', '0,9,', '1', '-----', 'images/gxwLfncN8G.png');
INSERT INTO `product_type` VALUES ('92', '婴幼儿服饰', '9', '0,9,', '1', '-----', 'images/lDwaHgN4g8.png');
INSERT INTO `product_type` VALUES ('93', '妈咪', '9', '0,9,', '1', '-----', 'images/FI3JgKGIDi.png');
INSERT INTO `product_type` VALUES ('94', '寝居', '9', '0,9,', '1', '-----', 'images/xW2k26wy59.png');
INSERT INTO `product_type` VALUES ('95', '婴童洗护', '9', '0,9,', '1', '-----', 'images/mRS0EDW1PF.png');
INSERT INTO `product_type` VALUES ('96', '喂养', '9', '0,9,', '1', '-----', 'images/U1ZipBoRIB.png');
INSERT INTO `product_type` VALUES ('97', '婴童出行', '9', '0,9,', '1', '-----', 'images/6Vk5YODKgP.png');
INSERT INTO `product_type` VALUES ('98', '唱片', '10', '0,10,', '1', '-----', 'images/bawtqY1Yma.png');
INSERT INTO `product_type` VALUES ('99', '魔兽世界', '10', '0,10,', '1', '-----', 'images/TD3jh2eSBJ.png');
INSERT INTO `product_type` VALUES ('100', '炉石传说', '10', '0,10,', '1', '-----', 'images/trhMg8qTEs.png');
INSERT INTO `product_type` VALUES ('101', '守望先锋', '10', '0,10,', '1', '-----', 'images/vlxHbHrrgp.png');
INSERT INTO `product_type` VALUES ('102', '暗黑破坏神|||', '10', '0,10,', '1', '-----', 'images/RNiCNfEi2U.png');
INSERT INTO `product_type` VALUES ('103', '星际争霸||', '10', '0,10,', '1', '-----', 'images/NQ4KurT4cS.png');
INSERT INTO `product_type` VALUES ('104', '风暴英雄', '10', '0,10,', '1', '-----', 'images/4eav2sp0iz.png');
INSERT INTO `product_type` VALUES ('105', '我的世界', '10', '0,10,', '1', '-----', 'images/TKSvwwESCd.png');
INSERT INTO `product_type` VALUES ('106', '阴阳师', '10', '0,10,', '1', '-----', 'images/AX6blPMg3V.png');
INSERT INTO `product_type` VALUES ('107', '梦幻西游', '10', '0,10,', '1', '-----', 'images/3SapYkIcPX.png');
INSERT INTO `product_type` VALUES ('108', '大话西游', '10', '0,10,', '1', '-----', 'images/VOYGsTrKIb.png');
INSERT INTO `product_type` VALUES ('109', '游戏表情', '10', '0,10,', '1', '-----', 'images/Q6HbnqQ4yd.png');
INSERT INTO `product_type` VALUES ('110', '游戏点卡', '10', '0,10,', '1', '-----', 'images/AR4nZKOJcz.png');
INSERT INTO `product_type` VALUES ('111', '严选推荐', '11', '0,11,', '1', '-----', 'images/1rkRVd7Orr.png');
INSERT INTO `product_type` VALUES ('112', '挑款师推荐', '11', '0,11,', '1', '-----', 'images/djZT71etMv.png');
INSERT INTO `product_type` VALUES ('113', '丁磊的好货推荐', '11', '0,11,', '1', '-----', 'images/CgoD2rkOt6.png');
INSERT INTO `product_type` VALUES ('114', '口碑商品', '11', '0,11,', '1', '-----', 'images/haRaXdILSO.png');
INSERT INTO `product_type` VALUES ('115', '特色系列', '11', '0,11,', '1', '-----', 'images/2yKpR5Jwvo.png');
INSERT INTO `product_type` VALUES ('116', '严选全球', '11', '0,11,', '1', '-----', 'images/hruPthDBQG.png');
INSERT INTO `product_type` VALUES ('117', '建议征集', '11', '0,11,', '1', '-----', 'images/18lLa4298O.png');
INSERT INTO `product_type` VALUES ('118', '样式甄选', '12', '0,12,', '1', '-----', 'images/NzbjPFMNzA.png');
INSERT INTO `product_type` VALUES ('119', '样品试用', '12', '0,12,', '1', '-----', 'images/u5IrqnEE65.png');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '角色',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('29', 'Banindex', '后台Banner', '', '2018-01-03 22:34:55', '2018-01-03 22:34:55');
INSERT INTO `roles` VALUES ('21', 'adminlist', '后台管理员', '', '2018-01-03 22:29:56', '2018-01-03 22:29:56');
INSERT INTO `roles` VALUES ('22', 'permission', '后台权限管理', '', '2018-01-03 22:31:10', '2018-01-03 22:31:10');
INSERT INTO `roles` VALUES ('23', 'role', '后台角色管理', '', '2018-01-03 22:31:41', '2018-01-03 22:31:41');
INSERT INTO `roles` VALUES ('24', 'member_list', '后台会员管理', '', '2018-01-03 22:32:18', '2018-01-03 22:32:18');
INSERT INTO `roles` VALUES ('25', 'product_type', '后台产品分类', '', '2018-01-03 22:32:59', '2018-01-03 22:32:59');
INSERT INTO `roles` VALUES ('26', 'product', '后台产品列表', '', '2018-01-03 22:33:35', '2018-01-03 22:33:35');
INSERT INTO `roles` VALUES ('27', 'product_details', '后台产品详情', '', '2018-01-03 22:33:58', '2018-01-03 22:33:58');
INSERT INTO `roles` VALUES ('28', 'details', '后台评论操作', '', '2018-01-03 22:34:31', '2018-01-03 22:34:31');
INSERT INTO `roles` VALUES ('30', 'orderindex', '后台订单管理', '', '2018-01-03 22:35:14', '2018-01-03 22:35:14');
INSERT INTO `roles` VALUES ('31', 'Boss', '超级管理员', '', '2018-01-03 22:35:42', '2018-01-03 22:35:42');
INSERT INTO `roles` VALUES ('32', 'qeqwe', 'qweqw', '', '2018-01-05 15:59:00', '2018-01-05 15:59:00');

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL COMMENT '角色管理员关联',
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES ('1', '31');
INSERT INTO `role_user` VALUES ('9', '21');
INSERT INTO `role_user` VALUES ('10', '22');
INSERT INTO `role_user` VALUES ('11', '23');
INSERT INTO `role_user` VALUES ('12', '24');
INSERT INTO `role_user` VALUES ('13', '25');
INSERT INTO `role_user` VALUES ('14', '26');
INSERT INTO `role_user` VALUES ('15', '27');
INSERT INTO `role_user` VALUES ('16', '28');
INSERT INTO `role_user` VALUES ('17', '29');
INSERT INTO `role_user` VALUES ('18', '30');

-- ----------------------------
-- Table structure for shop
-- ----------------------------
DROP TABLE IF EXISTS `shop`;
CREATE TABLE `shop` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '购物车--用户',
  `pid` int(11) DEFAULT NULL COMMENT '产品id',
  `name` varchar(255) DEFAULT NULL COMMENT '产品名',
  `username` varchar(255) DEFAULT NULL COMMENT '用户名',
  `spec` varchar(255) DEFAULT NULL COMMENT '规格',
  `count` int(11) DEFAULT NULL COMMENT '数量',
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL COMMENT '图片名',
  `price` varchar(255) DEFAULT NULL COMMENT '价格',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '后台管理员',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '昵称',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '邮箱',
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT '密码',
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '身份',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `logintime` datetime DEFAULT NULL COMMENT '登录时间',
  `file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '头像',
  `num` varchar(11) COLLATE utf8_unicode_ci DEFAULT '0' COMMENT '登录次数',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '349621400@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '大老板', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-01-28 15:07:02', 'images/HgkPNSNB3d.jpg', '47');
INSERT INTO `users` VALUES ('9', 'adminlist', '452145215@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '后台管理员操作', null, '2018-01-03 22:39:43', '2018-01-03 22:39:43', '2018-01-25 20:01:44', 'images/m4shjdp2Vh.jpg', '1');
INSERT INTO `users` VALUES ('10', 'permission', '485214569@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '后台权限管理', null, '2018-01-03 22:40:35', '2018-01-03 22:40:35', null, null, '0');
INSERT INTO `users` VALUES ('11', 'role', '854526214@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '后台角色管理', null, '2018-01-03 22:41:33', '2018-01-03 22:41:33', '2018-01-24 14:54:07', null, '1');
INSERT INTO `users` VALUES ('12', 'member_list', '856452143@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '后台会员管理', null, '2018-01-03 22:42:21', '2018-01-03 22:42:21', '2018-01-04 09:50:15', null, '0');
INSERT INTO `users` VALUES ('13', 'product_type', '856952143@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '后台产品分类管理', null, '2018-01-03 22:43:14', '2018-01-03 22:43:14', null, null, '0');
INSERT INTO `users` VALUES ('14', 'product', '698236512@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '后台产品列表管理', null, '2018-01-03 22:43:51', '2018-01-03 22:43:51', null, null, '0');
INSERT INTO `users` VALUES ('15', 'product_details', '876952612@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '后台产品详情管理', null, '2018-01-03 22:45:20', '2018-01-03 22:45:20', null, null, '0');
INSERT INTO `users` VALUES ('16', 'details', '74562154@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '后台评论管理', null, '2018-01-03 22:46:11', '2018-01-03 22:46:11', null, null, '0');
INSERT INTO `users` VALUES ('17', 'Banindex', '95621541@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '后台Banner管理', null, '2018-01-03 22:47:33', '2018-01-03 22:47:33', null, null, '0');
INSERT INTO `users` VALUES ('18', 'orderindex', '96521452@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '后台订单管理', null, '2018-01-03 22:48:09', '2018-01-03 22:48:09', null, null, '0');
