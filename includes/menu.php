<?php
add_action('admin_menu', 'wp_insert_add_menu');

function wp_insert_add_menu() {
	$handle = 'wp-insert';
	add_menu_page(__('Wp-Insert','wp-insert'), __('Wp-Insert','wp-insert'), 'manage_options', $handle, 'wp_insert_add_adspage');
   add_action( 'admin_print_styles-' . $handle, 'wp_insert_admin_styles' );
   
	$subMenuItems = array(
					'AdsInContent' => array(
						'Title' => 'Manage Ads<br/>(Posts and Sidebars)',
						'Handle' => 'wp-insert',
						'Function' => 'wp_insert_add_adspage'
					),
					'AdsTemplate' => array(
						'Title' => 'Manage Ads<br/>(Template Tags)',
						'Handle' => 'ads-template-tags',
						'Function' => 'wp_insert_add_advanced_page'
					),
					'PrivacyPolicy' => array(
						'Title' => 'Manage Privacy Policy',
						'Handle' => 'manage-privacy-policy',
						'Function' => 'wp_insert_privacy_policy_page'
					),
					'TandC' => array(
						'Title' => 'Manage T & C',
						'Handle' => 'manage-terms-and-conditions',
						'Function' => 'wp_insert_terms_conditions_page'
					),
					'Pages' => array(
						'Title' => 'Manage Pages',
						'Handle' => 'manage-pages',
						'Function' => 'wp_insert_pages_page'
					),
					'SyntaxHighlighting' => array(
						'Title' => 'Syntax Highlighting',
						'Handle' => 'manage-syntax-highlighting',
						'Function' => 'wp_insert_syntax_highlighter_page'
					),
					'Feed' => array(
						'Title' => 'Manage Feed',
						'Handle' => 'manage-feed',
						'Function' => 'smart_add_feedspage'
					),
					'TrackingCodes' => array(
						'Title' => 'Tracking Codes',
						'Handle' => 'manage-tracking-codes',
						'Function' => 'smart_add_analytics'
					),
					'miscellaneous' => array(
						'Title' => 'Miscellaneous',
						'Handle' => 'miscellaneous_options',
						'Function' => 'wp_insert_miscellaneous_pages'
					),
				);
				
	foreach($subMenuItems as $subMenuItem) {
		add_submenu_page($handle, $subMenuItem['Title'], $subMenuItem['Title'], 'manage_options', $subMenuItem['Handle'], $subMenuItem['Function']);
	}
	
//ensure, that the needed javascripts been loaded to allow drag/drop, expand/collapse and hide/show of boxes
wp_enqueue_script('common');
wp_enqueue_script('wp-lists');
wp_enqueue_script('postbox');
//$columns[$screen] = 2;
}
?>