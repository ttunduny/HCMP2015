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
		echo "<pre>";print_r($synced_files);
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
	
	public function insert_data($zip_file,$facility_code,$ftp_file_id){	
		ob_end_clean();
		ini_set('memory_limit', '-1');
		ini_set('max_execution_time', '-1');

		$extention = end(explode(".", $zip_file));
		$filename =  basename($zip_file, ".".$extention );	
		if (!file_exists(FCPATH.'ftp_files\\'.$zip_file)) { //Check if the Actual File exists as From the DB
			echo "File Does Not Exist $file_name<br/>";
			//Set the Status to 2 to indicate entry without File
		    $sql_ftp_update_else = "update ftp_uploads set status = '2' where id='$ftp_file_id'";  
			$this->db->query($sql_ftp_update_else);
		} else {
		    
			$zip = new ZipArchive;
			$res = $zip->open(FCPATH.'ftp_files\\'.$zip_file);		
			if ($res === TRUE) {
				$zip->extractTo(FCPATH.'ftp_files\extracted\\');
				$zip->close();
				echo "Successfully Extracted<br/>";			
			}else{
				//Set the Status to 2 to indicate entry without File
				$sql_ftp_update_else = "update ftp_uploads set status = '2' where id='$ftp_file_id'";
				$this->db->query($sql_ftp_update_else);
				echo "Error Extracting<br/>";
			}		

			$txt_file = FCPATH.'ftp_files\extracted\\'.$filename.'.txt';

			$file_details = array(json_decode(file_get_contents($txt_file, FILE_USE_INCLUDE_PATH),TRUE));	//Decode and create an array from the data
			

			//Check to see if the array has data
			if(count($file_details)>0){
				$user_details = $file_details[0]['user']; //Get the user details for manual addition later on
				unset($file_details[0]['facility_code']); //Remove the Facility_code from the Main Array
				unset($file_details[0]['user']); //Remove the User Details from the Main Array
				
				$extracted_users= json_decode($user_details,TRUE); // Convert the Users Json Output to Associative Array	

				//*  Start of Inserting User Data *//				
				foreach ($extracted_users as $keys => $values) { //Loop through the Users Data
					unset($values['id']); //Remove the Id
					$email = $values['email'];  //Get the Email Address to be Used to Check if the User exists

					$email_check = $this->check_user_email($email); //Call to email check Function Defined Above
					if(count($email_check)>0){ //Check if the User already exists in the live db
						//If Yes, we update the Live Db with the local User and Password
						// $this->db->update_batch('user', $values, 'email'); 
					}else{
						//If the User does not exist, we insert the data into the DB
						$this->db->insert_batch('user', $values); //Inserting User Data to the DB
					}				
				}
				
				//*  End of Inserting User Data *//				

				//*  Start of Inserting Other  Data *//				
				//Loop through the array using [0] as the first Element since I expanded the array
				foreach ($file_details[0] as $key =>$value) {
					$extracted_value = json_decode($value,TRUE); // Convert the Value Json Output to Associative Array				
					// Check to see if there is any data
					if(count($extracted_value)<=0){					
						echo "No data to Insert <br/>";
					}else{
						//Loop through the Extracted Value Array to remove the ids
						foreach ($extracted_value as $new_key => $new_value) {
							unset($extracted_value[$new_key]['id']);
						}							
						$unduplicated_extracted_value = array_unique($extracted_value,SORT_REGULAR); //Remove the Duplicates in the Extracted Array			
						$this->db->insert_batch($key, $unduplicated_extracted_value); //Inserting Data to the DB
					}		
					

				}
				//*  End of Inserting Other Data *//		
			}
			
			//Update the Record on the Ftp_uploads File to Show the Insertion Has Occurred
			$sql_ftp_update = "update ftp_uploads set status = '1' where id='$ftp_file_id'";
			$this->db->query($sql_ftp_update);

			//Delete the Extracted File
			unlink($txt_file);
		}
	}

}



?>