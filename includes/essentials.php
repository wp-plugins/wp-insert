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

function wp_insert_settings_page_layout($page_parameters, $page_title, $page_type) { ?>
<div id="post_ads_container" class="wrap">
<?php screen_icon('options-general'); ?>
<h2><?php echo $page_title; ?></h2>
<div class="updated fade below-h2" id="message" style="opacity:0;display:none;"><p>Changes have been made to this page.  Please click <b>Save Changes</b> to make them permanent</p></div>
<?php show_support_options(); ?>
<form method="post" action="options.php">
<?php
wp_nonce_field('update-options');
wp_nonce_field( 'closedpostboxes', 'closedpostboxesnonce', false );
wp_nonce_field( 'meta-box-order', 'meta-box-order-nonce', false );
?>
<script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/wp-insert/js/jquery/ui.core.js"></script>
<script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/wp-insert/js/jquery/ui.draggable.js"></script>
<script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/wp-insert/js/jquery/jquery.corner.js"></script>
<?php if($page_type == 'ads') { require_once (dirname(__FILE__) . '/postpicker.php'); } ?>

<script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/wp-insert/js/common.js"></script>
			<div id="poststuff" class="metabox-holder has-right-sidebar">
				<div id="side-info-column" class="inner-sidebar">
				<p style="text-align:center;">
					<script type="text/javascript" src="http://www.wp-insert.smartlogix.co.in/wp-content/plugins/wp-adnetwork/wp-adnetwork.php?showad=1"></script>
				</p>
				<?php do_meta_boxes('col_2','advanced',null); ?>
				<p class="submit wp-insert-submit">
					<input type="hidden" name="action" value="update" />
					<input type="hidden" name="page_options" value="<?php echo $page_parameters; ?>" />
					<input type="submit" id="submit" class="button-primary button-wp-insert" value="<?php _e('Save Changes') ?>" />
				</p>
				</div>
				<div id="post-body" class="has-sidebar">				
					<div id="post-body-content" class="has-sidebar-content">
						<?php do_meta_boxes('col_1','advanced',null); ?>
					</div>
				</div>
				<br class="clear"/>			
			</div>	
		</form>
		</div>
	<script type="text/javascript">
		//<![CDATA[
		jQuery(document).ready( function($) {
			// close postboxes that should be closed
			jQuery('.if-js-closed').removeClass('if-js-closed').addClass('closed');
			jQuery('.postbox').addClass('closed');
			// postboxes setup
			postboxes.add_postbox_toggles('wp-insert');
		});
		//]]>
	</script>
</div>
<?php }


require_once (dirname(__FILE__) . '/widgethook.php');
require_once (dirname(__FILE__) . '/contenthook.php');
require_once (dirname(__FILE__) . '/ads.php');
require_once (dirname(__FILE__) . '/adsadvanced.php');
require_once (dirname(__FILE__) . '/adsenseperformance.php');
require_once (dirname(__FILE__) . '/feeds.php');
?>