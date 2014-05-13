<div class="row" style="margin-left: 1%">
	<div class="col-md-4">
		<div class="row">			
			<div class="col-md-12">
				<div class="panel panel-success">
      		<div class="panel-heading">
        		<h3 class="panel-title">Notification <span class="glyphicon glyphicon-bell"></span> </h3>
      		</div>
            <div class="panel-body">
    <?php if($county_dashboard_notifications['facility_donations']>0): ?>
      	 <div style="height:auto; margin-bottom: 2px" class="warning message ">      	
        <h5>Inter Facility Donation</h5> 
        	<p>
			<a class="link" href=""><span class="badge"><?php 
				echo $county_dashboard_notifications['facility_donations'];?></span> Items have been donated in your area</a> 
			</p>
			 </div>
		  <?php endif; // Potential Expiries?>
         <?php if($county_dashboard_notifications['actual_expiries']>0): ?>
        <div style="height:auto; margin-bottom: 2px" class="warning message ">       	
        <h5>Expired Commodities</h5>
        	<p>
			<a class="link" href="<?php echo base_url('reports/county_expiries') ?>"> <span class="badge"><?php 
				echo $county_dashboard_notifications['actual_expiries'];?></span>Expired Commodities in your area</a> 
			</p> 
        </div>
         <?php endif; // Actual Expiries?>
          <?php if($county_dashboard_notifications['potential_expiries']>0): ?>
      	 <div style="height:auto; margin-bottom: 2px" class="warning message ">      	
        <h5>Potential Expiries</h5> 
        	<p>
			<a class="link" href="<?php echo base_url('reports/county_expiries') ?>"><span class="badge"><?php 
				echo $county_dashboard_notifications['potential_expiries'];?></span>Commodities Expiring in the next 6 months in your area</a> 
			</p>
			 </div>
		  <?php endif; // Potential Expiries?>
         <?php if($county_dashboard_notifications['items_stocked_out_in_facility']>0): ?>
        <div style="height:auto; margin-bottom: 2px" class="warning message ">       	
        <h5>Stock Outs</h5>
        	<p>
			<a class="link" href="<?php echo base_url('reports/facility_stocked_out_items') ?>"> <span class="badge">
		<?php echo $county_dashboard_notifications['items_stocked_out_in_facility'] ?></span>facilities have stocked out items</a> 
			</p> 
        </div>
        <?php endif; // items_stocked_out_in_facility?>
        <?php if(array_key_exists('pending', $county_dashboard_notifications['facility_order_count']) 
        && @$county_dashboard_notifications['facility_order_count']['pending']>0): ?>
      	<div style="height:auto; margin-bottom: 2px" class="warning message ">      	
        	<h5>Orders Pending Approval by District Pharmacist</h5> 
        	<p>
			<a class="link" href="<?php echo base_url('reports/order_listing/facility') ?>"><span class="badge"><?php 
			echo $county_dashboard_notifications['facility_order_count']['pending'] ?></span>Order(s) Pending in your area</a> 
			</p>
        </div>
        <?php endif; //pending
         if(array_key_exists('rejected', $county_dashboard_notifications['facility_order_count']) 
         && @$county_dashboard_notifications['facility_order_count']['rejected']>0): ?>
        <div style="height:auto; margin-bottom: 2px" class="warning message ">      	
        	<h5>Orders Rejected by District Pharmacist</h5> 
        	<p>
			<a class="link" href="<?php echo base_url('reports/order_listing/subcounty/true') ?>"><span class="badge"><?php 
			echo $county_dashboard_notifications['facility_order_count']['rejected'] ?></span>Order(s) rejected in your area</a> 
			</p>
        </div>
        <?php endif; //rejected
        if(array_key_exists('approved', $county_dashboard_notifications['facility_order_count'])
		 && @$county_dashboard_notifications['facility_order_count']['approved']>0): ?>
        <div style="height:auto; margin-bottom: 2px" class="warning message ">      	
        	<h5>Pending Dispatch</h5> 
        	<p>
			<a class="link" href="<?php echo base_url('reports/order_listing/subcounty/true') ?>"><span class="badge"><?php 
			echo $county_dashboard_notifications['facility_order_count']['approved'] ?></span>Order(s) pending dispatch from KEMSA</a> 
			</p>
        </div>
         <?php endif; //approved?>
      </div>     
    </div>
	</div>
		</div>
	<div class="row">			
			<div class="col-md-12">				
			<div class="panel panel-success">
      		<div class="panel-heading">
        		<h3 class="panel-title">Actions <span class="glyphicon glyphicon-list-alt"></span></h3>
      </div>
      <div class="panel-body">

      </div>
        </div>      

      </div>    
    </div>
	</div>
  <div class="col-md-8">
    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">Analysis <span class="glyphicon glyphicon-stats" style=""></span><span class="glyphicon glyphicon-align-left" style="margin-left: 1%"></span></h3>
      </div>
      <div class="panel-body" style="overflow-y: auto">
        <div style="/*border: 1px solid #036;*/ ;" id="container"></div>
      </div>
    </div>
  </div>  
	</div>	