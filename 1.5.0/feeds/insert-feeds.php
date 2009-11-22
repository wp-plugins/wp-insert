<?php 
add_action('template_redirect', 'register_feed_redirect');
add_action("plugins_loaded", "register_feed_head_manipulation");
add_filter('the_content', 'register_feed_ad_manipulation');
add_action("plugins_loaded", "register_email_feed_widget");

// Creating the dynamic widget for the widgets page
function register_email_feed_widget() {
if(get_option('smart_feed_email_enabled')) { register_sidebar_widget(__('Feedburner : Subscribe via Email'), 'feed_email_subscribe_widget_create'); }
if(get_option('smart_feed_subscribe_widget_enabled')) { register_sidebar_widget(__('Subscribe to Feed'), 'feed_subscribe_widget_create'); }
}

function feed_subscribe_widget_create($args) {
extract($args);
echo $before_widget;
if(get_option('smart_feed_subscribe_widget_header') != "") {
echo $before_title.get_option('smart_feed_subscribe_widget_header').$after_title;
}
if(get_option('smart_feed_feedburner_enabled')) {
echo '<ul><li><a href="'.get_option('smart_feed_feedburner').'"><img src="'.get_bloginfo('url').'/wp-content/plugins/wp-insert/images/feed-icon-24x24.gif" /> Subscribe</a></li></ul>';
} else {
echo '<ul><li><a href="'.get_bloginfo('rss2_url').'"><img src="'.get_bloginfo('url').'/wp-content/plugins/wp-insert/images/feed-icon-24x24.gif" /> Subscribe</a></li></ul>';
}
echo $after_widget;
}

function feed_email_subscribe_widget_create($args) {
extract($args);
echo $before_widget;
echo get_option('smart_feed_email');
echo $after_widget;
}

function register_feed_redirect() {
	if(get_option('smart_feed_feedburner_enabled')) {
		if (!is_feed()) { return; }
		else if (preg_match('/feedburner/', $_SERVER['HTTP_USER_AGENT'])) { return; }
		else {
			header("Location: ".get_option('smart_feed_feedburner'));
		}
	}
	else { return; }
}

function register_feed_ad_manipulation($content) {
	if(is_feed()) {
		$prefix = '';
		$suffix = '';
		if(get_option('smart_feed_ad_top_enabled')) {
			$prefix = get_option('smart_feed_ad_top');
		}
		if(get_option('smart_feed_ad_bottom_enabled')) {
			$suffix = "<p>".get_option('smart_feed_ad_bottom')."</p>";
		}
		return $prefix.$content.$suffix;
	}
	else { return $content; }
}

function register_feed_head_manipulation() {
	if(get_option('smart_feed_head_enable')) {
		add_action('rss_head', 'smart_add_feedimage_rss');
		add_action('rss2_head', 'smart_add_feedimage_rss');
	}
}

function smart_add_feedimage_rss() {
echo "<image>
<title>".get_bloginfo('name')."</title>
<url>".get_option('smart_feed_head')."</url>
<link>".get_bloginfo('url')."</link>
<width>".get_option('smart_feed_head_width')."</width>
<height>".get_option('smart_feed_head_height')."</height>
<description>get_bloginfo('description')</description>
</image>";
}
// action function for adding the administrative page
function smart_add_feedspage() { ?>
<div class="wrap">
<h2>WP-INSERT : Manage Feeds</h2>
<?php show_support_options(); ?>
<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>

<table class="form-table">

<tr valign="top">
<th scope="row"><b>Logo for your feed</b></th>
<td><input id="smart_feed_head_enable" name="smart_feed_head_enable" type="checkbox" value="1" <?php if(get_option('smart_feed_head_enable')) echo 'checked="checked"'; ?> /> Enabled</td>
</tr>

<tr valign="top">
<th scope="row">Logo URL</th>
<td><input id="smart_feed_head" name="smart_feed_head" type="text" value="<?php echo get_option('smart_feed_head'); ?>" style="width:350px;" /><br/>
<small>( Paste the URL of your logo image in the box above )</small></td>
</tr>

<tr valign="top">
<th scope="row">Logo Width</th>
<td><input id="smart_feed_head_width" name="smart_feed_head_width" type="text" value="<?php echo get_option('smart_feed_head_width'); ?>" style="width:350px;" /><br/>
<small>( The width of your logo image )</small></td>
</tr>

<tr valign="top">
<th scope="row">Logo Height</th>
<td><input id="smart_feed_head_height" name="smart_feed_head_height" type="text" value="<?php echo get_option('smart_feed_head_height'); ?>" style="width:350px;" /><br/>
<small>( The height of your logo image )</small></td>
</tr>

<tr valign="top">
<th scope="row"><b>Insert ads into your feed</b></th>
<td>The ads might not show up for already written posts!</td>
</tr>

<tr valign="top">
<th scope="row">Ad code to insert<br/>( Above feed content )<br/>
<br/><input id="smart_feed_ad_top_enabled" name="smart_feed_ad_top_enabled" type="checkbox" value="1"<?php if(get_option('smart_feed_ad_top_enabled')) echo ' checked="checked"'; ?>/> Enabled</th>
<td><textarea id="smart_feed_ad_top" name="smart_feed_ad_top" style="width:350px;height:150px;"><?php echo get_option('smart_feed_ad_top'); ?></textarea><br/>
<small>( Paste your ad-sense or similar code in the box above )</small></td>
</tr>

<tr valign="top">
<th scope="row">Ad code to insert<br/>( Below feed content )<br/>
<br/><input id="smart_feed_ad_bottom_enabled" name="smart_feed_ad_bottom_enabled" type="checkbox" value="1"<?php if(get_option('smart_feed_ad_bottom_enabled')) echo ' checked="checked"'; ?>/> Enabled</th>
<td><textarea id="smart_feed_ad_bottom" name="smart_feed_ad_bottom" style="width:350px;height:150px;"><?php echo get_option('smart_feed_ad_bottom'); ?></textarea><br/>
<small>( Paste your ad-sense or similar code in the box above )</small></td>
</tr>

<tr valign="top">
<th scope="row"><b>Feedburner</b></th>
<td></td>
</tr>

<tr valign="top">
<th scope="row">Feedburner Feed URL<br/>
<br/><input id="smart_feed_feedburner_enabled" name="smart_feed_feedburner_enabled" type="checkbox" value="1"<?php if(get_option('smart_feed_feedburner_enabled')) echo ' checked="checked"'; ?>/> Enabled</th>
<td><input type="text" id="smart_feed_feedburner" name="smart_feed_feedburner" style="width:350px;" value="<?php echo get_option('smart_feed_feedburner'); ?>" /><br/>
<small>( Paste your Feedburner feed URL in the box above )</small></td>
</tr>

<tr valign="top">
<th scope="row">Subscribe via E-mail Widget<br/>
<br/><input id="smart_feed_email_enabled" name="smart_feed_email_enabled" type="checkbox" value="1"<?php if(get_option('smart_feed_email_enabled')) echo ' checked="checked"'; ?>/> Enabled</th>
<td><textarea id="smart_feed_email" name="smart_feed_email" style="width:350px;height:150px;"><?php echo get_option('smart_feed_email'); ?></textarea><br/>
<small>( Paste your Feedburner Subscribe via email code in the box above )</small></td>
</tr>

<tr valign="top">
<th scope="row"><b>Subscribe Widget</b></th>
<td></td>
</tr>

<tr valign="top">
<th scope="row">Subscribe Widget Header<br/>( Optional ) <input id="smart_feed_subscribe_widget_enabled" name="smart_feed_subscribe_widget_enabled" type="checkbox" value="1"<?php if(get_option('smart_feed_subscribe_widget_enabled')) echo ' checked="checked"'; ?>/> Enabled</th>
<td><input type="text" id="smart_feed_subscribe_widget_header" name="smart_feed_subscribe_widget_header" style="width:350px;" value="<?php echo get_option('smart_feed_subscribe_widget_header'); ?>" /><br/>
<small>( Paste the header text for subscribe in the box above )</small></td>
</tr>

</table>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="smart_feed_head_enable,smart_feed_head,smart_feed_head_width,smart_feed_head_height,smart_feed_ad_top_enabled,smart_feed_ad_top,smart_feed_ad_bottom_enabled,smart_feed_ad_bottom,smart_feed_feedburner_enabled,smart_feed_feedburner,smart_feed_email,smart_feed_email_enabled,smart_feed_subscribe_widget_enabled,smart_feed_subscribe_widget_header" />
<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>
</form>
<p>
<script type="text/javascript" src="http://www.wp-insert.smartlogix.co.in/wp-content/plugins/wp-adnetwork/wp-adnetwork.php?showad=1"></script>
</p>
</div>
<?php } ?>