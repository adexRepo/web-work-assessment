-- db_web_work_assessment.attendance_trace definition

CREATE TABLE `attendance_trace` (
  `attendance_id` varchar(50) NOT NULL COMMENT 'we will use date format [yyyymmdd{userId}]',
  `date` varchar(8) NOT NULL COMMENT 'YYYMMDD',
  `user_id` varchar(15) NOT NULL COMMENT 'FK user_base',
  `clock_in` varchar(50) NOT NULL COMMENT 'timestamp',
  `status` int(1) NOT NULL COMMENT 'linked with code in code base\r\n1 is not late\r\n2 is late',
  PRIMARY KEY (`attendance_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- db_web_work_assessment.package_sended_trace definition

CREATE TABLE `package_sended_trace` (
  `package_id` int(20) NOT NULL COMMENT 'generate',
  `user_id` varchar(15) NOT NULL COMMENT 'FK with userid in user_base',
  `date` varchar(8) NOT NULL COMMENT 'yyyymmdd',
  `total_package` int(50) NOT NULL,
  `code_remark` int(3) DEFAULT NULL COMMENT 'linked with code in code_base',
  `remark` varchar(500) DEFAULT NULL,
  `date_regist` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`package_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- db_web_work_assessment.user_base definition

CREATE TABLE `user_base` (
  `user_id` varchar(15) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `gender` int(1) DEFAULT NULL COMMENT '(0) Female, (1) male',
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT '(2) not active, (1) active , (0) resign',
  `auth_user` int(1) DEFAULT NULL COMMENT '(0) manager, (1) supervisor, (2) karyawan',
  `departement` varchar(20) DEFAULT NULL COMMENT 'departemen in branch',
  `branch_id` varchar(15) DEFAULT NULL COMMENT 'branch code',
  `password` varchar(255) DEFAULT NULL COMMENT 'hash',
  `contract` int(1) DEFAULT NULL COMMENT '(0) permanent , (1) contract',
  `last_contract` varchar(20) DEFAULT NULL COMMENT 'format [20220705-20221204]',
  `date_regist` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'timestamp',
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'timestamp',
  `remark` varchar(200) DEFAULT NULL COMMENT 'spesial comment',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='table user aja';



-- db_web_work_assessment.benefit_rule definition

CREATE TABLE `benefit_rule` (
  `rule_id` varchar(50) NOT NULL COMMENT 'generate',
  `departement` int(1) NOT NULL COMMENT 'link with user base and code base',
  `contract` int(1) NOT NULL COMMENT '0 / 1 link with code_base and user_base',
  `principal_salary` int(255) NOT NULL COMMENT 'static value manager can setting this (gapok)',
  `target` int(5) NOT NULL COMMENT 'static value manager can setting this (condition) misal 50 barang terkirim maka [lihat comment interest_salary]',
  `interest_salary` int(255) NOT NULL COMMENT 'static value manager can setting this [maka dapat untung 125.000] , jadi per barang yang terkirim 2500 rupiah',
  `promotion` int(5) DEFAULT NULL COMMENT '[day] kalo user lebih dari target selama 90 hari berturut2 maka layak dapat promosi',
  `user_id` varchar(10) NOT NULL COMMENT 'updated or regist this table rule , FK with user_base userId',
  `date_regist` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `remark` varchar(500) DEFAULT NULL,
  `promotion_type` int(1) NOT NULL,
  PRIMARY KEY (`rule_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- db_web_work_assessment.advice_trace definition

CREATE TABLE `advice_trace` (
  `user_id` varchar(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date_register` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- db_web_work_assessment.code_base definition

CREATE TABLE `code_base` (
  `type` varchar(15) NOT NULL COMMENT 'uniq type code',
  `code` int(1) NOT NULL COMMENT 'code , 0 = female , 1 for male',
  `code_title` varchar(50) NOT NULL COMMENT 'code title , like gender',
  `value` varchar(50) NOT NULL COMMENT 'male and female',
  `date_regist` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'timestamp',
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'timestamp',
  `remark` varchar(500) DEFAULT NULL COMMENT 'note',
  PRIMARY KEY (`value`),
  FULLTEXT KEY `remark` (`remark`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;