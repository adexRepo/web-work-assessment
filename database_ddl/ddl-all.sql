-- db_web_work_assessment.user_base definition

CREATE TABLE `user_base` (
  `user_id` varchar(15) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `gender` int(1) DEFAULT NULL COMMENT '(0) Female, (1) male',
  `status` int(1) DEFAULT NULL COMMENT '(2) not active, (1) active , (0) resign',
  `auth_user` int(1) DEFAULT NULL COMMENT '(0) manager, (1) supervisor, (2) karyawan',
  `team` varchar(20) DEFAULT NULL COMMENT 'team in branch',
  `departement` varchar(20) DEFAULT NULL COMMENT 'departemen in branch',
  `branch_id` varchar(15) DEFAULT NULL COMMENT 'branch code',
  `password` varchar(255) DEFAULT NULL COMMENT 'hash',
  `contract` int(1) DEFAULT NULL COMMENT '(0) permanent , (1) contract',
  `last_contract` varchar(17) DEFAULT NULL COMMENT 'format [20220705-20221204]',
  `date_regist` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'timestamp',
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'timestamp',
  `remark` varchar(200) DEFAULT NULL COMMENT 'spesial comment',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='table user aja';

INSERT INTO user_base (user_id,name,gender,status,auth_user,team,departement,branch_id,password,contract,last_contract,date_regist,date_updated,remark) VALUES
	 ('user1','Adek Kristiyanto',1,NULL,NULL,NULL,NULL,NULL,'$2y$10$qhA90Wwq1nNMDUejKMq1x.qmNGxJzcCHepGUfu5Lq5.FrkxWU8reu',NULL,NULL,'2022-08-17 21:24:11','2022-08-17 21:24:11',NULL),
	 ('user2','INI BENERAN',1,NULL,NULL,NULL,NULL,NULL,'$2y$10$p41GnxWXYyOl5L8K.J5GE.PuEEP6xFKsB0pZKS66ENoDTRdaPY2Mm',NULL,NULL,'2022-08-18 22:59:19','2022-08-18 22:59:19',NULL);



-- db_web_work_assessment.code_base definition

CREATE TABLE `code_base` (
  `type` varchar(15) NOT NULL COMMENT 'uniq type code',
  `code` int(1) NOT NULL COMMENT 'code , 0 = female , 1 for male',
  `code_title` varchar(50) NOT NULL COMMENT 'code title , like gender',
  `value` varchar(50) NOT NULL COMMENT 'male and female',
  `date_regist` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'timestamp',
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'timestamp',
  `remark` varchar(500) DEFAULT NULL COMMENT 'note',
  PRIMARY KEY (`code`),
  FULLTEXT KEY `remark` (`remark`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO code_base (`type`,code,code_title,value,date_regist,date_updated,remark) VALUES
	 ('ATNDSTS',0,'Attendance Status Type','Late','2022-08-18 20:27:11','2022-08-18 20:27:11',NULL),
	 ('ATNDSTS',1,'Attendance Status Type','On Time','2022-08-18 20:27:11','2022-08-18 20:27:11',NULL),
	 ('ATNDSTS',2,'Attendance Status Type','Early','2022-08-18 20:27:11','2022-08-18 20:27:11',NULL);






-- db_web_work_assessment.attendance_trace definition

CREATE TABLE `attendance_trace` (
  `attendance_id` varchar(50) NOT NULL COMMENT 'we will use date format [yyyymmdd{userId}]',
  `date` varchar(8) NOT NULL COMMENT 'YYYMMDD',
  `user_id` varchar(15) NOT NULL COMMENT 'FK user_base',
  `clock_in` varchar(50) NOT NULL COMMENT 'timestamp',
  `status` int(1) NOT NULL COMMENT 'linked with code in code base\r\n1 is not late\r\n2 is late',
  PRIMARY KEY (`attendance_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO attendance_trace (attendance_id,`date`,user_id,clock_in,status) VALUES
	 ('62fe5da4b3d73','20220818','user1','2022-08-18 22:41:24',0),
	 ('62fe66af70d2b','20220818','user2','2022-08-18 23:19:59',0);





-- db_web_work_assessment.package_sended_trace definition

CREATE TABLE `package_sended_trace` (
  `id` int(20) NOT NULL COMMENT 'generate',
  `user_id` varchar(15) NOT NULL COMMENT 'FK with userid in user_base',
  `date` varchar(8) NOT NULL COMMENT 'yyyymmdd',
  `total_package` int(50) NOT NULL,
  `code_remark` int(3) DEFAULT NULL COMMENT 'linked with code in code_base',
  `remark` varchar(500) DEFAULT NULL,
  `date_regist` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




-- db_web_work_assessment.benefit_rule definition

CREATE TABLE `benefit_rule` (
  `id` varchar(50) NOT NULL COMMENT 'generate',
  `auth_user` int(1) NOT NULL COMMENT 'link with user base',
  `departement` varchar(20) NOT NULL COMMENT 'link with user base and code base',
  `contract` int(1) NOT NULL COMMENT '0 / 1 link with code_base and user_base',
  `principal_salary` varchar(20) NOT NULL COMMENT 'static value manager can setting this (gapok)',
  `target` int(5) NOT NULL COMMENT 'static value manager can setting this (condition) misal 50 barang terkirim maka [lihat comment interest_salary]',
  `interest_salary` varchar(20) NOT NULL COMMENT 'static value manager can setting this [maka dapat untung 125.000] , jadi per barang yang terkirim 2500 rupiah',
  `promotion` int(5) DEFAULT NULL COMMENT '[day] kalo user lebih dari target selama 90 hari berturut2 maka layak dapat promosi',
  `user_id` int(11) NOT NULL COMMENT 'updated or regist this table rule , FK with user_base userId',
  `date_regist` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- db_web_work_assessment.sessions definition

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sessions_user` (`user_id`),
  CONSTRAINT `fk_sessions_user` FOREIGN KEY (`user_id`) REFERENCES `user_base` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;