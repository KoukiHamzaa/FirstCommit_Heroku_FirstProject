<?php defined('ABSPATH') or die("No script kiddies please!");
$image_number = (isset($apif_settings['image_number']) && $apif_settings['image_number'] != '')?esc_attr($apif_settings['image_number']):'';
$image_size = (isset($apif_settings['image_size']) && $apif_settings['image_size'] != '')?esc_attr($apif_settings['image_size']):'standard_resolution';
?>
<!-- no of images to show -->
<div class="apif-option-inner-wrapper">
    <label class="label-control"><?php _e('No of Images to show ', 'accesspress-instagram-feed-pro'); ?></label>
    <div class="apif-option-field">
        <input class="form-control" type="number" name="instagram[image_number]" value="<?php echo $image_number;?>"/>
        <div class="apif-option-note"><?php _e('Please enter the number of images to display.', 'accesspress-instagram-feed-pro'); ?></div>
    </div>
</div>
<!-- image size -->
<div class="apif-option-inner-wrapper">
<label class="label-control"><?php echo _e( 'Image size', 'accesspress-instagram-feed-pro' ); ?></label>
<div class='apif-option-field'>
 <?php 
 if($feed_type == "any_user_timeline"){ 
  $attr = "";
  $textt = "";
  }else{
  $attr = "disabled";
  $textt = "(Deprecated)";
  }
  ?>
    <select name='instagram[image_size]' class="form-control apif-imgcustomsize">
        <option value='standard_resolution' <?php selected( $image_size, 'standard_resolution' ); ?>>Large Resolution</option>
        <option value='low_resolution' <?php selected( $image_size, 'low_resolution' ); ?>>Medium Resolution</option>
        <option value='thumbnail' <?php selected( $image_size, 'thumbnail' ); ?>>Thumbnail Resolution(150X150)</option>
        <option value='thumbnail-240' <?php selected( $image_size, 'thumbnail-240' ); ?> <?php echo $attr;?>>Thumbnail(240X240) <?php echo $textt;?></option>
         <option value='thumbnail-320' <?php selected( $image_size, 'thumbnail-320' ); ?> <?php echo $attr;?>>Thumbnail(320X320) <?php echo $textt;?></option>   
    </select>
    <div class="apif-option-note apif-option-note-alert notice notice-warning inline"><strong>Note:</strong> 
    <?php _e('Since instagram has deprecated the custom size thumbnail images for recent media and hashtag feed type. Now only large, medium adnd thumbnail size image is working. So please adjust accordingly. You can use medium or large option if you need higher size images. But it will not return 1:1 image.
     Whereas fo any user feed, you can use large,medium, thumbnail, thumbnail 240 px and thumbnail-320 px images. For some layouts,using thumbnail of 150px might display blur images so we suggest you to use large, medium resolution image size.','accesspress-instagram-feed-pro');?>
    </div>
</div>
</div>
<!-- show image link -->
<div class="apif-option-inner-wrapper">
    <label class="label-control apif-label-wrap apif-intagram-link-trigger" for="apif-instagram-link-trigger">
      <?php _e('Show instagram link', 'accesspress-instagram-feed-pro') ?>
    </label>
    <div class="apif-option-field">
      <label class="apif-switch">
       <input type="checkbox" name="instagram[instagram_image_link]" value="1" id='apif-instagram-link-trigger' class="apif-option-checkbx" <?php if(isset($apif_settings['instagram_image_link'])){ checked( $apif_settings['instagram_image_link'], '1'); } ?>/>
       <div class="apif-slider round"></div>
      </label>
    </div>
</div>

<!-- show image link -->
<div class="apif-option-inner-wrapper">
<label class="label-control apif-label-wrap" for="apif-instagram-active-profile-link"><?php _e('Disable Profile Link', 'accesspress-instagram-feed-pro') ?></label>
<div class="apif-option-field">
    <label class="apif-switch">
      <input type="checkbox" name="instagram[hide_profile_link]" value="1" id='apif-instagram-active-profile-link' class="apif-option-checkbx" <?php if(isset($apif_settings['hide_profile_link'])){ checked( $apif_settings[' hide_profile_link'], '1'); } ?>/>
      <div class="apif-slider round"></div>
    </label>
<div class="apif-option-note"><?php _e('Check this option if you want to disable the profile link on click profile username. By Default, user profile link is enabled.','accesspress-instagram-feed-pro');?></div>
</div>
</div>
 <!-- show user profile image -->
<div class="apif-option-inner-wrapper">
    <label class="label-control apif-label-wrap apif-intagram-user-image-trigger" for="apif-intagram-user-image-trigger"><?php _e('Show User Profile Image', 'accesspress-instagram-feed-pro') ?></label>
    <div class="apif-option-field">
      <label class="apif-switch">
      <input type="checkbox" name="instagram[instagram_user_link]" value="1" id='apif-intagram-user-image-trigger' class="apif-option-checkbx" <?php if(isset($apif_settings['instagram_user_link'])){ checked( $apif_settings['instagram_user_link'], '1'); } ?>/>
      <div class="apif-slider round"></div>
      </label>
    </div>
</div>
<!-- show username -->
<div class="apif-option-inner-wrapper">
    <label class="label-control apif-label-wrap apif-intagram-user-name-trigger" for="apif-intagram-user-name-trigger"><?php _e('Show username', 'accesspress-instagram-feed-pro') ?></label>
    <div class="apif-option-field">
    <label class="apif-switch">
    <input type="checkbox" name="instagram[instagram_user_username]" value="1" id='apif-intagram-user-name-trigger' class="apif-option-checkbx" <?php if(isset($apif_settings['instagram_user_username'])){ checked( $apif_settings['instagram_user_username'], '1'); } ?>/>
     <div class="apif-slider round"></div>
    </label>
    </div>
</div>
<!-- imge like count show/hide-->
<div class="apif-option-inner-wrapper">
    <label class="label-control apif-label-wrap" for="apif-instagram-image-like-count"><?php _e('Show image Like count', 'accesspress-instagram-feed-pro') ?></label>
    <div class="apif-option-field">
     <label class="apif-switch">
    <input type="checkbox" id="apif-instagram-image-like-count" name="instagram[like_count]" value="1" class="apif-option-checkbx" <?php if(isset($apif_settings['like_count'])){ checked( $apif_settings['like_count'], '1'); } ?>/>
   <div class="apif-slider round"></div>
    </label>
    </div>
</div>
 <!-- image comment count show/hide -->
<div class="apif-option-inner-wrapper">
 <label class="label-control apif-label-wrap" for="apif-instagram-iamge-cmt-count"><?php _e('Show image comment Count', 'accesspress-instagram-feed-pro') ?></label>
<div class="apif-option-field">
 <label class="apif-switch">
   <input type="checkbox" name="instagram[comment_count]" value="1" id="apif-instagram-iamge-cmt-count" class="apif-option-checkbx" <?php if(isset($apif_settings['comment_count'])){ checked( $apif_settings['comment_count'], '1'); } ?>/>
    <div class="apif-slider round"></div>
  </label>
</div>
</div>
<!-- counter format -->
<div class='apif-option-inner-wrapper'>
    <label class="label-control"><?php _e('Counter Display Formats', 'accesspress-instagram-feed-pro' ); ?> </label>
    <div class="apif-option-field">
        <select name='instagram[counter_type_options]' class="form-control">
            <option value='1' <?php if(isset($apif_settings['counter_type_options'])){ selected( $apif_settings['counter_type_options'], '1' ); } ?> > <?php _e('numbers only(1200)', 'accesspress-instagram-feed-pro' ); ?></option>
            <option value='2' <?php if(isset($apif_settings['counter_type_options'])){ selected( $apif_settings['counter_type_options'], '2' ); } ?> > <?php _e('1,200', 'accesspress-instagram-feed-pro' ); ?></option>
            <option value='3' <?php if(isset($apif_settings['counter_type_options'])){ selected( $apif_settings['counter_type_options'], '3' ); } ?> > <?php _e('1K', 'accesspress-instagram-feed-pro' ); ?></option>
        </select>
        <div class="apif-option-note"><?php _e('Please select the number format you want to use.', 'accesspress-instagram-feed-pro'); ?></div>
    </div>
</div>