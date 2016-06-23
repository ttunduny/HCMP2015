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
  .full-width{
    width:100%;
  }
  .padding-hor-sm{
    padding:0 5px!important;
  }
  .top_filter_button{
    padding:8px 22px!important;
    margin:0;
    float:left;
    border-radius:0px;
    width:100%
  }

</style>
 <div class="container body">
      <div class="main_container">
        <?php $this->load->view('dashboard/dashboard_sidebar'); ?>

        <!-- page content -->
        <div class="right_col" role="main">

          <?php $this->load->view('dashboard/dashboard_top_tiles'); ?>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 x_panel">
              <div class="dashboard_graph">
              <div class=" clearfix col-md-12 x_title">
                
                <div class=" col-md-12">
                  <div class="col-md-12"><h2><?php echo $page_title.' Commodities'; ?></h2></div>
                </div>
                <div class="col-md-12">
                  <!-- <div class="col-md-5 padding-hor-sm">
                  <select class="form-control select2 padding-hor-sm" id="county_filter">
                  <option value="0">All Counties</option>
                  <?php foreach ($county_data as $county => $value):?> 
                      <option value="<?php echo $value['id']; ?>"><?php echo $value['county']; ?></option>
                  <?php endforeach; ?>
                  </select>
                  </div>

                  <div class="col-md-5 padding-hor-sm">
                    <select class="form-control select2 padding-hor-sm" id="sub_county_filter">
                    <option value="0">All Subcounties</option>
                    </select>
                  </div> -->

                    <!-- 
                    <div class="col-md-3">
                      <select class="form-control select2">
                      <option value="0">Select Subcounty</option>
                      <?php foreach ($district_data as $district => $value):?> 
                          <option value="<?php echo $value['id']; ?>"><?php echo $value['county']; ?></option>
                      <?php endforeach; ?>
                        <option>sample</option>
                      </select>
                    </div>
                     -->
                    <!--  
                    <div class="col-md-6">
                      <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                      </div>
                    </div>
                     -->
                    <!--  
                     <div class="col-md-2 padding-hor-sm">
                        <button class="btn btn-primary top_filter_button">Filter</button>
                     </div> 
                     -->
                  </div>

              </div>
                <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                    <h4>Coverage</h4>

                  <div id="map" style="height: 300px;"></div>
                  <script>
                  <?php $map_url = base_url()."assets/FusionMaps/FCMap_KenyaCounty.swf"; ?>
                    var map= new FusionMaps ("<?php echo $map_url;?>","KenyaMap","100%","100%","0","0");
                    map.setJSONData(<?php echo $maps; ?>
                      );

                    map.render("map");

                  </script>
                  <div class="row-fluid" style="height: 60px;">
                  <div class="col-md-1" >
                    <div id="map-key"></div>
                  </div>
                  <div class="col-md-8"><strong>Coverage: <?php echo $county_count; ?> Counties</strong> </div>
                </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <div id="mos"></div>
               <!--  
                    <h4>Shelf life (Expiries)</h4>
                  <div id="placeholder33" style="height: 300px; display: none" class="demo-placeholder"></div>
                  <div style="width: 100%;">
                    <div id="canvas_dahs" class="demo-placeholder" style="width: 100%; height:300px;"></div>
                  </div>
                -->
                </div> 

                <div class="clearfix"></div>
              </div>
            </div>

          </div>
          <br />
          <br />
         <div class="col-md-12">
           
          <div class="x_panel col-md-6">
              <div class="col-md-12 row">
                <div class="col-md-10 no-padding-no-margin">
                  <select class="select2 full-width" id="consumption_commodity">
                    <option value="0">Select Commodity</option>
                      <?php foreach ($tracer_commodities as $tracer => $value):?> 
                          <option value="<?php echo $value['id']; ?>"><?php echo $value['commodity_name']; ?></option>
                      <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-md-2 no-padding-no-margin">
                  <button class="btn btn-primary consumption_filter filter_button">Filter</button>
                </div>
              </div>

              <div class="col-md-12" id="consumption"></div>
          </div>
          <!-- <br /> -->

          <div class="x_panel col-md-6">
              <div class="col-md-12">
                <div class="col-md-10 no-padding-no-margin">
                  <select class="select2 full-width" id="expiry_commodity">
                    <option value="0">Select Commodity</option>
                      <?php foreach ($tracer_commodities as $tracer => $value):?> 
                          <option value="<?php echo $value['id']; ?>"><?php echo $value['commodity_name']; ?></option>
                      <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-md-2 no-padding-no-margin">
                  <button class="btn btn-primary region_filter filter_button">Filter</button>
                </div>
                <!-- <button class="btn btn-primary expiry_filter" style="padding:9px 22px!important;margin:0;">Filter Commodity</button> -->
              </div>
              <div class="col-md-12" id="actual"></div>
          </div>
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
      </div>
    </div>


