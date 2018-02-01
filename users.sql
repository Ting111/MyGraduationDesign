CREATE TABLE 'MGD'.'users'(
    'id' INT(4) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
    'username' VARCHAR(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户名',
    'password' VARCHAR(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码',
    'phonenum' VARCHAR(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '手机号',
    'ip' INT(11) DEFAULT NULL COMMENT 'ip地址',
    PRIMARY KEY('id')
) ENGINE = MyISAM CHARSET = utf8 COLLATE utf8_general_ci COMMENT = '用户表';