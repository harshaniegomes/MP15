<?php 
add_action('wp_footer', 'addCookieToFooter');
if(!function_exists('addCookieToFooter')){
	function addCookieToFooter() {
		if(!$_COOKIE['accepted']){ 
?><div class="cookiebar">
	<div class="cookieinner">
    	<div id="continuebutton" class="continuebutton"></div>
		<p>This site uses cookies as described in our <a href="/cookie-policy/">Cookie Policy</a>. You can <a href="http://gsma.com/aboutus/legal/our-cookie-list/" target="_blank">change your cookie settings</a> at anytime Otherwise, if you agree to our use of cookies, please continue to use our site.</p>
	</div>
</div>
<link rel="stylesheet" href="<?php echo bloginfo('template_url');?>/libs/cookie-bar/cookie-bar.css" type="text/css" media="all"/>
<script src="<?php echo bloginfo('template_url');?>/libs/cookie-bar/cookies.js"></script><?php
		}
	}
}
?>
