<?php
/*
Plugin Name: پنل فونت قالب انفولد
Plugin URI: http://wpnovin.com
Description: این افزونه توسط تیم نوین وردپرس آماده سازی شده است.
Version: 2.0
Author: Novin Wordpress
Author URI: http://wpnovin.com
Contributors: mordauk
*/


/*
|--------------------------------------------------------------------------
| CONSTANTS
|--------------------------------------------------------------------------
*/

$fu_upload_dir = wp_upload_dir();

// plugin folder url
if(!defined('FU_PLUGIN_URL')) {
	define('FU_PLUGIN_URL', plugin_dir_url( __FILE__ ));
}
// plugin folder path
if(!defined('FU_PLUGIN_DIR')) {
	define('FU_PLUGIN_DIR', plugin_dir_path( __FILE__ ));
}
// fonts folder path
if(!defined('FU_FONT_DIR')) {
	define('FU_FONT_DIR', $fu_upload_dir['basedir'] . DIRECTORY_SEPARATOR . 'fonts' . DIRECTORY_SEPARATOR );
}
// fonts folder path
if(!defined('FU_FONT_URL')) {
	define('FU_FONT_URL', content_url() . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'fonts' . DIRECTORY_SEPARATOR );
}
// old fonts folder path for backwards compatibility
if(!defined('FU_OLD_FONT_DIR')) {
	define('FU_OLD_FONT_DIR', FU_PLUGIN_DIR . 'fonts' . DIRECTORY_SEPARATOR );
}
// old fonts folder url for backwards compatibility
if(!defined('FU_OLD_FONT_URL')) {
	define('FU_OLD_FONT_URL', FU_PLUGIN_URL . 'fonts' . DIRECTORY_SEPARATOR );
}

// plugin root file
if(!defined('FU_PLUGIN_FILE')) {
	define('FU_PLUGIN_FILE', __FILE__);
}


/*
|--------------------------------------------------------------------------
| INTERNATIONALIZATION
|--------------------------------------------------------------------------
*/

function fu_textdomain() {
	load_plugin_textdomain( 'fontuploader', false, dirname( plugin_basename( EDD_PLUGIN_FILE ) ) . '/languages/' );
}
add_action('init', 'fu_textdomain');


/*
|--------------------------------------------------------------------------
| INCLUDES
|--------------------------------------------------------------------------
*/

include( FU_PLUGIN_DIR . '/includes/admin.php' );
include( FU_PLUGIN_DIR . '/includes/functions.php' );
include( FU_PLUGIN_DIR . '/includes/styles.php' );