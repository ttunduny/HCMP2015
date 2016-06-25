CREATE TABLE `reported_issues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `submitted_by` int(11) NOT NULL,
  `user_level` varchar(50) NOT NULL,
  `issue_url` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1