<?php 

require_once __DIR__ . '/google-client/vendor/autoload.php';

$analytics = initializeAnalytics();

//$service = new Google_Service_Analytics($analytics);               
 
 
$ga_token = "Token key";
$client = new Google_Client();

$client->setApplicationName("Pbb analytic");
$client->setClientId('432292128512-fcikru3ubou70aci5ggnbv9i2co9hj0l.apps.googleusercontent.com'); //Get this in https://prnt.sc/MlneOI9VAFvd
$client->setClientSecret('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'); //Get this in https://prnt.sc/MlneOI9VAFvd
$client->setRedirectUri('https://wordpress.purplebugprojects.com/'); 
$client->setDeveloperKey('AIzaSyBtWxSXvd_cuyettZ8JwgJUeFvVDBK6amQ'); //API Keys Generated in  Google console API Credential  https://prnt.sc/AFF_SPhK-RKu
$client->setScopes(array("https://www.googleapis.com/auth/analytics.readonly","https://www.googleapis.com/auth/analytics")); 
$client->setApprovalPrompt('force');
$client->setAccessType('offline');
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

  $KEY_FILE_LOCATION = __DIR__ . '/client_secret.json';


  $client = new Google_Client();
  $client->setApplicationName("Hello Analytics Reporting");
  $client->setAuthConfig($KEY_FILE_LOCATION);
  $client->setScopes(['https://www.googleapis.com/auth/analytics.readonly']);
  $analytics = new Google_Service_AnalyticsReporting($client);

  return $analytics;
}
 
 