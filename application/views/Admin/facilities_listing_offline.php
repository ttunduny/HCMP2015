


<div class="container-fluid">
	<div class="row">
	<table class="table table-bordered">
          <thead>
          <th>Facility Code</th>
            <th>Facility Name</th>
            <th>County</th>
            <th>Sub_County</th>
            <th>Rollout Date</th>
            <th>Last Synchronization Date</th>      
          </thead>
          <tbody>
            <?php foreach ($offline_facilities as $data): ?>
              <tr>
                
                <td><?php echo $data['facility_code']; ?></td>
                <td><?php echo $data['facility_name']; ?></td>
                <td><?php echo $data['county']; ?></td>
                <td><?php echo $data['district']; ?></td>
                <td><?php echo $data['date_of_activation']; ?></td>
                <td><?php 
                    if ($data['date_added']==NULL) {
                      echo "Not synchronized";
                    }
                    else {
                     echo $data['date_added']; 
                    }
                ?></td>
                
              </tr>
            <?php endforeach ?>
          </tbody>
  </table>


	</div>


</div>