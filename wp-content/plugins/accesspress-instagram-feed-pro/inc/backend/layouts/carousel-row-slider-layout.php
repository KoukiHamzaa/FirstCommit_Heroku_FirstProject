<div class="apif-option-inner-wrapper">
    <div class='apif-masonary-layout-settings'>
        <div class='apif-column-settings-text'><?php echo _e('No of Slides', 'accesspress-instagram-feed-pro'); ?></div>
            <div class="apif-grid-layout-settings apif-column-settings-wrap">
            <label for='apif-largedesktop'><?php _e('Large Desktop <em>(Set column for large desktop view above 1366px)</em>',  'accesspress-instagram-feed-pro'); ?></label>
            <div class="apif-template-input-wrap clearfix">
                <div class="apif-slider-range-max"></div>
                <input type='int' id="apif-largedesktop" readonly name='instagram[carousel_row_slider_layout][columns][large_desktop]' key='any' class='apif-input-field' data-min='1' data-max='5' value="<?php if(isset($apif_settings['carousel_row_slider_layout']['columns']['large_desktop']) && $apif_settings['carousel_row_slider_layout']['columns']['large_desktop'] != '' ){ echo $apif_settings['carousel_row_slider_layout']['columns']['large_desktop']; }else{ echo "4"; } ?>" />
            </div>
        </div>
        <div class="apif-grid-layout-settings apif-column-settings-wrap">
            <label for='apif-desktop'><?php _e('Desktop',  'accesspress-instagram-feed-pro'); ?></label>
            <div class="apif-template-input-wrap clearfix">
                <div class="apif-slider-range-max"></div>
                <input type='int' id="apif-desktop" readonly name='instagram[carousel_row_slider_layout][columns][desktop]' key='any' class='apif-input-field' data-min='1' data-max='5' value="<?php if(isset($apif_settings['carousel_row_slider_layout']['columns']['desktop']) && $apif_settings['carousel_row_slider_layout']['columns']['desktop'] != '' ){ echo $apif_settings['carousel_row_slider_layout']['columns']['desktop']; }else{ echo "4"; } ?>" />
            </div>
        </div>
         <div class="apif-grid-layout-settings apif-column-settings-wrap">
          <label for='apif-tablet'><?php _e('Tablet', 'accesspress-instagram-feed-pro'); ?></label>
          <div class="apif-template-input-wrap clearfix">
              <div class="apif-slider-range-max"></div>
              <input type='int' id="apif-tablet" readonly name='instagram[carousel_row_slider_layout][columns][tablet]' key='any' class='apif-input-field' data-min='1' data-max='3' value='<?php if(isset($apif_settings['carousel_row_slider_layout']['columns']['tablet']) && $apif_settings['carousel_row_slider_layout']['columns']['tablet'] != '' && intval($apif_settings['carousel_row_slider_layout']['columns']['tablet'])){ echo $apif_settings['carousel_row_slider_layout']['columns']['tablet']; }else{ echo "3"; } ?>' />
          </div>
      </div>
      <div class="apif-grid-layout-settings apif-column-settings-wrap">
          <label for="apif-mobile"><?php _e('Mobile', 'accesspress-instagram-feed-pro'); ?></label>
          <div class="apif-template-input-wrap clearfix">
              <div class="apif-slider-range-max"></div>
              <input type='int' id="apif-mobile" readonly name='instagram[carousel_row_slider_layout][columns][mobile]' key='any' class='apif-input-field' data-min='1' data-max='2' value='<?php if(isset($apif_settings['carousel_row_slider_layout']['columns']['mobile']) && $apif_settings['carousel_row_slider_layout']['columns']['mobile'] != '' && intval($apif_settings['carousel_row_slider_layout']['columns']['mobile'])){ echo $apif_settings['carousel_row_slider_layout']['columns']['mobile']; }else{ echo "1"; } ?>' />
          </div>
      </div>

    </div>
</div>
<div class="apif-option-inner-wrapper">
 <label class="label-control"><?php echo _e('Hover animation effect', 'accesspress-instagram-feed-pro'); ?> </label>
 <div class="apif-option-field">

<?php /* <select class="form-control" name="instagram[carousel_row_slider_animation_effect]">
    <option value='apif-top-to-bottom' <?php if(isset($apif_settings['carousel_row_slider_animation_effect'])){ selected( $apif_settings['carousel_row_slider_animation_effect'], 'apif-top-to-bottom' ); } ?> >Top to Bottom</option>
    <option value='apif-bottom-to-top' <?php if(isset($apif_settings['carousel_row_slider_animation_effect'])){ selected( $apif_settings['carousel_row_slider_animation_effect'], 'apif-bottom-to-top' ); } ?> >Bottom to Top</option>
    <option value='apif-left-to-right' <?php if(isset($apif_settings['carousel_row_slider_animation_effect'])){ selected( $apif_settings['carousel_row_slider_animation_effect'], 'apif-left-to-right' ); } ?> >Left to Right</option>
    <option value='apif-right-to-left' <?php if(isset($apif_settings['carousel_row_slider_animation_effect'])){ selected( $apif_settings['carousel_row_slider_animation_effect'], 'apif-right-to-left' ); } ?> >Right to Left</option>
    <option value="apif-img-holyshade" <?php if(isset($apif_settings['carousel_row_slider_animation_effect'])){ selected( $apif_settings['carousel_row_slider_animation_effect'], 'apif-img-holyshade' ); } ?> >Holy Shade</option>
    <option value="apif-img-crazylaylia" <?php if(isset($apif_settings['carousel_row_slider_animation_effect'])){ selected( $apif_settings['carousel_row_slider_animation_effect'], 'apif-img-crazylaylia' ); } ?> >Crazy Laylia</option>
    <option value="apif-img-creative" <?php if(isset($apif_settings['carousel_row_slider_animation_effect'])){ selected( $apif_settings['carousel_row_slider_animation_effect'], 'apif-img-creative' ); } ?> >Creative Overlay</option>
    <option value="apif-img-pleasure" <?php if(isset($apif_settings['carousel_row_slider_animation_effect'])){ selected( $apif_settings['carousel_row_slider_animation_effect'], 'apif-img-pleasure' ); } ?> >Pleasure View</option>
    <option value="apif-img-sweetmarley" <?php if(isset($apif_settings['carousel_row_slider_animation_effect'])){ selected( $apif_settings['carousel_row_slider_animation_effect'], 'apif-img-sweetmarley' ); } ?> >Sweet Marley</option>
    <option value="apif-img-freshbubba" <?php if(isset($apif_settings['carousel_row_slider_animation_effect'])){ selected( $apif_settings['carousel_row_slider_animation_effect'], 'apif-img-freshbubba' ); } ?> >Fresh Bubba</option>
    <option value="apif-img-sillychicho" <?php if(isset($apif_settings['carousel_row_slider_animation_effect'])){ selected( $apif_settings['carousel_row_slider_animation_effect'], 'apif-img-sillychicho' ); } ?> >Silly Chicho</option>
    <option value="apif-img-tender" <?php if(isset($apif_settings['carousel_row_slider_animation_effect'])){ selected( $apif_settings['carousel_row_slider_animation_effect'], 'apif-img-tender' ); } ?>>Tender Hera</option>
    <option value="apif-img-jolly" <?php if(isset($apif_settings['carousel_row_slider_animation_effect'])){ selected( $apif_settings['carousel_row_slider_animation_effect'], 'apif-img-jolly' ); } ?> >Jolly Winston</option>
    <option value="apif-img-strongapollo" <?php if(isset($apif_settings['carousel_row_slider_animation_effect'])){ selected( $apif_settings['carousel_row_slider_animation_effect'], 'apif-img-strongapollo' ); } ?> >Strong Apollo</option>
    <option value="apif-img-darkkiraview" <?php if(isset($apif_settings['carousel_row_slider_animation_effect'])){ selected( $apif_settings['carousel_row_slider_animation_effect'], 'apif-img-darkkiraview' ); } ?> >Dark Kira Overlay</option>
    <option value="apif-img-dynamicjazz" <?php if(isset($apif_settings['carousel_row_slider_animation_effect'])){ selected( $apif_settings['carousel_row_slider_animation_effect'], 'apif-img-dynamicjazz' ); } ?> >Dynamic Jazz</option>
</select> */ ?>
<?php 
$carousel_rowanimation = (isset($apif_settings['carousel_row_slider_animation_effect']) && $apif_settings['carousel_row_slider_animation_effect'] != '')?esc_attr($apif_settings['carousel_row_slider_animation_effect']):'apif-top-to-bottom';
?>
<div class="apif-option-note"><?php _e('Note: Using thumbnail size image is not applicable for hover animation so please use large or medium image size.', 'accesspress-instagram-feed-pro'); ?></div>
<div class="apif-hoveranimation-wrapper">
<label class="apif-hover-layouts apif-top-to-bottom apif-small-size-display">
    <input type="checkbox" name="instagram[carousel_row_slider_animation_effect]" value="apif-top-to-bottom" class="apif-form-field apif-normal-checkbox" <?php if($carousel_rowanimation == "apif-top-to-bottom") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Top to Bottom</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-bottom-to-top apif-small-size-display">
    <input type="checkbox" name="instagram[carousel_row_slider_animation_effect]" value="apif-bottom-to-top" class="apif-form-field apif-normal-checkbox" <?php if($carousel_rowanimation == "apif-bottom-to-top") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Bottom to Top</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-left-to-right apif-small-size-display">
    <input type="checkbox" name="instagram[carousel_row_slider_animation_effect]" value="apif-left-to-right" class="apif-form-field apif-normal-checkbox" <?php if($carousel_rowanimation == "apif-left-to-right") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Left To Right</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-right-to-left apif-small-size-display">
    <input type="checkbox" name="instagram[carousel_row_slider_animation_effect]" value="apif-right-to-left" class="apif-form-field apif-normal-checkbox" <?php if($carousel_rowanimation == "apif-right-to-left") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Right To Left</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>

<label class="apif-hover-layouts apif-img-holyshade apif-small-size-display">
    <input type="checkbox" name="instagram[carousel_row_slider_animation_effect]" value="apif-img-holyshade" class="apif-form-field apif-normal-checkbox" <?php if($carousel_rowanimation == "apif-img-holyshade") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Holy Shade</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>

<label class="apif-hover-layouts apif-img-crazylaylia apif-small-size-display">
    <input type="checkbox" name="instagram[carousel_row_slider_animation_effect]" value="apif-img-crazylaylia" class="apif-form-field apif-normal-checkbox" <?php if($carousel_rowanimation == "apif-img-crazylaylia") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Crazy Laylia</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>

<label class="apif-hover-layouts apif-img-creative apif-small-size-display">
    <input type="checkbox" name="instagram[carousel_row_slider_animation_effect]" value="apif-img-creative" class="apif-form-field apif-normal-checkbox" <?php if($carousel_rowanimation == "apif-img-creative") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Creative Overlay</span>
    <?php 
    $overlay = "creative";
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation2.php' );
    ?>
</label>

<label class="apif-hover-layouts apif-img-pleasure apif-small-size-display">
    <input type="checkbox" name="instagram[carousel_row_slider_animation_effect]" value="apif-img-pleasure" class="apif-form-field apif-normal-checkbox" <?php if($carousel_rowanimation == "apif-img-pleasure") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Pleasure View</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>

<label class="apif-hover-layouts apif-img-sweetmarley apif-small-size-display">
    <input type="checkbox" name="instagram[carousel_row_slider_animation_effect]" value="apif-img-sweetmarley" class="apif-form-field apif-normal-checkbox" <?php if($carousel_rowanimation == "apif-img-sweetmarley") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Sweet Marley</span>
    <?php 
     $overlay = "sweetmarley";
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation3.php' );
    ?>
</label>

<label class="apif-hover-layouts apif-img-freshbubba apif-small-size-display">
    <input type="checkbox" name="instagram[carousel_row_slider_animation_effect]" value="apif-img-freshbubba" class="apif-form-field apif-normal-checkbox" <?php if($carousel_rowanimation == "apif-img-freshbubba") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Fresh Bubba</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>

<label class="apif-hover-layouts apif-img-sillychicho apif-small-size-display">
    <input type="checkbox" name="instagram[carousel_row_slider_animation_effect]" value="apif-img-sillychicho" class="apif-form-field apif-normal-checkbox" <?php if($carousel_rowanimation == "apif-img-sillychicho") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Silly Chicho</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-img-tender apif-small-size-display">
    <input type="checkbox" name="instagram[carousel_row_slider_animation_effect]" value="apif-img-tender" class="apif-form-field apif-normal-checkbox" <?php if($carousel_rowanimation == "apif-img-tender") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Tender Hera</span>
    <?php 
    $overlay = "tender";
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation3.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-img-jolly apif-small-size-display">
    <input type="checkbox" name="instagram[carousel_row_slider_animation_effect]" value="apif-img-jolly" class="apif-form-field apif-normal-checkbox" <?php if($carousel_rowanimation == "apif-img-jolly") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Jolly Winston</span>
    <?php 
    $overlay = "jolly";
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation3.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-img-strongapollo apif-small-size-display">
    <input type="checkbox" name="instagram[carousel_row_slider_animation_effect]" value="apif-img-strongapollo" class="apif-form-field apif-normal-checkbox" <?php if($carousel_rowanimation == "apif-img-strongapollo") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Strong Apollo</span>
    <?php 
    $overlay = "strongapollo";
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation3.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-img-darkkiraview apif-small-size-display">
    <input type="checkbox" name="instagram[carousel_row_slider_animation_effect]" value="apif-img-darkkiraview" class="apif-form-field apif-normal-checkbox" <?php if($carousel_rowanimation == "apif-img-darkkiraview") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Dark Kira Overlay</span>
    <?php 
    $overlay = "darkkiraview";
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation3.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-img-dynamicjazz apif-small-size-display">
    <input type="checkbox" name="instagram[carousel_row_slider_animation_effect]" value="apif-img-dynamicjazz" class="apif-form-field apif-normal-checkbox" <?php if($carousel_rowanimation == "apif-img-dynamicjazz") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Dynamic Jazz</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>
</div>
</div>
</div>
<div class="apif-option-inner-wrapper">
   <label class="label-control"><?php echo _e('AutoPlay', 'accesspress-instagram-feed-pro'); ?> </label>
   <div class="apif-option-field">
   <select class="form-control" name="instagram[carousel_row_slider_layout][autoplay]">
    <option value='true' <?php if(isset($apif_settings['carousel_row_slider_layout']['autoplay'])){ selected( $apif_settings['carousel_row_slider_layout']['autoplay'], 'true' ); } ?> >True</option>
    <option value='false' <?php if(isset($apif_settings['carousel_row_slider_layout']['autoplay'])){ selected( $apif_settings['carousel_row_slider_layout']['autoplay'], 'false' ); } ?> >false</option>
  </select>
   <div class="apif-option-note"><?php echo _e('By default, pager is set to false.', 'accesspress-instagram-feed-pro' ); ?></div>
  </div>
</div>
<div class="apif-option-inner-wrapper">
   <label class="label-control"><?php echo _e('Auto Play Speed', 'accesspress-instagram-feed-pro'); ?> </label>
    <div class="apif-option-field">
   <input type="number" name="instagram[carousel_row_slider_layout][autoplay_speed]" value="<?php if(isset($apif_settings['carousel_row_slider_layout']['autoplay_speed']) && $apif_settings['carousel_row_slider_layout']['autoplay_speed'] != '' ){ echo $apif_settings['carousel_row_slider_layout']['autoplay_speed']; } ?>" placeholder="2000"/> <em>ms</em>
    </div>
</div>
<div class="apif-option-inner-wrapper">
   <label class="label-control"><?php echo _e('Pager', 'accesspress-instagram-feed-pro'); ?> </label>
    <div class="apif-option-field">
   <select class="form-control" name="instagram[carousel_row_slider_layout][pager]">
       <option value='false' <?php if(isset($apif_settings['carousel_row_slider_layout']['pager'])){ selected( $apif_settings['carousel_row_slider_layout']['pager'], 'false' ); } ?> >false</option>
    <option value='true' <?php if(isset($apif_settings['carousel_row_slider_layout']['pager'])){ selected( $apif_settings['carousel_row_slider_layout']['pager'], 'true' ); } ?> >True</option>
  </select>
   </div>
</div>
<div class="apif-option-inner-wrapper">
   <label class="label-control"><?php echo _e('Controls', 'accesspress-instagram-feed-pro'); ?> </label>
   <div class="apif-option-field">
   <select class="form-control" name="instagram[carousel_row_slider_layout][controls]">
    <option value='true' <?php if(isset($apif_settings['carousel_row_slider_layout']['controls'])){ selected( $apif_settings['carousel_row_slider_layout']['controls'], 'true' ); } ?> >True</option>
    <option value='false' <?php if(isset($apif_settings['carousel_row_slider_layout']['controls'])){ selected( $apif_settings['carousel_row_slider_layout']['controls'], 'false' ); } ?> >false</option>
  </select>
    </div>
</div>
<div class="apif-option-inner-wrapper">
   <label class="label-control"><?php echo _e('Controls Type', 'accesspress-instagram-feed-pro'); ?> </label>
    <div class="apif-option-field">
   <select class="form-control" name="instagram[carousel_row_slider_layout][controls_type]">
    <option value='arrow' <?php if(isset($apif_settings['carousel_row_slider_layout']['controls_type'])){ selected( $apif_settings['carousel_row_slider_layout']['controls_type'], 'arrow' ); } ?> >Arrow</option>
    <option value='text' <?php if(isset($apif_settings['carousel_row_slider_layout']['controls_type'])){ selected( $apif_settings['carousel_row_slider_layout']['controls_type'], 'text' ); } ?> >Text</option>
  </select>
   <div class="apif-option-note"><?php echo _e('To set arrow or text control type,you need to set above option "Controls" as true always.', 'accesspress-instagram-feed-pro' ); ?></div>
    </div>
</div>
<div class="apif-option-inner-wrapper">
    <label class="label-control"> <?php _e('Next Text', 'accesspress-instagram-feed-pro') ?> </label>
    <div class="apif-option-field">
        <input type="text" class='apif-slider-layout-settings-next-previous-text' name="instagram[carousel_row_slider_layout][next_text]" value="<?php if(isset($apif_settings['carousel_row_slider_layout']['next_text'])) { echo esc_attr($apif_settings['carousel_row_slider_layout']['next_text']); } ?> "/>
        <div class="apif-option-note"><?php echo _e('Please enter your own next text here.', 'accesspress-instagram-feed-pro' ); ?>
        </div>
    </div>
</div>

<div class="apif-option-inner-wrapper">
    <label class="label-control"> <?php _e('Previous text', 'accesspress-instagram-feed-pro') ?> </label>
    <div class="apif-option-field">
        <input type="text" class='apif-slider-layout-settings-next-previous-text' name="instagram[carousel_row_slider_layout][previous_text]" value="<?php if(isset($apif_settings['carousel_row_slider_layout']['previous_text'])) { echo esc_attr($apif_settings['carousel_row_slider_layout']['previous_text']); } ?> "/>
        <div class="apif-option-note"><?php echo _e('Please enter your own previous text here.', 'accesspress-instagram-feed-pro' ); ?></div>
    </div>
</div>
 <div class="apif-option-inner-wrapper">
 <h3>Custom Settings</h3>
    <label class="label-control"> <?php _e('Arrow Background color', 'accesspress-instagram-feed-pro') ?> </label>
    <div class="apif-option-field">
        <input type="text" class='apif-slider-layout-settings-next-previous-color' name="instagram[carousel_row_slider_layout][arrow_bgcolor]" value="<?php if(isset($apif_settings['carousel_row_slider_layout']['arrow_bgcolor'])) { echo esc_attr($apif_settings['carousel_row_slider_layout']['arrow_bgcolor']); } ?> "/>
        <div class="apif-option-note"><?php echo _e('Please select the arrow background color.', 'accesspress-instagram-feed-pro' ); ?></div>
    </div>
</div>
 <div class="apif-option-inner-wrapper">
    <label class="label-control"> <?php _e('Arrow Background Hover color', 'accesspress-instagram-feed-pro') ?> </label>
    <div class="apif-option-field">
        <input type="text" class='apif-slider-layout-settings-next-previous-color' name="instagram[carousel_row_slider_layout][arrow_bghcolor]" value="<?php if(isset($apif_settings['carousel_row_slider_layout']['arrow_bghcolor'])) { echo esc_attr($apif_settings['carousel_row_slider_layout']['arrow_bghcolor']); } ?> "/>
        <div class="apif-option-note"><?php echo _e('Please select the narrow background hover color.', 'accesspress-instagram-feed-pro' ); ?></div>
    </div>
</div>
 <div class="apif-option-inner-wrapper">
    <label class="label-control"> <?php _e('Arrow Font Color', 'accesspress-instagram-feed-pro') ?> </label>
    <div class="apif-option-field">
        <input type="text" class='apif-slider-layout-settings-next-previous-color' name="instagram[carousel_row_slider_layout][arrow_color]" value="<?php if(isset($apif_settings['carousel_row_slider_layout']['arrow_color'])) { echo esc_attr($apif_settings['carousel_row_slider_layout']['arrow_color']); } ?> "/>
        <div class="apif-option-note"><?php echo _e('Please select the arrow color.', 'accesspress-instagram-feed-pro' ); ?></div>
    </div>
</div>
 <div class="apif-option-inner-wrapper">
    <label class="label-control"> <?php _e('Next/previous Background color', 'accesspress-instagram-feed-pro') ?> </label>
    <div class="apif-option-field">
        <input type="text" class='apif-slider-layout-settings-next-previous-color' name="instagram[carousel_row_slider_layout][bgcolor]" value="<?php if(isset($apif_settings['carousel_row_slider_layout']['bgcolor'])) { echo esc_attr($apif_settings['carousel_row_slider_layout']['bgcolor']); } ?> "/>
        <div class="apif-option-note"><?php echo _e('Please select the next/previous background color.', 'accesspress-instagram-feed-pro' ); ?></div>
    </div>
</div>
 <div class="apif-option-inner-wrapper">
    <label class="label-control"> <?php _e('Next/previous Background Hover Color', 'accesspress-instagram-feed-pro') ?> </label>
    <div class="apif-option-field">
        <input type="text" class='apif-slider-layout-settings-next-previous-color' name="instagram[carousel_row_slider_layout][bghcolor]" value="<?php if(isset($apif_settings['carousel_row_slider_layout']['bghcolor'])) { echo esc_attr($apif_settings['carousel_row_slider_layout']['bghcolor']); } ?> "/>
        <div class="apif-option-note"><?php echo _e('Please select the next/previous background hover color.', 'accesspress-instagram-feed-pro' ); ?></div>
    </div>
</div>
 <div class="apif-option-inner-wrapper">
    <label class="label-control"> <?php _e('Next/previous Font color', 'accesspress-instagram-feed-pro') ?> </label>
    <div class="apif-option-field">
        <input type="text" class='apif-slider-layout-settings-next-previous-color' name="instagram[carousel_row_slider_layout][fcolor]" value="<?php if(isset($apif_settings['carousel_row_slider_layout']['fcolor'])) { echo esc_attr($apif_settings['carousel_row_slider_layout']['fcolor']); } ?> "/>
        <div class="apif-option-note"><?php echo _e('Please select the next/previous font color.', 'accesspress-instagram-feed-pro' ); ?></div>
    </div>
</div>
