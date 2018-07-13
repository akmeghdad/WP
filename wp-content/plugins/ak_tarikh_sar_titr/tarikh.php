<?php
/*
Plugin Name: Ak tarikh sar titr
Plugin URI: http://rahedigar.net/
Author: Meghdad Abolfazli
Author URI: http://rahedigar.net/
Description: Tarikh sar titr baraye roozname.
Version: 0.1
Text Domain: rahian
*/

/**
 * Files
 * inc/admin.php		admin stuff
 * inc/widget.php		the widget
 * inc/themeswitch.php	always runs on frontend
 */


/**
 * Check who we are and do stuff
 *
 * @since 0.5.0
 */
function ak_load() {
	// http://codex.wordpress.org/Determining_Plugin_and_Content_Directories
	// Pre-2.6 compatibility
	if ( ! defined( 'WP_CONTENT_URL' ) )
	      define( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' );
	      
	if ( ! defined( 'WP_CONTENT_DIR' ) )
	      define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
	      
	if ( ! defined( 'WP_PLUGIN_URL' ) )
	      define( 'WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
	      
	if ( ! defined( 'WP_PLUGIN_DIR' ) )
	      define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );
	      
//	global $nkthemeswitch;
//	$nkthemeswitch = array(
//		'path' => WP_PLUGIN_DIR . '/' . str_replace( basename( __FILE__ ), "", plugin_basename( __FILE__ ) ),
//		'url' => WP_PLUGIN_URL . '/' . str_replace( basename( __FILE__ ), "", plugin_basename( __FILE__ ) ),
//	);

	require_once( 'inc/admin.php' );

	register_uninstall_hook( __FILE__, 'ak_uninstall' );
	add_action( 'admin_menu', 'ak_add_pages' );
		
}
add_action( 'plugins_loaded', 'ak_load' );

?>
