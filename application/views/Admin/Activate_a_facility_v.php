<div class="container-fluid">
	<div class="page_content">
		
		<div class="container-fluid">
			
			<div class="row">
				<div class="col-md-13 dt" style="border: 1px solid #ddd;padding-top: 1%; " id="test">
	<tr>
	<div class="col-md-13">
		<p class="instruct">*Select facility to activate from list below.</p>
	</div>
	<div class="col-md-9"  style="padding:5px 3px;">
		<select class="lucky_facility" id="lucky_facility">
			<option value="-000-">--Search By Facility Code or Name--</option>
			<?php 
			foreach ($facilities_listing_inactive as $released) {
				echo "<option value=".$released['facility_code']." class =".$released['using_hcmp'].">".$released['facility_code']."	|	".$released['facility_name']."</option>";
			}
			 ?>
		</select>
	</div>

	<div class="col-md-3" style="padding:5px 5;">
		<button class="btn btn-primary add activate_facility" id="activate_facility" style="width: 305px;">
			<span class="glyphicon glyphicon-plus"></span>Activate Facility
		</button>
	</div>
</div>
</div>
</div>
