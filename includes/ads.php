<?php
require_once (dirname(__FILE__) . '/adwidgets.php');
require_once (dirname(__FILE__) . '/inpostads.php');
// action function for above hook
function smart_add_menu() {
	add_menu_page('Wp-Insert', 'Wp-Insert', 8, __FILE__);
	add_submenu_page(__FILE__, 'wp-insert', 'Manage Ads<br/>(Posts and Sidebars)', 8, __FILE__, 'wp_insert_add_adspage');
	add_submenu_page(__FILE__, 'wp-insert', 'Manage Ads<br/>(Template Tags)', 8, 'Manage Ads Advanced', 'wp_insert_add_advanced_spage');
	add_submenu_page(__FILE__, 'wp-insert', 'Manage Feeds', 8, 'Manage Feeds', 'smart_add_feedspage');
	add_submenu_page(__FILE__, 'wp-insert', 'Tracking Codes', 8, 'Tracking Codes', 'smart_add_analytics');
	add_submenu_page(__FILE__, 'wp-insert', 'WYSIWYG Editor', 8, 'WYSIWYG Editor', 'smart_add_wysiwyg_pages');
	add_submenu_page(__FILE__, 'wp-insert', 'Syntax Highlighting', 8, 'Syntax Highlighting', 'smart_add_syntaxhighlighting_pages');
	//add_submenu_page(__FILE__, 'wp-insert', 'Tracking Codes', 8, 'Manage Feeds', 'wp_insert_add_trackingpage');
	//ensure, that the needed javascripts been loaded to allow drag/drop, expand/collapse and hide/show of boxes
wp_enqueue_script('common');
wp_enqueue_script('wp-lists');
wp_enqueue_script('postbox');
		//$columns[$screen] = 2;
}

function wp_insert_add_adspage() {
	global $screen_layout_columns;

	add_meta_box('wp_insert_ad_widget_1', 'Ad Widget : 1', 'wp_insert_ad_widget_1_HTML', 'col_2');
	add_meta_box('wp_insert_ad_widget_2', 'Ad Widget : 2', 'wp_insert_ad_widget_2_HTML', 'col_2');
	add_meta_box('wp_insert_ad_widget_3', 'Ad Widget : 3', 'wp_insert_ad_widget_3_HTML', 'col_2');
	add_meta_box('wp_insert_ad_widget_4', 'Ad Widget : 4', 'wp_insert_ad_widget_4_HTML', 'col_2');
	add_meta_box('wp_insert_ad_widget_5', 'Ad Widget : 5', 'wp_insert_ad_widget_5_HTML', 'col_2');
	add_meta_box('wp_insert_ad_widget_6', 'Ad Widget : 6', 'wp_insert_ad_widget_6_HTML', 'col_2');
	add_meta_box('wp_insert_ad_widget_7', 'Ad Widget : 7', 'wp_insert_ad_widget_7_HTML', 'col_2');
	add_meta_box('wp_insert_ad_widget_8', 'Ad Widget : 8', 'wp_insert_ad_widget_8_HTML', 'col_2');
	add_meta_box('wp_insert_ad_widget_9', 'Ad Widget : 9', 'wp_insert_ad_widget_9_HTML', 'col_2');
	add_meta_box('wp_insert_ad_widget_10', 'Ad Widget : 10', 'wp_insert_ad_widget_10_HTML', 'col_2');

	add_meta_box('wp_insert_multiple_ad_network', 'Multiple Ad Networks', 'wp_insert_multiple_ad_network_HTML', 'col_1');
	add_meta_box('wp_insert_in_post_ad_top_1', 'Ad - Above Post Content', 'wp_insert_in_post_ad_top_1_HTML', 'col_1');
	add_meta_box('wp_insert_in_post_ad_bottom_1', 'Ad - Below Post Content', 'wp_insert_in_post_ad_bottom_1_HTML', 'col_1');
	add_meta_box('wp_insert_in_post_ad_left_1', 'Ad - Left of Post Content', 'wp_insert_in_post_ad_left_1_HTML', 'col_1');
	add_meta_box('wp_insert_in_post_ad_right_1', 'Ad - Right of Post Content', 'wp_insert_in_post_ad_right_1_HTML', 'col_1');
	add_meta_box('wp_insert_in_post_ad_middle_1', 'Ad - Middle of Post Content', 'wp_insert_in_post_ad_middle_1_HTML', 'col_1');

	$parameters = 'wp_insert_multiple_ad_network_type,'.wp_insert_in_post_ad_parameters('middle_1').','.wp_insert_in_post_ad_parameters('right_1').','.wp_insert_in_post_ad_parameters('left_1').','.wp_insert_in_post_ad_parameters('bottom_1').','.wp_insert_in_post_ad_parameters('top_1').','.wp_insert_ad_widget_parameters(1).','.wp_insert_ad_widget_parameters(2).','.wp_insert_ad_widget_parameters(3).','.wp_insert_ad_widget_parameters(4).','.wp_insert_ad_widget_parameters(5).','.wp_insert_ad_widget_parameters(6).','.wp_insert_ad_widget_parameters(7).','.wp_insert_ad_widget_parameters(8).','.wp_insert_ad_widget_parameters(9).','.wp_insert_ad_widget_parameters(10);
	wp_insert_settings_page_layout($parameters);
}

function wp_insert_settings_page_layout($page_parameters) { ?>
<div id="post_ads_container" class="wrap">
<?php screen_icon('options-general'); ?>
<h2>WP-INSERT : Manage Ads (Posts and Sidebars)</h2>
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
<?php require_once (dirname(__FILE__) . '/postpicker.php'); ?>

<script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/wp-insert/js/common.js"></script>
			<div id="poststuff" class="metabox-holder has-right-sidebar">
				<div id="side-info-column" class="inner-sidebar">
				<?php do_meta_boxes('col_2','advanced',null); ?>
				</div>
				<div id="post-body" class="has-sidebar">				
					<div id="post-body-content" class="has-sidebar-content">
						<?php do_meta_boxes('col_1','advanced',null); ?>
						<input type="hidden" name="action" value="update" />
						<input type="hidden" name="page_options" value="<?php echo $page_parameters; ?>" />
						<p class="submit">
					    	<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
						</p>
						<p>
							<script type="text/javascript" src="http://www.wp-insert.smartlogix.co.in/wp-content/plugins/wp-adnetwork/wp-adnetwork.php?showad=1"></script>
						</p>
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

function wp_insert_in_post_ad_parameters($in_post_adID) 	{ return wp_insert_ad_parameters($in_post_adID, 'in_post_ad'); }
function wp_insert_in_post_ad_top_1_HTML() 					{ wp_insert_ad_HTML('top_1', 'in_post_ad'); }
function wp_insert_in_post_ad_bottom_1_HTML() 				{ wp_insert_ad_HTML('bottom_1', 'in_post_ad'); }
function wp_insert_in_post_ad_left_1_HTML() 				{ wp_insert_ad_HTML('left_1', 'in_post_ad'); }
function wp_insert_in_post_ad_right_1_HTML() 				{ wp_insert_ad_HTML('right_1', 'in_post_ad'); }
function wp_insert_in_post_ad_middle_1_HTML() 				{ wp_insert_ad_HTML('middle_1', 'in_post_ad'); }

function wp_insert_ad_widget_parameters($widgetID)	{ return wp_insert_ad_parameters($widgetID, 'ad_widget'); }
function wp_insert_ad_widget_1_HTML()	{ wp_insert_ad_HTML(1, 'ad_widget'); }
function wp_insert_ad_widget_2_HTML()	{ wp_insert_ad_HTML(2, 'ad_widget'); }
function wp_insert_ad_widget_3_HTML()	{ wp_insert_ad_HTML(3, 'ad_widget'); }
function wp_insert_ad_widget_4_HTML()	{ wp_insert_ad_HTML(4, 'ad_widget'); }
function wp_insert_ad_widget_5_HTML()	{ wp_insert_ad_HTML(5, 'ad_widget'); }
function wp_insert_ad_widget_6_HTML()	{ wp_insert_ad_HTML(6, 'ad_widget'); }
function wp_insert_ad_widget_7_HTML()	{ wp_insert_ad_HTML(7, 'ad_widget'); }
function wp_insert_ad_widget_8_HTML()	{ wp_insert_ad_HTML(8, 'ad_widget'); }
function wp_insert_ad_widget_9_HTML()	{ wp_insert_ad_HTML(9, 'ad_widget'); }
function wp_insert_ad_widget_10_HTML()	{ wp_insert_ad_HTML(10, 'ad_widget'); }

function wp_insert_multiple_ad_network_HTML() { 
if(!get_option('wp_insert_multiple_ad_network_type')) { add_option("wp_insert_multiple_ad_network_type", 'Primary Ad Network Only', '', 'yes'); }
?>
<div>
Select the Multiple Ad Network Setup that best suits you : <select name="wp_insert_multiple_ad_network_type" id="wp_insert_multiple_ad_network_type">
  <?php
    $multiple_ad_network_types = array("Primary Ad Network Only","Primary and Alternate Ad Network 1","All Ad Networks");
    $output = '';
    foreach ($multiple_ad_network_types as $multiple_ad_network_type) {
      $output .= '<option';
      if ( get_option('wp_insert_multiple_ad_network_type') == $multiple_ad_network_type) { $output .= ' selected="selected"'; }
      $output .= '>'.$multiple_ad_network_type.'</option>';
      }
    echo $output;
  ?>
</select>
<p>
<small>Multiple Ad Networks can be setup to display ads from different networks without infringing the terms of any network.<br/>At a time only ads from one network (Randomly Choosen) will be shown.<br/>This feature can also be used to randomly display different sized Ads from the same network.<br/>Please note that this option is global and applied to Template Ads, In Post Ads as well as Ad Widgets.</small>
</p>
</div>
<?php }

function wp_insert_ad_parameters($adID, $ad_type) {
$output = '';
if($ad_type == 'ad_widget') { $output .= 'wp_insert_'.$ad_type.'_'.$adID.'_title,'; }
$output .= 'wp_insert_'.$ad_type.'_'.$adID.'_enable,wp_insert_'.$ad_type.'_'.$adID.'_content,wp_insert_'.$ad_type.'_'.$adID.'_content_1,wp_insert_'.$ad_type.'_'.$adID.'_content_2,wp_insert_'.$ad_type.'_'.$adID.'_exclude_ids,wp_insert_'.$ad_type.'_'.$adID.'_exclude_home,wp_insert_'.$ad_type.'_'.$adID.'_exclude_archives,wp_insert_'.$ad_type.'_'.$adID.'_style';
return $output;
}

function wp_insert_ad_HTML($adID, $ad_type) { ?>
<div>
<?php if(get_option('wp_insert_'.$ad_type.'_'.$adID.'_enable')) { ?><input type="button" id="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_enable_button" value="Click to Deactivate" class="button" style="font-weight:bold;color:red;" onclick="wpInsertToggleAdWidget('#wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_enable_button', '#wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_enable')"/>
<?php } else { ?><input type="button" id="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_enable_button" value="Click to Activate" class="button" style="font-weight:bold;color:#2f9303;" onclick="wpInsertToggleAdWidget('#wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_enable_button', '#wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_enable')"/><?php } ?>
<input style="display:none;" id="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_enable" name="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_enable" type="checkbox" value="1"<?php if(get_option('wp_insert_'.$ad_type.'_'.$adID.'_enable')) echo ' checked="checked"'; ?> />

<?php if($ad_type == 'template_ad') { ?>
<p>
<label for="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_insertion_code">Code to add in your theme:</label>
<input id="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_insertion_code" name="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_insertion_code" type="text" style="border: medium none ; padding: 3px; font-size: 11px; width: 100%; display: inline;" class="widefat"  readonly="true" value="&lt;?php if(function_exists('wp_template_ad')) { wp_template_ad('<?php echo $adID; ?>'); } ?&gt;"/>
</p>
<?php } ?>

<?php if($ad_type == 'ad_widget') { ?>
<p>
<label for="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_title">Title:</label>
<input id="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_title" class="widefat" type="text" value="<?php echo get_option('wp_insert_'.$ad_type.'_'.$adID.'_title'); ?>" name="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_title"/>
</p>
<?php } ?>

<div style="margin:10px 6px;">
<?php if((get_option('wp_insert_multiple_ad_network_type') == "Primary and Alternate Ad Network 1") || (get_option('wp_insert_multiple_ad_network_type') == "All Ad Networks")) { ?><input type="button" id="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_content_button" value="Primary Ad Code" class="button" style="color:#2f9303;" onclick="SwitchAds('wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_content','wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_content_1','wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_content_2')"/> <?php } else {?><label for="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_content">Primary Ad Code:</label><?php } ?>
<?php if((get_option('wp_insert_multiple_ad_network_type') == "Primary and Alternate Ad Network 1") || (get_option('wp_insert_multiple_ad_network_type') == "All Ad Networks")) { ?><input type="button" id="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_content_1_button" value="Alternative Ad Code : 1" class="button" style="color:red;" onclick="SwitchAds('wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_content_1','wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_content','wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_content_2')"/> <?php } ?>
<?php if(get_option('wp_insert_multiple_ad_network_type') == "All Ad Networks") { ?><input type="button" id="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_content_2_button" value="Alternative Ad Code : 2" class="button" style="color:red;" onclick="SwitchAds('wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_content_2','wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_content_1','wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_content')"/> <?php } ?>
<textarea style="display:block;height:200px;" id="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_content" class="widefat" name="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_content" cols="20" rows="16"><?php echo get_option('wp_insert_'.$ad_type.'_'.$adID.'_content'); ?></textarea>
<textarea style="display:none;height:0px;" id="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_content_1" class="widefat" name="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_content_1" cols="20" rows="16"><?php echo get_option('wp_insert_'.$ad_type.'_'.$adID.'_content_1'); ?></textarea>
<textarea style="display:none;height:0px;" id="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_content_2" class="widefat" name="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_content_2" cols="20" rows="16"><?php echo get_option('wp_insert_'.$ad_type.'_'.$adID.'_content_2'); ?></textarea>
</div>

<div style="margin:6px;">
<label for="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_exclude_ids">Exclude On Posts/Pages:</label><div class="clear"></div>
<input style="margin: 10px 6px 0pt; float: left; width: 60%;" class="widefat" type="text" value="<?php echo get_option('wp_insert_'.$ad_type.'_'.$adID.'_exclude_ids'); ?>" name="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_exclude_ids" id="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_exclude_ids" />
<img style="float:left; margin-top:14px; cursor: pointer;" src="<?php echo WP_PLUGIN_URL; ?>/wp-insert/images/search-16x16.png" width="16px" height="16px" onclick="ShowPostPicker('wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_exclude_ids')" />
<div class="clear"></div>
</div>
<p>
<label for="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_exclude_home">Exclude On Home Page:</label>
<input id="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_exclude_home" name="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_exclude_home" type="checkbox" value="1"<?php if(get_option('wp_insert_'.$ad_type.'_'.$adID.'_exclude_home')) echo ' checked="checked"'; ?> />
</p>
<p>
<label for="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_exclude_archives">Exclude On Archives Pages:</label>
<input id="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_exclude_archives" name="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_exclude_archives" type="checkbox" value="1"<?php if(get_option('wp_insert_'.$ad_type.'_'.$adID.'_exclude_archives')) echo ' checked="checked"'; ?> />
</p>

<div style="margin:6px;padding: 6px;border: 1px solid #DDDDDD;">
<label for="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_style">Ad Box CSS Styler</label><div class="clear"></div>
<input style="float:left; width:60%; margin: 10px 6px 0pt;background: #FFEEEE;" class="widefat" type="text" value="<?php if(get_option('wp_insert_'.$ad_type.'_'.$adID.'_style') != '') { echo get_option('wp_insert_'.$ad_type.'_'.$adID.'_style'); } else { echo 'margin: 5px;padding: 0px;'; } ?>" name="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_style" id="wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_style" />
<img style="float:left; margin-top:14px; cursor: pointer;" src="<?php echo WP_PLUGIN_URL; ?>/wp-insert/images/style-16x16.png" width="0px" height="0px" onclick="ShowStyler('wp_insert_<?php echo $ad_type; ?>_<?php echo $adID; ?>_style')" />
<div class="clear"></div>
</div>

</div>
<?php
} ?>