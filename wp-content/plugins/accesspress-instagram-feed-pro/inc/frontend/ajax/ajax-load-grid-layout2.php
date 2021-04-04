<?php $grid_layout3_animate = (isset($apif_settings['grid_layout3_animate_css_effect']) && !empty($apif_settings['grid_layout3_animate_css_effect']))?'wow '.$apif_settings['grid_layout3_animate_css_effect']:'';
?>
<div class="ap-self-user-feed apif-masonry-box apif-col-4 apif-large-desktop-col-4 <?php echo $grid_layout3_animate; ?>" >
      <ul class="apif-grid-list-wrap clearfix">
         <li>
          <figure>
                <div class="apif-featimg" id="<?php echo $image;?>">
                    <a class="example-image-link" href="#" style="background-image: url(<?php echo esc_url($image); ?>);"></a>
                  <?php if(isset($apif_settings['enable_lightbox'])){ ?>
                   <span class="apif-lightbox-popup">
                       <?php 
                       if($apif_settings['lightbox_layout'] == 'preety_photo'){ 
                            include(APIF_INST_PATH.'inc/frontend/lightbox/prettyphoto.php');
                        }else if($apif_settings['lightbox_layout'] == 'litbx_lightbox'){  ?>
                         <a href='<?php echo esc_url($image); ?>' class="hoverlay-link litbx" data-group="gallery">
                           <i class="fa fa-search"></i>
                         </a>
                        <?php }else if($apif_settings['lightbox_layout'] == 'swipe_box'){ 
                          include(APIF_INST_PATH.'inc/frontend/lightbox/swipe_box.php');
                        }else if($apif_settings['lightbox_layout'] == 'venobox_lightbox'){ 
                          include(APIF_INST_PATH.'inc/frontend/lightbox/venobox.php');
                        }elseif($apif_settings['lightbox_layout'] == 'classic'){ 
                          $join_js_array[] = 'lightbox-js';
                          wp_enqueue_script('lightbox-js');
                          wp_enqueue_style('lightbox');
                          ?>
                          <a class="hoverlay-link example-image-link" href="<?php echo esc_url($image); ?>" data-lightbox="example-set"><i class="fa fa-search"></i></a>
                          <?php
                       }else if($apif_settings['lightbox_layout'] == 'apif_own_lightbox'){ 
                          $extra_hover_class = "hoverlay-link";
                          include(APIF_INST_PATH.'inc/frontend/lightbox/custom_lightbox.php');
                        }?>
                     </span>
                 <?php } ?>
                </div>
                <div class="apif-overlay-cont-block">
                <?php if(isset($instagram_image_link)){ 
                    include(APIF_INST_PATH.'inc/frontend/common/instagram-image-link.php'); 
                 } ?>

             
               <div class="apif-middle-content-wrap"> 
                    <div class="apif-inner-content-wrap"> 
                        <?php if(isset($instagram_user_link)){ 
                           include(APIF_INST_PATH.'inc/frontend/common/profile-image.php');
                          } ?>
                        <?php if(isset($instagram_user_username)){ ?>
                        <div class="apif-user-name" style='color:<?php if(isset($hover_image_text_color)){ echo $hover_image_text_color; }else{ echo "#fff"; } ?>;'><?php echo $html_profile_userlink; ?></div>
                        <?php } ?>
                        <?php 
                        include(APIF_INST_PATH.'inc/frontend/common/comments.php');
                        ?>
                        <div class="apif-caption-warp apif-image-caption" id="apif-scroll-style-4"><?php echo $captiontext;?></div>
                        <?php 
                           include(APIF_INST_PATH.'inc/frontend/common/social-share.php');
                        ?>
                       </div>
                </div>
            </div>
          </figure>
       </li>
    </ul>
</div>