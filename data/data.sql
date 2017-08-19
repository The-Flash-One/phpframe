CREATE DATABASE ecms DEFAULT CHARACTER SET 'utf8';
USE ecms;
-- 新闻分类表
CREATE TABLE category(
	id SMALLINT UNSIGNED NOT NULL KEY AUTO_INCREMENT,
	cate_name VARCHAR(30) NOT NULL,
	parent_id SMALLINT NOT NULL DEFAULT 0
);

INSERT category(cate_name,parent_id) VALUES('国内新闻',0);
INSERT category(cate_name,parent_id) VALUES('国际新闻',0);
INSERT category(cate_name,parent_id) VALUES('体育新闻',0);
INSERT category(cate_name,parent_id) VALUES('内地新闻',1);
INSERT category(cate_name,parent_id) VALUES('港澳台新闻',1);
INSERT category(cate_name,parent_id) VALUES('最新消息',2);
INSERT category(cate_name,parent_id) VALUES('环球视野',2);


-- 新闻表

CREATE TABLE article(
		id INT UNSIGNED NOT NULL KEY AUTO_INCREMENT,
		art_subject VARCHAR(80) NOT NULL,
		art_content MEDIUMTEXT NOT NULL,
		cate_id  SMALLINT UNSIGNED NOT NULL,
		add_time INT UNSIGNED NOT NULL,
		ptr_id   SMALLINT UNSIGNED NOT NULL,
		admin_id SMALLINT UNSIGNED NOT NULL,
		cmt_num  MEDIUMINT UNSIGNED NOT NULL DEFAULT 0,
		is_checked BOOLEAN NOT NULL DEFAULT 0
);



ALTER TABLE article ADD is_deleted BOOLEAN NOT NULL DEFAULT 0;

ALTER TABLE article ADD filepath VARCHAR(60) NOT NULL;
-- 合作伙伴表

CREATE TABLE partner(
	id SMALLINT UNSIGNED NOT NULL KEY AUTO_INCREMENT,
	ptr_name VARCHAR(30) NOT NULL,
	ptr_url VARCHAR(50) NOT NULL
);

INSERT partner(ptr_name,ptr_url) VALUES('新浪网','http://www.sina.com.cn');
INSERT partner(ptr_name,ptr_url) VALUES('网易','http://www.163.com');
INSERT partner(ptr_name,ptr_url) VALUES('腾讯网','http://www.qq.com');
INSERT partner(ptr_name,ptr_url) VALUES('新华网','http://www.xinhuanet.com');

-- 管理员表

CREATE TABLE admin(
	id SMALLINT UNSIGNED NOT NULL KEY AUTO_INCREMENT,
	admin_name VARCHAR(20) NOT NULL UNIQUE,
	admin_pass VARCHAR(32) NOT NULL,
	true_name  VARCHAR(20) NOT NULL,
	admin_level TINYINT UNSIGNED NOT NULL DEFAULT 1
);

INSERT admin VALUES(DEFAULT,'admin',MD5('admin'),'超级管理员',1);
INSERT admin VALUES(DEFAULT,'editor',MD5('editor'),'主编',2);
INSERT admin VALUES(DEFAULT,'noraml',MD5('normal'),'新闻采编',3);


-- 新闻评论表

CREATE TABLE comment(
	id INT UNSIGNED NOT NULL KEY AUTO_INCREMENT,
	cmt_content VARCHAR(255) NOT NULL,
	mem_id MEDIUMINT UNSIGNED NOT NULL,
	art_id INT UNSIGNED NOT NULL,
	add_time INT UNSIGNED NOT NULL
);

CREATE TABLE member(
	id MEDIUMINT UNSIGNED NOT NULL KEY AUTO_INCREMENT,
	mem_name VARCHAR(30) NOT NULL UNIQUE,
	mem_pass VARCHAR(32) NOT NULL,
	mem_face VARCHAR(50)
); 


insert member(mem_name,mem_pass,mem_face) values('tom',MD5('tom'),'1.jpg');
insert member(mem_name,mem_pass,mem_face) values('john',MD5('tom'),'2.jpg');
insert member(mem_name,mem_pass,mem_face) values('rose',MD5('tom'),'3.jpg');
insert member(mem_name,mem_pass,mem_face) values('ben',MD5('tom'),'4.jpg');
insert member(mem_name,mem_pass,mem_face) values('david',MD5('tom'),'5.jpg');
insert member(mem_name,mem_pass,mem_face) values('frank',MD5('tom'),'6.jpg');
insert member(mem_name,mem_pass,mem_face) values('ellise',MD5('tom'),'7.jpg');

insert comment(cmt_content,mem_id,art_id,add_time) values('这是评论测试1',5,44,1497584118);
insert comment(cmt_content,mem_id,art_id,add_time) values('这是评论测试2',1,44,1497584118);
insert comment(cmt_content,mem_id,art_id,add_time) values('这是评论测试3',7,44,1497584118);
insert comment(cmt_content,mem_id,art_id,add_time) values('这是评论测试4',2,44,1497584118);





