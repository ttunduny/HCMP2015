<?php
class Update_model extends Doctrine_Record {
	public function setTableDefinition() {
	
	}

	public function get_latest_local_timestamp()
	{
		$query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAll("SELECT * FROM update_log WHERE added_on=(SELECT MAX(added_on) FROM update_log)");

		if (!empty($query)) {
			return $query[0]['added_on'];
		}
		else{
			return $query;
		}
	}
}