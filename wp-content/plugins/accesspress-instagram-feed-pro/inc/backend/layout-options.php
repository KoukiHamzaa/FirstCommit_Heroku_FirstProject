<?php defined('ABSPATH') or die("No script kiddies please!");
$instagram_mosaic = (isset($apif_settings['instagram_mosaic']) && $apif_settings['instagram_mosaic'] != '')?esc_attr($apif_settings['instagram_mosaic']):'mosaic';
?>
<!-- Grid layout settings -->
<div class="apif-layout-setting grid_layout" style="<?php if( $instagram_mosaic== 'grid_layout'){ echo 'display:block'; }else{ echo 'display:none'; } ?>">
   <?php include(APIF_INST_INCLUDES_BACKEND_PATH. 'layouts/grid-layout.php' );?>
</div>
<!-- Grid layout END -->
<!-- Advanced Grid layout settings -->
<div class="apif-layout-setting grid_layout1" style="<?php if( $instagram_mosaic== 'grid_layout1'){ echo 'display:block'; }else{ echo 'display:none'; } ?>"> 
  <?php include(APIF_INST_INCLUDES_BACKEND_PATH. 'layouts/advanced-grid-layout.php' );?>   
</div>
<!-- Advanced Grid layout end -->
<!-- Slide Content Grid Layout settings -->
<div class="apif-layout-setting grid_layout2" style="<?php if( $instagram_mosaic== 'grid_layout2'){ echo 'display:block'; }else{ echo 'display:none'; } ?>">
   <?php include(APIF_INST_INCLUDES_BACKEND_PATH. 'layouts/slide-content-grid-layout.php' );?>
</div>
<!-- Slide Content Grid Layout END -->
<!-- Grid rotator layout settings -->
<div class='apif-layout-setting grid-rotator' style="<?php if( $instagram_mosaic== 'grid_rotator'){ echo 'display:block'; }else{ echo 'display:none'; } ?>" >
	<?php include(APIF_INST_INCLUDES_BACKEND_PATH. 'layouts/grid-rotator.php' );?>
</div>
<!-- grid rotator layout settings ends -->
<!-- Masonary layout Settings -->
 <div class='apif-layout-setting masonary' style="<?php if( $instagram_mosaic== 'masonry_layout'){ echo 'display:block'; }else{ echo 'display:none'; } ?>" >
  <?php include(APIF_INST_INCLUDES_BACKEND_PATH. 'layouts/masonary-layout.php' );?>
</div>
<!-- Masonary layout settings ends -->
<!-- Masonary layout 1 settings -->
<div class='apif-layout-setting masonary1' style="<?php if( $instagram_mosaic== 'masonry_layout1'){ echo 'display:block'; }else{ echo 'display:none'; } ?>" >
  <?php include(APIF_INST_INCLUDES_BACKEND_PATH. 'layouts/masonary-layout1.php' );?>
</div>
<!-- Masonary layout 1 settings ends -->
<!-- Masonary layout 2 settings -->
<div class='apif-layout-setting masonary2' style="<?php if( $instagram_mosaic== 'masonry_layout2'){ echo 'display:block'; }else{ echo 'display:none'; } ?>" >
<?php include(APIF_INST_INCLUDES_BACKEND_PATH. 'layouts/masonary-layout2.php' );?>
</div>
<!-- Masonary layout 2 settings ends -->
<!-- Masonary layout 3 settings -->
<div class='apif-layout-setting masonary3' style="<?php if( $instagram_mosaic== 'masonry_layout3'){ echo 'display:block'; }else{ echo 'display:none'; } ?>" >
<?php include(APIF_INST_INCLUDES_BACKEND_PATH. 'layouts/masonary-layout3.php' );?>
</div>
<!-- Masonary layout 3 settings ends -->
<!-- Masonary layout 4 settings -->
<div class='apif-layout-setting masonary4' style="<?php if( $instagram_mosaic== 'masonry_layout4'){ echo 'display:block'; }else{ echo 'display:none'; } ?>" >
<?php include(APIF_INST_INCLUDES_BACKEND_PATH. 'layouts/masonary-layout4.php' );?>
</div>
<!-- Masonary layout 4 settings ends -->
<!-- Masonary layout 5 settings -->
<div class='apif-layout-setting masonary5' style="<?php if( $instagram_mosaic== 'masonry_layout5'){ echo 'display:block'; }else{ echo 'display:none'; } ?>" >
  <?php include(APIF_INST_INCLUDES_BACKEND_PATH. 'layouts/masonary-layout5.php' );?>
</div>
<!-- Masonary layout 5 settings ends -->
<!-- instagram layout settings -->
<div class='apif-layout-setting instagram-layout' style="<?php if( $instagram_mosaic== 'instagram_layout'){ echo 'display:block'; }else{ echo 'display:none'; } ?>">
<?php include(APIF_INST_INCLUDES_BACKEND_PATH. 'layouts/instagram_layout.php' );?>
</div>
<!-- instagram layout settings ends -->
<!-- round image layout settings -->
<div class='apif-layout-setting round-image' style="<?php if( $instagram_mosaic== 'round_image'){ echo 'display:block'; }else{ echo 'display:none'; } ?>" >
	<div class='apif-round-image-settings'>
	<?php include(APIF_INST_INCLUDES_BACKEND_PATH. 'layouts/round-layout.php' );?>
	</div>
</div>
<!-- round image layout settings ends -->
<!-- slider layout settings -->
<div class="apif-layout-setting slider-layout" style="<?php if( $instagram_mosaic== 'slider'){ echo 'display:block'; }else{ echo 'display:none'; } ?>">
<?php include(APIF_INST_INCLUDES_BACKEND_PATH. 'layouts/owl-carousel-layout.php' );?>
</div>
<!-- slider layout settings ends-->

<!-- slider 1 layout settings -->
<div class="apif-layout-setting slider-1-layout" style="<?php if( $instagram_mosaic== 'slider_1_layout'){ echo 'display:block'; }else{ echo 'display:none'; } ?>">
<?php include(APIF_INST_INCLUDES_BACKEND_PATH. 'layouts/slider-1-layout.php' );?>
<div class="apif-option-inner-wrapper">Note: For this layout the lightbox effects will not be applicable.</div>
</div>
<!-- slider 1 layout settings ends-->
<!-- slider 2 layout settings -->
<div class='apif-layout-setting slider-2-layout' style="<?php if( $instagram_mosaic== 'slider_2_layout'){ echo 'display:block'; }else{ echo 'display:none'; } ?>" >
<!-- hover animation effect -->
<?php 
$sliderlayout2_animation = (isset($apif_settings['slider_layout2_animation_effect']) && $apif_settings['slider_layout2_animation_effect'] != '')?esc_attr($apif_settings['slider_layout2_animation_effect']):'apif-top-to-bottom';
?>
<div class="apif-option-inner-wrapper">
 <label class="label-control"><?php echo _e('Hover animation effect', 'accesspress-instagram-feed-pro'); ?> </label>
  <div class='apif-option-field'>
 
 <?php /*
 <select class="form-control" name="instagram[slider_layout2_animation_effect]">
    <option value='apif-top-to-bottom' <?php if(isset($apif_settings['slider_layout2_animation_effect'])){ selected( $apif_settings['slider_layout2_animation_effect'], 'apif-top-to-bottom' ); } ?> >Top to Bottom</option>
    <option value='apif-bottom-to-top' <?php if(isset($apif_settings['slider_layout2_animation_effect'])){ selected( $apif_settings['slider_layout2_animation_effect'], 'apif-bottom-to-top' ); } ?> >Bottom to Top</option>
    <option value='apif-left-to-right' <?php if(isset($apif_settings['slider_layout2_animation_effect'])){ selected( $apif_settings['slider_layout2_animation_effect'], 'apif-left-to-right' ); } ?> >Left to Right</option>
    <option value='apif-right-to-left' <?php if(isset($apif_settings['slider_layout2_animation_effect'])){ selected( $apif_settings['slider_layout2_animation_effect'], 'apif-right-to-left' ); } ?> >Right to Left</option>
  
    <option value="apif-img-holyshade" <?php if(isset($apif_settings['slider_layout2_animation_effect'])){ selected( $apif_settings['slider_layout2_animation_effect'], 'apif-img-holyshade' ); } ?> >Holy Shade</option>
    <option value="apif-img-crazylaylia" <?php if(isset($apif_settings['slider_layout2_animation_effect'])){ selected( $apif_settings['slider_layout2_animation_effect'], 'apif-img-crazylaylia' ); } ?> >Crazy Laylia</option>
    <option value="apif-img-creative" <?php if(isset($apif_settings['slider_layout2_animation_effect'])){ selected( $apif_settings['slider_layout2_animation_effect'], 'apif-img-creative' ); } ?> >Creative Overlay</option>
    <option value="apif-img-pleasure" <?php if(isset($apif_settings['slider_layout2_animation_effect'])){ selected( $apif_settings['slider_layout2_animation_effect'], 'apif-img-pleasure' ); } ?> >Pleasure View</option>
    <option value="apif-img-sweetmarley" <?php if(isset($apif_settings['slider_layout2_animation_effect'])){ selected( $apif_settings['slider_layout2_animation_effect'], 'apif-img-sweetmarley' ); } ?> >Sweet Marley</option>
    <option value="apif-img-freshbubba" <?php if(isset($apif_settings['slider_layout2_animation_effect'])){ selected( $apif_settings['slider_layout2_animation_effect'], 'apif-img-freshbubba' ); } ?> >Fresh Bubba</option>
    <option value="apif-img-sillychicho" <?php if(isset($apif_settings['slider_layout2_animation_effect'])){ selected( $apif_settings['slider_layout2_animation_effect'], 'apif-img-sillychicho' ); } ?> >Silly Chicho</option>
    <option value="apif-img-tender" <?php if(isset($apif_settings['slider_layout2_animation_effect'])){ selected( $apif_settings['slider_layout2_animation_effect'], 'apif-img-tender' ); } ?>>Tender Hera</option>
    <option value="apif-img-jolly" <?php if(isset($apif_settings['slider_layout2_animation_effect'])){ selected( $apif_settings['slider_layout2_animation_effect'], 'apif-img-jolly' ); } ?> >Jolly Winston</option>
    <option value="apif-img-strongapollo" <?php if(isset($apif_settings['slider_layout2_animation_effect'])){ selected( $apif_settings['slider_layout2_animation_effect'], 'apif-img-strongapollo' ); } ?> >Strong Apollo</option>
    <option value="apif-img-darkkiraview" <?php if(isset($apif_settings['slider_layout2_animation_effect'])){ selected( $apif_settings['slider_layout2_animation_effect'], 'apif-img-darkkiraview' ); } ?> >Dark Kira Overlay</option>
    <option value="apif-img-dynamicjazz" <?php if(isset($apif_settings['slider_layout2_animation_effect'])){ selected( $apif_settings['slider_layout2_animation_effect'], 'apif-img-dynamicjazz' ); } ?> >Dynamic Jazz</option>
</select> */ ?>
<div class="apif-option-note"><?php _e('Note: Using thumbnail size image is not applicable for hover animation so please use large or medium image size.', 'accesspress-instagram-feed-pro'); ?></div>
<div class="apif-hoveranimation-wrapper">
<label class="apif-hover-layouts apif-top-to-bottom apif-small-size-display">
    <input type="checkbox" name="instagram[slider_layout2_animation_effect]" value="apif-top-to-bottom" class="apif-form-field apif-normal-checkbox" <?php if($sliderlayout2_animation == "apif-top-to-bottom") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Top to Bottom</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-bottom-to-top apif-small-size-display">
    <input type="checkbox" name="instagram[slider_layout2_animation_effect]" value="apif-bottom-to-top" class="apif-form-field apif-normal-checkbox" <?php if($sliderlayout2_animation == "apif-bottom-to-top") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Bottom to Top</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-left-to-right apif-small-size-display">
    <input type="checkbox" name="instagram[slider_layout2_animation_effect]" value="apif-left-to-right" class="apif-form-field apif-normal-checkbox" <?php if($sliderlayout2_animation == "apif-left-to-right") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Left To Right</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-right-to-left apif-small-size-display">
    <input type="checkbox" name="instagram[slider_layout2_animation_effect]" value="apif-right-to-left" class="apif-form-field apif-normal-checkbox" <?php if($sliderlayout2_animation == "apif-right-to-left") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Right To Left</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>

<label class="apif-hover-layouts apif-img-holyshade apif-small-size-display">
    <input type="checkbox" name="instagram[slider_layout2_animation_effect]" value="apif-img-holyshade" class="apif-form-field apif-normal-checkbox" <?php if($sliderlayout2_animation == "apif-img-holyshade") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Holy Shade</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>

<label class="apif-hover-layouts apif-img-crazylaylia apif-small-size-display">
    <input type="checkbox" name="instagram[slider_layout2_animation_effect]" value="apif-img-crazylaylia" class="apif-form-field apif-normal-checkbox" <?php if($sliderlayout2_animation == "apif-img-crazylaylia") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Crazy Laylia</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>

<label class="apif-hover-layouts apif-img-creative apif-small-size-display">
    <input type="checkbox" name="instagram[slider_layout2_animation_effect]" value="apif-img-creative" class="apif-form-field apif-normal-checkbox" <?php if($sliderlayout2_animation == "apif-img-creative") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Creative Overlay</span>
    <?php 
    $overlay = "creative";
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation2.php' );
    ?>
</label>

<label class="apif-hover-layouts apif-img-pleasure apif-small-size-display">
    <input type="checkbox" name="instagram[slider_layout2_animation_effect]" value="apif-img-pleasure" class="apif-form-field apif-normal-checkbox" <?php if($sliderlayout2_animation == "apif-img-pleasure") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Pleasure View</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>

<label class="apif-hover-layouts apif-img-sweetmarley apif-small-size-display">
    <input type="checkbox" name="instagram[slider_layout2_animation_effect]" value="apif-img-sweetmarley" class="apif-form-field apif-normal-checkbox" <?php if($sliderlayout2_animation == "apif-img-sweetmarley") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Sweet Marley</span>
    <?php 
     $overlay = "sweetmarley";
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation3.php' );
    ?>
</label>

<label class="apif-hover-layouts apif-img-freshbubba apif-small-size-display">
    <input type="checkbox" name="instagram[slider_layout2_animation_effect]" value="apif-img-freshbubba" class="apif-form-field apif-normal-checkbox" <?php if($sliderlayout2_animation == "apif-img-freshbubba") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Fresh Bubba</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>

<label class="apif-hover-layouts apif-img-sillychicho apif-small-size-display">
    <input type="checkbox" name="instagram[slider_layout2_animation_effect]" value="apif-img-sillychicho" class="apif-form-field apif-normal-checkbox" <?php if($sliderlayout2_animation == "apif-img-sillychicho") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Silly Chicho</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-img-tender apif-small-size-display">
    <input type="checkbox" name="instagram[slider_layout2_animation_effect]" value="apif-img-tender" class="apif-form-field apif-normal-checkbox" <?php if($sliderlayout2_animation == "apif-img-tender") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Tender Hera</span>
    <?php 
    $overlay = "tender";
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation3.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-img-jolly apif-small-size-display">
    <input type="checkbox" name="instagram[slider_layout2_animation_effect]" value="apif-img-jolly" class="apif-form-field apif-normal-checkbox" <?php if($sliderlayout2_animation == "apif-img-jolly") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Jolly Winston</span>
    <?php 
    $overlay = "jolly";
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation3.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-img-strongapollo apif-small-size-display">
    <input type="checkbox" name="instagram[slider_layout2_animation_effect]" value="apif-img-strongapollo" class="apif-form-field apif-normal-checkbox" <?php if($sliderlayout2_animation == "apif-img-strongapollo") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Strong Apollo</span>
    <?php 
    $overlay = "strongapollo";
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation3.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-img-darkkiraview apif-small-size-display">
    <input type="checkbox" name="instagram[slider_layout2_animation_effect]" value="apif-img-darkkiraview" class="apif-form-field apif-normal-checkbox" <?php if($sliderlayout2_animation == "apif-img-darkkiraview") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Dark Kira Overlay</span>
    <?php 
    $overlay = "darkkiraview";
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation3.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-img-dynamicjazz apif-small-size-display">
    <input type="checkbox" name="instagram[slider_layout2_animation_effect]" value="apif-img-dynamicjazz" class="apif-form-field apif-normal-checkbox" <?php if($sliderlayout2_animation == "apif-img-dynamicjazz") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Dynamic Jazz</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>
</div>

</div>
</div>
</div>
<!-- slider 2 layout settings ends -->
<!-- slider 3 layout settings -->
<div class="apif-layout-setting slider-3-layout" style="<?php if( $instagram_mosaic== 'slider_3_layout'){ echo 'display:block'; }else{ echo 'display:none'; } ?>">
<?php #include(APIF_INST_INCLUDES_BACKEND_PATH. 'layouts/slider-1-layout.php' );?>
<div class="apif-option-inner-wrapper">
<label class="label-control"> <?php _e('Next/previous color', 'accesspress-instagram-feed-pro') ?> </label>
<div class="apif-option-field"><input type="text" class='apif-slider-3-layout-settings-next-previous-color' name="instagram[slider_3_layout_show_next_previous_color]" value="<?php if(isset($apif_settings['slider_3_layout_show_next_previous_color'])) { echo esc_attr($apif_settings['slider_3_layout_show_next_previous_color']); } ?> "/></div>
</div>
</div>
<!-- slider 3 layout settings ends -->

<!-- slider layout 4 settings -->
<div class='apif-layout-setting slider-4-layout' style="<?php if( $instagram_mosaic== 'slider_4_layout'){ echo 'display:block'; }else{ echo 'display:none'; } ?>">
<?php include(APIF_INST_INCLUDES_BACKEND_PATH. 'layouts/sliderpro-layout.php' );?>
</div>
<!-- slider layout 5 settings -->
 
<div class='apif-layout-setting slider-5-layout' style="<?php if( $instagram_mosaic== 'slider_5_layout'){ echo 'display:block'; }else{ echo 'display:none'; } ?>">

<!-- hover animation effect -->
<div class="apif-option-inner-wrapper">
 <label class="label-control"><?php echo _e('Hover animation effect', 'accesspress-instagram-feed-pro'); ?> </label>
<div class='apif-option-field'>
<div class="apif-option-note"><?php _e('Note: Using thumbnail size image is not applicable for hover animation so please use large or medium image size.', 'accesspress-instagram-feed-pro'); ?></div>
<?php /*
 <select class="form-control" name="instagram[slider_layout5_animation_effect]">
    <option value='apif-top-to-bottom' <?php if(isset($apif_settings['slider_layout5_animation_effect'])){ selected( $apif_settings['slider_layout5_animation_effect'], 'apif-top-to-bottom' ); } ?> >Top to Bottom</option>
    <option value='apif-bottom-to-top' <?php if(isset($apif_settings['slider_layout5_animation_effect'])){ selected( $apif_settings['slider_layout5_animation_effect'], 'apif-bottom-to-top' ); } ?> >Bottom to Top</option>
    <option value='apif-left-to-right' <?php if(isset($apif_settings['slider_layout5_animation_effect'])){ selected( $apif_settings['slider_layout5_animation_effect'], 'apif-left-to-right' ); } ?> >Left to Right</option>
    <option value='apif-right-to-left' <?php if(isset($apif_settings['slider_layout5_animation_effect'])){ selected( $apif_settings['slider_layout5_animation_effect'], 'apif-right-to-left' ); } ?> >Right to Left</option>
    <option value="apif-img-holyshade" <?php if(isset($apif_settings['slider_layout5_animation_effect'])){ selected( $apif_settings['slider_layout5_animation_effect'], 'apif-img-holyshade' ); } ?> >Holy Shade</option>
    <option value="apif-img-crazylaylia" <?php if(isset($apif_settings['slider_layout5_animation_effect'])){ selected( $apif_settings['slider_layout5_animation_effect'], 'apif-img-crazylaylia' ); } ?> >Crazy Laylia</option>
    <option value="apif-img-creative" <?php if(isset($apif_settings['slider_layout5_animation_effect'])){ selected( $apif_settings['slider_layout5_animation_effect'], 'apif-img-creative' ); } ?> >Creative Overlay</option>
    <option value="apif-img-pleasure" <?php if(isset($apif_settings['slider_layout5_animation_effect'])){ selected( $apif_settings['slider_layout5_animation_effect'], 'apif-img-pleasure' ); } ?> >Pleasure View</option>
    <option value="apif-img-sweetmarley" <?php if(isset($apif_settings['slider_layout5_animation_effect'])){ selected( $apif_settings['slider_layout5_animation_effect'], 'apif-img-sweetmarley' ); } ?> >Sweet Marley</option>
    <option value="apif-img-freshbubba" <?php if(isset($apif_settings['slider_layout5_animation_effect'])){ selected( $apif_settings['slider_layout5_animation_effect'], 'apif-img-freshbubba' ); } ?> >Fresh Bubba</option>
    <option value="apif-img-sillychicho" <?php if(isset($apif_settings['slider_layout5_animation_effect'])){ selected( $apif_settings['slider_layout5_animation_effect'], 'apif-img-sillychicho' ); } ?> >Silly Chicho</option>
    <option value="apif-img-tender" <?php if(isset($apif_settings['slider_layout5_animation_effect'])){ selected( $apif_settings['slider_layout5_animation_effect'], 'apif-img-tender' ); } ?>>Tender Hera</option>
    <option value="apif-img-jolly" <?php if(isset($apif_settings['slider_layout5_animation_effect'])){ selected( $apif_settings['slider_layout5_animation_effect'], 'apif-img-jolly' ); } ?> >Jolly Winston</option>
    <option value="apif-img-strongapollo" <?php if(isset($apif_settings['slider_layout5_animation_effect'])){ selected( $apif_settings['slider_layout5_animation_effect'], 'apif-img-strongapollo' ); } ?> >Strong Apollo</option>
    <option value="apif-img-darkkiraview" <?php if(isset($apif_settings['slider_layout5_animation_effect'])){ selected( $apif_settings['slider_layout5_animation_effect'], 'apif-img-darkkiraview' ); } ?> >Dark Kira Overlay</option>
    <option value="apif-img-dynamicjazz" <?php if(isset($apif_settings['slider_layout5_animation_effect'])){ selected( $apif_settings['slider_layout5_animation_effect'], 'apif-img-dynamicjazz' ); } ?> >Dynamic Jazz</option>
</select>
*/?>
<?php 
$slider_layout5animation = (isset($apif_settings['slider_layout5_animation_effect']) && $apif_settings['slider_layout5_animation_effect'] != '')?esc_attr($apif_settings['slider_layout5_animation_effect']):'apif-top-to-bottom';
?>
<div class="apif-hoveranimation-wrapper">
<label class="apif-hover-layouts apif-top-to-bottom">
    <input type="checkbox" name="instagram[slider_layout5_animation_effect]" value="apif-top-to-bottom" class="apif-form-field apif-normal-checkbox" <?php if($slider_layout5animation == "apif-top-to-bottom") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Top to Bottom</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-bottom-to-top">
    <input type="checkbox" name="instagram[slider_layout5_animation_effect]" value="apif-bottom-to-top" class="apif-form-field apif-normal-checkbox" <?php if($slider_layout5animation == "apif-bottom-to-top") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Bottom to Top</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-left-to-right">
    <input type="checkbox" name="instagram[slider_layout5_animation_effect]" value="apif-left-to-right" class="apif-form-field apif-normal-checkbox" <?php if($slider_layout5animation == "apif-left-to-right") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Left To Right</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-right-to-left">
    <input type="checkbox" name="instagram[slider_layout5_animation_effect]" value="apif-right-to-left" class="apif-form-field apif-normal-checkbox" <?php if($slider_layout5animation == "apif-right-to-left") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Right To Left</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>

<label class="apif-hover-layouts apif-img-holyshade">
    <input type="checkbox" name="instagram[slider_layout5_animation_effect]" value="apif-img-holyshade" class="apif-form-field apif-normal-checkbox" <?php if($slider_layout5animation == "apif-img-holyshade") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Holy Shade</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>

<label class="apif-hover-layouts apif-img-crazylaylia">
    <input type="checkbox" name="instagram[slider_layout5_animation_effect]" value="apif-img-crazylaylia" class="apif-form-field apif-normal-checkbox" <?php if($slider_layout5animation == "apif-img-crazylaylia") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Crazy Laylia</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>

<label class="apif-hover-layouts apif-img-creative">
    <input type="checkbox" name="instagram[slider_layout5_animation_effect]" value="apif-img-creative" class="apif-form-field apif-normal-checkbox" <?php if($slider_layout5animation == "apif-img-creative") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Creative Overlay</span>
    <?php 
    $overlay = "creative";
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation2.php' );
    ?>
</label>

<label class="apif-hover-layouts apif-img-pleasure">
    <input type="checkbox" name="instagram[slider_layout5_animation_effect]" value="apif-img-pleasure" class="apif-form-field apif-normal-checkbox" <?php if($slider_layout5animation == "apif-img-pleasure") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Pleasure View</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>

<label class="apif-hover-layouts apif-img-sweetmarley">
    <input type="checkbox" name="instagram[slider_layout5_animation_effect]" value="apif-img-sweetmarley" class="apif-form-field apif-normal-checkbox" <?php if($slider_layout5animation == "apif-img-sweetmarley") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Sweet Marley</span>
    <?php 
     $overlay = "sweetmarley";
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation3.php' );
    ?>
</label>

<label class="apif-hover-layouts apif-img-freshbubba">
    <input type="checkbox" name="instagram[slider_layout5_animation_effect]" value="apif-img-freshbubba" class="apif-form-field apif-normal-checkbox" <?php if($slider_layout5animation == "apif-img-freshbubba") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Fresh Bubba</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>

<label class="apif-hover-layouts apif-img-sillychicho">
    <input type="checkbox" name="instagram[slider_layout5_animation_effect]" value="apif-img-sillychicho" class="apif-form-field apif-normal-checkbox" <?php if($slider_layout5animation == "apif-img-sillychicho") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Silly Chicho</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-img-tender">
    <input type="checkbox" name="instagram[slider_layout5_animation_effect]" value="apif-img-tender" class="apif-form-field apif-normal-checkbox" <?php if($slider_layout5animation == "apif-img-tender") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Tender Hera</span>
    <?php 
    $overlay = "tender";
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation3.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-img-jolly">
    <input type="checkbox" name="instagram[slider_layout5_animation_effect]" value="apif-img-jolly" class="apif-form-field apif-normal-checkbox" <?php if($slider_layout5animation == "apif-img-jolly") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Jolly Winston</span>
    <?php 
    $overlay = "jolly";
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation3.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-img-strongapollo">
    <input type="checkbox" name="instagram[slider_layout5_animation_effect]" value="apif-img-strongapollo" class="apif-form-field apif-normal-checkbox" <?php if($slider_layout5animation == "apif-img-strongapollo") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Strong Apollo</span>
    <?php 
    $overlay = "strongapollo";
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation3.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-img-darkkiraview">
    <input type="checkbox" name="instagram[slider_layout5_animation_effect]" value="apif-img-darkkiraview" class="apif-form-field apif-normal-checkbox" <?php if($slider_layout5animation == "apif-img-darkkiraview") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Dark Kira Overlay</span>
    <?php 
    $overlay = "darkkiraview";
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation3.php' );
    ?>
</label>
<label class="apif-hover-layouts apif-img-dynamicjazz">
    <input type="checkbox" name="instagram[slider_layout5_animation_effect]" value="apif-img-dynamicjazz" class="apif-form-field apif-normal-checkbox" <?php if($slider_layout5animation == "apif-img-dynamicjazz") echo 'checked="checked"';?>>
    <span class="apif-radio-title">Dynamic Jazz</span>
    <?php 
    include(APIF_INST_INCLUDES_BACKEND_PATH. 'animation/animation1.php' );
    ?>
</label>
</div>
</div>
</div>

<div class="apif-option-inner-wrapper">
 <label class="label-control"><?php echo _e('Background Color', 'accesspress-instagram-feed-pro'); ?> </label>
   <input type="text" class='apif-colorpicker' data-alpha="true" name="instagram[slider_layout5_layouttype]" value="<?php if(isset($apif_settings['slider_layout5_layouttype']) && $apif_settings['slider_layout5_layouttype'] != '') { echo esc_attr($apif_settings['slider_layout5_layouttype']); } ?> "/>
</div>

<div class="apif-option-inner-wrapper">
 <label class="label-control"><?php echo _e('Click/Scroll Type', 'accesspress-instagram-feed-pro'); ?> </label>
 <select class="form-control" name="instagram[slider_layout5_type]">
    <option value='hover-precise' <?php if(isset($apif_settings['slider_layout5_type'])){ selected( $apif_settings['slider_layout5_type'], 'hover-precise' ); } ?> >Hover Precise</option>
    <option value='hover-33' <?php if(isset($apif_settings['slider_layout5_type'])){ selected( $apif_settings['slider_layout5_type'], 'hover-33' ); } ?> >Hover 33</option>
     <option value='hover-50' <?php if(isset($apif_settings['slider_layout5_type'])){ selected( $apif_settings['slider_layout5_type'], 'hover-50' ); } ?> >Hover 50</option>
     <option value='hover-80' <?php if(isset($apif_settings['slider_layout5_type'])){ selected( $apif_settings['slider_layout5_type'], 'hover-80' ); } ?> >Hover 80</option>
    <option value='click-thumb' <?php if(isset($apif_settings['slider_layout5_type'])){ selected( $apif_settings['slider_layout5_type'], 'click-thumb' ); } ?> >Click Thumb</option>
    <option value='click-25' <?php if(isset($apif_settings['slider_layout5_type'])){ selected( $apif_settings['slider_layout5_type'], 'click-25' ); } ?> >Click 25</option>
    <option value='click-50' <?php if(isset($apif_settings['slider_layout5_type'])){ selected( $apif_settings['slider_layout5_type'], 'click-50' ); } ?> >Click 50</option>
    <option value='click-80' <?php if(isset($apif_settings['slider_layout5_type'])){ selected( $apif_settings['slider_layout5_type'], 'click-80' ); } ?> >Click 80</option>
</select>
<p class="description"  style="margin-top: 15px;
    background: #f9f9f9;
    padding: 10px;
    color: #58676c;">
 Note: Description of each Click or Scroll type options:
 <br/>
   1. <b>click-[number] </b>:<br/>Scrolling content by clicking buttons. The scrolling amount is defined by type name, where [number] indicates a percentage of the scroller area. For example, setting "click-50" on a 800 pixels wide horizontal scroller, means that each time you click the left or right arrow buttons, the content will scroll by 400 pixels (50% of 800px) to the left or right.<br/>
    2. <b>Hover Precise: </b><br/> Scrolling content with animation easing (non-linear mode) by hovering the cursor over the scroller.The scrolling speed and direction is directly affected by the cursor movement and position within the scroller <br/>
    3. <b>"hover-[number]" (e.g. "hover-33", "hover-80" etc.): </b><br/>
    Scrolling content in linear mode by hovering the cursor over the scroller edges. The edges are defined by the type name, where [number] indicates the percentage of the scroller area in which scrolling is idle. For example, setting "hover-50" (default value) on a 600 pixels wide horizontal scroller, means that scrolling will be triggered only when the cursor is over the first 150 pixels from the left or right edge. And when cursor is over the 50% of the scroller width (300 pixels), scrolling will be idle or stopped.<br/>
    4.<b> Click Thumb:</b><br/> Scrolling each image/thumbnail at a time by clicking buttons.
</p>
</div>

<div class="apif-option-inner-wrapper">
 <label class="label-control"><?php echo _e('Theme Style', 'accesspress-instagram-feed-pro'); ?> </label>
 <select class="form-control" name="instagram[slider_layout5_theme]">
    <option value='buttons-in' <?php if(isset($apif_settings['slider_layout5_theme'])){ selected( $apif_settings['slider_layout5_theme'], 'buttons-in' ); } ?> >Button In</option>
    <option value='buttons-out' <?php if(isset($apif_settings['slider_layout5_theme'])){ selected( $apif_settings['slider_layout5_theme'], 'buttons-out' ); } ?> >Button Out</option>
    <option value='hover-classic' <?php if(isset($apif_settings['slider_layout5_theme'])){ selected( $apif_settings['slider_layout5_theme'], 'hover-classic' ); } ?> >Hover Classic</option>
</select>
</div>


</div>

<!-- slider layout 5 settings ends -->
<!-- slider layout 6 settings -->
<div class='apif-layout-setting slider-6-layout' style="<?php if( $instagram_mosaic== 'slider_6_layout'){ echo 'display:block'; }else{ echo 'display:none'; } ?>">
<?php include(APIF_INST_INCLUDES_BACKEND_PATH. 'layouts/carousel-post-slider-layout.php' );?>
</div>
<!-- slider layout 6 settings ends -->
<!-- slider layout 7 settings -->
<div class='apif-layout-setting slider-7-layout' style="<?php if( $instagram_mosaic== 'slider_7_layout'){ echo 'display:block'; }else{ echo 'display:none'; } ?>">
<?php include(APIF_INST_INCLUDES_BACKEND_PATH. 'layouts/carousel-row-slider-layout.php' );?>
</div>
<!-- slider layout 7 settings ends -->
<!-- Filter Layout 1 Settings -->
<?php
if($instagram_mosaic == "filter_template1" || $instagram_mosaic == "filter_template2" || $instagram_mosaic == "filter_template3" || $instagram_mosaic == "filter_template4" || $instagram_mosaic == "filter_template5"){
$filter_style = "";
}else{
$filter_style = "style='display:none'";
}
?>
<div class="apif-layout-setting filter_template" <?php echo $filter_style;?>>
  <?php include(APIF_INST_INCLUDES_BACKEND_PATH. 'layouts/filter-layout.php' );?>      
</div>