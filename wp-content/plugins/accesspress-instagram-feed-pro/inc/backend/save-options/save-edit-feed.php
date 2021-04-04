<?php
defined('ABSPATH') or die("No script kiddies please!");
global $wpdb;
$id = $_POST['if_id'];
/*echo "<pre>";
print_r($_POST);
echo "editt";
exit();*/
// if ( isset( $_POST['instagram'] ) ) {
$sanitized_values = $this->sanitize_array($_POST['instagram']);
$feed_settings = maybe_serialize($sanitized_values);
// }
$apif_feed_settings = unserialize($feed_settings);

$feedtype = (isset($apif_feed_settings['feed_type']) && $apif_feed_settings['feed_type'] != '')?esc_attr($apif_feed_settings['feed_type']):'recent_media';
 //echo $feedtype; 


$any_user_username = (isset($apif_feed_settings['any_user_username']) && $apif_feed_settings['any_user_username'] != '')?esc_attr($apif_feed_settings['any_user_username']):'';
$apifsettings = get_option( 'apif_settings' );
$username = !empty($apifsettings['username']) ? $apifsettings['username'] : ''; // your username
$access_token = !empty($apifsettings['access_token']) ? $apifsettings['access_token'] : '';
$instagram_feed_tbl = $wpdb->prefix.'instagram_feeds';
//get old data
$old_res = (array) $this->get_post_feeds($id);
$odefault_settings = unserialize($old_res['feed_settings']);
$feed_default_type = $odefault_settings['feed_type'];
$username_default  = $odefault_settings['any_user_username'];
//hasthag
$hashtag_name_default  = $odefault_settings['hashtag_name'];

$hashtag_name = (isset($apif_feed_settings['hashtag_name']) && $apif_feed_settings['hashtag_name'] != '')?esc_attr($apif_feed_settings['hashtag_name']):'';

$result  = $wpdb->update(
			$instagram_feed_tbl,
			array( 'feed_settings' => $feed_settings ),
			array( 'id' => $id ),
			array( '%s' ),
			array( '%d' )
		);
$nonce = $_POST['nonce'];
$check = true;
if($result == 1){
/*	echo $feedtype; //any_user_timeline
	echo $feed_default_type; //recent_media
	echo $any_user_username; //nepal_wonder
	echo $username_default; //myown
	exit();*/
    if($feedtype == "any_user_timeline"){

 /*   	  $wpdb->delete( APIF_Instagram_Feeds_Table, array( 'post_id'=> $id ), array( '%d' ) );
	         if($any_user_username != ''){
	         	  $res =  $this->get_feeds_by_type($feedtype,$access_token,$any_user_username);
	              if(!empty($res)){
				   $check = $this->save_feeds($id,$res,'add');
			      }
	         }*/

        if($feedtype == $feed_default_type && $any_user_username != $username_default ){
             $wpdb->delete( APIF_Instagram_Feeds_Table, array( 'post_id'=> $id ), array( '%d' ) );
             if($any_user_username != ''){
             	  $res =  $this->get_feeds_by_type($feedtype,$access_token,$any_user_username);
	              if(!empty($res)){
				   $check = $this->save_feeds($id,$res,'add');
			      }
             }
		}else if( $feedtype != $feed_default_type && $any_user_username != $username_default ){
           $wpdb->delete( APIF_Instagram_Feeds_Table, array( 'post_id'=> $id ), array( '%d' ) );
           if($any_user_username != ''){
             	  $res =  $this->get_feeds_by_type($feedtype,$access_token,$any_user_username);
	              if(!empty($res)){
				   $check = $this->save_feeds($id,$res,'add');
			      }
             }
		}else if( $feedtype != $feed_default_type && $any_user_username == $username_default ){
           $wpdb->delete( APIF_Instagram_Feeds_Table, array( 'post_id'=> $id ), array( '%d' ) );
           if($any_user_username != ''){
             	  $res =  $this->get_feeds_by_type($feedtype,$access_token,$any_user_username);
	              if(!empty($res)){
				   $check = $this->save_feeds($id,$res,'add');
			      }
             }
		}else if( $feedtype == $feed_default_type && $any_user_username == $username_default ){
          //here first get tha data if all exists on table
			$insta_posts = APIF_Instagram_Feeds_Table;
			$insta_medias = $wpdb->get_results("SELECT * FROM $insta_posts where post_id = $id");
			if(empty($insta_medias)){
              $wpdb->delete( APIF_Instagram_Feeds_Table, array( 'post_id'=> $id ), array( '%d' ) );
              if($any_user_username != ''){
             	  $res =  $this->get_feeds_by_type($feedtype,$access_token,$any_user_username);
	              if(!empty($res)){
				   $check = $this->save_feeds($id,$res,'add');
			      }
             }
			}else{
				$check = true;
			}
		}

	  if($check){
	         $message_check = 1;
		}else{
			$message_check = 2;
		}
    }else if($feedtype == "hashtag"){

/*    	     $wpdb->delete( APIF_Instagram_Feeds_Table, array( 'post_id'=> $id ), array( '%d' ) );
             if($hashtag_name != ''){
             	  $res =  $this->get_feeds_by_type($feedtype,$access_token,$hashtag_name);
	              if(!empty($res)){
				   $check = $this->save_feeds($id,$res,'add');
			      }
             }else{
             	$check = false;
             }*/

    	  if($feedtype == $feed_default_type && $hashtag_name != $hashtag_name_default ){
             $wpdb->delete( APIF_Instagram_Feeds_Table, array( 'post_id'=> $id ), array( '%d' ) );
             if($hashtag_name != ''){
             	  $res =  $this->get_feeds_by_type($feedtype,$access_token,$hashtag_name);
	              if(!empty($res)){
				   $check = $this->save_feeds($id,$res,'add');
			      }
             }
		}else if( $feedtype != $feed_default_type && $hashtag_name != $hashtag_name_default ){
           $wpdb->delete( APIF_Instagram_Feeds_Table, array( 'post_id'=> $id ), array( '%d' ) );
           if($hashtag_name != ''){
             	  $res =  $this->get_feeds_by_type($feedtype,$access_token,$hashtag_name);
	              if(!empty($res)){
				   $check = $this->save_feeds($id,$res,'add');
			      }
             }
		}else if( $feedtype != $feed_default_type && $hashtag_name == $hashtag_name_default ){
           $wpdb->delete( APIF_Instagram_Feeds_Table, array( 'post_id'=> $id ), array( '%d' ) );
           if($hashtag_name != ''){
             	  $res =  $this->get_feeds_by_type($feedtype,$access_token,$hashtag_name);
	              if(!empty($res)){
				   $check = $this->save_feeds($id,$res,'add');
			      }
             }
		}else if( $feedtype == $feed_default_type && $hashtag_name == $hashtag_name_default ){
          //here first get tha data if all exists on table
			$insta_posts = APIF_Instagram_Feeds_Table;
			$insta_medias = $wpdb->get_results("SELECT * FROM $insta_posts where post_id = $id");
			if(empty($insta_medias)){
              $wpdb->delete( APIF_Instagram_Feeds_Table, array( 'post_id'=> $id ), array( '%d' ) );
              if($any_user_username != ''){
             	  $res =  $this->get_feeds_by_type($feedtype,$access_token,$hashtag_name);
	              if(!empty($res)){
				   $check = $this->save_feeds($id,$res,'add');
			      }
             }
			}else{
				$check = true;
			}
		}

	  if($check){
	         $message_check = 1;
		}else{
			$message_check = 2;
		}


    }else{
	    $message_check = 1;
    }
	wp_redirect(admin_url().'admin.php?page=ap-instagram-feed-pro&action=edit_if&if_id='.$_POST['if_id'].'&_wpnonce='.$nonce.'&message='.$message_check);
	exit();
}else{
/*	if(isset($wpdb->last_error) && $wpdb->last_error !=''){
		$error_msg = $wpdb->last_error;
	}else{
		$error_msg = "No changes made.";
	}*/
	//$_SESSION['apif_message'] = __('Error: '.$error_msg,'accesspress-instagram-feed-pro');
	//$_SESSION['apif_success'] = 'false';
	wp_redirect(admin_url().'admin.php?page=ap-instagram-feed-pro&message=8');
	exit();
}