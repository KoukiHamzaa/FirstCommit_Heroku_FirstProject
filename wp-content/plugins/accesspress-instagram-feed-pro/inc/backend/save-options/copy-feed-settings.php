<?php defined('ABSPATH') or die("No script kiddies please!");
$id = $_GET['if_id'];
global $wpdb;
$instagram_feed_tbl = $wpdb->prefix.'instagram_feeds';
$in_feed_settings = $wpdb->get_results("SELECT * FROM $instagram_feed_tbl where id = $id");
$feed_settings = $in_feed_settings[0]->feed_settings;
$apif_settings = unserialize($feed_settings);
$feedtype = (isset($apif_settings['feed_type']) && $apif_settings['feed_type'] != '')?esc_attr($apif_settings['feed_type']):'recent_media';
$any_user_username = (isset($apif_settings['any_user_username']) && $apif_settings['any_user_username'] != '')?esc_attr($apif_settings['any_user_username']):'';

$hashtag_name = (isset($apif_settings['hashtag_name']) && $apif_settings['hashtag_name'] != '')?esc_attr($apif_settings['hashtag_name']):'';

foreach($apif_settings as $key=>$val){
	
	$field_data_temp[$key] = array();
	if($key =='feed_name'){
		$field_data_temp[$key] = sanitize_text_field($val).'-copy';
	}else{
		$field_data_temp[$key] = sanitize_text_field($val);
	}
}
$feed_settings = maybe_serialize($field_data_temp);
$apifsettings = get_option( 'apif_settings' );
$username = !empty($apifsettings['username']) ? $apifsettings['username'] : ''; // your username
$access_token = !empty($apifsettings['access_token']) ? $apifsettings['access_token'] : '';

global $wpdb;
$instagram_feed_tbl= $wpdb->prefix.'instagram_feeds';
$feed_settings_sql = "INSERT INTO $instagram_feed_tbl (`feed_settings`) VALUES ('$feed_settings')";
$id = $wpdb->query($feed_settings_sql);
$lastid = $wpdb->insert_id;
if($id){
   if($feedtype == "any_user_timeline"){
	  $res =  $this->get_feeds_by_type($feedtype,$access_token,$any_user_username);
	  if(!empty($res)){
		$check = $this->save_feeds($lastid,$res,'add');
	  }
	  if($check){
		wp_redirect(admin_url().'admin.php?page=ap-instagram-feed-pro&message=3');
		}else{
		wp_redirect(admin_url().'admin.php?page=ap-instagram-feed-pro&message=4');
		}
    }else if($feedtype == "hashtag"){
    	$res =  $this->get_feeds_by_type($feedtype,$access_token,$hashtag_name);
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
		wp_redirect(admin_url().'admin.php?page=ap-instagram-feed-pro&message=5');
		
    }
}else{
	wp_redirect(admin_url().'admin.php?page=ap-instagram-feed-pro&message=6');	
}
exit();