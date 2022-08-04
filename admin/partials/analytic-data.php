<?php
	$article_1 = $article_total['total'] < $GA_prev['articleview'] ?  $article_total['total'] / $GA_prev['articleview'] * 100 : $GA_prev['articleview'] / $article_total['total'] * 100;
	$article_status_2 = $article_total['total'] < $GA_prev['articleview'] ?  'low': 'high';

	$page_1 = $pageview < $GA_prev['pageviews'] ?  $pageview / $GA_prev['pageviews'] * 100 : $GA_prev['pageviews'] / $pageview * 100;
	$page_status_2 = $pageview < $GA_prev['pageviews'] ?  'low': 'high';


	$uniqueview_1 = $uniquePageviews < $GA_prev['uniquePageviews'] ?  $uniquePageviews / $GA_prev['uniquePageviews'] * 100 : $GA_prev['uniquePageviews'] / $uniquePageviews * 100;
	$unique_status_2 = $uniquePageviews < $GA_prev['uniquePageviews'] ?  'low': 'high';

	$rateview_1 = $avgTimeOnPage < $GA_prev['avgTimeOnPage'] ?  $avgTimeOnPage / $GA_prev['avgTimeOnPage'] * 100 : $GA_prev['avgTimeOnPage'] / $data['avgTimeOnPage']['total'] * 100;
	$rate_status_2 = $avgTimeOnPage < $GA_prev['avgTimeOnPage'] ?  'low': 'high';
 ?>

			<div class="summary-wrapper undefined">
			    <div class="metric-container">
			        <span class="nc-icon summary-bar-icon">
			            <i class="nc-icon-wrapper">
			                <svg viewBox="0 0 18 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
			                    <desc>Created with Sketch.</desc>
			                    <defs></defs>
			                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
			                        <g id="Analytics-2018_Content_B" transform="translate(-254.000000, -242.000000)" stroke="#777777">
			                            <g id="file-paragraph" transform="translate(254.000000, 242.000000)">
			                                <rect id="Rectangle-path" x="0.625" y="0.625" width="16.25" height="18.75"></rect>
			                                <path d="M10.625,4.375 L13.125,4.375" id="Shape"></path>
			                                <path d="M10.625,8.125 L13.125,8.125" id="Shape"></path>
			                                <path d="M4.375,11.875 L13.125,11.875" id="Shape"></path>
			                                <path d="M4.375,15.625 L13.125,15.625" id="Shape"></path>
			                                <rect id="Rectangle-path" x="4.375" y="4.375" width="3.75" height="3.75"></rect>
			                            </g>
			                        </g>
			                    </g>
			                </svg>
			            </i>
			        </span>
			        <div class="value-container">
			            <span class="current"><?php echo $article_total['total'];?></span>
			            <div class="delta-container">
			                <span class="nc-icon label-icon <?php echo $article_status_2 ; ?> delta-positive">
			                    <i class="nc-icon-wrapper">
			                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 16">
			                            <g transform="translate(0, 0)"><polygon fill="#444444" points="8,11.4 2.6,6 4,4.6 8,8.6 12,4.6 13.4,6 "></polygon></g>
			                        </svg>
			                    </i>
			                </span>
			                <span class="label-delta  <?php echo $article_status_2 ; ?>  delta-positive"><?php echo (round($article_1)=='NAN')? '0': round($article_1); ?>%</span>
			            </div>
			        </div>
			        <span class="metric-name">Articles Viewed</span>
			    </div>
			    <div class="metric-container">
			        <span class="nc-icon summary-bar-icon">
			            <i class="nc-icon-wrapper">
			                <svg viewBox="0 0 24 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
			                    <desc>Created with Sketch.</desc>
			                    <defs></defs>
			                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
			                        <g id="Analytics-2018_Content_returning_A-Copy" transform="translate(-431.000000, -244.000000)" stroke="#444444">
			                            <g id="preview-copy-2" transform="translate(431.000000, 244.000000)">
			                                <path d="M0.75,9 C0.75,9 5.25,0.75 12,0.75 C18.75,0.75 23.25,9 23.25,9 C23.25,9 18.75,17.25 12,17.25 C5.25,17.25 0.75,9 0.75,9 Z" id="Shape"></path>
			                                <circle id="Oval" cx="12" cy="9" r="3.75"></circle>
			                            </g>
			                        </g>
			                    </g>
			                </svg>
			            </i>
			        </span>
			        <div class="value-container">
			            <span class="current"><?php echo $pageview?></span>
			            <div class="delta-container">
			                <span class="nc-icon label-icon <?php echo $page_status_2; ?> delta-positive">
			                    <i class="nc-icon-wrapper">
			                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 16">
			                            <g transform="translate(0, 0)"><polygon fill="#444444" points="8,11.4 2.6,6 4,4.6 8,8.6 12,4.6 13.4,6 "></polygon></g>
			                        </svg>
			                    </i>
			                </span>
			                <span class="label-delta <?php echo $page_status_2; ?> delta-positive"><?php echo round($page_1); ?>%</span>
			            </div>
			        </div>
			        <span class="metric-name">Pageviews</span>
			    </div>
			    <div class="metric-container">
			        <span class="nc-icon summary-bar-icon">
			            <i class="nc-icon-wrapper">
			                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24">
			                    <g stroke-width="1" transform="translate(0.5, 0.5)">
			                        <path
			                            data-color="color-2"
			                            fill="none"
			                            stroke="#444444"
			                            stroke-width="1"
			                            stroke-linecap="square"
			                            stroke-miterlimit="10"
			                            d="M4,7L4,7 C2.895,7,2,6.105,2,5v0c0-1.105,0.895-2,2-2h0c1.105,0,2,0.895,2,2v0C6,6.105,5.105,7,4,7z"
			                            stroke-linejoin="miter"
			                        ></path>
			                        <path data-color="color-2" fill="none" stroke="#444444" stroke-width="1" stroke-linecap="square" stroke-miterlimit="10" d="M6,21H3v-4 l-2,0v-5c0-1.105,0.895-2,2-2h1" stroke-linejoin="miter"></path>
			                        <path
			                            data-color="color-2"
			                            fill="none"
			                            stroke="#444444"
			                            stroke-width="1"
			                            stroke-linecap="square"
			                            stroke-miterlimit="10"
			                            d="M20,7L20,7 c1.105,0,2-0.895,2-2v0c0-1.105-0.895-2-2-2h0c-1.105,0-2,0.895-2,2v0C18,6.105,18.895,7,20,7z"
			                            stroke-linejoin="miter"
			                        ></path>
			                        <path data-color="color-2" fill="none" stroke="#444444" stroke-width="1" stroke-linecap="square" stroke-miterlimit="10" d="M18,21h3v-4 l2,0v-5c0-1.105-0.895-2-2-2h-1" stroke-linejoin="miter"></path>
			                        <path
			                            fill="none"
			                            stroke="#444444"
			                            stroke-width="1"
			                            stroke-linecap="square"
			                            stroke-miterlimit="10"
			                            d="M12,7L12,7 c-1.657,0-3-1.343-3-3v0c0-1.657,1.343-3,3-3h0c1.657,0,3,1.343,3,3v0C15,5.657,13.657,7,12,7z"
			                            stroke-linejoin="miter"
			                        ></path>
			                        <path fill="none" stroke="#444444" stroke-width="1" stroke-linecap="square" stroke-miterlimit="10" d="M15,23H9v-6H7v-5 c0-1.105,0.895-2,2-2h6c1.105,0,2,0.895,2,2v6h-2V23z" stroke-linejoin="miter"></path>
			                    </g>
			                </svg>
			            </i>
			        </span>
			        <div class="value-container">
			            <span class="current"><?php echo $uniquePageviews;?></span>
			            <div class="delta-container">
			                <span class="nc-icon label-icon <?php echo $unique_status_2; ?> delta-positive">
			                    <i class="nc-icon-wrapper">
			                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 16">
			                            <g transform="translate(0, 0)"><polygon fill="#444444" points="8,11.4 2.6,6 4,4.6 8,8.6 12,4.6 13.4,6 "></polygon></g>
			                        </svg>
			                    </i>
			                </span>
			                <span class="label-delta <?php echo $unique_status_2; ?> delta-positive"><?php echo round($uniqueview_1 ); ?>%</span>
			            </div>
			        </div>
			        <span class="metric-name">Unique Visitors</span>
			    </div>
			    <div class="metric-container">
			        <span class="nc-icon summary-bar-icon">
			            <i class="nc-icon-wrapper">
			                <svg viewBox="0 0 22 22" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
			                    <desc>Created with Sketch.</desc>
			                    <defs></defs>
			                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
			                        <g id="Analytics-2018_Content_B" transform="translate(-834.000000, -240.000000)" stroke="#777777">
			                            <g id="time-wall-clock-copy-2" transform="translate(835.000000, 241.000000)">
			                                <circle id="Oval" cx="10" cy="10" r="10"></circle>
			                                <polyline id="Shape" points="10 5.45454545 10 11.1688312 15.7142857 11.1688312"></polyline>
			                            </g>
			                        </g>
			                    </g>
			                </svg>
			            </i>
			        </span>
			        <div class="value-container">
			            <span class="current"><?php echo date("H:i:s",round($avgTimeOnPage ));?></span>
			            <div class="delta-container">
			                <span class="nc-icon label-icon <?php echo $rate_status_2; ?> delta-positive">
			                    <i class="nc-icon-wrapper">
			                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 16">
			                            <g transform="translate(0, 0)"><polygon fill="#444444" points="8,11.4 2.6,6 4,4.6 8,8.6 12,4.6 13.4,6 "></polygon></g>
			                        </svg>
			                    </i>
			                </span>
			                <span class="label-delta <?php echo $rate_status_2; ?> delta-positive"><?php echo round($rateview_1 );?>%</span>
			            </div>
			        </div>
			        <span class="metric-name">Attention Time</span>
			    </div>
			    <div class="metric-container">
			        <span class="nc-icon summary-bar-icon">
			            <i class="nc-icon-wrapper">
			                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
			                    <g transform="translate(0, 0)">
			                        <g>
			                            <path
			                                fill="#444444"
			                                d="M15.8,19.4c-0.1,0-0.1,0-0.2-0.1l-5.6-3l-5.6,3c-0.2,0.1-0.3,0.1-0.5,0c-0.1-0.1-0.2-0.3-0.2-0.4l1.1-6.3 L0.2,8.2C0.1,8.1,0.1,7.9,0.1,7.7c0.1-0.2,0.2-0.3,0.4-0.3l6.3-0.9l2.8-5.7c0.2-0.3,0.7-0.3,0.8,0l2.8,5.7l6.3,0.9 c0.2,0,0.3,0.1,0.4,0.3c0.1,0.2,0,0.3-0.1,0.5l-4.6,4.4l1.1,6.3c0,0.2,0,0.3-0.2,0.4C16,19.4,15.9,19.4,15.8,19.4z M1.5,8.2l4.1,4 c0.1,0.1,0.2,0.3,0.1,0.4l-1,5.6l5-2.6c0.1-0.1,0.3-0.1,0.4,0l5,2.6l-1-5.6c0-0.1,0-0.3,0.1-0.4l4.1-4l-5.6-0.8 c-0.1,0-0.3-0.1-0.3-0.2L10,2L7.5,7.1C7.4,7.3,7.3,7.3,7.1,7.4L1.5,8.2z"
			                            ></path>
			                        </g>
			                    </g>
			                </svg>
			            </i>
			        </span>
			        <div class="value-container">
			            <span class="current"><?php echo round($data['avgSessionDuration']['total'])?>%</span>
			            <div class="delta-container">
			                <span class="nc-icon label-icon delta-negative">
			                    <i class="nc-icon-wrapper">
			                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 16">
			                            <g transform="translate(0, 0)"><polygon fill="#444444" points="8,11.4 2.6,6 4,4.6 8,8.6 12,4.6 13.4,6 "></polygon></g>
			                        </svg>
			                    </i>
			                </span>
			                <span class="label-delta delta-negative">1%</span>
			            </div>
			        </div>
			        <span class="metric-name">Engagement Rate</span>
			    </div>
			</div>

			<!-- Content Header-->
		

			<div class="analytic-content" style="height: 350px;">
				<div class="timeline-chart-controls">
				    <div class="dropdown-wrapper button-dropdown-wrapper">
				        <div class="dropdown">
				        	<select name="chartlayout" class="chartlayout" >
				        		<option value="ga:pageviews">Pageviews</option>
				        		<option value="ga:uniquePageviews">Unique Visitors</option>
				        		<option value="ga:pageLoadTime">Engagement Rate</option>
				        		<option value="ga:avgTimeOnPage">Average Attention Time</option>
				        		<option value="ga:cohortPageviewsPerUser">Avg. Pageviews per Visitor</option>

				        	</select>
				             
				        </div>
				    </div>
				    <div class="pillbox-toggle-container">
				        <div class="pillbox-toggle long-date"><button value="prev" class="active pillbox">Current &amp; Previous</button><button value="channel" class="pillbox">By Channel</button></div>
				        <div class="pillbox-toggle date-action"><button class="active ">Daily</button><button class="">Weekly</button><button class="">Monthly</button></div>
				        <div class="pillbox-toggle"></div>
				    </div>
				 
				</div>
				<div class="my-chart">
					<?php include( plugin_dir_path( __FILE__ ) . '/google-analytic-chart.php' ); ?>
				</div>    
				
				
			</div>
<script>


var date_ = new Date();    
var date_present = new Date();
date_present.setDate(date_present.getDate() + 7); 
option_views('false',date_,date_present);
function option_views(range,start,end){
    
jQuery('select.chartlayout').change(function() {
 
        //Use $option (with the "$") to see that the variable is a jQuery object
  var $option = jQuery(this).find('option:selected');
            //Added with the EDIT
            var value = $option.val();//to get content of "value" attrib
            var prevdate = jQuery('input#compare-range-picker').val();
        	
        	var dates = jQuery('input.daterange').val();
            var start = dates.split('to')[0];
            var end = dates.split('to')[1];

             jQuery.ajax({
                 type : "GET",
                 url : ajaxurl,
                 data : {action: "change_chart",metrics:value,range:false,start:start,end:end,prevdate:prevdate},
                 success: function(response) {
                   jQuery('.my-chart').html(response);
                     //console.log(response);
                    console.log(prevdate);
                    //chart();
                }
            }); 
            
            
        });   
 

}

jQuery('.pillbox-toggle .pillbox').click(function () {
    jQuery('.pillbox-toggle .pillbox').removeClass('active');
    jQuery(this).addClass('active');
    var val = jQuery(this).val();
    var dates = jQuery('input.daterange').val();
    var prevdate = jQuery('input#compare-range-picker').val();
    jQuery('.my-chart').css('opacity','.5');
    jQuery.ajax({
        type : "GET",
        url : ajaxurl,
        data : {action: "channel_analytic",val:val,dates:dates,prevdate:prevdate},
        success: function(response) {
        jQuery('.my-chart').html(response);
        jQuery('.my-chart').css('opacity','1');

        	
       }
   }); 

   if(val == 'prev'){
   	 jQuery('.analytic-content .timeline-chart-controls .dropdown').html('<select name="chartlayout" class="chartlayout"><option value="ga:pageviews">Pageviews</option><option value="ga:uniquePageviews">Unique Visitors</option><option value="ga:pageLoadTime">Engagement Rate</option><option value="ga:avgTimeOnPage">Average Attention Time</option><option value="ga:cohortPageviewsPerUser">Avg. Pageviews per Visitor</option></select>');
   }
  
  if(val == 'channel'){
   	 jQuery('.analytic-content .timeline-chart-controls .dropdown').html('<select name="chartlayout" class="chartlayout chart-channel"><option value="ga:pageviews">Pageviews</option><option value="ga:bounceRate">Engagement Rate</option><option value="ga:avgTimeOnPage">Average Attention Time</option></select>');

   	 jQuery('select.chart-channel').change(function() {
		  var $option = jQuery(this).find('option:selected');
		  var option = $option.val();//to get content of "value" attrib
		  var dates = jQuery('input.daterange').val();
		  var prevdate = jQuery('input#compare-range-picker').val();
		  jQuery('.my-chart').css('opacity','.5');      
		  jQuery.ajax({
		        type : "GET",
		        url : ajaxurl,
		        data : {action: "channel_analytic",val:'channel',option:option,dates:dates,prevdate:prevdate},
		        success: function(response) {
		        jQuery('.my-chart').html(response);
		        jQuery('.my-chart').css('opacity','1');

		        	
		       }
		   }); 
		});   

   }
    
        
});
 
</script>