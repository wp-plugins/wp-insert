<?php
function wp_insert_multiple_network_status_content($post, $args) {
	$location = $args['args']['location'];
	$data = get_option('wp_insert_multiple_network_status');
	$id = $args['id'];
	$name = $args['args']['name'].'['.$location.']';
	$networkOptions = array(
		array('value' => '1', 'text' => 'Primary Ad Network'),
		array('value' => '2', 'text' => 'Primary and Secondary Ad Networks'),
		array('value' => '3', 'text' => 'All Ad Networks'),
	);
	$info = "Multiple Ad Networks can be setup to display ads from different networks without infringing the terms of any network.  At a time only ads from one network (Randomly Choosen) will be shown.  This feature can also be used to randomly display different sized Ads from the same network.  Please note that this option is global and applied to Template Ads, In Post Ads as well as Ad Widgets.";
	echo wp_insert_get_control('select', true, $name.'[status]', $id.'-status', $data, 'Select the Ad Network Setup that best suits you :', $info, $networkOptions);
}
?>