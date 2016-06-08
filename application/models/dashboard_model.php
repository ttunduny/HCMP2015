<?php
class Dashboard_model extends Doctrine_Record {
	public function get_online_offline_facility_count($county = NULL,$district = NULL)
	{
		$filter = ($county>0)? "WHERE d.county = $county" :NULL;
		$filter = ($district>0)? "WHERE d.id = 1 = $district" :NULL;

		$nested_filter = '';
		$nested_filter .= ($county>0)? "AND d.county = $county" :NULL;
		$nested_filter .= ($district>0)? "AND d.id = $district" :NULL;

		$response = $this->db->query("
			SELECT 
				c.county,
				d.district,
			    (SELECT count(f.facility_code) FROM facilities f,districts d WHERE using_hcmp = 2 AND f.district = d.id $nested_filter) as offline_facilities,
			    (SELECT count(f.facility_code) FROM facilities f,districts d WHERE using_hcmp = 1 AND f.district = d.id $nested_filter) as online_facilities,
			    (SELECT count(f.facility_code) FROM facilities f,districts d WHERE using_hcmp IN(1,2) AND f.district = d.id $nested_filter) as total_facilities
			FROM
			    facilities f LEFT JOIN districts d ON f.district = d.id LEFT JOIN counties c ON d.county = c.id
				$filter
			GROUP BY online_facilities,offline_facilities;
		")->result_array();

		return $response;
	}

	public function get_commodity_count()
	{
		$codeigniter_sucks = $this->db->query("
			SELECT 
		    (SELECT count(*)
		        FROM
		            commodities
		        WHERE
		            commodity_source_id = 2) AS meds_count,
		    (SELECT count(*)
		        FROM
		            commodities
		        WHERE
		            commodity_source_id = 1) AS kemsa_count,
			(SELECT count(*)
		        FROM
		            commodities
		        WHERE
		            commodity_source_id IN(1,2)) AS total_count
		            ")->result_array();
		return $codeigniter_sucks;
	}

	public function get_tracer_commodities()
	{
		$codeigniter_sucks_balls = $this->db->query(
			"SELECT 
			    *
			FROM
			    hcmp_rtk.commodities
			WHERE
			    tracer_item = 1"
			    )->result_array();
		return $codeigniter_sucks_balls;
	}

	public function get_commodity_details($id)
	{
		$codeigniter_been_sucking_balls = $this->db->query(
			"SELECT 
			    *
			FROM
			    hcmp_rtk.commodities WHERE id = $id"
			    )->result_array();
		return $codeigniter_been_sucking_balls;
	}


}
?>