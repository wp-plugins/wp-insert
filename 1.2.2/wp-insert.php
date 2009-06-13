<?php
/*
Plugin Name: wp-insert
Plugin URI: http://www.smartlogix.co.in/
Description: The ultimate wordpress plugin
Version: 1.2.2
Author: Namith Jawahar
Author URI: http://www.smartlogix.co.in/
WP-INSERT by SMARTLOGIX : The ultimate wordpress plugin
*/
add_action('admin_menu', 'smart_add_menu');

// action function for above hook
function smart_add_menu() {
	add_menu_page('Wp-Insert', 'Wp-Insert', 8, __FILE__);
	add_submenu_page(__FILE__, 'wp-insert', 'Manage Ads', 8, __FILE__, 'smart_add_adspage');
	add_submenu_page(__FILE__, 'wp-insert', 'Manage Feeds', 8, 'Manage Feeds', 'smart_add_feedspage');
	add_submenu_page(__FILE__, 'wp-insert', 'Tracking Codes', 8, 'Tracking Codes', 'smart_add_analytics');
	add_submenu_page(__FILE__, 'wp-insert', 'WYSIWYG Editor', 8, 'WYSIWYG Editor', 'smart_add_wysiwyg_pages');
	add_submenu_page(__FILE__, 'wp-insert', 'Syntax Highlighting', 8, 'Syntax Highlighting', 'smart_add_syntaxhighlighting_pages');
	//add_submenu_page(__FILE__, 'wp-insert', 'Social Bookmarking', 8, 'Social Bookmarking', 'smart_add_socialpages');
	//add_submenu_page(__FILE__, 'wp-insert', 'SEO Optimization', 8, 'SEO', 'smart_add_SEOpages');
}
require_once (dirname(__FILE__) . '/support/support.php');
require_once (dirname(__FILE__) . '/ads/insert-ads.php');
require_once (dirname(__FILE__) . '/feeds/insert-feeds.php');
require_once (dirname(__FILE__) . '/tracking/insert-analytics.php');
require_once (dirname(__FILE__) . '/wysiwyg/insert-wysiwyg.php');
require_once (dirname(__FILE__) . '/highlighter/syntax.php');
?>