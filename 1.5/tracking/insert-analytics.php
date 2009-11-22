<?php 
add_action('wp_footer', 'smart_add_footer_code');
add_action('wp_head', 'smart_add_header_code');

function smart_add_header_code($arg) {
if(get_option('smart_analytics_header_enabled')) {
echo get_option('smart_analytics_header_code');
}
return $arg;
}

function smart_add_footer_code($arg) {
if(get_option('smart_analytics_enabled')) { ?>
<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
	var pageTracker = _gat._getTracker("<?php echo get_option('smart_analytics_id'); ?>");
	pageTracker._trackPageview();
</script>
<?php }
if(get_option('smart_analytics_footer_enabled')) {
echo get_option('smart_analytics_footer_code');
}
return $arg;
}

// action function for adding the administrative page
function smart_add_analytics() { ?>
<div class="wrap">
<h2>WP-INSERT : Tracking Codes</h2>
<?php show_support_options(); ?>
<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>

<table class="form-table">

<tr valign="top">
<th scope="row">Google Analytics Tracker ID
<br/><input id="smart_analytics_enabled" name="smart_analytics_enabled" type="checkbox" value="1"<?php if(get_option('smart_analytics_enabled')) echo ' checked="checked"'; ?>/> Enabled</th>
<td><input id="smart_analytics_id" name="smart_analytics_id" type="text" value="<?php echo get_option('smart_analytics_id'); ?>" style="width:350px;" /><br/>
<small>( Paste your Google Analytics Tracker ID (XX-XXXXX-X) above )</small></td>
</tr>

<tr valign="top">
<th scope="row">Insert Code into Header<br/>
<br/><input id="smart_analytics_header_enabled" name="smart_analytics_header_enabled" type="checkbox" value="1"<?php if(get_option('smart_analytics_header_enabled')) echo ' checked="checked"'; ?>/> Enabled</th>
<td><textarea id="smart_analytics_header_code" name="smart_analytics_header_code" style="width:350px;height:150px;"><?php echo get_option('smart_analytics_header_code'); ?></textarea><br/>
<small>( Paste Analytics or similar code in the box above )</small></td>
</tr>

<tr valign="top">
<th scope="row">Insert Code into Footer<br/>
<br/><input id="smart_analytics_footer_enabled" name="smart_analytics_footer_enabled" type="checkbox" value="1"<?php if(get_option('smart_analytics_footer_enabled')) echo ' checked="checked"'; ?>/> Enabled</th>
<td><textarea id="smart_analytics_footer_code" name="smart_analytics_footer_code" style="width:350px;height:150px;"><?php echo get_option('smart_analytics_footer_code'); ?></textarea><br/>
<small>( Paste Analytics or similar code in the box above )</small></td>
</tr>

</table>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="smart_analytics_enabled,smart_analytics_id,smart_analytics_header_enabled,smart_analytics_header_code,smart_analytics_footer_enabled,smart_analytics_footer_code" />
<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>
</form>
<p>
<script type="text/javascript" src="http://www.wp-insert.smartlogix.co.in/wp-content/plugins/wp-adnetwork/wp-adnetwork.php?showad=1"></script>
</p>
</div>
<?php } ?>