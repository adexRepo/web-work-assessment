-- db_web_work_assessment.sessions definition

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sessions_user` (`user_id`),
  CONSTRAINT `fk_sessions_user` FOREIGN KEY (`user_id`) REFERENCES `user_base` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;