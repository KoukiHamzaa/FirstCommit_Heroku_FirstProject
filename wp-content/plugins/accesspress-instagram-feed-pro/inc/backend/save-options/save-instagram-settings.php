<?php defined('ABSPATH') or die("No script kiddies please!");
foreach($_POST['instagram'] as $key=>$val){
	$$key = sanitize_text_field($val);
}
$apif_settings = array();
$apif_settings['username'] = $username;
$apif_settings['user_id'] = $user_id;
$apif_settings['access_token'] = $access_token;
$apif_settings['enable_cache'] = $enable_cache;
$apif_settings['cache_period'] = $cache_period;
$apif_settings['enable_links'] = $enable_links;
update_option('apif_settings', $apif_settings);
wp_redirect(admin_url().'admin.php?page=apif-settings&message=1');
exit();