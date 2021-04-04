<?php
if ($layout == 'grid_layout'){
 $layout_class = "ap_feeds-grid_layout";
 $layout_enable = "grid_layout"; 
$grid_layout_animate_css_effect = (isset($grid_layout_animate_css_effect) && $grid_layout_animate_css_effect != '')?esc_attr($grid_layout_animate_css_effect):''; 
}else{
 $layout_class = "ap_feeds-grid_layout1";
 $layout_enable = "grid_layout1"; 
 $grid_layout_animate_css_effect = (isset($grid_layout1_animate_css_effect) && $grid_layout1_animate_css_effect != '')?esc_attr($grid_layout1_animate_css_effect):''; 
}

if($layout_enable  == "grid_layout"){
   $column_option = (isset($apif_settings['grid_layout']['columns']) && !empty($apif_settings['grid_layout']['columns']))?$apif_settings['grid_layout']['columns']:array();
}else{
   $column_option = (isset($apif_settings['grid_layout1']['columns']) && !empty($apif_settings['grid_layout1']['columns']))?$apif_settings['grid_layout1']['columns']:array();
}

if( $detect->isMobile() && !$detect->isTablet() ){
// echo "Mobile Detected";
   $grid_layout_no_of_columns = isset($column_option['mobile']) ? $column_option['mobile'] : '1'; // "apif-col-1";
}else if( $detect->isTablet() ){
// Any tablet device.
   $grid_layout_no_of_columns =  isset($column_option['tablet']) ? $column_option['tablet'] : '3';
}
// any desktop devices
else{
    // echo "Desktop detected";
     if($totalcolumn != ''){
        $grid_layout_no_of_columns = $totalcolumn;
   }else{
       $grid_layout_no_of_columns = isset($column_option['desktop']) ? $column_option['desktop'] : $grid_layout_no_of_columns;
   }
   
}
$grid_layout_no_of_columns = "apif-col-".$grid_layout_no_of_columns;
$large_desktop_column = (isset($column_option['largedesktop']) && $column_option['largedesktop'] != '') ? 'apif-large-desktop-col-'.$column_option['largedesktop'] : 'apif-large-desktop-col-4';
?>
<div class="ap-self-user-feed apif-masonry-box <?php if(isset($grid_layout_no_of_columns)){ echo $grid_layout_no_of_columns; }else{ echo 'apif-col-4'; } ?> <?php echo $large_desktop_column;?> <?php if(isset($grid_layout_animate_css_effect) && $grid_layout_animate_css_effect !=''){ echo 'wow '.$grid_layout_animate_css_effect.' '; }else{ echo ''; } ?><?php echo $hoveranimation; ?>" <?php echo $style; ?> >
            <figure>
                <div class="apif-featimg">
                    <a class="example-image-link" href="#" style="background-image: url(<?php echo esc_url($image); ?>);"></a>
                </div>
             <div class='apif-image-overlay' style="background: <?php echo $theme_accent_color; ?>;"></div>
             <div class="apif-overlay-cont-block">
                <?php if(isset($apif_settings['enable_lightbox'])){
                        if($apif_settings['lightbox_layout'] == 'nivo_lightbox'){
                    ?>
                        <a href='<?php echo esc_url($image); ?>'  title="<?php echo esc_html($captiontext); ?>" class="apif-swipebox hoverlay-link" data-lightbox-gallery="gallery1"> image link </a>
                <?php
                        }else if($apif_settings['lightbox_layout'] == 'preety_photo'){

                            include(APIF_INST_PATH.'inc/frontend/lightbox/prettyphoto.php');

                        }else if ($apif_settings['lightbox_layout'] == 'litbx_lightbox') { ?>
                          <a href='<?php echo esc_url($image); ?>' class="hoverlay-link litbx" data-group="gallery">image link </a>
                          <?php
                        }else if ($apif_settings['lightbox_layout'] == 'swipe_box'){ 
                          
                          include(APIF_INST_PATH.'inc/frontend/lightbox/swipe_box.php');

                        }else if($apif_settings['lightbox_layout'] == 'classic'){ ?>
                        <a class="hoverlay-link example-image-link" href="<?php echo esc_url($image); ?>" data-lightbox="example-set">image link</a>
                        <?php
                        }else if($apif_settings['lightbox_layout'] == 'venobox_lightbox'){ 
                          
                          include(APIF_INST_PATH.'inc/frontend/lightbox/venobox.php');

                        }else if($apif_settings['lightbox_layout'] == 'apif_own_lightbox'){ 
                            $extra_hover_class = "hoverlay-link";
                            include(APIF_INST_PATH.'inc/frontend/lightbox/custom_lightbox.php');
                         } 
                       } ?>
                 
                 <?php if(isset($instagram_image_link)){
                   include(APIF_INST_PATH.'inc/frontend/common/instagram-image-link.php'); 
                  } ?>

                  <div class="apif-middle-content-wrapper"> 
                    <div class="apif-inner-content-wrapper"> 
                        <?php 
                        if($hoveranimation == "apif-img-creative"){ ?>
                         
                           <div class="apif-creative-wrapper-profile">
                            <?php if(isset($instagram_user_username)){ ?>
                            <div class="apif-user-name" <?php if(isset($hover_image_text_color) && $hover_image_text_color != '') echo 'style="color:'.$hover_image_text_color.'"';?>><?php echo $html_profile_userlink; ?>
                             </div>
                            <?php  } ?>
                            <?php  include(APIF_INST_PATH.'inc/frontend/common/comments.php'); ?>
                            </div>
                            <div class="apif-creative-second-wrapper">
                              <?php if(isset($instagram_user_link)){   include(APIF_INST_PATH.'inc/frontend/common/profile-image.php'); }?>
                               <?php include(APIF_INST_PATH.'inc/frontend/common/social-share.php'); ?>
                            </div>
                        
                         <?php }else if($hoveranimation == "apif-img-sweetmarley" || $hoveranimation == "apif-img-tender" || $hoveranimation == "apif-img-jolly" || $hoveranimation == "apif-img-strongapollo" || $hoveranimation == "apif-img-darkkiraview"){ 
                             if($hoveranimation == "apif-img-tender"){
                               $classanimte = "tender";
                             }else if($hoveranimation == "apif-img-jolly"){
                               $classanimte = "jolly";
                             }else if($hoveranimation == "apif-img-strongapollo"){
                               $classanimte = "strongapollo";
                             }else if($hoveranimation == "apif-img-sweetmarley"){
                               $classanimte = "sweetmarley";
                             }else{
                                $classanimte = "darkkiraview";
                             }
                            ?>
                            <div class="apif-<?php echo $classanimte;?>-wrapper-profile">
                              <?php if(isset($instagram_user_link)){   include(APIF_INST_PATH.'inc/frontend/common/profile-image.php'); }?>
                              <?php if(isset($instagram_user_username)){ ?>
                            <div class="apif-user-name" <?php if(isset($hover_image_text_color) && $hover_image_text_color != '') echo 'style="color:'.$hover_image_text_color.'"';?>><?php echo $html_profile_userlink; ?>
                             </div>
                            <?php  } ?>                           
                            </div>
                            <div class="apif-<?php echo $classanimte;?>-second-wrapper">
                               <?php  include(APIF_INST_PATH.'inc/frontend/common/comments.php'); ?>
                               <?php  include(APIF_INST_PATH.'inc/frontend/common/social-share.php'); ?>
                            </div>
                         <?php }else{ 

                         if(isset($instagram_user_link)){ 
                          include(APIF_INST_PATH.'inc/frontend/common/profile-image.php');
                          }
                          if(isset($instagram_user_username)){ ?>
                           <div class="apif-user-name" <?php if(isset($hover_image_text_color) && $hover_image_text_color != '') echo 'style="color:'.$hover_image_text_color.'"';?>><?php echo $html_profile_userlink; ?>
                             </div>
                          <?php  } 

                            include(APIF_INST_PATH.'inc/frontend/common/comments.php'); 
                            include(APIF_INST_PATH.'inc/frontend/common/social-share.php'); 
                        
                         } ?>
                       </div>
                    </div> 
            </div>
</figure>
</div>