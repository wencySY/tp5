
-- 后台账号
create table `news_member`(
`id` int(8) unsigned not null auto_increment,
`username` varchar(50) not null comment '用户名',
`password` varchar(32) not null comment '密码',
`email` varchar(255) default null comment '邮箱',
`birthday` int(11) unsigned not null default '0' comment '生日',
`status` tinyint(2) not null default '0' comment '状态',
`create_time` int(11) unsigned not null default '0' comment '注册时间',
`update_time` int(11) unsigned not null default '0' comment '更新时间',
primary key (`id`)
)engine =myisam auto_increment=1 default charset=utf8;

-- 新闻内容
create table `news_news`(
`id` int(8) unsigned not null auto_increment,
`title` varchar(255) not null comment '标题',
`content` varchar(255) not null comment '内容',
`author` varchar(255) not null comment '作者',
`status` tinyint(2) not null default '0' comment '状态',
`create_time` int(11) unsigned not null default '0' comment '上传时间',
`update_time` int(11) unsigned not null default '0' comment '更新时间',
primary key (`id`)
)engine =myisam auto_increment=1 default charset=utf8;
-- 图片处理
create table `news_img`(
`id` int(8) unsigned not null auto_increment,
`picture` varchar(255) not null comment '图片',
`description` varchar(255) not null default '' comment '描述',
`author` varchar(255) not null default '' comment '作者',
`addtime` int(11) not null comment '添加时间',
primary key(`id`)
)engine =myisam auto_increment=1 default charset=utf8;