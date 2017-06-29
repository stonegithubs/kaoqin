/*
Navicat MySQL Data Transfer

Source Server         : javalocalhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : kaoqin

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-05-13 15:00:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for adv
-- ----------------------------
DROP TABLE IF EXISTS `adv`;
CREATE TABLE `adv` (
  `advId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '标题',
  `content` text COLLATE utf8_unicode_ci COMMENT '正文',
  `addTime` datetime DEFAULT NULL,
  `isDel` tinyint(2) DEFAULT '0',
  `delTime` datetime DEFAULT NULL,
  PRIMARY KEY (`advId`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of adv
-- ----------------------------
INSERT INTO `adv` VALUES ('1', '猜测是', '12114124<b>12312<i>2424<u>2412414214<br></u></i></b><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><b><i><u>214124<a href=\"undefined\" target=\"_blank\" rel=\"nofollow\" title=\"Link: undefined\">http://www.kaoqin.com/index.php/Admin/adv/undefined</a> 我校定于3月9日（星期四）下午、3月10（星期五）全天、3月11日（星期六）上午进行2018届毕业生电子相片采集', '2017-03-25 16:50:11', '1', '2017-03-25 17:30:08');
INSERT INTO `adv` VALUES ('2', '123', '我校定于3月9日（星期四）下午、3月10（星期五）全天、3月11日（星期六）上午进行2018届毕业生电子相片采集', '2017-03-25 16:54:44', '1', '2017-03-25 17:30:42');
INSERT INTO `adv` VALUES ('3', null, '我校定于3月9日（星期四）下午、3月10（星期五）全天、3月11日（星期六）上午进行2018届毕业生电子相片采集', '2017-03-25 16:55:37', '1', '2017-03-25 17:31:20');
INSERT INTO `adv` VALUES ('4', null, '我校定于3月9日（星期四）下午、3月10（星期五）全天、3月11日（星期六）上午进行2018届毕业生电子相片采集', '2017-03-25 16:55:48', '1', '2017-03-25 17:35:18');
INSERT INTO `adv` VALUES ('5', '124', '我校定于3月9日（星期四）下午、3月10（星期五）全天、3月11日（星期六）上午进行2018届毕业生电子相片采集', '2017-03-25 17:05:51', '1', '2017-03-25 17:33:01');
INSERT INTO `adv` VALUES ('6', '温江大庙会', '<a href=\"http://www.xitongcheng.com/win10/\" target=\"_blank\" rel=\"\" title=\"Link: http://www.xitongcheng.com/win10/\">Windows10系统</a><span>自带了微软拼音输入法，不过用户在使用过程中却总会遇到一些问题。比如，一位用户就反馈自己在打字输出时，遇到了字体由简体莫名奇妙变成繁体的情况，这该怎么办呢？下面，就随小编看看该问题的具体解决方我校定于3月9日（星期四）下午、3月10（星期五）全天、3月11日（星期六）上午进行2018届毕业生电子相片采集</span>', '2017-03-25 17:11:49', '1', '2017-03-25 17:35:24');
INSERT INTO `adv` VALUES ('7', '温江大庙会', '<a href=\"http://www.xitongcheng.com/win10/\" target=\"_blank\" rel=\"\">Windows10系统</a><span>自带了微软拼音输入法，不过用户在使用过程中却总会遇到一些问题。比如，一位用户就反馈自己在打字输出时，遇到了字体由简体莫名奇妙变成繁体的情况，这该怎么办呢？下面，就随小编看看该问题的具体解决方法。我校定于3月9日（星期四）下午、3月10（星期五）全天、3月11日（星期六）上午进行2018届毕业生电子相片采集', '2017-03-25 17:12:23', '0', null);
INSERT INTO `adv` VALUES ('8', '123', '<a href=\"http://www.xitongcheng.com/win10/\" target=\"_blank\" rel=\"\">Windows10系统</a><span>自带了微软拼音输入法，不过用户在使用过程中却总会遇到一些问题。比如，一位用户就反馈自己在打字输出时，遇到了字体由简体莫名奇妙变成繁体的情况，这该怎么办呢？下面，就随小编看看该问题的具体解决方法。我校定于3月9日（星期四）下午、3月10（星期五）全天、3月11日（星期六）上午进行2018届毕业生电子相片采集', '2017-03-25 17:13:45', '0', null);
INSERT INTO `adv` VALUES ('9', '我校定于3', '<pre><pre>我校定于3月9日（星期四）下午、3月10（星期五）全天、3月11日（星期六）上午进行2018届毕业生电子相片采集</pre></pre>', '2017-03-25 17:15:25', '0', null);
INSERT INTO `adv` VALUES ('10', '温江大庙会', '<pre>window.location.herf = \"{:url我校定于3月9日（星期四）下午、3月10（星期五）全天、3月11日（星期六）上午进行2018届毕业生电子相片采集', '2017-03-25 17:16:26', '1', '2017-03-30 11:07:03');
INSERT INTO `adv` VALUES ('11', '123', '<pre>我校定于3月9日（星期四）下午、3月10（星期五）全天、3月11日（星期六）上午进行2018届毕业生电子相片采集</pre>', '2017-03-25 17:18:09', '0', null);
INSERT INTO `adv` VALUES ('12', '温江大庙会', '<pre>我校定于3月9日（星期四）下午、3月10（星期五）全天、3月11日（星期六）上午进行2018届毕业生电子相片采集</pre>', '2017-03-25 17:18:18', '0', null);
INSERT INTO `adv` VALUES ('13', '温江大庙会我校定于3月9日（星期四）下午、3月10（星期五）全天、3月11日（星期六）上午进行2018届毕业生电子相片采集', '<pre><pre>我校定于3月9日（星期四）下午、3月10（星期五）全天、3月11日（星期六）上午进行2018届毕业生电子相片采集</pre></pre>', '2017-03-25 17:20:11', '0', null);
INSERT INTO `adv` VALUES ('14', '温江大庙会', '<pre>arguments[1]</pre>我校定于3月9日（星期四）下午、3月10（星期五）全天、3月11日（星期六）上午进行2018届毕业生电子相片采集', '2017-03-25 17:20:34', '1', '2017-03-30 11:06:24');
INSERT INTO `adv` VALUES ('15', '温江大庙会', '<pre>arguments[1]</pre>', '2017-03-25 17:20:47', '1', '2017-03-30 11:06:19');
INSERT INTO `adv` VALUES ('16', '温江大庙会', '<pre>arguments[1]</pre>', '2017-03-25 17:21:01', '1', '2017-03-30 11:06:15');
INSERT INTO `adv` VALUES ('17', '温江大庙会', 'weq', '2017-03-25 17:23:21', '1', '2017-03-30 11:06:11');
INSERT INTO `adv` VALUES ('18', '12313', '123124', '2017-03-25 17:24:14', '1', '2017-03-30 11:06:03');
INSERT INTO `adv` VALUES ('19', '12313', '1231243', '2017-03-25 17:25:06', '1', '2017-03-30 11:06:07');
INSERT INTO `adv` VALUES ('20', '1414', '124124', '2017-03-25 17:26:02', '1', '2017-03-30 11:05:59');
INSERT INTO `adv` VALUES ('21', '12414', '124214', '2017-03-25 17:26:29', '1', '2017-03-30 11:05:55');
INSERT INTO `adv` VALUES ('22', '123', '<pre>$.ajax({<br>    url: self.attr(\"action\"),<br>    type:self.attr(\"method\"),<br>    data:self.serializeArray(),<br>    dataType:\'json\',<br>    success:function(data){<br>        if(data.status!=0){<br>            $(\'#myModal3\').modal(\'hide\')<br>            $(\".alert-success strong\").html(data.msg);<br>            successAlert.show();<br>            dangerAlert.hide();<br>            if(callback){<br>                console.log(111);<br>                setTimeout(callback(),\"1500\");<br>            } else{<br>                console.log(2222);<br>                setTimeout(\"back()\",\"1500\");<br>            }<br>        }else{<br>            $(\'#myModal3\').modal(\'hide\')<br>            $(\".alert-danger strong\").html(data.msg);<br>            successAlert.hide();<br>            dangerAlert.show();<br>        }<br>    }<br>}).done(function(data){<br>})</pre>', '2017-03-25 17:28:48', '1', '2017-03-30 11:05:51');

-- ----------------------------
-- Table structure for dept
-- ----------------------------
DROP TABLE IF EXISTS `dept`;
CREATE TABLE `dept` (
  `dId` int(11) NOT NULL AUTO_INCREMENT COMMENT '部门编号',
  `dName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '部门名称',
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '部门描述',
  `addTime` datetime DEFAULT NULL COMMENT '添加时间',
  `isDel` tinyint(2) DEFAULT '0' COMMENT '是否删除',
  `delTime` datetime DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`dId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of dept
-- ----------------------------
INSERT INTO `dept` VALUES ('1', '人事部', '负责公司人事管理', null, '0', '2017-03-16 16:13:16');
INSERT INTO `dept` VALUES ('2', '财务部', '负责公司财务管理', null, '0', '2017-03-16 16:24:10');
INSERT INTO `dept` VALUES ('3', '采购部', '负责管理器材、材料、设备的采购', null, '0', '2017-03-16 16:25:25');
INSERT INTO `dept` VALUES ('4', '后勤部', '负责公司后勤管理', null, '0', '2017-03-16 16:27:21');
INSERT INTO `dept` VALUES ('5', '销售部', '负责公司外部销售', null, '0', null);
INSERT INTO `dept` VALUES ('6', '外销部', '负责公司对海外销售', null, '0', null);

-- ----------------------------
-- Table structure for employee
-- ----------------------------
DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `eId` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '职员编号',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '密码',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '名字',
  `age` int(11) DEFAULT NULL COMMENT '年龄',
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT '/public/images/photos/user1.png' COMMENT '头像',
  `position` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '职务',
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '性别',
  `birthday` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '生日',
  `degree` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '学历',
  `special` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '专业',
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '家庭住址',
  `tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '联系方式',
  `mail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '邮箱',
  `inTime` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '入职时间',
  `dId` int(5) DEFAULT '0' COMMENT '部门Id',
  `place` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '籍贯',
  `isDel` tinyint(2) DEFAULT '0' COMMENT '是否删除',
  `delTime` datetime DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`eId`)
) ENGINE=InnoDB AUTO_INCREMENT=10020 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of employee
-- ----------------------------
INSERT INTO `employee` VALUES ('10000', 'e10adc3949ba59abbe56e057f20f883e', '唐伯虎', null, '', '部门经理', null, null, null, null, null, '15845112451', null, '2017-03-01', '1', null, '0', null);
INSERT INTO `employee` VALUES ('10001', 'e10adc3949ba59abbe56e057f20f883e', '小红', null, '', '产品经理', '1', null, '专科', null, null, '15845124512', null, '03-16-2017', '1', null, '0', '2017-03-18 16:38:45');
INSERT INTO `employee` VALUES ('10002', 'e10adc3949ba59abbe56e057f20f883e', '小花', null, '', '前台', '1', '', '本科', '', '', '15845124511', '', '03-02-2017', '5', '', '0', '2017-03-16 16:28:02');
INSERT INTO `employee` VALUES ('10003', 'e10adc3949ba59abbe56e057f20f883e', 'root', null, '', '总监', null, null, null, null, null, '', null, '2017-01-02', '6', null, '0', null);
INSERT INTO `employee` VALUES ('10004', 'e10adc3949ba59abbe56e057f20f883e', '小虎', null, '', '打手', null, null, null, null, null, '15487345124', null, '2017-02-26', '4', null, '0', null);
INSERT INTO `employee` VALUES ('10009', '827ccb0eea8a706c4c34a16891f84e7b', 'seven', null, '', '总监', '2', null, null, null, null, '', null, '2017-03-30', '2', null, '0', null);
INSERT INTO `employee` VALUES ('10018', 'e10adc3949ba59abbe56e057f20f883e', '', null, '/public/images/photos/user1.png', null, null, null, null, null, null, null, null, null, '0', null, '0', null);
INSERT INTO `employee` VALUES ('10019', 'e10adc3949ba59abbe56e057f20f883e', '', null, '/public/images/photos/user1.png', null, null, null, null, null, null, null, null, null, '0', null, '0', null);

-- ----------------------------
-- Table structure for level
-- ----------------------------
DROP TABLE IF EXISTS `level`;
CREATE TABLE `level` (
  `lId` int(11) NOT NULL AUTO_INCREMENT,
  `eId` int(11) DEFAULT NULL COMMENT '职员id',
  `addTime` datetime DEFAULT NULL COMMENT '申请时间',
  `startTime` datetime DEFAULT NULL COMMENT '请假起始天',
  `endTime` datetime DEFAULT NULL COMMENT '请假结束天',
  `passTime` datetime DEFAULT NULL COMMENT '审核时间',
  `adminId` int(11) DEFAULT NULL COMMENT '审核管理员id',
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '备注',
  `isDel` tinyint(2) DEFAULT '0',
  `delTime` datetime DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0' COMMENT '状态：0申请中，1申请通过，2申请不过',
  PRIMARY KEY (`lId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of level
-- ----------------------------
INSERT INTO `level` VALUES ('1', '10001', null, '2017-03-22 00:00:00', '2017-03-23 00:00:00', '2017-03-20 10:03:20', '10007', '测试添加！', '0', null, '1');
INSERT INTO `level` VALUES ('2', '10001', '2017-03-20 10:25:45', '2017-03-22 00:00:00', '2017-03-23 00:00:00', '2017-03-20 10:27:07', '10007', '测试添加！', '0', null, '2');
INSERT INTO `level` VALUES ('3', '10001', '2017-03-20 10:25:45', '2017-03-22 00:00:00', '2017-03-23 00:00:00', '2017-03-24 16:07:02', '10007', '测试添加！', '0', null, '1');
INSERT INTO `level` VALUES ('4', '10002', '2017-03-26 12:38:23', '2017-02-27 00:00:00', '2017-03-02 00:00:00', null, null, 'ceshi', '0', null, '0');
INSERT INTO `level` VALUES ('5', '10002', '2017-03-26 12:38:26', '2017-02-27 00:00:00', '2017-03-02 00:00:00', null, null, 'ceshi', '0', null, '0');
INSERT INTO `level` VALUES ('6', '10002', '2017-03-26 12:39:28', '2017-02-28 00:00:00', '2017-03-16 00:00:00', null, null, 'ffffff', '0', null, '0');
INSERT INTO `level` VALUES ('7', '10002', '2017-03-26 12:41:21', '2017-02-28 00:00:00', '2017-02-28 00:00:00', null, null, 'fsdfsad', '0', null, '0');
INSERT INTO `level` VALUES ('8', '10002', '2017-03-26 12:41:54', '2017-02-28 00:00:00', '2017-03-15 00:00:00', null, null, 'fdsfds', '0', null, '0');
INSERT INTO `level` VALUES ('9', '10002', '2017-03-26 12:42:25', '2017-02-28 00:00:00', '2017-03-15 00:00:00', null, null, 'fdsfsa', '0', null, '0');
INSERT INTO `level` VALUES ('10', '10009', '2017-03-26 12:44:04', '2017-02-28 00:00:00', '2017-03-17 00:00:00', null, null, 'fdsfs', '0', null, '1');
INSERT INTO `level` VALUES ('11', '10009', '2017-03-26 12:44:53', '2017-02-28 00:00:00', '2017-03-15 00:00:00', null, null, 'fdsfds', '0', null, '0');
INSERT INTO `level` VALUES ('12', '10009', '2017-03-26 12:47:23', '2017-02-27 00:00:00', '2017-03-01 00:00:00', null, null, 'dsfasfd', '0', null, '0');
INSERT INTO `level` VALUES ('13', '10009', '2017-03-26 12:47:55', '2017-02-27 00:00:00', '2017-03-01 00:00:00', null, null, 'fdsfsdaf', '0', null, '0');
INSERT INTO `level` VALUES ('14', '10009', '2017-03-26 12:48:23', '2017-02-26 00:00:00', '2017-03-07 00:00:00', null, null, 'fdsf', '0', null, '0');
INSERT INTO `level` VALUES ('15', '10009', '2017-03-26 12:48:45', '2017-03-05 00:00:00', '2017-03-07 00:00:00', null, null, 'dfasdf', '0', null, '0');
INSERT INTO `level` VALUES ('16', '10009', '2017-03-26 12:51:43', '2017-02-27 00:00:00', '2017-03-08 00:00:00', null, null, 'dsfdsafds', '0', null, '0');
INSERT INTO `level` VALUES ('17', '10009', '2017-03-26 08:58:11', '2017-03-26 00:00:00', '2017-03-28 00:00:00', null, null, '123', '0', null, '0');

-- ----------------------------
-- Table structure for schedule
-- ----------------------------
DROP TABLE IF EXISTS `schedule`;
CREATE TABLE `schedule` (
  `sId` int(11) NOT NULL AUTO_INCREMENT,
  `eId` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL COMMENT '排班时间',
  `isLate` tinyint(2) DEFAULT '0' COMMENT '是否迟到',
  `isAbsenteeism` tinyint(2) DEFAULT '0' COMMENT '是否缺勤',
  `isLevel` tinyint(2) DEFAULT '0' COMMENT '是否请假',
  `isEarly` tinyint(2) DEFAULT '0' COMMENT '是否早退',
  `isOver` tinyint(2) DEFAULT '0' COMMENT '是否加班',
  `isTravel` tinyint(2) DEFAULT NULL COMMENT '是否出差',
  `status` tinyint(2) DEFAULT '0' COMMENT '状态：0为日常状态，1为其他状态（请假，出差，缺勤）',
  PRIMARY KEY (`sId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of schedule
-- ----------------------------
INSERT INTO `schedule` VALUES ('4', '10000', '2017-03-26 00:00:00', '0', '0', '0', '0', '0', null, '0');
INSERT INTO `schedule` VALUES ('5', '10000', '2017-03-28 00:00:00', '0', '0', '0', '0', '0', null, '0');
INSERT INTO `schedule` VALUES ('6', '10000', '2017-03-29 00:00:00', '0', '0', '0', '0', '0', null, '0');
INSERT INTO `schedule` VALUES ('7', '10000', '2017-03-30 00:00:00', '0', '0', '0', '0', '0', null, '0');
INSERT INTO `schedule` VALUES ('8', '10000', '2017-03-27 00:00:00', '0', '0', '0', '0', '0', null, '0');
INSERT INTO `schedule` VALUES ('9', '10000', '2017-03-31 00:00:00', '0', '0', '0', '0', '0', null, '0');
INSERT INTO `schedule` VALUES ('10', '10000', '2017-04-01 00:00:00', '0', '0', '0', '0', '0', null, '0');

-- ----------------------------
-- Table structure for schedule_record
-- ----------------------------
DROP TABLE IF EXISTS `schedule_record`;
CREATE TABLE `schedule_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sId` int(11) DEFAULT NULL COMMENT '所属排班记录',
  `addTime` datetime DEFAULT NULL COMMENT '打卡时间',
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '打卡地区所在id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of schedule_record
-- ----------------------------

-- ----------------------------
-- Table structure for system_user
-- ----------------------------
DROP TABLE IF EXISTS `system_user`;
CREATE TABLE `system_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '' COMMENT '用户登录名',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '用户登录密码',
  `qq` varchar(16) DEFAULT NULL COMMENT '联系QQ',
  `mail` varchar(32) DEFAULT NULL COMMENT '联系邮箱',
  `phone` varchar(16) DEFAULT NULL COMMENT '联系手机号',
  `remark` varchar(255) DEFAULT '' COMMENT '备注说明',
  `login_num` bigint(20) unsigned DEFAULT '0' COMMENT '登录次数',
  `login_at` datetime DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态(0:禁用,1:启用)',
  `is_deleted` tinyint(1) unsigned DEFAULT '0' COMMENT '删除状态(1:删除,0:未删)',
  `create_by` bigint(20) unsigned DEFAULT NULL COMMENT '创建人',
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `system_user_username_index` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=10027 DEFAULT CHARSET=utf8 COMMENT='系统用户表';

-- ----------------------------
-- Records of system_user
-- ----------------------------
INSERT INTO `system_user` VALUES ('10007', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '751401459', '751401459@qq.com', '15626832124', '', '0', null, '1', '0', null, '2017-03-10 15:26:15');
INSERT INTO `system_user` VALUES ('10023', 'fasdfasdfsad', 'd86641a4189b19defacd72ed661d6a88', '751401459', '751401459@qq.com', '15626832124', '', '0', null, '0', '1', null, '2017-03-10 16:11:57');
INSERT INTO `system_user` VALUES ('10025', 'fasdfasdf', 'b0baee9d279d34fa1dfd71aadb908c3f', '751401459', '751401459@qq.com', '15626832124', '', '0', null, '0', '1', null, '2017-03-11 00:13:45');
INSERT INTO `system_user` VALUES ('10026', 'seven', '7a51cb80555231fcdedd4588a7c44d0c', '751401459', '751401459@qq.com', '15626832124', '', '0', null, '1', '0', null, '2017-03-15 22:38:32');

-- ----------------------------
-- Table structure for travel
-- ----------------------------
DROP TABLE IF EXISTS `travel`;
CREATE TABLE `travel` (
  `tId` int(11) NOT NULL AUTO_INCREMENT,
  `eId` int(11) DEFAULT NULL COMMENT '职员id',
  `startTime` datetime DEFAULT NULL COMMENT '出差时间',
  `endTime` datetime DEFAULT NULL COMMENT '结束时间',
  `addTime` datetime DEFAULT NULL COMMENT '添加时间',
  `destination` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '目的地',
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '备注',
  `status` tinyint(2) DEFAULT '0' COMMENT '默认0等待确认中，1确认，2出差中',
  `adminId` int(11) DEFAULT '0' COMMENT '添加的管理员id',
  `isDel` tinyint(2) DEFAULT '0',
  `delTime` datetime DEFAULT NULL,
  PRIMARY KEY (`tId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of travel
-- ----------------------------
INSERT INTO `travel` VALUES ('1', '2', '2017-03-01 00:00:00', '2017-03-03 00:00:00', '2017-03-19 15:36:15', '广东东莞', '去理工小学享受人生4', '0', '10007', '1', '2017-03-20 09:42:14');
INSERT INTO `travel` VALUES ('2', '10003', '2017-03-02 00:00:00', '2017-03-03 00:00:00', '2017-03-19 20:56:01', '广东东莞', '去理工小学享受人生1', '0', '10007', '0', null);
INSERT INTO `travel` VALUES ('3', '10000', '2017-03-01 00:00:00', '2017-03-03 00:00:00', '2017-03-19 21:24:41', '广东东莞', '去理工小学享受人生2', '0', '10007', '0', null);
INSERT INTO `travel` VALUES ('4', '10000', '2017-03-01 00:00:00', '2017-03-03 00:00:00', '2017-03-19 21:26:58', '广东东莞', '去理工小学享受人生3', '0', '10007', '0', null);
INSERT INTO `travel` VALUES ('5', '10009', '2017-02-28 00:00:00', '2017-03-16 00:00:00', '2017-03-30 14:53:30', '汕尾', '回家祭祖', '0', '10007', '0', null);
