<?php
require_once (dirname(__FILE__) . '/adsense.php');

function wp_insert_adsense_page() {
	global $screen_layout_columns;

	add_meta_box('wp_insert_adsense_login_credentials', 'Adsense Username and Password', 'wp_insert_adsense_login_credentials_HTML', 'col_1');
	add_meta_box('wp_insert_adsense_sincelastpayment', 'Adsense : Total Since Last Payment', 'wp_insert_adsense_sincelastpayment_HTML', 'col_1');
	/*add_meta_box('wp_insert_adsense_today', 'Adsense : Today', 'wp_insert_adsense_today_HTML', 'col_1');
	add_meta_box('wp_insert_adsense_yesterday', 'Adsense : Yesterday', 'wp_insert_adsense_yesterday_HTML', 'col_1');
	add_meta_box('wp_insert_adsense_last7days', 'Adsense : Last 7 Days', 'wwp_insert_adsense_last7days', 'col_1');
	add_meta_box('wp_insert_adsense_lastmonth', 'Adsense : Last Month', 'wp_insert_adsense_lastmonth_HTML', 'col_1');
	add_meta_box('wp_insert_adsense_thismonth', 'Adsense : This Month', 'wp_insert_adsense_thismonth_HTML', 'col_1');*/

	$parameters = 'wp_insert_adsense_username, wp_insert_adsense_password';
	wp_insert_settings_page_layout($parameters, 'WP-INSERT : Monitor Adsense', 'adsense');
}

function wp_insert_adsense_login_credentials_HTML() { ?>
<div>
<p>
<label for="wp_insert_adsense_username">Adsense Username :</label>
<input id="wp_insert_adsense_username" class="widefat" type="text" value="<?php echo get_option('wp_insert_adsense_username'); ?>" name="wp_insert_adsense_username"/>
</p>
<p>
<label for="wp_insert_adsense_password">Adsense Password:</label>
<input id="wp_insert_adsense_password" class="widefat" type="password" value="<?php echo get_option('wp_insert_adsense_password'); ?>" name="wp_insert_adsense_password"/>
</p>
<p>
<small>Data Retrieval Based on <a href="http://www.webtoolkit.info/php-adsense-account-monitor.html">PHP AdSense account monitor class</a></small>
</p>
</div>
<?php }

function wp_insert_adsense_sincelastpayment_HTML() { ?>
<div>

</div>
<?php }
?>