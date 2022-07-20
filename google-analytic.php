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
	require plugin_dir_path( __FILE__ ) . 'HelloAnalytics.php';
	// require plugin_dir_path( __FILE__ ) . 'ClientAnalytic.php';
	$plugin->run();

}
run_google_analytic();



function get_token(){


		// curl_setopt_array($curl, array(
		// 	CURLOPT_URL => 'https://accounts.google.com/o/oauth2/token',
		// 	CURLOPT_CUSTOMREQUEST => "POST",
		// 	CURLOPT_RETURNTRANSFER => true,
		// 	CURLOPT_TIMEOUT => 30,
		// 	CURLOPT_HTTPHEADER => [
		// 		'Cache-Control: no-cache',
		// 		'Content-Type: application/json',
		// 	],
		// 	CURLOPT_POSTFIELDS => http_build_query([
				// 'code' => '4%2F0AdQt8qjo-O9Khl8fjTmyZM_2n5h0rPm6vLxIU_ltgml1Er5VDNU-syn7A9MEECBJs_EOSw',
				// 'client_id' => '432292128512-fcikru3ubou70aci5ggnbv9i2co9hj0l.apps.googleusercontent.com',
				// 'client_secret' => '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',
				// 'redirect_uri' => 'https://wordpress.purplebugprojects.com/',
				// 'grant_type' => 'authorization_code',
		// 	]),
		// ));

		// curl_setopt_array($curl, array(
		// 	CURLOPT_URL => 'https://accounts.google.com/o/oauth2/token',
		// 	// CURLOPT_POST => true,
		// 	CURLOPT_CUSTOMREQUEST => "POST",
		// 	CURLOPT_RETURNTRANSFER => true,
		// 	CURLOPT_TIMEOUT => 30,
		// 	CURLOPT_POSTFIELDS => http_build_query([
		// 		json_encode($data)
		// 	]),
		// ));
		$curl = curl_init('https://accounts.google.com/o/oauth2/token');
		// $data = array(
		// 	// "code" => "4%2F0AdQt8qhnCQdfRkvjMxPOLD3njTO0v1b1g_YnqTBwmJoxgVFQ1L2VwUrbCK-PF6bDlQEQDQ",
		// 	// "client_id" => "182037842088-vhk7kdcn6pbqiphja14htnnnsmg2enoa.apps.googleusercontent.com",
		// 	// "client_secret" => "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",
		// 	// "redirect_uri" => "https://wordpress.purplebugprojects.com/",
		// 	// "grant_type" => "authorization_code",
		// );
		$data = array(
			'code' => '4%2F0AdQt8qjo-O9Khl8fjTmyZM_2n5h0rPm6vLxIU_ltgml1Er5VDNU-syn7A9MEECBJs_EOSw',
			'client_id' => '432292128512-fcikru3ubou70aci5ggnbv9i2co9hj0l.apps.googleusercontent.com',
			'client_secret' => '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',
			'redirect_uri' => 'https://wordpress.purplebugprojects.com/',
			'grant_type' => 'authorization_code',
		);
		$payload = json_encode($data);
		curl_setopt($curl,CURLOPT_POSTFIELDS,http_build_query($data));
		curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content_type: application/json'));
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
		$result = curl_exec($curl);
		echo '<pre>';
		print_r($result);
		echo '</pre>';
		
		$err = curl_error($curl);

		curl_close($curl);
		die();
		$curl ='https://accounts.google.com/o/oauth2/token&code=4%2F0AdQt8qhnCQdfRkvjMxPOLD3njTO0v1b1g_YnqTBwmJoxgVFQ1L2VwUrbCK-PF6bDlQEQDQ&client_id=182037842088-vhk7kdcn6pbqiphja14htnnnsmg2enoa.apps.googleusercontent.com&client_secret=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&redirect_uri=https://wordpress.purplebugprojects.com/&grant_type=authorization_code';
}
// add_action('admin_init','get_token');
 
 



