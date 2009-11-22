<?php
add_filter('the_content', 'wp_insert_filter_content');

function wp_insert_filter_content($content) {
	return wp_insert_filter_content_ads($content, '1');
}
?>