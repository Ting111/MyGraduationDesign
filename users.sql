CREATE TABLE `users` (
    `id` int(4) UNSIGNED NOT NULL COMMENT '编号',
    `username` varchar(32) NOT NULL COMMENT '用户名',
    `password` varchar(32) NOT NULL COMMENT '密码',
    `phonenum` varchar(11) NOT NULL COMMENT '手机号',
    `ip` varchar(15) DEFAULT NULL COMMENT 'ip地址',
    `city` varchar(32) DEFAULT NULL COMMENT '所在地',
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户表';