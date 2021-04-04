<?php
// Any mobile device (phones or tablets).
// Exclude tablets.
if(isset($apif_settings['masonary_layout2'])){
$column_option = $apif_settings['masonary_layout2']['columns'];
if( $detect->isMobile() && !$detect->isTablet() ){
  // echo "Mobile Detected";
  $masonary_layout2_no_of_columns = isset($column_option['mobile']) ? $column_option['mobile'] : '1'; // "apif-col-1";
}
// Any tablet device.
else if( $detect->isTablet() ){
  // echo "Tablet Detected";
  $masonary_layout2_no_of_columns = isset($column_option['tablet']) ? $column_option['tablet'] : '3';
}
// any desktop devices
else{
    // echo "Desktop detected";
    if($totalcolumn != ''){
      $masonary_layout2_no_of_columns = $totalcolumn;
   }else{
    	$masonary_layout2_no_of_columns = isset($column_option['desktop']) ? $column_option['desktop'] : $masonary_layout2_no_of_columns;
   }
    
}
$masonary_layout2_no_of_columns = "apif-col-$masonary_layout2_no_of_columns";
}else{
$masonary_layout2_no_of_columns = $masonary_layout2_no_of_columns;
}
?>
<div class="ap-self-user-feed apif-masonry-box <?php if(isset($masonary_layout2_no_of_columns)){ echo $masonary_layout2_no_of_columns; }else{ echo 'apif-col-3'; } ?> <?php echo $largedesktopcolumn;?> <?php if( isset($masonary_layout2_animate_css_effect) && $masonary_layout2_animate_css_effect !='' ){ echo 'wow '.$masonary_layout2_animate_css_effect; } ?> apif-masnry-ui-two apif-masnry-ui-two-<?php echo $if_id; ?>" data-wow-duration="2s">
            <div class="apif-masonry-block" style="border:<?php if(isset($masonary_layout2_border_width)){ echo $masonary_layout2_border_width; }else{ echo '2'; } ?>px solid <?php if(isset($masonary_layout2_border_color)){ echo $masonary_layout2_border_color; }else{ echo '#fd7062'; } ?> !important;">
                <figure>
                    <div class="apif-blue-wrap" style="<?php if(isset($masonary_layout2_background_color)){ echo 'background:'.$masonary_layout2_background_color; } ?>;">
                        <div class="apif-featimg">
                            <div class="apif-view-n-popup">
                                <?php if(isset($apif_settings['enable_lightbox'])){
                                            if($apif_settings['lightbox_layout'] == 'nivo_lightbox'){ ?>
                                                <a href='<?php echo esc_url($image); ?>' title="<?php echo $vm['caption']['text']; ?>" class="apif-swipebox" data-lightbox-gallery="gallery1" ><i class="fa fa-search" ></i></a>
                                            <?php
                                            }else if($apif_settings['lightbox_layout'] == 'preety_photo'){ 
                                                  include(APIF_INST_PATH.'inc/frontend/lightbox/prettyphoto.php');
                                            }elseif ($apif_settings['lightbox_layout'] == 'litbx_lightbox') { ?>
                                                <a href='<?php echo esc_url($image); ?>' class="litbx" data-group="gallery"><i class="fa fa-search"></i></a>
                                            <?php
                                            }elseif ($apif_settings['lightbox_layout'] == 'swipe_box'){ 
                                                include(APIF_INST_PATH.'inc/frontend/lightbox/swipe_box.php');
                                            }elseif($apif_settings['lightbox_layout'] == 'classic'){ ?>
                                                <a class="example-image-link" href="<?php echo esc_url($image); ?>" data-lightbox="example-set"><i class="fa fa-search"></i></a>
                                            <?php
                                            }elseif($apif_settings['lightbox_layout'] == 'venobox_lightbox'){
                                                include(APIF_INST_PATH.'inc/frontend/lightbox/venobox.php');
                                            }else if($apif_settings['lightbox_layout'] == 'apif_own_lightbox'){ 
                                                    $extra_hover_class = "";
                                                    include(APIF_INST_PATH.'inc/frontend/lightbox/custom_lightbox.php');
                                            }
                                        } ?>
                              <?php if(isset($instagram_image_link)){ ?>
                                 <?php if($vm['type'] == 'video'){ ?>
                                     <a class="apif-ins-video-icon" href="<?php echo $link; ?>" target="_blank" title="<?php echo _e('View on Instagram', 'accesspress-instagram-feed-pro'); ?>"><i class="fa fa-play-circle-o"></i> </a>
                                 <?php }else if($vm['type'] == 'sidecar' || $vm['type'] == "carousel"){ //carousel 
                                  ?>
                                   <a class="apif-ins-video-icon apif-carusel-type" href="<?php echo $link; ?>" target="_blank" title="<?php echo _e('View on Instagram', 'accesspress-instagram-feed-pro'); ?>">
                                    <i class="fa fa-clone"></i> 
                                    </a> 
                                
                                 <?php }else{ ?>
                                     <a class="apif-ins-link" href='<?php echo $link; ?>' target='_blank' title="<?php echo _e('View on Instagram', 'accesspress-instagram-feed-pro'); ?>"><i class="fa fa-camera"></i></a>
                                 <?php } ?>
                             <?php  } ?>
                            </div>
                            
                            <a href="#" class="example-image-link" style="background-image: url(<?php echo esc_url($image); ?>);"></a>

                        <div class='apif-image-overlay' style="background: <?php echo $theme_accent_color; ?>;"></div>
                        </div>
            
                        <div class="apif-overlay-cont-block">
                           <div class="apif-post-feeds-wrapper">
                            <div class='ap_posted_ago' style='color:<?php if(isset($masonary_layout2_text_color)){ echo $masonary_layout2_text_color; }else{ echo "#fff"; } ?>;'>
                                <?php
                                $oldTime = $vm['created_time'];
                                echo $insta->xTimeAgo($oldTime);
                                ?>
                            </div>
                            <?php include(APIF_INST_PATH.'inc/frontend/common/social-share-layout1.php'); ?>
                          </div>

                        <div class='apif-image-caption clearfix' style='color:<?php if(isset($masonary_layout2_text_color)){ echo $masonary_layout2_text_color; }else{ echo "#fff"; } ?>;'>
                        <?php
                         $reg_exUrl = "/(http|https|ftp|ftps|www|www.)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
                            $text = $captiontext;
                            $text = str_replace( " www. ", "http://www.", $text );
                            $text = str_replace( " Www. ", "http://www.", $text );
                            if(preg_match($reg_exUrl, $text, $url)) {
                                                   // make the urls hyper links
                                                  // $text =  preg_replace($reg_exUrl, "<a style='font-size:12px;color:#ad6060' href='{$url[0]}'>{$url[0]}</a>", $text);
                            }
                            // echo strip_tags( substr($text, 0, 400)); 
                              $text = $this->html_cut($text, 400);
                              $text = str_replace('#', ' #', $text);
                              echo $text;
                             ?>
                        </div>
                     <?php
                           $hover_image_text_color =  $masonary_layout2_text_color;
                           include(APIF_INST_PATH.'inc/frontend/common/comments.php'); 
                        ?>
                    </div>
                </div>
            </figure>
           <div class="apif-fig-content">
                    <div class="apif-prof-n-name-wrap">
                        <?php if(isset($instagram_user_link)){  include(APIF_INST_PATH.'inc/frontend/common/profile-image.php');  } ?>
                        <?php if(isset($instagram_user_username)){ ?>
                        <div class="apif-user-name" style='color:<?php // if(isset($hover_image_text_color)){ echo $hover_image_text_color; }else{ echo "#fff"; } ?>;'><?php echo $html_profile_userlink; ?></div>
                        <?php  } ?>
                    </div>
                </div>
            </div>
</div>