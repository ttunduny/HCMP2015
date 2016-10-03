
<?php
/**
 * @author Kariuki
 */

//made it visible so that I can push it to the repo
class Hcmp_functions extends MY_Controller {

	var $test_mode = TRUE;

	function __construct() {
		parent::__construct();
		$this -> load -> helper(array('url', 'file', 'download'));

		$this -> load -> library(array('PHPExcel/PHPExcel', 'mpdf/mpdf'));

	}

public function send_system_text($action)
		{
			switch($action):
				//there are four functions the user performs
				//redistribute, ordered, issue & decommissioned

				case "redistribute";

				//Facility Section of the message

				//pick the details from the session
				$facility_name = $this -> session -> userdata('full_name');
	   			$facility_code=$this -> session -> userdata('facility_id');;

	   			//pick the phone numbers for that facility
	   			$data = Users::getUsers($facility_code)->toArray();

				//get facility phone numbers
				//$facility_phone = $this -> get_facility_phone_numbers($facility_code);
				//facility message
				$facility_message = "Dear $facility_name user, \n commodities have been redistributed to another facility. \n Log in to health-cmp.or.ke to follow up. HCMP";
				//url encode the message
				$message = urlencode($facility_message);
				$facility_phone = "254723722204+254720167245+254726416795";
				//clean the phone numbers
				$phone_numbers = explode("+", $facility_phone);
				//send the message here
				foreach ($phone_numbers as $key => $user_no)
				{
					file("http://41.57.109.242:13000/cgi-bin/sendsms?username=clinton&password=ch41sms&to=$user_no&text=$message");

				}
				/*End the facility Section of the functions*/

				/*Start the Sub County Section of the Message*/
				//pick the user data
				$user_data = Users::get_scp_details($data[0]['district']);

				//loop through the each of the numbers of the users
				foreach ($user_data as $data) :
					//pick the name
					$name_sub_county = $data['fname'] . " " . $data['lname'];
					//message to be sent out to the sub county guys
					$message = "Dear $name_sub_county user,\n $facility_name has redistributed commodities from its Store.\n Log in to health-cmp.or.ke to follow up on the issue.\n HCMP";
					$message = urlencode($message);

					$user_no = $data['telephone'];
					file("http://41.57.109.242:13000/cgi-bin/sendsms?username=clinton&password=ch41sms&to=$user_no&text=$message");
				endforeach;

				break;

				//texts sent when an order is sent
				case "ordered";

				//Facility Section of the message

				//pick the details from the session
				$facility_name = $this -> session -> userdata('full_name');
	   			$facility_code=$this -> session -> userdata('facility_id');;

	   			//pick the phone numbers for that facility
	   			$data = Users::getUsers($facility_code)->toArray();

				//get facility phone numbers
				//$facility_phone = $this -> get_facility_phone_numbers($facility_code);
				$facility_phone = "254723722204+254720167245+254726416795";
				//facility message
				$facility_message = "Dear $facility_name user, \n an order has been placed. \n Log in to health-cmp.or.ke to follow up. HCMP";
				//url encode the message
				$message = urlencode($facility_message);

				//clean the phone numbers
				$phone_numbers = explode("+", $facility_phone);
				//send the message here
				foreach ($phone_numbers as $key => $user_no)
				{
					file("http://41.57.109.242:13000/cgi-bin/sendsms?username=clinton&password=ch41sms&to=$user_no&text=$message");
					//echo "Sent to ".$user_no;

				}
				/*End the facility Section of the functions*/

				/*Start the Sub County Section of the Message*/
				//pick the user data
				$user_data = Users::get_scp_details($data[0]['district']);

				//loop through the each of the numbers of the users
				foreach ($user_data as $data) :
					//pick the name
					$name_sub_county = $data['fname'] . " " . $data['lname'];
					//message to be sent out to the sub county guys
					$message = "Dear $name_sub_county user,\n $facility_name has placed an order.\n Log in to health-cmp.or.ke to follow up on the issue.\n HCMP";
					$message = urlencode($message);

					$user_no = $data['telephone'];
					file("http://41.57.109.242:13000/cgi-bin/sendsms?username=clinton&password=ch41sms&to=$user_no&text=$message");
				endforeach;
				break;

				case "decommissioned";

				//Facility Section of the message

				//pick the details from the session
				$facility_name = $this -> session -> userdata('full_name');
	   			$facility_code=$this -> session -> userdata('facility_id');;

	   			//pick the phone numbers for that facility
	   			$data = Users::getUsers($facility_code)->toArray();

				//get facility phone numbers
				//$facility_phone = $this -> get_facility_phone_numbers($facility_code);
					$facility_phone = "254723722204+254720167245+254726416795";
				//facility message
				$facility_message = "Dear $facility_name user, \n commodities have been decommissioned from the Store.\n Log in to health-cmp.or.ke to follow up. HCMP";
				//url encode the message
				$message = urlencode($facility_message);

				//clean the phone numbers
				$phone_numbers = explode("+", $facility_phone);
				//send the message here
				foreach ($phone_numbers as $key => $user_no)
				{
					file("http://41.57.109.242:13000/cgi-bin/sendsms?username=clinton&password=ch41sms&to=$user_no&text=$message");
					//echo "Sent to ".$user_no;

				}
				/*End the facility Section of the functions*/

				/*Start the Sub County Section of the Message*/
				//pick the user data
				$user_data = Users::get_scp_details($data[0]['district']);

				//loop through the each of the numbers of the users
				foreach ($user_data as $data) :
					//pick the name
					$name_sub_county = $data['fname'] . " " . $data['lname'];
					//message to be sent out to the sub county guys
					$message = "Dear $name_sub_county user,\n $facility_name has decommissioned commodities from its store.\n Log in to health-cmp.or.ke to follow up on the issue.\n HCMP";
					$message = urlencode($message);

					$user_no = $data['telephone'];
					file("http://41.57.109.242:13000/cgi-bin/sendsms?username=clinton&password=ch41sms&to=$user_no&text=$message");
				endforeach;
				break;
				
				case "add_stock";

				//Facility Section of the message

				//pick the details from the session
				$facility_name = $this -> session -> userdata('full_name');
	   			$facility_code=$this -> session -> userdata('facility_id');;

	   			//pick the phone numbers for that facility
	   			$data = Users::getUsers($facility_code)->toArray();

				//get facility phone numbers
				//$facility_phone = $this -> get_facility_phone_numbers($facility_code);
					$facility_phone = "254723722204+254720167245+254726416795";
				//facility message
				$facility_message = "Dear $facility_name user, \n a stock update has been done in your facility Store.\n Log in to health-cmp.or.ke to follow up. HCMP";
				//url encode the message
				$message = urlencode($facility_message);

				//clean the phone numbers
				$phone_numbers = explode("+", $facility_phone);
				//send the message here
				foreach ($phone_numbers as $key => $user_no)
				{
					file("http://41.57.109.242:13000/cgi-bin/sendsms?username=clinton&password=ch41sms&to=$user_no&text=$message");
					//echo "Sent to ".$user_no;

				}
				/*End the facility Section of the functions*/

				/*Start the Sub County Section of the Message*/
				//pick the user data
				$user_data = Users::get_scp_details($data[0]['district']);

				//loop through the each of the numbers of the users
				foreach ($user_data as $data) :
					//pick the name
					$name_sub_county = $data['fname'] . " " . $data['lname'];
					//message to be sent out to the sub county guys
					$message = "Dear $name_sub_county user,\n $facility_name has updated its stock in the facility Store.\n Log in to health-cmp.or.ke to follow up on the issue.\n HCMP";
					$message = urlencode($message);

					$user_no = $data['telephone'];
					file("http://41.57.109.242:13000/cgi-bin/sendsms?username=clinton&password=ch41sms&to=$user_no&text=$message");
				endforeach;
				break;


			endswitch;



		}

	public function send_offline_report() {
		// I'll leave this here for now
		$facilities_not_synced = Facilities::get_facilities_not_synced();
		// echo "<pre>"; print_r($facilities_not_synced); exit;
		$scp_emails = array("arnoldkyaye@gmail.com");
		// $scp_details_all = array();
		// for($i = 0; $i < count($facilities_not_synced); $i++) {
		// 	$scp_details_all = Users::get_scp_details($facilities_not_synced[$i]['district_id']);
		// 	//echo "<pre>"; print_r($facilities_not_synced[$i]);
		// 	// $scp_emails = array_push($scp_details, Users::get_scp_details($facilities_not_synced[$i]['district_id']);
		// }
		$excel_data = array('doc_creator' => 'HCMP-Kenya', 'doc_title' => 'HCMP_Facilities_Not_Synchronized', 'file_name' => 'Facilities_Not_Synchronized');
		$column_data = array("District Name", "Facility Name", "MFL", "Days From Last Synchronization");
		$excel_data['column_data'] = $column_data;
		$row_data = array();
		foreach($facilities_not_synced as $facilities_not_synced) {
			array_push($row_data, array($facilities_not_synced['district_name'], $facilities_not_synced['facility_name'],$facilities_not_synced['facility_code'],$facilities_not_synced['days_from_last_sync']));
		}
		$excel_data['row_data'] = $row_data;
		$excel_data['report_type'] = 'Email Attachment';
		$file = $this-> hcmp_functions ->create_new_excel($excel_data);

		$message ='';	
		$message.="<style> table {
			border-collapse: collapse; 
		}td,th{
			padding: 12px;
			text-align:center;
		}

		*{margin:0;padding:0}*{font-family:'Helvetica Neue',Helvetica,Helvetica,Arial,sans-serif}img{max-width:100%}.collapse{padding:0}body{-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;width:100%!important;height:100%}a{color:#2BA6CB}.btn{text-decoration:none;color:#FFF;background-color:#666;padding:10px 16px;font-weight:700;margin-right:10px;text-align:center;cursor:pointer;display:inline-block}p.callout{padding:15px;background-color:#ECF8FF;margin-bottom:15px}.callout a{font-weight:700;color:#2BA6CB}table.social{background-color:#ebebeb}.social .soc-btn{padding:3px 7px;font-size:12px;margin-bottom:10px;text-decoration:none;color:#FFF;font-weight:700;display:block;text-align:center}a.fb{background-color:#3B5998!important}a.tw{background-color:#1daced!important}a.gp{background-color:#DB4A39!important}a.ms{background-color:#000!important}.sidebar .soc-btn{display:block;width:100%}table.head-wrap{width:100%}.header.container table td.logo{padding:15px}.header.container table td.label{padding:15px 15px 15px 0}table.body-wrap{width:100%}table.footer-wrap{width:100%;clear:both!important}.footer-wrap .container td.content p{border-top:1px solid #d7d7d7;padding-top:15px;font-size:9px;font-weight:500}h1,h2,h3,h4,h5,h6{font-family:HelveticaNeue-Light,'Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;line-height:1.1;margin-bottom:15px;color:#000}h1 small,h2 small,h3 small,h4 small,h5 small,h6 small{font-size:60%;color:#6f6f6f;line-height:0;text-transform:none}h1{font-weight:200;font-size:44px}h2{font-weight:200;font-size:37px}h3{font-weight:500;font-size:27px}h4{font-weight:500;font-size:23px}h5{font-weight:900;font-size:17px}h6{font-weight:900;font-size:14px;text-transform:uppercase;color:#444}.collapse{margin:0!important}p,ul{margin-bottom:10px;font-weight:400;font-size:14px;line-height:1.6}p.lead{font-size:17px}p.last{margin-bottom:0}ul li{margin-left:5px;list-style-position:inside}ul.sidebar{background:#ebebeb;display:block;list-style-type:none}ul.sidebar li{display:block;margin:0}ul.sidebar li a{text-decoration:none;color:#666;padding:10px 16px;cursor:pointer;border-bottom:1px solid #777;border-top:1px solid #FFF;display:block;margin:0}ul.sidebar li a.last{border-bottom-width:0}ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p{margin-bottom:0!important}.container{display:block!important;max-width:100%!important;margin:0 auto!important;clear:both!important}.content{padding:15px;max-width:80%px;margin:0 auto;display:block}.content table{width:100%}.column{width:300px;float:left}.column tr td{padding:15px}.column-wrap{padding:0!important;margin:0 auto;max-width:600px!important}.column table{width:100%}.social .column{width:280px;min-width:279px;float:left}.clear{display:block;clear:both}@media only screen and (max-width:600px){a[class=btn]{display:block!important;margin-bottom:10px!important;background-image:none!important;margin-right:0!important}div[class=column]{width:auto!important;float:none!important}table.social div[class=column]{width:auto!important}}</style>";
		$message .='
		<tr>
			<td colspan="12">
			</tr>
		</tbody>
			</table>'; 
		$message.="<!-- BODY -->
		<table class='body-wrap'>
			<tr>
				<td></td>
				<td class='container' bgcolor='#FFFFFF'>

					<div class='content'>
						<table>
							<tr>
								<td>

									<p class='lead'>Find attached a summary of Facility Not Synchronized for more than 30 days</p>
									<table class='social' width='100%'>
										<tr>
											<td>

												<!-- column 1 -->
												<table align='left' class='column'>

												</table><!-- /column 1 -->	

												<!-- column 2 -->
												<table align='left' class='column'>
													<tr>

													</tr>
												</table><!-- /column 2 -->

												<span class='clear'></span>	

											</td>
										</tr>
									</table><!-- /social & contact -->
								</td>
							</tr>
						</table>
					</div><!-- /content -->

				</td>
				<td></td>
			</tr>
		</table><!-- /BODY -->";
		$handler = "./print_docs/excel/excel_files/" . $excel_data['file_name'] . ".xls";	
		$subject = "Facilities Not Synchronized";
		// echo "<pre>"; var_dump($scp_emails); var_dump($message); var_dump($subject); var_dump($handler); exit;
		$status = $this -> hcmp_functions -> send_email($scp_emails, $message, $subject, $handler);
	}

	public function send_stock_update_sms() {
		$facility_name = $this -> session -> userdata('full_name');
		$facility_code = $this -> session -> userdata('facility_id');
		$data = Users::getUsers($facility_code) -> toArray();

		$message = "Stock level for " . $facility_name . " have been updated. HCMP";

		$phone = $this -> get_facility_phone_numbers($facility_code);
		$phone .= $this -> get_ddp_phone_numbers($data[0]['district']);

		$spam_sms = '254723722204+254720167245+254726416795' . $phone;

		$phone_numbers = explode("+", $spam_sms);

		foreach ($phone_numbers as $key => $user_no) {
			file("http://41.57.109.242:13000/cgi-bin/sendsms?username=clinton&password=ch41sms&to=$user_no&text=$message");
		}

	}

	public function send_stock_donate_sms() {

		$facility_name = $this -> session -> userdata('full_name');
		$facility_code = $this -> session -> userdata('facility_id');
		$data = Users::getUsers($facility_code) -> toArray();
		$phone = $this -> get_facility_phone_numbers($facility_code);
		$phone .= $this -> get_ddp_phone_numbers($data[0]['district']);
		$message = $facility_name . " have been donated commodities. HCMP";

		$spam_sms = '254723722204+254720167245+254726416795' . $phone;

		$phone_numbers = explode("+", $spam_sms);

		foreach ($phone_numbers as $key => $user_no) {
			file("http://41.57.109.242:13000/cgi-bin/sendsms?username=clinton&password=ch41sms&to=$user_no&text=$message");
		}

		//$this -> send_sms(substr($phone, 0, -1), $message);

	}

	public function send_order_sms() {

		$facility_name = $this -> session -> userdata('full_name');
		$facility_code = $this -> session -> userdata('facility_id'); ;
		$data = Users::getUsers($facility_code) -> toArray();

		$message = $facility_name . " has submitted an order. HCMP";

		$phone = $this -> get_facility_phone_numbers($facility_code);
		$phone .= $this -> get_ddp_phone_numbers($data[0]['district']);

		$spam_sms = '254723722204+254720167245+254726416795' . $phone;

		$phone_numbers = explode("+", $spam_sms);

		foreach ($phone_numbers as $key => $user_no) {
			file("http://41.57.109.242:13000/cgi-bin/sendsms?username=clinton&password=ch41sms&to=$user_no&text=$message");
			//echo "Success sent to ".$user_no.'<br>';
		}

		//$this -> send_sms(substr($phone, 0, -1), $message);

	}

	public function send_order_approval_sms($facility_code, $status) {

		$message = ($status == 1) ? $facility_name . " order has been rejected. HCMP" : $facility_name . " order has been approved. HCMP";

		$data = Users::getUsers($facility_code) -> toArray();
		$phone = $this -> get_facility_phone_numbers($facility_code);
		$phone .= $this -> get_ddp_phone_numbers($data[0]['district']);

		$spam_sms = '254723722204+254720167245+254726416795' . $phone;

		$phone_numbers = explode("+", $spam_sms);

		foreach ($phone_numbers as $key => $user_no) {
			file("http://41.57.109.242:13000/cgi-bin/sendsms?username=clinton&password=ch41sms&to=$user_no&text=$message");
			//echo "Success sent to ".$user_no.'<br>';
		}

		//$this -> send_sms(substr($phone, 0, -1), $message);

	}

	public function get_facility_phone_numbers($facility_code) {
		$data = Users::get_user_info($facility_code);
		$phone = "";
		foreach ($data as $info) {

			$telephone = preg_replace('(^0+)', "254", $info -> telephone);

			$phone .= $telephone . '+';
		}
		return $phone;
	}

	public function get_facility_email($facility_code) {
		$data = Users::get_user_info($facility_code);
		$user_email = "";
		foreach ($data as $info) {

			$user_email .= $info -> email . ',';

		}
		$facility_code == '' ? exit : null;
		return $user_email;
	}

	public function get_ddp_phone_numbers($district_id) {
		$data = Users::get_dpp_details($district_id);
		$phone = "";

		foreach ($data as $info) {
			$telephone = preg_replace('(^0+)', "254", $info -> telephone);
			$phone .= $telephone . '+';
		}
		return $phone;
	}

	public function get_ddp_email($district_id) {
		$data = Users::get_dpp_details($district_id);
		$user_email = "";
		foreach ($data as $info) {

			$user_email .= $info -> email . ',';
		}
		$district_id == '' ? exit : null;
		return $user_email;
	}

	public function get_county_email($county_id) {
		!isset($county_id) ? exit : null;
		// added function on user
		$county = Districts::get_county_id($county_id);
		$county_email = Users::get_county_details($county[0]['county']);
		if ($this -> test_mode)
			return null;
		//check to ensure the demo site wount start looking for county admin
		if ($county[0]['county'] == 1) {
			return 'kelvinmwas@gmail.com,';
		} else {
			if (count($county_email) > 0) {
				return $county_email[0]['email'] . ',';
			} else {

				return "";
			}

		}

	}

	public function send_stock_decommission_email($message, $subject, $attach_file) {

		$facility_code = $this -> session -> userdata('facility_id');
		$data = Users::getUsers($facility_code) -> toArray();

		$email_address = $this -> get_facility_email($facility_code);

		$email_address .= $this -> get_ddp_email($data[0]['district']);

		$email_address .= $this -> get_county_email($data[0]['district']);
		$bcc_email = 'kelvinmwas@gmail.com,smutheu@clintonhealthaccess.org,collinsojenge@gmail.com,tngugi@clintonhealthaccess.org,
		bwariari@clintonhealthaccess.org,
		amwaura@clintonhealthaccess.org,
		eongute@clintonhealthaccess.org,
		rkihoto@clintonhealthaccess.org';

		$this -> send_email(substr($email_address, 0, -1), $message, $subject, $attach_file, $bcc_email);

	}

	public function send_order_submission_email($message, $subject, $attach_file) {

		$facility_code = $this -> session -> userdata('facility_id');
		$data = Users::getUsers($facility_code) -> toArray();
		$email_address = $this -> get_facility_email($facility_code);

		$email_address .= $this -> get_ddp_email($data[0]['district']);
		$cc_email = ($this -> test_mode) ? 'kelvinmwas@gmail.com, collinsojenge@gmail.com,smutheu@clintonhealthaccess.org' : $this -> get_county_email($data[0]['district']);
		return $this -> send_email(substr($email_address, 0, -1), $message, $subject, $attach_file, null, substr($cc_email, 0, -1));

	}

	public function send_order_approval_email($message, $subject, $attach_file, $facility_code, $reject_order = null) {
		//set cc email as blank
		$cc_email = "";
		$bcc_email = "karsanrichard@gmail.com";
		/*
		$bcc_email = 'kelvinmwas@gmail.com,smutheu@clintonhealthaccess.org,collinsojenge@gmail.com,tngugi@clintonhealthaccess.org,
		bwariari@clintonhealthaccess.org,
		amwaura@clintonhealthaccess.org,
		eongute@clintonhealthaccess.org,
		rkihoto@clintonhealthaccess.org';
		*/
		$data = facilities::get_facility_name_($facility_code) -> toArray();
		$data = $data[0];

		if ($reject_order == "Rejected" || $reject_order == "Updated") :
			$email_address = $this -> get_facility_email($facility_code);
			$cc_email .= $this -> get_ddp_email($data['district']);
		else :

			$email_address = 'shamim.kuppuswamy@kemsa.co.ke,
				jmunyu@kemsa.co.ke,
				imugada@kemsa.co.ke,
				laban.okune@kemsa.co.ke,
				samuel.wataku@kemsa.co.ke,';

			$cc_email .= $this -> get_ddp_email($data['district']);
			$cc_email .= $this -> get_facility_email($facility_code);
			$cc_email .= $this -> get_county_email($data['district']);


		endif;
		return $this -> send_email(substr($email_address, 0, -1), $message, $subject, $attach_file, $bcc_email, substr($cc_email, 0, -1));

	}

	public function send_order_delivery_email($message, $subject, $attach_file = null) {
		$cc_email = '';
		$bcc_email = 'kelvinmwas@gmail.com,smutheu@clintonhealthaccess.org,collinsojenge@gmail.com,tngugi@clintonhealthaccess.org';
		$facility_code = $this -> session -> userdata('facility_id');
		$data = Users::getUsers($facility_code) -> toArray();
		$cc_email .= $this -> get_facility_email($facility_code);
		$cc_email .= $this -> get_county_email($data[0]['district']);

		return $this -> send_email(substr($this -> get_ddp_email($data[0]['district']), 0, -1), $message, $subject, null, $bcc_email, substr($cc_email, 0, -1));

	}

	public function send_sms($phones, $message) {

		$message = urlencode($message);
		//$spam_sms='254726534272+254720167245';
		$spam_sms = '254720167245+254726534272+254726416795+254725227833+' . $phones;
		$phone_numbers = explode("+", $spam_sms);
		//  $spam_sms='254726534272';
		# code...

		//foreach($phone_numbers as $key=>$user_no):
		//  break;
		//file("http://41.57.109.242:13000/cgi-bin/sendsms?username=clinton&password=ch41sms&to=$user_no&text=$message");

		//endforeach;

	}

	/*****************************************Email function for HCMP, all the deafult email addresses and email content have been set ***************/

public function send_email($email_address,$message,$subject,$attach_file=NULL,$bcc_email=NULL,$cc_email=NULL,$full_name=NULL)
{
	$logo=base_url().'assets/img/coat_of_arms-resized1.png';
	$html_body ='';	
			$html_body.='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>HCMP Email</title>
    <style type="text/css" media="screen">
/* Force Hotmail to display emails at full width */
.ExternalClass{display:block!important;width:100%}.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{line-height:100%}body,p,h1,h2,h3,h4,h5,h6{margin:0;padding:0}body,p,td{font-family:Arial,Helvetica,sans-serif;font-size:15px;color:#333;line-height:1.5em}h1{font-size:24px;font-weight:400;line-height:24px}body,p{margin-bottom:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none}img{outline:none;text-decoration:none;-ms-interpolation-mode:bicubic}a img{border:none}.background{background-color:#333}table.background{margin:0;padding:0;width:100%!important}.block-img{display:block;line-height:0}a{color:#fff;text-decoration:none}a,a:link{color:#2A5DB0;text-decoration:underline}table td{border-collapse:collapse}td{vertical-align:top;text-align:left}.wrap{width:600px}.wrap-cell{padding-top:30px;padding-bottom:30px}.header-cell,.body-cell,.footer-cell{padding-left:20px;padding-right:20px}.header-cell{background-color:#eee;font-size:24px;color:#fff}.body-cell{background-color:#fff;padding-top:30px;padding-bottom:34px}.footer-cell{background-color:#eee;text-align:center;font-size:13px;padding-top:30px;padding-bottom:30px}.card{width:400px;margin:0 auto}.data-heading{text-align:right;padding:10px;background-color:#fff;font-weight:700}.data-value{text-align:left;padding:10px;background-color:#fff}.force-full-width{width:100%!important}</style>
<style type="text/css" media="only screen and (max-width: 600px)">
@media only screen and (max-width: 600px){bodyclass:background],table[class*=background],td[class*=background] {;background:#eee!important}table[class="card"]{width:auto!important}td[class="data-heading"],td[class="data-value"]{display:block!important}td[class="data-heading"]{text-align:left!important;padding:10px 10px 0}table[class="wrap"]{width:100%!important}td[class="wrap-cell"]{padding-top:0!important;padding-bottom:0!important}</style>'
  ;	
  $html_body.='</head>

<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" bgcolor="" class="background">
  <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" class="background">
    <tr>
      <td align="center" valign="top" width="100%" class="background">
        <center>
          <table cellpadding="0" cellspacing="0" width="600" class="wrap">
            <tr>
              <td valign="top" class="wrap-cell" style="padding-top:30px; padding-bottom:30px;">
                <table cellpadding="0" cellspacing="0" class="force-full-width">
                                    </tr>
                  <tr>
                    <td valign="top" class="body-cell">

                      <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffffff">
                        <tr>
                        
                        </tr>
                        <tr>
                          <td valign="top" style="padding-bottom:20px; background-color:#ffffff;">
                             <b>Hello ' .  $full_name . ',</b><br>
                            '.$message.'
                            </td>
                        </tr>
                        <tr>
                          <td>
                            <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff">
                              <tr>
                                <td style="width:200px;background:#008000;">
                                  <div><!--[if mso]>
                                    <v:rect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="#" style="height:40px;v-text-anchor:middle;width:200px;" stroke="f" fillcolor="#008000">
                                      <w:anchorlock/>
                                      <center>
                                    <![endif]-->
                                        <a href="http://health-cmp.or.ke"
                                  style="background-color:#008000;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:18px;line-height:40px;text-align:center;text-decoration:none;width:200px;-webkit-text-size-adjust:none;">Log in here.</a>
                                    <!--[if mso]>
                                      </center>
                                    </v:rect>
                                  <![endif]--></div>
                                </td>
                                <td width="360" style="background-color:#ffffff; font-size:0; line-height:0;">&nbsp;</td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td style="padding-top:20px;background-color:#ffffff;">
                            Regards,<br>
                            HCMP Team.
                            
                            <center>
							<h5>Contact Info:</h5>
                            <p>Email: <a href="mailto:hcmptech@googlegroups.com">hcmptech@googlegroups.com</a> , <a href="mailto:hcmphelpdesk@googlegroups.com">hcmphelpdesk@googlegroups.com</a></p>
                              </center>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td valign="top" class="footer-cell">
                      Health Commodities Management Platform <br>
                      G.O.K  '.date("Y").'  All Rights Reserved
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </center>
      </td>
    </tr>
  </table>

</body>
</html>';

	
	//echo $email_address.'</br>'.$cc_email.'</br>'.$bcc_email;exit;
	// echo "<pre>"; var_dump($email_address); exit;	
	$messages=$message;
	$config['protocol']    = 'smtp';
    $config['smtp_host']    = 'ssl://smtp.gmail.com';
    $config['smtp_port']    = '465';
    $config['smtp_timeout'] = '7';
    $config['smtp_user']    = 'hcmp.kenya@gmail.com';
   	$config['smtp_pass']    = 'healthkenya2016@#';//healthkenya //hcmpkenya@gmail.com
 	$config['charset']    = 'utf-8';
    $config['newline']    = "\r\n";
    $config['mailtype'] = 'html'; // or html
    $config['validation'] = TRUE; // bool whether to validate email or not  
	$this->load->library('email', $config);
    
//echo $html_body;exit;
		$from = 'hcmp.kenya@gmail.com';

        $this->email->initialize($config);
		
  		$this->email->set_newline("\r\n");
  		$this->email->from($from, "Health Commodities Management Platform"); // change it to yours
  		$this->email->to($email_address); // change it to yours
  		//echo $bcc_email;
  		// exit;
  		isset($cc_email)? $this->email->cc($cc_email): null;
  		isset($bcc_email)?$this->email->bcc($bcc_email):null;
  		
		if (isset($attach_file)): 
		$files=explode("(more)", $attach_file.'(more)');
		$items=count($files)-1;
		foreach($files as $key=>$files){
		if($key!=$items){
		$this->email->attach($files);
		}	
		}

		endif;
			
  		$this->email->subject($subject);
 		$this->email->message($html_body);
 
  if($this->email->send())
 {
 	$this->email->clear(TRUE);

	unlink($attach_file);
	return TRUE;

 }
 else
{
//echo $this->email->print_debugger(); 
$this -> load -> view('shared_files/404');
exit;

 
}

}

//*** new create excel based on the new HCMP Template **//

public function create_new_excel($excel_data=NULL){
	ob_end_clean();
	$alphabet = array('B','C','D','E','F','G','H','I','J','K','L','M','N','O');	
	$inputFileName = 'print_docs/excel/excel_template/Excel_downloads.xls';
	// echo "$inputFileName";die;
	// $inputFileName = 'print_docs/excel/excel_template/Excel_downloads.xlsx';
	$file_name =isset($excel_data['file_name']) ? $excel_data['file_name'].'.xls' : time().'.xls';	
	// $file_name =isset($excel_data['file_name']) ? $excel_data['file_name'].'.xlsx' : time().'.xlsx';	
	$excel2 = PHPExcel_IOFactory::createReader('Excel5');
	// $excel2 = PHPExcel_IOFactory::createReader('Excel2007');
    $excel2=$objPHPExcel= $excel2->load($inputFileName); // Empty Sheet    
    $sheet = $objPHPExcel->getSheet(0); 
    $highestRow = $sheet->getHighestRow(); 	
    $highestColumn = $sheet->getHighestColumn();	
    $excel2->setActiveSheetIndex(0);	    
	// echo "<pre>";print_r($excel_data);die;
	if (count($excel_data) > 0) :		
		$count_columns = count($excel_data['column_data']);
		$count_rows = count($excel_data['row_data']);
		$title = strtoupper($excel_data['file_name']);
		$new_columns = array();
		$row_top = 7;
		$excel2->getActiveSheet()->setCellValue('B5',$title);
		for ($i=0; $i <$count_columns ; $i++) { 
			$column = $alphabet[$i];
			$row_value = $column.$row_top;
			$row_value = (string)$row_value;				
			$excel2->getActiveSheet()->setCellValue($row_value,$excel_data['column_data'][$i]);
		}
		$row_val_body = 8;
		for ($i=0; $i <$count_rows ; $i++) { 
			for ($j=0; $j <count($excel_data['row_data'][$i]); $j++) { 
				$value = $excel_data['row_data'][$i][$j];				
				$column = $alphabet[$j];
				$row_value = $column.$row_val_body;
				$row_value = (string)$row_value;	
				$excel2->getActiveSheet()->setCellValue($row_value,$excel_data['row_data'][$i][$j]);			
			}	
			$row_val_body++;	
			
		}
	endif;
	
	ob_clean();
	$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel5');
	// $objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
	if (isset($excel_data['report_type'])) {
		$objWriter -> save("./print_docs/excel/excel_files/" . $excel_data['file_name'] . '.xls');
	} else {
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	    header("Cache-Control: no-store, no-cache, must-revalidate");
	    header("Cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
	    header('Content-Type: application/vnd.ms-excel');
		// It will be called file.xls
		header("Content-Disposition: attachment; filename=$file_name");
		// Write file to the browser
	    $objWriter -> save('php://output');
	  	$objPHPExcel -> disconnectWorksheets();
	  	unset($objPHPExcel);
		echo "<pre>";
		print_r($excel_data);die;
	}
}
	/**************************************** creating excel sheet for the system *************************/
	public function create_excel($excel_data = NUll) {

		//check if the excel data has been set if not exit the excel generation
		ob_end_clean();
		if (count($excel_data) > 0) :

			$objPHPExcel = new PHPExcel();
			$objPHPExcel -> getProperties() -> setCreator("HCMP");
			$objPHPExcel -> getProperties() -> setLastModifiedBy($excel_data['doc_creator']);
			$objPHPExcel -> getProperties() -> setTitle($excel_data['doc_title']);
			$objPHPExcel -> getProperties() -> setSubject($excel_data['doc_title']);
			$objPHPExcel -> getProperties() -> setDescription("");

			$objPHPExcel -> setActiveSheetIndex(0);

			$rowExec = 1;

			//Looping through the cells
			$column = 0;

			foreach ($excel_data['column_data'] as $column_data) {
				$objPHPExcel -> getActiveSheet() -> setCellValueByColumnAndRow($column, $rowExec, $column_data);
				$objPHPExcel -> getActiveSheet() -> getColumnDimension(PHPExcel_Cell::stringFromColumnIndex($column)) -> setAutoSize(true);
				//$objPHPExcel->getActiveSheet()->getStyle($column, $rowExec)->getFont()->setBold(true);
				$objPHPExcel -> getActiveSheet() -> getStyleByColumnAndRow($column, $rowExec) -> getFont() -> setBold(true);
				$column++;
			}
			$rowExec = 2;

			foreach ($excel_data['row_data'] as $row_data) {
				$column = 0;
				foreach ($row_data as $cell) {
					//Looping through the cells per facility
					$objPHPExcel -> getActiveSheet() -> setCellValueByColumnAndRow($column, $rowExec, $cell);

					$column++;
				}
				$rowExec++;
			}

			$objPHPExcel -> getActiveSheet() -> setTitle('Simple');

			// Save Excel 2007 file
			//echo date('H:i:s') . " Write to Excel2007 format\n";
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

			// We'll be outputting an excel file
			if (isset($excel_data['report_type'])) {

				$objWriter -> save("./print_docs/excel/excel_files/" . $excel_data['file_name'] . '.xls');
			} else {

				// We'll be outputting an excel file
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
				header("Cache-Control: no-store, no-cache, must-revalidate");
				header("Cache-Control: post-check=0, pre-check=0", false);
				header("Pragma: no-cache");
				// It will be called file.xls
				header("Content-Disposition: attachment; filename=" . $excel_data['file_name'] . '.xls');
				// Write file to the browser
				$objWriter -> save('php://output');
				$objPHPExcel -> disconnectWorksheets();
				unset($objPHPExcel);
			}

		endif;
	}

	public function clone_excel_order_template($order_id,$report_type,$file_name=null){
 	$user_indicator = $this -> session -> userdata('user_indicator');
	if ($user_indicator=='county') {
					 $col='cty_qty';
					
				}else if ($user_indicator=='district'){
					 $col='scp_qty';
					
					
				}else{
					 $col='quantity_ordered_pack';
					
					
				}
				
    $inputFileName = 'print_docs/excel/excel_template/KEMSA Customer Order Form.xls';
    $facility_details = facility_orders::get_facility_order_details($order_id);
	if(count($facility_details)==1):
	$facility_stock_data_item = facility_order_details::get_order_details($order_id);
   // echo "<pre>";print_r($facility_stock_data_item);echo "<pre>";exit;
    $file_name =isset($file_name) ? $file_name.'.xls' : time().'.xls';
	
	$excel2 = PHPExcel_IOFactory::createReader('Excel5');
    $excel2=$objPHPExcel= $excel2->load($inputFileName); // Empty Sheet
    
    $sheet = $objPHPExcel->getSheet(0); 
    $highestRow = $sheet->getHighestRow(); 
	
    $highestColumn = $sheet->getHighestColumn();
	
    $excel2->setActiveSheetIndex(0);
	
    $excel2->getActiveSheet()
    ->setCellValue('H4', $facility_details[0]['facility_code'])
    ->setCellValue('H5', $facility_details[0]['facility_name'])
    ->setCellValue('H6', '')       
    ->setCellValue('H7', $facility_details[0]['county'])
	->setCellValue('H8', $facility_details[0]['order_date']);
   //  Loop through each row of the worksheet in turn
for ($row = 17; $row <= $highestRow; $row++){ 
    //  Read a row of data into an array
    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,NULL,TRUE,FALSE);							  
   if(isset($rowData[0][2]) && $rowData[0][2]!=''){
   	foreach($facility_stock_data_item as $facility_stock_data_item_){
   		
   	if(in_array($rowData[0][2], $facility_stock_data_item_) ){
   	$key = array_search($rowData[0][2], $facility_stock_data_item_);
		//echo "<pre>";print_r($facility_stock_data_item_);echo "<pre>";
	$excel2->getActiveSheet()->setCellValue("H$row", $facility_stock_data_item_["$col"]);	
   	}	
   	} 	
   }
}

   $objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel5');
   if($report_type=='download_file'){
   	// We'll be outputting an excel file
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
		// It will be called file.xls
		header("Content-Disposition: attachment; filename=$file_name");
		// Write file to the browser
        $objWriter -> save('php://output');
       $objPHPExcel -> disconnectWorksheets();
       unset($objPHPExcel);
   } elseif($report_type=='save_file'){
   	 $objWriter->save("./print_docs/excel/excel_files/".$file_name);
   }
   endif;

 }
 public function clone_redistribution_template($file_name=null){
 				
    $inputFileName = 'print_docs/excel/excel_template/Facility_redistributions.xlsx';
    $commodities = commodities::get_all();    
	
    $excel2 = PHPExcel_IOFactory::createReader('Excel2007');
	$excel2 = $excel2->load($inputFileName); // Empty Sheet
	$excel2->setActiveSheetIndex(1);

    $count = 1;
    foreach ($commodities as $key => $value) {
    	$count++;
    	$row = 'A'.$count;
    	$commodity = $value['commodity_name'];    	
    	$excel2->getActiveSheet()->setCellValue($row,$commodity);
    }
	$file_name =isset($file_name) ? $file_name: time().'.xlsx';
	$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');

	$excel2->setActiveSheetIndex(0);


	for ($i=12; $i < 2000 ; $i++) { 
		$cell = 'B'.$i;
		// Set data validation
		$objValidation = $excel2->getActiveSheet()->getCell($cell)->getDataValidation();
		$objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );
		$objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
		$objValidation->setAllowBlank(false);
		$objValidation->setShowInputMessage(true);
		$objValidation->setShowErrorMessage(true);
		$objValidation->setShowDropDown(true);
		$objValidation->setErrorTitle('Input error');
		$objValidation->setError('Commodity is not In the List');
		$objValidation->setPromptTitle('Pick from list');
		$objValidation->setPrompt('Please pick a Commodity from the drop-down list');
		$objValidation->setFormula1('\'Commodities\'!$A$2:$A$5000'); 		
	}	
	
	ob_end_clean();
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");	
	header("Content-Disposition: attachment; filename=$file_name");	
	$objWriter -> save('php://output');
	$excel2 -> disconnectWorksheets();
	unset($excel2);   
  
 }
 public function clone_reports_template($file_name=null,$data){
 				
    $inputFileName = 'print_docs/excel/excel_template/Reports_template.xlsx';
    $commodities = commodities::get_all();    
	
    $excel2 = PHPExcel_IOFactory::createReader('Excel2007');
	$excel2 = $excel2->load($inputFileName); // Empty Sheet
	$excel2->setActiveSheetIndex(1);

    $count = 1;
    foreach ($commodities as $key => $value) {
    	$count++;
    	$row = 'A'.$count;
    	$commodity = $value['commodity_name'];    	
    	$excel2->getActiveSheet()->setCellValue($row,$commodity);
    }
	$file_name =isset($file_name) ? $file_name: time().'.xlsx';
	$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');

	$excel2->setActiveSheetIndex(0);


	for ($i=12; $i < 2000 ; $i++) { 
		$cell = 'B'.$i;
		// Set data validation
		$objValidation = $excel2->getActiveSheet()->getCell($cell)->getDataValidation();
		$objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );
		$objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
		$objValidation->setAllowBlank(false);
		$objValidation->setShowInputMessage(true);
		$objValidation->setShowErrorMessage(true);
		$objValidation->setShowDropDown(true);
		$objValidation->setErrorTitle('Input error');
		$objValidation->setError('Commodity is not In the List');
		$objValidation->setPromptTitle('Pick from list');
		$objValidation->setPrompt('Please pick a Commodity from the drop-down list');
		$objValidation->setFormula1('\'Commodities\'!$A$2:$A$5000'); 		
	}	
	
	ob_end_clean();
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");	
	header("Content-Disposition: attachment; filename=$file_name");	
	$objWriter -> save('php://output');
	$excel2 -> disconnectWorksheets();
	unset($excel2);   
  
 }

 //Upload the Redistribution Excel
 public function redistribution_excel_uploader($inputFileName){
 	if (isset($inputFileName)) :
 		$ext = pathinfo($_FILES["file"]['name'], PATHINFO_EXTENSION);
		if ($ext == 'xls') {
			$excel2 = PHPExcel_IOFactory::createReader('Excel5');
		} else if ($ext == 'xlsx') {
			$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		} else {
			die('Invalid file format given' . $_FILES['file']);
		}
		//exit;
		$excel2 = $objPHPExcel = $excel2 -> load($inputFileName);
		// Empty Sheet

		$sheet = $objPHPExcel -> getSheet(0);
		$highestRow = $sheet -> getHighestRow();

		$highestColumn = $sheet -> getHighestColumn();
		$temp = array();
		$facility_code = $sheet -> getCell('H4') -> getValue();
 	endif;
 }
	/*********KEMSA UPLOADER**********/
	public function kemsa_excel_order_uploader($inputFileName) {
		// $inputFileName = 'print_docs/excel/excel_template/KEMSA Customer Order Form.xlsx';
		if (isset($inputFileName)) :
			$item_details = Commodities::get_all_from_supllier(1);
			//$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
			//$excel2 = PHPExcel_IOFactory::createReader($inputFileType);
			$ext = pathinfo($_FILES["file"]['name'], PATHINFO_EXTENSION);
			if ($ext == 'xls') {
				$excel2 = PHPExcel_IOFactory::createReader('Excel5');
			} else if ($ext == 'xlsx') {
				$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
			} else {
				die('Invalid file format given' . $_FILES['file']);
			}
			//exit;
			$excel2 = $objPHPExcel = $excel2 -> load($inputFileName);
			// Empty Sheet

			$sheet = $objPHPExcel -> getSheet(0);
			$highestRow = $sheet -> getHighestRow();

			$highestColumn = $sheet -> getHighestColumn();
			$temp = array();
			$facility_code = $sheet -> getCell('H4') -> getValue();

			//  Loop through each row of the worksheet in turn
			for ($row = 1; $row <= $highestRow; $row++) {
				//  Read a row of data into an array
				$rowData = $sheet -> rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
				if (isset($rowData[0][2]) && $rowData[0][2] != 'Product Code') {
					foreach ($item_details as $key => $data) {
						if (in_array($rowData[0][2], $data)) {
							array_push($temp, array('sub_category_name' => $data['sub_category_name'], 'commodity_name' => $data['commodity_name'], 'unit_size' => $data['unit_size'], 'unit_cost' => $data['unit_cost'], 'commodity_code' => $data['commodity_code'], 'commodity_id' => $data['commodity_id'], 'total_commodity_units' => $data['total_commodity_units'], 'opening_balance' => 0, 'total_receipts' => 0, 'total_issues' => 0, 'quantity_ordered' => $rowData[0][7], 'comment' => '', 'closing_stock_' => 0, 'closing_stock' => 0, 'days_out_of_stock' => 0, 'date_added' => '', 'losses' => 0, 'status' => 0, 'adjustmentpve' => 0, 'adjustmentnve' => 0, 'historical' => 0));
							unset($item_details[$key]);
						}
					}
				}
			}
			unset($objPHPExcel);
			return ( array('row_data' => $temp, 'facility_code' => $facility_code));
		endif;
	}

	/*************/
	/* HCMP file downloader
	 /********/
	public function download_file($path) {
		ob_clean();
		$data = file_get_contents($path);
		// Read the file's contents
		force_download(basename($path), $data);
	}

	/*************/
	/* HCMP PDF creator
	 /********/

	public function create_pdf($pdf_data = NULL) {

		if (count($pdf_data) > 0) :

			$url = base_url() . 'assets/img/coat_of_arms.png';
			$html_title = "<div align=center><img src='$url' height='70' width='70'style='vertical-align: top;'> </img></div>
<div style='text-align:center; font-family: arial,helvetica,clean,sans-serif;display: block; font-weight: bold; font-size: 14px;'>$pdf_data[pdf_title]</div>
<div style='text-align:center; font-family: arial,helvetica,clean,sans-serif;display: block; font-weight: bold; font-size: 14px;'>
Ministry of Health</div>
<div style='text-align:center; font-family: arial,helvetica,clean,sans-serif;display: block; font-weight: bold;display: block; font-size: 13px;'>
Health Commodities Management Platform</div><hr/>";

			$table_style = '<style>table.data-table {border: 1px solid #DDD;margin: 10px auto;border-spacing: 0px;}
table.data-table th {border: none;color: #036;text-align: center;border: 1px solid #DDD;border-top: none;max-width: 450px;}
table.data-table td, table th {padding: 4px;}
table.data-table td {border: none;border-left: 1px solid #DDD;border-right: 1px solid #DDD;height: 30px;margin: 0px;border-bottom: 1px solid #DDD;}
</style>';
			$name = $this -> session -> userdata('full_name');
			$this -> mpdf = new mPDF('', 'A4-L', 0, '', 15, 15, 16, 16, 9, 9, '');
			$this -> mpdf -> ignore_invalid_utf8 = true;
			$this -> mpdf -> WriteHTML($html_title);
			$this -> mpdf -> defaultheaderline = 1;
			$this -> mpdf -> simpleTables = true;
			$this -> mpdf -> WriteHTML($table_style . $pdf_data['pdf_html_body']);
			$this -> mpdf -> SetFooter("{DATE D j M Y }|{PAGENO}/{nb}|Prepared by: $name, source HCMP");

			if ($pdf_data['pdf_view_option'] == 'save_file') :
				//change the pdf to a binary file then use codeigniter write function to write the file as pdf in a specific folder

				// $this->mpdf->Output(realpath($path).'arif.pdf','F');
				if (write_file('./pdf/' . $pdf_data['file_name'] . '.pdf', $this -> mpdf -> Output($pdf_data['file_name'], 'S'))) :
					return true;
				else :
					return false;
				endif;
			else :
				//show the pdf on the bowser let the user determine where to save it;
				$this -> mpdf -> Output($pdf_data['file_name'], 'I');
				exit ;
			endif;

		endif;
	}

	/****************************END************************/
	//// /////HCMP Create high chart graph
	public function create_high_chart_graph($graph_data=null)
  {
  	//$color
  	$high_chart='';
  	if(isset($graph_data)):
		$graph_id=$graph_data['graph_id'];
		$graph_title=$graph_data['graph_title'];
		$graph_type=$graph_data['graph_type'];
        $stacking=isset($graph_data['stacking']) ? $graph_data['stacking'] : null;
		$graph_categories=json_encode(array_map('utf8_encode',$graph_data['graph_categories'])); 
		//echo json_encode($graph_data['graph_categories']);
		$graph_yaxis_title=$graph_data['graph_yaxis_title'];
		if (isset($graph_data['color'])) {
			$color=$graph_data['color'];
		}else{
			$color="['#4572A7', '#AA4643', '#89A54E', '#80699B', '#3D96AE', '#DB843D', '#92A8CD', '#A47D7C', '#B5CA92']";
		} ;
		$graph_series_data=$graph_data['series_data'];
		$array_size=sizeof($graph_data['series_data'][key($graph_data['series_data'])]);			
		$height=$array_size<12? null :$array_size*30;
		$height=isset($height) ? ", height:$height" : null;
		//set up the graph here
		if($graph_type=="bar"){
		$data_=" series: {
                    stacking: '$stacking',
                    dataLabels: {
                        enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
                    }
                }";	
		}else{
			$data_="column: {
                    stacking: '$stacking',
                    dataLabels: {
                        enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
                    }
                }";	
		}
		$high_chart .="
		$('#$graph_id').highcharts({
		    chart: { zoomType:'x', type: '$graph_type' $height },
		    colors: $color,
            credits: { enabled:false},
            title: {text: '$graph_title'},
            yAxis: { min: 0, title: {text: '$graph_yaxis_title' }},
            subtitle: {text: 'Source: HCMP', x: -20 },
            xAxis: { categories: $graph_categories },
            tooltip: { crosshairs: [true,true] },
               scrollbar: {
               enabled: true
               },
               plotOptions: {
                 series: {
                 	 pointWidth: 18,
                 	 stacking: '$stacking',
                    dataLabels: {
                        enabled: false,
                        rotation: -45,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'black'
                    }
                }
            },
            series: [";			 
		    foreach($graph_series_data as $key=>$raw_data):
					$temp_array=array();
					$high_chart .="{ name: '$key', data:";					 
					  foreach($raw_data as $key_data):
						is_int($key_data)? $temp_array=array_merge($temp_array,array((int)$key_data)) :
						$temp_array=array_merge($temp_array,array($key_data));						
						endforeach;					
					  $high_chart .= json_encode($temp_array)."},";				  
				   endforeach;
	     $high_chart .="]  })";

	endif;

	 return $high_chart; 	
  }
	//// /////HCMP Create high chart graph
	public function create_high_chart_graph_multistep($graph_data = null) {
		$high_chart = '';
		if (isset($graph_data)) :
			$graph_id = $graph_data['graph_id'];
			$graph_title = $graph_data['graph_title'];
			$graph_type = $graph_data['graph_type'];
			$graph_categories = json_encode($graph_data['graph_categories']);
			//echo json_encode($graph_data['graph_categories']);
			$graph_yaxis_title = $graph_data['graph_yaxis_title'];
			$graph_series_data = $graph_data['series_data'];
			//$new_array=$graph_series_data;
			//return ($graph_series_data[0]); key
			//$size_of_graph=sizeof($graph_series_data[key($graph_series_data)])*200;
			//set up the graph here
			$high_chart .= "
		$('#$graph_id').highcharts({
		    chart: { zoomType:'x', type: '$graph_type'},
            credits: { enabled:false},
            title: {text: '$graph_title'},
            yAxis: { min: 0, title: {text: '$graph_yaxis_title' }},
            subtitle: {text: 'Source: HCMP', x: -20 },
            xAxis: { categories: $graph_categories },
            tooltip: { crosshairs: [true,true] },
            series: [";
			foreach ($graph_series_data as $key => $raw_data) :
				$temp_array = array();
				$high_chart .= "{ name: '$key', data:";
				foreach ($raw_data as $key_data) :
					$temp_array = array_merge($temp_array, array($key_data));
				endforeach;
				$high_chart .= "[]" . json_encode($temp_array) . "},";
			endforeach;
			$high_chart .= "]  })";

		endif;
		return $high_chart;
	}

	/****************************END************************/
	public function create_data_table($table_data = null) {
		$table_data_html = '';
		if (isset($table_data)) :
			$table_id = $table_data['table_id'];
			$table_header = $table_data['table_header'];
			$table_body = $table_data['table_body'];
			$table_data_html .= "<table width='100%' style='margin-top:1em;'  
		class='row-fluid table table-hover table-bordered table-update'  id='$table_id'>
	    <thead><tr>";
			foreach ($table_header as $key => $header_data) :
				foreach ($header_data as $header) :
					$table_data_html .= "<th>$header</th>";
				endforeach;
			endforeach;
			$table_data_html .= "</tr></thead><tbody>";
			foreach ($table_body as $key => $row) :
				$table_data_html .= "<tr>";
				foreach ($row as $body_data) :
					$table_data_html .= "<td>$body_data</td>";
				endforeach;
				$table_data_html .= "</tr>";
			endforeach;
			$table_data_html .= "</tbody></table>";
		endif;
		return $table_data_html;
	}

	/****************************END************************/
	public function create_order_delivery_color_coded_table($order_id) {
		// get the order and order details here
		$detail_list = facility_order_details::get_order_details($order_id, true);
		$dates = facility_orders::get_order_($order_id) -> toArray();
		$facility_name = Facilities::get_facility_name_($dates[0]['facility_code']) -> toArray();
		$facility_name = $facility_name[0]['facility_name'];
		//set up the details
		$table_body = "";
		$total_fill_rate = 0;
		$order_value = 0;
		//get the lead time
		$ts1 = strtotime(date($dates[0]["order_date"]));
		$ts2 = strtotime(date($dates[0]["deliver_date"]));
		$seconds_diff = $ts2 - $ts1;
		//strtotime($a_date) ? date('d M, Y', strtotime($a_date)) : "N/A";
		$date_diff = strtotime($dates[0]["deliver_date"]) ? floor($seconds_diff / 3600 / 24) : "N/A";
		$order_date = strtotime($dates[0]["order_date"]) ? date('D j M, Y', $ts1) : "N/A";
		$deliver_date = strtotime($dates[0]["deliver_date"]) ? date('D j M, Y', $ts2) : "N/A";
		$kemsa_order_no = $dates[0]['kemsa_order_id'];
		$order_total = number_format($dates[0]['order_total'], 2, '.', ',');
		$actual_order_total = number_format($date[0]['deliver_total'], 2, '.', ',');
		$tester = count($detail_list);
		if ($tester == 0) {
		} else {
			foreach ($detail_list as $rows) {
				//setting the values to display
				$received = $rows['quantity_recieved'];
				$price = $rows['unit_cost'];
				$ordered = $rows['quantity_ordered_unit'];
				$code = $rows['commodity_id'];
				$drug_name = $rows['commodity_name'];
				$kemsa_code = $rows['commodity_code'];
				$unit_size = $rows['unit_size'];
				$total_units = $rows['total_commodity_units'];
				$cat_name = $rows['sub_category_name'];
				$received = round(@$received / $total_units);
				$fill_rate = round(@($received / $ordered) * 100);
				$total = $price * $ordered;
				$total_ = $price * $received;
				$total_fill_rate = $total_fill_rate + $fill_rate;
				switch (true) {
					case $fill_rate==0 :
						$table_body .= "<tr style='background-color: #FBBBB9;'>";
						$table_body .= "<td>$cat_name</td>";
						$table_body .= '<td>' . $drug_name . '</td><td>' . $kemsa_code . '</td>' . '<td>' . $unit_size . '</td>';
						$table_body .= '<td>' . $price . '</td>';
						$table_body .= '<td>' . $ordered . '</td>';
						$table_body .= '<td>' . number_format($total, 2, '.', ',') . '</td>';
						$table_body .= '<td>' . $received . '</td>';
						$table_body .= '<td>' . number_format($total_, 2, '.', ',') . '</td>';
						$table_body .= '<td>' . $fill_rate . '% ' . '</td>';
						$table_body .= '</tr>';
						break;
					case $fill_rate<=60 :
						$table_body .= "<tr style=' background-color: #FAF8CC;'>";
						$table_body .= "<td>$cat_name</td>";
						$table_body .= '<td>' . $drug_name . '</td><td>' . $kemsa_code . '</td>' . '<td>' . $unit_size . '</td>';
						$table_body .= '<td>' . $price . '</td>';
						$table_body .= '<td>' . $ordered . '</td>';
						$table_body .= '<td>' . number_format($total, 2, '.', ',') . '</td>';
						$table_body .= '<td>' . $received . '</td>';
						$table_body .= '<td>' . number_format($total_, 2, '.', ',') . '</td>';
						$table_body .= '<td>' . $fill_rate . '% ' . '</td>';
						$table_body .= '</tr>';
						break;
					case $fill_rate>100.01 :
					case $fill_rate==100.01 :
						$table_body .= "<tr style='background-color: #ea1e17'>";
						$table_body .= "<td>$cat_name</td>";
						$table_body .= '<td>' . $drug_name . '</td><td>' . $kemsa_code . '</td>' . '<td>' . $unit_size . '</td>';
						$table_body .= '<td>' . $price . '</td>';
						$table_body .= '<td>' . $ordered . '</td>';
						$table_body .= '<td>' . number_format($total, 2, '.', ',') . '</td>';
						$table_body .= '<td>' . $received . '</td>';
						$table_body .= '<td>' . number_format($total_, 2, '.', ',') . '</td>';
						$table_body .= '<td>' . $fill_rate . '% ' . '</td>';
						$table_body .= '</tr>';
						break;
					case $fill_rate==100 :
						$table_body .= "<tr style=' background-color: #C3FDB8;'>";
						$table_body .= "<td>$cat_name</td>";
						$table_body .= '<td>' . $drug_name . '</td><td>' . $kemsa_code . '</td>' . '<td>' . $unit_size . '</td>';
						$table_body .= '<td>' . $price . '</td>';
						$table_body .= '<td>' . $ordered . '</td>';
						$table_body .= '<td>' . number_format($total, 2, '.', ',') . '</td>';
						$table_body .= '<td>' . $received . '</td>';
						$table_body .= '<td>' . number_format($total_, 2, '.', ',') . '</td>';
						$table_body .= '<td>' . $fill_rate . '% ' . '</td>';
						$table_body .= '</tr>';
						break;
					default :
						$table_body .= "<tr>";
						$table_body .= "<td>$cat_name</td>";
						$table_body .= '<td>' . $drug_name . '</td><td>' . $kemsa_code . '</td>' . '<td>' . $unit_size . '</td>';
						$table_body .= '<td>' . $price . '</td>';
						$table_body .= '<td>' . $ordered . '</td>';
						$table_body .= '<td>' . number_format($total, 2, '.', ',') . '</td>';
						$table_body .= '<td>' . $received . '</td>';
						$table_body .= '<td>' . number_format($total_, 2, '.', ',') . '</td>';
						$table_body .= '<td>' . $fill_rate . '% ' . '</td>';
						$table_body .= '</tr>';
						break;
				}
			}
			$order_value = round(($total_fill_rate / count($detail_list)), 0, PHP_ROUND_HALF_UP);
		}
		$message = <<<HTML_DATA
	<table>
			<tr>
		<th colspan='11'>
		<p>$facility_name</p>
		<p>Fill rate(Quantity Ordered/Quantity Received)</p>
         <p style="letter-spacing: 1px;font-weight: bold;text-shadow: 0 1px rgba(0, 0, 0, 0.1);">
Facility Order No $order_id| KEMSA Order No $kemsa_order_no | Total ordered value(ksh) $order_total | Total recieved order value(ksh) $actual_order_total |Date Ordered $order_date| Date Delivered $deliver_date| Order lead Time $date_diff; day(s)</p>
		</th>
		</tr>
		<tr>
		<th width="50px" style="background-color: #C3FDB8; "></th>
		<th>Full Delivery 100%</th>
		<th width="50px" style="background-color:#FFFFFF"></th>
		<th>Ok Delivery 60%-less than 100%</th>
		<th width="50px" style="background-color:#FAF8CC;"></th> 
		<th>Partial Delivery less than 60% </th>
		<th width="50px" style="background-color:#FBBBB9;"></th>
		<th>Problematic Delivery 0% </th>
		<th width="50px" style="background-color:#ea1e17;"></th>
		<th>Problematic Delivery over 100%</th>
		</tr></table> </br></n>
<table id="main1" width="100%" class="row-fluid table table-bordered">
	<thead>
		<tr>
		<th><strong>Category</strong></th>
		<th><strong>Description</strong></th>
		<th><strong>Commodity Code</strong></th>
		<th><strong>Unit Size</strong></th>
		<th><strong>Unit Cost Ksh</strong></th>
		<th><strong>Quantity Ordered</strong></th>
		<th><strong>Total Cost</strong></th>
		<th><strong>Quantity Received</strong></th>
		<th><strong>Total Cost</strong></th>
		<th><strong>Fill rate</strong></th>	
		</tr>
	</thead>
	<tbody>	
		 $table_body	
	</tbody>
</table>
<br></n>
HTML_DATA;
		return array('table' => $message, 'date_ordered' => $order_date, 'date_received' => $deliver_date, 'order_total' => $order_total, 'actual_order_total' => $actual_order_total, 'lead_time' => $date_diff, 'facility_name' => $facility_name);
	}
public function amc($county= null,$district= null,$facility_code= null){
		$district = ($district == "NULL") ? null : $district;
		$facility_code = ($facility_code == "NULL") ? null : $facility_code;
		$county = ($county == "NULL") ? null : $county;
		
		if (isset($county)) {
			
			$get_amc = Doctrine_Manager::getInstance()->getCurrentConnection()
		->fetchAll("select commodity_name,commodity_id,avg(facility_issues.qty_issued) as totalunits,
					(avg(facility_issues.qty_issued))/commodities.total_commodity_units as amc_packs,
					commodities.total_commodity_units from facility_issues inner join commodities on facility_issues.commodity_id=commodities.id
					inner join facilities on facility_issues.facility_code=facilities.facility_code inner join districts
					on facilities.district=districts.id where districts.county= $county and s11_No IN('internal issue','(-ve Adj) Stock Deduction')
					group by commodity_id");
					
			//echo '<pre>'; print_r($get_amc);echo '<pre>'; 
			
		}elseif(isset($district)){
			
			$get_amc = Doctrine_Manager::getInstance()->getCurrentConnection()
		->fetchAll("select commodity_name,commodity_id,avg(facility_issues.qty_issued) as totalunits,
					(avg(facility_issues.qty_issued))/commodities.total_commodity_units as amc_packs,
					commodities.total_commodity_units from facility_issues inner join commodities on facility_issues.commodity_id=commodities.id inner join facilities
					on facility_issues.facility_code=facilities.facility_code where facilities.district=$district
					and s11_No IN('internal issue','(-ve Adj) Stock Deduction') group by commodity_id");
					
			//echo '<pre>'; print_r($get_amc);echo '<pre>'; 
			
		}elseif(isset($facility_code)){
			
			$getdates = Doctrine_Manager::getInstance()->getCurrentConnection()
		->fetchAll("SELECT MIN(created_at) as EarliestDate,MAX(created_at) as LatestDate
					FROM facility_issues WHERE facility_code=$facility_code");
		
		//echo '<pre>'; print_r($getdates);echo '<pre>'; exit;
		$early=$getdates[0]['EarliestDate'];
		$late=$getdates[0]['LatestDate'];
		
		$now = time(); 
		$my_date = strtotime($early);
		$datediff = ($now - $my_date)/(60*60*24);//in days
		$datediff= round($datediff,1);
		
		
		$get_amc = Doctrine_Manager::getInstance()->getCurrentConnection()
		->fetchAll("select commodity_id,sum(facility_issues.qty_issued) as units,(sum(facility_issues.qty_issued)*30/$datediff)/commodities.total_commodity_units as amc_packs,
						commodities.total_commodity_units from facility_issues inner join commodities on facility_issues.commodity_id=commodities.id
						where facility_code=$facility_code and s11_No IN('internal issue','(-ve Adj) Stock Deduction') group by commodity_id");
					
			//echo '<pre>'; print_r($get_amc);echo '<pre>'; exit;
			return $get_amc ;	
			
		}else{
			
			echo "national";
		}
		
			
					
	}
}

