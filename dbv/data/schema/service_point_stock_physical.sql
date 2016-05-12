CREATE TABLE `service_point_stock_physical` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facility_id` int(11) NOT NULL,
  `service_point_id` int(11) NOT NULL,
  `commodity_id` int(11) NOT NULL,
  `batch_no` varchar(45) NOT NULL,
  `type_of_adjustment` varchar(45) NOT NULL,
  `count_difference` int(11) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `date_of_recording` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `added_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1