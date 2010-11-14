<?php
// Hook for adding admin menus
add_action("plugins_loaded", "smart_WYSIWYG_init");
function smart_WYSIWYG_init() {
	if(get_option('smart_enable_categorydesc_editor')) {
		if ( is_admin() || defined('DOING_AJAX') ) {
			if ( current_user_can('manage_categories') ) {
				remove_filter('pre_term_description', 'wp_filter_kses');
			}
		}
		if(!get_option('smart_enable_fckeditor')) {
			add_action('load-categories.php', 'smart_init_categorydesc_editor');
		}
		else {
			add_action('admin_footer', 'smart_init_excerpt_editor');
		}
	}
	if(get_option('smart_disable_autoformatting')) {
		remove_filter ('the_content',  'wpautop');
		remove_filter ('the_excerpt', 'wpautop');
		remove_filter ('comment_text', 'wpautop');
	}
	if(get_option('smart_enable_excerpt_editor')) {
		if ( user_can_richedit() ) {
			add_action('admin_footer', 'smart_init_excerpt_editor');
		}
	}
	if(get_option('smart_enable_fckeditor')) {
		update_user_option($current_user->id, 'rich_editing', 'false', true);
		add_action('edit_form_advanced', 'load_fckeditor');
		add_action('edit_page_form', 'load_fckeditor');
		add_action('simple_edit_form', 'load_fckeditor');
		wp_deregister_script(array('media-upload')); 
		wp_enqueue_script('fckeditor', get_bloginfo('url') . '/wp-content/plugins/wp-insert/fckeditor/fckeditor.js', '20080710');
	}
}

function smart_init_excerpt_editor() { ?>
	<script type="text/javascript">
<?php if(get_option('smart_enable_fckeditor')) { ?>
	try {
		if(document.getElementById('excerpt')) {
		var smart_fckeditor_2 = new FCKeditor('excerpt') ;
		smart_fckeditor_2.BasePath = '<?php echo get_bloginfo('url'); ?>/wp-content/plugins/wp-insert/fckeditor/';
		smart_fckeditor_2.ReplaceTextarea() ;
		}
		} catch(e) { void(0); }
<?php } else { ?>
		try {
		if ( typeof( tinyMCE ) == "object" && typeof( tinyMCE.execCommand ) == "function" ) {
			jQuery("#excerpt").wrap( "<div id='editorcontainer'></div>" ); 
			tinyMCE.execCommand("mceAddControl", false, "excerpt");
		}
		} catch(e) { void(0); }
<?php } if(get_option('smart_enable_categorydesc_editor')) { 
	if(get_option('smart_enable_fckeditor')) { ?>
		try {
		if(document.getElementById('category_description')) {
		var smart_fckeditor_3 = new FCKeditor('category_description') ;
		smart_fckeditor_3.BasePath = '<?php echo get_bloginfo('url'); ?>/wp-content/plugins/wp-insert/fckeditor/';
		smart_fckeditor_3.ReplaceTextarea() ;
		}
		} catch(e) { void(0); }
	<?php } ?>
		try {jQuery("#category_description").wrap( "<div id='editorcontainer'></div>" );} catch(e) { void(0); }
<?php } ?>
	</script>
<?php
}

function load_fckeditor_categories() { ?>

<?php 
}

function smart_init_categorydesc_editor() {
    if ( user_can_richedit() ) {
		add_filter( 'tiny_mce_before_init', 'smart_set_categorydesc_editor_options');
		add_action('admin_footer', 'wp_tiny_mce');
	}
}

function smart_set_categorydesc_editor_options($args) {	
	$args['mode'] = 'textareas';
	$args['elements'] = 'category_description';
	$args['plugins'] = 'safari,inlinepopups,spellchecker,paste,wordpress,media,fullscreen';
	$args['theme_advanced_buttons1'] .= ',image';
	$args['theme_advanced_buttons2'] .= ',code';
	$args['onpageload'] = null;
	$args['save_callback'] = null;
	return $args;
}

function load_fckeditor() { ?>
	<script type="text/javascript">
			try {
			if(document.getElementById('content')) {
			var smart_fckeditor_1 = new FCKeditor('content') ;
			smart_fckeditor_1.BasePath = '<?php echo get_bloginfo('url'); ?>/wp-content/plugins/wp-insert/fckeditor/';
			smart_fckeditor_1.ReplaceTextarea() ;
			}
			} catch(e) { void(0); }
			try { document.getElementById("quicktags").style.display = "none"; } catch(e) { void(0); }
			try { document.getElementById("editor-toolbar").style.display = "none"; } catch(e) { void(0); }
			try { document.getElementById("ed_toolbar").style.display = "none"; } catch(e) { void(0); }
	</script>
<?php } 

function smart_add_wysiwyg_pages() { ?>
<div class="wrap">
<h2>WP-INSERT : WYSIWYG Editor</h2>
<?php show_support_options(); ?>
<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>

<table class="form-table">

<tr valign="top">
<th scope="row"><input id="smart_enable_fckeditor" name="smart_enable_fckeditor" type="checkbox" value="1"<?php if(get_option('smart_enable_fckeditor')) echo ' checked="checked"'; ?>/> <b>Use FCK Editor</b></th>
<td>( Replace tiny MCE editor with the FCK editor ) Experimental!</td>
</tr>

<tr valign="top">
<th scope="row"><input id="smart_disable_autoformatting" name="smart_disable_autoformatting" type="checkbox" value="1"<?php if(get_option('smart_disable_autoformatting')) echo ' checked="checked"'; ?>/> <b>Disable auto formatting</b></th>
<td>( Disable automatic formatting of paragraphs done by Wordpress )</td>
</tr>

<tr valign="top">
<th scope="row"><input id="smart_enable_categorydesc_editor" name="smart_enable_categorydesc_editor" type="checkbox" value="1"<?php if(get_option('smart_enable_categorydesc_editor')) echo ' checked="checked"'; ?>/> <b>WYSIWYG category description editor</b></th>
<td>( Ads WYSIWYG editor to category description box )</td>
</tr>

<tr valign="top">
<th scope="row"><input id="smart_enable_excerpt_editor" name="smart_enable_excerpt_editor" type="checkbox" value="1"<?php if(get_option('smart_enable_excerpt_editor')) echo ' checked="checked"'; ?>/> <b>WYSIWYG excerpt editor</b></th>
<td>( Ads WYSIWYG editor to excerpt editor box )</td>
</tr>

</table>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="smart_enable_fckeditor,smart_disable_autoformatting,smart_enable_categorydesc_editor,smart_enable_excerpt_editor" />
<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>
</form><p><script type="text/javascript" src="http://www.wp-insert.smartlogix.co.in/wp-content/plugins/wp-adnetwork/wp-adnetwork.php?showad=1"></script></p>
</div>
<?php } ?>