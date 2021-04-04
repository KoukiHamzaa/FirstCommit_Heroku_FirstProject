<?php defined('ABSPATH') or die("No script kiddies please!");
$feed_name = (isset($apif_settings['feed_name']) && $apif_settings['feed_name'] != '')?esc_attr($apif_settings['feed_name']):'';
$feed_type = (isset($apif_settings['feed_type']) && $apif_settings['feed_type'] != '')?esc_attr($apif_settings['feed_type']):'recent_media';
$modified_date = date( 'Y-m-d H:i:s:u' );
?>
<!-- Feed name  -->
<div class="apif-option-inner-wrapper">
    <label class="label-control"><?php _e('Feed Name', 'accesspress-instagram-feed-pro'); ?></label>
    <div class="apif-input-field">
    <input type="text" class="form-control" name="instagram[feed_name]" value="<?php echo $feed_name;?>"/>
     <input type="hidden" class="form-control" name="instagram[updated_date]" value="<?php echo $modified_date;?>"/>
    </div>
</div>
<!-- feed type -->
<div class="apif-option-inner-wrapper">
    <label class="label-control"><?php _e('Feed type', 'accesspress-instagram-feed-pro') ?></label>
    <div class="apif-option-field">
    <select class="form-control apif-feed-type" name="instagram[feed_type]" class='apif-feed-type'>
     <option value='hashtag' <?php selected( $feed_type, 'hashtag' ); ?>><?php esc_attr_e( 'Hash Tag', 'accesspress-instagram-feed-pro' ); ?></option>
    <option value='personal_hashtag' <?php selected( $feed_type, 'personal_hashtag' ); ?>><?php esc_attr_e( 'Personal Account Hashtag Only', 'accesspress-instagram-feed-pro' ); ?></option>
     <option value='tag' <?php selected( $feed_type, 'tag' ); ?>><?php esc_attr_e( 'Tag', 'accesspress-instagram-feed-pro' ); ?></option>
     <option value='recent_media' <?php selected( $feed_type, 'recent_media' ); ?> ><?php esc_attr_e( 'My Recent Media', 'accesspress-instagram-feed-pro' ); ?></option>
     <option value='likes' <?php selected( $feed_type, 'likes' ); ?> disabled ><?php esc_attr_e( 'My likes(Depriciated)', 'accesspress-instagram-feed-pro' ); ?></option>
     <option value='any_user_timeline' <?php selected( $feed_type, 'any_user_timeline' ); ?>><?php esc_attr_e( 'Any User', 'accesspress-instagram-feed-pro' ); ?></option>
 </select>
     <div class="apif-option-note"><?php _e('Use HashTag option if tag field is not working since tag feature has been depreacted by Instagram so as per alternate soltution please use hashtag.', 'accesspress-instagram-feed-pro'); ?></div>
     </div>
</div>

<div class="apif-option-inner-wrapper apif-personal-hashtag-settings" style="display:<?php if($feed_type == 'personal_hashtag'){ echo 'block'; }else{ echo 'none'; } ?>;">
    <label class="label-control"><?php _e('Personal Account Hash Tag', 'accesspress-instagram-feed-pro'); ?></label>
    <div class="apif-option-field">
        <input class="form-control" type="text" name="instagram[personal_hashtag_name]" value="<?php if(isset($apif_settings['personal_hashtag_name'])){ echo esc_attr($apif_settings['personal_hashtag_name']); } ?>"/>
        <div class="apif-option-note"><?php _e('Please enter the hash tag you want to display from your feeds. eg - followmeto', 'accesspress-instagram-feed-pro'); ?></div>
    </div>
</div>



<div class="apif-option-inner-wrapper apif-hashtag-settings" style="display:<?php if($feed_type == 'hashtag'){ echo 'block'; }else{ echo 'none'; } ?>;">
<label class="label-control"><?php _e('Hash Tag', 'accesspress-instagram-feed-pro'); ?></label>
<div class="apif-option-field">
    <input class="form-control" type="text" name="instagram[hashtag_name]" value="<?php if(isset($apif_settings['hashtag_name'])){ echo esc_attr($apif_settings['hashtag_name']); } ?>"/>
    <div class="apif-option-note"><?php _e('Please enter the hash tag you want to display the feeds. eg - followmeto', 'accesspress-instagram-feed-pro'); ?></div>
</div>
</div>

<!-- Feed type using recent media -->
<div class="apif-option-inner-wrapper apif-recent-media-settings" style="display:<?php if($feed_type == 'recent_media'){ echo 'block'; }else{ echo 'none'; } ?>;">
<label class="label-control"><?php _e('Block feed:', 'accesspress-instagram-feed-pro'); ?></label>
<div class="apif-option-field">
    <input class="form-control" type="text" name="instagram[recent_media_blocked_caption_words]" value="<?php if(isset($apif_settings['recent_media_blocked_caption_words'])) { echo esc_attr($apif_settings['recent_media_blocked_caption_words']); } ?>"/>
    <div class="apif-option-note"><?php _e('Please enter the keywords of the caption in comma separated values that you want to block the image from being displayed.', 'accesspress-instagram-feed-pro'); ?></div>
</div>
</div>
 <div class="apif-option-inner-wrapper apif-recent-media-settings" style="display:<?php if($feed_type == 'recent_media'){ echo 'block'; }else{ echo 'none'; } ?>;">
    <label class="label-control"><?php _e('Allow feed', 'accesspress-instagram-feed-pro'); ?></label>
    <div class="apif-option-field">
        <input class="form-control" type="text" name="instagram[recent_media_allowed_caption_words]" value="<?php if(isset($apif_settings['recent_media_allowed_caption_words'])) { echo esc_attr($apif_settings['recent_media_allowed_caption_words']); } ?>"/>
        <div class="apif-option-note"><?php _e('Please enter the keywords of the caption in comma separated values that you want to allow the image from being displayed.', 'accesspress-instagram-feed-pro'); ?></div>
    </div>
</div>
<!-- feed type using username -->
<div class="apif-option-inner-wrapper apif-any-user-username-settings" style="display:<?php if($feed_type == 'any_user' || $feed_type == "any_user_timeline"){ echo 'block'; }else{ echo 'none'; } ?>;">
    <label class="label-control"><?php _e('Username', 'accesspress-instagram-feed-pro'); ?></label>
    <div class="apif-option-field">
        <input class="form-control" type="text" name="instagram[any_user_username]" value="<?php if(isset($apif_settings['any_user_username'])) { echo esc_attr($apif_settings['any_user_username']); } ?> "/>
        <div class="apif-option-note"><?php _e('Please enter the username of a person you want to display the feeds.', 'accesspress-instagram-feed-pro'); ?></div>
    </div>
</div>
<div class="apif-option-inner-wrapper apif-any-user-username-settings" style="display:<?php if($feed_type == 'any_user'  || $feed_type == "any_user_timeline"){ echo 'block'; }else{ echo 'none'; } ?>;">
    <label class="label-control"><?php _e('Block feed:', 'accesspress-instagram-feed-pro'); ?></label>
    <div class="apif-option-field">
        <input class="form-control" type="text" name="instagram[any_user_username_blocked_caption_words]" value="<?php if(isset($apif_settings['any_user_username_blocked_caption_words'])) { echo esc_attr($apif_settings['any_user_username_blocked_caption_words']); } ?>"/>
        <div class="apif-option-note"><?php _e('Please enter the keywords of the caption in comma separated values that you want to block the image from being displayed.', 'accesspress-instagram-feed-pro'); ?></div>
    </div>
</div>
<div class="apif-option-inner-wrapper apif-any-user-username-settings" style="display:<?php if($feed_type == 'any_user'  || $feed_type == "any_user_timeline"){ echo 'block'; }else{ echo 'none'; } ?>;">
<label class="label-control"><?php _e('Allow feed:', 'accesspress-instagram-feed-pro'); ?></label>
<div class="apif-option-field">
    <input class="form-control" type="text" name="instagram[any_user_username_allowed_caption_words]" value="<?php if(isset($apif_settings['any_user_username_allowed_caption_words'])) { echo esc_attr($apif_settings['any_user_username_allowed_caption_words']); } ?>"/>
    <div class="apif-option-note"><?php _e('Please enter the keywords of the caption in comma separated values that you want to allow the image from being displayed.', 'accesspress-instagram-feed-pro'); ?></div>
</div>
</div>


<!-- feed type using tag -->
<div class="apif-option-inner-wrapper apif-tag-settings" style="display:<?php if($feed_type == 'tag'){ echo 'block'; }else{ echo 'none'; } ?>;">
<label class="label-control"><?php _e('Tag', 'accesspress-instagram-feed-pro'); ?></label>
<div class="apif-option-field">
    <input class="form-control" type="text" name="instagram[tag_name]" value="<?php if(isset($apif_settings['tag_name'])){ echo esc_attr($apif_settings['tag_name']); } ?>"/>
    <div class="apif-option-note"><?php _e('Please enter the hash tag you want to display the feeds. eg - followmeto', 'accesspress-instagram-feed-pro'); ?></div>
</div>
</div>
<div class="apif-option-inner-wrapper apif-tag-settings apif-chashtag-settings" style='display:<?php if($feed_type == 'tag' || $feed_type == 'hashtag' || $feed_type == 'personal_hashtag'){ echo 'block'; }else{ echo 'none'; } ?>;'>
<label class="label-control"><?php _e('Block feed: ', 'accesspress-instagram-feed-pro'); ?></label>
<div class="apif-option-field">
<input class="form-control" type="text" name="instagram[tag_blocked_caption_words]" value="<?php if(isset($apif_settings['tag_blocked_caption_words'])){ echo esc_attr($apif_settings['tag_blocked_caption_words']); } ?>"/>
<div class="apif-option-note"><?php _e('Please enter the keywords of the caption in comma separated values that you want to block the image from being displayed.', 'accesspress-instagram-feed-pro'); ?></div>
</div>
</div>

<div class="apif-option-inner-wrapper apif-tag-settings apif-chashtag-settings" style='display:<?php if($feed_type == 'tag' || $feed_type == 'hashtag' || $feed_type == 'personal_hashtag'){ echo 'block'; }else{ echo 'none'; } ?>;'>
    <label class="label-control"><?php _e('Allow feed: ', 'accesspress-instagram-feed-pro'); ?></label>
    <div class="apif-option-field">
        <input class="form-control" type="text" name="instagram[tag_allowed_caption_words]" value="<?php if(isset($apif_settings['tag_allowed_caption_words'])){ echo esc_attr($apif_settings['tag_allowed_caption_words']); } ?>"/>
        <div class="apif-option-note"><?php _e('Please enter the keywords of the caption in comma separated values that you want to allow the images from being displayed.', 'accesspress-instagram-feed-pro'); ?></div>
    </div>
</div>

<div class="apif-option-inner-wrapper apif-tag-settings apif-hashtag-settings" style='display:<?php if($feed_type == 'tag'  || $feed_type == 'hashtag'){ echo 'block'; }else{ echo 'none'; } ?>;'>
    <label class="label-control"><?php _e('Block feed by usernames: ', 'accesspress-instagram-feed-pro'); ?></label>
    <div class="apif-option-field">
        <input class="form-control" type="text" name="instagram[tag_blocked_username_words]" value="<?php if(isset($apif_settings['tag_blocked_username_words'])){ echo esc_attr($apif_settings['tag_blocked_username_words']); } ?>"/>
        <div class="apif-option-note"><?php _e('Please enter the usernames in comma separated values that you want to block the image from being displayed.', 'accesspress-instagram-feed-pro'); ?></div>
    </div>
</div>

<div class="apif-option-inner-wrapper apif-tag-settings  apif-hashtag-settings" style='display:<?php if($feed_type == 'tag'  || $feed_type == 'hashtag'){ echo 'block'; }else{ echo 'none'; } ?>;'>
    <label class="label-control"><?php _e('Allow feed by usernames: ', 'accesspress-instagram-feed-pro'); ?></label>
    <div class="apif-option-field">
        <input class="form-control" type="text" name="instagram[tag_allowed_username_words]" value="<?php if(isset($apif_settings['tag_allowed_username_words'])){ echo esc_attr($apif_settings['tag_allowed_username_words']); } ?>"/>
        <div class="apif-option-note"><?php _e('Please enter the usernames in comma separated values that you want to allow the images from being displayed.', 'accesspress-instagram-feed-pro'); ?></div>
    </div>
</div>
<!-- user likes options -->
<div class="apif-option-inner-wrapper apif-user-like-settings" style='display:<?php if($feed_type == 'likes'){ echo 'block'; }else{ echo 'none'; } ?>;'>
    <label class="label-control"><?php _e('Block feed if image caption contains any of these words: ', 'accesspress-instagram-feed-pro'); ?></label>
    <div class="apif-option-field">
        <input class="form-control" type="text" name="instagram[user_likes_blocked_caption_words]" value="<?php if(isset($apif_settings['user_likes_blocked_caption_words'])){ echo esc_attr($apif_settings['user_likes_blocked_caption_words']); } ?>"/>
        <div class="apif-option-note"><?php _e('Please enter the keywords of the caption in comma separated values that you want to block the image from being displayed.', 'accesspress-instagram-feed-pro'); ?></div>
    </div>
</div>
<div class="apif-option-inner-wrapper apif-user-like-settings" style='display:<?php if($feed_type == 'likes'){ echo 'block'; }else{ echo 'none'; } ?>;'>
    <label class="label-control"><?php _e('Allow feed if image caption contains any of these words: ', 'accesspress-instagram-feed-pro'); ?></label>
    <div class="apif-option-field">
        <input class="form-control" type="text" name="instagram[user_likes_allowed_caption_words]" value="<?php if(isset($apif_settings['user_likes_allowed_caption_words'])){ echo esc_attr($apif_settings['user_likes_allowed_caption_words']); } ?>"/>
        <div class="apif-option-note"><?php _e('Please enter the keywords of the caption in comma separated values that you want to allow the images from being displayed.', 'accesspress-instagram-feed-pro'); ?></div>
    </div>
</div>

<div class="apif-option-inner-wrapper apif-user-like-settings" style='display:<?php if($feed_type == 'likes'){ echo 'block'; }else{ echo 'none'; } ?>;'>
    <label class="label-control"><?php _e('Block feed by usernames: ', 'accesspress-instagram-feed-pro'); ?></label>
    <div class="apif-option-field">
        <input class="form-control" type="text" name="instagram[user_likes_blocked_username_words]" value="<?php if(isset($apif_settings['user_likes_blocked_username_words'])){ echo esc_attr($apif_settings['user_likes_blocked_username_words']); } ?>"/>
        <div class="apif-option-note"><?php _e('Please enter the usernames in comma separated values that you want to block the image from being displayed.', 'accesspress-instagram-feed-pro'); ?></div>
    </div>
</div>

<div class="apif-option-inner-wrapper apif-user-like-settings" style='display:<?php if($feed_type == 'likes'){ echo 'block'; }else{ echo 'none'; } ?>;'>
    <label class="label-control"><?php _e('Allow feed by usernames: ', 'accesspress-instagram-feed-pro'); ?></label>
    <div class="apif-option-field">
        <input class="form-control" type="text" name="instagram[user_likes_allowed_username_words]" value="<?php if(isset($apif_settings['user_likes_allowed_username_words'])){ echo esc_attr($apif_settings['user_likes_allowed_username_words']); } ?>"/>
        <div class="apif-option-note"><?php _e('Please enter the usernames in comma separated values that you want to allow the images from being displayed.', 'accesspress-instagram-feed-pro'); ?></div>
    </div>
</div>
<!-- sort by -->
<div class="apif-option-inner-wrapper">
    <label class="label-control"><?php echo _e( 'Sort By', 'accesspress-instagram-feed-pro' ); ?></label>
    <div class='apif-option-field'>
        <select name='instagram[sort_by]' class="form-control">
            <option value='random' <?php if( isset($apif_settings['sort_by']) ){ selected( $apif_settings['sort_by'], 'random' ); } ?>>Random</option>
            <option value='likes' <?php if(isset($apif_settings['sort_by'])) { selected( $apif_settings['sort_by'], 'likes' ); } ?>>Likes</option>
            <option value='comments' <?php if( isset($apif_settings['sort_by']) ){ selected( $apif_settings['sort_by'], 'comments' ); } ?>>Comments</option>
            <option value='date' <?php if(isset($apif_settings['sort_by'])) { selected( $apif_settings['sort_by'], 'date' ); } ?>>Date</option>
        </select>
    </div>
</div>