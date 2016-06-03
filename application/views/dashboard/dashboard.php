<?php //echo "<pre>";print_r($facility_count);exit; ?>
 <div class="container body">
      <div class="main_container">
        <?php $this->load->view('dashboard/dashboard_sidebar'); ?>

        <!-- top navigation -->
        <div class="top_nav">

          <!-- <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;">  Profile</a>
                    </li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:;">Help</a>
                    </li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image">
                                          <img src="images/img.jpg" alt="Profile Image" />
                                      </span>
                        <span>
                                          <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image">
                                          <img src="images/img.jpg" alt="Profile Image" />
                                      </span>
                        <span>
                                          <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image">
                                          <img src="images/img.jpg" alt="Profile Image" />
                                      </span>
                        <span>
                                          <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image">
                                          <img src="images/img.jpg" alt="Profile Image" />
                                      </span>
                        <span>
                                          <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a href="inbox.html">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>

              </ul>
            </nav>
          </div> -->

        </div>
        <!-- /top navigation -->


        <!-- page content -->
        <div class="right_col" role="main">

          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-medkit"></i> Total Commodities Tracked</span>
              <div class="count"><?php echo $commodity_count[0]['total_count'] ?></div>
              <span class="count_bottom">Supplied by: <b>KEMSA </b> and <b>MEDS</b></span>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-hospital-o"></i> Total Facilities Covered </span>
              <div class="count green"><?php echo $facility_count[0]['total_facilities']; ?></div>
              <!-- <span class="count_bottom"><b>All</b> facilities using HCMP</span> -->
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-building-o"></i> Total Facilities | Online Version</span>
              <div class="count"><?php echo $facility_count[0]['online_facilities']; ?></div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-desc"></i>12% </i> Nation-wide Coverage</span> -->
              <span class="count_bottom"> Facilities on <b class="green">Online Version</b></span>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-building"></i> Total Facilities | Offline Version</span>
              <div class="count"><?php echo $facility_count[0]['offline_facilities']; ?></div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>23% </i> Percentage Online</span> -->
              <span class="count_bottom"> Facilities on<b class="red"> Offline Version</b></span>
            </div>
            
          </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 x_panel">
              <div class="dashboard_graph">

                <div class="row x_title">
                <div class="col-md-12"><h2>Tracer Commodities</h2></div>
                  <!-- 
                  <div class="col-md-3">
                    <select class="form-control select2">
                    <option value="0">Select County</option>
                    <?php foreach ($county_data as $county => $value):?> 
                        <option value="<?php echo $value['id']; ?>"><?php echo $value['county']; ?></option>
                    <?php endforeach; ?>
                      <option>sample</option>
                    </select>
                  </div>
                   -->
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
          
          <div class="row">
            <!-- 
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel tile fixed_height_320">
                  <div class="x_title">
                    <h2>System Coverage</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="dashboard-widget-content">
                      <ul class="quick-list full-width">
                        <li><i class="fa fa-calendar-o"></i><a href="#">Counties Using HCMP: <b class="green">12</b></a>
                        </li>
                        <li><i class="fa fa-bars"></i><a href="#">Sub Counties using HCMP: <b class="green">40</b></a>
                        </li>
                        <li><i class="fa fa-area-chart"></i><a href="#">I think I'm tired: <b class="green">z<sup>zzz</sup></b></a>
                        </li>
                        <li><i class="fa fa-area-chart"></i><a href="#">Food for thought: <b class="green">...</b></a>
                        </li>
                        <li><i class="fa fa-area-chart"></i><a href="#">When a bald person's head aches : <span class="green">...</span></a>
                        </li>
                        <li><i class="fa fa-bars"></i><a href="#">Do they apply ROB on the whole head?: <b class="green"><i class="fa fa-hand-stop-o green"></i></b></a>
                        </li>
                        <li><i class="fa fa-bars"></i><a href="#">Or just at the tip of the Ice Berg: <b class="green"><i class="fa fa-hand-o-up green"></i></b></a>
                        </li>
                        <li><i class="fa fa-bars"></i><a href="#">Yep...I'm pretty sure I'm tired,Goodnight: <b class="green"><i class="fa fa-pause green"></i></b></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>Facility Stock Data</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="dashboard-widget-content">
                    <ul class="quick-list full-width">
                      <li><i class="fa fa-calendar-o"></i><a href="#">Facilities with expired XYZ: <b class="green">250</b></a>
                      </li>
                      <li><i class="fa fa-bars"></i><a href="#">Facilities stocked out of XYZ: <b class="green">320</b></a>
                      </li>
                      <li><i class="fa fa-bar-chart"></i><a href="#">Facilities with expired XYZ: <b class="green">250</b></a>
                      </li>
                      <li><i class="fa fa-line-chart"></i><a href="#">Facilities stocked out of XYZ: <b class="green">320</b></a>
                      </li>
                      <li><i class="fa fa-area-chart"></i><a href="#">Facilities with expired XYZ: <b class="green">250</b></a>
                      </li>
                      <li><i class="fa fa-bars"></i><a href="#">Facilities stocked out of XYZ: <b class="green">320</b></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Commodity Consumption</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
                      <th style="width:37%;">
                        <p>Zinc,ORS,Co-pack</p>
                      </th>
                      <th>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                          <p class="">Key</p>
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <canvas id="canvas1" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </td>
                      <td>
                        <table class="tile_info">
                          <tr>
                            <td>
                              <p><i class="fa fa-square blue"></i>Zinc </p>
                            </td>
                            <td>50%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square green"></i>ORS </p>
                            </td>
                            <td>25%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>Co-pack </p>
                            </td>
                            <td>25%</td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
             -->
          </div>
          <br />
         <!-- 
          <div class="row">
              <div class="col-md-12 x_panel" id="consumption"></div>
          </div>
          <br />

          <div class="row">
              <div class="col-md-12 x_panel" id="actual"></div>
          </div>
          <br />
           -->
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
    
          <div class="col-md-12">
          <center>
            <p class="text-muted"> Government of Kenya &copy <?php echo date('Y');?>. All Rights Reserved
              <!-- <a data-toggle="popover" title="Experiencing any challenges?  Send an Email to hcmphelpdesk@googlegroups.com" data-content=" Send an Email to hcmphelpdesk@googlegroups.com">Report problems</a> -->
            </p>
          </center>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>


