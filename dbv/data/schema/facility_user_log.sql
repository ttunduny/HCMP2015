CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `facility_user_log` AS select distinct `u`.`facility` AS `facility_code`,`l`.`user_id` AS `user_id`,`l`.`start_time_of_event` AS `start_time_of_event`,`l`.`end_time_of_event` AS `end_time_of_event`,`l`.`action` AS `action`,`l`.`issued` AS `issued`,`l`.`ordered` AS `ordered`,`l`.`decommissioned` AS `decommissioned`,`l`.`redistribute` AS `redistribute`,`l`.`add_stock` AS `add_stock` from (`user` `u` join `log` `l`) where ((`u`.`id` = `l`.`user_id`) and (`u`.`usertype_id` = '5'))