<?php
function wp_insert_ad_widget_create($widgetID, $args) {	
	extract($args);
	$page_details = wp_insert_get_current_page_details();
	if(!get_option('wp_insert_ad_widget_'.$widgetID.'_exclude_home') && ($page_details == 'HOME')) {
		$title = get_option('wp_insert_ad_widget_'.$widgetID.'_title');
		echo $before_widget;
		if($title != "") { echo $before_title.$title.$after_title; }
		echo get_option('wp_insert_ad_widget_'.$widgetID.'_content');
		echo $after_widget;
	}
	else if(!get_option('wp_insert_ad_widget_'.$widgetID.'_exclude_archives') && ($page_details == 'ARCHIVE')) {
		$title = get_option('wp_insert_ad_widget_'.$widgetID.'_title');
		echo $before_widget;
		if($title != "") { echo $before_title.$title.$after_title; }
		echo get_option('wp_insert_ad_widget_'.$widgetID.'_content');
		echo $after_widget;
	}
	else {
		if(is_singular()) {
			$page_ids = explode(',', str_replace(" ", "", get_option('wp_insert_ad_widget_'.$widgetID.'_exclude_ids')));
			if(wp_insert_is_in_array($page_details, $page_ids) =='FALSE') {
				$title = get_option('wp_insert_ad_widget_'.$widgetID.'_title');
				echo $before_widget;
				if($title != "") { echo $before_title.$title.$after_title; }
				echo get_option('wp_insert_ad_widget_'.$widgetID.'_content');
				echo $after_widget;
			}
		}
	}
}

function wp_insert_ad_widget_1_create($args) { wp_insert_ad_widget_create(1, $args); }
function wp_insert_ad_widget_2_create($args) { wp_insert_ad_widget_create(2, $args); }
function wp_insert_ad_widget_3_create($args) { wp_insert_ad_widget_create(3, $args); }
function wp_insert_ad_widget_4_create($args) { wp_insert_ad_widget_create(4, $args); }
function wp_insert_ad_widget_5_create($args) { wp_insert_ad_widget_create(5, $args); }
function wp_insert_ad_widget_6_create($args) { wp_insert_ad_widget_create(6, $args); }
function wp_insert_ad_widget_7_create($args) { wp_insert_ad_widget_create(7, $args); }
function wp_insert_ad_widget_8_create($args) { wp_insert_ad_widget_create(8, $args); }
function wp_insert_ad_widget_9_create($args) { wp_insert_ad_widget_create(9, $args); }
function wp_insert_ad_widget_10_create($args) { wp_insert_ad_widget_create(10, $args); }
?>