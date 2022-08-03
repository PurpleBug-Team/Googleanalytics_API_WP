<?php
/**
 * Login Form to generate access token
 */
require_once GOOGLE_PATH. '/google-api/vendor/autoload.php';
$gClient = new Google_Client();
$gClient->setClientId("432292128512-fcikru3ubou70aci5ggnbv9i2co9hj0l.apps.googleusercontent.com");
$gClient->setClientSecret("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");
$gClient->setApplicationName("Vicode Media Login");
$gClient->setRedirectUri("https://wordpress.purplebugprojects.com/wp-json/hello-elementor/v1/access-token");
$gClient->setDeveloperKey('AIzaSyBtWxSXvd_cuyettZ8JwgJUeFvVDBK6amQ');
$gClient->setAccessType('offline');
// $gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
$gClient->setScopes(['https://www.googleapis.com/auth/analytics.readonly','https://www.googleapis.com/auth/analytics']);

// login URL
$login_url = $gClient->createAuthUrl();
echo '<pre>';
print_r($login_url);
echo '</pre>';
 ?>
 <style>
.form-group input{
    margin:10px 0px;
}
.form-group{
    display: grid;
}
.login-analytic-data{
    padding: 40px;
    width: 50%;
    margin: auto;
    box-shadow: rgb(100 100 111 / 20%) 0px 7px 29px 0px;
}
 </style>
<form action='' method="POST" class="login-analytic-data">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
    <?php $login_url = 'https://accounts.google.com/o/oauth2/auth?response_type=code&access_type=offline&client_id=432292128512-fcikru3ubou70aci5ggnbv9i2co9hj0l.apps.googleusercontent.com&redirect_uri=https%3A%2F%2Fwordpress.purplebugprojects.com%2Fwp-json%2Fhello-elementor%2Fv1%2Faccess-token&state&scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fanalytics.readonly%20https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fanalytics&approval_prompt=auto';?>
    <button onclick="window.location = '<?php echo $login_url; ?>'" type="button" class="btn btn-danger">Login with Google</button>
</form>
<?php
 