<?php 

require_once __DIR__ . '/google-client/vendor/autoload.php';

$analytics = initializeAnalytics();

//$service = new Google_Service_Analytics($analytics);               
 
 
$ga_token = "Token key";
$client = new Google_Client();
$client->setApplicationName("***");
// $client->setClientId('234023961878-5sf1sprm6cldkis4ll8pvkuj0khutkb4.apps.googleusercontent.com');
$client->setClientId('268521901173-otufo6u6vgo7b2fillrkgtvk344a1rf3.apps.googleusercontent.com');
// $client->setClientSecret('sV2acWQiBwH1qyAmDRgslztm');
$client->setClientSecret('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');
$client->setRedirectUri('https://wp-test.momsformomsph.com');
$client->setDeveloperKey('AIzaSyCk06SE0X7qWo2L0sGWmL3wzdGnDFzais8');
$client->setScopes(array("https://www.googleapis.com/auth/analytics.readonly"));
$client->setApprovalPrompt('force');
$client->setAccessType('online');
$client->setAccessToken($ga_token);  


$service = new Google_Service_Analytics($client);               
$accounts = $service->management_accountSummaries;
 
$path = "/article/digital-technology-on-the-cutting-edge/";
$host = "wp-test.momsformomsph.com";
// this is the default params used for google analytics api call.
$optParams = array(
    'dimensions' => 'ga:pagePath,ga:source,ga:keyword',
    'sort' => '-ga:sessions,ga:source',
    'filters' => 'ga:medium==organic,ga:pagePath=='.$path.',ga:hostname=='.$host,
    'max-results' => '25'
); 
 
$today = date('Y-m-d', time());
$monthbefore = date('Y-m-d', (time() - (30 * 24 * 60 * 60)));
//$data = $service->data_ga;


function initializeAnalytics()
{

  $KEY_FILE_LOCATION = __DIR__ . '/client_secret_234023961878-5sf1sprm6cldkis4ll8pvkuj0khutkb4.apps.googleusercontent.com.json';


  $client = new Google_Client();
  $client->setApplicationName("Hello Analytics Reporting");
  $client->setAuthConfig($KEY_FILE_LOCATION);
  $client->setScopes(['https://www.googleapis.com/auth/analytics.readonly']);
  $analytics = new Google_Service_AnalyticsReporting($client);

  return $analytics;
}
 
 