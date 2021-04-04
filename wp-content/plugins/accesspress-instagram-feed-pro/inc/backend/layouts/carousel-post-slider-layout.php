<?php /*<div class="apif-option-inner-wrapper">
   <label class="label-control" for="apif-cpslider-hideposttime"><?php echo _e('Hide Post Time', 'accesspress-instagram-feed-pro'); ?> </label>
   <div class="apif-option-field">
      <input type="checkbox" id="apif-cpslider-hideposttime" name='instagram[carousel_post_slider_layout][hidepostitme]' value="1" <?php if(isset($apif_settings['carousel_post_slider_layout']['hidepostitme'])){ checked( $apif_settings['carousel_post_slider_layout']['hidepostitme'], '1'); } ?>/><?php _e('Show/Hide', 'accesspress-instagram-feed-pro'); ?>
   </div>
</div>

<div class="apif-option-inner-wrapper">
   <label class="label-control" for="apif-cpslider-hidecaption"><?php echo _e('Hide Caption', 'accesspress-instagram-feed-pro'); ?> </label>
   <div class="apif-option-field">
  <input type="checkbox" id="apif-cpslider-hidecaption" name='instagram[carousel_post_slider_layout][hide_caption]' value="1" <?php if(isset($apif_settings['carousel_post_slider_layout']['hide_caption'])){ checked( $apif_settings['carousel_post_slider_layout']['hide_caption'], '1'); } ?>/><?php _e('Show/Hide', 'accesspress-instagram-feed-pro'); ?>
   </div>
</div>
*/ ?>
<!-- show time ago -->
<div class="apif-option-inner-wrapper">
<label class="label-control apif-label-wrap" for="apif-instagram-post-time"><?php _e('Hide Post Time?', 'accesspress-instagram-feed-pro') ?></label>
<div class="apif-option-field">
 <label class="apif-switch">
<input type="checkbox" name="instagram[carousel_post_slider_layout][hide_post_time]" value="1" id='apif-instagram-post-time' class="apif-intagram-option-checkbox" <?php if(isset($apif_settings['carousel_post_slider_layout']['hide_post_time'])){ checked( $apif_settings['carousel_post_slider_layout']['hide_post_time'], '1'); } ?>/>
<div class="apif-slider round"></div>
      </label>
 <div class="apif-option-note"><?php echo _e('Check this option in order to hide post time ago for this layout.', 'accesspress-instagram-feed-pro' ); ?></div>
</div>
</div>
<div class="apif-option-inner-wrapper">
   <label class="label-control apif-label-wrap" for="show-caption-mlayout"><?php echo _e('Hide Caption?', 'accesspress-instagram-feed-pro'); ?> </label>
   <div class="apif-option-field">
    <label class="apif-switch">
   <input type="checkbox" name="instagram[carousel_post_slider_layout][hide_caption]" value="1" id='show-caption-mlayout' class="apif-intagram-option-checkbox" <?php if(isset($apif_settings['carousel_post_slider_layout']['hide_caption'])){ checked( $apif_settings['carousel_post_slider_layout']['hide_caption'], '1'); } ?>/>
   <div class="apif-slider round"></div>
      </label>
     <div class="apif-option-note"><?php echo _e('Check this option in order to hide caption for this layout.', 'accesspress-instagram-feed-pro' ); ?></div>
   </div>
</div>
<div class="apif-option-inner-wrapper">
   <label class="label-control"><?php echo _e('Caption Limit', 'accesspress-instagram-feed-pro'); ?> </label>
    <div class="apif-option-field">
      <input type="number" name='instagram[carousel_post_slider_layout][captionlimit]'  value="<?php if(isset($apif_settings['carousel_post_slider_layout']['captionlimit']) && $apif_settings['carousel_post_slider_layout']['captionlimit'] != '') echo $apif_settings['carousel_post_slider_layout']['captionlimit']; ?>"/>
     <div class="apif-option-note"><?php echo _e('Note: Display caption with specific character limit in number. Default is set to 150 for this layout.', 'accesspress-instagram-feed-pro' ); ?></div>
   </div>
</div>
<div class="apif-option-inner-wrapper">
    <div class='apif-masonary-layout-settings'>
        <div class='apif-column-settings-text'><?php echo _e('No of Slides', 'accesspress-instagram-feed-pro'); ?></div>

         <div class="apif-grid-layout-settings apif-column-settings-wrap">
            <label for='apif-largedesktop'><?php _e('Large Desktop <em>(Set column for large desktop view above 1366px)</em>',  'accesspress-instagram-feed-pro'); ?></label>
            <div class="apif-template-input-wrap clearfix">
                <div class="apif-slider-range-max"></div>
                <input type='int' id="apif-largedesktop" readonly name='instagram[carousel_post_slider_layout][columns][large_desktop]' key='any' class='apif-input-field' data-min='1' data-max='4' value="<?php if(isset($apif_settings['carousel_post_slider_layout']['columns']['large_desktop']) && $apif_settings['carousel_post_slider_layout']['columns']['large_desktop'] != '' ){ echo $apif_settings['carousel_post_slider_layout']['columns']['large_desktop']; }else{ echo "4"; } ?>" />
            </div>
        </div>

        <div class="apif-grid-layout-settings apif-column-settings-wrap">
            <label for='apif-desktop'><?php _e('Desktop <em>(Set column for desktop view from 1024px to 1366px)</em>',  'accesspress-instagram-feed-pro'); ?></label>
            <div class="apif-template-input-wrap clearfix">
                <div class="apif-slider-range-max"></div>
                <input type='int' id="apif-desktop" readonly name='instagram[carousel_post_slider_layout][columns][desktop]' key='any' class='apif-input-field' data-min='1' data-max='4' value="<?php if(isset($apif_settings['carousel_post_slider_layout']['columns']['desktop']) && $apif_settings['carousel_post_slider_layout']['columns']['desktop'] != '' ){ echo $apif_settings['carousel_post_slider_layout']['columns']['desktop']; }else{ echo "4"; } ?>" />
            </div>
        </div>
        <div class="apif-grid-layout-settings apif-column-settings-wrap">
          <label for='apif-tablet'><?php _e('Tablet <em>(Set column for desktop view from 768px to 1024px)</em>', 'accesspress-instagram-feed-pro'); ?></label>
          <div class="apif-template-input-wrap clearfix">
              <div class="apif-slider-range-max"></div>
              <input type='int' id="apif-tablet" readonly name='instagram[carousel_post_slider_layout][columns][tablet]' key='any' class='apif-input-field' data-min='1' data-max='3' value='<?php if(isset($apif_settings['carousel_post_slider_layout']['columns']['tablet']) && $apif_settings['carousel_post_slider_layout']['columns']['tablet'] != '' && intval($apif_settings['carousel_post_slider_layout']['columns']['tablet'])){ echo $apif_settings['carousel_post_slider_layout']['columns']['tablet']; }else{ echo "3"; } ?>' />
          </div>
      </div>
      <div class="apif-grid-layout-settings apif-column-settings-wrap">
          <label for="apif-mobile"><?php _e('Mobile <em>(Set column for desktop view below 768px)</em>', 'accesspress-instagram-feed-pro'); ?></label>
          <div class="apif-template-input-wrap clearfix">
              <div class="apif-slider-range-max"></div>
              <input type='int' id="apif-mobile" readonly name='instagram[carousel_post_slider_layout][columns][mobile]' key='any' class='apif-input-field' data-min='1' data-max='2' value='<?php if(isset($apif_settings['carousel_post_slider_layout']['columns']['mobile']) && $apif_settings['carousel_post_slider_layout']['columns']['mobile'] != '' && intval($apif_settings['carousel_post_slider_layout']['columns']['mobile'])){ echo $apif_settings['carousel_post_slider_layout']['columns']['mobile']; }else{ echo "1"; } ?>' />
          </div>
      </div>
    </div>
</div>
<div class="apif-option-inner-wrapper">
   <label class="label-control"><?php echo _e('AutoPlay', 'accesspress-instagram-feed-pro'); ?> </label>
   <select class="form-control" name="instagram[carousel_post_slider_layout][autoplay]">
    <option value='true' <?php if(isset($apif_settings['carousel_post_slider_layout']['autoplay'])){ selected( $apif_settings['carousel_post_slider_layout']['autoplay'], 'true' ); } ?> >True</option>
    <option value='false' <?php if(isset($apif_settings['carousel_post_slider_layout']['autoplay'])){ selected( $apif_settings['carousel_post_slider_layout']['autoplay'], 'false' ); } ?> >false</option>
  </select>
</div>
<div class="apif-option-inner-wrapper">
   <label class="label-control"><?php echo _e('Auto Play Speed', 'accesspress-instagram-feed-pro'); ?> </label>
   <input type="number" name="instagram[carousel_post_slider_layout][autoplay_speed]" value="<?php if(isset($apif_settings['carousel_post_slider_layout']['autoplay_speed']) && $apif_settings['carousel_post_slider_layout']['autoplay_speed'] != '' ){ echo $apif_settings['carousel_post_slider_layout']['autoplay_speed']; } ?>" placeholder="2000"/> ms
</div>
<div class="apif-option-inner-wrapper">
   <label class="label-control"><?php echo _e('Pager', 'accesspress-instagram-feed-pro'); ?> </label>
   <div class="apif-option-field">
      <select class="form-control" name="instagram[carousel_post_slider_layout][pager]">
     <option value='false' <?php if(isset($apif_settings['carousel_post_slider_layout']['pager'])){ selected( $apif_settings['carousel_post_slider_layout']['pager'], 'false' ); } ?> >false</option>
    <option value='true' <?php if(isset($apif_settings['carousel_post_slider_layout']['pager'])){ selected( $apif_settings['carousel_post_slider_layout']['pager'], 'true' ); } ?> >True</option>
      <div class="apif-option-note">By default, pager is set to false.</div>
  </select>
</div>
</div>
<div class="apif-option-inner-wrapper">
   <label class="label-control"><?php echo _e('Controls', 'accesspress-instagram-feed-pro'); ?> </label>
  <div class="apif-option-field">
   <select class="form-control" name="instagram[carousel_post_slider_layout][controls]">
    <option value='true' <?php if(isset($apif_settings['carousel_post_slider_layout']['controls'])){ selected( $apif_settings['carousel_post_slider_layout']['controls'], 'true' ); } ?> >True</option>
    <option value='false' <?php if(isset($apif_settings['carousel_post_slider_layout']['controls'])){ selected( $apif_settings['carousel_post_slider_layout']['controls'], 'false' ); } ?> >false</option>
  </select>
  </div>
</div>
<div class="apif-option-inner-wrapper">
   <label class="label-control"><?php echo _e('Controls Type', 'accesspress-instagram-feed-pro'); ?> </label>
  <div class="apif-option-field">
    <select class="form-control" name="instagram[carousel_post_slider_layout][controls_type]">
    <option value='arrow' <?php if(isset($apif_settings['carousel_post_slider_layout']['controls_type'])){ selected( $apif_settings['carousel_post_slider_layout']['controls_type'], 'arrow' ); } ?> >Arrow</option>
    <option value='text' <?php if(isset($apif_settings['carousel_post_slider_layout']['controls_type'])){ selected( $apif_settings['carousel_post_slider_layout']['controls_type'], 'text' ); } ?> >Text</option>
  </select>
  <div class="apif-option-note">To set arrow or text control type,you need to set above option "Controls" as true always.</div>
  </div>
</div>
<div class="apif-option-inner-wrapper">
    <label class="label-control"> <?php _e('Next Text', 'accesspress-instagram-feed-pro') ?> </label>
    <div class="apif-option-field">
        <input type="text" class='apif-slider-layout-settings-next-previous-text' name="instagram[carousel_post_slider_layout][next_text]" value="<?php if(isset($apif_settings['carousel_post_slider_layout']['next_text'])) { echo esc_attr($apif_settings['carousel_post_slider_layout']['next_text']); } ?> "/>
        <div class="apif-option-note"><?php echo _e('Please enter your own next text here.', 'accesspress-instagram-feed-pro' ); ?></div>
    </div>
</div>

<div class="apif-option-inner-wrapper">
    <label class="label-control"> <?php _e('Previous text', 'accesspress-instagram-feed-pro') ?> </label>
    <div class="apif-option-field">
        <input type="text" class='apif-slider-layout-settings-next-previous-text' name="instagram[carousel_post_slider_layout][previous_text]" value="<?php if(isset($apif_settings['carousel_post_slider_layout']['previous_text'])) { echo esc_attr($apif_settings['carousel_post_slider_layout']['previous_text']); } ?> "/>
        <div class="apif-option-note"><?php echo _e('Please enter your own previous text here.', 'accesspress-instagram-feed-pro' ); ?></div>
    </div>
</div>
 <div class="apif-option-inner-wrapper">
 <h3>Custom Settings</h3>
    <label class="label-control"> <?php _e('Arrow Background color', 'accesspress-instagram-feed-pro') ?> </label>
    <div class="apif-option-field">
        <input type="text" class='apif-slider-layout-settings-next-previous-color' name="instagram[carousel_post_slider_layout][arrow_bgcolor]" value="<?php if(isset($apif_settings['carousel_post_slider_layout']['arrow_bgcolor'])) { echo esc_attr($apif_settings['carousel_post_slider_layout']['arrow_bgcolor']); } ?> "/>
        <div class="apif-option-note"><?php echo _e('Please select the arrow background color.', 'accesspress-instagram-feed-pro' ); ?></div>
    </div>
</div>
 <div class="apif-option-inner-wrapper">
    <label class="label-control"> <?php _e('Arrow Background Hover color', 'accesspress-instagram-feed-pro') ?> </label>
    <div class="apif-option-field">
        <input type="text" class='apif-slider-layout-settings-next-previous-color' name="instagram[carousel_post_slider_layout][arrow_bghcolor]" value="<?php if(isset($apif_settings['carousel_post_slider_layout']['arrow_bghcolor'])) { echo esc_attr($apif_settings['carousel_post_slider_layout']['arrow_bghcolor']); } ?> "/>
        <div class="apif-option-note"><?php echo _e('Please select the narrow background hover color.', 'accesspress-instagram-feed-pro' ); ?></div>
    </div>
</div>
 <div class="apif-option-inner-wrapper">
    <label class="label-control"> <?php _e('Arrow Font Color', 'accesspress-instagram-feed-pro') ?> </label>
    <div class="apif-option-field">
        <input type="text" class='apif-slider-layout-settings-next-previous-color' name="instagram[carousel_post_slider_layout][arrow_color]" value="<?php if(isset($apif_settings['carousel_post_slider_layout']['arrow_color'])) { echo esc_attr($apif_settings['carousel_post_slider_layout']['arrow_color']); } ?> "/>
        <div class="apif-option-note"><?php echo _e('Please select the arrow color.', 'accesspress-instagram-feed-pro' ); ?></div>
    </div>
</div>
 <div class="apif-option-inner-wrapper">
    <label class="label-control"> <?php _e('Next/previous Background color', 'accesspress-instagram-feed-pro') ?> </label>
    <div class="apif-option-field">
        <input type="text" class='apif-slider-layout-settings-next-previous-color' name="instagram[carousel_post_slider_layout][bgcolor]" value="<?php if(isset($apif_settings['carousel_post_slider_layout']['bgcolor'])) { echo esc_attr($apif_settings['carousel_post_slider_layout']['bgcolor']); } ?> "/>
        <div class="apif-option-note"><?php echo _e('Please select the next/previous background color.', 'accesspress-instagram-feed-pro' ); ?></div>
    </div>
</div>
 <div class="apif-option-inner-wrapper">
    <label class="label-control"> <?php _e('Next/previous Background Hover Color', 'accesspress-instagram-feed-pro') ?> </label>
    <div class="apif-option-field">
        <input type="text" class='apif-slider-layout-settings-next-previous-color' name="instagram[carousel_post_slider_layout][bghcolor]" value="<?php if(isset($apif_settings['carousel_post_slider_layout']['bghcolor'])) { echo esc_attr($apif_settings['carousel_post_slider_layout']['bghcolor']); } ?> "/>
        <div class="apif-option-note"><?php echo _e('Please select the next/previous background hover color.', 'accesspress-instagram-feed-pro' ); ?></div>
    </div>
</div>
 <div class="apif-option-inner-wrapper">
    <label class="label-control"> <?php _e('Next/previous Font color', 'accesspress-instagram-feed-pro') ?> </label>
    <div class="apif-option-field">
        <input type="text" class='apif-slider-layout-settings-next-previous-color' name="instagram[carousel_post_slider_layout][fcolor]" value="<?php if(isset($apif_settings['carousel_post_slider_layout']['fcolor'])) { echo esc_attr($apif_settings['carousel_post_slider_layout']['fcolor']); } ?> "/>
        <div class="apif-option-note"><?php echo _e('Please select the next/previous font color.', 'accesspress-instagram-feed-pro' ); ?></div>
    </div>
</div>
