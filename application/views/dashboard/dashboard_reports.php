<?php //echo "<pre>";print_r($facility_count);exit; ?>
<style>
  .select2{
    float:left!important;
    width:100%!important;
  }
  .filter_button{
    padding:8px 22px!important;
    margin:0;
    float:left;
    border-radius:0px;
    width:100%
  }
  .download{
    padding: 8px 22px !important;
    margin: 0;
    border-radius: 0px;
    width: 100%;
    float: left;
    margin-left: 2px !important;
  }
  .full-width{
    width:100%;
  }
  .excel_{
    cursor: pointer;
  }
</style>
 <div class="container body">
      <div class="main_container">
        <?php $this->load->view('dashboard/dashboard_sidebar'); ?>
        <script src=<?php echo base_url()."assets/dashboard/vendors/jquery/dist/jquery.min.js"?>></script>
        <!-- top navigation -->
        <div class="top_nav">

        </div>
        <!-- /top navigation -->


        <!-- page content -->
        <div class="right_col" role="main">

          <?php $this->load->view('dashboard/dashboard_top_tiles'); ?>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 x_panel">
              <div class="dashboard_graph">

                <div class="row x_title">
                <div class="col-md-12"><h2><?php echo $page_title; ?></h2></div>
                <hr/>
                <div class="col-md-12"><h5><b>Select the County, Subcounty and Facility</b></h5></div>
                
                <div class="col-md-12" style="margin-top:1%">
                  <div class="col-md-4 padding-hor-sm">
                    <select class="form-control select2 padding-hor-sm" id="county_filter">
                    <option value="0">All Counties</option>
                    <?php foreach ($county_data as $county => $value):?> 
                        <option value="<?php echo $value['id']; ?>"><?php echo $value['county']; ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="col-md-4 padding-hor-sm">
                    <select class="form-control select2 padding-hor-sm" id="sub_county_filter">
                    <option value="0">All Subcounties</option>
                    </select>
                  </div>
                  <div class="col-md-4 padding-hor-sm">
                    <select class="form-control select2 padding-hor-sm" id="facility_id">
                    <option value="0">All Facilities</option>
                    </select>
                  </div>                     
                </div>
              <br/><br/>              
              <div class="col-md-12" style="margin-top:1%">
              <!-- <div class="col-md-6" style="margin-top:1%;float:left;"><h5>Select the Type of Report</h5></div> -->
              <div class="col-md-12" style="margin-top:1%;border:1px ridge;">
                  <div class="col-md-12" style="margin-top:1%;"><h5><b>Select the Type of Report</b></h5></div>
                  <br/>
                  <div class="col-md-2 padding-hor-sm" style="margin-top:1%;">
                    <label><input type="radio" name="report_type" checked="checked" id="consumption" value="consumption">Consumption</label>
                  </div>
                  <div class="col-md-2 padding-hor-sm" style="margin-top:1%;">
                    <label><input type="radio" name="report_type" id="stock_level" value="stock_level">Stock Level</label>
                  </div>

                  <!-- <div class="col-md-2 padding-hor-sm" style="margin-top:1%;">
                    <label><input type="radio" name="report_type" id="orders" value="orders">Orders</label>
                  </div>
 -->
                  <div class="col-md-2 padding-hor-sm" style="margin-top:1%;">
                    <label><input type="radio" name="report_type" id="potential_expiries" value="potential_expiries">Potential Expiries</label>
                  </div>

                  <div class="col-md-2 padding-hor-sm" style="margin-top:1%;">
                    <label><input type="radio" name="report_type" id="actual_expiries" value="actual_expiries">Actual Expiries</label>
                  </div>
                                      
                </div>               
                <!-- <div class="col-md-6" style="margin-top:1%;float:right"><h5>Select Commodity</h5></div> -->
                <div class="col-md-12" style="margin-top:1%;border:1px ridge;">
                    <div class="col-md-12" style="margin-top:1%;"><h5><b>Select Commodity Category</b></h5></div>
                    <br/>
                    <div class="col-md-2 padding-hor-sm" style="margin-top:1%;">
                      <label><input type="radio" name="commodity_category" id="programme_commodities" checked="checked" value="all">Programme Commodities</label>
                    </div>
                    <div class="col-md-2 padding-hor-sm" style="margin-top:1%;">
                      <label><input type="radio" name="commodity_category" id="tracer_commodities" value="tracer">Tracer Commodities</label>
                    </div>

                    <div class="col-md-2 padding-hor-sm" style="margin-top:1%;">
                      <label><input type="radio" name="commodity_category" id="specific_commodity" value="specify">Specify Commodity</label>                      
                    </div>   
                    <div class="col-md-2 padding-hor-sm" style="margin-top:1%;">                      
                    </div>   
                    <div class="col-md-2 padding-hor-sm" style="margin-top:1%;">                      
                    </div>   
                    <div class="col-md-12 padding-hor-sm" id="commodity_dropdown_div" style="margin-top:1%;margin-bottom:2%">
                      <div class="col-md-2 padding-hor-sm" style="margin-top:1%;">                      
                      <select class="form-control select2 padding-hor-sm" id="commodity_selected">
                      <?php
                        foreach ($commodities as $value => $commodity) :
                            $c_id = $commodity['id'];
                            $c_name = $commodity['commodity_name'];
                              echo "<option value='$c_id'>$c_name</option>";
                        endforeach;
                      ?>                        
                      </select>
                      </div>
                    </div>   
                    <div class="col-md-12 padding-hor-sm" id="division_dropdown_div" style="margin-top:1%;margin-bottom:1%">
                      <div class="col-md-2 padding-hor-sm" style="margin-top:1%;">                      
                      <select class="form-control select2 padding-hor-sm" id="division_selected">
                        <option value="0">Select Programme</option>                     
                      <?php
                        foreach ($programs as $value => $program) :
                          // echo "<pre>";print_r($program);die;
                            $p_id = $program['id'];
                            $p_name = $program['division_name'];
                              echo "<option value='$p_id'>$p_name</option>";
                        endforeach;
                      ?>                        
                      </select>
                      </div>
                    </div>   
                    <div class="col-md-12 padding-hor-sm" id="division_commodity_dropdown_div" style="margin-top:1%;margin-bottom:2%">
                      <div class="col-md-2 padding-hor-sm" style="margin-top:1%;">                      
                      <select class="form-control select2 padding-hor-sm" id="division_commodity_selected">
                        <option value="0">All Commodities</option>                     
                      </select>
                      </div>
                    </div>   
                  </div>  
                  <div class="col-md-12" style="margin-top:1%;border:1px ridge;">
                    <div class="col-md-12" style="margin-top:1%;"><h5><b>Select Commodity Size</b></h5></div>
                    <br/>                    
                    <div class="col-md-2 padding-hor-sm" style="margin-top:1%;">
                      <label><input type="radio" name="commodity_size" checked="checked" value="packs">Packs</label>
                    </div>

                    <div class="col-md-2 padding-hor-sm" style="margin-top:1%;">
                      <label><input type="radio" name="commodity_size" value="units">Units</label>
                    </div>


                    <div class="col-md-2 padding-hor-sm" style="margin-top:1%;">
                      
                    </div>
                                        
                  </div>
                  <div id="duration_normal" class="col-md-12" style="margin-top:1%;border:1px ridge;">
                    <div class="col-md-12" style="margin-top:1%;"><h5><b>Select the Duration</b></h5></div>
                    <br/>
                    <div class="col-md-2 padding-hor-sm" style="margin-top:1%;">
                      <label><input type="text" class="form-control clone_datepicker_normal_limit_today" name="from_date" id="from_date" placeholder="From"/></label>
                    </div>
                    <div class="col-md-2 padding-hor-sm" style="margin-top:1%;">
                      <label><input type="text" class="form-control clone_datepicker_normal_limit_today" name="to_date" id="to_date" placeholder="To"/></label>
                    </div>

                    <!-- <div class="col-md-2 padding-hor-sm" style="margin-top:1%;">
                      OR
                    </div>

                    <div class="col-md-2 padding-hor-sm" style="margin-top:1%;">
                      <button type="button" class="btn btn-success generate-annual" id="generate_annual">
                      <span class="glyphicon glyphicon-file"></span>  Generate Annual Report
                      </button>
                    </div> -->

                    <div class="col-md-2 padding-hor-sm" style="margin-top:1%;">
                      
                    </div>
                                        
                  </div> 

                  <div id="duration_potential" class="col-md-12" style="margin-top:1%;border:1px ridge;">
                    <div class="col-md-12" style="margin-top:1%;"><h5><b>Select the Interval</b></h5></div>
                    <br/>
                    <div class="col-md-2 padding-hor-sm" style="margin-top:1%;">
                      <label><input type="radio" name="potential_interval" checked="checked" value="3">Next 3 Months</label>
                    </div>

                    <div class="col-md-2 padding-hor-sm" style="margin-top:1%;">
                      <label><input type="radio" name="potential_interval" value="6">Next 6 Months</label>
                    </div>
                    <div class="col-md-2 padding-hor-sm" style="margin-top:1%;">
                      <label><input type="radio" name="potential_interval" value="12">Next 1 Year</label>
                    </div>


                    <div class="col-md-2 padding-hor-sm" style="margin-top:1%;">
                      
                    </div>
                                        
                  </div>     

                
                  <div class="col-md-12" style="margin-top:1%;border:1px ridge;">
                    <!-- <div class="col-md-12" style="margin-top:1%;"><h5>Generate Report</h5></div> -->
                    <br/>                    
                    <div class="col-md-2 padding-hor-sm" style="margin-top:1%;">
                      <button type="button" class="btn btn-success generate" id="generate">
                      <span class="glyphicon glyphicon-file"></span>  Generate Excel Report
                      </button>
                    </div>

                    <div class="col-md-2 padding-hor-sm" style="margin-top:1%;">
                      
                    </div>
                                        
                  </div>

                </div>  
                <div class="clearfix"></div>
              </div>
            </div>

          </div>
          <br />

          <div class="row">
            
          </div>
          <br />
         <div class="col-md-12">
           
          
                  <!-- <br /> -->
         </div>
          
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
    
          <div class="col-md-12">
          <center>
            <p class="text-muted"> Government of Kenya &copy <?php echo date('Y');?>. | All Rights Reserved
              <!-- <a data-toggle="popover" title="Experiencing any challenges?  Send an Email to hcmphelpdesk@googlegroups.com" data-content=" Send an Email to hcmphelpdesk@googlegroups.com">Report problems</a> -->
            </p>
          </center>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
        <script type="text/javascript">
          $(document).ready(function(){
            var url ='<?php echo base_url()?>';
            $("#generate_annual").click(function() {              
              var county_id=$('#county_filter').val();
              var district=$("#sub_county_filter").val();
              var facility=$("#facility_id").val();
              var interval=$("#potential_interval").val();
              var criteria = $('input[name=report_type]:checked').val()
              var commodity_size = $('input[name=commodity_size]:checked').val()
              var type = 'excel';
              var d = new Date();
              var n = d.getFullYear();
              var from =("1 Jan ")+ n;
              var to =("31 Dec ")+ n;
              var commodity_id=$('#specific_commodity').val();
              var commodity_type = $('input[name=commodity_category]:checked').val()
              var link='';        
              if(from==''){from="NULL";}
              if(to==''){to="NULL";}

              if(criteria=='consumption'){
                if(commodity_type=='tracer'){                
                  link='national/consumption_annual_report/'+county_id+'/'+district+'/'+facility+'/NULL/excel/'+encodeURI(from)+ '/'+encodeURI(to);
                }
                if(commodity_type=='all'){
                  var commodity_id=$('#commodity_selected').val();                
                  link='national/consumption_annual_report/'+county_id+'/'+district+'/'+facility+'/'+commodity_id+'/excel/'+encodeURI(from)+ '/'+encodeURI(to);
                }
                if(commodity_type=='specify'){
                  var commodity_id=$('#commodity_selected').val();  
                  link='national/consumption_annual_report/'+county_id+'/'+district+'/'+facility+'/'+encodeURI(commodity_id)+'/excel/'+encodeURI(from)+ '/'+encodeURI(to);  
                }               
              }else if(criteria=='stock_level'){
                if(commodity_type=='tracer'){  
                  if(commodity_size=='units'){
                    link='national/stock_level_units/'+county_id+'/'+district+'/'+facility_id+'/NULL/excel';
                  }else{
                    link='national/stock_level_packs/'+county_id+'/'+district+'/'+facility_id+'/NULL/excel';
                  }             
                  
                }
                if(commodity_type=='all'){
                  var commodity_id=$('#commodity_selected').val();   
                  if(commodity_size=='units'){
                    link='national/stock_level_units/'+county_id+'/'+district+'/'+facility_id+'/'+commodity_id+'/excel';
                  }else{
                    link='national/stock_level_packs/'+county_id+'/'+district+'/'+facility_id+'/NULL/excel';
                  }               
                  
                }
                if(commodity_type=='specify'){
                  var commodity_id=$('#commodity_selected').val();  
                  if(commodity_size=='units'){
                    link='national/stock_level_units/'+county_id+'/'+district+'/'+facility_id+'/'+commodity_id+'/excel';
                  }else{
                    link='national/stock_level_packs/'+county_id+'/'+district+'/'+facility_id+'/'+commodity_id+'/excel';
                  }  
                  
                }               
              }else if(criteria=='orders'){
                link='national/order/NULL/'+county_id+'/'+district+'/'+facility_id+'/excel';
              }else if(criteria=='actual_expiries'){
                if(commodity_type=='tracer'){  
                  if(commodity_size=='units'){
                    link='national/expiry/NULL/'+county_id+'/'+district+'/'+facility_id+'/excel';
                  }else{
                    link='national/expiry/NULL/'+county_id+'/'+district+'/'+facility_id+'/excel';
                  }             
                  
                }
                if(commodity_type=='all'){
                  var commodity_id=$('#commodity_selected').val();   
                  if(commodity_size=='units'){
                    link='national/expiry/NULL/'+county_id+'/'+district+'/'+facility_id+'/excel';
                  }else{
                    link='national/expiry/NULL/'+county_id+'/'+district+'/'+facility_id+'/excel';
                  }               
                  
                }
                if(commodity_type=='specify'){
                  var commodity_id=$('#commodity_selected').val();  
                  if(commodity_size=='units'){
                    link='national/expiry/NULL/'+county_id+'/'+district+'/'+facility_id+'/excel/'+commodity_id;                                
                  }else{
                    link='national/expiry/NULL/'+county_id+'/'+district+'/'+facility_id+'/excel/'+commodity_id;                                
                  }  
                  
                }               
              }else if(criteria=='potential_expiries'){                
                if(commodity_type=='all'){
                  var commodity_id=$('#commodity_selected').val();   
                  link='national/potential/'+county_id+'/'+district+'/'+facility_id+'/excel/'+potential_interval;                           
                }
                if(commodity_type=='specify'){
                  var commodity_id=$('#commodity_selected').val();  
                  link='national/potential/'+county_id+'/'+district+'/'+facility_id+'/excel/'+potential_interval+'/'+commodity_id;
                  
                }               
              }
              window.open(url+link,'_parent');
            }); 
            $("#generate").click(function() {                     
              var county_id=$('#county_filter').val();
              var district=$("#sub_county_filter").val();
              var facility=$("#facility_id").val();
              var interval=$("#potential_interval").val();
              var criteria = $('input[name=report_type]:checked').val()
              var commodity_size = $('input[name=commodity_size]:checked').val()
              var type = 'excel';
              var from =$("#from_date").val();
              var to =$("#to_date").val();
              var commodity_id=$('#specific_commodity').val();
              var commodity_type = $('input[name=commodity_category]:checked').val()
              var link='';        
              if(from==''){from="NULL";}
              if(to==''){to="NULL";}
                            
              if(criteria=='consumption'){
                if(commodity_type=='tracer'){      
                // $county_id=NULL,$district_id=NULL,$facility_code=NULL,$commodity_category=NULL,$programme=NULL,$commodity_id=NULL,$commodity_size=NULL,$from=NULL,$to=NULL){          
                  link='national/reports_consumption_new/'+county_id+'/'+district+'/'+facility+'/tracer/NULL/NULL/'+commodity_type+'/'+commodity_size+'/'+encodeURI(from)+ '/'+encodeURI(to);
                  // link='national/consumption_annual_report/'+county_id+'/'+district+'/'+facility+'/NULL/excel/'+encodeURI(from)+ '/'+encodeURI(to);
                }
                // if(commodity_type=='all'){
                //   var commodity_id=$('#commodity_selected').val();                
                //   link='national/consumption_annual_report/'+county_id+'/'+district+'/'+facility+'/'+commodity_id+'/excel/'+encodeURI(from)+ '/'+encodeURI(to);
                // }
                if(commodity_type=='specify'){
                  var commodity_id=$('#commodity_selected').val(); 
                  // $county_id=NULL,$district_id=NULL,$facility_code=NULL,$commodity_category=NULL,$programme=NULL,$commodity_id=NULL,$commodity_size=NULL,$from=NULL,$to=NULL){ 
                  link='national/reports_consumption_new/'+county_id+'/'+district+'/'+facility+'/specify/NULL/'+commodity_id+'/'+commodity_size+'/'+encodeURI(from)+ '/'+encodeURI(to);
                  // link='national/consumption_annual_report/'+county_id+'/'+district+'/'+facility+'/'+encodeURI(commodity_id)+'/excel/'+encodeURI(from)+ '/'+encodeURI(to);  
                }               
              }else if(criteria=='stock_level'){
                if(commodity_type=='tracer'){  
                  if(commodity_size=='units'){
                    link='national/stock_level_units/'+county_id+'/'+district+'/'+facility_id+'/NULL/excel';
                  }else{
                    link='national/stock_level_packs/'+county_id+'/'+district+'/'+facility_id+'/NULL/excel';
                  }             
                  
                }
                if(commodity_type=='all'){
                  var commodity_id=$('#commodity_selected').val();   
                  if(commodity_size=='units'){
                    link='national/stock_level_units/'+county_id+'/'+district+'/'+facility_id+'/'+commodity_id+'/excel';
                  }else{
                    link='national/stock_level_packs/'+county_id+'/'+district+'/'+facility_id+'/NULL/excel';
                  }               
                  
                }
                if(commodity_type=='specify'){
                  var commodity_id=$('#commodity_selected').val();  
                  if(commodity_size=='units'){
                    link='national/stock_level_units/'+county_id+'/'+district+'/'+facility_id+'/'+commodity_id+'/excel';
                  }else{
                    link='national/stock_level_packs/'+county_id+'/'+district+'/'+facility_id+'/'+commodity_id+'/excel';
                  }  
                  
                }               
              }else if(criteria=='orders'){
                link='national/order/NULL/'+county_id+'/'+district+'/'+facility_id+'/excel';
              }else if(criteria=='actual_expiries'){
                if(commodity_type=='tracer'){  
                  if(commodity_size=='units'){
                    link='national/expiry/NULL/'+county_id+'/'+district+'/'+facility_id+'/excel';
                  }else{
                    link='national/expiry/NULL/'+county_id+'/'+district+'/'+facility_id+'/excel';
                  }             
                  
                }
                if(commodity_type=='all'){
                  var commodity_id=$('#commodity_selected').val();   
                  if(commodity_size=='units'){
                    link='national/expiry/NULL/'+county_id+'/'+district+'/'+facility_id+'/excel';
                  }else{
                    link='national/expiry/NULL/'+county_id+'/'+district+'/'+facility_id+'/excel';
                  }               
                  
                }
                if(commodity_type=='specify'){
                  var commodity_id=$('#commodity_selected').val();  
                  if(commodity_size=='units'){
                    link='national/expiry/NULL/'+county_id+'/'+district+'/'+facility_id+'/excel/'+commodity_id;                                
                  }else{
                    link='national/expiry/NULL/'+county_id+'/'+district+'/'+facility_id+'/excel/'+commodity_id;                                
                  }  
                  
                }               
              }else if(criteria=='potential_expiries'){                
                if(commodity_type=='all'){
                  var commodity_id=$('#commodity_selected').val();   
                  link='national/potential/'+county_id+'/'+district+'/'+facility_id+'/excel/'+potential_interval;                           
                }
                if(commodity_type=='specify'){
                  var commodity_id=$('#commodity_selected').val();  
                  link='national/potential/'+county_id+'/'+district+'/'+facility_id+'/excel/'+potential_interval+'/'+commodity_id;
                  
                }               
              }
              // window.open(url+link,'_parent');
              window.open(url+link,'_blank');
            });        
          });
        </script>
      </div>
    </div>