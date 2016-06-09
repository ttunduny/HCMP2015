<?php
/**
 * @author GT
 */
if (!defined('BASEPATH'))
	exit('No direct script access allowed');


/**This controller is responsible for sending the data to the main server**/
class Data_sync extends MY_Controller {


	function __construct() {
		parent::__construct();
		$this -> load -> helper(array('form', 'url'));
		// $this -> load -> library(array('hcmp_functions', 'form_validation'));
	}


	function index(){
		$synced_files = Sync_model::get_uploaded_data();

		foreach ($synced_files as $key => $value) {
			$id = $value['id'];
			$facility_code = $value['facility_code'];
			$zip_file = $value['file_name'];			
			$this->insert_data($zip_file,$facility_code,$id);
		}		

	}

	public function check_user_email($email){
		$result = $this->db->query("SELECT * FROM user where email = '$email'");
		return $result->result_array();
	}
		

	public function insert_data($zip_file,$facility_code,$id){	
		$extention = end(explode(".", $zip_file));
		$filename =  basename($zip_file, ".".$extention );	
		$zip = new ZipArchive;
		$res = $zip->open(FCPATH.'sync_files\\'.$zip_file);		
		if ($res === TRUE) {
			$zip->extractTo(FCPATH.'sync_files\extracted\\');
			$zip->close();
			echo 'Successfully Extracted';			
		}else{
			echo "Error Extracting";
		}

		$filename = 'Tue07_160612_14950';

		$txt_file = FCPATH.'sync_files\extracted\\'.$filename.'.txt';

		$file_details = json_decode(file_get_contents($txt_file, FILE_USE_INCLUDE_PATH));
		// echo "<pre>";print_r($file_details);die;
		// echo "<pre>";print_r(json_decode($file_details->user,TRUE));die;
		$count = count($file_details);die;
		foreach ($file_details as $key =>$value) {
			$value = json_decode($value,TRUE); // Convert the Value Json Output to Associative Array
			echo "<pre>";print_r($value);die;
			if($key=='facility_code'){ //Skip the First Element Which is the facility_code
			}else if($key=='user'){ //Check the user if they exist else insert
				echo "string";die;
				// $value = array_unique($value,SORT_REGULAR); //Remove the Duplicates in the Array
				// echo "<pre>";print_r($value);die;
			}else{
				//Check to see if there is any data
				if(count($value)<=0){					
				}else{
					//Loop through the Value Array to remove the ids
					foreach ($value as $key1 => $value1) {
						unset($value[$key1]['id']);
					}		
					$value = array_unique($value,SORT_REGULAR); //Remove the Duplicates in the Array
					$this->db->insert_batch($key, $value); //Inserting Data to the DB
				}				
					// echo "<pre>";print_r($value);			
			}
		}
		die;
		echo "<pre>";print_r($file_details);



		// die;





		// unlink(FCPATH.'sync_files\\'.$zip_file);
	}

}



?>