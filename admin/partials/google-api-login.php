<?php
/**
 * Login Form to generate access token
 */

require_once GOOGLE_PATH. '/google-api/vendor/autoload.php';
// Get Credentials
$client_id =  get_option( 'client_id','' );
$client_secret =  get_option( 'client_secret','' );
$redirect_uri =  get_option( 'redirect_uri','' );
$developer_key =  get_option( 'developer_key','' );

$gClient = new Google_Client();
$gClient->setClientId($client_id );
$gClient->setClientSecret($client_secret);
$gClient->setApplicationName("Vicode Media Login");
$gClient->setRedirectUri($redirect_uri);
$gClient->setDeveloperKey($developer_key);
$gClient->setAccessType('offline');
$gClient->setScopes(['https://www.googleapis.com/auth/analytics.readonly','https://www.googleapis.com/auth/analytics']);

// login URL
$login_url = $gClient->createAuthUrl();
 ?>
 <style>
.form-group input{
    margin:10px 0px;
}
.form-group{
    display: grid;
}
.login-analytic-data button{
    padding: 10px;
    background: #4c4fd7;
    color: #fff;
    border: none;
    font-weight: bold;
}
.login-analytic-data{
    padding: 40px;
    width: 50%;
    margin: auto;
    box-shadow: rgb(100 100 111 / 20%) 0px 7px 29px 0px;
    text-align:center;
}
 </style>
<form action='' method="POST" class="login-analytic-data">
    <p>Login to you google account to generate access token.</p>
    <button onclick="window.location = '<?php echo $login_url; ?>'" type="button" class="btn btn-danger">Login with Google</button>
</form>
<?php
 