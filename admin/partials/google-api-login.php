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
$img = plugin_dir_url( __DIR__ ).'assets/img/google-analytics-logo.png';
 ?>
 <style>
.form-group input{
    margin:10px 0px;
}
.form-group{
    display: grid;
}
.login-analytic-data button{
	border-radius: 8px;
    padding: 10px 50px;
    background: linear-gradient(170deg,#ec1081 5%,#f05075 30%,#f16b63 48%,#f16b63 52%,#f48835 70%,#f6971c 95%);
    color: #fff;
    border-color: #fff;
    border: none;
    font-weight: 700;
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
    <div class="analytics_logo">
		<img src="<?php echo $img;?>">
    </div>
    <p>Login to google account to generate access token. </p>
    <button onclick="window.location = '<?php echo $login_url; ?>'" type="button" class="btn login_analytics_api">Login with Google</button>
</form>
<?php
 