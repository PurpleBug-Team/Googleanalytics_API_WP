<?php

// Load the Google API PHP Client Library.
require_once __DIR__ . '/vendor/autoload.php';

$analytics = initializeAnalytics();
//$response = getReport($analytics);
//printResults($response);
 
 
 
 
/**
 * Initializes an Analytics Reporting API V4 service object.
 *
 * @return An authorized Analytics Reporting API V4 service object.
 */
function initializeAnalytics()
{

  // Use the developers console and download your service account
  // credentials in JSON format. Place them in this directory or
  // change the key file location if necessary.
  $KEY_FILE_LOCATION = __DIR__ . '/winged-idiom-326123-cc33aee1187e.json';

  // Create and configure a new client object.
  $client = new Google_Client();
  $client->setApplicationName("Hello Analytics Reporting");
  $client->setAuthConfig($KEY_FILE_LOCATION);
  $client->setScopes(['https://www.googleapis.com/auth/analytics.readonly']);
  $analytics = new Google_Service_AnalyticsReporting($client);

  return $analytics;
}


/**
 * Queries the Analytics Reporting API V4.
 *
 * @param service An authorized Analytics Reporting API V4 service object.
 * @return The Analytics Reporting API V4 response.
 */
function getReport($analytics) {

  // Replace with your view ID, for example XXXX.
  
  $startdate = date("Y-M-D");
  $enddate = date("Y-M-D");
  
  $VIEW_ID = "251234819";

  // Create the DateRange object.
  $dateRange = new Google_Service_AnalyticsReporting_DateRange();
  $dateRange->setStartDate('2021-09-15');
  $dateRange->setEndDate('2021-09-16');

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
  
  // Create the Metrics object.
  $organicSearches = new Google_Service_AnalyticsReporting_Metric();
  $organicSearches->setExpression("ga:organicSearches");
  $organicSearches->setAlias("organicSearches");
  
  // Create the Metrics object.
  $avgPageLoadTime = new Google_Service_AnalyticsReporting_Metric();
  $avgPageLoadTime->setExpression("ga:avgPageLoadTime");
  $avgPageLoadTime->setAlias("avgPageLoadTime");
  
  
  
  
//  ga:socialEngagementType
 // ga:avgSessionDuration
  
  // Create the ReportRequest object.
  $request = new Google_Service_AnalyticsReporting_ReportRequest();
  $request->setViewId($VIEW_ID);
  $request->setDateRanges($dateRange);
  $request->setMetrics(array($sessions,$users,$organicSearches,$avgPageLoadTime,$pageviews,$uniquePageviews,$avgTimeOnPage));

  $body = new Google_Service_AnalyticsReporting_GetReportsRequest();
  $body->setReportRequests( array( $request) );
  
  
    $data = array('report'=> $analytics->reports->batchGet( $body ), 'range'=> array('start'=>$startdate,'end'=>$enddate));
  return $data;
}


/**
 * Parses and prints the Analytics Reporting API V4 response.
 *
 * @param An Analytics Reporting API V4 response.
 */
function printResults($reports) {
    
    $totla_pageview = $reports['report']['reports'][0]['data']['totals'][0]['values'][4];
    $uniquePageviews = $reports['report']['reports'][0]['data']['totals'][0]['values'][5];
    $data = array(
            'pageview'=>array('daterange'=>$reports['range'],'total'=>$totla_pageview), 
            'uniquePageviews'=>array('daterange'=>$reports['range'],'total'=>$uniquePageviews) 
            
            );
            
    return $data;        
}
