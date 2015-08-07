<?php //echo "<pre>";print_r($facilities);echo "</pre>";exit; ?>
<style type="text/css">
	.panel-body,span:hover,.status_item:hover
	{ 
		cursor: pointer !important; 
	}
	.panel {
		border-radius: 0;
	}
	.panel-body {
		padding: 8px;
	}
	#addModal .modal-dialog {
		width: 54%;
	}
	.borderless{
		border-radius: 0px;	
	}
	.form-group{
		margin-bottom: 10px;
	}
</style>
<div class="container-fluid">
	<div class="page_content">
		<div class="" style="width:65%;margin:auto;">
				<div class="row ">
					<div class="col-md-3">
						
					</div>
					<?php $x = array();
					foreach ($counts as $key) {
						$x[] = $key['count'];
					}
					?>
					<div class="col-md-3">
						
					</div>
				</div>
			</div>
		<div class="container-fluid">
			
			<div class="row">

				<div class="col-md-1" style="padding-left: 0; right:0; float:right; margin-bottom:5px;">
					<button class="btn btn-primary add" data-toggle="modal" data-target="#addModal" id="add_new">
						<span class="glyphicon glyphicon-plus"></span>Add Facility
					</button>
				</div>

				<div class="col-md-12 dt" style="border: 1px solid #ddd;padding-top: 1%; " id="test">

					<table  class="table table-hover table-bordered table-update" id="datatable"  >
						<thead style="background-color: white">
							<tr>
								<th>Facility Code </th>
								<th>Facility Name</th>
								<th>Sub-County</th>
								<th>Status (Checked means Active)</th>
								<th>Date of Activation/ Deactivation</th>
								<th>Action</th>
								<!-- <th>Action</th> -->
								<!-- <th>Action</th> -->

							</tr>
						</thead>

						<tbody>

							<?php
							foreach ($facilities as $list ) {
							?>
							<tr class="edit_tr" >
								<td class="facility_code" ><?php echo $list['facility_code'];?></td>
								<td class="facility_name" ><?php echo ucfirst($list['facility_name']);?></td>
								<td class="district" data-attr="<?php echo $list['district']; ?>"><?php echo $list['district_name'];?></td>
								<td style="width:20px;" >
								<?php if ($list['using_hcmp'] == 1) {?>
								<input type="checkbox" name="status-checkbox" disabled="disabled" id="f<?php echo $list['facility_code']; ?>" data-attr="<?php echo $list['facility_code']; ?>" class="small-status-switch" checked = "checked" style="border-radius:0px!important;">
								<?php }else{ ?>
								<input type="checkbox" name="status-checkbox" disabled="disabled" id="chkbx_<?php echo $list['facility_code']; ?>" data-attr="<?php echo $list['facility_code']; ?>" class="small-status-switch" style="border-radius:0px!important;">
								<?php } ?> 
								<td id="date_<?php echo $list['facility_code']; ?>"><?php 
									$date_of_activation= $list['date_of_activation']; 
									if ($list['using_hcmp'] == 1){
										echo date('D ,d F Y',strtotime($date_of_activation));
									}else{
										echo 'Not Active';
									}
									?></td>
								<td><?php 
									$value=0;
									$text = null;
									if ($list['using_hcmp'] == 1) {
										$value=1;
										$text = 'Deactivate';
									}else{
										$value=0;
										$text = 'Activate';
									}?>
									<button class="btn btn-primary status_btn form-control" style="width:90%" id="btn_<?php echo $list['facility_code']; ?>" data-attr="<?php echo $list['facility_code']; ?>" data-value="<?php echo $value; ?>"><?php echo $text; ?></button>
								</td>
								<!-- td><button class="btn btn-primary add" data-toggle="modal" data-target="#addUsersModal" id="add_new_users">
										<span class="glyphicon glyphicon-plus"></span>Add Users
									</button>
								</td> -->
								<!-- <td><TEXTAREA></TEXTAREA>st</td> -->
								<!--addUsersModal
								<td>
								<button class="btn btn-primary btn-xs edit " data-toggle="modal" data-target="#myModal" id="<?php echo $list['facility_code']; ?>" data-target="#">
									<span class="glyphicon glyphicon-edit"></span>Edit
								</button></td>
								-->
							</tr>
							<?php }//foreach ?>
						</tbody>
					</table>

				</div>

			</div>
		</div>
	</div>
</div>
</div>
<!-- Modal add user -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="myform">
	<div class="modal-dialog editable" >
		<div class="modal-content">
			<div class="modal-header" style="">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel" style="text-align: center;line-height: 1">Add Facility</h4>
			</div>
			<div class="row" style="margin:auto" id="error_msg">
				<div class=" col-md-12">
					<div class="form-group">

					</div>
				</div>

			</div>
			<div class="modal-body" style="padding:0">
				<div class="row" style="margin:auto">
					<div class="col-md-12 ">
					<center>
						<form role="form">

							<fieldset class = "col-md-12">
							<center>
							<!--
								<legend style="font-size:1.5em">
									Add User
								</legend>
								-->
								<div class="input-group form-group u_mgt">
									<span class="input-group-addon sponsor">Facility Code</span>
									<input type="number" required="required" name="facility_code" id="facility_code" class="form-control " placeholder="Enter Facility Code" >
								</div>

								<div class="input-group form-group u_mgt">
									<span class="input-group-addon sponsor">Facility Name</span>
									<input type="text" required="required" name="facility_name" id="facility_name" class="form-control " placeholder="Enter Facility Name" >
								</div>


								<div class="input-group form-group u_mgt">
									<span class="input-group-addon sponsor">District</span>
									<select name="district" id="district" class="form-control">
									<option value = "0" readonly selected = "selected" placeholder= "Select a district">Select a district</option>
									
										<?php 
										if ($identifier == "county") {
											foreach ($district_info as $districts) {
												echo "<option data-attr=".$districts['id']." value=".$districts['id'].">".$districts['district']."</option>";
											}//end of foreach
										}else{
												echo "<option data-attr=".$list['district']." value=".$list['district'].">".$list['district_name']."</option>";
										}
								 ?>
									</select>
								</div>
									
								
								

								<div class="input-group form-group u_mgt">
									<span class="input-group-addon sponsor">Owner</span>
									<input type="text" name="owner" required="required" id="owner" class="form-control " placeholder="Enter owner eg, Ministry of Health or GOK" tabindex="5">
								</div>

								<div class="input-group form-group u_mgt">
									<span class="input-group-addon sponsor">Facility Type</span>
									<input type="text" name="facility_type" id="facility_type" required="required" class="form-control " placeholder="Facility type e.g Dispensary or Health Centre" tabindex="6">
								</div>

								<div class="input-group form-group u_mgt">
									<span class="input-group-addon sponsor">Facility Level</span>
									<input type="number" name="facility_level" id="facility_level" required="required" class="form-control " placeholder="Enter facility level e.g 1 or 2" tabindex="5">
								</div>

								<div class="input-group form-group u_mgt">
									<span class="input-group-addon sponsor">Contact Person(Names)</span>
									<input type="text" name="contact_name" id="contact_name" class="form-control " placeholder="Enter contact person's name(s)" tabindex="6">
								</div>

								<div class="input-group form-group u_mgt">
									<span class="input-group-addon sponsor">Contact Person Phone No.</span>
									<input type="number" name="contact_phone" id="contact_phone" class="form-control" placeholder="Enter contact person's phone number" tabindex="6">
								</div>

								<div class="input-group form-group u_mgt">
									<span class="input-group-addon sponsor">Activation Status</span>
									<select id="activation_status" class="form-control">
										<option value="1">Activate Facility</option>
										<option value="0">Leave Facility Deactivated</option>
									</select>
								</div>
									
								<div class="row" style="margin:auto" id="processing">
									<div class=" col-md-12">
										<div class="form-group">
										</div>
									</div>
								</div>
								</center>

							</fieldset>

						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default borderless" data-dismiss="modal">
					Close
				</button>
				
				<button class="btn btn-primary borderless" id="create_new">
					Save changes
				</button>
			</div>
		</div>
	</div>
</div><!-- end Modal new user -->

<div class="modal fade"  id="addUsersModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="myform_users">
	<div class="modal-dialog editable" >
		<div class="modal-content" style="margin:auto;width:1200px;">
			<div class="modal-header" style="">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel" style="text-align: center;line-height: 1">Add Users</h4>
			</div>
			<div class="row" style="margin:auto;width:1200px;" id="error_msg">
				<div class=" col-md-12">
					<div class="form-group">

					</div>
				</div>

			</div>
			<div class="modal-body" style="padding:0">
				<div class="row" style="margin:auto;width:1200px;">
					<div class="col-md-12 ">
					
					<div class="table-responsive" style="min-height:300px; overflow-y: auto;">
 
<table  class="table table-hover table-bordered table-update" id="add_users_table" >
<thead style="background-color: white">
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Phone Number</th>
						<th>Email</th>
						<th>User Name</th>
						<th>User Type</th>
						<th>Facility Name</th>
						<th>Action</th>			    
					</tr>
					</thead>
					<tbody>
						<tr row_id='0'>
						<td>
							<input type="text" id="first_name[]" name="first_name[]" value="" class="form-control input-meduim first_name" placeholder="Enter First Name" style="margin-left:6%;width:80px !important;"/>
						</td>
						<td>
							<input type="text" id="last_name[]" name="last_name[]" value="" class="form-control input-meduim last_name" placeholder="Enter Last Name" style="margin-left:6%;width:80px !important;"/>
						</td>
						<td>
							<input type="telephone" id="phone_number[]" name="phone_number[]" value="" class="form-control input-meduim phone_number" placeholder="Enter Phone Number e.g 254" style="margin-left:6%;width:80px !important;"/>
						</td>
						<td>
							<input type="email" id="email[]" name="email[]" value="" class="form-control input-meduim email" placeholder="email@domain.com" style="margin-left:6%;width:80px !important;"/>
						</td>
						<td>
							<input type="email" id="username[]" name="username[]" value="" class="form-control input-meduim username" placeholder="email@domain.com" style="margin-left:6%;width:80px !important;"/>						
						</td>
						<td>
							<input type="text" id="usertype[]" name="usertype[]" value="" class="form-control input-meduim usertype" placeholder="Enter Usertype" style="margin-left:6%;width:80px !important;"/>						
						</td>
						<td>
							<input type="text" id="facility_name[]" name="facility_name[]" value="" class="form-control input-meduim facility_name" placeholder="Enter Facility Name" style="margin-left:6%;width:80px !important;"/>						
						</td>
						<td style="width:50px !important;" id="step8" >
							<button type="button" class="remove btn btn-danger btn-xs"><span class="glyphicon glyphicon-minus"></span>row</button>
							<button type="button" id="step7" class="add btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span>row</button>
						</td>
			
			</tr>
		           </tbody>
		           </table>
</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default borderless" data-dismiss="modal">
					Close
				</button>
				
				<button class="btn btn-primary borderless" id="create_new">
					Save changes
				</button>
			</div>
		</div>
	</div>
</div><!-- end Modal new user -->


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width:60%">
		<div class="modal-content editable">
			<div class="modal-header" style="">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel" style="text-align: center;line-height: 1">Edit User</h4>
			</div>
			<div class="modal-body" style="">
				<div id="contents">
				<center>
					<form role="form">

							<div class="input-group form-group u_mgt">
									<span class="input-group-addon sponsor">First Name</span>
									<input type="text" required="required" name="fname_edit" id="fname_edit" class="form-control " placeholder="First Name" >
							</div>

							<div class="input-group form-group u_mgt">
									<span class="input-group-addon sponsor">Last Name</span>
										<input type="text" name="lname_edit" required="required" id="lname_edit" class="form-control " placeholder="Last Name" >
							</div>

							<div class="input-group form-group u_mgt">
									<span class="input-group-addon sponsor">Phone No</span>
										<input type="telephone" disabled="disabled" name="telephone_edit" required="required" id="telephone_edit" class="form-control " placeholder="telephone eg, 254" tabindex="5">
							</div>

							<div class="input-group form-group u_mgt">
									<span class="input-group-addon sponsor">Email</span>
										<input type="email" data-id="" name="email_edit" id="email_edit" required="required" class="form-control " placeholder="email@domain.com" tabindex="6">
							</div>

							<div class="input-group form-group u_mgt">
									<span class="input-group-addon sponsor">User Name</span>
										<input type="email" name="username_edit" id="username_edit" required="required" class="form-control " placeholder="email@domain.com" tabindex="5" readonly>
							</div>

							<div class="col-md-6">
									<div class="err" style="padding: 6px;">
										
									</div>
							</div>
						
						<!-- <h4>Other details</h4> -->
									<?php

									$identifier = $this -> session -> userdata('user_indicator');
									if ($identifier=='district') {
									?>

									<div class="input-group form-group u_mgt">
									<span class="input-group-addon sponsor">Facility Name</span>

									<select class="form-control " id="facility_id_edit_district" required="required">
												<option value=''>Select Facility</option>

												<?php
												foreach ($facilities as $facility) :
													$id = $facility ['facility_code'];
													$facility_name = $facility ['facility_name'] ;
													echo "<option value='$id'>$facility_name</option>";
												endforeach;
												?>
											</select>

									</div>

									<div class="input-group form-group u_mgt">
									<span class="input-group-addon sponsor">User Type</span>
									<select class="form-control " id="user_type_edit_district" name="user_type_edit_district" required="required">
													
													
									</select>
									</div>

									<div class="input-group form-group u_mgt">
												<input type="hidden" name="district_name_edit" class="" id="district_name_edit" >
									
									</div>

									<div class="input-group form-group u_mgt">
									<span class="input-group-addon sponsor">Activation Status</span>
									<div class="col-md-6">
									<div class="onoffswitch">
									    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
									    <label class="onoffswitch-label" for="myonoffswitch">
									        <div value="1" class="onoffswitch-inner"></div>
									        <div class="onoffswitch-switch"></div>
									    </label>
									</div>
									</div>
									</div>

									<?php }elseif ($identifier=='county') { ?>

									<div class="input-group form-group u_mgt">
									<span class="input-group-addon sponsor">User Type</span>
										<select class="form-control " id="user_type_edit_district" name="user_type_edit_district" required="required">
													
										</select>
									</div>

									<div class="input-group form-group u_mgt">
									<span class="input-group-addon sponsor">District Name</span>
									<select class="form-control " id="district_name_edit" required="required">
												<option value=''>Select Sub-County</option>
												<?php
												foreach ($district_data as $district) :
													$d_id = $district ['id'];
													$d_name = $district ['district'];
													echo "<option value='$d_id'>$d_name</option>";
												endforeach;
												?>
											</select>
									</div>

									<div class="input-group form-group u_mgt">
									<span class="input-group-addon sponsor">Facility Name</span>
										<select class="form-control " id="facility_id_edit" required="required">
													
										</select>		
									</div>


									<div class="input-group form-group u_mgt">
									<span class="input-group-addon sponsor">Activation Status</span>
									<div class="col-md-6">
									<div class="onoffswitch">
									    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" >
									    <label class="onoffswitch-label" for="myonoffswitch">
									        <div  class="onoffswitch-inner"></div>
									        <div  class="onoffswitch-switch"></div>
									    </label>
									</div>
									</div>
									</div>

								<?php }elseif ($identifier=='facility_admin') {
									//code if facility admin
									
								?>

								<div class="input-group form-group u_mgt">
									<span class="input-group-addon sponsor">User Type</span>
												<select class="form-control " id="user_type_edit_district" name="user_type_edit_district" required="required">
													<option value=''>Select User type</option>
													<?php
													foreach ($user_types as $user) :
														$id = $user['id'];
														$type_name = $user['level'];
														echo "<option value='$id'>$type_name</option>";
													endforeach;
													?>
												</select>
									</div>

									<div class="input-group form-group u_mgt">
									<span class="input-group-addon sponsor">Status</span>
									</div>
										<div class="col-md-6">
										<div class="onoffswitch">
									    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" >
									    <label class="onoffswitch-label" for="myonoffswitch">
									        <div  class="onoffswitch-inner"></div>
									        <div  class="onoffswitch-switch"></div>
									    </label>
										</div>
										</div>
								<?php }?>

							</form>
							</center>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default borderless" data-dismiss="modal">
					Close
				</button>
				<button type="button" class="btn btn-primary edit_user borderless">
					Save changes
				</button>
			</div>
		</div>
	</div>
</div><!-- end Modal edit user -->
<script>
      $(document).ready(function () {
      	$("#create_new,.edit_user").attr("disabled", 'disabled');
      	
      	//activates the edit button on click
      	$(".editable").on('click',function() {
			$(".edit_user").attr("disabled", false);
			$("#create_new").attr("disabled", false);
		});
      	
      	$('#myModal').on('hidden.bs.modal', function () {
  			$("#datatable,.modal-content").hide().fadeIn('fast');
		 	location.reload();
		});
		
		$('.dataTables_filter label input').addClass('form-control');
		$('.dataTables_length label select').addClass('form-control');
		
		$('#datatable').dataTable( {
			"sDom": "T lfrtip",
	       	"sScrollY": "320px",   
            "sPaginationType": "bootstrap",
            "oLanguage": {"sLengthMenu": "_MENU_ Records per page","sInfo": "Showing _START_ to _END_ of _TOTAL_ records",},
            "oTableTools": {"aButtons": ["copy","print",{"sExtends":"collection","sButtonText": 'Save',"aButtons":[ "csv", "xls", "pdf" ]}],"sSwfPath": "<?php echo base_url(); ?>assets/datatable/media/swf/copy_csv_xls_pdf.swf"}
	    	
	  	} ); 

$(".dataTables_paginate").click(function(){
	initialize_checkboxes();
});
	  
	  	$('div.dataTables_filter input').addClass('form-control search');
	  	$('div.dataTables_length select').addClass('form-control');
		
$("#create_new").click(function() {

      var facility_code = $('#facility_code').val()
      var facility_name = $('#facility_name').val()
      var district_name = $('#district_name').val()
      var owner = $('#owner').val()
      var facility_type = $('#facility_type').val()
      var facility_level = $('#facility_level').val()
      var contact_name = $('#contact_name').val()
      var contact_phone = $('#contact_phone').val()
      var district = $('.district_name').attr('data-attr')
      var activation_status = $('#activation_status').val()
       if(facility_code==""||facility_name==""||facility_level==""||owner==""||facility_type=="NULL"||facility_level=="NULL"){
						alert('Kindly fill all fields with accurate data.');
							return;
							}
      
      var div="#processing";
      var url = "<?php echo base_url()."facility_activation/add_facility";?>";
      ajax_post_process (url,div);
           
    });


	 $(".add").click(function() {
        var selector_object=$('#add_users_table tr:last');
  //       selector_object.closest("tr").find(".first_name").attr('readonly','readonly');
		// selector_object.closest("tr").find(".last_name").attr("disabled", true);
		// selector_object.closest("tr").find(".phone_number").attr("disabled", true);
		// selector_object.closest("tr").find(".email").attr("disabled", true);				
		// selector_object.closest("tr").find(".username").attr("disabled", true);				
		// selector_object.closest("tr").find(".usertype").attr("disabled", true);				
		// selector_object.closest("tr").find(".facility_name").attr("disabled", true);				
		//reset the values of current element */
		 clone_the_last_row_of_the_table();
	});	/////batch no change event
	function clone_the_last_row_of_the_table(){
            var last_row = $('#add_users_table tr:last');
            var cloned_object = last_row.clone(true);
            var table_row = cloned_object.attr("row_id");
            var next_table_row = parseInt(table_row) + 1;    
            var blank_value = "";       
		    cloned_object.attr("row_id", next_table_row);
			// cloned_object.find(".first_name").attr('name','first_name['+next_table_row+']'); 
			// cloned_object.find(".last_name").attr('name','last_name['+next_table_row+']'); 
			// cloned_object.find(".phone_number").attr('name','phone_number['+next_table_row+']');
			// cloned_object.find(".email").attr('name','email['+next_table_row+']'); 			
			// cloned_object.find(".username").attr('name','username['+next_table_row+']'); 
			// cloned_object.find(".usertype").attr('name','usertype['+next_table_row+']'); 
			// cloned_object.find(".facility_name").attr('name','facility_name['+next_table_row+']');
   //          cloned_object.find("input").val(blank_value);
   //          cloned_object.find(".first_name").val(blank_value);  
   //          cloned_object.find(".last_name").val(blank_value);  
   //          cloned_object.find(".phone_number").val(blank_value);  
   //          cloned_object.find(".email").val(blank_value);  
   //          cloned_object.find(".username").val(blank_value);  
   //          cloned_object.find(".usertype").val(blank_value);  
   //          cloned_object.find(".add_users_table").val(blank_value);  
            
            // remove the error class
            // cloned_object.find("label.error").remove();             
			cloned_object.insertAfter('#add_users_table tr:last');
	
        }
   function ajax_post_process (url,div){
    var url =url;

     //alert(url);
    // return;
     var loading_icon="<?php echo base_url().'assets/img/Preloader_4.gif' ?>";
     $.ajax({
          type: "POST",
          data:{ 
          'facility_code': $('#facility_code').val(),
          'facility_name': $('#facility_name').val(),
          'district': $('#district').val(),
          'owner': $('#owner').val(),
          'facility_type': $('#facility_type').val(),
          // 'district' : $('#district_name').attr('data-attr'),
          'facility_level': $('#facility_level').val(),
          'contact_name': $('#contact_name').val(),
          'contact_phone': $('#contact_phone').val(),
          'activation_status': $('#activation_status').val()
      		},
          url: url,
          beforeSend: function() {
           
            var message = confirm("Are you sure you want to proceed?");
        if (message){
            $('.modal-body').html("<img style='margin:30% 0 20% 42%;' src="+loading_icon+">");
        } else {
            return false;
        }
           
          },
          success: function(msg) {
  
          	// $('.modal-body').html(msg);return;
         
        setTimeout(function () {
          	$('.modal-body').html("<div class='bg-warning' style='height:30px'>"+
							"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>"+
							"<h3>Success!!! A new facility was added to the system. Please Close to continue</h3></div>")
							
			$('.modal-footer').html("<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>")
				
        }, 4000);

        // window.reload();
          }
        }); 
        
}
			
			
			oTable = $('#datatable').dataTable();
			
			$('#active').click(function () {
				
				oTable.fnFilter('active');
			})
			
			$('#inactive').click(function () {
				
				oTable.fnFilter('deactivated');
			})

			$('input[name="status-checkbox"]').change(function(e){
		// e.prevenDefault();
		      value = $(this).attr('checked');//member id
		      facility_code = $(this).attr("data-attr");//member id
		      if ($(this).prop('checked') == false){
		        // alert($(this).prop("checked"));
		        // console.log(user_id);
		        change_status(facility_code,0,"unchecked");
		        // $('input[name="status-checkbox"]').prop('checked', false);
		      
		      } else{
		        // alert("checked");
		        // console.log(user_id);
		        // alert($(this).prop("checked"));
		        change_status(facility_code,1,"checked");
		        // $('input[name="status-checkbox"]').prop('checked', true);
		      };
		      
		      // console.log(value);
   			});
		$('.status_btn').click(function (e){
			btn_value = $(this).attr('data-value');
			btn_id = $(this).attr('id');
			facility_code = $(this).attr('data-attr');
			// alert(facility_code);
			if(btn_value==0){
				change_status_new(facility_code,0,btn_id);
			}else{
				change_status_new(facility_code,1,btn_id);

			}
		});

		function change_status_new(facility_code,stati,btn_id){//seth
      // alert(checked);return;
	      message = "";
	     
	      var loading_icon="<?php echo base_url().'assets/img/Preloader_4.gif' ?>";
	      // alert(stati);

	      $.ajax({
	          type:"POST",
	          data:{
	            'facility_code': facility_code,
	            'status': stati
	        },

          url:"<?php echo base_url()."facility_activation/change_status_new";?>",

          beforeSend: function() {
            //$(div).html("");
            // alert($('#email_recieve_edit').prop('checked'));return;
            var answer = confirm("Are you sure you want to proceed?");
            if (answer){
                $('.modal-body').html("<img style='margin:30% 0 20% 42%;' src="+loading_icon+">");
            } else {
            	message_denial = "No action has been taken";
            	alertify.set({ delay: 10000 });
             	alertify.success(message_denial, null);            	
                return false;
            }},
            success: function(msg){            	
              var data = jQuery.parseJSON(msg);
              using_hcmp = data.using_hcmp;
              date = data.date_of_activation;
              // var date = jQuery.parseJSON(msg.date_of_activation);
              if(using_hcmp==1){
	        	message_after = "Facility: "+ facility_code +" has been Activated";
	        	$('#chkbx_'+facility_code).prop('checked' ,true);
	        	$('#date_'+facility_code).html(date);
	        	$('#btn_'+facility_code).html('Deactivate');
	        	$('#btn_'+facility_code).attr('data-value','1');
              }else{
              	message_after = "Facility: "+ facility_code +" has been Deactivated";
	        	$('#chkbx_'+facility_code).removeAttr('checked');
	        	$('#date_'+facility_code).html('Not Active');	 
	        	$('#btn_'+facility_code).html('Activate');
	        	$('#btn_'+facility_code).attr('data-value','0');	        	

              }
              alertify.set({ delay: 10000 });
              alertify.success(message_after, null);
            }

        });
    }//end of change status function
		function initialize_checkboxes(){
			$('input[name="status-checkbox"]').change(function(e){
		// e.prevenDefault();
		      value = $(this).attr('checked');//member id
		      facility_code = $(this).attr("data-attr");//member id
		      if ($(this).prop('checked') == false){
		        // alert($(this).prop("checked"));
		        // console.log(user_id);
		        change_status(facility_code,0,"unchecked");
		        // $('input[name="status-checkbox"]').prop('checked', false);
		      
		      } else{
		        // alert("checked");
		        // console.log(user_id);
		        // alert($(this).prop("checked"));
		        change_status(facility_code,1,"checked");
		        // $('input[name="status-checkbox"]').prop('checked', true);
		      };
		      
		      // console.log(value);
   			});
		}
		
	
			
	

    function change_status(facility_code,stati,checked){//seth
      // alert(checked);return;
      message = "";
      if (stati == 0) {
        message_after = "Facility: "+ facility_code +" has been Deactivated";
      }else{
        message_after = "Facility: "+ facility_code +" has been Activated";

      };
      var loading_icon="<?php echo base_url().'assets/img/Preloader_4.gif' ?>";
      // alert(stati);

      $.ajax({
          type:"POST",
          data:{
            'facility_code': facility_code,
            'status': stati
        },

          url:"<?php echo base_url()."facility_activation/change_status";?>",

          beforeSend: function() {
            //$(div).html("");
            // alert($('#email_recieve_edit').prop('checked'));return;
            var answer = confirm("Are you sure you want to proceed?");
            if (answer){
                $('.modal-body').html("<img style='margin:30% 0 20% 42%;' src="+loading_icon+">");
            } else {
            	message_denial = "No action has been taken";
            	alertify.set({ delay: 10000 });
             	alertify.success(message_denial, null);
            	if (checked == "checked") {
            		// alert("im checked");
            		$('input[data-attr="'+facility_code+'"]').prop('checked' ,false);
            	}else{
            		// alert("im unchecked");
            		$('input[data-attr="'+facility_code+'"]').prop('checked' ,true);


            	};
                return false;
            }},
            success: function(msg){
            	// alert(msg);return;
              alertify.set({ delay: 10000 });
              alertify.success(message_after, null);
            }

        });
    }//end of change status function
			
			});
    </script>