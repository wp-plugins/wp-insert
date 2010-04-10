<?php
$Domain = str_replace('', "www.", $_SERVER['HTTP_HOST']);
$TermsandConditionsText = '<p>Welcome to '.$Domain.'. If you continue to browse and use this website you are agreeing to comply with and be bound by the following terms and conditions of use, which together with our privacy policy govern '.$Domain.'\'s relationship with you in relation to this website.</p>
<p>The term '.$Domain.' or \'us\' or \'we\' refers to the owner of the website. The term \'you\' refers to the user or viewer of our website.
The use of this website is subject to the following terms of use:
<ul>
<li>The content of the pages of this website is for your general information and use only. It is subject to change without notice.</li>
<li>Neither we nor any third parties provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness or suitability of the information and materials found or offered on this website for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or errors and we expressly exclude liability for any such inaccuracies or errors to the fullest extent permitted by law.</li>
<li>Your use of any information or materials on this website is entirely at your own risk, for which we shall not be liable. It shall be your own responsibility to ensure that any products, services or information available through this website meet your specific requirements.</li>
<li>This website contains material which is owned by or licensed to us. This material includes, but is not limited to, the design, layout, look, appearance and graphics. Reproduction is prohibited other than in accordance with the copyright notice, which forms part of these terms and conditions.</li>
<li>All trademarks reproduced in this website, which are not the property of, or licensed to the operator, are acknowledged on the website.</li>
<li>Unauthorised use of this website may give rise to a claim for damages and/or be a criminal offence.</li>
<li>From time to time this website may also include links to other websites. These links are provided for your convenience to provide further information. They do not signify that we endorse the website(s). We have no responsibility for the content of the linked website(s).</li>
<li>You may not create a link to this website from another website or document without '.$Domain.'\'s prior written consent.</li></ul></p>';
if(get_option('wp_insert_terms_conditions_content') == "") { add_option("wp_insert_terms_conditions_content", $TermsandConditionsText, '', 'yes'); }

add_shortcode('Terms', 'wp_insert_terms_conditions_shortcode');

function wp_insert_terms_conditions_shortcode() {
	return get_option('wp_insert_terms_conditions_content');
}

function wp_insert_terms_conditions_page() {
	if(isset($_GET["assign"])) {
		$my_post = array();
		$my_post['ID'] = $_GET["assign"];
		$my_post['post_content'] = '[Terms]';
		wp_update_post($my_post);
		header("Location: ".get_bloginfo('url')."/wp-admin/admin.php?page=Terms And Conditions");
	}
	else if(isset($_GET["create"])) {
		$my_post = array();
		$my_post['post_title'] = 'Terms and Conditions';
		$my_post['post_content'] = '[Terms]';
		$my_post['post_status'] = 'publish';
		$my_post['post_author'] = 1;
		$my_post['post_type'] = 'page';
		wp_insert_post($my_post);
		header("Location: ".get_bloginfo('url')."/wp-admin/admin.php?page=Terms And Conditions");
	}
	else if(isset($_GET["reset"])) {
		$Domain = str_replace('', "www.", $_SERVER['HTTP_HOST']);
		$TermsandConditionsText = '<p>Welcome to '.$Domain.'. If you continue to browse and use this website you are agreeing to comply with and be bound by the following terms and conditions of use, which together with our privacy policy govern '.$Domain.'\'s relationship with you in relation to this website.</p>
<p>The term '.$Domain.' or \'us\' or \'we\' refers to the owner of the website. The term \'you\' refers to the user or viewer of our website.
The use of this website is subject to the following terms of use:
<ul>
<li>The content of the pages of this website is for your general information and use only. It is subject to change without notice.</li>
<li>Neither we nor any third parties provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness or suitability of the information and materials found or offered on this website for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or errors and we expressly exclude liability for any such inaccuracies or errors to the fullest extent permitted by law.</li>
<li>Your use of any information or materials on this website is entirely at your own risk, for which we shall not be liable. It shall be your own responsibility to ensure that any products, services or information available through this website meet your specific requirements.</li>
<li>This website contains material which is owned by or licensed to us. This material includes, but is not limited to, the design, layout, look, appearance and graphics. Reproduction is prohibited other than in accordance with the copyright notice, which forms part of these terms and conditions.</li>
<li>All trademarks reproduced in this website, which are not the property of, or licensed to the operator, are acknowledged on the website.</li>
<li>Unauthorised use of this website may give rise to a claim for damages and/or be a criminal offence.</li>
<li>From time to time this website may also include links to other websites. These links are provided for your convenience to provide further information. They do not signify that we endorse the website(s). We have no responsibility for the content of the linked website(s).</li>
<li>You may not create a link to this website from another website or document without '.$Domain.'\'s prior written consent.</li></ul></p>';

		update_option("wp_insert_terms_conditions_content", $TermsandConditionsText);
		header("Location: ".get_bloginfo('url')."/wp-admin/admin.php?page=Terms And Conditions");
	}
	global $screen_layout_columns;

	add_meta_box('wp_insert_edit_terms_conditions', 'Finetune your Terms and Conditions', 'wp_insert_edit_terms_conditions_HTML', 'col_1');
	add_meta_box('wp_insert_edit_assign_terms_conditions_page', 'Assign Page for Terms And Conditions', 'wp_insert_edit_assign_terms_conditions_page_HTML', 'col_1');

	$parameters = 'wp_insert_terms_conditions_content';
	wp_insert_settings_page_layout($parameters, 'WP-INSERT : Terms And Conditions', 'terms');
}

function wp_insert_edit_assign_terms_conditions_page_HTML() { ?>
<div>
<p>Assign 
<select id="wp_insert_select_assign_pages" onchange="UpdateAssignlink()">
	<option value="#" selected="selected">-- Select a Page --</option>
<?php
$count = 0;
$pages = get_pages('sort_column=menu_order');
foreach($pages as $page) {
	if($count < 100) {
		echo "<option value='".get_bloginfo('url')."/wp-admin/admin.php?page=Terms And Conditions&assign=".$page->ID."'>".$page->post_title."</option>";
	}
	$count++;
}
?>
</select>
<script type="text/javascript">
document.getElementById('wp_insert_select_assign_pages').selectedIndex = 0;
function UpdateAssignlink() {
document.getElementById('wp_insert_assign_now_link').href = document.getElementById('wp_insert_select_assign_pages')[document.getElementById('wp_insert_select_assign_pages').selectedIndex].value;
}
</script>
as Terms and Conditions page : <a id="wp_insert_assign_now_link" href="#" class="button-secondary">Assign Now</a></p>
<p><b>OR</b></p>
<p>Create Terms and Conditions Page Automatically : <a href="<?php echo get_bloginfo('url')."/wp-admin/admin.php?page=Terms And Conditions&create=1"; ?>" class="button-secondary">Create Now</a></p>
</div>
<?php }

function wp_insert_edit_terms_conditions_HTML() { ?>
<script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/wp-insert/fckeditor/fckeditor.js"></script>
<textarea id="wp_insert_terms_conditions_content" name="wp_insert_terms_conditions_content" style="width:100%; height: 400px;">
<?php echo get_option('wp_insert_terms_conditions_content'); ?>
</textarea>
<p><a href="<?php echo get_bloginfo('url')."/wp-admin/admin.php?page=Terms And Conditions&reset=1"; ?>" class="button-secondary alignright">Reset</a></p><p><small>This is an automatically generated "Terms and Conditions".</small></p>
<script type="text/javascript">
	if(document.getElementById('wp_insert_terms_conditions_content')) {
	var wp_insert_fckeditor = new FCKeditor('wp_insert_terms_conditions_content') ;
	wp_insert_fckeditor.Height = "400"
	wp_insert_fckeditor.BasePath = '<?php echo WP_PLUGIN_URL; ?>/wp-insert/fckeditor/';
	wp_insert_fckeditor.ReplaceTextarea() ;
	}
</script>
<?php }
?>
