<?php
$random = 0;
switch(get_option('wp_insert_multiple_ad_network_type')) {
	case "All Ad Networks":
		$random = rand(0,2);
	break;
	case "Primary and Alternate Ad Network 1":
		$random = rand(0,1);
	break;
}
function wp_insert_filter_content_ads($content, $ad_ID) {
	$output = '';
	global $random;
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
			$ad_style = get_option('wp_insert_in_post_ad_middle_'.$ad_ID.'_style');
			if($ad_style == '') { $ad_style = 'margin: 5px; padding: 0px;'; }
			if(!get_option('wp_insert_in_post_ad_middle_'.$ad_ID.'_exclude_home') && ($page_details == 'HOME')) {
				switch($random) {
					case 0:
						$content = substr_replace($content, '<div id="in_post_ad_middle_'.$ad_ID.'" style="'.$ad_style.'">'.get_option('wp_insert_in_post_ad_middle_'.$ad_ID.'_content').'</div>'.$trigger, $triggerpoint, 2);
					break;
					case 1:
						$content = substr_replace($content, '<div id="in_post_ad_middle_'.$ad_ID.'" style="'.$ad_style.'">'.get_option('wp_insert_in_post_ad_middle_'.$ad_ID.'_content_1').'</div>'.$trigger, $triggerpoint, 2);
					break;
					case 2:
						$content = substr_replace($content, '<div id="in_post_ad_middle_'.$ad_ID.'" style="'.$ad_style.'">'.get_option('wp_insert_in_post_ad_middle_'.$ad_ID.'_content_2').'</div>'.$trigger, $triggerpoint, 2);
					break;
				}
			}
			else if(!get_option('wp_insert_in_post_ad_middle_'.$ad_ID.'_exclude_archives') && ($page_details == 'ARCHIVE')) {
				switch($random) {
					case 0:
						$content = substr_replace($content, '<div id="in_post_ad_middle_'.$ad_ID.'" style="'.$ad_style.'">'.get_option('wp_insert_in_post_ad_middle_'.$ad_ID.'_content').'</div>'.$trigger, $triggerpoint, 2);
					break;
					case 1:
						$content = substr_replace($content, '<div id="in_post_ad_middle_'.$ad_ID.'" style="'.$ad_style.'">'.get_option('wp_insert_in_post_ad_middle_'.$ad_ID.'_content_1').'</div>'.$trigger, $triggerpoint, 2);
					break;
					case 2:
						$content = substr_replace($content, '<div id="in_post_ad_middle_'.$ad_ID.'" style="'.$ad_style.'">'.get_option('wp_insert_in_post_ad_middle_'.$ad_ID.'_content_2').'</div>'.$trigger, $triggerpoint, 2);
					break;
				}
			}
			else {
				if(is_singular()) {
					$page_ids = explode(',', str_replace(" ", "", get_option('wp_insert_in_post_ad_middle_'.$ad_ID.'_exclude_ids')));
					if(wp_insert_is_in_array($page_details, $page_ids) =='FALSE') {
						switch($random) {
							case 0:
								$content = substr_replace($content, '<div id="in_post_ad_middle_'.$ad_ID.'" style="'.$ad_style.'">'.get_option('wp_insert_in_post_ad_middle_'.$ad_ID.'_content').'</div>'.$trigger, $triggerpoint, 2);
							break;
							case 1:
								$content = substr_replace($content, '<div id="in_post_ad_middle_'.$ad_ID.'" style="'.$ad_style.'">'.get_option('wp_insert_in_post_ad_middle_'.$ad_ID.'_content_1').'</div>'.$trigger, $triggerpoint, 2);
							break;
							case 2:
								$content = substr_replace($content, '<div id="in_post_ad_middle_'.$ad_ID.'" style="'.$ad_style.'">'.get_option('wp_insert_in_post_ad_middle_'.$ad_ID.'_content_2').'</div>'.$trigger, $triggerpoint, 2);
							break;
						}						
					}
				}
			}
		}
	}
	if(get_option('wp_insert_in_post_ad_top_'.$ad_ID.'_enable')) {
		$ad_style = get_option('wp_insert_in_post_ad_top_'.$ad_ID.'_style');
		if($ad_style == '') { $ad_style = 'margin: 5px; padding: 0px;'; }
		if(!get_option('wp_insert_in_post_ad_top_'.$ad_ID.'_exclude_home') && ($page_details == 'HOME')) {
			switch($random) {
				case 0:
					$output .= '<div id="in_post_ad_top_'.$ad_ID.'" style="'.$ad_style.'">'.get_option('wp_insert_in_post_ad_top_'.$ad_ID.'_content').'</div>';
				break;
				case 1:
					$output .= '<div id="in_post_ad_top_'.$ad_ID.'" style="'.$ad_style.'">'.get_option('wp_insert_in_post_ad_top_'.$ad_ID.'_content_1').'</div>';
				break;
				case 2:
					$output .= '<div id="in_post_ad_top_'.$ad_ID.'" style="'.$ad_style.'">'.get_option('wp_insert_in_post_ad_top_'.$ad_ID.'_content_2').'</div>';
				break;
			}			
		}
		else if(!get_option('wp_insert_in_post_ad_top_'.$ad_ID.'_exclude_archives') && ($page_details == 'ARCHIVE')) {
			switch($random) {
				case 0:
					$output .= '<div id="in_post_ad_top_'.$ad_ID.'" style="'.$ad_style.'">'.get_option('wp_insert_in_post_ad_top_'.$ad_ID.'_content').'</div>';
				break;
				case 1:
					$output .= '<div id="in_post_ad_top_'.$ad_ID.'" style="'.$ad_style.'">'.get_option('wp_insert_in_post_ad_top_'.$ad_ID.'_content_1').'</div>';
				break;
				case 2:
					$output .= '<div id="in_post_ad_top_'.$ad_ID.'" style="'.$ad_style.'">'.get_option('wp_insert_in_post_ad_top_'.$ad_ID.'_content_2').'</div>';
				break;
			}			
		}
		else {
			if(is_singular()) {
				$page_ids = explode(',', str_replace(" ", "", get_option('wp_insert_in_post_ad_top_'.$ad_ID.'_exclude_ids')));
				if(wp_insert_is_in_array($page_details, $page_ids) =='FALSE') {
					switch($random) {
						case 0:
							$output .= '<div id="in_post_ad_top_'.$ad_ID.'" style="'.$ad_style.'">'.get_option('wp_insert_in_post_ad_top_'.$ad_ID.'_content').'</div>';
						break;
						case 1:
							$output .= '<div id="in_post_ad_top_'.$ad_ID.'" style="'.$ad_style.'">'.get_option('wp_insert_in_post_ad_top_'.$ad_ID.'_content_1').'</div>';
						break;
						case 2:
							$output .= '<div id="in_post_ad_top_'.$ad_ID.'" style="'.$ad_style.'">'.get_option('wp_insert_in_post_ad_top_'.$ad_ID.'_content_2').'</div>';
						break;
					}					
				}
			}
		}
	}
	if(get_option('wp_insert_in_post_ad_left_'.$ad_ID.'_enable')) {
		$ad_style = get_option('wp_insert_in_post_ad_left_'.$ad_ID.'_style');
		if($ad_style == '') { $ad_style = 'margin: 5px; padding: 0px;'; }
		if(!get_option('wp_insert_in_post_ad_left_'.$ad_ID.'_exclude_home') && ($page_details == 'HOME')) {
			switch($random) {
				case 0:
					$output .= '<div id="in_post_ad_left_'.$ad_ID.'" style="float:left;'.$ad_style.'">'.get_option('wp_insert_in_post_ad_left_'.$ad_ID.'_content').'</div>';
				break;
				case 1:
					$output .= '<div id="in_post_ad_left_'.$ad_ID.'" style="float:left;'.$ad_style.'">'.get_option('wp_insert_in_post_ad_left_'.$ad_ID.'_content_1').'</div>';
				break;
				case 2:
					$output .= '<div id="in_post_ad_left_'.$ad_ID.'" style="float:left;'.$ad_style.'">'.get_option('wp_insert_in_post_ad_left_'.$ad_ID.'_content_2').'</div>';
				break;
			}			
		}
		else if(!get_option('wp_insert_in_post_ad_left_'.$ad_ID.'_exclude_archives') && ($page_details == 'ARCHIVE')) {
			switch($random) {
				case 0:
					$output .= '<div id="in_post_ad_left_'.$ad_ID.'" style="float:left;'.$ad_style.'">'.get_option('wp_insert_in_post_ad_left_'.$ad_ID.'_content').'</div>';
				break;
				case 1:
					$output .= '<div id="in_post_ad_left_'.$ad_ID.'" style="float:left;'.$ad_style.'">'.get_option('wp_insert_in_post_ad_left_'.$ad_ID.'_content_1').'</div>';
				break;
				case 2:
					$output .= '<div id="in_post_ad_left_'.$ad_ID.'" style="float:left;'.$ad_style.'">'.get_option('wp_insert_in_post_ad_left_'.$ad_ID.'_content_2').'</div>';
				break;
			}			
		}
		else {
			if(is_singular()) {
				$page_ids = explode(',', str_replace(" ", "", get_option('wp_insert_in_post_ad_left_'.$ad_ID.'_exclude_ids')));
				if(wp_insert_is_in_array($page_details, $page_ids) =='FALSE') {
					switch($random) {
						case 0:
							$output .= '<div id="in_post_ad_left_'.$ad_ID.'" style="float:left;'.$ad_style.'">'.get_option('wp_insert_in_post_ad_left_'.$ad_ID.'_content').'</div>';
						break;
						case 1:
							$output .= '<div id="in_post_ad_left_'.$ad_ID.'" style="float:left;'.$ad_style.'">'.get_option('wp_insert_in_post_ad_left_'.$ad_ID.'_content_1').'</div>';
						break;
						case 2:
							$output .= '<div id="in_post_ad_left_'.$ad_ID.'" style="float:left;'.$ad_style.'">'.get_option('wp_insert_in_post_ad_left_'.$ad_ID.'_content_2').'</div>';
						break;
					}					
				}
			}
		}
	}
	if(get_option('wp_insert_in_post_ad_right_'.$ad_ID.'_enable')) {
		$ad_style = get_option('wp_insert_in_post_ad_right_'.$ad_ID.'_style');
		if($ad_style == '') { $ad_style = 'margin: 5px; padding: 0px;'; }
		if(!get_option('wp_insert_in_post_ad_right_'.$ad_ID.'_exclude_home') && ($page_details == 'HOME')) {
			switch($random) {
				case 0:
					$output .= '<div id="in_post_ad_right_'.$ad_ID.'" style="float:right;'.$ad_style.'">'.get_option('wp_insert_in_post_ad_right_'.$ad_ID.'_content').'</div>';
				break;
				case 1:
					$output .= '<div id="in_post_ad_right_'.$ad_ID.'" style="float:right;'.$ad_style.'">'.get_option('wp_insert_in_post_ad_right_'.$ad_ID.'_content_1').'</div>';
				break;
				case 2:
					$output .= '<div id="in_post_ad_right_'.$ad_ID.'" style="float:right;'.$ad_style.'">'.get_option('wp_insert_in_post_ad_right_'.$ad_ID.'_content_2').'</div>';
				break;
			}			
		}
		else if(!get_option('wp_insert_in_post_ad_right_'.$ad_ID.'_exclude_archives') && ($page_details == 'ARCHIVE')) {
			switch($random) {
				case 0:
					$output .= '<div id="in_post_ad_right_'.$ad_ID.'" style="float:right;'.$ad_style.'">'.get_option('wp_insert_in_post_ad_right_'.$ad_ID.'_content').'</div>';
				break;
				case 1:
					$output .= '<div id="in_post_ad_right_'.$ad_ID.'" style="float:right;'.$ad_style.'">'.get_option('wp_insert_in_post_ad_right_'.$ad_ID.'_content_1').'</div>';
				break;
				case 2:
					$output .= '<div id="in_post_ad_right_'.$ad_ID.'" style="float:right;'.$ad_style.'">'.get_option('wp_insert_in_post_ad_right_'.$ad_ID.'_content_2').'</div>';
				break;
			}			
		}
		else {
			if(is_singular()) {
				$page_ids = explode(',', str_replace(" ", "", get_option('wp_insert_in_post_ad_right_'.$ad_ID.'_exclude_ids')));
				if(wp_insert_is_in_array($page_details, $page_ids) =='FALSE') {
					switch($random) {
						case 0:
							$output .= '<div id="in_post_ad_right_'.$ad_ID.'" style="float:right;'.$ad_style.'">'.get_option('wp_insert_in_post_ad_right_'.$ad_ID.'_content').'</div>';
						break;
						case 1:
							$output .= '<div id="in_post_ad_right_'.$ad_ID.'" style="float:right;'.$ad_style.'">'.get_option('wp_insert_in_post_ad_right_'.$ad_ID.'_content_1').'</div>';
						break;
						case 2:
							$output .= '<div id="in_post_ad_right_'.$ad_ID.'" style="float:right;'.$ad_style.'">'.get_option('wp_insert_in_post_ad_right_'.$ad_ID.'_content_2').'</div>';
						break;
					}					
				}
			}
		}
	}
	if(get_option('wp_insert_in_post_ad_bottom_'.$ad_ID.'_enable')) {
		$ad_style = get_option('wp_insert_in_post_ad_bottom_'.$ad_ID.'_style');
		if($ad_style == '') { $ad_style = 'margin: 5px; padding: 0px;'; }
		if(!get_option('wp_insert_in_post_ad_bottom_'.$ad_ID.'_exclude_home') && ($page_details == 'HOME')) {
			switch($random) {
				case 0:
					$content .= '<div id="in_post_ad_bottom_'.$ad_ID.'" style="clear:both;'.$ad_style.'">'.get_option('wp_insert_in_post_ad_bottom_'.$ad_ID.'_content').'</div>';
				break;
				case 1:
					$content .= '<div id="in_post_ad_bottom_'.$ad_ID.'" style="clear:both;'.$ad_style.'">'.get_option('wp_insert_in_post_ad_bottom_'.$ad_ID.'_content_1').'</div>';
				break;
				case 2:
					$content .= '<div id="in_post_ad_bottom_'.$ad_ID.'" style="clear:both;'.$ad_style.'">'.get_option('wp_insert_in_post_ad_bottom_'.$ad_ID.'_content_2').'</div>';
				break;
			}			
		}
		else if(!get_option('wp_insert_in_post_ad_bottom_'.$ad_ID.'_exclude_archives') && ($page_details == 'ARCHIVE')) {
			switch($random) {
				case 0:
					$content .= '<div id="in_post_ad_bottom_'.$ad_ID.'" style="clear:both;'.$ad_style.'">'.get_option('wp_insert_in_post_ad_bottom_'.$ad_ID.'_content').'</div>';
				break;
				case 1:
					$content .= '<div id="in_post_ad_bottom_'.$ad_ID.'" style="clear:both;'.$ad_style.'">'.get_option('wp_insert_in_post_ad_bottom_'.$ad_ID.'_content_1').'</div>';
				break;
				case 2:
					$content .= '<div id="in_post_ad_bottom_'.$ad_ID.'" style="clear:both;'.$ad_style.'">'.get_option('wp_insert_in_post_ad_bottom_'.$ad_ID.'_content_2').'</div>';
				break;
			}			
		}
		else {
			if(is_singular()) {
				$page_ids = explode(',', str_replace(" ", "", get_option('wp_insert_in_post_ad_bottom_'.$ad_ID.'_exclude_ids')));
				if(wp_insert_is_in_array($page_details, $page_ids) =='FALSE') {
					switch($random) {
						case 0:
							$content .= '<div id="in_post_ad_bottom_'.$ad_ID.'" style="clear:both;'.$ad_style.'">'.get_option('wp_insert_in_post_ad_bottom_'.$ad_ID.'_content').'</div>';
						break;
						case 1:
							$content .= '<div id="in_post_ad_bottom_'.$ad_ID.'" style="clear:both;'.$ad_style.'">'.get_option('wp_insert_in_post_ad_bottom_'.$ad_ID.'_content_1').'</div>';
						break;
						case 2:
							$content .= '<div id="in_post_ad_bottom_'.$ad_ID.'" style="clear:both;'.$ad_style.'">'.get_option('wp_insert_in_post_ad_bottom_'.$ad_ID.'_content_2').'</div>';
						break;
					}					
				}
			}
		}
	}
	$content = $output.$content."<div style='clear:both'></div>";
	return $content;
}
?>