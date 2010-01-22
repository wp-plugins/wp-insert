<?php
function wp_template_ad($ad_ID) {
	$output = '';
	global $random;
	$page_details = wp_insert_get_current_page_details();

	if(get_option('wp_insert_template_ad_'.$ad_ID.'_enable')) {
		$ad_style = get_option('wp_insert_template_ad_'.$ad_ID.'_style');
		if($ad_style == '') { $ad_style = 'margin: 5px; padding: 0px;'; }
		if(!get_option('wp_insert_template_ad_'.$ad_ID.'_exclude_home') && ($page_details == 'HOME')) {
			switch($random) {
				case 0:
					$output .= '<div id="template_ad_'.$ad_ID.'" style="'.$ad_style.'">'.get_option('wp_insert_template_ad_'.$ad_ID.'_content').'</div>';
				break;
				case 1:
					$output .= '<div id="template_ad_'.$ad_ID.'" style="'.$ad_style.'">'.get_option('wp_insert_template_ad_'.$ad_ID.'_content_1').'</div>';
				break;
				case 2:
					$output .= '<div id="template_ad_'.$ad_ID.'" style="'.$ad_style.'">'.get_option('wp_insert_template_ad_'.$ad_ID.'_content_2').'</div>';
				break;
			}			
		}
		else if(!get_option('wp_insert_template_ad_'.$ad_ID.'_exclude_archives') && ($page_details == 'ARCHIVE')) {
			switch($random) {
				case 0:
					$output .= '<div id="template_ad_'.$ad_ID.'" style="'.$ad_style.'">'.get_option('wp_insert_template_ad_'.$ad_ID.'_content').'</div>';
				break;
				case 1:
					$output .= '<div id="template_ad_'.$ad_ID.'" style="'.$ad_style.'">'.get_option('wp_insert_template_ad_'.$ad_ID.'_content_1').'</div>';
				break;
				case 2:
					$output .= '<div id="template_ad_'.$ad_ID.'" style="'.$ad_style.'">'.get_option('wp_insert_template_ad_'.$ad_ID.'_content_2').'</div>';
				break;
			}			
		}
		else {
			if(is_singular()) {
				$page_ids = explode(',', str_replace(" ", "", get_option('wp_insert_template_ad_'.$ad_ID.'_exclude_ids')));
				if(wp_insert_is_in_array($page_details, $page_ids) =='FALSE') {
					switch($random) {
						case 0:
							$output .= '<div id="template_ad_'.$ad_ID.'" style="'.$ad_style.'">'.get_option('wp_insert_template_ad_'.$ad_ID.'_content').'</div>';
						break;
						case 1:
							$output .= '<div id="template_ad_'.$ad_ID.'" style="'.$ad_style.'">'.get_option('wp_insert_template_ad_'.$ad_ID.'_content_1').'</div>';
						break;
						case 2:
							$output .= '<div id="template_ad_'.$ad_ID.'" style="'.$ad_style.'">'.get_option('wp_insert_template_ad_'.$ad_ID.'_content_2').'</div>';
						break;
					}					
				}
			}
		}
	}
	
	echo $output;
}
?>