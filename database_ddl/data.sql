INSERT INTO attendance_trace (attendance_id,`date`,user_id,clock_in,status) VALUES
	 ('62fe5da4b3d73','20220818','user1','2022-08-18 22:41:24',0),
	 ('62fe66af70d2b','20220818','user2','2022-08-18 23:19:59',0),
	 ('62fee0113a9f2','20220819','user1','2022-08-19 07:57:53',1),
	 ('62FF95C8391ED','20220819','user3','2022-08-19 20:53:12',3),
	 ('62FF9B089B288','20220819','user4','2022-08-19 21:15:36',0),
	 ('62FF9B4A4FA6B','20220819','user4','2022-08-19 21:16:42',0),
	 ('62FF9DF1CD263','20220819','user4','2022-08-19 21:28:01',0),
	 ('62FF9E29C0856','20220819','user4','2022-08-19 21:28:57',0),
	 ('6302cd22b8cec','20220822','user3','2022-08-22 07:26:10',3),
	 ('6302e345c8541','20220822','user5','2022-08-22 09:00:37',1);
INSERT INTO attendance_trace (attendance_id,`date`,user_id,clock_in,status) VALUES
	 ('63030cd285d22','20220822','user2','2022-08-22 11:57:54',1),
	 ('63041b3c8404e','20220823','user2','2022-08-23 07:11:40',3),
	 ('63056f73a8ed5','20220824','user2','2022-08-24 07:23:15',3),
	 ('6305ffa8d98a1','20220824','user1','2022-08-24 17:38:32',1);



INSERT INTO package_sended_trace (package_id,user_id,`date`,total_package,code_remark,remark,date_regist,date_updated) VALUES
	 (62,'user3','20220801',2,2,'Trick','2022-08-19 21:35:49','2022-08-19 21:35:49'),
	 (32312,'user1','20220819',23,1,'Tadi jalan jalan','2022-08-19 17:26:38','2022-08-19 17:26:38'),
	 (1661129154,'user3','20220822',23,2,'23','2022-08-22 07:45:54','2022-08-22 07:45:54'),
	 (1661134018,'user5','20220822',2,2,'Testing aja','2022-08-22 09:06:58','2022-08-22 09:06:58'),
	 (1661151894,'user2','20220822',12,2,'Trick tricky','2022-08-22 14:04:54','2022-08-22 14:04:54'),
	 (1661304096,'user2','20220824',23,3,'kebanyakan cod marah2 mulu','2022-08-24 08:21:36','2022-08-24 08:21:36');


INSERT INTO user_base (user_id,name,gender,phone,email,status,auth_user,departement,branch_id,password,contract,last_contract,date_regist,date_updated,remark) VALUES
	 ('user1','Adek Kristiyanto',1,NULL,NULL,NULL,NULL,NULL,NULL,'$2y$10$qhA90Wwq1nNMDUejKMq1x.qmNGxJzcCHepGUfu5Lq5.FrkxWU8reu',NULL,NULL,'2022-08-17 21:24:11','2022-08-17 21:24:11',NULL),
	 ('user2','INI BENERANsssss',1,'08969543512','dkkssss@gmail.com',1,2,'3','4','$2y$10$p41GnxWXYyOl5L8K.J5GE.PuEEP6xFKsB0pZKS66ENoDTRdaPY2Mm',1,'31','2022-08-18 22:59:19','2022-08-24 19:04:47',NULL),
	 ('user3','Luna',1,NULL,NULL,NULL,NULL,NULL,NULL,'$2y$10$GkRpVuCNDnw6dRd6Ps.P4Oo7yxowR7Sg7hwT9JHwHdzTW.sKESSmC',NULL,NULL,'2022-08-19 20:52:16','2022-08-19 20:52:16',NULL),
	 ('user4','Test',1,NULL,NULL,NULL,NULL,NULL,NULL,'$2y$10$6SJMHwZ5Pc6mq6aPAW/saOYU3knBz9zIrfIKOQFQGpj6axuwNnDO2',NULL,NULL,'2022-08-19 21:11:22','2022-08-19 21:11:22',NULL),
	 ('user5','Monkey D Luffy',2,NULL,NULL,NULL,NULL,NULL,NULL,'$2y$10$/6pwfP0DnMccNPxIq3YG3ObRwREg9W8dWzEvjLUeBMs/2FHxWfoyG',NULL,NULL,'2022-08-22 08:59:08','2022-08-22 08:59:08',NULL),
	 ('user6','Tralalalala',2,NULL,NULL,NULL,NULL,NULL,NULL,'$2y$10$XLoqHUDJRP8DjTr4IeAnluKSAb0nVbqnN42JRpB9LVG2yDLk/kKCe',NULL,NULL,'2022-08-24 08:20:49','2022-08-24 08:20:49',NULL);

INSERT INTO code_base (`type`,code,code_title,value,date_regist,date_updated,remark) VALUES
	 ('STATUSUSER',2,'Status User Active','Active','2022-08-18 20:27:11','2022-08-22 12:54:18',NULL),
	 ('CONTRACT',1,'Contract Type','Contract Worker','2022-08-18 20:27:11','2022-08-22 12:54:18',NULL),
	 ('DEPT',3,'Branch Code','Driver','2022-08-18 20:27:11','2022-08-22 12:54:18',NULL),
	 ('ATNDSTS',3,'Attendance Status Type','Early','2022-08-18 20:27:11','2022-08-24 08:31:24',NULL),
	 ('CTGREMARK',1,'Category Remark','Empty','2022-08-18 20:27:11','2022-08-24 08:31:03',NULL),
	 ('GENDER',1,'Gender Type','Female','2022-08-18 20:27:11','2022-08-18 20:27:11',NULL),
	 ('STATUSUSER',3,'Status User Active','InActive','2022-08-18 20:27:11','2022-08-22 12:54:18',NULL),
	 ('PROMTYPE',2,'Promotion Type','Increase Bonuses','2022-08-18 20:27:11','2022-08-22 12:54:18',NULL),
	 ('PROMTYPE',1,'Promotion Type','Increase Salary','2022-08-18 20:27:11','2022-08-22 12:54:18',NULL),
	 ('ATNDSTS',2,'Attendance Status Type','Information','2022-08-18 20:27:11','2022-08-24 08:31:24',NULL);
INSERT INTO code_base (`type`,code,code_title,value,date_regist,date_updated,remark) VALUES
	 ('BRANCH',3,'Branch Code','Jakarta Barat','2022-08-18 20:27:11','2022-08-22 12:54:18',NULL),
	 ('BRANCH',5,'Branch Code','Jakarta Pusat','2022-08-18 20:27:11','2022-08-22 12:54:18',NULL),
	 ('BRANCH',2,'Branch Code','Jakarta Selatan','2022-08-18 20:27:11','2022-08-22 12:54:18',NULL),
	 ('BRANCH',1,'Branch Code','Jakarta Timur','2022-08-18 20:27:11','2022-08-22 12:54:18',NULL),
	 ('BRANCH',4,'Branch Code','Jakarta Utara','2022-08-18 20:27:11','2022-08-22 12:54:18',NULL),
	 ('CTGREMARK',2,'Category Remark','Just Info','2022-08-18 20:27:11','2022-08-24 08:30:55',NULL),
	 ('DEPT',2,'Branch Code','Koordinator','2022-08-18 20:27:11','2022-08-22 12:54:18',NULL),
	 ('DEPT',1,'Branch Code','Korwil','2022-08-18 20:27:11','2022-08-22 12:54:18',NULL),
	 ('DEPT',4,'Branch Code','Kurrir','2022-08-18 20:27:11','2022-08-22 12:54:18',NULL),
	 ('ATNDSTS',1,'Attendance Status Type','Late','2022-08-18 20:27:11','2022-08-24 08:31:24',NULL);
INSERT INTO code_base (`type`,code,code_title,value,date_regist,date_updated,remark) VALUES
	 ('CONTRACT',2,'Contract Type','Loyalty Worker','2022-08-18 20:27:11','2022-08-22 12:54:18',NULL),
	 ('GENDER',2,'Gender Type','Male','2022-08-18 20:27:11','2022-08-18 20:27:11',NULL),
	 ('AUTHUSER',1,'Authentication User','Manger','2022-08-18 20:27:11','2022-08-22 12:54:18',NULL),
	 ('AUTHUSER',3,'Authentication User','Member','2022-08-18 20:27:11','2022-08-22 12:54:18',NULL),
	 ('CONTRACT',4,'Contract Type','Not Yet Decide','2022-08-18 20:27:11','2022-08-22 12:54:18','phase probition'),
	 ('CONTRACT',3,'Contract Type','Permanent Worker','2022-08-18 20:27:11','2022-08-22 12:54:18',NULL),
	 ('CTGREMARK',4,'Category Remark','Problem','2022-08-18 20:27:11','2022-08-24 08:30:55',NULL),
	 ('PROMTYPE',3,'Promotion Type','Promoted Position','2022-08-18 20:27:11','2022-08-22 12:54:18',NULL),
	 ('STATUSUSER',1,'Status User Active','Resign','2022-08-18 20:27:11','2022-08-22 12:54:18',NULL),
	 ('AUTHUSER',2,'Authentication User','Supervisor','2022-08-18 20:27:11','2022-08-22 12:54:18',NULL);
INSERT INTO code_base (`type`,code,code_title,value,date_regist,date_updated,remark) VALUES
	 ('CTGREMARK',3,'Category Remark','Tips And Trick','2022-08-18 20:27:11','2022-08-24 08:30:55',NULL);
