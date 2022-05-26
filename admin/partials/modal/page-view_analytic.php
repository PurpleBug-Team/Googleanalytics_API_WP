<?php 
	
	$start_Date = explode('to',$_GET['current']);
    $start_current = date('Y-m-d',strtotime($start_Date[0]));
    $end_current = date('Y-m-d',strtotime($start_Date[1]));

	$query = 'https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id.'&dimensions=ga%3ApagePath%2Cga%3ApageTitle&metrics=ga%3AbounceRate%2Cga%3Apageviews%2Cga%3AuniquePageviews%2Cga%3AavgTimeOnPage&filters=ga%3ApagePath%3D%3D'.urlencode($_GET['slug']).'&start-date='.$start_current.'&end-date='.$end_current.'';

	$period_ = new DatePeriod(
                    new DateTime($start_current),
                    new DateInterval('P1D'),
                    new DateTime($end_current)
          );

    


	  $cURLConnection = curl_init();

      curl_setopt($cURLConnection, CURLOPT_URL, $query );
      curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

      $phoneList = curl_exec($cURLConnection);
      curl_close($cURLConnection);

      $jsonArrayResponse = json_decode($phoneList);



      foreach($period_ as $key => $period_d){
     	$chartrange[] = $period_d->format("Y-m-d");
     	$query_range = 'https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id.'&dimensions=ga%3ApagePath%2Cga%3ApageTitle&metrics=ga%3AbounceRate%2Cga%3Apageviews%2Cga%3AuniquePageviews%2Cga%3AavgTimeOnPage&filters=ga%3ApagePath%3D%3D'.urlencode($_GET['slug']).'&start-date='.$period_d->format("Y-m-d").'&end-date='.$period_d->format("Y-m-d").'';



     	$cURLConnection2 = curl_init();

	      curl_setopt($cURLConnection2, CURLOPT_URL, $query_range );
	      curl_setopt($cURLConnection2, CURLOPT_RETURNTRANSFER, true);

	      $phoneList2 = curl_exec($cURLConnection2);
	      curl_close($cURLConnection2);

	      $jsonArrayResponse2 = json_decode($phoneList2);
	      $rangedata[]=$jsonArrayResponse2->rows;
	    

     }	
      
      
 
 	  $social = $this->Query('https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id.'&dimensions=ga%3AfullReferrer&metrics=ga%3Apageviews&filters=ga%3AhasSocialSourceReferral%3D%3DYes%3Bga%3ApagePath%3D%3D'.urlencode($_GET['slug']).'&start-date='.$start_current.'&end-date='.$end_current.''); 	

 	  $direct = $this->Query('https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id.'&dimensions=ga%3AsocialNetwork&metrics=ga%3Apageviews&filters=ga%3ApagePath%3D%3D'.urlencode($_GET['slug']).'&start-date='.$start_current.'&end-date='.$end_current.''); 

 

      $organic = $this->Query('https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id.'&&dimensions=ga%3AsocialNetwork&metrics=ga%3AorganicSearches&filters=ga%3ApagePath%3D%3D'.urlencode($_GET['slug']).'&start-date='.$start_current.'&end-date='.$end_current.'');
      
      $reffer = $this->Query('https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id.'&dimensions=ga%3AfullReferrer&metrics=ga%3Apageviews&filters=ga%3AhasSocialSourceReferral%3D%3DNo%3Bga%3ApagePath%3D%3D'.urlencode($_GET['slug']).'&start-date='.$start_current.'&end-date='.$end_current.''); 	


	    $socialm = $social->totalsForAllResults->{'ga:pageviews'};
		$directm = $direct->totalsForAllResults->{'ga:pageviews'};
		$organicm = $organic->totalsForAllResults->{'ga:organicSearches'};
		$otherm = $reffer->totalsForAllResults->{'ga:pageviews'};
 
		$all = array_sum(array($socialm,$directm,$organicm,$otherm));

		$social_ = $socialm / $all * 100;
		$direct_ = $directm / $all * 100;
		$organic_ = $organicm / $all * 100;
		$other_ = $otherm / $all * 100;




?>

<div  class="modal analytic-modal view-analytic-<?php echo $_GET['index']?>">
	<div class="article-info-wrapper">
		<p class="article-info-meta ng-binding">ORIGINAL ARTICLE | Lafarge Holcim</p>
		<h1 class="ng-binding"><?php echo $jsonArrayResponse->rows[0][1]?></h1>
		<p class="article-info-meta">
		<strong class="ng-binding">
			<span ng-if="$ctrl.byline" class="ng-binding ng-scope" style="">By Kim Montano | </span><!-- end ngIf: $ctrl.byline -->Sep 16, 2021</strong>
			<strong ng-if="$ctrl.taskId" class="ng-scope" style="">| <a >View Task</a></strong><!-- end ngIf: $ctrl.taskId -->
		</p>
	</div>
 
	<div class="ndl-Grid-container">
    <div class="ndl-GridItem ndl-GridItem--alignLeft" data-size="4">
        <div class="ana-SingleArticleTrendingNumbers-TrendingNumber">
            <p class="ana-SingleArticleTrendingNumbers-TrendingNumber-label">Pageviews&nbsp;</p>
            <div>
                <p class="ana-SingleArticleTrendingNumbers-TrendingNumber-value"><?php echo $jsonArrayResponse->totalsForAllResults->{'ga:pageviews'};?></p>
                <p class="ana-SingleArticleTrendingNumbers-TrendingNumber-delta ana-SingleArticleTrendingNumbers-TrendingNumber-delta--positive">
                    <span class="nc-icon ndl-Icon ana-SingleArticleTrendingNumbers-TrendingNumber-arrow-up">
                        <i class="nc-icon-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 16">
                                <g transform="translate(0, 0)"><polygon fill="#444444" points="8,11.4 2.6,6 4,4.6 8,8.6 12,4.6 13.4,6 "></polygon></g>
                            </svg>
                        </i>
                    </span>
                    <span>0</span>
                </p>
            </div>
        </div>
    </div>
    <div class="ndl-GridItem ndl-GridItem--alignLeft" data-size="4">
        <div class="ana-SingleArticleTrendingNumbers-TrendingNumber">
            <p class="ana-SingleArticleTrendingNumbers-TrendingNumber-label">Unique Visitors&nbsp;</p>
            <div>
                <p class="ana-SingleArticleTrendingNumbers-TrendingNumber-value"><?php echo $jsonArrayResponse->totalsForAllResults->{'ga:uniquePageviews'};?></p>
                <p class="ana-SingleArticleTrendingNumbers-TrendingNumber-delta ana-SingleArticleTrendingNumbers-TrendingNumber-delta--positive">
                    <span class="nc-icon ndl-Icon ana-SingleArticleTrendingNumbers-TrendingNumber-arrow-up">
                        <i class="nc-icon-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 16">
                                <g transform="translate(0, 0)"><polygon fill="#444444" points="8,11.4 2.6,6 4,4.6 8,8.6 12,4.6 13.4,6 "></polygon></g>
                            </svg>
                        </i>
                    </span>
                    <span></span>
                </p>
            </div>
        </div>
    </div>
    <div class="ndl-GridItem ndl-GridItem--alignLeft" data-size="4">
        <div class="ana-SingleArticleTrendingNumbers-TrendingNumber">
            <p class="ana-SingleArticleTrendingNumbers-TrendingNumber-label">Returning Visitors&nbsp;</p>
            <div>
                <p class="ana-SingleArticleTrendingNumbers-TrendingNumber-value"></p>
                <p class="ana-SingleArticleTrendingNumbers-TrendingNumber-delta ana-SingleArticleTrendingNumbers-TrendingNumber-delta--positive">
                    <span class="nc-icon ndl-Icon ana-SingleArticleTrendingNumbers-TrendingNumber-arrow-up">
                        <i class="nc-icon-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 16">
                                <g transform="translate(0, 0)"><polygon fill="#444444" points="8,11.4 2.6,6 4,4.6 8,8.6 12,4.6 13.4,6 "></polygon></g>
                            </svg>
                        </i>
                    </span>
                    <span></span>
                </p>
            </div>
        </div>
    </div>
    <div class="ndl-GridItem ndl-GridItem--alignLeft" data-size="4">
        <div class="ana-SingleArticleTrendingNumbers-TrendingNumber">
            <p class="ana-SingleArticleTrendingNumbers-TrendingNumber-label">Avg. Attention Time&nbsp;</p>
            <div>
                <p class="ana-SingleArticleTrendingNumbers-TrendingNumber-value">
                <?php  echo date("H:i:s",round( $jsonArrayResponse->totalsForAllResults->{'ga:avgTimeOnPage'} ));?>

                </p>
                <p class="ana-SingleArticleTrendingNumbers-TrendingNumber-delta ana-SingleArticleTrendingNumbers-TrendingNumber-delta--positive">
                    <span class="nc-icon ndl-Icon ana-SingleArticleTrendingNumbers-TrendingNumber-arrow-up">
                        <i class="nc-icon-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 16">
                                <g transform="translate(0, 0)"><polygon fill="#444444" points="8,11.4 2.6,6 4,4.6 8,8.6 12,4.6 13.4,6 "></polygon></g>
                            </svg>
                        </i>
                    </span>
                    <span></span>
                </p>
            </div>
        </div>
    </div>
    <div class="ndl-GridItem ndl-GridItem--alignLeft" data-size="4">
        <div class="ana-SingleArticleTrendingNumbers-TrendingNumber">
            <p class="ana-SingleArticleTrendingNumbers-TrendingNumber-label">Engagement Rate&nbsp;</p>
            <div>
                <p class="ana-SingleArticleTrendingNumbers-TrendingNumber-value"><?php echo round($jsonArrayResponse->totalsForAllResults->{'ga:bounceRate'});?>%</p>
                <p class="ana-SingleArticleTrendingNumbers-TrendingNumber-delta ana-SingleArticleTrendingNumbers-TrendingNumber-delta--positive">
	                    <span class="nc-icon ndl-Icon ana-SingleArticleTrendingNumbers-TrendingNumber-arrow-up">
	                        <i class="nc-icon-wrapper">
	                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 16">
	                                <g transform="translate(0, 0)"><polygon fill="#444444" points="8,11.4 2.6,6 4,4.6 8,8.6 12,4.6 13.4,6 "></polygon></g>
	                            </svg>
	                        </i>
	                    </span>
	                    <span>0</span>
	                </p>
	            </div>
	        </div>
	    </div>
	    <div class="ndl-GridItem ndl-GridItem--alignLeft" data-size="4">
	        <div class="ana-SingleArticleTrendingNumbers-TrendingNumber">
	            <p class="ana-SingleArticleTrendingNumbers-TrendingNumber-label">Avg. Scroll Depth&nbsp;</p>
	            <div><p class="ana-SingleArticleTrendingNumbers-TrendingNumber-value"></p></div>
	        </div>
	    </div>
	</div>

	<div class="analytic-content" style="height: 300px;">
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
				        <div class="pillbox-toggle"><button value="prev" class="active pillbox">Current &amp; Previous</button><button value="channel" class="pillbox">By Channel</button></div>
				        <div class="pillbox-toggle"><button class="active ">Daily</button><button class="">Weekly</button><button class="">Monthly</button></div>
				        <div class="pillbox-toggle"></div>
				    </div>
				 
				</div>
				<div class="my-chart" style="height: 200px;">
					<?php
					  
					 if(!empty($rangedata)){
					 	foreach($rangedata as $rangedatas){
					 		$currnet_Data[] = $rangedatas[0][3];
					 	}
					 }
					 
					 include( plugin_dir_path(__DIR__) . '/google-analytic-chart.php' ); 
					 ?>
				</div> 
				
						
	</div>
	<div class="top-channel-wrap">
		<div class="top-channel">
			<h3>Top Channel</h3>
			<canvas id="total_channel" ></canvas>
		</div>
		<div class="list-channel">
			<ul>
				<li index="0" class="active"><span class="social-color box"></span><?php echo round($social_);?>% Social</li>
				<li index="1"><span  class="direct-color box"></span><?php echo round($direct_) ;?>% Direct</li>
				<li index="2"><span class="organic-color box"></span><?php echo round($organic_) ;?>% Organic Search</li>
				<li index="3"><span class="other-color box"></span><?php echo round($other_) ;?>% Referral</li>
			</ul>

		</div>
		<table class="social-data top-0 tables active">
			<thead>
				<tr>
					<th>Source</th>
					<th>Pageviews</th>
				</tr>
			</thead>
			<tbody>
				<?php 

				 if(!empty($social->rows)){
				 	foreach($social->rows as $socials){
				 		echo '<tr>';
				 			echo '<td>'.$socials[0].'</td>';
				 			echo '<td>'.$socials[1].'</td>';
				 		echo '</tr>';
				 	}
				 }
		 
				?>
				 
			</tbody>

		</table>
		<table class="organic-search top-1 tables">
			<thead>
				<tr>
					<th>Source</th>
					<th>Pageviews</th>
				</tr>
			</thead>
			<tbody>
				<?php 
	
				 if(!empty($direct->rows)){
				 	 foreach($direct->rows as $directs){

				 	 	echo '<tr>';
				 			echo '<td>'.$directs[0].'</td>';
				 			echo '<td>'.$directs[1].'</td>';
				 		echo '</tr>';
				 	 	
				 	 }
				 		
				 	 
				 }
		 
				?>
				 
			</tbody>

		</table>
		<table class="organic-search top-2 tables">
			<thead>
				<tr>
					<th>Source</th>
					<th>Pageviews</th>
				</tr>
			</thead>
			<tbody>
				<?php 
		 

				 if(!empty($organic->rows)){
				 	foreach($organic->rows as $organics){
				 		echo '<tr>';
				 			echo '<td>'.$organics[0].'</td>';
				 			echo '<td>'.$organics[1].'</td>';
				 		echo '</tr>';
				 	}
				 }
		 
				?>
				 
			</tbody>

		</table>
		<table class="organic-search top-3 tables">
			<thead>
				<tr>
					<th>Source</th>
					<th>Pageviews</th>
				</tr>
			</thead>
			<tbody>
				<?php 
		 

				 if(!empty($reffer->rows)){
				 	foreach($reffer->rows as $reffers){
				 		echo '<tr>';
				 			echo '<td>'.$reffers[0].'</td>';
				 			echo '<td>'.$reffers[1].'</td>';
				 		echo '</tr>';
				 	}
				 }
		 
				?>
				 
			</tbody>

		</table>
 

	</div>

</div>
<script>
var ctx2 = document.getElementById('total_channel').getContext('2d');
 
   var myChart = new Chart(ctx2, {
    type: 'doughnut',
    data: {
        datasets: [{
            label: 'Top Channel',
            data: <?php echo json_encode(array($socialm,$directm,$organicm,$otherm));?>,
            backgroundColor: [
                '#9258d5',
                '#fd8313',
                '#4fe287',
                '#ffc700',
            ],
            borderColor: [
                '#9258d5',
                '#fd8313',
                '#4fe287',
                '#ffc700',
            ],
            borderWidth: 1
        }]
    },
    options: {
            responsive: true,
            plugins: {
            legend: {
              position: 'right',
            },
            title: {
              display: true,
            }
          }
        }
});
</script>
<style>

.top-channel {
    float: left;
    width: 250px;
 
}
.tables tr td:nth-child(2) {
    text-align: center !important;
}
.analytic-modal {
    width: 100%;
    max-width: 100%;
    padding: 20px 240px;
    position: fixed;
    left: 0;
    top: 0;
    border-radius: 0;
    overflow-y: overlay;
    height: 609px;
}
.ndl-Grid-container {
    grid-template-columns: 1fr 1fr 1fr;
    display: grid;
    text-align: center;
}
.top-channel h3 {
    margin-bottom: 0;
    font-size:25px;
}

.top-channel-wrap {
    border-bottom: solid 1px #cbcbcb;
    overflow: hidden;
    padding-bottom: 40px;
    margin: 15px 0;
}
.ndl-Grid-container svg {
    width: 14px;
}
#total_channel {
    float: left;
}
p.ana-SingleArticleTrendingNumbers-TrendingNumber-value {
    font-size: 32px;
    margin: 0;
    font-weight: bold;
}
.list-channel {
    padding-top: 140px;
    float: left;
}

.list-channel ul li:hover {
    background-color: #def5f7;
    cursor: pointer;
}
table.tables.active{
	display:block;
}
table.tables {
    float: left;
    margin-top: 99px;
    padding-left: 25px;
    width: 230px;
    display:none;
}
 
.list-channel ul li {
    clear: both;
    vertical-align: middle;
    font-size: 15px;
    font-weight: 500;
    line-height: 1;
    padding: 2px;
}
.list-channel ul li.active{
	background-color: #def5f7;
}
.list-channel ul li:hover {
    background-color: #def5f7;
    cursor: pointer;
}
.list-channel ul span.social-color {
    background: #9258d5;
}
table.tables tr td,table.tables tr th {
    width: 81px;
    text-align: left;
    font-size:15px;
}
.list-channel ul .box {
    height: 15px;
    width: 20px;
    display: block;
    float: left;
    margin-right: 10px;
}
.list-channel {
    padding-top: 95px;
}
span.direct-color.box {
    background: #fd8313;
}

span.organic-color.box {
    background: #4fe287;
}
span.other-color.box {
    background: #ffc700;
}
</style>
 
