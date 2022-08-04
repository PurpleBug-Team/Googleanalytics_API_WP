<?php 
	$article_1 = $article_total['total'] < $GA_prev['articleview'] ?  $article_total['total'] / $GA_prev['articleview'] * 100 : $GA_prev['articleview'] / $article_total['total'] * 100;
	$article_status_2 = $article_total['total'] < $GA_prev['articleview'] ?  'low': 'high';
	$article_status_3 = $article_total['total'] < $GA_prev['articleview'] ?  '-': '+';

	$page_1 = $pageview < $GA_prev['pageviews'] ?  $pageview / $GA_prev['pageviews'] * 100 : $GA_prev['pageviews'] / $pageview * 100;
	$page_status_2 = $pageview < $GA_prev['pageviews'] ?  'low': 'high';

	$uniqueview_1 = $uniquePageviews < $GA_prev['uniquePageviews'] ?  $uniquePageviews / $GA_prev['uniquePageviews'] * 100 : $GA_prev['uniquePageviews'] / $uniquePageviews * 100;
	$unique_status_2 =$uniquePageviews< $GA_prev['uniquePageviews'] ?  'low': 'high';

	$rateview_1 = $avgTimeOnPage < $GA_prev['avgTimeOnPage'] ?  $avgTimeOnPage / $GA_prev['avgTimeOnPage'] * 100 : $GA_prev['avgTimeOnPage'] / $data['avgTimeOnPage']['total'] * 100;
	$rate_status_2 = $avgTimeOnPage < $GA_prev['avgTimeOnPage'] ?  'low': 'high';

 
	if(isset($_GET['stardate']) && isset($_GET['endDate'])){
		$start = $_GET['stardate'];
		$end = $_GET['endDate'];
	}else{
		$start = $prestent_date2;
		$end = $latest2;
	}


	$social = $this->Query('https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids=ga%3A193221711&dimensions=ga%3AfullReferrer&metrics=ga%3AbounceRate%2Cga%3AavgSessionDuration%2Cga%3Apageviews%2Cga%3AuniquePageviews%2Cga%3AavgTimeOnPage&filters=ga%3AhasSocialSourceReferral%3D%3DYes&start-date='.$start.'&end-date='.$end.'');

	$organic = $this->Query('https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids=ga%3A193221711&dimensions=ga%3AsocialNetwork&metrics=ga%3AbounceRate%2Cga%3AavgSessionDuration%2Cga%3Apageviews%2Cga%3AuniquePageviews%2Cga%3AavgTimeOnPage&filters=ga%3AhasSocialSourceReferral%3D%3DYes&start-date='.$start.'&end-date='.$end.'');

	$direct = $this->Query('https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids=ga%3A193221711&dimensions=ga%3AsocialNetwork&metrics=ga%3AbounceRate%2Cga%3AavgSessionDuration%2Cga%3Apageviews%2Cga%3AuniquePageviews%2Cga%3AavgTimeOnPage&start-date='.$start.'&end-date='.$end.'');

	$referral = $this->Query('https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids=ga%3A193221711&dimensions=ga%3AfullReferrer&metrics=ga%3AbounceRate%2Cga%3AavgSessionDuration%2Cga%3Apageviews%2Cga%3AuniquePageviews%2Cga%3AavgTimeOnPage&filters=ga%3AhasSocialSourceReferral%3D%3DNo&start-date='.$start.'&end-date='.$end.'');

 
	
?>

<div id="analytics-report-tab-table">

			<?php 

				global $wpdb;
				 	foreach($all_datatable->rows as $row4){
						$expolded = explode('/article/',$row4[0]);

							$exlug = explode('?',str_replace("article/", "",$row4[0]));
							$exile = explode('?',$row4[0]);
							$exile2 = explode('/',$exile[0]);
							$slug = $exile2[count($exile2)-2];
							 
							$query_artcle = "SELECT ID,post_title,post_date,post_author FROM `wp_posts` where  post_name='".str_replace("/", "",$slug)."' ORDER BY post_date DESC";

							$post_artcle = $wpdb->get_results ($query_artcle);
 
							$total_table[] = array('pagepath'=>$row4[0],'pagetitle'=>$row4[1],'pagedate'=>$row4[2],'pageview'=>$row4[3],'uniqueview'=>$row4[4],'avgtime'=>date("H:i:s",round($row4[5])));
		
						// if (strpos($row4[0], '/article/') !== false)  {	
							$total_article_pageview[] = $row4[1];
						// }
						$total_pageview[] = $row4[3];  
						$total_unique[] = $row4[4];  
						$total_avtime[] = $row4[5]; 		    
					} 
				?>
					<ul>
						    <li><a href="#tabs-1">CONTENT</a></li>
						    <li><a href="#tabs-2">CHANNELS</a></li>
						    
						  </ul>
						  <div id="tabs-1">
						    <table class="data-content">
						    	<thead>
						    		<th>
						    			Article
						    		</th>
						    		<th>
						    			Publish Date
						    		</th>
						    		<th>
						    			Pageviews
						    		</th>
						    		<th>
						    			Unique Visitors
						    		</th>
						    		<th>
						    			Avg. Attention Time
						    		</th>
						    	</thead>
						    	<thead>
						    		<tr>
						    			<td>
						    				<span class="trending-number ng-binding ng-scope"><?php echo array_sum( $total_article_pageview ); ?><span class="text">Articles Viewed</span></span>
						    				<span class="label-delta <?php echo $article_status_2; ?> delta-positive"> <?php echo $article_status_3.' '.round($article_1); ?>% <span class="text">over prev. period</span></span>
						    			</td>
						    			<td>
						    				<span class="empty-dhash"> <i class="nc-icon-wrapper ng-binding ng-scope" ng-if="svg" ng-bind-html="svg"><svg viewBox="0 0 8 1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><desc>Created with Sketch.</desc><defs></defs><g id="Page-1" stroke="none" stroke-width="1" fill-rule="evenodd"><rect id="Rectangle" x="0" y="0" width="8" height="1"></rect></g></svg></i> </span>
						    			</td>
						    			<td>
						    				<span class="trending-number ng-binding ng-scope"><?php echo $pageview; ?></span>
						    				<span class="label-delta <?php echo $page_status_2;?> delta-positive"><?php echo round($page_1);?>%</span>
						    			</td>
						    			<td>
						    				<span class="trending-number ng-binding ng-scope"><?php echo $uniquePageviews; ?></span>
						    				<span class="label-delta <?php echo $unique_status_2;?>  delta-positive"><?php echo round($uniqueview_1);?>%</span>
						    			</td>
						    			<td>
						    				<span class="trending-number ng-binding ng-scope">
						    		<?php echo date("H:i:s",round($avgTimeOnPage ));?></span>
						    				<span class="label-delta <?php echo $rate_status_2;?> delta-positive"><?php echo round($rateview_1 );?>%</span>
						    			</td>
		 
						    		</tr>
						    	</thead>
						    	<tbody>
						    		

						    		<?php 
						    		 
						    		  if(!empty($total_table)){
						    		 	 $shift = array_reverse($total_table);
						    		 	 $index=0;
						    		 	  foreach($total_table as $row2){
										   $title = $row2['pagetitle'];
										   $titleDate = '-';


										 	echo '<tr>';
										 		echo '<td><a index="'.$index.'" class="open" href="'.$row2['pagepath'].'">'.$title .'</a></td>';
										 		echo '<td>'.date('M j Y', strtotime($row2['pagedate'])).'</td>';
										 		echo '<td>'.$row2['pageview'].'</td>';
										 		echo '<td>'.$row2['uniqueview'].'</td>';
										 		echo '<td>'.$row2['avgtime'].'</td>';
									
										 	echo '</tr>';	
										 	$index++;
										 }
						    		 	}
										 
						    		?>
						    		 
						    	</tbody>
						    </table>
						  </div>
						  <div id="tabs-2">
						      
						    <div class="table-channel">

						    	<div class="table-channel-header">
						    		<div class="header-text ng-binding">
						    			Name
						    		</div>
						    		<div class="header-text ng-binding">
						    			Pageviews
						    		</div>
						    		<div class="header-text ng-binding">
						    			Unique Visitors
						    		</div>
						    		<div class="header-text ng-binding">
										Avg. Pageviews Per Vistor
						    		</div>
						    		<div class="header-text ng-binding">
										Avg. Attention Time
						    		</div>
						    		<div class="header-text ng-binding">
										Engagement Rate
						    		</div>
						    	</div>
						    	<div class="table-channel-body">
						    		<div class="social">
						    			<div class="social acc">
							    			<div class="header-text ng-binding">
							    				Socal
								    		</div>
								    		<div class="header-text ng-binding">
								    			<?php
								    				echo $social->totalsForAllResults->{'ga:pageviews'};
								    			 ?>
								    		</div>
								    		<div class="header-text ng-binding">
								    			<?php
								    				echo round($social->totalsForAllResults->{'ga:uniquePageviews'},0);
								    			 ?>
								    		</div>
								    		<div class="header-text ng-binding">
												<?php
								    				echo round($social->totalsForAllResults->{'ga:avgSessionDuration'});
								    			 ?>
								    		</div>
								    		<div class="header-text ng-binding">
												<?php
								    			echo date("G:i:s",$social->totalsForAllResults->{'ga:avgTimeOnPage'}); 	
								    				echo strtotime(round(intval($social->totalsForAllResults->{'ga:avgTimeOnPage'})));
								    			 ?>
								    		</div>
								    		<div class="header-text ng-binding">
												<?php
								    				echo round($social->totalsForAllResults->{'ga:bounceRate'});
								    			 ?>%
								    		</div>
						    			</div>
						    			<div class="socila-row acc-expand">
						    				<?php 
						    					
						    				 if(!empty($social->rows)){
						    						foreach($social->rows as $social_d){
						    							echo '<div class="acss-row">';
							    							echo '<div class="header-text ng-binding">';
							    								echo $social_d[0];
							    							echo '</div>';
							    							echo '<div class="header-text ng-binding">';
							    								echo $social_d[3];
							    							echo '</div>';
							    							echo '<div class="header-text ng-binding">';
							    								echo $social_d[4];
							    							echo '</div>';
							    							echo '<div class="header-text ng-binding">';
							    								echo round($social_d[2]);
							    							echo '</div>';
							    							echo '<div class="header-text ng-binding">';
							    								echo date("G:i:s",$social_d[5]);
							    							echo '</div>';
							    							echo '<div class="header-text ng-binding">';
							    								echo round($social_d[1]).'%';
							    							echo '</div>';
						    							echo '</div>';
						    						}
						    					} 
						   
						 
						    				?>
						    			</div>
						    		</div>
						    	 	<!--- End of Social-->
			 
						    		<div class="organic-search">
						    			<div class="organic-search acc">
							    			<div class="header-text ng-binding">
							    				Organic Search
								    		</div>
								    		<div class="header-text ng-binding">
								    			<?php
								    				echo $organic->totalsForAllResults->{'ga:pageviews'};
 
								    			 ?>
								    		</div>
								    		<div class="header-text ng-binding">
								    			<?php
								    				echo $organic->totalsForAllResults->{'ga:uniquePageviews'};
								    			 ?>
								    		</div>
								    		<div class="header-text ng-binding">
												<?php
								    				 
								    				echo (int)$organic->totalsForAllResults->{'ga:avgSessionDuration'};
								    			 ?>
								    		</div>
								    		<div class="header-text ng-binding">
												<?php
								    				echo date("G:i:s",$organic->totalsForAllResults->{'ga:avgTimeOnPage'});
								    			 ?>
								    		</div>
								    		<div class="header-text ng-binding">
												<?php
								    				echo round($organic->totalsForAllResults->{'ga:bounceRate'});
								    			 ?>%
								    		</div>
						    			</div>
						    			<div class="socila-row acc-expand">
						    				<?php 
						    					
						    				 if(!empty($organic->rows)){
						    						foreach($organic->rows as $organic_d){
						    							echo '<div class="acss-row">';
							    							echo '<div class="header-text ng-binding">';
							    								echo $organic_d[0];
							    							echo '</div>';
							    							echo '<div class="header-text ng-binding">';
							    								echo $organic_d[3];
							    							echo '</div>';
							    							echo '<div class="header-text ng-binding">';
							    								echo $organic_d[4];
							    							echo '</div>';
							    							echo '<div class="header-text ng-binding">';
							    								echo round($organic_d[2]);
							    							echo '</div>';
							    							echo '<div class="header-text ng-binding">';
							    								echo date("G:i:s",$organic_d[5]);
							    							echo '</div>';
							    							echo '<div class="header-text ng-binding">';
							    								echo round($organic_d[1]).'%';
							    							echo '</div>';
						    							echo '</div>';

						    						 
						    						}
						    					} 
						   
						 
						    				?>
						    			</div>
						    		</div>
						    		<!--- End of organic search-->
						    		<div class="organic-search">
						    			<div class="organic-search acc">
							    			<div class="header-text ng-binding">
							    				Direct
								    		</div>
								    		<div class="header-text ng-binding">
								    			<?php
								    				echo $direct->totalsForAllResults->{'ga:pageviews'};
								    			 ?>
								    		</div>
								    		<div class="header-text ng-binding">
								    			<?php
								    				echo $direct->totalsForAllResults->{'ga:uniquePageviews'};
								    			 ?>
								    		</div>
								    		<div class="header-text ng-binding">
												<?php
								    				echo round($direct->totalsForAllResults->{'ga:avgSessionDuration'});
								    			 ?>
								    		</div>
								    		<div class="header-text ng-binding">
												<?php
								    				echo date("G:i:s",$direct->totalsForAllResults->{'ga:avgTimeOnPage'});
								    			 ?>
								    		</div>
								    		<div class="header-text ng-binding">
												<?php
								    				echo round($direct->totalsForAllResults->{'ga:bounceRate'});
								    			 ?>%
								    		</div>
						    			</div>
						    			<div class="socila-row acc-expand">
						    				<?php 
						    					
						    				 if(!empty($direct->rows)){
						    						foreach($direct->rows as $direct_d){
						    							echo '<div class="acss-row">';
							    							echo '<div class="header-text ng-binding">';
							    								echo $direct_d[0];
							    							echo '</div>';
							    							echo '<div class="header-text ng-binding">';
							    								echo $direct_d[3];
							    							echo '</div>';
							    							echo '<div class="header-text ng-binding">';
							    								echo $direct_d[4];
							    							echo '</div>';
							    							echo '<div class="header-text ng-binding">';
							    								echo round($direct_d[2]);
							    							echo '</div>';
							    							echo '<div class="header-text ng-binding">';
							    								echo date("G:i:s",$direct_d[5]);
							    							echo '</div>';
							    							echo '<div class="header-text ng-binding">';
							    								echo round($direct_d[1]).'%';
							    							echo '</div>';
						    							echo '</div>';
						    						}
						    					} 
						   
						 
						    				?>
						    			</div>
						    		</div>
						    		<!--- End of Direct-->
						    		<div class="organic-search">
						    			<div class="organic-search acc">
							    			<div class="header-text ng-binding">
							    				Referral
								    		</div>
								    		<div class="header-text ng-binding">
								    			<?php
								    				echo $referral->totalsForAllResults->{'ga:pageviews'};
								    			 ?>
								    		</div>
								    		<div class="header-text ng-binding">
								    			<?php
								    				echo $referral->totalsForAllResults->{'ga:uniquePageviews'};
								    			 ?>
								    		</div>
								    		<div class="header-text ng-binding">
												<?php
								    				echo round($referral->totalsForAllResults->{'ga:avgSessionDuration'});
								    			 ?>
								    		</div>
								    		<div class="header-text ng-binding">
												<?php
								    				echo date("G:i:s",$referral->totalsForAllResults->{'ga:avgTimeOnPage'});
								    			 ?>
								    		</div>
								    		<div class="header-text ng-binding">
												<?php
								    				echo round($referral->totalsForAllResults->{'ga:bounceRate'});
								    			 ?>%
								    		</div>
						    			</div>
						    			<div class="socila-row acc-expand">
						    				<?php 
						    					
						    				 if(!empty($referral->rows)){
						    						foreach($referral->rows as $referral_d){
						    							echo '<div class="acss-row">';
							    							echo '<div class="header-text ng-binding">';
							    								echo $referral_d[0];
							    							echo '</div>';
							    							echo '<div class="header-text ng-binding">';
							    								echo $referral_d[3];
							    							echo '</div>';
							    							echo '<div class="header-text ng-binding">';
							    								echo $referral_d[4];
							    							echo '</div>';
							    							echo '<div class="header-text ng-binding">';
							    								echo round($referral_d[2]);
							    							echo '</div>';
							    							echo '<div class="header-text ng-binding">';
							    								echo date("G:i:s",$referral_d[5] );
							    							echo '</div>';
							    							echo '<div class="header-text ng-binding">';
							    								echo round($referral_d[1]).'%';
							    							echo '</div>';
						    							echo '</div>';
						    						}
						    					} 
						   
						 
						    				?>
						    			</div>
						    		</div>
						    		<!--- End of Referral-->	


						    	</div>

						    	 

						    </div>
						  </div>
						  
					</div>
			 </div>
<script>
jQuery('.data-content').DataTable({
    "order": [[ 2, 'DESC' ]],
    "drawCallback": function( settings ) {
        jQuery('.data-content tr td a').click(function (event){
		    event.preventDefault();
		    var href = jQuery(this).attr('href');
		    var current = jQuery('input.daterange').val();    
		    var prev = jQuery('input#compare-range-picker').val();  
		    var index = jQuery(this).attr('index');

		    jQuery('.analytic-modal').remove();

		    jQuery.ajax({
		           
		                 type : "GET",
		                 url : ajaxurl,
		                 data : {action: "view_page_analytic",slug:href,current:current,prev:prev,index:index},
		                 success: function(response) {
		                     jQuery('.custom-modal').html(response);
		                    jQuery(".view-analytic-"+index).modal({
		                      escapeClose: true,
		                      clickClose: true,
		                      showClose: true
		                    });

		                    jQuery('.analytic-modal').css('height',window.innerHeight+'px');

		                     jQuery('.list-channel ul li').click(function (){
								jQuery('.list-channel ul li,.tables').removeClass('active');
								    jQuery(this).addClass('active');
								    var index = jQuery(this).attr('index');

								    jQuery('.top-'+index).addClass('active');

								});
								jQuery('.list-channel ul li').hover(function (){
								jQuery('.list-channel ul li,.tables').removeClass('active');
								    jQuery(this).addClass('active');
								    var index = jQuery(this).attr('index');

								    jQuery('.top-'+index).addClass('active');

								});
		                  
		                }
		          }); 




				   var counting = 0;
					jQuery('select.chartlayout').change(function() {
				        var count = counting++;
				        //Use $option (with the "$") to see that the variable is a jQuery object
				        var $option = jQuery(this).find('option:selected');
			            //Added with the EDIT
			            var value = $option.val();//to get content of "value" attrib

			             jQuery.ajax({
			                 type : "GET",
			                 url : ajaxurl,
			                 data : {action: "change_chart",metrics:value,range:false,start:'2021-09-14',end:'2021-10-04',count:count},
			                 success: function(response) {
			                    setTimeout(function () {
			                        jQuery('.analytic-modal .my-chart').html(response);

			                    },500);
			                }
			            }); 
			            

			           
			            
			        });        


		});


    }
});

jQuery('.acc').click(function(){
    jQuery('.acc-expand,.acc').removeClass('active');
    jQuery(this).addClass('active');
    jQuery(this).next().addClass('active');
});
jQuery( "#analytics-report-tab-table" ).tabs();
</script>
<style>
.acc-expand {
    display: none;
    /* min-height: 275px; */
    overflow-y: auto;
}
.table-channel-header .header-text.ng-binding:first-child,
.acc  .header-text.ng-binding:first-child {
    border-right:solid 1px;
}
.acc.active{
    background: #f5f7fa;
}
.acc-expand.active {
    display: block;
    background: #f5f7fa;
}

.acss-row {
    display: flex;
}
.acc-expand .header-text.ng-binding {
    padding: 4px 15px !important;
}
.table-channel-header {
    display: flex;
    background: #ededf4;
}

.table-channel-header .header-text {
    height: 23px;
    padding: 21px 15px;
    font-weight: bold;
    width: 14%;
    text-align: left;
    line-height: 2;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.table-channel-body .acc {
    display: flex;
    border-bottom: solid 1px #d0d0d0;
}


.table-channel-body .header-text.ng-binding {
    padding: 18px 15px;
    width: 14%;
    text-align: left;
    line-height: 2;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.table-channel {
    margin-top: 25px;
}
</style>