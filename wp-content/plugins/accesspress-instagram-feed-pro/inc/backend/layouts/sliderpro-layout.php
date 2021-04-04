<!-- show posted time  -->
<div class='apif-option-inner-wrapper'>
	<label class="label-control apif-label-wrap" for="showtimeago2"> <?php _e('Show time ago', 'accesspress-instagram-feed-pro'); ?> </label>
	<div class="apif-option-field">
	<label class="apif-switch">
	<input type="checkbox" id="showtimeago2" name="instagram[slider_layout_4_show_time_ago]" value="1" class="apif-counter-activation-trigger" <?php if(isset($apif_settings['slider_layout_4_show_time_ago'])){ checked( $apif_settings['slider_layout_4_show_time_ago'], '1'); } ?>/>
	  <div class="apif-slider round"></div>
     </label>
    <label class="apif-second-label" for="showtimeago2"><?php _e('Show/Hide', 'accesspress-instagram-feed-pro'); ?></label></div>
</div>

<!-- show image caption -->
<div class='apif-option-inner-wrapper'>
	<label class="label-control apif-label-wrap" for="showimagecaption2"> <?php _e('Show image caption', 'accesspress-instagram-feed-pro'); ?> </label>
	<div class="apif-option-field">
	<label class="apif-switch">
	<input type="checkbox" id="showimagecaption2" name="instagram[slider_layout_4_show_image_caption]" value="1" class="apif-counter-activation-trigger" <?php if(isset($apif_settings['slider_layout_4_show_image_caption'])){ checked( $apif_settings['slider_layout_4_show_image_caption'], '1'); } ?>/>
	<div class="apif-slider round"></div>
      </label>
    <label class="apif-second-label"  for="showimagecaption2"><?php _e('Show/Hide', 'accesspress-instagram-feed-pro'); ?></label></div>
</div>
<!-- slider navigation color -->
<div class='apif-option-inner-wrapper'>
	<label class="label-control"><?php _e('Slider navigation color', 'accesspress-instagram-feed-pro'); ?></label>
	<div class="apif-option-field">
		<input type="text" class='apif-slider-layout-4-navigation-color' name="instagram[slider_layout_4_navigation_color]" value="<?php if(isset($apif_settings['slider_layout_4_navigation_color'])) { echo esc_attr($apif_settings['slider_layout_4_navigation_color']); } ?> "/>
	<div class="apif-option-note"><?php _e('Please choose the navigation color.', 'accesspress-instagram-feed-pro'); ?></div>
	</div>
</div>
<!-- slider layout 4 settings ends -->