<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       google-analytic
 * @since      1.0.0
 *
 * @package    Google_Analytic
 * @subpackage Google_Analytic/admin/partials
 */
 

?>
 
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="analytics-pane-wrapper ng-scope ng-isolate-scope page-insights ">
	<div class="analytics-filter-panel-wrapper">
		<div class="ndl-FilterPanel ndl-FilterPanel--expanded is-expanded ana-AnalyticsFilterPanel">
 			<div id="accordion">
			  <h3>Saved Views</h3>
			  <div>
			    <p>
			      No saved views
			    </p>
			  </div>
			  <h3>Filters</h3>
			  <div class="filter">
					<div id='container-inner-acc'>
					  <h3>Campaigns</h3>
					  <div class='content' style="display:block"> 
					  	<div class="campaigns-filter-button-wrapper">
						    <button class="ndl-Button ndl-Button--default ndl-Button--small" type="button">
						        <span class="nc-icon ndl-Icon ndl-Button-icon">
						            <i class="nc-icon-wrapper">
						                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 16">
						                    <g transform="translate(0, 0)">
						                        <rect x="6" y="12" fill="#444444" width="4" height="4"></rect>
						                        <rect x="6" fill="#444444" width="4" height="4"></rect>
						                        <rect x="12" y="12" fill="#444444" width="4" height="4"></rect>
						                        <rect y="12" fill="#444444" width="4" height="4"></rect>
						                        <path data-color="color-2" fill="#444444" d="M3,9h4v2h2V9h4v2h2V8c0-0.6-0.4-1-1-1H9V5H7v2H2C1.4,7,1,7.4,1,8v3h2V9z"></path>
						                    </g>
						                </svg>
						            </i>
						        </span>
						        <span class="ndl-Button-label">Select Campaigns</span>
						    </button>
						</div>

					  </div>
					  <h3>Content Type</h3>
					  <div class='content'> 
					  	<button class="ndl-Button ndl-Button--inline ndl-Button--small ndl-OptionGroup-selectAll" type="button"><span class="ndl-Button-label">Select all</span></button>
					  	<ul class="tick-to-check">
					  		<li><label><input type="checkbox" class="field-set">Licensed</label></li>
					  		<li><label><input type="checkbox" class="field-set">Original</label></li>
					  	</ul>
					  </div>
					  <h3>Word Count</h3>
					  <div class='content'>  No Content </div>
					  <h3>Publish Date</h3>
					  <div class='content'>  No Content </div>
					  <h3>Authors</h3>
					  <div class='content'> 
					  	<button class="ndl-Button ndl-Button--inline ndl-Button--small ndl-OptionGroup-selectAll" type="button"><span class="ndl-Button-label">Select all</span></button>
					  	<ul class="tick-to-check">
					  		<li><label><input type="checkbox" class="field-set">Dee del Carmen</label></li>
					  		<li><label><input type="checkbox" class="field-set">Denize del Carmen Dolor Dollaga - Technical</label></li>
					  		<li><label><input type="checkbox" class="field-set">Consultant, LafargeHolcim Aggregates Inc. Dolor Dollaga, Technical</label></li>
					  		<li><label><input type="checkbox" class="field-set">Consultant at LafargeHolcim Aggregates Inc.</label></li>
					  		<li><label><input type="checkbox" class="field-set">Don Gil Carreon</label></li>
					  		<li><label><input type="checkbox" class="field-set">Editoral Staff</label></li>
					  		<li><label><input type="checkbox" class="field-set">Editorial Name</label></li>
					  		<li><label><input type="checkbox" class="field-set">Editorial Staff</label></li>
					  	</ul>
					  	
					  </div>
					  <h3>Channels</h3>
					  <div class="content channel">
					  	<ul class="tick-to-check">
					  		<li><label><input type="checkbox" value="(Other)" class="field-set">(Other)</label></li>
					  		<li><label><input type="checkbox" value="Direct" class="field-set">Direct</label></li>
					  		<li><label><input type="checkbox" value="Display" class="field-set">Display</label></li>
					  		<li><label><input type="checkbox" value="Email" class="field-set">Email</label></li>
					  		<li><label><input type="checkbox" value="Organic Search" class="field-set">Organic Search</label></li>
					  		<li><label><input type="checkbox" value="Paid Search" class="field-set">Paid Search</label></li>
					  		<li><label><input type="checkbox" value="Referral" class="field-set">Referral</label></li>
					  		<li><label><input type="checkbox" value="Social" class="field-set">Social</label></li>
					  	</ul>	
					  </div>
					  <h3>Sources</h3>
					  <div class='content'> 
					  	<ul class="tick-to-check">
					  		<li><label><input type="checkbox" class="field-set">Lafarge Holcim</label></li>
					  	</ul>
					   </div>
					  <h3>Wordpress Tags</h3>
					  <div class='content'> 
					    <ul class="tick-to-check">
					  		<li><label><input type="checkbox" class="field-set">A4 priority group</label></li>
					  		<li><label><input type="checkbox" class="field-set">Lafarge Holcim</label></li>
					  		<li><label><input type="checkbox" class="field-set">Lafarge Holcim</label></li>
					  		<li><label><input type="checkbox" class="field-set">Lafarge Holcim</label></li>
					  		<li><label><input type="checkbox" class="field-set">Lafarge Holcim</label></li>
					  	</ul>
					  </div>
					  <h3>Wordpress Categories</h3>
					  <div class='content'>
					  	<ul class="tick-to-check">
					  		<li><label><input type="checkbox" class="field-set">Ads</label></li>
					  		<li><label><input type="checkbox" class="field-set">Arch Designs</label></li>
					  		<li><label><input type="checkbox" class="field-set">Buhay Builder</label></li>
					  		<li><label><input type="checkbox" class="field-set">Buhay Contractor</label></li>
					  		<li><label><input type="checkbox" class="field-set">ConstrucTips</label></li>
					  		<li><label><input type="checkbox" class="field-set">COVID-19 Updates</label></li>
					  		<li><label><input type="checkbox" class="field-set">Curated</label></li>
					  		<li><label><input type="checkbox" class="field-set">Featured</label></li>
					  	</ul>
					  </div>
					  
					  <h3>Content Format</h3>
					  <div class='content'> 
					  	<ul class="tick-to-check">
					  		<li><label><input type="checkbox" class="field-set">Article</label></li>
					  		<li><label><input type="checkbox" class="field-set">Infographic</label></li>
					  		<li><label><input type="checkbox" class="field-set">Listicle</label></li>
					  		<li><label><input type="checkbox" class="field-set">Quiz</label></li>
					  		<li><label><input type="checkbox" class="field-set">Survey</label></li>
					  		<li><label><input type="checkbox" class="field-set">Video</label></li>
					  		<li><label><input type="checkbox" class="field-set">Webinar</label></li>
					  	</ul>
					   </div>
					  <h3>Content Pillar</h3>
					  <div class='content'> 
					  	<ul class="tick-to-check">
					  		<li><label><input type="checkbox" class="field-set">Buhay Contractor</label></li>
					  		<li><label><input type="checkbox" class="field-set">ConstrucTips</label></li>
					  		<li><label><input type="checkbox" class="field-set">Health & Safety</label></li>
					  		<li><label><input type="checkbox" class="field-set">News & Innovation</label></li>
					  		<li><label><input type="checkbox" class="field-set">Professional Learning</label></li>
					  	</ul>
					  </div>
					  <h3>Journey Stage</h3>
					  <div class='content'>
					  	<ul class="tick-to-check">
					  		<li><label><input type="checkbox" class="field-set">Bottom of the Funnel</label></li>
					  		<li><label><input type="checkbox" class="field-set">Middle of the Funnel</label></li>
					  		<li><label><input type="checkbox" class="field-set">Top of the Funnel</label></li>
					  	</ul>
					   </div>
					  <h3>Project Stage</h3>
					  <div class='content'> 
					  	<ul class="tick-to-check">
					  		<li><label><input type="checkbox" class="field-set">Acceptance</label></li>
					  		<li><label><input type="checkbox" class="field-set">Bid</label></li>
					  		<li><label><input type="checkbox" class="field-set">Construction</label></li>
					  		<li><label><input type="checkbox" class="field-set">Design</label></li>
					  		<li><label><input type="checkbox" class="field-set">Groundwork</label></li>
					  		<li><label><input type="checkbox" class="field-set">Mobilization</label></li>
					  		<li><label><input type="checkbox" class="field-set">Planning</label></li>
					  		<li><label><input type="checkbox" class="field-set">Prospecting</label></li>
					  	</ul>
					   </div>
					  <h3>Target Audience</h3>
					  <div class='content'>
					  	<ul class="tick-to-check">
					  		<li><label><input type="checkbox" class="field-set">General Public</label></li>
					  		<li><label><input type="checkbox" class="field-set">Influencers</label></li>
					  		<li><label><input type="checkbox" class="field-set">National Contractor</label></li>
					  		<li><label><input type="checkbox" class="field-set">Private Contractor</label></li>
					  		<li><label><input type="checkbox" class="field-set">SBC</label></li>
					  		<li><label><input type="checkbox" class="field-set">SPC</label></li>
					  		<li><label><input type="checkbox" class="field-set">Specifiers</label></li>
					  	</ul>
					  </div>
					</div>
			      
			  </div>
			   
			   
			</div>
		</div>
	</div>

	<div class="analytics-main-pane-wrapper">
	     
		<div class="analytics-header analytics-main-pane">
			<nc-analytics-header active-link="content" class="ng-isolate-scope">
			    <div class="insights-header">
			    	<div class="sticky-header">
			    		<h3>Analytics</h3>
			    		<!--DeateRange-->
						<div class="nc-date-range-picker-wrapper">
						    <div class="controls">
						        <div class="nc-flat-date-range-picker rfloat ng-isolate-scope" on-date-range-select="$ctrl.onDateRangeSelect">
						            <div class="rfloat">
						                
						          <?php 
		 
                                    $date_add = strtotime("-10 day");
                                    $prestent_date = date('M j Y', $date_add);
                                    $latest = date('M j Y');
                                    
                                    
                                    $date_add_prev = strtotime("-2 month");
									$prestent_date_start = date('M j Y', $date_add_prev);

									$date_add_prevlates = strtotime("-1 month");
									$prestent_date_end = date('M j Y', $date_add_prevlates);
                                    
                                     

                                    						          
						          ?>      
						          <input class="flatpickr nc-input flatpickr-input" type="hidden" value="<?php echo $prestent_date; ?> to <?php echo $latest;?>" />
						            <input  class="daterange" value="<?php echo $prestent_date; ?> to <?php echo $latest;?>" class="flatpickr nc-input flatpickr-input form-control input" placeholder="" type="text" /></div>
						            <div class="dropdown rfloat">
						                 
						                <select name="generaldate" class="dropdown-menu"id="generaldate" >
						                	<option value="-30 day">Past 30 Days</option>
						                	<option value="now">Year To Date</option>
						                	<option value="-8 day">Past 7 Days</option>
						                	<option value="-90 day">Past 90 Days</option>
						                	<option value="-5 day">Last Week</option>
						                	<option value="-30 day">Last Month</option>
						                	<option value="-95 day">Last Quarter</option>
						                	<option value="-365 day">Last Year</option>
						                </select>
						              
						            </div>
						        </div>
						        <!--nc-compare-period start-date="$ctrl.startDate" end-date="$ctrl.endDate" compare-label="$ctrl.label" date-format="$ctrl.dateFormat" on-compare-select="$ctrl.onCompareSelect" class="ng-isolate-scope">
						            <div class="compare-period-wrapper">
						                <span class="selected">Compare to </span>

						                <select name="Previousp" class="dropdown-menu dropdown"id="Previousp" >
						                	<option value="month">Previous Period</option>
						                	<option value="year">Same Period Last year</option>
						                	<option value="custom">Custom Period</option>
						                </select>
						                <span class="compare-separator">:</span>
						                 
						                <span class="compare-dates ng-hide" ng-show="$ctrl.selectedCompare.custom">
						                    <input id="compare-range-picker" readonly value="<?php echo $prestent_date_start.' to '.$prestent_date_end;?>" class="flatpickr nc-input" type="text" />
						                </span>
						            </div>
						        </nc-compare-period-->
						         
						    </div>
						</div>

						<!--End Daterange-->
			    	</div>
			        <div>
			            
			            <ul class="ndl-SecondaryTab ndl-SecondaryTab--medium secondary-tab">
			                <li class="ndl-SecondaryTab-item">
			                    <div class="ndl-SecondaryTab-option ndl-Option is-active" role="menuitem"><span class="ndl-Option-label">Content</span></div>
			                </li>
			                <li data="new-returning" class="ndl-SecondaryTab-item">
			                    <div class="ndl-SecondaryTab-option ndl-Option" role="menuitem"><span class="ndl-Option-label">New vs Returning</span></div>
			                </li>
			                <li data="action" class="ndl-SecondaryTab-item">
			                    <div class="ndl-SecondaryTab-option ndl-Option" role="menuitem"><span class="ndl-Option-label">Actions</span></div>
			                </li>
			                <li data="ROI" class="ndl-SecondaryTab-item">
			                    <div class="ndl-SecondaryTab-option ndl-Option" role="menuitem"><span class="ndl-Option-label">ROI</span></div>
			                </li>
			            </ul>
			        </div>
			    </div>
			</nc-analytics-header>

			

		</div>
		<div class="analytics-content analytics-main-pane ng-scope">
			<!-- Content Header-->
 		
 				<?php include( plugin_dir_path( __FILE__ ) . '/analytic-data.php' ); ?>
 				<?php include( plugin_dir_path( __FILE__ ) . '/analytic-datatable.php' ); ?>	

		</div>
			
			
				
	</div>

</div>
<div id="loading" style="display: none;">
    <div class="sticky"></div> 
    <img class="load-image" src="https://wordpress.afterhours.com.ph/wp-content/plugins/purple/admin/partials/event/images/loader.gif">
</div>
<style>
div#loading {
position: fixed;
    text-align: center;
    top: 0;
    background: #4f4f4f26;
    width: 100%;
    height: 100%;
    z-index: 9999999999999;
    left: 0;
}
div#loading img.load-image {
    position: absolute;
    top: 50%;
}
</style>
<script>
jQuery('.content.channel ul.tick-to-check li label input').click(function () {
    jQuery(this).toggleClass('active');
    var dates = jQuery('input.daterange').val();
    var prevdate = jQuery('select#generaldate').val();
    jQuery('.my-chart').css('opacity','.5');
    
    var chan = new Array();
    jQuery('.content.channel ul.tick-to-check li').each(function (){
        if(jQuery(this).children('label').find('input').hasClass('active')){
            chan.push(jQuery(this).children('label').find('input').val());
        }
    });
    console.log(chan);
  jQuery.ajax({
        type : "GET",
        url : ajaxurl,
        data : {action: "channel_analytic",val:'channel',channel:chan.join('-'),dates:dates,prevdate:prevdate},
        beforeSend: function(response){
            jQuery('div#loading').show();
        },
        success: function(response) {
            jQuery('div#loading').hide();
         jQuery('.my-chart').html(response);
         jQuery('.my-chart').css('opacity','1');

        	
       }
   }); 
});

jQuery('.pillbox-toggle.date-action button').click(function (){
     jQuery('.pillbox-toggle.date-action button').removeClass('active');
        jQuery(this).addClass('active');
        var dates = jQuery('input.daterange').val();
        var prevdate = jQuery('select#generaldate').val();
 
        var chan = new Array();
        jQuery('.content.channel ul.tick-to-check li').each(function (){
    
            if(jQuery(this).children('label').find('input').hasClass('active')){
                chan.push(jQuery(this).children('label').find('input').val());
            }
        });
 
    jQuery.ajax({
        type : "GET",
        url : ajaxurl,
        data : {action: "channel_analytic",val:'channel',task:'button',channel:chan.join('-'),dates:dates,prevdate:prevdate},
        beforeSend: function(response){
            jQuery('div#loading').show();
        },
        success: function(response) {
            jQuery('div#loading').hide();
         jQuery('.my-chart').html(response);
         jQuery('.my-chart').css('opacity','1');

        	
       }
   });    
});

</script>

 