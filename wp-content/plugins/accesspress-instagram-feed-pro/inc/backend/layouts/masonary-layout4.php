<?php
$masonary_layout4_desktop = 3;
if(isset($apif_settings['masonary_layout4']['columns']['desktop']) && $apif_settings['masonary_layout4']['columns']['desktop'] != '' && intval($apif_settings['masonary_layout4']['columns']['desktop']) ){
$masonary_layout4_desktop = $apif_settings['masonary_layout4']['columns']['desktop'];
}else{  
  if(isset($apif_settings['masonary_layout4_no_of_columns']) && $apif_settings['masonary_layout4_no_of_columns'] != '' && intval($apif_settings['masonary_layout4_no_of_columns'])){
    $exploded = explode('apif-col-', $apif_settings['masonary_layout4_no_of_columns']);
    $masonary_layout4_desktop = $exploded[1]; 
  }
}
$masonary_layout4_large_desktop = (isset($apif_settings['masonary_layout4']['columns']['largedesktop']) && $apif_settings['masonary_layout4']['columns']['largedesktop'] != '')?esc_attr($apif_settings['masonary_layout4']['columns']['largedesktop']):'4';
?>
<div class="apif-option-inner-wrapper">
      <div class='apif-masonary-layout-settings'>
        <div class='apif-column-settings-text'><?php echo _e('No of Columns', 'accesspress-instagram-feed-pro'); ?></div>
         <div class="apif-grid-layout-settings apif-column-settings-wrap">
            <label for='apif-desktop'><?php _e('Large Desktop <em>(Set column for desktop view above 1366px)</em>', 'accesspress-instagram-feed-pro'); ?></label>
            <div class="apif-template-input-wrap clearfix">
                <div class="apif-slider-range-max"></div>
                <input type='int' id="apif-desktop" readonly name='instagram[masonary_layout4][columns][largedesktop]' key='any' class='apif-input-field' data-min='1' data-max='6' value="<?php echo $masonary_layout4_large_desktop;?>" />
            </div>
        </div>
        <div class="apif-grid-layout-settings apif-column-settings-wrap">
          <label for='apif-desktop'><?php _e('Desktop <em>(Set column for desktop view from 1024px to 1366px)</em>', 'accesspress-instagram-feed-pro'); ?></label>
          <div class="apif-template-input-wrap clearfix">
            <div class="apif-slider-range-max"></div>
            <input type='int' id="apif-desktop" readonly name='instagram[masonary_layout4][columns][desktop]' key='any' class='apif-input-field' data-min='1' data-max='6' value="4" />
          </div>
        </div>
        <div class="apif-grid-layout-settings apif-column-settings-wrap">
          <label for='apif-tablet'><?php _e('Tablet <em>(Set column for desktop view from 768px to 1024px)</em>', 'accesspress-instagram-feed-pro'); ?></label>
          <div class="apif-template-input-wrap clearfix">
            <div class="apif-slider-range-max"></div>
            <input type='int' id="apif-tablet" readonly name='instagram[masonary_layout4][columns][tablet]' key='any' class='apif-input-field' data-min='1' data-max='4' value='<?php if(isset($apif_settings['masonary_layout4']['columns']['tablet']) && $apif_settings['masonary_layout4']['columns']['tablet'] != '' && intval($apif_settings['masonary_layout4']['columns']['tablet'])){ echo $apif_settings['masonary_layout4']['columns']['tablet']; }else{ echo "3"; } ?>' />
          </div>
        </div>
        <div class="apif-grid-layout-settings apif-column-settings-wrap">
          <label for="apif-mobile"><?php _e('Mobile <em>(Set column for desktop view below 768px)</em>', 'accesspress-instagram-feed-pro'); ?></label>
          <div class="apif-template-input-wrap clearfix">
            <div class="apif-slider-range-max"></div>
            <input type='int' id="apif-mobile" readonly name='instagram[masonary_layout4][columns][mobile]' key='any' class='apif-input-field' data-min='1' data-max='2' value='<?php if(isset($apif_settings['masonary_layout4']['columns']['mobile']) && $apif_settings['masonary_layout4']['columns']['mobile'] != '' && intval($apif_settings['masonary_layout4']['columns']['mobile']) ){ echo $apif_settings['masonary_layout4']['columns']['mobile']; }else{ echo "2"; } ?>' />
          </div>
        </div>
      </div>
    </div>
    <!-- background color -->
    <div class='apif-option-inner-wrapper'>
      <label class='label-control'><?php echo _e('Background color', 'accesspress-instagram-feed-pro'); ?></label>
      <div class="apif-option-field">
        <input type="text" class='apif-masonary-layout-settings-background-color' name="instagram[masonary_layout4_background_color]" value="<?php if(isset($apif_settings['masonary_layout4_background_color'])) { echo esc_attr($apif_settings['masonary_layout4_background_color']); } ?> "/>
        <div class="apif-option-note"><?php _e('Please select the background color. If not selected default color will appear.', 'accesspress-instagram-feed-pro'); ?></div>
      </div>
    </div>
    <!-- background color ends -->

    <!-- text color -->
    <div class='apif-option-inner-wrapper'>
      <label class='label-control'><?php echo _e('Text color', 'accesspress-instagram-feed-pro'); ?></label>
      <div class="apif-option-field">
        <input type="text" class='apif-masonary-layout-settings-border-color' name="instagram[masonary_layout4_text_color]" value="<?php if(isset($apif_settings['masonary_layout4_text_color'])) { echo esc_attr($apif_settings['masonary_layout4_text_color']); } ?> "/>
        <div class="apif-option-note"><?php _e('Please enter the text color. If not selected default color will appear.', 'accesspress-instagram-feed-pro'); ?></div>
      </div>
    </div>
    <!-- text color ends -->

    <!-- border color -->
    <div class='apif-option-inner-wrapper'>
      <label class='label-control'><?php echo _e('Border color', 'accesspress-instagram-feed-pro'); ?></label>
      <div class="apif-option-field">
        <input type="text" class='apif-masonary-layout-settings-border-color' name="instagram[masonary_layout4_border_color]" value="<?php if(isset($apif_settings['masonary_layout4_border_color'])) { echo esc_attr($apif_settings['masonary_layout4_border_color']); } ?> "/>
        <div class="apif-option-note"><?php _e('Please enter the border color. If not selected default color will appear.', 'accesspress-instagram-feed-pro'); ?></div>
      </div>
    </div>
    <!-- border color ends -->

    <!-- border width -->
    <div class="apif-option-inner-wrapper">
      <label class="label-control"><?php _e('Border width', 'accesspress-instagram-feed-pro'); ?></label>
      <div class="apif-option-field">
        <input type="number" class='apif-masonary-layout-settings-border-width' name="instagram[masonary_layout4_border_width]" value="<?php if(isset($apif_settings['masonary_layout4_border_width'])) { echo esc_attr($apif_settings['masonary_layout4_border_width']); } ?>"/> px
        <div class="apif-option-note"><?php _e('Please enter the border width.', 'accesspress-instagram-feed-pro'); ?></div>
      </div>
    </div>
    <!-- border width ends -->

    <!-- Loading effects -->
    <div class="apif-option-inner-wrapper">
      <div class="apif-animat-css-effects">
        <div class="clear-fix-row">
         <label class="label-control"> <?php _e('Loading Effects', 'accesspress-instagram-feed-pro'); ?> </label>

         <select class="form-control" name="instagram[masonary_layout4_animate_css_effect]" class="input input--dropdown js--animations">
          <option value=''>None</option>
          <optgroup label="Attention Seekers">
            <option value="bounce"        <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'bounce' ); } ?> >bounce</option>
            <option value="flash"         <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'flash' ); } ?> >flash</option>
            <option value="pulse"         <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'pulse' ); } ?> >pulse</option>
            <option value="rubberBand"    <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'rubberBand' ); } ?> >rubberBand</option>
            <option value="shake"         <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'shake' ); } ?> >shake</option>
            <option value="swing"         <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'swing' ); } ?> >swing</option>
            <option value="tada"          <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'tada' ); } ?> >tada</option>
            <option value="wobble"        <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'wobble' ); } ?> >wobble</option>
            <option value="jello"         <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'jello' ); } ?>  >jello</option>
          </optgroup>

          <optgroup label="Bouncing Entrances">
            <option value="bounceIn"      <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'bounceIn' ); } ?>>bounceIn</option>
            <option value="bounceInDown"  <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'bounceInDown' ); } ?>>bounceInDown</option>
            <option value="bounceInLeft"  <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'bounceInLeft' ); } ?>>bounceInLeft</option>
            <option value="bounceInRight" <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'bounceInRight' ); } ?>>bounceInRight</option>
            <option value="bounceInUp"    <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'bounceInUp' ); } ?>>bounceInUp</option>
          </optgroup>

          <optgroup label="Bouncing Exits">
            <option value="bounceOut"     <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'bounceOut' ); } ?>>bounceOut</option>
            <option value="bounceOutDown" <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'bounceOutDown' ); } ?>>bounceOutDown</option>
            <option value="bounceOutLeft" <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'bounceOutLeft' ); } ?>>bounceOutLeft</option>
            <option value="bounceOutRight"<?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'bounceOutRight' ); } ?>>bounceOutRight</option>
            <option value="bounceOutUp"   <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'bounceOutUp' ); } ?>>bounceOutUp</option>
          </optgroup>

          <optgroup label="Fading Entrances">
            <option value="fadeIn"            <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'fadeIn' ); } ?>>fadeIn</option>
            <option value="fadeInDown"        <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'fadeInDown' ); } ?>>fadeInDown</option>
            <option value="fadeInDownBig"     <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'fadeInDownBig' ); } ?>>fadeInDownBig</option>
            <option value="fadeInLeft"        <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'fadeInLeft' ); } ?>>fadeInLeft</option>
            <option value="fadeInLeftBig"     <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'fadeInLeftBig' ); } ?>>fadeInLeftBig</option>
            <option value="fadeInRight"       <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'fadeInRight' ); } ?>>fadeInRight</option>
            <option value="fadeInRightBig"    <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'fadeInRightBig' ); } ?>>fadeInRightBig</option>
            <option value="fadeInUp"          <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'fadeInUp' ); } ?>>fadeInUp</option>
            <option value="fadeInUpBig"       <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'fadeInUpBig' ); } ?>>fadeInUpBig</option>
          </optgroup>

          <optgroup label="Fading Exits">
            <option value="fadeOut"           <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'fadeOut' ); } ?>>fadeOut</option>
            <option value="fadeOutDown"       <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'fadeOutDown' ); } ?>>fadeOutDown</option>
            <option value="fadeOutDownBig"    <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'fadeOutDownBig' ); } ?>>fadeOutDownBig</option>
            <option value="fadeOutLeft"       <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'fadeOutLeft' ); } ?>>fadeOutLeft</option>
            <option value="fadeOutLeftBig"    <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'fadeOutLeftBig' ); } ?>>fadeOutLeftBig</option>
            <option value="fadeOutRight"      <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'fadeOutRight' ); } ?>>fadeOutRight</option>
            <option value="fadeOutRightBig"   <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'fadeOutRightBig' ); } ?>>fadeOutRightBig</option>
            <option value="fadeOutUp"         <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'fadeOutUp' ); } ?>>fadeOutUp</option>
            <option value="fadeOutUpBig"      <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'fadeOutUpBig' ); } ?>>fadeOutUpBig</option>
          </optgroup>

          <optgroup label="Flippers">
            <option value="flip"          <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'flip' ); } ?>>flip</option>
            <option value="flipInX"       <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'flipInX' ); } ?>>flipInX</option>
            <option value="flipInY"       <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'flipInY' ); } ?>>flipInY</option>
            <option value="flipOutX"      <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'flipOutX' ); } ?>>flipOutX</option>
            <option value="flipOutY"      <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'flipOutY' ); } ?>>flipOutY</option>
          </optgroup>

          <optgroup label="Lightspeed">
            <option value="lightSpeedIn"      <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'lightSpeedIn' ); } ?>>lightSpeedIn</option>
            <option value="lightSpeedOut"     <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'lightSpeedOut' ); } ?>>lightSpeedOut</option>
          </optgroup>

          <optgroup label="Rotating Entrances">
            <option value="rotateIn"              <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'rotateIn' ); } ?>>rotateIn</option>
            <option value="rotateInDownLeft"      <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'rotateInDownLeft' ); } ?>>rotateInDownLeft</option>
            <option value="rotateInDownRight"     <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'rotateInDownRight' ); } ?>>rotateInDownRight</option>
            <option value="rotateInUpLeft"        <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'rotateInUpLeft' ); } ?>>rotateInUpLeft</option>
            <option value="rotateInUpRight"       <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'rotateInUpRight' ); } ?>>rotateInUpRight</option>
          </optgroup>

          <optgroup label="Rotating Exits">
            <option value="rotateOut"             <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'rotateOut' ); } ?>>rotateOut</option>
            <option value="rotateOutDownLeft"     <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'rotateOutDownLeft' ); } ?>>rotateOutDownLeft</option>
            <option value="rotateOutDownRight"    <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'rotateOutDownRight' ); } ?>>rotateOutDownRight</option>
            <option value="rotateOutUpLeft"       <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'rotateOutUpLeft' ); } ?>>rotateOutUpLeft</option>
            <option value="rotateOutUpRight"      <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'rotateOutUpRight' ); } ?>>rotateOutUpRight</option>
          </optgroup>

          <optgroup label="Sliding Entrances">
            <option value="slideInUp"     <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'slideInUp' ); } ?>>slideInUp</option>
            <option value="slideInDown"   <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'slideInDown' ); } ?>>slideInDown</option>
            <option value="slideInLeft"   <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'slideInLeft' ); } ?>>slideInLeft</option>
            <option value="slideInRight"  <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'slideInRight' ); } ?>>slideInRight</option>

          </optgroup>
          <optgroup label="Sliding Exits">
            <option value="slideOutUp"        <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'slideOutUp' ); } ?>>slideOutUp</option>
            <option value="slideOutDown"      <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'slideOutDown' ); } ?>>slideOutDown</option>
            <option value="slideOutLeft"      <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'slideOutLeft' ); } ?>>slideOutLeft</option>
            <option value="slideOutRight"     <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'slideOutRight' ); } ?>>slideOutRight</option>

          </optgroup>

          <optgroup label="Zoom Entrances">
            <option value="zoomIn"        <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'zoomIn' ); } ?>>zoomIn</option>
            <option value="zoomInDown"    <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'zoomInDown' ); } ?>>zoomInDown</option>
            <option value="zoomInLeft"    <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'zoomInLeft' ); } ?>>zoomInLeft</option>
            <option value="zoomInRight"   <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'zoomInRight' ); } ?>>zoomInRight</option>
            <option value="zoomInUp"      <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'zoomInUp' ); } ?>>zoomInUp</option>
          </optgroup>

          <optgroup label="Zoom Exits">
            <option value="zoomOut"       <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'zoomOut' ); } ?>>zoomOut</option>
            <option value="zoomOutDown"   <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'zoomOutDown' ); } ?>>zoomOutDown</option>
            <option value="zoomOutLeft"   <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'zoomOutLeft' ); } ?>>zoomOutLeft</option>
            <option value="zoomOutRight"  <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'zoomOutRight' ); } ?>>zoomOutRight</option>
            <option value="zoomOutUp"     <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'zoomOutUp' ); } ?>>zoomOutUp</option>
          </optgroup>

          <optgroup label="Specials">
            <option value="hinge"     <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'hinge' ); } ?>>hinge</option>
            <option value="rollIn"    <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'rollIn' ); } ?>>rollIn</option>
            <option value="rollOut"   <?php if(isset($apif_settings['masonary_layout4_animate_css_effect'])){ selected( $apif_settings['masonary_layout4_animate_css_effect'], 'rollOut' ); } ?>>rollOut</option>
          </optgroup>
        </select>
      </div>
    </div>
    </div>
    <!-- S/H loadmore button -->
    <div class="apif-option-inner-wrapper">
      <label class="label-control apif-label-wrap" for="mlayout4-showmorebtn">
        <?php _e('Show load more button', 'accesspress-instagram-feed-pro') ?>
      </label>
      <div class="apif-option-field">
       <label class="apif-switch">
      <input type="checkbox" id="mlayout4-showmorebtn" name="instagram[masonary_layout4_load_more_button_enable]" value="1" class="apif-counter-activation-trigger" <?php if(isset($apif_settings['masonary_layout4_load_more_button_enable'])){ checked( $apif_settings['masonary_layout4_load_more_button_enable'], '1'); } ?>/><div class="apif-slider round"></div>
      </label>
      <label class="apif-second-label" for="mlayout4-showmorebtn">
       <?php _e('Show/Hide', 'accesspress-instagram-feed-pro'); ?>
      </label>
      </div>
    </div>
    
    

    <!-- load more button options -->
    <div class='apif-load-more-button-options' style="<?php if(isset($apif_settings['masonary_layout4_load_more_button_enable'])){ echo 'display:block'; }else{ echo 'display:none'; } ?>" >
      
      <!-- load more button position -->
      <div class="apif-option-inner-wrapper">
        <label class="label-control"> <?php _e('Load more button position', 'accesspress-instagram-feed-pro') ?> </label>
        <select class="form-control" name="instagram[masonary_layout4_load_more_button_position]">
          <option value='apif-left' <?php if(isset($apif_settings['masonary_layout4_load_more_button_position'])){ selected( $apif_settings['masonary_layout4_load_more_button_position'], 'apif-left' ); } ?> >Left</option>
          <option value='apif-right' <?php if(isset($apif_settings['masonary_layout4_load_more_button_position'])){ selected( $apif_settings['masonary_layout4_load_more_button_position'], 'apif-right' ); } ?> >Right</option>
          <option value='apif-center' <?php if(isset($apif_settings['masonary_layout4_load_more_button_position'])){ selected( $apif_settings['masonary_layout4_load_more_button_position'], 'apif-center' ); } ?> >Center</option>
        </select>
      </div>

      <!-- load more button text -->
      <div class="apif-option-inner-wrapper">
        <label class="label-control"><?php _e('Load more button text', 'accesspress-instagram-feed-pro'); ?></label>
        <div class="apif-option-field">
          <input class="form-control" type="text" name="instagram[masonary_layout4_load_more_button_text]" value="<?php if(isset($apif_settings['masonary_layout4_load_more_button_text'])) { echo esc_attr($apif_settings['masonary_layout4_load_more_button_text']); } ?> "/>
          <div class="apif-option-note"><?php _e('Please enter the load more button text. Default: Load more', 'accesspress-instagram-feed-pro'); ?></div>
        </div>
      </div>

      <!-- load more button text color -->
      <div class="apif-option-inner-wrapper">
        <label class="label-control"><?php _e('Load more button text color', 'accesspress-instagram-feed-pro'); ?></label>
        <div class="apif-option-field">
          <input type="text" class='apif-masonary-layout-settings-load-more-button-text-color' name="instagram[masonary_layout4_load_more_button_text_color]" value="<?php if(isset($apif_settings['masonary_layout4_load_more_button_text_color'])) { echo esc_attr($apif_settings['masonary_layout4_load_more_button_text_color']); } ?> "/>
          <div class="apif-option-note"><?php _e('Please select the load more button text color. If not selected the default color will appear.', 'accesspress-instagram-feed-pro'); ?></div>
        </div>
      </div>
      
      <!-- load more button background color -->
      <div class="apif-option-inner-wrapper">
        <label class="label-control"><?php _e('Load more button background color', 'accesspress-instagram-feed-pro'); ?></label>
        <div class="apif-option-field">
          <input type="text" class='apif-masonary-layout-settings-load-more-button-background-color' name="instagram[masonary_layout4_load_more_button_background_color]" value="<?php if(isset($apif_settings['masonary_layout4_load_more_button_background_color'])) { echo esc_attr($apif_settings['masonary_layout4_load_more_button_background_color']); } ?> "/>
          <div class="apif-option-note"><?php _e('Please select the load more button background color. If not selected the default color will appear.', 'accesspress-instagram-feed-pro'); ?></div>
        </div>
      </div>

      <!-- load more button border color -->
      <div class="apif-option-inner-wrapper">
        <label class="label-control"><?php _e('Load more button border color', 'accesspress-instagram-feed-pro'); ?></label>
        <div class="apif-option-field">
          <input type="text" class='apif-masonary-layout-settings-load-more-button-border-color' name="instagram[masonary_layout4_load_more_button_border_color]" value="<?php if(isset($apif_settings['masonary_layout4_load_more_button_border_color'])) { echo esc_attr($apif_settings['masonary_layout4_load_more_button_border_color']); } ?> "/>
          <div class="apif-option-note"><?php _e('Please select the load more button border color. If not selected the default color will appear.', 'accesspress-instagram-feed-pro'); ?></div>
        </div>
      </div>

      <!-- load more button hover text color -->
      <div class="apif-option-inner-wrapper">
        <label class="label-control"><?php _e('Load more button hover text color', 'accesspress-instagram-feed-pro'); ?></label>
        <div class="apif-option-field">
          <input type="text" class='apif-masonary-layout-settings-load-more-button-hover-text-color' name="instagram[masonary_layout4_load_more_button_hover_text_color]" value="<?php if(isset($apif_settings['masonary_layout4_load_more_button_hover_text_color'])) { echo esc_attr($apif_settings['masonary_layout4_load_more_button_hover_text_color']); } ?> "/>
          <div class="apif-option-note"><?php _e('Please select the load more button hover text color. If not selected the default color will appear.', 'accesspress-instagram-feed-pro'); ?></div>
        </div>
      </div>

      <!-- load more button hover background color -->
      <div class="apif-option-inner-wrapper">
        <label class="label-control"><?php _e('Load more button hover background color', 'accesspress-instagram-feed-pro'); ?></label>
        <div class="apif-option-field">
          <input type="text" class='apif-masonary-layout-settings-load-more-button-hover-background-color' name="instagram[masonary_layout4_load_more_button_text_hover_background_color]" value="<?php if(isset($apif_settings['masonary_layout4_load_more_button_text_hover_background_color'])) { echo esc_attr($apif_settings['masonary_layout4_load_more_button_text_hover_background_color']); } ?> "/>
          <div class="apif-option-note"><?php _e('Please select the load more button hover background color. If not selected the default color will appear.', 'accesspress-instagram-feed-pro'); ?></div>
        </div>
      </div>

      <!-- load more button hover border color -->
      <div class="apif-option-inner-wrapper">
        <label class="label-control"><?php _e('Load more button hover border color', 'accesspress-instagram-feed-pro'); ?></label>
        <div class="apif-option-field">
          <input type="text" class='apif-masonary-layout-settings-load-more-button-hover-border-color' name="instagram[masonary_layout4_load_more_button_hover_border_color]" value="<?php if(isset($apif_settings['masonary_layout4_load_more_button_hover_border_color'])) { echo esc_attr($apif_settings['masonary_layout4_load_more_button_hover_border_color']); } ?> "/>
          <div class="apif-option-note"><?php _e('Please select the load more button hover border color. If not selected the default color will appear.', 'accesspress-instagram-feed-pro'); ?></div>
        </div>
      </div>

      <!-- load more buttons selection -->
      <div class="apif-option-inner-wrapper">
        <div class="button-wrapper btn-load-more">
         <div class="load-more-heading"><?php _e('Load more button icon selection', 'accesspress-instagram-feed-pro') ?></div>
         <?php
 $apif_settings['masonary_layout4_load_more_button_icon'] = (isset($apif_settings['masonary_layout4_load_more_button_icon']) && $apif_settings['masonary_layout4_load_more_button_icon'] != '')?$apif_settings['masonary_layout4_load_more_button_icon']:'3';
      $random_num = rand(111111111, 999999999);
          for($i=1; $i<=15; $i++){ ?>
         <div class="apif-load-more-button-selection">
          <input type='radio' id='apif-load-more-button-selection-<?php echo $i; ?>_<?php echo $random_num;?>' name='instagram[masonary_layout4_load_more_button_icon]' value='<?php echo $i; ?>' <?php if(isset($apif_settings['masonary_layout4_load_more_button_icon'])){ if($apif_settings['masonary_layout4_load_more_button_icon']== $i){?>checked="checked"<?php } } ?> />  <label for='apif-load-more-button-selection-<?php echo $i; ?>_<?php echo $random_num;?>'><img src='<?php echo APIF_IMAGE_DIR."/loaders/loader$i.gif"; ?>' /></label>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>