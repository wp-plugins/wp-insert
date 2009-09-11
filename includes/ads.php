<?php
require_once (dirname(__FILE__) . '/adwidgets.php');
require_once (dirname(__FILE__) . '/inpostads.php');
// action function for above hook
function smart_add_menu() {
	add_menu_page('Wp-Insert', 'Wp-Insert', 8, __FILE__);
	add_submenu_page(__FILE__, 'wp-insert', 'Manage Ads', 8, __FILE__, 'wp_insert_add_adspage');
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

add_meta_box('wp_insert_ad_widget_1', 'Ad Widget : 1', 'wp_insert_ad_widget_1_HTML', 'adWidgets');
add_meta_box('wp_insert_ad_widget_2', 'Ad Widget : 2', 'wp_insert_ad_widget_2_HTML', 'adWidgets');
add_meta_box('wp_insert_ad_widget_3', 'Ad Widget : 3', 'wp_insert_ad_widget_3_HTML', 'adWidgets');
add_meta_box('wp_insert_ad_widget_4', 'Ad Widget : 4', 'wp_insert_ad_widget_4_HTML', 'adWidgets');
add_meta_box('wp_insert_ad_widget_5', 'Ad Widget : 5', 'wp_insert_ad_widget_5_HTML', 'adWidgets');
add_meta_box('wp_insert_ad_widget_6', 'Ad Widget : 6', 'wp_insert_ad_widget_6_HTML', 'adWidgets');
add_meta_box('wp_insert_ad_widget_7', 'Ad Widget : 7', 'wp_insert_ad_widget_7_HTML', 'adWidgets');
add_meta_box('wp_insert_ad_widget_8', 'Ad Widget : 8', 'wp_insert_ad_widget_8_HTML', 'adWidgets');
add_meta_box('wp_insert_ad_widget_9', 'Ad Widget : 9', 'wp_insert_ad_widget_9_HTML', 'adWidgets');
add_meta_box('wp_insert_ad_widget_10', 'Ad Widget : 10', 'wp_insert_ad_widget_10_HTML', 'adWidgets');

add_meta_box('wp_insert_in_post_ad_top_1', 'Ad - Above Post Content', 'wp_insert_in_post_ad_top_1_HTML', 'inPostAds');
//add_meta_box('wp_insert_in_post_ad_top_2', 'Ad - Above Post Content : 2', 'wp_insert_in_post_ad_top_2_HTML', 'inPostAds');
add_meta_box('wp_insert_in_post_ad_bottom_1', 'Ad - Below Post Content', 'wp_insert_in_post_ad_bottom_1_HTML', 'inPostAds');
//add_meta_box('wp_insert_in_post_ad_bottom_2', 'Ad - Below Post Content : 2', 'wp_insert_in_post_ad_bottom_2_HTML', 'inPostAds');
add_meta_box('wp_insert_in_post_ad_left_1', 'Ad - Left of Post Content', 'wp_insert_in_post_ad_left_1_HTML', 'inPostAds');
//add_meta_box('wp_insert_in_post_ad_left_2', 'Ad - Left of Post Content : 2', 'wp_insert_in_post_ad_left_2_HTML', 'inPostAds');
add_meta_box('wp_insert_in_post_ad_right_1', 'Ad - Right of Post Content', 'wp_insert_in_post_ad_right_1_HTML', 'inPostAds');
//add_meta_box('wp_insert_in_post_ad_right_2', 'Ad - Right of Post Content : 2', 'wp_insert_in_post_ad_right_2_HTML', 'inPostAds');
add_meta_box('wp_insert_in_post_ad_middle_1', 'Ad - Middle of Post Content', 'wp_insert_in_post_ad_middle_1_HTML', 'inPostAds');
//add_meta_box('wp_insert_in_post_ad_middle_2', 'Ad - Middle of Post Content : 2', 'wp_insert_in_post_ad_middle_2_HTML', 'inPostAds');
?>
<div id="post_ads_container" class="wrap">
<?php screen_icon('options-general'); ?>
<h2>WP-INSERT : Manage Ads</h2>
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
<style type="text/css">
.GreyOutLayer
{
	position: absolute;
	top: 0px;
	left: 0px;
	width: 100%;
	height: 100%;
	bottom: 0px;
	background-color: #666;
	z-index: 100;
	filter: progid:DXImageTransform.Microsoft.Alpha(opacity = 30);
	opacity: 0.30;
}

#popUpMaster{position:relative;padding:10px 0 0 10px;display:none}
#popUpTopLft{position:absolute;left:0px;top:0}
#popUpTop{position:absolute;left:10px;top:0;height:36px;z-index:9}
#popUpTopRgt{position:absolute;right:0px;top:0;z-index:9}
#popUpLft{position:absolute;left:0px;top:30px;width:17px;}
#popUpRgt{position:absolute;right:0px;top:36px;width:26px;}
#popUpBtmLft{position:absolute;left:0px;bottom:0px;}
#popUpBtm{position:absolute;left:17px;bottom:0px;height:20px}
#popUpBtmRgt{position:absolute;right:0px;bottom:0px;}
#content{background:#F2F2F2;height:520px;width:725px;margin:0px;z-index:100;position:absolute;top:26px;right:15px;}
.closePopUp{display:block;position:absolute;right:10px;top:4px;width:20px;height:18px;z-index:10;text-decoration:none;background:none}
#popUpMaster h4{position:absolute;top:0;left:0;z-index:10;padding:0;margin:6px 0 0 10px;color:#333333;text-shadow:0 1px 0 #FFFFFF;
	font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:15px;cursor:move;background:nonImage.gif;
	width:100%}
</style>

			<div id="poststuff" class="metabox-holder has-right-sidebar">
				<div id="side-info-column" class="inner-sidebar">
				<?php do_meta_boxes('adWidgets','advanced',null); ?>
				</div>
				<div id="post-body" class="has-sidebar">				
					<div id="post-body-content" class="has-sidebar-content">
						<?php do_meta_boxes('inPostAds','advanced',null); ?>
						<input type="hidden" name="action" value="update" />
						<input type="hidden" name="page_options" value="<?php wp_insert_in_post_ad_parameters('middle_1'); wp_insert_in_post_ad_parameters('middle_2'); wp_insert_in_post_ad_parameters('right_1'); wp_insert_in_post_ad_parameters('right_2'); wp_insert_in_post_ad_parameters('left_1'); wp_insert_in_post_ad_parameters('left_2'); wp_insert_in_post_ad_parameters('bottom_1'); wp_insert_in_post_ad_parameters('bottom_2'); wp_insert_in_post_ad_parameters('top_1'); wp_insert_in_post_ad_parameters('top_2'); wp_insert_ad_widget_parameters(1); wp_insert_ad_widget_parameters(2); wp_insert_ad_widget_parameters(3); wp_insert_ad_widget_parameters(4); wp_insert_ad_widget_parameters(5); wp_insert_ad_widget_parameters(6); wp_insert_ad_widget_parameters(7); wp_insert_ad_widget_parameters(8); wp_insert_ad_widget_parameters(9); wp_insert_ad_widget_parameters(10); ?>" />
						<p class="submit">
					    	<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
						</p>
						<p>
							<a href="http://www.smartlogix.co.in/"><img src="http://www.smartlogix.co.in/ads/random/rotate.php" border="0" /></a>
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
<?php
}

function wp_insert_in_post_ad_parameters($in_post_adID) {
echo 'wp_insert_in_post_ad_'.$in_post_adID.'_enable,wp_insert_in_post_ad_'.$in_post_adID.'_content,wp_insert_in_post_ad_'.$in_post_adID.'_exclude_ids,wp_insert_in_post_ad_'.$in_post_adID.'_exclude_home,wp_insert_in_post_ad_'.$in_post_adID.'_exclude_archives,';
}

function wp_insert_in_post_ad_HTML($in_post_adID) { ?>
<div>
<?php if(get_option('wp_insert_in_post_ad_'.$in_post_adID.'_enable')) { ?><input type="button" id="wp_insert_in_post_ad_<?php echo $in_post_adID; ?>_enable_button" value="Click to Deactivate" class="button" style="font-weight:bold;color:red;" onclick="wpInsertToggleAdWidget('#wp_insert_in_post_ad_<?php echo $in_post_adID; ?>_enable_button', '#wp_insert_in_post_ad_<?php echo $in_post_adID; ?>_enable')"/>
<?php } else { ?><input type="button" id="wp_insert_in_post_ad_<?php echo $in_post_adID; ?>_enable_button" value="Click to Activate" class="button" style="font-weight:bold;color:#2f9303;" onclick="wpInsertToggleAdWidget('#wp_insert_in_post_ad_<?php echo $in_post_adID; ?>_enable_button', '#wp_insert_in_post_ad_<?php echo $in_post_adID; ?>_enable')"/><?php } ?>
<input style="display:none;" id="wp_insert_in_post_ad_<?php echo $in_post_adID; ?>_enable" name="wp_insert_in_post_ad_<?php echo $in_post_adID; ?>_enable" type="checkbox" value="1"<?php if(get_option('wp_insert_in_post_ad_'.$in_post_adID.'_enable')) echo ' checked="checked"'; ?> />
<p>
<label for="wp_insert_in_post_ad_<?php echo $in_post_adID; ?>_content">Ad Code:</label>
<textarea id="wp_insert_in_post_ad_<?php echo $in_post_adID; ?>_content" class="widefat" name="wp_insert_in_post_ad_<?php echo $in_post_adID; ?>_content" cols="20" rows="16"><?php echo get_option('wp_insert_in_post_ad_'.$in_post_adID.'_content'); ?></textarea>
</p>
<p>
<label for="wp_insert_in_post_ad_<?php echo $in_post_adID; ?>_exclude_ids">Exclude On Posts/Pages:</label><div class="clear"></div>
<input style="float:left; width:60%; margin: 0 6px;" class="widefat" type="text" value="<?php echo get_option('wp_insert_in_post_ad_'.$in_post_adID.'_exclude_ids'); ?>" name="wp_insert_in_post_ad_<?php echo $in_post_adID; ?>_exclude_ids" id="wp_insert_in_post_ad_<?php echo $in_post_adID; ?>_exclude_ids" />
<img style="float:left; margin-top:4px; cursor: pointer;" src="<?php echo WP_PLUGIN_URL; ?>/wp-insert/images/search-16x16.png" width="16px" height="16px" onclick="ShowPostPicker('wp_insert_in_post_ad_<?php echo $in_post_adID; ?>_exclude_ids')" />
<div class="clear"></div>
</p>
<p>
<label for="wp_insert_in_post_ad_<?php echo $in_post_adID; ?>_exclude_home">Exclude On Home Page:</label>
<input id="wp_insert_in_post_ad_<?php echo $in_post_adID; ?>_exclude_home" name="wp_insert_in_post_ad_<?php echo $in_post_adID; ?>_exclude_home" type="checkbox" value="1"<?php if(get_option('wp_insert_in_post_ad_'.$in_post_adID.'_exclude_home')) echo ' checked="checked"'; ?> />
</p>
<p>
<label for="wp_insert_in_post_ad_<?php echo $in_post_adID; ?>_exclude_archives">Exclude On Archives Pages:</label>
<input id="wp_insert_in_post_ad_<?php echo $in_post_adID; ?>_exclude_archives" name="wp_insert_in_post_ad_<?php echo $in_post_adID; ?>_exclude_archives" type="checkbox" value="1"<?php if(get_option('wp_insert_in_post_ad_'.$in_post_adID.'_exclude_archives')) echo ' checked="checked"'; ?> />
</p>
</div>
<?php }

function wp_insert_in_post_ad_top_1_HTML() { wp_insert_in_post_ad_HTML("top_1"); }
//function wp_insert_in_post_ad_top_2_HTML() { wp_insert_in_post_ad_HTML("top_2"); }
function wp_insert_in_post_ad_bottom_1_HTML() { wp_insert_in_post_ad_HTML("bottom_1"); }
//function wp_insert_in_post_ad_bottom_2_HTML() { wp_insert_in_post_ad_HTML("bottom_2"); }
function wp_insert_in_post_ad_left_1_HTML() { wp_insert_in_post_ad_HTML("left_1"); }
//function wp_insert_in_post_ad_left_2_HTML() { wp_insert_in_post_ad_HTML("left_2"); }
function wp_insert_in_post_ad_right_1_HTML() { wp_insert_in_post_ad_HTML("right_1"); }
//function wp_insert_in_post_ad_right_2_HTML() { wp_insert_in_post_ad_HTML("right_2"); }
function wp_insert_in_post_ad_middle_1_HTML() { wp_insert_in_post_ad_HTML("middle_1"); }
//function wp_insert_in_post_ad_middle_2_HTML() { wp_insert_in_post_ad_HTML("middle_2"); }

function wp_insert_ad_widget_parameters($widgetID) {
echo 'wp_insert_ad_widget_'.$widgetID.'_enable,wp_insert_ad_widget_'.$widgetID.'_title,wp_insert_ad_widget_'.$widgetID.'_content,wp_insert_ad_widget_'.$widgetID.'_exclude_ids,wp_insert_ad_widget_'.$widgetID.'_exclude_home,wp_insert_ad_widget_'.$widgetID.'_exclude_archives,';
}

function ad_widget_HTML($widgetID) { ?>
<div>
<?php if(get_option('wp_insert_ad_widget_'.$widgetID.'_enable')) { ?><input type="button" id="wp_insert_ad_widget_<?php echo $widgetID; ?>_enable_button" value="Click to Deactivate" class="button" style="font-weight:bold;color:red;" onclick="wpInsertToggleAdWidget('#wp_insert_ad_widget_<?php echo $widgetID; ?>_enable_button', '#wp_insert_ad_widget_<?php echo $widgetID; ?>_enable')"/>
<?php } else { ?><input type="button" id="wp_insert_ad_widget_<?php echo $widgetID; ?>_enable_button" value="Click to Activate" class="button" style="font-weight:bold;color:#2f9303;" onclick="wpInsertToggleAdWidget('#wp_insert_ad_widget_<?php echo $widgetID; ?>_enable_button', '#wp_insert_ad_widget_<?php echo $widgetID; ?>_enable')"/><?php } ?>
<input style="display:none;" id="wp_insert_ad_widget_<?php echo $widgetID; ?>_enable" name="wp_insert_ad_widget_<?php echo $widgetID; ?>_enable" type="checkbox" value="1"<?php if(get_option('wp_insert_ad_widget_'.$widgetID.'_enable')) echo ' checked="checked"'; ?> />
<p>
<label for="wp_insert_ad_widget_<?php echo $widgetID; ?>_title">Title:</label>
<input id="wp_insert_ad_widget_<?php echo $widgetID; ?>_title" class="widefat" type="text" value="<?php echo get_option('wp_insert_ad_widget_'.$widgetID.'_title'); ?>" name="wp_insert_ad_widget_<?php echo $widgetID; ?>_title"/>
</p>
<p>
<label for="wp_insert_ad_widget_<?php echo $widgetID; ?>_content">Ad Code:</label>
<textarea id="wp_insert_ad_widget_<?php echo $widgetID; ?>_content" class="widefat" name="wp_insert_ad_widget_<?php echo $widgetID; ?>_content" cols="20" rows="16"><?php echo get_option('wp_insert_ad_widget_'.$widgetID.'_content'); ?></textarea>
</p>
<p>
<label for="wp_insert_ad_widget_<?php echo $widgetID; ?>_exclude_ids">Exclude On Posts/Pages:</label><div class="clear"></div>
<input style="float:left; width:60%; margin: 0 6px;" class="widefat" type="text" value="<?php echo get_option('wp_insert_ad_widget_'.$widgetID.'_exclude_ids'); ?>" name="wp_insert_ad_widget_<?php echo $widgetID; ?>_exclude_ids" id="wp_insert_ad_widget_<?php echo $widgetID; ?>_exclude_ids" />
<img style="float:left; margin-top:4px; cursor: pointer;" src="<?php echo WP_PLUGIN_URL; ?>/wp-insert/images/search-16x16.png" width="16px" height="16px" onclick="ShowPostPicker('wp_insert_ad_widget_<?php echo $widgetID; ?>_exclude_ids')" />
<div class="clear"></div>
</p>
<p>
<label for="wp_insert_ad_widget_<?php echo $widgetID; ?>_exclude_home">Exclude On Home Page:</label>
<input id="wp_insert_ad_widget_<?php echo $widgetID; ?>_exclude_home" name="wp_insert_ad_widget_<?php echo $widgetID; ?>_exclude_home" type="checkbox" value="1"<?php if(get_option('wp_insert_ad_widget_'.$widgetID.'_exclude_home')) echo ' checked="checked"'; ?> />
</p>
<p>
<label for="wp_insert_ad_widget_<?php echo $widgetID; ?>_exclude_archives">Exclude On Archives Pages:</label>
<input id="wp_insert_ad_widget_<?php echo $widgetID; ?>_exclude_archives" name="wp_insert_ad_widget_<?php echo $widgetID; ?>_exclude_archives" type="checkbox" value="1"<?php if(get_option('wp_insert_ad_widget_'.$widgetID.'_exclude_archives')) echo ' checked="checked"'; ?> />
</p>
</div>
<?php }

function wp_insert_ad_widget_1_HTML() { ad_widget_HTML(1); }
function wp_insert_ad_widget_2_HTML() { ad_widget_HTML(2); }
function wp_insert_ad_widget_3_HTML() { ad_widget_HTML(3); }
function wp_insert_ad_widget_4_HTML() { ad_widget_HTML(4); }
function wp_insert_ad_widget_5_HTML() { ad_widget_HTML(5); }
function wp_insert_ad_widget_6_HTML() { ad_widget_HTML(6); }
function wp_insert_ad_widget_7_HTML() { ad_widget_HTML(7); }
function wp_insert_ad_widget_8_HTML() { ad_widget_HTML(8); }
function wp_insert_ad_widget_9_HTML() { ad_widget_HTML(9); }
function wp_insert_ad_widget_10_HTML() { ad_widget_HTML(10); }
?>