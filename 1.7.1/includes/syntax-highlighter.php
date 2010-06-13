<?php
function wp_insert_syntax_highlighter_page() {
	global $screen_layout_columns;
	wp_insert_update_page_order();
	add_meta_box('wp_insert_syntax_highlighter_editor', 'Theme & Plugin Editor Syntax Highlighting', 'wp_insert_syntax_highlighter_editor_HTML', 'col_1');
	add_meta_box('wp_insert_syntax_highlighter_posts', 'Syntax Highlighting for Code in Posts & Pages', 'wp_insert_syntax_highlighter_posts_HTML', 'col_1');

	$parameters = 'wp_insert_sh_editor_enable, wp_insert_sh_posts_enable';
	wp_insert_settings_page_layout($parameters, 'WP-INSERT : Syntax Highlighting', 'syntax');
}

function wp_insert_syntax_highlighter_editor_HTML() { ?>
<div>
<?php if(get_option('wp_insert_sh_editor_enable')) { ?><input type="button" id="wp_insert_sh_editor_enable_button" value="Click to Deactivate" class="button" style="font-weight:bold;color:red;" onclick="wpInsertToggleAdWidget('#wp_insert_sh_editor_enable_button', '#wp_insert_sh_enable')"/>
<?php } else { ?><input type="button" id="wp_insert_sh_editor_enable_button" value="Click to Activate" class="button" style="font-weight:bold;color:#2f9303;" onclick="wpInsertToggleAdWidget('#wp_insert_sh_editor_enable_button', '#wp_insert_sh_editor_enable')"/><?php } ?>
<input style="display:none;" id="wp_insert_sh_editor_enable" name="wp_insert_sh_editor_enable" type="checkbox" value="1"<?php if(get_option('wp_insert_sh_editor_enable')) echo ' checked="checked"'; ?> />
<p><small>Syntax Highlighting support using Editarea 0.8.2 by <a target="_blank" href="http://www.cdolivet.com/index.php?page=editArea">Christophe Dolivet</a></small></p>
</div>
<?php }

function wp_insert_syntax_highlighter_posts_HTML() { ?>
<div>
<?php if(get_option('wp_insert_sh_posts_enable')) { ?><input type="button" id="wp_insert_sh_posts_enable_button" value="Click to Deactivate" class="button" style="font-weight:bold;color:red;" onclick="wpInsertToggleAdWidget('#wp_insert_sh_posts_enable_button', '#wp_insert_sh_posts_enable')"/>
<?php } else { ?><input type="button" id="wp_insert_sh_posts_enable_button" value="Click to Activate" class="button" style="font-weight:bold;color:#2f9303;" onclick="wpInsertToggleAdWidget('#wp_insert_sh_posts_enable_button', '#wp_insert_sh_posts_enable')"/><?php } ?>
<input style="display:none;" id="wp_insert_sh_posts_enable" name="wp_insert_sh_posts_enable" type="checkbox" value="1"<?php if(get_option('wp_insert_sh_posts_enable')) echo ' checked="checked"'; ?> />
<p><small>Enclose CODE snippets between [code] and [/code].<br/>Visit <a href="http://wp-insert.smartlogix.co.in/">Wp-Insert Tutorial Site</a> for advanced options.</a></small></p>
</div>
<?php }

add_action("plugins_loaded", "wp_insert_syntaxhighlighting_init");
function wp_insert_syntaxhighlighting_init() {
	if(get_option('wp_insert_sh_editor_enable')) {
		add_action('admin_footer', 'wp_insert_editor_syntaxhighlighting');
	}
	if(get_option('wp_insert_sh_posts_enable')) {
		add_action('wp_footer', 'wp_insert_posts_syntaxhighlighting');
		add_shortcode('code', 'wp_insert_posts_shortcode');
	}
}
function wp_insert_editor_syntaxhighlighting() { 
	if(basename($_SERVER['SCRIPT_NAME']) == 'plugin-editor.php' || basename($_SERVER['SCRIPT_NAME']) == 'theme-editor.php') {
	global $file;
	$ext=strstr(basename($file),'.');
	if($ext == '.php') {
		$ext = 'php';
	} else if($ext == '.css') {
		$ext = 'css';	
	} else if($ext == '.js') {
		$ext = 'javascript';	
	} else if($ext == '.html' ||$ext == '.htm') {
		$ext = 'html';
	} else {
		$ext = '';	
	} ?>
	<script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/wp-insert/editarea/edit_area_full.js"></script>
	<script type="text/javascript">
	try {
		editAreaLoader.init({
			id: "newcontent"	
			,start_highlight: true
			,allow_resize: "y"
			,allow_toggle: true
			,toolbar: "search, go_to_line, |, undo, redo, |, select_font, |, syntax_selection, |, change_smooth_selection, highlight, reset_highlight, |, word_wrap, help"
			,syntax_selection_allow: "css,html,js,php,xml"
			,word_wrap: true
			,syntax: "<?php echo $ext; ?>"
		});
	}
	catch (e) { void(0); }
	</script>
	<?php
	}
}

function wp_insert_posts_syntaxhighlighting() { ?>
<script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/wp-insert/editarea/edit_area_full.js"></script>
<script type="text/javascript">
try {
	var codeBlocks = document.getElementsByName("codeSnippet");
		for(var i = 0; i < codeBlocks.length; i++) {
			editAreaLoader.init({
				id: codeBlocks[i].id	
				,start_highlight: true
				,allow_resize: "y"
				,allow_toggle: false
				,toolbar: "go_to_line, |, select_font, |, syntax_selection, |, highlight, reset_highlight, |, word_wrap"
				,is_editable: true
				,word_wrap: true
				,syntax: codeBlocks[i].title
			});
		}
}
catch (e) { void(0); }
</script>
<?php }
function wp_insert_posts_shortcode($atts, $content = null, $code = "" ) {
	$attributes = shortcode_atts(array('language' => 'php', 'custom' => ''), $atts);
	if($attributes['custom'] != '') {
		global $post;
		return '<textarea title="'.$attributes['language'].'" class="codeSnippet" name="codeSnippet" id="codeSnippet_'.rand(0,999999).'_'.rand(0,999999).'">'.get_post_meta($post->ID, $attributes['custom'], true).'</textarea>';
	} else {
		return '<textarea title="'.$attributes['language'].'" class="codeSnippet" name="codeSnippet" id="codeSnippet_'.rand(0,999999).'_'.rand(0,999999).'">'.$content.'</textarea>';
	}
}
?>