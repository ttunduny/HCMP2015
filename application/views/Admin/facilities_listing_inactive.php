
		
		<div class="container-fluid">
	<div class="row">
	<table class="table table-bordered">
          <thead>
          <th>Facility code</th>
            <th>Facility Name</th>
            <th>district</th>
            <th>Owner</th>
            <th>Level</th>
            <th>Date of activation</th>   
             <th>Action</th>     
          </thead>
          <tbody>
           
							<?php
							foreach ($facilities_listing_inactive as $list ) {
							?>
							<tr class="edit_tr" style="font-size: 14px;">
								<td class="fname" ><?php echo $list['facility_code']; ?></td>
								<td class="lname"><?php echo $list['facility_name']; ?>	</td>
								<td class="email" data-attr="<?php echo $list['district']; ?>"</td>
								<td class="county"><?php echo $list['owner']; ?></td>
								<td class="district"><?php echo $list['level']; ?></td>
								<td class="level">
								<?php 
                                  echo $list['date_of_activation'];
							


				                    ?></td>

								
								<!-- <td>
								<div class=" status_item color_g" data-attr="false" >
									<span style="font-size: 12px;padding:4px">Deactivate</span>
								</div> </td> -->
								<td>
								<button class="btn btn-primary btn-xs edit activate_facility" data-facility-id = "<?php echo $list['facility_code']; ?>" data-facility-status = "<?php echo $list['using_hcmp']; ?>">
									<span class="glyphicon glyphicon-edit"></span>Activate
								</button></td>

							</tr>
							<?php } ?>
						</tbody>
  </table>


	</div>


</div>