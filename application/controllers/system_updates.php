<?php 
/**
 * @author Karsan
 */
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class System_updates extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> library(array('hcmp_functions', 'form_validation','unzip'));
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
	}
public function system_updates_home($update_status=NULL,$update_presence = NULL){
		// echo "<pre>";print_r($update_presence);exit;
		$permissions='super_permissions';
		$data['user_types']=Access_level::get_access_levels($permissions);
		$identifier = $this -> session -> userdata('user_indicator');

		$status = (isset($update_presence) && $update_presence = 1)? 1:NULL;

		if (isset($status) && $status == 1) {
			$status_ = "TRUE";
			$available_update = 1;
		}else{
			$status_ = "FALSE";
			$available_update = 0;
		}

		$latest_update_time = $this->latest_server_update_time();
		
		// echo "<pre>";print_r($latest_update_time);echo "</pre>";exit;	
		// echo $available_update;exit;
		$update_records = update_model::get_prior_records();
		// echo "<pre>";print_r($update_records);exit;

		$data['available_update'] = $available_update;
		$data['latest_update_time'] = $latest_update_time;
		$data['update_status'] = $status_;
		$data['update_records'] = $update_records;

		$data['title'] = "System Updates";
		$data['banner_text'] = "System Management";
		$data['banner_text'] = "System Management";
        $template = 'shared_files/template/template';            
        $data['latest_hash'] = $hash;
        $data['content_view'] = "offline/offline_admin_home";

		$this -> load -> view($template, $data);
	}

	public function update_system()
	{
		$get_latest_zip = $this->get_latest_zip();
		// $hash = $this->get_hash();			
		// $get_zip = $this->get_latest_zip();
		// $update_files = $this->extract_and_copy_files($hash);
		// $update_git_log = $this->update_log($hash);
		
		// $extracted_path = $this->get_extracted_path();
		// $delete_residual_repo = $this->delete_residual_files($hash.'.zip');
		// $delete_residual_dir = $this->delete_residual_files($extracted_path);
		// $update_logs = $this->update_log($hash);


		// echo "<pre>";print_r($update_files);exit;
		// echo $set_current_commit;exit;
		// echo "I worked";
		redirect('/git_updater/admin_updates_home/1');
	}

	public function get_latest_zip()
	{
		$server_data = $this->get_server_update_data();

		$update_filename = $server_data[0]['update_name'];
		$filename_minus_extension = substr($update_filename, 0, strpos($update_filename, "."));

		$file = $this->download_update_zip($update_filename);

		// $unzip_status = $this->unzip->extract($update_filename);
		// echo $update_filename;exit;
		$update = $this->extract_and_copy_files($update_filename);
		
		$delete_zip = $this->delete($update_filename);
		$delete_folder = $this->delete($filename_minus_extension);

        echo $delete_folder;exit;
        // $server_latest_update_data = json_decode($server_latest_update_data,true);


	}

	public function download_update_zip($filename)//used copy instead of file_get_Contents as seen in older function as it creates an immitation of a zip,errors
	{
		$remote_file_url = 'http://41.89.6.209/HCMP/system_updates/'.$filename;
 
		/* New file name and path for this file */
		$local_file = $filename;
		 
		/* Copy the file from source url to server */
		$copy = copy($remote_file_url, $local_file );

		return $copy;
	}

	public function download_update_zip_old($filename)
	{
		$url = "41.89.6.209/HCMP/system_updates/local_update_file_contents/".$filename;
		// create curl resource 
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, $url); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

        // $output contains the output string 
        $contents = curl_exec($ch); 

        // close curl resource to free up system resources 
        $close = curl_close($ch); 

        // after getting file contents,we proceed to write the contents into a local file
        // hotfix for copy,as it doesnt work
        // echo $contents;exit;
        ob_end_clean();
        $file = file_put_contents($filename, $contents);

        return $file;
	}

	public function local_update_file_contents($filename){
		$contents = file_get_contents("system_updates/".$filename);

		echo $contents;
	}

	public function extract_and_copy_files($filename){
		$success_status = array();

		$unzip_status = $this->unzip->extract($filename);

		$filename = substr($filename, 0, strpos($filename, "."));
		// echo $filename;exit;
		// echo "<pre>"; print_r($unzip_status);echo "</pre>";exit;
		$sanitized_directory = array();
		foreach ($unzip_status as $unzip) {
			$unzip = substr($unzip, 2);
			// echo "<pre>".$unzip;
			$del = "/";
			$trimmed=strpos($unzip, $del);
			$important=substr($unzip, $trimmed+strlen($del)-1, strlen($unzip)-1);
			$important = substr($important, 1);

			$sanitized_directory[] = $important;
		}

		// echo "<pre>";print_r($sanitized_directory);exit;
		$status = $this->copy_and_replace($sanitized_directory,$filename);
		// echo "<pre>";print_r($status);
		// $set_hash = $this->github_updater->_set_config_hash($hash);

		// $success_status['extracted_path'] = $extracted_path;
		$success_status['status'] = $status;

		return $success_status;
	}

	public function copy_and_replace($directories,$source_path = NULL){
		$copy_status_ = array();
		// echo FCPATH.$source_path."<pre>";
		$fcpath = FCPATH;
		$sanitized_fcpath = str_replace('\\','/', $fcpath);
		// echo $sanitized_fcpath;
		foreach ($directories as $dir) {
		// echo FCPATH.$dir."<pre>";
			$dir = str_replace('/','\\', $dir);
			$src = $sanitized_fcpath.$source_path."/".$dir;
			$dest = $sanitized_fcpath.$dir;
			$copy_status_[]['src']= "\"".$src."\"";
			$copy_status_[]['dest']= "\"".$dest."\"";

			$this->copy($src,$dest);
		}
		return $copy_status_;
	}

	public function ignored_files(){
		$ignored = $this->github_updater->list_ignored();

		// echo "<pre>";print_r($ignored);
		return $ignored;
	}

	public function array_cleaner($dirty_array,$dirt){
		foreach ($dirty_array as $key => $leaving_elem) {
		    foreach ($dirt as $keys => $value) {
		    	if (strpos($leaving_elem,$value) !== false) {
				    // echo 'true';
			        unset($dirty_array[$key]);
				}
			    // echo $leaving_elem;
		    }
		}
		// echo "<pre>DIRTY ARR";print_r($dirty_array);
		// echo "<pre>DIRT";print_r($dirt);

		return $dirty_array;
		// echo FCPATH;
	}//end of array cleaner

	public function download_update($update_name)
	{
		$download_file = $this->hcmp_functions->download_file("41.89.6.209/HCMP/system_updates/".$update_name);

		echo $download_file;
	}

	public function tester()
	{
		$remote_file_url = 'http://41.89.6.209/HCMP/system_updates/Thu05_210503.zip';
 
		/* New file name and path for this file */
		$local_file = 'files.zip';
		 
		/* Copy the file from source url to server */
		$copy = copy($remote_file_url, $local_file );
		 
		/* Add notice for success/failure */
		if( !$copy ) {
		    echo "Doh! failed to copy file...\n";
		}
		else{
		    echo "WOOT! success to copy file...\n";
		}
	}
}

?>