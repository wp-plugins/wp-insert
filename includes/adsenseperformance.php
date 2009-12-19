<?php
require_once (dirname(__FILE__) . '/adsense.php');

$adsense = new AdSense();
$adsenseStatus = false;

function wp_insert_adsense_page() {
	global $screen_layout_columns;

	add_meta_box('wp_insert_adsense_login_credentials', 'Adsense Username and Password', 'wp_insert_adsense_login_credentials_HTML', 'col_1');
	
	global $adsense;
	global $adsenseStatus;
	if(get_option('wp_insert_adsense_username') != '') {
		if ($adsense->connect(get_option('wp_insert_adsense_username'), get_option('wp_insert_adsense_password'))) {
			$adsenseStatus = true;
			add_meta_box('wp_insert_adsense_sincelastpayment', 'Adsense : Total Since Last Payment', 'wp_insert_adsense_sincelastpayment_HTML', 'col_1');
			add_meta_box('wp_insert_adsense_today', 'Adsense : Today', 'wp_insert_adsense_today_HTML', 'col_1');
			add_meta_box('wp_insert_adsense_yesterday', 'Adsense : Yesterday', 'wp_insert_adsense_yesterday_HTML', 'col_1');
			add_meta_box('wp_insert_adsense_last7days', 'Adsense : Last 7 Days', 'wp_insert_adsense_last7days', 'col_1');
			add_meta_box('wp_insert_adsense_thismonth', 'Adsense : This Month', 'wp_insert_adsense_thismonth_HTML', 'col_1');
			add_meta_box('wp_insert_adsense_lastmonth', 'Adsense : Last Month', 'wp_insert_adsense_lastmonth_HTML', 'col_1');
		} else { 
			$adsenseStatus = false;
		}
	}

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
<?php global $adsenseStatus; if($adsenseStatus == true) { echo "<span style='color:green'>Adsense - Remote Login : Successful</span>"; } else { echo "<span style='color:red'>Adsense - Remote Login : Failed</span>"; } ?>
</p>
<p>
<small>Data Retrieval Based on <a href="http://www.webtoolkit.info/php-adsense-account-monitor.html">PHP AdSense account monitor class</a></small><br/>
</p>
</div>
<?php }

function wp_insert_get_adsense_result_HTML($data) { ?>
	<p>
	<span class="earnings"><?php echo $data['earnings']; ?></span>
	<span class="bigbold">Impressions : <?php echo $data['impressions']; ?></span><br/>
	<span class="bigbold">Clicks : <?php echo $data['clicks']; ?></span><br/>
	<span class="bigbold">CTR : <?php echo $data['ctr']; ?></span><br/>
	<span class="bigbold">eCPM : <?php echo $data['ecpm']; ?></span>
	</p>
	<div class="clear"></div>
<?php }

function wp_insert_adsense_sincelastpayment_HTML() { ?>
	<div>
	<?php global $adsense; wp_insert_get_adsense_result_HTML($adsense->sincelastpayment()); ?>
	</div>
<?php }

function wp_insert_adsense_today_HTML() { ?>
	<div>
	<?php global $adsense; wp_insert_get_adsense_result_HTML($adsense->today()); ?>
	</div>
<?php }

function wp_insert_adsense_yesterday_HTML() { ?>
	<div>
	<?php global $adsense; wp_insert_get_adsense_result_HTML($adsense->yesterday()); ?>
	</div>
<?php }

function wp_insert_adsense_last7days() { ?>
	<div>
	<?php global $adsense; wp_insert_get_adsense_result_HTML($adsense->last7days()); ?>
	</div>
<?php }

function wp_insert_adsense_thismonth_HTML() { ?>
	<div>
	<?php global $adsense; wp_insert_get_adsense_result_HTML($adsense->thismonth()); ?>
	</div>
<?php }

function wp_insert_adsense_lastmonth_HTML() { ?>
	<div>
	<?php global $adsense; wp_insert_get_adsense_result_HTML($adsense->lastmonth()); ?>
	</div>
<?php $adsense->log_out(); 
}
?>