<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              google-analytic
 * @since             1.0.0
 * @package           Google_Analytic
 *
 * @wordpress-plugin
 * Plugin Name:       Google Analytic
 * Plugin URI:        google-analytic
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            John Ricardo Porras
 * Author URI:        google-analytic
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       google-analytic
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'GOOGLE_ANALYTIC_VERSION', '1.0.0' );

define('GOOGLE_PATH', WP_PLUGIN_DIR.'/google-analytic');




/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-google-analytic-activator.php
 */
function activate_google_analytic() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-google-analytic-activator.php';
//	require_once plugin_dir_path( __FILE__ ).'/google-analytic/vendor';
	Google_Analytic_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-google-analytic-deactivator.php
 */
function deactivate_google_analytic() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-google-analytic-deactivator.php';
	Google_Analytic_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_google_analytic' );
register_deactivation_hook( __FILE__, 'deactivate_google_analytic' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-google-analytic.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_google_analytic() {

	$plugin = new Google_Analytic();
	$plugin->run();

}
run_google_analytic();


add_action('rest_api_init', function () {
	register_rest_route( 'hello-elementor/v1', 'access-token',array(
				  'methods'  => 'GET',
				  'callback' => 'getAPIData'
		));
  });
  function getAPIData($request) {
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
	$parameters = $request->get_params();
	if (isset($parameters['code'])) {
		$token = $gClient->fetchAccessTokenWithAuthCode($parameters['code']);
	}
	update_option('gapi_access_token',$token['access_token']);
	header("Location: ".get_site_url()."/wp-admin/admin.php?page=analytics");
	exit();
  }
//   http://pinoybuilders.test/wp-json/hello-elementor/v1/access-token



