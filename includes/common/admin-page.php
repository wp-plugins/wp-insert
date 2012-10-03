<?php
function wp_insert_admin_page($pageTitle, $sectionName, $optionName) { ?>
    <div class="wrap wp-insert">
		<a href="http://www.wp-insert.smartlogix.co.in"><img src="<?php echo WP_INSERT_URL; ?>/includes/common/images/logo.png" /></a>
		<form method="post" action="options.php" name="wp_auto_commenter_form">
			<?php settings_fields($optionName); ?>
			<div id="poststuff" class="metabox-holder has-right-sidebar wp-insert-plugin">
				<div id="side-info-column" class="inner-sidebar">
					<p class="submit">
						<input type="submit" name="Submit" class="button-primary submit" value="<?php esc_attr_e('Save Changes') ?>" />
					</p>
				</div>
				<div id="post-body" class="has-sidebar">				
					<div id="post-body-content" class="has-sidebar-content">
						<?php do_settings_sections($sectionName); ?>
					</div>
				</div>
				<br class="clear"/>			
			</div>
			<?php
			wp_nonce_field('closedpostboxes', 'closedpostboxesnonce', false);
			wp_nonce_field('meta-box-order', 'meta-box-order-nonce', false);
			?>
			<script type="text/javascript">
			jQuery(document).ready( function($) {
				jQuery('.if-js-closed').removeClass('if-js-closed').addClass('closed');
				postboxes.add_postbox_toggles('<?php echo $sectionName; ?>');
			});
			</script>
		</form>
    </div>
<?php
}
?>