<?php defined('ABSPATH') or die("No script kiddies please!");
//$this->print_array($_POST);die();
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

// die();
/**
[instagram] => Array
        (
            [username] => sujit.kayastha
            [user_id] => asdfas
            [access_token] => asdfasdf
            [instagram_mosaic] => mosaic
        )

**/
foreach($_POST['instagram'] as $key=>$val){
	$$key = sanitize_text_field($val);
}
$apif_settings = array();
$apif_settings['username'] = $username;
$apif_settings['access_token'] = $access_token;

$apif_settings['enable_cache'] = $enable_cache;
$apif_settings['cache_period'] = $cache_period;

$apif_settings['instagram_mosaic'] = isset($instagram_mosaic)?$instagram_mosaic:'mosaic';
$apif_settings['feed_type'] = $feed_type;
$apif_settings['user_id'] = $user_id;
$apif_settings['active'] = isset($active) ? $active : ' ';
$apif_settings['any_user_username'] = isset($any_user_username) ? $any_user_username : ' ';
$apif_settings['tag_name'] = isset($tag_name) ? $tag_name : ' ';
$apif_settings['image_number'] = isset($image_number) ? $image_number : ' ';
$apif_settings['theme_accent_color'] = isset($theme_accent_color) ? $theme_accent_color : ' ';
$apif_settings['comment_active'] = isset($comment_active) ? $comment_active : ' ';
update_option('apif_settings', $apif_settings);
wp_redirect(admin_url().'admin.php?page=ap-instagram-feed-pro&message=1');
exit();