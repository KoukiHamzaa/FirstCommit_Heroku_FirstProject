<?php
//nivo single slider layout
$join_js_array = array();
$random_no = rand(9999, 999999);
$slider_1_layout_animation = isset($slider_1_layout_animation) ? $slider_1_layout_animation : "fade";
$slider_1_layout_animation_speed = isset($slider_1_layout_animation_speed) ? $slider_1_layout_animation_speed : '500';
$slider_1_layout_animation_duration = isset($slider_1_layout_animation_duration) ? $slider_1_layout_animation_duration : '5000';
$social_share_enable = (isset($apif_settings['social_share']['enable_social_share']) && $apif_settings['social_share']['enable_social_share'] == 1)?1:0;
$facebook_icon = (isset($apif_settings['social_share']['facebook_icon']) && $apif_settings['social_share']['facebook_icon'] == 1)?1:0;
$twiter_icon = (isset($apif_settings['social_share']['twiter_icon']) && $apif_settings['social_share']['twiter_icon'] == 1)?1:0;
$google_plus_icon = (isset($apif_settings['social_share']['google_plus_icon']) && $apif_settings['social_share']['google_plus_icon'] == 1)?1:0;
$pinterest_icon = (isset($apif_settings['social_share']['pinterest_icon']) && $apif_settings['social_share']['pinterest_icon'] == 1)?1:0;
?>
<section id="apif-shortcode-wrapper" class="">
<?php
if($image_size == 'standard_resolution'){
    $class_name = 'large';

}else if($image_size == 'low_resolution'){
    $class_name = 'medium';
}
if($slider_1_layout_animation_duration == ''){
    $slider_1_layout_animation_duration = "3000";
}
if($slider_1_layout_animation_speed == ''){
    $slider_1_layout_animation_speed = "500";
}
if($slider_1_layout_animation == ''){
    $slider_1_layout_animation = "fade";
}
?>
<div  class='ap_slider_wrapper apif-slider-1-view apif-<?php if(isset($class_name)){ echo $class_name; }else{ echo 'small'; } ?>'>
<div class="ap_commond_div_for_pretty_photo_lightbox ap_sliders" id="ins-container">
<?php
    if(isset($ins_media['meta']['error_message'])){
        ?>
           <h1 class="widget-title-insta"><span><?php echo $ins_media['meta']['error_message']; ?></span></h1>
        <?php
    }else if (is_array($ins_media['data']) || is_object($ins_media['data'])) { ?>
        <div class="slider-wrapper theme-default">
            <div class='apif-nivo-slider' data-animation="<?php echo $slider_1_layout_animation;?>" 
            data-animSpeed="<?php echo $slider_1_layout_animation_speed;?>" data-pauseTime="<?php echo $slider_1_layout_animation_duration;?>" id="<?php echo "apif-slider2-".$random_no;?>">
 <?php
        $index_counter = 0;
      
        $carousel_arr = array();
        $data_profile_image = IF_Pro_Class::get_Profile_Image($ins_media['data']);  
 
        $check = 1;
        foreach ($ins_media['data'] as $vm):
         
          if($feed_type == "personal_hashtag"){
          $alltags = $vm['tags'];
          if(isset($alltags) && !empty($alltags) && in_array($personal_hashtag_name,$alltags)){
          $check = 1;
          }else{
          $check = 0;
          }
          }else{
          $alltags = '';
          $check = 1;
          }

          if($check == 1){
                    $index_id = $index_counter++;
                    $permalink = (isset($vm['permalink']) && $vm['permalink'] != '')?esc_url($vm['permalink']):'';
                    $img = $vm['images']['standard_resolution']['url'];
                    $image_url = APIF_IMAGE_DIR . '/image-square.png';
                    if($feed_type == "any_user_timeline" || $feed_type == "hashtag"){
                             $extra_options = (isset($vm['extra_options']) && $vm['extra_options'] != '')?unserialize($vm['extra_options']):array();
                          include_once(APIF_INST_PATH.'inc/frontend/instagram.php');
                          $insta = new InstaWCD();
                          $extra_options = $insta->objectToArray($extra_options);  
                         // $this->displayArr($extra_options);
                          include(APIF_INST_PATH.'inc/frontend/common/anyuser-image-size.php');
                          $feed_id  = $vm['feed_id'];
                          $carousel = (isset($vm['carousel']) && $vm['carousel'] != '')?$vm['carousel']:'';
							if(empty($carousel_arr)){
							   $carousel_arr = serialize($carousel);
							}
                        }else{
                            include(APIF_INST_PATH.'inc/frontend/common/image_size.php');
                            $feed_id  = $vm['caption']['id'];
                            $carousel = (isset($vm['carousel_media']) && !empty($vm['carousel_media']))?$vm['carousel_media']:array();
                            if(!empty($carousel)){
                                 foreach ($carousel as $key => $value) {
                                    $type = (isset($value['images']['type']) && $value['images']['type'] != '')?esc_attr($value['images']['type']):'image';
				                $url =  (isset($value['images']['standard_resolution']['url']) && $value['images']['standard_resolution']['url'] != '')?esc_url($value['images']['standard_resolution']['url']):'';
				                $width =  (isset($value['images']['standard_resolution']['width']) && $value['images']['standard_resolution']['width'] != '')?intval($value['images']['standard_resolution']['width']):'';
				                $height =  (isset($value['images']['standard_resolution']['height']) && $value['images']['standard_resolution']['height'] != '')?intval($value['images']['standard_resolution']['height']):'';
                                    $arr = array(
                                        'type' => $type,
                                        'url' => $url,
                                        'width' => $width,
                                        'height' => $height
                                    );
                                    $carousel_array[] =  $arr;
                                }
                                $carousel_arr = serialize($carousel_array);
                            }
                        }
                    if(empty($carousel_arr)){
                        $carousel_arr = '';
                    }
                    $lightbox_image = $vm['images']['standard_resolution']['url'];

                    $link = $vm["link"];
                    $flow_icon = APIF_IMAGE_DIR . '/sc-icon.png';
                    $captiontext = $vm['caption']['text'];
                   if($feed_type != "any_user_timeline" || $feed_type != "hashtag"){
                               preg_match_all('/#\w+/',$captiontext,$matches);
                                if($matches[0]) {
                                    foreach($matches[0] as $hashtag) {
                                        $hash = str_replace('#', '', $hashtag);
                                        $replace = "<a href='https://www.instagram.com/explore/tags/".$hash."/'>".$hashtag."</a>";
                                      $captiontext =  str_replace($hashtag, $replace, $captiontext);
                                    }
                                }
                    }
                 $image = IF_Pro_Class::check_ifexist_image($image,$image_size,$permalink);
                  //  if($imageinfo){ 
                 $lightbox_image = $image;
                ?>
                    <?php
                    if(isset($apif_settings['enable_lightbox'])){
                        if($apif_settings['lightbox_layout'] == 'preety_photo'){
                            $join_js_array[] = 'apif-prettyphoto-lightbox-core-js';
                            wp_enqueue_script('apif-prettyphoto-lightbox-core-js');
                            wp_enqueue_style('apif-prettyphoto-lightbox');
                            if($vm['type'] == 'video'){
                                $video_link = $vm['videos']['low_bandwidth']['url'];
                                ?>
                                <a href='#inline-1-<?php echo $vm['created_time']; ?>'  rel="prettyPhoto[apif-preetyphoto-lightbox]" title="<?php echo esc_attr(substr($captiontext,0,12)); ?>"  class="hoverlay-link"><img class="sp-image" src="<?php echo esc_url($image); ?>" data-src="<?php echo esc_url($image); ?>" data-retina="<?php echo esc_url($image); ?>" title="#<?php echo $vm['created_time']; ?>" alt='<?php echo esc_attr(substr($captiontext, 0, 12)); ?>'/>
                                    <div id="inline-1-<?php echo $vm['created_time']; ?>" style="display:none;">
                                         <video controls>
                                          <source src="<?php echo $video_link; ?>" type="video/mp4">
                                          Your browser does not support the video tag.
                                        </video>
                                    </div>
                                </a>
                                <?php
                            }else{
                                ?>
                                <a href='<?php echo esc_url($lightbox_image); ?>'  rel="prettyPhoto[apif-preetyphoto-lightbox]" title="<?php echo esc_attr(substr($captiontext,0,12)); ?>"  class="hoverlay-link"><img class="sp-image" src="<?php echo esc_url($image); ?>" data-src="<?php echo esc_url($image); ?>" data-retina="<?php echo esc_url($image); ?>" title="#<?php echo $vm['created_time']; ?>" alt='<?php echo esc_attr(substr($captiontext, 0, 12)); ?>'/></a>
                                <?php
                            }
                            ?>
                            <?php
                        }elseif ($apif_settings['lightbox_layout'] == 'litbx_lightbox') { 
                            $join_js_array[] = 'apif-litbx-core';
                            wp_enqueue_script('apif-litbx-core');
                            wp_enqueue_style('apif-litbx-lightbox');
                            ?>
                            <a href='<?php echo esc_url($lightbox_image); ?>' class="hoverlay-link litbx" data-group="gallery"><img class="sp-image" src="<?php echo esc_url($image); ?>" data-src="<?php echo esc_url($image); ?>" data-retina="<?php echo esc_url($image); ?>" title="#<?php echo $vm['created_time']; ?>" alt='<?php echo esc_attr(substr($captiontext, 0, 12)); ?>'/></a>
                            <?php
                        }elseif ($apif_settings['lightbox_layout'] == 'swipe_box'){ 
                            $join_js_array[] = 'apif-swipebox-core-js';
                            wp_enqueue_script('apif-swipebox-core-js');
                            wp_enqueue_style('swipebox-core-style');
                            ?>
                            <!-- for swipe box -->
                            <?php if($vm['type'] == 'video'){
                                    $video_link = $vm['videos']['low_bandwidth']['url'];
                            ?>
                                <a href='<?php echo esc_url($video_link); ?>?swipeboxVideo=1' class="hoverlay-link apif-swipebox" title='<?php echo esc_attr(substr($captiontext,0,12)); ?>'><img class="sp-image" src="<?php echo esc_url($image); ?>" data-src="<?php echo esc_url($image); ?>" data-retina="<?php echo esc_url($image); ?>" title="#<?php echo $vm['created_time']; ?>" alt='<?php echo esc_attr(substr($captiontext, 0, 12)); ?>'/></a>
                            <?php }else { ?>
                                <a href='<?php echo esc_url($lightbox_image); ?>' class="hoverlay-link apif-swipebox" title='<?php echo esc_attr(substr($captiontext,0,12)); ?>'><img class="sp-image" src="<?php echo esc_url($image); ?>" data-src="<?php echo esc_url($image); ?>" data-retina="<?php echo esc_url($image); ?>" title="#<?php echo $vm['created_time']; ?>" alt='<?php echo esc_attr(substr($captiontext, 0, 12)); ?>'/></a>
                            <?php } ?>
                            <!-- for swipe box ends -->
                            <?php
                        }elseif($apif_settings['lightbox_layout'] == 'classic'){ 
                            $join_js_array[] = 'lightbox-js';
                            wp_enqueue_script('lightbox-js');
                            wp_enqueue_style('lightbox');
                            ?>
                            <a class="hoverlay-link example-image-link" href="<?php echo esc_url($lightbox_image); ?>" data-lightbox="example-set"><img class="sp-image" src="<?php echo esc_url($image); ?>" data-src="<?php echo esc_url($image); ?>" data-retina="<?php echo esc_url($image); ?>" title="#<?php echo $vm['created_time']; ?>" alt='<?php echo esc_attr(substr($captiontext, 0, 12)); ?>'/></a>
                            <?php
                        }elseif($apif_settings['lightbox_layout'] == 'venobox_lightbox'){ 
                            $join_js_array[] = 'apif-venobox-core';
                            wp_enqueue_script('apif-venobox-core');
                            wp_enqueue_style('apif-venobox-lightbox');
                            ?>
                            <!-- for venobox -->
                            <?php if($vm['type'] == 'video'){ 
                                    $video_link = $vm['videos']['low_bandwidth']['url']; ?>
                                        <a class="hoverlay-link apif-venobox" href="#inline-2-<?php echo $vm['created_time']; ?>" data-type="inline" title='<?php echo esc_attr(substr($captiontext,0,12)); ?>' data-gall="apif-Gallery" >
                                            <img class="sp-image" src="<?php echo esc_url($image); ?>" data-src="<?php echo esc_url($image); ?>" data-retina="<?php echo esc_url($image); ?>" title="#<?php echo $vm['created_time']; ?>" alt='<?php echo esc_attr(substr($captiontext, 0, 12)); ?>'/>
                                            <div id="inline-2-<?php echo $vm['created_time']; ?>" style="display:none; background:#fff; width:100%; height:100%; float:left; padding:10px;">
                                                 <video controls>
                                                  <source src="<?php echo $video_link; ?>" type="video/mp4">
                                                  Your browser does not support the video tag.
                                                </video> 
                                            </div>
                                        </a>
                            <?php }else{
                                    $image_link = $lightbox_image; ?>
                                        <a class="hoverlay-link apif-venobox" href="<?php echo $image_link; ?>" title='<?php echo esc_attr(substr($captiontext,0,12)); ?>' data-gall="apif-Gallery" ><img class="sp-image" src="<?php echo esc_url($image); ?>" data-src="<?php echo esc_url($image); ?>" data-retina="<?php echo esc_url($image); ?>" title="#<?php echo $vm['created_time']; ?>" alt='<?php echo esc_attr(substr($captiontext, 0, 12)); ?>'/></a>
                                <?php } ?>
                            <!-- for venobox ends -->
                            <?php
                        }else if($apif_settings['lightbox_layout'] == 'apif_own_lightbox'){ 
                            $data_source_type = $vm['type'];
                            if($vm['type'] == 'video'){
                               $data_source_url = $vm['videos']['low_bandwidth']['url'];
                                //$data_source_url = $image;
                            }else {
                                $data_source_url = $lightbox_image;
                            }

                            // $data_profile_image = $vm['caption']['from']['profile_picture'];
                            
                            $data_username = $vm['user']['username'];
                            
                            $data_image_caption =$captiontext;
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
                            $if_id =  $attr['id'];
                            $comments_show = (isset($apif_settings['enable_comments']) && $apif_settings['enable_comments'] == 1)?1:0;
                            ?>
                            <a class="hoverlay-link apif-own-lightbox" data-gall="apif-Gallery"  href="javascript:void(0);" title='<?php echo esc_attr(substr($captiontext, 0, 12)); ?>'
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
                                data-showcomment="<?php echo $comments_show;?>"
                            ><img class="sp-image" src="<?php echo esc_url($image); ?>" data-src="<?php echo esc_url($image); ?>" data-retina="<?php echo esc_url($image); ?>" title="#<?php echo $vm['created_time']; ?>" alt='<?php echo esc_attr(substr($captiontext, 0, 12)); ?>'/></a>
                            <?php
                        }
                    }else{ ?>
                        <a href="javascript:void(0);" data-gall="apif-Gallery"><img class="sp-image" src="<?php echo esc_url($image); ?>" data-src="<?php echo esc_url($image); ?>" data-retina="<?php echo esc_url($image); ?>" title="#<?php echo $vm['created_time']; ?>" alt='<?php echo esc_attr(substr($captiontext, 0, 12)); ?>'/></a>
                        <?php
                    } ?>
                    <?php
               // }
              }
                endforeach;
            ?>
            </div>

            <?php  
            foreach ($ins_media['data'] as $vm): 

             if($feed_type == "personal_hashtag"){
                  $alltags = $vm['tags'];
                  if(isset($alltags) && !empty($alltags) && in_array($personal_hashtag_name,$alltags)){
                  $check = 1;
                  }else{
                  $check = 0;
                  }
                  }else{
                  $alltags = '';
                  $check = 1;
                  }

             // if($check == 1){
                  $permalink = $vm['permalink'];
                  $index_id = $index_counter++;
                    $img = $vm['images']['standard_resolution']['url'];
                    $data_profile_image = isset($vm['user']['profile_picture']) ? $vm['user']['profile_picture']: APIF_IMAGE_DIR.'/round-prof.png';
                    $image_url = APIF_IMAGE_DIR . '/image-square.png';
                    if($feed_type == "any_user_timeline" || $feed_type == "hashtag"){
                          $extra_options = (isset($vm['extra_options']) && $vm['extra_options'] != '')?unserialize($vm['extra_options']):array();
                           include_once(APIF_INST_PATH.'inc/frontend/instagram.php');
                           $insta = new InstaWCD();
                           $extra_options = $insta->objectToArray($extra_options);  
                                         // $this->displayArr($extra_options);
                           include(APIF_INST_PATH.'inc/frontend/common/anyuser-image-size.php');
                            $feed_id  = $vm['feed_id'];
                            $carousel = (isset($vm['carousel']) && $vm['carousel'] != '')?$vm['carousel']:'';
if(empty($carousel_arr)){
   $carousel_arr = serialize($carousel);
}
                        }else{
                            include(APIF_INST_PATH.'inc/frontend/common/image_size.php');
                            $feed_id  = $vm['caption']['id'];
                            $carousel = (isset($vm['carousel_media']) && !empty($vm['carousel_media']))?$vm['carousel_media']:array();
                            if(!empty($carousel)){
                                 foreach ($carousel as $key => $value) {
                                    $type = $value['images']['type'];
                                    $url = $value['images']['standard_resolution']['url'];
                                    $width = $value['images']['standard_resolution']['width'];
                                    $height = $value['images']['standard_resolution']['height'];
                                    $arr = array(
                                        'type' => $type,
                                        'url' => $url,
                                        'width' => $width,
                                        'height' => $height
                                    );
                                    $carousel_array[] =  $arr;
                                }
                                $carousel_arr = serialize($carousel_array);
                            }
                        }
                    if(empty($carousel_arr)){
                        $carousel_arr = '';
                    }
                    $lightbox_image = $vm['images']['standard_resolution']['url'];

                    $link = $vm["link"];
                    $flow_icon = APIF_IMAGE_DIR . '/sc-icon.png';
                    $captiontext = $vm['caption']['text'];
                    if($feed_type != "any_user_timeline" || $feed_type != "hashtag"){
                               preg_match_all('/#\w+/',$captiontext,$matches);
                                if($matches[0]) {
                                    foreach($matches[0] as $hashtag) {
                                        $hash = str_replace('#', '', $hashtag);
                                        $replace = "<a href='https://www.instagram.com/explore/tags/".$hash."/'>".$hashtag."</a>";
                                      $captiontext =  str_replace($hashtag, $replace, $captiontext);
                                    }
                                }
                            }  
            ?>
            <?php if(isset($slider_1_layout_show_image_caption)){ ?>
                <div id="<?php echo $vm['created_time']; ?>" class="nivo-html-caption">
                        <p><?php 
                            $reg_exUrl = "/(http|https|ftp|ftps|www|www.)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
                            $text = $captiontext;
                            $text = str_replace( " www. ", "http://www.", $text );
                            $text = str_replace( " Www. ", "http://www.", $text );
                            if(preg_match($reg_exUrl, $text, $url)) {
                            }
                              $text = $this->html_cut($text, 120);
                              $text = str_replace('#', ' #', $text);
                              echo $text;
                        ?></p>
                        <div class="apif-hidden" style="display: none;">
                        <?php echo $captiontext;?>
                        </div>
                        <textarea class="apif-hidden-carousel" style="display: none;"><?php echo $carousel_arr;?></textarea>
                         <?php 
                         include(APIF_INST_PATH.'inc/frontend/common/social-share.php'); 
                        ?>
                </div>
     <?php } 
    endforeach; ?>
        </div>
    <?php } ?>
</div>
</div>
</section>
<style>
.nivo-caption{ background: <?php if(isset($slider_1_layout_image_caption_background_color)){ echo $slider_1_layout_image_caption_background_color; }else{ echo 'fc0'; } ?> !important; }
.apif-slider-1-view .nivo-directionNav a { color: <?php if(isset($slider_1_layout_show_next_previous_color)){ echo $slider_1_layout_show_next_previous_color; }else{ echo 'fc0'; } ?> !important;  }
</style>
<script type="text/javascript">
// wow and animate css effect
// Masonry Setting for instagram
// jQuery(document).ready( function($) {

//  $('.apif-nivo-slider').nivoSlider({
//     effect: 'fade',                 // Specify sets like: 'fold,fade,sliceDown'
//     slices: 15,                     // For slice animations
//     boxCols: 8,                     // For box animations
//     boxRows: 4,                     // For box animations
//     animSpeed: 500,                 // Slide transition speed
//     pauseTime: 5000,                 // How long each slide will show
//     startSlide: 0,                     // Set starting Slide (0 index)
//     directionNav: true,             // Next & Prev navigation
//     controlNav: false,                 // 1,2,3... navigation
//     controlNavThumbs: false,         // Use thumbnails for Control Nav
//     pauseOnHover: true,             // Stop animation while hovering
//     manualAdvance: false,             // Force manual transitions
//     prevText: '<i class="fa fa-chevron-left"></i>',                 // Prev directionNav text
//     nextText: '<i class="fa fa-chevron-right"></i>',                 // Next directionNav text
//     randomStart: false,             // Start on a random slide
//     // beforeChange: function(){},     // Triggers before a slide transition
//     // afterChange: function(){},         // Triggers after a slide transition
//     // slideshowEnd: function(){},     // Triggers after all slides have been shown
//     // lastSlide: function(){},         // Triggers when last slide is shown
//     // afterLoad: function(){}         // Triggers when slider has loaded
//  });

// });
</script>
<?php
wp_enqueue_style('apif-nivo-slider');
wp_enqueue_style('apif-nivo-slider-default-theme');
wp_enqueue_style('apif-nivo-slider-bar-theme');
wp_enqueue_style('apif-nivo-slider-dark-theme');
wp_enqueue_style('apif-nivo-slider-light-theme');
wp_enqueue_script('apif-nivoslider-core');
wp_enqueue_style('apif-bx-slider');
wp_enqueue_script('apif-bxslider-core');
$dependencies = array('jquery', 'apif-nivoslider-core','apif-bxslider-core');
array_merge($dependencies, $join_js_array);
wp_enqueue_script('apif-frontend-js', $dependencies);
wp_localize_script( 'apif-frontend-js', 'frontend_nivo_slider_object', array('nivo_slider_enable' => 'true') );