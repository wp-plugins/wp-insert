<?php
add_action("plugins_loaded", "smart_syntaxhighlighting_init");
function smart_syntaxhighlighting_init() {
	if(get_option('smart_enable_sh')) {
		add_action('admin_footer', 'smart_init_syntaxhighlighting');
	}
}

function smart_init_syntaxhighlighting() { 
if(basename($_SERVER['SCRIPT_NAME']) == 'plugin-editor.php' || basename($_SERVER['SCRIPT_NAME']) == 'theme-editor.php') {
global $file;
$ext=strstr(basename($file),'.');
if($ext == '.php') {
	$ext = 'php';
}
else if($ext == '.css') {
	$ext = 'css';	
}
else if($ext == '.js') {
	$ext = 'javascript';	
}
else if($ext == '.html' ||$ext == '.htm') {
	$ext = 'html';
}
else {
	$ext = '';	
} ?>
	<script type="text/javascript" src="<?php echo get_bloginfo('url') ?>/wp-content/plugins/wp-insert/codepress/codepress.js"></script>
	<script type="text/javascript">
		try {
			var smart_editor = document.getElementById('newcontent');
			smart_editor.form.onsubmit=function() {
				var smart_input = document.createElement("input");
				smart_input.setAttribute("type","hidden");
				smart_input.setAttribute("name","newcontent");
				smart_input.setAttribute("value",newcontent.getCode());
				smart_editor.form.appendChild(smart_input);
				return true;
			}
			smart_editor.className="codepress <?php echo $ext ?> linenumbers-on autocomplete-off readonly-off";
			var smart_options_content = "<table><tr><td colspan='6'><b><a title='WP-Insert by Smart Logix' href='http://www.smartlogix.co.in'>WP-insert</a> : Syntax Highlighter Options</b></td></tr><tr><td>&nbsp;</td></tr><tr><td><input type='checkbox' onclick='newcontent.toggleAutoComplete()' />&nbsp;Turn on Autocomplete</td><td>&nbsp;&nbsp;&nbsp;</td><td><input type='checkbox' onclick='newcontent.toggleLineNumbers()' />&nbsp;Turn off Linenumbers</td><td>&nbsp;&nbsp;&nbsp;</td><td><input type='checkbox' onclick='newcontent.toggleEditor()' />&nbsp;Turn off Syntax Highlighting</td></tr></table>"
			var smart_options = document.createElement("div");
			smart_options.innerHTML = smart_options_content;			
			smart_editor.form.appendChild(smart_options);
		}
		catch (e) { void(0); }
	</script>
<?php } 
}

function smart_add_syntaxhighlighting_pages() { ?>
<div class="wrap">
<h2>WP-INSERT : Syntax Highlighting</h2>
<?php show_support_options(); ?>
<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<table class="form-table">
<tr valign="top">
<th scope="row"></th>
<td><b style="color:red;">This section is irrelavent from wordpress 2.8</b></td>
</tr>
<tr valign="top">
<th scope="row"><input id="smart_enable_sh" name="smart_enable_sh" type="checkbox" value="1"<?php if(get_option('smart_enable_sh')) echo ' checked="checked"'; ?>/> <b>Plugin/Theme Editor</b></th>
<td>( Syntax highlighting in plugin and theme editor )<br/>
Syntax highlighting by codepress</td>
</tr>
<tr><th>Codepress Features</th>
<td>
<ul>
<li>Real-time syntax highlighting</li>
<li>Code snippets - on PHP pages just type "if" and press [tab]</li>
<li>Auto completion - simple type single/double quotes or ( or [ or {</li>
<li>Shortcuts - on PHP pages press [ctrl][shift][space]. Its shortcut to <code>&<b></b>nbsp;</code></li></ul>
</td>
</tr>
</table>
<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="smart_enable_sh" />
<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>
</form>
</div>
<?php } ?>