<?php
add_action('admin_init', 'wp_insert_support_admin_init');
function wp_insert_support_admin_init() {
	if(isset($_POST['is_showcase_submission']) && ($_POST['is_showcase_submission'] == 'true')) {
		$data = 'site_name='.(string)$_POST['site_name'].'&site_description='.(string)$_POST['site_description'].'&site_category='.(string)$_POST['site_category'].'&site_url='.(string)$_POST['site_url'].'&admin_email='.(string)$_POST['admin_email'];
		try {
			$post_results = wp_insert_httpPost('wp-insert.smartlogix.co.in','80', '/wp-content/plugins/wp-insert-directory/request-handler.php', $data);
			if(($post_results != false) && (strpos($post_results, 'SUBMISSION SUCCESSFUL') !== false)) {
				update_option('wp_insert_showcase_submission', 'PENDING');
			} else {
				echo '<div id="message" class="error">A error occurred while submitting the request.  Please try again later.</div>';
			}
		} catch(Exception $e) {
			echo '<div id="message" class="error">A error occurred while submitting the request.  Please try again later.</div>';
		}
	}
    add_settings_section('wp-insert-support-top', '', 'wp_insert_support_section', 'wp-insert-support');
	//add_meta_box('wp_insert_facebook', 'Like Us On Facebook', 'wp_insert_facebook_content', 'wp-insert-support-top', 'advanced', 'high');	
	add_meta_box('wp_insert_donate', 'Donate and Support Free Plugins', 'wp_insert_donate_content', 'wp-insert-support-bottom', 'advanced', 'high');
	add_meta_box('wp_insert_hire_me', 'Hire Me', 'wp_insert_hire_me_content', 'wp-insert-support-bottom', 'advanced', 'high');
	add_meta_box('wp_insert_hate_campaign', 'Ratings and Reviews', 'wp_insert_ratings_and_reviews_content', 'wp-insert-support-bottom', 'advanced', 'high');
	/*delete_option('wp_insert_showcase_submission');
	if(get_option('wp_insert_showcase_submission') != 'SUBMITTED') {
		add_meta_box('wp_insert_showcase', 'Showcase your Site', 'wp_insert_showcase_content', 'wp-insert-support-bottom', 'advanced', 'high');
	}*/
}

function wp_insert_support_section() {
	do_meta_boxes('wp-insert-support-top', 'advanced', null);
	echo '<p class="submit"><input type="submit" name="Submit" class="button-primary submit" value="Save Changes" /></p>';
	do_meta_boxes('wp-insert-support-bottom', 'advanced', null);
}

function wp_insert_hire_me_content() {
	echo '<div class="wp_insert_hireme">';
		echo '<a title="Hire me! on Freelancer.com" href="https://www.freelancer.com/affiliates/email/899781/" target="_blank">Namith Jawahar - Wordpress Expert</a>';
		echo '<p><b>Hourly : $30</b><br />Minimum Hire Period 1 Hour / $30.</p>';
	echo '</div>';
}

function wp_insert_facebook_content() {
	echo '<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FSmartLogix&amp;width=256&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=344044952413253" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:256px; height:258px;" allowTransparency="true"></iframe>';
}

function wp_insert_donate_content() {
	echo '<p style="text-align: justify; color: rgb(34, 34, 34); font-weight: bold; font-size: 13px;"><b style="text-align: center; display: block; margin: 0px 0px 5px; color: rgb(227, 25, 46); text-shadow: 1px 1px 1px rgb(34, 34, 34); text-transform: uppercase; letter-spacing: 0.5px; font-size: 16px;">Save the Plugin from Dying</b>Developing, Maintaining and Supporting a Popular Plugin requires a lot of time and effort to the tune of a few hours every day.  The project is supposed to purely run on donations, yet the total amount received in Donations in the year 2014 is only $84.<br />A few bucks from you will help me spent more time on the plugin and add more amazing features.  I am requesting every user of the plugin to spare a few dollars so that I can spent enough time on developing more advanced features for the plugin.</p>';
	//echo '<a href="http://www.wp-insert.smartlogix.co.in/support/" target="_blank"><img src="'.WP_INSERT_URL.'/includes/common/images/donate_btn.png" style="margin-top: 5px;" /></a>';
	//echo '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input type="hidden" name="cmd" value="_xclick"><input type="hidden" name="business" value="support@smartlogix.co.in"><input type="hidden" name="lc" value="IN"><input type="hidden" name="item_name" value="Wp-Insert Plugin Development Support"><input type="hidden" name="item_number" value="01234156"><input type="hidden" name="button_subtype" value="services"><input type="hidden" name="no_note" value="0"><input type="hidden" name="currency_code" value="USD"><input type="hidden" name="bn" value="PP-BuyNowBF:btn_paynowCC_LG.gif:NonHostedGuest"><input type="hidden" name="on0" value="Choose your Denomination">Choose your Denomination <select name="os0" class="input widefat"><option value="1)">1) $9.00 USD</option><option value="2)">2) $19.00 USD</option><option value="3)">3) $29.00 USD</option><option value="4)">4) $49.00 USD</option><option value="5)">5) $99.00 USD</option><option value="6)">6) $199.00 USD</option><option value="7)">7) $299.00 USD</option><option value="8)">8) $399.00 USD</option><option value="9)">9) $599.00 USD</option><option value="10)">10) $999.00 USD</option></select><input type="hidden" name="currency_code" value="USD"><input type="hidden" name="option_select0" value="1)"><input type="hidden" name="option_amount0" value="9.00"><input type="hidden" name="option_select1" value="2)"><input type="hidden" name="option_amount1" value="19.00"><input type="hidden" name="option_select2" value="3)"><input type="hidden" name="option_amount2" value="29.00"><input type="hidden" name="option_select3" value="4)"><input type="hidden" name="option_amount3" value="49.00"><input type="hidden" name="option_select4" value="5)"><input type="hidden" name="option_amount4" value="99.00"><input type="hidden" name="option_select5" value="6)"><input type="hidden" name="option_amount5" value="199.00"><input type="hidden" name="option_select6" value="7)"><input type="hidden" name="option_amount6" value="299.00"><input type="hidden" name="option_select7" value="8)"><input type="hidden" name="option_amount7" value="399.00"><input type="hidden" name="option_select8" value="9)"><input type="hidden" name="option_amount8" value="599.00"><input type="hidden" name="option_select9" value="10)"><input type="hidden" name="option_amount9" value="999.00"><input type="hidden" name="option_index" value="0"><input type="image" src="https://www.paypalobjects.com/en_GB/i/btn/btn_paynowCC_LG.gif" style="margin: 10px auto 0px; display: block;" border="0" name="submit" alt="PayPal � The safer, easier way to pay online."><img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1"></form>';
	echo 'Choose your Denomination';
	echo '<select name="os0" class="input widefat" id="support_denomination">';
		echo '<option value="9">1) $9.00 USD</option>';
		echo '<option value="19">2) $19.00 USD</option>';
		echo '<option value="29">3) $29.00 USD</option>';
		echo '<option value="49">4) $49.00 USD</option>';
		echo '<option value="99">5) $99.00 USD</option>';
		echo '<option value="199">6) $199.00 USD</option>';
		echo '<option value="299">7) $299.00 USD</option>';
		echo '<option value="399">8) $399.00 USD</option>';
		echo '<option value="599">9) $599.00 USD</option>';
		echo '<option value="999">10) $999.00 USD</option>';
	echo '</select>';
	echo '<a onclick="javascript:this.href=\'https://www.paypal.com/cgi-bin/webscr?&cmd=_xclick&business=support@smartlogix.co.in&currency_code=USD&amount=\'+jQuery(\'#support_denomination\').val()+\'&item_name=Wp-Insert Plugin Development Support\';" href="#" target="_blank">';
		echo '<img src="https://www.paypalobjects.com/en_GB/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" style="display: block; margin: 10px auto 0px;">';
	echo '</a>';
}

function wp_insert_ratings_and_reviews_content() {
	//echo '<p>Some users (most likely sponsored by some premium plugin) are spreading a Hate Campaign against Wp-Insert churning away Forum Posts and Negative reviews about the plugin on different sites.</p>';
	//echo '<p>Please help us defend these unscrupulous activities by writing a honest <a href="http://wordpress.org/support/view/plugin-reviews/wp-insert">review</a> about the plugin and <a href="http://wordpress.org/plugins/wp-insert">rating</a> the plugin in the  Plugin Repository.</p>';
	//echo '<p>Most of you will think about leaving a rating or visiting the forum only when something goes wrong while thousands are using the plugin satisfactorily which  unfortunately is not Reported OR Documented.</p>';
	echo '<p style="font-weight: bold; color: #FF0000;"">IF YOU FIND THIS PLUGIN USEFUL DO LEAVE A HONEST <a href="http://wordpress.org/plugins/wp-insert">RATING</a> AND <a href="http://wordpress.org/support/view/plugin-reviews/wp-insert">REVIEW</a> IN THE REPOSITORY AND HELP US AGAINST THE MARKETING CAMPAIGN AIMED TO TARNISH A HIGHLY USEFUL, FREE, FEATURE RICH PLUGIN.</p>';
}

function wp_insert_showcase_content() {
	if(get_option('wp_insert_showcase_submission') == 'PENDING') {
		echo '<div id="message" class="updated" style="margin-top: 15px;"><p>Thank you for submitting your site to the Wp-Insert user directory.  You will receive a notification Email when the site is published in the Directory</p></div>';
		update_option('wp_insert_showcase_submission', 'SUBMITTED');
	} else {
		echo '<div id="showcaseForm">';
			echo '<p style="text-align: justify;">Showcase your site in the Wp-Insert User Directory and get a free backlink and targeted visitors.  A screenshot of the site will be automatically generated and the site will appear in the selected category in our <a href="http://www.wp-insert.smartlogix.co.in/directory/">user directory</a> within a couple of hours.</p>';
			echo '<p><label for="site_url">Site URL:</label></br /><input type="text" readonly="readonly" class="widefat" id="site_url" name="site_url" value="'.get_bloginfo('url').'" /></p>';
			echo '<p><label for="site_name">Site Name:</label></br /><input type="text" class="widefat" id="site_name" name="site_name" value="'.get_bloginfo('name').'" /><small>Site Name will be Cropped at 40 Characters</small></p>';
			echo '<p><label for="site_description">Site Description</label></br /><textarea class="widefat" id="site_description" name="site_description" >'.get_bloginfo('description').'</textarea><small>Site Description will be Cropped at 300 Characters</small></p>';
			echo '<p><label for="site_category">Site Category</label></br />';
				echo '<select id="site_category" name="site_category" class="widefat">';
					echo '<option value="529">Accounting & Auditing</option>';
					echo '<option value="530">Advertising & Marketing</option>';
					echo '<option value="531">Antivirus & Malware</option>';
					echo '<option value="532">Apparel</option>';
					echo '<option value="533">Arts & Entertainment</option>';
					echo '<option value="534">Auctions</option>';
					echo '<option value="535">Banking</option>';
					echo '<option value="536">Baseball</option>';
					echo '<option value="537">Blogging Resources & Services</option>';
					echo '<option value="538">Broadcast & Network News</option>';
					echo '<option value="539">Business Plans & Presentations</option>';
					echo '<option value="540">Cartoons</option>';
					echo '<option value="541">Casual Games</option>';
					echo '<option value="542">Celebrities & Entertainment News</option>';
					echo '<option value="543">Classifieds</option>';
					echo '<option value="544">Clip Art & Animated GIFs</option>';
					echo '<option value="545">Computer & Video Games</option>';
					echo '<option value="546">Computer Hardware</option>';
					echo '<option value="547">Consumer Electronics</option>';
					echo '<option value="548">Coupons & Discount Offers</option>';
					echo '<option value="549">Credit Cards</option>';
					echo '<option value="550">Dating & Personals</option>';
					echo '<option value="551">Dictionaries & Encyclopedias</option>';
					echo '<option value="552">Directories & Listings</option>';
					echo '<option value="553">DVD & Video Rentals</option>';
					echo '<option value="554">E-Commerce Services</option>';
					echo '<option value="555">Email & Messaging</option>';
					echo '<option value="556">Entertainment Media</option>';
					echo '<option value="557">Fantasy Sports</option>';
					echo '<option value="558">Fashion & Style</option>';
					echo '<option value="559">File Sharing & Hosting</option>';
					echo '<option value="560">Flash-Based Entertainment</option>';
					echo '<option value="561">Freeware & Shareware</option>';
					echo '<option value="562">Games</option>';
					echo '<option value="563">General Reference</option>';
					echo '<option value="564">Health</option>';
					echo '<option value="565">Home Furnishings</option>';
					echo '<option value="566">Hotels & Accommodations</option>';
					echo '<option value="567">How-To� DIY & Expert Content</option>';
					echo '<option value="568">Import & Export</option>';
					echo '<option value="569">Internet & Telecom</option>';
					echo '<option value="570">Internet Clients & Browsers</option>';
					echo '<option value="571">Investing</option>';
					echo '<option value="572">ISPs</option>';
					echo '<option value="573">Java</option>';
					echo '<option value="574">Jobs</option>';
					echo '<option value="575">Local News</option>';
					echo '<option value="576">Mac OS</option>';
					echo '<option value="577">Mail & Package Delivery</option>';
					echo '<option value="578">Maps</option>';
					echo '<option value="579">Marketing Services</option>';
					echo '<option value="580">Mass Merchants & Department Stores</option>';
					echo '<option value="581">Merchant Services & Payment Systems</option>';
					echo '<option value="582">Movie Reference</option>';
					echo '<option value="583">Movies</option>';
					echo '<option value="584">Multimedia Software</option>';
					echo '<option value="585">Music & Audio</option>';
					echo '<option value="586">Music Streams & Downloads</option>';
					echo '<option value="5">News</option>';
					echo '<option value="587">Newspapers</option>';
					echo '<option value="588">Online Communities</option>';
					echo '<option value="589">Online Games</option>';
					echo '<option value="590">Online Journals & Personal Sites</option>';
					echo '<option value="591">Online Media</option>';
					echo '<option value="592">Online Video</option>';
					echo '<option value="593">Open Source</option>';
					echo '<option value="594">Phone Service Providers</option>';
					echo '<option value="595">Photo & Image Sharing</option>';
					echo '<option value="596">Photo & Video Sharing</option>';
					echo '<option value="597">Radio</option>';
					echo '<option value="598">Real Estate</option>';
					echo '<option value="599">Search Engine Optimization & Marketing</option>';
					echo '<option value="600">Search Engines</option>';
					echo '<option value="601">Service Providers</option>';
					echo '<option value="602">Shopping</option>';
					echo '<option value="603">Shopping Portals & Search Engines</option>';
					echo '<option value="604">Social Network Apps & Add-Ons</option>';
					echo '<option value="605">Social Networks</option>';
					echo '<option value="606">Software</option>';
					echo '<option value="607">Sports News</option>';
					echo '<option value="608">Translation Tools & Resources</option>';
					echo '<option value="609">Travel</option>';
					echo '<option value="610">TV Networks & Stations</option>';
					echo '<option value="611">Vehicle Shopping</option>';
					echo '<option value="612">Video Sharing</option>';
					echo '<option value="613">Voice & Video Chat</option>';
					echo '<option value="614">Weather</option>';
					echo '<option value="615">Web Apps & Online Tools</option>';
					echo '<option value="616">Web Design & Development</option>';
					echo '<option value="617">Web Hosting & Domain Registration</option>';
					echo '<option value="618">Web Portals</option>';
					echo '<option value="619">Web Services</option>';
					echo '<option value="620">Webcams & Virtual Tours</option>';
					echo '<option value="621">Windows OS</option>';
					echo '<option value="622">World News</option>';
				echo '</select>';
			echo '</p>';
			echo '<p><label for="admin_email">Admin Email</label></br /><input type="email" class="widefat" id="admin_email" name="admin_email" value="" /><br /><small style="text-align: justify; display: block">Your Email wont be shared with any third party and will only be used to sent notifications about SmartLogix Services related to WordPress.  All data provided to SmartLogix is bound by our <a href="http://smartlogix.co.in/privacy-policy/">privacy policy</a></small></p>';
			echo '<p><input type="hidden" id="is_showcase_submission" name="is_showcase_submission" value="false" /><input type="button" class="button-secondary" value="Submit" style="float: right" onclick="showcase_submit()" /></p><div style="clear: both;"></div>';
			echo '<script type="text/javascript">';
				echo 'function showcase_submit() {';
					echo 'jQuery("#is_showcase_submission").val("true");';
					echo 'jQuery("#wp_insert_form").submit();';
				echo '}';
			echo '</script>';
		echo '</div>';
	}
}
?>