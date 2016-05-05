<?php
class Update_model extends Doctrine_Record {
	public function setTableDefinition() {
	
	}

	public function get_latest_local_timestamp($time_only = NULL,$whole_array = NULL)
	{
		$query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAll("SELECT * FROM update_log WHERE added_on=(SELECT MAX(added_on) FROM update_log)");

		// $return_type = (isset($time_only) && $time_only == 1)? 1:NULL;
		$return_type = NULL;
		if ($return_type == 1) {
			return $query[0]['added_on'];
		}
		else{
			return $query;
		}
	}

	public function get_prior_records(){
		$log_data = Doctrine_Manager::getInstance()->getCurrentConnection()
		->fetchAll("SELECT * FROM update_log");
		
		return $log_data;
	}

}