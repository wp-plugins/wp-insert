<?php
function wp_insert_filter_content_ads($content, $ad_ID) {
	$output = '';
	$page_details = wp_insert_get_current_page_details();
	
	if(get_option('wp_insert_in_post_ad_middle_'.$ad_ID.'_enable')) {
		/*Finding a appropriate position near the middle of the content to insert the ad*/
		$positions = array();
		$endpos = -1;
		$trigger = "<p";
		if(strpos($content, "<p") === false)
		$trigger = "<br";

		while(strpos($content, $trigger, $endpos+1) !== false){
		$endpos = strpos($content, $trigger, $endpos+1);
		$positions[] = $endpos;
		}
		$middle = sizeof($positions);
		while(sizeof($positions) > $middle)
		array_pop($positions);
		$triggerpoint = $positions[floor(sizeof($positions)/2)];
		/*End of Finding a appropriate position near the middle of the content to insert the ad*/

		if ($middle > 2) {
			if(!get_option('wp_insert_in_post_ad_middle_'.$ad_ID.'_exclude_home') && ($page_details == 'HOME')) {
				 $content = substr_replace($content, '<div id="in_post_ad_middle_'.$ad_ID.'" style="margin:5px;">'.get_option('wp_insert_in_post_ad_middle_'.$ad_ID.'_content').'</div>'.$trigger, $triggerpoint, 2);
			}
			else if(!get_option('wp_insert_in_post_ad_middle_'.$ad_ID.'_exclude_archives') && ($page_details == 'ARCHIVE')) {
				$content = substr_replace($content, '<div id="in_post_ad_middle_'.$ad_ID.'" style="margin:5px;">'.get_option('wp_insert_in_post_ad_middle_'.$ad_ID.'_content').'</div>'.$trigger, $triggerpoint, 2);
			}
			else {
				if(is_singular()) {
					$page_ids = explode(',', str_replace(" ", "", get_option('wp_insert_in_post_ad_middle_'.$ad_ID.'_exclude_ids')));
					if(wp_insert_is_in_array($page_details, $page_ids) =='FALSE') {
						$content = substr_replace($content, '<div id="in_post_ad_middle_'.$ad_ID.'" style="margin:5px;">'.get_option('wp_insert_in_post_ad_middle_'.$ad_ID.'_content').'</div>'.$trigger, $triggerpoint, 2);
					}
				}
			}
		}
	}
	if(get_option('wp_insert_in_post_ad_top_'.$ad_ID.'_enable')) {
		if(!get_option('wp_insert_in_post_ad_top_'.$ad_ID.'_exclude_home') && ($page_details == 'HOME')) {
			$output .= '<div id="in_post_ad_top_'.$ad_ID.'" style="margin:5px;">'.get_option('wp_insert_in_post_ad_top_'.$ad_ID.'_content').'</div>';
		}
		else if(!get_option('wp_insert_in_post_ad_top_'.$ad_ID.'_exclude_archives') && ($page_details == 'ARCHIVE')) {
			$output .= '<div id="in_post_ad_top_'.$ad_ID.'" style="margin:5px;">'.get_option('wp_insert_in_post_ad_top_'.$ad_ID.'_content').'</div>';
		}
		else {
			if(is_singular()) {
				$page_ids = explode(',', str_replace(" ", "", get_option('wp_insert_in_post_ad_top_'.$ad_ID.'_exclude_ids')));
				if(wp_insert_is_in_array($page_details, $page_ids) =='FALSE') {
					$output .= '<div id="in_post_ad_top_'.$ad_ID.'" style="margin:5px;">'.get_option('wp_insert_in_post_ad_top_'.$ad_ID.'_content').'</div>';
				}
			}
		}
	}
	if(get_option('wp_insert_in_post_ad_left_'.$ad_ID.'_enable')) {
		if(!get_option('wp_insert_in_post_ad_left_'.$ad_ID.'_exclude_home') && ($page_details == 'HOME')) {
			$output .= '<div id="in_post_ad_left_'.$ad_ID.'" style="margin:5px;float:left;">'.get_option('wp_insert_in_post_ad_left_'.$ad_ID.'_content').'</div>';
		}
		else if(!get_option('wp_insert_in_post_ad_left_'.$ad_ID.'_exclude_archives') && ($page_details == 'ARCHIVE')) {
			$output .= '<div id="in_post_ad_left_'.$ad_ID.'" style="margin:5px;float:left;">'.get_option('wp_insert_in_post_ad_left_'.$ad_ID.'_content').'</div>';
		}
		else {
			if(is_singular()) {
				$page_ids = explode(',', str_replace(" ", "", get_option('wp_insert_in_post_ad_left_'.$ad_ID.'_exclude_ids')));
				if(wp_insert_is_in_array($page_details, $page_ids) =='FALSE') {
					$output .= '<div id="in_post_ad_left_'.$ad_ID.'" style="margin:5px;float:left;">'.get_option('wp_insert_in_post_ad_left_'.$ad_ID.'_content').'</div>';
				}
			}
		}
	}
	if(get_option('wp_insert_in_post_ad_right_'.$ad_ID.'_enable')) {
		if(!get_option('wp_insert_in_post_ad_right_'.$ad_ID.'_exclude_home') && ($page_details == 'HOME')) {
			$output .= '<div id="in_post_ad_right_'.$ad_ID.'" style="margin:5px;float:right;">'.get_option('wp_insert_in_post_ad_right_'.$ad_ID.'_content').'</div>';
		}
		else if(!get_option('wp_insert_in_post_ad_right_'.$ad_ID.'_exclude_archives') && ($page_details == 'ARCHIVE')) {
			$output .= '<div id="in_post_ad_right_'.$ad_ID.'" style="margin:5px;float:right;">'.get_option('wp_insert_in_post_ad_right_'.$ad_ID.'_content').'</div>';
		}
		else {
			if(is_singular()) {
				$page_ids = explode(',', str_replace(" ", "", get_option('wp_insert_in_post_ad_right_'.$ad_ID.'_exclude_ids')));
				if(wp_insert_is_in_array($page_details, $page_ids) =='FALSE') {
					$output .= '<div id="in_post_ad_right_'.$ad_ID.'" style="margin:5px;float:right;">'.get_option('wp_insert_in_post_ad_right_'.$ad_ID.'_content').'</div>';
				}
			}
		}
	}
	if(get_option('wp_insert_in_post_ad_bottom_'.$ad_ID.'_enable')) {
		if(!get_option('wp_insert_in_post_ad_bottom_'.$ad_ID.'_exclude_home') && ($page_details == 'HOME')) {
			$content .= '<div id="in_post_ad_bottom_'.$ad_ID.'" style="margin:5px;clear:both;">'.get_option('wp_insert_in_post_ad_bottom_'.$ad_ID.'_content').'</div>';
		}
		else if(!get_option('wp_insert_in_post_ad_bottom_'.$ad_ID.'_exclude_archives') && ($page_details == 'ARCHIVE')) {
			$content .= '<div id="in_post_ad_bottom_'.$ad_ID.'" style="margin:5px;clear:both;">'.get_option('wp_insert_in_post_ad_bottom_'.$ad_ID.'_content').'</div>';
		}
		else {
			if(is_singular()) {
				$page_ids = explode(',', str_replace(" ", "", get_option('wp_insert_in_post_ad_bottom_'.$ad_ID.'_exclude_ids')));
				if(wp_insert_is_in_array($page_details, $page_ids) =='FALSE') {
					$content .= '<div id="in_post_ad_bottom_'.$ad_ID.'" style="margin:5px;clear:both;">'.get_option('wp_insert_in_post_ad_bottom_'.$ad_ID.'_content').'</div>';
				}
			}
		}
	}
	$content = $output.$content."<div style='clear:both'></div>";
	return $content;
}
?>