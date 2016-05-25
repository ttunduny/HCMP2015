<?php //echo "<pre>";print_r($facilities_listing_inactive);echo "</pre>";exit; ?>
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
		
  .table{
    font-size: 13px;
  }
	
  #date_filter_nav{
    width:100%;
    height: 60px;
    margin-top: 10px;
    margin-bottom: 10px;
    border-bottom: 1px ridge #e3e3e3;
    /*background-color: #e3e3e3;*/
  }
</style>

<!---random comment to enable for commit -->


<div class="container-fluid">
	
	<div class="row" style="margin-top: 1%;" >
		<div class="col-md-12">
			<div id="date_filter_nav">
      <form method="POST" action="<?php  echo base_url('admin/upload_update')?>" enctype="multipart/form-data" />    
          <label class="form-control btn btn-primary" style="width:15%;float:left;">Select Zip File: </label>
          <input type="file" name="userfile" class="form-control" style="width:20%;float:left" required="true" />
          <select name="upload_type" id="month" class="form-control" style="width:10%;float:left" required="true">
            <option >Select Upload Type</option>         
            <option value="1">System Updates</option>         
            <option value="2">System Setup Files</option>         
          </select>
          <input class="form-control" style="width:40%;float:left" id="description"  name="description" type="text" placeholder="Enter a Brief Description of the File" required="true" />
          <input class="btn btn-success form-control" style="width:10%;float:left" id="upload_zip" value="Upload" type="submit" />
       </form> 
    
      </div>
			<ul class="nav nav-tabs" id="Tab">
  <li class="active"><a href="#updates" data-toggle="tab"><span class="glyphicon glyphicon-cog"></span>System Updates</a></li>
  <li><a href="#setup" data-toggle="tab"><span class="glyphicon glyphicon-list"></span>System Setup Files</a></li>  
  <li><a href="#reactivate_download" data-toggle="tab" ><span class="glyphicon glyphicon-cog"></span>Reactivate Facility Download</a></li>
</ul>

<div class="tab-content" style="margin-top: 5px;">
<div class="tab-pane active" id="updates">
  <h5>The Following Files are the System Updates that Have been Uploaded</h5>
  <br/>
  <br/>
  <table class="table table-bordered">
    <thead>
      <th>Date Uploaded</th>
      <th>File Name</th>
      <th>File Description</th>
      <th>Uploaded By</th>
      <th>Action</th>      
    </thead>
    <tbody>
      <?php foreach ($system_updates as $data): ?>
        <tr>
          <td><?php echo date('d, F Y',strtotime($data['added_on'])); ?></td>
          <td><?php echo $data['update_name']; ?></td>
          <td><?php echo $data['description']; ?></td>
          <td><?php echo $data['uploader']; ?></td>
          <td>Download</td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>

<br/><br/>
<center>
<div style="width:100%;height:auto;float:left;margin-left:10px;">


</div>
</center>

<br/><br/>
<center>
<hr/>
<div style="width:100%;margin-top:60px;height:auto;float:left;margin-left:10px;border-top:1px ridge">

</div>
</center>
<br/>
<br/>
  	
</div>
<div class="tab-pane" id="setup">  
<h5>The Following Files are the System Setup Files that Have been Uploaded</h5>
  <br/>
  <br/>
  <table class="table table-bordered">
    <thead>
      <th>Date Uploaded</th>
      <th>File Name</th>
      <th>File Description</th>
      <th>Uploaded By</th>
      <th>Action</th>      
    </thead>
    <tbody>
      <?php foreach ($system_setup as $data): ?>
        <tr>
          <td><?php echo date('d, F Y',strtotime($data['added_on'])); ?></td>
          <td><?php echo $data['update_name']; ?></td>
          <td><?php echo $data['description']; ?></td>
          <td><?php echo $data['uploader']; ?></td>
          <td>Download</td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>

<br/><br/>
</center>
  </div>
  <div class="tab-pane" id="reactivate_download">
    <h4>Facilities Offline</h4>
<table id="fac_off" class="table table-hover table-bordered table-update col-md-10">
  <thead>
    <tr>
      <th ><b>Facility Name</b></th>
      <th ><b>Facility Code</b></th>
      <th ><b>Sub-County</b></th>
      <th ><b>County</b></th>
      <th><b>Action</b></th>
    </tr> 
  </thead>
  <tbody>
    <?php 
      $row_data = $offline_facilities;      
      $count = count($row_data);
      foreach ($row_data as $key => $value) {
        $facility_name = $value['facility_name'];
        $facility_code = $value['facility_code'];
        $sub_county = $value['district'];
        $county = $value['county']; ?>
        <tr>
          <td><?php echo $facility_name;?></td>
          <td><?php echo $facility_code;?></td>
          <td><?php echo $sub_county;?></td>
          <td><?php echo $county;?></td>
          <td><button class="btn btn-success pull-left reactivate" style="border-radius:0px; width:40%;" value="<?php echo $facility_code; ?>">Reactivate</button></td>
        </tr>
      <?php }
     
    ?>
  </tbody>
  </table>
  </div>

  <!-- <div class="tab-pane" id="profile">
    <?php 
     //$this -> load -> view('Admin/facilities_listing_inactive');
     ?>
  </div> -->
  
</div>

		</div>
	</div>
	
	
</div>
<script type="text/javascript">
  $(document).ready(function() {
      // $(".reactivate").on("click", function() {
     $('.reactivate').button().click(function() {
        var facility_code = $(this).val();
        swal({   
          title: "Confirm",
          text: "Are you sure you want to reactivate Facility " + facility_code + "?",
          type: "warning",   showCancelButton: true,   confirmButtonColor: "#4cae4c",
          confirmButtonText: "Yes, complete!", closeOnConfirm: false },
        function(){
         swal({   title: "Success!",   text: "Facility Reactivated",   timer: 2000 , type: "success" });
         setTimeout(function () {
            var url = "<?php echo base_url('admin/reactivate_facility/') ?>";
            url += "/" + facility_code;
            $.ajax({
              type:"POST",
              url: url,
              success: function(msg) {
                // var ok = alert("Facility Reactivated");
                location.reload();
                console.log(msg);
              },
              error: function(msg) {
                // var notOk = alert("Facility Not Reactivated");
                console.log(msg);
              }
            });
        }, 3000);
     
      });
    
        
        // console.log(url);
      });
  });
</script>



	
