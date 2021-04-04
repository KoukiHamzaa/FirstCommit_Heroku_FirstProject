<?php
    // Any mobile device (phones or tablets).
    // Exclude tablets.
    if(isset($apif_settings['round_image_layout'])){
        $column_option = $apif_settings['round_image_layout']['columns'];
        if( $detect->isMobile() && !$detect->isTablet() ){
          // echo "Mobile Detected";
          $round_image_layout_no_of_columns = isset($column_option['mobile']) ? $column_option['mobile'] : '1'; // "apif-col-1";
        }
        // Any tablet device.
        else if( $detect->isTablet() ){
          // echo "Tablet Detected";
          $round_image_layout_no_of_columns = isset($column_option['tablet']) ? $column_option['tablet'] : '3';
        }
        // any desktop devices
        else{
            // echo "Desktop detected";
            $round_image_layout_no_of_columns = isset($column_option['desktop']) ? $column_option['desktop'] : $round_image_layout_no_of_columns;
        }
        if($round_image_layout_no_of_columns == ''){
            $round_image_layout_no_of_columns = 2;
        }
        $round_image_layout_no_of_columns = "apif-col-$round_image_layout_no_of_columns";
    }else{
        $round_image_layout_no_of_columns = $round_image_layout_no_of_columns;
    }
?>
<div class="apif-masonry-box apif-round-image-layout <?php if(isset($round_image_layout_no_of_columns)){ echo $round_image_layout_no_of_columns; }else{ echo 'apif-col-5'; } ?>  <?php echo $largedesktopcolumn;?> <?php if(isset($round_image_layout_animate_css_effect) && $round_image_layout_animate_css_effect!=''){ echo 'wow '.$round_image_layout_animate_css_effect; } ?> " data-wow-duration="2s">
<div class="apif-round-image-block <?php if(isset($round_image_layout_animation_effect)){ echo $round_image_layout_animation_effect; }else{ echo 'circle-rotateyrs'; } ?> ">
<div class="img"><img class="img-thumb" src="<?php echo esc_url($image); ?>" alt='<?php echo strip_tags(substr($captiontext, 0, 20)); ?>'></div>
<div class="apif-round-img-info" style="border:<?php if(isset($round_image_layout_hover_border_width) && $round_image_layout_hover_border_width !=''){ echo $round_image_layout_hover_border_width; }else{ echo '5'; } ?>px solid <?php if(isset($round_image_layout_hover_border_color) && $round_image_layout_hover_border_color !=''){ echo $round_image_layout_hover_border_color; }else{ echo '#ff0'; } ?>;">
<div class="apif-round-info-main-wrap">

    <div class="apif-user-info-wrapper">
        <?php if(isset($instagram_user_link)){ ?>
        <a href='javascript:void(0);'>
        <div class='apif-img-round-p-image'>
            <img src='<?php echo $data_profile_image; ?>' width='150px' alt='<?php echo $vm['user']['username']; ?>' />
        </div>
        </a>
        <?php  } ?>
        <?php if(isset($instagram_user_username)){ ?>
        <div class="apif-user-name" style='color:<?php if(isset($hover_image_text_color)){ echo $hover_image_text_color; }else{ echo "#fff"; } ?>;'><?php echo $html_profile_userlink; ?></div>
       <?php  } ?>
    </div>

<div class="apif-img-round-c-like" style='color:<?php if(isset($hover_image_text_color)){ echo $hover_image_text_color; }else{ echo "#fff"; } ?>;'>
<?php if ($like_count == '1') : ?>
<!-- Image like count section start -->
<span class="apif-count"><i class="fa fa-heart"></i></span>
<?php
$count = $vm['likes']['count'];
$format = $counter_type_options;
$likes_count = IF_Pro_Class:: get_formatted_count($count, $format);  ?>
<span class="apif-ound-img-count"><?php echo $likes_count; ?></span>
<!-- Image like count section end -->
<?php endif; ?>
<!-- Image comment count section -->
    <?php if($comment_count == '1'): ?>
        <span class='ap_imground_comment_count_wrapper'>
            <p class="ap_imground_comment_count">
                <span class='imground comment_count'>
                    <i class='fa fa-comment'></i>
                </span>

                <?php

                $count = $vm['comments']['count'];
                $format = $counter_type_options;
                $comments_count = IF_Pro_Class:: get_formatted_count($count, $format);

                ?>
                <span class='ap_imground_count'><?php echo $comments_count; ?></span>
            </p>
        </span>
    <?php endif; ?>
    <!-- Image comment count section end -->
</div>

<div class="apif-link-section">
<!-- instagram image link -->
    <?php if(isset($instagram_image_link)){ ?>
    <?php if($vm['type'] == 'video'){ ?>
        <span class="apif-ins-link apif-ins-video-icon"> <a href="<?php echo $link; ?>" target="_blank" title="<?php echo _e('View on Instagram', 'accesspress-instagram-feed-pro'); ?>"><i class="fa fa-play-circle-o"></i> </a> </span>
    <?php }else if($vm['type'] == 'sidecar'){ //carousel  ?>
       <span class="apif-ins-link apif-ins-video-icon apif-carusel-type"> 
         <a href="<?php echo $link; ?>" target="_blank" title="<?php echo _e('View on Instagram', 'accesspress-instagram-feed-pro'); ?>">
            <i class="fa fa-clone"></i> 
        </a> 
        </span>
        <?php }else{ ?> 
        <span class="apif-ins-link"> <a href='<?php echo $link; ?>' target='_blank' title="<?php echo _e('View on Instagram', 'accesspress-instagram-feed-pro'); ?>"><i class="fa fa-camera"></i></a> </span>
    <?php } ?>
<?php  } ?>  
 <?php if(isset($apif_settings['enable_lightbox'])){ ?>
<span class="apif-lightbox-popup">
<?php
        if($apif_settings['lightbox_layout'] == 'preety_photo'){ 
            if($vm['type'] == 'video'){
                $video_link = $vm['videos']['low_bandwidth']['url']; ?>
                <a href='#inline-1-<?php echo $vm['created_time']; ?>'  rel="prettyPhoto[apif-preetyphoto-lightbox]" title="<?php echo esc_html($captiontext); ?>" class="apif-round-image-link " >
                   <i class="fa fa-search"></i>
                </a>
                    <div id="inline-1-<?php echo $vm['created_time']; ?>" style="display:none;">
                         <video controls>
                          <source src="<?php echo $video_link; ?>" type="video/mp4">
                          <?php _e('Your browser does not support the video tag.', 'accesspress-instagram-feed-pro'); ?>
                        </video>
                    </div>
                <?php
                }else{
                ?>
                <a href='<?php echo esc_url($image); ?>' rel="prettyPhoto[apif-preetyphoto-lightbox]" title="<?php echo esc_html($captiontext); ?>" class="apif-round-image-link " >
                   <i class="fa fa-search"></i>
                </a>
                <?php
                }
        ?>
    <?php
        }elseif ($apif_settings['lightbox_layout'] == 'litbx_lightbox') { ?>
            <a href='<?php echo esc_url($image); ?>' class="apif-round-image-link litbx" data-group="gallery">
                <i class="fa fa-search"></i>
            </a>
   <?php
        }elseif ($apif_settings['lightbox_layout'] == 'swipe_box'){ ?>
            <!-- for swipe box -->
            <?php if($vm['type'] == 'video'){
                    $video_link = $vm['videos']['low_bandwidth']['url'];
            ?>
                <a href='<?php echo esc_url($video_link); ?>?swipeboxVideo=1' class="apif-round-image-link apif-swipebox" title='<?php echo esc_html($captiontext); ?>'>
                   <i class="fa fa-search"></i>
                </a>
            <?php }else { ?>
                <a href='<?php echo esc_url($image); ?>' class="apif-round-image-link apif-swipebox" title='<?php echo esc_html($captiontext); ?>'>
                    <i class="fa fa-search"></i>
                </a>
            <?php } ?>
      <!-- for swipe box ends -->
        <?php
                }elseif($apif_settings['lightbox_layout'] == 'classic'){ ?>
                    <a class="apif-round-image-link" href="<?php echo esc_url($image); ?>" data-lightbox="example-set">
                       <i class="fa fa-search"></i>
                    </a>
        <?php
    }elseif($apif_settings['lightbox_layout'] == 'venobox_lightbox'){ ?>
        <!-- for venobox -->
        <?php if($vm['type'] == 'video'){ 
                $video_link = $vm['videos']['low_bandwidth']['url'];
            ?>
                    <a class="apif-round-image-link apif-venobox" href="#inline-2-<?php echo $vm['created_time']; ?>" data-type="inline" title='<?php echo esc_html($captiontext); ?>' data-gall="apif-Gallery" >
                        <div class='apif-img-round-p-image'>
                            <img src='<?php echo $data_profile_image; ?>' width='150px' alt='<?php echo $vm['user']['username']; ?>' />
                        </div>
                    </a>
                    <div id="inline-2-<?php echo $vm['created_time']; ?>" style="display:none; background:#fff; width:100%; height:100%; float:left; padding:10px;">
                     <video controls>
                      <source src="<?php echo $video_link; ?>" type="video/mp4">
                      Your browser does not support the video tag.
                    </video> 
                    </div>
            <?php }else{
                // $image_link = $image; ?>
            <a class="apif-round-image-link apif-venobox" href="<?php echo $image; ?>" title='<?php echo esc_html($captiontext); ?>' data-gall="apif-Gallery" >
                <i class="fa fa-search"></i>
            </a>
    <?php } ?>
<!-- for venobox ends -->                
<?php }else if($apif_settings['lightbox_layout'] == 'apif_own_lightbox'){ 
                $data_source_type = $vm['type'];
                if($vm['type'] == 'video'){
                    $data_source_url = $vm['videos']['low_bandwidth']['url'];
                }else {
                    $data_source_url = $image;
                }

                $data_profile_image = $data_profile_image;
                
                $data_username = $vm['user']['username'];
                
                $data_image_caption = $captiontext; // IF_Pro_Class:: return_string_80_char($vm['caption']['text']);
                
                $likes_count = $vm['likes']['count'];
                $format = $counter_type_options;
                $likes_count = IF_Pro_Class:: get_formatted_count($likes_count, $format); 
                
                $comments_count = $vm['comments']['count'];
                $format = $counter_type_options;
                $comments_count = IF_Pro_Class:: get_formatted_count($comments_count, $format);
                
                $timestamp = $vm['created_time'];
                $posted_ago = $insta->xTimeAgo($timestamp);

                $instagram_link = $vm['link'];
                $data_id = $vm['created_time'];
                $if_id =  $_POST[ 'apif_id' ];  ?>
                <a class="apif-round-image-link apif-own-lightbox" href="javascript:void(0);"
                    data-index = '<?php echo esc_attr($index_id); ?>'
                    data-id = '<?php echo esc_attr($if_id); ?>'
                    data-index-id = '<?php echo $index_id; ?>-<?php echo $if_id; ?>'
                    data-source-type= '<?php echo esc_attr($data_source_type); ?>'
                    data-source-url ='<?php echo esc_url($data_source_url); ?>'
                    data-profile-image = '<?php echo esc_url($data_profile_image); ?>'
                    data-username = '<?php echo esc_attr($data_username); ?>'
                    data-likes = '<?php echo esc_attr($likes_count); ?>'
                    data-comments = '<?php echo esc_attr($comments_count); ?>'
                    data-posted-ago = '<?php echo esc_attr($posted_ago); ?>'
                    data-instagram-link='<?php echo esc_url($instagram_link); ?>'
                    data-feedid="<?php echo $feed_id;?>" 
                    data-link="<?php echo $link;?>" 
                    data-feedtype="<?php echo $feed_type;?>"
                    data-showcomment="<?php echo $comments_show;?>">
                   <i class="fa fa-search"></i>
                </a>
                <div class="apif-hidden" style="display: none;">
                      <?php echo $captiontext;?>
                </div>
                <textarea class="apif-hidden-carousel" style="display: none;"><?php echo $carousel_arr;?></textarea>
             <?php    } ?>
     </span>
    <?php }?>
</div>
     <?php include(APIF_INST_PATH.'inc/frontend/common/social-share.php'); ?>
</div>    
</div>
</div>
</div>