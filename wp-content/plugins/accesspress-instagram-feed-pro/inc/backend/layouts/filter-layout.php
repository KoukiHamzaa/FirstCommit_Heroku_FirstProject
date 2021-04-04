<div class="apif-filter-common-option">
  <div class="apif-option-inner-wrapper">
    <div class='apif-grid-layout-settings'>
      <div class='apif-column-settings-text'><?php echo _e('No of Columns', 'accesspress-instagram-feed-pro'); ?></div>
    </div>
    <div class="apif-grid-layout-settings apif-column-settings-wrap">
      <label for='apif-desktop'><?php _e('Desktop', 'accesspress-instagram-feed-pro'); ?></label>
      <div class="apif-template-input-wrap clearfix">
        <div class="apif-slider-range-max"></div>
        <input type='int' id="apif-desktop" readonly name='instagram[filter_layout][columns_desktop]' key='any' class='apif-input-field' data-min='1' data-max='6' value="<?php if(isset($apif_settings['filter_layout']['columns_desktop']) && $apif_settings['filter_layout']['columns_desktop'] != '' ){ echo $apif_settings['filter_layout']['columns_desktop']; }else{ echo '3'; }?>" />
      </div>
    </div>
  </div>

  <!-- hover animation effect -->
  <div class="apif-option-inner-wrapper apif-animationselection-wrap" <?php if( isset($instagram_mosaic ) && $instagram_mosaic == "filter_template2" || $instagram_mosaic == "filter_template3") echo 'style="display:none;"';?>>
   <label class="label-control"><?php echo _e('Hover Animation Effect', 'accesspress-instagram-feed-pro'); ?> </label>
   <div class="apif-option-field">
    <?php /* <select class="form-control" name="instagram[filter_layout][hover_animation_effect]">
      <option value='apif-top-to-bottom' <?php if(isset($apif_settings['filter_layout']['hover_animation_effect'])){ selected( $apif_settings['filter_layout']['hover_animation_effect'], 'apif-top-to-bottom' ); } ?> >Top to Bottom</option>
      <option value='apif-bottom-to-top' <?php if(isset($apif_settings['filter_layout']['hover_animation_effect'])){ selected( $apif_settings['filter_layout']['hover_animation_effect'], 'apif-bottom-to-top' ); } ?> >Bottom to Top</option>
      <option value='apif-left-to-right' <?php if(isset($apif_settings['filter_layout']['hover_animation_effect'])){ selected( $apif_settings['filter_layout']['hover_animation_effect'], 'apif-left-to-right' ); } ?> >Left to Right</option>
      <option value='apif-right-to-left' <?php if(isset($apif_settings['filter_layout']['hover_animation_effect'])){ selected( $apif_settings['filter_layout']['hover_animation_effect'], 'apif-right-to-left' ); } ?> >Right to Left</option>
      <option value="apif-img-holyshade" <?php if(isset($apif_settings['filter_layout']['hover_animation_effect'])){ selected( $apif_settings['filter_layout']['hover_animation_effect'], 'apif-img-holyshade' ); } ?> >Holy Shade</option>
      <option value="apif-img-crazylaylia" <?php if(isset($apif_settings['filter_layout']['hover_animation_effect'])){ selected( $apif_settings['filter_layout']['hover_animation_effect'], 'apif-img-crazylaylia' ); } ?> >Crazy Laylia</option>
      <option value="apif-img-creative" <?php if(isset($apif_settings['filter_layout']['hover_animation_effect'])){ selected( $apif_settings['filter_layout']['hover_animation_effect'], 'apif-img-creative' ); } ?> >Creative Overlay</option>
      <option value="apif-img-pleasure" <?php if(isset($apif_settings['filter_layout']['hover_animation_effect'])){ selected( $apif_settings['filter_layout']['hover_animation_effect'], 'apif-img-pleasure' ); } ?> >Pleasure View</option>
      <option value="apif-img-sweetmarley" <?php if(isset($apif_settings['filter_layout']['hover_animation_effect'])){ selected( $apif_settings['filter_layout']['hover_animation_effect'], 'apif-img-sweetmarley' ); } ?> >Sweet Marley</option>
      <option value="apif-img-freshbubba" <?php if(isset($apif_settings['filter_layout']['hover_animation_effect'])){ selected( $apif_settings['filter_layout']['hover_animation_effect'], 'apif-img-freshbubba' ); } ?> >Fresh Bubba</option>
      <option value="apif-img-sillychicho" <?php if(isset($apif_settings['filter_layout']['hover_animation_effect'])){ selected( $apif_settings['filter_layout']['hover_animation_effect'], 'apif-img-sillychicho' ); } ?> >Silly Chicho</option>
      <option value="apif-img-tender" <?php if(isset($apif_settings['filter_layout']['hover_animation_effect'])){ selected( $apif_settings['filter_layout']['hover_animation_effect'], 'apif-img-tender' ); } ?>>Tender Hera</option>
      <option value="apif-img-jolly" <?php if(isset($apif_settings['filter_layout']['hover_animation_effect'])){ selected( $apif_settings['filter_layout']['hover_animation_effect'], 'apif-img-jolly' ); } ?> >Jolly Winston</option>
      <option value="apif-img-strongapollo" <?php if(isset($apif_settings['filter_layout']['hover_animation_effect'])){ selected( $apif_settings['filter_layout']['hover_animation_effect'], 'apif-img-strongapollo' ); } ?> >Strong Apollo</option>
      <option value="apif-img-darkkiraview" <?php if(isset($apif_settings['filter_layout']['hover_animation_effect'])){ selected( $apif_settings['filter_layout']['hover_animation_effect'], 'apif-img-darkkiraview' ); } ?> >Dark Kira Overlay</option>
      <option value="apif-img-dynamicjazz" <?php if(isset($apif_settings['filter_layout']['hover_animation_effect'])){ selected( $apif_settings['filter_layout']['hover_animation_effect'], 'apif-img-dynamicjazz' ); } ?> >Dynamic Jazz</option>
    </select> */?>
<div class="apif-option-note"><?php _e('Note: Using thumbnail size image is not applicable for hover animation so please use large or medium image size.', 'accesspress-instagram-feed-pro'); ?></div>
<?php 
$filteranimation = (isset($apif_settings['filter_layout']['hover_animation_effect']) && $apif_settings['filter_layout']['hover_animation_effect'] != '')?esc_attr($apif_settings['filter_layout']['hover_animation_effect']):'apif-top-to-bottom';
?>
    <div class="apif-hoveranimation-wrapper">
<label class="apif-hover-layouts apif-top-to-bottom apif-small-size-display">
    <input type="checkbox" name="instagram[filter_layout][hover_animation_effect]" value="apif-top-to-bottom" class="apif-form-field apif-normal-checkbox" <?php if($filteranimation == "apif-top-to-bottom") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Top to Bottom</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-bottom-to-top apif-small-size-display">
    <input type="checkbox" name="instagram[filter_layout][hover_animation_effect]" value="apif-bottom-to-top" class="apif-form-field apif-normal-checkbox" <?php if($filteranimation == "apif-bottom-to-top") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Bottom to Top</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-left-to-right apif-small-size-display">
    <input type="checkbox" name="instagram[filter_layout][hover_animation_effect]" value="apif-left-to-right" class="apif-form-field apif-normal-checkbox" <?php if($filteranimation == "apif-left-to-right") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Left To Right</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-right-to-left apif-small-size-display">
    <input type="checkbox" name="instagram[filter_layout][hover_animation_effect]" value="apif-right-to-left" class="apif-form-field apif-normal-checkbox" <?php if($filteranimation == "apif-right-to-left") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Right To Left</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>

<label class="apif-hover-layouts apif-img-holyshade apif-small-size-display">
    <input type="checkbox" name="instagram[filter_layout][hover_animation_effect]" value="apif-img-holyshade" class="apif-form-field apif-normal-checkbox" <?php if($filteranimation == "apif-img-holyshade") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Holy Shade</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>

<label class="apif-hover-layouts apif-img-crazylaylia apif-small-size-display">
    <input type="checkbox" name="instagram[filter_layout][hover_animation_effect]" value="apif-img-crazylaylia" class="apif-form-field apif-normal-checkbox" <?php if($filteranimation == "apif-img-crazylaylia") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Crazy Laylia</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>

<label class="apif-hover-layouts apif-img-creative apif-small-size-display">
    <input type="checkbox" name="instagram[filter_layout][hover_animation_effect]" value="apif-img-creative" class="apif-form-field apif-normal-checkbox" <?php if($filteranimation == "apif-img-creative") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Creative Overlay</span>
    <?php 
    $overlay = "creative";
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation2.php' );
    ?>
</label>

<label class="apif-hover-layouts apif-img-pleasure apif-small-size-display">
    <input type="checkbox" name="instagram[filter_layout][hover_animation_effect]" value="apif-img-pleasure" class="apif-form-field apif-normal-checkbox" <?php if($filteranimation == "apif-img-pleasure") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Pleasure View</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>

<label class="apif-hover-layouts apif-img-sweetmarley apif-small-size-display">
    <input type="checkbox" name="instagram[filter_layout][hover_animation_effect]" value="apif-img-sweetmarley" class="apif-form-field apif-normal-checkbox" <?php if($filteranimation == "apif-img-sweetmarley") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Sweet Marley</span>
    <?php 
     $overlay = "sweetmarley";
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation3.php' );
    ?>
</label>

<label class="apif-hover-layouts apif-img-freshbubba apif-small-size-display">
    <input type="checkbox" name="instagram[filter_layout][hover_animation_effect]" value="apif-img-freshbubba" class="apif-form-field apif-normal-checkbox" <?php if($filteranimation == "apif-img-freshbubba") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Fresh Bubba</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>

<label class="apif-hover-layouts apif-img-sillychicho apif-small-size-display">
    <input type="checkbox" name="instagram[filter_layout][hover_animation_effect]" value="apif-img-sillychicho" class="apif-form-field apif-normal-checkbox" <?php if($filteranimation == "apif-img-sillychicho") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Silly Chicho</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-img-tender apif-small-size-display">
    <input type="checkbox" name="instagram[filter_layout][hover_animation_effect]" value="apif-img-tender" class="apif-form-field apif-normal-checkbox" <?php if($filteranimation == "apif-img-tender") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Tender Hera</span>
    <?php 
    $overlay = "tender";
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation3.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-img-jolly apif-small-size-display">
    <input type="checkbox" name="instagram[filter_layout][hover_animation_effect]" value="apif-img-jolly" class="apif-form-field apif-normal-checkbox" <?php if($filteranimation == "apif-img-jolly") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Jolly Winston</span>
    <?php 
    $overlay = "jolly";
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation3.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-img-strongapollo apif-small-size-display">
    <input type="checkbox" name="instagram[filter_layout][hover_animation_effect]" value="apif-img-strongapollo" class="apif-form-field apif-normal-checkbox" <?php if($filteranimation == "apif-img-strongapollo") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Strong Apollo</span>
    <?php 
    $overlay = "strongapollo";
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation3.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-img-darkkiraview apif-small-size-display">
    <input type="checkbox" name="instagram[filter_layout][hover_animation_effect]" value="apif-img-darkkiraview" class="apif-form-field apif-normal-checkbox" <?php if($filteranimation == "apif-img-darkkiraview") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Dark Kira Overlay</span>
    <?php 
    $overlay = "darkkiraview";
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation3.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-img-dynamicjazz apif-small-size-display">
    <input type="checkbox" name="instagram[filter_layout][hover_animation_effect]" value="apif-img-dynamicjazz" class="apif-form-field apif-normal-checkbox" <?php if($filteranimation == "apif-img-dynamicjazz") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Dynamic Jazz</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>
</div>
  </div>
</div>
<!-- Loading effects -->

<div class="apif-filter-layout2" <?php if( isset($instagram_mosaic ) && $instagram_mosaic != "filter_template2") echo 'style="display:none;"';?>>
  <div class="apif-option-inner-wrapper">
    <label class="label-control apif-label-wrap" for="apif-filter-post-time"><?php _e('Hide Post Time?', 'accesspress-instagram-feed-pro') ?></label>
    <div class="apif-option-field">
      <label class="apif-switch">
        <input type="checkbox" name="instagram[filter_layout][hide_post_time]" value="1" id='apif-filter-post-time' class="apif-intagram-option-checkbox" <?php if(isset($apif_settings['filter_layout']['hide_post_time'])){ checked( $apif_settings['filter_layout']['hide_post_time'], '1'); } ?>/>
        <div class="apif-slider round"></div>
      </label>
      <div class="apif-option-note"><?php echo _e('Check this option in order to hide post time ago for this layout.', 'accesspress-instagram-feed-pro' ); ?></div>
    </div>
  </div>
</div>

<div class="apif-filter-layout3" <?php if( isset($instagram_mosaic ) && $instagram_mosaic != "filter_template3" && $instagram_mosaic != "filter_template2") echo 'style="display:none;"';?>>
  <div class="apif-option-inner-wrapper">
   <label class="label-control apif-label-wrap" for="filter-caption-mlayout"><?php echo _e('Hide Caption?', 'accesspress-instagram-feed-pro'); ?> </label>
   <div class="apif-option-field">
     <label class="apif-switch">
       <input type="checkbox" name="instagram[filter_layout][hide_caption]" value="1" id='filter-caption-mlayout' class="apif-intagram-option-checkbox" <?php if(isset($apif_settings['filter_layout']['hide_caption'])){ checked( $apif_settings['filter_layout']['hide_caption'], '1'); } ?>/>
       <div class="apif-slider round"></div>
     </label>
     <div class="apif-option-note"><?php echo _e('Check this option in order to hide caption for this layout.', 'accesspress-instagram-feed-pro' ); ?></div>
   </div>
 </div>
 <div class="apif-option-inner-wrapper">
   <label class="label-control"><?php echo _e('Caption Limit', 'accesspress-instagram-feed-pro'); ?> </label>
   <div class="apif-option-field">
    <input type="number" name='instagram[filter_layout][captionlimit]'  value="<?php if(isset($apif_settings['filter_layout']['captionlimit']) && $apif_settings['filter_layout']['captionlimit'] != '') echo $apif_settings['filter_layout']['captionlimit']; ?>"/>
    <div class="apif-option-note"><?php echo _e('Note: Display caption with specific character limit in number. Default is set to 150 for this layout.', 'accesspress-instagram-feed-pro' ); ?></div>
  </div>
</div>
</div>

<div class="apif-option-inner-wrapper">
 <label class="label-control"><?php _e('All Item Label', 'accesspress-instagram-feed-pro'); ?></label>
 <div class="apif-option-field">
  <input class="form-control" type="text" placeholder="All Feeds" name="instagram[filter_layout][all_item_label]" value="<?php if(isset($apif_settings['filter_layout']['all_item_label'])) { echo esc_attr($apif_settings['filter_layout']['all_item_label']); } ?>" />
  <div class="apif-option-note"><?php _e('Please enter value for All Feeds text. Default is set as All Feeds.', 'accesspress-instagram-feed-pro'); ?></div>
</div>
</div>
<div class="apif-option-inner-wrapper">
  <label class="label-control apif-label-wrap" for="showfeednum">
    <?php _e('Show Feed Numbers', 'accesspress-instagram-feed-pro') ?>
  </label>
  <div class="apif-option-field">
    <label class="apif-switch">
     <input type="checkbox" id="showfeednum" name="instagram[filter_layout][feednumber_show]" value="1" <?php if(isset($apif_settings['filter_layout']['feednumber_show'])){ checked( $apif_settings['filter_layout']['feednumber_show'], '1'); } ?>/>
     <div class="apif-slider round"></div>
   </label>
   <label class="apif-second-label" for="showfeednum">
     <?php _e('Show/Hide', 'accesspress-instagram-feed-pro'); ?>
   </label>
 </div>
</div>
<div class="apif-option-inner-wrapper">
 <label class="label-control"><?php echo _e('Choose Filter Options', 'accesspress-instagram-feed-pro'); ?> </label>
 <?php
 $filter_options = (isset($apif_settings['filter_layout']['filter_options']) && !empty($apif_settings['filter_layout']['filter_options']))?$apif_settings['filter_layout']['filter_options']:array();
 ?>
 <div class="apif-option-field">
   <select class="form-control" name="instagram[filter_layout][filter_options][]" multiple="multiple">
    <option value='image' <?php if(in_array('image',$filter_options)) echo 'selected="selected"'; ?>>Image Type</option>
    <option value='video' <?php if(in_array('video',$filter_options)) echo 'selected="selected"'; ?>>Video Type</option>
    <option value='carousel' <?php if(in_array('carousel',$filter_options)) echo 'selected="selected"'; ?>>Carousel Type</option>
  </select>
  <div class="apif-option-note"><?php _e('Multiple Selection field to display as filter title. On above selection, display image, video and carousel in filter layout separately.', 'accesspress-instagram-feed-pro'); ?></div>
</div>
</div>

<div class="apif-option-inner-wrapper">
  <div class="apif-animat-css-effects">
    <div class="clear-fix-row">
     <label class="label-control"> <?php _e('Loading Effects', 'accesspress-instagram-feed-pro'); ?> </label>
     <div class="apif-option-field">
       <select class="form-control" name="instagram[filter_layout][animation_effect]" class="input input--dropdown js--animations">
        <option value>None</option>
        <optgroup label="Attention Seekers">
          <option value="bounce"        <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'bounce' ); } ?> >bounce</option>
          <option value="flash"         <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'flash' ); } ?> >flash</option>
          <option value="pulse"         <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'pulse' ); } ?> >pulse</option>
          <option value="rubberBand"    <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'rubberBand' ); } ?> >rubberBand</option>
          <option value="shake"         <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'shake' ); } ?> >shake</option>
          <option value="swing"         <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'swing' ); } ?> >swing</option>
          <option value="tada"          <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'tada' ); } ?> >tada</option>
          <option value="wobble"        <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'wobble' ); } ?> >wobble</option>
          <option value="jello"         <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'jello' ); } ?>  >jello</option>
        </optgroup>

        <optgroup label="Bouncing Entrances">
          <option value="bounceIn"      <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'bounceIn' ); } ?>>bounceIn</option>
          <option value="bounceInDown"  <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'bounceInDown' ); } ?>>bounceInDown</option>
          <option value="bounceInLeft"  <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'bounceInLeft' ); } ?>>bounceInLeft</option>
          <option value="bounceInRight" <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'bounceInRight' ); } ?>>bounceInRight</option>
          <option value="bounceInUp"    <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'bounceInUp' ); } ?>>bounceInUp</option>
        </optgroup>

        <optgroup label="Bouncing Exits">
          <option value="bounceOut"     <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'bounceOut' ); } ?>>bounceOut</option>
          <option value="bounceOutDown" <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'bounceOutDown' ); } ?>>bounceOutDown</option>
          <option value="bounceOutLeft" <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'bounceOutLeft' ); } ?>>bounceOutLeft</option>
          <option value="bounceOutRight"<?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'bounceOutRight' ); } ?>>bounceOutRight</option>
          <option value="bounceOutUp"   <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'bounceOutUp' ); } ?>>bounceOutUp</option>
        </optgroup>

        <optgroup label="Fading Entrances">
          <option value="fadeIn"            <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'fadeIn' ); } ?>>fadeIn</option>
          <option value="fadeInDown"        <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'fadeInDown' ); } ?>>fadeInDown</option>
          <option value="fadeInDownBig"     <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'fadeInDownBig' ); } ?>>fadeInDownBig</option>
          <option value="fadeInLeft"        <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'fadeInLeft' ); } ?>>fadeInLeft</option>
          <option value="fadeInLeftBig"     <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'fadeInLeftBig' ); } ?>>fadeInLeftBig</option>
          <option value="fadeInRight"       <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'fadeInRight' ); } ?>>fadeInRight</option>
          <option value="fadeInRightBig"    <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'fadeInRightBig' ); } ?>>fadeInRightBig</option>
          <option value="fadeInUp"          <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'fadeInUp' ); } ?>>fadeInUp</option>
          <option value="fadeInUpBig"       <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'fadeInUpBig' ); } ?>>fadeInUpBig</option>
        </optgroup>

        <optgroup label="Fading Exits">
          <option value="fadeOut"           <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'fadeOut' ); } ?>>fadeOut</option>
          <option value="fadeOutDown"       <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'fadeOutDown' ); } ?>>fadeOutDown</option>
          <option value="fadeOutDownBig"    <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'fadeOutDownBig' ); } ?>>fadeOutDownBig</option>
          <option value="fadeOutLeft"       <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'fadeOutLeft' ); } ?>>fadeOutLeft</option>
          <option value="fadeOutLeftBig"    <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'fadeOutLeftBig' ); } ?>>fadeOutLeftBig</option>
          <option value="fadeOutRight"      <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'fadeOutRight' ); } ?>>fadeOutRight</option>
          <option value="fadeOutRightBig"   <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'fadeOutRightBig' ); } ?>>fadeOutRightBig</option>
          <option value="fadeOutUp"         <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'fadeOutUp' ); } ?>>fadeOutUp</option>
          <option value="fadeOutUpBig"      <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'fadeOutUpBig' ); } ?>>fadeOutUpBig</option>
        </optgroup>

        <optgroup label="Flippers">
          <option value="flip"          <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'flip' ); } ?>>flip</option>
          <option value="flipInX"       <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'flipInX' ); } ?>>flipInX</option>
          <option value="flipInY"       <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'flipInY' ); } ?>>flipInY</option>
          <option value="flipOutX"      <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'flipOutX' ); } ?>>flipOutX</option>
          <option value="flipOutY"      <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'flipOutY' ); } ?>>flipOutY</option>
        </optgroup>

        <optgroup label="Lightspeed">
          <option value="lightSpeedIn"      <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'lightSpeedIn' ); } ?>>lightSpeedIn</option>
          <option value="lightSpeedOut"     <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'lightSpeedOut' ); } ?>>lightSpeedOut</option>
        </optgroup>

        <optgroup label="Rotating Entrances">
          <option value="rotateIn"              <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'rotateIn' ); } ?>>rotateIn</option>
          <option value="rotateInDownLeft"      <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'rotateInDownLeft' ); } ?>>rotateInDownLeft</option>
          <option value="rotateInDownRight"     <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'rotateInDownRight' ); } ?>>rotateInDownRight</option>
          <option value="rotateInUpLeft"        <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'rotateInUpLeft' ); } ?>>rotateInUpLeft</option>
          <option value="rotateInUpRight"       <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'rotateInUpRight' ); } ?>>rotateInUpRight</option>
        </optgroup>

        <optgroup label="Rotating Exits">
          <option value="rotateOut"             <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'rotateOut' ); } ?>>rotateOut</option>
          <option value="rotateOutDownLeft"     <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'rotateOutDownLeft' ); } ?>>rotateOutDownLeft</option>
          <option value="rotateOutDownRight"    <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'rotateOutDownRight' ); } ?>>rotateOutDownRight</option>
          <option value="rotateOutUpLeft"       <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'rotateOutUpLeft' ); } ?>>rotateOutUpLeft</option>
          <option value="rotateOutUpRight"      <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'rotateOutUpRight' ); } ?>>rotateOutUpRight</option>
        </optgroup>

        <optgroup label="Sliding Entrances">
          <option value="slideInUp"     <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'slideInUp' ); } ?>>slideInUp</option>
          <option value="slideInDown"   <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'slideInDown' ); } ?>>slideInDown</option>
          <option value="slideInLeft"   <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'slideInLeft' ); } ?>>slideInLeft</option>
          <option value="slideInRight"  <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'slideInRight' ); } ?>>slideInRight</option>

        </optgroup>
        <optgroup label="Sliding Exits">
          <option value="slideOutUp"        <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'slideOutUp' ); } ?>>slideOutUp</option>
          <option value="slideOutDown"      <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'slideOutDown' ); } ?>>slideOutDown</option>
          <option value="slideOutLeft"      <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'slideOutLeft' ); } ?>>slideOutLeft</option>
          <option value="slideOutRight"     <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'slideOutRight' ); } ?>>slideOutRight</option>

        </optgroup>

        <optgroup label="Zoom Entrances">
          <option value="zoomIn"        <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'zoomIn' ); } ?>>zoomIn</option>
          <option value="zoomInDown"    <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'zoomInDown' ); } ?>>zoomInDown</option>
          <option value="zoomInLeft"    <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'zoomInLeft' ); } ?>>zoomInLeft</option>
          <option value="zoomInRight"   <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'zoomInRight' ); } ?>>zoomInRight</option>
          <option value="zoomInUp"      <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'zoomInUp' ); } ?>>zoomInUp</option>
        </optgroup>

        <optgroup label="Zoom Exits">
          <option value="zoomOut"       <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'zoomOut' ); } ?>>zoomOut</option>
          <option value="zoomOutDown"   <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'zoomOutDown' ); } ?>>zoomOutDown</option>
          <option value="zoomOutLeft"   <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'zoomOutLeft' ); } ?>>zoomOutLeft</option>
          <option value="zoomOutRight"  <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'zoomOutRight' ); } ?>>zoomOutRight</option>
          <option value="zoomOutUp"     <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'zoomOutUp' ); } ?>>zoomOutUp</option>
        </optgroup>

        <optgroup label="Specials">
          <option value="hinge"     <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'hinge' ); } ?>>hinge</option>
          <option value="rollIn"    <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'rollIn' ); } ?>>rollIn</option>
          <option value="rollOut"   <?php if(isset($apif_settings['filter_layout']['animation_effect'])){ selected( $apif_settings['filter_layout']['animation_effect'], 'rollOut' ); } ?>>rollOut</option>
        </optgroup>
      </select>
    </div>
  </div>
</div>
</div>

<div class="apif-option-inner-wrapper">
 <h3>Custom Settings</h3>
 <label class="label-control"> <?php _e('Active Background color', 'accesspress-instagram-feed-pro') ?> </label>
 <div class="apif-option-field">
  <input type="text" class='apif-theme-accent-color apif-colorpicker-option' name="instagram[filter_layout][active_bg_color]" value="<?php if(isset($apif_settings['filter_layout']['active_bg_color'])) { echo esc_attr($apif_settings['filter_layout']['active_bg_color']); } ?>" data-alpha="true"/>
  <div class="apif-option-note"><?php echo _e('Please select active background color.', 'accesspress-instagram-feed-pro' ); ?></div>
</div>
</div>
<div class="apif-option-inner-wrapper">
  <label class="label-control"> <?php _e('Active Font color', 'accesspress-instagram-feed-pro') ?> </label>
  <div class="apif-option-field">
    <input type="text" class='apif-theme-accent-color apif-colorpicker-option' name="instagram[filter_layout][active_font_color]" value="<?php if(isset($apif_settings['filter_layout']['active_font_color'])) { echo esc_attr($apif_settings['filter_layout']['active_font_color']); } ?> "/>
    <div class="apif-option-note"><?php echo _e('Please select active font color.', 'accesspress-instagram-feed-pro' ); ?></div>
  </div>
</div>
<div class="apif-option-inner-wrapper">
  <label class="label-control"> <?php _e('Filter Font color', 'accesspress-instagram-feed-pro') ?> </label>
  <div class="apif-option-field">
    <input type="text" class='apif-theme-accent-color apif-colorpicker-option' name="instagram[filter_layout][inactive_font_color]" value="<?php if(isset($apif_settings['filter_layout']['inactive_font_color'])) { echo esc_attr($apif_settings['filter_layout']['inactive_font_color']); } ?> "/>
    <div class="apif-option-note"><?php echo _e('Please select all filter title font color.', 'accesspress-instagram-feed-pro' ); ?></div>
  </div>
</div>
</div>