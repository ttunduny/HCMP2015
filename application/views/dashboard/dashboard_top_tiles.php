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