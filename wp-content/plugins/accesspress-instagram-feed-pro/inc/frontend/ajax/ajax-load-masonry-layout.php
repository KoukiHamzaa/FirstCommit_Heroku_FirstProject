<?php
if(isset($apif_settings['masonary_layout'])){
            $column_option = $apif_settings['masonary_layout']['columns'];
            if( $detect->isMobile() && !$detect->isTablet() ){
              // echo "Mobile Detected";
              $masonary_layout_no_of_columns = isset($column_option['mobile']) ? $column_option['mobile'] : '1'; // "apif-col-1";
            }
            // Any tablet device.
            else if( $detect->isTablet() ){
              // echo "Tablet Detected";
              $masonary_layout_no_of_columns = isset($column_option['tablet']) ? $column_option['tablet'] : '3';
            }
            // any desktop devices
            else{
                // echo "Desktop detected";
                if($totalcolumn != ''){
                  $masonary_layout_no_of_columns = $totalcolumn;
                }else{
                	$masonary_layout_no_of_columns = isset($column_option['desktop']) ? $column_option['desktop'] : $masonary_layout_no_of_columns;
                }
                
            }

            $masonary_layout_no_of_columns = "apif-col-$masonary_layout_no_of_columns";
}else{
    $masonary_layout_no_of_columns = $masonary_layout_no_of_columns;
}
?>
<!-- apif-col-2 apif-col-3 apif-col-4 apif-col-5  apif-col-6 -->
<div class="ap-self-user-feed apif-masonry-box <?php if(isset($masonary_layout_no_of_columns)){ echo $masonary_layout_no_of_columns; }else{ echo 'apif-col-5'; } ?> <?php if(isset($masonary_layout_animate_css_effect) && $masonary_layout_animate_css_effect!=''){ echo 'wow '.$masonary_layout_animate_css_effect; } ?> <?php if(isset($hoveranimation)){ echo $hoveranimation; }else{ echo "apif-right-to-left"; } ?> <?php echo $largedesktopcolumn;?>" data-wow-duration="2s">
           <!-- dynamic garne  -->
            <div class="apif-masonry-block" style="background: <?php if(isset($masonary_layout_background_color)){ echo $masonary_layout_background_color; }else{ echo '#f9f9f9'; } ?>  !important; border:<?php if(isset($masonary_layout_border_width)){ echo $masonary_layout_border_width; }else{ echo '2'; } ?>px solid <?php if(isset($masonary_layout_border_color)){ echo $masonary_layout_border_color; }else{ echo '#fd7062'; } ?> !important;">
            <figure>
                <div class="apif-featimg">
                        <?php if($vm['type'] == 'video'){
                            ?>
                        <a class="example-image-link" href="<?php echo $vm['videos']['low_bandwidth']['url']; ?>" style="background-image: url(<?php echo esc_url($image); ?>);"></a>
                        <?php }else{ ?>
                            <a class="example-image-link" href="#" style="background-image: url(<?php echo esc_url($image); ?>);"></a>
                        <?php } ?>
                </div>
             <div class='apif-image-overlay' style="background: <?php echo $theme_accent_color; ?>;"></div>
             <div class="apif-overlay-cont-block">
             <?php if(isset($apif_settings['enable_lightbox'])){ ?>
             <span class="apif-ins-link" style="margin-top: 30px;"> 
                 <?php
                    if($apif_settings['lightbox_layout'] == 'nivo_lightbox'){?>
                    <a href='<?php echo esc_url($image); ?>'  title="<?php echo $vm['caption']['text']; ?>" class="apif-swipebox hoverlay-link" data-lightbox-gallery="gallery1"></a>
                   <?php
                    }else if($apif_settings['lightbox_layout'] == 'preety_photo'){ 

                        include(APIF_INST_PATH.'inc/frontend/lightbox/prettyphoto.php');
                    }else if ($apif_settings['lightbox_layout'] == 'litbx_lightbox') { ?>
                      <a href='<?php echo esc_url($image); ?>' class="hoverlay-link litbx" data-group="gallery"> </a>
                      <?php
                    }else if ($apif_settings['lightbox_layout'] == 'swipe_box'){ 
                        include(APIF_INST_PATH.'inc/frontend/lightbox/swipe_box.php');
                    }else if($apif_settings['lightbox_layout'] == 'classic'){ ?>
                    <a class="hoverlay-link example-image-link" href="<?php echo esc_url($image); ?>" data-lightbox="example-set"></a>
                    <?php
                    }else if($apif_settings['lightbox_layout'] == 'venobox_lightbox'){
                        include(APIF_INST_PATH.'inc/frontend/lightbox/venobox.php');
                    }else if($apif_settings['lightbox_layout'] == 'apif_own_lightbox'){ 
                       $extra_hover_class = "";
                       include(APIF_INST_PATH.'inc/frontend/lightbox/custom_lightbox.php');  
                    } ?>
                </span>
             <?php } ?>
             
             <?php if(isset($instagram_image_link)){ 
               include(APIF_INST_PATH.'inc/frontend/common/instagram-image-link.php');  
             } ?>
              
              <div class="apif-middle-content-wrapper"> 
                                <div class="apif-inner-content-wrapper"> 
                                     <?php
                                     if($hoveranimation == "apif-img-creative"){?>                                
                                    <div class="apif-creative-wrapper-profile">
                                       <div class="apif-prof-n-name-wrap">
                                         <?php if(isset($instagram_user_username)){ ?>
                                           <div class="apif-user-name" <?php if(isset($hover_image_text_color) && $hover_image_text_color != '') echo 'style="color:'.$hover_image_text_color.'"'; else  echo 'style="color:#ffffff;"'?>><?php echo $html_profile_userlink; ?>
                                            </div>
                                           <?php  } ?>
                                       </div>
                                        <?php
                                             include(APIF_INST_PATH.'inc/frontend/common/comments.php'); 
                                        ?>
                                    </div>
                                    <div class="apif-creative-second-wrapper">
                                       <div class="apif-prof-n-name-wrap">
                                         <?php 
                                          if(isset($instagram_user_link)){ 
                                                include(APIF_INST_PATH.'inc/frontend/common/profile-image.php');
                                             }
                                          include(APIF_INST_PATH.'inc/frontend/common/social-share.php'); 
                                          ?>
                                       </div>
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
                                        <div class="apif-user-name" <?php if(isset($hover_image_text_color) && $hover_image_text_color != '') echo 'style="color:'.$hover_image_text_color.'"'; else  echo 'style="color:#ffffff;"'?>><?php echo $html_profile_userlink; ?>
                                         </div>
                                        <?php  } ?>                           
                                        </div>
                                        <div class="apif-<?php echo $classanimte;?>-second-wrapper">
                                           <?php  include(APIF_INST_PATH.'inc/frontend/common/comments.php'); ?>
                                           <?php include(APIF_INST_PATH.'inc/frontend/common/social-share.php'); ?>
                                        </div>
                           <?php }else{ 
                                    if(isset($instagram_user_link)){ 
                                     include(APIF_INST_PATH.'inc/frontend/common/profile-image.php');
                                    }
                                            if(isset($instagram_user_username)){ ?>
                                            <div class="apif-user-name" <?php if(isset($hover_image_text_color) && $hover_image_text_color != '') echo 'style="color:'.$hover_image_text_color.'"'; else  echo 'style="color:#ffffff;"'?>><?php echo $html_profile_userlink; ?>
                                     </div>
                                             <?php  } ?>
                                    <?php 
                                         include(APIF_INST_PATH.'inc/frontend/common/comments.php'); 
                                         include(APIF_INST_PATH.'inc/frontend/common/social-share.php'); 
                                        } ?>
                                  </div>
                            </div>

            </div>
        </figure>
        <div class="apif-fig-content">
                <div class='ap_posted_ago'>
                    <?php
                        $oldTime = $vm['created_time'];
                        echo $insta->xTimeAgo($oldTime);
                    ?>
                </div>
                <div class='apif-image-caption clearfix'>
                    <?php 
                    $reg_exUrl = "/(http|https|ftp|ftps|www|www.)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
                        $text = $captiontext;
                        $text = str_replace( " www. ", "http://www.", $text );
                        $text = str_replace( " Www. ", "http://www.", $text );
                        if(preg_match($reg_exUrl, $text, $url)) {
                        }
                        $text = $this->html_cut($text, 200);
                        $text = str_replace('#', ' #', $text);
                        echo $text; ?>
                </div>
            </div>
    </div>
</div>