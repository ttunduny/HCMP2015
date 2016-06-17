
<style>
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
  #addModal .modal-dialog,#editModal .modal-dialog {
    width: 54%;
    
  }
  #Tab
  {
   font-size: 17px;
  }
    
  
</style>



<div class="container-fluid">
  
  <div class="row" style="margin-top: 1%;" >
    <div class="col-md-12">
      
      <ul class="nav nav-tabs" id="Tab">
  <li class="active"><a href="#home" data-toggle="tab"><span class="glyphicon glyphicon-ok"></span>Active Facilities (<?php echo($active_count[0]['total_active_facilities']);?>)</a></li>
  <li class=""><a href="#logs" data-toggle="tab"><span class="glyphicon glyphicon-cog"></span>Activation/Deactivation Logs</a></li>

  <li class=""><a href="#notactive" data-toggle="tab"><span class="glyphicon glyphicon-remove-circle"></span>Inactive Facilities(<?php echo($inactive_facilities[0]['total_inactive_facilities']); ?>)</a></li>

    <li class=""><a href="#offline" data-toggle="tab"><span class="glyphicon glyphicon-off"></span>Offline Facilities (<?php echo($offline_count[0]['total_offline_facilities']);?>)</a></li>
       
  </ul>

<div class="tab-content" style="margin-top: 5px;">
  <div class="tab-pane active" id="home">
     <?php 
     $this -> load -> view('Admin/facilities_listing_active');
     ?>
    
  </div>
  <div class="tab-pane" id="logs">
    <?php
      $this->load->view('Admin/facility_activation_logs');
    ?>
  </div>
   <div class="tab-pane" id="notactive">
    <?php
     $this -> load -> view('Admin/facilities_listing_inactive');
    
    ?>
  </div>
  <div class="tab-pane" id="offline">
    <?php
      $this->load->view('Admin/facilities_listing_offline');
    
    ?>
  </div>
  <!--<div class="tab-pane" id="activate_a_facility">
    <?php 
     //$this -> load -> view('Admin/Activate_a_facility_v');
     ?>
  </div> -->
  
</div>

    </div>
  </div>
  
  
</div>




<script>
  
  $(document).ready(function () {
    $(".deactivate_facility").click(function(e){
        e.preventDefault();
        var facility_id = $(this).attr("data-facility-id");
        var facility_status = $(this).attr("data-facility-status");
        // data-facility-status
        //alert(facility_status);return;
        //alert(facility_status);
        $.ajax({
          type:'POST',
          url:"deactivate_facility"
          ,beforeSend: function() {
            var answer = confirm("Are you sure you want to proceed?");
        if (answer){
            
        } else {
            return false;
        }
      },
          data:{
                'ndata':facility_id,
                'status':facility_status
          },
          success:function(msg){
            // alert(msg);return;
            location.reload();
          }
        });
    });
    $(".activate_facility").click(function(e){
        e.preventDefault();
        var facility_id = $("#lucky_facility").val();
        var facility_status = $("#lucky_facility option:selected").attr("class");
        // data-facility-status
        // alert(facility_id);
        // alert(facility_status);
        $.ajax({
          type:'POST',
          url:"deactivate_facility"
          ,beforeSend: function() {
            var answer = confirm("Are you sure you want to proceed?");
        if (answer){
            
        } else {
            return false;
        }
      },
          data:{
                'ndata':facility_id,
                'status':facility_status
          },
          success:function(msg){
            //alert(msg);return;
            location.reload();
          }
        });
    });

  // end of data table function
  $(".lucky_facility").select2({
    placeholder: "-000-",
    allowClear: true,
    minimumInputLength: 3,
    escapeMarkup: function(m) { return m; }
  });
  
</script>
