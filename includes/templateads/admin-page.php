<?php
function wp_insert_templateads_admin_page() {
	wp_insert_admin_page('Template Tags', 'wp-insert-templateads', 'wp_insert_templateads_options');
}

function wp_insert_more_templateads_admin_page() {
	wp_insert_admin_page('Template Tags', 'wp-insert-more-templateads', 'wp_insert_more_templateads_options');
}

add_action('admin_init', 'wp_insert_templateads_admin_init');
function wp_insert_templateads_admin_init() {	
	register_setting('wp_insert_templateads_options', 'wp_insert_templateads_options', 'wp_insert_templateads_validate');
    add_settings_section('wp-insert-templateads', '', 'wp_insert_templateads_section', 'wp-insert-templateads');
	
	$options = get_option('wp_insert_templateads_options');
	add_meta_box('wp_insert_multiple_network_status', 'Multiple Ad Networks', 'wp_insert_multiple_network_status_content', 'wp-insert-templateads', 'advanced', 'high', array('location' => 'multiple-network', 'name' => 'wp_insert_templateads_options', 'data' => $options));
	for($i = 1; $i <= 10; $i++) {
		add_meta_box('wp-insert-templateads-'.$i, 'Template Ad '.$i, 'wp_insert_templateads_content', 'wp-insert-templateads', 'advanced', 'low', array('location' => 'templateads-'.$i, 'name' => 'wp_insert_templateads_options', 'data' => $options));
	}
	
	register_setting('wp_insert_more_templateads_options', 'wp_insert_more_templateads_options', 'wp_insert_templateads_validate');
    add_settings_section('wp-insert-more-templateads', '', 'wp_insert_more_templateads_section', 'wp-insert-more-templateads');
	
	$options = get_option('wp_insert_more_templateads_options');
	add_meta_box('wp_insert_multiple_network_status', 'Multiple Ad Networks', 'wp_insert_multiple_network_status_content', 'wp-insert-more-templateads', 'advanced', 'high', array('location' => 'multiple-network', 'name' => 'wp_insert_more_templateads_options', 'data' => $options));
	for($i = 11; $i <= 20; $i++) {
		add_meta_box('wp-insert-more-templateads-'.$i, 'Template Ad '.$i, 'wp_insert_templateads_content', 'wp-insert-more-templateads', 'advanced', 'low', array('location' => 'templateads-'.$i, 'name' => 'wp_insert_more_templateads_options', 'data' => $options));
	}
}

function wp_insert_templateads_section() {
	do_meta_boxes('wp-insert-templateads', 'advanced', null);
}

function wp_insert_more_templateads_section() {
	do_meta_boxes('wp-insert-more-templateads', 'advanced', null);
}

function wp_insert_templateads_content($post, $args) {
	$location = $args['args']['location'];
	$data = $args['args']['data'];
	$id = $args['id'];
	$name = $args['args']['name'].'['.$location.']';
	
	if(!$data) {
		$data = array();
	}
	
	$controls = array();
	$controls['status'] = wp_insert_get_control('tz-checkbox', false, $name.'[status]', $id.'-status', $data[$location]['status']);
	$controls['ad_code_1'] = wp_insert_get_control('textarea', false, $name.'[ad_code_1]', $id.'-ad_code_1', $data[$location]['ad_code_1'], 'Ad Code (Primary Network):');
	$controls['ad_code_2'] = wp_insert_get_control('textarea', false, $name.'[ad_code_2]', $id.'-ad_code_2', $data[$location]['ad_code_2'], 'Ad Code (Secondary Network):');
	$controls['ad_code_3'] = wp_insert_get_control('textarea', false, $name.'[ad_code_3]', $id.'-ad_code_3', $data[$location]['ad_code_3'], 'Ad Code (Tertiary Network):');

	$countries = wp_insert_get_countries();
	$controls['country_1'] = wp_insert_get_control('popup', false, $name.'[country_1]', $id.'-country_1', $data[$location]['country_1'], 'Geo Targets', '', array('type' => 'countries'));
	$controls['country_code_1'] = wp_insert_get_control('textarea', false, $name.'[country_code_1]', $id.'-country_code_1', $data[$location]['country_code_1'], 'Ad Code', '', null, 'input widefat');

	$controls['rules_exclude_home'] = wp_insert_get_control('ip-checkbox', false, $name.'[rules_exclude_home]', $id.'-rules_exclude_home', $data[$location]['rules_exclude_home'], '', '', null, '', false);
	$controls['rules_exclude_archives'] = wp_insert_get_control('ip-checkbox', false, $name.'[rules_exclude_archives]', $id.'-rules_exclude_archives', $data[$location]['rules_exclude_archives'], '', '', null, '', false);
	$controls['rules_exclude_categories'] = wp_insert_get_control('ip-checkbox', false, $name.'[rules_exclude_categories]', $id.'-rules_exclude_categories', $data[$location]['rules_exclude_categories'], '', '', null, '', false);
	$controls['rules_categories_exceptions'] = wp_insert_get_control('popup', false, $name.'[rules_categories_exceptions]', $id.'-rules_categories_exceptions', $data[$location]['rules_categories_exceptions'], '', '', array('type' => 'categories'), '', false);
	$controls['rules_exclude_search'] = wp_insert_get_control('ip-checkbox', false, $name.'[rules_exclude_search]', $id.'-rules_exclude_search', $data[$location]['rules_exclude_search'], '', '', null, '', false);
	$controls['rules_exclude_page'] = wp_insert_get_control('ip-checkbox', false, $name.'[rules_exclude_page]', $id.'-rules_exclude_page', $data[$location]['rules_exclude_page'], '', '', null, '', false);
	$controls['rules_page_exceptions'] = wp_insert_get_control('popup', false, $name.'[rules_page_exceptions]', $id.'-rules_page_exceptions', $data[$location]['rules_page_exceptions'], '', '', array('type' => 'pages'), '', false);
	$controls['rules_exclude_post'] = wp_insert_get_control('ip-checkbox', false, $name.'[rules_exclude_post]', $id.'-rules_exclude_post', $data[$location]['rules_exclude_post'], '', '', null, '', false);
	$controls['rules_post_exceptions'] = wp_insert_get_control('popup', false, $name.'[rules_post_exceptions]', $id.'-rules_post_exceptions', $data[$location]['rules_post_exceptions'], '', '', array('type' => 'posts'), '', false);
	
	$controls['styles'] = wp_insert_get_control('textarea', false, $name.'[styles]', $id.'-styles', $data[$location]['styles'], 'Styles:');
	
	echo $controls['status']['html'];
	
	$multiple_network_status = get_option('wp_insert_multiple_network_status');
	if($multiple_network_status == 2 || $multiple_network_status == 1) {
		$controls['ad_code_3']['html'] = '<div style="display: none;">'.$controls['ad_code_3']['html'].'</div>';
	}
	
	if($multiple_network_status == 1) {
		$controls['ad_code_2']['html'] = '<div style="display: none;">'.$controls['ad_code_2']['html'].'</div>';
	}	
	$tabData = array(
		array(
			'title' => 'Code Snippet',
			'content' => '<p class="codeSnippet"><label>Code to add to your theme files:</label><br /><code>&lt;?php if(function_exists("wp_template_ad")) { wp_template_ad("'.str_replace('templateads-', '', $location).'"); } ?&gt;</code></p>'
		),
		array(
			'title' => 'Ad Code',
			'content' => $controls['ad_code_1']['html'].$controls['ad_code_2']['html'].$controls['ad_code_3']['html']
		),
		array(
			'title' => 'Rules',
			'content' => wp_insert_templateads_rules_content($controls)
		),
		array(
			'title' => 'Geo Targeting',
			'content' => '<p>'.$controls['country_1']['html'].$controls['country_code_1']['html'].'</p>'
		),
		array(
			'title' => 'Styles',
			'content' => $controls['styles']['html']
		)
	);
	$controls['vtab'] = wp_insert_get_vtabs('vtab_'.$location, $tabData);
	echo $controls['vtab']['html'];
	
	echo wp_insert_get_script_tag($controls);
}

function wp_insert_templateads_rules_content($controls) {
	$rulesTable = array(
		'class' => 'rules',
		'rows' => array()
	);
	array_push(
		$rulesTable['rows'],
		array(
			'cells' => array(
				array('style' => 'text-align: left;', 'colspan' => '3', 'type' => 'th', 'content' => 'Home')
			)
		),
		array(
			'cells' => array(
				array('content' => 'Status'),
				array('content' => '&nbsp;:&nbsp;'),
				array('content' => $controls['rules_exclude_home']['html'])
			)
		)
	);
	array_push(
		$rulesTable['rows'], 
		array(
			'cells' => array(
				array('colspan' => '3', 'content' => '&nbsp;')
			)
		),
		array(
			'cells' => array(
				array('style' => 'text-align: left;', 'colspan' => '3', 'type' => 'th', 'content' => 'Archives')
			)
		),
		array(
			'cells' => array(
				array('content' => 'Status'),
				array('content' => '&nbsp;:&nbsp;'),
				array('content' => $controls['rules_exclude_archives']['html'])
			)
		)
	);
	array_push(
		$rulesTable['rows'], 
		array(
			'cells' => array(
				array('colspan' => '3', 'content' => '&nbsp;')
			)
		),
		array(
			'cells' => array(
				array('style' => 'text-align: left;', 'colspan' => '3', 'type' => 'th', 'content' => 'Categories')
			)
		),
		array(
			'cells' => array(
				array('content' => 'Status'),
				array('content' => '&nbsp;:&nbsp;'),
				array('content' => $controls['rules_exclude_categories']['html'])
			)
		),
		array(
			'cells' => array(
				array('content' => 'Exceptions'),
				array('content' => '&nbsp;:&nbsp;'),
				array('content' => $controls['rules_categories_exceptions']['html'])
			)
		)
	);
	array_push(
		$rulesTable['rows'], 
		array(
			'cells' => array(
				array('colspan' => '3', 'content' => '&nbsp;')
			)
		),
		array(
			'cells' => array(
				array('style' => 'text-align: left;', 'colspan' => '3', 'type' => 'th', 'content' => 'Search Results')
			)
		),
		array(
			'cells' => array(
				array('content' => 'Status'),
				array('content' => '&nbsp;:&nbsp;'),
				array('content' => $controls['rules_exclude_search']['html'])
			)
		)
	);
	array_push(
		$rulesTable['rows'], 
		array(
			'cells' => array(
				array('colspan' => '3', 'content' => '&nbsp;')
			)
		),
		array(
			'cells' => array(
				array('style' => 'text-align: left;', 'colspan' => '3', 'type' => 'th', 'content' => 'Single Page')
			)
		),
		array(
			'cells' => array(
				array('content' => 'Status'),
				array('content' => '&nbsp;:&nbsp;'),
				array('content' => $controls['rules_exclude_page']['html'])
			)
		),
		array(
			'cells' => array(
				array('content' => 'Exceptions'),
				array('content' => '&nbsp;:&nbsp;'),
				array('content' => $controls['rules_page_exceptions']['html'])
			)
		)
	);
	array_push(
		$rulesTable['rows'], 
		array(
			'cells' => array(
				array('colspan' => '3', 'content' => '&nbsp;')
			)
		),
		array(
			'cells' => array(
				array('style' => 'text-align: left;', 'colspan' => '3', 'type' => 'th', 'content' => 'Single Blog Post')
			)
		),
		array(
			'cells' => array(
				array('content' => 'Status'),
				array('content' => '&nbsp;:&nbsp;'),
				array('content' => $controls['rules_exclude_post']['html'])
			)
		),
		array(
			'cells' => array(
				array('content' => 'Exceptions'),
				array('content' => '&nbsp;:&nbsp;'),
				array('content' => $controls['rules_post_exceptions']['html'])
			)
		)
	);
	
	return wp_insert_get_table($rulesTable);
}

function wp_insert_templateads_validate($input) {
	update_option('wp_insert_multiple_network_status', $input['multiple-network']['status']);	
	return $input;
}
?>