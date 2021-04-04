<?php defined('ABSPATH') or die("No script kiddies please!");
$apif_settings = get_option( 'apif_settings' );
?>
<div class="wrap">
<div class="apif-add-set-wrapper clearfix">
<div class="apif-panel">
<div class="apif-settings-header">

<div class="apif-logo">
    <img src="<?php echo APIF_IMAGE_DIR; ?>/instagram-2.png" alt="<?php esc_attr_e('AccessPress Instagram Feed', 'accesspress-instagram-feed-pro'); ?>" />
</div>

<div class="apif-socials">
    <p><?php _e('Follow us for new updates', 'accesspress-instagram-feed-pro') ?></p>
    <div class="ap-social-bttns">

        <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FAccessPress-Themes%2F1396595907277967&amp;width&amp;layout=button&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=35&amp;appId=1411139805828592" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:20px; width:50px " allowTransparency="true"></iframe>
        &nbsp;&nbsp;
        <a href="https://twitter.com/apthemes" class="twitter-follow-button" data-show-count="false" data-lang="en">Follow @apthemes</a>
        <script>!function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (!d.getElementById(id)) {
                js = d.createElement(s);
                js.id = id;
                js.src = "//platform.twitter.com/widgets.js";
                fjs.parentNode.insertBefore(js, fjs);
            }
        }(document, "script", "twitter-wjs");</script>
    </div>
</div>
<div class="apif-title"><?php _e('AccessPress Instagram Feed Pro', 'accesspress-instagram-feed-pro'); ?></div>
</div>

<?php 
if(isset($_GET['message'])){?>
<div class="apif-success-message">
<p><?php 
if($_GET['message'] == 1){
_e('Settings Saved Successfully.','accesspress-instagram-feed-pro');
}else if($_GET['message'] == 2){
 _e('Cache Cleared Successfully.','accesspress-instagram-feed-pro');   
}
?></p>
</div>
<?php }?>
<div class="apif-boards-wrapper">
<div class="metabox-holder">
<div id="optionsframework" class="postbox" style="float: left;">
    <div class="apif-header">
      <h3><?php _e('Instagram Settings', 'accesspress-instagram-feed-pro') ?></h3>
</div>
<form class="apif-settings-form" method="post" action="<?php echo admin_url() . 'admin-post.php' ?>">
<input type="hidden" name="action" value="apif_instagram_settings_action"/>
<?php
/**
 * Social Profiles
 * */
//include_once('boards/instagram-profiles.php');
?>

<div class="apif-boards-tabs" id="apif-board-social-profile-settings">
    <div class="apif-settings-wrapper-wrap"> 
        <!--Instagram-->
        <div class="apif-option-outer-wrapper">
                 <?php 
                        $username = '';
                        $user_id = '';
                        $access_token = '';
                        if(isset($_GET['access_token'])){
                            $access_token = $_GET['access_token'];
                            //$userarr = explode(".",$_GET['access_token']);
                           // $user_id = $userarr[0];
                            $url = 'https://api.instagram.com/v1/users/self/?access_token=' . $_GET['access_token'];
                            $content = wp_remote_get( $url );
                            if( !isset( $content->errors ) ){
                               $response = wp_remote_retrieve_body( $content );
                                $json = json_decode( $response, true );
                                if(!empty($json['data'])){
                                    $username = $json['data']['username'];
                                    $user_id = $json['data']['id'];
                                }
                            }
                        }else{
                           if(isset($apif_settings['username']) && $apif_settings['username'] !=''){
                            $username = $apif_settings['username'];
                           }
                           if(isset($apif_settings['user_id']) && $apif_settings['user_id'] !=''){
                            $user_id = $apif_settings['user_id'];
                           }
                           if(isset($apif_settings['access_token']) && $apif_settings['access_token'] !=''){
                            $access_token = $apif_settings['access_token'];
                           }
                        }
                        
                        ?>
            <div class="apif-option-extra">
                <div class="apif-option-inner-wrapper">
                    <label><?php _e('Instagram Username', 'accesspress-instagram-feed-pro'); ?></label>
                    <div class="apif-option-field">
                        <input type="text" name="instagram[username]" value="<?php echo esc_attr($username);?>"/>
                        <div class="apif-option-note"><?php _e('Note: If not loaded automatically after clicking <strong>Get Access Token</strong> button provided below, please enter the instagram username.', 'accesspress-instagram-feed-pro'); ?></div>
                    </div>
                </div>
                <div class="apif-option-inner-wrapper">
                    <label><?php _e('Instagram User ID(Optional)', 'accesspress-instagram-feed-pro'); ?></label>
                    <div class="apif-option-field">
                        <input type="text" id="userid" name="instagram[user_id]" value="<?php  echo esc_attr($user_id);?>"/>
                        <div class="apif-option-note"><?php _e('Note: If not loaded automatically after clicking <strong>Get Access Token</strong> button provided below, please get your instagram user id from the below access token input field, after receiving access token.The first numbers before "." (dot) is your instagram user id.', 'accesspress-instagram-feed-pro'); ?></div>
                    </div>
                </div>
                <div class="apif-option-inner-wrapper">
                    <label><?php _e('Instagram Access Token', 'accesspress-instagram-feed-pro'); ?></label>
                    <div class="apif-option-field">
                        <input type="text" id="accesstoken" name="instagram[access_token]" value="<?php echo esc_attr($access_token); ?>"/>
                        <div class="apif-option-note">
                            <?php _e('Note: Please enter the instagram Access Token.You can get this information from below link. If new access token not received in the above Instagram access token field, please copy the access token from the url above after access_token=', 'accesspress-instagram-feed-pro');
                            ?>
                            <?php 
                             $return_url = urlencode(admin_url('admin.php?page=apif-settings')) . '&response_type=token&state='. admin_url('admin.php?apif-settings');
                        /*  https://api.instagram.com/oauth/authorize/?client_id=54da896cf80343ecb0e356ac5479d9ec&scope=basic+public_content&redirect_uri=http://api.web-dorado.com/instagram/?return_url=<?php echo $new_url; 
                           $return_url = admin_url('admin.php?page=apif-settings') . '&response_type=token'; 
                            $redirect_uri = 'https://demo.accesspressthemes.com/wordpress-plugins/accesspress-instagram-feeds-pro/get_access_token/access_token.php';
                           new client id = 2e26528b804b40e0915be84e044f9990
                           <a href="https://api.instagram.com/oauth/authorize/?client_id=54da896cf80343ecb0e356ac5479d9ec&scope=basic+public_content&redirect_uri=http://api.web-dorado.com/instagram/?return_url=< ?php echo $new_url;?>">Get New Access Token</a> 
                               <a href="https://api.instagram.com/oauth/authorize/?client_id=2e26528b804b40e0915be84e044f9990&scope=basic+public_content&redirect_uri=<?php echo $redirect_uri;?>?return_url=<?php echo $return_url;?>"><?php _e('Get New Access Token', 'accesspress-instagram-feed-pro'); ?></a>
                           */
                            ?>
                            <div id="login_with_instagram">
                            <a href="https://api.instagram.com/oauth/authorize/?client_id=54da896cf80343ecb0e356ac5479d9ec&scope=basic+public_content&redirect_uri=http://api.web-dorado.com/instagram/?return_url=<?php echo $return_url; ?>">
                            <?php _e('Get New Access Token', 'accesspress-instagram-feed-pro'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="apif-option-inner-wrapper">
                    <label class="apif-label-wrap label-control" for="enablecache"><?php _e('Enable Cache', 'accesspress-instagram-feed-pro'); ?></label>
                    <div class="apif-option-field">
                      <label class="apif-switch">
                        <input type="checkbox" name="instagram[enable_cache]" id="enablecache" value="1" <?php if(isset($apif_settings['enable_cache'])){ checked($apif_settings['enable_cache'], '1'); } ?> />
                         <div class="apif-slider round"></div>
                       </label>
                        <div class="apif-option-note">
                            <?php _e('Please enable this option if you want to use the cache on the first load.', 'accesspress-instagram-feed-pro'); ?>
                        </div>
                    </div>
                </div>

                <div class="apif-option-inner-wrapper">
                    <label><?php _e('Cache Period', 'accesspress-instagram-feed-pro'); ?></label>
                    <div class="apif-option-field">
                        <input type="number" step="0.01" min='0' max='24' name="instagram[cache_period]" value="<?php if(isset($apif_settings['cache_period']) && $apif_settings['cache_period'] != ''){ echo $apif_settings['cache_period']; } ?>" />
                        <div class="apif-option-note">
                            <?php _e('Please set the value in hours only.', 'accesspress-instagram-feed-pro'); ?>
                        </div>
                    </div>
                </div>

                <div class="apif-option-inner-wrapper">
                    <label class="apif-label-wrap label-control" for="enablelinks"><?php _e('Enable Links for username and tags in image captions?', 'accesspress-instagram-feed-pro'); ?></label>
                    <div class="apif-option-field">
                     <label class="apif-switch">
                        <input type="checkbox" name="instagram[enable_links]" id="enablelinks" value="1" <?php if(isset($apif_settings['enable_links'])){ checked($apif_settings['enable_links'], '1'); } ?> />
                         <div class="apif-slider round"></div>
                       </label>
                        <div class="apif-option-note">
                            <?php _e('Please enable this option if you want to make tags and usernames clickable in image captions.', 'accesspress-instagram-feed-pro'); ?>
                        </div>
                    </div>
                </div>

            <?php
            /**
             * Nonce field
             * */
            wp_nonce_field('apif_instagram_settings_action', 'apif_instagram_settings_nonce');
            ?>
            <div class="apif-option-inner-wrapper ap-settings-submit-wrap">
                <input type="submit" class="button button-primary" value="Save Settings" name="ap_settings_submit"/>
                <?php $nonce_delete = wp_create_nonce('apif-delete-cache-nonce'); ?>
                <a href="<?php echo admin_url() . 'admin-post.php?action=apif_delete_cache&_wpnonce=' . $nonce_delete; ?>" onclick="return confirm('<?php _e('Are you sure you want to delete all cached feeds?', 'accesspress-instagram-feed-pro'); ?>')"><input type="button" class="button button-primary" value="Delete cache" name="ap_delete_cache" /></a>
            </div>

            </div>
        </div>

    </div>
</div>
</form>
</div><!--optionsframework-->
</div>
</div>
</div>
</div>
</div><!--div class wrap-->