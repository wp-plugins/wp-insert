<?php
function wp_insert_admin_styles() {	
	wp_enqueue_style('wp-insert-styles', WP_INSERT_URL.'/includes/common/css/style.css?version=2.0.5', false);
	wp_enqueue_style('thickbox');
	wp_enqueue_script('common');
	wp_enqueue_script('jquery-ui-tabs');
	wp_enqueue_script('wp-lists');
	wp_enqueue_script('postbox');
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('colorbox', WP_INSERT_URL.'/includes/common/js/jquery.colorbox-min.js', array('jquery'));
	wp_enqueue_script('better-checkboxes', WP_INSERT_URL.'/includes/common/js/jquery.tzCheckbox.js', array('jquery'));
	wp_enqueue_script('iphone-checkboxes', WP_INSERT_URL.'/includes/common/js/iphone-style-checkboxes.js', array('jquery'));
	wp_enqueue_script('jquery-vertical-tabs', WP_INSERT_URL.'/includes/common/js/jquery-jvert-tabs-1.1.4.js', array('jquery'));
	wp_enqueue_script('nicEdit', WP_INSERT_URL.'/includes/common/js/nicEdit-latest.js', array('jquery'));
	wp_enqueue_script('image-uploader', WP_INSERT_URL.'/includes/common/js/wp-insert-functions.js', array('jquery'));	
}
?>