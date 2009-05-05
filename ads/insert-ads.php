<?php
// Hook for adding admin menus
add_action("plugins_loaded", "register_ad_widgets");

// Creating the dynamic widget for the widgets page
function register_ad_widgets() {
if(get_option('ad_widget_1_enable')) { register_sidebar_widget(__('Ad Widget : 1'), 'ad_widget_1_create'); }
if(get_option('ad_widget_2_enable')) { register_sidebar_widget(__('Ad Widget : 2'), 'ad_widget_2_create'); }
if(get_option('ad_widget_3_enable')) { register_sidebar_widget(__('Ad Widget : 3'), 'ad_widget_3_create'); }
if(get_option('ad_widget_4_enable')) { register_sidebar_widget(__('Ad Widget : 4'), 'ad_widget_4_create'); }
if(get_option('ad_widget_5_enable')) { register_sidebar_widget(__('Ad Widget : 5'), 'ad_widget_5_create'); }
}

function ad_widget_1_create($args) {
extract($args);
echo $before_widget;
echo get_option('ad_widget_1');
echo $after_widget;
}

function ad_widget_2_create($args) {
extract($args);
echo $before_widget;
echo get_option('ad_widget_2');
echo $after_widget;
}

function ad_widget_3_create($args) {
extract($args);
echo $before_widget;
echo get_option('ad_widget_3');
echo $after_widget;
}

function ad_widget_4_create($args) {
extract($args);
echo $before_widget;
echo get_option('ad_widget_4');
echo $after_widget;
}

function ad_widget_5_create($args) {
extract($args);
echo $before_widget;
echo get_option('ad_widget_5');
echo $after_widget;
}

// action function for adding the administrative page
function smart_add_adspage() { ?>
<div class="wrap">
<h2>WP-INSERT : Manage Ads</h2>
<?php show_support_options(); ?>
<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>

<table class="form-table">

<tr valign="top">
<th scope="row"><b>In post ads</b></th>
<td>Paste your ads below to make them appear automatically in your posts.</td>
</tr>

<tr valign="top">
<th scope="row">Ad code to insert<br/><b>( Above the post )</b><br/>
<br/><input id="ad_top_enable" name="ad_top_enable" type="checkbox" value="1"<?php if(get_option('ad_top_enable')) echo ' checked="checked"'; ?>/> Enabled</th>
<td><textarea id="ad_top" name="ad_top" style="width:350px;height:150px;"><?php echo get_option('ad_top'); ?></textarea><br/>
<small>( Paste your ad-sense or similar code in the box above )</small></td>
</tr>

<tr valign="top">
<th scope="row">Ad code to insert<br/><b>( Below the post )</b><br/>
<br/><input id="ad_bottom_enable" name="ad_bottom_enable" type="checkbox" value="1"<?php if(get_option('ad_bottom_enable')) echo ' checked="checked"'; ?>/> Enabled</th>
<td><textarea id="ad_bottom" name="ad_bottom" style="width:350px;height:150px;"><?php echo get_option('ad_bottom'); ?></textarea><br/>
<small>( Paste your ad-sense or similar code in the box above )</small></td>
</tr>

<tr valign="top">
<th scope="row">Ad code to insert<br/><b>( Left of the post )</b><br/>
<br/><input id="ad_left_enable" name="ad_left_enable" type="checkbox" value="1"<?php if(get_option('ad_left_enable')) echo ' checked="checked"'; ?>/> Enabled</th>
<td><textarea id="ad_left" name="ad_left" style="width:350px;height:150px;"><?php echo get_option('ad_left'); ?></textarea><br/>
<small>( Paste your ad-sense or similar code in the box above )</small></td>
</tr>

<tr valign="top">
<th scope="row">Ad code to insert<br/><b>( Right of the post )</b><br/>
<br/><input id="ad_right_enable" name="ad_right_enable" type="checkbox" value="1"<?php if(get_option('ad_right_enable')) echo ' checked="checked"'; ?>/> Enabled</th>
<td><textarea id="ad_right" name="ad_right" style="width:350px;height:150px;"><?php echo get_option('ad_right'); ?></textarea><br/>
<small>( Paste your ad-sense or similar code in the box above )</small></td>
</tr>

<tr valign="top">
<th scope="row"></th>
<td><input id="ad_enable_single" name="ad_enable_single" type="checkbox" value="1"<?php if(get_option('ad_enable_single')) echo ' checked="checked"'; ?>/> Show Ads only on single posts and pages<br/></td>
</tr>

<tr valign="top">
<th scope="row"><b>Ad Widgets</b></th>
<td>Paste your ads below and use the widgets section to insert the ads into your sidebar.</td>
</tr>

<tr valign="top">
<th scope="row">Ad code to insert<br/><b>( Ad widget : 1 )</b><br/>
<br/><input id="ad_widget_1_enable" name="ad_widget_1_enable" type="checkbox" value="1"<?php if(get_option('ad_widget_1_enable')) echo ' checked="checked"'; ?>/> Enabled</th>
<td><textarea id="ad_widget_1" name="ad_widget_1" style="width:350px;height:150px;"><?php echo get_option('ad_widget_1'); ?></textarea><br/>
<small>( Paste your ad-sense or similar code in the box above )</small></td>
</tr>

<tr valign="top">
<th scope="row">Ad code to insert<br/><b>( Ad widget : 2 )</b><br/>
<br/><input id="ad_widget_2_enable" name="ad_widget_2_enable" type="checkbox" value="1"<?php if(get_option('ad_widget_2_enable')) echo ' checked="checked"'; ?>/> Enabled</th>
<td><textarea id="ad_widget_2" name="ad_widget_2" style="width:350px;height:150px;"><?php echo get_option('ad_widget_2'); ?></textarea><br/>
<small>( Paste your ad-sense or similar code in the box above )</small></td>
</tr>

<tr valign="top">
<th scope="row">Ad code to insert<br/><b>( Ad widget : 3 )</b><br/>
<br/><input id="ad_widget_3_enable" name="ad_widget_3_enable" type="checkbox" value="1"<?php if(get_option('ad_widget_3_enable')) echo ' checked="checked"'; ?>/> Enabled</th>
<td><textarea id="ad_widget_3" name="ad_widget_3" style="width:350px;height:150px;"><?php echo get_option('ad_widget_3'); ?></textarea><br/>
<small>( Paste your ad-sense or similar code in the box above )</small></td>
</tr>

<tr valign="top">
<th scope="row">Ad code to insert<br/><b>( Ad widget : 4 )</b><br/>
<br/><input id="ad_widget_4_enable" name="ad_widget_4_enable" type="checkbox" value="1"<?php if(get_option('ad_widget_4_enable')) echo ' checked="checked"'; ?>/> Enabled</th>
<td><textarea id="ad_widget_4" name="ad_widget_4" style="width:350px;height:150px;"><?php echo get_option('ad_widget_4'); ?></textarea><br/>
<small>( Paste your ad-sense or similar code in the box above )</small></td>
</tr>

<tr valign="top">
<th scope="row">Ad code to insert<br/><b>( Ad widget : 5 )</b><br/>
<br/><input id="ad_widget_5_enable" name="ad_widget_5_enable" type="checkbox" value="1"<?php if(get_option('ad_widget_5_enable')) echo ' checked="checked"'; ?>/> Enabled</th>
<td><textarea id="ad_widget_5" name="ad_widget_5" style="width:350px;height:150px;"><?php echo get_option('ad_widget_5'); ?></textarea><br/>
<small>( Paste your ad-sense or similar code in the box above )</small></td>
</tr>

</table>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="ad_top,ad_top_enable,ad_bottom,ad_bottom_enable,ad_left,ad_left_enable,ad_right,ad_right_enable,ad_enable_single,ad_widget_5_enable,ad_widget_4_enable,ad_widget_3_enable,ad_widget_2_enable,ad_widget_1_enable,ad_widget_5,ad_widget_4,ad_widget_3,ad_widget_2,ad_widget_1" />
<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>
</form>
</div>
<?php }
//Actual insertion of ads into content takes place here.
add_filter('the_content', 'insert_into_content');

function insert_into_content($content) {
if(!is_singular() && get_option('ad_enable_single')) { return $content; } 
else {
	$output = '<table><tr>';
	if(get_option('ad_left_enable') && get_option('ad_right_enable')) {$cellspan=' colspan="3"';} else if(get_option('ad_left_enable') || get_option('ad_right_enable')) {$cellspan=' colspan="2"';} else {$cellspan='';}

	if(get_option('ad_top_enable')) {
		
		$output .= '<td'.$cellspan.' align="center">'.get_option('ad_top').'</td></tr><tr>';
	}
	if(get_option('ad_left_enable')) {
		$output .= '<td valign="top">'.get_option('ad_left').'</td>';
	}

	$output .= '<td>'.$content.'</td>';

	if(get_option('ad_right_enable')) {
		$output .= '<td valign="top">'.get_option('ad_right').'</td>';
		}
	if(get_option('ad_bottom_enable')) {
		$output .= '</tr><tr><td'.$cellspan.' align="center">'.get_option('ad_bottom').'</td>';
		}

	$output .= '</tr></table>';
	return $output;
}
}
?>