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
            label: 'Previous Period' ,
            data:<?php echo json_encode($prev_Data); ?>,
            backgroundColor: 'rgba(255 ,255 ,254,0.22)',
            borderColor:'rgba(210, 210, 210,1)',
            borderWidth: 2
        },{
            align: 'start',
            label: 'Current Period ',
            data: <?php echo json_encode($currnet_Data); ?>,
            backgroundColor:'rgba(255 ,255 ,254,0.22)',
            borderColor: 'rgba(78 ,195 ,200,1)',
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


   
</script>       