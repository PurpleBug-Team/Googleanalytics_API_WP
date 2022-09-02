<?php 
  if(isset($_GET['count'])){
    $id = 'analytic-chart_'.$_GET['count'];
  }else{
    $id = 'analytic-chart-view';
  }
 ?> 
 <canvas id="<?php echo $id;?>" height="90" ></canvas>

<script>
 var config = {
        type: 'line',
        data: {
        labels:<?php echo json_encode($chartrange); ?>,
        datasets: [{
            align: 'start',
            label: 'New Visitors' ,
            data:<?php echo json_encode($prev_Data); ?>,
            backgroundColor: [
                'rgba(255 ,255 ,254,0.22)',
               
            ],
            borderColor: [
                '#46a6e7',
                
            ],
            borderWidth: 2
        },{
            align: 'start',
            label: 'Return Visitors',
            data: <?php echo json_encode($currnet_Data); ?>,
            backgroundColor: [
                'rgba(255 ,255 ,254,0.22)',
               
            ],
            borderColor: [
                'rgba(78 ,195 ,200,1)',
                
            ],
            borderWidth: 2
        }]
    },options: {

            responsive: true,
            plugins: {
            legend: {
              position: 'top',
            },
            title: {
              display: true,
            }
          }


        }
    };
   var ctx = document.getElementById('<?php echo $id;?>').getContext('2d');
   window.myPie = new Chart(ctx, config);



/*ss*/
var date_ = new Date();    
var date_present = new Date();
date_present.setDate(date_present.getDate() + 7); 
option_views('false',date_,date_present);
function option_views(range,start,end){
jQuery('select.chartlayout').change(function() {
  var $option = jQuery(this).find('option:selected');
            var value = $option.val();
            var prevdate = jQuery('input#compare-range-picker').val();
            
            var dates = jQuery('input.daterange').val();
            var start = dates.split('to')[0];
            var end = dates.split('to')[1];

             jQuery.ajax({
                 type : "GET",
                 url : ajaxurl,
                 data : {action: "change_chart",tab:true,metrics:value,range:false,start:start,end:end,prevdate:prevdate},
                 beforeSend:function(res){
                    jQuery('#loading').css('display','block');
                 },
                 success: function(response) {
                   jQuery('.my-chart').html(response);
                   jQuery('#loading').css('display','none');
                    console.log(prevdate);
                }
            }); 
   console.log('Hello World');         
            
});   
}   
</script>       