<?php
function wp_insert_add_feedspage() {
	global $screen_layout_columns;

add_meta_box('wp_insert_feed_ad_top', 'Ad - Above Feed Content', 'wp_insert_feed_ad_top_HTML', 'col_1');
add_meta_box('wp_insert_feed_ad_bottom', 'Ad - Below Feed Content', 'wp_insert_feed_ad_bottom_HTML', 'col_1');
add_meta_box('wp_insert_post_feed_feedburner', 'FeedBurner Feed URL', 'wp_insert_feed_feedburner_HTML', 'col_1');
add_meta_box('wp_insert_comments_feed_feedburner', 'FeedBurner Comments Feed URL', 'wp_insert_feed_feedburner_HTML', 'col_1');
add_meta_box('wp_insert_feed_logo', 'Logo for your Feed', 'wp_insert_feed_logo_HTML', 'col_1');
add_meta_box('wp_insert_feed_feedburner_email', 'FeedBurner - Subscribe via Email Widget', 'wp_insert_feed_feedburner_email_HTML', 'col_1');
add_meta_box('wp_insert_subscribe_widget_1', 'Subscribe Widget : Type 1', 'wp_insert_subscribe_widget_1_HTML', 'col_1');
add_meta_box('wp_insert_subscribe_widget_2', 'Subscribe Widget : Type 2', 'wp_insert_subscribe_widget_2_HTML', 'col_1');
add_meta_box('wp_insert_subscribe_widget_3', 'Subscribe Widget : Type 3', 'wp_insert_subscribe_widget_3_HTML', 'col_1');

wp_insert_settings_page_layout('', 'WP-INSERT : Feeds', 'feeds');
}

function wp_insert_subscribe_widget_HTML($widgetID) { ?>
<div>
<?php if(get_option('wp_insert_feed_widget_'.$widgetID.'_enable')) { ?><input type="button" id="wp_insert_feed_widget_<?php echo $widgetID; ?>_enable_button" value="Click to Deactivate" class="button" style="font-weight:bold;color:red;" onclick="wpInsertToggleAdWidget('#wp_insert_feed_widget_<?php echo $widgetID; ?>_enable_button', '#wp_insert_feed_widget_<?php echo $widgetID; ?>_enable')"/>
<?php } else { ?><input type="button" id="wp_insert_feed_widget_<?php echo $widgetID; ?>_enable_button" value="Click to Activate" class="button" style="font-weight:bold;color:#2f9303;" onclick="wpInsertToggleAdWidget('#wp_insert_feed_widget_<?php echo $widgetID; ?>_enable_button', '#wp_insert_feed_widget_<?php echo $widgetID; ?>_enable')"/><?php } ?>
<input style="display:none;" id="wp_insert_feed_widget_<?php echo $widgetID; ?>_enable" name="wp_insert_feed_widget_<?php echo $widgetID; ?>_enable" type="checkbox" value="1"<?php if(get_option('wp_insert_feed_widget_'.$widgetID.'_enable')) echo ' checked="checked"'; ?> />
<p>
<label for="wp_insert_feed_widget_<?php echo $widgetID; ?>_title">Title:</label>
<input id="wp_insert_feed_widget_<?php echo $widgetID; ?>_title" class="widefat" type="text" value="<?php echo get_option('wp_insert_feed_widget_'.$widgetID.'_title'); ?>" name="wp_insert_feed_widget_<?php echo $widgetID; ?>_title"/>
</p>
</div>
<?php }

function wp_insert_subscribe_widget_1_HTML() { wp_insert_subscribe_widget_HTML(1); }
function wp_insert_subscribe_widget_2_HTML() { wp_insert_subscribe_widget_HTML(2); }
function wp_insert_subscribe_widget_3_HTML() { wp_insert_subscribe_widget_HTML(3); }

function wp_insert_feed_feedburner_email_HTML() { ?>
<div>
<?php if(get_option('wp_insert_feed_feedburner_email_enable')) { ?><input type="button" id="wp_insert_feed_feedburner_email_enable_button" value="Click to Deactivate" class="button" style="font-weight:bold;color:red;" onclick="wpInsertToggleAdWidget('#wp_insert_feed_feedburner_email_enable_button', '#wp_insert_feed_feedburner_email_enable')"/>
<?php } else { ?><input type="button" id="wp_insert_feed_feedburner_email_enable_button" value="Click to Activate" class="button" style="font-weight:bold;color:#2f9303;" onclick="wpInsertToggleAdWidget('#wp_insert_feed_feedburner_email_enable_button', '#wp_insert_feed_feedburner_email_enable')"/><?php } ?>
<input style="display:none;" id="wp_insert_feed_feedburner_email_enable" name="wp_insert_feed_feedburner_email_enable" type="checkbox" value="1"<?php if(get_option('wp_insert_feed_feedburner_email_enable')) echo ' checked="checked"'; ?> />
<p>
<label for="wp_insert_feed_feedburner_email_widget_code">Subscribe via Email Code:</label>
<textarea id="wp_insert_feed_feedburner_email_widget_code" class="widefat" name="wp_insert_feed_feedburner_email_widget_code" cols="20" rows="16"><?php echo get_option('wp_insert_feed_feedburner_email_widget_code'); ?></textarea></p>
</div>
<?php }

function wp_insert_feed_feedburner_HTML() { ?>
<div>
<?php if(get_option('wp_insert_feed_feedburner_enable')) { ?><input type="button" id="wp_insert_feed_feedburner_enable_button" value="Click to Deactivate" class="button" style="font-weight:bold;color:red;" onclick="wpInsertToggleAdWidget('#wp_insert_feed_feedburner_enable_button', '#wp_insert_feed_feedburner_enable')"/>
<?php } else { ?><input type="button" id="wp_insert_feed_feedburner_enable_button" value="Click to Activate" class="button" style="font-weight:bold;color:#2f9303;" onclick="wpInsertToggleAdWidget('#wp_insert_feed_feedburner_enable_button', '#wp_insert_feed_feedburner_enable')"/><?php } ?>
<input style="display:none;" id="wp_insert_feed_feedburner_enable" name="wp_insert_feed_feedburner_enable" type="checkbox" value="1"<?php if(get_option('wp_insert_feed_feedburner_enable')) echo ' checked="checked"'; ?> />
<p>
<label for="wp_insert_feed_feedburner_url">Logo URL:</label>
<input id="wp_insert_feed_feedburner_url" class="widefat" type="text" value="<?php echo get_option('wp_insert_feed_feedburner_url'); ?>" name="wp_insert_feed_feedburner_url"/>
</p>
</div>
<?php }

function wp_insert_feed_ad_HTML($feed_adID) { ?>
<div>
<?php if(get_option('wp_insert_feed_ad_'.$in_post_adID.'_enable')) { ?><input type="button" id="wp_insert_feed_ad_<?php echo $in_post_adID; ?>_enable_button" value="Click to Deactivate" class="button" style="font-weight:bold;color:red;" onclick="wpInsertToggleAdWidget('#wp_insert_feed_ad_<?php echo $in_post_adID; ?>_enable_button', '#wp_insert_feed_ad_<?php echo $in_post_adID; ?>_enable')"/>
<?php } else { ?><input type="button" id="wp_insert_feed_ad_<?php echo $in_post_adID; ?>_enable_button" value="Click to Activate" class="button" style="font-weight:bold;color:#2f9303;" onclick="wpInsertToggleAdWidget('#wp_insert_feed_ad_<?php echo $in_post_adID; ?>_enable_button', '#wp_insert_feed_ad_<?php echo $in_post_adID; ?>_enable')"/><?php } ?>
<input style="display:none;" id="wp_insert_feed_ad_<?php echo $in_post_adID; ?>_enable" name="wp_insert_feed_ad_<?php echo $in_post_adID; ?>_enable" type="checkbox" value="1"<?php if(get_option('wp_insert_feed_ad_'.$in_post_adID.'_enable')) echo ' checked="checked"'; ?> />
<p>
<label for="wp_insert_feed_ad_<?php echo $in_post_adID; ?>_content">Ad Code:</label>
<textarea id="wp_insert_feed_ad_<?php echo $in_post_adID; ?>_content" class="widefat" name="wp_insert_feed_ad_<?php echo $in_post_adID; ?>_content" cols="20" rows="16"><?php echo get_option('wp_insert_feed_ad_'.$in_post_adID.'_content'); ?></textarea>
</p>
</div>
<?php }

function wp_insert_feed_ad_top_HTML() { wp_insert_feed_ad_HTML("top"); }
function wp_insert_feed_ad_bottom_HTML() { wp_insert_feed_ad_HTML("bottom"); }

function wp_insert_feed_logo_HTML() { ?>
<div>
<?php if(get_option('wp_insert_feed_logo_enable')) { ?><input type="button" id="wp_insert_feed_logo_enable_button" value="Click to Deactivate" class="button" style="font-weight:bold;color:red;" onclick="wpInsertToggleAdWidget('#wp_insert_feed_logo_enable_button', '#wp_insert_feed_logo_enable')"/>
<?php } else { ?><input type="button" id="wp_insert_feed_logo_enable_button" value="Click to Activate" class="button" style="font-weight:bold;color:#2f9303;" onclick="wpInsertToggleAdWidget('#wp_insert_feed_logo_enable_button', '#wp_insert_feed_logo_enable')"/><?php } ?>
<input style="display:none;" id="wp_insert_feed_logo_enable" name="wp_insert_feed_logo_enable" type="checkbox" value="1"<?php if(get_option('wp_insert_feed_logo_enable')) echo ' checked="checked"'; ?> />
<p>
<label for="wp_insert_feed_logo_url">Logo URL:</label>
<input id="wp_insert_feed_logo_url" class="widefat" type="text" value="<?php echo get_option('wp_insert_feed_logo_url'); ?>" name="wp_insert_feed_logo_url"/>
</p>
<p>
<label for="wp_insert_feed_logo_width">Logo width:</label>
<input id="wp_insert_feed_logo_width" class="widefat" type="text" value="<?php echo get_option('wp_insert_feed_logo_width'); ?>" name="wp_insert_feed_logo_width" />
</p>
<p>
<label for="wp_insert_feed_logo_height">Logo height:</label>
<input id="wp_insert_feed_logo_height" class="widefat" type="text" value="<?php echo get_option('wp_insert_feed_logo_height'); ?>" name="wp_insert_feed_logo_height"/>
</p>
</div>
<?php }