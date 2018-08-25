
SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `api_users`
-- ----------------------------
DROP TABLE IF EXISTS `api_users`;
CREATE TABLE `api_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(50) NOT NULL DEFAULT '' COMMENT '密码',
  `nickname` varchar(100) DEFAULT '' COMMENT '昵称',
  `sex` tinyint(1) DEFAULT '1' COMMENT '性别|1-男 2-女',
  `tel` varchar(15) DEFAULT NULL COMMENT '电话',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '邮箱',
  `consumed` float(100,0) DEFAULT '0' COMMENT '已消费',
  `integral` int(10) DEFAULT '0' COMMENT '积分',
  `checked` tinyint(1) DEFAULT '1' COMMENT '审核状态|1-未审 2-已审',
  `addr` text COMMENT '地址',
  `zip` varchar(10) DEFAULT '' COMMENT '邮编',
  `birdthday` varchar(20) DEFAULT '' COMMENT '生日',
  `qq` varchar(20) DEFAULT '' COMMENT 'QQ',
  `msn` varchar(20) DEFAULT NULL COMMENT 'MSN',
  `reg_time` int(11) DEFAULT '0' COMMENT '注册时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of api_users
-- ----------------------------
INSERT INTO `api_users` VALUES ('2', 'hong', '52c69e3a57331081823331c4e69d3f2e', 'ant', '2', '13005623609', '123@qq.com', '0', '50', '2', '', '', '', '', '', '0');
INSERT INTO `api_users` VALUES ('3', 'toto', '435a605868a16e60edb277742291913a', 'honghong', '2', '13005623609', '1300hong@15221.com', '0', '10', '1', '412sdsd', null, null, null, null, '0');
INSERT INTO `api_users` VALUES ('7', 'orange', '21232f297a57a5a743894a0e4a801fc3', '这个是我的呢称', '1', '', '1300hong0@163.com', '0', '0', '1', 'dsdsf', null, null, null, null, '0');
INSERT INTO `api_users` VALUES ('8', 'bang', 'c60364ea7654560b136fee807c85f102', 'hongadmin', '1', '', 'hongadmin', '0', '0', '1', '', null, null, null, null, '0');
INSERT INTO `api_users` VALUES ('10', 'pen', 'd423f8f1efdf274efdb290b91359ec3b', 'aking', '1', '123456', 'caihuajun@gmail.com', '0', '0', '1', '广州市天河区', '0', '', '', '', '0');
INSERT INTO `api_users` VALUES ('11', 'gddfgdf', 'e10adc3949ba59abbe56e057f20f883e', '洪四方0000', '2', '1213212', '1300hong@163.com', null, '0', '2', '121212', '52400000', '2010-05-06', '23221', '1212', '0');
INSERT INTO `api_users` VALUES ('14', 'somethine', '123456', '', '1', null, '123456@qq.com', '0', '0', '1', null, '', '', '', null, '0');
