<!-- no of columns -->
<div class="apif-option-inner-wrapper">
  <label class="label-control"> <?php echo _e('No of columns', 'accesspress-instagram-feed-pro'); ?> </label>
  <input type="number" class='apif-grid-rotator-layout-no-of-columns' name="instagram[grid_rotator_layout_no_of_columns]" value="<?php if(isset($apif_settings['grid_rotator_layout_no_of_columns'])) { echo esc_attr($apif_settings['grid_rotator_layout_no_of_columns']); } ?>"/>
</div>

<div class="apif-option-inner-wrapper">
  <label class="label-control"> <?php echo _e('No of rows', 'accesspress-instagram-feed-pro'); ?> </label>
  <input type="number" class='apif-grid-rotator-layout-no-of-rows' name="instagram[grid_rotator_layout_no_of_rows]" value="<?php if(isset($apif_settings['grid_rotator_layout_no_of_rows'])) { echo esc_attr($apif_settings['grid_rotator_layout_no_of_rows']); } ?>"/>
</div>
<div class="apif-option-inner-wrapper">
  <label class="label-control"> <?php echo _e('Step', 'accesspress-instagram-feed-pro'); ?> </label>
  <div class="apif-option-field">
    <input type="text" class='apif-grid-rotator-layout-no-of-rows' name="instagram[grid_rotator_layout_steps]" value="<?php if(isset($apif_settings['grid_rotator_layout_steps'])) { echo esc_attr($apif_settings['grid_rotator_layout_steps']); } ?>" placeholder="random or 3"/>
    <div class="apif-option-note"><?php echo _e('Fill any number of items only use "random" word for changing and replacing instagram feeds images at the same time or random basis. // random || [some number]', 'accesspress-instagram-feed-pro'); ?></div>
  </div>
</div>
<div class="apif-option-inner-wrapper">
  <label class="label-control"> <?php echo _e('Time Interval', 'accesspress-instagram-feed-pro'); ?> </label>
  <div class="apif-option-field">
    <input type="text" placeholder="2000" class='apif-grid-rotator-layout-no-of-rows' name="instagram[grid_rotator_layout_interval]" value="<?php if(isset($apif_settings['grid_rotator_layout_interval'])) { echo esc_attr($apif_settings['grid_rotator_layout_interval']); } ?>"/>ms
    <div class="apif-option-note"><?php echo _e('Note: the item(s) will be replaced every nentioned seconds // note: for performance issues, the time "cannot" be < 300 in ms. Default is set to 2000 ms if left empty.', 'accesspress-instagram-feed-pro'); ?></div>
  </div>
</div>
<div class="apif-option-inner-wrapper">
  <label class="label-control"> <?php echo _e(' Choose Animation', 'accesspress-instagram-feed-pro'); ?> </label>
  <div class="apif-option-field">
    <select name="instagram[grid_rotator_layout_animation]">
     <?php 
     $grid_rotator_layout_animation = (isset($apif_settings['grid_rotator_layout_animation']) && $apif_settings['grid_rotator_layout_animation'] != '')?esc_attr($apif_settings['grid_rotator_layout_animation']):'fadeInOut';
     $animation_type_arr = array('fadeInOut','showHide','slideLeft','slideRight','slideTop','slideBottom','rotateBottom','rotateLeft','rotateRight','rotateTop','scale','rotate3d','rotateLeftScale'
      ,'rotateRightScale','rotateTopScale','rotateBottomScale','random');
     foreach ($animation_type_arr as $value) {
      ?>
      <option value="<?php echo $value;?>" <?php selected( $grid_rotator_layout_animation, $value ); ?>><?php echo ucwords($value);?></option>
      <?php
    }
    ?>
  </select>
  <div class="apif-option-note"><?php echo _e('Select animation from 17 different animation type. You can even choose random animation type.', 'accesspress-instagram-feed-pro'); ?></div>
</div>
</div>
<div class="apif-option-inner-wrapper">
  <label class="label-control"> <?php echo _e('Animation Speed', 'accesspress-instagram-feed-pro'); ?> </label>
  <div class="apif-option-field">
    <input type="number" placeholder="800" class='apif-grid-rotator-layout-no-of-rows' name="instagram[grid_rotator_layout_animation_speed]" value="<?php if(isset($apif_settings['grid_rotator_layout_animation_speed'])) { echo esc_attr($apif_settings['grid_rotator_layout_animation_speed']); } ?>"/>ms
    <div class="apif-option-note"><?php echo _e('Set animation speed in ms.Default is set to 800 ms if left empty.', 'accesspress-instagram-feed-pro'); ?></div>
  </div>
</div>