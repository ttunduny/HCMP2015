CREATE TABLE `system_uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(55) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `user_id` varchar(45) DEFAULT NULL,
  `upload_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `type` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
