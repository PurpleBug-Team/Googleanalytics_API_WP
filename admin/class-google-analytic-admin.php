<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       google-analytic
 * @since      1.0.0
 *
 * @package    Google_Analytic
 * @subpackage Google_Analytic/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Google_Analytic
 * @subpackage Google_Analytic/admin
 * @author     John Ricardo Porras <porrasjohnricardo530@gmail.com>
 */
class Google_Analytic_Admin {
    
	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
    $token = get_option('gapi_access_token',$token['access_token']);
    $this->access_token = $token;
    $this->view_id = "UA-162521807-1'";
    $this->ga_id = urlencode('ga:214986634');
	}


	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Google_Analytic_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Google_Analytic_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

        if(isset($_GET['page'])){
            if($_GET['page'] == 'analytics' ){
                wp_enqueue_style( $this->plugin_name.'analytic', plugin_dir_url( __FILE__ ) . 'css/google-analytic-admin.css', array(), $this->version, 'all' );
			// wp_enqueue_style( $this->plugin_name.'style', plugin_dir_url( __FILE__ ) . 'css/sb-admin-2.min.css', array(), $this->version, 'all' );
    			wp_enqueue_style( $this->plugin_name.'style', plugin_dir_url( __FILE__ ) . 'css/styles.css', array(), $this->version, 'all' );
    		}
        }
		
		
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Google_Analytic_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Google_Analytic_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
	//	
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/google-analytic-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name.'chart', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js', array( 'jquery' ), $this->version, false );
   // wp_enqueue_script( $this->plugin_name.'chart_bundle', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.bundle.js', array( 'jquery' ), $this->version, false );

  
        

 
	}
	
	public function  initialize_analytic(){
	    include( GOOGLE_PATH . '/HelloAnalytics.php' );
	    return $analytics;
	}
  function view_page_analytic(){
    
      include( plugin_dir_path( __FILE__ ) . '/partials/modal/page-view_analytic.php' );

    die();
  }
  function channel_analytic(){

       $start_Date = explode('to',$_GET['dates']);
       $start_current = date('Y-m-d',strtotime($start_Date[0]));
       $end_current = date('Y-m-d',strtotime($start_Date[1]));
        
       $period_current = new DatePeriod(
                    new DateTime($start_current),
                    new DateInterval('P1D'),
                    new DateTime($end_current)
        );

         $option = isset($_GET['option']) ? $_GET['option']: 'ga:pageviews';
         $option_roganic = isset($_GET['option']) ? $_GET['option']: 'ga:organicSearches';
        foreach($period_current as $key => $period_currents){
            
              if($_GET['val']=='channel'){
                 $social = $this->Query('https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id.'&dimensions=ga%3AfullReferrer&metrics='.urlencode($option).'&filters=ga%3AhasSocialSourceReferral%3D%3DYes&start-date='.$period_currents->format("Y-m-d").'&end-date='.$period_currents->format("Y-m-d").'');
                 $social_[] = $social->totalsForAllResults->{$option};

                 $orgnic = $this->Query('https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id.'&metrics='.urlencode($option_roganic).'&start-date='.$period_currents->format("Y-m-d").'&end-date='.$period_currents->format("Y-m-d").'');
                 $orgnic_[] = $orgnic->totalsForAllResults->{$option_roganic};

                 $direct = $this->Query('https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id.'&dimensions=ga%3AsocialNetwork&metrics='.urlencode($option).'&start-date='.$period_currents->format("Y-m-d").'&end-date='.$period_currents->format("Y-m-d").'');
                 $direct_[] = $direct->totalsForAllResults->{$option};

                 $referral = $this->Query('https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id.'&dimensions=ga%3AsocialNetwork%2Cga%3AhasSocialSourceReferral&metrics='.urlencode($option).'&filters=ga%3AhasSocialSourceReferral%3D%3DNo&start-date='.$period_currents->format("Y-m-d").'&end-date='.$period_currents->format("Y-m-d").'');
                 $referral_[] = $referral->totalsForAllResults->{$option};

                 $paid = 'https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id.'&metrics=ga%3AadCost%2Cga%3AcostPerTransaction&start-date='.$period_currents->format("Y-m-d").'&end-date='.$period_currents->format("Y-m-d").'';

                 $other = $this->Query('https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id.'&dimensions=ga%3AnetworkDomain&metrics=ga%3Apageviews&start-date='.$period_currents->format("Y-m-d").'&end-date='.$period_currents->format("Y-m-d").'');
                 $other_[] =  $other->totalsForAllResults->{'ga:pageviews'};

                 $dates[] = $period_currents->format("M j Y");

              }elseif($_GET['val']=='prev'){
                 $chartrange[] = $period_currents->format("D, M j");
              }

          }

            echo $_GET['task'];
          if($_GET['val']=='channel'){

            $channel = $_GET['channel'];
 
            include( plugin_dir_path( __FILE__ ) . '/partials/google-analytic-channel.php' );

          }elseif($_GET['val']=='prev'){
              $prevdate = $_GET['prevdate'];
            
              $prev_start = date("Y-m-d",strtotime($prevdate));
              $prev_end = date("Y-m-d",strtotime('now'));

              $metrics = 'ga:pageviews';
              $currnet_Data = $this->chart_loop_actual($start_current,$end_current,$metrics);
              $prev_Data = $this->chart_loop_prev($prev_start,$prev_end,$metrics);  
             

              include( plugin_dir_path( __FILE__ ) . '/partials/google-analytic-chart.php' );
                     
          }
    die();
  }
  function action_chart(){
     if(isset($_GET['start'])){

         $start = strtotime($_GET['start']);
         $end = strtotime($_GET['end']);
         $prestent_date = date('Y-m-d', $start);
         $latest = date('Y-m-d',$end);

        
        
         $period_ = new DatePeriod(
                    new DateTime($prestent_date),
                    new DateInterval('P1D'),
                    new DateTime($latest)
          );

           foreach($period_ as $key => $perioded){
                $data = $this->action_chart_view($perioded->format("Y-m-d"),$perioded->format("Y-m-d"),$_GET['name']);
                $com[] = $data[0];

                $dates[] = $perioded->format("M j Y");
          }

          $prevd = explode('to',$_GET['prevdate']); 
          $prevstartdate = date('Y-m-d', strtotime($prevd[0]));
          $prevenddate = date('Y-m-d', strtotime($prevd[1]));
          $period_prev = new DatePeriod(
                    new DateTime($prevstartdate),
                    new DateInterval('P1D'),
                    new DateTime($prevenddate)
          );

          foreach($period_prev as $key => $prevdate){
                $prevdatedata = $this->action_chart_view($prevdate->format("Y-m-d"),$prevdate->format("Y-m-d"),$_GET['name']);
                $comprev[] = $prevdatedata[0];
          }

         $dat_com = array('rangevalue'=>$com,'daterange'=>$dates,'prevdata'=>$comprev,);      
          echo json_encode($dat_com);
        die();
       
     }else{
       
   
       $start_Date = explode('to',$_GET['current_date']);
       $start_current = date('Y-m-d',strtotime($start_Date[0]));
       $end_current = date('Y-m-d',strtotime($start_Date[1]));
        
         $period_current = new DatePeriod(
                    new DateTime($start_current),
                    new DateInterval('P1D'),
                    new DateTime($end_current)
          );

          
          foreach($period_current as $key => $period_currents){
                $data_current = $this->action_chart_view($period_currents->format("Y-m-d"),$period_currents->format("Y-m-d"),'(not set)');
                $com[] = $data_current[0];

                $dates[] = $period_currents->format("M j Y");

               
          }

          $prevd = explode('to',$_GET['prev_date']); 
          $prevstartdate = date('Y-m-d', strtotime($prevd[0]));
          $prevenddate = date('Y-m-d', strtotime($prevd[1]));
          $period_prev = new DatePeriod(
                    new DateTime($prevstartdate),
                    new DateInterval('P1D'),
                    new DateTime($prevenddate)
          );

          foreach($period_prev as $key => $period_prevs){
                $data_prev = $this->action_chart_view($period_prevs->format("Y-m-d"),$period_prevs->format("Y-m-d"),'(not set)');
                $com_prev[] = $data_prev[0];
 
               
          }


           $dat_com = array('rangevalue'=>$com,'daterange'=>$dates,'prevdata'=>$com_prev,'dates'=>array($start_current,$end_current));   
          
           return $dat_com;   
         // echo json_encode($dat_com);

        

     } 
    
  }


  function action_chart_view($start,$end,$name){
     $prestent_date = date('Y-m-d', $start);
     $latest = date('Y-m-d',$end);
 
       $data_action = 'https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id.'&dimensions=ga%3AsocialNetwork&metrics=ga%3Apageviews&start-date='.$start.'&end-date='.$end.'';


         $cURLConnection = curl_init();

            curl_setopt($cURLConnection, CURLOPT_URL, $data_action );
            curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

            $phoneList = curl_exec($cURLConnection);
            curl_close($cURLConnection);

            $jsonArrayResponse = json_decode($phoneList);

          if(!empty($jsonArrayResponse->rows)){
                
               foreach($jsonArrayResponse->rows as  $val){

                  if($val[0]==$name){
                    $set[] = $val[1];
                  }
               }
             }
    return $set;

  }

  function analytic_table($start,$end){

   $data =  'https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id .'&dimensions=ga%3ApagePath%2Cga%3ApageTitle%2Cga%3Adate&metrics=ga%3Apageviews%2Cga%3AuniquePageviews%2Cga%3AavgTimeOnPage&start-date='.$start.'&end-date='.$end.'';



              $cURLConnection = curl_init();

                curl_setopt($cURLConnection, CURLOPT_URL, $data );
                curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

                $phoneList = curl_exec($cURLConnection);
                curl_close($cURLConnection);

                $jsonArrayResponse = json_decode($phoneList);

                $total_datadatable_pageview = $jsonArrayResponse->totalsForAllResults;
                $all_datatable = $jsonArrayResponse->rows ;

       return  $jsonArrayResponse;         
    
  }

  public function tab_layout_data(){

        $latest2 = date('Y-m-d');
        $date_add2 = strtotime("-10 day");
        $prestent_date2 = date('Y-m-d', $date_add2);

        $date_add = strtotime("-10 day");
        $prestent_date = date('M j Y', $date_add);
        $latest = date('M j Y');
 
        $period = new DatePeriod(
                new DateTime($prestent_date),
                new DateInterval('P1D'),
                new DateTime($latest)
        );
        foreach($period as $key => $perioded){
                $chartrange[] = $perioded->format("D, M j");
        }

        $date_add_prev = strtotime("-12 day");
        $prestent_date_prev = date('M j Y', $date_add_prev);
        $latest_prev = date('M j Y');
 
        $period_prev = new DatePeriod(
                new DateTime($prestent_date_prev),
                new DateInterval('P1D'),
                new DateTime($latest_prev)
        );


        $metrics = 'ga:pageviews';
        
     
      $tab = $_GET['tab'];

      $article_total = $this->article_total($prestent_date2, $latest2);
      $new = $this->chart_query($prestent_date2, $latest2,$metrics);
          
           $all_datatable = $this->analytic_table($prestent_date2, $latest2);
         
           $avgTimeOnPage= $all_datatable->totalsForAllResults->{'ga:avgTimeOnPage'};
           $pageview= $all_datatable->totalsForAllResults->{'ga:pageviews'};
           $uniquePageviews= $all_datatable->totalsForAllResults->{'ga:uniquePageviews'};

           $GA_prev = $this->GA_prev_query('',''); 

           $currnet_Data = $this->chart_loop_current($prestent_date2, $latest2,$metrics);

           $prevdate = $_GET['prev_date'];
           $prevdate_ = explode('to',$prevdate);
           $prev_start = date("Y-m-d",strtotime($prevdate));
           $prev_end = date("Y-m-d",strtotime('now'));
           $prev_Data = $this->chart_loop_prev($prev_start,$prev_end,$metrics);


      switch ($tab) {
        case "new-returning":
          $user_new_retun = $this->Query('https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id .'&dimensions=ga%3AuserType&metrics=ga%3AnewUsers&start-date='.$prestent_date2.'&end-date='.$latest2.'');

          $overallconent = $this->Query('https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id .'&dimensions=ga%3AuserType&metrics=ga%3AnewUsers%2Cga%3AbounceRate%2Cga%3Apageviews%2Cga%3AuniquePageviews%2Cga%3AavgTimeOnPage&start-date='.$prestent_date2.'&end-date='.$latest2.'');
         
          $user_new_retun_prev = $this->Query('https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id .'&dimensions=ga%3AuserType&metrics=ga%3AnewUsers&start-date='.$prev_start.'&end-date='.$prev_end.'');


          $newsocial = $this->Query('https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id .'&metrics=ga%3Apageviews&filters=ga%3AuserType%3D%3DNew+Visitor%3Bga%3AhasSocialSourceReferral%3D%3DYes&start-date='.$prev_start.'&end-date='.$prev_end.'');
          $neworganic = $this->Query('https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id .'&metrics=ga%3AorganicSearches%2Cga%3Apageviews&filters=ga%3AuserType%3D%3DNew+Visitor&start-date='.$prev_start.'&end-date='.$prev_end.'');
          $newdirect = $this->Query('https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id .'&metrics=ga%3Apageviews&filters=ga%3AuserType%3D%3DNew+Visitor&start-date='.$prev_start.'&end-date='.$prev_end.'');
          $newreferral = $this->Query('https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id .'&metrics=ga%3Apageviews&filters=ga%3AuserType%3D%3DNew+Visitor%3Bga%3AhasSocialSourceReferral%3D%3DNo&start-date='.$prev_start.'&end-date='.$prev_end.'');
          $newother = $this->Query('https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id .'&dimensions=ga%3AsocialNetwork&metrics=ga%3Apageviews&filters=ga%3AuserType%3D%3DNew+Visitor%3Bga%3AhasSocialSourceReferral%3D%3DNo&start-date='.$prev_start.'&end-date='.$prev_end.'');

          $returnocial = $this->Query('https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id .'&metrics=ga%3Apageviews&filters=ga%3AuserType%3D%3DReturning+Visitor%3Bga%3AhasSocialSourceReferral%3D%3DYes&start-date='.$prev_start.'&end-date='.$prev_end.'');
          $returnorganic = $this->Query('https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id .'&metrics=ga%3AorganicSearches%2Cga%3Apageviews&filters=ga%3AuserType%3D%3DReturning+Visitor&start-date='.$prev_start.'&end-date='.$prev_end.'');
          $returndirect = $this->Query('https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id .'&metrics=ga%3Apageviews&filters=ga%3AuserType%3D%3DReturning+Visitor&start-date='.$prev_start.'&end-date='.$prev_end.'');
          $returnreferral = $this->Query('https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id .'&metrics=ga%3Apageviews&filters=ga%3AuserType%3D%3DReturning+Visitor%3Bga%3AhasSocialSourceReferral%3D%3DNo&start-date='.$prev_start.'&end-date='.$prev_end.'');

          $returnother = $this->Query('https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id .'&dimensions=ga%3AsocialNetwork&metrics=ga%3Apageviews&filters=ga%3AuserType%3D%3DReturning+Visitor%3Bga%3AhasSocialSourceReferral%3D%3DNo&start-date='.$prev_start.'&end-date='.$prev_end.'');

          $returnother = $this->Query('https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id .'&dimensions=ga%3AuserType&metrics=ga%3AtimeOnPage&start-date='.$prev_start.'&end-date='.$prev_end.'');

          
          $averagerate[] = $this->Query('https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id .'&dimensions=ga%3AuserType&metrics=ga%3AbounceRate&start-date='.$prestent_date2.'&end-date='.$latest2.'');
          
          $averagerate_prev[] = $this->Query('https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id .'&dimensions=ga%3AuserType&metrics=ga%3AbounceRate&start-date='.$prev_start.'&end-date='.$prev_end.'');
            

         

          include( plugin_dir_path( __FILE__ ) . '/partials/analytic-data-returning.php' );
          break;
        case "action":
          $action_chart_tab =  $this->action_chart();
          include( plugin_dir_path( __FILE__ ) . '/partials/analytic-action.php' );
          break;
        default:
            echo '<div class="analytics">';
            include( plugin_dir_path( __FILE__ ) . 'partials/range-char-data.php' );
            echo '</div>';
      }




    die();
  }

 
	public function my_google_analytic(){
    
        $latest2 = date('Y-m-d');
	      $date_add2 = strtotime("-10 day");
        $prestent_date2 = date('Y-m-d', $date_add2);

        $date_add = strtotime(isset($_GET['stardate'])? $_GET['stardate']: '-10 day');
        $prestent_date = date('M j Y', $date_add);
        $latest = isset($_GET['endDate'])? $_GET['endDate']: date('M j Y');
 
        $period = new DatePeriod(
                new DateTime($prestent_date),
                new DateInterval('P1D'),
                new DateTime($latest)
        );
        foreach($period as $key => $perioded){
                $chartrange[] = $perioded->format("D, M j");
        }


        $date_add_prev = strtotime("-2 month");
        $prestent_date_prev = date('M j Y', $date_add_prev);
        $latest_prev = date('M j Y',strtotime("-1 month"));
 
        $period_prev = new DatePeriod(
                new DateTime($prestent_date_prev),
                new DateInterval('P1D'),
                new DateTime($latest_prev)
        );


        $metrics = 'ga:pageviews';
        
 

       if(isset($_GET['range'])){
           //$data = $this->get_analytic_data($_GET['stardate'],$_GET['endDate']);
             $article_total = $this->article_total($_GET['stardate'],$_GET['endDate']);
             $currnet_Data =$this->chart_loop_current($_GET['stardate'],$_GET['endDate'],$metrics);
             $all_datatable = $this->analytic_table($_GET['stardate'],$_GET['endDate']);
             $avgTimeOnPage= $all_datatable->totalsForAllResults->{'ga:avgTimeOnPage'};
             $pageview= $all_datatable->totalsForAllResults->{'ga:pageviews'};
             $uniquePageviews= $all_datatable->totalsForAllResults->{'ga:uniquePageviews'};
             $article_total = $this->article_total($_GET['stardate'],$_GET['endDate']);
             $prevdate = $_GET['prevdate'];
             $prevdate_ = explode('to',$prevdate);
             $prev_start = date("Y-m-d",strtotime($prevdate));
             $prev_end = date("Y-m-d",strtotime('now'));

             $prev_Data = $this->chart_loop_prev($prev_start,$prev_end,$metrics);
    
             $GA_prev = $this->GA_prev_query($prev_start,$prev_end);
              
             echo '<div class="analytics">';
             include( plugin_dir_path( __FILE__ ) . 'partials/range-char-data.php' );
             echo '</div>';

           die();
       }elseif(isset($_GET['compare'])){
            $start = date("Y-m-d",strtotime($_GET['stardate']));
            $end = date("Y-m-d",strtotime($_GET['endDate']));
             $prevdate = $_GET['prevdate'];
             $prevdate_ = explode('to',$prevdate);
             $prev_start = date("Y-m-d",strtotime($prevdate));
             $prev_end = date("Y-m-d",strtotime('now'));
            $GA_prev = $this->GA_prev_query($prev_start,$prev_end);
            
            
            $article_total = $this->article_total($start,$end); 
            $currnet_Data =$this->chart_loop_current($start,$end,$metrics);
            $all_datatable = $this->analytic_table($start,$end);
            $avgTimeOnPage= $all_datatable->totalsForAllResults->{'ga:avgTimeOnPage'};
            $pageview= $all_datatable->totalsForAllResults->{'ga:pageviews'};
            $uniquePageviews= $all_datatable->totalsForAllResults->{'ga:uniquePageviews'}; 
            $prev_Data = $this->chart_loop_prev($prev_start,$prev_end, $metrics);
            echo '<div class="analytics">';
            include( plugin_dir_path( __FILE__ ) . 'partials/range-char-data.php' );
            echo '</div>';
            die();
       }else{
           $article_total = $this->article_total($prestent_date2, $latest2);
           $currnet_Data = $this->chart_loop_current($prestent_date2, $latest2,$metrics);
           $prev_Data = $this->chart_loop_prev($prestent_date_prev,$latest_prev,$metrics);
           $all_datatable = $this->analytic_table($prestent_date2, $latest2);
           $avgTimeOnPage= $all_datatable->totalsForAllResults->{'ga:avgTimeOnPage'};
           $pageview= $all_datatable->totalsForAllResults->{'ga:pageviews'};
           $uniquePageviews= $all_datatable->totalsForAllResults->{'ga:uniquePageviews'};
           $GA_prev = $this->GA_prev_query('','');

           echo '<div class="analytics">';
           include( plugin_dir_path( __FILE__ ) . 'partials/google-analytic-admin-display.php' );
           echo '</div>';
       }
   
	}

  function chart_loop_current($start,$end,$metrics){


        $period = new DatePeriod(
                new DateTime($start),
                new DateInterval('P1D'),
                new DateTime($end)
        );

         foreach($period as $key => $perioded){
            $get_total = $this->chart_query( $perioded->format("Y-m-d"),$perioded->format("Y-m-d"),$metrics);
  
            $currnet_Data[] = ($get_total['pageview_total']->{'ga:pageviews'}=='')? 0:$get_total['pageview_total']->{'ga:pageviews'};

          }

        return $currnet_Data;  

         
  }
  
  function chart_loop_prev($start,$end,$metrics){
 
      $period_prev = new DatePeriod(
                new DateTime($start),
                new DateInterval('P1D'),
                new DateTime($end)
      );
     foreach($period_prev as $key => $period_prevs){
            $get_total_prev = $this->chart_query( $period_prevs->format("Y-m-d"),$period_prevs->format("Y-m-d"),$metrics);
           
            $prev_Data[] = ($get_total_prev['pageview_total']->{''.urldecode($metrics).''}=='')? 0:$get_total_prev['pageview_total']->{''.urldecode($metrics).''};
               
               
      }

     return $prev_Data; 
  }
  function chart_loop_actual($start,$end,$metrics){
        $date_add = strtotime($start);
        $prestent_date = date('M j Y', $date_add);
        $latest = date('M j Y',strtotime($end));
 
        $period = new DatePeriod(
                new DateTime($prestent_date),
                new DateInterval('P1D'),
                new DateTime($latest)
        );

     foreach($period as $key => $period_prevs){
            $get_total_prev = $this->chart_query( $period_prevs->format("Y-m-d"),$period_prevs->format("Y-m-d"),$metrics);
           
            $actual[] = ($get_total_prev['pageview_total']->{''.urldecode($metrics).''}=='')? 0:$get_total_prev['pageview_total']->{''.urldecode($metrics).''};
               
               
      }

     return $actual; 
  }
  function GA_prev_query($start,$end){

     $date_add_prev2 = strtotime("-12 day");
     $prestent_date_prev2 = ($start == '')? date('Y-m-d', $date_add_prev2): $start;

     $latest_prev = strtotime("-10 day");
     $latest = ($end =='') ? date('Y-m-d',$latest_prev):$end;
 
// $latest = '2022-07-19';
    $data = 'https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id.'&dimensions=ga%3ApagePath&metrics=ga%3AbounceRate%2Cga%3Apageviews%2Cga%3AuniquePageviews%2Cga%3AavgTimeOnPage&start-date='.$prestent_date_prev2.'&end-date='.$latest.'&start-index=1';

    $GA_prev = $this->GA_curl($data);
    if($GA_prev->error->code == 401){
      // Refresh the access token
       include( plugin_dir_path( __FILE__ ) . 'partials/google-api-login.php' );
      die();

    }else{
      $total =array();
      foreach($GA_prev->rows as $prev_data){
         
        $expolded = explode('/article/',$prev_data[0]);

       // if( !empty($expolded)) continue;
        // if (strpos($prev_data[0], '/article/') !== false)  {
             $total8[] =$prev_data[2];
        //  }

      }
    $array = array(
           
     'articleview'=> array_sum($total8),
     'pageviews'=>$GA_prev->totalsForAllResults->{'ga:pageviews'},
     'uniquePageviews'=>$GA_prev->totalsForAllResults->{'ga:uniquePageviews'},
     'avgTimeOnPage'=>$GA_prev->totalsForAllResults->{'ga:avgTimeOnPage'},
     'AbounceRate' =>  $GA_prev->totalsForAllResults->{'ga:AbounceRate'},
           );
      return $array;
    }
  }
  function GA_curl($data){
    $cURLConnection = curl_init();

      curl_setopt($cURLConnection, CURLOPT_URL, $data );
      curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

      $phoneList = curl_exec($cURLConnection);
      curl_close($cURLConnection);

      $jsonArrayResponse = json_decode($phoneList);

      return $jsonArrayResponse;
  }
  function chart_query($start,$end,$metrics){

    $metrics_s = urlencode($metrics);
    
     $data = 'https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id.'&dimensions=ga%3ApagePath%2Cga%3ApageTitle&metrics='.$metrics_s.'&segment=gaid%3A%3A-1&start-date='.$start.'&end-date='.$end.'&start-index=1';

     $cURLConnection = curl_init();

      curl_setopt($cURLConnection, CURLOPT_URL, $data );
      curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

      $phoneList = curl_exec($cURLConnection);
      curl_close($cURLConnection);

      $jsonArrayResponse = json_decode($phoneList);
       
      
     if(!empty($jsonArrayResponse->rows)){
       $total =array();
       foreach($jsonArrayResponse->rows as $data ){
          
         $expolded = explode('/article/',$data[0]);

         // if( !empty($expolded)) continue;
         if (strpos($data[0], '/article/') !== false)  {
              $total[] =$data[2];
          }

       }

         $article_total = array('total'=>array_sum($total),'pageview_total'=>$jsonArrayResponse->totalsForAllResults);
     }
   
     return $article_total;
     
  }

  function change_chart(){

    if(isset($_GET['slug'])){

        $prestent_date = date('M j Y', strtotime($_GET['start']));
        $latest = date('M j Y',strtotime($_GET['end']));
 
        $period = new DatePeriod(
                new DateTime($prestent_date),
                new DateInterval('P1D'),
                new DateTime($latest)
        );
        foreach($period as $key => $perioded){
                $chartrange[] = $perioded->format("D, M j");
        } 
        include( plugin_dir_path( __FILE__ ) . '/partials/google-analytic-chart.php' );

        die();
    }elseif(isset($_GET['tab'])){
      $prevdate = $_GET['prevdate'];
      $prevdate_ = explode('to',$prevdate);
      $prev_start = date("Y-m-d",strtotime($prevdate_[0]));
      $prev_end = date("Y-m-d",strtotime($prevdate_[1]));

      $currnet_Data = $this->chart_loop_actual($_GET['start'],$_GET['end'],$_GET['metrics']);
      $prev_Data = $this->chart_loop_prev($prev_start,$prev_end,$_GET['metrics']);

        $date_add = strtotime($_GET['start']);
        $prestent_date = date('M j Y', $date_add);
        $latest = date('M j Y',strtotime($_GET['end']));
 
        $period = new DatePeriod(
                new DateTime($prestent_date),
                new DateInterval('P1D'),
                new DateTime($latest)
        );

   
        foreach($period as $key => $perioded){
                $chartrange[] = $perioded->format("D, M j");
        } 
        include( plugin_dir_path( __FILE__ ) . '/partials/google-analytic-chart-returning.php' );
    }else{
      // echo 'Hello World'.$_GET['metrics'];

      $prevdate = $_GET['prevdate'];
      $prevdate_ = explode('to',$prevdate);
      $prev_start = date("Y-m-d",strtotime($prevdate_[0]));
      $prev_end = date("Y-m-d",strtotime($prevdate_[1]));

      $currnet_Data = $this->chart_loop_actual($_GET['start'],$_GET['end'],$_GET['metrics']);
      $prev_Data = $this->chart_loop_prev($prev_start,$prev_end,$_GET['metrics']);

        $date_add = strtotime($_GET['start']);
        $prestent_date = date('M j Y', $date_add);
        $latest = date('M j Y',strtotime($_GET['end']));
 
        $period = new DatePeriod(
                new DateTime($prestent_date),
                new DateInterval('P1D'),
                new DateTime($latest)
        );

   
        foreach($period as $key => $perioded){
                $chartrange[] = $perioded->format("D, M j");
        } 
        
     // print_r($data);
      include( plugin_dir_path( __FILE__ ) . '/partials/google-analytic-chart.php' );

    }
     

    die();
  }

  /* New Query *****************************************/

	public function my_google_analytic_chart_view(){
	     $date_add = strtotime("-10 day");
         $prestent_date = date('M j Y', $date_add);
         $latest = date('M j Y');
	    
	   if(isset($_GET['range']) and $_GET['range'] == 'true'){
	    // $datas = $this->get_analytic_data_chart($_GET['stardate'],$_GET['endDate']);
	     $period = new DatePeriod(
                 new DateTime($_GET['stardate']),
                 new DateInterval('P1D'),
                 new DateTime($_GET['endDate'])
            );
            
            
	   }else{
	        
	     // $datas = $this->get_analytic_data_chart($prestent_date,$latest);
	      $period = new DatePeriod(
                 new DateTime($prestent_date),
                 new DateInterval('P1D'),
                 new DateTime($latest)
            );
            
	   }
	   
	  $view = isset($_GET['type']) ? $_GET['type']:'pageview';
	    
	   if(!empty($datas['current'])){
    	   foreach($datas['current'] as $chartdata){
    	       $current[] = $chartdata[$view]['total'] ;
    	    }
    	}
    	
    	 if(!empty($datas['prev'])){
    	   foreach($datas['prev'] as $chartdata2){
    	       $prev[] = $chartdata2[$view]['total'] ;
    	    }
    	}
    	
 
        foreach($period as $key => $perioded){
            $chartrange[] = $perioded->format("D, M j");
        }
	   
	    
	    
	    $currnet_Data = $current;
	    $prev_Data = $prev;
      
	    include( plugin_dir_path( __FILE__ ) . 'partials/google-analytic-chart.php' );
	    die();
	}
 

	public function prev_view ($startdate,$enddate, $analytics){
    $analytics = $this->initialize_analytic();
  
	   // $r = ($month != '')? $month:'month';
	    $VIEW_ID = $this->view_id;

	    $start =  strtotime('2022-07-13');
        $date_add_year = strtotime("-1 month",$start);
        $date_add = strtotime('-10 days',$date_add_year);
        $prestent_date_start = date('Y-m-d', $date_add); 
        
        $end = strtotime('2022-07-19');
        $date_add_year = strtotime("-1 month",$end);
        $prestent_date_end = date('Y-m-d', $date_add_year);   
       
        
        $period = new DatePeriod(
                 new DateTime($prestent_date_start),
                 new DateInterval('P1D'),
                 new DateTime($prestent_date_end)
            );
        
         foreach($period as $key => $perioded){
            
              
          // Create the DateRange object.
         $dateRange = new Google_Service_AnalyticsReporting_DateRange();
         $dateRange->setStartDate(''.$perioded->format("Y-m-d").'');
         $dateRange->setEndDate(''. $perioded->format("Y-m-d").''); 
    
          // Create the Metrics object.
          $sessions = new Google_Service_AnalyticsReporting_Metric();
          $sessions->setExpression("ga:sessions");
          $sessions->setAlias("sessions");
          
          // Create the Metrics object. users
          $users = new Google_Service_AnalyticsReporting_Metric();
          $users->setExpression("ga:users");
          $users->setAlias("users");
          
          $pageviews = new Google_Service_AnalyticsReporting_Metric();
          $pageviews->setExpression("ga:pageviews");
          $pageviews->setAlias("pageviews");
          
          $uniquePageviews = new Google_Service_AnalyticsReporting_Metric();
          $uniquePageviews->setExpression("ga:uniquePageviews");
          $uniquePageviews->setAlias("uniquePageviews");
          
          $avgTimeOnPage = new Google_Service_AnalyticsReporting_Metric();
          $avgTimeOnPage->setExpression("ga:avgTimeOnPage");
          $avgTimeOnPage->setAlias("avgTimeOnPage");
          
          $dateHour = new Google_Service_AnalyticsReporting_Metric();
          $dateHour->setExpression("ga:dateHour");
          $dateHour->setAlias("dateHour");
          
         
          // Create the Metrics object.
          $avgSessionDuration = new Google_Service_AnalyticsReporting_Metric();
          $avgSessionDuration->setExpression("ga:avgSessionDuration");
          $avgSessionDuration->setAlias("avgSessionDuration");
          
          // Create the Metrics object.
          $avgPageLoadTime = new Google_Service_AnalyticsReporting_Metric();
          $avgPageLoadTime->setExpression("ga:avgPageLoadTime");
          $avgPageLoadTime->setAlias("avgPageLoadTime");
          
          $pageviewsPerSession = new Google_Service_AnalyticsReporting_Metric();
          $pageviewsPerSession->setExpression("ga:pageviewsPerSession");
          $pageviewsPerSession->setAlias("pageviewsPerSession");

          
          // Create the ReportRequest object.
          $request = new Google_Service_AnalyticsReporting_ReportRequest();
          $request->setViewId($VIEW_ID);
          $request->setDateRanges(array($dateRange,$dateRange));
          $request->setMetrics(array($sessions,$users,$avgSessionDuration,$avgPageLoadTime,$pageviews,$uniquePageviews,$avgTimeOnPage,$pageviewsPerSession));
        
          $body = new Google_Service_AnalyticsReporting_GetReportsRequest();
          $body->setReportRequests( array( $request) );
          
          $data = array('report'=> $analytics->reports->batchGet( $body ), 'range'=> array('start'=>$startdate,'end'=>$enddate));
         
          $avgTimeOnPage = $data['report']['reports'][0]['data']['totals'][0]['values'][2];         
          $avgPageLoadTime = $data['report']['reports'][0]['data']['totals'][0]['values'][3];
          $totla_pageview = $data['report']['reports'][0]['data']['totals'][0]['values'][4];
          $uniquePageviews = $data['report']['reports'][0]['data']['totals'][0]['values'][5];
          $avgTimeOnPage = $data['report']['reports'][0]['data']['totals'][0]['values'][6];
          $pageviewsPer = $data['report']['reports'][0]['data']['totals'][0]['values'][7];
         
           
          $data_ = array(
                'pageview'=>array('total'=>$totla_pageview), 
                'uniquePageviews'=>array('total'=>$uniquePageviews),
                'avgTimeOnPage'=>array('total'=>$avgTimeOnPage),
                'avgPageLoadTime'=>array('total'=>$avgPageLoadTime),
                'avgSessionDuration'=>array('total'=>$avgSessionDuration),
                'AvgPageviewsperVisitor'=>array('total'=>$pageviewsPer),
                );
                
          
            $g[]=$data_; 
        }     
            
        return $g;    
	}
  function chart_datas($start,$end){


   $data = 'https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id.'&dimensions=ga%3ApageTitle&metrics=ga%3AuniquePageviews&segment=gaid%3A%3A-1&start-date='.$start.'&end-date='.$end.'&start-index=1';
   $cURLConnection = curl_init();

      curl_setopt($cURLConnection, CURLOPT_URL, $data );
      curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

      $phoneList = curl_exec($cURLConnection);
      curl_close($cURLConnection);

      $jsonArrayResponse = json_decode($phoneList,true);

      return $jsonArrayResponse->totalsForAllResults;
  }
  function article_total($start,$end){
    
     $data = 'https://www.googleapis.com/analytics/v3/data/ga?access_token='.$this->access_token.'&ids='.$this->ga_id.'&dimensions=ga%3ApagePath%2Cga%3ApageTitle&metrics=ga%3Apageviews&segment=gaid%3A%3A-1&start-date='.$start.'&end-date='.$end.'&start-index=1';

     $cURLConnection = curl_init();

      curl_setopt($cURLConnection, CURLOPT_URL, $data );
      curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

      $phoneList = curl_exec($cURLConnection);
      curl_close($cURLConnection);

      $jsonArrayResponse = json_decode($phoneList);
       
      
     if(!empty($jsonArrayResponse->rows)){
       $total =array();
       foreach($jsonArrayResponse->rows as $data ){
          
         $expolded = explode('/article/',$data[0]);

         // if( !empty($expolded)) continue;
        //  if (strpos($data[0], '/article/') !== false)  {
              $total[] =$data[2];
          // }

       }

         $article_total = array('total'=>array_sum($total),'pageview_total'=>$jsonArrayResponse->totalsForAllResults);
     }
   
     return $article_total;
     
  }
	
	
  function analytic_modal() {
    
    ?>
      <div class="custom-modal"></div>
    <?php 
  }
	public function google_analytic_menu(){
		
		add_menu_page(
		    'Analytics', 
		    'Analytics', 
		    'manage_options', 
		    'analytics', 
		    array($this,'my_google_analytic'),'dashicons-chart-line',9
		);

	}
  function Query($query){
    $cURLConnection2 = curl_init();

        curl_setopt($cURLConnection2, CURLOPT_URL, $query );
        curl_setopt($cURLConnection2, CURLOPT_RETURNTRANSFER, true);

        $phoneList2 = curl_exec($cURLConnection2);
        curl_close($cURLConnection2);

        $jsonArrayResponse2 = json_decode($phoneList2);

        return $jsonArrayResponse2;
        
  }
}