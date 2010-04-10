<?php
function wp_insert_pages_page() {
	global $screen_layout_columns;
	wp_insert_update_page_order();
	add_meta_box('wp_insert_manage_page_order', 'Manage Page Order', 'wp_insert_manage_page_order_HTML', 'col_1');

	$parameters = 'wp_insert_updated_page_order';
	wp_insert_settings_page_layout($parameters, 'WP-INSERT : Manage Pages', 'pages');
}

function wp_insert_manage_page_order_HTML() { ?>
<input id="wp_insert_updated_page_order" name="wp_insert_updated_page_order" type="hidden" value="" />
<ul id="wp_insert_page_list">
<?php
$pages = get_pages('sort_column=menu_order');
foreach($pages as $page) { ?>
		<li id="wp_insert_listItem_<?php echo $page->ID; ?>"> 
			<img src="<?php echo WP_PLUGIN_URL; ?>/wp-insert/images/move-16x16.png" width="16px" height="16px" alt="move" class="handle" /> 
			<strong>
				<?php if($page->post_parent != 0) { echo get_the_title($page->post_parent)."&nbsp;&raquo;&nbsp;".$page->post_title; } else { echo $page->post_title; } ?>
			</strong></a> 
		<?php 
			/*$temp = '';
			foreach($pages as $subPage) {
				if($subPage->post_parent == $page->ID) {
					$temp .= '<li id="wp_insert_listItem_'.$subPage->ID.'">';
						$temp .= '<img src="<?php echo WP_PLUGIN_URL; ?>/wp-insert/images/move-16x16.png" width="16px" height="16px" alt="move" class="handle" />'; 
						$temp .= '<strong>'.$subPage->post_title.'</strong></a>';
					$temp .= '</li>';
				}
			}
			if($temp != '') { echo '<ul style="margin-left: 25px;">'.$temp.'</ul>'; }*/
		?>
		</li> 
<?php }
?>
</ul> 
<script type="text/javascript"> 
  jQuery("#wp_insert_page_list").sortable({ 
    handle : '.handle', 
    update : function () {
		wpInsertToggleNotSavedAlert();
		var items = jQuery('#wp_insert_page_list').sortable('toArray');
		for (i=0; i<items.length; i++) {
			items[i] = items[i].replace("wp_insert_listItem_", "");
		}
		document.getElementById('wp_insert_updated_page_order').value = items.join(","); 
    } 
  }); 
</script>
<?php }

function wp_insert_update_page_order() {
	if(get_option(wp_insert_updated_page_order) != '') {
		global $wpdb;
		$pageOrder = explode(",", get_option(wp_insert_updated_page_order));
		$sql = "UPDATE $wpdb->posts SET menu_order = CASE id ";
		for($i = 0; $i < count($pageOrder); $i++) {
			global $wpdb;
			$sql .= "WHEN ".$pageOrder[$i]." THEN ".$i." ";
		}
		$sql .= "END WHERE id IN (".get_option(wp_insert_updated_page_order).")";
		$wpdb->query($sql);
		update_option(wp_insert_updated_page_order, '');
	}
}
?>