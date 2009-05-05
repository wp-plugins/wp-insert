<?php
/*
Plugin Name: wp-insert
Plugin URI: http://www.smartlogix.co.in/
Description: Manage Ads,Feeds,Tracking etc
Version: 1.0
Author: Namith Jawahar
Author URI: http://www.smartlogix.co.in/

Use wp-insert to insert every kind of code you will ever need to insert into your blog.
*/

add_action('admin_menu', 'smart_add_menu');

// action function for above hook
function smart_add_menu() {
	add_menu_page('Wp-Insert', 'Wp-Insert', 8, __FILE__);
	add_submenu_page(__FILE__, 'wp-insert', 'Manage Ads', 8, __FILE__, 'smart_add_adspage'); 
	add_submenu_page(__FILE__, 'wp-insert', 'Manage Feeds', 8, 'Manage Feeds', 'smart_add_feedspage');
	add_submenu_page(__FILE__, 'wp-insert', 'Tracking Codes', 8, 'Tracking Codes', 'smart_add_analytics');
	//add_submenu_page(__FILE__, 'wp-insert', 'SEO Optimization', 8, 'SEO', 'smart_add_SEOpages');
	//add_submenu_page(__FILE__, 'wp-insert', 'Social Bookmarking', 8, 'Social Bookmarking', 'smart_add_socialpages');
}

require_once (dirname(__FILE__) . '/support/support.php');
require_once (dirname(__FILE__) . '/ads/insert-ads.php');
require_once (dirname(__FILE__) . '/feeds/insert-feeds.php');
require_once (dirname(__FILE__) . '/tracking/insert-analytics.php');
?>