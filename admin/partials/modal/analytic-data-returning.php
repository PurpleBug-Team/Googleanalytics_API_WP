<?php 

  $discount = $user_new_retun->totalsForAllResults->{'ga:newUsers'} / $user_new_retun_prev->totalsForAllResults->{'ga:newUsers'} * 100; 

  $discount_1 =  $user_new_retun->totalsForAllResults->{'ga:newUsers'} <= $user_new_retun_prev->totalsForAllResults->{'ga:newUsers'} ?  'low': 'high';


  $new_prev = $user_new_retun->rows[0][1] <= $user_new_retun_prev->rows[0][1] ?  'low': 'high';
  $new_prev_1 = $user_new_retun->rows[0][1] < $user_new_retun_prev->rows[0][1] ?  $user_new_retun->rows[0][1] / $user_new_retun_prev->rows[0][1] * 100 : $user_new_retun_prev->rows[0][1] / $user_new_retun->rows[0][1] * 100;

  $return_prev = $user_new_retun->rows[1][1] <= $user_new_retun_prev->rows[1][1] ?  'low': 'high';

  $return_prev_1 = $user_new_retun->rows[1][1] < $user_new_retun_prev->rows[1][1] ?  $user_new_retun->rows[1][1] / $user_new_retun_prev->rows[1][1] * 100 : $user_new_retun_prev->rows[1][1] / $user_new_retun->rows[1][1] * 100;

 $returningnew = date("H:i",round($returnother->rows[0][1]));
 $returning_ = date("H:i",round($returnother->rows[1][1]));
 
echo '<pre>';
 print_r($averagerate[0]->rows[0][1]);
 echo '</pre>';


?>
<div class="returing-chart">
  <div class="chart-pageview">
  <canvas height="200" width="250" id="doughnut-chart" ></canvas>
    <?php  echo '<span class="total-view">'.$user_new_retun->totalsForAllResults->{'ga:newUsers'}.'<span class="'.$discount_1.' percentage">'.round($discount).'%</span></span>';?>
      
    <ul class="list-view">
      <li><span class="color blue">

      </span><strong>New</strong> <?php echo $user_new_retun->rows[0][1]?>  
      <span class="nc-icon label-icon <?php echo $new_prev ; ?> delta-positive">
        <i class="nc-icon-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 16">
                <g transform="translate(0, 0)"><polygon fill="#444444" points="8,11.4 2.6,6 4,4.6 8,8.6 12,4.6 13.4,6 "></polygon></g>
            </svg>
        </i>
      </span>
 
      <span class="amount- label-delta <?php echo $new_prev ; ?> delta-positive"><?php echo is_nan($new_prev_1)  ? 0: round($new_prev_1);?>%</span>

      </li>

      <li>
      <span class="color green"></span><strong>Returning</strong> 
            <span class="nc-icon label-icon  <?php echo $return_prev ; ?> delta-positive">
        <i class="nc-icon-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 16">
                <g transform="translate(0, 0)"><polygon fill="#444444" points="8,11.4 2.6,6 4,4.6 8,8.6 12,4.6 13.4,6 "></polygon></g>
            </svg>
        </i>
      </span>

      <span class="amount- label-delta <?php echo $return_prev ; ?> delta-positive"><?php echo is_nan($return_prev_1)  ? 0: round($return_prev_1);?>%</span>

      </li>
    </ul>
  </div>
<div class="chart-attentiotime">
<canvas height="200" width="250" id="bar-chart-horizontal"></canvas>
</div>
<div class="chart-engagement">
<canvas id="bar-chart" height="200" width="250"></canvas>
</div>
</div> 
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
                <div class="pillbox-toggle date-action"><button class="active ">Daily</button><button class="">Weekly</button><button class="">Monthly</button></div>
                <div class="pillbox-toggle"></div>
            </div>
         
        </div>
        <div class="my-chart">
          <?php include( plugin_dir_path( __FILE__ ) . '/google-analytic-chart-returning.php' ); ?>
        </div>    

        
      </div>

<div class="returning-table">
  
  <div id="analytics-report-tab-table">
    <ul>
      <li><a href="#tabs-1">OVERALL</a></li>
      <li><a href="#tabs-2">CHANNEL</a></li>
      <li><a href="#tabs-3">Conversions</a></li>
    </ul>

    <div id="tabs-1" class="returning-tab">
      <table class="returning-table">
        <thead>
          <tr>
            <th>&nbsp;</th>
            <th>Articles Viewed</th>
            <th>Pageviews</th>
            <th>Unique Visitors</th>
           
            <th>Avg. Attn Time</th>
            <th>Eng. Rate</th>
           
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              All Visitors
            </td>
            <td>-</td>
            <td>
              <?php  echo $overallconent->totalsForAllResults->{'ga:pageviews'};?>
            </td>
            <td>
              <?php  echo $overallconent->totalsForAllResults->{'ga:uniquePageviews'};?>
            </td>
            
            <td>
               <?php echo round($overallconent->totalsForAllResults->{'ga:avgTimeOnPage'});?>
            </td>
            <td>
               <?php echo round($overallconent->totalsForAllResults->{'ga:bounceRate'});?>
            </td>
            
          </tr>

          <tr>
            <td>
              Returning Visitors
            </td>
            <td>-</td>
            <td>
              <?php  echo $overallconent->rows[0][3];?>
            </td>
            <td>
              <?php  echo $overallconent->rows[0][4];?>
            </td>
           
            <td>
               <?php  echo round($overallconent->rows[0][5]);?>
            </td>
            <td>
               <?php  echo round($overallconent->rows[0][2]);?>
            </td>
           
          </tr>

          <tr>
            <td>
              New Visitors
            </td>
            <td>-</td>
            <td>
              <?php  echo $overallconent->rows[1][3];?>
            </td>
            <td>
              <?php  echo $overallconent->rows[1][4];?>
            </td>
           
            <td>
               <?php  echo round($overallconent->rows[1][5]);?>
            </td>
            <td>
               <?php  echo round($overallconent->rows[1][2]);?>
            </td>
           
          </tr>
        </tbody>
      </table>
  
    </div>
    <div id="tabs-2" class="returning-tab">
      <pre>
        <?php
           // print_r();
         ?>
      </pre>
      <table class="returning-table">
        <thead>
          <tr>
            <th>Pageviews</th>
            <th>Socials</th>
            <th>Organic Search</th>
            <th>Direct</th>
            <th>Referral</th>
            <th>(Other)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              All Visitors
            </td>
             <td><?php echo $returnocial->totalsForAllResults->{'ga:pageviews'}+$newsocial->totalsForAllResults->{'ga:pageviews'};?></td>
            <td>
                <?php echo $returnorganic->totalsForAllResults->{'ga:organicSearches'}+$neworganic->totalsForAllResults->{'ga:organicSearches'};?>
            </td>
            <td>
              <?php  echo $returndirect->totalsForAllResults->{'ga:pageviews'}+$newdirect->totalsForAllResults->{'ga:pageviews'};?>
            </td>
            <td>
              <?php  echo $returnreferral->totalsForAllResults->{'ga:pageviews'}+$newreferral->totalsForAllResults->{'ga:pageviews'};?>
            </td>
            <td>
               <?php  echo $returnother->rows[0][1]+$returnother->rows[0][1];?>
            </td>
           
          </tr>

          <tr>
            <td>
              Returning Visitors
            </td>
             <td><?php echo $returnocial->totalsForAllResults->{'ga:pageviews'};?></td>
            <td>
                <?php echo $returnorganic->totalsForAllResults->{'ga:organicSearches'};?>
            </td>
            <td>
              <?php  echo $returndirect->totalsForAllResults->{'ga:pageviews'};?>
            </td>
            <td>
              <?php  echo $returnreferral->totalsForAllResults->{'ga:pageviews'};?>
            </td>
            <td>
               <?php  echo $returnother->rows[0][1];?>
            </td>
          </tr>
           
          <tr>
            <td>
              New Visitors
            </td>
            <td><?php echo $newsocial->totalsForAllResults->{'ga:pageviews'};?></td>
            <td>
                <?php echo $neworganic->totalsForAllResults->{'ga:organicSearches'};?>
            </td>
            <td>
              <?php  echo $newdirect->totalsForAllResults->{'ga:pageviews'};?>
            </td>
            <td>
              <?php  echo $newreferral->totalsForAllResults->{'ga:pageviews'};?>
            </td>
            <td>
               <?php  echo $newother->rows[0][1];?>
            </td>
        
          </tr>
        </tbody>
      </table>
    </div>
    <div id="tabs-3">
    ff
    </div>
  </div>
</div>      
             
<style>
table.returning-table tr th:first-child,table.returning-table tr td:first-child {
    border-right: solid 1.5px #393939;
   
}
table.returning-table tr:hover td{
    background:#f5f7fa;
    cursor:pointer;
}
table.returning-table tr th:first-child{
    border-bottom: none; 
}
table.returning-table tr td{
    border-bottom:solid 1px #bbb;
}
table.returning-table thead tr th {
    border-bottom: solid 1.5px  #393939;
}
table.returning-table {
    width: 1050px;
    margin-top: 15px;
    border-collapse: separate;
    border-spacing: 0;
}
table.returning-table tbody tr td {
    text-align: center;
    padding: 20px;
  
}
table.returning-table tbody tr:first-child td {
    background: #fffbd6;
}

.returning-tab {
    overflow: auto;
}
table.returning-table tr th {
    background: #f5f7fa;
    clear: both;
    padding:20px 5px;
}
span.amount-.label-delta.low.delta-positive {
    margin-top: 0px  !important;
}
span.amount-.label-delta.high.delta-positive {
    margin-top: 5px !important;
}
span.percentage {
    display: block;
    margin-top: 15px;
}
span.amount- {
    margin:  0px 2px;
}
.returing-chart {
    display: flex;
}
.chart-pageview {
    width: 250px;
}
.chart-pageview {
    position: relative;
}
.label-icon svg {
    width: 14px;
    margin-top: 3px;
}
.chart-pageview span.total-view {
    position: absolute;
    top: 75px;
    z-index: 0;
    width: 100%;
    text-align: center;
    font-size: 20px;
    color: #000;
}
ul.list-view li {display:flex;font-size: 15px;}

ul.list-view span.color {
    /* background: #000; */
    width: 9px;
    height: 9px;
    padding: 2px;
    border-radius: 50%;
    margin-top: 3px;
    margin-right: 5px;
}

ul.list-view span.color.blue {
    background: #46a6e7;
}

ul.list-view span.color.green {
    background: #4fe287;
}

ul.list-view li strong {
    margin-right: 10px;
}
</style>	
<script>
 
new Chart(document.getElementById("doughnut-chart"), {
    type: 'doughnut',
    data: {
      lables: ['New','Returning'],
      datasets: [
        {
          backgroundColor: ["#4fe287", "#46a6e7"],
          data: [<?php echo $user_new_retun->rows[1][1]?>,<?php echo $user_new_retun->rows[0][1]?>]
        }
      ]
    },
    options: {
    legend: {
      display: false
    } 
  }
});
jQuery( "#analytics-report-tab-table" ).tabs();
/*********/

var ctx = document.getElementById("bar-chart-horizontal");
var myChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
    labels: ["match1", "match2"],
    datasets: [
      {
        label: "TeamA Score",
        data: [10, 50, 25, 70],
        backgroundColor: [
          "#46a6e7",
          "#4fe287",
        ]
      },
      {
        label: "TeamB Score",
        data: [20, 35, 40, 60, 50],
        backgroundColor: [
          "#d2d2d2",
          "#d2d2d2",

        ]
      }
    ]
  },
    options: {
        "hover": {
          "animationDuration": 1
        },
        "animation": {
          "duration": 1,
            "onComplete": function () {
              var chartInstance = this.chart,
                ctx = chartInstance.ctx;
              
              ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
              ctx.textAlign = 'center';
              ctx.textBaseline = 'bottom';

              this.data.datasets.forEach(function (dataset, i) {
                var meta = chartInstance.controller.getDatasetMeta(i);
                meta.data.forEach(function (bar, index) {
                  var data = dataset.data[index];                            
                  ctx.fillText(data, bar._model.x+20, bar._model.y+7);
                });
              });
            }
        },
        legend: {
          "display": false
        },
        tooltips: {
          "enabled": false
         },
        scales: {
            yAxes: [{
              
                gridLines: {
                  display : false
                },
                ticks: {
                    display: false,
                    beginAtZero:true
                }
            }],
            xAxes: [{
                    display: false,
                gridLines: {
                  display : false
                },
                ticks: {
                    beginAtZero:true,
                    display : false
                }
            }]
        }
    }
});

/****************/
var ctx2 = document.getElementById("bar-chart");
var myChart2 = new Chart(ctx2, {
    type: 'bar',
    data: {
    labels: ["match1", "match2"],
    datasets: [
      {
        label: "TeamA Score",
        data: [10, 50,],
        backgroundColor: [
          "#46a6e7",
          "#4fe287",

        ]
      },
      {
        label: "TeamB Score",
        data: [20, 35],
        backgroundColor: [
          "#d2d2d2",
          "#d2d2d2",

        ]
      }
    ]
  },
    options: {
        "hover": {
          "animationDuration": 1
        },
        "animation": {
          "duration": 1,
            "onComplete": function () {
              var chartInstance = this.chart,
                ctx = chartInstance.ctx;
              
              ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
              ctx.textAlign = 'center';
              ctx.textBaseline = 'bottom';

              this.data.datasets.forEach(function (dataset, i) {
                var meta = chartInstance.controller.getDatasetMeta(i);
                meta.data.forEach(function (bar, index) {
                  var data = dataset.data[index];                            
                  ctx.fillText(data, bar._model.x, bar._model.y-5);
                });
              });
            }
        },
        legend: {
          "display": false
        },
        tooltips: {
          "enabled": false
         },
        scales: {
            yAxes: [{
                display: false,
                gridLines: {
                  display : false
                },
                ticks: {
                    display: false,
                    beginAtZero:true
                }
            }],
            xAxes: [{
                    
                gridLines: {
                  display : false
                },
                ticks: {
                    beginAtZero:true,
                    display : false
                }
            }]
        }
    }
});



</script>				