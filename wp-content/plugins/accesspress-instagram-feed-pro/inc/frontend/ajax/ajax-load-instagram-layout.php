<div class="apif-masonry-box apif-instagram-layout <?php if( isset($instagram_layout_animate_css_effect) && $instagram_layout_animate_css_effect !='' ){ echo 'wow '.$instagram_layout_animate_css_effect; } ?> " data-wow-duration="2s">
    <div class="apif-instagram-block">
     <div class="header-insta-wrap">
         <div class="apif-left-wrapper">
             <?php if(isset($instagram_user_link)){  include(APIF_INST_PATH.'inc/frontend/common/profile-image.php');  } ?>
             <?php if(isset($instagram_user_username)){ ?>
             <div class="apif-user-name"><?php echo $html_profile_userlink; ?> </div>
             <?php } ?>
         </div> 
         <div class="apif-right-wrapper">
            <?php if(isset($instagram_layout_show_time_ago)){ ?>
            <div class='ap_posted_ago' style='color:<?php if(isset($hover_image_text_color)){ echo $hover_image_text_color; }else{ echo "#fff"; } ?>;'>
                <?php
                $oldTime = $vm['created_time'];
                echo $insta->xTimeAgo($oldTime);
                ?>
            </div>
            <?php } ?>
        </div>
    </div>
    <figure>
       <div class="apif-featimg">
        <?php
        if(isset($apif_settings['enable_lightbox'])){
            if($apif_settings['lightbox_layout'] == 'nivo_lightbox'){
                ?>
                <a href='<?php echo esc_url($lightbox_image); ?>'  title="<?php echo esc_html($captiontext); ?>" class="apif-image-link apif-swipebox" data-lightbox-gallery="gallery1"> <img class="apif-feature-image" src="<?php echo esc_url($image); ?>" alt='<?php echo strip_tags(substr($captiontext , 0, 20)); ?>'> </a>
                <?php
            }else if($apif_settings['lightbox_layout'] == 'preety_photo'){
                if($vm['type'] == 'video'){
                    $video_link = $vm['videos']['low_bandwidth']['url'];
                    ?>
                    <a href='#inline-1-<?php echo $vm['created_time']; ?>'  rel="prettyPhoto[apif-preetyphoto-lightbox]" title="<?php echo strip_tags(substr($vm['caption']['text'], 0, 20)); ?>" class="apif-image-link" width='420' height='300'><img class="apif-feature-image" src="<?php echo esc_url($image); ?>" alt='<?php echo strip_tags(substr($captiontext , 0, 20)); ?>' /></a>
                    <div id="inline-1-<?php echo $vm['created_time']; ?>" style="display:none;">
                       <video controls>
                          <source src="<?php echo $video_link; ?>" type="video/mp4">
                              Your browser does not support the video tag.
                          </video>
                      </div>
                      <?php
                  }else{
                    ?>
                    <a href='<?php echo esc_url($lightbox_image); ?>'  rel="prettyPhoto[apif-preetyphoto-lightbox]" title="<?php echo strip_tags(substr($captiontext , 0, 20)); ?>" class="apif-image-link"> <img class="apif-feature-image" src="<?php echo esc_url($image); ?>" alt='<?php echo strip_tags(substr($captiontext , 0, 20)); ?>' /> </a>
                    <?php
                }
                ?>
                <?php
            }elseif ($apif_settings['lightbox_layout'] == 'litbx_lightbox') { ?>
            <a href='<?php echo esc_url($lightbox_image); ?>' class="example-image-link litbx" data-group="gallery"><img class="apif-feature-image" src="<?php echo esc_url($image); ?>" alt='<?php echo strip_tags(substr($captiontext, 0, 20)); ?>'> </a>
            <?php
        }elseif ($apif_settings['lightbox_layout'] == 'swipe_box'){ ?>
        <!-- for swipe box -->
        <?php if($vm['type'] == 'video'){
            $video_link = $vm['videos']['low_bandwidth']['url'];
            ?>
            <a href='<?php echo esc_url($video_link); ?>?swipeboxVideo=1' class="apif-swipebox" title='<?php echo strip_tags(substr($captiontext , 0, 20)); ?>'><img class="apif-feature-image" src="<?php echo esc_url($image); ?>" alt='<?php echo strip_tags(substr($captiontext , 0, 20)); ?>'></a>
            <?php }else { ?>
            <a href='<?php echo esc_url($lightbox_image); ?>' class="apif-swipebox" title='<?php echo strip_tags(substr($captiontext , 0, 20)); ?>'><img class="apif-feature-image" src="<?php echo esc_url($image); ?>" alt='<?php echo strip_tags(substr($captiontext , 0, 20)); ?>'></a>
            <?php } ?>
            <!-- for swipe box ends -->
            <?php
        }elseif($apif_settings['lightbox_layout'] == 'classic'){ ?>
        <a class="example-image-link example-image-link" href="<?php echo esc_url($image); ?>" data-lightbox="example-set"><img class="apif-feature-image" src="<?php echo esc_url($image); ?>" alt='<?php echo strip_tags(substr($captiontext , 0, 20)); ?>'></a>
        <?php
    }elseif($apif_settings['lightbox_layout'] == 'venobox_lightbox'){
        if($vm['type'] == 'video'){ 
            $video_link = $vm['videos']['low_bandwidth']['url'];
            ?>
            <a class="apif-venobox" href="#inline-2-<?php echo $vm['created_time']; ?>" data-type="inline" title='<?php echo esc_html($captiontext); ?>' data-gall="apif-Gallery" ><img class="apif-feature-image" src="<?php echo esc_url($image); ?>" alt='<?php echo strip_tags(substr($captiontext , 0, 20)); ?>'></a>
            <div id="inline-2-<?php echo $vm['created_time']; ?>" style="display:none; background:#fff; width:100%; height:100%; float:left; padding:10px;">
               <video controls>
                  <source src="<?php echo $video_link; ?>" type="video/mp4">
                      Your browser does not support the video tag.
                  </video> 
              </div>
              <?php }else{
                $image_link = $lightbox_image; ?>
                <a class="apif-venobox" href="<?php echo $lightbox_image; ?>" title='<?php echo esc_html($captiontext); ?>' data-gall="apif-Gallery" ><img class="apif-feature-image" src="<?php echo esc_url($image); ?>" alt='<?php echo strip_tags(substr($captiontext , 0, 20)); ?>'></a>
                <?php } ?>
                <!-- for venobox ends -->
                <?php
            }else if($apif_settings['lightbox_layout'] == 'apif_own_lightbox'){ 
                $data_source_type = $vm['type'];
                if($vm['type'] == 'video'){
                    $data_source_url = $vm['videos']['low_bandwidth']['url'];
                }else {
                    $data_source_url = $image;
                }

                $data_profile_image = isset($vm['user']['profile_picture']) ? $vm['user']['profile_picture']: APIF_IMAGE_DIR.'/round-prof.png';
                
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
                $if_id =  $_POST['apif_id'];
                ?>
                <a class="apif-own-lightbox" href="javascript:void(0);"
                data-index = '<?php echo esc_attr($index_id); ?>'
                data-id = '<?php echo esc_attr($if_id); ?>'
                data-index-id = '<?php echo $index_id; ?>-<?php echo $if_id; ?>'
                data-source-type= '<?php echo esc_attr($data_source_type); ?>'
                data-source-url ='<?php echo esc_url($data_source_url); ?>'
                data-profile-image = '<?php echo esc_url($data_profile_image); ?>'
                data-username = '<?php echo esc_attr($data_username); ?>'
                data-image-caption = '<?php #echo esc_html($data_image_caption); ?>'
                data-likes = '<?php echo esc_attr($likes_count); ?>'
                data-comments = '<?php echo esc_attr($comments_count); ?>'
                data-posted-ago = '<?php echo esc_attr($posted_ago); ?>'
                data-instagram-link='<?php echo esc_url($instagram_link); ?>'
                data-feedid="<?php echo $feed_id;?>" 
                data-link="<?php echo $link;?>" 
                data-feedtype="<?php echo $feed_type;?>"
                data-showcomment="<?php echo $comments_show;?>"><img class="apif-feature-image" src="<?php echo esc_url($image); ?>" alt='<?php echo strip_tags(substr($captiontext , 0, 20)); ?>'></a>
                <div class="apif-hidden" style="display: none;">
                  <?php echo $captiontext;?>
              </div>
              <textarea class="apif-hidden-carousel" style="display: none;"><?php echo $carousel_arr;?></textarea>
              <?php  }
          }else{ ?>
          <img class="apif-feature-image" src="<?php echo esc_url($image); ?>" alt='<?php echo strip_tags(substr($captiontext, 0, 20)); ?>'>
          <?php } ?>
      </div>
      <?php if(isset($instagram_image_link)){ ?>
      <?php if($vm['type'] == 'video'){ ?>
      <span class="apif-ins-link apif-ins-video-icon"> <a href="<?php echo $link; ?>" target="_blank" title="<?php echo _e('View on Instagram', 'accesspress-instagram-feed-pro'); ?>"><i class="fa fa-play-circle-o"></i> </a> </span>
        <?php }else if($vm['type'] == 'sidecar' || $vm['type'] == 'carousel'){ //carousel 
          ?>
          <span class="apif-ins-link apif-ins-video-icon apif-carusel-type"> 
             <a href="<?php echo $link; ?>" target="_blank" title="<?php echo _e('View on Instagram', 'accesspress-instagram-feed-pro'); ?>">
                <i class="fa fa-clone"></i> 
            </a> 
        </span>

        <?php }else{ ?> 
        <span class="apif-ins-link"> <a href='<?php echo $link; ?>' target='_blank' title="<?php echo _e('View on Instagram', 'accesspress-instagram-feed-pro'); ?>"><i class="fa fa-camera"></i></a> </span>
        <?php } ?>
        <?php  } ?>
    </figure>
    <div class="apif-insta-cont-block">
        <div class="apif-comment-like" style='color:<?php if(isset($hover_image_text_color)){ echo $hover_image_text_color; }else{ echo "#fff"; } ?>;'>
            <?php if ($like_count == '1') : ?>
                <!-- Image like count section start -->
                <span class="ap_insta_like_count">
                    <p class="ap-instagram_imge_like">
                        <span class="ap-insta like_image">
                            <i class="fa fa-heart"></i>
                        </span>

                        <?php

                        $count = $vm['likes']['count'];
                        $format = $counter_type_options;
                        $likes_count = IF_Pro_Class:: get_formatted_count($count, $format); 

                        ?>

                        <span class="count"><?php echo $likes_count; ?></span>
                    </p>
                </span>
                <!-- Image like count section end -->
            <?php endif; ?>
            
            <!-- Image comment count section -->
            <?php if($comment_count == '1'): ?>
                <span class='ap_insta_comment_count_wrapper'>
                    <p class="ap_insta_comment_count">
                        <span class='insta comment_count'>
                            <i class='fa fa-comment'></i>
                        </span>
                        <?php

                        $count = $vm['comments']['count'];
                        $format = $counter_type_options;
                        $comments_count = IF_Pro_Class:: get_formatted_count($count, $format); 

                        ?>
                        <span class='ap_insta_count'><?php echo $comments_count; ?></span>
                    </p>
                </span>
            <?php endif; ?>
            <!-- Image comment count section end -->
        </div>

    </div>

    <div class="apif-fig-content">
        <?php if(isset($instagram_layout_show_image_caption)){ ?>
        <div class='apif-image-caption clearfix'>
            <?php echo $captiontext; ?>
        </div>
        <?php } ?>
        <?php include(APIF_INST_PATH.'inc/frontend/common/social-share.php'); ?>
    </div>
</div>
</div>