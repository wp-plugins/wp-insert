<?php
add_action('wp_dashboard_setup', 'wp_insert_add_dashboard_widgets' );
function wp_insert_dashboard_widget_function() {
	include_once(ABSPATH . WPINC . '/feed.php');
	$rss = fetch_feed('http://www.wp-insert.smartlogix.co.in/feed/');
	if (!is_wp_error( $rss ) ) :
		$maxitems = $rss->get_item_quantity(10); 
		$rss_items = $rss->get_items(0, $maxitems); 
	endif;
	?>
	<ul>
		<?php if ($maxitems == 0) echo '<li>No items.</li>';
		else
		foreach ($rss_items as $item) : ?>
		<li><a href='<?php echo $item->get_permalink(); ?>'><?php echo $item->get_title(); ?></a></li>
		<?php endforeach; ?>
	</ul>
<?php
}

function wp_insert_add_dashboard_widgets() {
	wp_add_dashboard_widget('wp_insert_dashboard_widget', 'Wp-Insert News', 'wp_insert_dashboard_widget_function');	
} 
?>