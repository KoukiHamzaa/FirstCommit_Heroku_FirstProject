 <div class="apif-option-inner-wrapper">
 	<label class="label-control apif-label-wrap" for="showimgcaption"> <?php _e('Show image caption', 'accesspress-instagram-feed-pro') ?> </label>
 	<div class="apif-option-field">
 	<label class="apif-switch">
 	<input type="checkbox" id="showimgcaption" name="instagram[slider_1_layout_show_image_caption]" value="1" class="apif-counter-activation-trigger" <?php if(isset($apif_settings['slider_1_layout_show_image_caption'])){ checked( $apif_settings['slider_1_layout_show_image_caption'], '1'); } ?>/>
 	  <div class="apif-slider round"></div>
     </label>
    <label class="apif-second-label" for="showimgcaption">
 	<?php _e('Show/Hide', 'accesspress-instagram-feed-pro'); ?>
 	</label>
 	</div>
 </div>
 <div class="apif-option-inner-wrapper">
 	<label class="label-control"> <?php echo _e(' Choose Animation', 'accesspress-instagram-feed-pro'); ?> </label>
 	<div class="apif-option-field">
 		<select name="instagram[slider_1_layout_animation]">
 			<?php 
 			$slider_1_layout_animation = (isset($apif_settings['slider_1_layout_animation']) && $apif_settings['slider_1_layout_animation'] != '')?esc_attr($apif_settings['slider_1_layout_animation']):'fade';
 			$slider2_type_arr = array('sliceDownRight','sliceDownLeft','sliceUpRight','sliceUpLeft','sliceUpDown','sliceUpDownLeft','fold','fade','boxRandom','boxRain','boxRainReverse','boxRainGrow','boxRainGrowReverse','random');
 			foreach ($slider2_type_arr as $value) {
 				?>
 				<option value="<?php echo $value;?>" <?php selected( $slider_1_layout_animation, $value ); ?>><?php echo ucwords($value);?></option>
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
 		<input type="number" placeholder="500" class='apif-grid-rotator-layout-no-of-rows' name="instagram[slider_1_layout_animation_speed]" value="<?php if(isset($apif_settings['slider_1_layout_animation_speed'])) { echo esc_attr($apif_settings['slider_1_layout_animation_speed']); } ?>"/>ms
 		<div class="apif-option-note"><?php echo _e('Set animation speed in ms.Default is set to 500 ms if left empty.', 'accesspress-instagram-feed-pro'); ?></div>
 	</div>
 </div>
 <div class="apif-option-inner-wrapper">
 	<label class="label-control"> <?php echo _e('Animation Pause Duration', 'accesspress-instagram-feed-pro'); ?> </label>
 	<div class="apif-option-field">
 		<input type="number" placeholder="5000" class='apif-grid-rotator-layout-no-of-rows' name="instagram[slider_1_layout_animation_duration]" value="<?php if(isset($apif_settings['slider_1_layout_animation_duration'])) { echo esc_attr($apif_settings['slider_1_layout_animation_duration']); } ?>"/>ms
 		<div class="apif-option-note"><?php echo _e('Set animation pause duration in ms.Default is set to 5000 ms if left empty.', 'accesspress-instagram-feed-pro'); ?></div>
 	</div>
 </div>
 <div class="apif-option-inner-wrapper">
 	<label class="label-control"> <?php _e('Image caption background color', 'accesspress-instagram-feed-pro') ?> </label>
 	<div class="apif-option-field"><input type="text" class='apif-slider-1-layout-settings-image-caption-background-color' name="instagram[slider_1_layout_image_caption_background_color]" value="<?php if(isset($apif_settings['slider_1_layout_image_caption_background_color'])) { echo esc_attr($apif_settings['slider_1_layout_image_caption_background_color']); } ?> "/></div>
 </div>

 <div class="apif-option-inner-wrapper">
 	<label class="label-control"> <?php _e('Next/previous color', 'accesspress-instagram-feed-pro') ?> </label>
 	<div class="apif-option-field"><input type="text" class='apif-slider-1-layout-settings-next-previous-color' name="instagram[slider_1_layout_show_next_previous_color]" value="<?php if(isset($apif_settings['slider_1_layout_show_next_previous_color'])) { echo esc_attr($apif_settings['slider_1_layout_show_next_previous_color']); } ?> "/></div>
 </div>