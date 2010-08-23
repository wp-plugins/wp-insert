<?php
add_action('admin_menu','wp_insert_update_notification');
add_action('widgets_init', 'wp_insert_unregister_widgets');

function wp_insert_update_notification() {
	if(get_option('wp_insert_hide_core_update_notification_enable')) {
		remove_action('admin_notices', 'update_nag', 3);
		remove_filter('update_footer', 'core_update_footer');
	}
	
	if(get_option('wp_insert_show_id_enable')) {
		add_filter('manage_posts_columns', 'wp_insert_posts_columns_header');
		add_filter('manage_posts_custom_column', 'wp_insert_posts_columns_row', 10, 2);
		
		add_filter('manage_pages_columns', 'wp_insert_posts_columns_header');
		add_filter('manage_pages_custom_column', 'wp_insert_posts_columns_row', 10, 2);
	}
	
	if(get_option('wp_insert_load_theme_styles_enable')) {
		add_filter('mce_css', 'wp_insert_editor_style');
	}
}

function wp_insert_unregister_widgets() {
	if(get_option('wp_insert_hide_default_widgets_enable')) {
		unregister_widget('WP_Widget_Pages');
		unregister_widget('WP_Widget_Calendar');
		unregister_widget('WP_Widget_Archives');
		unregister_widget('WP_Widget_Links');
		unregister_widget('WP_Widget_Categories');
		unregister_widget('WP_Widget_Recent_Posts');
		unregister_widget('WP_Widget_Search');
		unregister_widget('WP_Widget_Tag_Cloud');
		unregister_widget('WP_Widget_Meta');
		unregister_widget('WP_Widget_Recent_Comments');
		unregister_widget('WP_Widget_RSS');
		//unregister_widget('WP_Widget_Text');
	}
}

function wp_insert_posts_columns_header($columns) {
	$columns = array_merge(array_slice($columns, 0, 1), array('postID' => 'ID'),array_slice($columns, 1, count($columns)));
	return $columns;
}
function wp_insert_posts_columns_row($columnTitle, $postID){
	if($columnTitle == 'postID'){
		echo $postID;
	}
}

function wp_insert_editor_style($url) {
	if (!empty($url)) $url .= ',';
	$url .= trailingslashit(get_stylesheet_directory_uri()).'style.css';
	return $url;
}


function wp_insert_miscellaneous_pages() {
	global $screen_layout_columns;
	
	add_meta_box('wp_insert_miscellaneous_core_update_notification', 'Hide Core Update Notification', 'wp_insert_miscellaneous_core_update_notification_HTML', 'col_1');
	add_meta_box('wp_insert_hide_default_widgets', 'Hide Default Widgets', 'wp_insert_hide_default_widgets_HTML', 'col_1');
	add_meta_box('wp_insert_show_id', 'Show ID in Post & Page Listing', 'wp_insert_show_id_HTML', 'col_1');
	add_meta_box('wp_insert_load_theme_styles', 'Load theme styles in Visual Editor', 'wp_insert_load_theme_styles_HTML', 'col_1');
	
	$parameters = 'wp_insert_hide_core_update_notification_enable, wp_insert_hide_default_widgets_enable, wp_insert_show_id_enable, wp_insert_load_theme_styles_enable';
	wp_insert_settings_page_layout($parameters, 'WP-INSERT : Miscellaneous Options', 'miscellaneous');
}

function wp_insert_miscellaneous_core_update_notification_HTML() { ?>
<div>
	<?php if(get_option('wp_insert_hide_core_update_notification_enable')) { ?>
		<input type="button" id="wp_insert_hide_core_update_notification_enable_button" value="Click to Deactivate" class="button" style="font-weight:bold;color:red;" onclick="wpInsertToggleAdWidget('#wp_insert_hide_core_update_notification_enable_button', '#wp_insert_hide_core_update_notification_enable')"/>
	<?php } else { ?>
		<input type="button" id="wp_insert_hide_core_update_notification_enable_button" value="Click to Activate" class="button" style="font-weight:bold;color:#2f9303;" onclick="wpInsertToggleAdWidget('#wp_insert_hide_core_update_notification_enable_button', '#wp_insert_hide_core_update_notification_enable')"/>
	<?php } ?>
	<input style="display:none;" id="wp_insert_hide_core_update_notification_enable" name="wp_insert_hide_core_update_notification_enable" type="checkbox" value="1"<?php if(get_option('wp_insert_hide_core_update_notification_enable')) echo ' checked="checked"'; ?> />
	<p>
		<small>
			You can hide the message which says : "WordPress XX.XX.XX is available! Please update now." if you dont want users to accidently upgrade the core when you suspect an upgrade might break a feature.
		</small>
	</p>
</div>
<?php }

function wp_insert_hide_default_widgets_HTML() { ?>
<div>
	<?php if(get_option('wp_insert_hide_default_widgets_enable')) { ?>
		<input type="button" id="wp_insert_hide_default_widgets_enable_button" value="Click to Deactivate" class="button" style="font-weight:bold;color:red;" onclick="wpInsertToggleAdWidget('#wp_insert_hide_default_widgets_enable_button', '#wp_insert_hide_default_widgets_enable')"/>
	<?php } else { ?>
		<input type="button" id="wp_insert_hide_default_widgets_enable_button" value="Click to Activate" class="button" style="font-weight:bold;color:#2f9303;" onclick="wpInsertToggleAdWidget('#wp_insert_hide_default_widgets_enable_button', '#wp_insert_hide_default_widgets_enable')"/>
	<?php } ?>
	<input style="display:none;" id="wp_insert_hide_default_widgets_enable" name="wp_insert_hide_default_widgets_enable" type="checkbox" value="1"<?php if(get_option('wp_insert_hide_default_widgets_enable')) echo ' checked="checked"'; ?> />
	<p>
		<small>
			Disables all default widgets except the Text Widget
		</small>
	</p>
</div>
<?php }

function wp_insert_show_id_HTML() { ?>
<div>
	<?php if(get_option('wp_insert_show_id_enable')) { ?>
		<input type="button" id="wp_insert_show_id_enable_button" value="Click to Deactivate" class="button" style="font-weight:bold;color:red;" onclick="wpInsertToggleAdWidget('#wp_insert_show_id_enable_button', '#wp_insert_show_id_enable')"/>
	<?php } else { ?>
		<input type="button" id="wp_insert_show_id_enable_button" value="Click to Activate" class="button" style="font-weight:bold;color:#2f9303;" onclick="wpInsertToggleAdWidget('#wp_insert_show_id_enable_button', '#wp_insert_show_id_enable')"/>
	<?php } ?>
	<input style="display:none;" id="wp_insert_show_id_enable" name="wp_insert_show_id_enable" type="checkbox" value="1"<?php if(get_option('wp_insert_show_id_enable')) echo ' checked="checked"'; ?> />
	<p>
		<small>
			Disables all default widgets except the Text Widget
		</small>
	</p>
</div>
<?php }

function wp_insert_load_theme_styles_HTML() { ?>
<div>
	<?php if(get_option('wp_insert_load_theme_styles_enable')) { ?>
		<input type="button" id="wp_insert_load_theme_styles_enable_button" value="Click to Deactivate" class="button" style="font-weight:bold;color:red;" onclick="wpInsertToggleAdWidget('#wp_insert_load_theme_styles_enable_button', '#wp_insert_load_theme_styles_enable')"/>
	<?php } else { ?>
		<input type="button" id="wp_insert_load_theme_styles_enable_button" value="Click to Activate" class="button" style="font-weight:bold;color:#2f9303;" onclick="wpInsertToggleAdWidget('#wp_insert_load_theme_styles_enable_button', '#wp_insert_load_theme_styles_enable')"/>
	<?php } ?>
	<input style="display:none;" id="wp_insert_load_theme_styles_enable" name="wp_insert_load_theme_styles_enable" type="checkbox" value="1"<?php if(get_option('wp_insert_load_theme_styles_enable')) echo ' checked="checked"'; ?> />
	<p>
		<small>
			Disables all default widgets except the Text Widget
		</small>
	</p>
</div>
<?php }
?>