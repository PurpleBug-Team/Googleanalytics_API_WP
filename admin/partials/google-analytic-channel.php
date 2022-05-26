<canvas id="myChart"  height="200"></canvas>
<?php 
 
$array = array(
    array(
    'align'=>'left',
    'label'=> '(Other)',
    'data'=> $other_,
    'fill'=> 'false',
    'borderColor'=>'rgba(64, 108, 155, 1)',
    'backgroundColor'=>'rgba(0, 0, 0, 0)',
    'borderWidth'=>'2',
    //'hidden'=>true,
    
    ),
    array(
    'align'=>'left',
    'label'=> 'Social',
    'data'=> $social_,
    'fill'=> 'false',
    'borderColor'=>'rgba(146, 88, 213, 0.97)',
    'backgroundColor'=>'rgba(0, 0, 0, 0)',
    'borderWidth'=>'2',
    //'hidden'=>true,
    
    ),array(
    'align'=>'left',
    'label'=> 'Organic Search',
    'data'=> $orgnic_,
    'fill'=> 'false',
    'borderColor'=>'rgba(79, 226, 135, 1)',
    'backgroundColor'=>'rgba(0, 0, 0, 0)',
    'borderWidth'=>'2',
    //'hidden'=>true,
    
    ),array(
    'align'=>'left',
    'label'=> 'Direct',
    'data'=> $direct_,
    'fill'=> 'false',
    'borderColor'=>'rgba(253, 131, 19, 1)',
    'backgroundColor'=>'rgba(0, 0, 0, 0)',
    'borderWidth'=>'2',
    //'hidden'=>true,
    
    ),array(
    'align'=>'left',
    'label'=> 'Referral',
    'data'=> $referral_,
    'fill'=> 'false',
    'borderColor'=>'rgba(255, 199, 0, 1)',
    'backgroundColor'=>'rgba(0, 0, 0, 0)',
    'borderWidth'=>'2',
    //'hidden'=>true,
    
    ),array(
    'align'=>'left',
    'label'=> 'Paid Search',
    'data'=> array(0,0,0,0,0,0,0,0,0,0),
    'fill'=> 'false',
    'borderColor'=>'rgba(217, 88, 132, 1)',
    'backgroundColor'=>'rgba(0, 0, 0, 0)',
    'borderWidth'=>'2',
    //'hidden'=>true,
    
    )

    
);

if(isset($_GET['channel'])){
  $chan_slice = explode('-',$channel);
    foreach($array as $arr){

        if(in_array($arr['label'],$chan_slice)){
            $arr['hidden'] = false;
            $channel_s[] = $arr;
        }else{
            $arr['hidden'] = true;
            $channel_s[] = $arr;
        }
        
    }  
}else{
    $channel_s = $array ;
    
}


?>
<script>
var ctx = jQuery('#myChart');
ctx.height(400);
var myChart = new Chart(ctx, {type: 'line',
  data: {
        labels:<?php echo json_encode($dates);?>,
        datasets:  <?php echo json_encode($channel_s); ?>

        
    },
    
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      }
    },
    scales: {
      x: {
        display: true,
      },
      y: {
        display: true,
        
      }
    } 
  }

}); 
</script>	