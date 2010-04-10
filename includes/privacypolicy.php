<?php
$Domain = str_replace('', "www.", $_SERVER['HTTP_HOST']);
$PrivacyPolicyText = '<p>At <a href="'.get_bloginfo('url').'">'.$Domain.'</a>, the privacy of our visitors is of extreme importance to us (See <a target="_blank" href="http://www.wp-insert.smartlogix.co.in/what-is-a-privacy-policy/">this article</a> to learn more about Privacy Policies.). This privacy policy document outlines the types of personal information is received and collected by <a href="'.get_bloginfo('url').'">'.$Domain.'</a> and how it is used.</p>
<p><b>Log Files</b><br/>Like many other Web sites, <a href="'.get_bloginfo('url').'">'.$Domain.'</a> makes use of log files. The information inside the log files includes internet protocol ( IP ) addresses, type of browser, Internet Service Provider ( ISP ), date/time stamp, referring/exit pages, and number of clicks to analyze trends, administer the site, track user’s movement around the site, and gather demographic information. IP addresses, and other such information are not linked to any information that is personally identifiable.</p>
<p><b>Cookies and Web Beacons</b><br/><a href="'.get_bloginfo('url').'">'.$Domain.'</a> does use cookies to store information about visitors preferences, record user-specific information on which pages the user access or visit, customize Web page content based on visitors browser type or other information that the visitor sends via their browser.</p>
<p><b>DoubleClick DART Cookie</b></p><ul><li>Google, as a third party vendor, uses cookies to serve ads on <a href="'.get_bloginfo('url').'">'.$Domain.'</a>.</li><li>Google\'s use of the DART cookie enables it to serve ads to users based on their visit to <a href="'.get_bloginfo('url').'">'.$Domain.'</a> and other sites on the Internet.</li><li>Users may opt out of the use of the DART cookie by visiting the Google ad and content network privacy policy at the following URL - <a href="http://www.google.com/privacy_ads.html">http://www.google.com/privacy_ads.html</a>.</li></ul>
<p>These third-party ad servers or ad networks use technology to the advertisements and links that appear on <a href="'.get_bloginfo('url').'">'.$Domain.'</a> send directly to your browsers. They automatically receive your IP address when this occurs. Other technologies ( such as cookies, JavaScript, or Web Beacons ) may also be used by the third-party ad networks to measure the effectiveness of their advertisements and / or to personalize the advertising content that you see.</p>
<p><a href="'.get_bloginfo('url').'">'.$Domain.'</a> has no access to or control over these cookies that are used by third-party advertisers.</p>
<p>You should consult the respective privacy policies of these third-party ad servers for more detailed information on their practices as well as for instructions about how to opt-out of certain practices. <a href="'.get_bloginfo('url').'">'.$Domain.'\'s</a> privacy policy does not apply to, and we cannot control the activities of, such other advertisers or web sites.</p>
<p>If you wish to disable cookies, you may do so through your individual browser options. More detailed information about cookie management with specific web browsers can be found at the browsers\' respective websites.</p>';
if(get_option('wp_insert_privacy_policy_content') == "") { add_option("wp_insert_privacy_policy_content", $PrivacyPolicyText, '', 'yes'); }

add_shortcode('Privacy', 'wp_insert_privacy_policy_shortcode');

function wp_insert_privacy_policy_shortcode() {
	return get_option('wp_insert_privacy_policy_content');
}

function wp_insert_privacy_policy_page() {
	if(isset($_GET["assign"])) {
		$my_post = array();
		$my_post['ID'] = $_GET["assign"];
		$my_post['post_content'] = '[Privacy]';
		wp_update_post($my_post);
		header("Location: ".get_bloginfo('url')."/wp-admin/admin.php?page=Manage Privacy Policy");
	}
	else if(isset($_GET["create"])) {
		$my_post = array();
		$my_post['post_title'] = 'Privacy Policy';
		$my_post['post_content'] = '[Privacy]';
		$my_post['post_status'] = 'publish';
		$my_post['post_author'] = 1;
		$my_post['post_type'] = 'page';
		wp_insert_post($my_post);
		header("Location: ".get_bloginfo('url')."/wp-admin/admin.php?page=Manage Privacy Policy");
	}
	else if(isset($_GET["reset"])) {
		$Domain = str_replace('', "www.", $_SERVER['HTTP_HOST']);
		$PrivacyPolicyText = '<p>At <a href="'.get_bloginfo('url').'">'.$Domain.'</a>, the privacy of our visitors is of extreme importance to us (See <a target="_blank" href="http://www.wp-insert.smartlogix.co.in/what-is-a-privacy-policy/">this article</a> to learn more about Privacy Policies.). This privacy policy document outlines the types of personal information is received and collected by <a href="'.get_bloginfo('url').'">'.$Domain.'</a> and how it is used.</p>
		<p><b>Log Files</b><br/>Like many other Web sites, <a href="'.get_bloginfo('url').'">'.$Domain.'</a> makes use of log files. The information inside the log files includes internet protocol ( IP ) addresses, type of browser, Internet Service Provider ( ISP ), date/time stamp, referring/exit pages, and number of clicks to analyze trends, administer the site, track user’s movement around the site, and gather demographic information. IP addresses, and other such information are not linked to any information that is personally identifiable.</p>
		<p><b>Cookies and Web Beacons</b><br/><a href="'.get_bloginfo('url').'">'.$Domain.'</a> does use cookies to store information about visitors preferences, record user-specific information on which pages the user access or visit, customize Web page content based on visitors browser type or other information that the visitor sends via their browser.</p>
		<p><b>DoubleClick DART Cookie</b></p><ul><li>Google, as a third party vendor, uses cookies to serve ads on <a href="'.get_bloginfo('url').'">'.$Domain.'</a>.</li><li>Google\'s use of the DART cookie enables it to serve ads to users based on their visit to <a href="'.get_bloginfo('url').'">'.$Domain.'</a> and other sites on the Internet.</li><li>Users may opt out of the use of the DART cookie by visiting the Google ad and content network privacy policy at the following URL - <a href="http://www.google.com/privacy_ads.html">http://www.google.com/privacy_ads.html</a>.</li></ul>
		<p>These third-party ad servers or ad networks use technology to the advertisements and links that appear on <a href="'.get_bloginfo('url').'">'.$Domain.'</a> send directly to your browsers. They automatically receive your IP address when this occurs. Other technologies ( such as cookies, JavaScript, or Web Beacons ) may also be used by the third-party ad networks to measure the effectiveness of their advertisements and / or to personalize the advertising content that you see.</p>
		<p><a href="'.get_bloginfo('url').'">'.$Domain.'</a> has no access to or control over these cookies that are used by third-party advertisers.</p>
		<p>You should consult the respective privacy policies of these third-party ad servers for more detailed information on their practices as well as for instructions about how to opt-out of certain practices. <a href="'.get_bloginfo('url').'">'.$Domain.'\'s</a> privacy policy does not apply to, and we cannot control the activities of, such other advertisers or web sites.</p>
		<p>If you wish to disable cookies, you may do so through your individual browser options. More detailed information about cookie management with specific web browsers can be found at the browsers\' respective websites.</p>';

		update_option("wp_insert_privacy_policy_content", $PrivacyPolicyText);
		header("Location: ".get_bloginfo('url')."/wp-admin/admin.php?page=Manage Privacy Policy");
	}
	global $screen_layout_columns;

	add_meta_box('wp_insert_edit_privacy_policy', 'Finetune your Privacy Policy', 'wp_insert_edit_privacy_policy_HTML', 'col_1');
	add_meta_box('wp_insert_edit_assign_privacy_policy_page', 'Assign Page for Privacy Policy', 'wp_insert_edit_assign_privacy_policy_page_HTML', 'col_1');

	$parameters = 'wp_insert_privacy_policy_content';
	wp_insert_settings_page_layout($parameters, 'WP-INSERT : Manage Privacy Policy', 'privacy');
}

function wp_insert_edit_assign_privacy_policy_page_HTML() { ?>
<div>
<p>Assign 
<select id="wp_insert_select_assign_pages" onchange="UpdateAssignlink()">
	<option value="#" selected="selected">-- Select a Page --</option>
<?php
$count = 0;
$pages = get_pages('sort_column=menu_order');
foreach($pages as $page) {
	if($count < 100) {
		echo "<option value='".get_bloginfo('url')."/wp-admin/admin.php?page=Manage Privacy Policy&assign=".$page->ID."'>".$page->post_title."</option>";
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
as Privacy Policy page : <a id="wp_insert_assign_now_link" href="#" class="button-secondary">Assign Now</a></p>
<p><b>OR</b></p>
<p>Create Privacy Policy Page Automatically : <a href="<?php echo get_bloginfo('url')."/wp-admin/admin.php?page=Manage Privacy Policy&create=1"; ?>" class="button-secondary">Create Now</a></p>
</div>
<?php }

function wp_insert_edit_privacy_policy_HTML() { ?>
<script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/wp-insert/fckeditor/fckeditor.js"></script>
<textarea id="wp_insert_privacy_policy_content" name="wp_insert_privacy_policy_content" style="width:100%; height: 400px;">
<?php echo get_option('wp_insert_privacy_policy_content'); ?>
</textarea>
<p><a href="<?php echo get_bloginfo('url')."/wp-admin/admin.php?page=Manage Privacy Policy&reset=1"; ?>" class="button-secondary alignright">Reset</a></p><p><small>This is an automatically generated "Privacy Policy".</small></p>
<script type="text/javascript">
	if(document.getElementById('wp_insert_privacy_policy_content')) {
	var wp_insert_fckeditor = new FCKeditor('wp_insert_privacy_policy_content') ;
	wp_insert_fckeditor.Height = "400"
	wp_insert_fckeditor.BasePath = '<?php echo WP_PLUGIN_URL; ?>/wp-insert/fckeditor/';
	wp_insert_fckeditor.ReplaceTextarea() ;
	}
</script>
<?php }
?>
