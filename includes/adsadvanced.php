<?php
require_once (dirname(__FILE__) . '/templateads.php');

function wp_insert_add_advanced_spage() {
	global $screen_layout_columns;

	add_meta_box('wp_insert_multiple_ad_network', 'Multiple Ad Networks', 'wp_insert_multiple_ad_network_HTML', 'col_1');
	add_meta_box('wp_insert_ad_template_1', 'Template Ad : 1', 'wp_insert_ad_template_1_HTML', 'col_1');
	add_meta_box('wp_insert_ad_template_2', 'Template Ad : 2', 'wp_insert_ad_template_2_HTML', 'col_1');
	add_meta_box('wp_insert_ad_template_3', 'Template Ad : 3', 'wp_insert_ad_template_3_HTML', 'col_1');
	add_meta_box('wp_insert_ad_template_4', 'Template Ad : 4', 'wp_insert_ad_template_4_HTML', 'col_1');
	add_meta_box('wp_insert_ad_template_5', 'Template Ad : 5', 'wp_insert_ad_template_5_HTML', 'col_1');
	add_meta_box('wp_insert_ad_template_6', 'Template Ad : 6', 'wp_insert_ad_template_6_HTML', 'col_1');
	add_meta_box('wp_insert_ad_template_7', 'Template Ad : 7', 'wp_insert_ad_template_7_HTML', 'col_1');
	add_meta_box('wp_insert_ad_template_8', 'Template Ad : 8', 'wp_insert_ad_template_8_HTML', 'col_1');
	add_meta_box('wp_insert_ad_template_9', 'Template Ad : 9', 'wp_insert_ad_template_9_HTML', 'col_1');
	add_meta_box('wp_insert_ad_template_10', 'Template Ad : 10', 'wp_insert_ad_template_10_HTML', 'col_1');
	add_meta_box('wp_insert_ad_template_11', 'Template Ad : 11', 'wp_insert_ad_template_11_HTML', 'col_1');
	add_meta_box('wp_insert_ad_template_12', 'Template Ad : 12', 'wp_insert_ad_template_12_HTML', 'col_1');
	add_meta_box('wp_insert_ad_template_13', 'Template Ad : 13', 'wp_insert_ad_template_13_HTML', 'col_1');
	add_meta_box('wp_insert_ad_template_14', 'Template Ad : 14', 'wp_insert_ad_template_14_HTML', 'col_1');
	add_meta_box('wp_insert_ad_template_15', 'Template Ad : 15', 'wp_insert_ad_template_15_HTML', 'col_1');
	add_meta_box('wp_insert_ad_template_16', 'Template Ad : 16', 'wp_insert_ad_template_16_HTML', 'col_1');
	add_meta_box('wp_insert_ad_template_17', 'Template Ad : 17', 'wp_insert_ad_template_17_HTML', 'col_1');
	add_meta_box('wp_insert_ad_template_18', 'Template Ad : 18', 'wp_insert_ad_template_18_HTML', 'col_1');
	add_meta_box('wp_insert_ad_template_19', 'Template Ad : 19', 'wp_insert_ad_template_19_HTML', 'col_1');
	add_meta_box('wp_insert_ad_template_20', 'Template Ad : 20', 'wp_insert_ad_template_20_HTML', 'col_1');

	$parameters = 'wp_insert_multiple_ad_network_type,'.wp_insert_ad_template_parameters('1').','.wp_insert_ad_template_parameters('2').','.wp_insert_ad_template_parameters('3').','.wp_insert_ad_template_parameters('4').','.wp_insert_ad_template_parameters('5').','.wp_insert_ad_template_parameters('6').','.wp_insert_ad_template_parameters('7').','.wp_insert_ad_template_parameters('8').','.wp_insert_ad_template_parameters('9').','.wp_insert_ad_template_parameters('10').','.wp_insert_ad_template_parameters('11').','.wp_insert_ad_template_parameters('12').','.wp_insert_ad_template_parameters('13').','.wp_insert_ad_template_parameters('14').','.wp_insert_ad_template_parameters('15').','.wp_insert_ad_template_parameters('16').','.wp_insert_ad_template_parameters('17').','.wp_insert_ad_template_parameters('18').','.wp_insert_ad_template_parameters('19').','.wp_insert_ad_template_parameters('20');
	wp_insert_settings_page_layout($parameters, 'WP-INSERT : Manage Ads (Template Tags)', 'ads');
}

function wp_insert_ad_template_parameters($template_adID) 	{ return wp_insert_ad_parameters($template_adID, 'template_ad'); }
function wp_insert_ad_template_1_HTML() 	{ wp_insert_ad_HTML('1', 'template_ad'); }
function wp_insert_ad_template_2_HTML() 	{ wp_insert_ad_HTML('2', 'template_ad'); }
function wp_insert_ad_template_3_HTML() 	{ wp_insert_ad_HTML('3', 'template_ad'); }
function wp_insert_ad_template_4_HTML() 	{ wp_insert_ad_HTML('4', 'template_ad'); }
function wp_insert_ad_template_5_HTML() 	{ wp_insert_ad_HTML('5', 'template_ad'); }
function wp_insert_ad_template_6_HTML() 	{ wp_insert_ad_HTML('6', 'template_ad'); }
function wp_insert_ad_template_7_HTML() 	{ wp_insert_ad_HTML('7', 'template_ad'); }
function wp_insert_ad_template_8_HTML() 	{ wp_insert_ad_HTML('8', 'template_ad'); }
function wp_insert_ad_template_9_HTML() 	{ wp_insert_ad_HTML('9', 'template_ad'); }
function wp_insert_ad_template_10_HTML() 	{ wp_insert_ad_HTML('10', 'template_ad'); }
function wp_insert_ad_template_11_HTML() 	{ wp_insert_ad_HTML('11', 'template_ad'); }
function wp_insert_ad_template_12_HTML() 	{ wp_insert_ad_HTML('12', 'template_ad'); }
function wp_insert_ad_template_13_HTML() 	{ wp_insert_ad_HTML('13', 'template_ad'); }
function wp_insert_ad_template_14_HTML() 	{ wp_insert_ad_HTML('14', 'template_ad'); }
function wp_insert_ad_template_15_HTML() 	{ wp_insert_ad_HTML('15', 'template_ad'); }
function wp_insert_ad_template_16_HTML() 	{ wp_insert_ad_HTML('16', 'template_ad'); }
function wp_insert_ad_template_17_HTML() 	{ wp_insert_ad_HTML('17', 'template_ad'); }
function wp_insert_ad_template_18_HTML() 	{ wp_insert_ad_HTML('18', 'template_ad'); }
function wp_insert_ad_template_19_HTML() 	{ wp_insert_ad_HTML('19', 'template_ad'); }
function wp_insert_ad_template_20_HTML() 	{ wp_insert_ad_HTML('20', 'template_ad'); }
?>