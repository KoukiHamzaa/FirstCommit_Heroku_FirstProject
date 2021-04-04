<?php defined('ABSPATH') or die("No script kiddies please!");
$instagram_mosaic = (isset($apif_settings['instagram_mosaic']) && $apif_settings['instagram_mosaic'] != '')?esc_attr($apif_settings['instagram_mosaic']):'mosaic';
?>
<div class="apif-option-inner-wrapper">
    <label class="label-control">
      <?php _e('Choose Layout ', 'accesspress-instagram-feed-pro'); ?>
    </label>    
    <div class="apif-option-field">
      <select name="instagram[instagram_mosaic]" class="instagram_mosaic">
        <optgroup label="Advanced Template">
          <option value="mosaic" <?php if($instagram_mosaic == 'mosaic'){?>selected="selected"<?php }?>><?php _e('Mosaic Layout', 'accesspress-instagram-feed-pro'); ?></option>
          <option value="instagram_layout" <?php if($instagram_mosaic == 'instagram_layout'){?>selected="selected"<?php }?>><?php _e('Instagram Layout', 'accesspress-instagram-feed-pro'); ?></option>
          <option value="round_image" <?php if($instagram_mosaic == 'round_image'){?>selected="selected"<?php }?>><?php _e('Round Image Layout', 'accesspress-instagram-feed-pro'); ?></option>
        </optgroup>
        <optgroup label="Grid Template">
          <option value="grid_layout" <?php if($instagram_mosaic == 'grid_layout'){?>selected="selected"<?php }?>><?php _e('Simple Grid Layout', 'accesspress-instagram-feed-pro'); ?></option>
          <option value="grid_layout1" <?php if($instagram_mosaic == 'grid_layout1'){?>selected="selected"<?php }?>><?php _e('Modern Grid Layout', 'accesspress-instagram-feed-pro'); ?></option>
          <option value="grid_layout2" <?php if($instagram_mosaic == 'grid_layout2'){?>selected="selected"<?php }?>><?php _e('Slide Content Grid Layout', 'accesspress-instagram-feed-pro'); ?></option>
          <option value="grid_rotator" <?php if($instagram_mosaic == 'grid_rotator'){?>selected="selected"<?php }?>><?php _e('Grid Rotator Layout', 'accesspress-instagram-feed-pro'); ?></option>
        </optgroup>
        <optgroup label="Masonry Template">
          <option value="masonry_layout" <?php if($instagram_mosaic == 'masonry_layout'){?>selected="selected"<?php }?>><?php _e('Simple Masonry Layout', 'accesspress-instagram-feed-pro'); ?></option>
          <option value="masonry_layout1" <?php if($instagram_mosaic == 'masonry_layout1'){?>selected="selected"<?php }?>><?php _e('Modern Masonry Layout', 'accesspress-instagram-feed-pro'); ?></option>
          <option value="masonry_layout2" <?php if($instagram_mosaic == 'masonry_layout2'){?>selected="selected"<?php }?>><?php _e('Modern Blue Masonary Layout', 'accesspress-instagram-feed-pro'); ?></option>
          <option value="masonry_layout3" <?php if($instagram_mosaic == 'masonry_layout3'){?>selected="selected"<?php }?>><?php _e('Classic Masonary Layout', 'accesspress-instagram-feed-pro'); ?></option>
          <option value="masonry_layout4" <?php if($instagram_mosaic == 'masonry_layout4'){?>selected="selected"<?php }?>><?php _e('Light Masonary Layout', 'accesspress-instagram-feed-pro'); ?></option>
          <option value="masonry_layout5" <?php if($instagram_mosaic == 'masonry_layout5'){?>selected="selected"<?php }?>><?php _e('Box Shadow Masonary Layout', 'accesspress-instagram-feed-pro'); ?></option>
        </optgroup>
        <optgroup label="Slider Template">
          <option value="slider" <?php if($instagram_mosaic == 'slider'){?>selected="selected"<?php }?>><?php _e('Owl Slider Layout', 'accesspress-instagram-feed-pro'); ?></option>
          <option value="slider_1_layout" <?php if($instagram_mosaic == 'slider_1_layout'){?>selected="selected"<?php }?>><?php _e('Nivo Single Slider Layout', 'accesspress-instagram-feed-pro'); ?></option>
          <option value="slider_2_layout" <?php if($instagram_mosaic == 'slider_2_layout'){?>selected="selected"<?php }?>><?php _e('JCarousel Slider Layout', 'accesspress-instagram-feed-pro'); ?></option>
          <option value="slider_4_layout" <?php if($instagram_mosaic == 'slider_4_layout'){?>selected="selected"<?php }?>><?php _e('Custom Slider Pro Layout', 'accesspress-instagram-feed-pro'); ?></option>
          <option value="slider_5_layout" <?php if($instagram_mosaic == 'slider_5_layout'){?>selected="selected"<?php }?>><?php _e('Thumbnail Scroller Slider', 'accesspress-instagram-feed-pro'); ?></option>
          <option value="slider_6_layout" <?php if($instagram_mosaic == 'slider_6_layout'){?>selected="selected"<?php }?>><?php _e('Carousel Post Slider Layout', 'accesspress-instagram-feed-pro'); ?></option>
          <option value="slider_7_layout" <?php if($instagram_mosaic == 'slider_7_layout'){?>selected="selected"<?php }?>><?php _e('Carousel Row Slider Layout', 'accesspress-instagram-feed-pro'); ?></option>
        </optgroup>
        <optgroup label="Filter Template By Image/Video Wise">
          <option value="filter_template1" <?php if($instagram_mosaic == 'filter_template1'){?>selected="selected"<?php }?>><?php _e('Round Filter Tile Layout', 'accesspress-instagram-feed-pro'); ?></option>
          <option value="filter_template2" <?php if($instagram_mosaic == 'filter_template2'){?>selected="selected"<?php }?>><?php _e('Modern Filter Box Layout', 'accesspress-instagram-feed-pro'); ?></option>
          <option value="filter_template3" <?php if($instagram_mosaic == 'filter_template3'){?>selected="selected"<?php }?>><?php _e('Fancy Filter Layout', 'accesspress-instagram-feed-pro'); ?></option>
          <option value="filter_template4" <?php if($instagram_mosaic == 'filter_template4'){?>selected="selected"<?php }?>><?php _e('Lined Separated Filter Layout', 'accesspress-instagram-feed-pro'); ?></option>
          <option value="filter_template5" <?php if($instagram_mosaic == 'filter_template5'){?>selected="selected"<?php }?>><?php _e('Tabbed Filter Layout', 'accesspress-instagram-feed-pro'); ?></option>
        </optgroup>
      </select>                              
    </div>

    <h3><?php echo _e('Template Preview', 'accesspress-instagram-feed-pro'); ?></h3>
    <div class="apif-layout-setting mosaic-layout" style="<?php if( $instagram_mosaic == 'mosaic'){ echo 'display:block'; }else{ echo 'display:none'; } ?>">
      <div class="apif-preview-wrap">
        <img src="<?php echo APIF_IMAGE_DIR."/layouts/mosiac.png"; ?>"/>
      </div>
    </div>
    <div class="apif-layout-setting grid_layout" style="<?php if( $instagram_mosaic== 'grid_layout'){ echo 'display:block'; }else{ echo 'display:none'; } ?>">
        <div class="apif-preview-wrap">
         <img src="<?php echo APIF_IMAGE_DIR."/layouts/grid.png"; ?>"/>
        </div>
    </div>
    <div class="apif-layout-setting grid_layout1" style="<?php if( $instagram_mosaic== 'grid_layout1'){ echo 'display:block'; }else{ echo 'display:none'; } ?>"> 
      <div class="apif-preview-wrap">
       <img src="<?php echo APIF_IMAGE_DIR."/layouts/grid1-layout.png"; ?>"/>                                      
      </div>  
    </div>
    <div class="apif-layout-setting grid_layout2" style="<?php if( $instagram_mosaic== 'grid_layout2'){ echo 'display:block'; }else{ echo 'display:none'; } ?>">
        <div class="apif-preview-wrap">
         <img src="<?php echo APIF_IMAGE_DIR."/layouts/grid-layout2.png"; ?>"/>
        </div>
    </div>
     <div class='apif-layout-setting grid-rotator' style="<?php if( $instagram_mosaic== 'grid_rotator'){ echo 'display:block'; }else{ echo 'display:none'; } ?>" >
      <div class="apif-option-note"><p class="description"><?php echo _e('Note: In Grid Rotator, no of images set will not work. All the instagram feeds will be displayed according to row and column assigned to below field.', 'accesspress-instagram-feed-pro');?></p>
      </div>    
      <div class="apif-preview-wrap">
      <img src="<?php echo APIF_IMAGE_DIR."/layouts/grid-rotator.png"; ?>"/>                                      
      </div>
    </div>
     <div class='apif-layout-setting masonary' style="<?php if( $instagram_mosaic== 'masonry_layout'){ echo 'display:block'; }else{ echo 'display:none'; } ?>" >
      <div class="apif-preview-wrap">
          <img src="<?php echo APIF_IMAGE_DIR."/layouts/masonarylayout.png"; ?>"/></div>
    </div>
    <!-- Masonary layout settings ends -->
    <!-- Masonary layout 1 settings -->
    <div class='apif-layout-setting masonary1' style="<?php if( $instagram_mosaic== 'masonry_layout1'){ echo 'display:block'; }else{ echo 'display:none'; } ?>" >
        <div class="apif-preview-wrap">
          <img src="<?php echo APIF_IMAGE_DIR."/layouts/masonarylayout1.png"; ?>"/>
        </div>
    </div>
    <!-- Masonary layout 1 settings ends -->
    <!-- Masonary layout 2 settings -->
    <div class='apif-layout-setting masonary2' style="<?php if( $instagram_mosaic== 'masonry_layout2'){ echo 'display:block'; }else{ echo 'display:none'; } ?>" >

    <div class="apif-preview-wrap">
      <img src="<?php echo APIF_IMAGE_DIR."/layouts/masonarylayout2.png"; ?>"/></div>
    </div>
    <!-- Masonary layout 2 settings ends -->
    <!-- Masonary layout 3 settings -->
    <div class='apif-layout-setting masonary3' style="<?php if( $instagram_mosaic== 'masonry_layout3'){ echo 'display:block'; }else{ echo 'display:none'; } ?>" >
    <div class="apif-preview-wrap">
     <img src="<?php echo APIF_IMAGE_DIR."/layouts/masonarylayout3.png"; ?>"/>
    </div>
    </div>
    <!-- Masonary layout 3 settings ends -->
    <!-- Masonary layout 4 settings -->
    <div class='apif-layout-setting masonary4' style="<?php if( $instagram_mosaic== 'masonry_layout4'){ echo 'display:block'; }else{ echo 'display:none'; } ?>" >

    <div class="apif-preview-wrap">
      <img src="<?php echo APIF_IMAGE_DIR."/layouts/masonarylayout4.png"; ?>"/>
    </div>
    </div>
    <!-- Masonary layout 4 settings ends -->
    <!-- Masonary layout 5 settings -->
    <div class='apif-layout-setting masonary5' style="<?php if( $instagram_mosaic== 'masonry_layout5'){ echo 'display:block'; }else{ echo 'display:none'; } ?>" >
         <div class="apif-preview-wrap">
          <img src="<?php echo APIF_IMAGE_DIR."/layouts/masonarylayout5.png"; ?>"/>                                      
      </div>
    </div>
    <!-- Masonary layout 5 settings ends -->
    <!-- instagram layout settings -->
    <div class='apif-layout-setting instagram-layout' style="<?php if( $instagram_mosaic== 'instagram_layout'){ echo 'display:block'; }else{ echo 'display:none'; } ?>">
      <div class="apif-preview-wrap" style="width: 28%;">
        <img src="<?php echo APIF_IMAGE_DIR."/layouts/instagram_layout.png"; ?>"/>                                      
      </div>
    </div>
    <!-- instagram layout settings ends -->
    <!-- round image layout settings -->
    <div class='apif-layout-setting round-image' style="<?php if( $instagram_mosaic== 'round_image'){ echo 'display:block'; }else{ echo 'display:none'; } ?>" >
      <div class="apif-preview-wrap">
        <img src="<?php echo APIF_IMAGE_DIR."/layouts/round-layout.png"; ?>"/>                                      
      </div>
      <div class='apif-round-image-settings'>
      </div>
    </div>
    <!-- round image layout settings ends -->
    <!-- slider layout settings -->
    <div class="apif-layout-setting slider-layout" style="<?php if( $instagram_mosaic== 'slider'){ echo 'display:block'; }else{ echo 'display:none'; } ?>">
    <div class="apif-preview-wrap">
    <img src="<?php echo APIF_IMAGE_DIR."/layouts/owl-carousel-layout.png"; ?>"/>                                      
    </div>
    </div>
    <!-- slider layout settings ends-->

    <!-- slider 1 layout settings -->
    <div class="apif-layout-setting slider-1-layout" style="<?php if( $instagram_mosaic== 'slider_1_layout'){ echo 'display:block'; }else{ echo 'display:none'; } ?>">
    <div class="apif-preview-wrap" style="width: 40%;">
    <img src="<?php echo APIF_IMAGE_DIR."/layouts/nivo-sldier.png"; ?>"/>                                      
    </div>
    
    </div>
    <!-- slider 1 layout settings ends-->
    <!-- slider 2 layout settings -->
    <div class='apif-layout-setting slider-2-layout' style="<?php if( $instagram_mosaic== 'slider_2_layout'){ echo 'display:block'; }else{ echo 'display:none'; } ?>" >
      <div class='apif-option-note'><?php echo _e( "No other settings required for this layout.", 'accesspress-instagram-feed-pro' ); ?></div>
    <div class="apif-preview-wrap">
     <img src="<?php echo APIF_IMAGE_DIR."/layouts/jcarousel-slider-layout.png"; ?>"/>                               
    </div>

    </div>
    <!-- slider 2 layout settings ends -->
    <!-- slider 3 layout settings -->
    <div class="apif-layout-setting slider-3-layout" style="<?php if( $instagram_mosaic== 'slider_3_layout'){ echo 'display:block'; }else{ echo 'display:none'; } ?>">
    <div class="apif-preview-wrap" style="width: 40%;">
    <img src="<?php echo APIF_IMAGE_DIR."/layouts/nivo-sldier.png"; ?>"/>                                      
    </div>
    </div>
    <!-- slider 3 layout settings ends -->

    <!-- slider layout 4 settings -->
    <div class='apif-layout-setting slider-4-layout' style="<?php if( $instagram_mosaic== 'slider_4_layout'){ echo 'display:block'; }else{ echo 'display:none'; } ?>">
    <div class="apif-preview-wrap">
    <img src="<?php echo APIF_IMAGE_DIR."/layouts/sliderpro-layout.png"; ?>"/>                                      
    </div>
    </div>
    <!-- slider layout 5 settings -->
    <div class='apif-layout-setting slider-5-layout' style="<?php if( $instagram_mosaic== 'slider_5_layout'){ echo 'display:block'; }else{ echo 'display:none'; } ?>">
     <div class='apif-option-note'><?php echo _e( "No other settings required for this layout.", 'accesspress-instagram-feed-pro' ); ?></div>
    <div class="apif-preview-wrap">
    <img src="<?php echo APIF_IMAGE_DIR."/layouts/thumbnail-scroller-layout.png"; ?>"/>  
    </div>
    </div>
    <!-- slider layout 5 settings ends -->
    <!-- slider layout 6 settings -->
    <div class='apif-layout-setting slider-6-layout' style="<?php if( $instagram_mosaic== 'slider_6_layout'){ echo 'display:block'; }else{ echo 'display:none'; } ?>">
    <div class="apif-preview-wrap">
    <img src="<?php echo APIF_IMAGE_DIR."/layouts/carousel-post-slider-layout.png"; ?>"/>                      
    </div>
    </div>
    <!-- slider layout 6 settings ends -->
    <!-- slider layout 7 settings -->
    <div class='apif-layout-setting slider-7-layout' style="<?php if( $instagram_mosaic== 'slider_7_layout'){ echo 'display:block'; }else{ echo 'display:none'; } ?>">
    <div class="apif-preview-wrap">
    <img src="<?php echo APIF_IMAGE_DIR."/layouts/carousel-row-slider-layout.png"; ?>"/></div>
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
            <div class="apif-filter-template1"  style="<?php if( $instagram_mosaic== 'filter_template1'){ echo 'display:block'; }else{ echo 'display:none'; } ?>">   
               <div class="apif-preview-wrap">
                  <img src="<?php echo APIF_IMAGE_DIR."/layouts/filter-layout1.png"; ?>"/>
              </div>
            </div>
             <div class="apif-filter-template2"  style="<?php if( $instagram_mosaic== 'filter_template2'){ echo 'display:block'; }else{ echo 'display:none'; } ?>">   
               <div class="apif-preview-wrap">
                  <img src="<?php echo APIF_IMAGE_DIR."/layouts/filter-layout2.png"; ?>"/>
              </div>
            </div>
              <div class="apif-filter-template3"  style="<?php if( $instagram_mosaic== 'filter_template3'){ echo 'display:block'; }else{ echo 'display:none'; } ?>">   
               <div class="apif-preview-wrap">
                  <img src="<?php echo APIF_IMAGE_DIR."/layouts/filter-layout3.png"; ?>"/>
              </div>
            </div>
              <div class="apif-filter-template4"  style="<?php if( $instagram_mosaic== 'filter_template4'){ echo 'display:block'; }else{ echo 'display:none'; } ?>">   
               <div class="apif-preview-wrap">
                  <img src="<?php echo APIF_IMAGE_DIR."/layouts/filter-layout4.png"; ?>"/>
              </div>
            </div>
              <div class="apif-filter-template5"  style="<?php if( $instagram_mosaic== 'filter_template5'){ echo 'display:block'; }else{ echo 'display:none'; } ?>">   
               <div class="apif-preview-wrap">
                  <img src="<?php echo APIF_IMAGE_DIR."/layouts/filter-layout5.png"; ?>"/>
              </div>
            </div>     
    </div>
</div>
<?php
  include(APIF_INST_INCLUDES_BACKEND_PATH. 'layout-options.php' );
?>