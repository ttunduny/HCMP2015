<?php // echo "<pre>"; print_r($activation_logs); echo "</pre>"; exit; ?>
<table  class="table table-hover table-bordered table-update" id="datatable"  >
	<thead style="background-color: white">
		<tr style="font-size: 15px;">
			<th>Full Name</th>
			<th>Facility</th>
			<th>Action</th>
			<th>Date of Action</th>
		</tr>
	</thead>

	<tbody>

		<?php
		foreach ($activation_logs as $log) {
		?>
		<tr class="edit_tr" style="font-size: 14px;">
			<td class="fullname"><?php echo $log['full_name']; ?>	</td>
			<td class="facilityname"><?php echo $log['facility_name'] . " - " . $log['facility_code']; ?></td>
			<td class="action"><?php echo $log['action']; ?></td>
			<td class="action-date"><?php echo $log['date_of_action']; ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
