<?php defined('ABSPATH') or die("No script kiddies please!");
global $wpdb;
/*echo "<pre>";
print_r($_POST);
echo "ADD";
exit();*/
$check = false;
$_POST = array_map('stripslashes_deep', $_POST);
if ( isset( $_POST['instagram'] ) ) {
	$sanitized_values = $this->sanitize_array($_POST['instagram']);
	$feed_settings = maybe_serialize($sanitized_values);
}

$apifeeds_feed_settings = unserialize($feed_settings);
// echo "<pre>";print_r($apifeeds_feed_settings);

$feedtype = (isset($apifeeds_feed_settings['feed_type']) && $apifeeds_feed_settings['feed_type'] != '')?esc_attr($apifeeds_feed_settings['feed_type']):'recent_media';
$any_user_username = (isset($apifeeds_feed_settings['any_user_username']) && $apifeeds_feed_settings['any_user_username'] != '')?esc_attr($apifeeds_feed_settings['any_user_username']):'';

$hashtag_name = (isset($apifeeds_feed_settings['hashtag_name']) && $apifeeds_feed_settings['hashtag_name'] != '')?esc_attr($apifeeds_feed_settings['hashtag_name']):'';
$apifsettings = get_option( 'apif_settings' );
$username = !empty($apifsettings['username']) ? $apifsettings['username'] : ''; // your username
$access_token = !empty($apifsettings['access_token']) ? $apifsettings['access_token'] : '';

if($access_token != ''){
$instagram_feed_tbl = $wpdb->prefix.'instagram_feeds';
$id = $wpdb->query($wpdb->prepare(
		"
		INSERT INTO $instagram_feed_tbl
		( feed_settings )
		VALUES ( %s )
		",
        $feed_settings
	));

$lastid = $wpdb->insert_id;
if($id){
	if($feedtype == "any_user_timeline"){
	$res =  $this->get_feeds_by_type($apifeeds_feed_settings['feed_type'],$access_token,$any_user_username);
	/*$this->displayArr( $res );
	exit();*/
	  if(!empty($res)){
		$check = $this->save_feeds($lastid,$res,'add');
	  }
	  if($check){
	    $message_check = 1;
		}else{
		$message_check = 4;
		}
    }else if($feedtype == "hashtag"){
    	$res =  $this->get_feeds_by_type($apifeeds_feed_settings['feed_type'],$access_token,$hashtag_name);
       if(!empty($res)){
		$check = $this->save_feeds($lastid,$res,'add');
	   }
	  if($check){
	    $message_check = 1;
		}else{
		$message_check = 4;
		}
    }
    else{
	    $message_check = 1;
    }
	wp_redirect(admin_url().'admin.php?page=ap-instagram-feed-pro&message='.$message_check);
	exit();
}else{
	// $wpdb->show_errors();
	// die();
	if(isset($wpdb->last_error) && $wpdb->last_error !=''){
		$error_msg = $wpdb->last_error;
	}else{
		$error_msg = "No changes made.";
	}
	wp_redirect(admin_url().'admin.php?page=ap-instagram-feed-pro&message=8');
	exit();
}
}else{
	//$_SESSION['apif_message'] = __('Error: Please fill access token first from Instagram Settings Page.','accesspress-instagram-feed-pro');
	//$_SESSION['apif_success'] = 'false';
	wp_redirect(admin_url().'admin.php?page=ap-instagram-feed-pro&message=9');
	exit();
}
