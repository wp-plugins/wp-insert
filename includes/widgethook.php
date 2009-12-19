<?php
add_action("plugins_loaded", "wp_insert_register_widgets");

// Creating the dynamic widgets for the widgets page
function wp_insert_register_widgets() {
//Ad Widgets
if(get_option('wp_insert_ad_widget_1_enable')) { register_sidebar_widget(__('WP-INSERT : Ad Widget - 1'), 'wp_insert_ad_widget_1_create'); }
if(get_option('wp_insert_ad_widget_2_enable')) { register_sidebar_widget(__('WP-INSERT : Ad Widget - 2'), 'wp_insert_ad_widget_2_create'); }
if(get_option('wp_insert_ad_widget_3_enable')) { register_sidebar_widget(__('WP-INSERT : Ad Widget - 3'), 'wp_insert_ad_widget_3_create'); }
if(get_option('wp_insert_ad_widget_4_enable')) { register_sidebar_widget(__('WP-INSERT : Ad Widget - 4'), 'wp_insert_ad_widget_4_create'); }
if(get_option('wp_insert_ad_widget_5_enable')) { register_sidebar_widget(__('WP-INSERT : Ad Widget - 5'), 'wp_insert_ad_widget_5_create'); }
if(get_option('wp_insert_ad_widget_6_enable')) { register_sidebar_widget(__('WP-INSERT : Ad Widget - 6'), 'wp_insert_ad_widget_6_create'); }
if(get_option('wp_insert_ad_widget_7_enable')) { register_sidebar_widget(__('WP-INSERT : Ad Widget - 7'), 'wp_insert_ad_widget_7_create'); }
if(get_option('wp_insert_ad_widget_8_enable')) { register_sidebar_widget(__('WP-INSERT : Ad Widget - 8'), 'wp_insert_ad_widget_8_create'); }
if(get_option('wp_insert_ad_widget_9_enable')) { register_sidebar_widget(__('WP-INSERT : Ad Widget - 9'), 'wp_insert_ad_widget_9_create'); }
if(get_option('wp_insert_ad_widget_10_enable')) { register_sidebar_widget(__('WP-INSERT : Ad Widget - 10'), 'wp_insert_ad_widget_10_create'); }
}
?>