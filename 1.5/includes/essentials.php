<?php
//avoid direct calls to this file where wp core files not present
if (!function_exists ('add_action')) {
		header('Status: 403 Forbidden');
		header('HTTP/1.1 403 Forbidden');
		exit();
}
// Pre-2.6 compatibility
if ( ! defined( 'WP_CONTENT_URL' ) )
      define( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' );
if ( ! defined( 'WP_CONTENT_DIR' ) )
      define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
if ( ! defined( 'WP_PLUGIN_URL' ) )
      define( 'WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
if ( ! defined( 'WP_PLUGIN_DIR' ) )
      define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );
      
add_action('admin_menu', 'smart_add_menu');

function screen_layout_columns($columns, $screen) {
$columns[$screen] = 2;
return $columns;
}

/*add_filter('screen_layout_columns', array(&$this, 'on_screen_layout_columns'), 10, 2);
//for WordPress 2.8 we have to tell, that we support 2 columns !
function on_screen_layout_columns($columns, $screen) {
	if ($screen == $this->pagehook) {
		$columns[$this->pagehook] = 2;
	}
	return $columns;
}*/

function wp_insert_admin_register_head() {
	echo "<link rel='stylesheet' type='text/css' href='".WP_PLUGIN_URL.'/wp-insert/css/adminStyle.css'."' /><!--[if IE 6]><link rel='stylesheet' type='text/css' href='".WP_PLUGIN_URL.'/wp-insert/css/IE6adminStyle.css'."' /><![endif]-->\n";
}
add_action('admin_head', 'wp_insert_admin_register_head');


function wp_insert_get_current_page_details() {
	if(is_home()) return 'HOME';
	else if(is_archive()) return 'ARCHIVE';
	else if(is_singular()) {
		global $wp_query;
		return $wp_query->post->ID;
	}
	else return 'NULL';
}

function wp_insert_is_in_array($inputString, $inputArray) {
    foreach($inputArray as $arrayElements)
    {
        if($arrayElements == $inputString)
        {
                return 'TRUE';
        }
    }
    return 'FALSE';
}

$random = 0;
switch(get_option('wp_insert_multiple_ad_network_type')) {
	case "All Ad Networks":
		$random = rand(0,2);
	break;
	case "Primary and Alternate Ad Network 1":
		$random = rand(0,1);
	break;
}

require_once (dirname(__FILE__) . '/widgethook.php');
require_once (dirname(__FILE__) . '/contenthook.php');
require_once (dirname(__FILE__) . '/ads.php');
require_once (dirname(__FILE__) . '/adsadvanced.php');
?>