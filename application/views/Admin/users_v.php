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
    margin-top: 4%;
  }
  .borderless{
    border-radius: 0px; 
  }
  .form-group{
    margin-bottom: 10px;
  }
</style>

<div class="container-fluid">
      
  <div class="row">

    <div class="col-md-1" style="padding-left: 0; right:0; float:right; margin-bottom:5px;">
      <button class="btn btn-primary add" data-toggle="modal" data-target="#addModal" id="add_new">
        <span class="glyphicon glyphicon-plus"></span>Add User
      </button>
        <a href="user_create_multiple" style="margin: 5px 0;">Add Multiple Users</a>
    </div>

    <div class="col-md-12 dt" style="border: 1px solid #ddd;padding-top: 1%; " id="test">

          <table  class="table table-hover table-bordered table-update" id="userstable"  >
            <thead style="background-color: white">
              <tr>
                <th>Names</th>
                <th>Username </th>
                <th>Phone No</th>
                <th>Sub-County</th>
                <th>Health Facility</th>
                <th>User Type</th>
                <th>Status (Checked means Active)</th>
                <th>Password</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>

              <?php
              foreach ($listing as $list ) {
                // echo "<pre>";print_r($list);die;                
              ?>
              <tr class="edit_tr" >
              <input type="hidden" class="county_id" value="<?php echo $list['county_id']; ?>">
                <td class="fname" >
                <?php echo ucfirst($list['fname'])." ".ucfirst($list['lname']);?></td>                
                <td class="email" data-attr="<?php echo $list['user_id']; ?>"><?php echo $list['email'];?></td>
                <td class="phone"><?php echo $list['telephone']; ?></td>
                <td class="district" data-attr="<?php echo $list['district_id']; ?>"><?php echo $list['district']; ?></td>
                <td class="facility" data-attr="<?php echo $list['facility_name']; ?>"><?php echo $list['facility_name']; ?></td>
                <td class="level" data-attr="<?php echo $list['level_id']; ?>"><?php echo $list['level']; ?></td>
                <td style="width:20px;" >
                <?php if ($list['status']==1) {?>
                <input type="checkbox" disabled <?php if($current_user_id == $list['user_id']){ echo "disabled"; }?> name="status-checkbox" id="status_switch_change" data-attr="<?php echo $list['user_id']; ?>"  class="small-status-switch" checked = "checked" style="border-radius:0px!important;">
                <?php }else{ ?>
                <input type="checkbox" name="status-checkbox" id="status_switch_change" disabled data-attr="<?php echo $list['user_id']; ?>" class="small-status-switch" style="border-radius:0px!important;">
                <?php } ?> 
                <td>
                  <!-- <div class="btn btn-primary btn-xs" id="reset_pwd"  data-attr="<?php echo $list['user_id']; ?>">
                  <span class="glyphicon glyphicon-edit"></span>Reset Password
                  </div> -->
                  <a href="#" class="btn btn-primary btn-xs reset_pwd" name="reset_pwd"  id="reset_pwd" data-attr="<?php echo $list['user_id']; ?>" data-name="<?php echo $list['email']; ?>">
                  <!-- <a href="<?php //echo base_url().'user/reset_pass_to_default/'.$list['user_id']; ?>" class="btn btn-primary btn-xs" name="reset_pwd" class="reset_pwd" id="reset_pwd" data-attr="<?php echo $list['user_id']; ?>"> -->
                  <span class="glyphicon glyphicon-edit"></span>Reset Password
                   </a>  
                </td>


                <td>
                <button class="btn btn-primary btn-xs edit " data-toggle="modal" data-target="#myModal" id="<?php echo $list['user_id']; ?>" data-target="#">
                  <span class="glyphicon glyphicon-edit"></span>Edit
                </button>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>

        </div>


    </div>

</div>
<

<!--Add User Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="text-align: center;line-height: 1">New User</h4>
      </div>
      <div class="row" style="margin:auto" id="error_msg">
        <div class=" col-md-12">
          <div class="form-group">


          </div>
        </div>

      </div>
      <div class="modal-body">
        <div class=" col-md-12">
          <div class="form-group">
            <center>
            <form role="form">

              <fieldset class = "col-md-12">
              <center>            

                <div class="input-group form-group u_mgt">
                  <span class="input-group-addon sponsor">First Name</span>
                  <input type="text" required="required" name="first_name" id="first_name" class="form-control " placeholder="Enter First Name" >
                </div>

                <div class="input-group form-group u_mgt">
                  <span class="input-group-addon sponsor">Last Name</span>
                  <input type="text" name="last_name" required="required" id="last_name" class="form-control " placeholder="Last Name" >
                </div>

                <div class="input-group form-group u_mgt">
                  <span class="input-group-addon sponsor">Phone Number</span>
                  <input type="telephone" name="telephone" required="required" id="telephone" class="form-control " placeholder="Enter Phone Number eg, 254" tabindex="5">
                </div>

                <div class="input-group form-group u_mgt">
                  <span class="input-group-addon sponsor">Email</span>
                  <input type="email" name="email" id="email" required="required" class="form-control " placeholder="email@domain.com" tabindex="6">
                </div>

                <div class="input-group form-group u_mgt">
                  <span class="input-group-addon sponsor">User Name</span>
                  <input type="email" name="username" id="username" required="required" class="form-control " placeholder="email@domain.com" tabindex="5" readonly>
                </div>

                <div class="input-group form-group u_mgt">
                  <span class="input-group-addon sponsor">User Type</span>
                  <select class="form-control " id="user_type" name="user_type" required="required">
                        <option value='NULL'>Select User type</option>
                        <?php
                        foreach ($user_types as $user_types) :
                          $id = $user_types ['id'];
                          $type_name = $user_types ['level'];
                          echo "<option value='$id'>$type_name</option>";
                        endforeach;
                        ?>
                  </select>
                </div>
                <div class="input-group form-group u_mgt">
                  <span class="input-group-addon sponsor">County</span>
                  <select class="form-control " id="county" name="county" required="required">
                        <option value='NULL'>Select County Name</option>
                        <?php
                        foreach ($counties as $counties) :
                          $id = $counties ['id'];
                          $counties = $counties ['county'];
                          echo "<option value='$id'>$counties</option>";
                        endforeach;
                        ?>
                  </select>
                </div>


                <div class="input-group form-group u_mgt sub_county">
                  <span class="input-group-addon sponsor">Sub County</span>
                  <select class="form-control " id="sub_county" name="sub_county" required="required">
                        <option value='NULL'>Select Sub-County Name</option>                       
                  </select>
                </div>
                <div class="input-group form-group u_mgt facility_name">
                  <span class="input-group-addon sponsor">Facility</span>
                  <select class="form-control " id="facility_name" name="facility_name" required="required">
                        <option value='NULL'>Select Facility Name</option>                        
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="create_new">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    // $(".editable").on('click',function() {
    
    //       $("#edit_user").attr("disabled", false);
    // });
    
    // $("#edit_user").attr("disabled", "disabled");
    //        $('#main-content').on('hidden.bs.modal','#myModal', function () {
    //     $("#datatable").hide().fadeIn('fast');
    //     // location.reload();
    //   });
    
    $(".sub_county").hide(); 
    $(".facility_name").hide();

    $('#add_new').click(function () {  
      $('#addModal').appendTo("body").modal('show');
    });

    $('.edit').click(function () {  
      $('#editModal').appendTo("body").modal('show');
      $("#edit_user").attr("disabled", 'disabled');
    });

    $("#county").change(function() {      
      var option_value=$(this).val();    
      if(option_value=='NULL'){
        $(".sub_county").hide('slow');
        $(".facility_name").hide('slow');
      }else{
        var drop_down='';
        var hcmp_county_api = "<?php echo base_url(); ?>reports/get_sub_county_json_data/"+$("#county").val();
        $.getJSON( hcmp_county_api ,function( json ) {          
          $("#sub_county").html('<option value="NULL" selected="selected">Select Sub County</option>');
          $.each(json, function( key, val ) {
            drop_down +="<option value='"+json[key]["id"]+"'>"+json[key]["district"]+"</option>";
          });
          $("#sub_county").append(drop_down);
        });
        $(".sub_county").show('slow');
      }    
    }); 

    $("#sub_county").change(function() {
      var option_value=$(this).val();
        if(option_value=='NULL'){
          $(".facility_name").hide('slow'); 
        }else{
        var drop_down='';
        var hcmp_facility_api = "<?php echo base_url(); ?>reports/get_facility_json/"+$("#sub_county").val();
        $.getJSON( hcmp_facility_api ,function( json ) {
          $("#facility_name").html('<option value="NULL" selected="selected">Select Facility</option>');
              $.each(json, function( key, val ) {
                drop_down +="<option value='"+json[key]["facility_code"]+"'>"+json[key]["facility_name"]+"</option>"; 
              });
              $("#facility_name").append(drop_down);
          });
          $(".facility_name").show('slow');   
        }
      }); //end of district name change funtion

    $('#email').bind('input change paste keyup mouseup',function() {
    var email = $('#email').val();         
    $("#username").val(email);
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "<?php echo base_url()."user/check_user_json";?>", //Relative or absolute path to response.php file
        data:{ 'email': $('#email').val()},
        beforeSend: function(){
            $('#processing').html('Checking Email...');

        },
        success: function(data) {
          console.log(data);
          if(data.response=='false'){
            $('#processing').html(data.msg);
        $( '#processing' ).addClass( "alert-danger alert-dismissable" );
        $("#create_new").attr("disabled", "disabled");
      }else if(data.response=='true'){
        $("#processingr").val('');
        $("#processing").removeClass("alert-danger alert-dismissable");
        $('#processing' ).addClass( "alert-success alert-dismissable" );
        $("#create_new").attr("disabled", false);
        $('#processing').html(data.msg);
      }
        }
      });
      return false;
    });

    $("#create_new").click(function() {

      var first_name = $('#first_name').val()
      var last_name = $('#last_name').val()
      var telephone = $('#telephone').val()
      var email = $('#email').val()
      var username = $('#username').val()
      var facility_id = $('#facility_id').val()
      var district_name = $('#district_name').val()
      var user_type = $('#user_type').val()

       if(first_name==""||last_name==""||telephone==""||email==""||user_type=="NULL"||district_name=="NULL"){
            alert('Please make sure you have selected all relevant fields.');
              return;
              }
      
      var div="#processing";
      var url = "<?php echo base_url()."user/addnew_user";?>";
      ajax_post_process (url,div);
           
    });

   function ajax_post_process (url,div){
    var url =url;

     //alert(url);
    // return;
     var loading_icon="<?php echo base_url().'assets/img/Preloader_4.gif' ?>";
     $.ajax({
          type: "POST",
          data:{ 'first_name': $('#first_name').val(),'last_name': $('#last_name').val(),
          'telephone': $('#telephone').val(),'email': $('#email').val(),
          'username': $('#username').val(),'facility_id': $('#facility_id').val(),
          'district_name': $('#district_name').val(),'user_type': $('#user_type').val()},
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
            
            //$('.modal-body').html(msg);return;
         
        setTimeout(function () {
            $('.modal-body').html("<div class='bg-warning' style='height:30px'>"+
              "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>"+
              "<h3>Success!!! A new user was added to the system. Please Close to continue</h3></div>")
              
      $('.modal-footer').html("<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>")
        
        }, 4000);
            
                  
          }
        }); 
        
}


  });
</script>