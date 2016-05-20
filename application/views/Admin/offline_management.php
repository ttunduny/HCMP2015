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
      <form>
        <label class="form-control btn btn-primary" style="width:15%;float:left;">Select Zip File: </label>
        <input type="file" name="zip_upload" class="form-control" style="width:20%;float:left" id="zip_upload" />
        

        <select id="month" class="form-control" style="width:20%;float:left">
          <option value="0">Select Upload Type</option>         
          <option value="1">System Updates</option>         
          <option value="2">System Setup Files</option>         
        </select>
        <button class="btn btn-success form-control" style="width:20%;float:left" id="upload_zip">Upload</button>
         
        </form>
      </div>
			<ul class="nav nav-tabs" id="Tab">
  <li class="active"><a href="#home" data-toggle="tab"><span class="glyphicon glyphicon-cog"></span>System Updates</a></li>
  <li><a href="#nli" data-toggle="tab"><span class="glyphicon glyphicon-list"></span>System Setup Files</a></li>  
</ul>

<div class="tab-content" style="margin-top: 5px;">
<div class="tab-pane active" id="home">
  	

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
<div class="tab-pane" id="nli">  

<br/><br/>

</center>
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




	
<script>
      $(document).ready(function () {
        
    // $('#sms_usage').dataTable({
    //   "paging":   true,
    //       "ordering": false,
    //       "info":     false
    //     }); 

        $('.send_email').click(function(e){
          e.preventDefault();
          var url = "<?php echo base_url(); ?>sms/log_summary_weekly";
          window.location.href = url;
        });

        $('#filter_month_year').click(function (y){
          y.preventDefault();
          var year = $('#year').val();
          var month = $('#month').val();
          var url = "<?php echo base_url(); ?>sms/new_weekly_usage/";
          if (year!=0) {url =url+year};
          if (month!=0) {
            if(year!=0){
              url =url+'/'+month;
            }else{
              url = url+''+'/'+month;
            }
          };          
          window.location.href = url;

        });
  });
</script>

