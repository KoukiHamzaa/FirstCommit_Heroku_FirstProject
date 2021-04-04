<?php defined('ABSPATH') or die("No script kiddies please!");
$instagram_mosaic = (isset($apif_settings['instagram_mosaic']) && $apif_settings['instagram_mosaic'] != '')?esc_attr($apif_settings['instagram_mosaic']):'mosaic';
$lightbox_layout = (isset($apif_settings['lightbox_layout']) && $apif_settings['lightbox_layout'] != '')?esc_attr($apif_settings['lightbox_layout']):'apif_own_lightbox';
$theme_accent_color = (isset($apif_settings['theme_accent_color']) && $apif_settings['theme_accent_color'] != '')?esc_attr($apif_settings['theme_accent_color']):'';
$hover_image_text_color = (isset($apif_settings['hover_image_text_color']) && $apif_settings['hover_image_text_color'] != '')?esc_attr($apif_settings['hover_image_text_color']):'';
$hover_image_text_hcolor = (isset($apif_settings['hover_image_text_hcolor']) && $apif_settings['hover_image_text_hcolor'] != '')?esc_attr($apif_settings['hover_image_text_hcolor']):'';

$hover_image_comment_color = (isset($apif_settings['hover_image_comment_color']) && $apif_settings['hover_image_comment_color'] != '')?esc_attr($apif_settings['hover_image_comment_color']):'';
$hover_image_likes_color = (isset($apif_settings['hover_image_likes_color']) && $apif_settings['hover_image_likes_color'] != '')?esc_attr($apif_settings['hover_image_likes_color']):'';

$enable_comments = (isset($apif_settings['enable_comments']) && $apif_settings['enable_comments'] == 1)?1:0;
if($enable_comments == 1 || $lightbox_layout == "apif_own_lightbox"){
    $sclass = "";
}else{
    $sclass = "style='display:none;'";
}
?>
<!-- lightbox enable/disable -->
<div class='apif-option-inner-wrapper'>
    <label class="label-control apif-label-wrap" for="apif-instagram-enable-lightbox">
    <?php echo _e("Enable lightbox", "accesspress-instagram-feed-pro"); ?> 
    </label>
    <div class="apif-option-field">
      <label class="apif-switch">
        <input type="checkbox" name="instagram[enable_lightbox]" value="1" id="apif-instagram-enable-lightbox" class="apif-option-checkbx apif-lightbox-activation-trigger" <?php if(isset($apif_settings['enable_lightbox'])){ checked( $apif_settings['enable_lightbox'], '1'); } ?>/>
        <div class="apif-slider round"></div>
      </label>
      <div class="apif-option-note">Note: Lightbox feature won't work for grid rotator layout.</div>
    </div>
<!-- lightbox layouts -->
<div class='apif-lightbox-layouts' style='display:none'>
    <label class="label-control"><?php echo _e( 'Lightbox layout settings', 'accesspress-instagram-feed-pro' ); ?></label>
    <div class='apif-option-field'>
     <select class="form-control apif-lightbox_layout" name='instagram[lightbox_layout]'>
            <option value='classic' <?php selected( $lightbox_layout, 'classic' ); ?>>classic</option>
            <option value='swipe_box' <?php selected( $lightbox_layout, 'swipe_box' ); ?>>Swipe box</option>
            <option value='preety_photo' <?php selected( $lightbox_layout, 'preety_photo' ); ?>>Pretty photo</option>
            <option value='litbx_lightbox' <?php selected( $lightbox_layout, 'litbx_lightbox' ); ?>>Litbx lightbox</option>
            <option value='venobox_lightbox' <?php selected( $lightbox_layout, 'venobox_lightbox' ); ?>>Venobox lightbox</option>
            <option value='apif_own_lightbox' <?php selected( $lightbox_layout, 'apif_own_lightbox' ); ?>>Accesspress lightbox</option>
        </select>
    </div>
</div>
</div>
<div class="apif-option-inner-wrapper apif-comments-option-wrapper"<?php echo $sclass;?>>
<label class="label-control apif-label-wrap" for="apif-instagram-showcomments">
    <?php _e('Show Comments?', 'accesspress-instagram-feed-pro') ?>
</label>
<div class="apif-option-field">
<label class="apif-switch">
 <input type="checkbox" name="instagram[enable_comments]" value="1" id="apif-instagram-showcomments" class="apif-option-checkbx" <?php if(isset($enable_comments)){ checked( $enable_comments, '1'); } ?>/>
 <div class="apif-slider round"></div>
      </label>
 </div>
</div>

<!-- theme accent color -->
<div class='apif-option-inner-wrapper apif-themeaccent-option'>
    <label class="label-control"><?php _e('Theme accent color ', 'accesspress-instagram-feed-pro'); ?></label>
    <div class="apif-option-field">
        <input type="text" class='apif-colorpicker-option apif-theme-accent-color' name="instagram[theme_accent_color]" value="<?php echo esc_attr($theme_accent_color);?>" data-alpha="true"/>
        <div class="apif-option-note"><?php _e('Please select the color of theme. If not selected the default color will be used.', 'accesspress-instagram-feed-pro'); ?></div>
    </div>
</div>
<!-- hover image text color -->
<div class='apif-option-inner-wrapper'>
    <label class="label-control"><?php _e('Image Text color', 'accesspress-instagram-feed-pro'); ?></label>
    <div class="apif-option-field">
        <input type="text" class='apif-colorpicker-option apif-hover-image-text-color' name="instagram[hover_image_text_color]" value="<?php echo $hover_image_text_color; ?>"/>
        <div class="apif-option-note"><?php _e('Please select hover image text color such as for profile username. If not selected the default color will be used.', 'accesspress-instagram-feed-pro'); ?></div>
    </div>
</div>
<div class='apif-option-inner-wrapper'>
    <label class="label-control"><?php _e('Image Text Hover Color', 'accesspress-instagram-feed-pro'); ?></label>
    <div class="apif-option-field">
        <input type="text" class='apif-colorpicker-option apif-hover-image-text-color' name="instagram[hover_image_text_hcolor]" value="<?php echo $hover_image_text_hcolor; ?>"/>
        <div class="apif-option-note"><?php _e('Please select image text hover color i.e for profle user name. If not selected the default color will be used.', 'accesspress-instagram-feed-pro'); ?></div>
    </div>
</div>

<div class='apif-option-inner-wrapper'>
    <label class="label-control"><?php _e('Comment Count Color', 'accesspress-instagram-feed-pro'); ?></label>
    <div class="apif-option-field">
        <input type="text" class='apif-colorpicker-option apif-hover-image-text-color' name="instagram[hover_image_comment_color]" value="<?php echo $hover_image_comment_color; ?>"/>
        <div class="apif-option-note"><?php _e('Please select hover image comment count color such as for  comment count shown above image. If not selected the default color will be used.', 'accesspress-instagram-feed-pro'); ?></div>
    </div>
</div>

<div class='apif-option-inner-wrapper'>
    <label class="label-control"><?php _e('Likes Count Color', 'accesspress-instagram-feed-pro'); ?></label>
    <div class="apif-option-field">
        <input type="text" class='apif-colorpicker-option apif-hover-image-text-color' name="instagram[hover_image_likes_color]" value="<?php echo $hover_image_likes_color; ?>"/>
        <div class="apif-option-note"><?php _e('Please select hover image likes count color such as for  likes count shown above image. If not selected the default color will be used.', 'accesspress-instagram-feed-pro'); ?></div>
    </div>
</div>

<?php 
$social_share_enable = (isset($apif_settings['social_share']['enable_social_share']) && $apif_settings['social_share']['enable_social_share'] == 1)?1:0;
if($social_share_enable || $instagram_mosaic != 'mosaic' || $instagram_mosaic != 'grid_rotator'){
$style_class = "";
}else{
$style_class = "style='display:none;'";
}
if($social_share_enable){
$style_class1 = "";
}else{
$style_class1 = "style='display:none;'";
}
?>
<div class="apif-option-inner-wrapper apif-social-share-wrapper" <?php echo  $style_class;?>>
<label class="label-control apif-label-wrap" for="apif-show-socialshare">
    <?php _e('Enable Social Share?', 'accesspress-instagram-feed-pro') ?>
</label>
<div class="apif-option-field">
    <label class="apif-switch">
      <input type="checkbox" name="instagram[social_share][enable_social_share]" value="1" id="apif-show-socialshare" class="apif-social-share-trigger apif-option-checkbx" <?php if(isset($social_share_enable)){ checked( $social_share_enable, '1'); } ?>/>
     <div class="apif-slider round"></div>
    </label>
</div>
<div class="apif-more-social-share-icon-lists postbox" <?php echo $style_class1;?>> 
  <h4 class="hndle"><span><?php _e('Choose Social Media', 'accesspress-instagram-feed-pro') ?></span></h4>
  <div class="apif-option-inner-wrapper apif-sshare-row">
    <label class="label-control apif-label-wrap" for="apif-show-fb">
        <?php _e('Facebook', 'accesspress-instagram-feed-pro') ?>
    </label>
    <div class="apif-option-field">
     <label class="apif-switch">
      <input type="checkbox" name="instagram[social_share][facebook_icon]" id="apif-show-fb" value="1" <?php if(isset($apif_settings['social_share']['facebook_icon'])){ checked( $apif_settings['social_share']['facebook_icon'], '1'); } ?>/>
       <div class="apif-slider round"></div>
      </label>
    </div>
  </div>
  <div class="apif-option-inner-wrapper apif-sshare-row">
    <label class="label-control apif-label-wrap" for="apif-show-twitter">
        <?php _e('Twitter', 'accesspress-instagram-feed-pro') ?>
    </label>
    <div class="apif-option-field">
     <label class="apif-switch">
      <input type="checkbox" name="instagram[social_share][twiter_icon]" id="apif-show-twitter" value="1" <?php if(isset($apif_settings['social_share']['twiter_icon'])){ checked( $apif_settings['social_share']['twiter_icon'], '1'); } ?>/>
       <div class="apif-slider round"></div>
      </label>
      </div>
  </div>
   <div class="apif-option-inner-wrapper apif-sshare-row">
    <label class="label-control apif-label-wrap" for="apif-show-gplus">
        <?php _e('Google Plus', 'accesspress-instagram-feed-pro') ?>
    </label>
    <div class="apif-option-field">
     <label class="apif-switch">
      <input type="checkbox" name="instagram[social_share][google_plus_icon]" id="apif-show-gplus" value="1" <?php if(isset($apif_settings['social_share']['google_plus_icon'])){ checked( $apif_settings['social_share']['google_plus_icon'], '1'); } ?>/>
       <div class="apif-slider round"></div>
      </label>
      </div>
  </div>
   <div class="apif-option-inner-wrapper apif-sshare-row">
    <label class="label-control apif-label-wrap" for="apif-show-pinterest">
        <?php _e('Pinterest', 'accesspress-instagram-feed-pro') ?>
    </label>
    <div class="apif-option-field">
     <label class="apif-switch">
      <input type="checkbox" name="instagram[social_share][pinterest_icon]" id="apif-show-pinterest" value="1" <?php if(isset($apif_settings['social_share']['pinterest_icon'])){ checked( $apif_settings['social_share']['pinterest_icon'], '1'); } ?>/>
       <div class="apif-slider round"></div>
      </label>
      </div>
  </div>
</div>
</div>

