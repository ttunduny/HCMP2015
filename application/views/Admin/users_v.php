<?php 
  $count_active = count($active_users);
  $count_inactive = count($inactive_users);
  $count_deactivated = count($deactivated_users);

?>
<div class="container-fluid">  
 <div class="row"> 
  <!-- <div class="col-md-1" style="padding-left: 0; right:0; float:right; margin-bottom:5px;">
    <button class="btn btn-primary add" data-toggle="modal" data-target="#addModal" id="add_new">
    <span class="glyphicon glyphicon-plus"></span>Add User
    </button>
    <a href="user_create_multiple" style="margin: 5px 0;">Add Multiple Users</a>
  </div> -->
 </div>    
  <div class="row"> 
  <div>
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#active" aria-controls="active" role="tab" data-toggle="tab"><h5>Active Users (<?php echo $count_active;?>)</h5></a></li>
      <li role="presentation"><a href="#deactivated" aria-controls="deactivated" role="tab" data-toggle="tab"><h5>Deactivated Users (<?php echo $count_deactivated;?>)</h5></a></li>
      <li role="presentation"><a href="#inactive" aria-controls="inactive" role="tab" data-toggle="tab"><h5>Inactive Users (<?php echo $count_inactive;?>)</h5></a></li>      
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="active">
        <div class="col-md-12 dt" style="border: 1px solid #ddd;padding-top: 1%;">
          <table  class="table table-hover table-bordered table-update" id="activeusers" style="font-size: 12px">
            <thead style="background-color: white">
              <tr>
                <th>Full Name</th>
                <th>Email </th>
                <th>Phone No</th>
                <th>County</th>
                <th>Sub-County</th>
                <th>Facility</th>
                <th>User Type</th>                                
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                foreach ($active_users as $active) {?>
                  <tr>                  
                    <td>
                      <input type="hidden" class="user_id" value="<?php echo $active['user_id'];?>"/>
                      <input type="hidden" class="user_name" value="<?php echo $active['fname'].' '.$active['lname'];?>"/>
                      <?php echo $active['fname'].' '.$active['lname'];?></td>
                    <td><?php echo $active['email'];?></td>
                    <td><?php echo $active['telephone'];?></td>
                    <td><?php $county = ($active['county']=='') ? 'N/A' : $active['county'] ; echo $county;?></td>
                    <td><?php $district = ($active['district']=='') ? 'N/A' : $active['district'] ; echo $district;?></td>
                    <td><?php $facility_name = ($active['facility_name']=='') ? 'N/A' : $active['facility_name'] ; echo $facility_name;?></td>                   
                    <td><?php echo $active['level'];?></td>
                    <td>
                      <button class="reset_password form-control btn-primary">Reset Password</button>
                      <button class="deactivate_user form-control btn-danger">Deactivate</button>                      
                    </td>                                        
                  </tr>
              <?php }?>
            </tbody>
          </table>
        </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="deactivated">
          <div class="col-md-12 dt" style="border: 1px solid #ddd;padding-top: 1%;">
          <table  class="table table-hover table-bordered table-update" id="deactivatedusers" style="font-size: 12px">
            <thead style="background-color: white">
              <tr>
                <th>Full Name</th>
                <th>Email </th>
                <th>Phone No</th>
                <th>County</th>
                <th>Sub-County</th>
                <th>Facility</th>
                <th>User Type</th>                                
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                foreach ($deactivated_users as $active) {?>
                  <tr>                  
                    <td>
                      <input type="hidden" class="user_id" value="<?php echo $active['user_id'];?>"/>
                      <input type="hidden" class="user_name" value="<?php echo $active['fname'].' '.$active['lname'];?>"/>
                      <?php echo $active['fname'].' '.$active['lname'];?></td>
                    <td><?php echo $active['email'];?></td>
                    <td><?php echo $active['telephone'];?></td>
                    <td><?php $county = ($active['county']=='') ? 'N/A' : $active['county'] ; echo $county;?></td>
                    <td><?php $district = ($active['district']=='') ? 'N/A' : $active['district'] ; echo $district;?></td>
                    <td><?php $facility_name = ($active['facility_name']=='') ? 'N/A' : $active['facility_name'] ; echo $facility_name;?></td>                   
                    <td><?php echo $active['level'];?></td>
                    <td>
                      <button class="activate_user form-control btn-success">Activate</button>                      
                    </td>                                        
                  </tr>
              <?php }?>
            </tbody>
          </table>
        </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="inactive">
          <div class="col-md-12 dt" style="border: 1px solid #ddd;padding-top: 1%;">
          <table  class="table table-hover table-bordered table-update" id="inactiveusers" style="font-size: 12px">
            <thead style="background-color: white">
              <tr>
                <th>Full Name</th>
                <th>Email </th>
                <th>Phone No</th>
                <th>County</th>
                <th>Sub-County</th>
                <th>Facility</th>
                <th>User Type</th>                                
                <!-- <th>Action</th> -->
              </tr>
            </thead>
            <tbody>
              <?php 
                foreach ($inactive_users as $active) {?>
                  <tr>                  
                    <td>
                      <input type="hidden" class="user_id" value="<?php echo $active['user_id'];?>"/>
                      <input type="hidden" class="user_name" value="<?php echo $active['fname'].' '.$active['lname'];?>"/>
                      <?php echo $active['fname'].' '.$active['lname'];?></td>
                    <td><?php echo $active['email'];?></td>
                    <td><?php echo $active['telephone'];?></td>
                    <td><?php $county = ($active['county']=='') ? 'N/A' : $active['county'] ; echo $county;?></td>
                    <td><?php $district = ($active['district']=='') ? 'N/A' : $active['district'] ; echo $district;?></td>
                    <td><?php $facility_name = ($active['facility_name']=='') ? 'N/A' : $active['facility_name'] ; echo $facility_name;?></td>                  
                    <td><?php echo $active['level'];?></td>
                    <!--td><button class="reset_password form-control btn-primary">Reset Password</button></td-->                                        
                  </tr>
              <?php }?>
            </tbody>
          </table>
        </div>
      </div>      
    </div>

  </div>

  </div>
</div>


<script type="text/javascript">
  $(document).ready(function() {      
    $('.reset_password').button().click(function() {
      var user_id = $(this).closest("tr").find(".user_id").val();
      var user_name = $(this).closest("tr").find(".user_name").val();      
      swal({   
        title: "Confirm",
        text: "Are you sure you want to Reset the Password for " + user_name.bold()+ "?",
        type: "warning",   showCancelButton: true,   confirmButtonColor: "#4cae4c",
        confirmButtonText: "Yes, Reset!", closeOnConfirm: false },
      function(){
        swal({   title: "Success!",   text: "Password Reset",   timer: 2000 , type: "success" });
        setTimeout(function () {
        var url = "<?php echo base_url('user/reset_user_password/') ?>";
            url += "/" + user_id;
            $.ajax({
              type:"POST",
              url: url,
              success: function(msg) {                
              },
              error: function(msg) {
                var notOk = alert("Password Reset Failed");                
              }
            });
        }, 3000);
     
      });
    });

    $('.deactivate_user').button().click(function() {
      var user_id = $(this).closest("tr").find(".user_id").val();
      var user_name = $(this).closest("tr").find(".user_name").val();      
      swal({   
        title: "Confirm",
        text: "Are you sure you want to Deactivate " + user_name.bold()+ "? The user will be unable to use the System",
        type: "warning",   showCancelButton: true,   confirmButtonColor: "#4cae4c",
        confirmButtonText: "Yes, Continue!", closeOnConfirm: false },
      function(){
        swal({   title: "Success!",   text: "User Deactivated",   timer: 2000 , type: "success" });
        setTimeout(function () {
        var url = "<?php echo base_url('user/deactivate_user/') ?>";
            url += "/" + user_id+'/2';
            $.ajax({
              type:"POST",
              url: url,
              success: function(msg) {   
                location.reload();             
              },
              error: function(msg) {
                var notOk = alert("User Deactivation Failed");                
              }
            });
        }, 3000);
     
       });
      });

    $('.activate_user').button().click(function() {
      var user_id = $(this).closest("tr").find(".user_id").val();
      var user_name = $(this).closest("tr").find(".user_name").val();      
      swal({   
        title: "Confirm",
        text: "Are you sure you want to Activate " + user_name.bold()+ "? The user will be now be able to log in and use the System",
        type: "warning",   showCancelButton: true,   confirmButtonColor: "#4cae4c",
        confirmButtonText: "Yes, Continue!", closeOnConfirm: false },
      function(){
        swal({   title: "Success!",   text: "User Activated",   timer: 1000 , type: "success" });
        setTimeout(function () {
        var url = "<?php echo base_url('user/deactivate_user/') ?>";
            url += "/" + user_id+'/1';
            $.ajax({
              type:"POST",
              url: url,
              success: function(msg) {   
                location.reload();             
              },
              error: function(msg) {
                var notOk = alert("User Activation Failed");                
              }
            });
        }, 3000);
     
       });
      });
  });
</script>